<?php
/**
 * Demo account form
 *
 */
?>
<div class="row demo-form">
  <div class="col-12 ml-md-auto mr-md-auto">
    <div class=" popup_message" style="display:none;"></div>
  </div>
</div>
<form id="heyfx-demo" name="heyfx-demo" class="form-wrapper demo-form crm" enctype="application/json">
	<fieldset>
	
	<div class="form-group row">
    <label for="firstName" class="col-sm-3 col-form-label text-right req" minLength="2">First Name</label>
    <div class="col-sm-9X w-100">
      <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="surname" class="col-sm-3 col-form-label text-right req">Last Name</label>
    <div class="col-sm-9X w-100">
      <input type="text" class="form-control" name="surname" id="surname" placeholder="Last Name" required>
    </div>
  </div>
	
	<div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label text-right req">Email Address</label>
    <div class="col-sm-9X w-100">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
    </div>
  </div>
	
  <div class="form-group row">
    <label for="leverage" class="col-sm-3 col-form-label text-right req">Leverage</label>
    <div class="col-sm-9X w-100">
      <select class="custom-select mb-2X mr-sm-2X mb-sm-0 w-100" name="leverage" id="leverage" required>
        <option value="">Select Leverage</option>
				<option value="50">1:50</option>
				<option value="100">1:100</option>
				<option value="200">1:200</option>
				<option value="300">1:300</option>
				<option value="400">1:400</option>
				<option value="500">1:500</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="balance" class="col-sm-3 col-form-label text-right req">Amount</label>
    <div class="col-sm-9X w-100">
      <select class="custom-select mb-2X mr-sm-2X mb-sm-0 w-100" name="balance" id="balance" required>
				<option value="">Select Balance</option>
				<option value="100">100</option>
				<option value="500">500</option>
				<option value="1000">1000</option>
				<option value="2000">2000</option>
				<option value="3000">3000</option>
				<option value="4000">4000</option>
				<option value="5000">5000</option>
				<option value="10000">10000</option>
				<option value="20000">20000</option>
				<option value="30000">30000</option>
				<option value="40000">40000</option>
				<option value="50000">50000</option>
				<option value="60000">60000</option>
				<option value="70000">70000</option>
				<option value="80000">80000</option>
				<option value="90000">90000</option>
				<option value="1000000">1000000</option>
      </select>
    </div>
  </div>
  
  <div class="fieldgroup">
    <input type="submit" value="Open Demo Account" class="submit w-100">
    <img src="<?php echo get_template_directory_uri(); ?>/images/dist/loader.gif"  style="display: none; float: right; margin: 10px 0;" class="submit_loader" width="60">
  </div>
  </fieldset>
</form>