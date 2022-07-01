# subject-220629

### [バイナリ データの処理](https://so-zou.jp/web-app/tech/programming/php/binary/)
```php
<?php

$fp = fopen("bin1.dat", "wb" );
fwrite( $fp, pack("S", 1 ) );
fclose( $fp );

$fp = fopen("bin2.dat", "wb" );
fwrite( $fp, pack("S", 400 ) );
fclose( $fp );

?>
```
### [PHPで画像に文字を重ねるimagettftext()の使い方](https://dev-lib.com/php-image-imagettftext/)
```php
// 文字列を挿入する先の画像
$file = "blue.png";

// 出力後のファイル名
$newfile = "bule_moji.png";

// コピー先画像作成
$image = imagecreatefrompng($file);

// 挿入する文字列
$text = "熱中症に\n気を付けましょう！";

// 挿入する文字列のフォント(今回はWindowsに入ってたメイリオを使う)
$fontfile = "C:\Windows\Fonts\HGRPP1.TTC";

// 挿入する文字列の色(白)
$color = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);

// 挿入する文字列のサイズ(ピクセル)
$size = 72;

// 挿入する文字列の角度
$angle = 30;

if ( !isset( $_GET["x"] ) ) {
    $_GET["x"] = 100;
}
if ( !isset( $_GET["y"] ) ) {
    $_GET["y"] = 100;
}

// 挿入位置
$x = $_GET["x"] + 0;     // 左からの座標(ピクセル)
$y = $_GET["y"] + $size; // 上からの座標(ピクセル)

// 文字列挿入
imagettftext(
    $image,     // 挿入先の画像
    $size,      // フォントサイズ
    $angle,     // 文字の角度
    $x,         // 挿入位置 x 座標
    $y,         // 挿入位置 y 座標
    $color,     // 文字の色
    $fontfile,  // フォントファイル
    $text);     // 挿入文字列

// ファイル名を指定して画像出力
imagepng($image,"gd-image.png");
```
[利用フリー画像](https://sozai-good.com/illust/free-background/cute/29847) : http://localhost/blue.php?x=350&y=400
![image](https://user-images.githubusercontent.com/1501327/176339376-495c0648-45c0-4c6a-9ead-36eb99ec22e6.png)

### PHP GDで影付き文字を描画
```php
<?php

$fontfile = "C:\Windows\Fonts\HGRPP1.TTC";

$img = ImageCreateTrueColor(1157, 720);
$img2 = ImageCreateTrueColor(1157, 720);
$img3 = ImageCreateTrueColor(1157, 720);

// 背景を白く塗りつぶす
$white = ImageColorAllocate($img, 0xff, 0xff, 0xff);
ImageFilledRectangle($img, 0,0, 1157,720, $white);

$black = ImageColorAllocate($img, 0x00, 0x00, 0x00);

$text = "熱中症に\n気を付けましょう！"; // 書き込む文字列
ImageTtfText($img, 72, 0, 20, 150, $black, $fontfile, $text);


ImageCopy($img2, $img, 0, 0, 0, 0, 1157,720);
ImageCopy($img3, $img, 0, 0, 0, 0, 1157,720);


$gaussian = array(array(1.0, 2.0, 1.0), array(2.0, 4.0, 2.0), array(1.0, 2.0, 1.0));
for( $i = 0; $i < 4; $i++ ) {
	ImageConvolution($img2, $gaussian, 16, 0);
}

ImageCopyMerge($img, $img2, 5,5, 0,0, 1157,720, 100);
ImageCopyMerge($img, $img3, 0,0, 0,0, 1157,720, 60);

ImageTtfText($img, 72, 0, 20, 150, $black, $fontfile, $text);

header("Content-type: image/png");
imagepng($img);
```

![image](https://user-images.githubusercontent.com/1501327/176643898-abe8746f-ae44-466a-ae94-214bae610f88.png)


### PHP | GDで透過背景のテキスト画像を作成する方法
```php
<?php

//テキスト
$text = '透過テキスト画像';

//テキストサイズ
$font_size = 50;

//文字数
$mojisu = mb_strlen($text);

//フォント指定
// $font = 'rounded-x-mplus-1c-heavy.ttf';
$font = "C:\Windows\Fonts\HGRPP1.TTC";

//画像サイズ調整（文字数*文字サイズ*余白加味）
$w = $mojisu * $font_size * 1.37;
$h = $font_size * 1.7;

//ベース画像作成
$img = imagecreatetruecolor($w, $h);

//文字色
$font_color = ImageColorAllocate($img, 255, 99, 71);

imagealphablending( $img, false ); // アルファブレンディングを無効
imageSaveAlpha( $img, true ); // アルファチャンネルを有効
$transparent = imagecolorallocatealpha( $img, 0, 0, 0, 127 ); // 透明度を持つ色を作成
imagefilledrectangle( $img, 0,0,$w,$h, $transparent );

//テキスト書き出し
ImageTTFText($img, $font_size, 0, $font_size * 0.1, $font_size * 1.3, $font_color, $font, $text);

//画像の表示
// header('Content-Type: image/png');
imagepng($img, "touka.png");

//画像データをメモリから削除
imagedestroy($img);

```

![image](https://user-images.githubusercontent.com/1501327/176644844-8b670e51-d27e-4553-bf4d-3d8fd8614a01.png)


### 画像縮小
```php
<?php

$target	= getimagesize( "blue.png" );

// 現在のサイズ
$width	= $target[0];
$height	= $target[1];

$png = imagecreatefrompng( "blue.png" );

$width_new	= 150;	// 幅固定
$height_new = (int)( ($height/$width)*$width_new );

$png_small = imagecreatetruecolor( $width_new, $height_new );

$ret = imagecopyresampled(
    $png_small,
    $png,
    0,
    0,
    0,
    0,
    $width_new,
    $height_new,
    $width,
    $height
);

imagejpeg ( $png_small, "blue-small.png" );

?>
```
[ImageMagick](https://imagemagick.biz/)


### jQuery の each
```javascript
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function(){

	$("#btn").on( "click", function(){

		$(".target").each(function( index, element ){

			console.log(index);
			console.log(element);
			console.log( $(this).text() );

		});

	});


});
</script>

<input id="btn" name="btn" type="button" value="実行">

<div class="target">あ</div>
<div class="target">い</div>
<div class="target">う</div>
<div class="target">え</div>
<div class="target">お</div>
<div>
	<span class="target">すぱん</span>
</div>
```

```javascript
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function(){

	var array = [1,2,3,4,10,11];

	$("#btn").on( "click", function(){

		$.each( array, function( index, value ){

			console.log(index + ":" + value);

		});

	});


});
</script>
<input id="btn" name="btn" type="button" value="実行">
```

```javascript
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function(){

	var obj = {
		"月曜": "卒業進級",
		"火曜": "就職",
		"水曜": "WEBアプリ"
	};

	$("#btn").on( "click", function(){

		$.each( obj, function( key, value ){

			console.log(key + ":" + value);

		});

	});


});
</script>
<input id="btn" name="btn" type="button" value="実行">
```


### [jQuery UI のテーマ一覧](https://javascript.programmer-reference.com/jqueryui-theme/)


![image](https://user-images.githubusercontent.com/1501327/176831124-d733588f-7215-41a8-97e5-1aa7c1b65f3a.png)

