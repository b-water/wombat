<form class="edit" method="POST" action="index.php?controller=movie&action=edit" enctype="multipart/form-data">
    <fieldset>
        <label>Name</label>
        <input type="text" value="{$movie.name}" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        <select name="format">
            <option></option>
        </select>
        <input type="text" value="{$movie.format}" />
    </fieldset>
    <fieldset>
        <label>Genre</label>
        <input type="text" value="{$movie.genre}" />
    </fieldset>
    <fieldset>
        <label>Cover</label>

        <input type="file" value="Datei" />
    </fieldset>
    <fieldset>
        <label>Bewertung</label>
        <input type="text" value="{$movie.rating}" />
    </fieldset>
    <fieldset>
        <label>Beschreibung</label>
        <input type="text" value="{$movie.description}" />
    </fieldset>
    <fieldset>
        <input type="submit" class="small awesome right" value="Änderungen speichern" />
    </fieldset>
</form>