<?php /* Smarty version 2.6.26, created on 2010-10-16 23:06:03
         compiled from navigation.tpl */ ?>
<a href="index.php?menu=<?php echo $this->_tpl_vars['menu']; ?>
" class="logo"><img src="images/logo.jpg" /><h1 class="invisible">Red Wombat</h1></a>
<div id="menu">
    <ul>
        <li><a href="index.php?menu=homepage" <?php if ($this->_tpl_vars['menu'] == 'homepage'): ?> class="active" <?php endif; ?>>Startseite</a></li>
        <li><a href="index.php?menu=movies" <?php if ($this->_tpl_vars['menu'] == 'movies'): ?> class="active" <?php endif; ?>>Filme</a></li>
        <li><a href="index.php?menu=music" <?php if ($this->_tpl_vars['menu'] == 'music'): ?> class="active" <?php endif; ?>>Musik</a></li>
        <li><a href="index.php?menu=images" <?php if ($this->_tpl_vars['menu'] == 'images'): ?> class="active" <?php endif; ?>>Bilder</a></li>
        <li><a href="index.php?menu=configuration" <?php if ($this->_tpl_vars['menu'] == 'configuration'): ?> class="active" <?php endif; ?>>Einstellungen</a></li>
        <li><a href="index.php?menu=logout">Abmelden</a></li>
    </ul>
</div>
