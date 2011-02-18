$(document).ready(function() {
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
});

function fancyAjaxLoader(id,controller,action,title) {

    $.fancybox.showActivity();

    var path = '';
    
    if(controller != undefined)
    {
        path = controller+'/';
    }
    if(action != undefined)
    {
        path += action+'/';
    }
    if(id != undefined)
    {
        path += id+'';
    }

    $.ajax({
        type : 'POST',
        cache : false,
        url : path,
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
            tinyMCE.init({
                mode : "textareas",
                theme : "simple"
            });

            $('form#edit').ajaxForm(function() {

            });
        }
    });
    

}

function ajaxFormSubmit(id,controller,action) {
    
    $.ajax({
        type : 'POST',
        cache : false,
        url : 'bootstrap.php?controller='+controller+'&action='+action+'&id='+id+'',
        data : $(this).serializeArray(),
        success: function(data) {
            
        }
    });
}
