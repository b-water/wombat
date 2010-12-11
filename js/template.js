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

    $('.auto-submit-star').rating({
        select: 5,
        readOnly: true,
        callback: function(value, link){
            alert(value);
        }
    });

});

function fancyAjaxLoader(id,controller,action,title) {
    $.fancybox.showActivity();
    $.ajax({
        type : 'POST',
        cache : false,
        url : 'index.php?controller='+controller+'&action='+action+'&id='+id+'',
        data : $(this).serializeArray(),
        success: function(data) {
            $.fancybox({
                content: data,
                title: title,
                scrolling: 'no',
                onComplete: function() {
                    $("#fancybox-title").css({
                        'top':'0px',
                        'bottom':'auto'
                    });
                }
            });
        }
    });

}
