<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <title>Home</title>
</head>
<body >
    <nav class="navbar navbar-expand-lg">
        <a href="./index.php"><img id="header-icon" src="./assets/img/Header.png" alt="Logo"/></a>
        <h1 id="header_text">Biblioteca :)</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./gestao.php">Gerenciar Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./cadastro.php">Cadastrar Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Login</a>
            </li>
            </ul>
        </div>
    </nav>

    <main class="d-flex align-items-center py-4">
        <div class="w-100 m-auto container">
        <div class="separa">
            <img src="./assets/img/books.png" class="m-2" height="150" width="263"/>
            <h1>Olá :)</h1>
            <p>O que você gostaria de fazer?</p>
        </div>
        <div class="teeste">
            <div class="botoes">
                <button id="oo" type="submit" class="btn"><a class="linky" href="./cadastro.php">Cadastrar Usuários</a></button>
                <button id="oo" type="button" class="btn"><a class="linky" href="./gestao.php">Gerenciar Usuários</a></button>
            </div>
        </div>
    </div>
    </main>
    <footer class="footer">
        <h1 id="footer_text">2023</h1>
    </footer>
</body>
</html>