<?php
$code = isset($_GET['num']) ? (int)$_GET['num'] : 0;

//форма, цвет, размер
$formType = $code & 3;               
$colorIndex = ($code >> 2) & 7;      
$dimension = ($code >> 5) & 31;      


$palette = [
    "red", "green", "blue", "yellow",
    "purple", "orange", "black", "gray"
];


$dimension = $dimension * 10;
if ($dimension < 20) {
    $dimension = 20;
}

header("Content-Type: image/svg+xml");

echo '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200">';
switch ($formType) {
    case 0: // квадрат
        echo "<rect x='10' y='10' width='{$dimension}' height='{$dimension}' fill='{$palette[$colorIndex]}' />";
        break;

    case 1: // круг
        $r = (int)($dimension / 2);
        echo "<circle cx='100' cy='100' r='{$r}' fill='{$palette[$colorIndex]}' />";
        break;

    case 2: // овал
        $rx = (int)($dimension / 2);
        $ry = (int)($dimension / 3);
        echo "<ellipse cx='100' cy='100' rx='{$rx}' ry='{$ry}' fill='{$palette[$colorIndex]}' />";
        break;

    case 3: // треугольник
        echo "<polygon points='100,20 30,180 180,180' fill='{$palette[$colorIndex]}' />";
        break;
}
echo "</svg>";
?>
