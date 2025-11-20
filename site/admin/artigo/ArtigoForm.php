<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('artigo');
$data = null;

if (!empty($_POST)) {
    try {
        $errors = [];


        if (empty($_POST['titulo'])) {
            $errors[] = 'O titúlo é obrigatório';
        }

        if (empty($_POST['conteudo'])) {
            $errors[] = 'O conteudo é obrigatório';
        }

        if (empty($_POST['data_publicacao'])) {
            $errors[] = 'A data de publicacao é obrigatória';
        }
        
        if (empty($_POST['autor'])) {
            $errors[] = 'O autor é obrigatório';
        }
        if (empty($_POST['id de categoria'])) {
            $errors[] = 'O id da categoria é obrigatório';
        }
        if (empty($_POST['data_criacao'])) {
            $errors[] = 'A data de criacao é obrigatória';
        }

        if (empty($_POST['id'])) {
            if ($_POST['senha'] === $_POST['c_senha']) {
                $_POST['senha'] = password_hash(
                    $_POST['senha'],
                    PASSWORD_BCRYPT
                );

                unset($_POST['c_senha'], $_POST['id']); 
                $db->store($_POST);
                echo 'Registro Salvo com sucesso!';
            }
        } else {
            if ($_POST['senha'] === $_POST['c_senha']) {
                $_POST['senha'] = password_hash(
                    $_POST['senha'],
                    PASSWORD_BCRYPT
                );
                unset($_POST['c_senha']); 
                $db->update($_POST);

                echo 'Registro Atualizado com sucesso!';
            }
        }

        echo "<script>
            setTimeout(
                ()=> window.location.href = 'ArtigoList.php', 2000
            );
        </script>";
    } catch (Exception $e) {
        var_dump($errors, $e->getMessage());
        exit();
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
    //  var_dump($data);
    // exit;
}
?>


<h3>Dados do Usuário</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Titulo</label>
            <input class="form-control" type="text" name="nome" value="<?= $data->titulo ?? '' ?>">
        </div>

        <div class="col-6">
    <div class="row">
            <label for="" class="form-label">Conteúdo</label>
            <input class="form-control" type="text" name="login" value="<?= $data->conteudo ?? '' ?>">
        </div>
    </div>
    <div class="col-6">
            <label for="" class="form-label">Data de Publicação</label>
            <input class="form-control" type="text" name="login" value="<?= $data->data_publicacao ?? '' ?>">
        </div>
    </div>
    <div class="col-6">
            <label for="" class="form-label">Data de origem</label>
            <input class="form-control" type="text" name="login" value="<?= $data->data_criacao ?? '' ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="" class="form-label">Senha</label>
            <input class="form-control" type="password" name="senha">
        </div>
        <div class="col-6">
            <label for="" class="form-label">Confirmar Senha</label>
            <input class="form-control" type="password" name="c_senha">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./ArtigoList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include '../footer.php';
?>