function pagerSubmit(page,menu)
{
    $.ajax({
        url: 'index.php?menu='+menu+'&page='+page+'&ajax=true',
        type: 'POST',
        success: function(data) {
            $('div#movies').html(data);
        }
    });
}/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


