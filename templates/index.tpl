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
		<h1>Web KMyMoney Login</h1>
	  </div>
	  <div id="bodycontent">
		<form method="post" action="webkmymoney.php" class="login">
		   <fieldset>
			<legend>Please enter your login credentials</legend>
			<div>
				<label for="username" class="fixedwidth">User Name:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label for="database" class="fixedwidth">Database Name:</label>
				<input type="text" name="database" id="database" />
			</div>
			<div>
				<label for="password" class="fixedwidth">Password:</label>
				<input type="password" name="password" id="password" />
			</div>
			<div class="buttonarea">
				<input type="submit" value="Login" />
			</div>
		   </fieldset>
		</form>
	  </div>
	</body>
</html>