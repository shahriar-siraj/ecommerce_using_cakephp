
<div class="content-wrap">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<?= $this->element('top_banner', ['img' => 'service_banner2.jpg', 'content' => '<h2 class="mt-sm text-left no-txt-transform bold fs50 green-txt-color mb30 make-centered">FACILITY <span class="white-txt-color">MANAGEMENT</span></h2>']) ?>

<section class="doublediagonal no-pb">
    <div class="container">
        <div class="section-heading mt50">

            <p class="no-txt-transform grey-text fs-md">ETBS manages and co-ordinates day to day and ongoing maintenance operations as well as ensuring all contractors are meeting their contractual obligations. This is possible through the constant implementation of the following processes:</p>

			<p class="no-txt-transform grey-text fs-md">ETBS manages the entire works process from the initial quotation request to completion of works. Our management style is successful due to the fact that we consider communication to be of upmost importance. Our customer approves quotations and verifies invoices so as to maintain their satisfaction and ensure job and pricing transparency. ETBS is a results-orientated property maintenance and facilities management company, setting the standard in the industry since 2010. We stand by our foundation of providing our customers high quality results in a time effective manner. From reactive and preventative maintenance progress to build notice the difference in our services.</p>
        </div>
    </div>
</section>

<section class="full-img-everytrade service-facility-bg"></section>

<?= $this->element('quote') ?>

<?= $this->element('footer') ?>