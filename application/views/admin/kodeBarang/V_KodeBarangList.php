<!-- Tambah Kode Barang -->
<div class="modal fade" id="mTambahKodeBarang" aria-hidden="true">
    <div class="modal-dialog modal-l" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Tambah Kode Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="perangkatBaru">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="nameExLarge" class="form-label">Kode Barang</label>
                            <input type="text" id="kodeBarang" name="kodeBarang" class="form-control" placeholder="3.10.01.02.002" />
                            <br>
                            <label for="nameExLarge" class="form-label">Nama Kode Barang</label>
                            <input type="text" id="namaKB" name="namaKB" class="form-control" placeholder="PC Unit" />
                        </div>
                        <div class="col-6 mb-3">
                            <br>
                            <p style="color: grey;">Catatan : <br> Masukan Kode Barang Sesuai dengan yang Tercatat pada
                                SIMAK Contoh : <br> - Kode Barang : 3.10.01.02.002 <br> - Nama Barang : Laptop </p>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="btn_simpanKodeBarang">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Update KodeBarang -->
<div class="modal fade" id="mEditKdBarang" aria-hidden="true">
    <div class="modal-dialog modal-l" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Tambah Kode Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="perangkatBaru">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <input type="text" id="id_edit" name="id_edit" hidden />
                            <label for="nameExLarge" class="form-label">Kode Barang</label>
                            <input type="text" id="kodeBarang_edit" name="kodeBarang_edit" class="form-control" placeholder="3.10.01.02.002" />
                            <br>
                            <label for="nameExLarge" class="form-label">Nama Kode Barang</label>
                            <input type="text" id="namaKB_edit" name="namaKB_edit" class="form-control" placeholder="PC Unit" />
                        </div>
                        <div class="col-6 mb-3">
                            <br>
                            <p style="color: grey;">Catatan : <br> Masukan Kode Barang Sesuai dengan yang Tercatat pada
                                SIMAK Contoh : <br> - Kode Barang : 3.10.01.02.002 <br> - Nama Barang : Laptop </p>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="btn_updateKodeBarang">Update changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Gagal Simpan Modal -->
<div id="mGagalSimpan" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box" style="background-color: red;">
                    <i class="material-icons">report_problem</i>
                </div>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="text-align: center;">Error!!</h4>
                </br>
                <span id="pesanError"></span>
            </div>
        </div>
    </div>
</div>

<!-- OK Simpan Modal -->
<div id="mSuksesSimpan" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="text-align: center;">Success!</h4>
                </br>
                <p class="text-center"><span id="pesanSukses"></span>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"></span> Master Kode Barang
        </h4>

        <a href="#" class="btn rounded-pill btn-info" data-bs-toggle="modal" data-bs-target="#mTambahKodeBarang">
            Tambah Kode Barang </br></a>
        <span><br><br></span>

        <div class="row">
            <div class="card" style="padding: 50px;">
                <h5 class="card-header">Daftar Kode Barang</h5>
                <div class="table-responsive text-nowrap">
                    <table id="mydata" class="table">
                        <thead>
                            <tr class="text-nowrap" style="text-align:center;">
                                <th style="text-align:center;">#</th>
                                <th style="text-align:center;">Kode Barang</th>
                                <th style="text-align:center;">Nama</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- / Content -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , IDM
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>

