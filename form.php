<!DOCTYPE html>
<?php 
// starting the session
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <link rel="apple-touch-icon" sizes="180x180" href="logos/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="logos/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="logos/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="css_files/stylefeed.css">
    <style>
        header {
            background-image: url('logos/fbbg.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center -50px;
            height: 150px;
        }
    </style>
</head>
<body>
    <header></header>
    <nav>
        <a href="index.html">HOME</a>
        <a href="education.html">EDUCATION</a>
        <a href="experience.html">EXPERIENCE</a>
        <a href="project.html">PROJECTS</a>
        <a href="skills.html">SKILLS</a>
        <a href="Certificate.html">CERTIFICATES</a>
        <a href="feedback.html" target="_blank">FEEDBACK</a>
    </nav>
    <div class="container">
        <h2><span><b>DETAILS</b></span></h2>
        <form method="POST" action="save.php">
            <div class="v_name">
                <label>FULL NAME:</label>
                <input type="text" name="name" class="form-control" placeholder="xyz abc" required />
            </div>
            <div class="v_gender">
                <label>GENDER:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="v_mail">
                <label>E-Mail:</label>
                <input type="email" id="mail" name="mail" placeholder="xyz@gmail.com" required>
            </div>
            <div class="v_education">
                <label>STREAM:</label>
                <select id="education" name="education" required>
                    <option value="" disabled selected>Select your stream</option>
                    <option value="High School Diploma">High School Diploma</option>
                    <option value="Vocational Training">Vocational Training</option>
                    <option value="Associate's Degree">Associate's Degree</option>
                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                    <option value="Master's Degree">Master's Degree</option>
                    <option value="Doctorate Degree">Doctorate Degree</option>
                    <option value="Professional Degrees">Professional Degrees</option>
                    <option value="Other">Other</option> 
                </select>
            </div>
            <div class="v_feedback">
                <label>FEEDBACK:</label>
                <textarea id="status" name="feedback" placeholder="your views" required></textarea>
            </div>
            <div class="v_changes">
                <label>SUGGESTED CHANGES:</label>
                <textarea id="change" name="changes" placeholder="changes suggested" required></textarea>
            </div>
            
            <?php
                if (isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
            <?php
                }
                if (isset($_SESSION['success'])) {
            ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
            <?php
                }
            ?>
            <button class="submit" name="submit">SUBMIT</button>
        </form>    
    </div>
</body>
</html>
