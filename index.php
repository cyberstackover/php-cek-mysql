<?php
// Inisialisasi koneksi MySQL 
$con = mysqli_init();

// Lakukan koneksi 
mysqli_real_connect($con, "tes-server-herwin.mysql.database.azure.com", "xokvnemxcl", "Bismillah1410", "tes-database-herwin", 3306);

// Cek koneksi
if (mysqli_connect_errno()) {
    die('Koneksi gagal ke MySQL: ' . mysqli_connect_error());
} else {
    echo "Koneksi berhasil ke server MySQL<br><br>";
}

// Menampilkan informasi database
$sql = "SHOW TABLES";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($con)); // Menampilkan error jika query gagal
}

if (mysqli_num_rows($result) > 0) {
    echo "Daftar tabel di database:<br>";
    while ($row = mysqli_fetch_row($result)) {
        echo $row[0] . "<br>";
    }
} else {
    echo "Tidak ada tabel yang ditemukan di database.";
}

// Menutup koneksi
mysqli_close($con);
?>
