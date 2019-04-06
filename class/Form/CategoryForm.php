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
 * Class CategoryForm
 */
class CategoryForm extends \XoopsThemeForm
{
    public $targetObject;

    /**
     * Constructor
     *
     * @param $target
     */
    public function __construct($target)
    {
        //  global $helper;
        $this->helper       = $target->helper;
        $this->targetObject = $target;

        $title = $this->targetObject->isNew() ? sprintf(AM_QUOTE_CATEGORY_ADD) : sprintf(AM_QUOTE_CATEGORY_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'), 'post', true);
        $this->setExtra('enctype="multipart/form-data"');

        //include ID field, it's needed so the module knows if it is a new form or an edited form

        $hidden = new \XoopsFormHidden('id', $this->targetObject->getVar('id'));
        $this->addElement($hidden);
        unset($hidden);

        // Id
        $this->addElement(new \XoopsFormLabel(AM_QUOTE_CATEGORY_ID, $this->targetObject->getVar('id'), 'id'));
        // Pid
        require_once XOOPS_ROOT_PATH . '/class/tree.php';
        //$categoryHandler = xoops_getModuleHandler('category', 'quote' );
        $db = \XoopsDatabaseFactory::getDatabaseConnection();
        /** @var \XoopsPersistableObjectHandler $categoryHandler */
        $categoryHandler = $this->helper->getHandler('Category');

        $criteria      = new \CriteriaCompo();
        $categoryArray = $categoryHandler->getObjects($criteria);
        if ($categoryArray) {

            $categoryTree = new \XoopsObjectTree($categoryArray, 'id', 'pid');

            if (Quote\Utility::checkVerXoops($GLOBALS['xoopsModule'], '2.5.9')) {
                $categoryPid = $categoryTree->makeSelectElement('pid', 'title', '--', $this->targetObject->getVar('pid'), true, 0, '', AM_QUOTE_CATEGORY_PID);
                $this->addElement($categoryPid);
            } else {
                $categoryPid = $categoryTree->makeSelBox('pid', 'title', '--', $this->targetObject->getVar('pid', 'e'), true);
                $this->addElement(new \XoopsFormLabel (AM_QUOTE_CATEGORY_PID, $categoryPid));
            }

        }
        // Title
        $this->addElement(new \XoopsFormText(AM_QUOTE_CATEGORY_TITLE, 'title', 50, 255, $this->targetObject->getVar('title')), false);
        // Description
        if (class_exists('XoopsFormEditor')) {
            $editorOptions           = [];
            $editorOptions['name']   = 'description';
            $editorOptions['value']  = $this->targetObject->getVar('description', 'e');
            $editorOptions['rows']   = 5;
            $editorOptions['cols']   = 40;
            $editorOptions['width']  = '100%';
            $editorOptions['height'] = '400px';
            //$editorOptions['editor'] = xoops_getModuleOption('quote_editor', 'quote');
            //$this->addElement( new \XoopsFormEditor(AM_QUOTE_CATEGORY_DESCRIPTION, 'description', $editorOptions), false  );
            if ($this->helper->isUserAdmin()) {
                $descEditor = new \XoopsFormEditor(AM_QUOTE_CATEGORY_DESCRIPTION, $this->helper->getConfig('quoteEditorAdmin'), $editorOptions, $nohtml = false, $onfailure = 'textarea');
            } else {
                $descEditor = new \XoopsFormEditor(AM_QUOTE_CATEGORY_DESCRIPTION, $this->helper->getConfig('quoteEditorUser'), $editorOptions, $nohtml = false, $onfailure = 'textarea');
            }
        } else {
            $descEditor = new \XoopsFormDhtmlTextArea(AM_QUOTE_CATEGORY_DESCRIPTION, 'description', $this->targetObject->getVar('description', 'e'), '100%', '100%');
        }
        $this->addElement($descEditor);
        // Image
        $image = $this->targetObject->getVar('image') ?: 'blank.png';

        $uploadDir   = '/uploads/quote/images/';
        $imgtray     = new \XoopsFormElementTray(AM_QUOTE_CATEGORY_IMAGE, '<br>');
        $imgpath     = sprintf(AM_QUOTE_FORMIMAGE_PATH, $uploadDir);
        $imageselect = new \XoopsFormSelect($imgpath, 'image', $image);
        $imageArray  = \XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . $uploadDir);
        foreach ($imageArray as $image) {
            $imageselect->addOption((string)$image, $image);
        }
        $imageselect->setExtra("onchange='showImgSelected(\"image_image\", \"image\", \"" . $uploadDir . '", "", "' . XOOPS_URL . "\")'");
        $imgtray->addElement($imageselect);
        $imgtray->addElement(new \XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $uploadDir . '/' . $image . "' name='image_image' id='image_image' alt='' style='max-width:300px' />"));
        $fileseltray = new \XoopsFormElementTray('', '<br>');
        $fileseltray->addElement(new \XoopsFormFile(AM_QUOTE_FORMUPLOAD, 'image', $this->helper->getConfig('maxsize')));
        $fileseltray->addElement(new \XoopsFormLabel(''));
        $imgtray->addElement($fileseltray);
        $this->addElement($imgtray);
        // Weight
        $this->addElement(new \XoopsFormText(AM_QUOTE_CATEGORY_WEIGHT, 'weight', 50, 255, $this->targetObject->getVar('weight')), false);
        // Color
        $this->addElement(new \XoopsFormColorPicker(AM_QUOTE_CATEGORY_COLOR, 'color', $this->targetObject->getVar('color')), false);
        // Online
        $online       = $this->targetObject->isNew() ? 0 : $this->targetObject->getVar('online');
        $check_online = new \XoopsFormCheckBox(AM_QUOTE_CATEGORY_ONLINE, 'online', $online);
        $check_online->addOption(1, ' ');
        $this->addElement($check_online);

