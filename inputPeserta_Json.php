    <?php
    // Definisikan nama file JSON, yaitu barang.json
    define('FILE_JSON', 'barang.json');

    /* Proesedur untuk cek apakah file JSON ada, jika tidak ada, maka buat file JSON dengan data kosong */
    function cekFileJson(){
        // Jika file JSON tidak ada, maka
        if (!file_exists(FILE_JSON)) {
            // buat file JSON dengan data kosong
            file_put_contents(FILE_JSON, json_encode([]));
        }
    }

    // Fungsi untuk membaca data dri file JSON
    function bacaDataJson() {
        /* PHP tidak mengenal type data JSON, yang ada type data ARRAY,
            jadi lakukan konversi data JSON ke ARRAY dengan perintah "json_decode".
            Setelah dikonversi, kembalikan hasil konversi ke fungsi yang memanggilnya
            menggunakan perintah "return". 
        */

        return json_decode(file_get_contents(FILE_JSON), true);
    }

    // Proses saat form dikirim
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // panggil prosedur cekFileJson()
        cekFileJson();

        /* simpan ke variabel  Ambil data dari 
                form(name input type)*/
        $nama              = $_POST['nama'];
        $email             = $_POST['email'];
        $hp                = $_POST['hp'];
        $alamat            = $_POST['alamat'];


        // panggil fungsi bacaDataJson()
        $data_barang = bacaDataJson();

        //Cek apakah kode barang sudah ada
        for ($i = 0; $i < count($data_barang); $i++) {
        /* perbandingan nilai(=), 
        perbaddingan tipe data (==),
        perbandingan nilai dan tipe data (===)
        */
        if ($data_barang[$i]['nama'] === $nama) {
            // tampilkan pesan barang sudah ada
            echo "<script>alert('Barang dengan Nama: $nama sudah ada!');</script>";
            // setelah tombol OK diklik pada pesan, alihkan halaman ke frmBarang.html
            echo "<script>window.location.href = 'frmListPeserta.html';</script>";
            exit();
            
        }
    }
        // menambahkan data baru ke dalam array
        $data_barang[] = [
            'nama'    => $nama,
            'email'   => $email,
            'hp'      => $hp,
            'alamat'  => $alamat
        ];

        /* konversi data array pada "$data_barang" ke JSON dengan perintah "json_encode". 
        hasil konversi tempatkan ke file JSON dengan perintah "file_put_contenets". 
        format output JSON agar lebih mudah dibaca oelh manusia denganperintah "JSON_PRETTY_PRINT". 
        */
        file_put_contents(FILE_JSON, json_encode($data_barang, JSON_PRETTY_PRINT));
        //tampilkan pesan data berhasil ditambah
        echo "<script>alert('Data berhasil ditambahkan!');</script>";
        // setelah tombol OK di klik pada pesan, alihkan halaman ke frmBarang,html
        echo "<script>window.location.href = 'frmListPeserta.html';</script>";


    }

    ?>