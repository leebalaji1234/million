var entrantSessionAge = '';

function ajaxCallToCreateAge(inputVal){ 
    $.ajax({
    url: "ajax_age.php",
    method:'POST',
    data: {"dob":inputVal},
    success: function(resData) {
    	resData = JSON.parse(resData); 
    	if(resData != undefined && resData.currentage != undefined && resData.currentage !=''){
    		if(resData.currentage < 13){
    			entrantSessionAge = resData.currentage;

    			$('.parent_placeholder').show();
    		}else{
    			$('.parent_placeholder').hide();
    			entrantSessionAge = '';
    		}
    	}
    }
   });
}

function onProofSelection(){
	var chekCond = $('#proof').prop('checked');
	 if(chekCond === true){
        $('.proof_placeholder').show();
     }else{
        $('.proof_placeholder').hide();
     }
}
function CaptchaRefresh(){
  $.get('captcha.php',function(response){
    $('#captcha').prop('src',response);
  });
}
function countrySelect(id){
    $.post('ajax_geo.php',{'country':id},function(response){
        objVal = JSON.parse(response);
        conTxt = '<option value="">Select State</option>';
        $('#state').html(''); 
         
        $.each(objVal,function(i,v){
           
            conTxt += '<option value='+v.id+'>'+v.name+'</option>';  
          
              
        });
        $('#state').append(conTxt);
    });
}
function stateSelect(id){
  id = parseInt(id);
    $.post('ajax_geo.php',{'state':id},function(response){
        objVal = JSON.parse(response);
        conTxt = '<option value="">Select City</option>';
        conTxt += '<option value="addnew">Add city</option>';
        $('#city').html('');
         // alert(id+"======called jerere");
        $.each(objVal,function(i,v){
           
            conTxt += '<option value='+v.id+'>'+v.name+'</option>';  
              
        });
        $('#city').append(conTxt);
    });
}
 
function citySelect(id){
   $('#citymanualoption').html('');
  if(id == 'addnew'){
    $('#citymanualoption').html('<input type="text" name="manualcity" class="form-control" placeholder="Enter city" />');
  }else{
    $('#citymanualoption').html('');
  }
  return true;
}
function getVolunteercode(email){
    $.post('ajax_code.php',{'email':email},function(response){
        alert(response);
    });
}
 

 function getToggle(obj){
   if($(obj).find('i').attr('class') == 'fa fa-caret-right'){
      $(obj).find('i').removeClass('fa-caret-right');
      $(obj).find('i').addClass('fa-caret-down');
      $(obj).parent().parent().find('.hastheme1').show();
      
   }else{
      $(obj).find('i').addClass('fa-caret-right');
      $(obj).find('i').removeClass('fa-caret-down');
      $(obj).parent().parent().find('.hastheme1').hide();
   }
 }

 function dobreadcrumb(val,type){ 
    $('#breadcrumb').show();
   $('.'+type+"_all").show();
   
   $('.'+type).html(val);
 }

function ownThemeOptionEnabler(){
  if($('#own_theme').prop('checked') == true ){
    $('.theme_options').slideDown();
  }else{
    $('.theme_options').slideUp();
  }
}
  // $(document).ready(function() {
  //     $('#tweecool').tweecool({
  //       //settings
  //        username : 'gvprakash',
  //        limit : 5
  //     });
  // });
   
$(document).ready(function() { 

 $('.trimtext').each(function(){
    var str = $(this).text();
    var obfuscated = str.substring(0, 16);
    $(this).text(obfuscated+'...');
 });

  //$('.toolinfo').hide();
  $('.pixelboard').mouseover(function() {
    // alert("testtt");
    //$('.toolinfo').show();
  });
  // var getCountry = $('#country').val();
  // if(getCountry != ''){
  //   countrySelect($('#country').val());
  // }
//     alert("tetst");     
// $(".mentioncaption").click(function() {   
// alert("tetst");           
//          $(".mentioncaption").addClass('fa-6x');        
//     }); 
//     $(".mentioncaption").mouseenter(function() {              
//          $(".mentioncaption").addClass('fa-6x');        
//     }).mouseleave(function () {     
//         $(".mentioncaption").removeClass('fa-6x');  
//     });

var a=0; 
 $('#picture').bind('change', function() {
   
if ($('input:submit').attr('disabled',false)) {$('input:submit').attr('disabled',true);}  
var ext = $('#picture').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    { $('#pic_error1').slideDown("slow"); $('#pic_error2').slideUp("slow"); a=0;} else { 
    var picsize = (this.files[0].size);
    if (picsize > 2000000)
    { $('#pic_error2').slideDown("slow"); a=0;} else { a=1; $('#pic_error2').slideUp("slow"); }
$('#pic_error1').slideUp("slow");
if (a==1) {$('input:submit').attr('disabled',false);}
}
});
});

$(window).load(function() {
  $("#sectionstep1").submit();
});
