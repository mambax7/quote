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
$moduleDirName      = basename(__DIR__);
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

$modversion = [
    'version'             => 1.0,
    'module_status'       => 'Beta 1',
    'release_date'        => '2019/04/05',
    'name'                => MI_QUOTE_NAME,
    'description'         => MI_QUOTE_DESC,
    'release'             => '2017-12-29',
    'author'              => 'XOOPS Development Team',
    'author_mail'         => 'name@site.com',
    'author_website_url'  => 'https://xoops.org',
    'author_website_name' => 'XOOPS Project',
    'credits'             => 'XOOPS Development Team',
    //    'license' => 'GPL 2.0 or later',
    'help'                => 'page=help',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',

    'release_info' => 'release_info',
    'release_file' => XOOPS_URL . "/modules/{$moduleDirName}/docs/release_info file",

    'manual'              => 'Installation.txt',
    'manual_file'         => XOOPS_URL . "/modules/{$moduleDirName}/docs/link to manual file",
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.5'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => $moduleDirName,
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    //About
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    // Admin system menu
    'system_menu'         => 1,
    // Admin things
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // Menu
    'hasMain'             => 1,
    // Scripts to run upon installation or update
    'onInstall'           => 'include/oninstall.php',
    'onUpdate'            => 'include/onupdate.php',
    'onUninstall'         => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'             => ['mysql' => 'sql/mysql.sql'],
    // ------------------- Tables ----------------------------
    'tables'              => [
        $moduleDirName . '_' . 'quotes',
        $moduleDirName . '_' . 'category',
        $moduleDirName . '_' . 'authors',
    ],
];
// ------------------- Search -----------------------------//
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'quote_search';
//  ------------------- Comments -----------------------------//
$modversion['hasComments']          = 1;
$modversion['comments']['itemName'] = 'com_id';
$modversion['comments']['pageName'] = 'comments.php';
// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'quoteCommentsApprove';
$modversion['comments']['callback']['update']  = 'quoteCommentsUpdate';
//  ------------------- Templates -----------------------------//
$modversion['templates'][] = [
    'file'        => 'quote_header.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'quote_index.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'quote_quotes.tpl',
    'description' => ''
];

$modversion['templates'][] = [
    'file'        => 'quote_quotes_list0.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'quote_category.tpl',
    'description' => ''
];

$modversion['templates'][] = [
    'file'        => 'quote_category_list0.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'quote_authors.tpl',
    'description' => ''
];

$modversion['templates'][] = [
    'file'        => 'quote_authors_list0.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'quote_footer.tpl',
    'description' => ''
];

$modversion['templates'][] = [
    'file'        => 'admin/quote_admin_about.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'admin/quote_admin_help.tpl',
    'description' => ''
];
$modversion['templates'][] = [
    'file'        => 'admin/quote_admin_authors.tpl',
    'description' => ''
];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    [
        'name' => MI_QUOTE_OVERVIEW,
        'link' => 'page=help'
    ],
    [
        'name' => MI_QUOTE_DISCLAIMER,
        'link' => 'page=disclaimer'
    ],
    [
        'name' => MI_QUOTE_LICENSE,
        'link' => 'page=license'
    ],
    [
        'name' => MI_QUOTE_SUPPORT,
        'link' => 'page=support'
    ],

    //    ['name' => MI_QUOTE_HELP1, 'link' => 'page=help1'],
    //    ['name' => MI_QUOTE_HELP2, 'link' => 'page=help2']
    //    ['name' => MI_QUOTE_HELP3, 'link' => 'page=help3'],
    //    ['name' => MI_QUOTE_HELP4, 'link' => 'page=help4'],
    //    ['name' => MI_QUOTE_HOWTO, 'link' => 'page=__howto'],
    //    ['name' => MI_QUOTE_REQUIREMENTS, 'link' => 'page=__requirements'],
    //    ['name' => MI_QUOTE_CREDITS, 'link' => 'page=__credits'],

];

