<?php
include 'header.php';
include 'config.php';
?>
<main class="container">
    <h2>Thêm bài thi</h2>
    <form method="POST">
        <div class="form-group row mb-3">
            <label for="etitle" class="col-sm-2 col-form-label">Tên bài thi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="etitle" name="etitle">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="edate" class="col-sm-2 col-form-label">Ngày thi</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="edate" name="edate" >
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="duration" class="col-sm-2 col-form-label">Thời gian làm bài</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="duration" name="duration" >
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="tquest" class="col-sm-2 col-form-label">Số câu hỏi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tquest" name="tquest" >
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="mark" class="col-sm-2 col-form-label"> Điểm cho mỗi câu trả lời đúng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mark" name="mark" >
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="status" class="col-sm-2 col-form-label"> Trạng thái</label>
            <div class="col-sm-10">
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Created">Created</option>
                <option value="Started">Started</option>
                <option value="Completed">Completed</option>
            </select>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="ecode" class="col-sm-2 col-form-label"> Mã truy cập bài thi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ecode" name="ecode" >
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="empMobile" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success" name="btnsave">Thêm</button>
            </div>
        </div>
    </form>
</main>
<?php
if (isset($_POST['btnsave'])) {
    $etitle=$_POST['etitle'];
    $edate=$_POST['edate'];
    $duration=$_POST['duration']; 
    $tquest=$_POST['tquest'];
    $mark=$_POST['mark'];
    $status=$_POST['status']; 
    $ecode=$_POST['ecode']; 
    $sql2 = "INSERT INTO `exams`( `exam_title`, `exam_datetime`, `duration`, `total_question`,
    `marks_per_right_answer`, `status`, `exam_code`)
    VALUES ('$etitle',' $edate','$duration','$tquest',' $mark','$status','$ecode')";

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