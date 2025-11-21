<?php
include "../header.php";
include "../db.class.php";

$db = new db('sala', 'idsala');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) { 
    try {
        if (empty($_POST['quantidade_pessoas']) || empty($_POST['quantidade_salas'])) {
            echo "<div class='alert alert-danger'>Preencha os campos obrigatórios!</div>";
        } else {
            if (!empty($_POST['idsala'])) {
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
        <input type="hidden" name="idsala" value="<?= $data->idsala ?? '' ?>">

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
                <label class="form-label">Quantidade de Salas</label>
                <input class="form-control" list="quantidade_salas" type="text" name="quantidade_salas" 
                       value="<?= $data->quantidade_salas ?? '' ?>" required>
                <datalist id="quantidade_salas">
                    <option value="1">
                    <option value="2">
                    <option value="3">
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