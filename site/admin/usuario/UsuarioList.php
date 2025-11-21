<?php
include "../../base/header.php";
include "../db.class.php";

$db = new db('usuario');
//var_dump($dados);
$db->checkLogin();

if (!empty($_GET['id'])) {
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

<h3>Dados de usuário:</h3>

<form action="./UsuarioList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="sala" class="form-select">
                <option value="quantidade_pessoas">Nome</option>
                <option value="quantidade_salas">Telefone</option>
                <option value="quantidade_salas">Email</option>
                <option value="quantidade_salas">login</option>
                <option value="quantidade_salas">senha</option>
            </select>
        </div>

        <div class="col">
            <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="./TempoForm.php" class="btn btn-success">Cadastrar</a>
        </div>
    </div>
</form>

<div class="row mt-4">
    <div class="col">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Login</th>
                    <th scope="col">Senha</th>
                             
                </tr>
            </thead>
            <tbody>

                <?php
                if($dados) {
                    foreach ($dados as $item) {
                        echo "<tr>
                            <th scope='row'>$item->id</th>
                            <td>$item-># </td>
                            <td>$item->nome</td>
                            <td>$item->telefone</td>
                            <td>$item->email</td>
                            <td>$item->login</td>
                            <td>$item->senha</td>                        
                            <td><a href='./SalaForm.php?id=$item->id' class='btn btn-warning btn-sm'>Editar</a></td>
                            <td><a 
                                 href='./SalaList.php?id=$item->id'
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
include "../../base/footer.php"; ?>
?>