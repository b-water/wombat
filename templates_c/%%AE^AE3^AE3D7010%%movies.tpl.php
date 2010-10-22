<?php /* Smarty version 2.6.26, created on 2010-10-15 20:09:30
         compiled from movies.tpl */ ?>
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
        <?php $_from = $this->_tpl_vars['movies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['movie']):
?>
            <tr id="<?php echo $this->_tpl_vars['movies']['id']; ?>
">
                <td><?php echo $this->_tpl_vars['movie']['name']; ?>
</td>
                <td><?php echo $this->_tpl_vars['movie']['genre']; ?>
</td>
                <td><?php echo $this->_tpl_vars['movie']['rating']; ?>
</td>
                <td><?php echo $this->_tpl_vars['movie']['format']; ?>
</td>
                <td><?php echo $this->_tpl_vars['movie']['size']; ?>
</td>
                <td><?php echo $this->_tpl_vars['movie']['date']; ?>
</td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>