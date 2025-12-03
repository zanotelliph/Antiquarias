<?php
include "../header.php";
include "../db.class.php";

$db = new db('usuario', 'id');

$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: UsuarioList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

<div class="container mt-4">
    <h3>Listagem de Usuários:</h3>

    <form action="./UsuarioList.php" method="post" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="nome">Nome</option>
                    <option value="telefone">Telefone</option>
                    <option value="email">Email</option>
                    <option value="login">Login</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                <a href="./UsuarioForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Login</th>
                    <th scope="col">Ações</th>     
                </tr>
            </thead>
            <tbody class="text-white">
                <?php if (!empty($dados)): ?>
                    <?php foreach ($dados as $item): ?>
                        <tr class="text-white">
                            <th scope="row" class="text-white"><?= $item->id ?></th>
                            <td class="text-white"><?= $item->nome ?></td>
                            <td class="text-white"><?= $item->telefone ?></td>
                            <td class="text-white"><?= $item->email ?></td>
                            <td class="text-white"><?= $item->login ?></td>     
                            <td>
                                <a href="./UsuarioForm.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="./UsuarioList.php?action=delete&id=<?= $item->id ?>"
                                   onclick="return confirm('Deseja realmente excluir este usuário?')"
                                   class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum usuário cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../footer.php"; ?>
