<ul class="dflt_paginator_control">
    <li><a class="awesome small" title="erste Seite" href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$paginator->first}">erste</a></li>
    {foreach item=page from=$paginator->pagesInRange}
        {if $paginator->current == $page}
            <li><a class="active awesome small red" title="Seite {$page}" href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$page}">{$page}</a></li>
        {else}
            <li><a class="awesome small" title="Seite {$page}" href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$page}">{$page}</a></li>
        {/if}
    {/foreach}
    <li><a class="awesome small" title="letzte Seite" href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$paginator->last}">letzte</a></li>
</ul>
