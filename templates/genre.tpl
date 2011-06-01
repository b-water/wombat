<select name="genre" id="genre" class="genre">
    {foreach item=item from=$genre}
        {if $item.id == $movie.genre}
            <option value="{$item.id}" selected="selected">{$item.name}</option>
        {else}
            <option value="{$item.id}">{$item.name}</option>
        {/if}
    {/foreach}
</select>