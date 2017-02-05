
<?php use Cake\Routing\Router; ?>

<style>

@media screen and (max-width: 768px) {
    body {
        background: grey !important;
    }
}

body {
    background: url('../img/registration-bg.jpg') no-repeat center center fixed;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
label {
	font-size: 13px !important;
}
@media (min-width: 768px) {
    .form-inline .radio input[type="radio"], 
    .form-inline .checkbox input[type="checkbox"] {
        float: left;
        margin-right: 5px;
        margin-left: 5px;
    }
}

/* Checkbox Icons */
label.custom_checkbox {
    position:relative;
    padding-left: 50px !important;
    font-size:30px;
    cursor:pointer;
    color:#fff;
    padding: 25px 28px 0 5px;
	font-size: 15px !important;
}

label.custom_checkbox:before,label.custom_checkbox:after {
    font-family:FontAwesome;
    font-size:50px;
/*absolutely positioned*/
    position:absolute;
    top:0px;
    left: 0px;
    right:10px
}

label.custom_checkbox:before {
    content:'\f1db'
}

label.custom_checkbox:after {
    content:'\f111';
    width:25px;
    overflow:hidden;
    font-size:27px;
    top:18px;
    left:9px;
    color:#6CFF4C;
    -webkit-animation:bounceout .4s;
    -webkit-animation-iteration-count:1;
    -webkit-animation-fill-mode:forwards;

    -moz-animation:bounceout .4s;
    -moz-animation-iteration-count:1;
    -moz-animation-fill-mode:forwards;

    animation:bounceout .4s;
    animation-iteration-count:1;
    animation-fill-mode:forwards;

}


@-moz-document url-prefix() {
   label.custom_checkbox:after {
    content:'\f111';
    width:25px;
    overflow:hidden;
    font-size:27px;
    top:17px !important;
    left:9px;
    color:#6CFF4C;
    -webkit-animation:bounceout .4s;
    -webkit-animation-iteration-count:1;
    -webkit-animation-fill-mode:forwards;

    -moz-animation:bounceout .4s;
    -moz-animation-iteration-count:1;
    -moz-animation-fill-mode:forwards;

    animation:bounceout .4s;
    animation-iteration-count:1;
    animation-fill-mode:forwards;

}
}



/* Hide the Ordinary Checkbox */
input[type="checkbox"] {
    display:none
}

/* Animating the Checkbox Icon */
input[type="checkbox"]:checked + label.custom_checkbox:after {
    -webkit-animation:bounce .4s;
    -webkit-animation-iteration-count:1

    -moz-animation:bounce .4s;
    -moz-animation-iteration-count:1;

    animation:bounce .4s;
    animation-iteration-count:1

}

/* @Keyframes for Chrome and Safari */
@-webkit-keyframes bounce {
    0%  { -webkit-transform:scale(.8); opacity:.8}
    25% { -webkit-transform:scale(.25); opacity:.25}
    50% { -webkit-transform:scale(1.4); opacity:1.4}
    75% { -webkit-transform:scale(.8); opacity:.8}
    100%{ -webkit-transform:scale(1); opacity:1}
}
@keyframes bounce {
    0%  { transform:scale(.8); opacity:.8}
    25% { transform:scale(.25); opacity:.25}
    50% { transform:scale(1.4); opacity:1.4}
    75% { transform:scale(.8); opacity:.8}
    100%{ transform:scale(1); opacity:1}
}



@-webkit-keyframes bounceout {
    0%  { -webkit-transform:scale(0)}
    25% { -webkit-transform:scale(.8)}
    50% { -webkit-transform:scale(1.4)}
    75% { -webkit-transform:scale(.25)}
    100%{ -webkit-transform:scale(0)}
}
@keyframes bounceout {
    0%  { transform:scale(0)}
    25% { transform:scale(.8)}
    50% { transform:scale(1.4)}
    75% { transform:scale(.25)}
    100%{ transform:scale(0)}
}

/* do not group these rules */
*::-webkit-input-placeholder {
    color: white;
    opacity: 1;
}
*:-moz-placeholder {
    /* FF 4-18 */
    color: white;
    opacity: 1;
}
*::-moz-placeholder {
    /* FF 19+ */
    color: white;
    opacity: 1;
}
*:-ms-input-placeholder {
    /* IE 10+ */
    color: white;
    opacity: 1;
}
</style>

<div class="content-wrap registrationForm">
<?= $this->element('header', ['style' => '
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.6);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";']) ?>

<section style="margin-top: 150px;" id="reg_page">
    <div class="container">
      <h1 class="white-text bold text-center no-txt-transform no-mb contractor_title">Contractor</h1>
      <h1 class="white-text bold text-center no-txt-transform no-mb registration_form_t">Registration Form</h1>
        <div class="intro-registration mt-md">
            <p class="text-center white-text p_sentence">Every Trade Building Services is a national maintenance provider for Retail, Hospitality & Body Corporate. We are continually building our network of tradespeople and suppliers. Every Trade Building Services endeavour to continually improve its service and turnaround time in each state of Australia.  </p>
            <p class="text-center white-text p_sentence">If you wish to register as an available contractor of Every Trade Building Services, and its national after hours service, please fill in our Contractor Registration form below.</p>        
            <div class="registration-form">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active first">
                        <a class="switchTab" href="#sign_up" data-url="<?php echo Router::url('/', true) . "registration/step_company_signup"; ?>">1. Company Sign Up</a>
                    </li>
                    <li>
                    	<a class="switchTab" href="#trade_services" data-url="<?php echo Router::url('/', true) . "registration/step_trade_services"; ?>">2. Trade Services</a>
                    </li>
                    <li>
                        <a class="switchTab" href="#account_details" data-url="<?php echo Router::url('/', true) . "registration/step_account_details"; ?>">3. Company Account Details</a>
                    </li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="sign_up"><?= $this->element('Registration/step_company_signup') ?></div>
                    <div class="tab-pane" id="trade_services"><?= $this->element('Registration/step_trade_services') ?></div>
                    <div class="tab-pane" id="account_details"><?= $this->element('Registration/step_account_details') ?></div>
                </div>
            </div> 
         </div>
      </div>
    </div>
</section>

<?= $this->element('footer') ?>

</div>