        //permissions
        /** @var \XoopsMemberHandler $memberHandler */
        $memberHandler = xoops_getHandler('member');
        $groupList     = $memberHandler->getGroupList();
        /** @var \XoopsGroupPermHandler $grouppermHandler */
        $grouppermHandler = xoops_getHandler('groupperm');
        $fullList         = array_keys($groupList);

        //========================================================================

        $mid            = $GLOBALS['xoopsModule']->mid();
        $groupIdAdmin   = 0;
        $groupNameAdmin = '';

        // create admin checkbox
        foreach ($groupList as $groupId => $groupName) {
            if (XOOPS_GROUP_ADMIN == $groupId) {
                $groupIdAdmin   = $groupId;
                $groupNameAdmin = $groupName;
            }
        }

        $selectPermAdmin = new \XoopsFormCheckBox('', 'admin', XOOPS_GROUP_ADMIN);
        $selectPermAdmin->addOption($groupIdAdmin, $groupNameAdmin);
        $selectPermAdmin->setExtra("disabled='disabled'"); //comment it out, if you want to allow to remove permissions for the admin

        // ********************************************************
        // permission view items
        $cat_gperms_read     = $grouppermHandler->getGroupIds('quote_view', $this->targetObject->getVar('id'), $mid);
        $arr_cat_gperms_read = $this->targetObject->isNew() ? '0' : $cat_gperms_read;

        $permsTray = new \XoopsFormElementTray(AM_QUOTE_PERMISSIONS_VIEW, '');

        $selectAllReadCheckbox = new \XoopsFormCheckBox('', 'adminbox1', 1);
        $selectAllReadCheckbox->addOption('allbox', _AM_SYSTEM_ALL);
        $selectAllReadCheckbox->setExtra(" onclick='xoopsCheckGroup(\"form\", \"adminbox1\" , \"groupsRead[]\");' ");
        $selectAllReadCheckbox->setClass('xo-checkall');
        $permsTray->addElement($selectAllReadCheckbox);

