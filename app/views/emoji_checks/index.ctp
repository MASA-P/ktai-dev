<?php
$Lib3gkEmoji = Lib3gkEmoji::get_instance();
$Lib3gkEmoji->_params['img_emoji_url'] = '/img/emoticons/';

$title = array(
	'encoding' => array(
		'UTF-8に切り替える', 
		'SJISに切り替える', 
	), 
	'binary' => array(
		'バイナリ絵文字にする', 
		'数値絵文字参照にする', 
	), 
	'convert' => array(
		'自動コンバートする', 
		'自動コンバートを解除する', 
	), 
);
$tableTitle = array(
	'番号', 
	'img', 
	'出力', 
);

echo $this->Html->link(($encoding ? $title['encoding'][$encoding] : mb_convert_encoding($title['encoding'][$encoding], 'SJIS', 'UTF-8')), array('encoding' => ($encoding ? 0 : 1), 'binary' => $binary, 'convert' => $convert));
echo "<br />\n";
echo $this->Html->link(($encoding ? $title['binary'][$binary] : mb_convert_encoding($title['binary'][$binary], 'SJIS', 'UTF-8')), array('encoding' => $encoding, 'binary' => ($binary ? 0 : 1), 'convert' => $convert));
echo "<br />\n";
echo $this->Html->link(($encoding ? $title['convert'][$convert] : mb_convert_encoding($title['convert'][$encoding], 'SJIS', 'UTF-8')), array('encoding' => $encoding, 'binary' => $binary, 'convert' => ($convert ? 0 : 1)));
?>
<hr />
<table>
<tr>
<th><?php echo $encoding ? $tableTitle[0] : mb_convert_encoding($tableTitle[0], 'SJIS', 'UTF-8'); ?></th>
<th><?php echo $encoding ? $tableTitle[1] : mb_convert_encoding($tableTitle[1], 'SJIS', 'UTF-8'); ?></th>
<th><?php echo $encoding ? $tableTitle[2] : mb_convert_encoding($tableTitle[2], 'SJIS', 'UTF-8'); ?></th>
</tr>
<?php
$i = 1;
foreach($emoji as $data){
	if($i > 176){
		$name = '拡'.($i - 176);
	}else{
		$name = $i;
	}
	if($encoding == 0){
		$name = mb_convert_encoding($name, 'SJIS', 'UTF-8');
	}
?>

<tr>
<td><?php echo $name; ?></td>
<td><?php echo $Lib3gkEmoji->create_image_emoji($data[4]); ?></td>
<td><?php $this->Ktai->emoji($data[0][$encoding]); ?></td>
</tr>

<?php
	$i++;
}
?>
</table>
