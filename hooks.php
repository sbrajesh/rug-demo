<?php

//add_action( 'bp_group_options_nav', 'buddydev_setup_group_subnav' );//hooking for normal template
add_action( 'bp_template_content', 'buddydev_setup_group_subnav', 0 );//hooking for plugins.php

function buddydev_setup_group_subnav() {
	
	
	if( ! bp_is_group()|| ! bp_is_current_action('event-list')  )

			return ;

	$group_url = bp_get_group_permalink( groups_get_current_group() );


	$parent_slug = 'event-list';
	$parent_url = $group_url . $parent_slug;
?>	
<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
		<li><a href="<?php echo $parent_url;?>/7-day/">7 Day</a></li>	
		<li><a href="<?php echo $parent_url;?>/1-month/">One Month</a></li>	
		<li><a href="<?php echo $parent_url;?>/1-year/">One Year</a></li>	
	</ul>
</div><!-- .item-list-tabs -->
	
		
<?php	}
	
