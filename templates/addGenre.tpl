<select name="addGenre" id="addGenre">
    {foreach item=item from=$genre}
            <option value="{$item.id}">{$item.name}</option>
    {/foreach}
</select>
<input type="button" class="awesome small" id="submit-addGenre" value="Hinzufügen" />