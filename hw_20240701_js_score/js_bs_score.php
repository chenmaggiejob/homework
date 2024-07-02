<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

$data = [
    [
        'id' => 1,
        'name' => 'amy',
        'chinese' => '80',
        'english' => '81',
        'math' => '82',
    ],
    [
        'id' => 2,
        'name' => 'bob',
        'chinese' => '70',
        'english' => '71',
        'math' => '72',
    ],
    [
        'id' => 3,
        'name' => 'cat',
        'chinese' => '90',
        'english' => '81',
        'math' => '92',
    ],
]
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

    <div class="container mt-3">
        <h2>Store Table</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>chinese</th>
                    <th>english</th>
                    <th>math</th>
                    <th>sum</th>
                    <th>avg</th>
                </tr>
            </thead>
            <tbody id="scoreForm">
                <!-- <tr>
                    <td>1</td>
                    <td>amy</td>
                    <td>80</td>
                    <td>81</td>
                    <td>82</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>bob</td>
                    <td>70</td>
                    <td>71</td>
                    <td>72</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>cat</td>
                    <td>90</td>
                    <td>91</td>
                    <td>92</td>
                </tr> -->
            </tbody>
            <?php foreach ($data as $key => $value) : ?>
                <?php
                $sum = 0;
                $avg = 0;
                $sum = $value['chinese'] + $value['english'] + $value['math'];
                $avg = round(($sum / 3), 2);
                ?>
                <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['chinese'] ?></td>
                <td><?= $value['english'] ?></td>
                <td><?= $value['math'] ?></td>
                <td><?= $sum ?></td>
                <td><?= $avg ?></td>
                </tr>

            <?php endforeach ?>
        </table>
    </div>

    <script>


    </script>
</body>

</html>