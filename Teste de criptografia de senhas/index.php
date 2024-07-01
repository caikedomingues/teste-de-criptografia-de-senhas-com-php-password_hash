
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device initial scale 1.0">
        <meta http-equiv="X-UA Compatible" content="IE-edge">
        <link rel="stylesheet" href="estilo.css">
        <link rel="shotcuts icon" href="imagens/logo.jpg">
        <title>Teste de senhas criptografadas</title>
    </head>

    <body>
        <section>

            <?php
                /*Aqui vamos capturar os dados usando um filtro do tipo array */
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
            ?>
            <img src="imagens/perfil.png" alt="foto de perfil" class="imagem-perfil">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <label for="email">Email:</label>
                <input type="text" name="email" required class="input-email" autocomplete="off"><br>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" required class="input-email" autocomplete="off"><br>

                <input type="submit" value="Confirmar dados" class="botao-entrar">

            </form>

            <?php

                /*Antes de realizar a inserção dos dados */
                if(!empty($dados['email']) && !empty($dados['senha'])){

                    include 'Banco.php';

                    $banco = new Banco();

                    $banco->cadastrarDados($dados);
                }
            ?>
        </section>
    </body>
</html>