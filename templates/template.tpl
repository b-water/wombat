{* head , css files, meta, dtd ect *}
{include file='head.tpl'}
<body>
    <div id="wrapper">
        <div id="sidebar">
            {* Navigations Bereich Laden *}
            {include file='sidebar.tpl'}
        </div>
<!--        <div id="container">-->
            <div id="content">
                {* Content Bereich Laden *}
                 {$content}
            </div>
<!--        </div>-->
    </div>
{* js Files and the closing tags *}
{include file='foot.tpl'}