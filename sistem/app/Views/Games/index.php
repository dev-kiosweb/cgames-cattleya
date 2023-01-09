            <?php $this->extend('template'); ?>
            
            <?php $this->section('css'); ?>
            <?php $this->endSection(); ?>
            
            <?php $this->section('content'); ?>
            <div class="clearfix pt-5"></div>
            <div class="pt-5 pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <div class="section">
                                <div class="card-body shadow">
                                    <div class="text-center pt-4 pb-2">
                                        <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image']; ?>" class="mb-3" style="display: block; margin: 0 auto; border-radius: 10px !important;" width="120px" height="120px">
                                        <h4 class="mt-3 mb-0" style="font-size: 1.125rem;"><?= $games['games']; ?></h4>
                                        <small class="fs-12"><?= $games['subtitle']; ?></small>
                                </div>
                                    <div class="pb-3">
                                        <?= $games['konten']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">

                            <?= alert(); ?>
                            
                            <div class="pb-3">
                                <div class="section">
                                    <div class="card-body shadow">
                                        <div class="text-white text-center position-absolute num-page">1</div>
                                        <h5 style="margin-left: 55px; margin-top: 10px;">Input Data Game</h5>
                                        <?= $this->include('Target/' . $games['target']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="section">
                                    <div class="card-body shadow">
                                        <div class="text-white text-center position-absolute num-page">2</div>
                                        <h5 style="margin-left: 55px; margin-top: 10px;">Pilih Nominal Layanan</h5>
                                        <div class="row pt-4 pr-2 mb-2">
                                            <?php if (count($product) == 0): ?>
                                            <div class="col-12">
	                                            <div class="text-center">
		                                            <img src="https://i.postimg.cc/kGdNkX3z/empty-box.png" alt="" width="120">
			                                            <h6>Opps...</h6>
		                                            <p>Untuk saat ini belum ada produk nih :(</p>
	                                            </div>
                                            </div>
                                            <?php endif ?>
                                            <?php foreach ($product as $loop): ?>
                                            <div class="col-sm-4 col-6">
                                                <input type="radio" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" onchange="get_price(this.value);">
                                                <label for="product-<?= $loop['id']; ?>">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col fw-bold"><?= $loop['product']; ?></div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col fw-bold">Rp <?= $loop['price']; ?>,-</div>
                                                            </div>
                                                        </div>
                                                        </tr>
                                                        <div class="col-lg-3 col-1 m-auto">
                                                            <img src="<?= $loop['logo_url'] ?>" width="32" <?php if (!empty($loop['logo_url'])) { ?> style="margin-top: 0px; margin-bottom: 0px; margin-right: 0px; margin-left: -35px;" <?php } ?>>
                                                        </div>
                                                    </div>
                                                    </label>
                                                
                                            </div>
                                            <?php endforeach ?>
                                            <div class="col-md-12 mt-3 <?= $games['target'] == 'joki' ? '' : 'd-none'; ?>">
                                                <label class="text-white">Masukan Jumlah Star / Poin</label>
                                                <input type="number" class="form-control" name="quantity" autocomplete="off" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="section">
                                    <div class="card-body shadow">
                                        <div class="text-white text-center position-absolute num-page">3</div>
                                        <h5 style="margin-left: 55px; margin-top: 10px;">Pilih Pembayaran</h5>
                                        <div class="row pt-4 pr-2 mb-2">

                                            <?php if ($pay_balance === 'Y'): ?>
                                            <div class="col-sm-12 col-12">
                                                <input class="radio-nominal p-2 border rounded mb-3 method-list" type="radio" name="method" value="balance" id="method-balance">
                                                <label for="method-balance">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="ml-2 mr-2 pb-0">
                                                                <img src="<?= base_url(); ?>/assets/images/method/balance.png" class="rounded img-fluid mb-1" style="height: 40px;">
                                                                <p class="m-0" style="font-weight: normal;">Saldo Akun</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="ml-2 mt-2 text-right">
                                                                <p class="mb-0" style="font-weight: bold; font-size: 13px;" id="price-method-balance"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <?php endif ?>

                                            <?php foreach ($method as $loop): ?>
                                            <div class="col-sm-12 col-12">
                                                <input class="radio-nominal" type="radio" name="method" value="<?= $loop['id']; ?>" id="method-<?= $loop['id']; ?>">
                                                <label for="method-<?= $loop['id']; ?>">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="ml-2 mr-2 pb-0">
                                                                <img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" class="rounded img-fluid mb-1" style="height: 40px;">
                                                                <p class="m-0" style="font-weight: normal;"><?= $loop['method']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="ml-2 mt-2 text-right">
                                                                <p class="mb-0" style="font-weight: bold; font-size: 13px;" id="price-method-<?= $loop['id']; ?>"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="section">
                                    <div class="card-body shadow">
                                        <div class="text-white text-center position-absolute num-page">4</div>
                                        <h5 style="margin-left: 55px; margin-top: 10px;">Konfirmasi Pesanan</h5>
                                        <div class="form-group pt-4">

                                            <input type="text" name="wa" placeholder="Masukan No. Whatsapp" class="form-control" value="" required>

                                            <small class="mt-2 d-block mb-3">
                                                Dengan membeli otomatis saya menyutujui <a href="<?= base_url(); ?>/syarat-ketentuan/" target="_blank" class="text-warning">Ketentuan Layanan</a>.
                                            </small>
                                            <button type="button" class="btn btn-primary text-white" onclick="process_order();">Beli Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-detail">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-white animated bounceIn" style="background: var(--warna_2);">
                                        <div class="card-header border-bottom-0">
                                            <h5 class="text-white">Detail Pembelian</h5>
                                        </div>
                                        <div class="modal-body pt-0">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->endSection(); ?>
            
            <?php $this->section('js'); ?>
            <script>

                $("#formorder").modal('show');

                function get_price(id) {
                    
                    var quantity = $("input[name=quantity]").val();
                    
                    $.ajax({
                        url: '<?= base_url(); ?>/games/order/get-price/' + id,
                        data: 'quantity=' + quantity,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function(result) {
                            for (let price in result) {
                                $("#price-method-" + result[price].method).text('Rp ' + result[price].price);
                            }
                        }
                    });
                }

                function process_order() {
                    
                    <?php if ($games['target'] == 'joki'): ?>
                    
                    var user_id = $('.input-joki').map(function () {
                        return this.value;
                    }).get();
                    
                    user_id = JSON.stringify(user_id);

                    var zone_id = 'joki';
                    <?php else: ?>
                    var user_id = $("input[name=user_id]").val();
                    var zone_id = $("input[name=zone_id]").val();

                    if (zone_id == undefined) {
                        zone_id = $("select[name=zone_id]").val();
                    }
                    <?php endif; ?>

                    var product = $("input[name=product]:checked").val();
                    var method = $("input[name=method]:checked").val();

                    var wa = $("input[name=wa]").val();
                    
                    var quantity = $("input[name=quantity]").val();

                    if (user_id == '' || user_id == ' ') {
                        Swal.fire('Gagal', 'ID Player harus diisi', 'error');
                    } else if (zone_id == '' || zone_id == ' ') {
                        Swal.fire('Gagal', 'ID Player harus diisi', 'error');
                    } else if (product == '' || product == ' ') {
                        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
                    } else if (method == '' || method == ' ') {
                        Swal.fire('Gagal', 'Pilih metode pembayaran', 'error');
                    } else if (wa.length < 10 || wa.length > 14) {
                        Swal.fire('Gagal', 'Nomor Whatsapp tidak sesuai', 'error');
                    } else {
                        $.ajax({
                            url: '<?= base_url(); ?>/games/order/get-detail/' + product,
                            data: 'user_id=' + user_id + '&zone_id=' + zone_id + '&method=' + method + '&wa=' + wa + '&quantity=' + quantity,
                            type: 'POST',
                            dataType: 'JSON',
                            beforeSend: function() {
                                Swal.showLoading();
                            }, 
                            success: function(result) {

                                Swal.hideLoading();

                                if (result.status == true) {
                                    $("#modal-detail div div .modal-body").html(result.msg);

                                    $("#modal-detail").modal('show');
                                } else {
                                    Swal.fire('Gagal', result.msg, 'error');
                                }
                            }
                        });
                    }
                }
                
                $("input[name=quantity]").on('keyup', function() {
                    
                    var product = $("input[name=product]:checked").val();
                    
                    get_price(product);
                });
            </script>
            <?php $this->endSection(); ?>