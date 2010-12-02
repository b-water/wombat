{if $menu == home}
    {include file='home.tpl'}
{elseif $menu == movie}
    {include file='searchbar.tpl'}
    {include file='movie.tpl'}
    {include file='pager.tpl'}
{elseif $menu == music}
    {include file='music.tpl'}
{elseif $menu == image}
    {include file='image.tpl'}
{elseif $menu == configuration}
    {include file='configuration.tpl'}
{elseif $menu == logout}
    {include file='logout.tpl'}
{/if}

