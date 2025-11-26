    <?php
    include "../header.php";
    include "../db.class.php";

    $db = new db('usuario', 'ids');
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

                if (!empty($_POST['ids'])) {
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
            <input type="hidden" name="ids" value="<?= $data->ids ?? '' ?>">

    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">nome</label>
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

            <div class="row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="./UsuarioList.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>

        </form>
    </div>

    <?php include "../footer.php"; ?>