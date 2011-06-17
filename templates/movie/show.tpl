<div class="movie-container">
    <div class="general-information">
        <div class="movie-image-container left">
            <div class="dvd-case">
            </div>
            {if $movie->getImage() != ''}
             <img class="movie-image left" src="{$movie->getImage()}" alt="Film Bild" />
            {else}
                <img class="movie-image left" src="images/movie-default.png" alt="Film Bild" />
            {/if}
        </div>
        <p><span>Titel:</span> {$movie->getTitle()}</p>
        <p><span>Format:</span> {$movie->getFormat()}</p>
        <p><span>Genre:</span> {$movie->getGenre()}</p>
        <p><span>Bewertung:</span> {$movie->getRating()}</p>
    </div>
    <p class="description">{$movie->getDescription()}</p>
</div>