<?php
include './header.php';
include './database/db.class.php';

$db = new db('usuario');
$data = null;

if (!empty($_POST)) {
    if (empty($_POST['login']) || empty($_POST['senha'])) {
        echo 'Login e senha são obrigatórios';
        exit;
    }

    $result = $db->login($_POST);

    if ($result !== 'error') {
        session_start();
        $_SESSION['usuario_id'] = $result->id;
        $_SESSION['login'] = $result->login;
        $_SESSION['nome'] = $result->nome;

        echo 'Login realizado com sucesso!';
        echo "<script>
                setTimeout(()=> window.location.href = 'main.php', 2000);
              </script>";
        exit;
    } else {
        echo 'Login ou senha incorretos';
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}
?>

<h3>Login</h3>
<form action="" method="post">
    <div class="row">
        <div class="col">
            <label class="form-label">Login</label>
            <input class="form-control" type="text" name="login">
        </div>
        <div class="col">
            <label class="form-label">Senha</label>
            <input class="form-control" type="password" name="senha">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Logar</button>
            <a href="./usuario/UsuarioForm.php" class="btn btn-primary">Criar um novo usuário</a>
        </div>
    </div>
</form>

<?php include './footer.php'; ?>