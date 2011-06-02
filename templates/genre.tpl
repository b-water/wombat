<select name="genre[]" id="genre" class="genre" size="5" multiple>
    {foreach item=item from=$genre}
        {if $item.name == $movie.genre}
            <option value="{$item.id}" selected="selected">{$item.name}</option>
        {else}
            <option value="{$item.id}">{$item.name}</option>
        {/if}
    {/foreach}
</select>