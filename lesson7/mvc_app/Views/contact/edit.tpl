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
            <h1>お問合せ更新画面</h1>

            <form action="/contact/update" method="post">

                <div class="form-item">
                    <label for="name">氏名</label>
                    <input type="text" name="name" value="{$result->name|default:$result['name']}" id="inputName">
                </div>

                <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <input type="text" name="kana" value="{$result['kana']}" id="inputKana">
                </div>

                <div class="form-item">
                    <label for="tel">電話番号</label>
                    <input type="tel" name="tel" value="{$result['tel']}" id="inputTel">
                </div>

                <div class="form-item">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" value="{$result['email']}" id="inputMail">
                </div>

                <div class="d-flex flex-column">
                    <label for="body">お問合せ内容</label>
                    <textarea type="body" name="body" id="inputBody">
                    {$result['body']}
                    </textarea>
                </div>
                <div class="d-flex">
                  <div class="edit-button m-2">
                    <a href="/contact/index" class="button" onclick="return confirm('本当にキャンセルしますか?')">キャンセル</a>
                  </div>
                  <div class="edit-button m-2">
                      <input type="submit" class="button" value="送信">
                  </div>
                </div>
            </form>
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
                message.push("名前が未入力です。");
            }
            if(inputKana.value ==""){
                message.push("フリガナが未入力です。");
            }
            if(inputTel.value==""){
                message.push("電話番号が未入力です。");
            }
            if(inputMail.value==""){
                message.push("メールアドレスが未入力です。");
            }else if(!reg.test(inputMail.value)){
                message.push("メールアドレスの形式が不正です。");
            }
            if(inputBody.value==""){
                message.push("お問い合わせ内容が未入力です。");
            }
            if(message.length > 0){
                alert(message);
                return;
            }
            alert('入力チェックOK');
        });
    };
</script>
</body>