<?php
include "../header.php";
include "../db.class.php";

$db = new db('sala', 'id');
$dbUsuario = new db('usuario', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

// Buscar lista de usuários para o select
$usuarios = $dbUsuario->all();

if (!empty($_POST)) { 
    try {
        if (empty($_POST['nome'])) {
            echo "<div class='alert alert-danger'>O nome da sala é obrigatório!</div>";
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
    <h3><?= !empty($data) ? 'Editar' : 'Nova' ?> Sala:</h3>
    
    <form action="SalaForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nome da Sala</label>
                <input class="form-control" type="text" name="nome" 
                       value="<?= $data->nome ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Capacidade (pessoas)</label>
                <input class="form-control" type="number" name="capacidade" min="1"
                       value="<?= $data->capacidade ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Usuário Responsável</label>
                <select class="form-select" name="usuario_id">
                    <option value="">Selecione um usuário...</option>
                    <?php if (!empty($usuarios)): ?>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option value="<?= $usuario->id ?>" <?= ($data->usuario_id ?? '') == $usuario->id ? 'selected' : '' ?>>
                                <?= $usuario->nome ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
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
