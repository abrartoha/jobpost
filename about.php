<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>About</title>
</head>

<body>
    <header class="app-bar">
        <div class="logo">Job Vacancy Posting System</div>
        <nav class="nav-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="postjobform.php">Post a Job</a></li>
                <li><a href="searchjobform.php">Search Jobs</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-content">
        <?php

        $version = phpversion(); //finds out the php version installed in the server
        echo "<p>1. PHP version that is installed in mercury is $version</p><br>";
        echo "<p>2.I have attempted until task 7 and didn't do task 8</p><br>";
        echo "<p>3. I have added CSS styles to make the website good looking. I styled the boxes of form, font of text, and style of texts.<br>
        I have also designed the form alignment and buttons by adding hover affect. In all the pages I have used navigation bar and footer.</p><br>";
        echo "<p>4. Although I didn't participate in any discussion board. I was quite active for the whole time in looking questions and answers.<br>
        I used the search functions to get my exact answers and it really helped a lot.</p><br>";
        ?>

    </div>
    <footer class="footer">
        <p>Designed by Abrar Hossain Chy Toha (103506608)</p>
    </footer>
</body>

</html>