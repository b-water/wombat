<select name="rating" id="rating" class="rating">
    {foreach item=item from=$rating}
        {if $item.name == $movie.rating}
            <option selected="selected">{$item.name}</option>
        {else}
            <option>{$item.name}</option>
        {/if}
    {/foreach}
</select>