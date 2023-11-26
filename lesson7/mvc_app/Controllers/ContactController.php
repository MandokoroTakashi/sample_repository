<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH . 'Models/Contact.php';

class ContactController extends Controller
{
    public function index(){
      $this->createToken();
      $auth = $_SESSION['auth'];
      if(isset($_SESSION['post'])){
        $post = $_SESSION['post'];
      }
      $contact = new Contact;
      $results = $contact->readContact();

      $post = $_SESSION['post'] ?? [];
      $_SESSION['post'] = [];
      $this->view('contact/index', ['results' => $results , 'auth' => $auth, 'post' => $post]);
  }

    public function confirm(){
      $auth = $_SESSION['auth'];
      $errorMessages = [];
      if (empty($_POST['name'])) {
          $errorMessages['name'] = '名前を入力してください。';
      } elseif (mb_strlen($_POST['name']) > 10){
        $errorMessages['name'] = '名前は10文字以内で入力してください。'; 
      }

      if (empty($_POST['kana'])) {
          $errorMessages['kana'] = 'フリガナを入力してください。';
      } elseif (mb_strlen($_POST['kana']) > 10){
        $errorMessages['kana'] = 'フリガナは10文字以内で入力してください。'; 
      }

      if (!preg_match('/^(0{1}\d{9,10})$/', $_POST['tel'])) {
          $errorMessages['tel'] = '有効な電話番号を入力してください。';
      }

      if (empty($_POST['email'])) {
          $errorMessages['email'] = 'メールアドレスを入力してください。';
      } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $errorMessages['email'] = '有効なメールアドレスを入力してください。';
      }

      if (empty($_POST['body'])) {
          $errorMessages['body'] = 'お問合せ内容を入力してください。';
      }



      if (!empty($errorMessages)) {
          // バリデーション失敗
          $_SESSION['errorMessages'] = $errorMessages;
          $errorMessages = [];
          $_SESSION['post'] = $_POST;
          header('Location: /contact/index');
      } else {
        $this->validateToken();
          $_SESSION['post'] = $_POST;
          $this->view('contact/confirm', ['auth' => $auth]);
      }
   

  }

  public function complete(){
      $auth = $_SESSION['auth'];
      $errorMessages = [];

      if (!empty($errorMessages)) {
          // バリデーション失敗
          var_dump($errorMessages);
          $_SESSION['errorMessages'] = $errorMessages;
          echo '失敗';
          // header('Location: /contact/index');
      } else {
          //登録処理
          $contact = new Contact;
          $result = $contact->confirm(
            $_SESSION['post']["name"],
            $_SESSION['post']["kana"],
            $_SESSION['post']["tel"],
            $_SESSION['post']["email"],
            $_SESSION['post']["body"],
          );
          $_SESSION['post'] = [];
          $this->view('contact/complete', ['auth' => $auth]);
  
      }
   

  }

  public function edit(){
    $auth = $_SESSION['auth'];
    $selectId = $_GET['id']??$_SESSION['id'];
    $_SESSION['id'] = $_GET['id'];
    $contact = new Contact;
    $result = $contact->getInfo($selectId);
    $this->view('contact/edit', ['auth' => $auth, 'result' => $result]);
  }

  public function update(){
    $errorMessages = [];
    $auth = $_SESSION['auth'];
    $selectId = $_SESSION['id'];
    if(empty($_POST['name'])){
        $errorMessages['name'] = '名前を入力してください。';
    }

    if(empty($_POST['kana'])){
        $errorMessages['kana'] = 'ふりがなを入力してください。';
    }
    
    if(empty($_POST['tel'])){
        $errorMessages['tel'] = '電話番号を入力してください。';
    }

    if(empty($_POST['email'])){
        $errorMessages['email'] = 'メールアドレスを入力してください。';
    }
    
    if(empty($_POST['body'])){
        $errorMessages['body'] = 'お問合せ内容を入力してください。';
    }


    if(!empty($errorMessages)){
        // バリデーション失敗
        $_SESSION['errorMessages'] = $errorMessages;;
        $result = $_POST;
        $_SESSION['id'] = $selectId;
        $this->view('contact/edit', ['auth' => $auth, 'result' => $result]);
    }else{
        // 更新処理
        $contact = new Contact;
        $result = $contact->update(
            $selectId,
            $_POST['name'],
            $_POST['kana'],
            $_POST['tel'],
            $_POST['email'],
            $_POST['body']
        );
        
        if($result === true){
          header('Location: /contact/index');
        }else{
          $_SESSION['errorMessages'] = $errorMessages;;
          $result = $_POST;
          $_SESSION['id'] = $selectId;
          $this->view('contact/edit', ['auth' => $auth, 'result' => $result]);
        }
    }
  }

  public function delete(){
    $auth = $_SESSION['auth'];

    $selectId = $_GET['id'];
    $contact = new Contact;
    $contact->deleteInfo($selectId);
    header('Location: /contact/index');
    exit();
  }
}