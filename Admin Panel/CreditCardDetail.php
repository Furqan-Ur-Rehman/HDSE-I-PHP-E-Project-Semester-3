<?php
session_start();
// if ($_SESSION['DatabaseRole'] == 'Admin') {
// } 

include 'Layout/sidebar.php';
include 'Layout/header.php';
include 'Operations/Connection.php';


if(@$_SESSION['DatabaseRole'] == 'Admin') { ?>
<div class="pageMaterial" id="pageMaterial">
<div class="Box">
            <div class="addbutton">
                <h1 onclick="openAddModal()">ADD Credit Card Details</h1>
            </div>
            <div class="categoryTable">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Card Id</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Card Number</th>
                      <th scope="col">Date_of_Expiry</th>
                      <th scope="col">Title_of_Ac</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $querys = 'select * from credit_card
                    INNER JOIN customer on customer.custid = credit_card.custid
                    
                    ';
                    $res = mysqli_query($con, $querys);
                    while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>'; ?>  
                      <th scope="row"><?= $data['cardid'] ?></th>
                      <td><?= $data['Name'] ?></td>
                      <td><?= $data['cardnumber'] ?></td>
                      <td><?= $data['Date_of_Expiry'] ?></td>
                      <td><?= $data['Title_of_Ac'] ?></td>
                      


                      <td><a href="Operations/CreditCard_Crud.php?Delid=<?= $data['cardid'] ?>" onclick="return confirm('Are you sure you want to delete?'); return false;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></a>
                      <a href="EditCreditCard.php?Updid=<?= $data['cardid'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" onclick="openupdatecat()" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a>
                      </td>
                    <?php echo '</tr>';
                    } ?>
                  </tbody>
                </table>
                <div>
            </div>
        </div>
    </div>

    <div class="blurbg" id="bgblur" style="display: none;"></div>

    <div class="AddcategoryModal" id="AddcategoryModal" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" onclick="CloseAddModal()" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <form action="Operations/CreditCard_Crud.php" method = "post">
            <div class="form-group">
            <label>Customer Name</label>
            <select class="form-control logininput" required id="customername" name = "customername">
                        <option selected disabled>Select Customer Name</option>
                       <?php 
                       $customerquery = "select * from customer";
                       $runcustomerquery = mysqli_query($con, $customerquery);
                       while($row = mysqli_fetch_assoc($runcustomerquery)): ?>
                        <option value="<?php echo $row['custid']; ?>"><?php echo $row['Name']; ?></option>
                        <?php endwhile; ?>
            </select>
              
              <label>Card Number</label>
              <input type="text" name="cardnumber" required class="form-control logininput">

              <label>Date of Expiry</label>
              <input type="date" name="dateofexpiry" required class="form-control logininput">

              <label>Title of A/C</label>
              <input type="text" name="titleofa/c" required class="form-control logininput">
              
            <button type="submit" name="addcreditcard" class="btn btn-primary form-control mt-2" style="background-color:#5271ff;">Add</button>
            </div>
        </form>
    </div>

    <?php } 
    elseif(@$_SESSION['DatabaseRole'] == 'Customer'){
    ?>


    <div class="pageMaterial" id="pageMaterial">
<div class="Box">
            
            <div class="categoryTable">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Card Id</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Card Number</th>
                      <th scope="col">Date_of_Expiry</th>
                      <th scope="col">Title_of_Ac</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id  = @$_SESSION['Cust_id'];
                    $querys = "select * from credit_card
                    INNER JOIN customer on credit_card.custid = customer.custid 
                    WHERE credit_card.custid = $id";
                    
                    $res = mysqli_query($con, $querys);
                    while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>'; ?>  
                      <th scope="row"><?= $data['cardid'] ?></th>
                      <td><?= $data['Name'] ?></td>
                      <td><?= $data['cardnumber'] ?></td>
                      <td><?= $data['Date_of_Expiry'] ?></td>
                      <td><?= $data['Title_of_Ac'] ?></td>
                      


                      
                    <?php echo '</tr>';
                    } ?>
                  </tbody>
                </table>
                <div>
            </div>
        </div>
    </div>

    <div class="blurbg" id="bgblur" style="display: none;"></div>

    <div class="AddcategoryModal" id="AddcategoryModal" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" onclick="CloseAddModal()" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <form action="Operations/CreditCard_Crud.php" method = "post">
            <div class="form-group">
            <label>Customer Name</label>
            <select class="form-control logininput" required id="customername" name = "customername">
                        <option selected disabled>Select Customer Name</option>
                       <?php 
                       $customerquery = "select * from customer";
                       $runcustomerquery = mysqli_query($con, $customerquery);
                       while($row = mysqli_fetch_assoc($runcustomerquery)): ?>
                        <option value="<?php echo $row['custid']; ?>"><?php echo $row['Name']; ?></option>
                        <?php endwhile; ?>
            </select>
              
              <label>Card Number</label>
              <input type="text" name="cardnumber" required class="form-control logininput">

              <label>Date of Expiry</label>
              <input type="date" name="dateofexpiry" required class="form-control logininput">

              <label>Title of A/C</label>
              <input type="text" name="titleofa/c" required class="form-control logininput">
              
            <button type="submit" name="addcreditcard" class="btn btn-primary form-control mt-2" style="background-color:#5271ff;">Add</button>
            </div>
        </form>
    </div>

    <?php } 
    else {
      echo "<script>window.location.href = '../index.php'</script>";
  }
    ?>
    <div class="alert alert-warning" role="alert" id="exist" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
    Credit Card Details already <b>Exists</b> !
</div>
    <div class="alert alert-success" role="alert" id="updated" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
    Credit Card Details has been <b>Updated</b> Sucessfully!
</div>

<div class="alert alert-success" role="alert" id="deleted" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
Credit Card Details has been <b>Deleted</b> Sucessfully!
</div>

<div class="alert alert-success" role="alert" id="added" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
Credit Card Details has been <b>Added</b> Sucessfully!
</div>
<?php
@
  $ID = $_GET['added'];
  if ($ID) {
    echo "<script>
  document.getElementById('added').style.display = 'block';

  const myTimeout = setTimeout(myGreeting, 5000);

  function myGreeting() {
    document.getElementById('added').style.display = 'none';
    window.location.href='CreditCardDetail.php';

  }
    </script>";
    }
    @
    $ID = $_GET['deleted'];
    if ($ID) {
      echo "<script>
    document.getElementById('deleted').style.display = 'block';
  
    const myTimeout = setTimeout(myGreeting, 5000);
  
    function myGreeting() {
      document.getElementById('deleted').style.display = 'none';
      window.location.href='CreditCardDetail.php';
  
    }
      </script>";
      }
      @
      $ID = $_GET['updated'];
      if ($ID) {
        echo "<script>
      document.getElementById('updated').style.display = 'block';
    
      const myTimeout = setTimeout(myGreeting, 5000);
    
      function myGreeting() {
        document.getElementById('updated').style.display = 'none';
        window.location.href='CreditCardDetail.php';
    
      }
        </script>";
        }
        @
        $ID = $_GET['exist'];
        if ($ID) {
          echo "<script>
        document.getElementById('exist').style.display = 'block';
      
        const myTimeout = setTimeout(myGreeting, 5000);
      
        function myGreeting() {
          document.getElementById('exist').style.display = 'none';
          window.location.href='CreditCardDetail.php';
      
        }
          </script>";
          }
?>

