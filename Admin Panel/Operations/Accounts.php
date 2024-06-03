<?php include 'Connection.php'; ?>
<?php session_start(); ?>

<?php if (isset($_POST['Logout'])) {
    session_destroy();
    echo "<script>window.location.href = '../../index.php';</script>";
}
?>