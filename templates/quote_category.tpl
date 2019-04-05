<{include file="db:quote_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Category </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><{$smarty.const.MD_QUOTE_CATEGORY_ID}></td>
            <td><{$category.id}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_PID}></td>
            <td><{$category.pid}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_TITLE}></td>
            <td><{$category.title}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_DESCRIPTION}></td>
            <td><{$category.description}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_IMAGE}></td>
            <td><img src="<{$xoops_url}>/uploads/quote/images/<{$category.image}>" alt="category" class="img-responsive"></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_WEIGHT}></td>
            <td><{$category.weight}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_COLOR}></td>
            <td><span style="background-color: <{$category.color}>;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_CATEGORY_ONLINE}></td>
            <td><{$category.online}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_QUOTE_ACTION}></td>
            <td>
                <!--<a href="category.php?op=view&id=<{$category.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a>    &nbsp;-->
                <{if $xoops_isadmin == true}>
                    <a href="admin/category.php?op=edit&id=<{$category.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                    &nbsp;
                    <a href="admin/category.php?op=delete&id=<{$category.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
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
