<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD dengan PHP</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <h1>Ubah Data Siswa</h1>

    <?php
    // Load file koneksi.php
    include "koneksi.php";
    // Ambil data NIS yang dikirim oleh index.php melalui URL
    $id = $_GET['id'];
    // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
    $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute(); // Eksekusi query insert
    $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
    ?>
    
    <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <table cellpadding="8">
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <?php
                    if ($data['jenis_kelamin'] == "Laki-laki") {
                        echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
                        echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
                    } else {
                        echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
                        echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <input type="file" name="foto">
                </td>
            </tr>
        </table>
        <div class="button_akhir">
            <input type="submit" value="Simpan" class="custom-btn">
            <a href="index.php"><input type="button" value="Batal" class="custom-btn"></a>
        </div>
    </form>
</body>
</html>