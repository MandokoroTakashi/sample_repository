<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 150; // 商品金額


function calc($yen, $product) {
    // この関数内に処理を記述
    $change = $yen - $product;
    //最初の「◯◯円札/玉で購入した場合」の札と玉の判定処理
    if($yen >= 1000){
        echo "{$yen}円札で購入した場合、"."<br/>";
    }else {
        echo "{$yen}円玉で購入した場合、"."<br/>";
    }

    // $prices = array(
    //     "tenThou" => "10000",
    //     "fiveThou" => "5000",
    //     "oneThou" => "1000",
    //     "fiveHund" => "500",
    //     "oneHund" => "100",
    //     "fifty" => "50",
    //     "ten" => "10",
    //     "five" => "5",
    //     "one" => "1"
    // );
    // $prices = array(
    //     "10000", "5000","1000","500","100", "50","10","5","1"
    // );
    // foreach($prices as $price ){
    //     $index = 0;
    //     $index = floor($change / $price);
    //     if($price >= 1000){
    //         echo "{$price}円札が{$index}枚、";
    //     }else{
    //         echo "{$price}円玉が{$index}枚、";
    //     }
    //     $change -= $index*$price;
    // }

    if($change < 0){
        //足りない場合の処理
        $lack = $product - $yen;
        echo "{$lack}円足りません。";
    }else{
        //足りる場合のお釣りの判定処理①
        // $tenThou = floor($change / 10000);
        // $change -= $tenThou*10000;
        // $fiveThou = floor($change / 5000);
        // $change -= $fiveThou*5000;
        // $oneThou = floor($change / 1000);
        // $change -= $oneThou*1000;
        // $fiveHund = floor($change / 500);
        // $change -= $fiveHund*500;
        // $oneHund = floor($change / 100);
        // $change -= $oneHund*100;
        // $fifty = floor($change / 50);
        // $change -= $fifty*50;
        // $ten = floor($change / 10);
        // $change -= $ten*10;
        // $five = floor($change / 5);
        // $change -= $five*5;
        // $one = floor($change / 1);
        // echo "10000円札が{$tenThou}枚、5000円札が{$fiveThou}枚、1000円札が{$oneThou}枚、500円玉が{$fiveHund}枚、100円玉が{$oneHund}枚、50円玉が{$fifty}枚、10円玉が{$ten}枚、5円玉が{$five}枚、1円玉が{$one}枚";

        //足りる場合のお釣りの判定処理②
        $prices = array(
            "10000", "5000","1000","500","100", "50","10","5","1"
        );
        foreach($prices as $price ){
            $index = 0;
            $index = floor($change / $price);
            if($price >= 1000){
                echo "{$price}円札が{$index}枚、";
            }else{
                echo "{$price}円玉が{$index}枚、";
            }
            $change -= $index*$price;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お釣り</title>
</head>
<body>
    <section>
        <!-- ここに結果表示 -->
        <?php
        echo calc(5000,120);
        ?>
    </section>
</body>
</html>