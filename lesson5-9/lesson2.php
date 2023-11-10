<?php
// 下記のようにlesson1のファイルをインポートしてください。
// (他のファイルを参照する関数はいくつかあるので調べてください。)
// (lesson1の文字列がそのまま出力されてしまっていても大丈夫とします。)
require_once("lesson1.php");
class Patient extends Person{
  private float $height;

  private float $weight;

  function __construct($name, $age, $gender, $height, $weight){
    parent:: __construct($name, $age, $gender);
    // parent:: __construct($age);
    // parent:: __construct($gender);
    $this->height = $height;
    $this->weight = $weight;
  }

  public function calculateStandardWeight(){
    return $this->height** 2 * 22 ;
  }

  public function getHeight(){
    return $this->height ;
  }

  public function getWeight(){
    return $this->weight ;
  }
}

$mandokoro = new Patient('政所', 30, '男', 1.83, 75);

// echo $mandokoro -> calculateStandardWeight()."<br/>";
// echo $mandokoro -> getHeight()."<br/>";
// echo $mandokoro -> getWeight()."<br/>";

echo $mandokoro ->name."さんの身長は".$mandokoro ->getHeight()."mなので平均体重は".$mandokoro ->calculateStandardWeight()."kgです。 現在の体重は".$mandokoro ->getWeight()."kgです。";

// 下記のクラスを作成してください。

// Patient 
// lesson1からPersonを継承

// height: float 身長（ｍ）private
// weight: float 体重 (kg) private

// __construct(name: string, age:int, gender: string, height: float, weight: float)
// 名前、年齢、性別、身長、体重を受け取り初期化する。

// calculateStandardWeight() :float
// 平均体重を返す （身長 × 身長 × 22)

// getHeight()
// 身長を返す

// getWeight()
// 体重を返す

// クラスが完成したら適当なインスタンスを生成し、
// それぞれの関数を使用して下記のフォーマットで出力してください。

// 〇〇さんの身長は〇〇mなので平均体重は〇〇kgです。 現在の体重は〇〇kgです。
