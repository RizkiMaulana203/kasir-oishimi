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
                    <h4><?= $title ?></h4>
                    <span>Transaksi</span>
                </div>
            </div>
            <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
                </ol>
            </div>
        </div>
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
                                        <th>Menu</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="text-center">
                                        <?php
                                        $no = 1;
                                        $total_bayar = 0;
                                        foreach ($detail_order as $d) :
                                            $id_order = $d['id_order'];
                                            $id_menu = $d['id_menu'];
                                            $harga = $d['harga'];
                                            $jumlah = $d['jumlah'];

                                            $total_bayar += $harga * $jumlah;
                                        ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $d['nama_menu']; ?></td>
                                        <td class="text-center" class="text-center"><?= $jumlah; ?></td>
                                        <td class="text-center">Rp.<?= number_format($harga); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="3">
                                        <h4><b>Total Bayar :</b></h4>
                                    </td>
                                    <td class="text-center"> Rp.<?= number_format($total_bayar) ?></td>
                                </tr>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <?php if (session()->get('error')) : ?>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="alert alert-danger " role="alert">
                                            <div class="alert-body">
                                                <?= session()->get('error'); ?>
                                                <?= session()->remove('error'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url('/order/order_bayar'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group">

                                    <input type="hidden" name="id_order" id="id_order" value="<?= $id_order ?>">

                                    <input type="hidden" value="<?= session()->get('id_user'); ?>" name="id_user">
                                    <input type="hidden" name="kembali">
                                    <input type="hidden" name="jumlah">
                                    <input type="hidden" name="harga">

                                    <div class=" form-group">
                                        <!-- <label>Total Bayar :</label> -->
                                        <input type="text" class="form-control input-default <?= ($validation->hasError('total_bayar')) ? 'is-invalid' : ''; ?>" name="total_bayar" id="total_bayar" value="<?= $total_bayar; ?>">
                                        <div class=" invalid-feedback">
                                            <?= $validation->getError('total_bayar'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Bayar</label>
                                        <input type="number" min="0" class="form-control input-default <?= ($validation->hasError('uang')) ? 'is-invalid' : ''; ?>" name="uang" id="uang" value="<?= old('uang'); ?>" placeholder="Masukan Uang">
                                        <div class=" invalid-feedback">
                                            <?= $validation->getError('uang'); ?>
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