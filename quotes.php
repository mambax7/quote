<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Module: Quote
 *
 * @category        Module
 * @package         quote
 * @author          XOOPS Development Team <https://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

use XoopsModules\Quote;

require __DIR__ . '/header.php';

$op = \Xmf\Request::getCmd('op', 'list');

if ('view' === $op) {
    $GLOBALS['xoopsOption']['template_main'] = 'quote_quotes.tpl';
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'quote_quotes_list0.tpl';
}

require_once XOOPS_ROOT_PATH . '/header.php';

global $xoTheme;

$start = \Xmf\Request::getInt('start', 0);
// Define Stylesheet
/** @var xos_opal_Theme $xoTheme */
$xoTheme->addStylesheet($stylesheet);

$db = \XoopsDatabaseFactory::getDatabaseConnection();

// Get Handler
/** @var \XoopsPersistableObjectHandler $quotesHandler */
$quotesHandler = $helper->getHandler('Quotes');

$quotesPaginationLimit = $helper->getConfig('userpager');

$criteria = new \CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($quotesPaginationLimit);
$criteria->setStart($start);

$quotesCount = $quotesHandler->getCount($criteria);
$quotesArray = $quotesHandler->getAll($criteria);

$id = \Xmf\Request::getInt('id', 0, 'GET');

switch ($op) {
    case 'view':
        //        viewItem();
        $quotesPaginationLimit = 1;
        $myid                  = $id;
        //id
        $quotesObject = $quotesHandler->get($myid);

        $criteria = new \CriteriaCompo();
        $criteria->setSort('id');
        $criteria->setOrder('DESC');
        $criteria->setLimit($quotesPaginationLimit);
        $criteria->setStart($start);
        $quotes['id'] = $quotesObject->getVar('id');
        /** @var \XoopsPersistableObjectHandler $categoryHandler */
        $categoryHandler = $helper->getHandler('Category');

        $quotes['cid']     = $categoryHandler->get($quotesObject->getVar('cid'))->getVar('title');
        $quotes['quote']   = $quotesObject->getVar('quote');
        $quotes['author']  = $quotesObject->getVar('author');
        $quotes['online']  = $quotesObject->getVar('online');
        $quotes['created'] = date(_SHORTDATESTRING, strtotime((string)$quotesObject->getVar('created')));
        /** @var \XoopsPersistableObjectHandler $authorsHandler */
        $authorsHandler = $helper->getHandler('Authors');

        $quotes['author_id'] = $authorsHandler->get($quotesObject->getVar('author_id'))->getVar('name');

        //       $GLOBALS['xoopsTpl']->append('quotes', $quotes);
        $keywords[] = $quotesObject->getVar('quote');

        $GLOBALS['xoopsTpl']->assign('quotes', $quotes);
        $start = $id;

        // Display Navigation
        if ($quotesCount > $quotesPaginationLimit) {

            $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/quotes.php');
            xoops_load('XoopsPageNav');
            $pagenav = new \XoopsPageNav($quotesCount, $quotesPaginationLimit, $start, 'op=view&id');
            $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
        }

        break;
    case 'list':
    default:
        //        viewall();

        if ($quotesCount > 0) {
            $GLOBALS['xoopsTpl']->assign('quotes', []);
            foreach (array_keys($quotesArray) as $i) {
                $quotes['id'] = $quotesArray[$i]->getVar('id');
                /** @var \XoopsPersistableObjectHandler $categoryHandler */
                $categoryHandler = $helper->getHandler('Category');

                $quotes['cid']     = $categoryHandler->get($quotesArray[$i]->getVar('cid'))->getVar('title');
                $quotes['quote']   = $quotesArray[$i]->getVar('quote');
                $quotes['author']  = $quotesArray[$i]->getVar('author');
                $quotes['online']  = $quotesArray[$i]->getVar('online');
                $quotes['created'] = date(_SHORTDATESTRING, strtotime((string)$quotesArray[$i]->getVar('created')));
                /** @var \XoopsPersistableObjectHandler $authorsHandler */
                $authorsHandler = $helper->getHandler('Authors');

                $quotes['author_id'] = $authorsHandler->get($quotesArray[$i]->getVar('author_id'))->getVar('name');
                $GLOBALS['xoopsTpl']->append('quotes', $quotes);
                $keywords[] = $quotesArray[$i]->getVar('quote');
                unset($quotes);
            }
            // Display Navigation
            if ($quotesCount > $quotesPaginationLimit) {
                $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/quotes.php');
                xoops_load('XoopsPageNav');
                $pagenav = new \XoopsPageNav($quotesCount, $quotesPaginationLimit, $start, 'start');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        }
}

//keywords
if (isset($keywords)) {
    $utility::metaKeywords($helper->getConfig('keywords') . ', ' . implode(', ', $keywords));
}
//description
$utility::metaDescription(MD_QUOTE_QUOTES_DESC);

$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/quotes.php');
$GLOBALS['xoopsTpl']->assign('quote_url', QUOTE_URL);
$GLOBALS['xoopsTpl']->assign('adv', $helper->getConfig('advertise'));

$GLOBALS['xoopsTpl']->assign('bookmarks', $helper->getConfig('bookmarks'));
$GLOBALS['xoopsTpl']->assign('fbcomments', $helper->getConfig('fbcomments'));

$GLOBALS['xoopsTpl']->assign('admin', QUOTE_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);

require XOOPS_ROOT_PATH . '/footer.php';
