<ul id="myMenu" class="contextMenu">
    <li class="add">
        <a href="#add">Hinzufügen</a>
    </li>
    <li class="delete separator">
        <a href="#delete">Löschen</a>
    </li>
</ul>
<a class="addGenre" style="display:none;" href="movie/addGenre/"></a>
<select name="genre[]" id="genre" class="genre" size="5" multiple>
    {foreach item=item from=$genre}
        {foreach item=genre_item from=$movie.genre}
            {if $item.name == $genre_item.genre}
                    <option value="{$item.id}" selected="selected">{$item.name}</option>
            {/if}
        {/foreach}
    {/foreach}
</select>
