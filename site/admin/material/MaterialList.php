<?php
include "./header.php";

include "../database/db.class.php";


$db = new db('material');
//var_dump($dados);
$db->checkLogin();

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
    header('Location: MaterialList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

<h3>Materiais:</h3>

<form action="./MaterialList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="material" class="form-select">
                <option value="microfone">Microfone</option>
                <option value="tv">Televisão</option>
                <option value="caixa_som">Caixa de Som</option>
                <option value="iluminacao">Iluminação</option>
             
            </select>
        </div>

        <div class="col">
            <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="./MaterialForm.php" class="btn btn-success">Cadastrar</a>
        </div>
    </div>
</form>

<div class="row mt-4">
    <div class="col">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Microfone</th>
                    <th scope="col">Televisão</th>
                    <th scope="col">Caixa de Som</th>
                    <th scope="col">Iluminação</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if($dados) {
                    foreach ($dados as $item) {
                        echo "<tr>
                            <th scope='row'>$item->id</th>
                            <td>$item->microfone</td>
                            <td>$item->tv</td>
                            <td>$item->caixa_som</td>
                            <td>$item->iluminacao</td>
                            <td><a href='./MaterialForm.php?id=$item->id' class='btn btn-warning btn-sm'>Editar</a></td>
                            <td><a 
                                 href='./MaterialList.php?id=$item->id'
                                 onclick='return confirm(\"Deseja realmente excluir?\")'
                                 class='btn btn-danger btn-sm'
                                >Excluir</a></td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>


    </div>
</div>


<?php
include "./footer.php"; ?>
?>