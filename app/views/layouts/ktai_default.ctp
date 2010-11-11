<?php
	if(Configure::read('debug') == 0){
		echo "<?xml version=\"1.0\" ?>\n";
	}
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" 
"http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php if($ktai->is_iphone()){ ?><meta name="viewport" content="width=260"><?php } ?>
<title><?php echo $title_for_layout; ?></title>
</head>
<body>
<?php e( $ktai->font() ); ?>
<?php if(!$ktai->is_ktai()){ ?><div style="width: 240px;"><?php } ?>
<?php echo $content_for_layout; ?>
<div align="center">
<hr width="90%" size="1" color="#333333" noshade>
(C)2009-2010 <a href="http://www.ecworks.jp/">ECWorks</a>
</div>
<?php if(!$ktai->is_ktai()){ ?></div><?php } ?>
<?php e( $ktai->fontend() ); ?>
</body>
</html>
