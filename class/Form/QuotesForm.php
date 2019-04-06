<?php namespace XoopsModules\Quote\Form;

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

require_once dirname(dirname(__DIR__)) . '/include/common.php';

$moduleDirName = basename(dirname(dirname(__DIR__)));
//$helper = Quote\Helper::getInstance();
$permHelper = new \Xmf\Module\Helper\Permission();

xoops_load('XoopsFormLoader');

/**
 * Class QuotesForm
 */
class QuotesForm extends \XoopsThemeForm
{
    public $targetObject;
    public $helper;

    /**
     * Constructor
     *
     * @param $target
     */
    public function __construct($target)
    {
        $this->helper       = $target->helper;
        $this->targetObject = $target;

        $title = $this->targetObject->isNew() ? sprintf(AM_QUOTE_QUOTES_ADD) : sprintf(AM_QUOTE_QUOTES_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'), 'post', true);
        $this->setExtra('enctype="multipart/form-data"');

        //include ID field, it's needed so the module knows if it is a new form or an edited form

        $hidden = new \XoopsFormHidden('id', $this->targetObject->getVar('id'));
        $this->addElement($hidden);
        unset($hidden);

        // Id
        $this->addElement(new \XoopsFormLabel(AM_QUOTE_QUOTES_ID, $this->targetObject->getVar('id'), 'id'));
        // Cid
        //$categoryHandler = $this->helper->getHandler('Category');
        //$db     = \XoopsDatabaseFactory::getDatabaseConnection();
        /** @var \XoopsPersistableObjectHandler $categoryHandler */
        $categoryHandler = $this->helper->getHandler('Category');

        $category_id_select = new \XoopsFormSelect(AM_QUOTE_QUOTES_CID, 'cid', $this->targetObject->getVar('cid'));
        $category_id_select->addOptionArray($categoryHandler->getList());
        $this->addElement($category_id_select, false);
        // Quote
        if (class_exists('XoopsFormEditor')) {
            $editorOptions           = [];
            $editorOptions['name']   = 'quote';
            $editorOptions['value']  = $this->targetObject->getVar('quote', 'e');
            $editorOptions['rows']   = 5;
            $editorOptions['cols']   = 40;
            $editorOptions['width']  = '100%';
            $editorOptions['height'] = '400px';
            //$editorOptions['editor'] = xoops_getModuleOption('quote_editor', 'quote');
            //$this->addElement( new \XoopsFormEditor(AM_QUOTE_QUOTES_QUOTE, 'quote', $editorOptions), false  );
            if ($this->helper->isUserAdmin()) {
                $descEditor = new \XoopsFormEditor(AM_QUOTE_QUOTES_QUOTE, $this->helper->getConfig('quoteEditorAdmin'), $editorOptions, $nohtml = false, $onfailure = 'textarea');
            } else {
                $descEditor = new \XoopsFormEditor(AM_QUOTE_QUOTES_QUOTE, $this->helper->getConfig('quoteEditorUser'), $editorOptions, $nohtml = false, $onfailure = 'textarea');
            }
        } else {
            $descEditor = new \XoopsFormDhtmlTextArea(AM_QUOTE_QUOTES_QUOTE, 'description', $this->targetObject->getVar('description', 'e'), 5, 50);
        }
        $this->addElement($descEditor);
        // Author
        $this->addElement(new \XoopsFormText(AM_QUOTE_QUOTES_AUTHOR, 'author', 50, 255, $this->targetObject->getVar('author')), false);
        // Online
        $online       = $this->targetObject->isNew() ? 0 : $this->targetObject->getVar('online');
        $check_online = new \XoopsFormCheckBox(AM_QUOTE_QUOTES_ONLINE, 'online', $online);
        $check_online->addOption(1, ' ');
        $this->addElement($check_online);
        // Created
        $this->addElement(new \XoopsFormTextDateSelect(AM_QUOTE_QUOTES_CREATED, 'created', 0, strtotime($this->targetObject->getVar('created'))));
        // Author_id
        //$authorsHandler = $this->helper->getHandler('Authors');
        //$db     = \XoopsDatabaseFactory::getDatabaseConnection();
        /** @var \XoopsPersistableObjectHandler $authorsHandler */
        $authorsHandler = $this->helper->getHandler('Authors');

        $authors_id_select = new \XoopsFormSelect(AM_QUOTE_QUOTES_AUTHOR_ID, 'author_id', $this->targetObject->getVar('author_id'));
        $authors_id_select->addOptionArray($authorsHandler->getList());
        $this->addElement($authors_id_select, false);

        $this->addElement(new \XoopsFormHidden('op', 'save'));
        $this->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
