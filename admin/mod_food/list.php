<style>
    .table td,
    .table th {
        border-left: 0 !important;
        border-right: 0 !important;
    }

    .table .btn {
        font-size: 12px;
    }

    .table i {
        font-size: 12px;
        margin-bottom: -6px;
    }

    .dataTables_filter {
        width: 100%;
    }

    .dataTables_filter input,
    .dataTables_filter label {
        width: 100%;
        text-align: left;
        margin-top: 18px;
    }

    .dataTables_wrapper .dataTables_filter input {
        margin: 0;
        padding: 4px 12px;
        border: 1px grey solid;
        border-radius: 2px;
    }
</style>
<div class="container">
    <?php
    check_message();

    ?>
    
    <div class="panel-body">
        <h3 align="left">List of Food</h3>
        <form action="controller.php?action=delete" Method="POST">
            <table id="example" style="font-size:12px;" class="table table-hover table-bordered" cellspacing="0">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th align="center" width="10%">
                            <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">Image
                        </th>
                        <th>Food Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th width="1px">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tblfood WHERE `resort_id`='{$_SESSION['ADMIN_ID']}'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $result) {
                        echo '<tr>';
                        echo '<td width="5%" align="center"></td>';
                        echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="' . $result->id . '"/> <a href="index.php?view=editpic&id=' . $result->id . '"" title="Click here to Change Image."><img src="' . $result->img . '" width="60" height="60" title="' . $result->food_name . '"/></a></td>';
                        echo '<td > ' . $result->food_name . '</td>';
                        echo '<td>' . $result->description . '</td>';
                        echo '<td> &#8369;' . $result->price . '</td>';
                        echo '<td  style="white-space:nowrap;width:1px"><a class="btn btn-primary " href="index.php?view=edit&id=' . $result->id . '"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>';
                        echo '</tr>';
                    }

                    ?>


                </tbody>
            </table>


            <div class="btn-group">
                <a href="index.php?view=add" class="btn btn-default">New</a>
                <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
            </div>
        </form>
    </div>
    
    

</div>