// ------------------- Blocks -----------------------------//
$modversion['blocks'][] = [
    'file'        => 'quotes.php',
    'name'        => MI_QUOTE_QUOTES_BLOCK,
    'description' => '',
    'show_func'   => 'showQuoteQuotes',
    'edit_func'   => 'editQuoteQuotes',
    'options'     => '|5|25|0',
    'template'    => 'quote_quotes_block.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'category.php',
    'name'        => MI_QUOTE_CATEGORY_BLOCK,
    'description' => '',
    'show_func'   => 'showQuoteCategory',
    'edit_func'   => 'editQuoteCategory',
    'options'     => '|5|25|0',
    'template'    => 'quote_category_block.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'authors.php',
    'name'        => MI_QUOTE_AUTHORS_BLOCK,
    'description' => '',
    'show_func'   => 'showQuoteAuthors',
    'edit_func'   => 'editQuoteAuthors',
    'options'     => '|5|25|0',
    'template'    => 'quote_authors_block.tpl'
];

// ------------------- Config Options -----------------------------//
xoops_load('xoopseditorhandler');
$editorHandler          = \XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'quoteEditorAdmin',
    'title'       => 'MI_QUOTE_EDITOR_ADMIN',
    'description' => 'MI_QUOTE_EDITOR_DESC_ADMIN',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'tinymce'
];

$modversion['config'][] = [
    'name'        => 'quoteEditorUser',
    'title'       => 'MI_QUOTE_EDITOR_USER',
    'description' => 'MI_QUOTE_EDITOR_DESC_USER',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'dhtmltextarea'
];

// -------------- Get groups --------------
/** @var \XoopsMemberHandler $memberHandler */
$memberHandler = xoops_getHandler('member');
$xoopsGroups   = $memberHandler->getGroupList();
foreach ($xoopsGroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = [
    'name'        => 'groups',
    'title'       => 'MI_QUOTE_GROUPS',
    'description' => 'MI_QUOTE_GROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $groups,
    'default'     => $groups
];

// -------------- Get Admin groups --------------
$criteria = new \CriteriaCompo ();
$criteria->add(new \Criteria ('group_type', 'Admin'));
/** @var \XoopsMemberHandler $memberHandler */
$memberHandler    = xoops_getHandler('member');
$adminXoopsGroups = $memberHandler->getGroupList($criteria);
foreach ($adminXoopsGroups as $key => $adminGroup) {
    $admin_groups[$adminGroup] = $key;
}
$modversion['config'][] = [
    'name'        => 'admin_groups',
    'title'       => 'MI_QUOTE_ADMINGROUPS',
    'description' => 'MI_QUOTE_ADMINGROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $admin_groups,
    'default'     => $admin_groups
];

$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => 'MI_QUOTE_KEYWORDS',
    'description' => 'MI_QUOTE_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'quote,quotes, category, authors'
];

// --------------Uploads : maxsize of image --------------
$modversion['config'][] = [
    'name'        => 'maxsize',
    'title'       => 'MI_QUOTE_MAXSIZE',
    'description' => 'MI_QUOTE_MAXSIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 5000000
];

// --------------Uploads : mimetypes of image --------------
$modversion['config'][] = [
    'name'        => 'mimetypes',
    'title'       => 'MI_QUOTE_MIMETYPES',
    'description' => 'MI_QUOTE_MIMETYPES_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => [
        'image/gif',
        'image/jpeg',
        'image/png'
    ],
    'options'     => [
        'bmp'   => 'image/bmp',
        'gif'   => 'image/gif',
        'pjpeg' => 'image/pjpeg',
        'jpeg'  => 'image/jpeg',
        'jpg'   => 'image/jpg',
        'jpe'   => 'image/jpe',
        'png'   => 'image/png'
    ]
];

$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => 'MI_QUOTE_ADMINPAGER',
    'description' => 'MI_QUOTE_ADMINPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'userpager',
    'title'       => 'MI_QUOTE_USERPAGER',
    'description' => 'MI_QUOTE_USERPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'advertise',
    'title'       => 'MI_QUOTE_ADVERTISE',
    'description' => 'MI_QUOTE_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
];

