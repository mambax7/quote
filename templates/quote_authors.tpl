<{include file="db:quote_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Authors </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><{$smarty.const.MD_QUOTE_AUTHORS_ID}></td>
            <td><{$authors.id}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_AUTHORS_NAME}></td>
            <td><{$authors.name}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_AUTHORS_COUNTRY}></td>
            <td><{$authors.country}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_AUTHORS_BIO}></td>
            <td><{$authors.bio}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_AUTHORS_PHOTO}></td>
            <td><img src="<{$xoops_url}>/uploads/quote/images/<{$authors.photo}>" alt="authors" class="img-responsive"></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_AUTHORS_CREATED}></td>
            <td><{$authors.created}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_ACTION}></td>
            <td>
                <!--<a href="authors.php?op=view&id=<{$authors.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a>    &nbsp;-->
                <{if $xoops_isadmin == true}>
                    <a href="admin/authors.php?op=edit&id=<{$authors.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                    &nbsp;
                    <a href="admin/authors.php?op=delete&id=<{$authors.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
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
