<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=ISO-8859-1"/>
        <title>RedWombat - {$title}</title>
        <base href="{$basepath}" />
        <meta name="Author" content="Nico Schmitz" />
        <meta name="Copyright" content="2010 Nico Schmitz" />
        {foreach key=id item=css from=$css}
            <link rel="stylesheet" href="css/{$css}" type="text/css" media="all" />
        {/foreach}
    </head>