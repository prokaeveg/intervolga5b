<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
//базовый запрос на выборку всех стран из базы данных в алфавитном порядке
$result = $dbConnection->query("SELECT * FROM countries ORDER BY country_name ASC ");
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
                                while ($row = $result->fetch(PDO::FETCH_ASSOC))
                                { ?>
                            <tr class="d-flex">
                                <td class="col-6"><?= htmlspecialchars($row['country_name']) ?> </td>
                                <td class="col-6"><?= htmlspecialchars($row['capital_name']) ?></td>
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