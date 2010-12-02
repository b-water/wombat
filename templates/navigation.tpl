<div id="menu">
    <ul>
        <li><a href="index.php?menu=home" class="home" {if $menu == 'home'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=movie" class="movie" {if $menu == 'movie'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=music" class="music" {if $menu == 'music'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=image" class="image" {if $menu == 'image'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=document" class="document" {if $menu == 'document'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=contact" class="contact" {if $menu == 'contact'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=calendar" class="calendar" {if $menu == 'calendar'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=configuration" class="configuration" {if $menu == 'configuration'} class="active" {/if}></a></li>
        <li><a href="index.php?menu=logout" class="logout"></a></li>
    </ul>
</div>

