<?php
/**
 * Live account from
 *
 */
?>
<div class="form-live-reg-container" data-aos="fade-in" data-aos-offset="0" data-aos-duration="1100" data-aos-delay="300">
  <?php if ( is_front_page() ):?>
  <div class="row">
    <div class="col-12 ml-md-auto mr-md-auto">
      <div class="popup_message" style="display:none;"></div>
    </div>
  </div>
  <?php endif;?>
  <form id="hey-live" name="hey-live" class="form-wrapper crm container">
    

      <div class="form-group">
        
        <label for="firstName" class="col-sm-3 col-form-label text-right req" minLength="2">First Name</label>
        <div class="col-sm-9X w-100">
          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name *" required>
        </div>
        
      </div>

      <div class="form-group">
        <label for="surname" class="col-sm-3 col-form-label text-right req">Last Name</label>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Last Name *" required>
      </div>
      
      <div class="form-group">
        <label for="email" class="col-sm-3 col-form-label text-right req">Email Address</label>
        <input type="email" class="form-control mb-1" name="email" id="email" placeholder="Email Address *" required>
        <div class="small-text d-none">Your email address must be in the format at name@domain.com</div>
      </div>

      <div class="form-group">
        <label for="password" class="col-sm-3 col-form-label text-right req">Password</label>
        <div class="password-field-container">
         <?php /* <i id="showPass" class="fas fa-eye"></i> */?>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password *" required>
        </div>
      </div>

      <div class="form-group">
        <div class="d-flex align-items-center">
          <input type="checkbox" name="terms" id="terms" required>
          <label class="form-check-label d-inline-block terms" for="checkbox"><a target="_blank" href="<?php the_field('toc_url', 'option'); ?>">I agree to the terms and conditions</a>*</label>
        </div>
      </div>

      <div class="form-group sr-only">
        <label for="affiliatedTo" class="col-sm-3 col-form-label text-right">Affiliate Code</label>

        <div class="col-sm-9X w-100">
          <input 
            type="text" 
            class="form-control" 
            name="affiliatedTo" 
            id="affiliatedTo" 
            value="<?php echo is_cookie_set('refid', 'affiliatedTo'); ?>" 
            placeholder="Affiliate Code (Optional)"
            >
            <input 
            type="text" 
            class="form-control" 
            name="campaignId" 
            id="campaignId" 
            value="<?php echo is_cookie_set('cmp', 'campaignId'); ?>" 
            placeholder="Campaign Id"
            >
        </div>

      </div>
      <!-- Become An Affiliate -->
      
      <div class="fieldgroup">
        <input type="submit" value="Sign Up" class="submit w-100 m-0" id="heyfexID"> 
        <img src="<?php echo get_home_url(); ?>/images/dist/button_loader.gif"  style="display: none;float: right;margin: 10px 0;" class="submit_loader" width="60">
      </div>    
    
  </form>
</div>