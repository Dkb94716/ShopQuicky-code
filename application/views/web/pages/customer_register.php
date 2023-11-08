

<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Register New Account</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/save');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="customer_name" placeholder="Enter Your Name" value="<?php echo set_value('customer_name');?>"/>
                                    <?php echo form_error('customer_name', '<span class="error_danger">', '</span>'); ?>
                                </div>

                                <div>
                                    <input type="text" name="customer_password" placeholder="Enter Your Password" value="<?php echo set_value('customer_password');?>"/>
                                    <?php echo form_error('customer_password', '<span class="error_danger">', '</span>'); ?>

                                </div>

                                <div>
                                    <input type="text" name="customer_city" placeholder="Enter Your City" value="<?php echo set_value('customer_city');?>"/>
                                    <?php echo form_error('customer_city', '<span class="error_danger">', '</span>'); ?>
                                </div>
                                <div>
                                    <input type="text" name="customer_phone" placeholder="Enter Your Phone" value="<?php echo set_value('customer_phone');?>"/>
                                    <?php echo form_error('customer_phone', '<span class="error_danger">', '</span>'); ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="customer_email" placeholder="Enter Your Email" value="<?php echo set_value('customer_email');?>"/>
                                    <?php echo form_error('customer_email', '<span class="error_danger">', '</span>'); ?>
                                </div>
                                        

                                <div>
                                    <input type="text" name="customer_address" placeholder="Enter Your Address" value="<?php echo set_value('customer_address');?>"/>
                                    <?php echo form_error('customer_address', '<span class="error_danger">', '</span>'); ?>
                                </div>
                                
                                <div>
                                    <select id="country" name="customer_country" class="frm-field required" value="<?php echo set_value('customer_country');?>"/>
                                        <option value="none" <?php echo set_select('select', 'none', true);?>>Select a Country</option>   
                                        <option value="India" <?php echo set_select('select', 'India');?>>India</option>      
                                        <option value="Afghanistan" <?php echo set_select('select', 'Afghanistan');?> >Afghanistan</option>
                                        <option value="Albania" <?php echo set_select('select', 'Albania');?>>Albania</option>
                                        <option value="Algeria" <?php echo set_select('select', 'Algeria');?>>Algeria</option>
                                        <option value="Argentina" <?php echo set_select('select', 'Argentina');?>>Argentina</option>
                                        <option value="Armenia" <?php echo set_select('select', 'Armenia');?>>Armenia</option>
                                        <option value="Aruba" <?php echo set_select('select', 'Aruba');?>>Aruba</option>
                                        <option value="Australia" <?php echo set_select('select', 'Australia');?>>Australia</option>
                                        <option value="Austria" <?php echo set_select('select', 'Austria');?>>Austria</option>
                                        <option value="Azerbaijan" <?php echo set_select('select', 'Azerbaijan');?>>Azerbaijan</option>
                                        <option value="Bahamas" <?php echo set_select('select', 'Bahamas');?>>Bahamas</option>
                                        <option value="Bahrain" <?php echo set_select('select', 'Bahrain');?>>Bahrain</option>
                                        <option value="Bangladesh" <?php echo set_select('select', 'Bangladesh');?>>Bangladesh</option>
                                        <option value="Netherland" <?php echo set_select('select', 'Netherland');?>>Netherland</option>
                                        <option value="USA" <?php echo set_select('select', 'USA');?>>USA</option>

                                    </select>
                                    <?php echo form_error('customer_country', '<span class="error_danger">', '</span>'); ?>
                                </div>		

                                <div>
                                    <input type="text" name="customer_zipcode" placeholder="Enter Your ZipCode" value="<?php echo set_value('customer_zipcode');?>"/>
                                    <?php echo form_error('customer_zipcode', '<span class="error_danger">', '</span>'); ?>
                                </div>
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="grey">Create Account</button></div></div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>