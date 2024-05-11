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
    <link rel="stylesheet" href="../css/main-adiciona-livro.css">
    <link rel="stylesheet" href="../css/medias-querys.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
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
            <form method="post" enctype="multipart/form-data" id="formulario" action="insertlivro.php">
                <div class="group-inputs">
                    <div>
                        <label for="titulo">Título do Livro:</label>
                        <input type="text" id="titulo" name="titulo" required autofocus>
                    </div>
                    <div>
                        <label for="ano">Ano de Lançamento:</label>
                        <input type="number" id="ano" name="ano" min="1800" max="2100" required>
                    </div>
                    <div>
                        <label for="autor">Nome do Autor:</label>
                        <input type="text" id="autor" name="autor" required>
                    </div>
                    <div>
                        <label for="genero">Gênero:</label>
                        <input type="text" id="genero" name="genero" required>
                    </div>
                    <div class="custom-file-button"> 
                        <label for="imagem"><i class="bi bi-card-image"></i> Imagem do livro</label>
                        <input type="file" id="imagem" name="imagem" accept="image/*">
                    </div>
                </div>
                <div class="descricao">
                    <label for="descricao">Descrição <strong>(máx. 500 caracteres):</strong></label>
                    <textarea id="descricao" name="descricao" rows="4" maxlength="500" required></textarea>
                </div>
                <button type="submit">
                    <span class="btn-txt">Adicionar Livro</span>
                </button>
            </form>

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