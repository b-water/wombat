<form class="edit" method="POST" action="index.php?controller=movie&action=edit">
    <fieldset>
        <label>Name</label>
        <input type="text" value="{$movie.name}" />
    </fieldset>
    <fieldset>
        <label>Format</label>
        <input type="text" value="{$movie.format}" />
    </fieldset>
    <fieldset>
        <label>Genre</label>
        <input type="text" value="{$movie.genre}" />
    </fieldset>
    <fieldset>
        <label>Cover</label>
        <input type="text" value="{$movie.cover}" />
    </fieldset>
    <fieldset>
        <label>Bewertung</label>
        <input type="text" value="{$movie.rating}" />
    </fieldset>
    <fieldset>
        <label>Beschreibung</label>
        <input type="text" value="{$movie.description}" />
    </fieldset>
    <input type="submit" class="small awesome" value="Änderungen speichern" />
</form>