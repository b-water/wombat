<!--<ul>
    <li><a href="home/" class="home" {if $controller == 'home'} class="active" {/if}>&Uuml;bersicht</a></li>
    <li><a href="movie/" class="movie{if $controller == 'movie'} active{/if}">Filme</a></li>
    <li><a href="music/" class="music" {if $controller == 'music'} class="active" {/if}>Musik</a></li>
    <li><a href="image/" class="image" {if $controller == 'image'} class="active" {/if}>Bilder</a></li>
    <li><a href="document/" class="document" {if $controller == 'document'} class="active" {/if}>Dokumente</a></li>
    <li><a href="contact/" class="contact" {if $controller == 'contact'} class="active" {/if}>Kontakte</a></li>
    <li><a href="calendar/" class="calendar" {if $controller == 'calendar'} class="active" {/if}>Kalender</a></li>
    <li><a href="calendar/" class="calendar" {if $controller == 'calendar'} class="active" {/if}>Aufgaben</a></li>
    <li><a href="administration/" class="configuration" {if $controller == 'administration'} class="active" {/if}>Einstellungen</a></li>
    <li><a href="logout/" class="logout">Abmelden</a></li>
</ul>
<div id="menu">
    <div class="node">
        <h4>Filme</h4>
        <ul>
            <li>
                <a href="movie/add/" {if $controller == 'home'} class="active" {/if}>Hinzufügen</a>
            </li>
            <li>
                <a href="movie/import/" {if $controller == 'home'} class="active" {/if}>Importieren</a>
            </li>
            <li>
                <a href="movie/export/" {if $controller == 'home'} class="active" {/if}>Exportieren</a>
            </li>
        </ul>
    </div>
</div>-->
{include file=menu.tpl}