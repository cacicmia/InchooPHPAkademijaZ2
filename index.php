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
echo $avg. "<br />";
if(!(int)$avg%2==0) {
    $avg++;
}
array_push($arr, (int)$avg);
asort($arr);

var_dump($arr);



?>
</body>
</html>
