<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Titel</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="show"></th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
    </thead>
    <tbody>
        {foreach item=item from=$movies}
        <tr id="{$item->getId()}">
            <td class="name">{$item->getTitle()}</td>
           <td class="genre">
           {if $item->getGenre()}
                {foreach item=genreItem from=$item->getGenre()}
                    <span class="overview-genre">{$genreItem->getName()}</span>
                {/foreach}
            {else}
                -
            {/if}
            </td>
            <td class="rating">
            {if $item->getRating() != ''}
                {$item->getRating()}
            {else}
                -
            {/if}
            </td>
            <td class="format">
            {if $item->getFormat() != ''}
                {$item->getFormat()}
            {else}
                -
            {/if}
            </td>
            <td class="show"><a class="show" title="Anzeige" href="movie/show/single/id/{$item->getId()}/"></a></td>
            <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/single/id/{$item->getId()}/"></a></td>
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/edit/delete/id/{$item->getId()}/"></a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
