<script>
	document.querySelectorAll('.form_status').forEach(form => {
    	form.addEventListener('submit', function(e) {
        e.preventDefault(); // chặn reload

        const formData = new FormData(this);
        const img = this.querySelector('input[type="image"]');

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data == -1) {
                alert('Lỗi không xác định');
            } else {
                const newStatus = parseInt(data);
                const newSrc = newStatus == 1 ? 'img/dau_tich.png' : 'img/dau_x.png';
                img.src = newSrc;
            }
        });
    });
}); 

document.querySelectorAll('.form_role').forEach(form => {
        const quyenSelect = form.querySelector('select[name="quyen"]');
		const btnSubmit = form.querySelector('button[type="submit"]'); 

        // Khi nhấn nút submit, gọi requestSubmit để gửi form
        btnSubmit.addEventListener('click', function(e) {
			console.log("Cập nhật quyền");
            e.preventDefault(); /
            form.requestSubmit(); // Gửi form
        });


        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Chặn reload của trang

            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data == -1) {
                    alert('Lỗi không xác định');
                } else {
                    const newRole = parseInt(data);
                    quyenSelect.value = newRole;
                    console.log("Cập nhật quyền:", newRole);
                }
            });
        });
    });
</script>
<!-- <script>
document.querySelectorAll('.form_status').forEach(form => {
    const quyenSelect = form.querySelector('select[name="quyen"]');
    const imageInput = form.querySelector('input[type="image"]');

    // Khi nhấn vào ảnh (cập nhật trạng thái)
    imageInput.addEventListener('click', function(e) {
        e.preventDefault();


        const formData = new FormData(form);
        formData.append('thuchien', 'khoa_tk'); // thêm flag để phân biệt trên PHP

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
           if (data == -1) {
                alert('Lỗi khóa tài khoản');
            } else {
                const newStatus = parseInt(data);
                const newSrc = newStatus == 1 ? 'img/dau_tich.png' : 'img/dau_x.png';
                img.src = newSrc;
            }
        });
    });

    // Khi đổi quyền (cập nhật quyền)
    quyenSelect.addEventListener('change', function() {
        const formData = new FormData(form);
        formData.append('thuchien', 'update_quyen');

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            if (data == -2) {
                alert('Không thể cập nhật quyền');
            } else {
                const newRole = parseInt(data);
                quyenSelect.value = newRole;
            }
        });
    });
});
</script> -->

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
                $sql = 'SELECT * FROM ACCOUNT';
                $lst_acc = executeResults($sql);
                foreach($lst_acc as $row)
                {
                    $trang_thai = $row['KHOA_TK'];
                    $img_src = $trang_thai == 1 ? 'img/dau_tich.png' : 'img/dau_x.png';
                    $img_user = $row['QUYEN'] == 1 ? 'img/user.png' : 'img/admin.png';
                    echo '<tr>';
					echo '<td data-label="Username">'.$row['USERNAME'].'</td>';
                    echo '<td data-label="Tên tài khoản">'.$row['TENTAIKHOAN'].'</td>';					                   
                    echo '<td data-label="Quyền">';
						echo '<form method="POST" action="admin/change_role.php" class="form_role">';
							echo '<input type="hidden" name="username" value="'.$row['USERNAME'].'">';
							echo '<select name="quyen">';
							$quyen_options = [1 => 'admin', 2 => 'user'];
							foreach ($quyen_options as $value => $label) {
								$selected = ($row['QUYEN'] == $value) ? 'selected' : '';
								echo "<option value='$value' $selected>$label</option>";
							}
							echo '</select>';
						// Nút để cập nhật quyền
                    	echo '<button type="submit">Cập nhật quyền</button>';
						echo '</form>';
                    echo '</td>';
					
					echo '<form method="POST" action="admin/update_status.php" class="form_status">';
					echo '<input type="hidden" name="username" value="'.$row['USERNAME'].'">';
                    echo '<td data-label="Trạng thái">
                            <input 
                                type="image" 
                                src="'.$img_src.'" 
                                alt="Trạng thái" 
                                width="24" 
                                name="submit_status" 
                                style="cursor: pointer;"
                            >
                          </td>';
                    echo '<td data-label="Ngày tạo">'.$row['NGAYTAO'].'</td>';                    
                    echo '</form>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
</div>