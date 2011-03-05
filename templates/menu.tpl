<ul id="menu">
    {foreach item=item from=$menu}
        {if $item.layer == '1'}
            <li class="parent">
                <a href="{$item.url}">{$item.title}</a>
            </li>
        {else}
            <li class="child">
                <a href="{$item.url}">{$item.title}</a>
            </li>
        {/if}
    {/foreach}
</ul>