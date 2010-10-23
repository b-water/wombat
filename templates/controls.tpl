<form id="controls" action="index.php?menu={$menu}" method="POST">
    <div class="box">
        <input id="add" name="add" type="submit" value="Hinzuf&uuml;gen" />
        <input id="del" name="del" type="submit" value="L&ouml;schen" />
    </div>
    <div class="box" class="ui-widget">
        <p>Nach Name selektieren:</p>
        <input id="searchText" class="ui-widget" name="searchText" type="text" />
        <p>Nach Genre selektieren:</p>
        <select id="genreFilter" name="genreFilter">
            <option></option>
            {foreach key=id item=genre from=$genres}
                <option value="{$genre}">{$genre}</option>
            {/foreach}
        </select>
        <p>Nach Format selektieren:</p>
        <select id="formatFilter" name="formatFilter">
                <option></option>
            {foreach key=id item=format from=$formats}
                <option id="{$format}">{$format}</option>
            {/foreach}
        </select>
        <input id="searchSubmit"  name="searchSubmit"  type="submit" value="Selektieren" />
    </div>
</form>
