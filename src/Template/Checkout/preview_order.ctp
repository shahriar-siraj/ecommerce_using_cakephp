
<body class="inabit_white">
    <section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
        <div class="container">

            <div class="row">
                <h3 class="text-center pd-l-lg pd-r-lg white-text">PREVIEW ORDER</h3>
            </div>

            <div class="row">
            <?php 
                echo "<pre>";
                print_r($order);
                echo "</pre>";
            ?>

            <p style="color: #000;"><?= $order['first_name'] . ' ' . $order['last_name']; ?><br />
            <?= $order['delivery_address']; ?> <br />
            <?= $order['delivery_suburb']; ?> <?= $order['delivery_state']; ?> <?= $order['delivery_post_code']; ?></p>

            </div>

            </div>
        </div>
    </section>
</body>