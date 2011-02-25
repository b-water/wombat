<select name="format" id="format" class="format">
    {foreach item=item from=$format}
        {if $item.name == $movie.format}
            <option selected="selected">{$item.name}</option>
        {else}
            <option value="{$item.name}">{$item.name}</option>
        {/if}
    {/foreach}
</select>