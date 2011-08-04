{* head , css files, meta, dtd ect *}
{include file='head.tpl'}
<body>
    <section>
        <nav>
            {include file='navigation.tpl'}
        </nav>
         <div id="content">
            {* Content Bereich Laden *}
            {$content}
         </div>
    </section>
{* js Files and the closing tags *}
{include file='foot.tpl'}