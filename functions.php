<?php
/**
 * Save the event id 
 * 
 * @param type $group_id
 * @param type $event_id
 * @return type
 */
function devb_update_group_evet_id( $group_id, $event_id ) {
	if( ! $group_id )
		return false;
	
	return groups_update_groupmeta( $group_id, 'event_id', absint( $event_id ) ) ;
}

/**
 * Get Group event id
 * 
 * @param type $group_id
 * @return type
 */
function devb_get_group_evet_id( $group_id ) {
	
	return groups_get_groupmeta( $group_id, 'event_id', true );
}

