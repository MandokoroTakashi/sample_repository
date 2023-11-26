<?php
/* Smarty version 4.3.4, created on 2023-11-27 00:32:41
  from '/Applications/MAMP/htdocs/demo/sample_repository/lesson7/mvc_app/Views/contact/confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65636519134fa0_24793413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b87332770ecea2f481420389682a453f08867ba' => 
    array (
      0 => '/Applications/MAMP/htdocs/demo/sample_repository/lesson7/mvc_app/Views/contact/confirm.tpl',
      1 => 1701010177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_65636519134fa0_24793413 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
        <?php $_smarty_tpl->_subTemplateRender("file:layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div class="form-wrapper">
            <h1>お問合せ確認画面</h1>
            <form action="/contact/complete" method="post">

                <div class="form-item">
                    <label for="name">氏名</label>
                    <p><?php echo htmlspecialchars((string)$_POST['name'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>

                <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <p><?php echo htmlspecialchars((string)$_POST['kana'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>

                <div class="form-item">
                    <label for="tel">電話番号</label>
                    <p><?php echo htmlspecialchars((string)$_POST['tel'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>

                <div class="form-item">
                    <label for="email">メールアドレス</label>
                    <p><?php echo htmlspecialchars((string)$_POST['email'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>

                <div class="d-flex flex-column">
                    <label for="body">お問合せ内容</label>
                    <p><?php echo nl2br((string) htmlspecialchars((string)$_POST['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</p>
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
        <?php $_smarty_tpl->_subTemplateRender("file:layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
</body><?php }
}
