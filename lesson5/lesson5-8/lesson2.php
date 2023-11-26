<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。


// ・現在日時（xxxx年xx月xx日（x曜日））
// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
// ・2020年元旦から現在までの経過日数 (ddd日)

$week = array('日','月','火','水','木','金','土');
// echo date('Y年m月d日')."(".$week[date('w')]."曜日)"."<br/>";
// // echo date('Y年m月d日', strtotime('+3 day'))." ".date('H時i分s秒')."<br/>";
// echo date('Y年m月d日 H時i分s秒', strtotime('+3 day'))."<br/>";
// // echo date('Y年m月d日')." ".date('H時i分s秒', strtotime('-12 hour'))."<br/>";
// echo date('Y年m月d日 H時i分s秒', strtotime('-12 hour'))."<br/>";

$today = new Datetime();
echo "現在日時（".($today -> format('Y年m月d日'))."(".$week[$today -> format('w')]."曜日)"."）"."<br/>";
$today = new Datetime();
echo "現在日時から3日後（".($today -> modify('+3 day') -> format('Y年m月d日 H時i分s秒'))."）"."<br/>";
$today = new Datetime();
echo "現在日時から１２時間前（".($today -> modify('-12 hour') -> format('Y年m月d日 H時i分s秒'))."）"."<br/>";
$today = new Datetime();
$century = new Datetime('2020-01-01');
$diff = $century -> diff($today);
echo "2020年元旦から現在までの日数（".$diff -> days."日）";
