<?php
	/**
	 * Mở composer.json
	 * Thêm vào trong "autoload" chuỗi sau
	 * "files" : [
	 *  	"app/Helper/function.php"
	 *	]
	 * Chạy cmd composer dumpautoload
	 */
	if (!function_exists('notifyError')) {
		function notifyError($errors, $name)
		{
			if ($errors->has($name)) {
				echo '<p class="text-danger font-italic">';
				echo $errors->first($name);
				echo '</p>';
			}
		}
    }
    if(!function_exists('get_data_user')) {
		function get_data_user($type, $fiel = 'id') {
			return Auth::guard($type)->user() ? Auth::guard($type)->user()->$fiel : '';
		}
	}
    function get_list_prd($price){
        if ($price < 5000000) {
            echo '001';
        } elseif (5000000 < $price && $price < 10000000){
            echo '002';
        } elseif (10000000 < $price && $price < 15000000){
            echo '003';
        } elseif (15000000< $price && $price < 20000000){
            echo '004';
        } else {
            echo '005';
        }
    }
?>
