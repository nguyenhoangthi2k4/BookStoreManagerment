-- Tạo database với hỗ trợ Unicode
CREATE DATABASE QLSACH CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE QLSACH;

-- Bảng ACCOUNT
CREATE TABLE ACCOUNT (
	USERNAME		VARCHAR(50),
	PASSWORD		VARCHAR(255),
	TENTAIKHOAN		VARCHAR(255) CHARACTER SET utf8mb4,
	QUYEN			INT DEFAULT 2, -- 1: Admin, 2: Khách hàng
	KHOA_TK			INT DEFAULT 0, -- 0: Chưa khóa, 1: Đã khóa
	NGAYTAO         DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (USERNAME, PASSWORD)
) CHARACTER SET utf8mb4;

-- Bảng KHACHHANG
CREATE TABLE KHACHHANG (
	MAKHACHHANG		INT PRIMARY KEY AUTO_INCREMENT,
	TENKHACHHANG	VARCHAR(255) CHARACTER SET utf8mb4,
	DIACHI			VARCHAR(255) CHARACTER SET utf8mb4,
	EMAIL			VARCHAR(255) CHARACTER SET utf8mb4,
	NGAYSINH		DATETIME,
	SDT				CHAR(10),
	GIOITINH		INT DEFAULT 0, -- 0: Nữ, 1: Nam
	DIEMTICHLUY		INT DEFAULT 0,
	USERNAME		VARCHAR(50)
) CHARACTER SET utf8mb4;

-- Bảng NHAXUATBAN
CREATE TABLE NHAXUATBAN (
	MANXB	VARCHAR(10) PRIMARY KEY,
	TENNXB	VARCHAR(50) CHARACTER SET utf8mb4,
	DIACHI	VARCHAR(255) CHARACTER SET utf8mb4,
	SDT		CHAR(10)
) CHARACTER SET utf8mb4;

-- Bảng THELOAI
CREATE TABLE THELOAI (
	MATHELOAI		VARCHAR(10) PRIMARY KEY,
	TENTHELOAI		VARCHAR(50) CHARACTER SET utf8mb4
) CHARACTER SET utf8mb4;

-- Bảng TACGIA
CREATE TABLE TACGIA (
	MATACGIA		VARCHAR(10) PRIMARY KEY,
	TENTACGIA		VARCHAR(50) CHARACTER SET utf8mb4
) CHARACTER SET utf8mb4;

-- Bảng SACH
CREATE TABLE SACH (
	MASACH			INT PRIMARY KEY AUTO_INCREMENT,
	TENSACH			VARCHAR(255) CHARACTER SET utf8mb4,
	GIAGOC			DOUBLE,
	SOLUONGTON		INT,
	ANHBIA			VARCHAR(255),
	NOIDUNG			VARCHAR(255),
	MATHELOAI		VARCHAR(10),
	MANXB			VARCHAR(10),
	MATACGIA		VARCHAR(10),
	FOREIGN KEY (MATHELOAI) REFERENCES THELOAI(MATHELOAI),
	FOREIGN KEY (MANXB) REFERENCES NHAXUATBAN(MANXB),
	FOREIGN KEY (MATACGIA) REFERENCES TACGIA(MATACGIA)
) CHARACTER SET utf8mb4;

-- Bảng DAILY
CREATE TABLE DAILY (
	MADAILY			VARCHAR(10) PRIMARY KEY,
	TEMDAILY		VARCHAR(50) CHARACTER SET utf8mb4,
	DIACHI			VARCHAR(255),
	SDT				CHAR(10)
) CHARACTER SET utf8mb4;

-- Bảng PHIEUNHAPSACH
CREATE TABLE PHIEUNHAPSACH (
	MAPHIEUNHAP		INT PRIMARY KEY AUTO_INCREMENT,
	NGAYLAP			DATE,
	TENNGUOILAP		VARCHAR(10) CHARACTER SET utf8mb4,
	THANHTIEN		DOUBLE,
	GHICHU			VARCHAR(255) CHARACTER SET utf8mb4,
	MADAILY			VARCHAR(10),
	FOREIGN KEY (MADAILY) REFERENCES DAILY(MADAILY)
) CHARACTER SET utf8mb4;

