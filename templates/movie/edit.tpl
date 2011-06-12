<form id="edit" class="jqtransform" method="POST" action="movie/update/id/{$movie.id}/" enctype="multipart/form-data" >
    <div class="notice good">Die Änderungen wurden erfolgreich in die Datenbank übertragen! Bitte warten Sie nun einen kurzen Augenblick, die Seite wird nun neu geladen!</div>
    <div id="left-fields">
        <fieldset>
            <div class="movie-image-container">
                <div class="dvd-case">
                </div>
                {if $movie.image != ''}
                <img class="movie-image" src="{$movie.image}" alt="Film Bild" />
                {else}
                <img class="movie-image" src="images/movie-default.png" alt="Film Bild" />
                {/if}
            </div>
        </fieldset>
        <fieldset>
            <label>Titel</label>
            <input type="text" name="title" value="{$movie.title}" />
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
                <input type="text" class="fake-text" name="fake-text" value="{$movie.image}"  />
                <input type="file" onchange="$('.fake-text').val($(this).val());" name="cover" class="hidden-file" id="cover" />
            </div>
        </fieldset>
        <fieldset> 
            <label>Dauer (in Minuten)</label>
            <input type="text" name="duration" id="duration" value="{$movie.duration}" />
        </fieldset> 
        <fieldset> 
            <label>Jahr</label>
            <input type="text" name="year" id="year" value="{$movie.year}" />
        </fieldset> 
        <fieldset> 
            <label>Direktor</label>
            <input type="text" name="director" id="director" value="{$movie.director}" />
        </fieldset> 
    </div>
    <div id="right-fields">
        <fieldset class="col col-left"> 
            <label>Trailer</label>
            <input type="text" name="trailer" id="trailer" value="{$movie.trailer}" />
        </fieldset> 
        <fieldset>
            <label for="description">Beschreibung</label>
            <textarea id="description" name="description">{$movie.description}</textarea>
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