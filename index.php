<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

//базовый запрос на выборку всех стран из базы данных в алфавитном порядке
$sql = "SELECT country_name, capital_name FROM countries ORDER BY country_name ASC ";

$db = new DB(DB_HOST, DB_USER, DB_PASS);

?>
    <div class="container">
        <div class="py-5">
            <?= printHeaderText("Country database") ?>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr class="d-flex">
                                <th class="col-6">Country</th>
                                <th class="col-6">Capital</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                $data = $db::getRows($sql);
                                foreach ($data as $item) { ?>
                            <tr class="d-flex">
                                <td class="col-6"><?= htmlspecialchars($item[0]) ?> </td>
                                <td class="col-6"><?= htmlspecialchars($item[1]) ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="mainButton" id="addButton" href="addForm.php">Add new country</a>
            </div>
        </div>
    </div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>