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
                    <h4>Manage Data Menu</h4>
                    <span>menu</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manage</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="flashdata-menu" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Foto</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $i = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <td scope="row"><?= $i++; ?></td>
                                            <td><?= $m['nama_menu']; ?></td>
                                            <td><?= $m['jenis']; ?></td>
                                            <td>Rp.<?= number_format($m['harga']); ?></td>
                                            <?php if ($m['status_masakan'] == "tersedia") : ?>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <?= $m['status_masakan']; ?>
                                                    </span>
                                                </td>
                                            <?php else : ?>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <?= $m['status_masakan']; ?>
                                                    </span>
                                                <?php endif ?>
                                                <td><img src="<?= base_url('./foto/menu/' . $m['foto']); ?>" alt="" style="max-width: 100px; border-radius: 10px;"></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="/menu/menu_edit/<?= $m['id_menu']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        <a href="/menu/menu_hapus/<?= $m['id_menu']; ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus" id="tombol-hapus" name="tombol-hapus"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                    </tr>
                                <?php endforeach; ?>

                                </tbody>
                            </table>
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