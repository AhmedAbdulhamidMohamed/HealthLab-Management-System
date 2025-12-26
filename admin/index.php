<?php
global $conn;
require_once '../config.php';
require_once BLA.'inc/header.php';

    if(!isset($_SESSION['admin_name'])){
        header("Location: login.php");
        exit;
    }


    $adminName = $_SESSION['admin_name'];

    $tables = ['admins', 'cities', 'services', 'orders'];
    $counts = [];
    foreach($tables as $table) {
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $counts[$table] = $row['total'] ?? 0;
    }

    $adminCount = $counts['admins'] ?? 0;
    $cityCount = $counts['cities'] ?? 0;
    $serviceCount = $counts['services'] ?? 0;
    $orderCount = $counts['orders'] ?? 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-5">


    <div class="alert alert-success text-center">
        Welcome, <h3><?php echo htmlspecialchars($adminName); ?></h3>! You are currently logged in.
    </div>


    <div class="mb-4 text-center">
        <a href="admins/add.php" class="btn btn-primary m-1">Add Admin</a>
        <a href="services/add.php" class="btn btn-warning m-1">Add Service</a>
        <a href="cities/add.php" class="btn btn-success m-1">Add City</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text"><?php echo $adminCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Cities</h5>
                    <p class="card-text"><?php echo $cityCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Services</h5>
                    <p class="card-text"><?php echo $serviceCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text"><?php echo $orderCount; ?></p>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-md-6">
            <canvas id="ordersChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="servicesChart"></canvas>
        </div>
    </div>
</div>

<footer class="bg-dark text-white mt-5 p-4">
    <div class="container d-flex justify-content-between flex-wrap">
        <a href="admins/index.php" class="btn btn-primary m-1">Manage Admins</a>
        <a href="cities/index.php" class="btn btn-success m-1">Manage Cities</a>
        <a href="services/index.php" class="btn btn-warning m-1">Manage Services</a>
        <a href="orders/index.php" class="btn btn-info m-1">View Orders</a>
    </div>
    <div class="text-center mt-3">
        &copy; <?php echo date("Y"); ?> MedicalTest Dashboard
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const ctxOrders = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctxOrders, {
        type: 'bar',
        data: {
            labels: ['Admins','Cities','Services','Orders'],
            datasets: [{
                label: 'Count',
                data: [<?php echo $adminCount ?>, <?php echo $cityCount ?>, <?php echo $serviceCount ?>, <?php echo $orderCount ?>],
                backgroundColor: ['#0d6efd','#198754','#ffc107','#0dcaf0']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });

    const ctxServices = document.getElementById('servicesChart').getContext('2d');
    const servicesChart = new Chart(ctxServices, {
        type: 'pie',
        data: {
            labels: ['Admins','Cities','Services','Orders'],
            datasets: [{
                data: [<?php echo $adminCount ?>, <?php echo $cityCount ?>, <?php echo $serviceCount ?>, <?php echo $orderCount ?>],
                backgroundColor: ['#0d6efd','#198754','#ffc107','#0dcaf0']
            }]
        },
        options: { responsive: true }
    });
</script>

<?php require_once BLA.'inc/footer.php'; ?>
</body>
</html>
