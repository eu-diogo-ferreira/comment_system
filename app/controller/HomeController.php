<?php

    class HomeController{
        public function index(){
            //echo 'Home';
            try{
                //chamando o model de postagens (Post)
                $Posts = Post::SelectAllPosts();

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('home.php');

                $parameters = array();

                $parameters['posts'] = $Posts;

                //renderizando a view

                $content = $template->render($parameters);

                echo $content;
            //var_dump($Posts);

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }