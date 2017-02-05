<!-- Categories Widget -->
<div class="widget widget-categories mt0 mbt30">
  <h4>Categories <span class="head-line"></span></h4>

  <?php 
    $category_list = array($category->parent_id); 
    $category_list2 = array($this->request->id); 
  ?>

  <ul>
      <?php foreach($allCategories as $index => $category):

        if (in_array($index, $category_list))
          $class = "active bold";
        else if ((in_array($index, $category_list2)))
          $class = "active";
        else
          $class = "";

        // Sub Categories
        if ((strpos($category,'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') !== false)) 
          $li_class = "hid";
        else
          $li_class = "parent_category";
        ?>

        <li class="<?php echo $li_class; ?>">
            <?= $this->Html->link(
              $category,
              [
                  '_name' => 'shop-categories',
                  'slug' => str_replace('&nbsp;', '', $category),
                  'id' => $index,
                  'prefix' => 'shop'
              ],
              [
                  'escape' => false,
                  'class' => $class
              ]
          ) ?>
        </li>
      <?php endforeach;?>
  </ul>
</div>

<script>
  $( document ).ready(function() {

    var categories_list = $('.widget-categories');
    var categories_list = categories_list.find('.parent_category');
    var categories_list = categories_list.find('.active');
    categories_list.addClass('bold');

    var current_parent_category = $('.widget-categories').find('.active .bold');
    var current_parent_category = current_parent_category.find('.parent_category').closest('li');

  //current_parent_category.nextUntil(".parent_category").fadeIn(100);

    console.log(current_parent_category.html());

    $(".parent_category").click(function() {
      
      var links = $(this).nextUntil(".parent_category");

      if ($(this).nextUntil(".parent_category").hasClass('hid') === true) {

        links.fadeIn(100);
        links.addClass('is_shown');
        return false;

      } else {
        return true;
      }

    });
  });
</script>