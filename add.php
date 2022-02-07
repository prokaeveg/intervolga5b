<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

$db = new DB(DB_HOST, DB_USER, DB_PASS);

if (isset($_POST['submit']))
{
    //получаем переменные и проверяем их
    $countryName = htmlspecialchars($_POST['country'], ENT_QUOTES);
    $capitalName = htmlspecialchars($_POST['capital'], ENT_QUOTES);

    //если переменные пустые, показываем сообщение и отправляем обратно на форму добавления
    if (empty($countryName) || empty($capitalName))
    {
        if (empty($countryName))
        {
            echo '<script>alert("Заполните поле с названием страны!");</script>';
        }
        if (empty($capitalName))
        {
            echo '<script>alert("Заполните поле с названием столицы!");</script>';
        }
        ?>
        <script type="text/javascript">
            document.location.replace("addForm.php");
        </script>
        <?php
    } else
    {
        $query = 'INSERT INTO countries(
                         country_name,
                         capital_name
                        ) VALUES(
                        :country,
                        :capital
                        )';
        $args = [
                'country' => $countryName,
                'capital' => $capitalName
        ];
        $db->sql($query, $args);

        //возврат на главную страницу при успешном добавлении записи в базу данных ?>
        <script type="text/javascript">
            document.location.replace("index.php");
        </script>
        <?php
    }
}
?>