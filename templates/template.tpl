{* head , css files, meta, dtd ect *}
{include file='head.tpl'}
<body>
    <div id="wrapper">
        <div id="control">
            {include file='navigation.tpl'}
        </div>
         <div id="content">
            {* Content Bereich Laden *}
            {$content}
         </div>
    </div>
{* js Files and the closing tags *}
{include file='foot.tpl'}