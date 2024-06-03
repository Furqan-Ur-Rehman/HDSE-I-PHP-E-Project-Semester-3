<?php 
session_start();
if (@$_SESSION['DatabaseRole'] == 'Customer' || @$_SESSION['DatabaseRole'] == 'Admin') {
} 
else {
    echo "<script>alert('Please Login First!'); window.location.href = 'index.php';</script>";
}

include 'Layout/header.php';
include 'Operations/Connection.php';

?>

<div class="page" style="margin-top: 110px; position: absolute; width: 100%;">
<div class="box2 row m-0 p-0">
        <div class="col-lg-12 m-0 p-0">
            <h1 style="">COMPETITONS</h1>
        </div>
    </div>
<?php
    $querys = 'select * from competition';
    $res = mysqli_query($con, $querys);
while ($data = mysqli_fetch_assoc($res)) {
?>


    <div class="box3 row m-0" style="margin-bottom: 10px !important;">
        <div class="col-lg-12">
            <ul>
                <li>
                    <h2>Eassy Writing</h2>
                </li>
                <li>
                    <h2>Writing Contest</h2>
                </li>
            </ul>

            <h1 class="pt-3">Show Off Your Skills In <?= $data['comp_name'] ?> Competition?</h1>
            <h2 class="compitem">Play this competition to test your Writing skills. Topic in this competition will be on
                <span>"<?= $data['Topics'] ?>"</span></h2>
            <h2 style="font-size:20px; padding-left: 5px; font-weight: 500;">Price?</h2>
            <ol>
                <li>1st Winners will get 2000 Rupees & Merit certificate.</li>
                <li>2st winner will get 2 free Book in of paid workshop and 3nd winner will get 80% on All Books.</li>
                <li>Rest of all participants will get featured on our website and 10% off on ALL Books.</li>
            </ol>
        </div>
        <h1 class="compstart">Competiton start date : <?= $data['start_date'] ?></h1>
        <h1 class="compstart2" onclick="openAddModal()">PARTICIPATE NOW</h1>
    </div>
<?php
}
?>

</div>

<div class="blurbg" id="bgblur" style="display: none;"></div>

<div class="AddcategoryModal" id="AddcategoryModal" style="display:none;">
    <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href = 'Compitition.php';" fill="currentColor"
        class="bi bi-x" viewBox="0 0 16 16">
        <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
    </svg>
    <div class="row">
        <h1 class="col-12" style="font-size: 18px;">
            Just to test your skills please, Write Essay on given Topic:<br>
             "Coding is the phobia or not?".
        </h1>
        <p>Total Marks: <b>100</b></p> <pre>                                                   </pre> <br><br>
        <p>Passing Marks: <b>40</b></p>
        <form action="Competitions Logic/essay.php" method="post">
            <textarea name="text" id="" cols="100%" rows="10" class="col-12 "></textarea>
            <input type="submit" name="sub" id="" value="Submit" class="bg-dark"
            style="width: 100%; border: none; height: 40px; color: white; ">
        </form>
    </div>
</div>

<div class="alert alert-primary" role="alert" id="mesgreceived" style="position:absolute; bottom:0px; margin-left: 20px; display: none;">
  Thank you for Participating ! You will soon receive confirmation
</div>

<!-- <?php
$ID = $_GET['sended'];

if($ID){
  echo "<script>
  document.getElementById('mesgreceived').style.display = 'block';

  const myTimeout = setTimeout(myGreeting, 5000);

function myGreeting() {
  document.getElementById('mesgreceived').style.display = 'none';
  window.location.href='Contact.php';
}
  </script>";
}
?> -->