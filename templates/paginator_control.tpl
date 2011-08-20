<div class="pagination">
    <ul class="dflt_paginator_control">
        <li><a  href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$paginator->first}">erste</a></li>
        {foreach item=page from=$paginator->pagesInRange}
            {if $paginator->current == $page}
                <li><a href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$page}">{$page}</a></li>
            {else}
                <li><a href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$page}">{$page}</a></li>
            {/if}
        {/foreach}
        <li><a  href="{$urlParser->getPackage()}/{$urlParser->getController()}/{$urlParser->getAction()}/page/{$paginator->last}">letzte</a></li>
    </ul>
</div>