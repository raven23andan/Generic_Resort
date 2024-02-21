<?php
require_once ("../includes/initialize.php");  
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$usertype = $_SESSION['ADMIN_UROLE'];
switch ($action) {
    case 'load_chart_by_month_sales' : 
        if ($usertype=='Administrator') {
            
            doLoadSalesByMonthAdmin(); 
        }else{
           doLoadSalesByMonthResort();

        } 
    break;

    
    case 'load_chart_by_date_sales' : 
     if ($usertype=='Administrator') {
           
        doLoadSalesByDateAdmin();
      }else{
        doLoadSalesByDateResort();
     } 
    break;

    case 'load_chart_by_month_rooms' : 
        if ($usertype=='Administrator') {
            
            doLoadBookedRoomsByMonthAdmin();
        }else{
            doLoadSalesByMonthResort();
        } 
    break;
 



}
// ********************** for admin **********************************************
function doLoadSalesByMonthAdmin()
{
    
    global $mydb;
     $year_data = date('Y');
     $datas =array();
            $sql = "SELECT *  FROM `tblroom` r,`tblreservation` sr,tbluseraccount u WHERE r.`ROOMID`=sr.`ROOMID` AND r.ResortID=USERID   AND `STATUS` in ('Checkedout',  'Checkedin') AND  YEAR(TRANSDATE)='{$year_data}' GROUP BY USERID";  
             $mydb->setQuery($sql);
            $maxrow1 = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow1 > 0) {
                
                $result = $mydb->loadResultList(); 
                foreach ($result as $rows) {
                    
                    $userID = $rows->USERID; 
                     $resortName = $rows->UNAME;  
                        
                            $sql="SELECT  sum(`RPRICE`) as 'y', DATE_FORMAT(`TRANSDATE`, '%M %Y') as 'label' FROM `tblroom` r,`tblreservation` sr  WHERE r.`ROOMID`=sr.`ROOMID`  AND `STATUS` in ('Checkedout',  'Checkedin')   AND  YEAR(TRANSDATE)='{$year_data}' AND sr.`ResortID`='{$userID}'   GROUP BY MONTH(TRANSDATE) ";
                            $mydb->setQuery($sql); 
                            $result_datapoints = $mydb->loadResultList();  
                         
                          array_push($datas, array(
                                    'type' => "stackedArea", 
                                    'name' => $resortName, 
                                    'showInLegend' => "true", 
                                    'yValueFormatString'=> "₱#,##0.##",      
                                    'dataPoints' =>  $result_datapoints ));

                    
                     
                }
 
            }else{
                  $result_datapoints[] =  array('y' => 0,'label' => "NO DATA AVAILABLE");
                    array_push($datas, array(
                                    'type' => "stackedArea", 
                                    'name' => "",  
                                    'showInLegend' => "true",    
                                    'dataPoints' =>  $result_datapoints ));
            }

            doDisplayChartSales($datas);
}

function doLoadSalesByDateAdmin()
{
    
    global $mydb;

      $dateFilter = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : 0; 
     $year_data = date('Y');
         $datas =array();


        $sql = "SELECT *  FROM `tblroom` r,`tblreservation` sr,tbluseraccount u WHERE r.`ROOMID`=sr.`ROOMID` AND r.ResortID=USERID   AND `STATUS` in ('Checkedout',  'Checkedin') AND  YEAR(TRANSDATE)='{$year_data}' AND  MONTH(TRANSDATE)='{$dateFilter}' GROUP BY USERID"; 

             $mydb->setQuery($sql);
            $maxrow1 = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow1 > 0) {
                
                $result = $mydb->loadResultList(); 
                foreach ($result as $rows) {
                    
                    $userID = $rows->USERID; 
                     $resortName = $rows->UNAME;  
                        
                            $sql="SELECT  sum(`RPRICE`) as 'y', DATE_FORMAT(`TRANSDATE`, '%M %D %Y') as 'label' FROM `tblroom` r,`tblreservation` sr  WHERE r.`ROOMID`=sr.`ROOMID`  AND `STATUS` in ('Checkedout',  'Checkedin')    AND  YEAR(TRANSDATE)='{$year_data}' AND  MONTH(TRANSDATE)='{$dateFilter}' AND sr.`ResortID`='{$userID}'   GROUP BY TRANSDATE";
                            $mydb->setQuery($sql); 
                            $result_datapoints = $mydb->loadResultList();  
                         
                          array_push($datas, array(
                                    'type' => "stackedArea", 
                                    'name' => $resortName, 
                                    'showInLegend' => "true", 
                                    'yValueFormatString'=> "₱#,##0.##",      
                                    'dataPoints' =>  $result_datapoints ));

                    
                     
                }
 
            }else{
                    $result_datapoints[] =  array('y' => 0,'label' => "NO DATA AVAILABLE");
                    array_push($datas, array(
                                    'type' => "stackedArea",  
                                    'name' => "",  
                                    'showInLegend' => "true",    
                                    'dataPoints' =>  $result_datapoints ));

              
            }

            doDisplayChartSales($datas);
}

