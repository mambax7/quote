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

use Xmf\Request;

require __DIR__ . '/admin_header.php';
xoops_cp_header();
//It recovered the value of argument op in URL$
$op    = \Xmf\Request::getString('op', 'list');
$order = \Xmf\Request::getString('order', 'desc');
$sort  = \Xmf\Request::getString('sort', '');

$adminObject->displayNavigation(basename(__FILE__));
/** @var \Xmf\Module\Helper\Permission $permHelper */
$permHelper = new \Xmf\Module\Helper\Permission();
$uploadDir  = XOOPS_UPLOAD_PATH . '/quote/images/';
$uploadUrl  = XOOPS_UPLOAD_URL . '/quote/images/';

switch ($op) {
    case 'new':
        $adminObject->addItemButton(AM_QUOTE_QUOTES_LIST, 'quotes.php', 'list');
        $adminObject->displayButton('left');

        $quotesObject = $quotesHandler->create();
        $form         = $quotesObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('quotes.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 !== \Xmf\Request::getInt('id', 0)) {
            $quotesObject = $quotesHandler->get(Request::getInt('id', 0));
        } else {
            $quotesObject = $quotesHandler->create();
        }
        // Form save fields
        $quotesObject->setVar('cid', Request::getVar('cid', ''));
        $quotesObject->setVar('quote', Request::getText('quote', ''));
        $quotesObject->setVar('author', Request::getVar('author', ''));
        $quotesObject->setVar('online', ((1 == \Xmf\Request::getInt('online', 0)) ? '1' : '0'));
        $quotesObject->setVar('created', $_REQUEST['created']);
        $quotesObject->setVar('author_id', Request::getVar('author_id', ''));
        if ($quotesHandler->insert($quotesObject)) {
            redirect_header('quotes.php?op=list', 2, AM_QUOTE_FORMOK);
        }

        echo $quotesObject->getHtmlErrors();
        $form = $quotesObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_QUOTE_ADD_QUOTES, 'quotes.php?op=new', 'add');
        $adminObject->addItemButton(AM_QUOTE_QUOTES_LIST, 'quotes.php', 'list');
        $adminObject->displayButton('left');
        $quotesObject = $quotesHandler->get(Request::getString('id', ''));
        $form         = $quotesObject->getForm();
        $form->display();
        break;

    case 'delete':
        $quotesObject = $quotesHandler->get(Request::getString('id', ''));
        if (1 == \Xmf\Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('quotes.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($quotesHandler->delete($quotesObject)) {
                redirect_header('quotes.php', 3, AM_QUOTE_FORMDELOK);
            } else {
                echo $quotesObject->getHtmlErrors();
            }
        } else {
            xoops_confirm([
                              'ok' => 1,
                              'id' => Request::getString('id', ''),
                              'op' => 'delete',
                          ], Request::getUrl('REQUEST_URI', '', 'SERVER'), sprintf(AM_QUOTE_FORMSUREDEL, $quotesObject->getVar('quote')));
        }
        break;

    case 'clone':

        $id_field = \Xmf\Request::getString('id', '');

        if ($utility::cloneRecord('quote_quotes', 'id', $id_field)) {
            redirect_header('quotes.php', 3, AM_QUOTE_CLONED_OK);
        } else {
            redirect_header('quotes.php', 3, AM_QUOTE_CLONED_FAILED);
        }

        break;
    case 'list':
    default:
        $adminObject->addItemButton(AM_QUOTE_ADD_QUOTES, 'quotes.php?op=new', 'add');
        $adminObject->displayButton('left');
        $start                 = \Xmf\Request::getInt('start', 0);
        $quotesPaginationLimit = $helper->getConfig('userpager');

        $criteria = new \CriteriaCompo();
        $criteria->setSort('id ASC, quote');
        $criteria->setOrder('ASC');
        $criteria->setLimit($quotesPaginationLimit);
        $criteria->setStart($start);
        $quotesTempRows  = $quotesHandler->getCount();
        $quotesTempArray = $quotesHandler->getAll($criteria);
        /*
        //
        //
                            <th class='center width5'>".AM_QUOTE_FORM_ACTION."</th>
        //                    </tr>";
        //            $class = "odd";
        */

        // Display Page Navigation
        if ($quotesTempRows > $quotesPaginationLimit) {
            xoops_load('XoopsPageNav');

            $pagenav = new \XoopsPageNav($quotesTempRows, $quotesPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('quotesRows', $quotesTempRows);
        $quotesArray = [];

        //    $fields = explode('|', id:int:11::NOT NULL::primary:ID|cid:int:8::NOT NULL:0::Category|quote:text:0::NOT NULL:::Quote|author:varchar:255::NOT NULL:::Author|online:int:10::NOT NULL:1::Online|created:timestamp:0::NOT NULL:CURRENT_TIMESTAMP::Created|author_id:int:::NOT NULL:::Author);
        //    $fieldsCount    = count($fields);

        $criteria = new \CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($quotesPaginationLimit);
        $criteria->setStart($start);

        $quotesCount     = $quotesHandler->getCount($criteria);
        $quotesTempArray = $quotesHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($quotesCount > 0) {
            foreach (array_keys($quotesTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $GLOBALS['xoopsTpl']->assign('selectorid', AM_QUOTE_QUOTES_ID);
                $quotesArray['id'] = $quotesTempArray[$i]->getVar('id');

                $GLOBALS['xoopsTpl']->assign('selectorcid', AM_QUOTE_QUOTES_CID);
                $quotesArray['cid'] = $categoryHandler->get($quotesTempArray[$i]->getVar('cid'))->getVar('title');

                $GLOBALS['xoopsTpl']->assign('selectorquote', AM_QUOTE_QUOTES_QUOTE);
                $quotesArray['quote'] = $quotesTempArray[$i]->getVar('quote');

                $GLOBALS['xoopsTpl']->assign('selectorauthor', AM_QUOTE_QUOTES_AUTHOR);
                $quotesArray['author'] = $quotesTempArray[$i]->getVar('author');

                $GLOBALS['xoopsTpl']->assign('selectoronline', AM_QUOTE_QUOTES_ONLINE);
                $quotesArray['online'] = $quotesTempArray[$i]->getVar('online');

                $GLOBALS['xoopsTpl']->assign('selectorcreated', AM_QUOTE_QUOTES_CREATED);
                $quotesArray['created'] = date(_SHORTDATESTRING, strtotime($quotesTempArray[$i]->getVar('created')));

                $GLOBALS['xoopsTpl']->assign('selectorauthor_id', AM_QUOTE_QUOTES_AUTHOR_ID);
                $quotesArray['author_id']   = $authorsHandler->get($quotesTempArray[$i]->getVar('author_id'))->getVar('name');
                $quotesArray['edit_delete'] = "<a href='quotes.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='quotes.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='quotes.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('quotesArrays', $quotesArray);
                unset($quotesArray);
            }
            unset($quotesTempArray);
            // Display Navigation
            if ($quotesCount > $quotesPaginationLimit) {
                xoops_load('XoopsPageNav');
                $pagenav = new \XoopsPageNav($quotesCount, $quotesPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            //                     echo "<td class='center width5'>

            //                    <a href='quotes.php?op=edit&id=".$i."'><img src=".$pathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
            //                    <a href='quotes.php?op=delete&id=".$i."'><img src=".$pathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
            //                    </td>";

            //                echo "</tr>";

            //            }

            //            echo "</table><br><br>";

            //        } else {

            //            echo "<table width='100%' cellspacing='1' class='outer'>

            //                    <tr>

            //                     <th class='center width5'>".AM_QUOTE_FORM_ACTION."XXX</th>
            //                    </tr><tr><td class='errorMsg' colspan='8'>There are noXXX quotes</td></tr>";
            //            echo "</table><br><br>";

            //-------------------------------------------

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/quote_admin_quotes.tpl');
        }

        break;
}
require __DIR__ . '/admin_footer.php';
