<?php
include "../header.php";
include "../db.class.php";

$db = new db('usuario', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) { 
    try {
        if (empty($_POST['nome']) || empty($_POST['telefone']) || empty($_POST['email']) || empty($_POST['login'])) {
            echo "<div class='alert alert-danger'>Preencha todos os campos obrigatórios!</div>";
        } else {
            
            if (!empty($_POST['senha'])) {
                $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            } else {
                unset($_POST['senha']);
            }

            if (!empty($_POST['id'])) {
                $db->update($_POST);
            } else {
                if(empty($_POST['senha'])) {
                    echo "<div class='alert alert-danger'>A senha é obrigatória para novos usuários!</div>";
                    exit;
                }
                $db->store($_POST);
            }

            header('Location: UsuarioList.php');
            exit;
        }

    } catch (Exception $e) {
        var_dump($e->getMessage());
        exit();
    }
}
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Novo' ?> Usuário:</h3>
    
    <form action="UsuarioForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="nome" value="<?= $data->nome ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Telefone</label>
                <input class="form-control" type="text" name="telefone" value="<?= $data->telefone ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" value="<?= $data->email ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Login</label>
                <input class="form-control" type="text" name="login" value="<?= $data->login ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Senha <?= !empty($data) ? '(deixe em branco para manter)' : '' ?></label>
                <input class="form-control" type="password" name="senha" <?= empty($data) ? 'required' : '' ?>>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./UsuarioList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

    </form>
</div>

<?php include "../footer.php"; ?>
