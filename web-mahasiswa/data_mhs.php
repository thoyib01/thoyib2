<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container col-md-10">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Data Mahasiswa
            </div>
           
            <div class="card-body">
            <a href="index.php" class="btn btn-primary">Tambah Data</a>
            </br>
            </br>
            <div class="">
            <style> form {width:500px;margin:50px auto;}.search 
            {padding:8px 15px; background: #f0f8ff; border:2px solid #008080;}.cari 
            {position:relative;left:-4px; padding:10px 15px; border:0px solid #008080; background-color: #6B8E23; color:#fafafa;font-weight:bold;}
            .cari:hover {background: #008080; color:#fafafa;}.cari:active {background:#9ACD32;}
            </style>
            <form action="" method="POST">
            <input type="search" class="search" name="query"  placeholder="Cari Data" size="40" autofocus=" " autocomplete="off">
            <input type="submit" value="Cari" class="cari" name="cari">
            </form>

            


            </div>
            
            </br>


            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kode Pos</th>
                    <th><i>Aksi</i></th>

                </tr>

                <?php

                
                include "koneksi.php";
                error_reporting(0);
                $no = 1;

                $query = $_POST['query'];
                if($query !=''){
                    $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm LIKE '%".$query."%' OR
                    nama LIKE '%".$query."%' OR tempat_lahir LIKE '%".$query."%' 
                     ");
                }
                

                else{ $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");}
                 $query = $_POST['query'];

                while($data=mysqli_fetch_array($tampil))
                {  
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['npm']?> </td>
                    <td><?php echo $data['nama']?> </td>
                    <td><?php echo $data['tempat_lahir']?> </td>
                    <td><?php echo $data['tanggal_lahir']?> </td>
                    <td><?php echo $data['jenis_kelamin']?> </td>
                    <td><?php echo $data['alamat']?> </td>
                    <td><?php echo $data['kode_pos']?> </td>
                    <td> 
                    <a href="edit_mahasiswa.php?npm=<?php echo $data['npm']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_mahasiswa.php?npm=<?php echo $data['npm']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                
             <?php } 
                ?>
             
            </table>
            </div>
        </div>
        
    </div>
   
</body>
</html>