<?php
include "../header.php";
include "../db.class.php";

$db = new db('reserva', 'id');
$dbSala = new db('sala', 'id');
$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: ReservaList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search([
        'tipo'  => $_POST['tipo'] ?? 'sala_id',
        'valor' => $_POST['valor'] ?? ''
    ]);
} else {
    $dados = $db->all();
}


$salas = [];
$listaSalas = $dbSala->all();
if ($listaSalas) {
    foreach ($listaSalas as $s) {
        $salas[$s->id] = $s->nome;
    }
}
?>

<div class="container mt-4">
    <h3>Reservas:</h3>

    <form action="./ReservaList.php" method="post" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="sala_id">Sala</option>
                    <option value="data_hora_inicio">Data Início</option>
                    <option value="data_hora_fim">Data Fim</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="./ReservaForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Data/Hora Início</th>
                    <th scope="col">Data/Hora Fim</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $item): ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><?= $salas[$item->sala_id] ?? '-' ?></td>
                            <td><?= $item->data_hora_inicio ? date('d/m/Y H:i', strtotime($item->data_hora_inicio)) : '-' ?></td>
                            <td><?= $item->data_hora_fim ? date('d/m/Y H:i', strtotime($item->data_hora_fim)) : '-' ?></td>
                            <td>
                                <a href="./ReservaForm.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                                <a href="./ReservaList.php?action=delete&id=<?= $item->id ?>"
                                   onclick="return confirm('Deseja realmente excluir esta reserva?')"
                                   class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhuma reserva cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../footer.php"; ?>

