<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM masyarakat WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . $sql . "<br>" . $conn->error . "');
        window.location.href = 'index.php';
    </script>";
}

$conn->close();
?>
