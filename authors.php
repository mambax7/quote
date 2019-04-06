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
    $GLOBALS['xoopsOption']['template_main'] = 'quote_authors.tpl';
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'quote_authors_list0.tpl';
}

require_once XOOPS_ROOT_PATH . '/header.php';

global $xoTheme;

$start = \Xmf\Request::getInt('start', 0);
// Define Stylesheet
/** @var xos_opal_Theme $xoTheme */
$xoTheme->addStylesheet($stylesheet);

$db = \XoopsDatabaseFactory::getDatabaseConnection();

// Get Handler
/** @var \XoopsPersistableObjectHandler $authorsHandler */
$authorsHandler = $helper->getHandler('Authors');

$authorsPaginationLimit = $helper->getConfig('userpager');

$criteria = new \CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($authorsPaginationLimit);
$criteria->setStart($start);

$authorsCount = $authorsHandler->getCount($criteria);
$authorsArray = $authorsHandler->getAll($criteria);

$id = \Xmf\Request::getInt('id', 0, 'GET');

switch ($op) {
    case 'view':
        //        viewItem();
        $authorsPaginationLimit = 1;
        $myid                   = $id;
        //id
        $authorsObject = $authorsHandler->get($myid);

        $criteria = new \CriteriaCompo();
        $criteria->setSort('id');
        $criteria->setOrder('DESC');
        $criteria->setLimit($authorsPaginationLimit);
        $criteria->setStart($start);
        $authors['id']      = $authorsObject->getVar('id');
        $authors['name']    = $authorsObject->getVar('name');
        $authors['country'] = strip_tags(\XoopsLists::getCountryList()[$authorsObject->getVar('country')]);
        $authors['bio']     = $authorsObject->getVar('bio');
        $authors['photo']   = $authorsObject->getVar('photo');
        $authors['created'] = date(_SHORTDATESTRING, strtotime((string)$authorsObject->getVar('created')));

        //       $GLOBALS['xoopsTpl']->append('authors', $authors);
        $keywords[] = $authorsObject->getVar('name');

        $GLOBALS['xoopsTpl']->assign('authors', $authors);
        $start = $id;

        // Display Navigation
        if ($authorsCount > $authorsPaginationLimit) {

            $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/authors.php');
            xoops_load('XoopsPageNav');
            $pagenav = new \XoopsPageNav($authorsCount, $authorsPaginationLimit, $start, 'op=view&id');
            $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
        }

        break;
    case 'list':
    default:
        //        viewall();

        if ($authorsCount > 0) {
            $GLOBALS['xoopsTpl']->assign('authors', []);
            foreach (array_keys($authorsArray) as $i) {
                $authors['id']      = $authorsArray[$i]->getVar('id');
                $authors['name']    = $authorsArray[$i]->getVar('name');
                $authors['country'] = strip_tags(\XoopsLists::getCountryList()[$authorsArray[$i]->getVar('country')]);
                $authors['bio']     = $authorsArray[$i]->getVar('bio');
                $authors['bio']     = $utility::truncateHtml($authors['bio'], $helper->getConfig('truncatelength'));
                $authors['photo']   = $authorsArray[$i]->getVar('photo');
                $authors['created'] = date(_SHORTDATESTRING, strtotime((string)$authorsArray[$i]->getVar('created')));
                $GLOBALS['xoopsTpl']->append('authors', $authors);
                $keywords[] = $authorsArray[$i]->getVar('name');
                unset($authors);
            }
            // Display Navigation
            if ($authorsCount > $authorsPaginationLimit) {
                $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/authors.php');
                xoops_load('XoopsPageNav');
                $pagenav = new \XoopsPageNav($authorsCount, $authorsPaginationLimit, $start, 'start');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        }
}

//keywords
if (isset($keywords)) {
    $utility::metaKeywords($helper->getConfig('keywords') . ', ' . implode(', ', $keywords));
}
//description
$utility::metaDescription(MD_QUOTE_AUTHORS_DESC);

$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/authors.php');
$GLOBALS['xoopsTpl']->assign('quote_url', QUOTE_URL);
$GLOBALS['xoopsTpl']->assign('adv', $helper->getConfig('advertise'));

$GLOBALS['xoopsTpl']->assign('bookmarks', $helper->getConfig('bookmarks'));
$GLOBALS['xoopsTpl']->assign('fbcomments', $helper->getConfig('fbcomments'));

$GLOBALS['xoopsTpl']->assign('admin', QUOTE_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);

require XOOPS_ROOT_PATH . '/footer.php';
