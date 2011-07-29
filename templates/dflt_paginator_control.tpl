<ul class="dflt_paginator_control">
{foreach item=item from=$pages}
    <li><a href="{$item.url}">{$item.name}</a></li>
{/foreach}
</ul>
