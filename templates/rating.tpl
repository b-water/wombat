<select name="rating" id="rating" class="rating">
    {foreach item=item from=$rating}
        {if $item.name == $movie.rating}
            <option value="{$item.id}" selected="selected">{$item.name}</option>
        {else}
            <option value="{$item.id}">{$item.name}</option>
        {/if}
    {/foreach}
</select>