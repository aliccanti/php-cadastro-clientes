<?php
require_once "../src/funções.php";

if (!isset($_GET['cpf'])) {
    header("Location:  listar_clientes.php");
    exit;
}

$cpf = $_GET['cpf'];
$cliente = buscarCliente($cpf);

if (!$cliente) {
    header("Location:  listar_clientes.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-dark text-center">
                <h2>Editar Cliente</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="../src/funções.php">
                    <input type="hidden" name="original_cpf" value="<?= $cpf ?>">

                    <div class="mb-3">
                        <label class="form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($cliente[0]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($cliente[3]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CPF:</label>
                        <input type="text" name="cpf" class="form-control" minlength="11" maxlength="11" value="<?= htmlspecialchars($cliente[4]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone:</label>
                        <input type="text" name="telefone" class="form-control" minlength="11" maxlength="11" value="<?= htmlspecialchars($cliente[5]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gênero:</label>
                        <input type="text" name="genero" class="form-control" value="<?= htmlspecialchars($cliente[1]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hobbies:</label>
                        <input type="text" name="hobbies" class="form-control" value="<?= htmlspecialchars($cliente[6]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Faixa Etária:</label>
                        <input type="text" name="faixa_etaria" class="form-control" value="<?= htmlspecialchars($cliente[2]) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mini Bio:</label>
                        <textarea name="minibio" class="form-control"><?= htmlspecialchars($cliente[7]) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Atual:</label><br>
                        <img src="<?= htmlspecialchars($cliente[8]) ?>" width="100px" height="100px">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alterar Foto:</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning" name="acao" value="editar">Salvar Alterações</button>
                    <a href="listar_clientes.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
