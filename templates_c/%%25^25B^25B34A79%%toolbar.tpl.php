<?php /* Smarty version 2.6.26, created on 2011-02-19 00:24:56
         compiled from toolbar.tpl */ ?>
<form method="POST" action="movie/search/" id="searchbar">
    <fieldset id="toolbar">
        <a href="" class="small awesome left test" onclick="fancyAjaxLoader('','movie','operations','Hinzuf&uuml;gen');return false;" title="Hinzuf&uuml;gen"><img src="images/add.png" alt="Neuanlage"/></a>
        <a href="" class="small awesome left test" onclick="fancyAjaxLoader('','movie','operations','Filtern');return false;" title="Filtern"><img src="images/page_white_magnify.png" alt="Filtern"/></a>
        <a href="" class="small awesome left test" onclick="fancyAjaxLoader('','movie','operations','Datendurchl&auml;ufe');return false;" title="Datendurchl&auml;ufe"><img src="images/cog_go.png" alt="Datendurchl&auml;ufe" /></a>
    </fieldset>
    <input type="text" id="searchText" name="searchbar" value="Bitte geben Sie zum suchen einen Filmtitel an ..." />
    <input type="submit" class="small awesome" name="searchbarSubmit" value="Suchen" />
</form>