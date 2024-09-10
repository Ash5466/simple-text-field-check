function wpf_dev_require_ten_digit_number_any_form( $fields, $entry, $form_data ) {
    
    // Loop through all fields in the form
    foreach ( $fields as $field_id => $field ) {
        
        // Check if the field is a "Single Line Text" or "Rich Text" field (change 'textarea' if required)
        if ( 'text' === $field['type'] ) {
            
            // Get the value of the field
            $mystring = $field['value'];
            
            // Check if the input is a 10-digit number using regex
            if ( !preg_match( '/^\d{10}$/', $mystring ) ) {
                // Add an error message if the input doesn't match the 10-digit number requirement
                wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = esc_html__( 'Please enter a valid 10-digit number.', 'wpforms' );
            }
        }
    }
}

add_action( 'wpforms_process', 'wpf_dev_require_ten_digit_number_any_form', 10, 3 );
