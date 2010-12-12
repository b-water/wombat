<div id="menu">
    <ul>
        <li><a href="{$file}?controller=home" class="home" {if $controller == 'home'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=movie" class="movie" {if $controller == 'movie'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=music" class="music" {if $controller == 'music'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=image" class="image" {if $controller == 'image'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=document" class="document" {if $controller == 'document'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=contact" class="contact" {if $controller == 'contact'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=calendar" class="calendar" {if $controller == 'calendar'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=configuration" class="configuration" {if $controller == 'configuration'} class="active" {/if}></a></li>
        <li><a href="{$file}?controller=logout" class="logout"></a></li>
    </ul>
</div>

