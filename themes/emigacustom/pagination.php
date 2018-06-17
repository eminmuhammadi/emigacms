<?php
//this section for posts.php and 
// navigation can get last total page for all post grid


        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        
        $no_of_records_per_page = 6;
        $offset = ($page-1) * $no_of_records_per_page;
        
        $total_pages_sql = "SELECT COUNT(*) FROM post";
        $result = mysqli_query($connect,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM post LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($connect,$sql);

?>