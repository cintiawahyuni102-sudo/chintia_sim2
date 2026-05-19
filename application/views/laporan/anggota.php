<div class="container-fluid">
    <h3>Laporan Anggota</h3>

    <form method="get">
        <input type="text" name="nama"
        placeholder="Masukkan Nama"
        value="<?= isset($nama) ? $nama : ''; ?>">

        <button type="submit" class="btn btn-primary btn-sm">
            Filter
        </button>

        <a href="<?= site_url('laporan/anggota'); ?>"
        class="btn btn-secondary btn-sm">
            Reset
        </a>
    </form>

    <br>

    <a href="<?= site_url('laporan/cetak_anggota?nama=' . (isset($nama) ? $nama : '')); ?>"
    target="_blank"
    class="btn btn-success btn-sm">
        Cetak PDF
    </a>

    <br><br>

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>

        <?php $no=1; foreach($data as $d): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->id; ?></td>
            <td><?= $d->nama; ?></td>
            <td><?= $d->email; ?></td>
            <td><?= $d->alamat; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>