<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_QUOTE_ID}></th>
        <th><{$smarty.const.MB_QUOTE_NAME}></th>
        <th><{$smarty.const.MB_QUOTE_COUNTRY}></th>
        <th><{$smarty.const.MB_QUOTE_BIO}></th>
        <th><{$smarty.const.MB_QUOTE_PHOTO}></th>
        <th><{$smarty.const.MB_QUOTE_CREATED}></th>
    </tr>
    <{foreach item=authors from=$block}>
        <tr class="<{cycle values = 'even,odd'}>">
            <td>
                <{$authors.id}>
                <{$authors.name}>
                <{$authors.country}>
                <{$authors.bio}>
                <{$authors.photo}>
                <{$authors.created}>
            </td>
        </tr>
    <{/foreach}>
</table>
