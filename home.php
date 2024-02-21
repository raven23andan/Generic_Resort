<?php include("availability.php"); ?>
<style>
  .stretch img {
    width: 100%;
    height: 300px;
  }
</style>
<section class="services" style="margin-top:0px">
  <div class="container">
    <h2 class="page-header text-center">Resorts</h2>
    <input style="width: 100%; padding: 8px 14px; margin-bottom: 36px" placeholder="Search Resort" id="search-resort">
    <div class="row" id="resorts-row">
      <?php
      $sql = "SELECT * FROM `tbluseraccount` WHERE ROLE ='Resort' AND ResortAuth = 1";
      $mydb->setQuery($sql);
      $cur = $mydb->loadResultList();
      foreach ($cur as $result) {
      ?>

        <a href="index.php?p=resorts&id=<?php echo $result->USERID; ?>">
          <div class="col-md-4">
            <div class="panel panel-primary  ">
              <div class="panel-body stretch" style="padding:0px ">
                
                <img src="<?php echo WEB_ROOT . 'admin/mod_users/' . $result->Logo; ?>">
                
              </div>
              <?php
              $sql3 = "SELECT StoreID, AVG(RatingNo) AS AverageRating
              FROM tblrating
              WHERE StoreID = $result->USERID
              GROUP BY StoreID;";
              $mydb->setQuery($sql3);
              $cur2 = $mydb->loadResultList();
              ?>
              <div class="panel-footer" style="display: flex; flex-direction: column; align-items:center; justify-content:center">
                <h5 style="margin: 0"><?php echo $result->UNAME; ?></h5>
                <?php
                foreach ($cur2 as $result) {
                ?>
                <h5 style="margin: 0; margin-top: 4px;">Rating: <?php echo number_format($result->AverageRating, 1) ?><i class="glyphicon glyphicon-star gold" style="margin-top: 2px"></i></h5>
                <?php
                }
                ?>
                
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>

</section>
  <script>
  const searchInput = document.getElementById("search-resort");
  const contentDiv = document.getElementById("resorts-row");
  const contentElements = contentDiv.querySelectorAll(".panel.panel-primary"); 

  searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();

    contentElements.forEach(function(element) {
      const contentText = element.textContent.toLowerCase();
      if (contentText.includes(searchTerm)) {
        element.style.display = "block"; 
      } else {
        element.style.display = "none"; 
      }
    });
  });
</script>