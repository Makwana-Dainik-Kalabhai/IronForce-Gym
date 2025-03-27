<?php
require("C:/xampp/htdocs/php/IronForce-Gym/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Blogs</title>
</head>
<style>
    /* Base Styles & Variables */
    :root {
        --black: #121212;
        --dark-gray: #1e1e1e;
        --teal: #f36100;
        --purple: #9d4edd;
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--black);
        color: white;
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* Typography */
    .blogs h1,
    .blogs h2,
    .blogs h3,
    .blogs h4 {
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1rem;
    }

    .blogs h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        background: linear-gradient(90deg, var(--teal), var(--purple));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .blogs h2 {
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        color: var(--teal);
    }

    .blogs h3 {
        font-size: 1.5rem;
        color: white;
    }

    .blogs p {
        margin-bottom: 1rem;
        font-weight: 300;
    }

    .blogs a {
        text-decoration: none;
        color: inherit;
    }

    /* Layout Components */
    .blogs .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .blogs .btn {
        display: inline-block;
        padding: 12px 30px;
        background: white;
        color: var(--black);
        border: none;
        border-radius: 30px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
    }

    .blogs .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
    }

    .blogs .btn-secondary {
        background: transparent;
        color: var(--teal);
        border: 2px solid var(--teal);
        box-shadow: none;
    }

    .blogs .btn-secondary:hover {
        background: var(--teal);
        color: var(--black);
    }

    /* Hero Section */
    .blogs .hero {
        height: 100vh;
        display: flex;
        align-items: center;
        padding-top: 80px;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
    }

    .blogs .hero-content {
        max-width: 600px;
    }

    .blogs .hero p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .blogs .hero-btns {
        display: flex;
        gap: 20px;
    }

    /* Blog Section */
    .blogs .blog-section {
        padding: 100px 0;
        background-color: var(--dark-gray);
    }

    .blogs .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .blogs .section-header p {
        max-width: 700px;
        margin: 0 auto;
    }

    .blogs .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }

    .blogs .blog-card {
        background-color: var(--black);
        border-radius: 10px;
        overflow: hidden;
        transition: var(--transition);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .blogs .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .blogs .blog-img {
        height: 200px;
        overflow: hidden;
    }

    .blogs .blog-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .blogs .blog-card:hover .blog-img img {
        transform: scale(1.1);
    }

    .blogs .blog-content {
        padding: 20px;
    }

    .blogs .blog-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .blogs .blog-category {
        display: inline-block;
        padding: 3px 10px;
        background: var(--purple);
        color: white;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .blogs .read-more {
        display: inline-block;
        margin-top: 15px;
        color: var(--teal);
        font-weight: 600;
        transition: var(--transition);
    }

    .blogs .read-more:hover {
        color: white;
    }

    /* Search & Filter */
    .blogs .search-filter {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .blogs .search-box {
        flex: 1;
        min-width: 250px;
        position: relative;
    }

    .blogs .search-box input {
        width: 100%;
        padding: 12px 20px;
        padding-left: 45px;
        background-color: var(--black);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        color: white;
        font-family: inherit;
        transition: var(--transition);
    }

    .blogs .search-box input:focus {
        outline: none;
        border-color: var(--teal);
    }

    .blogs .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--teal);
    }

    .blogs .filter-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .blogs .filter-btn {
        padding: 8px 15px;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        color: white;
        cursor: pointer;
        transition: var(--transition);
    }

    .blogs .filter-btn:hover,
    .blogs .filter-btn.active {
        background: var(--teal);
        color: var(--black);
        border-color: var(--teal);
    }

    /* Load More Button */
    .blogs .load-more {
        text-align: center;
        margin-top: 50px;
    }

    /* Loading State */
    .blogs .loading {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px;
    }

    .blogs .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        border-top-color: var(--teal);
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .blogs .hero-btns {
            flex-direction: column;
            gap: 15px;
        }

        .blogs .btn {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 768px) {
        .blogs .blog-grid {
            grid-template-columns: 1fr;
        }

        .blogs .search-filter {
            flex-direction: column;
        }

        .blogs .search-box,
        .blogs .filter-buttons {
            width: 100%;
        }

        .blogs .filter-buttons {
            justify-content: center;
        }
    }
</style>

<body>

    <div class="blogs">
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Transform Your Body, Elevate Your Mind</h1>
                    <p>Discover the latest fitness tips, workout routines, and nutrition advice from top experts in the industry. Your journey to a healthier life starts here.</p>
                    <div class="hero-btns">
                        <a href="#blogs" class="btn">Explore Blogs</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="blog-section" id="blogs">
            <div class="container">
                <div class="section-header">
                    <h2>Latest Fitness Blogs</h2>
                    <p>Stay updated with the newest trends, research, and techniques in fitness and health.</p>
                </div>

                <!-- Search and Filter -->
                <div class="search-filter">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search-input" placeholder="Search blogs...">
                    </div>
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-category="all">All</button>
                        <button class="filter-btn" data-category="training">Training</button>
                        <button class="filter-btn" data-category="nutrition">Nutrition</button>
                        <button class="filter-btn" data-category="lifestyle">Lifestyle</button>
                        <button class="filter-btn" data-category="recovery">Recovery</button>
                    </div>
                </div>

                <!-- Blog Grid -->
                <div id="blog-container">
                    <div class="loading">
                        <div class="spinner"></div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="load-more">
                    <button id="load-more-btn" class="btn">Load More</button>
                </div>
            </div>
        </section>
    </div>

    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>

    <script>
        $(document).ready(function() {

            // Smooth Scrolling
            $('a[href*="#"]').on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                        scrollTop: $($(this).attr('href')).offset().top - 80,
                    },
                    500,
                    'linear'
                );
            });

            const API_URL = 'https://jsonplaceholder.typicode.com/posts';

            // Current page for pagination
            let currentPage = 1;
            const postsPerPage = 6;
            let allBlogs = [];
            let filteredBlogs = [];

            // Fetch blogs from API
            function fetchBlogs() {
                $('#blog-container').html('<div class="loading"><div class="spinner"></div></div>');

                const mockBlogs = {
                    blogs: [{
                            id: 1,
                            title: "10 Best Exercises for Muscle Growth",
                            excerpt: "Discover the most effective exercises for building muscle mass and increasing strength. These compound movements will help you maximize your gains.",
                            image: "https://images.unsplash.com/photo-1534258936925-c58bed479fcb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1631&q=80",
                            author: "Coach Mike",
                            date: "2023-11-15",
                            category: "training"
                        },
                        {
                            id: 2,
                            title: "The Ultimate Pre-Workout Nutrition Guide",
                            excerpt: "Learn what to eat before your workout to maximize performance and energy levels. Timing and macronutrient balance are key factors.",
                            image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80",
                            author: "Nutritionist Sarah",
                            date: "2023-11-10",
                            category: "nutrition"
                        },
                        {
                            id: 3,
                            title: "5 Recovery Techniques for Athletes",
                            excerpt: "Proper recovery is just as important as training itself. Explore these science-backed methods to enhance your recovery.",
                            image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80",
                            author: "Dr. Emily",
                            date: "2023-11-05",
                            category: "recovery"
                        },
                        {
                            id: 4,
                            title: "Building a Home Gym on a Budget",
                            excerpt: "You don't need expensive equipment to get a great workout. Here's how to set up an effective home gym without breaking the bank.",
                            image: "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1075&q=80",
                            author: "Trainer James",
                            date: "2023-10-28",
                            category: "training"
                        },
                        {
                            id: 5,
                            title: "Meal Prep for Busy Fitness Enthusiasts",
                            excerpt: "Save time and stay on track with your nutrition goals with these simple meal prep strategies for busy schedules.",
                            image: "https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=853&q=80",
                            author: "Chef Mark",
                            date: "2023-10-22",
                            category: "nutrition"
                        },
                        {
                            id: 6,
                            title: "The Importance of Sleep for Muscle Growth",
                            excerpt: "Discover how quality sleep impacts your fitness results and learn strategies to improve your sleep for better recovery and performance.",
                            image: "https://images.unsplash.com/photo-1531042815548-e4f8a5d0d6a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
                            author: "Sleep Specialist Lisa",
                            date: "2023-10-15",
                            category: "lifestyle"
                        },
                        {
                            id: 7,
                            title: "HIIT vs LISS: Which Cardio is Better?",
                            excerpt: "Compare high-intensity interval training with low-intensity steady state cardio to determine which is best for your fitness goals.",
                            image: "https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
                            author: "Cardio Expert Tom",
                            date: "2023-10-08",
                            category: "training"
                        },
                        {
                            id: 8,
                            title: "Plant-Based Protein Sources for Athletes",
                            excerpt: "Explore the best plant-based protein options to support muscle growth and recovery for vegetarian and vegan athletes.",
                            image: "https://images.unsplash.com/photo-1546069901-d5bfd2cbfb1f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80",
                            author: "Nutritionist Sarah",
                            date: "2023-10-01",
                            category: "nutrition"
                        },
                        {
                            id: 9,
                            title: "Mental Toughness for Fitness Success",
                            excerpt: "Develop the psychological resilience needed to push through plateaus and stay consistent with your fitness journey.",
                            image: "https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80",
                            author: "Sports Psychologist Dr. Chen",
                            date: "2023-09-24",
                            category: "lifestyle"
                        }
                    ]
                };

                // Simulate API delay
                setTimeout(function() {
                    allBlogs = mockBlogs.blogs;
                    filteredBlogs = [...allBlogs];
                    displayBlogs();
                }, 800);
            }

            // Display blogs with pagination
            function displayBlogs() {
                const startIndex = (currentPage - 1) * postsPerPage;
                const endIndex = startIndex + postsPerPage;
                const blogsToShow = filteredBlogs.slice(0, endIndex);

                if (blogsToShow.length === 0) {
                    $('#blog-container').html('<p class="no-results">No blogs found matching your criteria.</p>');
                } else {
                    let html = '<div class="blog-grid">';

                    blogsToShow.forEach(blog => {
                        html += `
                            <div class="blog-card" data-category="${blog.category}">
                                <div class="blog-img">
                                    <img src="${blog.image}" alt="${blog.title}">
                                </div>
                                <div class="blog-content">
                                    <span class="blog-category">${blog.category}</span>
                                    <h3>${blog.title}</h3>
                                    <div class="blog-meta">
                                        <span><i class="fas fa-user"></i> ${blog.author}</span>
                                        <span><i class="fas fa-calendar-alt"></i> ${blog.date}</span>
                                    </div>
                                    <p>${blog.excerpt}</p>
                                    <a href="./blog-details.php?id=${blog.id}" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        `;
                    });

                    html += '</div>';
                    $('#blog-container').html(html);
                }

                // Show/hide load more button
                if (endIndex >= filteredBlogs.length) {
                    $('#load-more-btn').hide();
                } else {
                    $('#load-more-btn').show();
                }
            }

            // Filter blogs by category
            $('.filter-btn').click(function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');

                const category = $(this).data('category');
                currentPage = 1;

                if (category === 'all') {
                    filteredBlogs = [...allBlogs];
                } else {
                    filteredBlogs = allBlogs.filter(blog => blog.category === category);
                }

                displayBlogs();
            });

            // Search blogs
            $('#search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                currentPage = 1;

                if (searchTerm === '') {
                    filteredBlogs = [...allBlogs];
                } else {
                    filteredBlogs = allBlogs.filter(blog =>
                        blog.title.toLowerCase().includes(searchTerm) ||
                        blog.excerpt.toLowerCase().includes(searchTerm) ||
                        blog.author.toLowerCase().includes(searchTerm)
                    );
                }

                displayBlogs();
            });

            // Load more blogs
            $('#load-more-btn').click(function() {
                currentPage++;
                displayBlogs();
            });

            // Newsletter form submission
            $('#newsletter-form').submit(function(e) {
                e.preventDefault();
                const email = $('#newsletter-email').val().trim();
                const message = $('.form-message');

                // Simple validation
                if (email === '') {
                    message.text('Please enter your email address.').addClass('error').removeClass('success');
                    return;
                }

                if (!isValidEmail(email)) {
                    message.text('Please enter a valid email address.').addClass('error').removeClass('success');
                    return;
                }

                // Simulate API call
                message.html('<i class="fas fa-spinner fa-spin"></i> Subscribing...').removeClass('error').removeClass('success');

                setTimeout(function() {
                    message.text('Thank you for subscribing!').addClass('success').removeClass('error');
                    $('#newsletter-email').val('');

                    // Reset after 3 seconds
                    setTimeout(function() {
                        message.text('').removeClass('success');
                    }, 3000);
                }, 1500);
            });

            // Email validation helper
            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            // Initial fetch
            fetchBlogs();
        });
    </script>
</body>

</html>