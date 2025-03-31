<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVIGOR FITNESS STUDIO - Attendance Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
    <style>
        :root {
            --primary: #4a6bff;
            --primary-dark: #3a56cc;
            --secondary: #ff6b6b;
            --dark: #2c3e50;
            --light: #f8f9fa;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --gray: #6c757d;
        }

        [data-bs-theme="dark"] {
            --bs-body-bg: #1a1a2e;
            --bs-body-color: #f8f9fa;
            --card-bg: #16213e;
            --input-bg: #0f3460;
            --table-bg: #16213e;
        }

        [data-bs-theme="light"] {
            --bs-body-bg: #f8f9fa;
            --bs-body-color: #212529;
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --table-bg: #ffffff;
        }

        body {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s ease;
        }

        .attendance-container {
            padding-top: 200px;
        }

        .alert {
            width: fit-content;
            position: fixed;
            top: 5%;
            left: 50%;
            transform: translate(-50%, 0);
            font-weight: 700;
            filter: contrast(130%);
        }

        .alert-success {
            background-color: green !important;
        }

        .alert-danger {
            background-color: red !important;
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            font-weight: 600;
            padding: 15px 20px;
        }

        .form-control,
        .form-select {
            background-color: var(--input-bg);
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px 15px;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(74, 107, 255, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .badge-present {
            background-color: var(--success);
        }

        .badge-absent {
            background-color: var(--danger);
        }

        .badge-late {
            background-color: var(--warning);
            color: var(--dark);
        }

        .stats-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        .stats-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stats-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stats-card p {
            margin-bottom: 0;
            font-weight: 500;
        }

        #presentStats {
            background: linear-gradient(135deg, #4a6bff, #6a8bff);
        }

        #absentStats {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        }

        #lateStats {
            background: linear-gradient(135deg, #ffc107, #ffd54f);
            color: var(--dark);
        }

        .dataTables_wrapper {
            padding: 0;
        }

        .dataTables_filter input {
            background-color: var(--input-bg);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--bs-body-color);
        }

        table.dataTable {
            background-color: var(--table-bg);
            border-radius: 10px;
            overflow: hidden;
        }

        .dataTables_info,
        .dataTables_length select {
            color: var(--bs-body-color) !important;
        }

        .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .page-link {
            color: var(--primary);
        }

        .theme-toggle {
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 15px;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }

            .stats-card {
                margin-bottom: 15px;
            }
        }



        /* //! Success Modal Properties */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 5000;
            transition: all 0.3s ease;
        }

        .modal-container {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffc107 100%);
            padding: 25px;
            position: relative;
            text-align: center;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .icon-circle i {
            color: #ff6b6b;
            font-size: 36px;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .close-modal:hover {
            transform: scale(1.2);
        }

        .modal-body {
            padding: 30px;
            text-align: center;
        }

        .modal-body h2 {
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .modal-body p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .details {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: left;
        }

        .details p {
            display: flex;
            align-items: center;
            margin: 10px 0;
            color: #555;
        }

        .details i {
            margin-right: 10px;
            color: #ff6b6b;
            width: 20px;
            text-align: center;
        }

        .modal-footer {
            padding: 0 30px 30px;
            text-align: center;
        }

        .btn-confirm {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffc107 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(110, 72, 170, 0.3);
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(110, 72, 170, 0.4);
        }
    </style>
</head>

<body class="admin-dashboard" data-bs-theme="light">
    <?php if (isset($_SESSION["error"])) { ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION["error"];
            unset($_SESSION["error"]); ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION["success"])) { ?>
        <!-- //! Success Modal -->
        <div class="modal-overlay active" id="successModal">
            <div class="modal-container">
                <div class="modal-header">
                    <div class="icon-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <button class="close-modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Attendance Recorded!</h2>
                    <p><?php echo $_SESSION["success"]; ?></p>
                    <div class="details">
                        <p><i class="far fa-calendar-alt"></i> <span id="attendance-date">Today <?php date_default_timezone_set("Asia/Kolkata");
                                                                                                echo date("M d, Y", strtotime("today")); ?></span></p>
                        <p><i class="far fa-clock"></i> <span id="attendance-time"><?php echo date("H:i A"); ?></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-confirm">Got It!</button>
                </div>
            </div>
        </div>
    <?php unset($_SESSION["success"]);
    } ?>



    <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>
    <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

    <main class="container-fluid attendance-container">
        <?php
        $sel = $conn->prepare("SELECT * FROM attendance JOIN member ON member.email=attendance.email");
        $sel->execute();
        $sel = $sel->fetchAll();

        $present = 0;
        $absent = 0;
        $late = 0;
        $lastYear = ((int)date("Y", strtotime($sel[0]["date"])));
        foreach ($sel as $r) {

            if (date('Y-m-d', strtotime($r["date"])) === date('Y-m-d', strtotime("today"))) {
                ($r["attendance_status"] == "Present") ? $present++ : (($r["attendance_status"] == "Absent") ? $absent++ : $late++);
            }
            if (((int)date("Y", strtotime($r["date"]))) < $lastYear) {
                $lastYear = ((int)date("Y", strtotime($r["date"])));
            }
        }
        ?>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-card" id="presentStats">
                    <i class="fas fa-check-circle"></i>
                    <h3 id="presentCount"><?php echo $present; ?></h3>
                    <p>Present Today</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card" id="absentStats">
                    <i class="fas fa-times-circle"></i>
                    <h3 id="absentCount"><?php echo $absent; ?></h3>
                    <p>Absent Today</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card" id="lateStats">
                    <i class="fas fa-clock"></i>
                    <h3 id="lateCount"><?php echo $late; ?></h3>
                    <p>Late Arrivals</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">

                <div class="row">
                    <!-- //! Check-in Form -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user-clock me-2"></i>Record Attendance</span>
                            <button class="btn btn-sm btn-outline-primary" id="quickCheckinBtn">
                                <i class="fas fa-bolt me-1"></i> Quick Check-in
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="doAttendance.php" method="post" id="attendanceForm">
                                <div class="mb-3">
                                    <label for="memberEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Member Email" required />
                                </div>
                                <div class="mb-3">
                                    <label for="sessionDuration" class="form-label">Session Duration</label>
                                    <input type="number" class="form-control" name="session_duration" id="sessionDuration" placeholder="0 minutes" required />
                                </div>
                                <div class="mb-3">
                                    <label for="attendanceStatus" class="form-label">Status</label>
                                    <select class="form-select" name="attendance_status" id="attendanceStatus" required>
                                        <option disabled selected>Select Status</option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                        <option value="Late">Late</option>
                                    </select>
                                    <div class="invalid-feedback">Please select attendance status</div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        <i class="fas fa-save me-1"></i> Save Attendance
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" id="resetForm">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- //! Check-Out Form -->
                <div class="row">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user-clock me-2"></i>Check Out Here</span>
                        </div>
                        <div class="card-body">
                            <form action="checkOut.php" method="post">
                                <div class="mb-3">
                                    <label for="memberEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Member Email" required />
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        <i class="fas fa-save me-1"></i> Check Out Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="row py-4 px-5 align-items-center">
                        <div class="col-md-6">
                            <span><i class="fas fa-history me-2"></i>Attendance Records</span>
                        </div>
                        <form action="<?php echo HTTP_PATH . "/user_panel/membership/PDF/genAdAttendance.php"; ?>" method="post" class="col-md-6">
                            <select name="year" class="form-select my-2">
                                <option disabled selected>Select Year</option>
                                <?php for ($i = ((int)date("Y", strtotime("today"))); $i >= $lastYear; $i--) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>

                            <select name="month" class="form-select my-2">
                                <option disabled selected>Select Month</option>
                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>

                            <button class="btn btn-sm btn-outline-primary my-2" id="exportPDF">
                                <i class="fas fa-file-pdf me-1"></i> PDF
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dateRangeFilter" class="form-label">Date Range</label>
                                <input type="text" class="form-control" id="dateRangeFilter" placeholder="Select date range">
                            </div>
                            <div class="col-md-6">
                                <label for="statusFilter" class="form-label">Status Filter</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Late">Late</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="attendanceTable" class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sel as $r) { ?>
                                        <tr class="<?php echo date("Y-m-d", strtotime($r["date"])); ?>" data-date="<?php echo date("Y-m-d", strtotime($r["date"])); ?>">
                                            <td><?php echo $r["attendance_id"]; ?></td>
                                            <td><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></td>
                                            <td><?php echo $r["email"]; ?></td>
                                            <td><?php echo $r["date"]; ?></td>
                                            <td><?php echo $r["check_in_time"]; ?></td>
                                            <td><?php echo $r["check_out_time"]; ?></td>
                                            <td><?php echo $r["session_duration"]; ?></td>
                                            <td><?php echo $r["attendance_status"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <script>
        $(document).ready(function() {
            // Close modal when clicking X, overlay, or confirm button
            $('.close-modal, .modal-overlay, .btn-confirm').click(function() {
                $('#successModal').fadeOut(100);
            });

            // Prevent modal from closing when clicking inside the container
            $('.modal-container').click(function(e) {
                e.stopPropagation();
            });

            $(".alert").fadeOut(10000);


            $("body").hover(function() {
                $(".sidebar").css("transition", "1s all ease");
                $(".sidebar").css("margin-left", "-100%");
            });
            $("body").click(function() {
                $(".sidebar").css("transition", "1s all ease");
                $(".sidebar").css("margin-left", "-100%");
            });
            // Theme toggle functionality
            const themeToggle = $('#themeToggle');
            const body = $('body');
            const currentTheme = localStorage.getItem('theme') || 'light';

            body.attr('data-bs-theme', currentTheme);
            updateThemeIcon(currentTheme);

            themeToggle.on('click', function() {
                const newTheme = body.attr('data-bs-theme') === 'light' ? 'dark' : 'light';
                body.attr('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeIcon(newTheme);
            });

            function updateThemeIcon(theme) {
                themeToggle.find('i').removeClass('fa-moon fa-sun').addClass(theme === 'light' ? 'fa-moon' : 'fa-sun');
            }

            // Initialize date pickers
            flatpickr("#dateRangeFilter", {
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: [new Date(), new Date()]
            });

            // Initialize DataTable
            const attendanceTable = $('#attendanceTable').DataTable();

            // Filter by date range
            $('#dateRangeFilter').on('change', function() {
                const dates = $(this).val().split(' to ');
                if (dates.length === 2) {
                    $("tbody tr").hide();

                    $("tbody tr").each(function() {
                        if ($(this).data("date") >= dates[0] && $(this).data("date") <= dates[1]) {
                            $(this).show();
                        }
                    });
                }
            });

            // Filter by status
            $('#statusFilter').on('change', function() {
                attendanceTable.column(7).search(this.value).draw();
            });

            // Quick check-in button
            $('#quickCheckinBtn').on('click', function() {
                $('#attendanceStatus').val('Present');
                let now = new Date();
                $('#sessionDuration').val(60);

                // Focus on member ID field
                $('#email').focus();
            });

            // Reset form
            $('#resetForm').on('click', function() {
                $('#email').val("");
                $('#attendanceForm').find('.is-invalid').removeClass('is-invalid');
                $('#sessionDuration').val(0);
                $("#attendanceStatus").val("Select Status");
            });
        });
    </script>
</body>

</html>