<?php
include "../header.php";
include "../db.class.php";

$db = new db('usuario', 'idusuarios');

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

<div class="container mt-4">
    <h3>Dados de usuário:</h3>

<form action="./UsuarioList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="usuario" class="form-select">
                <option value="nome">nome</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="login">login</option>
                <option value="senha">senha</option>
            </select>
        </div>

            <div class="col-md-6">
                <input type="text" name="valor" placeholder="Pesquisar" class="form-control">
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="./UsuarioForm.php" class="btn btn-success">Cadastrar</a>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col">
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
                <tbody>
                    <?php
                    if($dados) {
                        foreach ($dados as $item) {
                            echo "<tr>
                                <th scope='row'>$item->idusuarios</th>
                                <td>$item->nome</td>
                                <td>$item->telefone</td>
                                <td>$item->email</td>
                                <td>$item->login</td>     
                                <td>
                                    <a href='./UsuarioForm.php?id=$item->idusuarios' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='./UsuarioList.php?id=$item->idusuarios'
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

<?php
include "../footer.php"; 
?>