<?php /* Smarty version 2.6.26, created on 2011-05-16 19:58:23
         compiled from movie/overview.tpl */ ?>
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
        <?php $_from = $this->_tpl_vars['movie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <tr id="<?php echo $this->_tpl_vars['item']['id']; ?>
">
            <td class="name" onclick="changeLocation('movie','single','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
            <td class="genre" onclick="changeLocation('movie','single','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><?php echo $this->_tpl_vars['item']['genre']; ?>
</td>
            <td class="rating" onclick="changeLocation('movie','single','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><?php echo $this->_tpl_vars['item']['rating']; ?>
</td>
            <td class="format" onclick="changeLocation('movie','single','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><?php echo $this->_tpl_vars['item']['format']; ?>
</td>
            <td class="size" onclick="changeLocation('movie','single','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><?php echo $this->_tpl_vars['item']['size']; ?>
</td>
            <td class="date"><?php echo $this->_tpl_vars['item']['date']; ?>
</td>
            <td class="edit" onclick="changeLocation('movie','edit','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><img src="images/pencil.png" alt="edit" title="Bearbeiten" /></td>
            <td class="delete" onclick="changeLocation('movie','delete','<?php echo $this->_tpl_vars['item']['id']; ?>
');"><img src="images/bin_closed.png" alt="edit" title="Bearbeiten" /></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>