-- Bảng CHITIETPHIEUNHAP
CREATE TABLE CHITIETPHIEUNHAP (
	MAPHIEUNHAP		INT,
	MASACH			INT,
	SOLUONGNHAP		INT,
	DONGIANHAP		DOUBLE,
	PRIMARY KEY (MAPHIEUNHAP, MASACH),
	FOREIGN KEY (MAPHIEUNHAP) REFERENCES PHIEUNHAPSACH(MAPHIEUNHAP),
	FOREIGN KEY (MASACH) REFERENCES SACH(MASACH)
) CHARACTER SET utf8mb4;

-- Bảng HOADON
CREATE TABLE HOADON (
	MAHOADON		INT PRIMARY KEY AUTO_INCREMENT,
	NGAYLAP			DATE,
	THANHTIEN		DOUBLE,
	MAKHACHHANG		INT,
	FOREIGN KEY (MAKHACHHANG) REFERENCES KHACHHANG(MAKHACHHANG)
) CHARACTER SET utf8mb4;

-- Bảng CTHOADON
CREATE TABLE CTHOADON (
	MAHOADON		INT,
	MASACH			INT,
	SOLUONGMUA		INT,
	DONGIABAN		DOUBLE,
	PRIMARY KEY (MAHOADON, MASACH),
	FOREIGN KEY (MAHOADON) REFERENCES HOADON(MAHOADON),
	FOREIGN KEY (MASACH) REFERENCES SACH(MASACH)
) CHARACTER SET utf8mb4;

-- Bảng GIOHANG
CREATE TABLE GIOHANG (
	MAKHACHHANG		INT,
	MASACH			INT,
	SOLUONGMUA		INT,
	DONGIABAN		DOUBLE,
	PRIMARY KEY (MAKHACHHANG, MASACH),
	FOREIGN KEY (MAKHACHHANG) REFERENCES KHACHHANG(MAKHACHHANG),
	FOREIGN KEY (MASACH) REFERENCES SACH(MASACH)
) CHARACTER SET utf8mb4;

-- INSERT DỮ LIỆU MẪU
-- THÊ LOẠI
INSERT INTO THELOAI (MATHELOAI, TENTHELOAI)
VALUES 
('TL01', 'Tiểu thuyết'),
('TL02', 'Truyện ngắn'),
('TL03', 'Trinh thám'),
('TL04', 'Kinh dị'),
('TL05', 'Ngôn tình'),
('TL06', 'Khoa học'),
('TL07', 'Phiêu lưu'),
('TL08', 'Lịch sử'),
('TL09', 'Tâm lý'),
('TL10', 'Kinh doanh'),
('TL11', 'Tự truyện'),
('TL12', 'Thiếu nhi'),
('TL13', 'Ngoại ngữ'),
('TL14', 'Giáo trình'),
('TL15', 'Nghệ thuật');

INSERT INTO TACGIA (MATACGIA, TENTACGIA) VALUES
('TG01', 'Nguyễn Nhật Ánh'),
('TG02', 'Tô Hoài'),
('TG03', 'Nam Cao'),
('TG04', 'Xuân Diệu'),
('TG05', 'Nguyễn Du'),
('TG06', 'Phùng Quán'),
('TG07', 'Vũ Trọng Phụng'),
('TG08', 'Ngô Tất Tố'),
('TG09', 'Nguyễn Tuân'),
('TG10', 'Chế Lan Viên'),
('TG11', 'Lưu Quang Vũ'),
('TG12', 'Nguyễn Huy Thiệp'),
('TG13', 'Bảo Ninh'),
('TG14', 'Lê Lựu'),
('TG15', 'Dương Thu Hương'),
('TG16', 'Phan Thị Vàng Anh'),
('TG17', 'Nguyễn Ngọc Tư'),
('TG18', 'Cao Duy Anh'),
('TG19', 'Võ Thị Thùy Trang'),
('TG20', 'Trần Nhã Thụy'),
('TG21', 'Antoine de Saint-Exupéry'),
('TG22', 'Arthur Conan Doyle'),
('TG23', 'J.K. Rowling'),
('TG24', 'Mario Puzo'),
('TG25', 'Jane Austen'),
('TG26', 'Harper Lee'),
('TG27', 'George Orwell'),
('TG28', 'J.R.R. Tolkien'),
('TG29', 'F. Scott Fitzgerald'),
('TG30', 'Gabriel García Márquez'),
('TG31', 'Đặng Thùy Trâm'),
('TG32', 'Shan Sa'),
('TG33', 'Haruki Murakami');

