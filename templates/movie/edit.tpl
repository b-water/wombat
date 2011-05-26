<form id="edit" method="POST" action="movie/update/" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="{$movie.id}" />
    <h2>Film bearbeiten</h2>
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
        {if $movie.thumbnail != ''}
        <img src="{$movie.thumbnail}" alt="thumbnail cover" />
        {/if}
<!--        <p class="attention">Hinweis: Nur JPG, PNG und GIF sind erlaubt!</p>-->
        <label for="cover">Bild</label>
        <div class="hidden-file-container">
            <input type="text" class="fake-text"  /><input type="button" class="awesome small fake-button" value="Hochladen" />
            <input type="file" name="cover" class="hidden-file" id="cover" />
        </div>
    </fieldset>
    <fieldset>
        <label>Bewertung</label>
        {include file='rating.tpl'}
    </fieldset>
    <fieldset>
        <label>Größe</label>
        <input type="text" name="size" value="{$movie.size}" />
        <input type="button" class="small awesome" onclick="changeLocation('movie');" value="Berechnen" />
    </fieldset>
    <fieldset>
        <label for="editor">Beschreibung</label>
        <textarea id="editor" name="editor">{$movie.description}</textarea>
    </fieldset>
    <fieldset class="right">
        <input type="submit" class="small awesome" value="Speichern" />
        <input type="button" class="small awesome" onclick="changeLocation('movie');" value="Abbrechen" />
    </fieldset>
</form>