        // checkbox webmaster
        $permsTray->addElement($selectPermAdmin, false);
        // checkboxes other groups
        //$selectPerm = new \XoopsFormCheckBox('', 'cat_gperms_read', $arr_cat_gperms_read);
        //$selectPerm = new \XoopsFormCheckBox('', 'groupsRead[]', $this->targetObject->getGroupsRead());
        $selectPerm = new \XoopsFormCheckBox('', 'groupsRead[]', $arr_cat_gperms_read);
        foreach ($groupList as $groupId => $groupName) {
            if (XOOPS_GROUP_ADMIN != $groupId) {
                $selectPerm->addOption($groupId, $groupName);
            }
        }
        $permsTray->addElement($selectPerm, false);
        $this->addElement($permsTray, false);
        unset($permsTray, $selectPerm);

        // ********************************************************
        // permission submit item
        $cat_gperms_create     = $grouppermHandler->getGroupIds('quote_submit', $this->targetObject->getVar('id'), $mid);
        $arr_cat_gperms_create = $this->targetObject->isNew() ? '0' : $cat_gperms_create;

        $permsTray = new \XoopsFormElementTray(AM_QUOTE_PERMISSIONS_SUBMIT, '');

        $selectAllSubmitCheckbox = new \XoopsFormCheckBox('', 'adminbox2', 1);
        $selectAllSubmitCheckbox->addOption('allbox', _AM_SYSTEM_ALL);
        $selectAllSubmitCheckbox->setExtra(" onclick='xoopsCheckGroup(\"form\", \"adminbox2\" , \"groupsSubmit[]\");' ");
        $selectAllSubmitCheckbox->setClass('xo-checkall');
        $permsTray->addElement($selectAllSubmitCheckbox);

        // checkbox webmaster
        $permsTray->addElement($selectPermAdmin, false);
        // checkboxes other groups
        //$selectPerm = new \XoopsFormCheckBox('', 'cat_gperms_create', $arr_cat_gperms_create);
        $selectPerm = new \XoopsFormCheckBox('', 'groupsSubmit[]', $arr_cat_gperms_create);
        foreach ($groupList as $groupId => $groupName) {
            if (XOOPS_GROUP_ADMIN != $groupId) {
                $selectPerm->addOption($groupId, $groupName);
            }
        }
        $permsTray->addElement($selectPerm, false);
        $this->addElement($permsTray, false);
        unset($permsTray, $selectPerm);

        // ********************************************************
        // permission approve items
        $cat_gperms_admin     = $grouppermHandler->getGroupIds('quote_approve', $this->targetObject->getVar('id'), $mid);
        $arr_cat_gperms_admin = $this->targetObject->isNew() ? '0' : $cat_gperms_admin;

        $permsTray = new \XoopsFormElementTray(AM_QUOTE_PERMISSIONS_APPROVE, '');

        $selectAllModerateCheckbox = new \XoopsFormCheckBox('', 'adminbox3', 1);
        $selectAllModerateCheckbox->addOption('allbox', _AM_SYSTEM_ALL);
        $selectAllModerateCheckbox->setExtra(" onclick='xoopsCheckGroup(\"form\", \"adminbox3\" , \"groupsModeration[]\");' ");
        $selectAllModerateCheckbox->setClass('xo-checkall');
        $permsTray->addElement($selectAllModerateCheckbox);

        // checkbox webmaster
        $permsTray->addElement($selectPermAdmin, false);
        // checkboxes other groups
        //$selectPerm = new \XoopsFormCheckBox('', 'cat_gperms_admin', $arr_cat_gperms_admin);
        $selectPerm = new \XoopsFormCheckBox('', 'groupsModeration[]', $arr_cat_gperms_admin);
        foreach ($groupList as $groupId => $groupName) {
            if (XOOPS_GROUP_ADMIN != $groupId && XOOPS_GROUP_ANONYMOUS != $groupId) {
                $selectPerm->addOption($groupId, $groupName);
            }
        }
        $permsTray->addElement($selectPerm, false);
        $this->addElement($permsTray, false);
        unset($permsTray, $selectPerm);

        //=========================================================================        
        $this->addElement(new \XoopsFormHidden('op', 'save'));
        $this->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
