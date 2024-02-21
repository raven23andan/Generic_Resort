 <?php
require_once("../includes/initialize.php");

$setting = new Setting();
$result = $setting->find_all_setting('Terms');
?>
  

            <div class="modal fade" id="logout" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">

<body>
<div class="view"> 
      <p style="align:center;font-size:15px;font-weight:bold;">TERMS & CONDITIONS</p>
        
       <?php echo isset($result->DESCRIPTION) ? $result->DESCRIPTION : '';?>
</div>
</body>
</html>

</div>
 
</div>
</div>       