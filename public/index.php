<?php

require_once "../src/cadastrar_clientes.php";
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2>Cadastro de Clientes</h2>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST" enctype="multipart/form-data" action="../src/cadastrar_clientes.php">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gênero</label>
                        <select name="genero" class="form-control">
                            <option value="Mulher Trans">Mulher Trans</option>
                            <option value="Mulher Cis">Mulher Cis</option>
                            <option value="Travesti">Travesti</option>
                            <option value="Homem Cis">Homem Cis</option>
                            <option value="Homem Trans">Homem Trans</option>
                            <option value="Não binário">Não binário</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Faixa Etária</label>//radom button
                        <select name="faixa_etaria" class="form-control">
                            <option value="18-">Menor de 18</option>
                            <option value="18-25">18-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-49">36-49</option>
                            <option value="50+">50+</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control" minlength="11" maxlength="11" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" minlength="11" maxlength="11" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hobbies</label>//check box
                        <input type="text" name="hobbies" class="form-control" placeholder="Ex: ler, escrever, dançar, jogar bola...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mini Bio</label>
                        <textarea name="minibio" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100" >Cadastrar</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="../src/listar_clientes.php" class="btn btn-secondary">Ver Clientes</a>
        </div>
    </div>
</body>
</html>
