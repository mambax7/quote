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

use Xmf\Yaml;
use XoopsModules\Quote;
use XoopsModules\Quote\Common;

require __DIR__ . '/admin_header.php';
xoops_cp_header();
$adminObject = \Xmf\Module\Admin::getInstance();
//count "total Quotes"
/** @var \XoopsPersistableObjectHandler $quotesHandler */
$totalQuotes = $quotesHandler->getCount();
//count "total Category"
/** @var \XoopsPersistableObjectHandler $categoryHandler */
$totalCategory = $categoryHandler->getCount();
//count "total Authors"
/** @var \XoopsPersistableObjectHandler $authorsHandler */
$totalAuthors = $authorsHandler->getCount();
// InfoBox Statistics
$adminObject->addInfoBox(AM_QUOTE_STATISTICS);

// InfoBox quotes
$adminObject->addInfoBoxLine(sprintf(AM_QUOTE_THEREARE_QUOTE, $totalQuotes));

// InfoBox category
$adminObject->addInfoBoxLine(sprintf(AM_QUOTE_THEREARE_CATEGORY, $totalCategory));

// InfoBox authors
$adminObject->addInfoBoxLine(sprintf(AM_QUOTE_THEREARE_AUTHOR, $totalAuthors));
// Render Index
$adminObject->displayNavigation(basename(__FILE__));

//------------- Test Data ----------------------------

if ($helper->getConfig('displaySampleButton')) {
    $yamlFile            = dirname(__DIR__) . '/config/admin.yml';
    $config              = loadAdminConfig($yamlFile);
    $displaySampleButton = $config['displaySampleButton'];

    if (1 == $displaySampleButton) {
        xoops_loadLanguage('admin/modulesadmin', 'system');
        require __DIR__ . '/../testdata/index.php';

        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'ADD_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=load', 'add');
        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'SAVE_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=save', 'add');
        //    $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'EXPORT_SCHEMA'), '__DIR__ . /../../testdata/index.php?op=exportschema', 'add');
        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'HIDE_SAMPLEDATA_BUTTONS'), '?op=hide_buttons', 'delete');
    } else {
        $adminObject->addItemButton(constant('CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLEDATA_BUTTONS'), '?op=show_buttons', 'add');
        $displaySampleButton = $config['displaySampleButton'];
    }
    $adminObject->displayButton('left', '');;
}

//------------- End Test Data ----------------------------

$adminObject->displayIndex();

function loadAdminConfig($yamlFile)
{
    $config = Yaml::loadWrapped($yamlFile); // work with phpmyadmin YAML dumps
    return $config;
}

function hideButtons($yamlFile)
{
    $app                        = [];
    $app['displaySampleButton'] = 0;
    Yaml::save($app, $yamlFile);
    redirect_header('index.php', 0, '');
}

function showButtons($yamlFile)
{
    $app                        = [];
    $app['displaySampleButton'] = 1;
    Yaml::save($app, $yamlFile);
    redirect_header('index.php', 0, '');
}

$op = \Xmf\Request::getString('op', 0, 'GET');

switch ($op) {
    case 'hide_buttons':
        hideButtons($yamlFile);
        break;
    case 'show_buttons':
        showButtons($yamlFile);
        break;
}

echo $utility::getServerStats();

//codeDump(__FILE__);
require __DIR__ . '/admin_footer.php';
