<?php
    include 'header.php';
?>
<main>
<main class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã bài thi</th>
                <th scope="col">Tên bài thi</th>
                <th scope="col">Ngày thi</th>
                
                <th scope="col">Trạng thái</th>
                
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            <?php
            
            include 'config.php';
           
            $sql = "SELECT `id`, `exam_title`, `exam_datetime`, `status` FROM `exams`";
            $result = mysqli_query($conn, $sql); 
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?> </th>
                        <td><?php echo $row['exam_title']; ?></td>
                        <td><?php echo $row['exam_datetime']; ?></td> 
                        <td><?php echo $row['status']; ?></td> 
                        
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