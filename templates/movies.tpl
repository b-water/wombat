{include file='searchbar.tpl'}
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
<!--                <td class="size">{$movie.size}</td>-->
                <td class="date">{$movie.date}</td>
                <td class="edit"><a href="index.php?menu=movies&edit={$movie.id}"><img src="images/icons/pencil.png" alt="edit" /></a></td>
                <td class="delete"><a href="index.php?menu=movies&delete={$movie.id}"><img src="images/icons/delete.png" alt="delete" /></a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
<div id="pager" class="pager">
	<form>
            <img src="images/icons/control_start.png" class="first left"/>
            <img src="images/icons/control_rewind.png" class="prev left"/>
            <input type="text" class="pagedisplay left"/>
            <img src="images/icons/control_fastforward.png" class="next left"/>
            <img src="images/icons/control_end.png" class="last left"/>
            <select class="pagesize left">
                    <option selected="selected" value="15">15</option>
                    <option value="30">30</option>
                    <option  value="45">45</option>
            </select>
	</form>
</div>
