<?php
session_start();
if ($_SESSION['DatabaseRole'] == 'Admin') {
} 
else {
    echo "<script>window.location.href = '../index.php'</script>";
}
include 'Layout/sidebar.php';
include 'Layout/header.php';
?>

<div class="pageMaterial" id="pageMaterial">
    <div class="Box">
        
    </div>
</div>