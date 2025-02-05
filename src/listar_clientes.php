<?php
require_once "../src/funções.php";
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2>Clientes Cadastrados</h2>
            </div>
            <div class="card-body">
                <a href="../public/index.php" class="btn btn-success mb-3">Cadastrar Novo Cliente</a>
                <table class='table table-bordered table-striped' action="../src/funções.php">
                <thead class='table-dark'><tr><th>Nome</th><th>Gênero</th><th>Idade</th><th>Email</th><th>CPF</th><th>Telefone</th><th>Hobbies</th><th>Mini Bio</th><th>Foto</th><th>Ações</th></tr></thead>
                <tbody>
                <?php
                $clientes = listarClientes();
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    echo "<td>" . $cliente[0] . "</td>";
                    echo "<td>" . $cliente[1] . "</td>";
                    echo "<td>" . $cliente[2] . "</td>";
                    echo "<td>" . $cliente[3] . "</td>";
                    echo "<td>" . $cliente[4] . "</td>";
                    echo "<td>" . $cliente[5] . "</td>";
                    echo "<td>" . $cliente[6] . "</td>";
                    echo "<td>" . $cliente[7] . "</td>";
                    echo "<td><img src='" . $cliente[8] . "' width='100px' height='100px'></td>";
                    echo "<td>
                    <a href='editar_clientes.php?cpf=" . urlencode($cliente[4]) . "' class='btn btn-primary'>Editar</a>
                    <form method='POST' action='excluir_clientes.php' style='display:inline;'>
                        <input type='hidden' name='nome' value='" . htmlspecialchars($cliente[0]) . "'>
                        <button type='submit' class='btn btn-danger'>Excluir</button>
                    </form>
                    </td>";
                }

                ?>
            </div>
        </div>
    </div>
</body>
</html>
