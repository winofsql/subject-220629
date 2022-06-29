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
<?php

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

header('Content-Type: image/png');

// ファイル名を指定して画像出力
imagepng($image);
```
[利用フリー画像](https://sozai-good.com/illust/free-background/cute/29847) : http://localhost/blue.php?x=350&y=400
![image](https://user-images.githubusercontent.com/1501327/176339376-495c0648-45c0-4c6a-9ead-36eb99ec22e6.png)

### [PHP GDで影付き文字を描画](https://www.geekpage.jp/web/php-gd/text-shadow-1.php)
```php
<?php

$fontfile = "C:\Windows\Fonts\HGRPP1.TTC";

$img = ImageCreate(1157, 720);

// 背景を白く塗りつぶす #e3685a
// $white = ImageColorAllocate($img, 0xe3, 0x68, 0x5a);
$white = ImageColorAllocate($img, 0xff, 0xff, 0xff);
ImageFilledRectangle($img, 0,0, 1157,720, $white);

// 影用に灰色を用意する
$grey = ImageColorAllocate($img, 0x99, 0x99, 0x99);
// 本体用に黒を用意する
$black = ImageColorAllocate($img, 0x00, 0x00, 0x00);

$text = "熱中症に\n気を付けましょう！"; // 書き込む文字列
ImageTTFText($img, 72, 0, 20, 150, $grey, $fontfile, $text);

// /* 影の部分をぼかす */
ImageFilter($img, IMG_FILTER_GAUSSIAN_BLUR);
ImageFilter($img, IMG_FILTER_GAUSSIAN_BLUR);
ImageFilter($img, IMG_FILTER_GAUSSIAN_BLUR);

// /* 本体を書き込む */
ImageTTFText($img, 72, 0, 20-5, 150-3, $black, $fontfile, $text);

header('Content-Type: image/png');
ImagePNG($img);

```

### [PHP | GDで透過背景のテキスト画像を作成する方法](https://1-notes.com/php-gd-create-text-image-with-transparent-background/)
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

//画像として指定パスに保存
// imagepng($img, 'sample.png');
// imagejpeg($img, 'sample.jpg');
// imagegif($img, 'sample.gif');
// imagewebp($img, 'sample.webp');

//画像データをメモリから削除
imagedestroy($img);

```




### [jQuery UI のテーマ一覧](https://javascript.programmer-reference.com/jqueryui-theme/)
