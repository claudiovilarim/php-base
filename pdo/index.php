<?php

// Criando conexão com banco
// $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'root', '');

// Tratando exceptions
if(isset($_POST['usuario']) && isset($_POST['senha'])){
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'root', '');
        $query = "
            SELECT * FROM tb_usuarios WHERE usuario = '{$_POST['usuario']}' AND senha = '{$_POST['senha']}'
        ";

        $stmt = $conexao->query($query);
        $usuario = $stmt->fetch();

        print_r($usuario);
        echo '<hr>';

    } catch (PDOException $erro) {
        echo '<pre>';
        // print_r ($erro);
        print_r ($erro->getMessage());
        echo '</pre>';
    }
}


// Gravando os dados no DB
// try {
//     $pessoa = $_POST['pessoa'];
//     $produto = $_POST['produto'];
//     $observacao = $_POST['observacao'];
//     $data = $_POST['dataEntrega'];
//     $qtdEntrega = $_POST['qtdEntrega'];

//     // inserindo na tabela
//     $query = '
//         insert into `tb_admin.estoquehistorico`(pessoa, produto, observacao, data, qtdEntrega)
//         values("' . $pessoa . '","' . $produto . '","' . $observacao . '","' . $data . '","' . $qtdEntrega . '")
//     ';
//     $res = $conexao->exec($query);
//     echo $res;
    
// } catch (PDOException $e) {
//     print_r($e); //se der erro na gravação dos dados, será exibido o erro na tela
// }

?>


<form method="POST">
    <input type="text" name="usuario" placeholder="usuario" id="">
    <input type="password" name="senha" placeholder="senha" id="">
    <button type="submit">Enviar</button>
</form>