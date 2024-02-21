<?php

$setting = new Setting();
$result = $setting->find_all_setting('FAQ');
?>
<section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>FAQ</h2>
                         <div><?php echo isset($result->DESCRIPTION) ? $result->DESCRIPTION : '';?></div>
                    </div>
                </div> 
            </div>
        </div>
    </section>


 