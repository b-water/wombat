<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="date">Datum</th>
            <th class="show"></th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
    </thead>
    <tbody>
        {foreach item=item from=$movie}
        <tr id="{$item.id}">
            <td class="name">{$item.name}</td>
            <td class="genre">{$item.genre}</td>
            <td class="rating">{$item.rating}</td>
            <td class="format">{$item.format}</td>
            <td class="date">{$item.date}</td>
            <td class="show"><a class="show" title="Trailer" href="movie/show/id/{$item.id}/"></a></td>
            <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/id/{$item.id}/"></a></td>
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/delete/id/{$item.id}/"></a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
