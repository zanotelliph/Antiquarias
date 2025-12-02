<?php
include "../header.php";
include "../db.class.php";

$db = new db('sala', 'id');
$dbUsuario = new db('usuario', 'id');
$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: SalaList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search([
        'tipo'  => $_POST['tipo'] ?? 'nome',
        'valor' => $_POST['valor'] ?? ''
    ]);
} else {
    $dados = $db->all();
}

// Criar array de usuários para lookup
$usuarios = [];
$listaUsuarios = $dbUsuario->all();
if ($listaUsuarios) {
    foreach ($listaUsuarios as $u) {
        $usuarios[$u->id] = $u->nome;
    }
}
?>

<div class="container mt-4">
    <h3>Listagem de Salas:</h3>

    <form action="./SalaList.php" method="post" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="nome">Nome</option>
                    <option value="capacidade">Capacidade</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="./SalaForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Capacidade</th>
                    <th scope="col">Usuário Responsável</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $item): ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><?= $item->nome ?></td>
                            <td><?= $item->capacidade ?></td>
                            <td><?= $usuarios[$item->usuario_id] ?? '-' ?></td>
                            <td>
                                <a href="./SalaForm.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                                <a href="./SalaList.php?action=delete&id=<?= $item->id ?>"
                                   onclick="return confirm('Deseja realmente excluir esta sala?')"
                                   class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhuma sala cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../footer.php"; ?>
