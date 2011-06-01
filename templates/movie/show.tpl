<div class="movie-container">
    <div class="general-information">
    {if $movie.image != ''}
         <img class="left" src="{$movie.image}" alt="{$movie.name}" />
    {/if}
        <p><span>Name:</span> {$movie.name}</p>
        <p><span>Format:</span> {$movie.format}</p>
        <p><span>Genre:</span> {$movie.genre}</p>
        <p><span>Bewertung:</span> {$movie.rating}</p>
    </div>
    <p class="description">{$movie.description}</p>
</div>