<?php

$setting = new Setting();
$result = $setting->find_all_setting('Contact Us');


$setting = new Setting();
$map = $setting->find_all_setting('Map');
?>
<section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Contact Information</h2>
                    </div>
                        <div><?php echo $result->DESCRIPTION;?></div>
                </div>
                 
            </div>
        </div>
    </section>

 
    <section class="map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="map">
        <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->

                        <?php echo $map->DESCRIPTION;?>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
