<?php
session_start();
require_once('dbconnect.php');
require_once('logging.php'); // Use require_once() instead of require()


// Function to log insertions
function log_insertion($file_name, $username, $title, $comments) {
    log_operation($file_name, '', "Title: $title, Comments: $comments", $username);
}




// Delete report if delete button is clicked and confirmed
if(isset($_GET['delete']) && isset($_GET['report_id'])) {
    $report_id = $_GET['report_id'];
    // Check if confirmation is received
    if(isset($_GET['confirm'])) {
        // If confirmed, proceed with deletion
        $query = "DELETE FROM report WHERE report_id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $report_id); // "i" indicates integer type for the report_id

        if($stmt->execute()) {
            // Report deleted successfully
            echo '<div class="alert alert-success">Report deleted successfully!</div>';
            // Redirect back to the current assignment_id in URL
            if(isset($_SESSION['assignment_id'])) {
                header("Location: {$_SERVER['PHP_SELF']}?assignment_id={$_SESSION['assignment_id']}");
                exit();
            }
        } else {
            // Error in deleting report
            echo '<div class="alert alert-danger">Error: Unable to delete report. ' . $stmt->error . '</div>';
        }
    } else {
        // If not confirmed, redirect back to the page without deletion
        header("Location: {$_SERVER['PHP_SELF']}?delete=true&report_id=$report_id&confirm=false");
        exit();
    }
}

// Fetch assignment_id from URL if available
if(isset($_GET['assignment_id'])) {
    $_SESSION['assignment_id'] = $_GET['assignment_id'];
}

if(isset($_POST['title']) && isset($_POST['comments'])) {
    $title = $_POST['title'];
    $comments = $_POST['comments'];

    if(isset($_SESSION['assignment_id'])) {
        $assignment_id = $_SESSION['assignment_id'];

        // Insert data into the report table with assignment_id
        $query = "INSERT INTO report (assignment_id, title, comments) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iss", $assignment_id, $title, $comments);

        if($stmt->execute()) {
            // Data saved successfully
            echo '<div class="alert alert-success">Data saved successfully!</div>';
        } else {
            // Error in saving data
            echo '<div class="alert alert-danger">Error: Unable to save data. ' . $stmt->error . '</div>';
        }
    } else {
        // No assignment_id set
        echo '<div class="alert alert-danger">Error: No assignment ID set.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function confirmDelete(report_id) {
            if(confirm("Are you sure you want to delete this report?")) {
                window.location.href = `?delete=true&report_id=${report_id}&confirm=true`;
            }
        }
    </script>
	
	  <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #jiralist, #jiralist * {
                visibility: visible;
            }
            #jiralist {
                position: absolute;
                left: 0;
                top: 0;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
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
    <div class="container">
        <h2>Create Report</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea class="form-control" id="comments" name="comments" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <hr>
    <div class="container mt-3" id="jiralist">
        <h3>Reports</h3>
        <table id="patch" class="table">
   
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Comments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch reports for the current assignment_id
                if(isset($_SESSION['assignment_id'])) {
                    $assignment_id = $_SESSION['assignment_id'];
                    $query = "SELECT * FROM report WHERE assignment_id=?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $assignment_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['comments'] . '</td>';
                            echo '<td><button class="btn btn-danger" onclick="confirmDelete(' . $row['report_id'] . ')">Delete</button></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">No reports found.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No assignment ID set.</td></tr>';
                }
                ?>
            </tbody>
        </table>
		            <button onclick="window.print()" class="btn btn-secondary">Print Preview</button>
					</div>
    </div>
</body>
</html>
