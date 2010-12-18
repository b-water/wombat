<form id="edit" method="POST" action="bootstrap.php?controller=movie&action=update" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="{$movie.id}" />
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="{$movie.name}" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        {include file='format.tpl'}
    </fieldset>
    <fieldset>
        <label>Genre</label>
        {include file='genre.tpl'}
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