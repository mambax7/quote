<{if $authorsRows > 0}>
    <div class="outer">
        <form name="select" action="authors.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('authorsId[]');} else if (isOneChecked('authorsId[]')) {return true;} else {alert('<{$smarty.const.AM_AUTHORS_SELECTED_ERROR}>'); return false;}">
            <input type="hidden" name="confirm" value="1"/>
            <div class="floatleft">
                <select name="op">
                    <option value=""><{$smarty.const.AM_QUOTE_SELECT}></option>
                    <option value="delete"><{$smarty.const.AM_QUOTE_SELECTED_DELETE}></option>
                </select>
                <input id="submitUp" class="formButton" type="submit" name="submitselect" value="<{$smarty.const._SUBMIT}>" title="<{$smarty.const._SUBMIT}>"/>
            </div>
            <div class="floatcenter0">
                <div id="pagenav"><{$pagenav}></div>
            </div>


            <table class="$authors" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/></th>
                    <th class="left"><{$selectorid}></th>
                    <th class="left"><{$selectorname}></th>
                    <th class="left"><{$selectorcountry}></th>
                    <th class="left"><{$selectorbio}></th>
                    <th class="left"><{$selectorphoto}></th>
                    <th class="left"><{$selectorcreated}></th>

                    <th class="center width5"><{$smarty.const.AM_QUOTE_FORM_ACTION}></th>
                </tr>
                <{foreach item=authorsArray from=$authorsArrays}>
                    <tr class="<{cycle values="odd,even"}>">

                        <td align="center" style="vertical-align:middle;"><input type="checkbox" name="authors_id[]" title="authors_id[]" id="authors_id[]" value="<{$authorsArray.authors_id}>"/></td>
                        <td class='left'><{$authorsArray.id}></td>
                        <td class='left'><{$authorsArray.name}></td>
                        <td class='left'><{$authorsArray.country}></td>
                        <td class='left'><{$authorsArray.bio}></td>
                        <td class='left'><{$authorsArray.photo}></td>
                        <td class='left'><{$authorsArray.created}></td>


                        <td class="center width5"><{$authorsArray.edit_delete}></td>
                    </tr>
                <{/foreach}>
            </table>
            <br>
            <br>
            <{else}>
            <table width="100%" cellspacing="1" class="outer">
                <tr>

                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/></th>
                    <th class="left"><{$selectorid}></th>
                    <th class="left"><{$selectorname}></th>
                    <th class="left"><{$selectorcountry}></th>
                    <th class="left"><{$selectorbio}></th>
                    <th class="left"><{$selectorphoto}></th>
                    <th class="left"><{$selectorcreated}></th>

                    <th class="center width5"><{$smarty.const.AM_QUOTE_FORM_ACTION}></th>
                </tr>
                <tr>
                    <td class="errorMsg" colspan="11">There are no $authors</td>
                </tr>
            </table>
    </div>
    <br>
    <br>
<{/if}>
