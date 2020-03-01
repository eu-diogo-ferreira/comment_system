<?php
class Post{
    public static function SelectAllPosts(){
        //chamando diretamnte meu método getConn, visto que o mesmo é abstrato
        $con = Connection::getConn();

        $sql = "SELECT * FROM post ORDER BY id DESC";

        $sql = $con->prepare($sql);

        $sql->execute();

        $query = array();

        //transformando meu array em diversos objetos
        while($row = $sql->fetchObject('Post')){
            //objeto individual
            $query[] = $row;
        }

        //caso meu array seja vazio (não tenha consultas/dados)
        if(!$query){
            throw new Exception("Não foram encontrados registros no banco de dados");
        }

        //array com todos os objetos
        return $query;
    }
}