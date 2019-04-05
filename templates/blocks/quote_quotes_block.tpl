<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_QUOTE_ID}></th>
        <{*        <th><{$smarty.const.MB_QUOTE_CID}></th>*}>
        <{*        <th><{$smarty.const.MB_QUOTE_QUOTE}></th>*}>
        <th><{$smarty.const.MB_QUOTE_AUTHOR}></th>
        <{*        <th><{$smarty.const.MB_QUOTE_ONLINE}></th>*}>
        <{*        <th><{$smarty.const.MB_QUOTE_CREATED}></th>*}>

    </tr>
    <th><{$smarty.const.MB_QUOTE_AUTHOR_ID}></th>
    <{foreach item=quotes from=$block}>
        <tr class="<{cycle values = 'even,odd'}>">
            <td>
                <{$quotes.id}>
                <{*            <{$quotes.cid}>*}>
                <{*            <{$quotes.quote}>*}>
                <{$quotes.author}>
                <{*            <{$quotes.online}>*}>
                <{*            <{$quotes.created}>*}>
                <{*            <{$quotes.author_id}>*}>
            </td>
        </tr>
    <{/foreach}>
</table>
