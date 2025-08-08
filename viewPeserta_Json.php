<style>
    /* gaya untuk tabel */
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px Auto;
    }

    /* gaya untuk judul tabel */
    th {
        background-color: #0867feff; /* warana latar belakang hijau untuk judul */
        color: white; /* warna teks putih */
        padding: 10px;
        text-align: left;
    }

    /* gaya untuk data tabel */
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd; /* garis bawah pada setiap baris */
    }

    /*warna selang seling pada baris data */
    tr:nth-child(odd) {
            background-color: #b882820f; /* warna abu-abu terang untuk baris ganjil */
    }

    tr:nth-child(even) {
            background-color: #ffffffff; /* warna putih untuk baris genap */
    }

    /* gaya untuk tabel ketika di sorot */
    tr:hover {
        background-color: #ddd; /* warna latar belakang saat baris disorot */
    }
</style>

<?php
define('FILE_JSON', 'barang.json');

 function cekFileJson(){
    if(!file_exists(FILE_JSON)) {
         file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);
    return json_decode($json, true);
 }

 $data_barang = cekFileJson();
 $total_data = count($data_barang);
 if ($total_data == 0) {
    echo "<p>belum ada data barang yang disimpan.</p>";
 } else {
    echo "<table border= '1'>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Hp</th>
          <th>Alamat</th>";
 
    for ($i = 0; $i < $total_data; $i++) {

        $barang = $data_barang[$i];

        // Menampilkan No
        echo "<tr><td>" .($i + 1) . "</td>";

        // Menampilkan kode barang
        echo "<td>" .htmlspecialchars($barang['nama']) ."</td>";

        // Menampilkan Nama Barang
        echo "<td>" .htmlspecialchars($barang['email']) ."</td>";

        // Menampilkan harga
        echo "<td>" .htmlspecialchars($barang['hp']) ."</td>";

        // Menampilkan stok
        echo "<td>" .htmlspecialchars($barang['alamat']) ."</td>";

        echo "</tr>";
    }
    echo "</table>";

    echo "<center><button onclick='window.location.href=\"frmListPeserta.html\";'>Back</button></center>";
 }

 ?>

