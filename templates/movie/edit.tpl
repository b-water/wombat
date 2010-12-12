<form id="edit" method="POST" action="bootstrap.php?controller=movie&action=change" enctype="multipart/form-data">
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
        <textarea name="description">{$movie.description}</textarea>
    </fieldset>
    <fieldset>
        <input type="button" class="small awesome right" value="Änderungen speichern" onclick="ajaxFormSubmit('{$movie.id}','movie','change');" />
    </fieldset>
</form>