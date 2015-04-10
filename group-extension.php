<?php

class Rug_Group_Extension extends BP_Group_Extension {

	public $visibility = 'public';
	public $enable_create_step = true; // enable create step
	public $enable_nav_item    = false; //do not show in front end
	public $enable_edit_item   = true; // If your extensi
	
	
	public function __construct() {

		$this->name = __( 'Event Id', 'bcg' );
		$this->slug = 'event-list';

		$this->create_step_position = 21;
		$this->nav_item_position = 31;
	}
	
	public function create_screen( $group_id = null ) {
		
		if ( ! bp_is_group_creation_step( $this->slug ) )
			return false;
		
		//show form here
		
		wp_nonce_field( 'groups_create_save_' . $this->slug );
	}
	
	/**
	 * Save on Create Screen
	 * 
	 * @param type $group_id
	 */
	public function create_screen_save( $group_id = null ) {
		
		$bp = buddypress();
		
		check_admin_referer( 'groups_create_save_' . $this->slug );
        
        $group_id = $bp->groups->new_group_id;
		
		$event_id = $_POST["devb_event_id"];
                 
		if ( ! devb_update_group_evet_id( $group_id, $event_id ) ) {
		
		} else {
		
			bp_core_add_message( __( 'Event ID updated.' ) );
		}
		
	}
	
	
}

bp_register_group_extension( 'Rug_Group_Extension' );