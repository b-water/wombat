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
                <tr id="{$movie.id}" onclick="fancyAjaxLoader({$movie.id},'movie','show');">
                    <td class="name">{$movie.name}</td>
                    <td class="genre">{$movie.genre}</td>
                    <td class="rating">{$movie.rating}</td>
                    <td class="format">{$movie.format}</td>
                    <td class="date">{$movie.date}</td>
                    <td class="edit" onclick="fancyAjaxLoader({$movie.id},'movie','edit');"><img src="images/pencil.png" alt="edit" /></td>
                    <td class="delete" onclick="fancyAjaxLoader({$movie.id},'movie','delete');"><img src="images/delete.png" alt="delete" /></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
