
 $(document).ready(function() {
    var test = $('#phpVar').val();
    Morris.Bar({
        element: 'morris2',
        data: JSON.parse(test),
        xkey: 'Date',
        ykeys: ['totalCOunt'],
        labels: ['Booking Count'],
        barRatio: 0.4,
        xLabelAngle: 0,
        hideHover: 'auto',
        barColors: ['#03A9F3'],
        resize: true
    });	

});




