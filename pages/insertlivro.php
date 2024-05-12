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

        $nome = $_POST["titulo"];
        $ano = intval($_POST["ano"]);
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $descricao = $_POST["descricao"];

        $pasta_img = "../img/";
        $imagem_nome = $_FILES["imagem"]['name'];
        $extensao = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));
        $imagem = $_FILES["imagem"]['full_path'];

        $imagem_temp = $_FILES['imagem']['tmp_name'];
        // $imagem_dados = file_get_contents($imagem_temp);
        // Executa a query da variável $sql
        if($extensao == "jpg" || $extensao == 'png'){
            $salvar_img = move_uploaded_file($imagem_temp, $pasta_img . $imagem_nome . "." . $extensao);
            $path = $pasta_img . $imagem_nome . "." . $extensao;
            $sql = "INSERT INTO tb_livros (nome, genero, autor, ano, imagem, descricao) VALUES ('".$nome."', '".$genero."', '".$autor."', '".$ano."', '".$path."', '".$descricao."')";
        } else {
            $path = "../img/img-padrao.png";
            $sql = "INSERT INTO tb_livros (nome, genero, autor, ano, imagem, descricao) VALUES ('".$nome."', '".$genero."', '".$autor."', '".$ano."', '".$path."', '".$descricao."')";
        }     
        // $sql = “INSERT INTO tb_livros (nome, genero, autor, ano, imagem, descricao) VALUES (‘”.$nome.”’, ‘”.$genero.”’, ‘”.$autor.”’, ‘”.$ano.”’, ‘”.$imagem.”’ ,‘”.$descricao.”’)”;
        if (!($conexao->query($sql) === TRUE)) {
            $conexao->close();
            die("Erro: " . $sql . "<br>" . $conexao->error);
        }
        $conexao->close();
        header("Location: index.php");
        $resultado = $conexao->query($sql);
        // Verifica se a query retornou registros
    ?>