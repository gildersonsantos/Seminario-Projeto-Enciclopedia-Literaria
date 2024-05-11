<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS | Enciclopédia Literária</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variaveis-body.css">
    <link rel="stylesheet" href="../css/aside.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main-visualiza-livro.css">
    <link rel="stylesheet" href="../css/medias-querys.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
        // Obtém a lista de hábitos do banco de dados MySQL
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bancodedados = "livraria";
        // Cria uma conexão com o banco de dados
        $conexao = new mysqli( $servidor, $usuario, $senha, $bancodedados);

        $id = intval($_GET["id"]);
        // Verifica a conexão
        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }

        // Executa a query da variável $sql
        $sql = " SELECT * FROM tb_livros "." WHERE id_livro=".$id;
        $resultado = $conexao->query($sql);
        // Verifica se a query retornou registros
    ?>
    <div class="container">
        <header>
            <button class="caret-left"><i class="bi bi-caret-left"></i></button>
            <form action="" class="form-search">
                <input type="search" name="search" id="search" placeholder="Search...">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="container-header-mobile">
                <h2 class="logo">Enciclopédia literária</h2>
                <button class="list"><i class="bi bi-list"></i></i></button>
                <button class="bell"><i class="bi bi-bell"></i></button>
            </div>
        </header>
        <main>
            <article>
            <?php while($registro = $resultado->fetch_assoc()) { ?>
                <figure class="libre">
                    <div class="container-img">
                        <img src="<?= $registro["imagem"]; ?>"
                            alt="Foto de Capa do Livro">
                    </div>
                    <figcaption>
                        <h2><?= $registro["nome"]; ?></h2>
                        <p><?= $registro["autor"]; ?></p>
                        <div class="container-informacoes">
                            <span><?= $registro["genero"]; ?></span>
                            <span><?= $registro["ano"]; ?></span>
                        </div>
                    </figcaption>
                </figure>
                <div class="group-buttons">
                    <button class="edit"><i class="bi bi-pencil"></i></button>
                    <button class="delete"><i class="bi bi-trash2"></i></button>
                </div>
                <p class="descricao"> <?= $registro["descricao"]; ?> </p>
                <?php }  ?>
            </article>
        </main>
    </div>
    <aside>
        <h1 class="logo">Enciclopédia literária</h1>
        <figure class="profile">
            <button class="close"><i class="bi bi-x-lg"></i></button>
            <div class="container-img">
                <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    alt="Foto de Perfil do Usuário Mariano Gonzaga">
            </div>
            <figcaption>
                <h3>Mariano Gonzaga</h3>
                <p><strong>Usuário</strong></p>
            </figcaption>
        </figure>
        <nav>
            <ul class="navbar">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">
                        <i class="bi bi-house-door"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link disabled" title="Elemento ainda em desenvolvimento">
                        <i class="bi bi-sliders"></i>
                        <span>Configurações</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="bi bi-info"></i>
                        <span>Sobre</span>
                    </a>
                </li>
            </ul>
        </nav>
        <button class="logout">
            <span>Logout</span>
            <i class="bi bi-box-arrow-right"></i>
        </button>
    </aside>
    <script src="../js/script.js"></script>
</body>

</html>