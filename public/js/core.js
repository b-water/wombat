
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

/**
 * Extend jQuery Scope with an
 * isset like php Function.
 **/

jQuery.fn.exists = function(){
    return jQuery(this).length>0;
}

$(document).ready(function() {
    
    var defaultDialogConf = {
        modal : true,
        width:600,
        height:800,
        draggable:false,
        resizable:false
    }
    
    $('#movie-edit a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
    
    //    bindUIDialog($('a#add'),'Hinzufügen',defaultDialogConf);
    core.init.form($('form#edit'));
    //    core.init.tooltip($('a'));
    //    core.init.fancybox($('.fancybox'));
    //genre init
    core.genre.autocomplete($('#genre'),'genre/autocomplete/',$('div#assocGenres'));
    core.genre.tokenDelete($('span.genre'));
    //table init
    //    core.table.addEven($('table tr:even'));
    //    core.table.addFancyDelete($('a.fancydelete'));
    //    core.table.sort($('table'));
    //    $('#file').customFileInput({
    //        button_position : 'right',
    //        feedback_text : 'Keine Datei ausgewählt!',
    //        button_text : 'Durchsuchen',
    //        button_change_text : 'Durchsuchen'
    //    });
    //jquery plugins
    //    $('table#movies').tablesorter();
    //    $('.nav-config').click(function(evt) {
    //        evt.preventDefault();
    //        $('.dropdown-config').toggle('slow',function() {});
    //    });
    //    
    $('.tip').popover();
//    if($('table.tablesorter').exists()) {
//        $('table.tablesorter').tablesorter({
//            sortList: [[0,0]],
//            headers: {
//                4: {
//                    sorter:false
//                },
//                5: {
//                    sorter:false
//                },
//                6: {
//                    sorter:false
//                }  
//            }
//        });
//    }
    
//    $('#genre').autocomplete({
//        source: src,
//        minLength: 1,
//        select: function(event, ui) {
//            appObj.append('<span class="genre"><input type="hidden" name="genre[]" value="'+ui.item.value+'" /><span class="text">'+ui.item.label+'</span><span class="delete">L&ouml;schen</span></span>');
//        },
//        close : function() {
//            obj.val('');
//            core.genre.tokenDelete($('span.genre'));
//        }
//    });
    
});

function bindUIDialog(obj,title,conf) {
    if(obj.exists()) {
        if(title.length > 0) {
            var dialogHTML = '<div title="'+title+'"></div>';
        } else {
            var dialogHTML = '<div></div>';
        }
        obj.on('click',function(event) {
            showUIDialogProgress();
            event.preventDefault();
            var dialog = $(dialogHTML).appendTo('body');
            $.ajax({
                url: $(this).attr('href'),
                success : function(data) {
                    dialog.append(data);
                    hideUIDialogProgress();
                    dialog.dialog(conf); 
                }
            });
        });
    }
}

function showUIDialogProgress() {
    $('div#progress').fadeIn('slow');
}

function hideUIDialogProgress() {
    $('div#progress').fadeOut('slow');
}


/**
 * 
 */
var core = {
    init : {
        form : function(obj)
        {
            if(obj.exists())
            {
                showResponse = function() {
                    $('.notice').show();
                            
                //                    setTimeout(function(){
                //                        core.http.redirectToUrl(window.location.pathname);
                //                    }, 2000);
                }
                var options = {
                    success: showResponse
                };
        
                obj.ajaxForm(options);  
            }
        
        },
        tooltip : function(obj)
        {
            obj.each(function() {
                var attr = $(this).attr('title');
                // For some browsers, `attr` is undefined; for others,
                // attr is false.  Check for both.
                if (typeof attr !== 'undefined' && attr !== false) {
                    $(this).tipTip();
                }
        
            });
        },
        fancybox : function(obj) {
            obj.fancybox();
        }
    },
    ajax : {
        modal : function(obj, src) {
            
        },
        request : function() {
        
        },
        ajaxForm: function() {
            $('form#edit').ajaxForm(function() {});
        }
    },
    http : {
        redirectToUrl : function(url)
        {
            window.location.href = url;
        }
    },
    table : {
        addEven : function(obj)
        {
            if(obj.exists())
            {
                obj.addClass('even');
        
            }
        },
        addFancyDelete : function(obj)
        {
            if(obj.exists())
            {
                obj.fancybox({
                    'onClosed' : function() {
                        core.http.redirectToUrl(location.href);
                    }
                });
        
            }
        },
        sort : function(obj)
        {
            if(obj.exists())
            {
                obj.tablesorter( {
                    sortList: [[0,0]],
                    headers: {
                        4: {
                            sorter:false
                        },
                        5: {
                            sorter:false
                        },
                        6: {
                            sorter:false
                        }  
                    }
                });
            }
        }
    },
    genre : {
        autocomplete : function (obj,src,appObj)
        {
            if(obj.exists())
            {
                obj.autocomplete({
                    source: src,
                    minLength: 1,
                    select: function(event, ui) {
                        appObj.prepend('<span class="badge badge-success genre label"><input type="hidden" name="genre[]" value="'+ui.item.value+'" /><span class="text">'+ui.item.label+'</span><i class="icon-remove icon-white"></i></span>');
                    },
                    close : function() {
                        obj.val('');
                        core.genre.tokenDelete($('span.genre'));
                    }
                });
            }
        
        },
        tokenDelete : function(obj) {
            if(obj.exists()) {
                obj.each(function(index) {
                    $(this).click(function() {
                        $(this).fadeOut("normal", function(){
                            $(this).remove();
                        });
                    });
                });
            }
        }
    }
}
        




