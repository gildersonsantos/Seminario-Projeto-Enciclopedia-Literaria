<?php
    // Obtém a lista de hábitos do banco de dados MySQL
    $servidor = "localhost:3308";
    $usuario = "root";
    $senha = "";
    $bancodedados = "livraria";
    // Cria uma conexão com o banco de dados
    $conexao = new mysqli( $servidor, $usuario, $senha, $bancodedados);
    
    $id = $_GET["id"];

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $sql = "SELECT * FROM tb_livros "." WHERE id_livro=".$id;

    if (!($conexao->query($sql) == TRUE)) {
        $conexao->close();
        die("Erro: " . $sql . "<br>" . $conexao->error);
    }
    
    $resultado = $conexao->query($sql);

    if ($resultado) {
        while ($registro = $resultado->fetch_assoc()) {
            $imgCaminho = $registro["imagem"];
        }
    }

    $sql = "DELETE FROM tb_livros WHERE id_livro=".$id;

    if (!($conexao->query($sql) === TRUE)) {
        $conexao->close();
        die("Erro: " . $sql . "<br>" . $conexao->error);
    }

    if ($imgCaminho != "../img/img-padrao.png") {
        unlink($imgCaminho);
    }

    $conexao->close();
    header("Location: index.php");
    $resultado = $conexao->query($sql);
    // Verifica se a query retornou registros
?>