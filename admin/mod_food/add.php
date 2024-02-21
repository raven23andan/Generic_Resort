<form class="form-horizontal well span6" action="controller.php?action=add" enctype="multipart/form-data" method="POST">

    <fieldset>
        <legend>New Food</legend>


        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="name">Food Name:</label>

                <div class="col-md-8">
                    <input name="" type="hidden" value="">
                    <input class="form-control input-sm" id="name" name="name" placeholder="Food Name" type="text" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="description">Description:</label>

                <div class="col-md-8">
                    <input name="" type="hidden" value="">
                    <textarea class="form-control input-sm" id="compose-textarea4" name="description"></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="price">Price:</label>

                <div class="col-md-8">
                    <input name="" type="hidden" value="">
                    <input class="form-control input-sm" id="price" name="price" placeholder="Food Price" type="number" min="0 value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="image">Upload Primary Image:</label>

                <div class="col-md-8">
                    <input type="file" name="image" value="" id="image">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="idno"></label>

                <div class="col-md-8">
                    <button class="btn btn-primary" name="save" type="submit">Save</button>
                </div>
            </div>
        </div>


    </fieldset>

</form>


</div>