INSERT INTO NHAXUATBAN (MaNXB, TenNXB, DiaChi, SDT) VALUES
('NXB01', 'NXB Trẻ', 'TP. Hồ Chí Minh', '0281234567'),
('NXB02', 'NXB Kim Đồng', 'Hà Nội', '0249876543'),
('NXB03', 'NXB Văn Học', 'Hà Nội', '0241122334'),
('NXB04', 'NXB Hội Nhà Văn', 'Hà Nội', '0242233445'),
('NXB05', 'NXB Giáo Dục Việt Nam', 'Hà Nội', '0243344556'),
('NXB06', 'NXB Phụ Nữ Việt Nam', 'Hà Nội', '0244455667'),
('NXB07', 'NXB Lao Động', 'Hà Nội', '0245566778'),
('NXB08', 'NXB Đà Nẵng', 'Đà Nẵng', '0236677889'),
('NXB09', 'NXB Đồng Nai', 'Biên Hòa', '0251788990'),
('NXB10', 'NXB Tổng Hợp TP.HCM', 'TP. Hồ Chí Minh', '0288990011');

INSERT INTO SACH (TenSach, GiaGoc, SoLuongTon, AnhBia, NoiDung, MaTheLoai, MaNXB, MaTacGia) VALUES
('Tôi thấy hoa vàng trên cỏ xanh', 80000, 100, 'img/hoa_vang.jpg', 'Câu chuyện nhẹ nhàng, trong trẻo về tuổi thơ ở một làng quê Việt Nam yên bình. Những rung động đầu đời, tình bạn ngây ngô và những khám phá thú vị về thế giới xung quanh được tác giả Nguyễn Nhật Ánh khắc họa một cách chân thực và đầy cảm xúc.', 'TL01', 'NXB01', 'TG01'),
('Dế mèn phiêu lưu ký', 65000, 150, 'img/de_men.jpg', 'Kể về cuộc phiêu lưu đầy thú vị và cũng không ít gian nan của chú dế Mèn tinh nghịch. Qua những chuyến đi, Mèn học được nhiều bài học quý giá về cuộc sống, tình bạn và lòng dũng cảm. Một tác phẩm văn học thiếu nhi kinh điển của nhà văn Tô Hoài.', 'TL12', 'NXB02', 'TG02'),
('Chí Phèo', 50000, 80, 'img/chi_pheo.jpg', 'Một tác phẩm hiện thực phê phán sâu sắc về số phận bi thảm của người nông dân nghèo khổ trong xã hội thực dân nửa phong kiến. Hình tượng Chí Phèo từ một thanh niên lương thiện bị đẩy vào con đường lưu manh hóa là một điển hình cho sự tha hóa.', 'TL02', 'NXB03', 'TG03'),
('Vợ chồng A Phủ', 55000, 120, 'img/vo_chong_a_phu.jpg', 'Tái hiện cuộc sống khổ cực và khát vọng tự do của đồng bào dân tộc thiểu số dưới ách thống trị của bọn địa chủ phong kiến. Mị và A Phủ, hai con người có số phận bất hạnh, đã tìm thấy sức mạnh phản kháng trong tình cảnh tăm tối.', 'TL02', 'NXB03', 'TG02'),
('Số đỏ', 90000, 90, 'img/so_do.jpg', 'Tiểu thuyết trào phúng bậc thầy của Vũ Trọng Phụng, châm biếm sâu cay xã hội thượng lưu Hà Nội những năm 30 đầy giả dối và lố bịch. Nhân vật Xuân Tóc Đỏ từ một kẻ vô danh bỗng trở thành một nhân vật "tai to mặt lớn" nhờ những sự kiện hài hước.', 'TL01', 'NXB03', 'TG07'),
('Tắt đèn', 70000, 110, 'img/tat_den.jpg', 'Phản ánh chân thực cuộc sống cơ cực của người nông dân Việt Nam trước Cách mạng tháng Tám. Hình ảnh chị Dậu, một người phụ nữ nông thôn mạnh mẽ, đảm đang, phải bán con, bán chó để nộp sưu thuế là một biểu tượng cho sự bần cùng hóa của nông dân.', 'TL02', 'NXB03', 'TG08'),
('Lão Hạc', 45000, 130, 'img/lao_hac.jpg', 'Câu chuyện cảm động về tình cha con và lòng tự trọng của một người nông dân nghèo khổ. Lão Hạc, một người cha đơn thân, đã phải bán cậu Vàng, người bạn thân thiết nhất của con trai mình, để trang trải cuộc sống khốn khó.', 'TL02', 'NXB03', 'TG03'),
('Đất rừng phương Nam', 85000, 105, 'img/dat_rung.jpg', 'Khung cảnh thiên nhiên hùng vĩ và cuộc sống đầy gian khổ nhưng cũng rất đỗi hào hùng của người dân Nam Bộ trong thời kỳ kháng chiến chống Pháp. Cậu bé An lạc giữa thiên nhiên hoang sơ và những con người nghĩa khí.', 'TL07', 'NXB01', 'TG01'),
('Tuổi thơ dữ dội', 75000, 115, 'img/tuoi_tho.jpg', 'Những ký ức sâu sắc về tuổi thơ đầy gian khó nhưng cũng rất đỗi hồn nhiên của những đứa trẻ trong thời kỳ kháng chiến. Tình bạn, lòng yêu nước và những trò nghịch ngợm tinh nghịch được nhà văn Phùng Quán tái hiện một cách sinh động.', 'TL08', 'NXB02', 'TG06'),
('Mắt biếc', 82000, 108, 'img/mat_biec.jpg', 'Câu chuyện tình yêu buồn man mác của Ngạn và Hà Lan, hai người bạn từ thuở ấu thơ. Tình yêu trong sáng, những rung động đầu đời và sự nuối tiếc khôn nguôi khi tình yêu không trọn vẹn được Nguyễn Nhật Ánh kể bằng giọng văn nhẹ nhàng, sâu lắng.', 'TL01', 'NXB01', 'TG01'),
('Hoàng tử bé', 60000, 140, 'img/hoang_tu_be.jpg', 'Một câu chuyện sâu sắc về tình bạn, tình yêu, trách nhiệm và ý nghĩa của cuộc sống. Cuộc gặp gỡ giữa phi công lạc giữa sa mạc và hoàng tử bé đến từ một hành tinh xa xôi mang đến những suy ngẫm về những giá trị đích thực trong cuộc đời.', 'TL12', 'NXB02', 'TG21'),
('Sherlock Holmes', 120000, 70, 'img/sherlock.jpg', 'Tuyển tập những vụ án ly kỳ và hấp dẫn được giải quyết bởi thám tử tài ba Sherlock Holmes và người bạn đồng hành trung thành bác sĩ Watson. Khả năng suy luận logic phi thường của Holmes đã trở thành một biểu tượng trong văn học trinh thám.', 'TL03', 'NXB04', 'TG22'),
('Harry Potter và Hòn đá phù thủy', 150000, 60, 'img/harry_potter1.jpg', 'Mở đầu cho series truyện phiêu lưu kỳ ảo nổi tiếng về cậu bé phù thủy Harry Potter. Cậu bé mồ côi sống cùng gia đình dì dượng độc ác bỗng nhận ra mình có phép thuật..', 'TL06', 'NXB05', 'TG23'),
('Bố già', 180000, 50, 'img/bo_gia.jpg', 'Một bức tranh chân thực và đầy kịch tính về thế giới ngầm của mafia Ý ở New York. Câu chuyện về gia đình Corleone và ông trùm Vito Corleone, người được kính nể và sợ hãi, cùng những cuộc chiến quyền lực đẫm máu.', 'TL02', 'NXB06', 'TG24'),
('Pride and Prejudice', 110000, 75, 'img/pride_prejudice.jpg', 'Một câu chuyện tình yêu và định kiến kinh điển trong văn học Anh. Mối quan hệ giữa Elizabeth Bennet, một cô gái thông minh và độc lập, và Mr. Darcy, một quý tộc giàu có nhưng kiêu ngạo, trải qua nhiều hiểu lầm và thử thách.', 'TL01', 'NXB07', 'TG25'),
('To Kill a Mockingbird', 130000, 65, 'img/to_kill.jpg', 'Câu chuyện cảm động và sâu sắc về vấn đề chủng tộc và công lý ở miền Nam nước Mỹ những năm 30, được kể qua lời kể của cô bé Scout Finch. Vụ án Tom Robinson, một người đàn ông da đen bị buộc tội oan, đã thức tỉnh lương tâm của cả cộng đồng.', 'TL02', 'NXB08', 'TG26'),
('1984', 95000, 85, 'img/1984.jpg', 'Một tiểu thuyết dystopian nổi tiếng về một xã hội độc tài toàn trị, nơi mọi suy nghĩ và hành động của con người đều bị kiểm soát chặt chẽ bởi Đảng. Winston Smith, một nhân viên của Bộ Sự thật, đã nổi loạn chống lại hệ thống áp bức.', 'TL05', 'NXB09', 'TG27'),
('The Lord of the Rings', 250000, 40, 'img/lord_rings.jpg', 'Một bộ sử thi giả tưởng vĩ đại về cuộc chiến chống lại Chúa tể bóng tối Sauron để cứu lấy Trung Địa. Hành trình gian khổ của Frodo Baggins và những người bạn đồng hành để tiêu hủy chiếc Nhẫn Quyền Lực.', 'TL06', 'NXB10', 'TG28'),
('The Great Gatsby', 100000, 80, 'img/gatsby.jpg', 'Câu chuyện về giấc mơ Mỹ tan vỡ trong bối cảnh xã hội thượng lưu xa hoa và phù phiếm của thập niên 20 ở Mỹ. Jay Gatsby, một triệu phú bí ẩn, cố gắng giành lại tình yêu của Daisy Buchanan từ quá khứ.', 'TL01', 'NXB07', 'TG29'),
('One Hundred Years of Solitude', 160000, 55, 'img/one_hundred.jpg', 'Một kiệt tác của văn học Mỹ Latinh, kể về lịch sử thăng trầm của dòng họ Buendía qua bảy thế hệ ở thị trấn huyền thoại Macondo. Câu chuyện pha trộn giữa hiện thực và yếu tố kỳ ảo.', 'TL02', 'NXB08', 'TG30'),
('Truyện Kiều', 70000, 120, 'img/truyen_kieu.jpg', 'Một tuyệt tác của văn học Việt Nam, kể về cuộc đời đầy sóng gió và bi kịch của nàng Kiều tài sắc vẹn toàn. Qua những khổ đau và tủi nhục, Kiều vẫn giữ được tấm lòng nhân hậu và khát vọng về một cuộc sống tốt đẹp hơn.', 'TL01', 'NXB03', 'TG05'),
('Nhật ký Đặng Thùy Trâm', 78000, 110, 'img/nhat_ky_tram.jpg', 'Những trang nhật ký chân thực và xúc động của nữ bác sĩ Đặng Thùy Trâm trong những năm tháng chiến tranh ác liệt. Tình yêu nước, lý tưởng sống cao đẹp, nỗi nhớ nhà và những trăn trở về cuộc đời.', 'TL11', 'NXB01', 'TG31'),
('Cánh đồng bất tận', 88000, 95, 'img/canh_dong.jpg', 'Những câu chuyện đầy ám ảnh về cuộc sống khắc nghiệt và tình người mong manh ở miền Tây sông nước. Ba cha con ông Sáu Dần sống lay lắt trên những cánh đồng, mang trong mình những vết thương lòng sâu sắc.', 'TL02', 'NXB09', 'TG17'),
('Ăn mày dĩ vãng', 92000, 90, 'img/an_may.jpg', 'Một cuốn tiểu thuyết đầy suy tư và hoài niệm về những giá trị văn hóa truyền thống đang dần bị mai một trong xã hội hiện đại. Nhân vật chính, một người trí thức, trở về quê hương và đối diện với những thay đổi của thời gian.', 'TL11', 'NXB10', 'TG12'),
('Thiếu nữ đánh cờ vây', 105000, 80, 'img/thieu_nu.jpg', 'Câu chuyện về cuộc đời đầy biến động của một cô gái trẻ tài năng trong bối cảnh lịch sử đầy biến động của Trung Quốc. Niềm đam mê cờ vây đã dẫn dắt cô qua những thăng trầm của cuộc sống và tình yêu.', 'TL01', 'NXB04', 'TG32'),
('Kafka bên bờ biển', 135000, 65, 'img/kafka.jpg', 'Một tiểu thuyết huyền bí và đầy ẩn dụ của Haruki Murakami, kể về cuộc hành trình kỳ lạ của cậu bé Kafka Tamura và ông lão Nakata, người có khả năng nói chuyện với mèo. Hai câu chuyện song song dần hé lộ những bí ẩn khó lý giải.', 'TL05', 'NXB05', 'TG33'),
('Rừng Na Uy', 125000, 70, 'img/rung_na_uy.jpg', 'Một câu chuyện tình yêu và mất mát đầy ám ảnh của Haruki Murakami. Toru Watanabe nhớ lại mối tình với hai người phụ nữ rất khác nhau: Naoko, người yêu đầu tiên đầy tổn thương, và Midori, một cô gái sôi nổi và độc lập.', 'TL01', 'NXB06', 'TG33'),
('Biên niên ký chim vặn dây cót', 145000, 60, 'img/bien_nien_ky.jpg', 'Một tiểu thuyết phức tạp và đầy mê hoặc của Haruki Murakami, pha trộn giữa hiện thực và yếu tố siêu nhiên. Toru Okada đi tìm con mèo mất tích và người vợ đột nhiên biến mất, dẫn anh vào một thế giới kỳ lạ và đầy bí ẩn.', 'TL05', 'NXB07', 'TG33'),
('Phía nam biên giới, phía tây mặt trời', 115000, 75, 'img/phia_nam.jpg', 'Một câu chuyện tình yêu nhẹ nhàng nhưng đầy day dứt của Haruki Murakami về mối tình đầu không trọn vẹn giữa Hajime và Shimamoto. Những ký ức về quá khứ và sự tiếc nuối khôn nguôi theo đuổi nhân vật chính.', 'TL01', 'NXB08', 'TG33'),
('1Q84', 170000, 50, 'img/1q84.jpg', 'Một tiểu thuyết đồ sộ của Haruki Murakami về hai câu chuyện song song của Aomame và Tengo trong một thế giới Tokyo kỳ lạ và đầy những sự kiện bí ẩn liên quan đến một giáo phái kỳ lạ và hai mặt trăng trên bầu trời.', 'TL05', 'NXB09', 'TG33'),
('Nhà giả kim', 75000, 110, 'img/nha_gia_kim.jpg', 'Hành trình theo đuổi giấc mơ của Santiago, một chàng chăn cừu trẻ tuổi, khi anh quyết định đi tìm kho báu được báo mộng. Trên đường đi, anh gặp gỡ nhiều người và học được những bài học quý giá về cuộc sống, định mệnh và lắng nghe trái tim mình.', 'TL09', 'NXB02', 'TG30'),
('Cô gái đến từ hôm qua', 85000, 100, 'img/co_gai.jpg', 'Câu chuyện về tình yêu đầu đời và những kỷ niệm đẹp đẽ của tuổi học trò. Nhân vật chính, một cậu học sinh trung học, đã trải qua những cảm xúc ngọt ngào và đau khổ khi yêu một cô gái bí ẩn đến từ hôm qua.', 'TL01', 'NXB03', 'TG01'),
('Tôi là Malala', 95000, 95, 'img/malala.jpg', 'Cuốn tự truyện của Malala Yousafzai, cô gái Pakistan dũng cảm đã đứng lên đấu tranh cho quyền được học hành của trẻ em gái. Câu chuyện về lòng dũng cảm, sự kiên trì và khát vọng thay đổi thế giới.', 'TL11', 'NXB04', 'TG31'),
('Giết con chim nhại', 130000, 70, 'img/giet_chim.jpg', 'Câu chuyện về sự trưởng thành của cô bé Scout Finch ở miền Nam nước Mỹ những năm 30, trong bối cảnh nạn phân biệt chủng tộc sâu sắc. Vụ án của Tom Robinson, một người đàn ông da đen bị buộc tội oan.', 'TL02', 'NXB04', 'TG26'),
('Kiêu hãnh và định kiến', 115000, 75, 'img/kieu_hanh.jpg', 'Một câu chuyện tình yêu và sự hiểu lầm giữa Elizabeth Bennet, một cô gái thông minh và có cá tính mạnh mẽ, và Fitzwilliam Darcy, một quý tộc giàu có nhưng kiêu ngạo. Những rào cản về địa vị xã hội.', 'TL01', 'NXB05', 'TG25'),
('Đồi gió hú', 120000, 80, 'img/doi_gio_hu.jpg', 'Một câu chuyện tình yêu và thù hận đầy bi kịch giữa Catherine Earnshaw và Heathcliff trong bối cảnh vùng đồng hoang Yorkshire khắc nghiệt. Mối tình страстная và ám ảnh của họ đã gây ra những hệ lụy đau thương cho nhiều thế hệ sau.', 'TL01', 'NXB06', 'TG33'),
('Jane Eyre', 100000, 90, 'img/jane_eyre.jpg', 'Câu chuyện về cuộc đời đầy nghị lực và khát vọng tự do của Jane Eyre, một cô gái mồ côi phải trải qua nhiều khó khăn và thử thách. Tình yêu của cô với Mr. Rochester, một người đàn ông bí ẩn và giàu có, cũng đầy trắc trở và bí mật.', 'TL01', 'NXB07', 'TG25'),
('Little Women', 95000, 95, 'img/little_women.jpg', 'Câu chuyện ấm áp và cảm động về cuộc sống của bốn chị em nhà March (Meg, Jo, Beth và Amy) trong thời kỳ Nội chiến Hoa Kỳ. Mỗi người có một cá tính và ước mơ riêng, nhưng họ luôn yêu thương và hỗ trợ lẫn nhau trong cuộc sống.', 'TL12', 'NXB08', 'TG25'),
('The Adventures of Tom Sawyer', 80000, 100, 'img/tom_sawyer.jpg', 'Những cuộc phiêu lưu tinh nghịch và hài hước của cậu bé Tom Sawyer ở một thị trấn nhỏ bên bờ sông Mississippi. Cùng với người bạn thân Huckleberry Finn, Tom đã trải qua một tuổi thơ đầy màu sắc và những kỷ niệm khó quên.', 'TL12', 'NXB09', 'TG13'),
('The Old Man and the Sea', 65000, 115, 'img/old_man.jpg', 'Câu chuyện về cuộc chiến sinh tồn đầy kiên cường của một ông lão đánh cá đơn độc với một con cá kiếm khổng lồ ngoài khơi Cuba. Dù cuối cùng không giữ được con cá, nhưng tinh thần bất khuất và lòng dũng cảm của ông.', 'TL02', 'NXB10', 'TG31'),
('Moby Dick', 150000, 60, 'img/moby_dick.jpg', 'Câu chuyện về cuộc săn đuổi ám ảnh của thuyền trưởng Ahab đối với con cá voi trắng khổng lồ Moby Dick. Cuộc hành trình đầy nguy hiểm và ám ảnh này đã hé lộ những khía cạnh sâu thẳm về lòng thù hận và sự điên cuồng của con người.', 'TL07', 'NXB03', 'TG18'),
('Hamlet', 110000, 80, 'img/hamlet.jpg', 'Một bi kịch nổi tiếng của Shakespeare về hoàng tử Hamlet của Đan Mạch, người đang tìm cách trả thù cho cái chết của cha mình. Vở kịch khám phá những chủ đề phức tạp về sự trả thù, đạo đức, sự điên loạn và số phận con người.', 'TL04', 'NXB04', 'TG11'),
('Romeo and Juliet', 90000, 90, 'img/romeo_juliet.jpg', 'Câu chuyện tình yêu bi thảm giữa Romeo Montague và Juliet Capulet, hai người thuộc về hai gia đình thù địch nhau. Tình yêu страстная vàForbidden của họ đã dẫn đến một kết cục đau thương và đầy nước mắt.', 'TL04', 'NXB05', 'TG11'),
('Macbeth', 85000, 95, 'img/macbeth.jpg', 'Một bi kịch khác của Shakespeare về sự trỗi dậy và suy tàn của Macbeth, một vị tướng Scotland đầy tham vọng, sau khi nghe lời tiên tri của ba phù thủy. Vở kịch khám phá những tác động tiêu cực của tham vọng và tội ác đối với tâm hồn con người.', 'TL04', 'NXB06', 'TG11'),
('Othello', 92000, 88, 'img/othello.jpg', 'Bi kịch về sự ghen tuông mù quáng của Othello, một vị tướng Moorish tài ba, bị Iago, một kẻ gian xảo, lợi dụng để tin rằng vợ mình, Desdemona, không chung thủy. Sự ghen tuông đã dẫn đến một kết cục đẫm máu và đau lòng.', 'TL04', 'NXB07', 'TG31'),
('King Lear', 105000, 82, 'img/king_lear.jpg', 'Một trong những bi kịch vĩ đại nhất của Shakespeare về vua Lear, một vị vua già quyết định chia vương quốc cho ba cô con gái. Quyết định sai lầm này đã dẫn đến sự phản bội, chiến tranh và những đau khổ tột cùng cho nhà vua.', 'TL04', 'NXB08', 'TG11'),
('The Odyssey', 120000, 75, 'img/odyssey.jpg', 'Một trong hai tác phẩm vĩ đại của Homer, kể về hành trình gian khổ kéo dài mười năm của Odysseus trở về nhà sau cuộc chiến thành Troy. Trên đường đi, ông phải đối mặt với nhiều hiểm nguy và thử thách từ thần và quái vật.', 'TL07', 'NXB09', 'TG21'),
('The Iliad', 130000, 70, 'img/iliad.jpg', 'Tác phẩm còn lại của Homer, tập trung vào những sự kiện trong những tuần cuối cùng của cuộc chiến thành Troy, đặc biệt là cơn thịnh nộ của Achilles. Tác phẩm khám phá những chủ đề về chiến tranh, danh dự và số phận con người.', 'TL08', 'NXB10', 'TG11'),
('The Republic', 115000, 78, 'img/republic.jpg', 'Một tác phẩm triết học kinh điển của Plato, trong đó Socrates và những người đối thoại của ông thảo luận về công lý, trật tự và đặc điểm của một nhà nước lý tưởng. Tác phẩm ảnh hưởng sâu sắc đến tư tưởng chính trị phương Tây.', 'TL09', 'NXB01', 'TG24'),
('Meditations', 88000, 92, 'img/meditations.jpg', 'Những suy ngẫm cá nhân của hoàng đế La Mã Marcus Aurelius về triết học стоicism, đạo đức và cách sống một cuộc đời tốt đẹp. Những ghi chép này mang đến những lời khuyên sâu sắc và thiết thực về cách đối mặt với khó khăn.', 'TL09', 'NXB02', 'TG24'),
('Thus Spoke Zarathustra', 140000, 65, 'img/zarathustra.jpg', 'Một tác phẩm triết học của Friedrich Nietzsche, kể về những lời dạy của nhà tiên tri Zarathustra về những khái niệm như "Siêu nhân" (Übermensch) và "Ý chí quyền lực" (Wille zur Macht). Tác phẩm đầy tính biểu tượng và thách thức.', 'TL09', 'NXB03', 'TG24'),
('The Prince', 98000, 85, 'img/prince.jpg', 'Một luận thuyết chính trị nổi tiếng của Niccolò Machiavelli, trong đó ông đưa ra những lời khuyên thực dụng và đôi khi tàn nhẫn cho các nhà cai trị về cách giành được và duy trì quyền lực. Tác phẩm đã gây ra nhiều tranh cãi.', 'TL10', 'NXB04', 'TG15');