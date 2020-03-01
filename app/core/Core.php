<?php

    Class Core{
        public function start($urlGet){

            $action = 'index';

            //tratando o erro de index indefino na ausencia de parâmetros (sem ?page=)
            //caso a minha variavel urlGet tenha parametros:
            if(isset($urlGet['page'])){
                //com a function 'ucfirs', a primeira letra da minha string será maiúscula (ex: xxxController.php)
                $page = ucfirst($urlGet['page'].'Controller');
            }else{
                $page = 'HomeController';
            }

            //caso a página solicitada (?page=xxx) não exista:
            if(!class_exists($page)){
                $page = 'ErrorController';
            }
            echo $page;

            call_user_func_array(array(new $page, $action), array());
        }
    }