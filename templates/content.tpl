
{if $menu == homepage}
    {include file='homepage.tpl'}
{elseif $menu == movies}
    {include file='movies.tpl'}
{elseif $menu == music}
    {include file='music.tpl'}
{elseif $menu == bilder}
    {include file='bilder.tpl'}
{elseif $menu == einstellungen}
    {include file='einstellungen.tpl'}
{elseif $menu == administrator}
    {include file='administrator.tpl'}
{elseif $menu == abmelden}
    {include file='abmelden.tpl'}
{/if}

