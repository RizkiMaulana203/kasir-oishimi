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
                        <h4 class="card-title">Data Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="flashdata-transaksi" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Id Order</th>
                                        <th>keterangan</th>
                                        <th>No Meja</th>
                                        <th>Tanggal</th>
                                        <th>Kasir</th>
                                        <th>Detail Pesanan</th>
                                        <th>Status Order</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="text-center">
                                        <?php $i = 1; ?>
                                        <?php foreach ($order as $o) : ?>
                                            <td scope="row"><?= $i++; ?></td>
                                            <td class="text-center"><?= $o['id_order']; ?></td>
                                            <td class="text-center"><?= $o['keterangan']; ?></td>
                                            <td class="text-center"><?= $o['no_meja']; ?></td>
                                            <td class="text-center"><?= $o['tanggal']; ?></td>
                                            <td class="text-center"><?= $o['nama_user']; ?></td>
                                            <td>
                                                <table>
                                                    <thead>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <th>Menu</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <?php foreach ($detail_order->get_detail_order1($o['id_order']) as $d) :
                                                                $id_menu = $d['id_menu'];
                                                            ?>
                                                        <tr>
                                                            <td class="text-center"><?= $d['nama_menu']; ?></td>
                                                            <td class="text-center" class="text-center"><?= $d['jumlah']; ?></td>
                                                            <td class="text-center">Rp.<?= number_format($d['harga']); ?></td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="/order/pesan_detail_order/" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></a>
                                                                    <a href="/order/detail_order_edit/<?= $d['id_detail_order']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                                    <a href="/order/detaildelet/<?= $d['id_detail_order']; ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus" id="tombol-hapus" name="tombol-hapus"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                </thead>
                            </table>
                            </td>
                            <?php if ($o['status_order'] == "sudah bayar") : ?>
                                <td class="text-center">
                                    <span class="badge badge-success">
                                        <?= $o['status_order']; ?>
                                    </span>
                                </td>
                            <?php else : ?>
                                <td class="text-center">
                                    <span class="badge badge-info">
                                        <?= $o['status_order']; ?>
                                    </span>
                                <?php endif ?>

                                <td class="text-center"><?= $o['keterangan']; ?></td>
                                <td>

                                    <div class="d-flex">
                                        <a href="/order/order_bayar_new/<?= $o['id_order']; ?>" class="btn btn-success shadow btn-sm sharp mr-1"><i class="fas fa-money-bill-alt"></i></a>
                                        <a href="/order/order_hapus/<?= $o['id_order']; ?>" class="btn btn-danger shadow btn-sm sharp tombol-hapus" id="tombol-hapus" name="tombol-hapus"><i class="fa fa-trash"></i></a>
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