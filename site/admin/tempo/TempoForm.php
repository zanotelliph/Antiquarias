<?php
include "../../base/header.php";
include "../db.class.php";

$db = new db('tempo');
$data = null;


//var_dump($modelos);
//exit;

if (!empty($_POST)) { 
    try {
        $errors = [];

        if (empty($_POST['Duração da sessão de Karaokê'])) {
            $errors[] = 'A Duração da sessão de Karaokê é obrigatória';
        }

        if (empty($_POST['Data de agendamento'])) {
            $errors[] = 'A Data de agendamento é obrigatória';
        }

        echo "
            <script>
                setTimeout(() => window.location.href = 'TempoList.php', 2000);
            </script>
        ";

    } catch (Exception $e) {

        var_dump($errors, $e->getMessage());
        exit();
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
    
}
?>

<h3>Sessões:</h3>
<form action="TempoForm.php" method="post">
    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">
        <div class="col-4">
            <label for="" class="form-label">Duração da sessão de Karaokê</label>
            <input class="form-control" type="text" name="horas" value="<?= $data->horas ??
                '' ?>">
        </div>

        <div class="col-4">
            <label for="" class="form-label">Data de agendamento</label>
            <input class="form-control" type="text" name="horario" value="<?= $data->horario ??
                '' ?>">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./TempoList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include "../../base/footer.php"; ?>
?>