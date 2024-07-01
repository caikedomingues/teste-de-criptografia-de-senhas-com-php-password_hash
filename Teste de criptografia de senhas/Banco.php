


 <?php
 
    /*Classe que irá se conectar com o banco de dados e realizara as operações */

    class Banco{

        private function conexao(){

            try{

                $conexao =  /*Dentro da instância, vamos colocar o código padrão, o nome do servidor, a porta do mysql, 
                o nome do banco de dados, o usuário e a senha. */
                $conexao = new PDO('mysql:host=localhost;port=3306;dbname=testecriptografia','root','');


                return $conexao;

            }catch(PDOException $erro){

                /*Caso a conexão não funcione, ele ira informar o usuário e apresentar o tipo de erro
                encontrado */
                echo "<p>Não foi possivel se conectar ao banco de dados: ".$erro."</p>";
            }
        }


        /*Metodo responsável por cadastrar os dados no banco de dados */
        public function cadastrarDados(array $dados){

            /*Mensagem de aviso que os dados foram cadastrados */
            echo "<script> alert('Dados inseridos no banco de dados')</script>;";

            /*Chamada da conexao com o banco de dados */
            $conexao = $this->conexao();
            
            /*Criptografia dos dados com o metodo password_hash */
            $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
            /*Inserção dos dados */
            $comando_sql = $conexao->query("INSERT INTO usuario(email, senha) VALUES('".$dados['email']."', '".$senha."') ");

        }
    }
 
 ?>