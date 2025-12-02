<?php
include "../header.php";
include "../db.class.php";

$db = new db('playlist', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) { 
    try {
        if (empty($_POST['titulo'])) {
            echo "<div class='alert alert-danger'>O título é obrigatório!</div>";
        } else {
            if (!empty($_POST['id'])) {
                $db->update($_POST);
            } else {
                $db->store($_POST);
            }

            header('Location: PlaylistList.php');
            exit;
        }

    } catch (Exception $e) {
        var_dump($e->getMessage());
        exit();
    }
}

$tempoTotalValue = '';
if (!empty($data->tempo_total)) {
    $tempoTotalValue = date('H:i', strtotime($data->tempo_total));
}
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Nova' ?> Playlist:</h3>
    
    <form action="PlaylistForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo" value="<?= $data->titulo ?? '' ?>" required>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Gênero</label>
                <input class="form-control" list="generos" type="text" name="genero" value="<?= $data->genero ?? '' ?>">
                <datalist id="generos">
                    <option value="Pop">
                    <option value="Rock">
                    <option value="Sertanejo">
                    <option value="MPB">
                    <option value="Forró">
                    <option value="Eletrônica">
                    <option value="Hip Hop">
                    <option value="Reggae">
                </datalist>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Quantidade de Músicas</label>
                <input class="form-control" type="number" name="qtd_musicas" min="0" value="<?= $data->qtd_musicas ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Tempo Total</label>
                <input class="form-control" type="time" name="tempo_total" value="<?= $tempoTotalValue ?>">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./PlaylistList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

    </form>
</div>

<?php include "../footer.php"; ?>
