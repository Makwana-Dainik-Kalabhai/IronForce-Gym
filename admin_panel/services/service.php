<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Services List</title>
    <?php include("C:/xampp/htdocs/php/IronForce-Gym/admin_panel/links.php"); ?>
</head>

<script>
    $(document).ready(() => {
        $(".service-list").DataTable();
    });
</script>


<body class="">
    <div class="wrapper ">
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">

                <!-- //! Services List -->
                <div class="card">
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="mx-5 py-3 text-danger">Services List</h6>
                        </div>
                        <div class="col-md-2">
                            <a href="add.php" class="btn">Add Service</a>
                        </div>
                    </div>
                </div>
                <hr />

                <div class="card p-3">
                    <table class="service-list">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="col-md-1">Sr.</th>
                                <th class="col-md-1">Service</th>
                                <th class="col-md-1">Name</th>
                                <th class="col-md-3">Description</th>
                                <th class="col-md-1">Price</th>
                                <th class="col-md-1">Duration</th>
                                <th class="col-md-2">Category</th>
                                <th class="col-md-1">Created</th>
                                <th class="col-md-1">Updated</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sel = $conn->prepare("SELECT * FROM `service`");
                            $sel->execute();
                            $sel = $sel->fetchAll();
                            $i = 1;

                            foreach ($sel as $r) { ?>
                                <tr class="border-bottom">
                                    <td class="col-md-1"><?php echo $r["service_id"]; ?></td>
                                    <td class="col-md-1"><img src="<?php echo HTTP_PATH . "/img/services/" . $r["img"]; ?>" /></td>
                                    <td class="col-md-1"><?php echo $r["name"]; ?></td>
                                    <td class="col-md-3"><?php echo $r["description"]; ?></td>
                                    <td class="col-md-1">&#8377;<?php echo $r["price"]; ?></td>
                                    <td class="col-md-1"><?php echo $r["duration"]; ?></td>
                                    <td class="col-md-2"><?php echo $r["category"]; ?></td>
                                    <td class="col-md-1"><?php echo date("d/m/Y", strtotime($r["created_at"])); ?></td>
                                    <td class="col-md-1"><?php echo date("d/m/Y", strtotime($r["updated_at"])); ?></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <?php include(DRIVE_PATH . "/admin_panel/footer/footer.php"); ?>
            </footer>
        </div>
    </div>

</body>

</html>