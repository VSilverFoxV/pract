<?php
function shellSort($arr)
{
    $n = count($arr);
 
    $gap = floor($n / 2);
    
    while ($gap > 0) {
        for ($i = $gap; $i < $n; $i++) {
            $temp = $arr[$i];
            $j = $i;

            while ($j >= $gap && $arr[$j - $gap] > $temp) {
                $arr[$j] = $arr[$j - $gap];
                $j -= $gap;
            }
            
            $arr[$j] = $temp;
        }

        $gap = floor($gap / 2);
    }
    
    return $arr;
}

if (isset($_GET['arr'])) {
    $arr = explode(",", $_GET['arr']);
    $arr = array_map('intval', $arr);
    $sorted = shellSort($arr);

    echo "<h1>Отсортированный массив (Сортировка Шелла)</h1>";
    echo implode(", ", $sorted);
} else {
    echo "Передайте массив в виде ?arr=5,2,9,1";
}
?>