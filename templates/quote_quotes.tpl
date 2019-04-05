<{include file="db:quote_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Quotes </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><{$smarty.const.MD_QUOTE_QUOTES_ID}></td>
            <td><{$quotes.id}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_QUOTES_CID}></td>
            <td><{$quotes.cid}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_QUOTES_QUOTE}></td>
            <td><{$quotes.quote}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_QUOTES_AUTHOR}></td>
            <td><{$quotes.author}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_QUOTES_ONLINE}></td>
            <td><{$quotes.online}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_QUOTES_CREATED}></td>
            <td><{$quotes.created}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_QUOTES_AUTHOR_ID}></td>
            <td><{$quotes.author_id}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_ACTION}></td>
            <td>
                <!--<a href="quotes.php?op=view&id=<{$quotes.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a>    &nbsp;-->
                <{if $xoops_isadmin == true}>
                    <a href="admin/quotes.php?op=edit&id=<{$quotes.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                    &nbsp;
                    <a href="admin/quotes.php?op=delete&id=<{$quotes.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                <{/if}>
            </td>
        </tr>
        </tbody>

    </table>
</div>
<div id="pagenav"><{$pagenav}></div>
<{$commentsnav}> <{$lang_notice}>
<{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.tpl"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.tpl"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.tpl"}> <{/if}>
<{include file="db:quote_footer.tpl"}>
