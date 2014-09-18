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
      		<div class="sb">
			<form action="delete2.php" method="POST">
			  <p>Please enter your password.</p>
				<input type="hidden" name="tpassword" value="<?=$_GET[noo]?>" />
				<input type="hidden" name="id" value="<?=$useTable?>"/>
				<input type="text" name="tdelete" />
				<input type="submit" value="Delete" class="bt_style"/>
				
			</form>
		</div>
        <div class="clear"></div>
        <div id="footer">Copyright © 2010 JS SULLIVAN DEVELOPMENT</div>
   	</div>
</body>
</html>