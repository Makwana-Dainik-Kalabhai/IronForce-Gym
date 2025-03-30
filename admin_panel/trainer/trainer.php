<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Trainer's List</title>
    <?php include("C:/xampp/htdocs/php/IronForce-Gym/admin_panel/links.php"); ?>
</head>

<script>
    $(document).ready(() => {
        $(".trainer-list").DataTable();
    });
</script>

<body class="">
    <div class="wrapper ">
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">

                <!-- //! Trainer's List -->
                <div class="card">
                    <div class="row">
                        <h6 class="mx-5 py-3 text-danger">Trainer's List</h6>
                    </div>
                </div>
                <hr />

                <div class="card p-3">
                    <table class="user-list">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="col-md-1">Sr.</th>
                                <th class="col-md-2">Trainer ID</th>
                                <th class="col-md-1">Profile</th>
                                <th class="col-md-2">First Name</th>
                                <th class="col-md-2">Last Name</th>
                                <th class="col-md-3">Specialization</th>
                                <th class="col-md-2">Phone</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sel_user = $conn->prepare("SELECT * FROM `trainer`");
                            $sel_user->execute();
                            $sel_user = $sel_user->fetchAll();
                            $i = 1;

                            foreach ($sel_user as $r) { ?>
                                <tr class="border-bottom">
                                    <td class="col-md-1"><?php echo $i . ")"; ?></td>
                                    <td class="col-md-2"><?php echo $r["TrainerID"]; ?></td>
                                    <td class="col-md-1"><img style="border-radius: 50%;" src="<?php echo HTTP_PATH . "/img/trainer/" . $r["img"]; ?>" /></td>
                                    <td class="col-md-2"><?php echo $r["FirstName"]; ?></td>
                                    <td class="col-md-2"><?php echo $r["LastName"]; ?></td>
                                    <td class="col-md-3"><?php echo $r["Specialization"]; ?></td>
                                    <td class="col-md-2"><?php if ($r["Phone"] != 0) {
                                                                echo $r["Phone"];
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
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