<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $russia = array("Country"=>"Росссия", "peoples"=>"1337", "state"=>"Москва");
    $kazak = array("Country"=>"Казахстан", "peoples"=>"666", "state"=>"Алтаны");
    $brazil = array("Country"=>"Бразилия", "peoples"=>"1488", "state"=>"Мадрид");
    $nam=isset($_GET['nam'])?$_GET['nam']:NULL;
    ?>
    <table>
        <tr>
            <td><?php echo $russia["Country"]; ?></td>
            <td><?php echo $russia["state"]; ?></td>
        </tr>
        <tr>
            <td><?php echo $kazak["Country"]; ?></td>
            <td><?php echo $kazak["state"]; ?></td>
        </tr>
        <tr>
            <td><?php echo $brazil["Country"]; ?></td>
            <td><?php echo $brazil["state"]; ?></td>
        </tr>
    </table>
    <form method="GET" action="<?=$_SERVER['PHP_SELF']?>">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="age" placeholder="Возраст">
        <input type="text" name="stage" placeholder="Курс">
        <input type="submit">
        <?php
        $name=isset($_GET['name'])?$_GET['name']:NULL;
        $age=isset($_GET['age'])?$_GET['age']:NULL;
        $stage=isset($_GET['stage'])?$_GET['stage']:NULL;
        $student = array("name"=>"$name", "age"=>"$age", "stage"=>"$stage");
        echo $student["name"];
        ?>
    </form>
    
</body>
</html>