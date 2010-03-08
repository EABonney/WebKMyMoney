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
			<div>
				<table>
					<tr>
					<!-- BEGIN BALANCE -->
					<td>Current Balance:</td><td>{BALANCE}</td>
					</tr>
				</table>
				<table class="transactions">
					<tr>
					<!-- END BALANCE -->
					<col id="date" />
					<col id="name" />
					<col id="amount"/>
					<th>Date</th>
					<th>Name</th>
					<th>Amount</th>
					</tr>
					<!-- BEGIN TRANSVIEW -->
					<tr class={SHADE}><h3><td>{DATE}</td><td><a href="webkmymoneysplit.php?trans={TRANSID}">{VENDOR}</a></td><td align=right>{AMOUNT}</td></h3></tr>
					<!-- END TRANSVIEW -->
				</table>
			</div>
	    </div>
	  </div>
	</body>
</html>