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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Gestão de Usuários</title>
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
            <li class="nav-item">
                <a class="nav-link" href="./cadastro.php">Cadastrar Usuários</a>
            </li>
            </ul>
        </div>
    </nav>

    <main class="d-flex align-items-center py-4">
        <div class="w-100 m-auto container">
        <div class="separa">
            <img src="./assets/img/books.png" class="m-2" height="150" width="263"/>
        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Gerenciar <b>Usuários</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Cadastrar Usuário</span></a>
                                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Deletar</span></a>						
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Livro Favorito</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                    $ch = curl_init($url);

                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    $resultado = json_decode(curl_exec($ch));
                                    foreach($resultado as $val){

                                ?>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="<?php  $id = $val->_id; ?>" value="id">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td name="id"><?php  echo $val->_id; ?></td>
                                <td name="usuario"><?php  echo $val->usuario; ?></td>
                                <td name="email"><?php  echo $val->email; ?></td>
                                <td name="titulo"><?php  echo $val->titulo; ?></td>
                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" name="<?php  echo $val->_id; ?>">&#xE254;</i></a>
                                    

                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" name="<?php  echo $val->_id; ?>">&#xE872;</i></a>
                                </td>
                            </tr>
                            </tr> <?php } curl_close($ch);?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">						
                                <h4 class="modal-title">Cadastrar Funcionário</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>	
                                <div class="form-group">
                                    <label>Livro Favorito</label>
                                    <input type="text" class="form-control" name="titulo" required>
                                </div>				
                                <div class="form-group">
                                    <label>senha</label>
                                    <input type="password" class="form-control" name="senha" required>
                                </div>	
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-success" id="submit" name="submit" value="Add">
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
                                    echo "<script> alert('Cadastro Realizado com sucesso!!') ;  window.location='http://Localhost:8000/gestao.php</script>";
                                    curl_close($ch);
                                }
                                } }
                            ?>
                        </form>
                    </div>
                </div>
            </div>


            <div id="editEmployeeModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">						
                                                        <h4 class="modal-title">Editar Usuário</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">	
                                                    <div class="form-group">
                                                            <label>Id</label>
                                                            <input type="number" class="form-control" name="id">
                                                        </div>				
                                                        <div class="form-group">
                                                            <label>Nome</label>
                                                            <input type="text" class="form-control" name="nome">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email">
                                                        </div>				
                                                        <div class="form-group">
                                                            <label>Livro Favorito</label>
                                                            <input type="text" class="form-control" name="titulo">
                                                        </div>	
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <input type="submit" class="btn btn-info" name="editar" id="editar" value="Save">
                                                        
                                                        <?php 

                                                            if($_POST){
                                                            if (isset($_POST['editar'])){

                                                                $headers = ['Content-Type: application/json'];

                                                                $id = $_POST['id'];
                                                                $nome = $_POST['nome'];
                                                                $email = $_POST['email'];
                                                                $titulo = $_POST['titulo'];
                                                                
                                                                $url = "http://127.0.0.1:5000/livros/$id";

                                                                $object = new stdClass;
                                                                $object->_id = $id;
                                                                $object->usuario = $nome;
                                                                $object->email = $email;
                                                                $object->titulo = $titulo;

                                                                $json = json_encode($object);
                                                                
                                                                $ch = curl_init($url);

                                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                                                                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                                                                
                                                                $result = json_encode(curl_exec($ch));

                                                                if($e = curl_error($ch)){
                                                                    echo "<script> alert('Error: Alguma coisa deu errado, tente novamente". $e . "')</script>";
                                                                }else{
                                                                    echo "<script> alert('Registro Alterado com sucesso!!') ;  window.location='http://Localhost:8000/gestao.php</script>";
                                                                    curl_close($ch);
                                                                }
                                                                } }
                                                            ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

            <div id="deleteEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post">
                            <div class="modal-header">						
                                <h4 class="modal-title">Deletar Usuário</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                    <div class="form-group">
                                        <label>Digite o id do usuário que deseja excluir</label>
                                        <input type="number" class="form-control" name="id">
                                    </div>
                                <p class="text-warning"><small>Esta ação não pode ser desfeita.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="Delete" name="delete">
                                <?php 

                                if($_POST){
                                if (isset($_POST['delete'])){

                                    $id = $_POST['id'];
                                    
                                    $url = "http://127.0.0.1:5000/livros/$id";
                                    
                                    $ch = curl_init($url);

                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    #curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                                    
                                    $resultado = json_decode(curl_exec($ch));

                                    foreach($resultado as $val){
                                        echo "<script> alert('Registro excluído com sucesso!!');</script>";
                                        if($val == ""){
                                            echo "<script> alert('Algo deu errado, por favor, tente novamente') ;  window.location='http://Localhost:8000/gestao.php</script>";
            
                                        }else{
                                            echo "<script> alert('Registro excluído com sucesso!!".$val."') ;  window.location='http://Localhost:8000/gestao.php</script>";
                                        }
                                }
                                    } }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <h1 id="footer_text">2023</h1>
    </footer>
</body>
</html>