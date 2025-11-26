<?php
include "../header.php";
include "../db.class.php";

$db = new db('sala', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) { 
    try {
        if (empty($_POST['quantidade_pessoas']) || empty($_POST['quantidade_salas'])) {
            echo "<div class='alert alert-danger'>Preencha os campos obrigatórios!</div>";
        } else {
            if (!empty($_POST['id'])) {
                $db->update($_POST);
            } else {
                $db->store($_POST);
            }

            header('Location: SalaList.php');
            exit;
        }

    } catch (Exception $e) {
        var_dump($e->getMessage());
        exit();
    }
}
?>

<div class="container mt-4">
    <h3>Sala:</h3>
    
    <form action="SalaForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Quantidade de pessoas</label>
                <input class="form-control" list="quantidade_pessoas" type="text" name="quantidade_pessoas" 
                       value="<?= $data->quantidade_pessoas ?? '' ?>" required>
                <datalist id="quantidade_pessoas">
                    <option value="1">
                    <option value="4">
                    <option value="7">
                    <option value="10">
                    <option value="15">
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">Quantidade de poltronas</label>
                <input class="form-control" list="quantidade_poltronas" type="text" name="quantidade_poltronas" 
                       value="<?= $data->quantidade_salas ?? '' ?>" required>
                <datalist id="quantidade_poltronas">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                    <option value="4">
                    <option value="5"></option>

                         </option>
                </datalist>
                <small class="text-warning">* Admin deve verificar disponibilidade</small>
            </div>

            <div class="col-md-12 mt-3">
                <label class="form-label">Comida</label>
                <input class="form-control" list="comida" type="text" name="comida" 
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
</div>

<?php include "../footer.php"; ?>