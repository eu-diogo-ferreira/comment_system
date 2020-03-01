<?php
//importando o arquivo com a classe core
require_once 'app/core/Core.php';

require_once 'app/controller/HomeController.php';

require_once 'app/controller/ErrorController.php';

require_once 'lib/database/Connection.php';

require_once 'app/model/Post.php';

require_once 'vendor/autoload.php';

//function do php que carrega uma pagina (arquivo) - no caso, toda a estrutura do site
$template = file_get_contents('app/template/struct.php');

//pegando o retorno e armazenando em uma variável
ob_start();
    //passando para o core as informações sobre qual página ele deve carregar
    $core = new Core;
    $core->start($_GET);

    //pegando o conteudo e jogando para a variável result
    $result = ob_get_contents();
//encerrar o trcho de código
ob_end_clean();

//carregar o conteudo da variavel template e procurar a ocorrencia da string "area_dinamica",
//carregando assim o conteudo desejado
$content = str_replace('{{dinamic_area}}', $result, $template);

//exibindo o conteudo da minha paǵina
echo $content;