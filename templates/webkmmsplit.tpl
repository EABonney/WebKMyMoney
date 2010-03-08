<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	  "http://www.23.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlsn="http://www.w3.org/1999/xhtml">
	<head>
		<title>Web KMyMoney</title>
		<meta http-equiv="Content-Type"
		      content="text/html; charset=utf-8"/>
		<!-- BEGIN CSSSELECTION -->
		<link href="{CSSFORMAT}" rel="stylesheet" type="text/css"/>
		<!-- END CSSSELECTION -->
	</head>
	<body>
	  <div id="header">
	    <div>
		<!-- BEGIN ACCTNAME -->
		<h1>{NAME}</h1>
		<!-- END ACCTNAME -->
		<!-- BEGIN NAV -->
		<h3><a href="webkmymoneytrans.php?id={ID}&acctname={NAME}&balance={BALANCE}&startRow={PREVROW}">Previous</a>
		<a href="webkmymoneytrans.php?id={ID}&acctname={NAME}&balance={BALANCE}&startRow={NEXTROW}">Next</a>
		<a href="webkmymoney.php">Back</a>
		<a href="webkmymoneytrans.php">New</a>
		<a href="webkmymoneylogout.php">Logout</a></h3>
		<!-- END NAV -->
	    </div>
	    <div>
		<!-- BEGIN SPLITSVIEW -->
		<table>
		<tr><td>{VENDOR}</td><td>{TOTAMT}</td></tr>
		</table>
		<!-- END SPLITSVIEW -->
	    </div>
	    <div>
		<!-- BEGIN SPLITS -->
		<table>
		<tr><td>{SPLITACCOUNT}</td><td>{SPLITAMOUNT}</td></tr>
		</table>
		<!-- END SPLITS -->
	    </div>
	  </div>
	</body>
</html>