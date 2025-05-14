<div class="admin-book statistic-container">
    <div class="center">
        <h2>Thống Kê Sách</h2>

        <!-- Best seller (top 5) -->
    <p>Top 5 sách bán chạy nhất</p>
    <table>
        <thead>
        <tr>
            <th>Hạng</th>
            <th>Tên sách</th>
            <th>Số lượng đã bán</th>
            <th>Số lượng tồn kho</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once("dbprocess.php");
        $sql_top5 = 'SELECT S.TENSACH, S.SOLUONGTON, SUM(CT.SOLUONGMUA) AS TONGSL 
                        FROM SACH S 
                        JOIN CTHOADON CT ON S.MASACH = CT.MASACH 
                        GROUP BY S.MASACH, S.TENSACH, S.SOLUONGTON 
                        ORDER BY TONGSL DESC 
                        LIMIT 5';
        $topBooks = executeResults($sql_top5);
        $rank = 1;
        foreach ($topBooks as $top) {
            echo '<tr>';
            echo '<td>'.$rank++.'</td>';
            echo '<td>'.$top['TENSACH'].'</td>';
            echo '<td>'.$top['TONGSL'].'</td>';
            echo '<td>'.$top['SOLUONGTON'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <!-- Thống kê tất cả sách bán được -->
    <p>Tổng số lượng sách</p>
    <table>
        <thead>
        <tr>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Giá gốc</th>
            <th>Số lượng tồn kho</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = 'SELECT *
                FROM SACH S';
        $books = executeResults($sql);
        foreach ($books as $book) {
            echo '<tr>';
            echo '<td>'.$book['MASACH'].'</td>';
            echo '<td>'.$book['TENSACH'].'</td>';
            echo '<td>'.$book['GIAGOC'].'</td>';
            echo '<td>'.$book['SOLUONGTON'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    </div>    
</div>