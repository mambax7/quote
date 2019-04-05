<?php namespace XoopsModules\Quote;

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
use XoopsModules\Quote\Form;

//$permHelper = new \Xmf\Module\Helper\Permission();

/**
 * Class Quotes
 */
class Quotes extends \XoopsObject
{
    public $helper, $permHelper;

    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        parent::__construct();
        //        /** @var  Quote\Helper $helper */
        //        $this->helper = Quote\Helper::getInstance();
        $this->permHelper = new \Xmf\Module\Helper\Permission();

        $this->initVar('id', XOBJ_DTYPE_INT);
        $this->initVar('cid', XOBJ_DTYPE_INT);
        $this->initVar('quote', XOBJ_DTYPE_OTHER);
        $this->initVar('author', XOBJ_DTYPE_TXTBOX);
        $this->initVar('online', XOBJ_DTYPE_INT);
        $this->initVar('created', XOBJ_DTYPE_TIMESTAMP);
        $this->initVar('author_id', XOBJ_DTYPE_INT);
    }

    /**
     * Get form
     *
     * @param null
     * @return Quote\Form\QuotesForm
     */
    public function getForm()
    {
        $form = new Form\QuotesForm($this);
        return $form;
    }

    /**
     * @return array|null
     */
    public function getGroupsRead()
    {
        //$permHelper = new \Xmf\Module\Helper\Permission();
        return $this->permHelper->getGroupsForItem('sbcolumns_read', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsSubmit()
    {
        //$permHelper = new \Xmf\Module\Helper\Permission();
        return $this->permHelper->getGroupsForItem('sbcolumns_submit', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsModeration()
    {
        //$permHelper = new \Xmf\Module\Helper\Permission();
        return $this->permHelper->getGroupsForItem('sbcolumns_moderation', $this->getVar('id'));
    }
}

