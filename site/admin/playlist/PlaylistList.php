<?php
include "../header.php";
include "../db.class.php";

$db = new db('playlist', 'idplaylist');
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
        <div class="row">
            <div class="col-md-3">
                <select name="tipo" class="form-select">
                    <option value="titulo">Título</option>
                    <option value="artista">Artista</option>
                    <option value="modo">Modo</option>
                </select>
            </div>

            <div class="col-md-6">
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-3">
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
                        <th scope="col">Artista</th>
                        <th scope="col">Modo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($dados) {
                        foreach ($dados as $item) {
                            echo "<tr>
                                <th scope='row'>$item->idplaylist</th>
                                <td>$item->titulo</td>
                                <td>$item->artista</td>
                                <td>$item->modo</td>
                                <td>
                                    <a href='./PlaylistForm.php?id=$item->idplaylist' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='./PlaylistList.php?action=delete&id=$item->idplaylist'
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