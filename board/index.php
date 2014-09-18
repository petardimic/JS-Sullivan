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
      <div id="board_contents">
      	<!-- Search Start -->
		<div id="welcome">Welcome, Administrator!</div>
        <div id="search">
			<form action="index.php" method="POST" >
				<input type="text" name="skeyword" style="width:100px;" value="<?=$vKeyword?>">
				<select name="search">
					<option value="stitle" <?=$vSelected?>>Title</option>
					<option value="stitlecon" <?=$vSelected2?>>Title+Contents</option>
					<option value="scon" <?=$vSelected3?>>Contents</option>
				</select>
				<input type="submit" value="SEARCH" class="sbt_style" />
			</form>
		</div>
        <div class="clear"></div>
<!-- Search end -->		
		<div class="sb">
			<div id="sb_topline">
				<ul>
					<li class="sb_no">NO.</li>
					<li class="sb_title pd_left center">TITLE</li>
					<li class="sb_writer">NAME</li>
					<li class="sb_date">DATE</li>
					<li class="sb_view">VIEW</li>
				</ul>
			</div>
			<div id="sb_lists">
				<ul>
					<li class="sb_no">10</li>
					<li class="sb_title pd_left"><a href="view.html">This is test articles.</a></li>
					<li class="sb_writer">Kenneth</li>
					<li class="sb_date">12/14/2010</li>
					<li class="sb_view">23</li>
				</ul>
                <ul>
					<li class="sb_no">10</li>
					<li class="sb_title pd_left"><a href="view.html">This is test articles.</a></li>
					<li class="sb_writer">Kenneth</li>
					<li class="sb_date">12/14/2010</li>
					<li class="sb_view">23</li>
				</ul>
                <ul>
					<li class="sb_no">10</li>
					<li class="sb_title pd_left"><a href="view.html">This is test articles.</a></li>
					<li class="sb_writer">Kenneth</li>
					<li class="sb_date">12/14/2010</li>
					<li class="sb_view">23</li>
				</ul>
                <ul>
					<li class="sb_no">10</li>
					<li class="sb_title pd_left"><a href="view.html">This is test articles.</a></li>
					<li class="sb_writer">Kenneth</li>
					<li class="sb_date">12/14/2010</li>
					<li class="sb_view">23</li>
				</ul>
                <ul>
					<li class="sb_no">10</li>
					<li class="sb_title pd_left"><a href="view.html">This is test articles.</a></li>
					<li class="sb_writer">Kenneth</li>
					<li class="sb_date">12/14/2010</li>
					<li class="sb_view">23</li>
				</ul>
			</div>
            <div class="clear"></div>
			<div class="sb_buttons">
				<input type="button" value="WRITE" class="bt_style" onClick="a()" />
			</div>
			
			<div id="sb_pagenum">
				<a href='#'><b>1</b></a>
                <a href='#'>2</a>
                <a href='#'>3</a>
			</div>
		</div>
      </div>
        <div class="clear"></div>
        <div id="footer">Copyright © 2010 JS SULLIVAN DEVELOPMENT</div>
   	</div>
</body>
</html>