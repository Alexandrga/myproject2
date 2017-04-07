<?php
//var_dump($_POST['image']);
$bFormSubmitted = isset($_POST['submit']);
$bFormImage = isset($_POST['image']);
if ($bFormSubmitted)
{
    //var_dump($_POST);
       // var_dump($_POST);

        $image ='../img/';
        $file = $image.basename($_FILES['image']['name']);
        $category = $_POST['switch'];
        //var_dump($_FILES);
        // Копируем файл из каталога для временного хранения файлов:

    if ($_FILES['image']['size'] < 10000000)
    {   
        if (!empty($_FILES['image']['name']))
        {
            if (copy($_FILES['image']['tmp_name'], $file))
            {
                if (!empty($_POST['describe']))
                {
                        $describe = $_POST['describe'];
                }
                else
                {
                    ?>
                    <script type="text/javascript" charset="utf8">
                        alert("Заполните описание заявки");
                    </script>
                    <?php
                    return false;
                }
            }
            else 
            { 
                echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; 
            }

            require_once __DIR__ . '/../../config/config.php';
            require_once __DIR__ .'/class/userclass.php';
            require_once __DIR__ .'/function/connect.php';
        
            $dbConnection = connect($dsn, $user, $password);
            $base = new User($dbConnection);
            $result = $base->imagetofoto($file, $describe, $ID_user, $date1, $category);
            //var_dump($_POST);
            if ($bFormSubmitted)
            if ($result === true)
            if (!empty($_POST['describe']))
            {
                ?><div>
                <script type="text/javascript"> 
                    alert ('Запись успешно добавлена.');
                </script>
                </div>
            <?php
            }
        }
        else
        {
        ?>
        <script type="text/javascript">
            alert('Файл не выбран');
        </script>
        <?php
        }
    }
    else 
    {
    ?>
    <script type="text/javascript">
        alert('Превышен размер файла');
    </script>
    <?php  
    }
}

?>
<html>
<head>
</head>
<body>
<?php
require_once('headcss.php');
?>
<?php
require_once('header.php');
?>
<?php
require_once('menu.php');
?>
<div class="apllic">
    <div>
        <form class="form" enctype="multipart/form-data" method="POST">
           <p>Выберите категорию заявки</p>
            <select name="switch">
                <option value="turn">Токарные работы</option>
                <option value="mill">Фрезерные работы</option>
                <option value="grinding">Шлифовальные работы</option>
                <option value="boring">Расточные работы</option>
            </select>
            <p>Описание заявки</p>
            <textarea name="describe" cols="60" rows="10" wrap="virtual"></textarea><br>
            <input type="file" name="image">
            <input type=submit value=Загрузить name="submit">
        </form>
    </div>
<?php require_once('footer.php'); ?>
</div>
</body>
</html>