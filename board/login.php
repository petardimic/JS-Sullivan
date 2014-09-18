<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Us - JS Sullivan Development</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="css/board_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://fast.fonts.com/jsapi/c9760b77-2ba0-49eb-9deb-f1b5f1d4f68a.js"></script>
</head>

<body>
	<div id="wrapper">
        <div id="header"><h1><a href="../"><span>JS Sullivan Development</span></a></h1></div>
      		<div id="member">
			<form action="login_ok.php" method="POST">
			<dl>
				<dt>ID</dt><dd><input type="text" name="id" class="mbt_style" /></dd>
				<dt>Password</dt><dd><input type="password" name="password" class="mbt_style" /></dd>
			</dl>
			<input type="hidden" name="hiddenid" value="<?=$useTable?>" />
			<input type="submit" value="LOGIN" class="bt_style" />
			</form>
		</div>
        <div class="clear"></div>
        <div id="footer">Copyright © 2010 JS SULLIVAN DEVELOPMENT</div>
   	</div>
</body>
</html>