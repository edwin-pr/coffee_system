<?php include('core/dash-header.php');
//replying messages
if (isset($_POST['reply_message'])) {
    $admin_id = $_SESSION['user_id'];
    $message_id = $_POST['message_id'];
    $content = $_POST['reply'];

    mysqli_query($con, "INSERT INTO replies (query_id, admin_id, content) VALUES('$message_id', '$admin_id', '$content')");
    echo '<script>window.location.assign("messages.php")</script>';
}


if (isset($_GET['message'])) {
	// code...
    $message_id = $_GET['message'];
    $gt_message = mysqli_query($con,"SELECT * FROM queries WHERE id = $message_id");
    $message = mysqli_fetch_assoc($gt_message);

?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <a href="messages.php" class="btn bg-gradient-warning btn-sm ms-auto">Back</a>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Message</p>
              <div class="row">
<center>

<form action="" method="post">
  <br>
  <input type="text" required class="form-control rounded-pill" value="<?php echo (htmlentities($message['subject'])); ?>" placeholder="Subject" name="subject" readonly>
  <br>
 <input type="hidden" value="<?php echo $message['id'] ?>" name="message_id">
  <textarea class="form-control" style="max-height:160px;" name="message" placeholder="Message" readonly><?php echo (htmlentities($message['message'])) ?></textarea>
  <br>
  <hr>
  <label for="">Replies</label>
  <?php
              $replies = mysqli_query($con, "SELECT * FROM replies WHERE query_id = $message_id");
              if (mysqli_num_rows($replies) > 0) {
                  while ($reply = mysqli_fetch_array($replies)) {
                      ?>
    <textarea class="form-control" style="max-height:160px;" name="message" placeholder="Message" readonly><?php echo (htmlentities($reply['content'])) ?></textarea>
    <br>
    <?php
        }
    } else { ?>
    <p>No reply</p><br>
    <?php
    }
}
  ?>
  <textarea class="form-control" style="height:120px;" name="reply" placeholder="Reply"></textarea>
  <br>
  <button name="reply_message" class="btn bg-gradient-danger" style="width:68%;"> Reply Message </button>
</form>


</center>
    </div>
            </div>
          </div>
        </div>

      </div>
     
    </div>
<?php include('core/dash-footer.php'); ?>