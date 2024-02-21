<?php

$setting = new Setting();
$result = $setting->find_all_setting('About Us');
?>
<section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About Us</h2>
                    </div>
                        <div><?php echo isset($result->DESCRIPTION) ? $result->DESCRIPTION : '';?></div>
                </div> 
            </div>
        </div>
    </section>


 