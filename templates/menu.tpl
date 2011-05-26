<ul id="menu">
    {foreach item=item from=$menuitems}
        <li class="{$item.liclass}"><a href="{$item.url}" class="{$item.aclass}">{$item.title}</a></li>
    {/foreach}
</ul>