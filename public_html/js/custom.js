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
function countrySelect(id){
    $.post('ajax_geo.php',{'country':id},function(response){
        objVal = JSON.parse(response);
        conTxt = '';
        $('#state').html('<option value="">Select State</option>');
        $('#city').html('<option value="">Select City</option>');
        $.each(objVal,function(i,v){
          conTxt += '<option value='+v.id+'>'+v.name+'</option>';    
        });
        $('#state').append(conTxt);
    });
}
function stateSelect(id){
    $.post('ajax_geo.php',{'state':id},function(response){
        objVal = JSON.parse(response);
        conTxt = '<option value="">Select City</option>';
        $('#city').html('');
        $.each(objVal,function(i,v){
          conTxt += '<option value='+v.id+'>'+v.name+'</option>';    
        });
        $('#city').append(conTxt);
    });
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
  $('.toolinfo').hide();
  $('.pixelboard').mouseover(function() {
    // alert("testtt");
    $('.toolinfo').show();
  });
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
});