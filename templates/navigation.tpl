<a href="index.php?menu={$menu}" class="logo"><img src="images/logo.jpg" /><h1 class="invisible">Red Wombat</h1></a>
<div id="menu">
    <ul>
        <li><a href="index.php?menu=homepage" {if $menu == 'homepage'} class="active" {/if}>Startseite</a></li>
        <li><a href="index.php?menu=movies" {if $menu == 'movies'} class="active" {/if}>Filme</a></li>
        <li><a href="index.php?menu=music" {if $menu == 'music'} class="active" {/if}>Musik</a></li>
        <li><a href="index.php?menu=images" {if $menu == 'images'} class="active" {/if}>Bilder</a></li>
        <li><a href="index.php?menu=configuration" {if $menu == 'configuration'} class="active" {/if}>Einstellungen</a></li>
        <li><a href="index.php?menu=administrator" {if $menu == 'administrator'} class="active" {/if}>Administrator</a></li>
        <li><a href="index.php?menu=logout">Abmelden</a></li>
    </ul>
</div>