function doLoadBookedRoomsByMonthAdmin()
{


    global $mydb;
     $year_data = date('Y');
     $datas =array();
     $result_datapoints = array();
     $arr_result_datapoints_y =array();
     $arr_result_datapoints_x = array();
            $sql = "SELECT *  FROM `tblroom` r,`tblreservation` sr,tbluseraccount u WHERE r.`ROOMID`=sr.`ROOMID` AND r.ResortID=USERID    AND `STATUS` in ('Checkedout','Confirmed',  'Checkedin') AND  YEAR(TRANSDATE)='{$year_data}' GROUP BY  sr.`ResortID` ";  
             $mydb->setQuery($sql);
            $maxrow1 = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow1 > 0) {
                // code...
                $result = $mydb->loadResultList(); 
                foreach ($result as $rows) {
                    // code...
                    $userID = $rows->ResortID;   
                     $roomName = $rows->ROOM;
                     $roomID = $rows->ROOMID; 
                     $resortName = $rows->UNAME;
                            
                        
                            $sql="SELECT  DATE_FORMAT(`TRANSDATE`, '%M %Y') as 'label',TRANSDATE  FROM `tblroom` r,`tblreservation` sr WHERE r.`ROOMID`=sr.`ROOMID`   AND `STATUS` in ('Checkedout','Confirmed',  'Checkedin')  AND  YEAR(TRANSDATE)='{$year_data}' AND sr.`ResortID`='{$userID}' GROUP BY MONTH(TRANSDATE)  "; 
                            $mydb->setQuery($sql); 
                            $result_datapoints_x = $mydb->loadResultList();
                             foreach ($result_datapoints_x as $data_result_x) {
                              
                                    $month = date_format(date_create($data_result_x->TRANSDATE),'m');

                                       $sql ="SELECT COUNT(r.ROOMID) as y  FROM `tblroom` r,`tblreservation` sr,tbluseraccount u WHERE r.`ROOMID`=sr.`ROOMID` AND r.ResortID=USERID   AND  YEAR(TRANSDATE)='{$year_data}' AND MONTH(TRANSDATE)='{$month}'  AND sr.`ResortID`='{$userID}' AND `STATUS` in ('Checkedout','Confirmed', 'Checkedin') GROUP BY r.`ROOMID`"; 
                                            $mydb->setQuery($sql);  
                                            $result_datapoints_y = $mydb->loadResultList();
                                     foreach ($result_datapoints_y as $data_result_y) {
                                              

                                              if (!array_key_exists($data_result_y->y,$arr_result_datapoints_y))
                                              {
                                                  

                                                 $arr_result_datapoints_y[]  = $data_result_y->y;
                                              }
                                       }

 


                                        array_push($arr_result_datapoints_x ,array("label"=>$data_result_x->label,"y"=> $arr_result_datapoints_y ));
                                     


                            }

                    

 
                          array_push($datas, array(
                                    'type' => "area",  
                                    'name' => $resortName ,  
                                    'showInLegend' => "true", 
                                    'indexLabel'=> "{label}",    
                                    'dataPoints' =>  $arr_result_datapoints_x));

                    
                     
                }
 
            }else{
                  $result_datapoints[] =  array('y' => 0,'label' => "NO DATA AVAILABLE");
                    array_push($datas, array(
                                    'type' => "area", 
                                    'name' => "",  
                                    'showInLegend' => "true",    
                                    'dataPoints' =>  $result_datapoints ));
            }

            doDisplayChartBookRooms($datas);
}



