<?php
    include 'header.php';
?>
<main>
<main class="container mt-5">
    <a href="add.php" class="btn btn-primary">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã bài thi</th>
                <th scope="col">Tên bài thi</th>
                <th scope="col">Ngày thi</th>
                <th scope="col">Thời gian làm bài</th>
                <th scope="col">Số câu hỏi</th>
                <th scope="col">Điểm cho mỗi câu trả lời đúng</th>
                <th scope="col">Ngày tạo bài thi</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Mã truy cập bài thi</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            <?php
            
            include 'config.php';
           
            $sql = "SELECT `id`, `exam_title`, `exam_datetime`, `duration`, `total_question`, `marks_per_right_answer`,
             `created_on`, `status`, `exam_code` FROM `exams`";
            $result = mysqli_query($conn, $sql); 
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?> </th>
                        <td><?php echo $row['exam_title']; ?></td>
                        <td><?php echo $row['exam_datetime']; ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <td><?php echo $row['total_question']; ?></td>
                        <td><?php echo $row['marks_per_right_answer']; ?></td>
                        <td><?php echo $row['created_on']; ?></td> 
                        <td><?php echo $row['status']; ?></td> 
                        <td><?php echo $row['exam_code']; ?></td> 
                        <td><a href="detail.php?id=<?php echo $row['id'] ?>">Chi tiết</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</main>
<?php
    include 'footer.php';
?>