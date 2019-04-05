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

/**
 * @param $options
 *
 * @return array
 */
function showQuoteAuthors($options)
{
    // require dirname(__DIR__) . '/class/authors.php';
    ///  $moduleDirName = basename(dirname(__DIR__));
    //$myts = \MyTextSanitizer::getInstance();

    $block        = [];
    $blockType    = $options[0];
    $authorsCount = $options[1];
    //$titleLenght = $options[2];

    /** @var \XoopsModules\Quote\Helper $helper */
    $helper = \XoopsModules\Quote\Helper::getInstance();
    $helper->loadLanguage('blocks');

    /** @var \XoopsPersistableObjectHandler $authorsHandler */
    $authorsHandler = $helper->getHandler('Authors');
    $criteria       = new \CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    if ($blockType) {
        $criteria->add(new \Criteria('id', 0, '!='));
        $criteria->setSort('id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($authorsCount);
    $authorsArray = $authorsHandler->getAll($criteria);
    foreach (array_keys($authorsArray) as $i) {
        $block[$i]['id']   = $authorsArray[$i]->getVar('id');
        $block[$i]['name'] = $authorsArray[$i]->getVar('name');
    }

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function editQuoteAuthors($options)
{
    //require dirname(__DIR__) . '/class/authors.php';
    // $moduleDirName = basename(dirname(__DIR__));

    $form = MB_QUOTE_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='" . $options[0] . "' />";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' type='text' />&nbsp;<br>";
    $form .= MB_QUOTE_TITLELENGTH . " : <input name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' type='text' /><br><br>";

    /** @var \XoopsModules\Quote\Helper $helper */
    $helper = \XoopsModules\Quote\Helper::getInstance();

    /** @var \XoopsPersistableObjectHandler $authorsHandler */
    $authorsHandler = $helper->getHandler('Authors');

    $criteria = new \CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('id', 0, '!='));
    $criteria->setSort('id');
    $criteria->setOrder('ASC');
    $authorsArray = $authorsHandler->getAll($criteria);
    $form         .= MB_QUOTE_CATTODISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form         .= "<option value='0' " . (false === in_array(0, $options, true) ? '' : "selected='selected'") . '>' . MB_QUOTE_ALLCAT . '</option>';
    foreach (array_keys($authorsArray) as $i) {
        $id   = $authorsArray[$i]->getVar('id');
        $form .= "<option value='" . $id . "' " . (false === in_array($id, $options, true) ? '' : "selected='selected'") . '>' . $authorsArray[$i]->getVar('name') . '</option>';
    }
    $form .= '</select>';

    return $form;
}
