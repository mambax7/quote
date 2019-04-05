<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_QUOTE_ID}></th>
        <th><{$smarty.const.MB_QUOTE_PID}></th>
        <th><{$smarty.const.MB_QUOTE_TITLE}></th>
        <th><{$smarty.const.MB_QUOTE_DESCRIPTION}></th>
        <th><{$smarty.const.MB_QUOTE_IMAGE}></th>
        <th><{$smarty.const.MB_QUOTE_WEIGHT}></th>
        <th><{$smarty.const.MB_QUOTE_COLOR}></th>
        <th><{$smarty.const.MB_QUOTE_ONLINE}></th>
    </tr>
    <{foreach item=category from=$block}>
        <tr class="<{cycle values = 'even,odd'}>">
            <td>
                <{$category.id}>
                <{$category.pid}>
                <{$category.title}>
                <{$category.description}>
                <{$category.image}>
                <{$category.weight}>
                <{$category.color}>
                <{$category.online}>
            </td>
        </tr>
    <{/foreach}>
</table>
