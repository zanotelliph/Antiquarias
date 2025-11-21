<?php
include "../header.php";
include "../db.class.php";

$db = new db('material', 'idmaterial');
$data = null;

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {
    try {
        $errors = [];

        if (empty($_POST['microfone'])) {
            $errors[] = 'O Microfone é obrigatório';
        }

        if (empty($_POST['tv'])) {
            $errors[] = 'A Televisão é obrigatória';
        }

        if (empty($_POST['caixa_som'])) {
            $errors[] = 'A Caixa de som é obrigatória';
        }

        if (empty($_POST['iluminacao'])) {
            $errors[] = 'A Iluminação é obrigatória';
        }

        if (empty($_POST['idmaterial'])) {
            $db->store($_POST);
            echo "<div class='alert alert-success'>Registro Salvo com sucesso!</div>";
        } else {
            $db->update($_POST);
            echo "<div class='alert alert-success'>Registro Atualizado com sucesso!</div>";
        }

        echo "<script>
                setTimeout(() => window.location.href = 'MaterialList.php', 1000);
              </script>";

    } catch (Exception $e) {
        var_dump($errors, $e->getMessage());
        exit();
    }
}
?>

<div class="container mt-4">
    <h3>Materiais:</h3>

    <form action="MaterialForm.php" method="post">

        <input type="hidden" name="idmaterial" value="<?= $data->idmaterial ?? '' ?>">

        <div class="row">

            <div class="col-md-6">
                <label class="form-label">Microfone</label>
                <input class="form-control" list="microfone" type="text" name="microfone"
                    value="<?= $data->microfone ?? '' ?>">
                <datalist id="microfone">
                    <option value="Micro Solution MHD">
                    <option value="Micro Solution MHD 3.0">
                    <option value="Shure SM58">
                    <option value="HyperX QuadCast">
                    <option value="Audio-Technica AT2020">
                </datalist>
            </div>

            <div class="col-md-6">
                <label class="form-label">Televisão</label>
                <input class="form-control" list="tv" type="text" name="tv"
                    value="<?= $data->tv ?? '' ?>">
                <datalist id="tv">
                    <option value="LG">
                    <option value="Sony">
                    <option value="Sansung">
                    <option value="Philco">
                    <option value="AOC">
                </datalist>
            </div>

            <div class="col-md-6 mt-3">
                <label for="caixa_som" class="form-label">Caixa de Som</label>
                <input class="form-control" list="caixa_som" type="text" name="caixa_som"
                    value="<?= $data->caixa_som ?? '' ?>">
                <datalist id="caixa_som">
                    <option value="Micro Lux">
                    <option value="MKD 3.0">
                    <option value="Shure coconut">
                    <option value="HMMs">
                    <option value="Audio Top">
                </datalist>
            </div>

            <div class="col-md-6 mt-3">
                <label for="iluminacao" class="form-label">Iluminação</label>
                <input class="form-control" list="iluminacao" type="text" name="iluminacao"
                    value="<?= $data->iluminacao ?? '' ?>">
                <datalist id="iluminacao">
                    <option value="Vermelho">
                    <option value="Azul">
                    <option value="Verde">
                    <option value="Roxo">
                    <option value="Colorido">
                </datalist>
            </div>
        </div>

        <div class="row">
            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./MaterialList.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

    </form>
</div>

<?php include "../footer.php"; ?>