<?php /* Smarty version 2.6.26, created on 2011-05-24 21:45:25
         compiled from searchbar.tpl */ ?>
<form method="POST" action="index.php?controller=movie&action=search" id="searchbar">
    <fieldset id="toolbar">
        <a href="" class="small awesome left test" onclick="fancyAjaxLoader('','movie','operations','Neuanlage');return false;" title="Neuanlage"><img src="images/add.png" alt="Neuanlage"/></a>
        <a href="" class="small awesome left test" onclick="fancyAjaxLoader('','movie','operations','Datendurchl&auml;ufe');return false;" title="Datendurchl&auml;ufe"><img src="images/cog_go.png" alt="Datendurchl&auml;ufe" /></a>
    </fieldset>
    <input type="text" id="searchText" name="searchbar" value="Bitte geben Sie zum suchen einen Filmtitel an ..." />
    <input type="submit" class="small awesome" name="searchbarSubmit" value="Suchen" />
</form>