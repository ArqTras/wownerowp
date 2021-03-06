<?php foreach($errors as $error): ?>
<div class="error"><p><strong>Arqma Payments Error</strong>: <?php echo $error; ?></p></div>
<?php endforeach; ?>

<h1>Arqma Payments Settings</h1>

<?php if($confirm_type === 'arqma-wallet-rpc'): ?>
<div style="border:1px solid #ddd;padding:5px 10px;">
    <?php
         echo 'Wallet height: ' . $balance['height'] . '</br>';
         echo 'Your balance is: ' . $balance['balance'] . '</br>';
         echo 'Unlocked balance: ' . $balance['unlocked_balance'] . '</br>';
         ?>
</div>
<?php endif; ?>

<table class="form-table">
    <?php echo $settings_html ?>
</table>

<h4><a href="https://github.com/arqma/arqma-payments-woocommerce-gateway/blob/master/README.md">Learn more about using the Arqma payment gateway</a></h4>

<script>
function arqmaUpdateFields() {
    var confirmType = jQuery("#woocommerce_arqma_gateway_confirm_type").val();
    if(confirmType == "arqma-wallet-rpc") {
        jQuery("#woocommerce_arqma_gateway_arqma_address").closest("tr").hide();
        jQuery("#woocommerce_arqma_gateway_viewkey").closest("tr").hide();
        jQuery("#woocommerce_arqma_gateway_daemon_host").closest("tr").show();
        jQuery("#woocommerce_arqma_gateway_daemon_port").closest("tr").show();
    } else {
        jQuery("#woocommerce_arqma_gateway_arqma_address").closest("tr").show();
        jQuery("#woocommerce_arqma_gateway_viewkey").closest("tr").show();
        jQuery("#woocommerce_arqma_gateway_daemon_host").closest("tr").hide();
        jQuery("#woocommerce_arqma_gateway_daemon_port").closest("tr").hide();
    }
    var useArqmaPrices = jQuery("#woocommerce_arqma_gateway_use_arqma_price").is(":checked");
    if(useArqmaPrices) {
        jQuery("#woocommerce_arqma_gateway_use_arqma_price_decimals").closest("tr").show();
    } else {
        jQuery("#woocommerce_arqma_gateway_use_arqma_price_decimals").closest("tr").hide();
    }
}
arqmaUpdateFields();
jQuery("#woocommerce_arqma_gateway_confirm_type").change(arqmaUpdateFields);
jQuery("#woocommerce_arqma_gateway_use_arqma_price").change(arqmaUpdateFields);
</script>

<style>
#woocommerce_arqma_gateway_arqma_address,
#woocommerce_arqma_gateway_viewkey {
    width: 100%;
}
</style>
