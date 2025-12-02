<?php
include "../header.php";
include "../db.class.php";

$db = new db('reserva', 'id');
$dbSala = new db('sala', 'id');
$data = null;
$errors = [];

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

// Buscar lista de salas para o select
$salas = $dbSala->all();

if (!empty($_POST)) { 
    try {
        if (empty($_POST['sala_id'])) {
            $errors[] = 'A sala é obrigatória.';
        }

        if (empty($_POST['data_hora_inicio'])) {
            $errors[] = 'A data/hora de início é obrigatória.';
        }

        if (empty($_POST['data_hora_fim'])) {
            $errors[] = 'A data/hora de fim é obrigatória.';
        }

        if (empty($errors)) {
            $payload = [
                'sala_id'         => $_POST['sala_id'],
                'data_hora_inicio' => $_POST['data_hora_inicio'],
                'data_hora_fim'    => $_POST['data_hora_fim'],
            ];

            if (!empty($_POST['id'])) {
                $payload['id'] = $_POST['id'];
                $db->update($payload);
                echo "<div class='alert alert-success'>Reserva atualizada com sucesso!</div>";
            } else {
                $db->store($payload);
                echo "<div class='alert alert-success'>Reserva cadastrada com sucesso!</div>";
            }

            echo "
                <script>
                    setTimeout(() => window.location.href = 'ReservaList.php', 1000);
                </script>
            ";
        } else {
            echo "<div class='alert alert-danger'>" . implode('<br>', $errors) . "</div>";
        }

    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao salvar: {$e->getMessage()}</div>";
    }
}

$dataHoraInicioValue = '';
if (!empty($data->data_hora_inicio)) {
    $dataHoraInicioValue = date('Y-m-d\TH:i', strtotime($data->data_hora_inicio));
}

$dataHoraFimValue = '';
if (!empty($data->data_hora_fim)) {
    $dataHoraFimValue = date('Y-m-d\TH:i', strtotime($data->data_hora_fim));
}
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Nova' ?> Reserva:</h3>
    <form action="ReservaForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Sala</label>
                <select class="form-select" name="sala_id" required>
                    <option value="">Selecione uma sala...</option>
                    <?php if (!empty($salas)): ?>
                        <?php foreach ($salas as $sala): ?>
                            <option value="<?= $sala->id ?>" <?= ($data->sala_id ?? '') == $sala->id ? 'selected' : '' ?>>
                                <?= $sala->nome ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Data/Hora Início</label>
                <input class="form-control" type="datetime-local" name="data_hora_inicio" value="<?= $dataHoraInicioValue ?>" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Data/Hora Fim</label>
                <input class="form-control" type="datetime-local" name="data_hora_fim" value="<?= $dataHoraFimValue ?>" required>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./ReservaList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

    </form>
</div>

<?php include "../footer.php"; ?>

