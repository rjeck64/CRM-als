<?php
// Query SQL untuk mengambil data dari tabel Pengaduan
$sql = "SELECT id_pengaduan, judul_laporan, SUBSTRING(isi_laporan, 1, 50) AS potongan_isi, tanggal_kejadian, plat_kendaraan, asal, tujuan, jam_keberangkatan, tanggal_keberangkatan, lampiran, anonim_rahasia FROM Pengaduan";
$result = $conn->query($sql);
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pengaduan</h4>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Judul Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Tanggal Kejadian</th>
                        <th>Anonim/Rahasia</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            // Menampilkan data untuk setiap baris
                            $no = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row["judul_laporan"] . "</td>";
                                echo "<td>" . $row["potongan_isi"] . "...</td>";
                                echo "<td>" . $row["tanggal_kejadian"] . "</td>";
                                echo "<td>" . ($row["anonim_rahasia"] ? 'Ya' : 'Tidak') . "</td>";
                                echo '<td>
                                        <button type="button" class="btn btn-inverse-info btn-icon">
                                            <i class="ti-notepad"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-rounded btn-icon">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                            <i class="ti-trash"></i>
                                        </button>
                                        </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>