<!DOCTYPE html>
<!-- 
    Name: Ethan Marchbanks
    Date: 4/20/2021
    Challenge: Final Project
    References: 1)https://stackoverflow.com/questions/12481439/jquery-this-keyword
                2)https://api.jquery.com/css/
                3)https://stackoverflow.com/questions/12527433/correct-way-of-comparing-string-jquery-operator/12527475
                4)https://dodsonorchards.com/
                5)https://www.w3schools.com/howto/howto_css_image_text.asp
-->
<html lang="en">
    <head>
        <title>Final Project</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="EdmqgcFinalProject.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
        <script src="EdmqgcFinalProject.js"></script>
        
<!--        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
        
    </head>
    <body onload="showSlides(); getAdminStatus();">
        <?php include 'EdmqgcFinalProjectHeader.php';?>
        
        <div id="slideshowWrapper">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="weddingPhoto1.png">
                </div>

                <div class="mySlides fade">
                    <img src="weddingPhoto2.png">
                </div>

                <div class="mySlides fade">
                    <img src="weddingPhoto3.png">
                </div>
            </div>
        </div>

        <div id="pageTitleContainer">
            <img src="scroll.png" alt="Scroll">
            <div id="pageTitle">Wedding Information</div>
        </div>           

        <div id="rsvpButton">
            <a href="EdmqgcFinalProjectRSVP.php">RSVP</a>
        </div>            
        
        <div id="information">
            
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Starring</a></li>
                    <li><a href="#tabs-2">Date/Time</a></li>
                    <li><a href="#tabs-3">Location</a></li>
                    <li><a href="#tabs-4">Activities</a></li>
                    <li><a href="#tabs-5">Catering</a></li>
                </ul>
                
                <div id="tabs-1">
                    <div class="info">
                        <h3>Ethan Drew Marchbanks & Autumn Elizabeth Anne Russell</h3>
                        <h3>Officiated by Brother John Hancock</h3>
                    </div>
                </div>
                
                <div id="tabs-2">
                    <div class="info">
                        <h3>June 6, 2021</h3>
                        <h3>5:00 pm - 10:00 pm</h3>
                    </div>
                </div>
                
                <div id="tabs-3">
                    <div class="info">
                        <iframe src="https://www.youtube.com/embed/mt5n1XhzSvU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h3>Dodson Orchards</h3>
                        <h3>1778 Madison 9563, Fredericktown, MO 63645</h3>
                    </div>
                </div>
                
                <div id="tabs-4">
                    <div class="info">
                        <h3>Dancing</h3>
                        <h3>Karaoke</h3>
                        <h3>Photo Booth</h3>
                        <h3>Wine Tasting</h3>
                    </div>
                </div>
                
                <div id="tabs-5">
                    <div class="info">
                        <h3>Steak, Pork, and Chicken Kabobs</h3>
                        <h3>Baked Beans</h3>
                        <h3>Salad</h3>
                        <h3>Fruit Punch</h3>
                        <h3>Bride's and Groom's Cakes</h3>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>