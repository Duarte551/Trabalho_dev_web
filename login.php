

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <title>Login</title>
</head>

<body class="d-flex align-items-center py-4">
    <main class=" m-auto container" id="slimmer">

        <form name="Login" method="post" action="">
            <fieldset >

                <div class="separa" >
                <img src="./assets/img/books.png" class="m-2" height="200" width="350"/>
                <h1 >Login</h1>
            </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email"/>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" name="senha"/>
                    <label for="floatingInput">Senha</label>
                </div>
                <div class="botoes">
                    <button id="oo" name="submit" type="submit" class="btn w-100 p-2"><a class="linky">Entrar</a></button>      
                </div>
            </fieldset>

            <?php

                if($_POST){

                    if(isset($_POST['submit'])){

                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $url = "http://127.0.0.1:5000/livros/$email&&$senha";
                        $ch = curl_init($url);

                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                        $resultado = json_decode(curl_exec($ch));

                        foreach($resultado as $val){
                            if($val == "Usuário Não encontrado!!"){
                                echo "<script> alert('Usuário não encontrado, verifique se os dados estão corretos') ;</script>";

                            }else{
                                echo "<script> alert('Login realizado!!'); window.location='http://Localhost:8000/'</script>";
                            }
                    }
            } 
            }
            ?>
        </form>
    </main>
</body>
</html>