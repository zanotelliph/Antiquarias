<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('categoria');
//var_dump($dados);
$db->checkLogin();

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
    header('Location: DuvidaList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

<h3>Categorias:</h3>

<form action="./CategoriaList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="categoria" class="form-select">
                <option value="nome">Nome</option>
                <option value="descricao">Descrição</option>
                <option value="data_criacao">Data de criação</option>
                <option value="localidade">Localidade</option>
             
            </select>
        </div>

        <div class="col">
            <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="./VeiculoForm.php" class="btn btn-success">Cadastrar</a>
        </div>
    </div>
</form>

<div class="row mt-4">
    <div class="col">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Localidade</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if($dados) {
                    foreach ($dados as $item) {
                        echo "<tr>
                            <th scope='row'>$item->id</th>
                            <td>$item->nome</td>
                            <td>$item->descricao</td>
                            <td>$item->data_criacao</td>
                            <td>$item->localidade</td>
                            <td><a href='./VeiculoForm.php?id=$item->id' class='btn btn-warning btn-sm'>Editar</a></td>
                            <td><a 
                                 href='./CategoriaList.php?id=$item->id'
                                 onclick='return confirm(\"Deseja realmente excluir?\")'
                                 class='btn btn-danger btn-sm'
                                >Excluir</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Nenhum artefato encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>


    </div>
</div>


<?php
include '../footer.php';
?>