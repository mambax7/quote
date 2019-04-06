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
    $GLOBALS['xoopsOption']['template_main'] = 'quote_category.tpl';
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'quote_category_list0.tpl';
}

require_once XOOPS_ROOT_PATH . '/header.php';

global $xoTheme;

$start = \Xmf\Request::getInt('start', 0);
// Define Stylesheet
/** @var xos_opal_Theme $xoTheme */
$xoTheme->addStylesheet($stylesheet);

$db = \XoopsDatabaseFactory::getDatabaseConnection();

// Get Handler
/** @var \XoopsPersistableObjectHandler $categoryHandler */
$categoryHandler = $helper->getHandler('Category');

$categoryPaginationLimit = $helper->getConfig('userpager');

$criteria = new \CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($categoryPaginationLimit);
$criteria->setStart($start);

$categoryCount = $categoryHandler->getCount($criteria);
$categoryArray = $categoryHandler->getAll($criteria);

$id = \Xmf\Request::getInt('id', 0, 'GET');

switch ($op) {
    case 'view':
        //        viewItem();
        $categoryPaginationLimit = 1;
        $myid                    = $id;
        //id
        $categoryObject = $categoryHandler->get($myid);

        $criteria = new \CriteriaCompo();
        $criteria->setSort('id');
        $criteria->setOrder('DESC');
        $criteria->setLimit($categoryPaginationLimit);
        $criteria->setStart($start);
        $category['id']          = $categoryObject->getVar('id');
        $category['pid']         = $categoryObject->getVar('pid');
        $category['title']       = $categoryObject->getVar('title');
        $category['description'] = $categoryObject->getVar('description');
        $category['image']       = $categoryObject->getVar('image');
        $category['weight']      = $categoryObject->getVar('weight');
        $category['color']       = $categoryObject->getVar('color');
        $category['online']      = $categoryObject->getVar('online');

        //       $GLOBALS['xoopsTpl']->append('category', $category);
        $keywords[] = $categoryObject->getVar('title');

        $GLOBALS['xoopsTpl']->assign('category', $category);
        $start = $id;

        // Display Navigation
        if ($categoryCount > $categoryPaginationLimit) {

            $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/category.php');
            xoops_load('XoopsPageNav');
            $pagenav = new \XoopsPageNav($categoryCount, $categoryPaginationLimit, $start, 'op=view&id');
            $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
        }

        break;
    case 'list':
    default:
        //        viewall();

        if ($categoryCount > 0) {
            $GLOBALS['xoopsTpl']->assign('category', []);
            foreach (array_keys($categoryArray) as $i) {
                $category['id']          = $categoryArray[$i]->getVar('id');
                $category['pid']         = $categoryArray[$i]->getVar('pid');
                $category['title']       = $categoryArray[$i]->getVar('title');
                $category['description'] = $categoryArray[$i]->getVar('description');
                $category['image']       = $categoryArray[$i]->getVar('image');
                $category['weight']      = $categoryArray[$i]->getVar('weight');
                $category['color']       = $categoryArray[$i]->getVar('color');
                $category['online']      = $categoryArray[$i]->getVar('online');
                $GLOBALS['xoopsTpl']->append('category', $category);
                $keywords[] = $categoryArray[$i]->getVar('title');
                unset($category);
            }
            // Display Navigation
            if ($categoryCount > $categoryPaginationLimit) {
                $GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/category.php');
                xoops_load('XoopsPageNav');
                $pagenav = new \XoopsPageNav($categoryCount, $categoryPaginationLimit, $start, 'start');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }
        }
}

//keywords
if (isset($keywords)) {
    $utility::metaKeywords($helper->getConfig('keywords') . ', ' . implode(', ', $keywords));
}
//description
$utility::metaDescription(MD_QUOTE_CATEGORY_DESC);

$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', QUOTE_URL . '/category.php');
$GLOBALS['xoopsTpl']->assign('quote_url', QUOTE_URL);
$GLOBALS['xoopsTpl']->assign('adv', $helper->getConfig('advertise'));

$GLOBALS['xoopsTpl']->assign('bookmarks', $helper->getConfig('bookmarks'));
$GLOBALS['xoopsTpl']->assign('fbcomments', $helper->getConfig('fbcomments'));

$GLOBALS['xoopsTpl']->assign('admin', QUOTE_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);

require XOOPS_ROOT_PATH . '/footer.php';
