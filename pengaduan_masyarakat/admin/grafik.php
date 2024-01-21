<?php
//buat koneksi ke database
include '../conn/koneksi.php';

//ambil data dari tabel pengaduan dan jenis_aduan
$result = mysqli_query($koneksi, "SELECT jenis_aduan.nama_aduan, COUNT(*) as jumlah FROM pengaduan JOIN jenis_aduan ON pengaduan.id_aduan = jenis_aduan.id_aduan GROUP BY pengaduan.id_aduan");


// if ($result === false) {
//     die("Kueri SQL gagal dieksekusi: " . mysqli_error($koneksi));
//   }
  
//   $data = array();
//   while ($row = mysqli_fetch_assoc($result)) {
//     $data[] = array($row['nama_aduan'], (int)$row['jumlah']);
//   }

// tampung data pada array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = array($row['nama_aduan'], (int)$row['jumlah']);
}

//tampilkan data dalam bentuk grafik
?>

<!DOCTYPE html>
<html>
<head>
  <title>Grafik Aduan</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="myChart" style="width: 900px; height: 700px; margin: 35px auto;"></canvas>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($data as $d) { echo "'" . $d[0] . "',"; } ?>],
            datasets: [{
                label: 'Jumlah Aduan',
                data: [<?php foreach ($data as $d) { echo $d[1] . ","; } ?>],
                backgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
  </script>
</body>
</html>
