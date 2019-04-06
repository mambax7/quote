<{include file="db:quote_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title"><strong>Quotes</strong></h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><{$smarty.const.MD_QUOTE_QUOTES_ID}></th>
            <th><{$smarty.const.MD_QUOTE_QUOTES_CID}></th>
            <th><{$smarty.const.MD_QUOTE_QUOTES_QUOTE}></th>
            <th><{$smarty.const.MD_QUOTE_QUOTES_AUTHOR}></th>
            <th><{$smarty.const.MD_QUOTE_QUOTES_ONLINE}></th>
            <th><{$smarty.const.MD_QUOTE_QUOTES_CREATED}></th>
            <th><{$smarty.const.MD_QUOTE_QUOTES_AUTHOR_ID}></th>
            <th width="80"><{$smarty.const.MD_QUOTE_ACTION}></th>
        </tr>
        </thead>
        <{foreach item=quotes from=$quotes}>
            <tbody>
            <tr>

                <td><{$quotes.id}></td>
                <td><{$quotes.cid}></td>
                <td><{$quotes.quote}></td>
                <td><{$quotes.author}></td>
                <td><{$quotes.online}></td>
                <td><{$quotes.created}></td>
                <td><{$quotes.author_id}></td>
                <td>
                       <a href="quotes.php?op=view&id=<{$quotes.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a>
                    <{if $xoops_isadmin == true}>
                        <a href="admin/quotes.php?op=edit&id=<{$quotes.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                        <a href="admin/quotes.php?op=delete&id=<{$quotes.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                    <{/if}>
                </td>
            </tr>
            </tbody>
        <{/foreach}>
    </table>
</div>
<{$pagenav}>
<{$commentsnav}> <{$lang_notice}>
<{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.tpl"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.tpl"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.tpl"}> <{/if}>
<{include file="db:quote_footer.tpl"}>
