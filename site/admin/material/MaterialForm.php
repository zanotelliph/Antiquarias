<?php
include "../header.php";
include "../db.class.php";

$db = new db('material', 'id');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {
    try {
        $errors = [];

        if (empty($_POST['microfone'])) {
            $errors[] = 'O microfone é obrigatório';
        }

        if (empty($errors)) {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                echo "<div class='alert alert-success'>Registro Salvo com sucesso!</div>";
            } else {
                $db->update($_POST);
                echo "<div class='alert alert-success'>Registro Atualizado com sucesso!</div>";
            }

            echo "<script>
                    setTimeout(() => window.location.href = 'MaterialList.php', 1000);
                  </script>";
        } else {
            echo "<div class='alert alert-danger'>" . implode('<br>', $errors) . "</div>";
        }

    } catch (Exception $e) {
        var_dump($e->getMessage());
        exit();
    }
}
?>

<div class="container mt-4">
    <h3><?= !empty($data) ? 'Editar' : 'Novo' ?> Material:</h3>

    <form action="MaterialForm.php" method="post">
        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Microfone</label>
                <input class="form-control" list="microfone_list" type="text" name="microfone"
                       value="<?= $data->microfone ?? '' ?>">
                <datalist id="microfone_list">
                    <option value="Shure SM58">
                    <option value="HyperX QuadCast">
                    <option value="Audio-Technica AT2020">
                    <option value="Blue Yeti">
                    <option value="Rode NT1">
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">TV</label>
                <input class="form-control" list="tv_list" type="text" name="tv"
                       value="<?= $data->tv ?? '' ?>">
                <datalist id="tv_list">
                    <option value="LG 50'">
                    <option value="Samsung 55'">
                    <option value="Sony 60'">
                    <option value="Philco 42'">
                    <option value="AOC 32'">
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">Caixa de Som</label>
                <input class="form-control" list="caixa_som_list" type="text" name="caixa_som"
                       value="<?= $data->caixa_som ?? '' ?>">
                <datalist id="caixa_som_list">
                    <option value="JBL PartyBox">
                    <option value="Sony MHC">
                    <option value="LG XBOOM">
                    <option value="Philips Party Speaker">
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">Iluminação</label>
                <input class="form-control" list="iluminacao_list" type="text" name="iluminacao"
                       value="<?= $data->iluminacao ?? '' ?>">
                <datalist id="iluminacao_list">
                    <option value="LED RGB">
                    <option value="Strobo">
                    <option value="Laser">
                    <option value="Moving Head">
                    <option value="Par LED">
                </datalist>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./MaterialList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
</div>

<?php include "../footer.php"; ?>
