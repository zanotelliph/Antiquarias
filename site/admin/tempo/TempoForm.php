<?php
include "../header.php";
include "../db.class.php";

$db = new db('tempo', 'idtempo');
$data = null;
$errors = [];


if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) { 
    try {
        if (empty($_POST['horas'])) {
            $errors[] = 'A duração da sessão é obrigatória.';
        }

        if (empty($_POST['horario'])) {
            $errors[] = 'A data do agendamento é obrigatória.';
        }

        if (empty($errors)) {
            $payload = [
                'horas'   => $_POST['horas'],
                'horario' => $_POST['horario'],
            ];

            if (!empty($_POST['idtempo'])) {
                $payload['idtempo'] = $_POST['idtempo'];
                $db->update($payload);
                echo "<div class='alert alert-success'>Agendamento atualizado com sucesso!</div>";
            } else {
                $db->store($payload);
                echo "<div class='alert alert-success'>Agendamento cadastrado com sucesso!</div>";
            }

            echo "
                <script>
                    setTimeout(() => window.location.href = 'TempoList.php', 1000);
                </script>
            ";
        } else {
            echo "<div class='alert alert-danger'>" . implode('<br>', $errors) . "</div>";
        }

    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao salvar: {$e->getMessage()}</div>";
    }
}

$horasValue = '';
if (!empty($data->horas)) {
    $horasValue = date('H:i', strtotime($data->horas));
}

$horarioValue = '';
if (!empty($data->horario)) {
    $horarioValue = date('Y-m-d\TH:i', strtotime($data->horario));
}
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Novo' ?> Agendamento:</h3>
    <form action="TempoForm.php" method="post">
        <input type="hidden" name="idtempo" value="<?= $data->idtempo ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Duração da sessão de Karaokê</label>
                <input class="form-control" type="time" name="horas" value="<?= $horasValue ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Data do agendamento</label>
                <input class="form-control" type="datetime-local" name="horario" value="<?= $horarioValue ?>">
            </div>
        </div>

    <div class="row mt-4">
        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="./TempoList.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</form>

<?php include "../footer.php"; ?>
?>