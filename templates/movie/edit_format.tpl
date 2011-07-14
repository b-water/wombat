<select name="format" id="format" class="format">
    {foreach item=item from=$format}
        {if $item->getName() == $movie->getFormat()}
            <option value="{$item->getId()}" selected="selected">{$item->getName()}</option>
        {else}
            <option value="{$item->getId()}">{$item->getName()}</option>
        {/if}
    {/foreach}
</select>