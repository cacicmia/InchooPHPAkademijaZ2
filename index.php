<?php
/**
 * Created by PhpStorm.
 * User: mia
 * Date: 21.01.19.
 * Time: 08:46
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Z2</title>
    <style>
        .numTable{
            margin: 2%;
        }
        .numTable tr,
        .numTable td {
            padding: 10px;
            margin: 5px;
            text-align: center;
           vertical-align: center;
            background-color: #EDF;

        }
    </style>
</head>
<body>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label for="niz"> Unos brojeva odvojenih zarezom:
        <input type="text" name="niz" id="niz">
    </label>
    <input type="submit" value="unos">

</form>
<?php
$niz = htmlspecialchars( $_POST['niz']);
$arr = explode(',', $niz);
if (count($arr)<=1){
    echo "Nedovoljan unos";
} else {
array_walk($arr, function(&$x){$x = intval($x);});
$sum=0;
$count=0;
foreach($arr as  $key => &$value){
    trim($value);
    if ($value<=0){
        array_splice($arr, $key, 1);
    }
    $sum+=$value;
    $count++;

}
$avg= $sum/$count;

if(!(int)$avg%2==0) {
    $avg++;
}
array_push($arr, (int)$avg);
sort($arr);

$all= count($arr);
$tdNum=((int)sqrt($arr[$all-1]))+1;


//var_dump($arr);
$counter=0;
}

?>
<table class="numTable">
    <?php

    for ($i=0; $i<$tdNum; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $tdNum; $j++) {
            $counter++;
            echo "<td> &nbsp;";
                if (in_array($counter, $arr)&&($counter==$avg)){
                    echo "<b>".$counter. "</b>";
                } elseif (in_array($counter, $arr)&& ($counter%2==0)){
                    echo $counter;
                }



                echo "</td>";


        }

        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
