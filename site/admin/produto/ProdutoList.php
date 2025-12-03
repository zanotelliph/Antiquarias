<?php
include "../header.php";
include "../db.class.php";

$db = new db('produto', 'id');
$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: ProdutoList.php');
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
?>

<div class="container mt-4">
    <h3>Listagem de Produtos:</h3>

    <form action="./ProdutoList.php" method="post" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="nome">Nome</option>
                    <option value="tipo">Tipo</option>
                    <option value="marca">Marca</option>
                    <option value="modelo">Modelo</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="./ProdutoForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $item): ?>
                        <tr class="text-white">
                            <th scope="row" class="text-white"><?= $item->id ?></th>
                            <td class="text-white"><?= $item->nome ?></td>
                            <td class="text-white"><?= $item->tipo ?></td>
                            <td class="text-white"><?= $item->quantidade ?></td>
                            <td class="text-white"><?= $item->marca ?></td>
                            <td class="text-white"><?= $item->modelo ?></td>
                            <td class="text-white">
                                <a href="./ProdutoForm.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                                <a href="./ProdutoList.php?action=delete&id=<?= $item->id ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Deseja realmente excluir este produto?');">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Nenhum produto cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../footer.php"; ?>

