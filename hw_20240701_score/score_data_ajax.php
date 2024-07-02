<?php 
header('Content-Type: application/json');
$data = [
    [
        'id' => 1,
        'name' => 'amy',
        'chinese' => 80,
        'english' => 81,
        'math' => 82,
    ],
    [
        'id' => 2,
        'name' => 'bob',
        'chinese' => 70,
        'english' => 71,
        'math' => 72,
    ],
    [
        'id' => 3,
        'name' => 'cat',
        'chinese' => 90,
        'english' => 80,
        'math' => 92,
    ],
];

$newData = $data;

foreach ($newData as $key => $value) {
    $sum = 0;
    $avg = 0;
    $sum = $value['chinese'] + $value ['english'] + $value ['math'];
    $avg = round(($sum / 3), 2);

    $newData[$key]['sum'] = $sum;
    $newData[$key]['avg'] = $avg;
}
echo json_encode($newData);
?>