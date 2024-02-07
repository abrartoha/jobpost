<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search Jobs</title>
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
        <h1 class="jobheader">Job Searching Form</h1><br><br>
        <form action="searchjobprocess.php" method="get"><!--sends the data to searchjobprocess.php-->
            <div class="form-field">
                <label for="jobtitle">Job Title: </label>
                <input type="text" id="jobtitle" name="JobTitle"><!--input for title-->
            </div>
            <div class="form-field">
                <label>Position:</label>
                <div class="radio-options">
                    <input type="radio" id="fullTime" name="position" value="Full Time"><!--input for position type-->
                    <label for="fullTime">Full Time</label>
                    <input type="radio" id="partTime" name="position" value="Part Time">
                    <label for="partTime">Part Time</label>
                </div>
            </div>

            <div class="form-field">
                <label>Contract:</label>
                <div class=".radio-options">
                    <input type="radio" id="onGoing" name="contract" value="On Going"><!--input for contract type-->
                    <label for="onGoing">On Going</label>
                    <input type="radio" id="fixedTerm" name="contract" value="Fixed Term">
                    <label for="fixedTerm">Fixed Term</label>
                </div>
            </div>

            <div class="form-field">
                <label>Application by:</label>
                <div class="checkbox-options">
                    <input type="checkbox" id="post" name="acceptApplication[]" value="Post">
                    <!--input for application type-->
                    <label for="post">Post</label>
                    <input type="checkbox" id="email" name="acceptApplication[]" value="Email">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="form-field">
                <label for="location">Location:</label>
                <select id="location" name="location">
                    <option value="" disabled selected>---</option><!--input for location-->
                    <option value="ACT">ACT</option>
                    <option value="NSW">NSW</option>
                    <option value="NT">NT</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="VIC">VIC</option>
                    <option value="WA">WA</option>
                </select>
            </div>
            <p class="requirementText">Select criteria to search by them</p>
            <div class="form-buttons">
                <input type="submit" value="Search" class="submit-button">
                <input type="reset" value="Reset" class="reset-button">
            </div>
        </form>

    </div>
    <footer class="footer">
        <p>Designed by Abrar Hossain Chy Toha (103506608)</p>
    </footer>

</body>

</html>