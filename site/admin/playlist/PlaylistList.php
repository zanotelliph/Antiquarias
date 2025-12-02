<?php
include "../header.php";
include "../db.class.php";

$db = new db('playlist', 'id');
$db->checkLogin();

if (!empty($_GET['id']) && !empty($_GET['action']) && $_GET['action'] === 'delete') {
    $db->destroy($_GET['id']);
    header('Location: PlaylistList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}
?>

<div class="container mt-4">
    <h3>Listagem de Playlists:</h3>

    <form action="./PlaylistList.php" method="post">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Campo</label>
                <select name="tipo" class="form-select">
                    <option value="titulo">Título</option>
                    <option value="genero">Gênero</option>
                    <option value="qtd_musicas">Qtd. Músicas</option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="./PlaylistForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col">
            <table class="table table-striped table-hover text-white">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Qtd. Músicas</th>
                        <th scope="col">Tempo Total</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($dados) {
                        foreach ($dados as $item) {
                            echo "<tr>
                                <th scope='row'>$item->id</th>
                                <td>$item->titulo</td>
                                <td>$item->qtd_musicas</td>
                                <td>$item->tempo_total</td>
                                <td>$item->genero</td>
                                <td>
                                    <a href='./PlaylistForm.php?id=$item->id' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='./PlaylistList.php?action=delete&id=$item->id'
                                       onclick='return confirm(\"Deseja realmente excluir?\")'
                                       class='btn btn-danger btn-sm'>
                                       Excluir
                                    </a>
                                </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
