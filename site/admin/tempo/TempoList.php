<?php
include "../header.php";
include "../db.class.php";

$db = new db('tempo', 'idtempo');
$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: TempoList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search([
        'tipo'  => $_POST['tipo'] ?? 'horas',
        'valor' => $_POST['valor'] ?? ''
    ]);
} else {
    $dados = $db->all();
}
?>

<div class="container mt-4">
    <h3>Agendamentos:</h3>

    <form action="./TempoList.php" method="post" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="horas">Tempo</option>
                    <option value="horario">Data de agendamento</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="./TempoForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Duração da sessão</th>
                    <th scope="col">Data do agendamento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $item): ?>
                        <tr>
                            <th scope="row"><?= $item->idtempo ?></th>
                            <td><?= $item->horas ?></td>
                            <td><?= $item->horario ?></td>
                            <td>
                                <a href="./TempoForm.php?id=<?= $item->idtempo ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                                <a href="./TempoList.php?action=delete&id=<?= $item->idtempo ?>"
                                   onclick="return confirm('Deseja realmente excluir este registro?')"
                                   class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Nenhum agendamento cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../footer.php"; ?>