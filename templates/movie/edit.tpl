<div class="page-header">
    <h1>Film <small>Bearbeiten</small></h1>
</div>
<form id="edit" method="POST" action="movie/edit/update/id/{$movie->getId()}/" enctype="multipart/form-data" >
    <input id="id" name="id" value="{$movie->getId()}" type="hidden" />
    <div class="alert-message success none">Die Änderungen wurden erfolgreich in die Datenbank übertragen! Bitte warten Sie nun einen kurzen Augenblick, die Seite wird nun neu geladen!</div>
    <div class="clearfix">
        <div class="input">
            <img src="{$movie->getImage()}" alt="Aktuelles Bild" />
        </div>
    </div>
    <div class="clearfix">
        <label for="title">Titel</label>
        <div class="input">
            <input type="text" class="xxlarge" name="title" value="{$movie->getTitle()}" />
        </div>
    </div>
    <div class="clearfix">
        <label for="image">Bild</label>
        <div class="input">
            <input type="file" class="xxlarge" name="image" value="{$movie->getImage()}" />
        </div>
    </div>
    <div class="clearfix">
        <label for="format">Format</label>
        <div class="input">
            <select name="format" id="format" class="format xxlarge">
                {foreach item=item from=$format}
                    {if $item->getName() == $movie->getFormat()}
                        <option value="{$item->getId()}" selected="selected">{$item->getName()}</option>
                    {else}
                        <option value="{$item->getId()}">{$item->getName()}</option>
                    {/if}
                {/foreach}
            </select>
        </div>
    </div>
    <div class="clearfix">
        <label for="rating">Bewertung</label>
        <div class="input">
            <select name="rating" id="rating" class="xxlarge">
                {foreach item=item from=$rating}
                    {if $item->getName() == $movie->getRating()}
                        <option value="{$item->getId()}" selected="selected">{$item->getName()}</option>
                    {else}
                        <option value="{$item->getId()}">{$item->getName()}</option>
                    {/if}
                {/foreach}
            </select>
        </div>
    </div>
    <div class="clearfix">
        <label for="duration">Länge</label>
        <div class="input">
            <input type="text" name="duration" id="duration" class="xxlarge" value="{$movie->getDuration()}" />
            <span class="help-inline">in Minuten</span>
        </div>
    </div>
    <div class="clearfix">
        <label for="year">Jahr</label>
        <div class="input">
            <input type="text" name="year" id="year" class="xxlarge" value="{$movie->getYear()}" />
        </div>
    </div>
    <div class="clearfix">
        <label for="trailer">Trailer</label>
        <div class="input">
            <input type="text" name="trailer" id="trailer" class="xxlarge" value="{$movie->getTrailer()}" />
        </div>
    </div>
    <div class="clearfix">
        <label for="description">Beschreibung</label>
        <div class="input">
            <textarea id="description" class="xxlarge" name="description">{$movie->getDescription()}</textarea>
        </div>
    </div>
    <div class="clearfix">
        <label for="autocompleteGenre">Genre</label>
        <div class="input">
            <input type="text" name="genre" class="xxlarge" id="genre"/>
            <span class="help-inline"><button type="button" class="btn addGenreToken">Hinzufügen</button></span>
        </div>
    </div>
    <div class="clearfix">
        {foreach item=item from=$movie->getGenre()}
            <div class="input">
                <input type="text" disabled="disabled" class="xxlarge" value="{$item->getName()}" />
            </div>
        {/foreach}
    </div>
    <div class="clearfix">
        <label for="artist">Schauspieler</label>
        <div class="input">
            <input type="text" name="artist" id="artist" class="xxlarge"/>
            <span class="help-inline"><button class="btn">Hinzufügen</button></span>
        </div>
        <div id="assocArtist">
        </div>
    </div>
    <div class="clearfix">
        <button class="btn primary" type="submit">Speichern</button>
        <button class="btn" type="reset">Zurücksetzen</button>
        <a href="movie/" class="btn">Abbrechen</a>
    </div>
</form>