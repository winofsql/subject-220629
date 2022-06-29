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
[利用フリー画像](https://sozai-good.com/illust/free-background/cute/29847)
![image](https://user-images.githubusercontent.com/1501327/176339376-495c0648-45c0-4c6a-9ead-36eb99ec22e6.png)



### [PHP GDで影付き文字を描画](https://www.geekpage.jp/web/php-gd/text-shadow-1.php)

### [PHP | GDで透過背景のテキスト画像を作成する方法](https://1-notes.com/php-gd-create-text-image-with-transparent-background/)





### [jQuery UI のテーマ一覧](https://javascript.programmer-reference.com/jqueryui-theme/)
