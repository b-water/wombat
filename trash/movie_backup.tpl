<div class="movies">
    {foreach key=cid item=movie from=$movies}
         <div class="movie_item">
            <img src="{$movie.cover}" alt="Filmcover" class="movie_cover" />
            <div class="movie_description">
                <h3 class="inline">{$movie.name}</h3><span class="genre">{$movie.genre}</span>
                <p>{$movie.description}</p>
            </div>
        </div>
    {/foreach}
</div>