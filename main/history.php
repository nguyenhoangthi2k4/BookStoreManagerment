<div class="transaction-history"> 
    <h2>Lịch Sử Giao Dịch</h2>
    <table>
        <tr>
            <th>Mã HD</th>
            <th>Ngày lập</th>
            <th>Số sản phẩm</th>
            <th>Tổng tiền</th>
        </tr>
            <?php
                include_once("dbprocess.php");
                //session_start();
                $makhachhang = $_SESSION['user_id'];
                $sql = 'SELECT HD.MAHOADON, HD.NGAYLAP, HD.THANHTIEN, SUM(CT.SOLUONGMUA) AS SOSANPHAM 
                                    FROM HOADON HD JOIN CTHOADON CT ON HD.MAHOADON = CT.MAHOADON 
                                    WHERE HD.MAKHACHHANG = "'.$makhachhang.'"
                                    GROUP BY HD.MAHOADON, HD.NGAYLAP, HD.THANHTIEN';
                $lst_hoadon = executeResults($sql);
                foreach($lst_hoadon as $row)
                {
                    echo '<tr>';
                        echo '<td data-label="Mã HD">'.$row['MAHOADON'].'</td>';
                        echo '<td data-label="Ngày lập">'.$row['NGAYLAP'].'</td>';
                        echo '<td data-label="Số sản phẩm">'.$row['SOSANPHAM'].'</td>';
                        echo '<td data-label="Tổng tiền">'.$row['THANHTIEN'].'</td>';
                    echo '</tr>';
                }
            ?>
    </table>
</div>