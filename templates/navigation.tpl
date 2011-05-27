<ul id="navigation">
    {foreach item=item from=$navigation}
        {if $item.url == $activ}
             <li class="{$item.liclass}"><a href="{$item.url}" class="awesome red medium large {$item.aclass}">{$item.title}</a></li>
        {else}
             <li class="{$item.liclass}"><a href="{$item.url}" class="awesome blue medium large {$item.aclass}">{$item.title}</a></li>
         {/if}
    {/foreach}
</ul>