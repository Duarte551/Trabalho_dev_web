<?php

$url = "http://127.0.0.1:5000/livros";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <title>Cadastro de Usuário</title>
</head>

<body >
    <nav class="navbar navbar-expand-lg">
        <a href="./Home.html"><img id="header-icon" src="./assets/img/Header.png" alt="Logo"/></a>
        <h1 id="header_text">Biblioteca :)</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./gestao.php">Gerenciar Usuários</a>
            </li>
            </ul>
        </div>
    </nav>

    <main class="w-100 m-auto container">
        <div class="d-flex align-items-center py-4">
        <div class="separa">
            <img src="./assets/img/books.png" class="m-2" height="150" width="263"/>
            <h1>Cadastro de Usuário</h1>
            <form class="row g-3" method="post">
                <div class="col-md-6">
                    <label for="floatingInput" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="floatingInput" placeholder="Fulano" name="nome">
                </div>
                <div class="col-md-6">
                    <label for="floatingInput" class="form-label">Livro Favorito</label>
                    <input type="text" class="form-control" id="floatingInput" name="titulo">
                </div>
                <div class="col-md-6">
                    <label for="floatingInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@email.com" name ="email">
                </div>
                <div class="col-md-6">
                    <label for="floatingInput" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="floatingInput" placeholder="*****" name="senha">
                </div>
                <div class="botoes">
                    <button id="oo" type="button" class="btn"><a class="linky" href="./Home.html">Home</a></button>
                    <button id="oo" type="submit" name="submit" class="btn"><a class="linky">Salvar</a></button>
                </div>

                <?php 

if($_POST){
if (isset($_POST['submit'])){

    $headers = ['Content-Type: application/json'];

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $titulo = $_POST['titulo'];
    $senha = $_POST['senha'];
    
    $object = new stdClass;
    $object->_id = rand(1, 99999);
    $object->usuario = $nome;
    $object->email = $email;
    $object->titulo = $titulo;
    $object->senha = $senha;

    $json = json_encode($object);
    
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    
    $result = json_encode(curl_exec($ch));

    if($e = curl_error($ch)){
        echo "<script> alert('Error: Alguma coisa deu errado, tente novamente". $e . "')</script>";
    }else{
        echo "<script> alert('Cadastro Realizado com sucesso!!') ;</script>";
        curl_close($ch);
    }
    } }
?>
            </form>
            <!-- <div class="teeste">

            </div> -->
        </div>
    </main>
    <footer class="footer">
        <h1 id="footer_text">2023</h1>
    </footer>
</div>
</body>
</html>


</main>