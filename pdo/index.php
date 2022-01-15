<?php

// Criando conexão com banco
// $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdo', 'root', '');

// Tratando exceptions
try {
    $conexao = new PDO('mysql:host=localhost;dbname=php_com_pdox', 'root', '');
} catch (PDOException $erro) {
    echo '<pre>';
    // print_r ($erro);
    print_r ($erro->getMessage());
    echo '</pre>';
}


// Gravando os dados no DB
try {
    $pessoa = $_POST['pessoa'];
    $produto = $_POST['produto'];
    $observacao = $_POST['observacao'];
    $data = $_POST['dataEntrega'];
    $qtdEntrega = $_POST['qtdEntrega'];

    // inserindo na tabela
    $query = '
        insert into `tb_admin.estoquehistorico`(pessoa, produto, observacao, data, qtdEntrega)
        values("' . $pessoa . '","' . $produto . '","' . $observacao . '","' . $data . '","' . $qtdEntrega . '")
    ';
    $res = $conexao->exec($query);
    echo $res;
    
} catch (PDOException $e) {
    print_r($e); //se der erro na gravação dos dados, será exibido o erro na tela
}