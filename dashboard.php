<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Trend Chart -->
                <div class="card">
                    <div class="card-header">
                        Trend Chart
                    </div>
                    <div class="card-body">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Pie Chart -->
                <div class="card">
                    <div class="card-header">
                        Pie Chart
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <!-- Assignment Section -->
                <div class="card">
                    <div class="card-header">
                        Assignments
                    </div>
                    <div class="card-body">
                        <!-- Assignments content goes here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Chart.js -->
    <script>
        // Initialize trend chart
        var trendCtx = document.getElementById('trendChart').getContext('2d');
        var trendChart = new Chart(trendCtx, {
            type: 'line', // You can change to other types like 'bar', 'radar', etc.
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Trend Data',
                    data: [65, 59, 80, 81, 56, 55], // Example data
                    borderColor: 'blue',
                    borderWidth: 1
                }]
            },
            options: {}
        });

        // Initialize pie chart
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    data: [30, 50, 20], // Example data
                    backgroundColor: ['red', 'blue', 'yellow']
                }]
            },
            options: {}
        });
    </script>
</body>
</html>
