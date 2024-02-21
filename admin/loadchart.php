<?php  
require_once ("../includes/initialize.php");
 
if (isset($_POST['MonthValue'])) {
    
    $monthvalue = isset($_POST['MonthValue']) ? $_POST['MonthValue'] : 0; 
     $usertype = $_SESSION['ADMIN_UROLE'];

    if($usertype=='Administrator'){
        if ($monthvalue=='') {
       
            $monthvalue = date('Y');
            $sql = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout','Confirmed',  'Checkedin') AND YEAR(TRANSDATE)={$monthvalue} GROUP BY r.`ROOMID`";
        }else{

             $sql = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout','Confirmed',  'Checkedin') AND MONTH(TRANSDATE)={$monthvalue} GROUP BY r.`ROOMID`";
        }
    }else{
        if ($monthvalue=='') {
        
        $monthvalue = date('Y');
         $sql = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout','Confirmed',  'Checkedin') AND YEAR(TRANSDATE)={$monthvalue} AND r.ResortID='{$_SESSION['ADMIN_ID']}' GROUP BY r.`ROOMID`";
        }else{

             $sql = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout','Confirmed',  'Checkedin') AND MONTH(TRANSDATE)={$monthvalue} AND r.ResortID='{$_SESSION['ADMIN_ID']}' GROUP BY r.`ROOMID`";
        }

    }
 
 
       
        
        $mydb->setQuery($sql);
        $maxrow = $mydb->num_rows($mydb->executeQuery());

        if ($maxrow > 0) {
            
            $res = $mydb->loadResultList(); 
            foreach ($res as $row) {
                
                $label  = $row->ROOM . ' (' . $row->NUMPERSON.' pax)';
                $data[] =  array('y' => $row->Amount,'label' => $label);
            }

        }else{
            $data[] =  array('y' => 0,'label' => "None");
        }
        ?>


<script src="<?php echo WEB_ROOT; ?>admin/js/canvasjs/canvasjs.min.js"></script>
         <div class="chart" id="chartContainer"></div> 
 <script type="text/javascript">

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2", 
  exportEnabled: true,
  animationEnabled: true,
  title: {
    text: "Most Booked Room"
},
data: [{
    type: "column",
    startAngle: 25,
    toolTipContent: "<b>{label}</b>: Profit {y}",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 10,
    
    dataPoints:<?php echo json_encode($data,JSON_NUMERIC_CHECK);?>
 
}]
});

 

 chart.render(); 



</script>
<?php
}

 
  

if (isset($_POST['dateFilter'])) {
      

    $dateFilter = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : 0; 
    $usertype = $_SESSION['ADMIN_UROLE'];

    if($usertype=='Administrator'){
        if ($dateFilter=='') {
       
        $year_data = date('Y');
        $sql1 = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr  WHERE r.`ROOMID`=sr.`ROOMID`   AND `STATUS` in ('Checkedout',  'Checkedin') AND  YEAR(TRANSDATE)='{$year_data}' GROUP BY MONTH(TRANSDATE)";
        }else{

        $sql1 = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout',  'Checkedin') AND MONTH(TRANSDATE)='{$dateFilter}'  GROUP BY TRANSDATE";
        }
        
        
            $mydb->setQuery($sql1);
            $maxrow1 = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow1 > 0) {
                
                $resul = $mydb->loadResultList(); 
                foreach ($resul as $rows) {
                    
                  if($dateFilter==''){
                    $labels = date_format(date_create($rows->TRANSDATE),'M');
                  }else{
                    $labels  = $rows->TRANSDATE; 
                  }
                    $datas[] =  array('y' => $rows->Amount,'label' => $labels);
                }
            
            }else{
                $datas[] =  array('y' => 0,'label' => "None");
            }

    }else{
        if ($dateFilter=='') {
        
        $year_data = date('Y');
        $sql1 = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout',  'Checkedin') AND YEAR(TRANSDATE)='{$year_data}' AND r.ResortID='{$_SESSION['ADMIN_ID']}' GROUP BY MONTH(TRANSDATE)";
            }else{

            $sql1 = "SELECT *,sum(`RPRICE`) as Amount FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID` AND `STATUS` in ('Checkedout',  'Checkedin') AND MONTH(TRANSDATE)='{$dateFilter}' AND r.ResortID='{$_SESSION['ADMIN_ID']}' GROUP BY TRANSDATE";
            }
            
            
            $mydb->setQuery($sql1);
            $maxrow1 = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow1 > 0) {
                
                $resul = $mydb->loadResultList(); 
                foreach ($resul as $rows) {
                    
                  if($dateFilter==''){
                    $labels = date_format(date_create($rows->TRANSDATE),'M');
                  }else{
                    $labels  = $rows->TRANSDATE; 
                  }
                    $datas[] =  array('y' => $rows->Amount,'label' => $labels);
                }
            
            }else{
                $datas[] =  array('y' => 0,'label' => "None");
            }

    }

   
       




?>

<script src="<?php echo WEB_ROOT; ?>admin/js/canvasjs/canvasjs.min.js"></script>
<div class="chart1" id="chartContainer1"></div>
 <script type="text/javascript"> 
var chart1 = new CanvasJS.Chart("chartContainer1", {
  theme: "light2", 
  exportEnabled: true,
  animationEnabled: true,
  title: {
    text: "Total Sales Analytics"
},
data: [{
    type: "area",
    startAngle: 25,
    toolTipContent: "<b>{label}</b>: Profit {y}",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 10,
    indexLabel: "{label} - Profit {y}",
    dataPoints:<?php echo json_encode($datas,JSON_NUMERIC_CHECK);?>

    
}]
});

 
 chart1.render();



</script>
<?php
}  
?>
<style type="text/css">


    .stretch {
        min-height: 450px;
        font-size: 12px;
    }

    .stretch > .chart {
        width: 100%;   
    }

    .stretch > .chart1 {
        width: 100%;   
    }
</style> 

