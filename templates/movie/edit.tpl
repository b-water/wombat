<form id="edit" method="POST" action="movie/edit/update/id/{$movie->getId()}/" enctype="multipart/form-data" >
    <input id="id" name="id" value="{$movie->getId()}" type="hidden" />
    <div class="alert-message success">Die Änderungen wurden erfolgreich in die Datenbank übertragen! Bitte warten Sie nun einen kurzen Augenblick, die Seite wird nun neu geladen!</div>
    <div id="left-fields">
        <fieldset>
            <div class="movie-image-container">
                <div class="dvd-case">
                </div>
                {if $movie->getImage() != ''}
                <img class="movie-image" src="{$movie->getImage()}" alt="Film Bild" />
                {else}
                <img class="movie-image" src="images/movie-default.png" alt="Film Bild" />
                {/if}
            </div>
        </fieldset>
        <fieldset>
            <label>Titel</label>
            <input type="text" readonly="readonly" name="title" value="{$movie->getTitle()}" />
        </fieldset>
        <fieldset>
            <label>Format</label>
        {include file='/movie/edit_format.tpl'}
        </fieldset>
        <fieldset>
            <label for="rating">Bewertung</label>
            {include file='/movie/edit_rating.tpl'}
        </fieldset>
        <fieldset>
            <label for="fake-text">Bild</label>
            <div class="hidden-file-container">
                <input type="text" class="fake-text" name="fake-text" value="{$movie->getImage()}"  />
                <input type="file" onchange="$('.fake-text').val($(this).val());" name="cover" class="hidden-file" id="cover" />
            </div>
        </fieldset>
        <fieldset> 
            <label>Dauer (in Minuten)</label>
            <input type="text" name="duration" id="duration" value="{$movie->getDuration()}" />
        </fieldset> 
        <fieldset> 
            <label>Jahr</label>
            <input type="text" name="year" id="year" value="{$movie->getYear()}" />
        </fieldset> 
    </div>
    <div id="right-fields">
        <fieldset class="col col-left"> 
            <label>Trailer</label>
            <input type="text" name="trailer" id="trailer" value="{$movie->getTrailer()}" />
        </fieldset> 
        <fieldset>
            <label for="description">Beschreibung</label>
            <textarea id="description" name="description">{$movie->getDescription()}</textarea>
        </fieldset>
        <fieldset class="col col-left">
            {include file='/movie/edit_genre.tpl'}
        </fieldset>
        <fieldset class="col">
            {include file='/movie/edit_artist.tpl'}
        </fieldset>
    </div>
    <div id="center-fields">
        <input type="submit" class="small awesome right" value="Speichern" />
    </div>
</form>