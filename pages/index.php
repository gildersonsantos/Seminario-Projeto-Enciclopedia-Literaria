<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS | Enciclopédia literária</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
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
        session_start();
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

        $ordernaCrescente = true;
    
        if (isset($_SESSION["ordernaCrescente"])) {
            $ordernaCrescente = $_SESSION["ordernaCrescente"];
        }
        
        if (isset($_POST["alterar"])) {
            $ordernaCrescente = !$ordernaCrescente; 
            $_SESSION["ordernaCrescente"] = $ordernaCrescente;
        }
    
        // Verifica se a consulta de pesquisa existe
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $_SESSION['search'] = $search;  // Armazena a consulta de pesquisa na sessão
        } else if (isset($_SESSION['search'])) {
            $search = $_SESSION['search'];
        } else {
            $search = '';
        }
    
        // Constrói a consulta SQL
        $sql = "SELECT * FROM tb_livros";
    
        if (!empty($search)) {
            $sql .= " WHERE nome LIKE '%$search%' OR autor LIKE '%$search%' OR genero LIKE '%$search%' OR ano LIKE '%$search%'"; 
        }
    
        // Adiciona a ordenação
        if ($ordernaCrescente) {
            $sql .= " ORDER BY nome";
        } else {
            $sql .= " ORDER BY nome DESC";
        }

        $resultado = $conexao->query($sql);
        // Verifica se a query retornou registros
    ?>
    <div class="container">
        <header>
            <button class="caret-left"><i class="bi bi-caret-left"></i></button>
            <form action="index.php" method="GET" class="form-search">
                <input type="search" name="search" id="search" placeholder="Search..." value="<?php echo isset($_SESSION['search']) ? $_SESSION['search'] : ''; ?>">
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
                                <!-- index.html -->
                <form action="index.php" method="POST">
                    <button type="submit" name="alterar"><i class="bi bi-arrows-expand"></i></button>
                </form>

                <a class="add-new-libre" href="adiciona-livro.php" > Adicionar Novo Livro </a>
            </div>
            <hr>
            <div class="container-table">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome da obra</th>
                            <th>Autor</th>
                            <th>Gênero</th>
                            <th>Ano de lançamento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado->num_rows > 0) { ?>
                            <?php while($registro = $resultado->fetch_assoc()) { ?>
                                <tr>
                                    <td>
                                        <img src="<?= $registro["imagem"]; ?>" alt="Capa do Livro: <?= $registro["nome"]; ?>">
                                    </td>
                                    <td><?= $registro["nome"]; ?></td>
                                    <td><?= $registro["autor"]; ?></td>
                                    <td><?= $registro["genero"]; ?></td>
                                    <td><?= $registro["ano"]; ?></td>
                                    <td>
                                        <div class="group-buttons">
                                            <a href="visualiza-livro.php?id=<?= $registro["id_livro"]; ?>" class="view" > <i class="bi bi-eye"></i> </a>
                                            <a href="editar-livro.php?id=<?= $registro["id_livro"]; ?>" class="edit"> <i class="bi bi-pencil"></i> </a>
                                            <a href="excluir.php?id=<?= $registro["id_livro"]; ?>" class="delete" > <i class="bi bi-trash2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }  ?>
                        <?php } else { ?>
                            <tr><td colspan="6" class="result-none">Não há registros</td></tr>
                        <?php } $conexao->close(); ?>
                    </tbody>
                </table>
            </div>
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
</body>

</html>