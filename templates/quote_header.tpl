<div class="header">
    <span class="left"><b><{$smarty.const.MD_QUOTE_TITLE}></b>&#58;&#160;</span>
    <span class="left"><{$smarty.const.MD_QUOTE_DESC}></span><br>
</div>
<div class="head">
    <{if $adv != ''}>
        <div class="center"><{$adv}></div>
    <{/if}>
</div>
<br>
<ul class="nav nav-pills">
    <li class="active"><a href="<{$quote_url}>"><{$smarty.const.MD_QUOTE_INDEX}></a></li>

    <li><a href="<{$quote_url}>/quotes.php"><{$smarty.const.MD_QUOTE_QUOTES}></a></li>
    <li><a href="<{$quote_url}>/category.php"><{$smarty.const.MD_QUOTE_CATEGORY}></a></li>
    <li><a href="<{$quote_url}>/authors.php"><{$smarty.const.MD_QUOTE_AUTHORS}></a></li>
</ul>

<br>
