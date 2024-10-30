<?php ?>

<div class="wrap">
    
    <?php    echo "<h2>" . __( 'Katorymnd WordPress Contact form settings', 'katorymnd_laqm' ) . "</h2>"; ?>
    
    <?php
    
    if($_POST['katorymnd_cfm_hidden'] == '1d185aec') {
    
      
        
        $katorymnd_Cfm_qfns = sanitize_email($_POST['katorymnd_cfm_esec']);
        $katorymnd_cfm_elm = sanitize_key($_POST['katorymnd_cfm_set_admin_email']);//checkbox value -> [admin-email]
        $katorymnd_cfm_ong = sanitize_text_field($_POST['katorymnd_cfm_yftp']);
        $katorymnd_cfm_num = intval(strlen($_POST['katorymnd_cfm_yftp']));
        $katorymnd_cfm_logo_hxe = sanitize_text_field($_POST['katorymnd_cfm_gfmk']);
        
        
        function katorymnd_validate_url($url_wueg) {
                         
    $katorymnd_path = parse_url($url_wueg, PHP_URL_PATH);
    
    $katorymnd_encoded_path = array_map('urlencode', explode('/', $katorymnd_path));
    
    $url_wueg = str_replace($katorymnd_path, implode('/', $katorymnd_encoded_path), $url_wueg);

    return filter_var($url_wueg, FILTER_VALIDATE_URL) ? true : false;
    
       }

if($katorymnd_cfm_logo_hxe !=false){
                 
            
              
          if(!katorymnd_validate_url($katorymnd_cfm_logo_hxe)) {
    
   ?>
        <div class="error"><p><strong><?php _e('<strong><em>Logo url link in not valid<br>URL not saved</em></strong>' ); ?></strong></p></div>
        <?php
        
         update_option('katorymnd_cfm_set_logo', NULL);
         
     }else{
         
          update_option('katorymnd_cfm_set_logo', esc_url_raw($katorymnd_cfm_logo_hxe));
          
     }


                 }else{
                     
                     update_option('katorymnd_cfm_set_logo', NULL);
                 }

        if($katorymnd_Cfm_qfns == FALSE AND $katorymnd_cfm_elm == FALSE){
            
              ?>
             
        <div class="error"><p><strong><?php _e('Please choose either &quot;<strong><em>default admin Email</em></strong>&quot; or &quot;<strong><em>Custom admin email</em></strong>&quot;.' ); ?></strong></p></div>
        <?php
        
            
        }elseif($katorymnd_Cfm_qfns == TRUE AND (!is_email( $katorymnd_Cfm_qfns ))){
          
           ?>
        <div class="error"><p><strong><?php _e('<strong><em>Admin email not valid.</em></strong>' ); ?></strong></p></div>
        <?php
        
            }elseif($katorymnd_cfm_ong == false || (is_numeric($katorymnd_cfm_ong))){
             
             ?>
        <div class="error"><p><strong><?php _e('<strong><em>Contact page URL required</em></strong>' ); ?></strong></p></div>
        <?php
        
             update_option('katorymnd_cfm_yftp', NULL);
             
             }else{
           
        
          if($katorymnd_cfm_elm == 'admin_email' AND $katorymnd_Cfm_qfns == TRUE){
              
               
             ?>
             
        <div class="error"><p><strong><?php _e('Please choose either &quot;<strong><em>default admin Email</em></strong>&quot; or &quot;<strong><em>Custom admin email</em></strong>&quot;.' ); ?></strong></p></div>
        <?php
        
        
          }else{
              
             
             
               update_option('katorymnd_cfm_esec', $katorymnd_Cfm_qfns);
         update_option('katorymnd_cfm_yftp', $katorymnd_cfm_ong);
         
         update_option('katorymnd_cfm_set_admin_email', $katorymnd_cfm_elm);
         
          update_option('katorymnd_cfm_set_num', $katorymnd_cfm_num);
          
          
         
                   ?>
        <div class="updated"><p><strong><?php _e('Admin email saved.' ); ?></strong></p></div>
        <?php
        
             
              
          }
        
            }
         
       
    }else{
        
       
        $katorymnd_Cfm_qfns = get_option('katorymnd_cfm_esec');
        $katorymnd_cfm_elm = get_option('katorymnd_cfm_set_admin_email');
        $katorymnd_cfm_ong = get_option('katorymnd_cfm_yftp'); 
        $katorymnd_cfm_num = get_option('katorymnd_cfm_set_num');
        $katorymnd_cfm_logo_hxe = get_option('katorymnd_cfm_set_logo');
    }
    
    
       ?>
    
     <form name="katorymnd_contact_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
         
        <input type="hidden" name="katorymnd_cfm_hidden" value="1d185aec">
         <?php    echo "<h4>" . __( 'Add your admin email address', 'katorymnd_laqm' ) . "</h4>"; ?>
         
          <p><?php _e("<p><em>The admin contact email address is where your contact form email messages will be sent.</em></p>

<p><em>Please choose either to use a &quot;<strong>Use default admin Email</strong>&quot; or set a new &quot;<strong>Custom admin email</strong>&quot;.</em></p>", 'katorymnd_laqm' ); ?></p>
         
          <p><input type="checkbox" id="gmuf" name="katorymnd_cfm_set_admin_email" value="admin_email" <?php if($katorymnd_cfm_elm == 'admin_email'){ echo 'checked';}else{ echo '';}?> >
            <label for="admin_email"><?php _e("Use default admin Email "); echo "- <strong><em>".get_option('admin_email')."</em></strong>" ?></label></p>
          
          
         <p><?php _e("Custom admin email" ); ?><br><input type="text" name="katorymnd_cfm_esec" value="<?php echo $katorymnd_Cfm_qfns; ?>" size="20"><br><?php _e(" ex: admin@domain.com" ); ?></p>
       
       <p><hr></p>  
       
        <?php    echo "<h4>" . __( 'Securing a contact page URL link.', 'katorymnd_laqm', 'katorymnd_laqm') . "</h4>"; ?>
        
        <?php _e('<p>Make sure you have updated the &quot;<u><em>contact page URL link</em></u>&quot;&nbsp; before you add our <em>Katorymnd WordPress contact form</em> in order to remove&nbsp;<span style="color:#bf3d66;"><strong>Your Contact form will not work properly..</strong></span>message that displays at the top of the contact form.</p>', 'katorymnd_laqm') ?>
        
        <p><?php echo get_site_url()."/";?><input type="text" name="katorymnd_cfm_yftp" value="<?php echo $katorymnd_cfm_ong; ?>" size="20"><br><?php _e(" ex: " );  echo get_site_url()."/<strong><em>contact/</em></strong>"; ?></p>
        
        <?php _e('<p>Add your website logo link image to be attached to the contact message. If you don&#39;t add the logo, messages will not have your logo image.</p>', 'katorymnd_laqm')?>
        
          <p><?php _e("Logo image link" ); ?><br><input type="text" name="katorymnd_cfm_gfmk" value="<?php echo $katorymnd_cfm_logo_hxe; ?>" size="20"><br><?php _e(" ex: " );  echo get_site_url()."/<strong><em>logo.gif</em></strong>"; ?></p>
       
          <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Now', 'katorymnd_laqm' ) ?>" />
        </p>
     </form>   
    
   <?php _e('<p><em><u><strong>INSTRUCTIONS:</strong></u></em></p>

<p>To add<em> &quot;Katorymnd WordPress contact form&quot;</em> to your contact page, Please add&nbsp;<strong><em>[katorymnd_lob_contact_form]</em></strong> shortcode.</p>', 'katorymnd_laqm')?>
</div>