<?php
include "../header.php";
include "../db.class.php";

$db = new db('material', 'id');
$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: MaterialList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search([
        'tipo'  => $_POST['tipo'] ?? 'microfone',
        'valor' => $_POST['valor'] ?? ''
    ]);
} else {
    $dados = $db->all();
}
?>

<div class="container mt-4">
    <h3>Listagem de Materiais:</h3>

    <form action="./MaterialList.php" method="post" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="microfone">Microfone</option>
                    <option value="tv">TV</option>
                    <option value="caixa_som">Caixa de Som</option>
                    <option value="iluminacao">Iluminação</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="./MaterialForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Microfone</th>
                    <th scope="col">TV</th>
                    <th scope="col">Caixa de Som</th>
                    <th scope="col">Iluminação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $item): ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><?= $item->microfone ?></td>
                            <td><?= $item->tv ?></td>
                            <td><?= $item->caixa_som ?></td>
                            <td><?= $item->iluminacao ?></td>
                            <td>
                                <a href="./MaterialForm.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                                <a href="./MaterialList.php?action=delete&id=<?= $item->id ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Deseja realmente excluir este material?');">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum material cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../footer.php"; ?>
