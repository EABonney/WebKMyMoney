<?
/************************************************************************************************
****
**** Author: Eric A. Bonney
**** Filename: db.inc
**** Date: May 31, 2009
**** Modified: June 4, 2009
****
*************************************************************************************************/
  
	function showerror()
	{
		die( "Error " . mysql_error() . " : " . mysql_error() );
	}

	function mysqlclean( $array, $index, $maxlength, $connection )
	{
		if( isset( $array["{$index}"] ) )
		{
			$input = substr( $array["{$index}"], 0, $maxlength );
			$input = mysql_real_escape_string( $input, $connection );
			return ( $input );
		}
		return NULL;
	}

	function shellclean( $array, $index, $maxlength )
	{
		if( isset( $array["{$index}"] ) )
		{
			$input = substr( $array["{$index}"], 0, $maxlength );
			$input = EscapeShellArg( $input );
			return ( $input );
		}
		return NULL;
	}
 ?>