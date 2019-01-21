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
foreach($arr as  $value){
    trim($value);

    if ($value<=0 || $value==''){
        unset($value);
    }
     
 echo $value . "<br />";
}
asort($arr);
var_dump($arr);
?>
</body>
</html>
