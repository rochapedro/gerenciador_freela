
 <?php 
$attributes = array('class' => '', 'id' => 'payment-form');
echo form_open($form_action, $attributes); 
?>
<input type="hidden" name="id" value="<?= $invoices->id;?>">
<input type="hidden" name="sum" value="<?= $sum;?>">
        <?php 
        if (isset($errors) && !empty($errors) && is_array($errors)) {
            echo '<div class="alert alert-danger"><h4>Error!</h4>The following error(s) occurred:<ul>';
            foreach ($errors as $e) {
                echo "<li>$e</li>";
            }
            echo '</ul></div>'; 
        }?>

        <div id="payment-errors" class="payment-errors"></div>

        <div class="payment-help"><?=$this->lang->line('application_you_can_pay_with');?>: Mastercard, Visa, American Express, JCB, Discover, Diners Club.</div>

        <div class="form-group">
        <label><?=$this->lang->line('application_card_number');?></label>
        <input type="text" size="20" autocomplete="off" class="form-control card-number input-medium">
        <span class="help-block"><?=$this->lang->line('application_enter_without_spaces');?></span>
        </div>

        <div class="form-group">
        <label>CVC</label>
        <input type="text" size="4" autocomplete="off" class="form-control card-cvc input-mini">
        
        </div>
        <div class="form-group">
        <label><?=$this->lang->line('application_expiration');?> (MM/YYYY)</label>
        <div class="row">
              <div class="col-xs-3 col-md-2">
                <input type="text" class="form-control card-expiry-month" >
              </div>
              <div class="col-xs-1 col-md-1" style="line-height: 35px; text-align: center; font-size: 19px; width: 30px;">
                <span> / </span>
              </div>
              <div class="col-xs-4 col-md-2">
                <input type="text" size="4" class="form-control card-expiry-year">
              </div>
        </div>
        </div>
        
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="submitBtn"><?=$this->lang->line('application_send');?></button>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>


<script type="text/javascript">// <![CDATA[
Stripe.setPublishableKey('<?php echo $public_key; ?>');
// ]]></script>


<script type="text/javascript" src="<?=base_url()?>assets/blueline/js/plugins/buy.js"></script>
<script type="text/javascript">

$(document).ready(function() {

    $("#payment-form").submit(function(event) {
        $('#submitBtn').attr('disabled', 'disabled');
        return false;
    }); 
    $("#payment-form").change(function() {
        $('#submitBtn').removeAttr("disabled");
    });

}); 
</script>

