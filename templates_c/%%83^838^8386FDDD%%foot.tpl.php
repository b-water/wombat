<?php /* Smarty version 2.6.26, created on 2011-03-05 19:39:29
         compiled from foot.tpl */ ?>
        <?php $_from = $this->_tpl_vars['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['js']):
?>
              <script type="text/javascript" src="js/<?php echo $this->_tpl_vars['js']; ?>
"></script>
        <?php endforeach; endif; unset($_from); ?>
        <script type="text/javascript" src="library/tiny_mce/tiny_mce.js"></script>
    </body>
</html>