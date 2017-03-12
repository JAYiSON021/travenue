
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Gallery</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">

        <!-- Display Error Message -->
        <?php if(isset($_GET['errImgUpld'])){ ?>
            <div class="alert alert-danger animated fadeInDown">
                <?php echo $_GET['errImgUpld']; ?>
                <a href="myaccount.php?viewmode=gallery" class="btn btn-default btn-xs"> DISMISS</a>
            </div>
        <?php } ?>
        <!-- Display Success Message -->
        <?php if(isset($_GET['successImgUpld'])){ ?>
            <div class="alert alert-success animated fadeInDown">
                <?php echo $_GET['successImgUpld']; ?>
                <a href="myaccount.php?viewmode=gallery" class="btn btn-default btn-xs"> OK</a>
            </div>
        <?php } ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload new image to gallery</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div style="margin-bottom: 5px;">
                        <input class="btn btn-primary btn-block btn-sm" type="file" name="vgal">
                    </div>
                    <div>
                        <button class="btn btn-default btn-sm" type="submit" name="vGalUpload">
                            <i class="fa fa-upload fa-fw"></i> UPLOAD
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?php
        $query = "SELECT * FROM venue_imgs WHERE venue_id='$vid' AND img_type='gallery'";
        $result = mysqli_query($db,$query);
        while($row = $result->fetch_array()){
            echo "<div class='col-sm-6 col-md-4'>";
            echo "<div class='thumbnail'>";
            echo "<img src='image_gallery/".$row['img_path']."'>";
            echo "</div></div>";
        }
    ?>
</div>
