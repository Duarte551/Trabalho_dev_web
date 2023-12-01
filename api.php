<?php

$url = "http://127.0.0.1:5000/livros";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$resultado = json_decode(curl_exec($ch));
#var_dump($resultado[0]);

foreach($resultado as $val){
    echo "Id: " . $val->_id . '<br>';
    echo "nome: " . $val->usuario . '<br>';
    echo "titulo: " . $val->titulo . '<br>';
    echo "Email: " . $val->email . '<br>';
}

?>