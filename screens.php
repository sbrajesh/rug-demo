<?php

function buddydev_generate_group_content() {
	
	$current_action = bp_action_variable(0);
	
	switch( $current_action ){
		
		case '7-day':
			$content ='7 day content';
			break;
		
		case '1-month':
			$content ='1 month content';
			break;
		case '1-year':
			$content ='1year content';
			break;
		default:
			
			$content ="First screen";
			break;
			
	}
	
	echo $content;
}