<?
/***********************************************************************************************
****
**** Author: Eric A. Bonney
**** Filename: webkmymoneytrans.php
**** Date: May 31, 2009
**** Modified: June 4, 2009
**** Description: Account Transaction view implementation file of the web interface for KMyMoney
****
************************************************************************************************/
require_once "HTML/Template/IT.php";
require_once "browscap/Browscap.php";
require_once "webkmymoneyfunctions.php";
include "db.inc";

// Get the account ID and account name that we want to look at.
$acct_id = $_GET["id"];
$acct_Name = $_GET["acctname"];
$balance = $_GET["balance"];
$startRow = $_GET["startRow"];

//Start a new session or find an existing one, then fill in the user supplied UserName, DatabaseName and PassWord.
session_start();
$userName = $_SESSION["UserName"];
$databaseName = $_SESSION["DatabaseName"]; 
$password = $_SESSION["PassWord"];
$hostName = $_SESSION["HostName"];

// Create a new template, and specify that the template files are
// in the same directory as the as the php files.
$template = new HTML_Template_IT( "./templates" );
	
// Load the history template file
$template->loadTemplatefile( "webkmmtransactions.tpl", true, true );

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

// Get the total number of rows that our dataset will hold.
$query = "SELECT COUNT(*) as TotRows FROM kmmSplits WHERE accountId = '" . $acct_id . "'";

if( !( $result = @ mysql_query( $query, $connection ) ) )
	showerror();

$row =  mysql_fetch_array( $result );


// Run the query to obtain all the Asset and Liability accounts.
$query = "SELECT payeeId, valueFormatted, memo, LEFT(postDate, 10) AS postDate, name FROM kmmSplits, kmmPayees WHERE (kmmSplits.payeeID = kmmPayees.id AND accountId = '" . $acct_id . "' AND txType = 'N') UNION SELECT payeeId, valueFormatted, memo, LEFT(postDate, 10) AS postDate, checkNumber FROM kmmSplits WHERE payeeID IS NULL AND accountId = '" . $acct_id . "' AND txType = 'N' ORDER BY postDate DESC LIMIT " . $startRow . ", 20";

if( !( $result = @ mysql_query( $query, $connection ) ) )
	showerror();

// Assign the row data to the template placeholders.
$template->setCurrentBlock( "ACCTNAME" );
$template->setVariable( "NAME", $acct_Name );
$template->parseCurrentBlock();
$template->setCurrentBlock( "BALANCE" );
$template->setVariable( "BALANCE", $balance );
$template->parseCurrentBlock();

// If we have more than 20 rows we are fine, if not then set the $start_row at zero.
if( $row["TotRows"] > 20 )
{
	if( intval( $startRow ) + 20 < intval( $row["TotRows"] ) )
		$startRow = intval( $startRow ) + 20;
}
else
	$startRow = 0;

// See where we need to set the previous row link starting point at.
if( $startRow < 20 )
	$prevRow = 0;
else
{
	$prevRow = intval($startRow) - 40;
	if( $prevRow < 0 )
		$prevRow = 0;
}

// Set up the Navigation links.
$template->setCurrentBlock( "NAV" );
$template->setVariable( "ID", $acct_id );
$template->setVariable( "NAME", $acct_Name );
$template->setVariable( "BALANCE", $balance );
$template->setVariable( "PREVROW", $prevRow );
$template->setVariable( "NEXTROW", $startRow );
$template->parseCurrentBlock();

// Set the row shading value to start at an odd number.
$shade = 1;

while( $row = mysql_fetch_array( $result ) )
{
	$template->setCurrentBlock( "TRANSVIEW" );

	if ( $shade % 2 == 0 )
		$template->setVariable( "SHADE", "even" );
	else
		$template->setVariable( "SHADE", "odd" );

	$template->setVariable( "VENDOR", $row["name"] );
	$template->setVariable( "DATE", formatDate( $row["postDate"] ) );
	$template->setVariable( "AMOUNT", $row["valueFormatted"] );
	$template->setVariable ("MEMO", $row["memo"] );
	$template->parseCurrentBlock();

	// Increment the $shade value by one.
	$shade = $shade + 1;
}


// Show the web page.
$template->show();
?>