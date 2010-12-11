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
            <tr id="{$item.id}" onclick="fancyAjaxLoader('{$item.id}','movie','show','Detailansicht');">
                <td class="name">{$item.name}</td>
                <td class="genre">{$item.genre}</td>
                <td class="rating">{$item.rating}</td>
                <td class="format">{$item.format}</td>
                <td class="date">{$item.date}</td>
                <td class="edit" onclick="fancyAjaxLoader('{$item.id}','movie','editShow','Bearbeiten');"><img src="images/pencil.png" alt="edit" /></td>
                <td class="delete" onclick="fancyAjaxLoader('{$item.id}','movie','delete','Löschen');"><img src="images/delete.png" alt="delete" /></td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
