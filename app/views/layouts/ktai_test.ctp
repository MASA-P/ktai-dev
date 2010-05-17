<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php if($ktai->is_iphone()){ ?><meta name="viewport" content="width=260"><?php } ?>
<title><?php echo $title_for_layout; ?></title>
</head>
<body>
<?php if(!$ktai->is_ktai()){ ?><div style="width: 240px;"><?php } ?>
<div align="center">&#xe688;Ｋｔａｉ　Ｌｉｂｒａｒｙ　テスト中&#xe688;</div>
<?php echo $content_for_layout; ?>
<div align="center">
<hr width="90%" size="1" color="#333333" noshade>
(C)2009-2010 <a href="http://www.ecworks.jp/">ECWorks</a>
</div>
<?php if(!$ktai->is_ktai()){ ?></div><?php } ?>
</body>
</html>
