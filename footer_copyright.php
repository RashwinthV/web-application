<div class="row">
                <div class="col-md-12">
                   <?php 
function auto_copyright($startYear = null) {
	if (!is_numeric($startYear) || intval($startYear) >= date('Y')) {
		echo "&copy; " . date('Y') . " Notice Board";
	} else {
		echo "&copy; " . intval($startYear) . "&ndash;" . date('Y') . " Notice Board"; 
	}
} 
?>
<?php auto_copyright(); ?>
                </div>

            </div>