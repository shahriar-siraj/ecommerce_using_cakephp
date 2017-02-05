
<body class="inabit_bg">

    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">
            <div class="row">
                 
                <div id="package-table" style="margin-bottom: 15px;">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php 
                                $index = 0;
                                foreach ($packages as $k => $v) {
                                    // If not Starter
                                    if ($v['id'] != 7) { 
                                        if ($index == 0) {
                                            $active = 'class="active"';
                                        } else {
                                            $active = '';
                                        }
                                    ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?= $index; ?>" <?= $active; ?>></li>
                                <?php 
                                    $index++; 
                                } }
                            ?>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php 
                            $index_on = 0;
                            foreach ($packages as $k => $v) {
                            // If not Starter
                            if ($v['id'] != 7) { 
                                $index_on++;
                                if ($index_on == 1) {
                                    $active_on = 'active';
                                } else {
                                    $active_on = '';
                                }
                            ?>
                            <!-- Item 1 -->
                            <div class="item <?= $active_on; ?> slide<?= $index_on ; ?>">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-12 text-center">
                                            <h3 data-animation="animated bounceInDown"><?= $v['name']; ?></h3>
                                            <h4 data-animation="animated bounceInUp">$<?= $v['price']; ?>/M</h4>   
                                            <img src="img/tick-icon.png" class="img-responsive" style="margin: 0px auto; width: 50px; margin-top: 65px;">
                                            <p class="small-table" style="margin-top: 15px;"><strong>LIMITED USAGE</strong></p>   
                                            <p>loren ipsum, lorem ipsum</p>
                                            <h4 class="small-table" style="margin-top: 25px !important;">30/M</h4>
                                            <p><strong>MONTHLY USERS</strong></p>
                                            <p>loren ipsum, lorem ipsum</p>
                                            <h4 class="small-table" style="margin-top: 48px !important; line-height: 5px;"><strong>100% Support</strong></p>
                                            <h4 class="small-table"><strong>FOR USERS</strong></p>
                                             <a class="mbr-buttons__btn btn btn-lg btn-info select-package-btn" href="<?php echo $this->Url->build(['controller' => 'packages', 'action' => 'choose', $v['id']]); ?>">SELECT</a> 
                                         </div>
                                    </div>
                                </div>
                            </div> 

                            <?php } } ?>
                    
                        </div>
                        <!-- End Wrapper for slides-->
                        <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
                        </a>!-->
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>