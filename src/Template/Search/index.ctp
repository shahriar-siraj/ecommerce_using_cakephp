
<?php use Cake\Routing\Router; ?>

<?php $this->start('scriptBottom'); ?>

<script type="text/javascript">
   	jQuery(document).ready(function($) {
	   	$('#search_product').typeahead({
	        minLength: 3,
	        maxItem: 5,
	        order: "asc",
	        dynamic: true,
	        delay: 500,
	        emptyTemplate: 'No result for "{{query}}"',
	        source: {
	            url: [{
	                type: "POST",
	                dataType: "json",
	                url: $("#search_product").attr("data-url"),
	                data: {
	                    q: "{{query}}"
	                }
	            }, "data"]
	        }
	    });
});
</script>

<?php $this->end() ?>

<body class="inabit_bg">
	<section class="content-2 simple col-1 col-undefined mbr-after-navbar" id="content5-77">
	    <div class="container">
	        <div class="row">
	        	<div class="col-md-12">
	            	<h3 class="text-center pd-l-lg pd-r-lg white-text head-title">Quick Search</h3>
	            </div>
	        </div>
			<div class="row">
				<div class="col-md-12">
			        <div class="span12">
				         <?= $this->Form->create(null, [
	                        'class' => 'form-search form-horizontal',
	                        'url' => ['action' => 'quick'],
	                        'role' => 'form',
	                        'id' => 'custom-search-form'
	                    ]) ?>
					        <div class="form-field field-picking">
				                <div class="typeahead-container">
				                    <div class="typeahead-field">
				                        <span class="typeahead-query">
				                        	<div class="input-group">
				                                <?= $this->Form->input('search', [
				                                    'id' => 'search_product',
				                                    'class' => 'search-query',
				                                    'label' => false,
				                                    'type' => 'search',
				                                    'placeholder' => 'Search Products',
				                                    'autocomplete' => 'off',
				                                    'data-url' => \Cake\Routing\Router::url(['controller' => 'search', 'action' => 'typeahead']),
				                                    'value' => $this->request->session()->read('Search.Quick.Products.Keyword')
				                                ]) ?>
				                             	<div class="input-group-btn">
								                    <div class="btn-group" role="group">
								                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
								                    </div>
								                </div>
				                            </div>
				                        </span>
				                    </div>
				                </div>
				            </div>
			            </form>
			        </div>
		        </div>
			</div>
			<div class="row mgt-sm grey-text">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-4 col-xs-4 col-xs-offset-1">
						<div class="border-separator"></div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-2">
						<p>or</p>
					</div>
					<div class="col-md-6 col-sm-4 col-xs-4">
						<div class="border-separator"></div>
					</div>
				</div>
			</div>
			<div class="row mgt-sm">
				<div class="col-md-12">
					<p class="fs21"><a href="<?= $this->Url->build(['controller' => 'search', 'action' => 'advanced', 'prefix' => false]) ?>">Advanced Search</a></p>
				</div>
			</div>
	    </div>
	</section>
</body>