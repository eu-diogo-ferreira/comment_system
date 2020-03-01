<?

    abstract class Connection{
        private static $conn;
        public static function getConn(){

            //padrão singletoon para conexão com o banco de dados
            //com este if, eu posso impedir que a mesma conexão seja requisitada, impedindo a criação de mais objetos
            if(self::$conn == null){
                self::$conn = new PDO('mysql: host=localhost; dbname=projeto_comentario;', 'root', '');
            }
            return self::$conn;
        }
    }