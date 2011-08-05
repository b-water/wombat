<label>Genre</label>
<input type="text" name="autocompleteGenre" id="autocompleteGenre"/>
<div id="associatedGenres">
    {foreach item=item from=$movie->getGenre()}
        <span class="genre">
            <input type="hidden" name="genre[]" value="{$item->getId()}" />
            <span class="text">{$item->getName()}</span>
            <span class="delete">L&ouml;schen</span>
        </span>
    {/foreach}
</div>