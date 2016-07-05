 // .config(['$interpolateProvider', function ($interpolateProvider) {
 //    $interpolateProvider.startSymbol('{[{');
 //    $interpolateProvider.endSymbol('}]}');
 //  }]).
 var md = {};
 window.md = {};
 md = angular.module('md', ['ngSanitize','720kb.socialshare']) //'ui.router'
     .config(function($sceDelegateProvider) {
         $sceDelegateProvider.resourceUrlWhitelist([
             'self',
             "https://www.youtube.com/**",
             "http://www.youtube.com/**"
         ]);
     });
// md.filter('rangeFilter', function() {
//     return function( items, searcherAge ) {
//         var filtered = [];
//         var min = parseInt(searcherAge.ageMin);
//         var max = parseInt(searcherAge.ageMax);
//         // If time is with the range
//         angular.forEach(items, function(item) {
//             if( item.age >= min && item.age <= max ) {
//                 filtered.push(item);
//             }
//         });
//         return filtered;
//     };
// });
 var sitehostname = '';
 md.directive("drawingscontroller", function() {
     return {
         restrict: 'E',
         templateUrl: "angular_includes/js/drawings.html",
         controller: function($scope, $http, $location) {
             $scope.selected_theme = 0;
             $scope.selected_theme_val = 0;
             $scope.selected_country = 0;
             $scope.selected_country_val = 0;
             $scope.selected_age1 = 0;

             $scope.selected_age2 = 100;
             $scope.searcher = {};
             $scope.searcherAge = {};
             $scope.searcherAge.ageMin = -1;
             $scope.searcherAge.ageMax = 100;

             $scope.defaultload = 4;
             $scope.breadcrumb = [];
              $scope.sitehost = $location.host();
              sitehostname = $location.host();
             $scope.totalDisplayed = $scope.defaultload;
             $scope.sort = function(keyname) {

                // Resetting all filters only for recents

            $scope.search = undefined;
            $scope.searcher.theme = undefined;
            $scope.searcher.country = undefined;
            $scope.searcherAge.ageMin = -1;
            $scope.searcherAge.ageMax = 100;

            dobreadcrumb('','country');
             dobreadcrumb('','theme');
              dobreadcrumb('','age');

              $('#breadcrumb').hide();
// ends
                 $scope.sortKey = keyname;
                 $scope.reverse = !$scope.reverse;
             };
//                 console.log($scope.search);
// console.log($scope.searcher.theme);
// console.log($scope.searcher.country);
// console.log($scope.searcherAge.ageMin);
// console.log($scope.searcherAge.ageMax);
             $scope.loadMore = function() {
                 $scope.totalDisplayed += $scope.defaultload;
                  
             };
             $scope.onDoClick = function(did) {
                 $.post('ajax_do_click.php', {
                     drawing_id: did
                 }, function(response) {
                     if (response == 'success') {
                         clickval = parseInt($('#click_' + did).text());
                         clickval++;
                         $('#click_' + did).text(clickval);
                         $('#click1_' + did).text(clickval);
                     }


                 });

             }
             $scope.onDoLike = function(did) {
                 $.post('ajax_do_like.php', {
                     drawing_id: did
                 }, function(response) {
                     if (response == 'success') {
                         likeval = parseInt($('#like_' + did).text());
                         likeval++;
                         $('#like_' + did).text(likeval);
                         $('#like1_' + did).text(likeval);
                     }
                     if (response == 'disable') {
                         alert('Oops! It seems you already like it');
                     }
                 });
             }

             $http.get('ajax_drawings_list.php').then(function(response) {
                 $scope.drawings = response.data.drawings;
                 $scope.alldrawings = $scope.drawings;

             });
             
             $scope.emailisRegistered = function(sEmail,did){ 
                reponseTxt = '';
                     $.ajax({
                        url:'ajax_do_report_check.php',
                        type:'post',
                        data:{email:sEmail,drawid:did},
                        async:false,
                        success:function(response){
                            console.log(response);
                            if(response == 'false'){
                                reponseTxt =  false;
                            }else{
                                reponseTxt =  true;
                            }
                        }
                    });
                return reponseTxt;
            }
            $scope.emailvalidate = function(sEmail){ 
                    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

                    if (filter.test(sEmail)) { 
                        return true; 
                    }
                    else {
                       return false;
                    } 
            }
             $scope.submitReport = function(drawid) {

                 if($('#reportForm_'+drawid).find('.name').val() == ''){
                    alert("Oops ! Fill your name!");
                    $('#reportForm_'+drawid).find('.name').focus();
                    return false;
                 }else if($('#reportForm_'+drawid).find('.email').val() == ''){
                    alert("Oops ! Fill your email!");
                    $('#reportForm_'+drawid).find('.email').focus();
                    return false;
                 }else if($scope.emailvalidate($('#reportForm_'+drawid).find('.email').val()) == false) {
                    alert("Oops ! Please enter valid email!");
                    $('#reportForm_'+drawid).find('.email').focus();
                    return false; 
                 }else if($scope.emailisRegistered($('#reportForm_'+drawid).find('.email').val(),drawid) == false) {
                    alert("Oops ! it seems you already reported!");
                    $('#reportForm_'+drawid).find('.email').focus();
                    return false;

                 }else if($('#reportForm_'+drawid).find('input[name="issue_type"]:checked').val() == undefined){
                    alert("Oops ! Choose your issue!"); 
                    return false;
                 }else{
                    console.log("issue validation");
                    console.log($('#reportForm_'+drawid).find('input[name="issue_type"]:checked').val());
                    var containerVals = $('#reportForm_'+drawid).serialize();   
                    $.post('ajax_do_report.php',containerVals,function(response){
                         if(response == 'true'){
                            alert("Report submitted successfully!");
                            $('#reportForm_'+drawid).find('.modelclose').click();
                         } else{
                            alert(response);
                            return false;
                         }

                    });

                 }
                 
                 
             };
      $scope.viewMakeOfart = function(id,url){
var html1 = `
<iframe width="660" height="315" src="[placeholder]" frameborder="0" allowfullscreen>
</iframe>
`;
html1 = html1.replace('[placeholder]',url);
 
 $('#expandmk_'+id).parent().find('.makeofwindow').html(html1).slideDown();
 }
             $scope.listdrawings = function() {
                // individual search 
                 $scope.drawings = $scope.alldrawings;
                // if($.isEmptyObject($scope.drawings)){
                //     $scope.drawings = $scope.alldrawings;
                // }
               
                 return true;
             };
             $scope.ageFilter = function (drawing) {
                 
                return (drawing.age > $scope.searcherAge.ageMin && drawing.age < $scope.searcherAge.ageMax);
            }
             $scope.andOperateSearch = function(){
                // get one array


             // $scope.selected_theme = 0;
             // $scope.selected_theme_val = 0;
             // $scope.selected_country = 0;
             // $scope.selected_country_val = 0;
             // $scope.selected_age1 = 0;
             // $scope.selected_age2 = 0;
                $scope.listdrawings();
                 var filtered = [];
                 if($scope.selected_theme != 0){
                    // angular.forEach($scope.drawings, function(item1) {
                    //  if (item1.theme_id == $scope.selected_theme) {
                    //      filtered.push(item1);
                    //  }
                    // });
                    // $scope.drawings = filtered; 
                    $scope.searcher.theme = $scope.selected_theme;
                 }
                 if($scope.selected_country != 0){
                     // angular.forEach($scope.drawings, function(item2) {
                     //     if (item2.country == $scope.selected_country) { 
                     //         filtered.push(item2);
                     //     }
                     // });
                     // $scope.drawings = filtered;
                     $scope.searcher.country = $scope.selected_country;
                 }

                 if($scope.selected_age1 != 0 && $scope.selected_age2 !=0){
                     // angular.forEach($scope.drawings, function(item3) {
                     //     if (item3.age >= $scope.selected_age1 && item3.age <= $scope.selected_age2 && $scope.selected_age2 != 'above') {
                     //        filtered.push(item3); 
                     //     }
                     //     if (item3.age >= $scope.selected_age1 && $scope.selected_age2 == 'above') {
                     //        filtered.push(item3);
                     //     }
                     // });
                     // $scope.drawings = filtered;
                     $scope.searcherAge.ageMin = $scope.selected_age1;
                     $scope.searcherAge.ageMax = $scope.selected_age2;
                 }



             }
             $scope.themesearch = function(id,val) {
                 $scope.totalDisplayed = $scope.defaultload;
                 $scope.selected_theme = id;

                 // var filtered = [];
                 // // reset drawing array
                 // $scope.listdrawings();
                 
                 // angular.forEach($scope.drawings, function(item) {
                 //     if (item.theme_id == id) {
                 //         filtered.push(item);
                 //     }
                 // });
                 // $scope.drawings = filtered;
                 
                 var btext = "Theme :"+val; 
                 dobreadcrumb(btext,'theme');
                 $scope.andOperateSearch();
             }
             $scope.countrysearch = function(id,val) {
                $scope.selected_country = id;
                 // var filtered = [];
                 // $scope.listdrawings();
                 // angular.forEach($scope.drawings, function(item) {
                 //     if (item.country == id) {
                 //         // if ($scope.selected_theme != 0 && $scope.selected_theme == item.theme_id) {
                 //         //     filtered.push(item);
                 //         // }
                 //         // if ($scope.selected_theme == 0) {
                 //         //     filtered.push(item);
                 //         // }
                 //         filtered.push(item);
                 //     }
                 // });
                 // $scope.drawings = filtered;

                 if($.type(val) == 'object'){ 

                    val = $('#countryselection').find('option[value="'+id+'"]').text();
                    
                 }
                 var btext = "Country :"+val;

                 if(val == 'Choose country'){
                    btext = "-";
                 }
                 
                 dobreadcrumb(btext,'country');
                 $scope.andOperateSearch();
             }
             $scope.agesearch = function(min, max) {
                    $scope.selected_age1 = min;
                    $scope.selected_age2 = max;
                //  var filtered = [];

                //  $scope.listdrawings();
                //  angular.forEach($scope.drawings, function(item) {
                //      if (item.age >= min && item.age <= max && max != 'above') {
                //          // if ($scope.selected_theme != 0 && $scope.selected_theme == item.theme_id) {
                //          //     filtered.push(item);

                //          // }
                //          // if ($scope.selected_theme == 0) {
                //          //     filtered.push(item);
                //          // }
                //          filtered.push(item);

                //      }
                //      if (item.age >= min && max == 'above') {

                //          // if ($scope.selected_theme != 0 && $scope.selected_theme == item.theme_id) {
                //          //     filtered.push(item);
                //          // }
                //          // if ($scope.selected_theme == 0) {
                //          //     filtered.push(item);
                //          // }
                //          filtered.push(item);
                //      }
                //  });
                // // console.log("Before search age");

                //  $scope.drawings = filtered;
                //  // console.log($scope.drawings);
                 var btext = "Age :"+min +"-"+max;
                 dobreadcrumb(btext,'age');
                 $scope.andOperateSearch();
             }
             $scope.iframeurl = function(url) {
                 return $sce.trustAsResourceUrl(url);
             }

             $scope.onDoSponsor = function(did) {
                 $.post('get_pixels.php?step=6', {
                     drawing_id: did
                 }, function(response) {
                     // console.log(response);
                     window.location = response;
                 });
             }
             $scope.onSkipSponsor = function() {
                 $.post('get_pixels.php?step=6', {
                     drawing_id: 'skip'
                 }, function(response) {
                     // console.log(response);
                     window.location = response;
                 });
             }




         }
     };
 });
 md.directive("themescontroller", function() {
     return {
         restrict: 'E',
         templateUrl: "angular_includes/js/themes.html",
         controller: function($scope,$http) {

             $scope.themes = [{
                 "id": "1",
                 "name": "Nature",
                 "description": "test"
             }, {
                 "id": "2",
                 "name": "Logo",
                 "description": "tetstt"
             }];

             $scope.currentOpen  ='';
             
             $scope.setthemeopen = function(categoryid){
                $scope.currentOpen  =categoryid;
               
             }
             $scope.opentheme = function(categoryid){
               if($scope.currentOpen == categoryid){
                  return true;
               }
               return false;
             }
             $http.get('ajax_themes_list.php').then(function(response) {
                 $scope.themes = response.data; 
             });
             $scope.setTheme = function(themeid, desc) {
                 $('.well').show();
                 $('#themeDescWindow').html(desc);
             }

         }
     };
 });