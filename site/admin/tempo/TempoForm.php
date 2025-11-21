<?php
include "../../base/header.php";
include "../db.class.php";

$db = new db('sala');
$data = null;


//var_dump($modelos);
//exit;

if (!empty($_POST)) { 
    try {
        $errors = [];

        if (empty($_POST['quantidade_pessoas'])) {
            $errors[] = 'A quantidade de pessoas é obrigatória';
        }

        if (empty($_POST['quantidade_salas'])) {
            $errors[] = 'A quantidade de salas é obrigatória';
        }

        if ($_POST['tem_comida'] == 'sim') {
            if (empty($_POST['comida'])) {
                $errors[] = 'A comida é obrigatória quando a opção "Sim" é selecionada.';
            }
        }
        echo "
            <script>
                setTimeout(() => window.location.href = 'SalaList.php', 2000);
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

<h3>Sala:</h3>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">Quantidade de Pessoas</label>
            <input class="form-control" type="text" name="quantidade_pessoas" value="<?= $data->quantidade_pessoas ??
                '' ?>">
        </div>

        <div class="col-4">
            <label for="" class="form-label">Quantidade de Salas</label>
            <input class="form-control" type="text" name="quantidade_salas" value="<?= $data->quantidade_salas ??
                '' ?>">
        </div>

        <div class="col-4">
            <label for="" class="form-label">Comida </label>
            <input class="form-control" type="text" name="localidade" value="<?= $data->comida ??
                '' ?>">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./SalaList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include "../../base/footer.php"; ?>
?>