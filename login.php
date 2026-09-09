<?php
session_start();

// A sessão mantém as informações do usuário logado.
// Se ele já estiver autenticado, vai direto para o sistema.
if (isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}

// O cookie guarda pequenas informações úteis no navegador.
// Aqui, usamos para lembrar o último e-mail utilizado no login.
$emailSalvo = $_COOKIE["ultimo_email"] ?? "";
$erro = $_GET["erro"] ?? "";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3 mb-4">Login</h1>

                        <?php if ($erro === "1"): ?>
                            <div class="alert alert-danger">E-mail ou senha inválidos.</div>
                        <?php endif; ?>

                        <form action="autenticar.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    value="<?= htmlspecialchars($emailSalvo) ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control" required>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="lembrar" name="lembrar" value="1">
                                <label class="form-check-label" for="lembrar">
                                    Lembrar meu e-mail
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                            <div class="mt-3 text-center">
                                <a href="cadastrarUsuario.php">
                                    Criar usuário
                                </a>
                            </div>
                        </form>

                        <p class="text-muted small mt-3 mb-0">
                            Usuário de teste: aluno@teste.com | Senha: 123456
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>