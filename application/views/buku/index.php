<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Data Buku</h2>

<a href="<?= site_url('buku/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah
</a>

<div class="card shadow mb-4">
<div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="thead-dark">
<tr>
    <th>No</th>
    <th>Kode Buku</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Kategori</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($buku as $b): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $b->kode_buku; ?></td>
    <td><?= $b->judul_buku; ?></td>
    <td><?= $b->penulis; ?></td>
    <td><?= $b->nama_kategori; ?></td>
    <td><?= $b->stok; ?></td>
    <td>
        <!-- INI YANG DIUBAH -->
        <a href="<?= site_url('buku/edit/'.$b->kode_buku); ?>">Edit</a>
        <a href="<?= site_url('buku/hapus/'.$b->kode_buku); ?>"
        onclick="return confirm('yakin?')">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>

</table>
</div>
</div>
</div>