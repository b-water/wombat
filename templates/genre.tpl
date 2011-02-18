<select name="genre" id="genre" class="genre">
    {foreach item=item from=$genre}
        {if $item.name == $movie.format}
            <option selected="selected">{$item.name}</option>
        {else}
            <option>{$item.name}</option>
        {/if}
    {/foreach}
</select>