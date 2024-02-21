<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo isset($title) ? $title . ' | The Generic Resort' :  'The Generic Resort'; ?></title>


  <link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="<?php echo WEB_ROOT; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet" media="screen"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>admin/css/jquery.dataTables.css">
  <link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-modal.js"></script>
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
  <script src="<?php echo WEB_ROOT; ?>admin/plugins/nicEdit/nicEdit.js"></script>
  <script src="<?php echo WEB_ROOT; ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>admin/css/app.css">
</head>
<style>
  .nicEdit-main {
    outline: 0;
    background-color: white;
  }
</style>
<script type="text/javascript">
  
  $(document).ready(function() {

  
    $('.cls_btn').click(function() {
      
      var id = $(this).attr('id');
    
      console.log($(this).attr('id'));

      
      $.ajax({

        type: "POST",
        
        url: "some.php",
        
        data: {
          id: id,
          name: 'kevin'
        }
      })
     

    });

  });
</script>
<script type="text/javascript" charset="utf-8">
  $(document).on("click", ".get-id", function() {
    var p_id = $(this).data('id');
    $(".modal-body #infoid").val(p_id);

  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.toggle-modal').click(function() {
      $('#logout').modal('toggle');
    });
  });

  $(document).ready(function() {
    $('.logo-modal').click(function() {
      $('#logoModal').modal('toggle');
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.toggle-modal-reserve').click(function() {
      var roomID = $(this).data('id');
      var code = $("#TransactionCode").val();
      $('#reservation').modal('toggle');
      $('.modal-body #roomID').val(roomID);
      $('.modal-body #Code').val(code);
      $.ajax({ 
        type: "POST",
        url: "loadaddons.php",
        dataType: "text", 
        data: {
          ROOMID: roomID,
          Code: code
        },
        success: function(data) {
          $("#showAddons").html(data);
          
        }

      });
    });
  });

  $(document).on("change", "#type", function() {

    var id = $(this).val();
    if (id == "Chatbot") {
      $('#chatkeyword').css({
        'display': 'block'
      });

    } else {

      $('#chatkeyword').css({
        'display': 'none'
      });
    }

  });


  
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.roomImg').click(function() {
      var id = $(this).data('id');
      

      $.ajax({ 
        type: "POST",
        url: "editpic.php",
        dataType: "text",  
        data: {
          ROOMID: id
        },
        success: function(data) {
          $('#myModal').modal('toggle').html(data);
          

        }
      });
    });
  });
