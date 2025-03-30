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
    <title>Blog Details</title>
</head>

<style>
    /* Global Styles */
:root {
    --primary: #ff6b6b;
    --secondary: #4ecdc4;
    --dark: #2d3436;
    --light: #f5f6fa;
    --gray: #dfe6e9;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--light);
    color: var(--dark);
    line-height: 1.6;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Header Styles */
.blog-header {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    padding: 60px 0 40px;
    text-align: center;
    margin-bottom: 40px;
}

.blog-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.blog-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.back-btn {
    display: inline-block;
    margin-top: 20px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.back-btn:hover {
    transform: translateX(-5px);
}

/* Blog Grid Styles */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.blog-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.blog-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.blog-content {
    padding: 20px;
}

.blog-title {
    font-size: 1.3rem;
    margin-bottom: 10px;
    color: var(--dark);
}

.blog-excerpt {
    color: #666;
    margin-bottom: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-size: 0.9rem;
    color: #777;
}

.read-more {
    display: inline-block;
    background: var(--primary);
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.read-more:hover {
    background: var(--secondary);
}

/* Blog Details Styles */
.blog-details-container {
    padding: 40px 0;
}

.blog-detail {
    background: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.blog-detail-header {
    margin-bottom: 30px;
}

.blog-detail-header img {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 20px;
}

.blog-detail h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: var(--dark);
}

.blog-tags {
    margin-bottom: 20px;
}

.tag {
    display: inline-block;
    background: var(--gray);
    padding: 5px 10px;
    border-radius: 20px;
    margin-right: 8px;
    font-size: 0.8rem;
    color: var(--dark);
}

.blog-content {
    line-height: 1.8;
    margin-bottom: 30px;
}

.read-original {
    display: inline-block;
    background: var(--secondary);
    color: white;
    padding: 10px 25px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.read-original:hover {
    background: var(--primary);
}

/* Footer Styles */
.blog-footer {
    background: var(--dark);
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: 50px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .blog-header h1 {
        font-size: 2rem;
    }
    
    .blog-grid {
        grid-template-columns: 1fr;
    }
    
    .blog-detail h1 {
        font-size: 1.5rem;
    }
}
</style>

<body>
    <header class="blog-header">
        <div class="container">
            <h1>INVIGOR FITNESS STUDIO</h1>
            <a href="index.html" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Blog</a>
        </div>
    </header>

    <main class="blog-details-container container">
        <article class="blog-detail">
            <div class="blog-detail-header">
                <img id="detailImage" src="" alt="Blog Image">
                <div class="blog-meta">
                    <span id="detailAuthor"></span>
                    <span id="detailDate"></span>
                </div>
            </div>
            <h1 id="detailTitle"></h1>
            <div class="blog-tags" id="detailTags"></div>
            <div class="blog-content" id="detailContent"></div>
            <a href="#" id="originalLink" class="read-original" target="_blank">Read Original Article</a>
        </article>
    </main>

    <footer class="blog-footer">
        <div class="container">
            <p>&copy; 2023 INVIGOR FITNESS STUDIO. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    // Check if we're on the blog listing page
    if ($('#blogPosts').length) {
        fetchBlogPosts();
    }
    
    // Check if we're on the blog details page
    if ($('#detailTitle').length) {
        displayBlogDetails();
    }
});

function fetchBlogPosts() {
    $.ajax({
        url: 'https://dev.to/api/articles?tag=fitness&top=10',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            displayBlogPosts(data);
        },
        error: function(error) {
            $('#blogPosts').html('<p class="error-message">Failed to load blog posts. Please try again later.</p>');
            console.error('Error fetching blog posts:', error);
        }
    });
}

function displayBlogPosts(posts) {
    let html = '';
    
    posts.forEach(post => {
        // Format date
        const postDate = new Date(post.published_at);
        const formattedDate = postDate.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        // Create HTML for each post
        html += `
            <div class="blog-card">
                <img src="${post.cover_image || 'https://via.placeholder.com/600x400?text=No+Image'}" alt="${post.title}" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">${post.title}</h2>
                    <div class="blog-meta">
                        <span>By ${post.user.name}</span>
                        <span>${formattedDate}</span>
                    </div>
                    <p class="blog-excerpt">${post.description}</p>
                    <a href="blog-details.html?id=${post.id}" class="read-more">Read More</a>
                </div>
            </div>
        `;
    });
    
    $('#blogPosts').html(html);
}

function displayBlogDetails() {
    // Get the blog ID from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const blogId = urlParams.get('id');
    
    if (!blogId) {
        window.location.href = 'index.html';
        return;
    }
    
    // Fetch the specific blog post
    $.ajax({
        url: `https://dev.to/api/articles/${blogId}`,
        method: 'GET',
        dataType: 'json',
        success: function(post) {
            populateBlogDetails(post);
        },
        error: function(error) {
            $('.blog-detail').html('<p class="error-message">Failed to load blog post. Please try again later.</p>');
            console.error('Error fetching blog post:', error);
        }
    });
}

function populateBlogDetails(post) {
    // Format date
    const postDate = new Date(post.published_at);
    const formattedDate = postDate.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    // Set the blog details
    $('#detailTitle').text(post.title);
    $('#detailAuthor').text(`By ${post.user.name}`);
    $('#detailDate').text(formattedDate);
    $('#detailImage').attr('src', post.cover_image || 'https://via.placeholder.com/800x400?text=No+Image');
    $('#detailContent').html(post.body_html || `<p>${post.description}</p>`);
    $('#originalLink').attr('href', post.url);
    
    // Add tags
    const tagsContainer = $('#detailTags');
    tagsContainer.empty();
    
    post.tag_list.forEach(tag => {
        tagsContainer.append(`<span class="tag">${tag}</span>`);
    });
    
    // Update page title
    document.title = `${post.title} | INVIGOR FITNESS STUDIO`;
}
    </script>
    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>
</body>

</html>