//*************************************** for resort *********************************//
function doLoadSalesByMonthResort()
{
    // code...
    global $mydb;
      $dateFilter = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : 0; 
     $year_data = date('Y');
     $datas =array();
     $resortID =  $_SESSION['ADMIN_ID'];
       
                        
            $sql="SELECT  sum(`RPRICE`) as 'y', DATE_FORMAT(`TRANSDATE`, '%M %Y') as 'label' FROM `tblroom` r,`tblreservation` sr  WHERE r.`ROOMID`=sr.`ROOMID`  AND `STATUS` in ('Checkedout',  'Checkedin')   AND  YEAR(TRANSDATE)='{$year_data}' AND sr.`ResortID`='{$resortID}'   GROUP BY MONTH(TRANSDATE) ";
            $mydb->setQuery($sql); 
            $maxrow = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow > 0) {
             $result_datapoints = $mydb->loadResultList();  
         
                array_push($datas, array(
                    'type' => "stackedArea", 
                    'name' => "Sales Report", 
                    'showInLegend' => "true", 
                    'yValueFormatString'=> "₱#,##0.##",      
                    'dataPoints' =>  $result_datapoints ));

                     
 
            }else{
                  $result_datapoints[] =  array('y' => 0,'label' => "NO DATA AVAILABLE");
                    array_push($datas, array(
                                    'type' => "stackedArea", 
                                    'name' => "",  
                                    'showInLegend' => "true",    
                                    'dataPoints' =>  $result_datapoints ));
            }

            doDisplayChartSales($datas);
}
function doLoadSalesByDateResort()
{
    
    global $mydb;
      $dateFilter = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : 0; 
     $year_data = date('Y');
     $datas =array();
     $resortID =  $_SESSION['ADMIN_ID'];
       
  
                        
            $sql="SELECT  sum(`RPRICE`) as 'y', DATE_FORMAT(`TRANSDATE`, '%M %D %Y') as 'label' FROM `tblroom` r,`tblreservation` sr  WHERE r.`ROOMID`=sr.`ROOMID`  AND `STATUS` in ('Checkedout',  'Checkedin')  AND  MONTH(TRANSDATE)='{$dateFilter}'   AND  YEAR(TRANSDATE)='{$year_data}' AND sr.`ResortID`='{$resortID}'   GROUP BY  TRANSDATE  ";
            $mydb->setQuery($sql); 
            $maxrow = $mydb->num_rows($mydb->executeQuery()); 
            if ($maxrow > 0) {
             $result_datapoints = $mydb->loadResultList();  
         
                array_push($datas, array(
                    'type' => "stackedArea", 
                    'name' => "Sales Report", 
                    'showInLegend' => "true", 
                    'yValueFormatString'=> "₱#,##0.##",      
                    'dataPoints' =>  $result_datapoints ));

                     
 
            }else{
                  $result_datapoints[] =  array('y' => 0,'label' => "NO DATA AVAILABLE");
                    array_push($datas, array(
                                    'type' => "stackedArea", 
                                    'name' => "",  
                                    'showInLegend' => "true",    
                                    'dataPoints' =>  $result_datapoints ));
            }

            doDisplayChartSales($datas);
}







// ************************************display chart******************************

function doDisplayChartSales($datas){
    
?> 
<script src="<?php echo WEB_ROOT; ?>admin/js/canvasjs/canvasjs.min.js"></script> 
<div  class="chart" id="chartContainer"  ></div>
 <script type="text/javascript">   
 
 
var chart = new CanvasJS.Chart("chartContainer", { 
  exportEnabled: true,
  animationEnabled: true,
  title: {
    text: "Total Sales Analytics"
    }, 
    legend:{
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    toolTip: {
        shared: true
    }, 
    axisY: {
        prefix: "₱"
    },
    data : <?php echo json_encode($datas,JSON_NUMERIC_CHECK);?>
});

 
 chart.render();


function toggleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else{
        e.dataSeries.visible = true;
    }
    chart.render();
}

</script> 
<style type="text/css"> 
    .stretch {
        min-height: 450px; 
    }
 

    .stretch > .chart {
        width: 100%;   
    }
</style> 

<?php 
} 
?>  


<?php
function doDisplayChartBookRooms($datas){
    echo json_encode($datas,JSON_NUMERIC_CHECK);
?> 
<script src="<?php echo WEB_ROOT; ?>admin/js/canvasjs/canvasjs.min.js"></script> 
<div  class="chart1" id="chartContainer1"  ></div>
 <script type="text/javascript">   
 
 
var chart1 = new CanvasJS.Chart("chartContainer1", {  
  exportEnabled: true,
  animationEnabled: true,
  title: {
     text: "Most Booked Rooms"
    }, 
    legend:{
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    toolTip: {
        shared: false
    },  
    axisY:{
        title: "Booked Rooms"
    },
    data : <?php echo json_encode($datas,JSON_NUMERIC_CHECK);?>
});

 
 chart1.render();


function toggleDataSeries(e){
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else{
        e.dataSeries.visible = true;
    }
    chart1.render();
}

</script> 
<style type="text/css">  
    .stretch > .chart1 {
        width: 100%;   
    }

    .stretch > .chart1 {
        width: 100%;   
    }
</style> 

<?php 
} 
?>  






