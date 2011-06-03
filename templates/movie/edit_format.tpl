<select name="format" id="format" class="format">
    {foreach item=item from=$format}
        {if $item.name == $movie.format}
            <option value="{$item.id}" selected="selected">{$item.name}</option>
        {else}
            <option value="{$item.id}">{$item.name}</option>
        {/if}
    {/foreach}
</select>