
/**
 * wombat
 * 
 * LICENCE
 * 
 * This work is licensed under the Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-nd/3.0/ or send a letter to Creative Commons, 
 * 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 * 
 * @name wombat
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @since 01.04.2010
 * @version 0.1
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */

$(document).ready(function() {
    core.init.tablesorter($('table.tablesorter'));
    core.init.form($('form#edit'));
    core.init.tooltip($('a'));
    core.init.autoComplete($('#autoCompleteGenre'));
    core.init.genreDelete($('span.genre'));
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
                    
                    setTimeout(function(){
//                        core.http.redirectToUrl(window.location.pathname);
                    }, 2000);
                    
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
        },
        autoComplete: function(obj)
        {
            obj.autocomplete("movie/autoCompleteGenre/", {
                width: 260,
                selectFirst: false
            });

            obj.result(function(event, data) {
                $('div#associatedGenres').append('<span class="genre"><input type="hidden" name="genre[]" value="'+data[1]+'" /><span class="text">'+data[0]+'</span><span class="delete">L&ouml;schen</span></span>');
                obj.val('');
            });
        },
        contextMenu : function(obj) {
            $(obj).contextMenu({
                menu: 'myMenu'
            },
            function(action, el) {
                if(action == 'delete')
                {
                    $(obj).each(function(){

                        $('option', this).each(function() {
                            if($(this).attr('value') == el.attr('value')) {
                                $(this).remove();
                            }
                        })
                    });
                }
                if(action == 'add') {
            
            }
            });
        },
        genreDelete : function(obj) {
            if(obj.exists()) {
                $('span.genre').each(function(index) {
                    console.log(index + ': ' + $(this).text());
                    $(this).click(function() {
                        $(this).fadeOut("normal", function(){
                            $(this).remove();  
                        });
                    });
                });
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
        redirectToUrl : function(url)
        {
            window.location.href = url;
        }
    }

}




