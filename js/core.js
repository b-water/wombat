$(document).ready(function() {
    core.init.tablesorter($('table.tablesorter'));
    core.init.form($('form#edit'));
    core.init.tooltip($('a'));
    
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
        form : function(obj)
        {
            if(obj.exists())
            {
                showResponse = function() {
                    $('.notice').show();
                    $('.notice').animate({
                        opacity: 1.0
                    }, 1000).fadeOut('fast', function() {
                        $(this).hide();
                    });
                }

                var options = {
                    success: showResponse
                };

                // bind 'myForm' and provide a simple callback function 
                obj.ajaxForm(options);  
            }

        },
        tooltip : function(obj)
        {
            obj.each(function() {
                var attr = $(this).attr('title');
                // For some browsers, `attr` is undefined; for others,
                // `attr` is false.  Check for both.
                if (typeof attr !== 'undefined' && attr !== false) {
                    $(this).tipTip();
                }

            });
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




