<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('categoria');
$data = null;


//var_dump($modelos);
//exit;

if (!empty($_POST)) {
    try {
        $errors = [];

        //  var_dump($_POST);
        //  exit;

        if (empty($_POST['nome'])) {
            $errors[] = 'O nome é obrigatório';
        }
         if (empty($_POST['data'])) {
            $errors[] = 'A data é obrigatória';
        }

        if (empty($_POST['descricao'])) {
            $errors[] = 'A descricao é obrigatória';
        }

        if (empty($_POST['id'])) {
            unset($_POST['id']); 

            $db->store($_POST);
            echo 'Registro Salvo com sucesso!';
        } else {
            $db->update($_POST);

            echo 'Registro Atualizado com sucesso!';
        }

        echo "<script>
            setTimeout(
                ()=> window.location.href = 'DuvidaList.php', 2000
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


<h3>Dúvidas:</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">nome</label>
            <input class="form-control" type="text" name="nome" value="<?= $data->nome ??
                '' ?>">
        </div>
      <div class="col-4">
            <label for="" class="form-label">data </label>
            <input class="form-control" type="text" name="localidade" value="<?= $data->data ??
                '' ?>">
        </div>

        <div class="col-4">
            <label for="" class="form-label">Descrição</label>
            <input class="form-control" type="text" name="descricao" value="<?= $data->descricao ??
                '' ?>">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./CategoriaList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include '../footer.php';
?>