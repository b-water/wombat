$(document).ready(function() {
    //        $('input.label').labelify();

    // call the tablesorter plugin
    $('table.tablesorter').tablesorter({
        widthFixed: true,
        widgets: ['zebra'],
        headers: {
            5: {
                sorter:false
            },
            6: {
                sorter:false
            }
        }
    });

    $('table.tablesorter').tablesorterPager({
        container: $('#pager')
    });

    $("label").inFieldLabels();

});

function fancyAjaxLoader(id,controller,action) {
    $.fancybox.showActivity();
    $.ajax({
        type : 'POST',
        cache : false,
        url : 'index.php?controller='+controller+'&action='+action+'&id='+id+'',
        data : $(this).serializeArray(),
        success: function(data) {
            $.fancybox(data);
        }
    });

}
