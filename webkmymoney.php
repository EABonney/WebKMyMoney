<?
/***********************************************************************************************
****
**** Author: Eric A. Bonney
**** Filename: webkmymoney.php
**** Date: May 31, 2009
**** Modified: June 4, 2009
**** Description: Main implementation file of the web interface for KMyMoney
****
************************************************************************************************/
require_once "HTML/Template/IT.php";
require_once "browscap/Browscap.php";
include "db.inc";

// Get the login credentials passed to us from the login form
$userName = $_POST["username"];
$databaseName = $_POST["database"];
$password = $_POST["password"];
$hostName = "localhost";

//Start a new session or find an existing one, then fill in the user supplied UserName, DatabaseName and PassWord.
session_start();
if( $_SESSION["loggedin"] != true )
{
	$_SESSION["UserName"] = $userName;
	$_SESSION["DatabaseName"] = $databaseName;
	$_SESSION["PassWord"] = $password;
	$_SESSION["HostName"] = $hostName;
	$_SESSION["loggedin"] = true;
}
else
{
	$userName = $_SESSION["UserName"];
	$databaseName = $_SESSION["DatabaseName"]; 
	$password = $_SESSION["PassWord"];
	$hostName = $_SESSION["HostName"];
}

// Create a new template, and specify that the template files are
// in the same directory as the as the php files.
$template = new HTML_Template_IT( "./templates" );

// Load the history template file
$template->loadTemplatefile( "webkmmmain.tpl", true, true );
	
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

// First attempt to get a connection to the database.
if( !($connection = @mysql_connect( $hostName, $userName, $password ) ) )
	die( "Could not connect to database" );

if( !(mysql_select_db( $databaseName, $connection ) ) )
	showerror();
	
// Run the query to obtain all the Asset and Liability accounts.
$query = "SELECT accountName, balanceFormatted, id FROM kmmAccounts WHERE (parentID='AStd::Asset' OR parentID='AStd::Liability') AND (balance != '0/100') ORDER BY parentID, accountName ASC";
if( !( $result = @ mysql_query( $query, $connection ) ) )
	showerror();

// Assign the row data to the template placeholders.
while( $row = mysql_fetch_array( $result ) )
{
	$template->setCurrentBlock( "ACCOUNTS" );
	$template->setVariable( "ID", $row["id"] );
	$template->setVariable( "NAME", $row["accountName"] );
	$template->setVariable( "BALANCE", $row["balanceFormatted"] );
	$template->parseCurrentBlock();
}

// Show the web page.
$template->show();
?>