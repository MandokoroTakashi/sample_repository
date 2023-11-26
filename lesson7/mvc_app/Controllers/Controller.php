<?php
class Controller
{
    function __construct()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_name("xxxxx");
            session_start();
        }
    }

    public function view(string $template, array $params = []): void
    {
        $Smarty = new Smarty();
        $Smarty->setTemplateDir(ROOT_PATH.'Views');
        $Smarty->setCompileDir(ROOT_PATH.'Views/compile');
        $Smarty->assign($params);
        try {
            $Smarty->display($template . '.tpl');
        } catch (SmartyException|Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function createToken() {
        if (!isset($_SESSION['token'])) {
          $_SESSION['token'] = bin2hex(random_bytes(32));
        }
      }
      

    public function validateToken() {
    if (
        empty($_SESSION['token']) ||
        $_SESSION['token'] != filter_input(INPUT_POST, 'token')
    ) {
        exit('Invalid post request');
    }
    }
}