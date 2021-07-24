<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'models/model_home.php';
        class home{
            function _construct(){
                $this -> model = new model_home();
                $act = "home";
                if(isset($_GET['act']) == true) $act = $_GET['act'];
                switch ($act){
                    case "home": $this->home(); break;
                    case "detel": $this->detel(); break;
                    case "cat": $this->cat(); break;
                    case "search": $this->search(); break;
                    case "cart": $this->cart(); break;
                    case "cartview": $this->cartview(); break;
                }
            }
            function cartview(){
                $viewFile = "view/cartview.php";
                require_once 'layout.php';
            }
        }
        ?>
    </body>
</html>
