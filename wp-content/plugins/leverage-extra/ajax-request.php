<?php
/**
 * Ajax Request
 * @package Leverage Extra
 */

function leverage_handle_ajax_request() {

    if ( isset( $_POST['action'] ) && $_POST['action'] == 'leverage_contact_form' ) {

        if ( isset( $_POST['section'] ) && $_POST['section'] == 'leverage_form' ) {
            $field_send_options = 'form_sending_options';
            $field_recipient    = 'form_email_recipient';
            $field_webhook_url  = 'form_webhook_url';

        } elseif ( isset( $_POST['section'] ) && $_POST['section'] == 'leverage_subscribe' ) {
            $field_send_options = 'subscribe_sending_options';
            $field_recipient    = 'subscribe_email_recipient';
            $field_webhook_url  = 'subscribe_webhook_url';

        }

        $recipient = get_field( $field_recipient, 'option' );

        if ( $recipient && get_field( $field_send_options, 'option' ) == 'Email Recipient' ) {

            $to = $recipient;

            $email   = sanitize_email( $_POST['email'] );
            $subject = esc_html__( 'New contact in ', 'leverage-extra' ) . get_bloginfo( 'name' );

            foreach( $_POST as $key => $value ) {
                
                if ( $key != 'action' && $key != 'section' && $key != '_wpnonce' && $key != '_wp_http_referer' ) {
                    $message .= '<b>' . str_replace( '-', ' ', ucfirst( $key ) ) . '</b>: ' . sanitize_text_field( $value ) . '<br>';
                }
            }

            $headers = esc_html__( 'From ', 'leverage-extra' ).$email." <".$email.">" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";

            if ( wp_mail( $to, $subject, $message, $headers ) ) {
                echo true;
            } else {                
                echo false;            
            }
        }

        $webhook = get_field( $field_webhook_url, 'option' );

        if ( $webhook && get_field( $field_send_options, 'option' ) == 'Webhook' ) {

            $url  = $webhook;

            $body = array();
            foreach( $_POST as $key => $value ) {              

                if ( $key != 'action' && $key != '_wpnonce' && $key != '_wp_http_referer' ) {

                    $data = array(
                        'key' => $key,
                        'value' => sanitize_text_field( $value )
                    );

                    array_push( $body, $data );
                }
            }
        
            $args = array(
                'method'      => 'POST',
                'timeout'     => 60,
                'sslverify'   => false,
                'headers'     => array(
                    'Content-Type'  => 'application/json',
                ),
                'body'        => json_encode( $body )
            );
        
            $request = wp_remote_post( $url, $args );
        
            if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
                error_log( print_r( $request, true ) );
            }
        
            $response = wp_remote_retrieve_body( $request );

            echo true;
        }
    } 

    exit;
} 
add_action( 'wp_ajax_leverage_contact_form', 'leverage_handle_ajax_request' );
add_action( 'wp_ajax_nopriv_leverage_contact_form', 'leverage_handle_ajax_request' );