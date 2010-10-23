<div id="menu">
    <ul>
        <li><a href="index.php?menu=homepage" id="homepage" {if $menu == 'homepage'} class="active" {/if}>Startseite</a></li>
        <li><a href="index.php?menu=movies" id="movies" {if $menu == 'movies'} class="active" {/if}>Filme</a></li>
        <li><a href="index.php?menu=music" id="music" {if $menu == 'music'} class="active" {/if}>Musik</a></li>
        <li><a href="index.php?menu=images" id="images" {if $menu == 'images'} class="active" {/if}>Bilder</a></li>
        <li><a href="index.php?menu=documents" id="documents" {if $menu == 'documents'} class="active" {/if}>Dokumente</a></li>
        <li><a href="index.php?menu=contacts" id="contacts" {if $menu == 'contacts'} class="active" {/if}>Kontakte</a></li>
        <li><a href="index.php?menu=calendar" id="calendar" {if $menu == 'calendar'} class="active" {/if}>Kalender</a></li>
        <li><a href="index.php?menu=configuration" id="configuration" {if $menu == 'configuration'} class="active" {/if}>Einstellungen</a></li>
        <li><a href="index.php?menu=logout" id="logout">Abmelden</a></li>
    </ul>
</div>

