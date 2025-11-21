<?php
include "../header.php";
include "../db.class.php";

$db = new db('playlist', 'idplaylist');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) { 
    try {
        if (empty($_POST['titulo']) || empty($_POST['artista']) || empty($_POST['modo'])) {
            echo "<div class='alert alert-danger'>Preencha todos os campos obrigatórios!</div>";
        } else {
            if (!empty($_POST['idplaylist'])) {
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
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Nova' ?> Playlist:</h3>
    
    <form action="PlaylistForm.php" method="post">
        <input type="hidden" name="idplaylist" value="<?= $data->idplaylist ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Título</label>
                <input class="form-control" list="titulos" type="text" name="titulo" value="<?= $data->titulo ?? '' ?>" required>
                <datalist id="titulos">
                    <option value="Oceano">
                    <option value="Beija-flor">
                    <option value="Espelho">
                    <option value="Dia Lindo">
                    <option value="Chove Chuva">
                </datalist>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Artista</label>
                <input class="form-control" list="artistas" type="text" name="artista" value="<?= $data->artista ?? '' ?>" required>
                <datalist id="artistas">
                    <option value="Djavan">
                    <option value="João Gomes">
                    <option value="Mariana Froes">
                    <option value="Dazaranha">
                    <option value="Jorge Ben Jor">
                </datalist>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Modo</label>
                <select class="form-select" name="modo" required>
                    <option value="">Selecione...</option>
                    <option value="Normal" <?= ($data->modo ?? '') == 'Normal' ? 'selected' : '' ?>>Normal</option>
                    <option value="Slowed" <?= ($data->modo ?? '') == 'Slowed' ? 'selected' : '' ?>>Slowed</option>
                    <option value="Sped-Up" <?= ($data->modo ?? '') == 'Sped-Up' ? 'selected' : '' ?>>Sped-Up</option>
                    <option value="Sped-Up Reverb" <?= ($data->modo ?? '') == 'Sped-Up Reverb' ? 'selected' : '' ?>>Sped-Up Reverb</option>
                </select>
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