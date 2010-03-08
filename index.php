<?
/***********************************************************************************************
****
**** Author: Eric A. Bonney
**** Filename: index.php
**** Date: June 4, 2009
**** Description: Login file for the web interface for KMyMoney
****
************************************************************************************************/
require_once "HTML/Template/IT.php";
require_once "browscap/Browscap.php";

// Create a new template, and specify that the template files are
// in the same directory as the as the php files.
$template = new HTML_Template_IT( "./templates" );

// Load the history template file
$template->loadTemplatefile( "index.tpl", true, true );

// Creates a new Browscap object (loads or creates the cache)
$bc = new Browscap('/usr/share/php/browscap/cache');

// Gets information about the current browser's user agent
$current_browser = $bc->getBrowser();

$template->setCurrentBlock( "CSSSELECTION" );

if( $current_browser->browser_name == "Mozilla/4.0 (compatible; MSIE 6.0; Windows CE; IEMobile 8.12; MSIEMobile 6.0) Sprint Treo850e" )
	$template->setVariable( "CSSFORMAT", "webkmymoney_mobile.css" );
else
	$template->setVariable( "CSSFORMAT", "webkmymoney.css" );

$template->parseCurrentBlock();

session_start();
session_destroy();

// Show the webpage.
$template->show();
?>