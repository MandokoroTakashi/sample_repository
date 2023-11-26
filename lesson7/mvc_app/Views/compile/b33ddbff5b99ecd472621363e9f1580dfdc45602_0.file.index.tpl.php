<?php
/* Smarty version 4.3.4, created on 2023-11-27 00:40:12
  from '/Applications/MAMP/htdocs/demo/sample_repository/lesson7/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656366dca8b3c6_90824492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b33ddbff5b99ecd472621363e9f1580dfdc45602' => 
    array (
      0 => '/Applications/MAMP/htdocs/demo/sample_repository/lesson7/mvc_app/Views/contact/index.tpl',
      1 => 1701013169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_656366dca8b3c6_90824492 (Smarty_Internal_Template $_smarty_tpl) {
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
            <h1>お問合せ入力画面</h1>

            <form action="/contact/confirm" method="post">

                <div class="form-item">
                    <label for="name">氏名</label>
                    <input type="text" name="name" placeholder="テスト太郎" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" id="inputName">
                </div>

                <div class="form-item">
                    <label for="kana">ふりがな</label>
                    <input type="text" name="kana" placeholder="てすとたろう" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" id="inputKana">
                </div>

                <div class="form-item">
                    <label for="tel">電話番号</label>
                    <input type="tel" name="tel" placeholder="tel" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" id="inputTel">
                </div>

                <div class="form-item">
                    <label for="email">メールアドレス</label>
                    <input type="email" name="email" placeholder="exemple@cin-group.co.jp" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" id="inputMail">
                </div>

                <div class="d-flex flex-column">
                    <label for="body">お問合せ内容</label>
                    <textarea type="body" name="body" id="inputBody"><?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                </div>

                <div class="edit-button">
                    <input type="submit" class="button" value="送信" id="btnSubmit">
                </div>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>
">
            </form>
        </div>
        <div class="m-3">
          <table class="table table-info table-striped">
            <tr>
              <th>名前</th> <th>フリガナ</th> <th>電話番号</th><th>メールアドレス</th><th>お問合せ内容</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'one');
$_smarty_tpl->tpl_vars['one']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->do_else = false;
?>
              <tr>
                <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['one']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['one']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['one']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['one']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['one']->value['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                <td><a href="/contact/edit?id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">更新</></td>
                <td><a href="/contact/delete?id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
" onclick="return confirm('本当に削除しますか?')">削除</a></td>
              </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </table>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
</body><?php }
}
