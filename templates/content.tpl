{if $controller == home}
    {include file='home.tpl'}
{elseif $controller == movie}
    {include file='searchbar.tpl'}
    {include file='movie.tpl'}
    {include file='pager.tpl'}
{elseif $controller == music}
    {include file='music.tpl'}
{elseif $controller == image}
    {include file='image.tpl'}
{elseif $controller == configuration}
    {include file='configuration.tpl'}
{/if}

