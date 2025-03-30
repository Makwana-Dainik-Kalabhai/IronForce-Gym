<?php
require("C:/xampp/htdocs/php/IronForce-Gym/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance | INVIGOR FITNESS STUDIO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
</head>

<style>
    :root {
        --primary-color: #4a6bff;
        --secondary-color: #ff6b6b;
        --accent-color: #6bffb4;
        --text-color: #333;
        --text-light: #777;
        --bg-color: #f8f9fa;
        --card-bg: #ffffff;
        --border-color: #e0e0e0;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    [data-theme="dark"] {
        --primary-color: #5d7aff;
        --secondary-color: #ff7b7b;
        --accent-color: #7bffc4;
        --text-color: #f0f0f0;
        --text-light: #b0b0b0;
        --bg-color: #121212;
        --card-bg: #1e1e1e;
        --border-color: #333;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #111111;
        color: var(--text-color);
        transition: var(--transition);
        line-height: 1.6;
    }

    .blog-container {
        margin: 12rem auto 2rem auto;
        padding: 0 20px;
    }

    /* Welcome Section */
    .welcome-section {
        margin: 30px 0;
    }

    .welcome-card {
        background: linear-gradient(135deg, var(--primary-color), #6a5acd);
        color: white;
        padding: 30px;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: var(--shadow);
        animation: fadeIn 0.5s ease;
    }

    .welcome-text h1 {
        color: white;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    h2 {
        color: white !important;
    }

    .welcome-text .highlight {
        color: var(--accent-color);
        font-weight: 700;
    }

    .welcome-text p {
        font-size: 1rem;
        opacity: 0.9;
    }

    .profile-pic img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
    }

    /* Stats Section */
    .stats-section {
        margin: 30px 0;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .stat-card {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgba(74, 107, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 1.5rem;
    }

    .stat-info h3 {
        font-size: 1.8rem;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .trend {
        font-size: 0.8rem;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .trend.up {
        color: #4caf50;
    }

    .trend.down {
        color: #f44336;
    }

    /* Calendar Section */
    .calendar-section {
        margin: 40px 0;
    }

    .section-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: var(--text-color);
        position: relative;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }

    #attendance-calendar {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
    }

    /* Records Section */
    .records-section {
        margin: 40px 0;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 10px 15px 10px 35px;
        border-radius: 25px;
        border: 1px solid var(--border-color);
        background-color: var(--card-bg);
        color: var(--text-color);
        width: 200px;
        transition: var(--transition);
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-color);
        width: 250px;
    }

    .search-box i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #3a5bef;
        transform: translateY(-2px);
    }

    .date-range-picker {
        background-color: var(--card-bg);
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .date-inputs {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .date-input {
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid var(--border-color);
        background-color: var(--card-bg);
        color: var(--text-color);
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: var(--shadow);
        background-color: var(--card-bg);
    }

    #attendance-table {
        width: 100%;
        border-collapse: collapse;
    }

    #attendance-table th,
    #attendance-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
    }

    #attendance-table th {
        background-color: rgba(74, 107, 255, 0.1);
        color: var(--primary-color);
        font-weight: 600;
        cursor: pointer;
        user-select: none;
    }

    #attendance-table th i {
        margin-left: 5px;
        font-size: 0.8rem;
    }

    #attendance-table tr:hover {
        background-color: rgba(74, 107, 255, 0.05);
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        gap: 5px;
    }

    .btn-pagination {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background-color: var(--card-bg);
        color: var(--text-color);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-pagination:hover:not(:disabled) {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-pagination.active {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-pagination:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Charts Section */
    .charts-section {
        margin: 40px 0;
    }

    .chart-container {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        height: 400px;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .welcome-card {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .actions {
            width: 100%;
            justify-content: space-between;
        }

        .search-box input {
            width: 100%;
        }

        .date-range-picker {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 480px) {
        .user-controls {
            width: 100%;
            justify-content: space-between;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<body>
    <div class="blog-container container">

        <?php
        include(DRIVE_PATH . "../database.php");

        $total_days_prev_month = 0;
        $total_days_month = 0;

        // Total Attended Days in Previous Month
        $sel = $conn->prepare("SELECT COUNT(date) AS total_days_prev_month FROM attendance WHERE email='" . $_SESSION["email"] . "' AND MONTH(date)=MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)");
        $sel->execute();
        $sel = $sel->fetchAll();
        $sel = $sel[0]["total_days_prev_month"];

        $total_days_prev_month = $sel;

        // Total Attended Days in this Month
        $sel = $conn->prepare("SELECT COUNT(date) AS total_days_month FROM attendance WHERE email='" . $_SESSION["email"] . "' AND MONTH(date)=MONTH(CURRENT_DATE())");
        $sel->execute();
        $sel = $sel->fetchAll();
        $sel = $sel[0]["total_days_month"];

        $total_days_month = $sel;



        $sel = $conn->prepare("SELECT COUNT(*) AS total, member.*, attendance.* FROM member JOIN attendance ON member.email=attendance.email WHERE member.email='" . $_SESSION["email"] . "'");
        $sel->execute();
        $sel = $sel->fetchAll();

        $streak = 1;
        foreach ($sel as $r) {
            ($prev == ((int)(date("d", strtotime($r["date"]))) - 1)) ?
                $streak++ : $streak = 0;
            $prev = (int)(date("d", strtotime($r["date"])));
        }

        $sel = $conn->prepare("SELECT COUNT(*) AS total, member.*, attendance.* FROM member JOIN attendance ON member.email=attendance.email WHERE member.email='" . $_SESSION["email"] . "'");
        $sel->execute();
        $sel = $sel->fetchAll();
        foreach ($sel as $r) {
        ?>
            <!-- Main Content -->
            <main class="main-content">
                <!-- Welcome Section -->
                <section class="welcome-section">
                    <div class="welcome-card">
                        <div class="welcome-text">
                            <h1>Welcome back, <span class="highlight"><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></span>!</h1>
                            <p><?php echo ($r["total"] > 10) ? "You're crushing your fitness goals. Keep it up!" : ""; ?></p>
                        </div>
                        <div class="profile-pic">
                            <img src="<?php echo HTTP_PATH . "/img/profile/" . ($r["img"] != null) ? $r["img"] : "avtar.png"; ?>" alt="Profile Picture">
                        </div>
                    </div>
                </section>

                <!-- Stats Cards -->
                <section class="stats-section">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-info">
                                <h3><?php echo $total_days_month;
                                    ?></h3>
                                <p>This Month</p>
                                <span class="trend up"><i class="fas fa-arrow-up"></i><?php echo (($total_days_month - $total_days_prev_month) > 0) ? ($total_days_month - $total_days_prev_month) . " more than last month" : abs($total_days_prev_month - $total_days_month) . " less than last month"; ?></span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <div class="stat-info">
                                <h3><?php echo $streak; ?></h3>
                                <p>Current Streak</p>
                                <span class="trend up"><i class="fas fa-arrow-up"></i> Keep going!</span>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="stat-info">
                                <h3>3</h3>
                                <p>Achievements</p>
                                <span class="trend">New badge available!</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Calendar Section -->
                <section class="calendar-section">
                    <h2 class="section-title">Your Attendance Calendar</h2>
                    <div id="attendance-calendar"></div>
                </section>

                <!-- Attendance Records -->
                <section class="records-section">
                    <div class="section-header">
                        <h2 class="section-title">Attendance Records</h2>
                        <div class="actions">
                            <div class="search-box">
                                <input type="text" placeholder="Search records..." id="search-records">
                                <i class="fas fa-search"></i>
                            </div>
                            <button id="download-pdf" class="btn-primary">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </button>
                        </div>
                    </div>

                    <div class="date-range-picker" id="date-range-picker" style="display: none;">
                        <div class="date-inputs">
                            <input type="date" id="start-date" class="date-input">
                            <span>to</span>
                            <input type="date" id="end-date" class="date-input">
                        </div>
                        <button id="generate-pdf" class="btn-primary">Generate PDF</button>
                    </div>

                    <div class="table-container">
                        <table id="attendance-table">
                            <thead>
                                <tr>
                                    <th>Date <i class="fas fa-sort"></i></th>
                                    <th>Time <i class="fas fa-sort"></i></th>
                                    <th>Workout Type <i class="fas fa-sort"></i></th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2023-06-15</td>
                                    <td>08:30 AM</td>
                                    <td>Strength Training</td>
                                    <td>1h 15m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-14</td>
                                    <td>07:15 AM</td>
                                    <td>Cardio</td>
                                    <td>45m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-12</td>
                                    <td>06:00 PM</td>
                                    <td>Yoga</td>
                                    <td>1h 30m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-10</td>
                                    <td>09:00 AM</td>
                                    <td>HIIT</td>
                                    <td>50m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-08</td>
                                    <td>05:30 PM</td>
                                    <td>Strength Training</td>
                                    <td>1h 00m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-05</td>
                                    <td>07:00 AM</td>
                                    <td>Cardio</td>
                                    <td>1h 00m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-03</td>
                                    <td>10:00 AM</td>
                                    <td>Pilates</td>
                                    <td>1h 15m</td>
                                </tr>
                                <tr>
                                    <td>2023-06-01</td>
                                    <td>06:30 PM</td>
                                    <td>Strength Training</td>
                                    <td>1h 30m</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination">
                        <button class="btn-pagination" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="btn-pagination active">1</button>
                        <button class="btn-pagination">2</button>
                        <button class="btn-pagination">3</button>
                        <button class="btn-pagination"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </section>

                <!-- Charts Section -->
                <section class="charts-section">
                    <h2 class="section-title">Your Attendance Trends</h2>
                    <div class="chart-container">
                        <canvas id="attendance-chart"></canvas>
                    </div>
                </section>
            </main>

        <?php } ?>
    </div>


    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Theme Toggle
            const themeToggle = $('#theme-toggle');
            const body = $('body');
            const currentTheme = localStorage.getItem('theme') || 'light';

            // Set initial theme
            body.attr('data-theme', currentTheme);
            updateThemeIcon(currentTheme);

            themeToggle.on('click', function() {
                const currentTheme = body.attr('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';

                body.attr('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeIcon(newTheme);
            });

            function updateThemeIcon(theme) {
                const icon = theme === 'light' ? 'fa-moon' : 'fa-sun';
                themeToggle.html(`<i class="fas ${icon}"></i>`);
            }

            // Initialize Calendar
            $('#attendance-calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                editable: false,
                eventLimit: true,
                events: [{
                        title: 'Workout',
                        start: moment().subtract(10, 'days').format('YYYY-MM-DD'),
                        color: '#4a6bff'
                    },
                    {
                        title: 'Workout',
                        start: moment().subtract(8, 'days').format('YYYY-MM-DD'),
                        color: '#4a6bff'
                    },
                    {
                        title: 'Workout',
                        start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
                        color: '#4a6bff'
                    },
                    {
                        title: 'Workout',
                        start: moment().subtract(3, 'days').format('YYYY-MM-DD'),
                        color: '#4a6bff'
                    },
                    {
                        title: 'Workout',
                        start: moment().subtract(1, 'days').format('YYYY-MM-DD'),
                        color: '#4a6bff'
                    },
                    {
                        title: 'Workout',
                        start: moment().format('YYYY-MM-DD'),
                        color: '#4a6bff'
                    }
                ],
                dayRender: function(date, cell) {
                    const today = moment().format('YYYY-MM-DD');
                    const dateStr = date.format('YYYY-MM-DD');

                    if (dateStr === today) {
                        cell.css('background-color', 'rgba(74, 107, 255, 0.1)');
                    }
                }
            });

            // Table Sorting
            let sortDirection = 1;
            $('th').on('click', function() {
                const table = $(this).parents('table').eq(0);
                const rows = table.find('tr:gt(0)').toArray().sort(comparator($(this).index()));

                sortDirection *= -1;

                if (!$(this).hasClass('sorted')) {
                    $('th').removeClass('sorted ascending descending');
                    $(this).addClass('sorted');
                }

                $(this).toggleClass('ascending descending');

                for (let i = 0; i < rows.length; i++) {
                    table.append(rows[i]);
                }
            });

            function comparator(index) {
                return function(a, b) {
                    const valA = getCellValue(a, index);
                    const valB = getCellValue(b, index);

                    if ($.isNumeric(valA) && $.isNumeric(valB)) {
                        return (valA - valB) * sortDirection;
                    } else {
                        return valA.toString().localeCompare(valB) * sortDirection;
                    }
                };
            }

            function getCellValue(row, index) {
                return $(row).children('td').eq(index).text();
            }

            // Search Functionality
            $('#search-records').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('#attendance-table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // PDF Generation
            $('#download-pdf').on('click', function() {
                $('#date-range-picker').slideToggle();
            });

            $('#generate-pdf').on('click', function() {
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();

                if (!startDate || !endDate) {
                    alert('Please select both start and end dates');
                    return;
                }

                generatePDF(startDate, endDate);
            });

            function generatePDF(startDate, endDate) {
                const element = document.createElement('div');
                element.innerHTML = `
            <div style="padding: 20px; font-family: Arial, sans-serif;">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <img src="https://via.placeholder.com/150x50?text=INVIGOR+FITNESS" alt="INVIGOR FITNESS STUDIO" style="height: 40px;">
                    <h1 style="margin-left: 20px; color: #4a6bff;">Attendance Report</h1>
                </div>
                <div style="margin-bottom: 20px;">
                    <p><strong>Member:</strong> John Doe</p>
                    <p><strong>Period:</strong> ${formatDate(startDate)} to ${formatDate(endDate)}</p>
                    <p><strong>Generated on:</strong> ${moment().format('MMMM D, YYYY')}</p>
                </div>
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f5f5f5;">
                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Date</th>
                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Time</th>
                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Workout Type</th>
                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${generateTableRows(startDate, endDate)}
                    </tbody>
                </table>
                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                    <p><strong>Total Sessions:</strong> ${calculateTotalSessions(startDate, endDate)}</p>
                    <p style="font-style: italic;">Thank you for being a valued member of INVIGOR FITNESS STUDIO!</p>
                </div>
            </div>
        `;

                const opt = {
                    margin: 10,
                    filename: `INVIGOR_Attendance_${moment().format('YYYYMMDD')}.pdf`,
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                html2pdf().from(element).set(opt).save();
            }

            function formatDate(dateStr) {
                return moment(dateStr).format('MMMM D, YYYY');
            }

            function generateTableRows(startDate, endDate) {
                // In a real app, this would filter the actual data
                // For demo, we're using the static table data
                let rows = '';
                $('#attendance-table tbody tr').each(function() {
                    const date = $(this).find('td').eq(0).text();
                    if (date >= startDate && date <= endDate) {
                        rows += `
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;">${formatDate(date)}</td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${$(this).find('td').eq(1).text()}</td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${$(this).find('td').eq(2).text()}</td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${$(this).find('td').eq(3).text()}</td>
                    </tr>
                `;
                    }
                });
                return rows || '<tr><td colspan="4" style="padding: 8px; border: 1px solid #ddd; text-align: center;">No attendance records for this period</td></tr>';
            }

            function calculateTotalSessions(startDate, endDate) {
                let count = 0;
                $('#attendance-table tbody tr').each(function() {
                    const date = $(this).find('td').eq(0).text();
                    if (date >= startDate && date <= endDate) {
                        count++;
                    }
                });
                return count;
            }

            // Initialize Chart
            const ctx = document.getElementById('attendance-chart').getContext('2d');
            const attendanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Workout Sessions',
                        data: [8, 10, 12, 9, 11, 12, 10, 13, 11, 14, 12, 15],
                        backgroundColor: 'rgba(74, 107, 255, 0.7)',
                        borderColor: 'rgba(74, 107, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 2
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.parsed.y} session${context.parsed.y !== 1 ? 's' : ''}`;
                                }
                            }
                        }
                    }
                }
            });

            // Set default dates for date picker
            const today = moment().format('YYYY-MM-DD');
            const firstDayOfMonth = moment().startOf('month').format('YYYY-MM-DD');
            $('#start-date').val(firstDayOfMonth);
            $('#end-date').val(today);
        });
    </script>
</body>

</html>