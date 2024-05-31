<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang Masuk</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            width: 100%;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            background-color: #396ebd;
            width: 250px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #fff;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .logo h2 {
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
            width: 100%;
        }

        .sidebar ul li {
            width: 100%;
            margin: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            background-color: #0a387e;
            padding: 10px;
            text-align: center;
            display: block;
            width: 100%;
            border-radius: 50px;
            transition: background 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #315a9d;
        }

        .sidebar .logout {
            margin-top: auto;
            background-color: #0a387e;
            padding: 10px;
            width: 100%;
            text-align: center;
            border-radius: 50px;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .sidebar .logout:hover {
            background-color: #e04444;
        }

        .main-content {
            flex: 1;
            background: url('bg gudang.jpg') no-repeat center center/cover;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1000px;
            position: relative; 
        }

        .header {
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 60px; 
            background-color: #0a387e;
            border-top-left-radius: 10px; 
            border-top-right-radius: 10px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header h2 {
            color: #ffffff; 
            margin: 0; 
        }

        .table-container .table-controls,
        .table-container table,
        .table-container .btn,
        .table-container .table-footer {
            margin-top: 80px; 
        }

        .table-controls {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .table-controls .entries {
            display: flex;
            align-items: center;
        }

        .table-controls .entries label {
            margin-right: 10px;
            color: #333;
        }

        .table-controls .entries select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .table-controls .search {
            display: flex;
            align-items: center;
        }

        .table-controls .search label {
            margin-right: 10px;
            color: #333;
        }

        .table-controls .search input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #396ebd;
            color: white;
        }

        .btn {
            background-color: #396ebd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
        }

        .btn:hover {
            background-color: #315a9d;
        }

        .action-buttons a {
            margin: 0 5px;
        }

        .back-to-home {
            margin-top: 10px;
            text-align: center;
        }

        .back-to-home a {
            text-decoration: none;
            color: #396ebd;
            transition: color 0.3s ease;
        }

        .back-to-home a:hover {
            color: #315a9d;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>
<body>

<?php
include("dbconnect.php");
$query = "SELECT * FROM manajemen";
$result = mysqli_query($conn, $query)

?>

<div class="container">
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="SIMANGU Logo">
            <h2>SIMANGU</h2>
        </div>
        <ul>
            <li><a href="#"> Profile</a></li>
            <li><a href="welcome2.php"> Home</a></li>
            <li><a href="#"> Notification</a></li>
            <li><a href="#"> About</a></li>
        </ul>
        <a href="logout2.php" class="logout"> Log out</a>
    </div>
    <div class="main-content">
        <div class="table-container">
            <div class="header">
                <h2>LAPORAN</h2>
            </div>
            <div class="table-controls">
                <div class="entries">
                    <label for="entries">Show</label>
                    <select id="entries">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <label for="entries">entries</label>
                </div>
                <div class="search">
                    <label for="search">Search:</label>
                    <input type="text" id="search">
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['Nama_barang']?> </td>
                        <td><?php echo $row['Kode_barang']?></td>
                        <td><?php echo $row['Tanggal_masuk']?> </td>
                        <td><?php echo $row['tanggal_keluar']?> </td>
                        <td><?php echo $row['Kategori']?> </td>
                        <td class="action-buttons">
                            <a href="editbarang.php?id=<?php echo $row['id'];?>" class="btn" role="button">✏</a>
                            <a href="delete.php?id=<?php echo $row['id']?>" class="btn" role="button">❌</a>
                        </td>
                    </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                    <!-- Tambahkan baris lain di sini -->
                </tbody>
            </table>
            <button class="btn"><a href="barangmasuk.php">Tambah Data </a></button>
            <div class="table-footer">
                <div class="info">Showing 1 to 1 of 1 entries</div>
            </div>
        </div>
        <div class="back-to-home">
            <a href="welcome2.php">Back to Home</a>
        </div>
    </div>
</div>
</body>
</html>