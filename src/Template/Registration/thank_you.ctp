
<?php use Cake\Routing\Router; ?>

<style>
body {
    background: url('../img/registration-bg.jpg') no-repeat center center fixed;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-bottom: 0%;
}
.overlay_bg {
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    padding-bottom: 35px;
}
</style>

<div class="content-wrap registrationForm">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<section style="margin-top: 150px;" id="tk_reg_page">
    <div style="margin-bottom: 20%;">
        <div class="overlay_bg">
            <div class="container">
              <h1 class="white-text bold text-center no-txt-transform no-mb mt-md">THANK YOU</h1>
                <div class="intro-registration mt-md">
                    <p class="text-center white-text p_sentence">Thank you for taking the time to fill out our Induction Form! <br />One of our friendly professionals will be in touch shortly.</p>
                    <p class="text-center white-text p_sentence">We look forward to building something great together.</p>       
                 </div>
            </div>
        </div>
    </div>
</section>

<?= $this->element('footer') ?>

</div>