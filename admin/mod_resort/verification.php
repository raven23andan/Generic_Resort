<style>
    .container {
        width: 100%;
        height: 100%;
    }


    #validid-modal .modal, #permit-modal .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }


    #validid-modal .modal-content, #permit-modal .modal-content{
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: fit-content;

    }


    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        margin-left: 10px;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .input-div {
        width: 100%;
        height: fit-content;
        flex-direction: row;
        align-items: end;
        margin-bottom: 8px;
    }

    .input-div span {
        font-size: 16px;
    }

    .input-div label {
        font-size: 16px;
        margin: 0;
        width: 170px;
    }

    .btn-div h6 {
        width: 400px;
    }

    .btn-div button {
        margin-left: 20%;
        margin-top: 6px;
        height: fit-content;
        border: 0;
        background: none;
    }
</style>

<div class="container d-flex" style="flex-direction: column;  align-items: center">
    <?php
    $resortid = $_GET['id'];

    $sql = "SELECT tbluseraccount.* FROM tbluseraccount WHERE tbluseraccount.USERID = $resortid ";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();
    foreach ($cur as $result) {
    ?>
        <div class="d-flex" style="flex-direction:row;  width: fit-content; border-bottom:1px #aaa solid; padding-bottom: 24px; margin-bottom: 8px">
            <div>
                <div style="background-image: url('../mod_users/<?php echo $result->Logo ?>'); 
                                background-size: cover;
                                width: 150px; 
                                height: 150px;
                                border: 1px gray solid">

                </div>
                <label style="margin-left: 20%;">Resort Logo</label>
            </div>
            <div style="margin-left: 14px;">
                <div class="d-flex input-div">
                    <label>Resort Name: </label>
                    <span class="span-value"><?php echo $result->UNAME ?></span>
                </div>
                <div class="d-flex input-div">
                    <label>Address: </label>
                    <span class="span-value"><?php echo $result->ADDRESS ?></span>
                </div>

                <div class="d-flex input-div">
                    <label>Contact Number: </label>
                    <span><?php echo $result->PHONE ?></span>
                </div>

                <div class="d-flex input-div">
                    <label>Owner Valid ID: </label>
                    <span><a id="validid-btn" style="cursor: pointer;">View Attachment</a></span>
                </div>
                
                <div class="d-flex input-div">
                    <label>Business Permit: </label>
                    <span><a id="permit-btn" style="cursor: pointer;">View Attachment</a></span>
                </div>
            </div>
        </div>
        <div class="d-flex btn-div" style="width: fit-content; flex-direction: row;">
            <h6 style="font-size: 14px">Status: <span><?php echo ($result->ResortAuth == 1) ? 'Approved' : 'Pending' ?></span></h6>
            <form method="POST" action="verify-resort.php">
                <input hidden name="resort-id" value="<?php echo $_GET['id'] ?>">
                <?php echo ($result->ResortAuth == 1) ? '<button name="submit-unverify"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>' : '<button name="submit-verify"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>' ?>
            </form>
            
        </div>
    <?php
    }
    ?>
</div>

<div id="validid-modal" class="modal">
 
    <div class="modal-content">
        <span class="close" id="close">&times;</span>
        <img src="../../resort/img_verification/<?php echo $result->VALID_ID ?>" style="max-height: 600px">
    </div>

</div>

<div id="permit-modal" class="modal">
 
    <div class="modal-content">
        <span class="close" id="close2">&times;</span>
        <img src="../../resort/img_verification/<?php echo $result->BIR ?>" style="max-height: 800px">
    </div>

</div>

<script>
    var modal = document.getElementById("validid-modal");
    var modal2 = document.getElementById("permit-modal");

    var btn = document.getElementById("validid-btn");
    var btn2 = document.getElementById("permit-btn");

    var span = document.getElementById("close");
    var span2 = document.getElementById("close2");


    btn.onclick = function() {
        modal.style.display = "block";
    }
    btn2.onclick = function() {
        modal2.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }
    span2.onclick = function() {
        modal2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal || event.target == modal2) {
            modal.style.display = "none";
            modal2.style.display = "none";
        }
    }
</script>