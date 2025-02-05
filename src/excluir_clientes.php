<?php
require_once "../src/funções.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome']) ) {
    $nome = $_POST['nome'];
    excluirCliente($nome);
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    excluirCliente($nome);
}

header("Location: listar_clientes.php");
exit;
?>
