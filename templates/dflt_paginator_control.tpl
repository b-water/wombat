<ul class="dflt_paginator_control">
    {foreach item=page from=$paginator->pagesInRange}
        {if $paginator->current == $page}
             <li><a class="active awesome small red" href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$page}">{$page}</a></li>
        {else}
            <li><a class="awesome small" href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$page}">{$page}</a></li>
        {/if}
    {/foreach}
</ul>
