$(document).ready(function() {
    core.init.tablesorter($('table.tablesorter'));
//    core.init.ckeditor($('textarea#editor'),'editor');
});

jQuery.fn.exists = function(){
    return jQuery(this).length>0;
}

/**
 *
 *
 */
var core = {
    init : {
        tablesorter: function(obj) {
            if(obj.exists())
            {
                /* call the tablesorter plugin
                for all tables with the tablesorter class */
                $(obj).tablesorter({
                    widthFixed: true,
                    widgets: ['zebra'],
                    headers: {
                        // show column
                        5: {
                            sorter:false
                        },
                        // edit column
                        6: {
                            sorter:false
                        },
                        // delete column
                        7: {
                            sorter:false
                        }
                    }
                });
                // init the tablepager
                $(obj).tablesorterPager({
                    container: $('#pager')
                });
            }
        },
        ckeditor: function(obj,element) {
            /* init ckeditor if a textarea is found on the page
            which has the content of the element var as a id */
            if(obj.exists())
            {
                CKEDITOR.replace(element);
            }
        }
    },
    ajax : {
        request : function() {
            
        },
        initFancyBox : function(id,controller,action, title) {

            $.fancybox.showActivity();

            var path = '';

            if(controller != undefined)
                path = controller+'/';
            if(action != undefined)
                path += action+'/';
            if(id != undefined)
                path += id+'';

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
                            $('#fancybox-title').css({
                                'top':'0px',
                                'bottom':'auto'
                            });
                        }
                    });

                        ajaxForm: function() {
                            $('form#edit').ajaxForm(function() {});
                        }
                }
            });
        }
    },
    http : {
        redirect : function(controller, action, id)
        {
            this.location = '';
            if(typeof controller != undefined)
            {
                this.location += controller;
                if(typeof action != undefined)
                    this.location += '/'+action;
                if(typeof id != undefined)
                    this.location+= '/'+id;
                window.location.href = this.location;
            }
        }
    }
}




