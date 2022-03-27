<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- <div class="form-head" style="background-image:url('images/background/bg3.jpg');background-position: bottom; ">
				<div class="container max d-flex align-items-center mt-0">
					<h2 class="font-w600 title text-white mb-2 mr-auto ">Dashboard</h2>
					<div class="weather-btn mb-2">
						<span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
						<select class="form-control style-1 default-select  mr-3 ">
							<option>Medan, IDN</option>
							<option>Jakarta, IDN</option>
							<option>Surabaya, IDN</option>
						</select>
					</div>
					<a href="javascript:void(0);" class="btn white-transparent mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
				</div>
			</div> -->
    <div class="container-fluid">
        <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
            <h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
            <div class="weather-btn mb-2">
                <span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i><?php echo date("D-M-Y"); ?></span>
                <!-- <select class="form-control style-1 default-select  mr-3 ">
                    <option>Medan, IDN</option>
                    <option>Jakarta, IDN</option>
                    <option>Surabaya, IDN</option>
                </select> -->
            </div>
            <!-- <a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a> -->
        </div>
        <div class="row">
            <div class="col-xl-4 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <img class="mb-3 currency-icon" width="80" height="80" src="<?= base_url(''); ?>/icons/orang.png">
                        <circle cx="40" cy="40" r="40" fill="white"></circle>

                        </img>
                        <h2 class="text-black mb-2 font-w600"><?= $total_user; ?></h2>
                        <p class="mb-0 fs-14">

                            <a href="<?= base_url('user/user'); ?>"> <span class="text-success mr-1">‎</span>user</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <img class="mb-3 currency-icon" width="80" height="80" src="<?= base_url(''); ?>/icons/masakan.png">

                        <h2 class="text-black mb-2 font-w600"><?= $total_menu; ?></h2>
                        <p class="mb-0 fs-13">

                            <a href="<?= base_url('menu/menu'); ?>"><span class="text-success mr-1">‎</span>menu</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <img class="mb-3 currency-icon" width="80" height="80" src="<?= base_url(''); ?>/icons/minuman.png">

                        <h2 class="text-black mb-2 font-w600"></h2>
                        <p class="mb-0 fs-14">
                            <span class="text-danger mr-1">‎</span>drinks
                        </p>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-4 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <img class="mb-3 currency-icon" width="80" height="80" src="<?= base_url(''); ?>/icons/wallet.png">

                        <h2 class="text-black mb-2 font-w600"><?= $total_transaksi; ?></h2>
                        <p class="mb-0 fs-14">
                            <a href="<?= base_url('order/transaksi'); ?>"><span class="text-success mr-1">‎</span>transaksi</a>
                        </p>
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