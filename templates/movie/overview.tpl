<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="format">Größe</th>
            <th class="date">angelegt am</th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
    </thead>
    <tbody>
        {foreach item=item from=$movie}
        <tr id="{$item.id}">
            <td class="name" onclick="changeLocation('movie','single','{$item.id}');">{$item.name}</td>
            <td class="genre" onclick="changeLocation('movie','single','{$item.id}');">{$item.genre}</td>
            <td class="rating" onclick="changeLocation('movie','single','{$item.id}');">{$item.rating}</td>
            <td class="format" onclick="changeLocation('movie','single','{$item.id}');">{$item.format}</td>
            <td class="size" onclick="changeLocation('movie','single','{$item.id}');">{$item.size}</td>
            <td class="date">{$item.date}</td>
            <td class="edit" onclick="changeLocation('movie','edit','{$item.id}');"><img src="images/pencil.png" alt="edit" title="Bearbeiten" /></td>
            <td class="delete" onclick="changeLocation('movie','delete','{$item.id}');"><img src="images/bin_closed.png" alt="edit" title="Bearbeiten" /></td>
        </tr>
        {/foreach}
    </tbody>
</table>
