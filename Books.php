<?php 
include 'Layout/header.php';
include 'Operations/Connection.php';
?>

<div class="page bookspage">
    <div class="productfilterbar">
      <h1>Category</h1>
        <form class="row">
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Kids
        </label>
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Films
        </label>
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Drama
        </label>
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Fiction
        </label>
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Comedy
        </label>
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Stories
        </label>
      </form>
      <h1>Languages</h1>
        <form class="row">
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">Urdu
        </label>
        <label class="checkbox-inline col-12">
          <input type="checkbox" value="">English
        </label>
      </form>
      <h1>Price Range</h1>
  <input type="range" class="form-range" id="customRange1">
    </div>
    <div class="productsearchbar">
      <select name="" id="" class="sortby">
        <option value="SortBy">Sort By</option>
        <option value="NewArrival">New Arrival</option>
        <option value="TopSelling">Top Selling</option>
        <option value="Price">Price</option>
      </select>

    <input type="text" class="searchbyname" placeholder="Search..">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg>
    </div>
 
    <div class="productsAreatop">
    </div>
    <div class="productsArea row p-0">
    <?php
    $querys = 'select * from books';
    $res = mysqli_query($con, $querys);
    while ($data = mysqli_fetch_assoc($res)) {
    echo '<div class="col-lg-3 col-sm-12 m-0 p-2">' ?>
            <div class="box">
                <div class="BookImage">
                <img src="Admin Panel/Admin Panel/<?= $data['Image']?>">
                </div>
                <h1><?= $data['Book_Name'] ?></h1>
                <div class="bookrating">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </div>
                <h3><span><?= $data['Price'] ?></span> PKR</h3>
                <form action="Operations/Cart_Crud.php" method="post">
                  <input type="hidden" name="Bookid" value="<?= $data['Bookid'] ?>"></a>
                  <input type="hidden" name="BookName" value="<?= $data['Book_Name'] ?>"></a>
                  <input type="hidden" name="qty" value="1"></a>
                  <input type="hidden" name="Price" value="<?= $data['Price'] ?>"></a>
                  <input type="submit" name="addtocart" value="Add to Cart"></a>
                </form>
            </div>
            </div>
            <?php
          }?>
    </div>
  </div>
</div>

<?php
include 'Layout/cart.php';
?>

<div class="alert alert-success" role="alert" id="mesgreceived" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
  Book has been added to cart !
</div>
<?php
@
  $ID = $_GET['sended'];
  if ($ID) {
    echo "<script>
  document.getElementById('mesgreceived').style.display = 'block';

  const myTimeout = setTimeout(myGreeting, 5000);

  function myGreeting() {
    document.getElementById('mesgreceived').style.display = 'none';

  }
    </script>";
    }

?>