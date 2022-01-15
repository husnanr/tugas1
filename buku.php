<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>buku</title>
</head>
<body>
    

<br>
<br>

<?php
        if (isset($_POST['save'])) {
            
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        

        $query_insert = mysqli_query($koneksi,"INSERT INTO buku VALUES('','$kode_buku','$judul_buku','$penulis','$penerbit')");

        if ($query_insert) {
            header('refresh:1 http://localhost/15_PTSGANJIL_XIIRPL2_HUSNANRAMADHAN/admin.php?page=buku');
            ?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Disimpan
            </div>
            <?php
        }else{
            echo "data gagal";
        }
        }elseif(isset($_GET['hapus'])){
            $id = $_GET['id_buku'];
            $query_delete = mysqli_query($koneksi,"DELETE FROM buku WHERE id_buku = '$id'");
            if ($query_delete) {
                
            header('refresh:1 http://localhost/15_PTSGANJIL_XIIRPL2_HUSNANRAMADHAN/admin.php?page=buku');
            }
        }else {
            echo "data gagal di hapus";
        }
    

    ?>
<center><h1>TABLE PERPUSTAKAAN</h1></center>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>


<table class="table table-dark table-striped">
  <tr>
  
    <th valign="middle">No</th>
    <th valign="middle">Kode Buku</th>
    <th valign="middle">Judu Buku</th>
    <th valign="middle">Pengarang</th>
    <th valign="middle">Penerbit</th>
    <th valign="middle">action</th>
  </tr>
  <?php
    $no = 1;
    $query = mysqli_query($koneksi,"SELECT * FROM buku");
    foreach ($query as $row) {
    
    

    ?>
  <tr>
  <center>
    <td valign="middle" ><?php  echo  $no ?> </td>
    <td valign="middle"><?php  echo $row['kode_buku'] ?> </td>
    <td valign="middle"><?php  echo $row['judul_buku'] ?> </td>
    <td valign="middle"><?php  echo $row['penulis'] ?> </td>
    <td valign="middle"><?php  echo $row['penerbit'] ?> </td>
    <td valign="middle">  

    <a href="admin.php?page=buku&hapus&id_buku=<?php  echo $row['id_buku']; ?>">
    <button type="submit" name="hapus" class="btn btn-danger" >Hapus</button></a>
    </td>
    </center>
  </tr>

  <?php
  $no++;
    }
  ?>
 `
</table>
<br>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH DATA</h5>
        <button type="button" name="save" id="save" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group mb -2">
            <label for="">Kode Buku
            <input class="form-control" type="text" name="kode_buku" required>
            </div>
            </label>
            <div class="form-group  mb -2">
            <label for="">Judulu Nuku
            <input class="form-control" type="text" name="judul_buku" required>
            </label>
            </div>
            <div class="form-group  mb -2">
            <label for="">Penulis
            <input class="form-control" type="text" name="penulis" required>
            </label>
            </div>
            <div class="form-group  mb -2">
            <label for="">Penerbit
            <input class="form-control" type="text" name="penerbit" required>
            </label>
            </div><br>
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save" name="save">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
<br>
<br>





<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>