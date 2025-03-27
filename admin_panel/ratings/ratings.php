<?php
session_start();

if (isset($_GET["product_id"])) {
    $_SESSION["product_id"] = $_GET["product_id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Ratings / Reviews</title>
    <?php include("C:/xampp/htdocs/php/medicine_website/admin_panel/links.php"); ?>
</head>

<script>
    $(document).ready(() => {
        $(".rating-list").DataTable();
    });
</script>

<body class="">
    <div class="wrapper ">
        <!-- // Sidebar -->
        <?php include("C:/xampp/htdocs/php/medicine_website/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <?php include("C:/xampp/htdocs/php/medicine_website/admin_panel/header/header.php"); ?>

            <div class="content">
                <div class="card p-5">
                    <!-- //* benefits updated successfully -->
                    <?php if (isset($_SESSION["success"])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION["success"]; ?>
                            <script>
                                $(document).ready(function() {
                                    window.location.reload();
                                    $(".alert").fadeOut(10000);
                                    <?php unset($_SESSION["success"]); ?>
                                });
                            </script>
                        </div>
                    <?php }


                    $sel = $conn->prepare("SELECT * FROM `products` WHERE `product_id`='" . $_SESSION["product_id"] . "'");
                    $sel->execute();
                    $sel = $sel->fetchAll();

                    foreach ($sel as $row) {
                        $count_img = 0;
                        $i = 1;

                        foreach (unserialize($row["item_img"]) as $img) {
                            $count_img++;
                        } ?>
                        <div class="row mb-5">
                            <div class="col-md-5">
                                <div id="carouselExampleIndicators" class="carousel slide border">

                                    <div class="carousel-indicators">
                                        <?php for ($i = 0; $i < $count_img; $i++) { ?>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" class="active border-0" aria-current="true" aria-label="Slide 1"></button>
                                        <?php } ?>
                                    </div>
                                    <div class="carousel-inner">
                                        <?php $i = 0;
                                        foreach (unserialize($row["item_img"]) as $img) {
                                            if ($i == 0) { ?>
                                                <div class="carousel-item active">
                                                    <img src="http://localhost/php/medicine_website/user_panel/shop/imgs/<?php echo $img; ?>" />
                                                </div>
                                            <?php $i++;
                                            } //
                                            else { ?>
                                                <div class="carousel-item">
                                                    <img src="http://localhost/php/medicine_website/user_panel/shop/imgs/<?php echo $img; ?>" />
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                    <button class="carousel-control-prev border-0 bg-transparent" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next border-0 bg-transparent" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="row">
                                    <p class="text-danger fs-3 my-2">Category Name</p>
                                    <input type="text" name="name" class="form-control" value="<?php echo $row["category"]; ?>" readonly />
                                </div>

                                <div class="row mt-3">
                                    <p class="text-danger fs-3 my-2">Product Name</p>
                                    <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" readonly />
                                </div>

                                <div class="row mt-3">
                                    <p class="text-danger fs-3">Definition</p>
                                    <textarea name="definition" class="form-control" value="<?php echo $row["definition"]; ?>" rows="10" readonly><?php echo $row["definition"]; ?></textarea>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class="text-danger fs-3 m-0">Discount</p>
                                        <input type="number" name="discount" class="form-control" value="<?php echo $row["discount"]; ?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-danger fs-3 m-0">Offer Price</p>
                                        <input type="number" name="offer-price" class="form-control" value="<?php echo $row["offer_price"]; ?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-danger fs-3 m-0">Price</p>
                                        <input type="number" name="price" class="form-control" value="<?php echo $row["price"]; ?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-danger fs-3 m-0">Quantity</p>
                                        <input type="number" name="quantity" class="form-control" value="<?php echo $row["quantity"]; ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p class="text-danger fs-3 m-0">Weight</p>
                                        <input type="text" name="weight" class="form-control" value="<?php echo $row["weight"]; ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-danger fs-3 m-0">Expiry Date</p>
                                        <input type="text" name="expiry" class="form-control" value="<?php echo $row["expiry"]; ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-danger fs-3 m-0">Delivery Date</p>
                                        <input type="text" name="delivery-date" class="form-control" value="<?php echo $row["delivery_date"]; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>



                <div class="card p-5">
                    <h5 class="text-danger mb-4 border-bottom py-2">Ratings / Reviews of the User</h5>

                    <div class="row bg-secondary text-light">
                    </div>

                    <table class="rating-list">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="col-md-1 border p-3 text-center">Sr. no.</th>
                                <th class="col-md-3 border p-3 text-center">Email ID</th>
                                <th class="col-md-2 border p-3 text-center">Rating</th>
                                <th class="col-md-4 border p-3 text-center">Review</th>
                                <th class="col-md-2 border p-3 text-center">Date</th>
                            </tr>
                        </thead>

                        <tbody>

                            <!-- //! Select Ratings / Reviews -->
                            <?php
                            $sel = $conn->prepare("SELECT * FROM `ratings` WHERE `product_id`='" . $_SESSION["product_id"] . "'");
                            $sel->execute();
                            $sel = $sel->fetchAll();
                            $i = 1;

                            foreach ($sel as $row) {
                                $like = 0; ?>
                                <tr>
                                    <td class="col-md-1 border p-3 text-center"><?php echo $i; ?>)</td>
                                    <td class="col-md-3 border p-3 text-center"><?php echo $row["email"]; ?></td>
                                    <td class="col-md-2 border p-3 text-center">
                                        <?php if ($row["rate"] > 0) {
                                            while ($like < $row["rate"]) { ?>
                                                <i class="fa-solid fa-star" style="color: #FDCC0D; font-size: 19px;"></i>
                                            <?php $like++;
                                            }
                                            while ($like < 5) { ?>
                                                <i class="fa-solid fa-star" style="color: #bfbfbf; font-size: 19px;"></i>
                                        <?php $like++;
                                            }
                                        } ?>
                                    </td>

                                    <td class="col-md-4 border p-3">
                                        <?php if ($row["review"] != null) { ?>
                                            <h6 class="text-danger"><?php echo unserialize($row["review"])[0]; ?></h6>
                                            <p><?php echo unserialize($row["review"])[1]; ?></p>
                                        <?php } ?>
                                    </td>
                                    <td class="col-md-2 border p-3 text-center">
                                        <?php $date = strtotime($row["time"]);
                                        echo date("M d, Y", $date); ?>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <footer class="footer footer-black  footer-white ">
            <?php include("C:/xampp/htdocs/php/medicine_website/admin_panel/footer/footer.php"); ?>
        </footer>
    </div>
</body>

</html>