<?php 

function wpf_dev_require_ten_digit_number_any_form( $fields, $entry, $form_data ) {
    
    // checking all fields in form
    foreach ( $fields as $field_id => $field ) {
        
        // Check if the field is a single line text
        if ( 'text' === $field['type'] ) {
            
            // Get the value of the field
            $mystring = $field['value'];
            
            // Checking if input is a 10-digit number using regex
            if ( !preg_match( '/^\d{10}$/', $mystring ) ) {
                // Adding error message, if input does not match requirement
                wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = esc_html__( 'Please enter a valid 10-digit number.', 'wpforms' );
            }
        }
    }
}

add_action( 'wpforms_process', 'wpf_dev_require_ten_digit_number_any_form', 10, 3 );
