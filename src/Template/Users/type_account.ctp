
<?php use Cake\Routing\Router; ?>

<body class="inabit_bg">
	<section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
	    <div class="container">

	        <div class="row">
		        <div class="col-md-12 col-sm-12 col-xs-12">
		            <h3 class="text-center pd-l-lg pd-r-lg white-text head-title no-mg-b">What type of account would you like to create ?</h3>
		         </div>
		    </div>

		    <div class="row">

	            <div class="mbr-buttons btn-inverse mbr-buttons--center no-mg-t pd-l-lg pd-r-lg p-b-lg">
	            	<?= $this->Html->link(
						'Customer Account',
						[
							'_name' => 'users-register',
							'type' => 'customer'
						],
						[
							'class' => 'mbr-buttons__btn btn btn-lg btn-info btn-green-transparent no-mg-b'
						]
					)?>
	            </div>

	            <div class="mbr-buttons btn-inverse mbr-buttons--center mg-t-md mg-b-lg pd-l-lg pd-r-lg p-b-lg">
					<?= $this->Html->link(
						'Retail Account',
						[
							'_name' => 'users-register',
							'type' => 'merchant'
						],
						[
							'class' => 'mbr-buttons__btn btn btn-lg btn-info btn-blue-transparent'
						]
					)?>
	            </div>
	        </div>
	    </div>
	</section>
</body>