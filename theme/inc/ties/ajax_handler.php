<?php

        /* ----------------------------------
        * AJAX Contact Handler (SAVE + EMAIL)
        * ---------------------------------- */
        function ev_handle_ajax_contact_form() {

            // Allow only POST
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                wp_send_json_error('Invalid request.');
            }

            // Nonce check
            if (
                !isset($_POST['security']) ||
                !wp_verify_nonce($_POST['security'], 'ajax_contact_nonce')
            ) {
                wp_send_json_error('Security check failed.');
            }

            // Sanitize
            $name    = sanitize_text_field($_POST['name'] ?? '');
            $email   = sanitize_email($_POST['email'] ?? '');
            $message = sanitize_textarea_field($_POST['message'] ?? '');
            $address = sanitize_text_field($_POST['address'] ?? '');

            if (empty($name) || empty($email) || empty($address) || empty($message)) {
                wp_send_json_error('All fields are required.');
            }
            

            if (!is_email($email)) {
                wp_send_json_error('Invalid email address.');
            }

            /* -------------------------
            * Save to CPT
            * ------------------------- */
            $post_id = wp_insert_post([
                'post_type'   => 'contact_submission',
                'post_status' => 'publish',
                'post_title'  => $name,
            ]);

            if (!$post_id) {
                wp_send_json_error('Failed to save submission.');
            }

            update_post_meta($post_id, 'email', $email);
            update_post_meta($post_id, 'address', $address);
            update_post_meta($post_id, 'message', $message);
            update_post_meta($post_id, 'submitted_at', current_time('mysql'));

            /* -------------------------
            * Send Email
            * ------------------------- */
            $to = get_option('admin_email');
            $subject = 'New Contact Form Message';

            $headers = [
                'Content-Type: text/plain; charset=UTF-8',
                'From: Website Contact <no-reply@yourdomain.com>',
                "Reply-To: $email"
            ];

            $body = "Name: $name\nEmail: $email\n\nAddress: $address\n\nMessage:\n$message";

            if (!wp_mail($to, $subject, $body, $headers)) {
                wp_send_json_error('Email failed, but data saved.');
            }

            wp_send_json_success('Message sent successfully!');
        }

        add_action('wp_ajax_submit_contact_form', 'ev_handle_ajax_contact_form');
        add_action('wp_ajax_nopriv_submit_contact_form', 'ev_handle_ajax_contact_form');
?>