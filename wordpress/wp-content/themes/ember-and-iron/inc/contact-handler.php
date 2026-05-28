<?php
/**
 * Custom Secure Contact Form Handler (Plugin-free, using wp_mail)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ember_iron_handle_contact_form() {
	// Verify referrer and basic request integrity
	if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
		wp_redirect( home_url( '/contact/?status=error' ) );
		exit;
	}

	// Retrieve post data
	$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

	// Simple server-side validation
	if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
		wp_redirect( home_url( '/contact/?status=validation_error' ) );
		exit;
	}

	// Set up recipient email address
	$to = 'info@emberandiron.co.za';

	// Subject lines
	$subject = 'Ember & Iron Steelworks - New Customer Inquiry from ' . $name;

	// Message body
	$body  = "<h2>New Steelworks Inquiry Details</h2><br>";
	$body .= "<strong>Full Name:</strong> " . esc_html( $name ) . "<br>";
	$body .= "<strong>Email Address:</strong> " . esc_html( $email ) . "<br>";
	$body .= "<strong>Phone Number:</strong> " . esc_html( $phone ) . "<br><br>";
	$body .= "<strong>Message / Custom Spec:</strong><br>";
	$body .= nl2br( esc_html( $message ) ) . "<br><br>";
	$body .= "<hr><br>This message was securely transmitted directly from the Ember & Iron local form handler.";

	// HTML headers
	$headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'From: Ember & Iron Website Inquiry <no-reply@emberandiron.co.za>',
		'Reply-To: ' . $name . ' <' . $email . '>'
	);

	// Direct mail routing execution
	$mail_sent = wp_mail( $to, $subject, $body, $headers );

	if ( $mail_sent ) {
		wp_redirect( home_url( '/contact/?status=success#contact-form' ) );
	} else {
		wp_redirect( home_url( '/contact/?status=error#contact-form' ) );
	}
	exit;
}
add_action( 'admin_post_ember_iron_contact_submit', 'ember_iron_handle_contact_form' );
add_action( 'admin_post_nopriv_ember_iron_contact_submit', 'ember_iron_handle_contact_form' );
