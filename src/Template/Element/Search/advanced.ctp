

<?php if (isset($searched_inputs) && $searched_inputs != '') { ?>
	
	<?php $counter = 1; ?>
	<?php foreach ($searched_inputs as $k => $v) { ?>

		<div class="form-field field-picking line-input-search"  style="position: relative; margin-top: 20px;">
            <div class="typeahead-container">
                <div class="typeahead-field">
                    <span class="typeahead-query">
                        <div class="input search"><input name="advanced_search[<?= $random; ?>][value]" value="<?= $v['value']; ?>" id="search_product" class="search-query-multiple search-multiple-fields" placeholder="Search..." autocomplete="off" data-url="/search/typeahead" type="search"></div>
                     	<?php if ($counter != 1) { ?>
						    <div class="input-group-btn remove-icon">
						        <div class="btn-group" role="group">
						            <button class="btn btn-primary remove delete-input-search"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						        </div>
						    </div>
					    <?php } ?>
                    </span>
                </div>
            </div>
        </div>

		<?php $counter++ ?>

	<?php } ?>

	<?php } else { ?>

		<?php $counter_2 = 1; ?>

		<div class="form-field field-picking line-input-search" style="position: relative; margin-top: 20px;">
            <div class="typeahead-container">
                <div class="typeahead-field">
                    <span class="typeahead-query">
                        <div class="input search"><input name="advanced_search[<?= $random; ?>][value]" id="search_product" class="search-query-multiple search-multiple-fields" placeholder="Search..." autocomplete="off" data-url="/search/typeahead" type="search"></div>
                     	<?php if ((isset($counter_2)) && $counter_2 != 1) { ?>
						    <div class="input-group-btn remove-icon">
						        <div class="btn-group" role="group">
						            <button class="btn btn-primary remove delete-input-search"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						        </div>
						    </div>
					    <?php } ?>
                    </span>
                </div>
            </div>
        </div>

        <?php $counter_2++ ?>

	<?php } ?>

