jQuery(document).on('ready', function($) {
    "use strict";
    // year
    $("#year").text((new Date).getFullYear());
    getpackage(1);

    $('.maincat').click(function(e){ 
     	e.preventDefault();
     	var catid = $(this).data('id');
     	var catname = $(this).attr('data-name');
     	$(".vehicle-list").removeClass("vehicle-list-active");
     	$(".vlborder_"+catid).addClass("vehicle-list-active");
     	$("#servicecategory").val(catid);
     	$("#catname").html(catname);
     	$("#servicecategoryid").val(catid);
     	$("#servicecategoryname").val(catname);
     	$("label#servicecategory-error").hide();
        getpackage(catid);
	});

	function getpackage(catid) {
		$.ajax({
		    url: 'frontend/package',
		    type: 'post',
		    dataType: 'json',
		    data: {p_vt_id: catid},
		    success: function(response){ 
		        if(response!=0) {
		      	    $('#totalcst').html('Yet to Choose..');
		      	    $(".package-list").html('');
					$.each(response, function(key,value) {
							$(".package-list").append('<div class="col-lg-3 col-md-6"><div class="frontend-package-list"><h5>'+value.p_name+'</h5><div class="frontend-package-price"><span class="frontend-package-price-currency">$</span><span class="frontend-package-price-unit">'+value.p_price+'</span></div><div><hr><h6><i class="mdi mdi-clock-outline mdi-24px frontend-package-time"></i> '+value.p_time+' min</h6><hr></div><ul class="frontend-package-services">'+value.service_list_text+'</ul><div><a onclick="assignpackageprice('+value.p_price+','+value.p_id+')" class="pkbtn"><input id="" value="'+value.p_price+'"  class="datecheckbox pkprice" type="checkbox"><label for="frontend-package-btn"   class="btn d-block btn-success p_'+value.p_id+'">Select</label></a></div></div></div>');
					});
		        } else {
		      	  $(".package-list").html('No service list found..');
		        }
		    }
		});
	}
}(jQuery)); // End jQuery

	function assignpackageprice(p,pid) {
      $('.pckageprice').val(p);
      $('#pckageid').val(pid);
      $('.pkbtn label.btn-success').removeClass('theme-btn-default');
      $('.p_'+pid).toggleClass('theme-btn-default');
      calculateCost();
    }



     $('.datecheckbox').on('change', function() {
    	$('.datecheckbox').not(this).prop('checked', false);  
	 });
     $('.datecheckbox').on('click', function() {
     	if(this.checked) {
    		$("#appointmenttime").html($(this).attr('data-time'));
    		$("#appointmentdate").html($(this).attr('data-date'));
    	}
     });
   
     function calculateCost() {
	  var sum = 0;
	  var gn, elem;
	  

	  sum = Number($('.pckageprice').val()); 


	  $('.service_listdatacheck:checked').each(function(){
	     sum += Number($(this).attr('data-curr')); 
	  });

	 if(sum==0) {
	 	$('#totalcst').html('<i class="mdi mdi-currency-inr f-size-100-per">0</i>');
	 } else {
	 	$('#totalcst').html('<i class="mdi mdi-currency-inr f-size-100-per">'+sum.toFixed(2)+'</i>');
	 	$("#bk_amt").val(sum.toFixed(2));
	 }
	}
    
     $('#pgmethod').on('change', function() { 
     	selval = $(this).val();
     	if(selval=='bank transfer') {
     		$.ajax({
			    url: 'frontend/bankdetails',
			    type: 'post',
			    dataType: 'html',
			    success: function(response){ 
			      if(response!=0) {
			      	$('#bankdetails').html(response);
			      } else {
			      	$("#bankdetailst").html('Bank details not found..');
			      }
			  
			    }
			  });
     	} else {
     		$('#bankdetails').html('');
     	}
     });

 