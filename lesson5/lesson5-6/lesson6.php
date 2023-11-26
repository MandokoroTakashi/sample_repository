<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
    // ,
    // 'r4' => ['c1' => 34, 'c2' => 2, 'c3' => 93],
    // 'r5' => ['c1' => 15, 'c2' => 79, 'c3' => 49]
];
?>




<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
    <!-- ここにテーブル表示 -->
    <table>
        <thead>
            <tr>
                <th></th>
                <?php for($i=1;$i<=count($arr["r1"]);$i++) echo '<th>　c'.$i.'</th>'; ?>
                <th>横合計</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php for($i=1;$i<=count($arr);$i++) print '<tr><td>　r'.$i.'</td>' ?> -->
            <!-- <?php for($i=0;$i<(count($arr)+1);$i++) print '</td></td>'; ?> -->
            <!-- <?php for($i=1;$i<=count($arr);$i++) print '</tr>'; ?> -->
            <?php
            $total = 0;
                foreach($arr as $key => $value){
                    $rows = 0;
                    echo "<tr><td>".$key."</td>";
                    foreach($value as $subkey => $subvalue){
                        $rows += $subvalue;
                        echo "<td>".$subvalue."</td>";
                    }
                    echo "<td>".$rows."</td>";
                    $total += $rows;
                }
            ?>
            <tr>
                <td>縦合計</td>
                <?php
                    $cols = 0;
                    for($i=1;$i<=count($arr["r1"]);$i++){
                        for($j=1;$j<=count($arr);$j++){
                            $cols += $arr["r{$j}"]["c{$i}"];
                            // echo $arr["r{$j}"]["c{$i}"];
                        } 
                        echo "<td>".$cols."</td>";
                        $cols = 0;
                    }
                    echo "<td>".$total."</td>";
                ?>
             </tr>
        </tbody>
    </table>
</body>
</html>

