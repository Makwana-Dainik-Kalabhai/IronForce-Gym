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
    <title>IronForce Gym - Member Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f36100;
            --primary-light: rgba(243, 97, 0, 0.1);
            --dark: #111111;
            --dark-light: #444;
            --light: #f2f2f2;
            --general: #4CAF50;
            --complaint: #F44336;
            --suggestion: #2196F3;
            --card-bg: #ffffff;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            background-color: #111111;
        }

        .feedback-container {
            padding: 12rem 0 2rem 0;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .subtitle {
            color: var(--dark-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .filters-container {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-btn {
            padding: 10px 20px;
            background: var(--card-bg);
            border: 1px solid #ddd;
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-btn:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .filter-btn i {
            font-size: 0.9rem;
        }

        .feedback-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .feedback-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            border-top: 4px solid var(--primary);
            position: relative;
            overflow: hidden;
        }

        .feedback-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .feedback-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary);
        }

        .feedback-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-email {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.95rem;
        }

        .feedback-type {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-general {
            background: var(--general);
        }

        .type-complaint {
            background: var(--complaint);
        }

        .type-suggestion {
            background: var(--suggestion);
        }

        .service-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .service-desc {
            font-size: 0.85rem;
            color: var(--dark-light);
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .stars {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.1rem;
            letter-spacing: 2px;
        }

        .feedback-message {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--dark);
            position: relative;
            padding-left: 15px;
            border-left: 3px solid var(--primary-light);
        }

        .feedback-date {
            display: block;
            font-size: 0.75rem;
            color: #999;
            margin-top: 15px;
            text-align: right;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px 20px;
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .empty-state p {
            color: var(--dark-light);
            max-width: 500px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .feedback-grid {
                grid-template-columns: 1fr;
            }

            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="feedback-container container">
        <div class="filters-container">
            <div class="filters">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-comments"></i> All Feedback
                </button>
                <button class="filter-btn" data-filter="general">
                    <i class="fas fa-thumbs-up"></i> General
                </button>
                <button class="filter-btn" data-filter="complaint">
                    <i class="fas fa-exclamation-triangle"></i> Complaints
                </button>
                <button class="filter-btn" data-filter="suggestion">
                    <i class="fas fa-lightbulb"></i> Suggestions
                </button>
            </div>
        </div>

        <div class="feedback-grid">
            <?php
            include(DRIVE_PATH . "/database.php");

            $sel = $conn->prepare("SELECT * FROM feedback JOIN service ON service.service_id=feedback.service_id");
            $sel->execute();
            $sel = $sel->fetchAll();

            foreach ($sel as $r) {
            ?>
                <div class="feedback-card <?php echo $r["feedback_type"]; ?>" data-type="<?php echo $r["feedback_type"]; ?>">
                    <div class="feedback-header">
                        <span class="user-email"><?php echo $r["email"]; ?></span>
                        <span class="feedback-type type-<?php echo $r["feedback_type"]; ?>">
                            <i class="fas <?php echo ($r["feedback_type"] === "General") ? 'fa-thumbs-up' : (($r["feedback_type"] === "Complaint") ? "fa-exclamation-triangle" : "fa-lightbulb"); ?>"></i> <?php echo $r["feedback_type"]; ?>
                        </span>
                    </div>
                    <h3 class="service-name"><?php echo $r["name"]; ?></h3>
                    <p class="service-desc"><?php echo $r["description"]; ?></p>
                    <div class="stars" title="<?php echo $r["rating"]; ?></div> out of 5 stars"><?php echo str_repeat("★", $r["rating"]) . str_repeat("☆", 5 - $r["rating"]); ?></div>
                    <p class="feedback-message">"<?php echo $r["comments"]; ?>"</p>
                    <span class="feedback-date"><?php echo date("d/m/Y h:i A", strtotime($r["created_at"])); ?></span>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Sample feedback data with dates
            const feedbackData = [{
                    email: "john.doe@example.com",
                    service: "Personal Training",
                    description: "One-on-one customized training sessions with certified trainers",
                    rating: 5,
                    message: "My trainer Mike is amazing! He's helped me achieve my fitness goals faster than I expected. The personalized attention and workout plans have transformed my physique in just 3 months.",
                    type: "general",
                    date: "2023-06-15"
                },
                {
                    email: "sarah.smith@example.com",
                    service: "Group Classes",
                    description: "High-energy group fitness sessions including HIIT, Cardio, and more",
                    rating: 4,
                    message: "The group energy is fantastic and keeps me motivated. However, the 6pm HIIT class often gets overcrowded - maybe consider adding more sessions at this popular time?",
                    type: "suggestion",
                    date: "2023-06-10"
                },
                {
                    email: "mike.johnson@example.com",
                    service: "Locker Room",
                    description: "Member locker and shower facilities",
                    rating: 2,
                    message: "The lockers need better maintenance. My locker door was broken last week and it took 3 days to get fixed. Also, the showers could use more frequent cleaning during peak hours.",
                    type: "complaint",
                    date: "2023-06-05"
                },
                {
                    email: "lisa.wang@example.com",
                    service: "Nutrition Counseling",
                    description: "Personalized diet and nutrition planning services",
                    rating: 5,
                    message: "The nutritionist gave me a perfect meal plan that fits my lifestyle and goals! I've already seen improvements in my energy levels and body composition in just 4 weeks.",
                    type: "general",
                    date: "2023-05-28"
                },
                {
                    email: "david.brown@example.com",
                    service: "Swimming Pool",
                    description: "Olympic-sized swimming pool with lap lanes",
                    rating: 3,
                    message: "The pool itself is great but the water temperature fluctuates too much. Also, please enforce the lane etiquette rules more strictly - too many people swimming in wrong lanes.",
                    type: "complaint",
                    date: "2023-05-20"
                },
                {
                    email: "emily.garcia@example.com",
                    service: "Yoga Classes",
                    description: "Beginner to advanced yoga sessions for all levels",
                    rating: 4,
                    message: "The yoga instructors are excellent! Would love to see more evening yoga classes added to the schedule, especially restorative yoga options after work hours.",
                    type: "suggestion",
                    date: "2023-05-15"
                },
                {
                    email: "robert.lee@example.com",
                    service: "Weightlifting Area",
                    description: "Dedicated space with free weights and strength equipment",
                    rating: 5,
                    message: "Best weightlifting setup in town! Plenty of racks, platforms, and quality equipment. Never have to wait long even during peak hours. The staff keeps everything well-maintained.",
                    type: "general",
                    date: "2023-05-10"
                }
            ];

            // Format date to readable format
            function formatDate(dateString) {
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString('en-US', options);
            }

            // Generate feedback cards
            function generateFeedbackCards(filter = "all") {

                const filteredData = filter === "all" ?
                    feedbackData :
                    feedbackData.filter(item => item.type === filter);

                if (filteredData.length === 0) {
                    const emptyState = `
                        <div class="empty-state">
                            <i class="fas fa-comment-slash"></i>
                            <h3>No ${filter === "all" ? '' : filter + ' '}Feedback Found</h3>
                            <p>There are currently no ${filter === "all" ? '' : filter + ' '}feedback submissions to display.</p>
                        </div>
                    `;
                    $('.feedback-grid').append(emptyState);
                    return;
                }
            }

            // Initial load
            generateFeedbackCards();

            // Filter buttons click handler
            $('.filter-btn').click(function() {
                $(".feedback-card").hide();
                ($(this).data('filter') != "all") ? $(`.${$(this).data('filter')}`).show(): $(".feedback-card").show();

                $('.filter-btn').removeClass('active');
                $(this).addClass('active');

                const filter = $(this).data('filter');
                generateFeedbackCards(filter);

                // Smooth scroll to top of grid
                $('html, body').animate({
                    scrollTop: $('.feedback-grid').offset().top - 20
                }, 300);
            });
        });
    </script>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>
</body>

</html>