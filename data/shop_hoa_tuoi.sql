-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2023 lúc 05:26 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_hoa_tuoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinhkhuyenmai`
--

CREATE TABLE `chuongtrinhkhuyenmai` (
  `id` int(11) NOT NULL,
  `ten_km` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `phantramgiam` int(11) NOT NULL,
  `hinhanhkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinhkhuyenmai`
--

INSERT INTO `chuongtrinhkhuyenmai` (`id`, `ten_km`, `mota`, `phantramgiam`, `hinhanhkm`) VALUES
(1, 'Khai trương', 'Khuyến mãi nhân dịp ngày khai trương của shop ', 30, 'khuyenmai2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(1, 'Hoa Hồng'),
(2, 'Hoa Lily'),
(3, 'Hoa Baby'),
(4, 'Hoa Cẩm Tú Cầu'),
(5, 'Hoa Cúc Tana'),
(6, 'Hoa Đồng Tiền'),
(7, 'Hoa Hướng Dương'),
(8, 'Hoa Loa Kèn'),
(9, 'Hoa Mẫu Đơn'),
(10, 'Hoa Tulip');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `ngay` datetime NOT NULL,
  `tongtien` float NOT NULL,
  `ghichu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmh` text NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `mota` text NOT NULL,
  `giagoc` float NOT NULL,
  `giaban` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinhanh` text NOT NULL,
  `luotxem` int(11) NOT NULL,
  `luotmua` int(11) NOT NULL,
  `true_false_km` int(1) NOT NULL,
  `khuyenmai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`id`, `tenmh`, `danhmuc_id`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `luotxem`, `luotmua`, `true_false_km`, `khuyenmai_id`) VALUES
(1, 'Ngôn ngữ tình yêu', 1, 'Bó hoa hồng xinh đẹp dành tặng cho nửa kia', 1900000, 2500000, 5, 'hoahong1.jpg', 1, 0, 1, 1),
(2, 'Tình yêu rực cháy', 1, 'Bó hoa hồng tươi xinh xắn giành tặng cho người yêu', 800000, 1500000, 2, 'hoahong2.jpg', 0, 0, 1, 1),
(3, 'Hương vị tình yêu', 1, 'Món quà ý nghĩa dành tặng cho người thương', 200000, 3500000, 0, 'hoahong3.jpg', 3, 0, 1, 1),
(4, 'Sắc màu yêu thương', 1, 'Đóa hoa hồng quyến rũ xinh đẹp, món quà ý nghĩa cho người yêu', 850000, 1000000, 1, 'hoahong4.jpg', 7, 0, 1, 1),
(5, 'Chứng nhân tình yêu', 1, 'Đóa hoa hồng đỏ sang trọng giành cho phái đẹp', 1000000, 1800000, 2, 'hoahong5.jpg', 27, 0, 1, 1),
(6, 'Tinh khôi', 2, 'Hoa ly màu trắng tượng trưng cho sự cao đẹp. Trắng thuần khiết cùng với tình yêu chung thủy nên có thể lựa chọn làm món quà trong các dịp cần sự tôn nghiêm.', 700000, 1700000, 1, 'hoalily1.jpg', 0, 0, 1, 1),
(7, 'Thuần khiết', 2, 'Bó hoa là sự kết hợp nhẹ nhàng giữa hoa ly trắng, hoa hồng trắng, cúc Rosy trắng và các loại lá phụ khác.\r\nBó hoa thích hợp dành tặng các mẹ vào dịp lễ 8/3, 20/10,…hoặc tặng bạn bè vào lễ tốt nghiệp.', 850000, 1600000, 1, 'hoalily2.jpg', 0, 0, 1, 1),
(8, 'Giấc mơ hồng', 2, ' Là biểu trưng cho sự giàu sang, lòng kiêu hãnh. Hoa Ly thích hợp để tặng mẹ, người yêu và ngày chúc mừng, tốt nghiệp, khai trương…', 1500000, 3200000, 1, 'hoalily3.jpg', 0, 0, 1, 1),
(9, 'Kiêu hãnh', 2, 'Là món quà ý nghĩa và những dịp đặc biệt.', 920000, 2000000, 1, 'hoalily4.jpg', 1, 0, 1, 1),
(10, 'Mộng mơ', 2, 'Bó hoa sang trọng, hài hòa và đẹp mắt. Lựa chọn hoàn hảo cho ngày Valentine, sinh nhật hoặc bất kỳ dịp đặc biệt nào.', 1200000, 2400000, 1, 'hoalily5.jpeg', 0, 0, 1, 1),
(11, 'Lời nhắn yêu thương', 3, 'Bó Hoa Baby dành tặng sinh nhật, hẹn hò, tỏ tình, có thể kết hợp cùng với một bông hoa hồng đỏ sang trọng.', 666000, 1700000, 1, 'baby1.jpg', 0, 0, 1, 1),
(12, 'Tình yêu màu trắng', 3, 'Hoa baby trắng tượng trưng cho tình yêu tinh khiết, sự trong trắng, mỏng manh, thanh tao như chính vẻ ngoài của hoa mang lại.', 850000, 1600000, 1, 'baby2.jpg', 0, 0, 1, 1),
(13, 'Hương sắc', 3, 'Bó hoa baby trắng kết hợp cùng giấy gói tinh tế nhã nhặn.', 1500000, 3200000, 1, 'baby3.jpg', 0, 0, 1, 1),
(14, 'Nàng thơ', 3, 'Bó hoa baby phong cách Hàn Quốc làm quà tặng bạn gái, tặng mẹ, đồng nghiệp dịp sinh nhật, 8/3, 20/10.', 920000, 2000000, 1, 'baby4.jpg', 0, 0, 1, 1),
(15, 'Nắng xuân', 3, 'Bó hoa baby là một sự kết hợp tinh tế của những bông hoa nhỏ bé, mang lại vẻ đáng yêu và tinh tế cho bất kỳ dịp kỷ niệm nào.', 1200000, 2400000, 1, 'baby5.jpg', 0, 0, 1, 1),
(16, 'thanh âm', 8, 'Bó hoa loa kèn là một tác phẩm nghệ thuật độc đáo, với những đóa loa kèn tươi tắn và hình dạng độc đáo. Sự kết hợp giữa màu sắc rực rỡ và hình dạng độc đáo của hoa loa kèn tạo nên một sự ấn tượng mạnh mẽ và đầy sáng tạo.', 720000, 1450000, 1, 'loaken1.jpg', 0, 0, 1, 1),
(17, 'Âm sắc', 8, 'Bó hoa loa kèn không chỉ là một món quà thú vị mà còn mang đến ý nghĩa về sự phát triển và tiến bộ. Hoa loa kèn biểu trưng cho sự tự tin, sự sáng tạo và lòng say mê. Bó hoa này sẽ làm tươi mới không gian và mang đến một cảm giác vui tươi và năng động, là món quà hoàn hảo cho những người yêu thích sự độc đáo và sự sáng tạo.', 850000, 1600000, 1, 'loaken2.jpg', 0, 0, 1, 1),
(18, 'Hòa nhịp', 8, 'Bó hoa loa kèn không chỉ là một món quà thú vị mà còn mang đến ý nghĩa về sự phát triển và tiến bộ. Hoa loa kèn biểu trưng cho sự tự tin, sự sáng tạo và lòng say mê. Bó hoa này sẽ làm tươi mới không gian và mang đến một cảm giác vui tươi và năng động, là món quà hoàn hảo cho những người yêu thích sự độc đáo và sự sáng tạo.', 1500000, 3200000, 1, 'loaken3.jpg', 0, 0, 1, 1),
(19, 'Hòa ca', 8, 'Hoa loa kèn còn mang ý nghĩa về sự tự do và sự thăng hoa. Hình dạng cong và thanh lịch của hoa loa kèn biểu trưng cho sự tinh tế và sự hoàn thiện. Bó hoa loa kèn sẽ là một món quà độc đáo và đáng nhớ trong các dịp đặc biệt, mang đến niềm vui và sự phấn khởi cho người nhận.', 920000, 2000000, 1, 'loaken4.jpg', 0, 0, 1, 1),
(20, 'Tiếng ca', 8, 'Bó hoa loa kèn là một sự kết hợp tuyệt vời giữa vẻ đẹp và âm thanh. Với những đóa loa kèn tươi tắn và cành lá xanh mướt, bó hoa này tạo nên một hình ảnh tươi mới và sống động, khiến mọi người không thể rời mắt.', 1200000, 2400000, 1, 'loaken5.jpg', 0, 0, 1, 1),
(21, 'Như Ý', 9, 'Bó hoa mẫu đơn là biểu tượng của sự đơn giản và thanh lịch. Với một đóa hoa mẫu đơn tinh tế và độc đáo, bó hoa này mang đến một vẻ đẹp tinh khiết và thuần khiết, tạo nên một sự ấn tượng đơn giản nhưng rất nổi bật.', 700000, 1450000, 1, 'maudon1.jpg', 0, 0, 1, 1),
(22, 'Thanh Anh', 9, 'Hoa mẫu đơn là biểu tượng của tình yêu và sự trân quý. Với cánh hoa duy nhất trên mỗi đóa, nó tượng trưng cho tình yêu chân thành và sự tôn trọng. Bó hoa mẫu đơn là món quà hoàn hảo để thể hiện lòng tri ân và tình cảm đối với người thân yêu, bạn bè hoặc người đặc biệt, mang đến một cảm giác ngọt ngào và đẹp đẽ.', 850000, 1600000, 1, 'maudon2.jpg', 0, 0, 1, 1),
(23, 'Yến Uyển', 9, 'Bó hoa mẫu đơn là sự thể hiện của sự độc lập và sự tự tin. Với vẻ đẹp đơn giản nhưng tinh tế, bó hoa này tạo nên một sự tinh khiết và thanh nhã, thu hút mọi ánh nhìn.', 1500000, 3200000, 1, 'maudon3.jpg', 0, 0, 1, 1),
(24, 'Lục quân', 9, 'Hoa mẫu đơn còn mang ý nghĩa về sự tinh tâm và sự trầm tĩnh. Mỗi đóa hoa đơn độc lập biểu trưng cho sự tự do và sự tự tin trong bản thân. Bó hoa mẫu đơn là một món quà tuyệt vời để tặng cho những người yêu thích vẻ đẹp tối giản và sự thanh lịch. Nó tạo nên một không gian yên bình và mang đến một thông điệp sâu lắng về sự đơn giản và sự tự do trong cuộc sống.', 920000, 2000000, 1, 'maudon4.jpg', 0, 0, 1, 1),
(25, 'Hi nguyệt', 9, 'Bó hoa mẫu đơn là biểu tượng của sự tinh tế và sự trường tồn. Với đẹp đơn giản và tinh khiết, nó mang đến một vẻ đẹp tối giản nhưng vẫn rất quyến rũ và thu hút.', 1200000, 2400000, 1, 'maudon5.jpg', 0, 0, 1, 1),
(26, 'Hòa âm', 4, 'Bó hoa cẩm tú cầu là một tuyệt phẩm hoa tươi tự nhiên, với những cánh hoa mềm mại và sắc màu tươi sáng, tạo nên một sự kết hợp độc đáo của sự thanh lịch và quyến rũ.\r\n\r\n', 700000, 1700000, 1, 'tucau1.jpg', 0, 0, 1, 1),
(27, 'Sắc hồng', 4, 'Với vẻ đẹp tinh tế và độc đáo, bó hoa này sẽ là món quà hoàn hảo để tặng người thân yêu hoặc đồng nghiệp trong các dịp đặc biệt.', 666000, 1700000, 1, 'tucau2.jpg', 0, 0, 1, 1),
(28, 'Thanh lam', 4, 'Với màu sắc tươi sáng và hương thơm dịu nhẹ, bó hoa cẩm tú cầu sẽ mang lại niềm vui và cảm xúc tươi mới cho người nhận. Đây là món quà hoàn hảo để thể hiện sự quan tâm và yêu thương đối với những người bạn yêu quý trong cuộc sống.\r\n\r\n', 850000, 1600000, 1, 'tucau3.jpeg', 0, 0, 1, 1),
(29, 'Hòa ca ', 4, 'Bó hoa cẩm tú cầu là sự kết hợp hoàn hảo giữa sự tinh tế và sự tráng lệ. Những cánh hoa cẩm tú cầu được sắp xếp cẩn thận, tạo nên một tác phẩm nghệ thuật tự nhiên, lôi cuốn mọi ánh nhìn.\r\n\r\n', 700000, 1700000, 1, 'tucau4.jpg', 0, 0, 1, 1),
(30, 'Linh lung', 4, 'Bó hoa cẩm tú cầu không chỉ là một món quà tuyệt vời để thể hiện tình cảm, mà còn là một biểu tượng của sự phong cách và sự sang trọng. ', 850000, 1600000, 1, 'tucau5.jpg', 0, 0, 1, 1),
(31, 'Hương thu', 5, 'Bó hoa cúc Tana là một lựa chọn tuyệt vời để mang đến sự tươi mới và vui tươi. Với những cánh hoa cúc nhỏ xinh và màu sắc tươi sáng, bó hoa này sẽ tạo nên một điểm nhấn đáng yêu và ngọt ngào cho không gian.', 600000, 1400000, 1, 'tana1.jpg', 1, 0, 1, 1),
(32, 'Thanh sắc', 5, 'Bó hoa cúc Tana mang ý nghĩa của sự tin yêu và niềm vui.', 850000, 1600000, 1, 'tana2.png', 0, 0, 1, 1),
(33, 'Hữu tình', 5, 'Với vẻ đẹp tự nhiên và dịu dàng, nó là món quà hoàn hảo để tặng cho bạn bè, người thân hoặc người yêu trong mọi dịp, từ sinh nhật đến kỷ niệm, mang đến những khoảnh khắc đáng nhớ và tràn đầy hạnh phúc.', 720000, 1450000, 1, 'tana3.jpeg', 6, 0, 1, 1),
(34, 'Ý thơ', 5, 'Bó hoa cúc Tana là sự hòa quyện giữa vẻ đẹp tinh khôi và sự sống động.', 850000, 1600000, 1, 'tana4.jpg', 1, 0, 1, 1),
(35, 'Hằng đề', 5, 'Mỗi cánh hoa cúc tượng trưng cho tình yêu và sự trân quý, khiến bó hoa trở thành biểu tượng của sự thân thiết và lòng tri ân.', 600000, 1450000, 1, 'tana5.jpg', 0, 0, 1, 1),
(36, 'Vạn lịch', 6, 'Bó hoa đồng tiền là một tác phẩm độc đáo, với những chiếc lá đồng tiền bạc bóng lấp lánh tạo nên một vẻ đẹp độc đáo và thu hút mọi ánh nhìn.', 500000, 1450000, 1, 'dongtien1.jpg', 0, 0, 1, 1),
(37, 'Thanh ý', 6, 'Bó hoa này tượng trưng cho sự thịnh vượng và may mắn, là món quà ý nghĩa để gửi đến người thân yêu.', 850000, 1600000, 1, 'dongtien2.jpg', 0, 0, 1, 1),
(38, 'Ý lang', 6, 'Bó hoa đồng tiền mang đến không chỉ vẻ đẹp mà còn ý nghĩa sâu sắc.', 720000, 1400000, 1, 'dongtien3.jpg', 0, 0, 1, 1),
(39, 'lục linh', 6, 'Nó là biểu tượng của sự giàu có và thành công, đồng thời mang đến lời chúc phát tài và phú quý. ', 850000, 1600000, 1, 'dongtien4.jpeg', 0, 0, 1, 1),
(40, 'Hồng hoa', 6, 'Với sự kết hợp tinh tế của lá đồng tiền và các loại hoa tươi, bó hoa đồng tiền sẽ là một món quà độc đáo và đáng nhớ trong các dịp quan trọng.\r\n\r\n', 500000, 1400000, 1, 'dongtien5.jpg', 0, 0, 1, 1),
(41, 'Ánh lam ', 7, 'Với những đóa hoa hướng dương lớn và nắng vàng, bó hoa hướng dương mang đến cảm giác mạnh mẽ và tràn đầy năng lượng tích cực. Đây là món quà hoàn hảo để tặng cho những người thân yêu, bạn bè hoặc đồng nghiệp, gửi đi thông điệp về sự vui vẻ và hy vọng.', 666000, 1450000, 1, 'sun1.jpg', 0, 0, 1, 1),
(42, 'Sương sớm', 7, 'Bó hoa hướng dương là sự kết hợp hoàn hảo giữa vẻ đẹp tự nhiên và ý nghĩa tinh thần. Hoa hướng dương biểu trưng cho sự lớn mạnh, sự tự tin và sự khao khát thành công. ', 850000, 1600000, 1, 'sun2.jpg', 0, 0, 1, 1),
(43, 'Bình minh', 7, 'Bó hoa này không chỉ làm tươi mới không gian mà còn truyền tải thông điệp về sự lạc quan và hy vọng trong cuộc sống.', 1500000, 3200000, 1, 'sun3.jpeg', 0, 0, 1, 1),
(44, 'Nắng mai', 7, 'Bó hoa hướng dương là một món quà tuyệt vời để thể hiện tình cảm và sự tri ân. Với những đóa hoa hướng dương lớn, vẻ đẹp rực rỡ và hương thơm dịu nhẹ, bó hoa này mang đến một cảm giác ấm áp và hạnh phúc.', 920000, 2000000, 1, 'sun4.jpg', 0, 0, 1, 1),
(45, 'Ban mai', 7, 'Hoa hướng dương còn biểu trưng cho sự lắng nghe và sự chân thành. Gương mặt của hoa luôn quay về phía mặt trời, thể hiện sự tôn trọng và lòng biết ơn đối với nguồn sáng và năng lượng mà mặt trời mang lại. Bó hoa hướng dương sẽ là một món quà ý nghĩa để gửi đi những lời chúc tốt đẹp và mang lại niềm vui cho người nhận.', 1200000, 2400000, 1, 'sun5.jpg', 0, 0, 1, 1),
(46, 'juliet', 10, 'Bó hoa tulip là sự kết hợp tuyệt vời giữa vẻ đẹp tinh tế và tươi mới. Với những đóa hoa tulip đa dạng về màu sắc và hình dáng, bó hoa này mang đến một cảm giác thanh lịch và đầy sự sắc màu.', 666000, 1400000, 1, 'tulip1.jpg', 0, 0, 1, 1),
(47, 'Ariel', 10, 'Hoa tulip biểu trưng cho tình yêu và sự hoàn hảo. Với vẻ đẹp đơn giản và tinh khiết, hoa tulip là biểu tượng của tình yêu chân thành và lòng biết ơn. Bó hoa tulip sẽ là món quà tuyệt vời để thể hiện tình cảm và gửi đi những lời chúc tốt đẹp trong các dịp đặc biệt.', 850000, 1600000, 1, 'tulip2.jpg', 0, 0, 1, 1),
(48, 'Calliope', 10, 'Bó hoa tulip là một biểu tượng của sự tươi mới và sự hy vọng. Với những đóa hoa tulip mềm mại và tươi sáng, bó hoa này tạo nên một không gian tràn đầy sự sống và niềm vui.', 1500000, 3200000, 1, 'tulip3.jpg', 0, 0, 1, 1),
(49, 'Melpomene', 10, 'Hoa tulip còn mang ý nghĩa về sự hoàn thiện và sự phát triển. Với những màu sắc đa dạng như đỏ, vàng, hồng và trắng, hoa tulip thể hiện sự đa dạng và tinh tế. Bó hoa tulip sẽ là món quà hoàn hảo để tặng cho người thân yêu, bạn bè hoặc đối tác kinh doanh, mang đến sự tươi mới và niềm vui trong cuộc sống.', 920000, 2000000, 1, 'tulip4.jpg', 0, 0, 1, 1),
(50, 'Terpsichore', 10, 'Hoa tulip biểu trưng cho tình yêu và sự mãnh liệt. Với những màu sắc phong phú như đỏ, vàng, hồng, trắng và nhiều màu khác, hoa tulip là biểu tượng của tình yêu và lòng trung thành. Bó hoa tulip sẽ là món quà hoàn hảo để thể hiện tình cảm và gửi đi những lời chúc tốt đẹp trong các dịp đặc biệt như Valentine, sinh nhật, hay kỷ niệm.', 1200000, 2400000, 1, 'tulip5.jpg', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `loai` int(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`, `diachi`) VALUES
(1, 'elkogarden@elko.com', '0763841190', '202cb962ac59075b964b07152d234b70', 'Elko Garden', 1, 1, 'admin.jpeg', '18 Ung Văn Khiêm, phường Đông Xuyên, TP Long Xuyên, An Giang.'),
(2, 'nhanvien1@elko.com', '0773669783', '202cb962ac59075b964b07152d234b70', 'Dương Thùy Linh', 2, 1, 'nhanvien1.jpeg', '27 Hà Hoàn Hổ, phường Đông Xuyên, TP Long Xuyên, An Giang'),
(3, 'nhanvien2@elko.com', '0328003077', '202cb962ac59075b964b07152d234b70', 'Lâm Huy', 2, 1, 'nhanvien2.jpeg', 'Chợ Mới, Long Xuyên, An Giang'),
(4, 'phungshop@gmail.com', '0345705630', '202cb962ac59075b964b07152d234b70', 'Lê Mỹ Phụng', 3, 1, 'khachhang1.jpeg', 'Seoul, Hàn Quốc'),
(5, 'lamhuy@gmail.com', '0123456789', '202cb962ac59075b964b07152d234b70', 'Lâm Huy', 3, 1, '', 'Chợ Mới, An Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `tenquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `tenquyen`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Customers');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuongtrinhkhuyenmai`
--
ALTER TABLE `chuongtrinhkhuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_dh` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hdct_dh` (`donhang_id`),
  ADD KEY `dhct_sp` (`sanpham_id`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanloai` (`danhmuc_id`),
  ADD KEY `khuyenmai_id` (`khuyenmai_id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanquyen` (`loai`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuongtrinhkhuyenmai`
--
ALTER TABLE `chuongtrinhkhuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nguoidung_dh` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `dhct_sp` FOREIGN KEY (`sanpham_id`) REFERENCES `mathang` (`id`),
  ADD CONSTRAINT `hdct_dh` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `fk_danhmuc_mathang` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `fk_khuyenmai_mathang` FOREIGN KEY (`khuyenmai_id`) REFERENCES `chuongtrinhkhuyenmai` (`id`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `phanquyen` FOREIGN KEY (`loai`) REFERENCES `quyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
