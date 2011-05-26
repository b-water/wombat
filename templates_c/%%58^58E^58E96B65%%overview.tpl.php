<?php /* Smarty version 2.6.26, created on 2011-05-25 20:55:50
         compiled from movie/overview.tpl */ ?>
<table id="movies" class="tablesorter">
    <thead>
        <tr>
            <th class="name">Name</th>
            <th class="genre">Genre</th>
            <th class="rating">Bewertung</th>
            <th class="format">Format</th>
            <th class="format">Gr&ouml;&szlig;e</th>
            <th class="date">Datum</th>
            <th class="show"></th>
            <th class="edit"></th>
            <th class="delete"></th>
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['movie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <tr id="<?php echo $this->_tpl_vars['item']['id']; ?>
">
            <td class="name"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
            <td class="genre"><?php echo $this->_tpl_vars['item']['genre']; ?>
</td>
            <td class="rating"><?php echo $this->_tpl_vars['item']['rating']; ?>
</td>
            <td class="format"><?php echo $this->_tpl_vars['item']['format']; ?>
</td>
            <td class="size"><?php echo $this->_tpl_vars['item']['size']; ?>
</td>
            <td class="date"><?php echo $this->_tpl_vars['item']['date']; ?>
</td>
            <td class="show"><a class="show" title="Anzeigen" href="movie/show/<?php echo $this->_tpl_vars['item']['id']; ?>
/"></a></td>
            <td class="edit"><a class="edit" title="Bearbeiten" href="movie/edit/<?php echo $this->_tpl_vars['item']['id']; ?>
/"></a></td>
            <td class="delete"><a class="delete" title="L&ouml;schen" href="movie/delete/<?php echo $this->_tpl_vars['item']['id']; ?>
/"></a></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>