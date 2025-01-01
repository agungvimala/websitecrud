<?php
    include 'koneksi.php';

    session_start();

    // Ambil parameter pencarian dari input
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if ($search) {
        // Query pencarian di beberapa kolom
        $query = "SELECT * FROM tb_tamu WHERE nama_tamu LIKE '%$search%' OR alamat LIKE '%$search%' OR email LIKE '%$search%' OR nomor_telepon LIKE '%$search%' OR pesan LIKE '%$search%'";
    } else {
        // Jika tidak ada pencarian, tampilkan semua data
        $query = "SELECT * FROM tb_tamu";
    }
    $sql = mysqli_query($conn, $query);
    $no = 0;
   
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        // Ketika pengguna mengetik di input pencarian
        $('#search-input').on('input', function() {
            var search = $(this).val(); // Ambil nilai dari input pencarian

            $.ajax({
                url: 'index.php', // Kirim request ke halaman yang sama
                method: 'GET', // Menggunakan metode GET
                data: { search: search }, // Kirim parameter pencarian
                success: function(response) {
                    // Update hasil pencarian di div yang menampilkan tabel
                    $('#table-container').html($(response).find('#table-container').html());
                }
            });
        });
    });
    </script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
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
                <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Judul -->
    <div class="container">
    <h1 class="mt-4">Data Buku Tamu Pernikahan Bobby & Marie</h1>

    <figure>
        <blockquote class="blockquote">
            <p>Berisi data tamu yang telah disimpan di database.</p>
        </blockquote>
    </figure>
    
    <a href="kelola.php" type="button" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Tambah Data</a>

    <!-- Form Pencarian -->
    <form class="mb-3">
        <div class="input-group">
            <input type="text" id="search-input" class="form-control" placeholder="Cari berdasarkan nama tamu..."
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        </div>
    </form>


    <?php
        if(isset($_SESSION['eksekusi'])):
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['eksekusi'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        session_destroy();  
        endif;
    ?>

    <!-- Tabel Data -->
    <div class="table-responsive" id="table-container">
        <table class="table align-middle table-bordered table-hover">
            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th>Nama Tamu</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Mengeksekusi query dan menampilkan hasilnya
                    while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><center><?php echo ++$no; ?></center></td>
                        <td><?php echo $result['nama_tamu']; ?></td>
                        <td><?php echo $result['alamat']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['nomor_telepon']; ?></td>
                        <td><?php echo $result['pesan']; ?></td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_tamu']; ?>" type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="proses.php?hapus=<?php echo $result['id_tamu']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>