<?
/***********************************************************************************************
****
**** Author: Eric A. Bonney
**** Filename: webkmymoneylogout.php
**** Date: June 4, 2009
**** Modified: 
**** Description: Logout/cleanup implementation of the web interface for KMyMoney
****
************************************************************************************************/
//Get the current session.
session_start();

// Destroy the found session.
session_destroy();

// Redirect user to the login page.
header("Location: index.php");
?>