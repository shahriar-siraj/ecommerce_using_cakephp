
<?php use Cake\Routing\Router; ?>


<body class="inabit_bg">
	<section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
	    <div class="container">
	        <div class="row">
	        	<div class="col-md-12">
	            	<h3 class="text-center white-text head-title">Your products to <strong>SEARCH</strong></h3>
	            </div>
	        </div>
			<div class="row">
				<div class="col-md-12">
			         <?= $this->Form->create(null, [
                        'class' => 'form-search form-horizontal',
                        'url' => ['action' => 'advanced'],
                        'role' => 'form',
                        'id' => 'custom-search-form'
                    ]) ?>
                    <div class="inputs"><?= $this->element('Search/advanced') ?></div>
		        </div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-4 col-sm-4 col-xs-offset-4 col-xs-4">
						<a class="mbr-buttons__btn btn btn-lg btn-info btn-green-transparent duplicate-form-field" data-url="<?php echo $this->Url->build(['controller' => 'search', 'action' => 'input']); ?>">+</a>
					</div>
				</div>
			</div>
			<div class="row">
		        <div class="col-md-12">
		            <div class="product_search">
		                <div class="mbr-buttons btn-inverse mbr-buttons--center pl15 pr15">
		                    <button class="mbr-buttons__btn btn btn-lg btn-info btn-green-simple" type="submit" href="<?php echo $this->Url->build(['controller' => 'search', 'action' => 'index']); ?>">
		                    Search</button> 
		                </div>
		            </div>
		        </div>
		    </div>
		 </form>
	    </div>
	</section>
</body>