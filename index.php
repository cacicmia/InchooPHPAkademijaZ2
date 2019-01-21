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
            border: 1px solid #FFF;
        }
        .numTable td {
            padding: 5px;
            text-align: center;
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
$niz = $_POST['niz'];
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

$big= count($arr);
$tdNum=((int)sqrt($arr[$big-1]))+1;
$trNum=intdiv($big,$tdNum)+1;
var_dump($arr);

}

?>
<table class="numTable">
    <?php
    echo "eko";
    for ($i=0; $i<$trNum; $i++){
        echo "<tr>"."ekoooooo";
        for ($j=0;$j<$tdNum; $j++){
            echo "<td> "."ekoooooo";
            foreach($arr as $el) {
                if ($i+$j==$avg) {
                    echo "<b>{$el}</b>";
                } elseif ($i+$j==$el) {
                    echo $el;

                }
            echo "</td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