$modversion['config'][] = [
    'name'        => 'bookmarks',
    'title'       => 'MI_QUOTE_BOOKMARKS',
    'description' => 'MI_QUOTE_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'fbcomments',
    'title'       => 'MI_QUOTE_FBCOMMENTS',
    'description' => 'MI_QUOTE_FBCOMMENTS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

// Truncate Max. length 
$modversion['config'][] = [
    'name'        => 'truncatelength',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'TRUNCATE_LENGTH',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'TRUNCATE_LENGTH_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 100
];

/**
 * Make Sample button visible?
 */
$modversion['config'][] = [
    'name'        => 'displaySampleButton',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];

/**
 * Show Developer Tools?
 */
$modversion['config'][] = [
    'name'        => 'displayDeveloperTools',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_DEV_TOOLS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];

// -------------- Notifications quote --------------
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'quote_notify_iteminfo';

$modversion['notification']['category'][] = [
    'name'           => 'global',
    'title'          => MI_QUOTE_GLOBAL_NOTIFY,
    'description'    => MI_QUOTE_GLOBAL_NOTIFY_DESC,
    'subscribe_from' => [
        'index.php',
        'viewcat.php',
        'singlefile.php'
    ]
];

$modversion['notification']['category'][] = [
    'name'           => 'category',
    'title'          => MI_QUOTE_CATEGORY_NOTIFY,
    'description'    => MI_QUOTE_CATEGORY_NOTIFY_DESC,
    'subscribe_from' => [
        'viewcat.php',
        'singlefile.php'
    ],
    'item_name'      => 'cid',
    'allow_bookmark' => 1
];

$modversion['notification']['category'][] = [
    'name'           => 'file',
    'title'          => MI_QUOTE_FILE_NOTIFY,
    'description'    => MI_QUOTE_FILE_NOTIFY_DESC,
    'subscribe_from' => 'singlefile.php',
    'item_name'      => 'lid',
    'allow_bookmark' => 1
];

$modversion['notification']['event'][] = [
    'name'          => 'new_category',
    'category'      => 'global',
    'title'         => MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY,
    'caption'       => MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY_DESC,
    'mail_template' => 'global_newcategory_notify',
    'mail_subject'  => MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_modify',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY,
    'caption'       => MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY_DESC,
    'mail_template' => 'global_filemodify_notify',
    'mail_subject'  => MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_broken',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY,
    'caption'       => MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY_DESC,
    'mail_template' => 'global_filebroken_notify',
    'mail_subject'  => MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_submit',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY,
    'caption'       => MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'global_filesubmit_notify',
    'mail_subject'  => MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'new_file',
    'category'      => 'global',
    'title'         => MI_QUOTE_GLOBAL_NEWFILE_NOTIFY,
    'caption'       => MI_QUOTE_GLOBAL_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_GLOBAL_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'global_newfile_notify',
    'mail_subject'  => MI_QUOTE_GLOBAL_NEWFILE_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_submit',
    'category'      => 'category',
    'admin_only'    => 1,
    'title'         => MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY,
    'caption'       => MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'category_filesubmit_notify',
    'mail_subject'  => MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'new_file',
    'category'      => 'category',
    'title'         => MI_QUOTE_CATEGORY_NEWFILE_NOTIFY,
    'caption'       => MI_QUOTE_CATEGORY_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_CATEGORY_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'category_newfile_notify',
    'mail_subject'  => MI_QUOTE_CATEGORY_NEWFILE_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'approve',
    'category'      => 'file',
    'admin_only'    => 1,
    'title'         => MI_QUOTE_FILE_APPROVE_NOTIFY,
    'caption'       => MI_QUOTE_FILE_APPROVE_NOTIFY_CAPTION,
    'description'   => MI_QUOTE_FILE_APPROVE_NOTIFY_DESC,
    'mail_template' => 'file_approve_notify',
    'mail_subject'  => MI_QUOTE_FILE_APPROVE_NOTIFY_SUBJECT
];
