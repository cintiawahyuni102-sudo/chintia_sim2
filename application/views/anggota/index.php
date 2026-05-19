<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<div class="container-fluid" style="font-family: 'Inter', sans-serif;">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 text-gray-800">Data Anggota</h2>
        </div>

        <div class="d-flex align-items-center gap-2">

            <!-- FIX SEARCH (TIDAK MERUBAH DESIGN ASLI) -->
            <form method="GET" action="<?= site_url('anggota'); ?>">
                <input 
                    type="text" 
                    name="nama"
                    class="form-control form-control-sm search-box" 
                    placeholder="Cari anggota..."
                    value="<?= isset($nama) ? $nama : ''; ?>"
                >
            </form>

            <!-- FIX: tombol tambah -->
            <a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah
            </a>

        </div>
    </div>

    <!-- CARD -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                    <thead class="thead-light">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Anggota</th>
                            <th>Kontak</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- FIX AMAN DATA KOSONG -->
                        <?php $no = 1; ?>
                        <?php if(!empty($anggota)): ?>
                        <?php foreach ($anggota as $a): ?>

                        <tr>

                            <td class="text-center"><?= $no++ ?></td>

                            <!-- NAMA -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <?= strtoupper(substr($a->nama,0,1)); ?>
                                    </div>
                                    <div class="ml-2">
                                        <div class="fw-semibold"><?= $a->nama; ?></div>
                                        <small class="text-muted">ID: <?= $a->nomor_anggota; ?></small>
                                    </div>
                                </div>
                            </td>

                            <!-- KONTAK -->
                            <td class="text-center">
                                <div>
                                    <div><i class="fas fa-phone text-muted"></i> <?= $a->telepon; ?></div>
                                    <small class="text-muted"><?= $a->email; ?></small>
                                </div>
                            </td>

                            <!-- STATUS -->
                            <td class="text-center">
                                <?php if ($a->status == 'Aktif'): ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Nonaktif</span>
                                <?php endif; ?>
                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <a href="<?= site_url('anggota/edit/'.$a->id); ?>" class="btn btn-icon btn-edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="<?= base_url('anggota/hapus/'.$a->id); ?>" class="btn btn-danger btn-sm btn-hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Data tidak ditemukan</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<!-- STYLE (TETAP ASLI) -->
<style>
body {
    background: #f9fafb;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.btn-icon {
    border-radius: 8px;
    padding: 6px 10px;
    font-size: 13px;
    margin: 0 2px;
}

.btn-edit {
    background: #facc15;
    color: white;
}

.badge-success {
    background: #dcfce7;
    color: #16a34a;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 12px;
}

.badge-danger {
    background: #fee2e2;
    color: #dc2626;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 12px;
}

.search-box {
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    font-size: 13px;
}
</style>