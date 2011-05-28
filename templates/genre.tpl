<select name="genre" id="genre" class="genre">
    {foreach item=item from=$genre}
        {if $item.name == $movie.genre}
            <option selected="selected">{$item.name}</option>
        {else}
            <option value="{$item.name}">{$item.name}</option>
        {/if}
    {/foreach}
</select>