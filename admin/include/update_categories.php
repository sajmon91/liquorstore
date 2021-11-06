 	<hr>
 	<form class="mt-3" action="#" method="POST">
	    <div class="form-group row">
	        <label for="edit-cat-input" class="col-sm-3 col-form-label text-left">Edit Category</label>
	        <div class="col-sm-9">
	            <?php $cat_obj->getCategoryTitle($_GET['edit']); ?>
	        </div>
	    </div>
	     <button type="submit" class="btn btn-soft-warning waves-effect waves-light" name="btn_edit_cat"><i class="fas fa-edit"></i> Edit Category</button>
	</form>

	<?php 
		if (isset($_POST['btn_edit_cat'])) {
			$cat_obj->editCategory($_GET['edit'], $_POST['edit_category']);
		} 
	?>

	

