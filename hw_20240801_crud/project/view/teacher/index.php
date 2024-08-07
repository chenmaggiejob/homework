<?php
include_once "../../class/base.php";
$Teachers = new DB('teachers');
$data = $Teachers->getAllSetRank();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://localhost/view/teacher/index.php">Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://localhost/view/student/index.php">Student</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <h2>Teacher List</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <div class="text-end">
            <a class="btn btn-secondary" href="../../api/teacher/rollback.php">RollBack</a>
            <a class="btn btn-primary" href="../../view/teacher/create.php">ADD</a>
            <!-- <a class="btn btn-danger" href="../../api/student/rollback.php">rollback</a>
                <a class="btn btn-success" href="./create.php">Add</a> -->
        </div>
        <table class="table table-bordered mt-3 text-center">
            <thead>
                <tr>
                    <th width="10%">id</th>
                    <th width="20%">name</th>
                    <th width="20%">mobile</th>
                    <th width="20%">rank</th>
                    <th class="text-start">
                        opreate
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value) : ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['mobile'] ?></td>
                        <td><?= $value['rank'] ?></td>
                        <td>
                            <a class="btn btn-success" href="./edit.php?id=<?= $value['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../../api/teacher/del.php?id=<?= $value['id']; ?>">Del</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- js or jqery -->
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "url",
                data: "data",
                dataType: "json",
                success: function(response) {}
            });

        });
        // jquery end
    </script>

</body>

</html>