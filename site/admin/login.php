<?php
include './header.php';
include './db.class.php';

$db = new db('usuario', 'idusuarios');

if (!empty($_POST)) {
    if (empty($_POST['login']) || empty($_POST['senha'])) {
        echo "<div class='alert alert-warning'>Preencha login e senha!</div>";
    } else {
        $result = $db->login($_POST);

        if ($result !== 'error') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['usuario_id'] = $result->idusuarios;
            $_SESSION['login'] = $result->login;
            $_SESSION['nome'] = $result->nome;

            echo "<div class='alert alert-success'>Sucesso! Redirecionando...</div>";
            
            echo "<script>
                    setTimeout(()=> window.location.href = 'main.php', 1000);
                  </script>";
            exit;
        } else {
            echo "<div class='alert alert-danger'>Login ou senha incorretos</div>";
        }
    }
}
?>

<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Login</h3>
    <form action="login.php" method="post" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label class="form-label">Login</label>
            <input class="form-control" type="text" name="login">
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input class="form-control" type="password" name="senha">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Entrar</button>
        </div>
    </form>
</div>

<?php include './footer.php'; ?>