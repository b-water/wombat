<div class="movie-container">
    <div class="general-information">
        <div class="movie-image-container left">
            <div class="dvd-case">
            </div>
            {if $movie.image != ''}
             <img class="movie-image left" src="{$movie.image}" alt="Film Bild" />
            {else}
                <img class="movie-image left" src="images/movie-default.png" alt="Film Bild" />
            {/if}
        </div>
        <p><span>Name:</span> {$movie.name}</p>
        <p><span>Format:</span> {$movie.format}</p>
        <p><span>Genre:</span> {$movie.genre}</p>
        <p><span>Bewertung:</span> {$movie.rating}</p>
    </div>
    <p class="description">{$movie.description}</p>
</div>