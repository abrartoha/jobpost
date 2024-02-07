<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Post Job</title>
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

        $positionId = $_POST["positionId"]; //takes value from the form by using post method
        $title = $_POST["title"];
        $description = $_POST["description"];
        $closingDate = $_POST["closingDate"];

        // Define function to validate Position ID format (PID0001)
        function validatePositionID($PositionID)
        {
            return preg_match('/^PID\d{4}$/', $PositionID);
        }

        // Define function to validate Title (maximum 20 alphanumeric characters)
        function validateTitle($Title)
        {
            return preg_match('/^[a-zA-Z0-9\s,.\!]{1,20}$/', $Title);
        }

        // Define function to validate Description (maximum 250 characters)
        function validateDescription($Description)
        {
            return strlen($Description) <= 250;
        }

        // Define function to validate Closing Date format (dd/mm/yy)
        function validateClosingDate($ClosingDate)
        {
            return preg_match('/^\d{2}\/\d{2}\/\d{2}$/', $ClosingDate);
        }

        if (empty($positionId) || empty($title) || empty($description) || empty($closingDate) || empty($_POST["acceptApplication"]) || empty($_POST["position"]) || empty($_POST["contract"]) || empty($_POST["location"])) {
            // if at least one of the inputs is empty.
            echo "Please fill in all fields.<br><br>";
            echo '<a href="index.php">Return to Home page</a><br>';
            echo '<a href="postjobform.php">Return to Post Job Vacancy page</a>';

        } else {

            $errors = []; //will store all the errors in this array
        
            if (!validatePositionID($positionId)) {
                $errors[] = "Position ID is not in the correct format (e.g., PID0001).";
            }

            if (!validateTitle($title)) {
                $errors[] = "Title is not valid. It should be alphanumeric and up to 20 characters.";
            }

            if (!validateDescription($description)) {
                $errors[] = "Description should be up to 250 characters.";
            }

            if (!validateClosingDate($closingDate)) {
                $errors[] = "Closing Date is not in the correct format (dd/mm/yy).";
            }


            // Check if "Position ID" is unique within the text file
            $filePath = "jobposts/jobs.txt";
            if (file_exists($filePath)) {
                $lines = file($filePath, FILE_IGNORE_NEW_LINES);
                foreach ($lines as $line) {
                    $fields = explode("\t", $line);
                    if ($fields[0] === $positionId) {
                        $errors[] = "Position ID '$positionId' already exists.";
                        break;
                    }
                }
            }

            if (empty($errors)) {
                // save the job vacancy data to the text file, if there is no error
                $acceptApplication = implode(" ", $_POST["acceptApplication"]);
                $position = $_POST["position"];
                $contract = $_POST["contract"];
                $location = $_POST["location"];

                $dataToSave = "$positionId\t$title\t$description\t$closingDate\t$position\t$contract\t$acceptApplication\t$location\n"; //data saving format
        
                if (!file_exists("jobposts")) {
                    mkdir("jobposts"); // create the directory if it doesn't exist                   
        
                }

                $filePath = "jobposts/jobs.txt";
                $file = fopen($filePath, "a"); // open the file in append mode and if the job.txt file doesn't exist, this mode will create the file automatically
                if ($file) {
                    if (fwrite($file, $dataToSave)) { // write data to the file 
                        fclose($file); // close the file
                        echo "Job vacancy saved successfully!<br>";
                        echo '<a href="index.php">Return to Home page</a>';
                    } else {
                        echo "Error writing to the job vacancy file.";
                    }
                } else {
                    echo "Error opening the job vacancy file.";
                }
            } else {
                // display validation errors and provide links to return to the Home page and Post Job Vacancy page
                echo "<h2>Error(s) occurred:</h2><br>";
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
                echo '<a href="index.php">Return to Home page</a><br>';
                echo '<a href="postjobform.php">Return to Post Job Vacancy page</a>';
            }
        }

        ?>
    </div>
    <footer class="footer">
        <p>Designed by Abrar Hossain Chy Toha (103506608)</p>
    </footer>

</body>

</html>