<?php /* Smarty version 2.6.26, created on 2011-02-18 23:51:34
         compiled from navigation.tpl */ ?>
<div id="menu">
    <ul>
        <li><a href="home/" class="home" <?php if ($this->_tpl_vars['controller'] == 'home'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="movie/" class="movie<?php if ($this->_tpl_vars['controller'] == 'movie'): ?> active<?php endif; ?>"></a></li>
        <li><a href="music/" class="music" <?php if ($this->_tpl_vars['controller'] == 'music'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="image/" class="image" <?php if ($this->_tpl_vars['controller'] == 'image'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="document/" class="document" <?php if ($this->_tpl_vars['controller'] == 'document'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="contact/" class="contact" <?php if ($this->_tpl_vars['controller'] == 'contact'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="calendar/" class="calendar" <?php if ($this->_tpl_vars['controller'] == 'calendar'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="administration/" class="configuration" <?php if ($this->_tpl_vars['controller'] == 'administration'): ?> class="active" <?php endif; ?>></a></li>
        <li><a href="logout/" class="logout"></a></li>
    </ul>
</div>
