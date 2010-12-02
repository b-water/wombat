<div id="movies">
    <table id="movies" class="tablesorter">
        <thead>
            <tr>
                <th class="name">Name</th>
                <th class="genre">Genre</th>
                <th class="rating">Bewertung</th>
                <th class="format">Format</th>
                <th class="date">angelegt am</th>
                <th class="edit"></th>
                <th class="delete"></th>
            </tr>
        </thead>
        <tbody>
            {foreach key=id item=movie from=$movies}
                <tr id="{$movie.id}">
                    <td class="name">{$movie.name}</td>
                    <td class="genre">{$movie.genre}</td>
                    <td class="rating">{$movie.rating}</td>
                    <td class="format">{$movie.format}</td>
                    <td class="date">{$movie.date}</td>
                    <td class="edit"><a href="index.php?menu=movie&action=delete&ajax=true&id={$movie.id}"><img src="images/icons/pencil.png" alt="edit" /></a></td>
                    <td class="delete"><a href="index.php?menu=movie&action=delete&ajax=true&id={$movie.id}"><img src="images/icons/delete.png" alt="delete" /></a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
