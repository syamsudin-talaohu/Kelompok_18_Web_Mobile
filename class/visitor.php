<?php
require_once 'koneksi.php';

class visitor extends database
{
    public function __construct()
    {
        $this->getConnection();
    }

    // Fungsi untuk mencatat data pengunjung
    public function recordVisitor($ip_address, $date, $time)
    {
        $sql = "INSERT INTO visitors (ip_address, date, time, last_activity) VALUES (
            '" . mysqli_real_escape_string($this->getConnection(), $ip_address) . "', 
            '" . mysqli_real_escape_string($this->getConnection(), $date) . "', 
            '" . mysqli_real_escape_string($this->getConnection(), $time) . "', 
            '" . mysqli_real_escape_string($this->getConnection(), date("Y-m-d H:i:s")) . "'
        ) ON DUPLICATE KEY UPDATE last_activity = '" . mysqli_real_escape_string($this->getConnection(), date("Y-m-d H:i:s")) . "'";
        mysqli_query($this->getConnection(), $sql);
    }

    // Fungsi untuk menghitung jumlah pengunjung hari ini
    public function getVisitorsToday()
    {
        $today = date("Y-m-d");
        $sql = "SELECT COUNT(*) AS total FROM visitors WHERE date = '" . mysqli_real_escape_string($this->getConnection(), $today) . "'";
        $result = mysqli_query($this->getConnection(), $sql);
        $data = mysqli_fetch_assoc($result);
        return isset($data['total']) ? $data['total'] : 0;
    }

    // Fungsi untuk menghitung total pengunjung
    public function getTotalVisitors()
    {
        $sql = "SELECT COUNT(*) AS total FROM visitors";
        $result = mysqli_query($this->getConnection(), $sql);
        $data = mysqli_fetch_assoc($result);
        return isset($data['total']) ? $data['total'] : 0;
    }

    // Fungsi untuk mencatat aktivitas terakhir pengguna
    public function updateLastActivity($ip_address)
    {
        $time = date("Y-m-d H:i:s");
        $sql = "UPDATE visitors SET last_activity = '" . mysqli_real_escape_string($this->getConnection(), $time) . "' WHERE ip_address = '" . mysqli_real_escape_string($this->getConnection(), $ip_address) . "'";
        mysqli_query($this->getConnection(), $sql);
    }

    // Fungsi untuk menghitung pengunjung yang online
    public function getOnlineVisitors()
    {
        $timeLimit = date("Y-m-d H:i:s", strtotime("-5 minutes")); // Aktivitas dalam 5 menit terakhir
        $sql = "SELECT COUNT(*) AS total FROM visitors WHERE last_activity >= '" . mysqli_real_escape_string($this->getConnection(), $timeLimit) . "'";
        $result = mysqli_query($this->getConnection(), $sql);
        $data = mysqli_fetch_assoc($result);
        return isset($data['total']) ? $data['total'] : 0;
    }

    // Fungsi untuk mendapatkan data pengunjung berdasarkan tanggal
    public function getVisitorsByDate($date)
    {
        $sql = "SELECT * FROM visitors WHERE date = '" . mysqli_real_escape_string($this->getConnection(), $date) . "'";
        $result = mysqli_query($this->getConnection(), $sql);
        $visitors = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $visitors[] = $row;
        }
        return $visitors;
    }

    // Fungsi untuk mendapatkan data pengunjung mingguan
    public function getWeeklyVisitors()
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week'));

        $sql = "SELECT DATE(date) as date, COUNT(*) as total FROM visitors WHERE DATE(date) BETWEEN '" . mysqli_real_escape_string($this->getConnection(), $startOfWeek) . "' AND '" . mysqli_real_escape_string($this->getConnection(), $endOfWeek) . "' GROUP BY DATE(date)";
        $result = mysqli_query($this->getConnection(), $sql);

        $labels = array();
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['date'];
            $data[] = $row['total'];
        }

        return array('labels' => $labels, 'data' => $data);
    }
}
?>
