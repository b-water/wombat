<form id="edit" method="POST" action="bootstrap.php?controller=movie&action=update" enctype="multipart/form-data" >
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
        {include file='rating.tpl'}
    </fieldset>
    <fieldset>
        <label>Größe</label>
        <input type="text" name="size" value="{$movie.size}" />
    </fieldset>
    <fieldset>
        <label>Beschreibung</label>
        <textarea name="description">{$movie.description}</textarea>
    </fieldset>
    <fieldset>
        <input type="submit" class="small awesome right" value="Änderungen speichern" />
    </fieldset>
</form>