<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core S -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?php echo base_url() ?>/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/libs/popper/popper.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url() ?>/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?php echo base_url() ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?php echo base_url() ?>/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?php echo base_url() ?>/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    $(document).ready(function() {
        $("input[name$='radioExcel']").click(function() {
            var number = $(this).val();
            $("div.radioExcel").hide();
            $("#radioExcel" + number).show();
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        tampil_data(); //pemanggilan fungsi tampil barang.

        $('#mydata').dataTable();

        $('#mydata').on('click', function(e) {
            var id = $(e.target).closest('tr').find(".id").html();
        })

        function addRowHandlers() {
            var table = document.getElementById("mydata");
            var rows = table.getElementsByTagName("tr");
            for (i = 0; i < rows.length; i++) {
                var currentRow = table.rows[i];
                var createClickHandler =
                    function(row) {
                        return function() {
                            var cell = row.getElementsByTagName("td")[1];
                            var id = cell.innerHTML;

                            // console.log(id)
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url() ?>/ajax_thumbnail',
                                dataType: "JSON",
                                data: {
                                    ids: id
                                },
                                success: function(data) {
                                    // console.log(data);
                                    for (i = 0; i < data.length; i++) {
                                        // console.log(data[i].thumbnails);

                                        tampil_thumbnail(data[i].thumbnails)
                                        tampil_deskripsi(data[i].kode_barang, data[i].item_name,
                                            data[i].kategori, data[i].merk, data[i]
                                            .item_header_id)

                                        // console.log(data[i].kode_barang, data[i].item_name,
                                        //     data[i].kategori, data[i].merk, data[i]
                                        //     .item_header_id);
                                    }
                                }

                            });
                            // alert("id:" + id);
                        };
                    };
                currentRow.onclick = createClickHandler(currentRow);


            }
        }
        window.onload = addRowHandlers();
        //fungsi tampil barang
        function tampil_data() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>/ajax_kode-barang',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var c = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr style="text-align:center;">' +
                            '<td>' + c++ + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td style="text-align:center;">' + data[i].kode_barang + '</td>' +
                            '<td style="text-align:center;">' +
                            '<a href="#javascript:;" class="btn btn-warning item_edit" data="' +
                            data[i].category_id + '">Edit</a>' +
                            // '<a href="#javascript:;" class="btn btn-danger " data="' + data[i].barang_kode + '">Hapus</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        //GET UPDATE
        $('#show_data').on('click', '.item_edit', function() {
            var ids = $(this).attr('data');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('ajax_kdBarang') ?>",
                dataType: "JSON",
                data: {
                    ids: ids
                },
                success: function(data) {
                    $('#mEditKdBarang').modal('show');
                    var i;
                    for (i = 0; i < data.length; i++) {
                        $('[name="id_edit"]').val(data[0].category_id);
                        $('[name="kodeBarang_edit"]').val(data[0].kode_barang);
                        $('[name="namaKB_edit"]').val(data[0].name);
                    }
                },
                error: function(data, jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    console.log(textStatus);
                }
            });
            return false;
        });

        //Simpan Barang
        $('#btn_simpanKodeBarang').on('click', function() {
            var data = new FormData();

            namaKB = $('#namaKB').val();
            kodeBarang = $('#kodeBarang').val();

            data.append("namaKB", namaKB);
            data.append("kodeBarang", kodeBarang);

            // console.log(data.append());
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>/Smt_kobar',
                dataType: "JSON",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {

                    if (data.error) {
                        $('#mTambahKodeBarang').modal('hide');
                        $('#mGagalSimpan').modal('show');

                        let isError = data.error;
                        let pesanError = data.pesanError;
                        document.getElementById("pesanError").innerHTML = pesanError;

                    }
                    if (data.success) {
                        $('#namaKB').val("");
                        $('#kodeBarang').val("");
                        $('#mTambahKodeBarang').modal('hide');

                        var oTable = $("#mydata").dataTable();
                        oTable.fnDestroy();

                        tampil_data();
                        $('#mydata').DataTable();
                        let pesanSukses = data.pesanSukses;
                        document.getElementById("pesanSukses").innerHTML = pesanSukses;


                        $('#mSuksesSimpan').modal('show');
                        // addRowHandlers();



                    }
                }
            });
            return false;
        });

        // Update Barang
        $('#btn_updateKodeBarang').on('click', function() {
            var data = new FormData();

            namaKB = $('#namaKB_edit').val();
            kodeBarang = $('#kodeBarang_edit').val();
            id = $('#id_edit').val();

            data.append("namaKB", namaKB);
            data.append("id", id);
            data.append("kodeBarang", kodeBarang);

            // console.log(data.append());
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>/Up_kobar',
                dataType: "JSON",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {

                    if (data.error) {
                        $('#mEditKdBarang').modal('hide');
                        $('#mGagalSimpan').modal('show');

                        let isError = data.error;
                        let pesanError = data.pesanError;
                        document.getElementById("pesanError").innerHTML = pesanError;

                    }
                    if (data.success) {
                        $('#namaKB').val("");
                        $('#kodeBarang').val("");
                        $('#mEditKdBarang').modal('hide');

                        var oTable = $("#mydata").dataTable();
                        oTable.fnDestroy();

                        tampil_data();
                        $('#mydata').DataTable();
                        let pesanSukses = data.pesanSukses;
                        document.getElementById("pesanSukses").innerHTML = pesanSukses;


                        $('#mSuksesSimpan').modal('show');
                        // addRowHandlers();



                    }
                }
            });
            return false;
        });

    });
</script>

</body>

</html>