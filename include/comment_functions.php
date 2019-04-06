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
/**
 * CommentsUpdate
 *
 * @param mixed $itemId
 * @param mixed $commentCount
 * @return bool
 */
function quoteCommentsUpdate($itemId, $commentCount)
{
    /** @var \XoopsModules\Quote\Helper $helper */
    $helper = \XoopsModules\Quote\Helper::getInstance();
    /** @var \XoopsPersistableObjectHandler $helper ->getHandler('Authors') */
    if (!$helper->getHandler('Authors')->updateAll('comments', (int)$commentCount, new \Criteria('lid', (int)$itemId))) {
        return false;
    }
    return true;
}

/**
 * CommentsApprove
 *
 * @param string $comment
 * @return void
 */
function quoteCommentsApprove(&$comment)
{
    // notification mail here
}
