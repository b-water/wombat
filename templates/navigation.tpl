<div id="menu">
    <ul>
        <li><a href="home/" class="home" {if $controller == 'home'} class="active" {/if}></a></li>
        <li><a href="movie/" class="movie{if $controller == 'movie'} active{/if}"></a></li>
        <li><a href="music/" class="music" {if $controller == 'music'} class="active" {/if}></a></li>
        <li><a href="image/" class="image" {if $controller == 'image'} class="active" {/if}></a></li>
        <li><a href="document/" class="document" {if $controller == 'document'} class="active" {/if}></a></li>
        <li><a href="contact/" class="contact" {if $controller == 'contact'} class="active" {/if}></a></li>
        <li><a href="calendar/" class="calendar" {if $controller == 'calendar'} class="active" {/if}></a></li>
        <li><a href="administration/" class="configuration" {if $controller == 'administration'} class="active" {/if}></a></li>
        <li><a href="logout/" class="logout"></a></li>
    </ul>
</div>

