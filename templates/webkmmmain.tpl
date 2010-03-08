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
		<h1>Account Listing</h1>
		<a href="webkmymoneylogout.php">Logout</a></h3>
			<div>
				<table class="accountlist">
					<col id="account" />
					<col id="balance" />
					<tr><h2>
					<th>Name</th>
					<th>Balance</th>
					</h2></tr>
					<!-- BEGIN ACCOUNTS -->
					<tr><td><a href="webkmymoneytrans.php?id={ID}&acctname={NAME}&balance={BALANCE}&startRow=0">{NAME}</a></td><td align=right>{BALANCE}</td></tr>
					<!-- END ACCOUNTS -->
				</table>
			</div>
	    </div>
	  </div>
	</body>
</html>