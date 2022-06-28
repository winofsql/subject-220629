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

### [PHP GDで影付き文字を描画](https://www.geekpage.jp/web/php-gd/text-shadow-1.php)
