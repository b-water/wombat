<?php /* Smarty version 2.6.26, created on 2010-12-02 20:05:18
         compiled from movie.tpl */ ?>
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
            <?php $_from = $this->_tpl_vars['movies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['movie']):
?>
                <tr id="<?php echo $this->_tpl_vars['movie']['id']; ?>
">
                    <td class="name"><?php echo $this->_tpl_vars['movie']['name']; ?>
</td>
                    <td class="genre"><?php echo $this->_tpl_vars['movie']['genre']; ?>
</td>
                    <td class="rating"><?php echo $this->_tpl_vars['movie']['rating']; ?>
</td>
                    <td class="format"><?php echo $this->_tpl_vars['movie']['format']; ?>
</td>
                    <td class="date"><?php echo $this->_tpl_vars['movie']['date']; ?>
</td>
                    <td class="edit"><a href="index.php?menu=movie&action=delete&ajax=true&id=<?php echo $this->_tpl_vars['movie']['id']; ?>
"><img src="images/pencil.png" alt="edit" /></a></td>
                    <td class="delete"><a href="index.php?menu=movie&action=delete&ajax=true&id=<?php echo $this->_tpl_vars['movie']['id']; ?>
"><img src="images/delete.png" alt="delete" /></a></td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
</div>