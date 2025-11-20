<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('artigo');
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

<form action="./ArtigoList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="tipo" class="form-select">
                <option value="nome">#</option>
                <option value="nome">Titulo</option>
                <option value="email">conteúdo</option>
                <option value="telefone">Data de origem</option>
                <option value="telefone">Data de publicação</option>
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
                    <th scope="col">Conteudo</th>
                    <th scope="col">Data de origem</th>
                    <th scope="col">Data de publicacao</th>
                 
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados as $item) {
                    echo "<tr>
                        <th scope='row'>$item->id</th>
                        <td>$item->nome</td>
                        <td>$item->telefone</td>
                        <td>$item->email</td>
                        <td>$item->login</td>
                        <td><a href='./ArtigoForm.php?id=$item->id'>Editar</a></td>
                        <td><a 
                             href='./ArtigoList.php?id=$item->id'
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
include '../footer.php';
?>