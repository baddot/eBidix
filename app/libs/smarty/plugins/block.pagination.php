<?php

  function smarty_block_pagination($params, $content, &$smarty) {
  
	foreach($params as $param) {
		$current_page = $param['page'];
		$items_per_page = $param['per_page'];
		$total_items = $param['total'];
	}
  
  	$separator = ' ';
	
	if($total_items < 1) $total_pages = 1;
  	else $total_pages = ceil($total_items / $items_per_page);
  	$urls = array();
  
  	// Prepare sorounding pages numbers (3 before current page and three after)
  	$sourounding = array();
  	$start_range = $current_page - 2;
  	if($start_range < 1) $start_range = 1;
  	$end_range = $current_page + 2;
  	if($end_range > $total_pages) $end_range = $total_pages;
  
  	for($i = $start_range; $i <= $end_range; $i++) $sourounding[] = $i;
  
  	// Render content into an array
  	$before_dots_rendered = false;
  	$after_dots_rendered = false;
  
  	if($total_pages > 3 && $current_page > 1 && $current_page !== false) {
  		$page = explode('?', $_SERVER['REQUEST_URI']);
		$previous_page = $current_page - 1;
		$urls[] = '<a href="'.$page[0].'?page='.$previous_page.'" title="Page précédente"> < Page précédente</a> ';
  	}
  
  	for($i = 1; $i <= $total_pages; $i++) {
  		// Print page...
  		if(($i == 1) || ($i == $total_pages) || in_array($i, $sourounding)) {
  			$page = explode('?', $_SERVER['REQUEST_URI']);
			if($current_page == $i) $urls[] = '<a href="#" class="active">'. $i .'</a>';
  			else $urls[] = "<a href=\"".$page[0]."?page=". $i ."\">". $i ."</a>";
  			if($i < $total_pages) $urls[count($urls) - 1] .= $separator;
  		} else {
  			if($i < $current_page && !$before_dots_rendered) {
  				$before_dots_rendered = true;
  				$urls[] = '... ';
  			} elseif($i > $current_page && !$after_dots_rendered) {
  				$after_dots_rendered = true;
  				$urls[] = '... ';
  			}
  		}
  
  	}
  
  	if($total_pages > 3 && $current_page < $total_pages && $current_page !== false) {
  		$next_page = $current_page + 1;
		$page = explode('?', $_SERVER['REQUEST_URI']);
		$urls[] = " <a href=\"".$page[0]."?page=".$next_page."\" title=\"Page suivante\">Page suivante > </a> ";
  	}
  
  	return implode('', $urls);
  } // smarty_function_pagination

?>