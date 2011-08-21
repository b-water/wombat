<div class="page-header">
    <h1>Film <small>Übersicht</small></h1>
</div>
<table id="movies" class="common-table zebra-striped">
    <thead>
        <tr>
            <th class="blue title">Titel</th>
            <th class="yellow genre">Genre</th>
            <th class="green rating">Bewertung</th>
            <th class="red format">Format</th>
            <th></th>
            <th></th>
            <th></th>
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
                <td class="delete"><a class="delete fancydelete" title="L&ouml;schen" href="movie/delete/confirm/id/{$item->getId()}/"></a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
