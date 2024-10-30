<?php
     session_start();
      
/**
 * Plugin Name: Katorymnd Contact Form
 * Description: A simple yet secure contact form plugin, verified and ready for use. Provides an easy way to manage and customize contact forms on your WordPress site.
 * Version: 1.1
 * Author: Katorymnd
 * Author URI: https://katorymnd.com
 * Requires at least: 6.0
 * Requires PHP Version: 7.2.24 or higher
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

 
 
   function katorymndConSFormPage() {
    include('katorymnd_contact_form_settings_admin_page.php');
} 
    
    
    function katorymnd_cform_setting_page() {
    add_options_page("Katorymnd Contact Form Settings", "Katorymnd Contact Form ", "manage_options", "katorymnd_contact_form_settings", "katorymndConSFormPage");
}
 
add_action('admin_menu', 'katorymnd_cform_setting_page');


 



 function katorymnd_cfm_zspr(){
     
   
     
     ?>
     
        <form  action=" <?php print esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
         
         <div class="esmh" >
                        
		<input autofocus id="bwlj" name="katorymnd_cfm_name" placeholder="Full Names"  type="text" <?php if (isset($_POST['katorymnd_cfm_name']) === true) { echo 'value="', esc_attr($_POST['katorymnd_cfm_name']), '"'; }
				
		?> />
	 </div>
	 
	 <div class="esmh">
                        
		<input autofocus id="jryu" name="katorymnd_cfm_email" placeholder="Email" type="text" <?php if (isset($_POST['katorymnd_cfm_email']) === true) { echo 'value="', esc_attr($_POST['katorymnd_cfm_email']), '"'; }
		
		?> />
	</div>
	
	<div class="esmh">
                        
		<input autofocus id="vco" name="katorymnd_cfm_subject" placeholder="Subject" type="text" <?php if (isset($_POST['katorymnd_cfm_subject']) === true) { echo 'value="', esc_attr($_POST['katorymnd_cfm_subject']), '"'; }
		
		?> />
	</div>
	
	<div class="neb">
    
<textarea data-minlength="20" id="kujy" name="katorymnd_cfm_message" placeholder="Message" <?php 

    
?> ><?php if (isset($_POST['katorymnd_cfm_message']) === true) { echo $_POST['katorymnd_cfm_message']; } ?></textarea>

	</div>
	
	         <?php
	         
	          $syig = str_shuffle("123456789");
            $vou = (int)$syig[0];
          $mej = (int)$syig[1];
          
            $knrz = $vou.'+'.$mej;
            $wui = $vou + $mej;
	         
	         print "<p>".$knrz."</p>";
	         
	         $_SESSION['katorymnd_cfm_zefl_sec_code'] = $wui;
	         
	         ?>
	
	
	
	 <div class="esmh">
          
		<input autofocus id="hcg" name="katorymnd_cfm_sec_code" placeholder="Security Answer" type="text" <?php if (isset($_POST['katorymnd_cfm_sec_code']) === true) { echo 'value="', esc_attr($_POST['katorymnd_cfm_sec_code']), '"'; }
		
		?> />
	</div>
	
	
	
		<p><?php print __("We will reply you within 24hrs.");?></p>
	
	 <div class="jnek">
    
      <input type="submit"  value="Send" name="katorymnd_cfm_submit" class="yjxw"  >
   
     </div>
	
	
            
        </form>
     
     <?php
 }
 
 
 function katorymnd_cfm_zspr_css(){
     
     ?>
    
     <style  type="text/css">
     
.esmh {
    margin-bottom: 17px;
    font-family: Times New Roman, Arial, Sans-Serif;
}

.esmh input {
    height: 26px;
border: 2px solid #6d817e !important;
border-radius: 9px;
background: transparent;
font-size: 13px;
padding: 0 15px;
}


.neb textarea {
    height: 63px;
font-family: Times New Roman, Arial, Sans-Serif;
background: transparent;
border-radius: 10px;
font-size: 15px;
padding: 7px;
border: 2px solid #6d817e !important;
}

.error{
    
    color: #bf3d66;
}


</style>
     
     
     
     <?php
     
     
 }
 

 
 
 function katorymnd_validate_cfm_zspr() {
    if (isset($_POST['katorymnd_cfm_submit'])) {
        $name = sanitize_text_field($_POST['katorymnd_cfm_name']);
        $email = sanitize_email($_POST['katorymnd_cfm_email']);
        $subject = sanitize_text_field($_POST['katorymnd_cfm_subject']);
        $message = stripslashes(sanitize_textarea_field($_POST['katorymnd_cfm_message']));
        $sec_code = sanitize_text_field($_POST['katorymnd_cfm_sec_code']);
        
        // Validation logic
        if (!preg_match("/^\p{L}+ \p{L}+$/u", trim($name))) {
            echo '<div class="error"><p><strong>' . __('Provide both first and last name.') . '</strong></p></div>';
        } elseif (!is_email($email)) {
            echo '<div class="error"><p><strong>' . __('Email not valid.') . '</strong></p></div>';
        } elseif (empty($subject)) {
            echo '<div class="error"><p><strong>' . __('Subject required.') . '</strong></p></div>';
        } elseif (empty($message)) {
            echo '<div class="error"><p><strong>' . __('Message required.') . '</strong></p></div>';
        } elseif (empty($sec_code)) {
            echo '<div class="error"><p><strong>' . __('Security answer required.') . '</strong></p></div>';
        } elseif ($sec_code != $_SESSION['katorymnd_cfm_zefl_sec_code']) {
            echo '<div class="error"><p><strong>' . __('Wrong Answer.') . '</strong></p></div>';
        } else {
            // All validations passed, proceed with sending email
            send_custom_email($name, $email, $subject, $message);
        }
    }
}

function send_custom_email($name, $email, $subject, $message) {
    $admin_email = get_option('admin_email');
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";
    
    $email_body = '<html><head><style>#en{text-align: center;}</style></head><body>';
    $email_body .= '<div id="en"><br><br>';
    if ($logo = get_option('katorymnd_cfm_set_logo')) {
        $email_body .= '<p><a href="' . get_site_url() . '"><img src="' . esc_url($logo) . '" style="width: 72px; height: 67px;"></a></p>';
    }
    $email_body .= '<p>Name: ' . esc_html($name) . '</p>';
    $email_body .= nl2br(esc_html($message));
    $email_body .= '</div></body></html>';
    
    $mail_sent = wp_mail($admin_email, $subject, $email_body, $headers);
    if (!$mail_sent) {
        error_log('Email failed to send to ' . $admin_email . ' from ' . $email);
        echo '<p class="gcyd" style="color:#FF0000;">Error! Email not sent.</p>';
    } else {
        echo '<p class="gcyd" style="color:#3ea546;">Email sent. We will get back to you shortly.</p>';
    }
}

 
 
 
 function katorymnd_cfm_shortcode(){
     
    
     ob_start();
     
     katorymnd_validate_cfm_zspr(); 
     katorymnd_cfm_zspr(); 
     katorymnd_cfm_zspr_css();
     
     
     return ob_get_clean();
 }
 

 add_shortcode( 'katorymnd_lob_contact_form', 'katorymnd_cfm_shortcode' );
 
 ?>