
{if $menu == startseite}
    {include file='startseite.tpl'}
{elseif $menu == filme}
    {include file='filme.tpl'}
{elseif $menu == musik}
    {include file='musik.tpl'}
{elseif $menu == bilder}
    {include file='bilder.tpl'}
{elseif $menu == einstellungen}
    {include file='einstellungen.tpl'}
{elseif $menu == administrator}
    {include file='administrator.tpl'}
{elseif $menu == abmelden}
    {include file='abmelden.tpl'}
{/if}

