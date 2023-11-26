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
            <h1>お問合せ確認画面</h1>
            <form action="/contact/complete" method="post">

                <div class="form-item">
                    <label for="name">氏名</label>
                    <p>{$smarty.post.name|escape}</p>
                </div>

                <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <p>{$smarty.post.kana|escape}</p>
                </div>

                <div class="form-item">
                    <label for="tel">電話番号</label>
                    <p>{$smarty.post.tel|escape}</p>
                </div>

                <div class="form-item">
                    <label for="email">メールアドレス</label>
                    <p>{$smarty.post.email|escape}</p>
                </div>

                <div class="d-flex flex-column">
                    <label for="body">お問合せ内容</label>
                    <p>{$smarty.post.body|escape|nl2br}</p>
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
</body>