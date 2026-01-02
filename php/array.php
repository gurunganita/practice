<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Array</title>
</head>
<body>
    <?php  
    $myArr = array("Volvo", 15, ["apples", "bananas"]);
    echo "$myArr[0]<br>";
    echo "$myArr[1]<br>";
    echo "$myArr[2]";
    $fruitList = $myArr[2];
    echo "<br>$fruitList[0]<br>";
    echo "$fruitList[1]<br>";
    ?>
</body>
</html>

