<form id="edit" method="POST" action="movie/update/" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="{$movie.id}"
           <div id="leftpanel">
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
        <label>Bild</label>
        {if $movie.thumbnail != ''}
            <img src="{$movie.thumbnail}" alt="thumbnail cover" />
        {/if}
        <input type="file" name="cover" id="cover" />
        <p class="attention">Hinweis: Nur JPG, PNG und GIF sind erlaubt!</p>
    </fieldset>
    <fieldset>
        <label>Bewertung</label>
        {include file='rating.tpl'}
    </fieldset>
   </div>
           <div id="rightpanel">
   <fieldset>
        <label>Beschreibung</label>
        <textarea name="description">{$movie.description}</textarea>
    </fieldset>
    <fieldset>
        <input type="submit" class="small awesome" value="Speichern" />
        <input type="button" class="small awesome" onclick="changeLocation('movie');" value="Abbrechen" />
    </fieldset>
               </div>
</form>