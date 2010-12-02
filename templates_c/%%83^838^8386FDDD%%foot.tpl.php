<?php /* Smarty version 2.6.26, created on 2010-12-01 19:31:24
         compiled from foot.tpl */ ?>
        <?php $_from = $this->_tpl_vars['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['js']):
?>
              <script type="text/javascript" src="js/<?php echo $this->_tpl_vars['js']; ?>
"></script>
        <?php endforeach; endif; unset($_from); ?>
    </body>
</html>