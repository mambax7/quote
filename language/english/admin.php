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

//Index
define('AM_QUOTE_STATISTICS', 'Quote statistics');
define('AM_QUOTE_THEREARE_QUOTE', "There are <span class='bold'>%s</span> Quote in the database");
define('AM_QUOTE_THEREARE_CATEGORY', "There are <span class='bold'>%s</span> Category in the database");
define('AM_QUOTE_THEREARE_AUTHOR', "There are <span class='bold'>%s</span> Author in the database");
//Buttons
define('AM_QUOTE_ADD_QUOTES', 'Add new Quote');
define('AM_QUOTE_QUOTES_LIST', 'List of Quote');
define('AM_QUOTE_ADD_CATEGORY', 'Add new Category');
define('AM_QUOTE_CATEGORY_LIST', 'List of Category');
define('AM_QUOTE_ADD_AUTHORS', 'Add new Author');
define('AM_QUOTE_AUTHORS_LIST', 'List of Author');
//General
define('AM_QUOTE_FORMOK', 'Registered successfull');
define('AM_QUOTE_FORMDELOK', 'Deleted successfull');
define('AM_QUOTE_FORMSUREDEL', "Are you sure to Delete: <span class='bold red'>%s</span></b>");
define('AM_QUOTE_FORMSURERENEW', "Are you sure to Renew: <span class='bold red'>%s</span></b>");
define('AM_QUOTE_FORMUPLOAD', 'Upload');
define('AM_QUOTE_FORMIMAGE_PATH', 'File presents in %s');
define('AM_QUOTE_FORM_ACTION', 'Action');
define('AM_QUOTE_SELECT', 'Select action for selected item(s)');
define('AM_QUOTE_SELECTED_DELETE', 'Delete selected item(s)');
define('AM_QUOTE_SELECTED_ACTIVATE', 'Activate selected item(s)');
define('AM_QUOTE_SELECTED_DEACTIVATE', 'De-activate selected item(s)');
define('AM_QUOTE_SELECTED_ERROR', 'You selected nothing to delete');
define('AM_QUOTE_CLONED_OK', 'Record cloned successfully');
define('AM_QUOTE_CLONED_FAILED', 'Cloning of the record has failed');

