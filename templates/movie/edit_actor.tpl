<label>Schauspieler</label>
<input type="text" name="autoCompleteGenre" id="autoCompleteGenre"/>
<div id="associatedGenres">
    {foreach item=item from=$movie.genre}
        <span class="genre">
            <input type="hidden" name="genre[]" value="{$item.genre_id}" />
            <span class="text">{$item.genre}</span>
            <span class="delete">L&ouml;schen</span>
        </span>
    {/foreach}
</div>