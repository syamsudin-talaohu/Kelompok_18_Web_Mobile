<?php
// Start Session
session_start();
if (empty($_SESSION)) {
    header("Location: index.php");
    exit();
}

// Include Class for Visitor Data
include '../../class/visitor.php';
$db = new visitor();

// Get Visitor Statistics
$totalVisitors = $db->getTotalVisitors();
$visitorsToday = $db->getVisitorsToday();
$onlineVisitors = $db->getOnlineVisitors();
$weeklyVisitors = $db->getWeeklyVisitors();
?>

<!--Start Breadcrumb-->
<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Dashboard</a></li>
        </ol>
    </div>
</div>
<!--End Breadcrumb-->

<!--Start Dashboard Header-->
<div id="dashboard-header" class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Selamat Datang, Admin!</h3>
        <p>Berikut adalah statistik pengunjung website Anda.</p>
    </div>
</div>
<!--End Dashboard Header-->

<!--Start Statistics Section-->
<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-users"></i>
                    <span>Total Pengunjung</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    <a class="expand-link"><i class="fa fa-expand"></i></a>
                    <a class="close-link"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <h2><?php echo htmlspecialchars($totalVisitors, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-calendar"></i>
                    <span>Pengunjung Hari Ini</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    <a class="expand-link"><i class="fa fa-expand"></i></a>
                    <a class="close-link"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <h2><?php echo htmlspecialchars($visitorsToday, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-desktop"></i>
                    <span>Pengunjung Online</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    <a class="expand-link"><i class="fa fa-expand"></i></a>
                    <a class="close-link"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <h2><?php echo htmlspecialchars($onlineVisitors, ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>
        </div>
    </div>
</div>
<!--End Statistics Section-->

<!--Start Visitor Chart-->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-chart-bar"></i>
                    <span>Statistik Pengunjung Mingguan</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    <a class="expand-link"><i class="fa fa-expand"></i></a>
                    <a class="close-link"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
    </div>
</div>
<!--End Visitor Chart-->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fetch data for chart
    var visitorData = <?php echo json_encode($weeklyVisitors); ?>;

    // Create chart
    var ctx = document.getElementById('visitorChart').getContext('2d');
    var visitorChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: visitorData.labels,
            datasets: [{
                label: 'Pengunjung',
                data: visitorData.data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
// Load additional scripts and initialize dashboard functionality
function AllTables() {
    // Initialize your DataTables or other components here
}
$(document).ready(function () {
    LoadDataTablesScripts(AllTables);
    WinMove();
});
</script>