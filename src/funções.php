<?php

$arquivo = __DIR__ . "/../clientes.csv";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["acao"]) && $_POST["acao"] === "editar") {    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $genero = $_POST["genero"];
    $hobbies = $_POST["hobbies"];
    $faixaEtaria = $_POST["faixa_etaria"];
    $minibio = $_POST["minibio"];
    $foto = $_FILES["foto"]["tmp_name"];

    editarCliente($nome, $email, $cpf, $telefone, $genero, $hobbies, $faixaEtaria, $minibio, $foto);

    // header("Location: listar_clientes.php");
    // exit;
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $idade = $_POST["faixa_etaria"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $hobbies = $_POST["hobbies"];
    $minibio = $_POST["minibio"];
    $foto = $_FILES["foto"]["tmp_name"];

    cadastrarCliente($nome, $genero, $idade, $email, $cpf, $telefone, $hobbies, $minibio, $foto);
}




function cadastrarCliente($nome, $genero, $idade, $email, $cpf, $telefone, $hobbies, $minibio, $foto) {
    global $arquivo;
    $dados = [$nome, $genero, $idade, $email, $cpf, $telefone, $hobbies, $minibio, $foto];
    $file = fopen($arquivo, "a");
    echo $file;
    fputcsv($file, $dados);
    fclose($file);
}

function listarClientes() {
    global $arquivo;
    if (!file_exists($arquivo)) {
        return [];
        
    } else {
        $clientes = [];
        $file = fopen($arquivo, "r");
        while (($dados = fgetcsv($file)) !== false) {
           $clientes[] = $dados;
            
        }
        fclose($file);
        return $clientes;
    }
}


function excluirCliente($nome) {
    global $arquivo;
    $clientes = [];
    if (file_exists($arquivo)) {
        $file = fopen($arquivo, "r");
        while (($dados = fgetcsv($file)) !== false) {
            if ($dados[0] !== $nome) {
                $clientes[] = $dados;
            }
        }
        fclose($file);
        $file = fopen($arquivo, "w");
        foreach ($clientes as $dados) {
            fputcsv($file, $dados);
        }
        fclose($file);
    }
}

function editarCliente($nome, $email, $cpf, $telefone, $genero, $hobbies, $faixaEtaria, $minibio, $foto) {
    global $arquivo;
    $clientes = [];

    if (file_exists($arquivo)) {
        $file = fopen($arquivo, "r");
        while (($dados = fgetcsv($file)) !== false) {
            if ($dados[0] === $nome) {
                echo "entrou";
                echo $nome;

                $dados[0] = $nome;
                $dados[1] = $genero;
                $dados[2] = $faixaEtaria;
                $dados[3] = $email;
                $dados[4] = $cpf;
                $dados[5] = $telefone;
                $dados[6] = $hobbies;
                $dados[7] = $minibio;

                if (!empty($foto)) {
                    $caminhoFoto = "../public/uploads/" . basename($foto);
                    move_uploaded_file($foto, $caminhoFoto);
                    $dados[8] = $caminhoFoto;
                }
                
            } else {
                $clientes[] = $dados;
            }
               
        }
        fclose($file);

        $file = fopen($arquivo, "w");
        foreach ($clientes as $dados) {
            fputcsv($file, $dados);
        }
        fclose($file);
    }
}

function buscarCliente($nome) {
    global $arquivo;
    if (!file_exists($arquivo)) {
        return null;
    }

    $file = fopen($arquivo, "r");
    while (($dados = fgetcsv($file)) !== false) {
        if ($dados[0] === $nome) {
            fclose($file);
            return $dados;
        }
    }
    fclose($file);
    return null;
}