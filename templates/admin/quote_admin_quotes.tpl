<{if $quotesRows > 0}>
    <div class="outer">
        <form name="select" action="quotes.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('quotesId[]');} else if (isOneChecked('quotesId[]')) {return true;} else {alert('<{$smarty.const.AM_QUOTES_SELECTED_ERROR}>'); return false;}">
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


            <table class="$quotes" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/></th>
                    <th class="left"><{$selectorid}></th>
                    <th class="left"><{$selectorcid}></th>
                    <th class="left"><{$selectorquote}></th>
                    <th class="left"><{$selectorauthor}></th>
                    <th class="left"><{$selectoronline}></th>
                    <th class="left"><{$selectorcreated}></th>
                    <th class="left"><{$selectorauthor_id}></th>

                    <th class="center width5"><{$smarty.const.AM_QUOTE_FORM_ACTION}></th>
                </tr>
                <{foreach item=quotesArray from=$quotesArrays}>
                    <tr class="<{cycle values="odd,even"}>">

                        <td align="center" style="vertical-align:middle;"><input type="checkbox" name="quotes_id[]" title="quotes_id[]" id="quotes_id[]" value="<{$quotesArray.quotes_id}>"/></td>
                        <td class='left'><{$quotesArray.id}></td>
                        <td class='left'><{$quotesArray.cid}></td>
                        <td class='left'><{$quotesArray.quote}></td>
                        <td class='left'><{$quotesArray.author}></td>
                        <td class='left'><{$quotesArray.online}></td>
                        <td class='left'><{$quotesArray.created}></td>
                        <td class='left'><{$quotesArray.author_id}></td>


                        <td class="center width5"><{$quotesArray.edit_delete}></td>
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
                    <th class="left"><{$selectorcid}></th>
                    <th class="left"><{$selectorquote}></th>
                    <th class="left"><{$selectorauthor}></th>
                    <th class="left"><{$selectoronline}></th>
                    <th class="left"><{$selectorcreated}></th>
                    <th class="left"><{$selectorauthor_id}></th>

                    <th class="center width5"><{$smarty.const.AM_QUOTE_FORM_ACTION}></th>
                </tr>
                <tr>
                    <td class="errorMsg" colspan="11">There are no $quotes</td>
                </tr>
            </table>
    </div>
    <br>
    <br>
<{/if}>
