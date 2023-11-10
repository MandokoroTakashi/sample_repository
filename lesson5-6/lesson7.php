﻿<?php
// 以下はランダムな数字を格納した配列を表示するプログラムです。
// 配列内の隣合う数字を比較して左側から小さい順に表示されるよう配列の中身を並び替えてください。
// 並び替えはfor文を使用すること
// (sort関数などを使用すれば実装は可能ですが、for文を使って一つ一つの値を比較・操作して並べ替えを実装してみてください。)

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// 例）
// 4, 3, 1, 2
// ↓
// 3, 4, 1, 2
// ↓
// 3, 1, 4, 2
// ↓
// 3, 1, 2, 4
// ↓
// 1, 3, 2, 4
// ↓
// 1, 2, 3, 4　←これが画面に表示される
// $arr = [3, 1, 2, 5, 4];


// $arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// ここで並び替え処理
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>数字並び替えプログラム</title>
</head>
<body>
    <?php
$count = count($arr);
$no = 0;
$result = '';
for ($i = 0; $i < $count; $i++) {
  for ($j = 1; $j < $count; $j++) {
    if($arr[$j-1] > $arr[$j]) {
      $subnum = $arr[$j]; 
      $arr[$j] = $arr[$j-1]; 
      $arr[$j-1] = $subnum; 
      $checker = 0;
      foreach($arr as $num){
        if($checker === 0){
            $result = $num;
        } else{
            $result = $result.", ".$num;
        }
          $checker++;
          $no++;
      }
      if($no !== $count){
          echo "↓"."<br/>";
      }
      echo $result."<br/>";
      $result ='';
    }
  }
}
    ?>
</body>
</html>