<?php
if (isset($_POST['simpan'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    require 'config.php';
    $d = mysqli_query($conn, "INSERT INTO tb_siswa(nama_siswa,jurusan,tanggal_masuk,jenis_kelamin,alamat)
    VALUES(
        '$nama_siswa', '$jurusan','$tanggal_masuk','$jenis_kelamin','$alamat'
    )");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- data table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                colReorder: {
                    realtime: false
                }
            });
        });
    </script>

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-3">Crud Realtime</h2>

        <div class="row mb-5">
            <form method="post" class="form-data" id="form-data">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required="true">
                            <p class="text-danger" id="err_nama_mahasiswa"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control" required="true">
                                <option value=""></option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                            </select>
                            <p class="text-danger" id="err_jurusan"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required="true">
                            <p class="text-danger" id="err_tanggal_masuk"></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true"> Laki-laki
                            <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                        </div>
                        <p class="text-danger" id="err_jenkel"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                    <p class="text-danger" id="err_alamat"></p>
                </div>

                <div class="form-group">
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success">
                </div>
            </form>
        </div>


        <table id="datatable" class="table table-striped mt-5" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nomer</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Tanggal Masuk</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $q = mysqli_query($conn, "SELECT * FROM tb_siswa ORDER BY id ASC");
                $no = 1;
                while ($d = mysqli_fetch_array($q)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['nama_siswa']; ?></td>
                        <td><?= $d['jurusan']; ?></td>
                        <td><?= $d['tanggal_masuk']; ?></td>
                        <td><?= $d['jenis_kelamin']; ?></td>
                        <td><?= $d['alamat']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id']; ?>" onclick="return confirm('Edit the value?');" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?= $d['id']; ?>" onclick="return confirm('Delete the data?');" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>