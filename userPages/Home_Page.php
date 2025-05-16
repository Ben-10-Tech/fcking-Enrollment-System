<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Home_Page.css">
    <title>SSIS-Home Page</title>
</head>
<body>
    <div class = "header">
        <?php
            include '../userPages/Landing_Header.php';
        ?>
    </div>
    <div class = "main-content">
        <div class = "content">
            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="../imgs/south-2.png" alt="Image 1" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../imgs/mother.jpg" alt="Image 2" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../imgs/south-2.png" alt="Image 3" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <div class="border-100"></div>
        <div class="quote">
            <img src = "../imgs/quote-educ.png" alt = "quote-educ">
        </div>
        <div class="quote">
            <img src = "../imgs/quote-school.png" alt = "quote-school">
        </div>
    </div>
    <script src="../js/Home_Page.js"></script>
</body>
</html>