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
        <?php
        $Title = $_GET["JobTitle"];
        // define function to validate Title (maximum 20 alphanumeric characters)
        function validateTitle($title)
        {
            return preg_match('/^[a-zA-Z0-9\s,.\!]{1,20}$/', $title);
        }


        if (empty($Title)) {
            // if the input is empty.
            echo "Please fill in the field.<br><br>";
            echo '<a href="index.php">Return to Home page</a><br>';
            echo '<a href="searchjobform.php">Return to Search Job Vacancy page</a>';

        } else {

            if (!validateTitle($Title)) { //if the validation doesn't work
                echo "Title is not valid. It should be alphanumeric and up to 20 characters.<br>";
                echo '<a href="index.php">Return to Home page</a><br>';
                echo '<a href="searchjobform.php">Return to Search Job Vacancy page</a>';
            } else {
                $filePath = "jobposts/jobs.txt";
                if (file_exists($filePath)) { // If the file exists, then check the data
                    $file = fopen($filePath, "r"); // Open the file in read mode
                    if ($file) {
                        echo "<h2>Search Results:</h2><br>";
                        $foundVacancies = []; //will store the desired jobs in this array
        
                        while (!feof($file)) { // read the file line by line
                            $vacancy = fgets($file); // read a line
                            if ($vacancy !== false) {
                                // Split the vacancy data by tab character
                                $fields = explode("\t", $vacancy);

                                // Split the search term into individual words
                                $searchWords = explode(" ", $Title);

                                // Check if all search words are contained in the job title
                                $matchesAtLeastOneWord = false;

                                // Check if any of the search words match any part of the title
                                foreach ($searchWords as $searchWord) {
                                    if (stripos($fields[1], $searchWord) !== false) {
                                        $matchesAtLeastOneWord = true;
                                        break; // Exit the loop if any word is found
                                    }
                                }

                                // if any word is found in the job title, add it to results
                                if ($matchesAtLeastOneWord) {
                                    $foundVacancies[] = [
                                        'Title' => $fields[1],
                                        'Description' => $fields[2],
                                        'ClosingDate' => $fields[3],
                                        'Position' => $fields[4],
                                        'Contract' => $fields[5],
                                        'ApplicationBy' => $fields[6],
                                        'Location' => $fields[7]
                                    ];
                                }
                            }
                        }

                        fclose($file); // Close the file
        
                        if (!empty($foundVacancies)) { // If matched jobs are found, display them
                            echo "<ul>";
                            foreach ($foundVacancies as $job) {
                                echo "<li>";
                                echo "Job Title: " . $job['Title'] . "<br>";
                                echo "Description: " . $job['Description'] . "<br>";
                                echo "Closing Date: " . $job['ClosingDate'] . "<br>";
                                echo "Position: " . $job['Position'] . "-" . $job['Contract'] . "<br>";
                                echo "Application by: " . $job['ApplicationBy'] . "<br>";
                                echo "Location: " . $job['Location'] . "<br>";
                                echo "</li><br>";
                            }
                            echo "</ul>";
                            echo '<a href="index.php">Return to Home page</a><br>';
                            echo '<a href="searchjobform.php">Search another job vacancy</a>';
                        } else {
                            echo "No matching job vacancies found.<br>"; // If no job is found with the criteria
                            echo '<a href="index.php">Return to Home page</a><br>';
                            echo '<a href="searchjobform.php">Return to Search Job Vacancy page</a>';
                        }
                    } else {
                        echo "Error opening the file.<br>"; // If there's an error opening the file
                        echo '<a href="index.php">Return to Home page</a><br>';
                        echo '<a href="searchjobform.php">Return to Search Job Vacancy page</a>';
                    }
                } else {
                    echo "File doesn't exist.<br>"; // If the file doesn't exist
                    echo '<a href="index.php">Return to Home page</a><br>';
                    echo '<a href="searchjobform.php">Return to Search Job Vacancy page</a>';
                }
            }
        }
        ?>
    </div>
    <footer class="footer">
        <p>Designed by Abrar Hossain Chy Toha (103506608)</p>
    </footer>

</body>

</html>