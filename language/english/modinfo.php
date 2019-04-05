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
// Admin
define('MI_QUOTE_NAME', 'Quote');
define('MI_QUOTE_DESC', '&lt;p&gt;This module is for doing following...&lt;/p&gt;');
//Menu
define('MI_QUOTE_ADMENU1', 'Home');
define('MI_QUOTE_ADMENU2', 'Quote');
define('MI_QUOTE_ADMENU3', 'Category');
define('MI_QUOTE_ADMENU4', 'Author');
define('MI_QUOTE_ADMENU5', 'Feedback');
define('MI_QUOTE_ADMENU6', 'Migrate');
define('MI_QUOTE_ADMENU7', 'About');
//Blocks
define('MI_QUOTE_QUOTES_BLOCK', 'Quotes block');
define('MI_QUOTE_CATEGORY_BLOCK', 'Category block');
define('MI_QUOTE_AUTHORS_BLOCK', 'Authors block');
//Config
define('MI_QUOTE_EDITOR_ADMIN', 'Editor: Admin');
define('MI_QUOTE_EDITOR_ADMIN_DESC', 'Select the Editor to use by the Admin');
define('MI_QUOTE_EDITOR_USER', 'Editor: User');
define('MI_QUOTE_EDITOR_USER_DESC', 'Select the Editor to use by the User');
define('MI_QUOTE_KEYWORDS', 'Keywords');
define('MI_QUOTE_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
define('MI_QUOTE_ADMINPAGER', 'Admin: records / page');
define('MI_QUOTE_ADMINPAGER_DESC', 'Admin: # of records shown per page');
define('MI_QUOTE_USERPAGER', 'User: records / page');
define('MI_QUOTE_USERPAGER_DESC', 'User: # of records shown per page');
define('MI_QUOTE_MAXSIZE', 'Max size');
define('MI_QUOTE_MAXSIZE_DESC', 'Set a number of max size uploads file in byte');
define('MI_QUOTE_MIMETYPES', 'Mime Types');
define('MI_QUOTE_MIMETYPES_DESC', 'Set the mime types selected');
define('MI_QUOTE_IDPAYPAL', 'Paypal ID');
define('MI_QUOTE_IDPAYPAL_DESC', 'Insert here your PayPal ID for donactions.');
define('MI_QUOTE_ADVERTISE', 'Advertisement Code');
define('MI_QUOTE_ADVERTISE_DESC', 'Insert here the advertisement code');
define('MI_QUOTE_BOOKMARKS', 'Social Bookmarks');
define('MI_QUOTE_BOOKMARKS_DESC', 'Show Social Bookmarks in the form');
define('MI_QUOTE_FBCOMMENTS', 'Facebook comments');
define('MI_QUOTE_FBCOMMENTS_DESC', 'Allow Facebook comments in the form');
// Notifications
define('MI_QUOTE_GLOBAL_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_FILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_FILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_GLOBAL_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_CATEGORY_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_QUOTE_FILE_APPROVE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_QUOTE_FILE_APPROVE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_QUOTE_FILE_APPROVE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_QUOTE_FILE_APPROVE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');

// Help
define('MI_QUOTE_DIRNAME', basename(dirname(dirname(__DIR__))));
define('MI_QUOTE_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('MI_QUOTE_BACK_2_ADMIN', 'Back to Administration of ');
define('MI_QUOTE_OVERVIEW', 'Overview');
// The name of this module
//define('MI_QUOTE_NAME', 'YYYYY Module Name');

//define('MI_QUOTE_HELP_DIR', __DIR__);

//help multi-page
define('MI_QUOTE_DISCLAIMER', 'Disclaimer');
define('MI_QUOTE_LICENSE', 'License');
define('MI_QUOTE_SUPPORT', 'Support');
//define('MI_QUOTE_REQUIREMENTS', 'Requirements');
//define('MI_QUOTE_CREDITS', 'Credits');
//define('MI_QUOTE_HOWTO', 'How To');
//define('MI_QUOTE_UPDATE', 'Update');
//define('MI_QUOTE_INSTALL', 'Install');
//define('MI_QUOTE_HISTORY', 'History');
//define('MI_QUOTE_HELP1', 'YYYYY');
//define('MI_QUOTE_HELP2', 'YYYYY');
//define('MI_QUOTE_HELP3', 'YYYYY');
//define('MI_QUOTE_HELP4', 'YYYYY');
//define('MI_QUOTE_HELP5', 'YYYYY');
//define('MI_QUOTE_HELP6', 'YYYYY');

// Permissions Groups
define('MI_QUOTE_GROUPS', 'Groups access');
define('MI_QUOTE_GROUPS_DESC', 'Select general access permission for groups.');
define('MI_QUOTE_ADMINGROUPS', 'Admin Group Permissions');
define('MI_QUOTE_ADMINGROUPS_DESC', 'Which groups have access to tools and permissions page');

//define('MI_QUOTE_SHOW_SAMPLE_BUTTON', 'Import Sample Button?');
//define('MI_QUOTE_SHOW_SAMPLE_BUTTON_DESC', 'If yes, the "Add Sample Data" button will be visible to the Admin. It is Yes as a default for first installation.');

