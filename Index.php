<?php
include_once("Koneksi.php");

// mengambil semua data dari database
$result = mysqli_query($mysqli, "SELECT * FROM absensi ORDER BY id DESC");

if (isset($_POST['Submit'])) {
    $Nama = $_POST['Nama'];
    $Jurusan = $_POST['Jurusan'];


    $add = mysqli_query($mysqli, "INSERT INTO absensi(Nama, Jurusan, Waktu_Kehadiran) VALUES('$Nama','Jurusan', NOW())");
}
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Universitas Krisnadwipayana</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Universitas Krisnadwipayana</span>
        </div>
    </nav>

    <div class="bg-success p-2 text-dark bg-opacity-10">
        <h1 class="p-4 text-center">DAFTAR HADIR MAHASISWA</h1>
        <div class="container">
            <form action=""method="post" name="form_absen">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="Nama" placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="Jurusan" placeholder="Masukan Jurusan">
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-danger" name="Reset">Reset</button>
                    <button type="submit" class="btn btn-primary" name="Submit">Hadir</button>
                </div>
            </form>

            <table class="my-5 table table-striped">
                <tr class="table-dark">
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Waktu_Kehadiran</th>
                </tr>

                <?php
                while ($r = mysqli_fetch_array($result)) {
                ?>
                    <tr class = "table-primary">
                        <td><?php echo $r['Nama']; ?></td>
                        <td><?php echo $r['Jurusan']; ?></td>
                        <td><?php echo $r['Waktu_Kehadiran']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>