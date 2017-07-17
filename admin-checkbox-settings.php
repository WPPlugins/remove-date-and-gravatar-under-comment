<h2><?php _e('Welcome to Remove Comment Date and Gravatar Plugin   '); ?></h2>
<?php
/* Getting checkbox cheked values from datbase  */
$comment_date = get_option('hcdg_remove_date');
$comment_gravatar = get_option('hcdg_remove_gravatar');
?>

<!-- Checkbox form start here -->
<div class="hid_c_d_g_inside">
    <form name="hid_c_d_g_e" method="post">	

        <div class="hid_c_d_g">
            <label><input type="checkbox"  name="date_r" class="hid_c_d_g_date" value="date" <?php if ($comment_date == '1') { ?>checked="checked" <?php } ?>> Remove Comment Date</label>
        </div>
        <div class="hid_c_d_g">
            <label><input type="checkbox"  name="gravatar_r" class="hid_c_d_g_gravatar" value="gravatar" <?php if ($comment_gravatar == '1') { ?>checked="checked" <?php } ?>> Remove Comment Author's Gravatar</label>
        </div>

        <div class="hid_c_d_g_submit_s">
            <i> Please select or unselect above and click on SUBMIT button</i><br><br>
            <input type="submit" name="hid_c_d_g_submit" class="hid_c_d_g_sub" value="Submit"> 
        </div> 

    </form>
</div>   
<!-- Checkbox form end here -->


<!-- Donate Button form Start here -->
<div class="donate_ad_plugin">
<span>If you're like this plugin, donate your small amount for encourage us</span>
 <form method="post" action="https://www.paypal.com/cgi-bin/webscr" target="_blank">
    <div class="paypal-donations">
        <input type="hidden" value="_donations" name="cmd">
        <input type="hidden" value="TipsandTricks_SP" name="bn">
        <input type="hidden" value="venugopalnakka@gmail.com" name="business">
        <input type="hidden" value="http://plugin.dev3.webenabled.net/thank-you/" name="return">
        <input type="hidden" value="Plugin Donation" name="item_name">
        <input type="hidden" value="0" name="rm">
        <input type="hidden" value="USD" name="currency_code">
        <input type="image" alt="PayPal - The safer, easier way to pay online." name="submit" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif">
        <img width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" alt="">
    </div>
</form>
</div>
<!-- Donate Button form End here -->
