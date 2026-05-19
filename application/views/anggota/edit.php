<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Edit Anggota</h2>

<div class="card shadow">
<div class="card-body">

<?php
// AMANIN supaya tidak error kalau NULL
$id = isset($anggota->id) ? $anggota->id : '';
$nama = isset($anggota->nama) ? $anggota->nama : '';
$alamat = isset($anggota->alamat) ? $anggota->alamat : '';
$telepon = isset($anggota->telepon) ? $anggota->telepon : '';
$email = isset($anggota->email) ? $anggota->email : '';
$tanggal = isset($anggota->tanggal_daftar) ? $anggota->tanggal_daftar : '';
?>

<?php if ($id != ''): ?>

<form method="post" action="<?= site_url('anggota/update/'.$id); ?>">

<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $nama; ?>" required>
</div>

<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?= $alamat; ?>" required>
</div>

<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telepon" class="form-control" value="<?= $telepon; ?>" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?= $email; ?>" required>
</div>

<div class="form-group">
    <label>Tanggal Daftar</label>
    <input type="date" name="tanggal_daftar" class="form-control" value="<?= $tanggal; ?>" required>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= site_url('anggota'); ?>" class="btn btn-secondary">Kembali</a>

</form>

<?php else: ?>

<div class="alert alert-warning">
    Data tidak bisa ditampilkan (ID ada tapi data kosong di database)
</div>

<a href="<?= site_url('anggota'); ?>" class="btn btn-secondary">Kembali</a>

<?php endif; ?>

</div>
</div>
</div>