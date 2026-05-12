<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800"></h2>

<div class=""card shadow>
    <div class="card body">
<form method="post" action="<?= site_url('peminjaman/simpan'); ?>">

<div class="form-group">
    <label>Anggota</label>
    <select name="anggota_id" class="form-control" required>
        <?php foreach($anggota as $a): ?>
            <option value="<?= $a->Nomor_anggota; ?>"><?= $a->Nama; ?></option>
            <?php endforeach; ?>
        </select>
</div>

<div class="form-group">
    <label>Buku</label>
    <select name="id_buku" class="form-control" required>
        <?php foreach($buku as $b): ?>
            <option value="<?= $b->id_buku; ?>"><?= $b->judul; ?></option>
            <?php endforeach; ?>
        </select>
</div>


<div class="form-group">
    <label>Tanggal Jatuh Tempo</label>
    <input type="date" name="tanggal_jatuh_tempo" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>


</form>
</div>
</div>
</div>