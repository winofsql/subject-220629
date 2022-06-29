<?php

	if ( $_GET['bc2'] != '' && $_GET['dropShadow'] == '1' ) {
		$image = imagecreatetruecolor($_GET['w']+3+$_GET['sh'],$_GET['h']+3+$_GET['sh']);
	}
	else {
		$image = imagecreatetruecolor($_GET['w'],$_GET['h']);
	}
	if ( $_GET['tp'] == "1" ) {
		imagealphablending( $image, false ); // アルファブレンディングを無効
		imageSaveAlpha( $image, true ); // アルファチャンネルを有効

		if ( $_GET['bc2'] != '' ) {
			$image = imagecreatetruecolor($_GET['w'],$_GET['h']);
			$transparent = imagecolorallocate(
				$image,
				("0x".substr($_GET['bc2'],0,2))+0,
				("0x".substr($_GET['bc2'],2,2))+0,
				("0x".substr($_GET['bc2'],4,2))+0
			);
		}
		else {
			$transparent = imagecolorallocatealpha( $image, 0, 0, 0, 127 ); // 透明度を持つ色を作成
		}
		imagefilledrectangle( $image, 0,0,$_GET['w'],$_GET['h'], $transparent );


?>
