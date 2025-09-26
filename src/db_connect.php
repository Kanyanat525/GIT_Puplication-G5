
<?php
// กำหนดค่าการเชื่อมต่อ (ดึงมาจาก docker-compose.yml)
define('DB_SERVER', 'db');
define('DB_USERNAME', 'Pup_addmin');
define('DB_PASSWORD', 'Publication5');
define('DB_NAME', 'publication_db');

// เชื่อมต่อฐานข้อมูล MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// ตรวจสอบการเชื่อมต่อ
if($conn === false){
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}
?>