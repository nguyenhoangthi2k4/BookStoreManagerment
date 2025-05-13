<script>
function toggleStatus(username, imgElement) {
  fetch('update_status.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ username: username })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      // Cập nhật lại ảnh theo trạng thái mới
      imgElement.src = data.new_status == 1 ? 'img/dau_tich.png' : 'img/dau_x.png';
    } else {
      alert('Cập nhật trạng thái thất bại');
    }
  });
}
</script>
<div class="container mt-4">
    <h4 class="mb-3">Quản lý tài khoản</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <tr>
            <th>Username</th>
            <th>Tên tài khoản</th>
            <th>Quyền hạn</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            </tr>
            <?php
                include_once("dbprocess.php");
                $sql = 'SELECT *FROM ACCOUNT';
                $lst_acc = executeResults($sql);
                foreach($lst_acc as $row)
                {
                    $trang_thai = $row['KHOA_TK'];
                    $img_src = $trang_thai == 1 ? 'img/dau_tich.png' : 'img/dau_x.png';

                    echo '<tr>';
                    echo '<td data-label="Username">'.$row['USERNAME'].'</td>';
                    echo '<td data-label="Tên tài khoản">'.$row['TENTAIKHOAN'].'</td>';
                    echo '<td data-label="Quyền hiện tại">'.$row['QUYEN'].'</td>';
                    echo '<td data-label="Trạng thái">
                            <img 
                                src="'.$img_src.'" 
                                alt="Trạng thái" 
                                width="24" 
                                style="cursor: pointer;" 
                                onclick="toggleStatus(\''.$row['USERNAME'].'\', this)"
                            >
                        </td>';
                    echo '<td data-label="Ngày tạo">'.$row['NGAYTAO'].'</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
</div>