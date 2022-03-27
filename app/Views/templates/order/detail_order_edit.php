<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>

<!--**********************************
          Content body start
      ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- Add Project -->
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="text-black font-w500">Project Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Deadline</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Client Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Form Edit Data Transaksi</h4>
                    <span>Transaksi</span>
                </div>
            </div>
            <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="/order/detail_order_update/<?= $detail_order['id_detail_order']; ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_detail_order" value="<?= $detail_order['id_detail_order']; ?>">
                                <input type="hidden" name="id_order" value="<?= $detail_order['id_order']; ?>">
                                <div class="form-group">
                                    <label>Menu :</label>
                                    <select class="form-control default-select" id="id_menu" <?= ($validation->hasError('id_menu')) ? 'is-invalid' : ''; ?> name="id_menu" id="id_menu" value="<?= (old('id_menu')) ? old('id_menu') : $detail_order['id_menu']; ?>">
                                        <option value="">Pilih Menu</option>
                                        <?php foreach ($menu as $u) : ?>
                                            <option value="<?= $u['id_menu']; ?>" <?= $detail_order['id_menu'] == $u['id_menu'] ? 'selected' : null ?>><?= $u['nama_menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_menu'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah :</label>
                                    <input type="number" class="form-control input-default <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" name="jumlah" id="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $detail_order['jumlah']; ?>" placeholder="Masukan jumlah">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlah'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control input-default <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan" id="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $detail_order['keterangan']; ?>" placeholder="Masukan Keterangan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary mt-4" onclick="location.href='<?= base_url('order/order'); ?>'">Batal</button>
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
          Content body end
      ***********************************-->

<?= $this->endSection(); ?>