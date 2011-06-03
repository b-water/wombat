<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="show"></th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
    </thead>
    <tbody>
        {foreach item=item from=$movie}
        <tr id="{$item.id}">
            <td class="name">{$item.name}</td>
<!--            <td class="genre">
            {if $item.genre != ''}
                {$item.genre}
            {else}
                -
            {/if}
            </td>-->
            <td class="genre">
            {if $item.genre}
                {foreach item=genre_item from=$item.genre}
                    <span class="overview-genre">{$genre_item.genre}</span>
                {/foreach}
            {else}
                -
            {/if}
             </td>
            <td class="rating">
            {if $item.rating != ''}
                {$item.rating}
            {else}
                -
            {/if}
            </td>
            <td class="format">
            {if $item.format != ''}
                {$item.format}
            {else}
                -
            {/if}
            </td>
            <td class="show"><a class="show" title="Anzeige" href="movie/show/id/{$item.id}/"></a></td>
            <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/id/{$item.id}/"></a></td>
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/delete/id/{$item.id}/"></a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
