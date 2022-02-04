<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
?>
    <div class="container">
        <div class="py-5">
            <?= printHeaderText("Add new country") ?>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="table-responsive">
                        <form class="input-form" action="add.php" method="post" name="add-form">
                            <table class="myTable table table-striped table-dark">
                                <tr>
                                    <td class="hvr-bounce-out">Country name</td>
                                    <td><input class="hvr-bounce-in validated" name="country"
                                               pattern="^[A-Za-zА-Яа-яЁё\s-]+$"
                                               title="Only letters, spaces and dash"
                                               type="text" required></td>
                                </tr>
                                <tr>
                                    <td class="hvr-bounce-out">Capital of the country</td>
                                    <td><input class="hvr-bounce-in validated"
                                               name="capital"
                                               pattern="^[A-Za-zА-Яа-яЁё\s-]+$"
                                               title="Only letters, spaces and dash"
                                               type="text" required></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class='btn-success apply-btn hvr-bounce-in addButton'
                                               data-tooltip="эта подсказка" type="submit"
                                               name="submit" value="Add">
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="index.php" id="backButton" class="hvr-grow mainButton">
                    Back to countries
                </a>
            </div>
        </div>
    </div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>