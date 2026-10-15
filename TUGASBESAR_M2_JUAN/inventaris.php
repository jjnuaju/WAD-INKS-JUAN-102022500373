<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id          = mysqli_real_escape_string($koneksi, $_POST['id_inventaris']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $merek       = mysqli_real_escape_string($koneksi, $_POST['merek']);
    $kondisi     = mysqli_real_escape_string($koneksi, $_POST['kondisi']);

    if (empty($id)) {
        $query = "INSERT INTO inventaris (nama_barang, merek, kondisi) VALUES ('$nama_barang', '$merek', '$kondisi')";
    } else {
        $query = "UPDATE inventaris SET nama_barang='$nama_barang', merek='$merek', kondisi='$kondisi' WHERE id_inventaris='$id'";
    }
    mysqli_query($koneksi, $query);
    header("Location: inventaris.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['hapus']);
    mysqli_query($koneksi, "DELETE FROM inventaris WHERE id_inventaris='$id'");
    header("Location: inventaris.php");
    exit();
}

$edit_data = ['id_inventaris' => '', 'nama_barang' => '', 'merek' => '', 'kondisi' => 'Bagus'];
if (isset($_GET['edit'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['edit']);
    $result = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE id_inventaris='$id'");
    if (mysqli_num_rows($result) > 0) {
        $edit_data = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Inventaris - Sistem Manajemen Kos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="sidebar">
        <div class="brand">🏢 Manajemen Kos</div>
        <ul class="sidebar-menu">
            <li><a href="index.php">📊 Dashboard</a></li>
            <li><a href="kamar.php">🖈 Modul Kamar</a></li>
            <li><a href="penghuni.php">👥 Modul Penghuni</a></li>
            <li><a href="housekeeper.php">🧹 Modul Housekeeper</a></li>
            <li><a href="inventaris.php" class="active">📦 Modul Inventaris</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="top-header">
            <div>
                <h1>Modul Inventaris Aset Kos</h1>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Kelola master barang inventaris (AC, Kasur, Lemari, TV) dan kondisinya.</p>
            </div>
            <div class="user-profile">
                <div class="user-avatar">J</div>
                <span style="font-size: 0.875rem; font-weight: 600;">Juan / Admin</span>
            </div>
        </div>

        <form method="POST" action="">
            <input type="hidden" name="id_inventaris" value="<?= htmlspecialchars($edit_data['id_inventaris']); ?>">
            
            <label>Nama Barang:</label>
            <input type="text" name="nama_barang" value="<?= htmlspecialchars($edit_data['nama_barang']); ?>" placeholder="Contoh: AC 1 PK / Kasur Springbed / TV 32 Inch" required>

            <label>Merek:</label>
            <input type="text" name="merek" value="<?= htmlspecialchars($edit_data['merek']); ?>" required placeholder="Contoh: Sharp / Olympic / LG / Panasonic">

            <label>Kondisi Fisik:</label>
            <select name="kondisi" required style="width: 100%; padding: 10px 14px; margin-bottom: 16px; border: 1px solid var(--border-color); border-radius: 8px; font-size: 0.9rem;">
                <option value="Bagus" <?= $edit_data['kondisi'] == 'Bagus' ? 'selected' : ''; ?>>Bagus</option>
                <option value="Rusak Ringan" <?= $edit_data['kondisi'] == 'Rusak Ringan' ? 'selected' : ''; ?>>Rusak Ringan</option>
                <option value="Rusak Berat" <?= $edit_data['kondisi'] == 'Rusak Berat' ? 'selected' : ''; ?>>Rusak Berat</option>
            </select>

            <button type="submit" name="simpan">Simpan Data Barang</button>
        </form>

        <h3 style="margin-bottom: 16px;">Daftar Inventaris Aset Kos</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Merek</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM inventaris ORDER BY id_inventaris DESC");
                while ($row = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><b><?= htmlspecialchars($row['nama_barang']); ?></b></td>
                    <td><?= htmlspecialchars($row['merek']); ?></td>
                    <td>
                        <?php 
                        if ($row['kondisi'] == 'Bagus') {
                            echo '<span style="color: var(--success); font-weight: 600;">Bagus</span>';
                        } else if ($row['kondisi'] == 'Rusak Ringan') {
                            echo '<span style="color: #f59e0b; font-weight: 600;">Rusak Ringan</span>';
                        } else {
                            echo '<span style="color: var(--danger); font-weight: 600;">Rusak Berat</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="inventaris.php?edit=<?= $row['id_inventaris']; ?>">Edit</a> | 
                        <a href="inventaris.php?hapus=<?= $row['id_inventaris']; ?>" onclick="return confirm('Yakin hapus data barang ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>