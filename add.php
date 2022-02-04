<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/connect.php';
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
        $query = $dbConnection->prepare('INSERT INTO countries(country_name, capital_name) VALUES(:country, :capital)');
        $query->bindparam(':country', $countryName);
        $query->bindparam(':capital', $capitalName);
        $query->execute(array(':country' => $countryName, ':capital' => $capitalName));

        //возврат на главную страницу при успешном добавлении записи в базу данных ?>
        <script type="text/javascript">
            document.location.replace("index.php");
        </script>
        <?php
    }
}
?>