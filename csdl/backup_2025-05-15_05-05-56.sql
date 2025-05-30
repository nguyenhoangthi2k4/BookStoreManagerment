-- MySQL dump 10.13  Distrib 5.7.25, for Win64 (x86_64)
--
-- Host: localhost    Database: qlsach
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS qlsach CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE qlsach;

--
-- Table structure for table `account`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `TENTAIKHOAN` varchar(255) DEFAULT NULL,
  `QUYEN` int(11) DEFAULT '2',
  `KHOA_TK` int(11) DEFAULT '0',
  `NGAYTAO` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
-- ACCOUNT admin pass:123
INSERT INTO `account` VALUES ('admin','$2y$10$0dK7U2Ux5b.yQEYX0Mw9a.Y5ND6886bsjkEYL4Lz.jvclIzYjcNeW','admin',1,0,'2025-05-14 13:12:59'),('user','$2y$10$DYzlwdRsWSvtFyGOrOsnn..cXphzTieybpNuVk2TGlqUu2Nakjlhm','User',2,0,'2025-05-15 12:44:07');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cthoadon`
--

DROP TABLE IF EXISTS `cthoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cthoadon` (
  `MAHOADON` int(11) NOT NULL,
  `MASACH` varchar(10) NOT NULL,
  `SOLUONGMUA` int(11) DEFAULT NULL,
  `DONGIABAN` double DEFAULT NULL,
  PRIMARY KEY (`MAHOADON`,`MASACH`),
  KEY `MASACH` (`MASACH`),
  CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`MAHOADON`) REFERENCES `hoadon` (`MAHOADON`),
  CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`MASACH`) REFERENCES `sach` (`MASACH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cthoadon`
--

LOCK TABLES `cthoadon` WRITE;
/*!40000 ALTER TABLE `cthoadon` DISABLE KEYS */;
INSERT INTO `cthoadon` VALUES (1,'S1111',1,120000),(2,'S0010',1,82000),(2,'S0015',1,110000),(3,'S0005',1,90000),(3,'S0010',2,82000),(4,'S0001',3,80000);
/*!40000 ALTER TABLE `cthoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoadon` (
  `MAHOADON` int(11) NOT NULL AUTO_INCREMENT,
  `NGAYLAP` date DEFAULT NULL,
  `THANHTIEN` double DEFAULT NULL,
  `MAKHACHHANG` int(11) DEFAULT NULL,
  PRIMARY KEY (`MAHOADON`),
  KEY `MAKHACHHANG` (`MAKHACHHANG`),
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `khachhang` (`MAKHACHHANG`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` VALUES (1,'2025-05-14',120000,3),(2,'2025-05-14',192000,4),(3,'2025-05-14',254000,4),(4,'2025-05-14',240000,4);
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khachhang` (
  `MAKHACHHANG` int(11) NOT NULL AUTO_INCREMENT,
  `TENKHACHHANG` varchar(255) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `NGAYSINH` datetime DEFAULT NULL,
  `SDT` char(10) DEFAULT NULL,
  `GIOITINH` int(11) DEFAULT '0',
  `DIEMTICHLUY` int(11) DEFAULT '0',
  `USERNAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MAKHACHHANG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (2,'admin','admin','admin@gmail.com',NULL,'0123456789',0,0,'admin'),(3,'Nguyễn Hoàng Thi','An Giang','thi@gmail.com',NULL,'0123456789',0,0,'thi'),(4,'test','An Giang','test@gmail.com','2025-05-02 00:00:00','0123456789',1,0,'test'),(5,'User','An Giang','user@gmail.com','2025-05-01 00:00:00','0123456789',0,0,'user');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhaxuatban`
--

DROP TABLE IF EXISTS `nhaxuatban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhaxuatban` (
  `MANXB` varchar(10) NOT NULL,
  `TENNXB` varchar(50) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `SDT` char(10) DEFAULT NULL,
  PRIMARY KEY (`MANXB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhaxuatban`
--

LOCK TABLES `nhaxuatban` WRITE;
/*!40000 ALTER TABLE `nhaxuatban` DISABLE KEYS */;
INSERT INTO `nhaxuatban` VALUES ('NXB01','NXB Trẻ','TP. Hồ Chí Minh','0281234567'),('NXB02','NXB Kim Đồng','Hà Nội','0249876543'),('NXB03','NXB Văn Học','Hà Nội','0241122334'),('NXB04','NXB Hội Nhà Văn','Hà Nội','0242233445'),('NXB05','NXB Giáo Dục Việt Nam','Hà Nội','0243344556'),('NXB06','NXB Phụ Nữ Việt Nam','Hà Nội','0244455667'),('NXB07','NXB Lao Động','Hà Nội','0245566778'),('NXB08','NXB Đà Nẵng','Đà Nẵng','0236677889'),('NXB09','NXB Đồng Nai','Biên Hòa','0251788990'),('NXB10','NXB Tổng Hợp TP.HCM','TP. Hồ Chí Minh','0288990011');
/*!40000 ALTER TABLE `nhaxuatban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sach` (
  `MASACH` varchar(10) NOT NULL,
  `TENSACH` varchar(255) DEFAULT NULL,
  `GIAGOC` double DEFAULT NULL,
  `KHUYENMAI` double DEFAULT '0',
  `SOLUONGTON` int(11) DEFAULT NULL,
  `ANHBIA` varchar(255) DEFAULT NULL,
  `NOIDUNG` varchar(255) DEFAULT NULL,
  `MATHELOAI` varchar(10) DEFAULT NULL,
  `MANXB` varchar(10) DEFAULT NULL,
  `MATACGIA` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`MASACH`),
  KEY `MATHELOAI` (`MATHELOAI`),
  KEY `MANXB` (`MANXB`),
  KEY `MATACGIA` (`MATACGIA`),
  CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MATHELOAI`) REFERENCES `theloai` (`MATHELOAI`),
  CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`MANXB`) REFERENCES `nhaxuatban` (`MANXB`),
  CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`MATACGIA`) REFERENCES `tacgia` (`MATACGIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach`
--

LOCK TABLES `sach` WRITE;
/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` VALUES ('S0001','Tôi thấy hoa vàng trên cỏ xanh',80000,0,97,'img/hoa_vang.jpg','Câu chuyện nhẹ nhàng, trong trẻo về tuổi thơ ở một làng quê Việt Nam yên bình. Những rung động đầu đời, tình bạn ngây ngô và những khám phá thú vị về thế giới xung quanh được tác giả Nguyễn Nhật Ánh khắc họa một cách chân thực và đầy cảm xúc.','TL01','NXB01','TG01'),('S0002','Dế mèn phiêu lưu ký',65000,0,150,'img/de_men.jpg','Kể về cuộc phiêu lưu đầy thú vị và cũng không ít gian nan của chú dế Mèn tinh nghịch. Qua những chuyến đi, Mèn học được nhiều bài học quý giá về cuộc sống, tình bạn và lòng dũng cảm. Một tác phẩm văn học thiếu nhi kinh điển của nhà văn Tô Hoài.','TL12','NXB02','TG02'),('S0003','Chí Phèo',50000,0,80,'img/chi_pheo.jpg','Một tác phẩm hiện thực phê phán sâu sắc về số phận bi thảm của người nông dân nghèo khổ trong xã hội thực dân nửa phong kiến. Hình tượng Chí Phèo từ một thanh niên lương thiện bị đẩy vào con đường lưu manh hóa là một điển hình cho sự tha hóa.','TL02','NXB03','TG03'),('S0004','Vợ chồng A Phủ',55000,0,120,'img/vo_chong_a_phu.jpg','Tái hiện cuộc sống khổ cực và khát vọng tự do của đồng bào dân tộc thiểu số dưới ách thống trị của bọn địa chủ phong kiến. Mị và A Phủ, hai con người có số phận bất hạnh, đã tìm thấy sức mạnh phản kháng trong tình cảnh tăm tối.','TL02','NXB03','TG02'),('S0005','Số đỏ',90000,0,89,'img/so_do.jpg','Tiểu thuyết trào phúng bậc thầy của Vũ Trọng Phụng, châm biếm sâu cay xã hội thượng lưu Hà Nội những năm 30 đầy giả dối và lố bịch. Nhân vật Xuân Tóc Đỏ từ một kẻ vô danh bỗng trở thành một nhân vật \"tai to mặt lớn\" nhờ những sự kiện hài hước.','TL01','NXB03','TG07'),('S0006','Tắt đèn',70000,0,110,'img/tat_den.jpg','Phản ánh chân thực cuộc sống cơ cực của người nông dân Việt Nam trước Cách mạng tháng Tám. Hình ảnh chị Dậu, một người phụ nữ nông thôn mạnh mẽ, đảm đang, phải bán con, bán chó để nộp sưu thuế là một biểu tượng cho sự bần cùng hóa của nông dân.','TL02','NXB03','TG08'),('S0007','Lão Hạc',45000,0,130,'img/lao_hac.jpg','Câu chuyện cảm động về tình cha con và lòng tự trọng của một người nông dân nghèo khổ. Lão Hạc, một người cha đơn thân, đã phải bán cậu Vàng, người bạn thân thiết nhất của con trai mình, để trang trải cuộc sống khốn khó.','TL02','NXB03','TG03'),('S0008','Đất rừng phương Nam',85000,0,105,'img/dat_rung.jpg','Khung cảnh thiên nhiên hùng vĩ và cuộc sống đầy gian khổ nhưng cũng rất đỗi hào hùng của người dân Nam Bộ trong thời kỳ kháng chiến chống Pháp. Cậu bé An lạc giữa thiên nhiên hoang sơ và những con người nghĩa khí.','TL07','NXB01','TG01'),('S0009','Tuổi thơ dữ dội',75000,0,115,'img/tuoi_tho.jpg','Những ký ức sâu sắc về tuổi thơ đầy gian khó nhưng cũng rất đỗi hồn nhiên của những đứa trẻ trong thời kỳ kháng chiến. Tình bạn, lòng yêu nước và những trò nghịch ngợm tinh nghịch được nhà văn Phùng Quán tái hiện một cách sinh động.','TL08','NXB02','TG06'),('S0010','Mắt biếc',82000,0,105,'img/mat_biec.jpg','Câu chuyện tình yêu buồn man mác của Ngạn và Hà Lan, hai người bạn từ thuở ấu thơ. Tình yêu trong sáng, những rung động đầu đời và sự nuối tiếc khôn nguôi khi tình yêu không trọn vẹn được Nguyễn Nhật Ánh kể bằng giọng văn nhẹ nhàng, sâu lắng.','TL01','NXB01','TG01'),('S0011','Hoàng tử bé',60000,0,140,'img/hoang_tu_be.jpg','Một câu chuyện sâu sắc về tình bạn, tình yêu, trách nhiệm và ý nghĩa của cuộc sống. Cuộc gặp gỡ giữa phi công lạc giữa sa mạc và hoàng tử bé đến từ một hành tinh xa xôi mang đến những suy ngẫm về những giá trị đích thực trong cuộc đời.','TL12','NXB02','TG21'),('S0012','Sherlock Holmes',120000,0,70,'img/sherlock.jpg','Tuyển tập những vụ án ly kỳ và hấp dẫn được giải quyết bởi thám tử tài ba Sherlock Holmes và người bạn đồng hành trung thành bác sĩ Watson. Khả năng suy luận logic phi thường của Holmes đã trở thành một biểu tượng trong văn học trinh thám.','TL03','NXB04','TG22'),('S0013','Harry Potter và Hòn đá phù thủy',150000,0,60,'img/harry_potter1.jpg','Mở đầu cho series truyện phiêu lưu kỳ ảo nổi tiếng về cậu bé phù thủy Harry Potter. Cậu bé mồ côi sống cùng gia đình dì dượng độc ác bỗng nhận ra mình có phép thuật..','TL06','NXB05','TG23'),('S0014','Bố già',180000,0,50,'img/bo_gia.jpg','Một bức tranh chân thực và đầy kịch tính về thế giới ngầm của mafia Ý ở New York. Câu chuyện về gia đình Corleone và ông trùm Vito Corleone, người được kính nể và sợ hãi, cùng những cuộc chiến quyền lực đẫm máu.','TL02','NXB06','TG24'),('S0015','Pride and Prejudice',110000,0,74,'img/pride_prejudice.jpg','Một câu chuyện tình yêu và định kiến kinh điển trong văn học Anh. Mối quan hệ giữa Elizabeth Bennet, một cô gái thông minh và độc lập, và Mr. Darcy, một quý tộc giàu có nhưng kiêu ngạo, trải qua nhiều hiểu lầm và thử thách.','TL01','NXB07','TG25'),('S0016','To Kill a Mockingbird',130000,0,65,'img/to_kill.jpg','Câu chuyện cảm động và sâu sắc về vấn đề chủng tộc và công lý ở miền Nam nước Mỹ những năm 30, được kể qua lời kể của cô bé Scout Finch. Vụ án Tom Robinson, một người đàn ông da đen bị buộc tội oan, đã thức tỉnh lương tâm của cả cộng đồng.','TL02','NXB08','TG26'),('S0017','1984',95000,0,85,'img/1984.jpg','Một tiểu thuyết dystopian nổi tiếng về một xã hội độc tài toàn trị, nơi mọi suy nghĩ và hành động của con người đều bị kiểm soát chặt chẽ bởi Đảng. Winston Smith, một nhân viên của Bộ Sự thật, đã nổi loạn chống lại hệ thống áp bức.','TL05','NXB09','TG27'),('S0018','The Lord of the Rings',250000,0,40,'img/lord_rings.jpg','Một bộ sử thi giả tưởng vĩ đại về cuộc chiến chống lại Chúa tể bóng tối Sauron để cứu lấy Trung Địa. Hành trình gian khổ của Frodo Baggins và những người bạn đồng hành để tiêu hủy chiếc Nhẫn Quyền Lực.','TL06','NXB10','TG28'),('S0019','The Great Gatsby',100000,0,80,'img/gatsby.jpg','Câu chuyện về giấc mơ Mỹ tan vỡ trong bối cảnh xã hội thượng lưu xa hoa và phù phiếm của thập niên 20 ở Mỹ. Jay Gatsby, một triệu phú bí ẩn, cố gắng giành lại tình yêu của Daisy Buchanan từ quá khứ.','TL01','NXB07','TG29'),('S0020','One Hundred Years of Solitude',160000,0,55,'img/one_hundred.jpg','Một kiệt tác của văn học Mỹ Latinh, kể về lịch sử thăng trầm của dòng họ Buendía qua bảy thế hệ ở thị trấn huyền thoại Macondo. Câu chuyện pha trộn giữa hiện thực và yếu tố kỳ ảo.','TL02','NXB08','TG30'),('S0021','Truyện Kiều',70000,0,120,'img/truyen_kieu.jpg','Một tuyệt tác của văn học Việt Nam, kể về cuộc đời đầy sóng gió và bi kịch của nàng Kiều tài sắc vẹn toàn. Qua những khổ đau và tủi nhục, Kiều vẫn giữ được tấm lòng nhân hậu và khát vọng về một cuộc sống tốt đẹp hơn.','TL01','NXB03','TG05'),('S0022','Nhật ký Đặng Thùy Trâm',78000,0,110,'img/nhat_ky_tram.jpg','Những trang nhật ký chân thực và xúc động của nữ bác sĩ Đặng Thùy Trâm trong những năm tháng chiến tranh ác liệt. Tình yêu nước, lý tưởng sống cao đẹp, nỗi nhớ nhà và những trăn trở về cuộc đời.','TL11','NXB01','TG31'),('S0023','Cánh đồng bất tận',88000,0,95,'img/canh_dong.jpg','Những câu chuyện đầy ám ảnh về cuộc sống khắc nghiệt và tình người mong manh ở miền Tây sông nước. Ba cha con ông Sáu Dần sống lay lắt trên những cánh đồng, mang trong mình những vết thương lòng sâu sắc.','TL02','NXB09','TG17'),('S0024','Ăn mày dĩ vãng',92000,0,90,'img/an_may.jpg','Một cuốn tiểu thuyết đầy suy tư và hoài niệm về những giá trị văn hóa truyền thống đang dần bị mai một trong xã hội hiện đại. Nhân vật chính, một người trí thức, trở về quê hương và đối diện với những thay đổi của thời gian.','TL11','NXB10','TG12'),('S0025','Thiếu nữ đánh cờ vây',105000,0,80,'img/thieu_nu.jpg','Câu chuyện về cuộc đời đầy biến động của một cô gái trẻ tài năng trong bối cảnh lịch sử đầy biến động của Trung Quốc. Niềm đam mê cờ vây đã dẫn dắt cô qua những thăng trầm của cuộc sống và tình yêu.','TL01','NXB04','TG32'),('S0026','Kafka bên bờ biển',135000,0,65,'img/kafka.jpg','Một tiểu thuyết huyền bí và đầy ẩn dụ của Haruki Murakami, kể về cuộc hành trình kỳ lạ của cậu bé Kafka Tamura và ông lão Nakata, người có khả năng nói chuyện với mèo. Hai câu chuyện song song dần hé lộ những bí ẩn khó lý giải.','TL05','NXB05','TG33'),('S0027','Rừng Na Uy',125000,0,70,'img/rung_na_uy.jpg','Một câu chuyện tình yêu và mất mát đầy ám ảnh của Haruki Murakami. Toru Watanabe nhớ lại mối tình với hai người phụ nữ rất khác nhau: Naoko, người yêu đầu tiên đầy tổn thương, và Midori, một cô gái sôi nổi và độc lập.','TL01','NXB06','TG33'),('S0028','Biên niên ký chim vặn dây cót',145000,0,60,'img/bien_nien_ky.jpg','Một tiểu thuyết phức tạp và đầy mê hoặc của Haruki Murakami, pha trộn giữa hiện thực và yếu tố siêu nhiên. Toru Okada đi tìm con mèo mất tích và người vợ đột nhiên biến mất, dẫn anh vào một thế giới kỳ lạ và đầy bí ẩn.','TL05','NXB07','TG33'),('S0029','Phía nam biên giới, phía tây mặt trời',115000,0,75,'img/phia_nam.jpg','Một câu chuyện tình yêu nhẹ nhàng nhưng đầy day dứt của Haruki Murakami về mối tình đầu không trọn vẹn giữa Hajime và Shimamoto. Những ký ức về quá khứ và sự tiếc nuối khôn nguôi theo đuổi nhân vật chính.','TL01','NXB08','TG33'),('S0030','1Q84',170000,0,50,'img/1q84.jpg','Một tiểu thuyết đồ sộ của Haruki Murakami về hai câu chuyện song song của Aomame và Tengo trong một thế giới Tokyo kỳ lạ và đầy những sự kiện bí ẩn liên quan đến một giáo phái kỳ lạ và hai mặt trăng trên bầu trời.','TL05','NXB09','TG33'),('S0031','Nhà giả kim',75000,0,110,'img/nha_gia_kim.jpg','Hành trình theo đuổi giấc mơ của Santiago, một chàng chăn cừu trẻ tuổi, khi anh quyết định đi tìm kho báu được báo mộng. Trên đường đi, anh gặp gỡ nhiều người và học được những bài học quý giá về cuộc sống, định mệnh và lắng nghe trái tim mình.','TL09','NXB02','TG30'),('S0032','Cô gái đến từ hôm qua',85000,0,100,'img/co_gai.jpg','Câu chuyện về tình yêu đầu đời và những kỷ niệm đẹp đẽ của tuổi học trò. Nhân vật chính, một cậu học sinh trung học, đã trải qua những cảm xúc ngọt ngào và đau khổ khi yêu một cô gái bí ẩn đến từ hôm qua.','TL01','NXB03','TG01'),('S0033','Tôi là Malala',95000,0,95,'img/malala.jpg','Cuốn tự truyện của Malala Yousafzai, cô gái Pakistan dũng cảm đã đứng lên đấu tranh cho quyền được học hành của trẻ em gái. Câu chuyện về lòng dũng cảm, sự kiên trì và khát vọng thay đổi thế giới.','TL11','NXB04','TG31'),('S0034','Giết con chim nhại',130000,0,70,'img/giet_chim.jpg','Câu chuyện về sự trưởng thành của cô bé Scout Finch ở miền Nam nước Mỹ những năm 30, trong bối cảnh nạn phân biệt chủng tộc sâu sắc. Vụ án của Tom Robinson, một người đàn ông da đen bị buộc tội oan.','TL02','NXB04','TG26'),('S0035','Kiêu hãnh và định kiến',115000,0,75,'img/kieu_hanh.jpg','Một câu chuyện tình yêu và sự hiểu lầm giữa Elizabeth Bennet, một cô gái thông minh và có cá tính mạnh mẽ, và Fitzwilliam Darcy, một quý tộc giàu có nhưng kiêu ngạo. Những rào cản về địa vị xã hội.','TL01','NXB05','TG25'),('S0036','Đồi gió hú',120000,0,80,'img/doi_gio_hu.jpg','Một câu chuyện tình yêu và thù hận đầy bi kịch giữa Catherine Earnshaw và Heathcliff trong bối cảnh vùng đồng hoang Yorkshire khắc nghiệt. Mối tình страстная và ám ảnh của họ đã gây ra những hệ lụy đau thương cho nhiều thế hệ sau.','TL01','NXB06','TG33'),('S0037','Jane Eyre',100000,0,90,'img/jane_eyre.jpg','Câu chuyện về cuộc đời đầy nghị lực và khát vọng tự do của Jane Eyre, một cô gái mồ côi phải trải qua nhiều khó khăn và thử thách. Tình yêu của cô với Mr. Rochester, một người đàn ông bí ẩn và giàu có, cũng đầy trắc trở và bí mật.','TL01','NXB07','TG25'),('S0038','Little Women',95000,0,95,'img/little_women.jpg','Câu chuyện ấm áp và cảm động về cuộc sống của bốn chị em nhà March (Meg, Jo, Beth và Amy) trong thời kỳ Nội chiến Hoa Kỳ. Mỗi người có một cá tính và ước mơ riêng, nhưng họ luôn yêu thương và hỗ trợ lẫn nhau trong cuộc sống.','TL12','NXB08','TG25'),('S0039','The Adventures of Tom Sawyer',80000,0,100,'img/tom_sawyer.jpg','Những cuộc phiêu lưu tinh nghịch và hài hước của cậu bé Tom Sawyer ở một thị trấn nhỏ bên bờ sông Mississippi. Cùng với người bạn thân Huckleberry Finn, Tom đã trải qua một tuổi thơ đầy màu sắc và những kỷ niệm khó quên.','TL12','NXB09','TG13'),('S0040','The Old Man and the Sea',65000,0,115,'img/old_man.jpg','Câu chuyện về cuộc chiến sinh tồn đầy kiên cường của một ông lão đánh cá đơn độc với một con cá kiếm khổng lồ ngoài khơi Cuba. Dù cuối cùng không giữ được con cá, nhưng tinh thần bất khuất và lòng dũng cảm của ông.','TL02','NXB10','TG31'),('S0041','Moby Dick',150000,0,60,'img/moby_dick.jpg','Câu chuyện về cuộc săn đuổi ám ảnh của thuyền trưởng Ahab đối với con cá voi trắng khổng lồ Moby Dick. Cuộc hành trình đầy nguy hiểm và ám ảnh này đã hé lộ những khía cạnh sâu thẳm về lòng thù hận và sự điên cuồng của con người.','TL07','NXB03','TG18'),('S0042','Hamlet',110000,0,80,'img/hamlet.jpg','Một bi kịch nổi tiếng của Shakespeare về hoàng tử Hamlet của Đan Mạch, người đang tìm cách trả thù cho cái chết của cha mình. Vở kịch khám phá những chủ đề phức tạp về sự trả thù, đạo đức, sự điên loạn và số phận con người.','TL04','NXB04','TG11'),('S0043','Romeo and Juliet',90000,0,90,'img/romeo_juliet.jpg','Câu chuyện tình yêu bi thảm giữa Romeo Montague và Juliet Capulet, hai người thuộc về hai gia đình thù địch nhau. Tình yêu страстная vàForbidden của họ đã dẫn đến một kết cục đau thương và đầy nước mắt.','TL04','NXB05','TG11'),('S0044','Macbeth',85000,0,95,'img/macbeth.jpg','Một bi kịch khác của Shakespeare về sự trỗi dậy và suy tàn của Macbeth, một vị tướng Scotland đầy tham vọng, sau khi nghe lời tiên tri của ba phù thủy. Vở kịch khám phá những tác động tiêu cực của tham vọng và tội ác đối với tâm hồn con người.','TL04','NXB06','TG11'),('S0045','Othello',92000,0,88,'img/othello.jpg','Bi kịch về sự ghen tuông mù quáng của Othello, một vị tướng Moorish tài ba, bị Iago, một kẻ gian xảo, lợi dụng để tin rằng vợ mình, Desdemona, không chung thủy. Sự ghen tuông đã dẫn đến một kết cục đẫm máu và đau lòng.','TL04','NXB07','TG31'),('S0046','King Lear',105000,0,82,'img/king_lear.jpg','Một trong những bi kịch vĩ đại nhất của Shakespeare về vua Lear, một vị vua già quyết định chia vương quốc cho ba cô con gái. Quyết định sai lầm này đã dẫn đến sự phản bội, chiến tranh và những đau khổ tột cùng cho nhà vua.','TL04','NXB08','TG11'),('S0047','The Odyssey',120000,0,75,'img/odyssey.jpg','Một trong hai tác phẩm vĩ đại của Homer, kể về hành trình gian khổ kéo dài mười năm của Odysseus trở về nhà sau cuộc chiến thành Troy. Trên đường đi, ông phải đối mặt với nhiều hiểm nguy và thử thách từ thần và quái vật.','TL07','NXB09','TG21'),('S0048','The Iliad',130000,0,70,'img/iliad.jpg','Tác phẩm còn lại của Homer, tập trung vào những sự kiện trong những tuần cuối cùng của cuộc chiến thành Troy, đặc biệt là cơn thịnh nộ của Achilles. Tác phẩm khám phá những chủ đề về chiến tranh, danh dự và số phận con người.','TL08','NXB10','TG11'),('S0049','The Republic',115000,0,78,'img/republic.jpg','Một tác phẩm triết học kinh điển của Plato, trong đó Socrates và những người đối thoại của ông thảo luận về công lý, trật tự và đặc điểm của một nhà nước lý tưởng. Tác phẩm ảnh hưởng sâu sắc đến tư tưởng chính trị phương Tây.','TL09','NXB01','TG24'),('S0050','Meditations',88000,0,92,'img/meditations.jpg','Những suy ngẫm cá nhân của hoàng đế La Mã Marcus Aurelius về triết học стоicism, đạo đức và cách sống một cuộc đời tốt đẹp. Những ghi chép này mang đến những lời khuyên sâu sắc và thiết thực về cách đối mặt với khó khăn.','TL09','NXB02','TG24'),('S0051','Thus Spoke Zarathustra',140000,0,65,'img/zarathustra.jpg','Một tác phẩm triết học của Friedrich Nietzsche, kể về những lời dạy của nhà tiên tri Zarathustra về những khái niệm như \"Siêu nhân\" (Übermensch) và \"Ý chí quyền lực\" (Wille zur Macht). Tác phẩm đầy tính biểu tượng và thách thức.','TL09','NXB03','TG24'),('S0052','The Prince',98000,0,85,'img/prince.jpg','Một luận thuyết chính trị nổi tiếng của Niccolò Machiavelli, trong đó ông đưa ra những lời khuyên thực dụng và đôi khi tàn nhẫn cho các nhà cai trị về cách giành được và duy trì quyền lực. Tác phẩm đã gây ra nhiều tranh cãi.','TL10','NXB04','TG15'),('S0053','Bí Mật Tư Duy Triệu Phú',95000,0,50,'img/tu_duy_trieu_phu.jpg','Cuốn sách giúp bạn hiểu rõ tư duy của người giàu, thay đổi cách nhìn về tiền bạc và thành công.','TL10','NXB01','TG01'),('S0054','Dám Nghĩ Lớn',88000,0,40,'img/dam_nghi_lon.jpg','Khám phá cách suy nghĩ quy mô lớn giúp bạn đạt được thành công vượt trội trong kinh doanh và cuộc sống.','TL10','NXB02','TG02'),('S0055','7 Thói Quen Hiệu Quả',105000,0,60,'img/7_thoi_quen.jpg','Hướng dẫn xây dựng những thói quen tích cực giúp cá nhân và tổ chức phát triển bền vững, hiệu quả.','TL10','NXB03','TG03'),('S0056','Chiến Lược Đại Dương Xanh',120000,0,30,'img/dai_duong_xanh.jpg','Đưa ra tư duy chiến lược giúp doanh nghiệp mở rộng thị trường, vượt khỏi cạnh tranh truyền thống.','TL10','NXB04','TG04'),('S0057','Nghĩ Giàu Và Làm Giàu',98000,0,45,'img/nghi_giau_lam_giau.jpg','Chia sẻ nguyên tắc tư duy tích cực và hành động quyết đoán để đạt được tự do tài chính.','TL10','NXB01','TG05'),('S0058','Khởi Nghiệp Tinh Gọn',115000,0,35,'img/khoi_nghiep_tinh_gon.jpg','Giới thiệu mô hình khởi nghiệp hiện đại giúp tiết kiệm chi phí và tối ưu hóa quá trình phát triển sản phẩm.','TL10','NXB05','TG06'),('S0061','Đắc Nhân Tâm',89000,0,50,'img/dac_nhan_tam.jpg','Cuốn sách kinh điển dạy cách thấu hiểu và ảnh hưởng đến người khác trong công việc và đời sống.','TL11','NXB02','TG07'),('S0062','Quẳng Gánh Lo Đi Và Vui Sống',95000,0,45,'img/quang_ganh_lo.jpg','Hướng dẫn cách buông bỏ lo âu, sống tích cực và hạnh phúc hơn mỗi ngày.','TL11','NXB03','TG08'),('S0063','Sức Mạnh Của Thói Quen',99000,0,40,'img/suc_manh_thoi_quen.jpg','Phân tích vai trò của thói quen trong hành vi con người và cách thay đổi để thành công.','TL11','NXB04','TG09'),('S0064','Tĩnh Lặng',102000,0,30,'img/tinh_lang.jpg','Khám phá sự an yên trong tâm trí giữa cuộc sống bận rộn, giúp bạn sống chậm lại và sâu sắc hơn.','TL11','NXB01','TG10'),('S0065','Sống Như Ngày Mai Sẽ Chết',97000,0,55,'img/song_nhu_chet.jpg','Lời nhắc nhở truyền cảm hứng để sống trọn vẹn và không trì hoãn những điều ý nghĩa.','TL11','NXB05','TG11'),('S0066','English Grammar in Use',135000,0,40,'img/english_grammar.jpg','Sách ngữ pháp tiếng Anh nổi tiếng, trình bày rõ ràng, phù hợp cho người học ở trình độ trung cấp.','TL13','NXB06','TG12'),('S0067','Tự Học 2000 Từ Vựng Tiếng Anh',88000,0,60,'img/2000_tu_vung.jpg','Cung cấp từ vựng thông dụng, kèm ví dụ thực tế và mẹo học giúp ghi nhớ lâu dài.','TL13','NXB07','TG13'),('S0068','Tiếng Anh Giao Tiếp Cho Người Mới Bắt Đầu',92000,0,50,'img/giao_tiep_co_ban.jpg','Hướng dẫn các mẫu câu giao tiếp cơ bản, dễ áp dụng cho người mới học.','TL13','NXB08','TG14'),('S0069','Luyện Nghe Tiếng Anh Hiệu Quả',99000,0,35,'img/luyen_nghe.jpg','Bài nghe phong phú, luyện kỹ năng phản xạ nghe hiểu trong môi trường tiếng Anh thực tế.','TL13','NXB09','TG15'),('S0070','Oxford Picture Dictionary',158000,0,25,'img/oxford_dictionary.jpg','Từ điển hình ảnh giúp học từ vựng bằng hình ảnh sinh động, dễ ghi nhớ, hiệu quả cao.','TL13','NXB10','TG16'),('S0071','Kỹ Năng Lãnh Đạo',175000,0,45,'img/ky_nang_lanh_dao.jpg','Sách cung cấp các kỹ năng lãnh đạo cần thiết trong môi trường công việc hiện đại, dành cho nhà quản lý.','TL14','NXB10','TG17'),('S0072','Quản Lý Dự Án Hiệu Quả',165000,0,60,'img/quan_ly_du_an.jpg','Phương pháp quản lý dự án hiệu quả từ khâu lên kế hoạch đến giám sát và đánh giá kết quả.','TL14','NXB09','TG18'),('S0073','Marketing Trong Kinh Doanh',145000,0,50,'img/marketing_kinh_doanh.jpg','Khám phá các chiến lược marketing thành công giúp phát triển doanh nghiệp và gia tăng lợi nhuận.','TL14','NXB10','TG19'),('S0074','Bí Quyết Xây Dựng Thương Hiệu',150000,0,40,'img/thuong_hieu.jpg','Sách hướng dẫn các bước xây dựng thương hiệu từ cơ bản đến nâng cao, thu hút khách hàng hiệu quả.','TL14','NXB09','TG20'),('S0075','Làm Giàu Từ Kinh Doanh Online',130000,0,55,'img/kinh_doanh_online.jpg','Chia sẻ kinh nghiệm thực tế trong việc xây dựng và phát triển một doanh nghiệp trực tuyến thành công.','TL14','NXB05','TG21'),('S0076','Kỹ Thuật Đàm Phán Trong Kinh Doanh',140000,0,35,'img/dam_phan_kinh_doanh.jpg','Hướng dẫn các kỹ thuật đàm phán hiệu quả giúp đạt được thỏa thuận tốt trong môi trường kinh doanh.','TL14','NXB06','TG22'),('S0077','Quản Lý Tài Chính Cá Nhân',125000,0,70,'img/tai_chinh_ca_nhan.jpg','Giúp bạn hiểu rõ các nguyên tắc quản lý tài chính cá nhân, xây dựng kế hoạch chi tiêu hợp lý.','TL14','NXB07','TG23'),('S0078','Nghệ Thuật Vẽ Tranh',200000,0,50,'img/nghe_thuat_ve_tranh.jpg','Sách hướng dẫn các kỹ thuật vẽ tranh từ cơ bản đến nâng cao, giúp bạn phát triển khả năng hội họa.','TL15','NXB10','TG24'),('S0079','Khám Phá Thế Giới Nghệ Thuật',180000,0,40,'img/kham_pha_nghe_thuat.jpg','Khám phá lịch sử và các thể loại nghệ thuật từ cổ điển đến hiện đại, giúp bạn hiểu rõ hơn về nghệ thuật.','TL15','NXB10','TG05'),('S0080','Nghệ Thuật Thiết Kế Đồ Họa',220000,0,60,'img/nghe_thuat_thiet_ke.jpg','Cung cấp các kỹ thuật thiết kế đồ họa cơ bản và nâng cao, giúp bạn trở thành một nhà thiết kế chuyên nghiệp.','TL15','NXB10','TG06'),('S0081','Phương Pháp Vẽ Chân Dung',210000,0,55,'img/ve_chan_dung.jpg','Sách hướng dẫn cách vẽ chân dung, từ các bước cơ bản đến các kỹ thuật vẽ chi tiết, sinh động.','TL15','NXB01','TG12'),('S0082','Nghệ Thuật Chế Tác',190000,0,45,'img/nghe_thuat_che_tac.jpg','Chỉ dẫn các kỹ thuật chế tác tác phẩm nghệ thuật, từ gốm sứ đến các tác phẩm điêu khắc đa dạng.','TL15','NXB02','TG08'),('S0083','Những Tác Phẩm Nghệ Thuật Vĩ Đại',250000,0,40,'img/tac_pham_nghe_thuat.jpg','Tổng hợp các tác phẩm nghệ thuật vĩ đại của các họa sĩ nổi tiếng trong lịch sử nghệ thuật thế giới.','TL15','NXB03','TG09'),('S0084','Nghệ Thuật Sắp Đặt Cảnh Quan',230000,0,65,'img/nghe_thuat_sap_dat.jpg','Sách hướng dẫn nghệ thuật sắp đặt cảnh quan trong thiết kế nội thất và không gian ngoài trời, tạo nên không gian sống hài hòa.','TL15','NXB04','TG10'),('S0091','Cuộc Điều Tra Bí Mật',150000,0,40,'img/trinh_tham_1.jpg','Một vụ án bí ẩn mà chỉ có sự tinh mắt và trí tuệ của các thám tử mới có thể giải quyết.','TL03','NXB10','TG06'),('S0092','Án Mạng Trong Đêm Tối',170000,0,45,'img/aan_mang_1.jpg','Khi mọi sự thật bị che giấu, những người thám tử phải đối mặt với thử thách không thể ngờ tới.','TL03','NXB01','TG07'),('S0093','Bí Mật Phía Sau Cánh Cửa',160000,0,50,'img/bi_mat_canh_cua.jpg','Với mỗi manh mối mới, vụ án dường như càng trở nên khó hiểu hơn, nhưng các thám tử không bao giờ từ bỏ.','TL03','NXB02','TG08'),('S0094','Điều Tra Cái Chết Bí Ẩn',180000,0,35,'img/dieu_tra_chi_tiet.jpg','Một vụ án nổi bật về cái chết bất thường, đưa các thám tử vào một cuộc đua với thời gian.','TL03','NXB03','TG09'),('S0095','Sát Thủ Trong Đêm',190000,0,40,'img/sat_thu_1.jpg','Cuộc đối đầu gay cấn giữa các thám tử và một sát thủ không bao giờ để lại dấu vết, nhưng cuối cùng sự thật sẽ được phơi bày.','TL03','NXB04','TG05'),('S1111','Shin',120000,0,99,'img/shin.png','Truyện trẻ em','TL12','NXB01','TG11');
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tacgia`
--

DROP TABLE IF EXISTS `tacgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tacgia` (
  `MATACGIA` varchar(10) NOT NULL,
  `TENTACGIA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MATACGIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tacgia`
--

LOCK TABLES `tacgia` WRITE;
/*!40000 ALTER TABLE `tacgia` DISABLE KEYS */;
INSERT INTO `tacgia` VALUES ('TG01','Nguyễn Nhật Ánh'),('TG02','Tô Hoài'),('TG03','Nam Cao'),('TG04','Xuân Diệu'),('TG05','Nguyễn Du'),('TG06','Phùng Quán'),('TG07','Vũ Trọng Phụng'),('TG08','Ngô Tất Tố'),('TG09','Nguyễn Tuân'),('TG10','Chế Lan Viên'),('TG11','Lưu Quang Vũ'),('TG12','Nguyễn Huy Thiệp'),('TG13','Bảo Ninh'),('TG14','Lê Lựu'),('TG15','Dương Thu Hương'),('TG16','Phan Thị Vàng Anh'),('TG17','Nguyễn Ngọc Tư'),('TG18','Cao Duy Anh'),('TG19','Võ Thị Thùy Trang'),('TG20','Trần Nhã Thụy'),('TG21','Antoine de Saint-Exupéry'),('TG22','Arthur Conan Doyle'),('TG23','J.K. Rowling'),('TG24','Mario Puzo'),('TG25','Jane Austen'),('TG26','Harper Lee'),('TG27','George Orwell'),('TG28','J.R.R. Tolkien'),('TG29','F. Scott Fitzgerald'),('TG30','Gabriel García Márquez'),('TG31','Đặng Thùy Trâm'),('TG32','Shan Sa'),('TG33','Haruki Murakami');
/*!40000 ALTER TABLE `tacgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theloai`
--

DROP TABLE IF EXISTS `theloai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theloai` (
  `MATHELOAI` varchar(10) NOT NULL,
  `TENTHELOAI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MATHELOAI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theloai`
--

LOCK TABLES `theloai` WRITE;
/*!40000 ALTER TABLE `theloai` DISABLE KEYS */;
INSERT INTO `theloai` VALUES ('TL01','Tiểu thuyết'),('TL02','Truyện ngắn'),('TL03','Trinh thám'),('TL04','Kinh dị'),('TL05','Ngôn tình'),('TL06','Khoa học'),('TL07','Phiêu lưu'),('TL08','Lịch sử'),('TL09','Tâm lý'),('TL10','Kinh doanh'),('TL11','Tự truyện'),('TL12','Thiếu nhi'),('TL13','Ngoại ngữ'),('TL14','Giáo trình'),('TL15','Nghệ thuật');
/*!40000 ALTER TABLE `theloai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-15 12:44:59
