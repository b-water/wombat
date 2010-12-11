<form class="edit" method="POST" action="index.php?controller=movie&action=edit" enctype="multipart/form-data">
    <input type="hidden" name="change" value="1" />
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="{$movie.name}" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        <select name="format">
            {foreach item=item from=$format}
                {if $item.name == $movie.format}
                    <option selected="selected">{$item.name}</option>
                {else}
                    <option>{$item.name}</option>
                   
                {/if}
            {/foreach}
        </select>
    </fieldset>
    <fieldset>
        <label>Genre</label>
        <select name="genre">
            {foreach item=item from=$genre}
                {if $item.name == $movie.format}
                    <option selected="selected">{$item.name}</option>
                {else}
                    <option>{$item.name}</option>
                {/if}
            {/foreach}
        </select>
    </fieldset>
    <fieldset>
        <label>Cover</label>
        <input type="file" name="cover"/>
    </fieldset>
    <fieldset>
        <label>Bewertung</label>
        <input type="text" name="rating" value="{$movie.rating}" />
    </fieldset>
    <fieldset>
        <label>Beschreibung</label>
        <input type="text" name="description" value="{$movie.description}" />
    </fieldset>
    <fieldset>
        <input type="submit" class="small awesome right" value="Änderungen speichern" />
    </fieldset>
</form>