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
                    <h4>Manage Data Transaksi</h4>
                    <span>transaksi</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manage</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="flashdata-transaksi" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                            <table id="print" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Id Order</th>
                                        <th>Nama Kasir</th>
                                        <th>Tanggal</th>
                                        <th>Total Bayar</th>
                                        <th>Uang</th>
                                        <th>Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="text-center">
                                        <?php $i = 1; ?>
                                        <?php foreach ($transaksi as $t) : ?>
                                            <td scope="row" class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $t['id_order']; ?></td>
                                            <td class="text-center"><?= $t['nama_user']; ?></td>
                                            <td class="text-center"><?= $t['tanggal']; ?></td>
                                            <td class="text-center"> Rp. <?= number_format($t['total_bayar']); ?></td>
                                            <td class="text-center"> Rp.<?= number_format($t['uang']); ?></td>
                                            <td class="text-center"> Rp.<?= number_format($t['kembali']); ?></td>
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