<?php
 $data =  array (1,2,11,43,15,32,19,20,5,6);
 function sort($data){
    $n = $count($data);
    for ($i = 0 ; $i < $n ; $i++ ) {for ($j = $i; $j > 0; $j-- ){
    if ($data [$j] < $data [$j-1]){
    $sort = $data[$j];
    $data [$j] = $data[$j - 1];
    $data[$j - 1] = $sort;
    }
}
}
 return $data;
}
 print_r(sort($data));
?>