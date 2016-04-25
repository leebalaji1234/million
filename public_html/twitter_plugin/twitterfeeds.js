/* Install "Username" & "Tweet count" */
$(document).ready(function(){
     var alltwitters = [];
    $.get('ajax_sponsors.php',function(response){
        if(response !='error'){
            obj = JSON.parse(response); 
            alltwitters =  obj.twitter;
            
        }
           
    });
    setTimeout(function(){
        mytweet('@OaSathya','5');
        $('.feedswidget').toggle("slide");
        $('.pixelboard').removeClass('col-md-12'); 
        $('.pixelboard').addClass('col-md-10');
    },5000);

  // var refreshId = setInterval( function(){ 
  //             $.each(alltwitters,function(i,v){
  //                 mytweet(v,'5'); 
  //             }); 
  //        console.log('timeout working fine');      
  //   },5000);

});

/* ---------------------------------- */

// Twitter API by TweeCool
function mytweet(screenname,count) {
    $.ajax({
        url: 'http://api.tweecool.com/?screenname=' + screenname + '&count=' + count,
        crossDomain: true,
        dataType: 'json'
    }).done(function (data) {
        var html = '';
        $.each(data.tweets, function(i, item) {
            html += ' <p style="width:100%;"  > <span style="width:100%;height:100%;float:left" ><a href="https://twitter.com/' + screenname + '/status/'+item.id_str+'" target="_blank"><img style="border-radius:26px;" src="' + data.user.profile_image_url + '">'+ urltag('@' + data.user.screen_name) +'</a> </span><span >'+  urltag(data.tweets[i].text) + ' <span class="created_at">' + xTimeAgo(data.tweets[i].timestamp) + '</span></span></p>';
            html += '<br/><hr />';
        });
        $('#tweecool').prepend(html);
    });
}

// Find url, tags, email & @ from text
function urltag(c, d) {
    var e = {
            link: {
                regex: /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,
                template: "<a href=\"$1\" target='_BLANK'>$1</a>"
            },
            etdah: {
                regex: /(^|\s)@(\w+)/g,
                template: '$1<a href="https://twitter.com/$2" target="_BLANK">@$2</a>'
            },
            hash: {
                regex: /(^|\s)#(\w+)/g,
                template: '$1<a href="https://twitter.com/hashtag/$2" target="_BLANK">#$2</a>'
            },
            email: {
                regex: /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi,
                template: '<a href=\"mailto:$1\">$1</a>'
            }
        };
    var f = $.extend(e, d);
    $.each(f, function(a, b) {
        c = c.replace(b.regex, b.template)
    });
    return c
}

function xTimeAgo(time) {
                var nd = new Date();
                //var gmtDate = Date.UTC(nd.getFullYear(), nd.getMonth(), nd.getDate(), nd.getHours(), nd.getMinutes(), nd.getMilliseconds());
                var gmtDate = Date.parse(nd);
                var tweetedTime = time * 1000; //convert seconds to milliseconds
                var timeDiff = (gmtDate - tweetedTime) / 1000; //convert milliseconds to seconds
                
                var second = 1, minute = 60, hour = 60 * 60, day = 60 * 60 * 24, week = 60 * 60 * 24 * 7, month = 60 * 60 * 24 * 30, year = 60 * 60 * 24 * 365;
                                
                if (timeDiff > second && timeDiff < minute) {
                                    return Math.round(timeDiff / second) + " second"+(Math.round(timeDiff / second) > 1?'s':'')+" ago";
                } else if (timeDiff >= minute && timeDiff < hour) {
                    return Math.round(timeDiff / minute) + " minute"+(Math.round(timeDiff / minute) > 1?'s':'')+" ago";
                } else if (timeDiff >= hour && timeDiff < day) {
                    return Math.round(timeDiff / hour) + " hour"+(Math.round(timeDiff / hour) > 1?'s':'' )+" ago";
                } else if (timeDiff >= day && timeDiff < week) {
                    return Math.round(timeDiff / day) + " day"+(Math.round(timeDiff / day) > 1 ?'s':'')+" ago";
                } else if (timeDiff >= week && timeDiff < month) {
                    return Math.round(timeDiff / week) + " week"+(Math.round(timeDiff / week) > 1?'s':'')+" ago";
                } else if (timeDiff >= month && timeDiff < year) {
                    return Math.round(timeDiff / month) + " month"+(Math.round(timeDiff / month) > 1 ?'s':'')+" ago";
                } else {
                    return 'over a year ago';
                }
            }