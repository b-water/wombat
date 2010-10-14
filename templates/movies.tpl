{include file='controls.tpl'}
<table id="movies">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="description">Beschreibung</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="size">Gr&ouml;&szlig;e [MB]</th>
            <th class="date">angelegt am</th>
        </tr>
    </thead>
    <tbody>
        {foreach key=cid item=movie from=$movies}
            <tr onmouseover="this.backgroundColor='#000';">
                <td>{$movie.name}</td>
                <td>{$movie.genre}</td>
                <td>{$movie.description}</td>
                <td>{$movie.rating}</td>
                <td>{$movie.format}</td>
                <td>{$movie.size}</td>
                <td>{$movie.date}</td>
            </tr>
        {/foreach}
    </tbody>
</table>