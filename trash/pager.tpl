<div id="pager">
    <form>
        {foreach key=pageid item=page from=$pages}
        <a href="index.php?menu={$menu}&page={$page}">{$page}</a>
                <input type="button" onclick="pagerSubmit('{$page}','{$menu}');" {if $page == $current_page} class="active" {/if} value="{$page}" />
        {/foreach}
    </form>
</div>