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
		
		$this->display_form( $group_id );
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
	
	
	
	private function display_form( $group_id = false ) {
		$event_id = '';
		if( $group_id )
			$event_id = devb_get_group_evet_id( $group_id );
		?>
		<div id="rug-event-id">
			<label>
				Event Id:
				<input type="text" name="devb_event_id" id="devb_event_id" value="<?php echo $event_id;?>" placeholder="Please enter the event Id" />
			</label>
		</div>
	<?php
	
	}
}

bp_register_group_extension( 'Rug_Group_Extension' );