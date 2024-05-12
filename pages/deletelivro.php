<?php
    // Obtém a lista de hábitos do banco de dados MySQL
    $servidor = "localhost:3308";
    $usuario = "root";
    $senha = "";
    $bancodedados = "livraria";
    // Cria uma conexão com o banco de dados
    $conexao = new mysqli( $servidor, $usuario, $senha, $bancodedados);

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $id = $_POST["id"];

    // Executa a query da variável $sql
    $sql = "DELETE FROM tb_livros WHERE id=".$id;
    if (!($conexao->query($sql) === TRUE)) {
        $conexao->close();
        die("Erro: " . $sql . "<br>" . $conexao->error);
    }
    $conexao->close();
    header("Location: index.php");
    // $resultado = $conexao->query($sql);
    // Verifica se a query retornou registros
?>