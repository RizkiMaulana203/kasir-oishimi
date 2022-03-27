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
                    <h4>Form Tambah Data Menu</h4>
                    <span>Menu</span>
                </div>
            </div>
            <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
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
                            <form action="<?= base_url('/menu/menu_tambah'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control input-default <?= ($validation->hasError('nama_menu')) ? 'is-invalid' : ''; ?>" name="nama_menu" id="nama_menu" value="<?= old('nama_menu'); ?>" placeholder="Masukan Nama Anda">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_menu'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Menu:</label>
                                    <select class="form-control default-select" id="jenis" <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?> name="jenis" id="jenis" value="<?= old('jenis'); ?>">
                                        <option value="makanan">makanan</option>
                                        <option value="minuman">minuman</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" class="form-control input-default <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" id="harga" value="<?= old('harga'); ?>" placeholder="Masukan harga Anda">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status Makanan:</label>
                                    <select class="form-control default-select" id="status_masakan" <?= ($validation->hasError('status_masakan')) ? 'is-invalid' : ''; ?> name="status_masakan" id="status_masakan" value="<?= old('status_masakan'); ?>">
                                        <option value="tersedia">tersedia</option>
                                        <option value="habis">habis</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_masakan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="dropify <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto" id="foto" value="<?= old('foto'); ?>" placeholder="Masukan foto Anda">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto'); ?>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="location.href='<?= base_url('menu/menu'); ?>'">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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