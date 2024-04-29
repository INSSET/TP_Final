<?php
require_once __DIR__."/../../vendor/autoload.php";

$validator = new UPJV\Validator\AvantDate();

if (isset($_POST['bt'])) {
    $validator->verifie($_POST['data']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div class="m-1 p-3 bg-info bg-opacity-10 border border-info border-start-0 border-end-0">
    Exemple d'utilisation de votre validator
</div>

<div class="grid text-center">
    <div class="m-3 p-3 bg-light" style="grid-column: 2/3">

        <form class="form-floating" action="#" method="post">
            <input type="date" name="data" value="<?= $validator->getData()?>" class="form-control <?= $validator->ifNoOk("is-invalid") ?>" id="exemple">
            <label for="exemple"><?= $validator->getMsgInfo() ?></label>

            <button type="submit" class="m-3 btn btn-primary" name="bt">Tester</button>
        </form>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>