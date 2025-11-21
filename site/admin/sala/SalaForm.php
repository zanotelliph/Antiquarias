<?php
include "../header.php";
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

        if ($_POST['tem_comida'] === 'sim') {

            if (empty($_POST['comida'])) {
                $errors[] = 'Escolha uma opção de comida antes!';
            } else {
                $comidas_validas = ['pizza', 'batata_frita', 'frango_frito'];

                if (!in_array($_POST['comida'], $comidas_validas)) {
                    $errors[] = 'Comida selecionada inválida.';
                }
            }
        }

        if (empty($errors)) {
            echo "
                <script>
                    setTimeout(() => window.location.href = 'SalaList.php', 2000);
                </script>
            ";
        }

    } catch (Exception $e) {
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
    
}
?>

<h3>Sala:</h3>
<form action="SalaForm.php" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
       <div class="col-6">
            <label class="form-label">Quantidade de pessoas</label>
            <input class="form-control" list="quantidade_pessoas" type="text" name="quantidade_pessoas" value="<?= $data->quantidade_pessoas ?? '' ?>">
                   value="<?= $data->quantidade_pessoas ?? '' ?>">
            <datalist id="quantidade_pessoas">
                <option value="1-3">
                <option value="4-6">
                <option value="7-10">
                <option value="+10">
                <option value="Máximo:11-20">
            </datalist>
        </div>

        <div class="col-4">
            <label for="" class="form-label">Quantidade de Salas</label>
            <input class="form-control" list="quantidade_salas" type="text" name="quantidade_salas" value="<?= $data->quantidade_salas ?? '' ?>">
                   value="<?= $data->quantidade_salas ?? '' ?>">
            <datalist id="quantidade_salas">
                <option value="1-3">
                <option value="4-6">
                <option value="7-10">
            </datalist>
            </select>
            <small class="text-warning">* Admin deve verificar disponibilidade</small>
        </div>

        <div class="col-4">
            <label for="" class="form-label">Comida </label>
             <input class="form-control" list="comida" type="text" name="comida" value="<?= $data->comida ?? '' ?>">
                   value="<?= $data->comida ?? '' ?>">
            <datalist id="comida">
                <option value="Pizza">
                <option value="Frango Frito">
                <option value="Batata Frita">
            </datalist>
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./SalaList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include "../footer.php"; ?>
?>