</script>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    var t = $('#example').DataTable({
      "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 1
      }],

      "bLengthChange": false, 
      
      "order": [
        [1, 'desc']
      ]
    });

    t.on('order.dt search.dt', function() {
      t.column(0, {
        search: 'applied',
        order: 'applied'
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();
  });


  $(document).ready(function() {
    var t = $('#table').DataTable({
      "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 0
      }],
     
      "order": [
        [7, 'desc']
      ]
    });

    t.on('order.dt search.dt', function() {
      t.column(0, {
        search: 'applied',
        order: 'applied'
      }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();
  });
</script>
<link href="<?php echo WEB_ROOT; ?>admin/css/offcanvas.css" rel="stylesheet">
<?php
admin_logged_in();
?>

<body>
  
  <?php
  $user = new User();
  $single_user = $user->single_user($_SESSION['ADMIN_ID']);

  ?>
  <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <li class="dropdown">
          <a class="navbar-brand  dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img style="width:20px;height:20px" src="<?php echo WEB_ROOT . 'admin/mod_users/' . $single_user->Logo; ?>" /> <?php echo $single_user->UNAME; ?> <span style="color:#fff" class="glyphicon glyphicon-menu-down"></span></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo WEB_ROOT . 'admin/mod_users/index.php?view=view&id=' . $single_user->USERID; ?>">Manage Account</a></li>
            <li class="<?php echo (currentpage() == 'mod_settings') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_settings/index.php">Site Settings</a></li>

            <li class="<?php echo (currentpage() == 'logout.php') ? "active" : false; ?>"><a class="toggle-modal" href="#logout">Logout</a></li>
          </ul>
        </li>


      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="<?php echo (currentpage() == 'index.php') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/index.php">Dashboard</a></li>
          <?php if ($_SESSION['ADMIN_UROLE'] == "Resort") { ?>
            <li class="<?php echo (currentpage() == 'mod_room') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_room/index.php">Accomodation</a></li>
            <li class="<?php echo (currentpage() == 'mod_addons') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_addons/index.php">Addons</a></li>
            <li class="<?php echo (currentpage() == 'mod_amenities') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_amenities/index.php">Amenities</a></li>
            <li class="<?php echo (currentpage() == 'mod_food') ? "active" : false;?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_food/index.php">Foods</a></li>
            <li class="<?php echo (currentpage() == 'mod_reservation') ? "active" : false; ?>">

              <?php
              $query = "SELECT count(*) as 'Total' FROM `tblpayment` WHERE `STATUS`='Pending' AND ResortID='{$_SESSION['ADMIN_ID']}'";
              $mydb->setQuery($query);
              $cur = $mydb->loadResultList();
              foreach ($cur as $result) {
              ?>
                <a href="<?php echo WEB_ROOT; ?>admin/mod_reservation/index.php">Reservation <?php echo  isset($result->Total) ? '<span class="label label-danger">' . $result->Total . '</span>' : ''; ?> </a>
              <?php
              }
              ?>
            </li>
          <?php } ?>

          <!-- <li class="<?php echo (currentpage() == 'mod_comments') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_comments/index.php">Comments</a></li>  -->
          <?php if ($_SESSION['ADMIN_UROLE'] == "Resort") { ?>
            <!--<li class="<?php echo (currentpage() == 'mod_reports') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_reports/index.php">Reports</a></li>-->
          <?php } ?>
          <?php if ($_SESSION['ADMIN_UROLE'] == "Administrator") { ?>
            <li class="<?php echo (currentpage() == 'mod_resort') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_resort/index.php">Resorts</a></li>
            <li class="<?php echo (currentpage() == 'mod_users') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_users/index.php">Manage Users</a></li>
          <?php } ?>

          <!-- <li class="nav-item dropdown">-->
          <!--      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">-->
          <!--          <img style="width:20px;height:20px" src="<?php echo WEB_ROOT . 'admin/mod_users/' . $single_user->Logo; ?>"/>-->

          <!--         <span class="glyphicon glyphicon-chevron-down"></span>-->
          <!--      </a>-->
          <!--      <ul class="dropdown-menu">-->
          <!--        <li><a class="dropdown-item" href="<?php echo WEB_ROOT . 'admin/mod_users/index.php?view=view&id=' . $single_user->USERID; ?>">Manage Account</a></li>  -->
          <!--<li class="<?php echo (currentpage() == 'mod_settings') ? "active" : false; ?>"><a href="<?php echo WEB_ROOT; ?>admin/mod_settings/index.php" >Site Settings</a></li>  -->

          <!--        <li class="<?php echo (currentpage() == 'logout.php') ? "active" : false; ?>"><a class="toggle-modal" href="#logout">Logout</a></li> -->
          <!--      </ul>-->
          <!--    </li>-->
        </ul>

      </div>
    </div>
  </div>

 

  <div class="container">
    <?php
    check_message();

    ?>
    <?php 
    ?>
    <?php require_once $content; ?>
    

    
    <footer>
     

      <script>
        function checkall(selector) {
          if (document.getElementById('chkall').checked == true) {
            var chkelement = document.getElementsByName(selector);
            for (var i = 0; i < chkelement.length; i++) {
              chkelement.item(i).checked = true;
            }
          } else {
            var chkelement = document.getElementsByName(selector);
            for (var i = 0; i < chkelement.length; i++) {
              chkelement.item(i).checked = false;
            }
          }
        }

        function checkNumber(textBox) {
          while (textBox.value.length > 0 && isNaN(textBox.value)) {
            textBox.value = textBox.value.substring(0, textBox.value.length - 1)
          }
          textBox.value = textBox.value.trim();
        }
        //
        function checkText(textBox) {
          var alphaExp = /^[a-zA-Z]+$/;
          while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
            textBox.value = textBox.value.substring(0, textBox.value.length - 1)
          }
          textBox.value = trim(textBox.value);
        }
      </script>
    </footer>
  </div>
  
</body>

</html>
<script type="text/javascript">
  $('#Type').change(function() {
    var type = $(this).val();
    


    switch (type) {
      case 'Room':
        $('#lblRname').html("Room Name");
        $('#view_rname').show();
        $('#ROOM').val('');

        break;
      case 'Function Hall':
        $('#lblRname').html("Function Hall Name");
        $('#view_rname').hide();
        $('#ROOM').val('Function Hall');

        break;

      case 'Private Pool':
        $('#lblRname').html("Cottage Name");
        $('#view_rname').hide();
        $('#ROOM').val('Private Pool');

        break;

      case 'Public Pool':
        $('#lblRname').html("Cottage Name");
        $('#view_rname').show();
        $('#ROOM').val('');

        break;

      case 'Kids and Pool Pavillon':

        $('#lblRname').html("Cottage Name");
        $('#view_rname').show();
        $('#ROOM').val('');
        break;

    }

    $.ajax({ 
      type: "POST",
      url: "loadpricing.php",
      dataType: "text",  
      data: {
        view: type
      },
      success: function(data) {
        $('#showprice').html(data);
        
      }

    });


  });
</script>
<script type="text/javascript">
  $('.start').datetimepicker({
    language: 'en',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });
  $('.end').datetimepicker({
    language: 'en',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });


  $(function() {

    var NicEditconfig = {
      buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'fontSize', 'fontFamily', 'fontFormat', 'indent', 'outdent', 'link', 'unlink', 'forecolor', 'subscript', 'superscript']
    };

    var nE = new nicEditor(NicEditconfig);

    nE.panelInstance('compose-textarea4');



  });


  $(document).on("change", "#monthFilter", function() {
    var monthvalue = $(this).val();
    
    if (monthvalue == '') {

      $.ajax({ 
        type: "POST",
        url: "loadchart.php",
           
        dataType: "text", 
        data: {
          MonthValue: monthvalue
        },
        success: function(data) {
          $('.stretch1').html(data);
          
        }

      });
    } else {

      $.ajax({ 
        type: "POST",
        url: "loadchart.php",
           
        dataType: "text", 
        data: {
          MonthValue: monthvalue
        },
        success: function(data) {
          $('.stretch1').html(data);
          
        }

      });


    }
  });

  $(document).on("change", "#dateFilter", function() {
    var datefilter = $(this).val();

    if (datefilter == '') {
      $.ajax({ 
        type: "POST",
        url: "loadchart_modified.php?action=load_chart_by_month_sales",
        dataType: "text",  
        data: {
          dateFilter: datefilter
        },
        success: function(data) {
                      
          $('.stretch').html(data);
        }

      });
    } else {
      $.ajax({ 
        type: "POST",
        url: "loadchart_modified.php?action=load_chart_by_date_sales",
        dataType: "text", 
        data: {
          dateFilter: datefilter
        },
        success: function(data) {
                             
          $('.stretch').html(data);
        }

      });

    }


  });

  window.addEventListener('load', function() {
    var monthvalue = "";
    var datefilter = "";

    $.ajax({ 
      type: "POST",
      url: "loadchart_modified.php?action=load_chart_by_month_rooms",
         
      dataType: "text", 
      data: {
        MonthValue: monthvalue
      },
      success: function(data) {
        $('.stretch1').html(data);
        
      }

    });
    $.ajax({ 
      type: "POST",
      url: "loadchart_modified.php?action=load_chart_by_month_sales",
      dataType: "text",  
      data: {
        dateFilter: datefilter
      },
      success: function(data) {
                     
        $('.stretch').html(data);
      }

    });

  });
</script>