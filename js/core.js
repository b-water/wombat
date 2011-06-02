$(document).ready(function() {
    core.init.tablesorter($('table.tablesorter'));
    core.init.form($('form#edit'));
    core.init.tooltip($('a'));
    
    if($('form#edit input.abort').exists())
    {
        $('form#edit input.abort').click(function() {
            core.http.redirectToUrl('movie/'); 
        });
    }
    
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
//                    $('.notice').animate({
//                        opacity: 1.0
//                    }, 1000).fadeOut('fast', function() {
////                        $(this).hide();
//                    });
                    
//                    setTimeout(function(){
//                        core.http.redirectToUrl(window.location.pathname);
//                    }, 2000);
                    
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
        redirect : function(controller, action, key, value)
        {
            this.location = '';
            if(controller.length < 0)
            {
                this.location += controller;
                if(action.length < 0)
                    this.location += '/'+action;
                if(id.length < 0)
                    this.location+= '/'+id;
                window.location.href = this.location;
            }
        },
        redirectToUrl : function(url)
        {
            window.location.href = url;
        }
    },
    select : {

    }
}




