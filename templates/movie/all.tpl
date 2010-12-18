<div id="movies">
    <table id="movies" class="tablesorter">
        <thead>
            <tr>
                <th class="name">Name</th>
                <th class="genre">Genre</th>
                <th class="rating">Bewertung</th>
                <th class="format">Format</th>
                <th class="date">angelegt am</th>
                <th class="edit"></th>
                <th class="delete"></th>
            </tr>
        </thead>
        <tbody>
            {foreach item=item from=$movie}
            <tr id="{$item.id}">
                <td class="name" onclick="fancyAjaxLoader('{$item.id}','movie','show','Detailansicht');">{$item.name}</td>
                <td class="genre" onclick="fancyAjaxLoader('{$item.id}','movie','show','Detailansicht');">{$item.genre}</td>
                <td class="rating"  onclick="fancyAjaxLoader('{$item.id}','movie','show','Detailansicht');">{$item.rating}</td>
                <td class="format"  onclick="fancyAjaxLoader('{$item.id}','movie','show','Detailansicht');">{$item.format}</td>
                <td class="date">{$item.date}</td>
                <td class="edit" onclick="fancyAjaxLoader('{$item.id}','movie','edit','Bearbeiten');"><img src="images/pencil.png" alt="edit" title="Bearbeiten" /></td>
                <td class="delete" onclick="fancyAjaxLoader('{$item.id}','movie','delete','Löschen');"><img src="images/bin_closed.png" alt="delete" title="L&ouml;schen" /></td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
