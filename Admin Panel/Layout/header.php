<?php 
// if(isset($_SESSION['DatabaseRole'])){

// }
// else {
//   echo "<script>window.location.href = '../index.php'</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Stylesheet.css">
    <script src="Script/script.js"></script>
    <title>Ebook Admin Dashboard</title>
</head>
<body>
    <div class="navbar" id="navbar">
        <div class="sidebarToggler" id="togglesidebarm" onclick="togglesidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </div>
        <div class="accountBar" onclick="showmodal()">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="">
            <div class="accountBarText">
                <?php
                      if (isset($_SESSION['DatabaseName'])) {
                        echo '<h1>' . @$_SESSION['DatabaseName'].'</h1>';
                        echo '<h2>' . @$_SESSION['DatabaseRole'].'</h2>
                        <form action="Operations/Accounts.php" method="post">
                        <div class="profilemodal" id="profilemodal" style="display:none;">
                        <ul>
                          <li><a href="">Profile</a></li>
                          <li><button name="Logout">Logout</button></li>
                        </ul>
                      </div>
                      </form>
                        ';
                      } 
                      else {
                        echo "<script>window.location.href = '../index.php'</script>";
                      }
                ?> 
            </div>
        </div>
    </div>