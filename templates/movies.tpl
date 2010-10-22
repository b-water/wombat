<table id="movies">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="size">Gr&ouml;&szlig;e [MB]</th>
            <th class="date">angelegt am</th>
        </tr>
    </thead>
    <tbody>
        {foreach key=id item=movie from=$movies}
            <tr id="{$movies.id}">
                <td>{$movie.name}</td>
                <td>{$movie.genre}</td>
                <td>{$movie.rating}</td>
                <td>{$movie.format}</td>
                <td>{$movie.size}</td>
                <td>{$movie.date}</td>
            </tr>
        {/foreach}
    </tbody>
</table>