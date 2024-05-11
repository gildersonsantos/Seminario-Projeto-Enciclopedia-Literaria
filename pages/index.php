<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS | Enciclopédia literária</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variaveis-body.css">
    <link rel="stylesheet" href="../css/aside.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main-home.css">
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

        // Verifica a conexão
        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }

        // Executa a query da variável $sql
        $sql = " SELECT * FROM tb_livros ";
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
            <div class="container-main">
                <h2>Lista de Livros</h2>
                <button><i class="bi bi-arrows-expand"></i></button>
                <a class="add-new-libre" href="adiciona-livro.php" > Adicionar Novo Livro </a>
            </div>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome da obra</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                        <th>Ano de lançamento</th>
                        <th>Capa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultado->num_rows > 0) { ?>
                        <?php while($registro = $resultado->fetch_assoc()) { ?>
                            <tr>
                            <th></th>
                            <td><?= $registro["nome"]; ?></td>
                            <td><?= $registro["autor"]; ?></td>
                            <td><?= $registro["genero"]; ?></td>
                            <td><?= $registro["ano"]; ?></td>
                            <td><img src="<?= $registro["imagem"]; ?>" alt="Imagem do livro"></td>
                            <td>
                                <div class="group-buttons">
                                    <!-- <button class="view"><i class="bi bi-eye"></i></button> -->
                                    <td><a href="visualiza-livro.php?id=<?= $registro["id_livro"]; ?>" class="view" > <i class="bi bi-eye"></i> </a></td>

                                    <!-- <button class="edit"><i class="bi bi-pencil"></i></button> -->
                                    <td><a href="editar-livro.php?id=<?= $registro["id_livro"]; ?>" class="edit"> <i class="bi bi-pencil"></i> </a></td>
                            
                                    <!-- <button class="delete"><i class="bi bi-trash2"></i></button> -->
                                    <td><a href="excluir.php?id=<?= $registro["id_livro"]; ?>" class="delete" > <i class="bi bi-trash2"></i></a></td>
                                </div>
                            </td>
                            <th></th>
                            </tr>
                        <?php }  ?>
                        </td>
                </tbody>
            </table>
                <?php } else { ?>
                    <td>Não há registros</td>
                <?php } $conexao->close(); ?>
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
                    <a href="index.php" class="nav-link active">
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
                    <a href="sobre.html" class="nav-link">
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
    <script src="../js/main-home.js"></script>
</body>

</html>