<{include file="db:quote_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title"><strong>Authors</strong></h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><{$smarty.const.MD_QUOTE_AUTHORS_ID}></th>
            <th><{$smarty.const.MD_QUOTE_AUTHORS_NAME}></th>
            <th><{$smarty.const.MD_QUOTE_AUTHORS_COUNTRY}></th>
            <th><{$smarty.const.MD_QUOTE_AUTHORS_BIO}></th>
            <th><{$smarty.const.MD_QUOTE_AUTHORS_PHOTO}></th>
            <th><{$smarty.const.MD_QUOTE_AUTHORS_CREATED}></th>
            <th width="10%"><{$smarty.const.MD_QUOTE_ACTION}></th>
        </tr>
        </thead>
        <{foreach item=authors from=$authors}>
            <tbody>
            <tr>

                <td><{$authors.id}></td>
                <td><{$authors.name}></td>
                <td><{$authors.country}></td>
                <td><{$authors.bio}></td>
                <td><img src="<{$xoops_url}>/uploads/quote/images/<{$authors.photo}>" style="max-width:100px" alt="authors"></td>
                <td><{$authors.created}></td>
                <td>
                    <a href="authors.php?op=view&id=<{$authors.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a> &nbsp;
                    <{if $xoops_isadmin == true}>
                        <a href="admin/authors.php?op=edit&id=<{$authors.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                        &nbsp;
                        <a href="admin/authors.php?op=delete&id=<{$authors.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
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
