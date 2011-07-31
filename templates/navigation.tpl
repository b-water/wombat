<ul id="navigation">
    {foreach item=item from=$navigation}
        {if $item.url == $activ}
            <li><a href="{$item.url}" class="awesome red medium large">{$item.title}</a></li>
        {else}
            <li><a href="{$item.url}" class="awesome blue medium large">{$item.title}</a></li>
         {/if}
    {/foreach}
</ul>