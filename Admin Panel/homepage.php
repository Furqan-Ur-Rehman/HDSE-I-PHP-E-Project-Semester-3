<?php 
session_start();

include 'Layout/sidebar.php';
include 'Layout/header.php';
include 'Operations/Connection.php';

if (@$_SESSION['DatabaseRole'] == 'Admin' || @$_SESSION['DatabaseRole'] == 'Customer') { 
    echo "<script>window.location.href = '../index.php'</script>";
}
?>