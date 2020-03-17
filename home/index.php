<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: /");
}
?>

<?php include("../view/header.php"); ?>
<h1>Hello <?= $_SESSION["fname"] ?></h1>
<?php include("../view/footer.php"); ?>