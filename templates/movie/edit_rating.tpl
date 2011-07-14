<select name="rating" id="rating" class="rating">
    {foreach item=item from=$rating}
        {if $item->getName() == $movie->getRating()}
            <option value="{$item->getId()}" selected="selected">{$item->getName()}</option>
        {else}
            <option value="{$item->getId()}">{$item->getName()}</option>
        {/if}
    {/foreach}
</select>