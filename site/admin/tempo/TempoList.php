<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('tempo');
//var_dump($dados);
$db->checkLogin();

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
    header('Location: TempoList.php');
    exit;
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

<h3>Agendamento:</h3>

<form action="./salaList.php" method="post">
    <div class="row">
        <div class="col">
            <select name="sala" class="form-select">
                <option value="quantidade_pessoas">Duração da sessão de Karaokê</option>
                <option value="quantidade_salas">Data de agendamento</option>
                
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
                    <th scope="col">Duração da sessão de Karaokê</th>
                     <th scope="col">Duração da sessão de Karaokê</th>
                             
                </tr>
            </thead>
            <tbody>

                <?php
                if($dados) {
                    foreach ($dados as $item) {
                        echo "<tr>
                            <th scope='row'>$item->id</th>
                             <td>$item-># </td>
                            <td>$item->Quantidade de Pessoas </td>
                            <td>$item->Quantidade de Salas </td>
                            
                            
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
include '../footer.php';
?>