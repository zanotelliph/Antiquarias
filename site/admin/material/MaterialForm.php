<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('material');
$data = null;


if (!empty($_POST)) {
    try {
        $errors = [];

        
        if (empty($_POST['microfone'])) {
            $errors[] = 'O microfone é obrigatório';
        }

        if (empty($_POST['tv'])) {
            $errors[] = 'A tv é obrigatória';
        }

        if (empty($_POST['caixa_som'])) {
            $errors[] = 'A caixa de som é obrigatória';
        }
        if (empty($_POST['iluminacao'])) {
            $errors[] = 'A Iluminação é obrigatória';
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
                ()=> window.location.href = 'MaterialList.php', 2000
            );
        </script>";
    } catch (Exception $e) {
        var_dump($errors, $e->getMessage());
        exit();
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
    
}
?>

<h3>Materiais:</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">Microfone</label>
            <input class="form-control" type="text" name="microfone" value="<?= $data->microfone ??
                '' ?>">
        </div>
      <div class="col-4">
            <label for="" class="form-label">TV </label>
            <input class="form-control" type="text" name="tv" value="<?= $data->tv ??
                '' ?>">
        </div>

        <div class="col-4">
            <label for="" class="form-label">Caixa de Som</label>
            <input class="form-control" type="text" name="caixa_som" value="<?= $data->caixa_som ??
                '' ?>">
        </div>
    </div>
          <div class="row mt-3">
        <div class="col-4">
            <label for="" class="form-label">Iluminação</label>
            <input class="form-control" type="text" name="iluminacao" value="<?= $data->iluminacao ??
                '' ?>">
        </div>
    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./MaterialList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include '../footer.php';
?>