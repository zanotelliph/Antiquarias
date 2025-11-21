<?php
include "./header.php";
include "./db.class.php";

$db = new db('usuario');
$data = null;
//var_dump($modelos);
//exit;

if (!empty($_POST)) { 
    try {
        $errors = [];

        if (empty($_POST['nome'])) {
            $errors[] = 'O nome é obrigatório';
        }

        if (empty($_POST['telefone'])) {
            $errors[] = 'O telefone é obrigatório';
        }
        if (empty($_POST['email'])) {
            $errors[] = 'O email é obrigatório';
        }
         if (empty($_POST['login'])) {
            $errors[] = 'O login é obrigatório';
        }
         if (empty($_POST['senha'])) {
            $errors[] = 'A senha é obrigatória';
        }
        
        echo "
            <script>
                setTimeout(() => window.location.href = 'UsuarioList.php', 2000);
            </script>
        ";

    } catch (Exception $e) {

        var_dump($errors, $e->getMessage());
        exit();
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
    
}
?>

<h3>Adicionando dados de usuário:</h3>
<form action="UsuarioForm.php" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">Nome</label>
            <input class="form-control" type="text" name="nome" value="<?= $data->nome ??
                '' ?>">
        </div>
    <div class="col-4">
            <label for="" class="form-label">Telefone </label>
            <input class="form-control" type="text" name="telefone" value="<?= $data->telefone ??
                '' ?>">
        </div>
        <div class="col-4">
            <label for="" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" value="<?= $data->email ??
                '' ?>">
        </div>
        <div class="col-4">
            <label for="" class="form-label">Login</label>
            <input class="form-control" type="text" name="login" value="<?= $data->login ??
                '' ?>">
        </div>
        <div class="col-4">
            <label for="" class="form-label">Senha</label>
            <input class="form-control" type="password" name="senha" value="<?= $data->senha ??
                '' ?>">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./UsuarioList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include "./footer.php"; ?>
?>