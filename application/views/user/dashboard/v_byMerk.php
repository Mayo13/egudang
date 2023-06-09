<div class="col-xl-9 col-lg-8 col-md-7">
    <!-- Start Filter Bar -->
    <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting mr-auto">
            <select id="showItem" onchange="showItemqty()">
                <option value="16">Show 16</option>
                <option value="28">Show 28</option>
                <option value="40">Show 40</option>
            </select>
        </div>

        <!-- <div class="pagination"> -->
        <nav aria-label="Page navigation example">
            <?php echo $pagination; ?>
        </nav>

    </div>
    <!-- End Filter Bar -->
    <!-- Start Best Seller -->
    <section class="lattest-product-area pb-40 category-list">
        <div class="row">
            <?php if (!empty($result)) : ?>
            <?php foreach ($result as $data) : ?>
            <?php $content = substr($data['desc'], 0, 50) . " ..."; ?>
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <a href="<?php echo base_url('products_detail/') . $data['products_id'] ?>"> <img class="img-fluid"
                            src="<?= $data['images']; ?>" style="width: 300px;
								height: 200px;
								object-fit: fill;" alt="">
                        <div class="product-details">
                            <h6><?= $data['name']; ?></h6>
                            <div class="price">
                                <!-- <h6><?= $data['desc']; ?></h6> -->
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            </br>

            <div class="col-lg-12 col-md-6" style="text-align: center;">

                <h6 style="text-align: center; padding-top: 10%; padding-bottom:10% ;">Produk Tidak Ditemukan</h6>

            </div>
            <?php endif; ?>



        </div>
    </section>


    <!-- End Best Seller -->
    <!-- Start Filter Bar -->
    <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting mr-auto">
            <select id="showItem2" onchange="showItemqty2()">
                <option value="16">Show 16</option>
                <option value="28">Show 28</option>
                <option value="40">Show 40</option>
            </select>
        </div>
        <!-- <div class="pagination"> -->
        <nav aria-label="Page navigation example">
            <?php echo $pagination; ?>
        </nav>

    </div>
    <!-- End Filter Bar -->
</div>
</div>
</div>


<!-- start footer Area -->
<?php $this->load->view('user/template/4_footer'); ?>
<!-- End footer Area -->

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
function showItemqty() {
    var data = new FormData();

    data.append("showItem", $('#showItem').val());

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>set_showItem',
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            location.reload();
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
    return false;
}

function showItemqty2() {
    var data = new FormData();

    data.append("showItem", $('#showItem2').val());

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>set_showItem',
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            location.reload();
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
    return false;
}
</script>



</body>

</html>