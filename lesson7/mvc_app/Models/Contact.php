<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{
  public function __construct($dbh = null)
  {
      parent::__construct($dbh);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
   * @param string $name 氏名
   * @param string $kana ふりがな
   * @param string $tel 電話番号
   * @param string $email メールアドレス
   * @param string $body お問合せ内容
   */
  public function confirm(string $name, string $kana, string $tel, string $email, string $body)
  {
      try{
          $this->dbh->beginTransaction();
          $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
          $stmt = $this->dbh->prepare($query);
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);
          $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
          $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
          $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $stmt->bindParam(':body', $body, PDO::PARAM_STR);
          $stmt->execute();
          // トランザクションを完了することでデータの書き込みを確定させる
          $this->dbh->commit();
          

      } catch (PDOException $e) {
          // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
          $this->dbh->rollBack();
          echo "登録失敗: " . $e->getMessage() . "\n";
          exit();
      }

  }

  public function readContact()
  {
      try{
          $query = 'SELECT * FROM contacts';
          $stmt = $this->dbh->query($query);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          echo "認証エラー: ". $e->getMessage(). "\n";
          exit();
      }
  }

      /**
   * マイページ表示用のユーザーデータを取得して返却する
   *
   * @param string $id ユーザーID
   * @return stdClass object型で取得したユーザーのデータを返却する
   */
  public function getInfo(string $id)
  {
      try{
          $query = 'SELECT * FROM contacts WHERE id = :id';
          $stmt = $this->dbh->prepare($query);
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          echo "認証エラー: ". $e->getMessage(). "\n";
          exit();
      }
  }

      /**
   * ユーザーの情報を更新する
   * @param string $id 更新対象のユーザーID
   * @param string $name 氏名
   * @param string $kana ふりがな
   * @param string $tel 電話番号
   * @param string $email メールアドレス
   * @param string $body お問合せ内容
   */
  public function update(string $id, string $name, string $kana, string $tel, string $email , string $body)
  {
      try{

              $this->dbh->beginTransaction();

              $query =  'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id';
              $stmt = $this->dbh->prepare($query);
              $stmt->bindParam(':id', $id, PDO::PARAM_INT);
              $stmt->bindParam(':name', $name);
              $stmt->bindParam(':kana', $kana);
              $stmt->bindParam(':tel', $tel);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':body', $body);
              $stmt->execute();
              // トランザクションを完了することでデータの書き込みを確定させる
              $this->dbh->commit();
              return true;
          
      
      } catch (PDOException $e) {
          // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
          $this->dbh->rollBack();
          echo "登録失敗: " . $e->getMessage() . "\n";
          exit();
      }

  }

     /**
   * ユーザーIDに対応するユーザーのデータをテーブルから削除する
   * @param string $id ユーザーID
   */
  public function deleteInfo(string $id) 
  {
    try{
        $this->dbh->beginTransaction();
        $query = 'DELETE FROM contacts WHERE id = :id';
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        // トランザクションを完了することでデータの書き込みを確定させる
        $this->dbh->commit();
        return;
    } catch (PDOException $e) {
        // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
        $this->dbh->rollBack();
        echo "削除失敗: " . $e->getMessage() . "\n";
        exit();
    }
  }
}