// Quotes
define('AM_QUOTE_QUOTES_ADD', 'Add a quotes');
define('AM_QUOTE_QUOTES_EDIT', 'Edit quotes');
define('AM_QUOTE_QUOTES_DELETE', 'Delete quotes');
define('AM_QUOTE_QUOTES_ID', 'ID');
define('AM_QUOTE_QUOTES_CID', 'Category');
define('AM_QUOTE_QUOTES_QUOTE', 'Quote');
define('AM_QUOTE_QUOTES_AUTHOR', 'Author');
define('AM_QUOTE_QUOTES_ONLINE', 'Online');
define('AM_QUOTE_QUOTES_CREATED', 'Created');
define('AM_QUOTE_QUOTES_AUTHOR_ID', 'Author');
// Category
define('AM_QUOTE_CATEGORY_ADD', 'Add a category');
define('AM_QUOTE_CATEGORY_EDIT', 'Edit category');
define('AM_QUOTE_CATEGORY_DELETE', 'Delete category');
define('AM_QUOTE_CATEGORY_ID', 'ID');
define('AM_QUOTE_CATEGORY_PID', 'Category');
define('AM_QUOTE_CATEGORY_TITLE', 'Title');
define('AM_QUOTE_CATEGORY_DESCRIPTION', 'Description');
define('AM_QUOTE_CATEGORY_IMAGE', 'Image');
define('AM_QUOTE_CATEGORY_WEIGHT', 'Weight');
define('AM_QUOTE_CATEGORY_COLOR', 'Color');
define('AM_QUOTE_CATEGORY_ONLINE', 'Online');
// Authors
define('AM_QUOTE_AUTHORS_ADD', 'Add a authors');
define('AM_QUOTE_AUTHORS_EDIT', 'Edit authors');
define('AM_QUOTE_AUTHORS_DELETE', 'Delete authors');
define('AM_QUOTE_AUTHORS_ID', 'ID');
define('AM_QUOTE_AUTHORS_NAME', 'Name');
define('AM_QUOTE_AUTHORS_COUNTRY', 'Country');
define('AM_QUOTE_AUTHORS_BIO', 'Bio');
define('AM_QUOTE_AUTHORS_PHOTO', 'Photo');
define('AM_QUOTE_AUTHORS_CREATED', 'Created');
//Blocks.php
//Permissions
define('AM_QUOTE_PERMISSIONS_GLOBAL', 'Global permissions');
define('AM_QUOTE_PERMISSIONS_GLOBAL_DESC', 'Only users in the group that you select may global this');
define('AM_QUOTE_PERMISSIONS_GLOBAL_4', 'Rate from user');
define('AM_QUOTE_PERMISSIONS_GLOBAL_8', 'Submit from user side');
define('AM_QUOTE_PERMISSIONS_GLOBAL_16', 'Auto approve');
define('AM_QUOTE_PERMISSIONS_APPROVE', 'Permissions to approve');
define('AM_QUOTE_PERMISSIONS_APPROVE_DESC', 'Only users in the group that you select may approve this');
define('AM_QUOTE_PERMISSIONS_VIEW', 'Permissions to view');
define('AM_QUOTE_PERMISSIONS_VIEW_DESC', 'Only users in the group that you select may view this');
define('AM_QUOTE_PERMISSIONS_SUBMIT', 'Permissions to submit');
define('AM_QUOTE_PERMISSIONS_SUBMIT_DESC', 'Only users in the group that you select may submit this');
define('AM_QUOTE_PERMISSIONS_GPERMUPDATED', 'Permissions have been changed successfully');
define('AM_QUOTE_PERMISSIONS_NOPERMSSET', 'Permission cannot be set: No authors created yet! Please create a authors first.');

//Errors
define('AM_QUOTE_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
define('AM_QUOTE_UPGRADEFAILED1', "Update failed - couldn't add new fields");
define('AM_QUOTE_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
define('AM_QUOTE_ERROR_COLUMN', 'Could not create column in database : %s');
define('AM_QUOTE_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
define('AM_QUOTE_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
define('AM_QUOTE_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');
//directories
define('AM_QUOTE_AVAILABLE', "<span style='color : #008000;'>Available. </span>");
define('AM_QUOTE_NOTAVAILABLE', "<span style='color : #ff0000;'>is not available. </span>");
define('AM_QUOTE_NOTWRITABLE', "<span style='color : #ff0000;'>" . ' should have permission ( %1$d ), but it has ( %2$d )' . '</span>');
define('AM_QUOTE_CREATETHEDIR', 'Create it');
define('AM_QUOTE_SETMPERM', 'Set the permission');
define('AM_QUOTE_DIRCREATED', 'The directory has been created');
define('AM_QUOTE_DIRNOTCREATED', 'The directory can not be created');
define('AM_QUOTE_PERMSET', 'The permission has been set');
define('AM_QUOTE_PERMNOTSET', 'The permission can not be set');
define('AM_QUOTE_VIDEO_EXPIREWARNING', 'The publishing date is after expiration date!!!');
//Sample Data
define('AM_QUOTE_ADD_SAMPLEDATA', 'Import Sample Data (will delete ALL current data)');
define('AM_QUOTE_SAMPLEDATA_SUCCESS', 'Sample Date uploaded successfully');

//Error NoFrameworks
define('_AM_ERROR_NOFRAMEWORKS', 'Error: You don&#39;t use the Frameworks \'admin module\'. Please install this Frameworks');
define('AM_QUOTE_MAINTAINEDBY', 'is maintained by the');
