<?php
include "../../base/header.php";
include "../db.class.php";

$db = new db('playlist');
//var_dump($dados);
$db->checkLogin();

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

<h3>Listagem Usuário</h3>

<form action="./playlistList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="tipo" class="form-select">
                <option value="nome">#</option>
                <option value="nome">Titulo</option>
                <option value="email">Artista</option>
                <option value="telefone">Modo</option>
               
            </select>
        </div>

        <div class="col">
            <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="./UsuarioForm.php" class="btn btn-success">Cadastrar</a>
        </div>
    </div>
</form>

<div class="row mt-4">
    <div class="col">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Artista</th>
                    <th scope="col">Modo</th>
                   
                 
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados as $item) {
                    echo "<tr>
                        <th scope='row'>$item->id</th>
                        <td>$item->Titulo</td>
                        <td>$item->Artista</td>
                        <td>$item->Modo</td>
                        <td><a href='./playlistForm.php?id=$item->id'>Editar</a></td>
                        <td><a 
                             href='./playlistList.php?id=$item->id'
                             onclick='return confirm(\"Deseja Excluir?\")'
                            >Deletar</a></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>


    </div>
</div>


<?php
include "../../base/footer.php"; ?>
?>