<?php
include 'header.php';
include 'slider.php';

unset($_SESSION['total_price']);
?>
<style>
  <?php include 'style.css' ?>
  .shop {
    aspect-ratio: 1/1;
  }
</style>
<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Green Tea</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="script.js"></script>
</head>

<body>
<?php

?>
  <div class="container p-5 my-5 bg-white text-white shadow-lg bg-body rounded w-100 ">
    <div class="row">
      <?php $ans = mysqli_query($con, "select * from index_table");
       
        while ($row = $ans->fetch_assoc()) {
          ?>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-3 bg-white text-white">
        <figure class="figure text-center">
          <img src="image/<?php echo $row['image']?>" class="rounded" alt="...">
          <figcaption class="figure-caption">
            <div class="text-center">
              <p class="h6 text-success"><?php echo $row['title']?></p>
              <p><?php echo $row['description']?></p>
              <div>
          </figcaption>
        </figure>
      </div>
    <?php
        }
    ?>
    </div>
  </div>
  <div class="container p-5 my-5 bg-white shadow-lg bg-body rounded w-100 ">
    <div class="how-section1">
     
      <div class="row">
        <?php $ans = mysqli_query($con, "select * from healthy");

        while ($row = $ans->fetch_assoc()) {
          ?>
        <div class="col-md-12 col-lg-6 how-img">
          <img src="image/<?php echo $row['image'];?>" class="img-fluid" alt="" />
        </div>
        <div class="col-md-12 col-lg-6">
          <img src="image/<?php echo $row['image1'];?>" alt="" class="img-fluid">
          <h4 class="text-success"><?php echo $row['title'];?></h4>
          <!-- <h2 class="font-weight-bold"><?php echo $row['save'];?></h2> -->
          <p class="text-muted"><?php echo $row['description']?></p>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  if (!isset($_SESSION['user_name'])) {

    ?>
    <div class="container p-5 bg-white text-white shadow-lg p-3 mb-5 bg-body rounded">
      <div class="col-sm-12  text-center">
        <img src="image/download.png" alt="">
        <h3 class="text-dark text-capitalize">Trending Products</h3>
      </div>
      <div class="row">
        <div class="col-sm-3 col-md-3 text-white">
          <img class="" src="image/about.jpg" alt="Card image">
        </div>
        <div class="col-sm-8 col-md-8 text-white">
          <div class="row">
            <div class="col-sm-12 col-md-12 text-white">
              <img class="" src="image/basil.jpg" alt="Card image">
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-12 bg-success text-white my-5 ms-3">
                <p class="h4 p-5">A Cup of Green Tea Makes You Healthy</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php $ans = mysqli_query($con, "select * from trending_products");
       
        while ($row = $ans->fetch_assoc()) {
          ?>

          <div class="col-12 col-sm-6 col-md-6 col-lg-4  p-3 bg-white text-dark">
            <div class="card">
              <img class="shop card-img-top" src="image/<?php echo $row['p_image'] ?>" alt="Card image">
              <div class="card-body text-center">
                <a href="login.php" class="btn btn-success" onclick="alert('Please login first')"> Shop now</a>
              </div>
            </div>
          </div>
          <?php
        }
        ?>

        <div class="col-12 col-sm-12  col-md-6 col-lg-6 p-3 bg-white text-dark">
          <div class="card">
            <img class="card-img-top" src="image/6.jpg" alt="Card image">
            <div class="card-img-overlay">
              <p class="card-text text-white ms-4 text-capitalize">Big offers.</p>
              <h2 class="card-title text-white">Extra 15% off</h2>
              <a href="login.php" class="btn btn-success" onclick="alert('Please login first')"> Shop now</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-3 bg-white text-dark">
          <div class="card">
            <img class="card-img-top" src="image/7.jpg" alt="Card image">
            <div class="card-img-overlay">
              <p class="card-text text-white ms-4 text-capitalize">Big offers.</p>
              <h2 class="card-title text-white">Extra 15% off</h2>
              <a href="login.php" class="btn btn-success" onclick="alert('Please login first')"> Shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  } else { ?>
    <div class="container p-5 bg-white text-white shadow-lg p-3 mb-5 bg-body rounded">
      <div class="col-sm-12  text-center">
        <img src="image/download.png" alt="">
        <h3 class="text-dark text-capitalize">Trending Products</h3>
      </div>
      <div class="row">
        <div class="col-sm-3 col-md-3 text-white">
          <img class="" src="image/about.jpg" alt="Card image">
        </div>
        <div class="col-sm-8 col-md-8 text-white">
          <div class="row">
            <div class="col-sm-12 col-md-12 text-white">
              <img class="" src="image/basil.jpg" alt="Card image">
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-12 bg-success text-white my-5 ms-3">
                <p class="h4 p-5">A Cup of Green Tea Makes You Healthy</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php $ans = mysqli_query($con, "select * from trending_products");
       
        while ($row = $ans->fetch_assoc()) {
          ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4  p-3 bg-white text-dark">
          <div class="card">
            <img class="shop card-img-top" src="image/<?php echo $row['p_image'];?>" alt="Card image">
            <div class="card-body text-center">
              <a href="checkout.php?id=<?php $row['p_id']?>" class="btn btn-success"> Shop now</a>
            </div>
          </div>
        </div>
       <?php
        }
       ?>
        <div class="col-12 col-sm-12  col-md-6 col-lg-6 p-3 bg-white text-dark">
          <div class="card">
            <img class="card-img-top" src="image/6.jpg" alt="Card image">
            <div class="card-img-overlay">
              <p class="card-text text-white ms-4 text-capitalize">Big offers.</p>
              <h2 class="card-title text-white">Extra 15% off</h2>
              <a href="product.php" class="btn btn-success"> Shop now</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-3 bg-white text-dark">
          <div class="card">
            <img class="card-img-top" src="image/7.jpg" alt="Card image">
            <div class="card-img-overlay">
              <p class="card-text text-white ms-4 text-capitalize">Big offers.</p>
              <h2 class="card-title text-white">Extra 15% off</h2>
              <a href="product.php" class="btn btn-success"> Shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
  <div class="container p-2 my-5 bg-white text-white shadow-lg bg-body rounded w-100">
    <div class="row">
      <div class="col-sm-12 text-center">
        <img src="image/download.png" alt="">
        <h3 class="text-dark text-capitalize">Why choose us?</h3>
        <p class=" text-dark">We Provide you you the best service and fast delivery</p>
      </div>
      <div class="row d-flex justify-content-around">
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
          <figure class="figure text-center">
            <img src="image/icon2.png" class="rounded" alt="...">
            <figcaption class="figure-caption">
              <div class="text-center"> <br>
                <p class="h6 text-success">Great Savings</p>
                <p>Save big amount in each and every order.</p>
                <div>
            </figcaption>
          </figure>
        </div>
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
          <figure class="figure text-center">
            <img src="image/icon1.png" class="rounded" alt="...">
            <figcaption class="figure-caption">
              <div class="text-center"> <br>
                <p class="h6 text-success">24*7 Support</p>
                <p>one-on-one Support.</p>
                <div>
            </figcaption>
          </figure>
        </div>
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
          <figure class="figure text-center">
            <img src="image/icon0.png" class="rounded" alt="...">
            <figcaption class="figure-caption"> <br>
              <div class="text-center">
                <p class="h6 text-success">Gift Vouchers</p>
                <p>Vouchers on every festiivals and events.</p>
                <div>
            </figcaption>
          </figure>
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-3 bg-white text-white">
          <figure class="figure text-center">
            <img src="image/icon.png" class="rounded" alt="...">
            <figcaption class="figure-caption">
              <div class="text-center"> <br>
                <p class="h6 text-success">Worldwide Delivery</p>
                <p>We ship and delivery all over the world.</p>
                <div>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6 container bg-white text-white w-100 ">
    <div class="row w-100 d-flex justify-content-around">
       <?php $ans = mysqli_query($con, "select * from brand_icon WHERE status='Active'");

      while ($row = $ans->fetch_assoc()) {
        ?>
      <div class="col-6 col-md-2 col-sm-2 ">
        <img class="img-fluid" src="image/<?php echo $row['brand']?>" />
      </div>
      <?php
      }
      ?>
    </div>
  </div>

  <?php
  include 'footer.php'
    ?>
</body>

</html>