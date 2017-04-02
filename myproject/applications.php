<html>
<?php
require_once('head.php');
?>
<?php
require_once('header.php');
?>
<?php
require_once('menu.php');
?>
<div class="apllic">
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
<?php
if (isset($_POST['submit']))
{
       // var_dump($_POST);
        $image ='./img/';
        $file = $image.basename($_FILES['image']['name']);
        $category = $_POST['switch'];
        var_dump($_FILES);
        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['image']['tmp_name'], $file))
        {
                if (!empty($_POST['describe']))
                {
                        $describe = $_POST['describe'];
                }
                else
                {
                     echo "Заполните описание заявки";
                }
        }
        else 
        { 
                echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; 
        }

        require_once 'Config.php';
        require_once('userclass.php');
        require_once('connect.php');

        $dbConnection = connect($dsn, $user, $password);

        // @todo

        // $base = new User($dns, $user, $password);
        $base = new User($dbConnection);
        // $base->connect();
        $result = $base->imagetofoto($file, $describe, $ID_user, $date1, $category);
        var_dump($result);
}
require_once('footer.php');
?>
</div>
</html>