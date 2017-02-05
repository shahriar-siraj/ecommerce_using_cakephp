
<?php use Cake\Routing\Router; ?>
    
    <form method="POST" action="registration/thank_you" enctype="multipart/form-data">
    	<div class="row select_trade">
    		<div class="col-md-10 col-md-offset-1">
    			<div class="col-md-12">
    		    	<div class="form-group">
    		    		<select class="form-control" name="form[company_account_service_rates]"><option value="">Trade Service Rates (Please select trade)</option><option value="Air Compressors">Air Compressors</option><option value="Air Conditioning">Air Conditioning</option><option value="Animal Handlers">Animal Handlers</option><option value="Asbestos">Asbestos</option><option value="Backflow Prevention">Backflow Prevention</option><option value="Blinds/Awnings">Blinds/Awnings</option><option value="Brick / Block Laying">Brick / Block Laying</option><option value="Bricklaying">Bricklaying</option><option value="Cabinetry/ Joinery">Cabinetry/ Joinery</option><option value="Carpentry">Carpentry</option><option value="Carpet / Vinyl">Carpet / Vinyl</option><option value="Carpet Cleaning">Carpet Cleaning</option><option value="Civil Works">Civil Works</option><option value="Cleaning">Cleaning</option><option value="Concreting">Concreting</option><option value="Demolition">Demolition</option><option value="Auto Doors">Auto Doors</option><option value="Drainage">Drainage</option><option value="Earthmoving Electrical">Earthmoving Electrical</option><option value="Emergency Lighting">Emergency Lighting</option><option value="Engineer">Engineer</option><option value="Fencing">Fencing</option><option value="Fire Remediation">Fire Remediation</option><option value="Fire Services">Fire Services</option><option value="Floor Coverings">Floor Coverings</option><option value="Glaziers">Glaziers</option><option value="Glazing / Tinting">Glazing / Tinting</option><option value="Graffiti Removal">Graffiti Removal</option><option value="Hoist Repairs">Hoist Repairs</option><option value="HVAC">HVAC</option><option value="Labour Hire">Labour Hire</option><option value="Landscaping">Landscaping</option><option value="Line Marking">Line Marking</option><option value="Locksmith">Locksmith</option><option value="Mould Remediation">Mould Remediation</option><option value="Painting">Painting</option><option value="Pest Control">Pest Control</option><option value="Plastering">Plastering</option><option value="Plumbing &amp; Gas">Plumbing &amp; Gas</option><option value="Pump Maintenance">Pump Maintenance</option><option value="Refrigeration">Refrigeration</option><option value="Gutter Cleans">Gutter Cleans</option><option value="Scaffolding">Scaffolding</option><option value="Security">Security</option><option value="Shower Screens">Shower Screens</option><option value="Signage">Signage</option><option value="Steel Fabrication">Steel Fabrication</option><option value="Test &amp; Tag Services">Test &amp; Tag Services</option><option value="Tiling">Tiling</option><option value="Waterproofing">Waterproofing</option><option value="NA">NA</option><option value="Other">Other</option></select>
    		    	</div>
    			</div>
    		</div>
    	</div>
        <div class="row" style="margin-bottom: 12px;">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="form[company_account_business_hours]" placeholder="Business Hours" value="<?= $this->request->session()->read('Form.company_account_business_hours'); ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="company_account_business_hours_call_out" placeholder="Business Hours - Call Out Fee" value="<?= $this->request->session()->read('Form.company_account_business_hours_call_out'); ?>">
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 45px;">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="form[company_account_after_hours]" placeholder="After Hours Business Hours"  value="<?= $this->request->session()->read('Form.company_account_after_hours'); ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="form[company_account_after_hours_call_out]" placeholder="After Hours - Call Out Fee" value="<?= $this->request->session()->read('Form.company_account_after_hours_call_out'); ?>">
                </div>
            </div>
        </div>
        <div class="divider mg23"></div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 mob_gst">
                <div class="col-md-4" style="padding-left: 0px !important;">
                    <p class="please_select">Registered for GST?</p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                  <div class="control-group">
                    <label class="control control--checkbox">Yes
                      <input type="radio" value="Yes" name="form[company_account_registered_gst]" <?php if ($this->request->session()->read('Form.company_account_registered_gst') == 'Yes') { echo 'checked="checked"'; } ?>/>
                      <div class="control__indicator"></div>
                    </label>
                  </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                  <div class="control-group">
                    <label class="control control--checkbox">No
                      <input type="radio" value="No" name="form[company_account_registered_gst]" <?php if ($this->request->session()->read('Form.company_account_registered_gst') == 'No') { echo 'checked="checked"'; } ?>/>
                      <div class="control__indicator"></div>
                    </label>
                  </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                  <div class="control-group">
                    <label class="control control--checkbox">N/A
                      <input type="radio" value="N/A" name="form[company_account_registered_gst]" <?php if ($this->request->session()->read('Form.company_account_registered_gst') == 'N/A') { echo 'checked="checked"'; } ?>/>
                      <div class="control__indicator"></div>
                    </label>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Account Name" name="form[company_account_name]" value="<?= $this->request->session()->read('Form.company_account_name'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="BSB" name="form[company_account_bsb]" value="<?= $this->request->session()->read('Form.company_account_bsb'); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Account No" name="form[company_account_account_no]" value="<?= $this->request->session()->read('Form.company_account_account_no'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Trade Licenses No." name="form[company_account_trade_licence]" value="<?= $this->request->session()->read('Form.company_account_trade_licence'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                 <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Work Cover No." name="form[company_account_work_cover]" value="<?= $this->request->session()->read('Form.company_account_work_cover'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Policy No." name="form[company_account_policy_no]" value="<?= $this->request->session()->read('Form.company_account_policy_no'); ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Other" name="form[company_account_other]" value="<?= $this->request->session()->read('Form.company_account_other'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Insurance Notes" rows="5" name="form[company_account_insurance]"><?= $this->request->session()->read('Form.company_account_insurance'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <p class="please_select">Upload documents here (2mb limit)</p>
                 <p class="please_select files_list" style="display: none;"><u>Files : <br /></u></p>
                <div class="col-md-4 col-sm-4 col-xs-12" style="text-align: center;">
                    <label class="btn btn-primary file_btn_reg">
                        Public Liability <input type="file" style="display: none;" name="public_liability_file">
                    </label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12" style="text-align: center;">
                    <label class="btn btn-primary file_btn_reg">
                        Insurance <input type="file" style="display: none;" name="insurance_file">
                    </label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12" style="text-align: center;">
                    <label class="btn btn-primary file_btn_reg" style="padding-left: 10px; padding-right: 10px;">
                        Client Specific Inductions <input type="file" style="display: none;" name="client_specific_inductions_file">
                    </label>
                </div>
            </div>
        </div>

        <div class="divider" style="margin-top: 20px;"></div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="col-md-1 col-sm-2 col-xs-1 col-xs-offset-2">
                  <div class="control-group checkbox_tick">
                    <label class="control control--checkbox">
                      <input type="checkbox" value="1" class='accept_cgu'>
                      <div class="control__indicator"></div>
                    </label>
                  </div>
                </div>
                <div class="col-md-7 col-sm-4 col-xs-8 text-left">
                   <p class="please_select text-left yes_agree_tc" style="text-align: left !important;">Yes, I agree to the <a onclick="PopupCenterDual('/pages/terms_conditions?form','CGU','450','450'); " href="javascript:void(0);" class="see_terms" style="color: #81a828; font-weight: bold;">Terms and Conditions</a></p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group text-right">
                        <button class="btn btn-primary mt-sm no-txt-transform processTK" type="submit">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </form>