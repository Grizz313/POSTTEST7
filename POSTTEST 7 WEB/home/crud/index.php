<?php

require 'koneksi.php';

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM message WHERE nama LIKE '%$keyword%'";
    $result = mysqli_query($koneksi, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM message";
    $result = mysqli_query($koneksi, $read_sql);
}

$message = [];

while ($row = mysqli_fetch_assoc($result)) {
    $message[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <title>Read Data</title>
</head>

<body>
    <div class="back"><a href="../home.php"><i class="fa-solid fa-arrow-left"></i> MAIN PAGE</a></div>
    <div class="center">
        <h1>OUR NEW MEMBER</h1>
        <div class="link">
            <a href="tambah.php">+ &nbsp; Wanna Join Us?</a>
        </div>
    </div>
    <form action="" method="post" class="form">
        <input type="text" class="cari" name="keyword" placeholder="Search" autofocus autocomplete="off">
        <button type="submit" class="logo-cari" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
        <a href="index.php" class="pencet"><button>Refresh</button></a>
    </form>
    <table border=2 cellspacing=2 cellpadding=10>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>About Yourself</th>
                <th>Image</th>
                <th>Last Seen</th>
                <th>Edit</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($message as $msg) : ?>
        <tr>
            <tbody>
                <td><?= $i ?></td>
                <td><?php echo $msg['nama']; ?></td>
                <td><?php echo $msg['email']; ?></td>
                <td>
                    62+
                    <?php echo $msg['notelp']; ?>
                </td>
                <td><?php echo $msg['pesan']; ?></td>
                <td style="text-align: center">
                    <img src="img/<?php echo $msg['gambar_produk']; ?>" style="width: 120px" />
                </td>
                <td>
                    <?php date_default_timezone_set("Asia/Makassar"); echo  date("Y.m.d"). " " . "<br>"
            . date("h:i:sa"); ?>
                </td>
                <td>
                    <a class="blue" href="edit_produk.php?id=<?= $msg['id']; ?>"><i
                            class="fa-solid fa-pen-to-square"></i> EDIT</a> |
                    <a class="red" href="proses_hapus.php?id=<?= $msg['id']; ?>"
                        onclick="return confirm('Are You Sure Want to Delete This Data?')"><i
                            class="fa-sharp fa-solid fa-trash"> Delete</i></a>
                </td>
            </tbody>

        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>