$(document).ready(function() {

    if($('table').length > 0)
    {
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
                },
                7: {
                    sorter:false
                }
            }
        });

        // init the tablepager
        $('table.tablesorter').tablesorterPager({
            container: $('#pager')
        });
    }

    // init ckeditor if a textarea is found on the page
    if($('textarea#editor').length > 0)
    {
        CKEDITOR.replace( 'editor');
    }
});

//function fancyAjaxLoader(id,controller,action,title) {
//
//    $.fancybox.showActivity();
//
//    var path = '';
//
//    if(controller != undefined)
//        path = controller+'/';
//    if(action != undefined)
//        path += action+'/';
//    if(id != undefined)
//        path += id+'';
//
//    $.ajax({
//        type : 'POST',
//        cache : false,
//        url : path,
//        data : $(this).serializeArray(),
//        success: function(data) {
//            $.fancybox({
//                content: data,
//                title: title,
//                scrolling: 'no',
//                onComplete: function() {
//                    $('#fancybox-title').css({
//                        'top':'0px',
//                        'bottom':'auto'
//                    });
//                }
//            });
//            tinyMCE.init({
//                mode : 'textareas',
//                theme : 'simple'
//            });
//
//            $('form#edit').ajaxForm(function() {
//                });
//        }
//    });
//
//
//}
//
//function changeLocation(controller, action, id)
//{
//    var href = '';
//    if(controller != undefined)
//    {
//        href += controller;
//        if(action != undefined)
//            href += '/'+action;
//        if(id != undefined)
//            href+= '/'+id;
//
//        window.location.href = href;
//    }
//}
