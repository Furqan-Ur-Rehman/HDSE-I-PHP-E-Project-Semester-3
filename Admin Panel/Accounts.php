<?php
session_start();
if ($_SESSION['DatabaseRole'] == 'Admin') {
} 
else {
    echo "<script>window.location.href = '../index.php'</script>";
}
include 'Layout/sidebar.php';
include 'Layout/header.php';
include 'Operations/Connection.php';
?>

<div class="pageMaterial" id="pageMaterial">
    <div class="Box">
        <div class="addbutton">
            <h1 onclick="openAddModal()">ADD ACCOUNT</h1>
        </div>
        <div class="categoryTable">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Account ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $querys = 'select * from customer';
                    $res = mysqli_query($con, $querys);
                    while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>'; ?>
                    <th scope="row"><?= $data['custid'] ?></th>
                    <td><?= $data['Name'] ?></td>
                    <td><?= $data['Role'] ?></td>
                    <td><?= $data['Contact'] ?></td>
                    <td><?= $data['Email'] ?></td>

                    <td><a href="Operations/Account_Crud.php?Delid=<?= $data['custid'] ?>" onclick="return confirm('Are you sure you want to delete?'); return false;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg></a>
                        <a href="Edit_Accounts.php?Updid=<?= $data['custid'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>

                        <a href="View_Accounts.php?viewid=<?= $data['custid'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
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

    <div class="blurbg" id="bgblur" style="display:none;"></div>

    <div class="AddcategoryModal" id="AddcategoryModal" style="display:none;">
        <svg xmlns="http://www.w3.org/2000/svg" onclick="CloseAddModal()" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
        <form action="Operations/Account_Crud.php" method="post">
            <div class="Addaccount form-group row">
                <h1 class="col-12" style="padding-bottom: 5px; COLOR:#5271ff;">
                    ADD <span style="color:rgba(31, 31, 31, 0.719);">ACCOUNT<span>
                </h1>
                <label class="col-3">Registration Date</label>
                <input type="date" id="currentdate" required name="DOR" class="form-control logininput col-9 mb-2">

                <label class="col-3">Role</label>
                <select name="Role" id="" required class="form-control logininput col-4 mb-2">
                    <option value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                </select>

                <label class="col-2" style="text-align:center;">Age</label>
                <input type="number" name="Age" required class="form-control logininput col-3 mb-2">

                <label class="col-3">Name</label>
                <input type="text" name="Name" required class="form-control logininput col-9 mb-2">

                <label class="col-3">Address</label>
                <input type="text" name="Address" required class="form-control logininput col-9 mb-2">

                <label class="col-3">Qualification</label>
                <input type="text" name="Qualification" required class="form-control logininput col-9 mb-2">

                <label class="col-3">Contact</label>
                <input type="number" name="Contact" required class="form-control logininput col-9 mb-2">

                <label class="col-3">Email</label>
                <input type="text" name="Email" required class="form-control logininput col-9 mb-2">

                <label class="col-3">Password</label>
                <input type="password" name="Password" required class="form-control logininput col-9 mb-2">

                <button type="submit" name="addAccount" class="btn btn-primary form-control mt-2"
                    style="background-color:#5271ff;">Add</button>
            </div>
        </form>
    </div>
</div>
<div class="alert alert-warning" role="alert" id="exist" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
Account already <b>Exists</b> !
</div>
    <div class="alert alert-success" role="alert" id="updated" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
    Account has been <b>Updated</b> Sucessfully!
</div>

<div class="alert alert-success" role="alert" id="deleted" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
Account has been <b>Deleted</b> Sucessfully!
</div>

<div class="alert alert-success" role="alert" id="added" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
Account has been <b>Added</b> Sucessfully!
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
    window.location.href='Chargeonweight.php';

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
      window.location.href='Accounts.php';
  
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
        window.location.href='Accounts.php';
    
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
          window.location.href='Accounts.php';
      
        }
          </script>";
          }
?>

