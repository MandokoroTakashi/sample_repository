<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<div class="main">
    <div class="container-field">
        {include file="layout/header.tpl"}
        <div class="form-wrapper">
            <h1>お問合せ入力画面</h1>

            <form action="/contact/confirm" method="post">

                <div class="form-item">
                    <label for="name">氏名</label>
                    <input type="text" name="name" placeholder="テスト太郎" value="{$post['name']|default:''}" id="inputName">
                </div>

                <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <input type="text" name="kana" placeholder="てすとたろう" value="{$post['kana']|default:''}" id="inputKana">
                </div>

                <div class="form-item">
                    <label for="tel">電話番号</label>
                    <input type="tel" name="tel" placeholder="tel" value="{$post['tel']|default:''}" id="inputTel">
                </div>

                <div class="form-item">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" placeholder="exemple@cin-group.co.jp" value="{$post['email']|default:''}" id="inputMail">
                </div>

                <div class="d-flex flex-column">
                    <label for="body">お問合せ内容</label>
                    <textarea type="body" name="body" id="inputBody">{$post['body']|default:''}</textarea>
                </div>

                <div class="edit-button">
                    <input type="submit" class="button" value="送信" id="btnSubmit">
                </div>
                <input type="hidden" name="token" value="{$smarty.session.token}">
            </form>
        </div>
        <div class="m-3">
          <table class="table table-info table-striped">
            <tr>
              <th>名前</th> <th>フリガナ</th> <th>電話番号</th><th>メールアドレス</th><th>お問合せ内容</th>
            </tr>
            {foreach from=$results item=one}
              <tr>
                <td>{$one['name']|escape}</td>
                <td>{$one['kana']|escape}</td>
                <td>{$one['tel']|escape}</td>
                <td>{$one['email']|escape}</td>
                <td>{$one['body']|escape|nl2br}</td>
                <td><a href="/contact/edit?id={$one['id']}">更新</></td>
                <td><a href="/contact/delete?id={$one['id']}" onclick="return confirm('本当に削除しますか?')">削除</a></td>
              </tr>
            {/foreach}
          </table>
        </div>
        {include file="layout/footer.tpl"}
    </div>
</div>
<script>
    window.onload = function(){
        /*各画面オブジェクト*/
        const btnSubmit = document.getElementById('btnSubmit');
        const inputName = document.getElementById('inputName');
        const inputKana = document.getElementById('inputKana');
        const inputTel = document.getElementById('inputTel');
        const inputMail = document.getElementById('inputMail');
        const inputBody = document.getElementById('inputBody');

        
        
        btnSubmit.addEventListener('click', function(event) {
            let message = [];
            /*入力値チェック*/
            if(inputName.value ==""){
                message.push("名前が未入力");
            } else if(inputName.value.length > 10){
                message.push("名前は10文字以内で入力してください。");
            }
            if(inputKana.value ==""){
                message.push("フリガナが未入力");
            }else if(inputKana.value.length > 10){
                message.push("フリガナは10文字以内で入力してください。");
            }

            if(isNaN(inputTel.value)){
                message.push("有効な電話番号を入力してください。");
            }

            if(inputMail.value==""){
                message.push("メールアドレスが未入力");
            }else if(!reg.test(inputMail.value)){
                message.push("メールアドレスの形式が不正です。");
            }

            if(inputBody.textContent==""){
                message.push("お問い合わせ内容が未入力");
            }

            if(message.length > 0){
                alert(message + "です。");
                return;
            }
            alert('入力チェックOK');
        });
    };
</script>
</body>