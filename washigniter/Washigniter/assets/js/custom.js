$(document).ready(function() {

        //tooltip
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Initialize Popovers
        jQuery('[data-toggle="popover"], .js-popover').popover({
            container: 'body',
            animation: true,
            trigger: 'hover'
        });
            
    });

   
$('.bookingstatuschge').on('change', function(){
                window.location = $(this).val();
            });
			
$('#oos_srtdate,#reportdate').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD hh:mm A'
      }
    });
	$(function () {
    $('.printPage').click(function () {
         var divToPrint=document.getElementById("example");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
    });
});

$('.logodelete').on('click', function(){
   $.ajax({
    url: 'logodelete',
    type: 'post',
    dataType: 'json',
    data: '',
    success: function(response){ 
      location.reload();
    }
  });
 });
 