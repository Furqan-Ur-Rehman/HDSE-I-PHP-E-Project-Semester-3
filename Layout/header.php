<?php include 'Connection.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook Store</title>
    <link rel="stylesheet" href="CSS/Stylesheet.css">
    <script src="Script/Script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="header">
    <img src="Assets/Logo/Logo.png" alt="">
    <div class="headerRight">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-suit-heart-fill"
        viewBox="0 0 16 16">
        <path
        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" onclick="opencartbox()" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
        
        <path
        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <span style="color:rgb(159, 192, 244); font-size:20px;"><b><u><?php echo @$_SESSION['DatabaseName']; ?></u></b></span>
    <?php

        if (isset($_SESSION['DatabaseName'])) {
            echo '<div class="accountBar">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" onclick="showmodal()">
            </div>  
              
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
          echo '
          <svg xmlns="http://www.w3.org/2000/svg" onclick="openLoginModal()" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
        </svg>
          ';
        }
        
 ?>
               
            
               
</div>
            
            
                            
            
    </div>
    <div class="firstBar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Books.php">Shop</a></li>
            <li><a href="Compitition.php">Competitions</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="Contact.php">Contact</a></li>
        </ul>
    </div>
    <div class="MobilefirstBar">
        <div onclick="opensnavbar()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="offsidebar" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" style="display:none;" fill="currentColor" id="onsidebar"
                class="bi bi-list-nested" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z" />
            </svg>
        </div>
    </div>
    <div class="Mobilesidebar" id="mobilesidebar" style="display:none;">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Books.php">Books</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Compitition.php">Competitions</a></li>
        </ul>
    </div>
    <div class="blurbg" id="bgblur" style="display: none;"></div>
            <div class="Modal" id="loginmodal" style="opacity:0; width:0px; height:0px; display:none">
                <svg xmlns="http://www.w3.org/2000/svg" onclick="closemodal()" fill="currentColor" class="bi bi-x"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>

                <form action="Operations/Accounts.php" method="post" enctype="multipart/form-data" id="LoginForm">
                    <h1>Account Login</h1>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control logininput">
                    </div>
                    <div class="form-group">
                        <label name="password">Password</label>
                        <input type="password" name="Password" class="form-control logininput">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" style="margin-top: 6px;">
                        <label class="form-check-label" for="exampleCheck1">Remember Password</label>
                    </div>
                    <button type="submit" name="LoginButton" class="btn form-control"
                        style="background-color: #4d66d3; color:white;">Login</button>
                    <p>Not a user <span onclick="Registerform()">Register Now</span></p>
                </form>

                <form action="Operations/Accounts.php" method="post" enctype="multipart/form-data" id="RegisterForm"
                    style="opacity:0; width:0px; height:0px; z-Index:-999;">
                    <h1>Account Register</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" required class="form-control logininput">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="Email" required class="form-control logininput">
                    </div>
                    <div class="form-group">
                        <label">Password</label>
                            <input type="password" required name="Password" class="form-control logininput">
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="Contact" required class="form-control logininput">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="Address"  required class="form-control logininput">
                    </div>
                    <button type="submit" name="RegisterButton" class="btn form-control"
                        style="background-color: #4d66d3; color:white;">Register</button>
                    <p>Already a user <span onclick="loginform()">Login Now</span></p>
                </form>
            </div>    
</body>