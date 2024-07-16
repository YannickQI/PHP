<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Desk Help - Lista de chamados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>
<body class="d-flex justify-content-center vh-100">
    <main class="w-75 my-5">
        <tabel class="table table-primary">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Número do esquipamento</th>
                <th>Descrição</th>
                <th>Observações</th>
            </thead>
            <tbody>
                <?php
                session_start();
                    if(empty($_SESSION["list_of_calls"])):
                ?>
                <tr>
                    <td colspan="5">Não existem chamados Cadastrados</td>
                </tr>
                
                <?php
                endif;
                ?>

                <?php
                    foreach($_SESSION["list_of_calls"] as $call) :
                ?>

                <td>
                    <td><?= $call["id"]?></td>
                    <td><?= $call["name"]?></td>
                    <td><?= $call["equipment_id"]?></td>
                    <td><?= (!empty($call["notes"])) ?> $call["notes"] : "Não existem observações"></td>
                    <td>
                        <a href="../Controller/Call.php?operation=findOne&code=<?=$call["id"] ?>" class="btn btn-warning" tittle="Editar o chamado"> 
                        <i class="bi bi-pencil-square"></i>
                        <a herf="../Controller/Call.php?operation=delete&code=<?= $call["id"] ?>" class="btn btn-danger" tittle="Deletar o chamado"></a>
                        <i class="bi bi-trash"></i>
                    </td>
                </td>

                <?php
                endforeach;
                ?>

            </tbody>
        </tabel>
    </main>
</body>
</html>
