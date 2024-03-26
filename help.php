<?php
include('core/dash-header2.php')?>

<style>
    .task{
        box-shadow: 3px 2px 8px rgba(0, 0, 0, .3);
        border-radius: 7px;
        height: 50px;
        overflow: hidden;
        transition: .6s;
    }
    .show_whole_message{
        height: 45vh;
        overflow: auto;
    }
    .task .fa-arrow-up{
        display: none;
    }
</style>
<div class="container-fluid py-4">
      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Your Requests <button data-toggle="modal" data-target="#newsupplier" style="float:right;" class="btn bg-gradient-primary">New Request</button></h6>
            </div>
            <div class="card-body p-3">
                <?php
                    include ('core/connection.php');

                    $farmer_id = $_SESSION['farmer_id'];
                    $fetch = "SELECT * FROM queries WHERE farmer_id  = $farmer_id ORDER BY created_at DESC";
                    $query = mysqli_query($con, $fetch);
                    $rows = mysqli_num_rows($query);
                    if($rows > 0){
                        while($row = mysqli_fetch_array($query)) {
                            $query_id = $row['id'];
                            $reply = "SELECT * FROM replies WHERE query_id = $query_id";
                            $query2 = mysqli_query($con, $reply);
                            $replies_number = mysqli_num_rows($query2);
                            ?>
                            <div class="task col-12 px-2 pt-2 mb-4">
                                <div class="d-flex fle-direction-row align-items-baseline flex-wrap-nowrap">
                                    <button class="btn btn-sm btn-dark drop"><i class="fa fa-arrow-up"></i> <i class="fa fa-arrow-down"></i></button>
                                    <p class="font-weight-bold mx-5"><?php echo $row['subject'].' - '.date('d/m/Y', strtotime($row['created_at']));
                                    if($replies_number == 0){?>
                                        <span class="bg-warning rounded-pill px-2 text-light py-1" style="font-size: 10px;">Not Replied</span>
                                        <?php
                                    }
                                    else{?>
                                        <span class="bg-success rounded-pill px-2 text-light py-1" style="font-size: 10px;">Replied</span>
                                        <?php
                                    }
                                    ?>
                                    </p>
                                </div>
                                <div class="card col-lg-6 col-md-7 col-sm-9 mb-2 border-2">
                                    <div class="card-header bg-dark text-light p-2">You</div>
                                    <div class="card-body p-2"><?php echo $row['message']?></div>
                                </div>
                                <?php
                                while($row2 = mysqli_fetch_array($query2)) {
                                ?>
                                    <div class="card col-lg-6 col-md-7 col-sm-9 mb-2 border-2" style="margin-left: 100px;">
                                        <div class="card-header bg-light p-2">Staff to You</div>
                                        <div class="card-body p-2"><?php echo $row2['content']?></div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                    } else {
                    ?>
                        <div class="task d-flex fle-direction-row align-items-baseline flex-wrap-nowrap col-12 px-2 pt-2 mb-4">
                            <p class="font-weight-bold mx-5">No Request yet</p>
                        </div>
                    <?php
                        }
                    ?>
            </div>
        </div>
    </div>
</div>
<div style="z-index: 1000000; " class="modal fade  border-0" id="newsupplier" tabindex="-1" role="dialog"   aria-hidden="true">
    <div class="modal-dialog border-0" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="container  bg-white border-0 " style="border-radius:15px;">
            <center>
                <form action="core/query.php" method="post">
                    <br>
                    <input type="text" required class="form-control rounded-pill" placeholder="Subject" name="subject">
                    <br>
                    <textarea class="form-control" style="height:160px;" name="message" placeholder="Your Message..."></textarea>
                    <br>
                    <button name="new_request" class="btn bg-gradient-danger" type="submit" style="width:68%;"> Send Request</button>
                </form>
            </center>
            </div>
        </div>
    </div>
</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.task .drop').on('click', function(){
            var _this = $(this).parent().parent();
            if(_this.css('height') === '50px'){
                _this.find('.fa-arrow-down').hide();
                _this.find('.fa-arrow-up').show();
                _this.addClass('show_whole_message');
            }
            else{
                _this.find('.fa-arrow-down').show();
                _this.find('.fa-arrow-up').hide();
                _this.removeClass('show_whole_message');
            }
        })
    })
</script>

<?php include('core/dash-footer.php'); ?>