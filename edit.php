<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];

    $sql = "UPDATE masyarakat SET nama='$nama', alamat='$alamat', no_telepon='$no_telepon', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Data berhasil diupdate');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'index.php';
        </script>";
    }

    $conn->close();
} else {
    $id = $_GET['id'];

    $sql = "SELECT * FROM masyarakat WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Data Masyarakat</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" required><?php echo $row['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>No Telepon:</label>
                <input type="text" name="no_telepon" class="form-control" value="<?php echo $row['no_telepon']; ?>" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
