<div class="page-header">
    <h1>Film <small>Bearbeiten</small></h1>
</div>
<form id="edit" method="POST" action="movie/edit/update/id/{$movie->getId()}/" enctype="multipart/form-data" >
    <input id="id" name="id" value="{$movie->getId()}" type="hidden" />
    <div class="alert-message success none">Die Änderungen wurden erfolgreich in die Datenbank übertragen! Bitte warten Sie nun einen kurzen Augenblick, die Seite wird nun neu geladen!</div>
    <div class="clearfix">
        <label>Titel</label>
        <div class="input">
            <input type="text" class="xlarge" name="title" value="{$movie->getTitle()}" />
        </div>
    </div>
    <div class="clearfix">
        <label>Format</label>
        <div class="input">
            <select name="format" id="format" class="format xlarge">
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
            <select name="rating" id="rating" class="xlarge">
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
        <label>Länge</label>
        <div class="input">
            <input type="text" name="duration" id="duration" class="xlarge" value="{$movie->getDuration()}" />
            <span class="help-inline">in Minuten</span>
        </div>
    </div>
    <div class="clearfix">
        <label>Jahr</label>
        <div class="input">
            <input type="text" name="year" id="year" class="xlarge" value="{$movie->getYear()}" />
        </div>
    </div>
    <div class="clearfix">
        <label>Trailer</label>
        <div class="input">
            <input type="text" name="trailer" id="trailer" class="xlarge" value="{$movie->getTrailer()}" />
        </div>
    </div>
    <div class="clearfix">
        <label for="description">Beschreibung</label>
        <div class="input">
            <textarea id="description" class="xlarge" name="description">{$movie->getDescription()}</textarea>
        </div>
    </div>
    <div class="clearfix">
        <label for="autocompleteGenre">Genre</label>
        <div class="input">
            <input type="text" name="autocompleteGenre" class="xlarge" id="autocompleteGenre"/>
            <span class="help-inline"><button type="button" class="btn addGenreToken">Hinzufügen</button></span>
        </div>
    </div>
    <div class="clearfix">
        {foreach item=item from=$movie->getGenre()}
            <div class="input">
                <input type="text" disabled="disabled" class="xlarge" value="{$item->getName()}" />
            </div>
        {/foreach}
    </div>
    <div class="clearfix">
        <label>Schauspieler</label>
        <div class="input">
            <input type="text" name="autoCompleteArtist" id="autoCompleteArtist" class="xlarge"/>
        </div>
        <div id="associatedArtists">
        </div>
    </div>
    <div class="clearfix">
        <button class="btn primary" type="submit">Speichern</button>
        <button class="btn" type="reset">Abbrechen</button>
    </div>
</form>