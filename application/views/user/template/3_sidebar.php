<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <div class="card-body">
                    <div class="scrollable">
                        <ul>
                            <?php foreach ($category as $data) : ?>
                                <li class="list-group-item"><a style="color: black;" href="<?php echo base_url('category/') . $data['category_id'] . '/0' ?> "><?php echo $data['name_category'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-filter">
                    <div class="top-filter-head">Merk Filters</div>
                    <div class="card-body">
                        <div class="scrollable">
                            <!-- <ul class="list-group"> -->
                            <ul>
                                <?php foreach ($merk as $data) : ?>
                                    <li class="list-group-item"><a style="color: black;" href="<?php echo base_url('merk/') . $data['merk_id'] . '/0' ?> "><?php echo $data['name_merk'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>