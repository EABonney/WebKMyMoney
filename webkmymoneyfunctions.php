<?
/***********************************************************************************************
****
**** Author: Eric A. Bonney
**** Filename: webkmymoneyfunctions.php
**** Date: June 2, 2009
**** Description: Helper functions for WEb KMyMoney
****
************************************************************************************************/

function formatDate( $originalDate )
{
	$newDate = explode( "-", $originalDate );

	// Set up the Month Name
	switch ( $newDate[1] )
	{
		case 1:
			$formattedDate = "Jan";
			break;
		case 2:
			$formattedDate = "Feb";
			break;
		case 3:
			$formattedDate = "Mar";
			break;
		case 4:
			$formattedDate = "Apr";
			break;
		case 5:
			$formattedDate = "May";
			break;
		case 6:
			$formattedDate = "Jun";
			break;
		case 7:
			$formattedDate = "Jul";
			break;
		case 8:
			$formattedDate = "Aug";
			break;
		case 9:
			$formattedDate = "Sep";
			break;
		case 10:
			$formattedDate = "Oct";
			break;
		case 11:
			$formattedDate = "Nov";
			break;
		case 12:
			$formattedDate = "Dec";
			break;
	}

	$formattedDate = $formattedDate . " " . $newDate[2] . ", " . $newDate[0];

	return $formattedDate;
}
?>