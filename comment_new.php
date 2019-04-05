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
use XoopsModules\Quote;

require __DIR__ . '/../../mainfile.php';
//require XOOPS_ROOT_PATH.'/modules/quote/class/authors.php';
$com_itemid = \Xmf\Request::getInt('com_itemid', 0);
if ($com_itemid > 0) {

    /** @var \XoopsPersistableObjectHandler $authorsHandler */
    $authorsHandler = $helper->getHandler('Authors');

    $authors        = $authorsHandler->get($com_itemid);
    $com_replytitle = $authors->getVar('name');
    require XOOPS_ROOT_PATH . '/include/comment_new.php';
}
