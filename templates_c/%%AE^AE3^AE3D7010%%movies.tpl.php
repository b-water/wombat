<?php /* Smarty version 2.6.26, created on 2010-11-07 17:03:12
         compiled from movies.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'searchbar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
<!--                <td class="size"><?php echo $this->_tpl_vars['movie']['size']; ?>
</td>-->
                <td class="date"><?php echo $this->_tpl_vars['movie']['date']; ?>
</td>
                <td class="edit"><a href="index.php?menu=movies&edit=<?php echo $this->_tpl_vars['movie']['id']; ?>
"><img src="images/icons/pencil.png" alt="edit" /></a></td>
                <td class="delete"><a href="index.php?menu=movies&delete=<?php echo $this->_tpl_vars['movie']['id']; ?>
"><img src="images/icons/delete.png" alt="delete" /></a></td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
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