<div class="star-rating-radio-boxes">
    <input name="rating" type="radio" value="1" {if $movie.rating == 1} checked="checked" {/if} class="star"/>
    <input name="rating" type="radio" value="2" {if $movie.rating == 2} checked="checked" {/if} class="star"/>
    <input name="rating" type="radio" value="3" {if $movie.rating == 3} checked="checked" {/if} class="star"/>
    <input name="rating" type="radio" value="4" {if $movie.rating == 4} checked="checked" {/if} class="star"/>
    <input name="rating" type="radio" value="5" {if $movie.rating == 5} checked="checked" {/if} class="star"/>
</div>