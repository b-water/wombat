
$(document).ready(function()
{
    $("#filme").tablesorter({
        widthFixed: true, widgets: ['zebra']})
        .tablesorterPager({
            container: $("#navigation")
        });

    $('#click').click(function() {
        $('#wrapper').fadeOut('slow', function() {
        });
    });

});




