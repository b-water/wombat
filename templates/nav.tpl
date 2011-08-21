<div class="topbar-wrapper">
    <div class="topbar">
        <div class="container fixed">
            <h3><a href="" class="logo">wombat</a></h3>
            <form action="">
                <input type="text" placeholder="Suche">
            </form>
            <ul>
                {foreach item=item from=$navigation}
                    {if $item.url == $activ}
                        <li class="active"><a href="{$item.url}" class="movie">{$item.title}</a></li>
                    {else}
                        <li><a href="{$item.url}" class="awesome blue medium large">{$item.title}</a></li>
                    {/if}
                {/foreach}
            </ul>
            <ul class="nav secondary-nav nav-config">
                <li class="menu">
                    <a class="menu menu-config" href="#">Einstellungen</a>
                    <ul class="menu-dropdown dropdown-config" style="display: none;">
                        <li><a href="">Allgemein</a></li>
                        <li><a href="">Benutzer</a></li>
                        <li><a href="">Format</a></li>
                        <li><a href="">Bewertungen</a></li>
                        <li><a href="">Genre</a></li>
                        <li><a href="">Künstler</a></li>
                        <li class="divider"></li>
                        <li><a href="">Another link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>