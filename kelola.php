<!doctype html>

<?php
    include 'koneksi.php';

    session_start();


    $id_tamu = '';
    $nama_tamu = '';
    $alamat = '';
    $email = '';
    $nomor_telepon = '';
    $pesan = '';

    if(isset($_GET['ubah'])){
        $id_tamu = $_GET['ubah'];
        
        $query = "SELECT * FROM tb_tamu WHERE id_tamu = '$id_tamu';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nama_tamu = $result['nama_tamu'];
        $alamat = $result['alamat'];
        $email = $result['email'];
        $nomor_telepon = $result['nomor_telepon'];
        $pesan = $result['pesan'];

        //var_dump($result);

        //die();
    }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  </head>
  <body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Buku Tamu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="POST" action="proses.php">
            <input type="hidden" value="<?php echo $id_tamu ?>" name="id_tamu">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Tamu</label>
                <div class="col-sm-10">
                <input required type="text" name="nama_tamu" class="form-control" id="nama" placeholder="Ex: Bobby Irawan" value="<?php echo $nama_tamu; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input required type="text" name="email" class="form-control" id="email" placeholder="Ex: example@gmail.com" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notelp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                <input required type="text" name="nomor_telepon" class="form-control" id="notelp" placeholder="Ex: 081222333444" value="<?php echo $nomor_telepon; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                <div class="col-sm-10">
                <textarea required class="form-control" id="pesan" name="pesan" rows="3"><?php echo $pesan; ?></textarea>
                </div>
            </div>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
                    <a href="index.php" type="button" class="btn btn-danger"><i class="fa-solid fa-reply"></i> Batal</a>
                    <?php
                        } else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Tambahkan</button>
                    <a href="index.php" type="button" class="btn btn-danger"><i class="fa-solid fa-reply"></i> Batal</a>                
                    <?php
                        }
                    ?>
                </div>
            </div>
        </form>

        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>