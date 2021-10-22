<?php
    include 'header.php';
?>
<main class="container">
    <h2>Thay đổi thông tin bài thi</h2>
    <?php
    include 'config.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `exams` WHERE `id` = $id";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);
        $etitle=$row['exam_title'];
        $edate=$row['exam_datetime'];
        $duration=$row['duration']; 
        $tquest=$row['total_question'];
        $mark=$row['marks_per_right_answer'];
        $status=$row['status']; 
        $ecode=$row['exam_code']; 
    }
    ?>
    <form method="POST">
        <div class="form-group row">
            <label for="etitle" class="col-sm-2 col-form-label">Tên bài thi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="etitle" name="etitle" value="<?php echo $etitle; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="edate" class="col-sm-2 col-form-label">Ngày thi</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="edate" name="edate" value="<?php echo $edate; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="duration" class="col-sm-2 col-form-label">Thời gian làm bài</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $duration; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="tquest" class="col-sm-2 col-form-label">Số câu hỏi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tquest" name="tquest" value="<?php echo $tquest; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="mark" class="col-sm-2 col-form-label"> Điểm cho mỗi câu trả lời đúng</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="mark" name="mark" value="<?php echo $mark ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label"> Trạng thái</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="status" name="status" value="<?php echo $status; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="ecode" class="col-sm-2 col-form-label"> Mã truy cập bài thi</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="ecode" name="ecode" value="<?php echo $ecode; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="empMobile" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success" name="btnsave">Lưu lại</button>
            </div>
        </div>
    </form>
</main>
<?php
if (isset($_POST['btnsave'])) {
    $id = $_GET['id'];
    $etitle=$_POST['etitle'];
    $edate=$_POST['edate'];
    $duration=$_POST['duration']; 
    $tquest=$_POST['duration'];
    $mark=$_POST['mark'];
    $status=$_POST['status']; 
    $ecode=$_POST['ecode']; 
    $sql2 = "UPDATE `exams` SET `exam_title`='$etitle',`exam_datetime`='$edate',
    `duration`='$duration',`total_question`='$tquest',`marks_per_right_answer`='$mark',
    `status`='$status',`exam_code`='$ecode' WHERE `id`='$id'";
   

    $result = mysqli_query($conn, $sql2);

    if ($result > 0) {
        header("Location:index.php");
    } else {
        header("Location:error.php");
    }

    mysqli_close($conn);
}

?>
<?php
    include 'footer.php';
?>