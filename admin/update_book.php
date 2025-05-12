<div class="admin-book">
    <div class="center">
        <div class="card">
            <h2>📝 Cập nhật giá sách</h2>
            <form class="form-grid" action="admin/process_update_book.php" method="post" enctype="multipart/form-data">
                <?php
                    include_once 'dbprocess.php';
                    $sql = "SELECT * FROM SACH";
                    $result = executeResults($sql);

                    // Lấy lên danh sách sách
                    if ($result != null) {
                        echo '<select name="masach" id="masach" onchange="getGiaGoc()">';
                        echo '<option value="masach">Chọn sách</option>';
                        foreach ($result as $item) {
                            echo '<option value="' . $item['MASACH'] . '">' . $item['TENSACH'] . '</option>';
                        }
                        echo '</select>';                        
                    }                    
                 ?> 
                <label>Giá gốc:
                    <input type="text" id="giagoc" name="giagoc" required>                    
                </label>               
                <button type="submit">Cập nhật</button>
            </form>
            <script>
                function getGiaGoc() {
                    const masach = document.getElementById("masach").value;
                    // Gọi AJAX để lấy giá gốc
                    if (masach !== "") {
                        fetch('admin/get_price.php?masach=' + masach)
                            .then(response => response.text())
                            .then(data => {
                                // Cập nhật giá gốc vào ô input
                                document.getElementById("giagoc").value = data;
                            });
                    } else {
                        document.getElementById("giagoc").value = "";
                    }
                }
            </script>
        </div>
    </div>
</div>
