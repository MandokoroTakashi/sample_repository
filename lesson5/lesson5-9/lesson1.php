<?php
//下記のようなクラスを作成してください。
// Person
// name  : string
// age   : int
// gender: string

// class Person{
//   public string $name;

//   public int $age;

//   public string $gender;

// }

// $mandokoro = new Person();
// $mandokoro ->name = '政所';
// $mandokoro ->age = 30;
// $mandokoro ->gender = "male";
// var_dump($mandokoro);
// echo $mandokoro->name;

// __construct(name:string, age:int, gender:string)
// 名前、年齢、 性別を受け取ってプロパティを初期化する。

// class Person{
//   public string $name;

//   public int $age;

//   public string $gender;

//   function __construct($name, $age, $gender){
//     $this->name = $name;
//     $this->age = $age;
//     $this->gender = $gender;
//   }

// }

// $mandokoro = new Person('政所', 30, "male");
// var_dump($mandokoro);

// selfIntroduction(): string
// 私の名前は〇〇です。年齢は〇〇歳です。性別は〇〇です。 という文字列を出力する。

// class Person{
//   public string $name;

//   public int $age;

//   public string $gender;

//   function __construct($name, $age, $gender){
//     $this->name = $name;
//     $this->age = $age;
//     $this->gender = $gender;
//   }

//   public function selfIntroduction(){
//     return '私の名前は'.$this->name.'です。年齢は'.$this->age.'歳です。性別は'.$this->gender.'です。';
//   }

// }
// $mandokoro = new Person('政所', 30, '男');
// echo $mandokoro -> selfIntroduction();

// addAge(): void
// 誕生日が来ました。 という文字列を出力し、年齢を＋１する。

class Person{
  public string $name;

  public int $age;

  public string $gender;

  function __construct($name, $age, $gender){
    $this->name = $name;
    $this->age = $age;
    $this->gender = $gender;
  }

  public function selfIntroduction(){
    return '私の名前は'.$this->name.'です。年齢は'.$this->age.'歳です。性別は'.$this->gender.'です。';
  }
  public function addAge(){
      echo "誕生日が来ました。";
      $this->age ++;
    }
  }
// クラスができたら適当なインスタンスを作成し、
// 自己紹介→年齢加算→自己紹介の順にメソッドを動かして年齢を確認してください。
$mandokoro = new Person('政所', 30, '男');
echo $mandokoro -> selfIntroduction()."<br/>";
echo $mandokoro ->addAge()."<br/>";
echo $mandokoro -> selfIntroduction()."<br/>";