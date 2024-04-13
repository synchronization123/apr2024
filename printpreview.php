<!DOCTYPE html>
<html>
<head>
    <title>Assignment Report Preview</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
	
		  <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #jiralist, #jiralist * {
                visibility: visible;
            }
            #jiralist {
                position: center;
                left: 100;
                top: 100;
            }
            table {
                width: 80%;
                border-collapse: collapse;
            }
            th, td {
                border: 4px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            img {
                width: 200px;
                height: 200px;
            }
        }
    </style>
</head>
<body>

   <div class="container mt-3" id="jiralist">
    <h2>Assignment Report Preview</h2>

    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "teamasspsec1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get assignment_id from URL parameter
    if (isset($_GET['assignment_id'])) {
        $assignment_id = $_GET['assignment_id'];

        // Retrieve title for the specified assignment_id
        $sql_title = "SELECT title FROM assignments WHERE assignment_id = $assignment_id";
        $result_title = $conn->query($sql_title);

        // Display title at the top
        if ($result_title->num_rows > 0) {
            $row_title = $result_title->fetch_assoc();
            echo "<h3>Title: " . $row_title["title"] . "</h3>";
        } else {
            echo "<p>No title found for the specified assignment ID</p>";
        }

        // Retrieve findings for the specified assignment_id
        $sql_findings = "SELECT description FROM findings WHERE assignment_id = $assignment_id";
        $result_title = $conn->query($sql_findings);

        // Display description at the top
        if ($result_title->num_rows > 0) {
            $row_title = $result_title->fetch_assoc();
            echo "<h3>description: " . $row_title["description"] . "</h3>";
        } else {
            echo "<p>No description found for the specified assignment ID</p>";
        }





        // Retrieve title and comments for the specified assignment_id
        $sql_reports = "SELECT title, comments FROM report WHERE assignment_id = $assignment_id";
        $result_reports = $conn->query($sql_reports);

        // Display title and comments in tabular format
        if ($result_reports->num_rows > 0) {
            echo "<h3>Report Details</h3>";
            echo "<table>";
            echo "<tr><th>Jira ID</th><th>Comments</th></tr>";
            while ($row_report = $result_reports->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_report["title"] . "</td>";
                echo "<td>" . $row_report["comments"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No reports found for the specified assignment ID</p>";
        }
    } else {
        echo "<p>No assignment ID specified</p>";
    }

    // Close database connection
    $conn->close();
    ?>
</div>

		            <button onclick="window.print()" class="btn btn-secondary">Print Preview</button>
</body>
</html>
