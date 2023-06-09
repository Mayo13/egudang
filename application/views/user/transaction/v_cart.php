<section class="cart_area" style="background-color: #eee; margin-top: -8%; ">

    <div class="container">

        <div class="cart_inner">
            <!-- <h2 style="text-align: center;">Daftar Barang</h2>
            <br> -->

            <section class="h-100 h-custom"
                style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-4">

                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Kembali
                                                </a></h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-1">Daftar Permintaan Barang</p>
                                                    <p class="mb-0">Anda memiliki
                                                        <span><?php echo $count ?></span>
                                                        Barang
                                                        di dalam Daftar
                                                    </p>
                                                </div>
                                            </div>
                                            <?php $i = 1; ?>
                                            <?php foreach ($cart as $data) : ?>
                                            <?php $content = substr($data['descs'], 0, 50) . " ...";
                                                ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between ">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <input hidden type="text" id="idi_<?php echo $i ?>"
                                                                name="idi" class="form-control"
                                                                value="<?= $data['cart_id']; ?>" />

                                                            <div>
                                                                <img src="<?= $data['images']; ?>"
                                                                    class="img-fluid rounded-3" alt="Shopping item"
                                                                    style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5 style="margin-left: 5%;"><?= $data['name']; ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 70px;">
                                                                <h5 class="mb-0">Qty</h5> <br>
                                                                <input type="text" id="qty_<?php echo $i ?>" name="qty"
                                                                    class="form-control"
                                                                    value="<?= $data['quantity']; ?>"
                                                                    onchange="updateQty(<?php echo $i ?>)" />
                                                            </div>
                                                            <div style=" width: 10px;">
                                                            </div>
                                                            <div style="width: 100px;">
                                                                <h5 class="mb-0">Alasan</h5> <br>
                                                                <select id="reason_<?php echo $i ?>"
                                                                    onchange="updateReason(<?php echo $i ?>)">
                                                                    <?php foreach ($reason as $as) { ?>
                                                                    <?php if ($data['reason_id'] == $as['reason_id']) : ?>
                                                                    <option selected
                                                                        value="<?php echo $data['reason_id'] ?>">
                                                                        <?php echo $data['title'] ?> </option>
                                                                    <?php else : ?>
                                                                    <option value="<?php echo $as['reason_id'] ?>">
                                                                        <?php echo $as['title'] ?> </option>
                                                                    <?php endif; ?>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                            <div style="width: 100px;">
                                                                <br><br>
                                                                <a href="#" id="btn_hapus_cart"
                                                                    onclick="hapus_item_onCart(<?php echo $i ?>)"
                                                                    class="btn"><span class="lnr lnr-trash"
                                                                        style="color: red;"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <br>
                                                        <span>Tulisakan Alasan</span><br>
                                                        <textarea id="txtdesc<?php echo $i ?>" name="txtdesc" rows="2"
                                                            cols="60" onchange="updateDesc()"></textarea>
                                                        <br>

                                                        <button class="buttonsa<?php echo $i ?>"
                                                            onclick="tet('a'+<?php echo $i ?>)"
                                                            value="Barang Sudah Habis">Barang Sudah Habis</button>
                                                        <button class="buttonsb<?php echo $i ?>"
                                                            onclick="tet('b'+ <?php echo $i ?>)"
                                                            value="Barang Sudah Hilang">Barang Sudah Hilang</button>
                                                        <button class="buttonsc<?php echo $i ?>"
                                                            onclick="tet('c'+<?php echo $i ?>)"
                                                            value="Sebagai Persediaan Stok">Sebagai Persediaan
                                                            Stok</button>
                                                        <button class="buttonsd<?php echo $i ?>"
                                                            onclick="tet('d'+<?php echo $i ?>)"
                                                            value="Barang telah rusak">Barang telah rusak</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                            <?php endforeach; ?>

                                        </div>
                                        <div class="col-lg-5">
                                            <br>
                                            <div class="card text-white rounded-3"
                                                style="line-height: 30px; border-radius: 50px;">
                                                <div class="card-body" style="color: black;">
                                                    <br>
                                                    <p class="mb-2" style="text-align: center;">Daftar Permintaan Barang
                                                    </p>
                                                    <hr>
                                                    <form class="mt-4">
                                                        <table class="table table-bordered table-sm rounded">
                                                            <thead class="alert-info">
                                                                <tr>
                                                                    <th scope="col" style="text-align: center;">Nama
                                                                        Barang</th>
                                                                    <th scope="col" style="text-align: center;">Total
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="show_data">
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="card text-white rounded-3"
                                                style="height: 400px; line-height: 30px; border-radius: 50px; color: black;">
                                                <div class="card-body" style="color: black;">
                                                    <p class="mb-2" style="text-align: center;">Proses Permintaan Barang
                                                    </p>
                                                    <hr>
                                                    <form class="mt-4">
                                                        <p class="mb-2">Isikan Nomor Surat</p>
                                                        <div class="form-outline form-white mb-4">
                                                            <input type="text" id="nosurat"
                                                                class="form-control form-control-lg" siez="17"
                                                                placeholder="Nomor Surat" />
                                                            <!-- <label class="form-label" for="typeName">Nomor Surat</label> -->
                                                        </div>
                                                        <p class="mb-2">Isikan Tanggal Surat</p>
                                                        <div class="form-outline form-white mb-4">
                                                            <input type="date" id="tglsurat"
                                                                class="form-control form-control-lg" siez="17"
                                                                placeholder="Nomor Surat" />
                                                            <!-- <label class="form-label" for="typeName">Nomor Surat</label> -->
                                                        </div>
                                                    </form>

                                                    <hr class="my-4">

                                                    <button type="button" onclick="submit_cart()"
                                                        class="btn btn-info btn-block btn-lg"
                                                        style="border-radius: 20px;">

                                                        <!-- <span>$4818.00</span> -->
                                                        <span style="text-align: center;">Kirim</span>

                                                    </button>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

</div>
</div>
<!-- start footer Area -->
<?php $this->load->view('user/template/4_footer'); ?>
<!-- End footer Area -->
</div>
</div>


<script src="<?php echo base_url('assets/js/vendor/jquery-3.6.4.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.ajaxchimp.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nice-select.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.sticky.js') ?>"></script>
<script src="<?php echo base_url('assets/js/nouislider.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<!-- <script src="<?php echo base_url('assets/js/gmaps.min.js') ?>"></script> -->
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>

<script>
tampilSummary();

function tet(ids) {
    const firstChar = ids.charAt(0);
    let lastChar = ids.substring(1);

    var iddesc = '#txtdesc' + lastChar;
    var idbuttons = '.buttons' + ids;


    idx = iddesc;
    cntrl = $(idbuttons).val();
    // idx = "#txt-area" + lastChar;

    // var cntrl = $(this).html();  
    // alert(ids);
    $(idx).val(function(_, val) {
        return val + cntrl + ", "
    });

    // console.log(idx);
    // console.log(idbuttons);
    console.log(cntrl);
}

function updateQty(id) {
    var qtys = "#qty_" + id;
    var ids = "#idi_" + id;
    var idi = $(ids).val();
    var qty = $(qtys).val();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>/update_QtyCart',
        dataType: "JSON",
        data: {
            idi: idi,
            qty: qty,
        },
        success: function(data) {
            if (data.error) {
                console.log("error : ".data.pesan);
            }
            if (data.success) {
                tampilSummary();
            }
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
}

function updateReason(id) {
    var idi = "#idi_" + id;
    var idr = "#reason_" + id;
    var idi = $(idi).val();
    var reason = $(idr).val();

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>/update_ReasonCart',
        dataType: "JSON",
        data: {
            idi: idi,
            reason: reason,
        },
        success: function(data) {
            // location.reload();
            if (data.error) {}
            if (data.success) {}
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
}

function updateDesc() {
    var idi = $('#idi').val();
    var desc = $('#txt-area').val();

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>/update_DescCart',
        dataType: "JSON",
        data: {
            idi: idi,
            desc: desc,
        },
        success: function(data) {
            console.log(data);
            if (data.error) {}
            if (data.success) {}
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
}

function tampilSummary() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url() ?>/get_summarycart',
        async: false,
        dataType: 'json',
        success: function(data) {
            var html = '';
            var i;
            var c = 1;
            for (i = 0; i < data.length; i++) {
                // console.log(data[i].item_header_id)
                html += '<tr style="text-align:center;">' +
                    '<td>' + data[i].name + '</td>' +
                    '<td>' + data[i].quantity + '</td>' +
                    '</tr>';
            }
            $('#show_data').html(html);
        }
    });
}

function hapus_item_onCart(id) {
    let text = "Apakah Anda yakin menghapus Item ini ?";
    if (confirm(text) == true) {
        var idr = "#idi_" + id;
        var kode = $(idr).val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('del_item_cart') ?>",
            dataType: "JSON",
            data: {
                kode: kode
            },
            success: function(data) {

                location.reload();
            },
            error: function(data, jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                console.log(textStatus);
            },
        });
    } else {
        text = "You canceled!";
    }
    return false;
}

function submit_cart() {
    var no = $('#nosurat').val();
    var tgl = $('#tglsurat').val();
    // var tgl = new Date($('#tgl_surat').val());

    $.ajax({
        type: "POST",
        url: "<?php echo base_url('sub_cart') ?>",
        dataType: "JSON",
        data: {
            no: no,
            tgl: tgl
        },
        success: function(data) {
            console.log(data);

        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });

    return false;
}

// $('#btn_hapus_cart').on('click', function() {

// });
</script>

</body>

</html>