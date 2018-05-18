-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 09:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `permission` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `first_name`, `last_name`, `address`, `city`, `email`, `phone`, `permission`) VALUES
(1, 'ruanjiang', 'hot10000%', 'Hoàng Giang', 'Nguyễn', 'Đông Anh, Hà Nội', 'Hà Nội', 'nh.giang@gmail.com', '01658215007', 'Admin'),
(2, 'hoanggiang', '123456', 'Giang', 'Nguyễn', '', '', '', '', NULL),
(3, 'giang97', '123456', 'Giang', 'Nguyễn', 'Hà Nội', '', '', '', NULL),
(4, 'thien', '123456', 'Thien', 'Nguyen Tien', 'Ha Noi', 'Ha Noi', 'thienhd@gmail.com', '099999999999', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_image` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_describe` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `name`, `author_image`, `author_describe`) VALUES
(1, 'Anh Khang', 'images/1526034555-1525269816-37681.jpg', ''),
(2, 'Nguyễn Mon', '', ''),
(3, 'Trang Hạ', '', ''),
(4, 'Linh', '', ''),
(5, 'Phong Thiên', '', ''),
(6, 'Binh Ca', '', ''),
(7, 'Dương Linh', '', ''),
(8, 'Trần Văn Khê', '', ''),
(9, 'Windy', '', ''),
(10, 'Jeffery Deaver', '', ''),
(11, 'KBS', '', ''),
(12, 'Võ Anh Thơ', '', ''),
(13, 'Hồ Biểu Chánh', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_year` int(11) NOT NULL,
  `publisher` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `category_id`, `author_id`, `book_name`, `ISBN`, `language`, `publish_year`, `publisher`, `abstract`, `price`, `picture`, `rating`, `quantity`) VALUES
(1, 1, 3, 'Giang Hồ Chỉ Vừa Đủ Xài', '', 'Tiếng Việt', 0, 'NXB Trẻ, ADC', 'Giang Hồ Chỉ Vừa Đủ Xài là tập tản văn mới nhất của Trang Hạ vừa xuất bản. Vẫn bằng một tư duy mới mẻ, góc nhìn độc đáo và tràn đầy cảm xúc, tản văn Trang Hạ tiếp tục truyền cảm hứng sống mãnh liệt cho những người phụ nữ để họ chủ động sống và chủ động hạnh phúc!\r\n\r\nKhông ít các thông điệp truyền cảm hứng được Trang Hạ gửi gắm trong cuốn sách mới này. Đó có thể là một cái nhìn đầy lạc quan và nhân ái đối với người khác: “Bạn ơi, trong đời này bạn sẽ gặp rất nhiều người, có thể họ xấu xí và thấp kém. Nhưng hãy tin rằng, bản chất của họ tử tế là chủ yếu, giang hồ chỉ vừa đủ xài!”.\r\n\r\nNhưng đặc biệt hơn cả là rất nhiều thông điệp trí tuệ, mở ra cho người đọc một cách nhìn mới lạ để khám phá chính bản thân mình, để thêm mạnh mẽ và sống một cuộc đời mới tự tin, tự chủ, hạnh phúc.\r\n\r\n…“Bạn ơi, cái gì cũng có cái giá của nó cả! Tại sao ta phải bận tâm tới những người không mấy giá trị trong mắt ta?\r\n\r\nTại sao ta phải thay đổi giá trị quan đời mình chỉ vì những kẻ vô liêm sỉ hoặc thiếu tự trọng nào đó?\r\n\r\nCứ sống tiếp tục, cứ đi con đường đã dẫn chúng ta tới vị trí hiện tại, cứ nuốt những lời cay đắng vào trong lòng và mỉm cười với thế giới này.\r\n\r\nTa là ai, ta tự biết”.\r\n\r\n“Mình là người duy nhất làm nên cổ tích cho đời mình, nếu còn tin cổ tích là có thật! Những phép lạ chẳng ai mang tới, chỉ chính ta là chủ nhân của chính những gì ta lựa chọn!\r\n\r\nNên, nếu bạn ngồi khóc đêm nay trước màn hình. Hãy tin rằng, Bụt chẳng nghe thấy. Bụt chẳng đến với bạn đâu!\r\n\r\nBạn phải tự viết câu chuyện cổ tích cho đời mình!”\r\n\r\n...\r\n\r\nBạn có đang cần tiếp thêm cảm hứng để không lạc bước trên con đường đi tới, để không mệt mỏi, để không thôi ước mơ, khao khát và quan trọng hơn để dấn thân sống và yêu hết mình? Vậy, còn chần chừ gì nữa, cuốn sách này viết ra là để tặng cho bạn!', 62400, 'images/1525355022-giang-ho-chi-vua-du-xai.450x652.w.b.jpg', 0, 50),
(2, 1, 3, 'Đàn Bà 30', '', 'Tiếng Việt', 0, 'NXB Phụ Nữ', 'MỘT NỬA TÌNH YÊU LÀ TÌNH DỤC\r\n\r\nCó người bạn trên mạng trước giờ giấu mặt đã hỏi tôi rằng, vì sao cô ấy đã lấy người đàn ông này để thay thế cho người đàn ông khác, mà vẫn không làm sao quên được quá khứ?\r\n\r\nTôi không biết cô ấy trẻ hay già, tôi không biết người phụ nữ ngồi trước màn hình máy tính kể về người tình một đêm vừa rời đi sớm nay nhan sắc đẹp tươi hay tầm thường. Nhưng tôi biết, cô ấy chưa lấy chồng. Nên mới có thể, hôm qua nói chia tay, hôm nay lôi lên giường người đàn ông mới. Và tôi đoán, nỗi đau đớn trong trái tim cô quá lớn, đến mức cô sẵn sàng tìm những cách bạo liệt nhất để mong lấy lại thăng bằng cho cuộc đời mình.\r\n\r\nTôi nghĩ rằng, những người đàn ông tình một đêm thật đáng ái ngại, khi họ chỉ là mảnh băng Urgo dán lên vết thương trong tim người đàn bà mà thôi. Hoặc, kể cả người đàn bà không có vết thương trong tâm hồn, không cần đàn ông làm thuốc chữa cô đơn, thì tình một đêm cũng chỉ đơn giản là kiếm một người đàn ông để lấp đầy khoảng trống giữa đôi chân mình.\r\n\r\nTôi từng đọc comment của một cư dân mạng rằng, đàn ông khác gì củ hành tây, chỉ giỏi làm đàn bà chảy nước mắt! Tôi thì nghĩ khác, thực ra đàn bà chúng ta mới là củ hành tây. Khi còn trẻ, chúng ta khoác lên mình rõ lắm thứ!\r\n\r\nThứ đầu tiên là trinh tiết. Sau khi bị lột lớp vỏ trinh tiết ra, cuộc sống tình dục của người phụ nữ trẻ mới thực sự bắt đầu. Nhưng sau trinh tiết là tình yêu. Chúng ta thèm tình yêu đến phát điên, dù chúng ta còn trinh hay đã mất trinh với ai, yêu nhiều lần hay chưa yêu bao giờ, vẫn phải có tình yêu mới lên giường được!\r\n\r\nThế nhưng, bạn còn nhớ chăng, lần đầu tiên bạn cãi cọ người yêu, lần đầu tiên bạn chiến tranh lạnh với ông chồng, lần đầu tiên chúng ta nghiêm túc đặt ra tình huống: Chia tay đi! Và bạn còn nhớ cuộc yêu đương làm lành sau đó, với người mình đang còn hờn giận, với ông chồng mình đầy rẫy tội lỗi khó tha thứ, với anh người yêu đầy khiếm khuyết mà mình biết không sớm thì muộn, mình sẽ yêu chàng trai khác tốt đẹp hơn? Tình yêu đã phai nhạt đi nhưng chúng ta vẫn tiếp tục làm tình với nhau. Đúng không?\r\n\r\nChúng ta vẫn lên giường, như một thói quen, bỏ qua những trò chơi tình yêu đầy mê đắm của thời mới yêu, bỏ qua những dè chừng có thai và hẹn cưới, bỏ qua cả những lời hứa hẹn sẽ thay đổi, sẽ yêu nhiều hơn, sẽ là một tương lai rực rỡ và hạnh phúc. Chúng ta chỉ cần tình cảm đủ dùng, an toàn vừa đủ, quan hệ đủ sâu, để lên giường cùng nhau! Vào lúc đó, hình như ta vừa tự lột lớp vỏ hành tây mang tên gọi tình yêu, khi tình yêu không còn là yếu tố duy nhất và quan trọng nhất của tình dục nữa.\r\n\r\nKhông đúng sao? Bạn đã mất bao nhiêu thời gian để từ một cô gái khăng khăng giữ trinh trở thành một cô gái chỉ cần mọi thứ “tạm đủ an tâm” là đồng ý làm tình? Hành trình đó nếu nhìn bề ngoài như thể một sự trượt dài của những giới hạn và điều kiện, ta có vẻ dễ dãi đi, ta có vẻ rẻ rúng thân xác đi. Nhưng không phải, ở nội tâm, chỉ là củ hành tây đã tự lột dần những lớp vỏ ngoài.\r\n\r\nRồi ta thực sự chia tay quá khứ. Đó là lúc, chúng ta thất vọng vì bị phản bội, vì bị chồng bỏ hoặc tự bỏ chồng, hoặc ta đã chịu đựng đủ mọi dày vò của một người đàn ông và nghĩ rằng, tại sao không học lấy cách tự yêu lấy bản thân mình, bằng cách, đừng cặp đôi với người đàn ông nào đòi hỏi ta quá nhiều?\r\n\r\nÀ há, người đàn ông tình một đêm hình như đâu có đòi hỏi gì bạn tình những thứ như chung thủy, hiền thục, gia thế, chăm sóc, tâm hồn cao thượng, đảm đang và khéo vun vén v.v… như một anh bồ chính hiệu? Hình như, chúng ta chỉ quan tâm đến những thứ làm nên tình dục, từ phía nhau!\r\n\r\nVà ta bóc đi của nhau lớp áo quần, những danh tiếng bề nổi, những sứ mệnh đạo đức, những mối quan hệ xã hội phiền phức. Để đi thẳng tới cốt lõi của một mối quan hệ đàn ông với đàn bà là tình dục.\r\n\r\nChào bạn, người đàn bà đã bóc tới lớp vỏ cuối cùng của mình, bạn có tìm thấy cái bạn cần không? Hay phát hiện ra nếu bóc mãi, ta sẽ chẳng còn gì, mà cũng chẳng hề tìm thấy gì?\r\n\r\nVà quan trọng nhất là điều này: Bởi vì bạn là hành tây, nên hành trình cởi bỏ những giá trị và khao khát đời mình, ta sẽ vừa cởi vừa khóc!', 63200, 'images/1525355206-dan-ba-30.450x652.w.b.jpg', 0, 50),
(3, 1, 3, 'Tình Nhân Không Bao Giờ Đòi Cưới', '', 'Tiếng Việt', 0, 'NXB Phụ Nữ', 'Tình Nhân Không Bao Giờ Đòi Cưới là cuốn sách mới nhất của Trang Hạ về tình yêu và sự chờ đợi tình yêu trong vô vọng. Trong cô đơn, chúng ta vẫn không ngừng bị giày vò bởi những khao khát tìm kiếm và mong ước mình được thuộc về một ai đó. Sự diễm lệ của nỗi đau cũng là khởi đầu của những hành trình tràn đầy thi vị yêu đương của tuổi đôi mươi, hoặc chát đắng mối tình đến sau...\r\n\r\n\r\n\r\nNhững bài viết của nhà văn Trang Hạ là những lời thủ thỉ, tâm tình đối với những người trẻ và những người không còn trẻ. Rằng bạn hạnh phúc vì bạn dám tự quyết định cuộc đời mình; Rằng vì ta chẳng thay đổi được cuộc sống này, nhưng ta có thể thay đổi cách sống và cách nhìn nhận; Rằng vì yêu nên thấy có nhau trong đời là đủ... Và những dòng sẻ chia trang cuối chắc sẽ làm tim bạn đập chậm lại:\r\n\r\n\r\n\r\n“...Hãy để quá khứ của bạn thản nhiên đi qua ngã tư đường. Bạn chờ đèn đỏ đã đủ lâu rồi, giờ là lúc bạn đi tiếp con đường phía trước. Rồi tìm cho mình một chàng trai tốt, một chàng trai không buông tay bạn ra vì bất cứ lý do gì...”\r\n\r\n\r\n\r\nNếu bạn đã từng yêu mến Trang Hạ từ cuốn sách “Đàn bà ba mươi”, từ vở kịch đầu tay của cô “Xin lỗi, em chỉ là (con đĩ)” được công diễn tại Sài Gòn năm 2010, hẳn sẽ tiếp tục yêu những dòng văn viết ra từ những gì sâu thẳm nhất trong trái tim một người đàn bà đích thực:\r\n\r\n\r\n\r\n“Chúng ta là những tình nhân trọn đời không bao giờ đợi cưới! Nên đã từng là tình nhân, sau này, cứ coi nhau như một nửa bạn bè một nửa người thân, hoặc hơn một người bạn thân!\r\n\r\n \r\n\r\nĐể chút tình còn lại dành cho người yêu đang tới. Vì người con gái luôn yêu như đây là mối tình đầu. Còn người con trai luôn yêu như đây là mối tình cuối cùng trong đời.\r\n\r\n\r\n\r\nCho nên, bằng cách này hay cách khác, rồi chúng ta cũng sẽ hạnh phúc.\r\n\r\n\r\n\r\nChỉ là, rồi chúng ta sẽ vắng mặt trong hạnh phúc của nhau.”\r\n\r\n\r\n\r\nTình Nhân Không Bao Giờ Đòi Cưới - cuốn sách sẽ làm bạn trở nên mạnh mẽ, yêu bản thân và biết dành những gì tốt đẹp nhất của bạn cho những người xứng đáng!', 52800, 'images/1525355290-tinh-nhan-khong-bao-gio-doi-cuoi.800x800.w.b.jpg', 0, 50),
(4, 1, 3, 'Món Quà Đến Sau Những Cơn Mưa', '', 'Tiếng Việt', 0, 'NXB Trẻ', '', 70400, 'images/1525355404-mon_qua_den_sau_nhung_con_mua.762x1165.w.b.jpg', 0, 50),
(5, 1, 3, 'Xin Lỗi Em Chỉ Là Con Đĩ (Tái bản)', '', 'Tiếng Việt', 0, 'NXB Văn Học, Bách Việt', 'Đây không phải tiểu thuyết dâm loạn. Xin Lỗi Em Chỉ Là Con Đĩ là một câu chuyện xúc động lòng người sâu sắc. Cuốn sách nói về cái đẹp, và bày tỏ về nỗi đau, của Hạ Âu - một cô gái mang tiếng là đĩ, và người bạn trai Hà Niệm Bân.\r\n\r\n\r\n\r\nLần đầu đăng tải trên mạng của Trung Quốc, truyện nhanh chóng được hàng chục triệu độc giả người Hoa bình chọn là tác phẩm kinh điển mới của dòng văn học mạng, một thành công của thế hệ người viết 8X. Bản dịch này theo đúng nguyên tác, ngắn gọn và chân thực so với bản sửa chữa trong lần in đầu của truyện năm 2005.\r\n\r\n\r\n\r\nSau khi được xuất bản ở Trung Quốc và Hồng Kông, tác phẩm trở thành đại diện tiêu biểu cho những sáng tác xuất bản “ngược”, đăng trên mạng rồi mới in thành sách, và người mua sách là những người đã đọc đến thuộc lòng truyện free trên mạng, điều này đi ngược lại toàn bộ quy trình bước xuất bản sách truyền thống và đánh dấu một thành công của các cây bút vô danh.', 36000, 'images/1525355484-xin_loi_em_chi_la_con_di_tb.800x1372.w.b.jpg', 0, 50),
(6, 1, 4, 'Ràng Buộc Ẩn', '', 'Tiếng Việt', 0, 'NXB Văn Hóa - Văn Nghệ, Phương Nam Book', 'Ràng Buộc Ẩn (Invisible Ties) là cuốn tiểu thuyết kể về mối quan hệ kỳ lạ giữa người chồng, một nhân vật giàu có và có tầm ảnh hưởng trong giới tài chính, cùng người vợ, bệnh nhân vừa hồi tỉnh sau bảy năm hôn mê sâu.\r\n\r\n\r\n\r\n\r\nNếu như địa vị và khối tài sản khổng lồ của chàng khiến nàng choáng ngợp, sự yêu chiều và chu đáo mà chàng thể hiện khiến nàng thổn thức, đánh tan mọi ngờ vực ban đầu nàng dành cho người đàn ông xa lạ tự nhận là chồng mình, dần đắm chìm vào men say của tình ái, thì sau đó, khi sự thật được phơi bày, những bí mật được hé lộ, nàng mới thực sự hiểu ra rằng không phải trí nhớ của mình trống rỗng mà là vùng ký ức về tình yêu chàng đã vẽ ra hoàn toàn chưa từng tồn tại, tất cả chỉ là một phần của âm mưu đen tối. Những “ràng buộc ẩn” giữa họ giờ mới bắt đầu…\r\n\r\n\r\n\r\n\r\nTuy là một cuốn tiểu thuyết thuộc dòng tâm lý xã hội, tình cảm lãng mạn, nhưng Ràng Buộc Ẩn chứa đựng đủ các yếu tố bí ẩn, giật gân và hành động, chắc chắn sẽ khiến độc giả không thể dừng lại cho đến trang cuối cùng.', 84000, 'images/1525355815-rang-buoc-an.450x652.w.b.jpg', 0, 50),
(7, 1, 4, 'Bình Yên Nằm Xa Lắc Đâu Đó Giữa Địa Cầu', '', 'Tiếng Việt', 0, 'NXB Văn Học, AZ Việt Nam', 'Bình yên nằm xa lắc đâu đó giữa địa cầu nên người ta đi mãi mà vẫn lạc mất nhau\r\n\r\nNhững năm tháng ấy, tôi đã dành trọn thanh xuân để yêu một người... Nhưng thời gian vô tâm chẳng giữ nổi sợi duyên đó. Để rồi tôi mới nhận ra, cuộc đời này, có mấy ai gặp nhau mà ở lại cùng nhau đến cuối cuộc đời? Phải mất lâu thật lâu, đi qua biết bao con người, đi qua biết bao yêu thương, mới có thể chạm tay đến Bình yên?\r\n\r\nTôi không muốn gán cho Bình yên điều gì quá to tát. Chỉ đơn giản như sau một chuyến đi xa, quay về, vẫn còn đó một bờ vai chờ đợi, một vòng tay gọi mời, để thấy mình bé nhỏ như một con mèo cuộn tròn trong chăn ấm ngày đông, mặc kệ ngoài kia cuộc đời bao la giông gió.\r\n\r\nNhững điều nho nhỏ trong cuốn sách này, như một cuốn phim quay chậm. Có tổn thương đó, có hy vọng đó, có cả những dằn vặt nhớ và quên đó. Mong rằng, mỗi chúng ta, dù có đi qua bao nhiêu cuộc tình, mất mát bao nhiêu bóng hình, đến sau cùng, vào một ngày nào đó, vẫn nghe tiếng thì thầm khe khẽ gọi của Bình yên...\r\n\r\nĐi qua những vấp váp tổn thương của cuộc đời, chẳng phải điều chúng ta cần vốn chỉ gói gọn trong hai chữ Bình yên thôi sao?\r\n\r\n\"Bình yên là gì anh nhỉ?\r\nChắc là hạnh phúc với nhau\r\nCùng yêu và cùng suy nghĩ\r\nLàm sao sống đến bạc đầu...\"', 64000, 'images/1525355899-binh-yen-nam-xa-lac-dau-do-giua-dia-cau.450x652.w.b.jpg', 0, 50),
(8, 1, 4, 'Những Nỗi Buồn Không Tên', '', 'Tiếng Việt', 0, 'NXB Văn Học, AZ Việt Nam', 'Những Nỗi Buồn Không Tên\r\n\r\n“Mấy đứa tụi mình sao có lắm nỗi buồn\r\nChẳng buông được nên ngây ngô giữ mãi\r\nDẫu vẫn biết buồn nhiều là khở dại\r\nNhưng cứ buồn hoài, chẳng biết phải làm sao…”\r\n\r\nNgười ta vốn dĩ vẫn muốn giấu giếm nỗi buồn của mình trong lòng, chẳng muốn để người khác nhìn thấy được. Nhưng tiếc rằng, nỗi buồn không phải thứ có thể dễ dàng cất giấu.\r\n\r\nNhững năm tháng thanh xuân, hẳn là chúng ta ít nhiều trong đời đều phải tự mình đi qua những nỗi buồn cứng đầu, những nỗi buồn không tên không tuổi… để rồi sau đó nhìn lại, nhẹ nhàng mỉm cười vì cuối cùng dù buồn hay vui, thì mình vẫn đã lớn lên, đã tự tay vẽ và chấp nhận những gam màu sáng tối của thanh xuân đó.\r\n\r\nNhững Nỗi Buồn Không Tên giống như chiếc hộp biết thủ thỉ kể về nỗi buồn, không phải của riêng ai. Những nỗi buồn không cô đơn, những nỗi buồn khiến cho người ta cảm thấy ủi an vì ít ra cũng từng có một người buồn như mình vậy. Cuốn sách không dạy bạn cách bơi qua nỗi buồn, mà sẽ cho bạn cảm nhận rằng luôn có những bàn tay cùng nắm tay bạn đi qua những nỗi buồn trong đời.\r\n\r\nMình nắm tay nhau nhé\r\nCùng đi hết nỗi buồn\r\nNỗi buồn đẹp như vẽ\r\nRồi đến lúc phải buông…', 60000, 'images/1525355972-nhung-noi-buon-khong-ten.450x652.w.b.jpg', 0, 50),
(9, 1, 5, 'Trước Sau Vẫn Là Em', '', 'Tiếng Việt', 0, 'NXB Văn Học, Bắc Hà Books', 'Trước Sau Vẫn Là Em\r\n\r\nĐôi mắt cậu bỗng trở nên mờ nhạt, hình bóng cô nàng càng lúc càng giống ảo ảnh. Muốn giơ tay nắm chặt lấy, hóa ra chỉ là một khoảng trống không. Giờ đây, cậu chỉ muốn mình biến mất ngay lập tức để không phải chịu nỗi đau này thêm nữa. Thì ra, chỉ có cậu là kẻ si tình ngu ngốc, không biết nắm cơ hội, để đến khi cô bước đi thật xa rồi cũng không đủ khả năng giữ chặt cô lại nữa. Cứ ngỡ cô ngốc nghếch, chỉ cần cậu cố gắng một chút sẽ giữ được cô mãi mãi, nhưng hóa ra cậu mới chính là kẻ khờ khạo. Cậu gượng cười, tự nhủ trong lòng: \"Không sao... không sao đâu... vì người tôi yêu trước sau vẫn là em!\"\r\n\r\nDòng người vẫn điên đảo lướt qua, còn cậu vẫn đứng như trời trồng giữa con phố đông nghẹt người, khuôn mặt đờ đẫn tội nghiệp.\r\n\r\nCó lẽ chúng ta không duyên... cũng không phận.', 63200, 'images/1525356094-truoc-sau-van-la-em.450x652.w.b.jpg', 0, 50),
(10, 1, 6, 'Quân Khu Nam Đồng', '', 'Tiếng Việt', 0, 'NXB Trẻ', 'Quân Khu Nam Đồng\r\n\r\nKhu tập thể Nam Đồng là khu gia binh lớn nhất thủ đô Hà Nội, được hình thành cách đây hơn 50 năm. Là nơi ở của hơn 500 gia đình cán bộ quân đội trung, cao cấp, hơn 70 vị tướng đã từng sinh sống và trưởng thành từ Khu tập thể Nam Đồng, nhiều gia đình có cả hai thế hệ “tướng cha” và “tướng con”. Đây là một khu gia binh điển hình, một đại gia đình quân nhân thu nhỏ thời chiến và hậu chiến.\r\n\r\nQuân Khu Nam Đồng là tiểu thuyết được viết bằng bút pháp hiện thực bởi một cây bút lần đầu tiên xuất hiện trên văn đàn, và cũng là một người con của khu tập thể Nam Đồng. Tác giả vừa là nhân chứng, vừa là nhân vật trực tiếp tham gia vào các sự kiện; lại cũng là người quan sát tỉnh táo có độ lùi thời gian để rút ra những chiêm nghiệm và thông điệp sâu sắc về một giai đoạn lịch sử đặc biệt của đất nước chúng ta.\r\n\r\nMột cuốn sách lôi cuốn, ly kỳ, hấp dẫn, khiến ta khó rời mắt trước khi lật đến trang cuối cùng...Một cuốn sách sẽ mang tới rất nhiều tiếng cười và lấy đi của chúng ta rất nhiều nước mắt...', 88000, 'images/1525356329-quan-khu-nam-dong.450x652.w.b.jpg', 0, 50),
(11, 1, 7, 'Góc Khuất', '', 'Tiếng Việt', 2017, 'NXB Tổng Hợp TP.HCM', 'Đã ba năm nay, dầu bị đột quỵ phải chịu tê nhức gần như toàn thân khiến sự tự động xê dịch là một chướng ngại quá lớn, song với trách nhiệm của một ngòi bút luôn gắn liền sức sáng tạo với sự bảo vệ, nâng cao đời sống xã hội, nhà văn Dương Linh bằng những nỗ lực vượt qua chính mình đã hoàn thành hai tác phẩm - hai tiểu thuyết về đề tài lịch sử - năm ngoái ông đã ấn hành Nguyễn Trung Trực - Khúc ca bi tráng và năm nay là Góc Khuất.\r\n\r\n\r\nGóc Khuất thể hiện một số biến chuyển lịch sử có thật trong những ngày gần kết thúc cuộc chiến khốc liệt, kéo dài đã ba mươi năm, lúc các quân đoàn cách mạng thần tốc tiến về Sài Gòn và sự vận động tinh tế, kịp thời của các nhà tình báo ta hoạt động bí mật ở nội thành để Dương Văn Minh - người cầm đầu chế độ Sài Gòn - chấp nhận đầu hàng vô điều kiện, hầu tránh cho thành phố này khỏi bị thương vong cùng sự tan nát, dập vùi của những đạn bom trong một kết thúc máu lửa.\r\n\r\n\r\nTrong giai đoạn có thể vô cùng quyết liệt khi gần kết thúc cuộc chiến, sự kiện ông Dương Văn Minh chấp nhận đầu hàng vô điều kiện một cách êm xuôi không phải là điều có thể dễ dàng thực hiện. Nhiều người hẳn\r\n\r\n\r\nkhông nhìn thấy được sự phi thường trong các sự kiện mà họ tưởng như là rất bình thường.\r\n\r\n\r\nSự đầu hàng mau chóng và êm xuôi ấy là cái dấu ấn của lòng yêu nước được khuấy động lên, được cô đọng lại qua bao nhiêu cuộc biến thiên, bao nhiêu là nỗi thăng trầm. Và trong Góc Khuất lộ hiện nhẹ nhàng bản lĩnh và trí tuệ của những con người tình báo Việt Nam đã luôn hoạt động lặng lẽ với lòng yêu nước sâu xa và với nhiệt tình cách mạng nồng cháy, đã bằng mọi giá góp phần xứng đáng vào sự nghiệp giành lại độc lập tự do cho dân tộc mình và bảo vệ sự vững bền của chế độ.\r\n\r\n\r\nGóc Khuất cho ta nhìn thấy rõ hơn một sự kiện của lịch sử dân tộc, và qua Góc Khuất chúng ta được gặp lại một cách sinh động diễn biến mau lẹ từ một chiến dịch thần tốc: Chiến dịch Hồ Chí Minh lịch sử.\r\n\r\n\r\nNếu cảm nhận được tác giả đã phải đầu tư tâm sức thế nào để hoàn thành tác phẩm, chúng ta càng thấy rõ hơn sức nặng từ những trang bút mực này. Gần nửa cuộc đời dành cho quân đội (chủ yếu ở ngành Tình báo thời chống Pháp với bí danh Vũ Hoài Linh), và gần nửa cuộc đời dành cho bút mực, người chiến sĩ ấy ở cả hai mặt trận này không bao giờ quên những trang lịch sử hào hùng của dân tộc mình trong thời đại Hồ Chí Minh - thời đại vẻ vang nhất trong lịch sử hàng ngàn năm dựng nước và giữ nước của dân tộc Việt Nam.', 40000, 'images/1525356281-goc-khuat.450x652.w.b.jpg', 0, 50),
(12, 1, 1, 'Đi Đâu Cũng Nhớ Sài Gòn Và... Em', '', 'Tiếng Việt', 0, 'NXB Văn Hóa - Văn Nghệ, Phương Nam Book', '“ĐI ĐÂU CŨNG NHỚ SÀI GÒN VÀ … EM”\r\n\r\n\r\n\r\n\r\nKhi bạn cầm trên tay cuốn sách này nghĩa là bạn đã có ba trong một. Sự nhẹ nhàng của thể loại tản văn và tùy bút trong \"Tim mỗi người là quê nhà nhỏ\", những trang du kí đậm chất bụi đường và đầy những điều mới mẻ của \"Ai qua bao chốn xa\". Cùng với một Anh Khang xưa cũ nhẹ nhàng góp nhặt từng con chữ, nói hộ tâm tình khi dừng chân bên \"Thấy vui đâu cho bằng mái nhà\".\r\n\r\n\r\nVà bạn nghĩ sao khi vừa được đọc sách hay lại được tặng quà xinh. Những món quà đặc biệt và rất đỗi thân thương chỉ có duy nhất khi mua sách tại nhasachphuongnam.com!\r\n\r\n\r\nDù ở nơi đâu bạn cũng sẽ được nhận sách tận tay vào đúng ngày phát hành 10/5/2015.\r\n\r\n\r\nTất nhiên không thể thiếu chữ ký của tác giả Anh Khang.\r\n\r\n\r\nVà còn Postcard xinh xắn do chính họa sĩ Tamypu vẽ độc quyền cho bạn. Kèm theo móc khóa in hình bìa sách để có thể đem \"Đi đâu cũng nhớ Sài Gòn và... Em\" rong ruổi khắp mọi nơi (nhanh tay nhé vì móc khóa xinh đẹp chỉ dành cho những bạn đặt sách đến ngày 10/5/2015)\r\n\r\n\r\nVà nếu trót thương các vật phẩm lưu niệm như áo thun, ly sứ, móc khoá, sổ tay... quá sức dễ thương của \"Đi đâu cũng nhớ Sài Gòn và... Em\" thì đừng ngại ngần gì nhé, bởi PNO sẽ giảm giá đến 25% cho những khách hàng mua sách kèm theo một trong các combo Văn Hoá Phẩm của sách như (Ly, Áo, Móc Khoá).\r\n\r\n\r\nQuá nhiều \"món hời\" phải không nào! Chỉ có duy nhất tại nhasachphuongnam.com!\r\n\r\n\r\n\r\n\r\nAnh Khang ví đứa con thứ tư của mình là cuốn sách cuốn sách tựu trung đầy đủ mọi cung bậc cảm xúc đã từng xuất hiện trong BUỒN LÀM SAO BUÔNG, ĐƯỜNG HAI NGẢ NGƯỜI THƯƠNG THÀNH LẠ, NGÀY TRÔI VỀ PHÍA CŨ.\r\n\r\n\r\nNhưng bản thân độc giả có thể dễ dàng cảm nhận một Anh Khang rất khác trong hai phần đầu tiên của cuốn sách. Bởi Anh Khang đã thực sự làm mới mình. Bỏ qua mọi danh hiệu hào nhoáng mang tên Nhà văn Bestseller, bỏ qua những điều mà Buồn làm sao buông, Đường hai ngả người thương thành lạ, Ngày trôi về phía cũ đã làm được. Bản thân \"Đi đâu cũng nhớ Sài Gòn và ... Em\" khi đứng độc lập đã có thể làm nên một cú hích dữ dội\r\n\r\n\r\nPhần đầu cuốn sách mang tên \"Tim mỗi người là quê nhà nhỏ\". Đó là tất cả hoài niệm về Sài Gòn xưa, về gia đình, về nơi chốn neo lòng và về những người từng khiến thanh xuân của mình xao động. Đó cũng có thể là tâm sự của bất kì đứa con nào cho quê hương đẹp đẽ tuyệt vời nay dần thay lớp áo mới. Những dòng cảm thức, những chi tiết miêu tả rất gợi của một Anh Khang rất khác. Mà như nhà văn Đoàn Thạch Biền đã ví von \"Đã có nhiều tác giả viết về Sài Gòn nhưng Anh Khang viết cuốn tùy bút - du ký \"Đi đâu cũng nhớ Sài Gòn và... Em\" với góc nhìn khác. Nhìn từ bên trong vì đây là chốn quê nhà nơi mình sinh ra và nhìn từ bên ngoài bằng những chuyến đi xa. Để rồi nhận ra: \"Đi là để được tái sinh thêm một cuộc đời khác... Và đi, còn là để biết nơi đâu thật sự là chốn mình luôn mong trở về.”\r\n\r\n\r\nBạn đọc thân quen của Anh Khang hẳn đều biết, anh đã bỏ rất nhiều thời gian cho những chuyến rong ruổi từ Đông sang Tây, từ Á sang Âu để tìm cảm hứng viết nên “đứa con tinh thần” thứ tư. Và anh đã thu được những thành quả hoàn toàn xứng đáng cho sự đầu tư nghiêm túc của mình.\r\n\r\n\r\nVới phần 2 \"Ai qua bao chốn xa\" - những trang viết du ký về những thành phố, vùng đất mình đã đi qua, khi mà đường chung đã rẽ về hai ngả và \"người thương thành lạ\". Bạn hãy chuẩn bị trên tay chiếc di động, để có thể dễ dàng \"Google\" những vùng đất, những địa danh, những thức quà mà Anh Khang kể. Bởi chắc chắn chẳng ai có thể cầm lòng được trước những lời văn đầy cuốn hút được viết từ \"khoảng trời rất khác từ Cựu lục địa ở trời Âu cho đến các vùng cát nóng ở Trung Đông\".\r\n\r\n\r\nVà tất nhiên không thể thiếu những điều đậm chất Anh Khang, \"đi để rồi nhận ra những câu chuyện nhân sinh tứ xứ chỉ càng làm mình hiểu ra một điều. Rằng ngọn ngành đích đáng của mỗi chuyến đi, vốn chỉ là để biết có ai nhớ mình... \"\r\n\r\n\r\nPhần 3 mang tên \"Thấy vui đâu cho bằng mái nhà\" là phần khép lại cho nỗi nhớ \"Sài Gòn và Em\". \"Bởi lẽ, hạnh phúc của mọi cuộc hành trình rốt cục không nằm ở đoạn đường đã đi, mà chính ở khi quay về. Thấy vẫn có một bóng hình đứng chờ lặng lẽ, những kỷ niệm be bé ban sơ vẫn mỉm cười đón mình trở lại. Rưng rưng nhận ra, những thân thương xưa cũ hình như vẫn chưa một lần bội bạc. Dẫu mình đã khác lắm sau ngần ấy tháng năm.\"\r\n\r\n\r\nVà \"Hóa ra, tất cả chúng ta, có đi nhiều nơi, mê mải đủ chốn thì nơi muốn đến nhất vào cuối đời, vẫn là trong-lòng-nhau\". Đi là để yêu hơn những điều đã cũ...\r\n\r\n\r\nCó thể thấy, dù đây là một tác phẩm đánh dấu sự trưởng thành lẫn đột phá rất nhiều về phong cách, đề tài, thể loại… nhưng Đi Đâu Cũng Nhớ Sài Gòn Và... Em vẫn không làm mất đi “chất” riêng trong văn phong của Anh Khang – chàng tác giả của những nỗi niềm xưa cũ.\r\n\r\n\r\nAi mà không có một người thương và có một nơi chốn để trở về! Với một cuốn sách đặc biệt như thế này PNO xin tặng bạn một vài tip nho nhỏ để cảm nhận trọn vẹn \"Đi đâu cũng nhớ Sài Gòn Và... Em\"\r\n\r\n\r\n- Giữ cho đầu óc thật nhẹ nhàng để trở về với những miền ký ức của tuổi thơ.\r\n\r\n\r\n- Chuẩn bị sẵn điện thoại để Google những vùng đất mới, những thức quà trên mọi miền rong ruổi.\r\n\r\n\r\n- Sẵn sàng vali vì đôi chân sẽ muốn xuyên biên giới mà đến ngay những vùng đất nên thơ tác giả kể.\r\n\r\n\r\n- Chuẩn bị tinh thần vì biết đâu sẽ nhớ về người thương cũ.\r\n\r\n\r\n- Đừng quên em xe để vi vu một vòng quanh Sài Gòn thân yêu, hay về với miền quê mà bấy lâu nay lạc mất giữa bao bộn bề.', 62400, 'images/1525423425-di-dau-cung-nho-sai-gon-va-em-2017.450x652.w.b.jpg', 0, 50),
(14, 1, 8, 'Hồi Ký Trần Văn Khê - Bộ Đặc Biệt (Gồm: Trọn bộ 2 tập sách + Audiobook + DVD Trần Văn Khê - Người truyền lửa)', '', 'Tiếng Việt', 0, 'NXB Thời Đại, Phương Nam Book', 'Trong suốt cuộc đời cống hiến không mệt mỏi của mình, GS Trần Văn Khê đã có những đóng góp vô giá cho việc duy trì, bảo tồn và phát triển nền âm nhạc dân tộc, là thành viên của nhiều hội nghiên cứu âm nhạc quốc tế và của nhiều nước như Pháp, Mỹ, Đức… với nhiều giải thưởng danh giá!\r\n\r\nTrong ông luôn tràn ngập tình yêu thương với quê hương xứ sở và một lòng đau đáu muốn truyền thụ lại tinh túy văn hóa dân tộc cho thế hệ mai sau biết trân trọng gìn giữ. Giáo sư – Tiến sĩ Trần Văn Khê tâm sự: “Ước nguyện hiện tại của tôi là có thể say sưa nói về âm nhạc trong cả những phút cuối cùng được sống”.\r\n\r\nBộ sách HỒI KÝ TRẦN VĂN KHÊ được Công ty Văn hóa Phương Nam tái bản đặc biệt Nhân kỷ niệm Sinh nhật lần thứ 92 của Ông, là một trong những ấn phẩm khắc họa rõ nét chân dung và sự nghiệp vị giáo sư âm nhạc khả kính.\r\n\r\nẤn bản kèm theo mỗi tập sách là một Audiobook với giọng đọc của chính tác giả. Ngoài  ra, khi mua trọn bộ 2 tập tại nhasachphuongnam.com bạn đọc sẽ được tặng một DVD phim Trần Văn Khê – Người truyền lửa với giá ưu đãi.\r\n\r\nBộ sách lôi cuốn người đọc ngay từ những trang đầu tiên với lời kể chân phương, giản dị, đậm chất Nam Bộ của Giáo sư Khê. Khởi đầu từ một sinh viên trường Thuốc Hà Nội, khi qua Pháp, ông lại học về chính trị và cuối cùng gắn bó cả đời mình với âm nhạc.\r\n\r\nLà tài sản quý giá của quốc gia, nhưng con người ông lại rất giản dị và cách dẫn chuyện cũng vô cùng khiêm tốn:\r\n\r\n“Qua những trang sách này, mời bạn đọc cùng tôi đi viếng nhiều nước, gặp nhiều người, nghe nhiều chuyện; chia buồn chung vui với một người nhạc sĩ suốt đời say mê việc nghiên cứu, sưu tầm phát huy và phổ biến âm nhạc truyền thống Việt Nam.”\r\n\r\nGiáo sư Khê đã dành thời gian thu âm sách nói, đọc lại những trích đoạn mà ông tâm đắc trong cuốn sách in về hành trình đi tìm giá trị nhạc dân tộc của ông. Còn bộ phim tài liệu dài gần 40 phút mang tên Trần Văn Khê - Người truyền lửa (Phim Phương Nam sản xuất) do nhà văn Nguyễn Thị Minh Ngọc biên kịch, Phạm Hoàng Nam đạo diễn.\r\n\r\nTrong bộ Hồi ký Trần Văn Khê, độc giả có được cơ hội nhìn lại cuộc đời nhiều thăng trầm nhưng đáng tự hào của nhà nghiên cứu. Từ đó, người đọc có thể trải nghiệm nhiều bài học quý giá qua những câu chuyện giản dị, cảm động.\r\n\r\nPhim tài liệu Giáo sư Trần Văn Khê Người truyền lửa.\r\n\r\nGiáo sư Trần Văn Khê đi hàng trăm nước trên thế giới. Những chuyến đi của ông không phải để ngao du thưởng ngoạn mà để làm tròn nhiệm vụ của một nhà nghiên cứu, bảo vệ những di sản văn hóa âm nhạc đã trải qua bao nhiêu thử thách của thời gian.\r\n\r\nTrong hồi ký, ông viết: “Cái may và không may liên tục đến với đời mình làm cho tôi không quá vui khi được hưởng phước, cũng không quá buồn khi lâm nạn, không quá bi quan và cũng không quá lạc quan. Mồ côi cha mẹ từ thuở nhỏ là một điều không may đối với tôi nhưng nó lại làm cho tôi sớm hiểu lẽ đời, biết tự lực cánh sinh và chỉ biết sống dựa vào mình… Tuổi tác có thể ngăn cản việc đi đứng, nhìn ngắm hay lắng nghe phần nào nhưng không thể làm ngừng được niềm say mê và nhiệt huyết không bao giờ cạn với âm nhạc…”.\r\n\r\nCác bài viết Tưởng nhớ Giáo sư Trần Văn Khê:\r\n\r\nhttp://bit.ly/Tuong_nho_GS_Tran_Van_Khe_1\r\n\r\nhttp://bit.ly/Tuong_nho_GS_Tran_Van_Khe_2\r\n\r\n“Chân đi tám hướng mười phương\r\n\r\nTinh thần dân tộc một đường trước sau.”\r\n\r\nHuy Cận', 300800, 'images/1525423646-hoi_ky_tran_van_khe_dac_biet.975x1452.w.b.jpg', 0, 50),
(15, 1, 10, 'Cây Thập Tự Ven Đường', '', 'Tiếng Việt', 0, 'NXB Thời Đại, Bách Việt', 'Những cây thập tự ven đường xuất hiện dọc theo các xa lộ ở Bán đảo Montery, không phải để tưởng niệm những người đã thiệt mạng trong các vụ tai nạn giao thông, mà là để thông báo thời gian sắp diễn ra các vụ ám sát. Nạn nhân chính là những người đã đăng bài viết thiếu cẩn trọng hay để lộ quá nhiều thông tin cá nhân trên các trang mạng xã hội.\r\n\r\n \r\n\r\nĐặc vụ Kathryn Dance cùng các đồng sự tại CBI được giao phó tiếp nhận vụ án. Là một chuyên gia về ngôn ngữ cơ thể, cô đã nhanh chóng lần ra các manh mối và phát hiện ra trung tâm của mọi nghi vấn là cậu thiếu niên Travis Brigham. Động cơ giết người của Travis là để trả thù những ai đã từng nhục mạ mình trên mạng. Nhưng sự thật đằng sau lại không hề đơn giản như vậy, khi chính Travis cũng chỉ là nạn nhân trong kế hoạch giết người của hung thủ thật sự...', 118400, 'images/1525537869-cay_thap_tu_ven_duong.468x720.w.b.jpg', 0, 15),
(16, 6, 11, 'School 2015 - Who Are You (Sách ảnh) (Tặng postcard)', '', 'Tiếng Việt', 2018, 'NXB Thanh Niên, AZ Việt Nam', 'School 2015 - Who Are You (Sách ảnh) (Tặng postcard)\r\n\r\n18 tuổi.\r\n\r\nVẫn còn quá sớm để đạt được ước mơ, nhưng lại là độ tuổi tuyệt nhất để bắt đầu ước mơ ấy.\r\n\r\nCó thể rất đau khi vấp ngã, nhưng lại là thời điểm thích hợp nhất để học cách đứng dậy hàng trăm lần.\r\n\r\nHãy nhớ rằng, khi cuộc đời khiến bạn cảm thấy chán ghét và chẳng có ai kề bên bạn vẫn không hề đơn độc, bởi sẽ có ai đó chìa tay về phía bạn.', 143200, 'images/1525677493-school-2015-who-are-you.450x652.w.b.jpg', 0, 100),
(17, 6, 12, 'Mang Thai Tuổi 17', '', 'Tiếng Việt', 2014, 'NXB Văn Học, Alphabooks', 'Mang Thai Tuổi 17 như một bản tình ca dài, với đầy đủ các cung bậc, từ vui vẻ ngây thơ đặc trưng của lứa tuổi học trò, tất chua xót mất mát của những vấp ngã đầu đời. Người đọc, qua bản tình ca ấy, cảm nhận trọn vẹn tâm trạng của các nhân vật, trọn vẹn những tình tiết chân thực của cuộc sống hiện đại, một vấn đề nóng của xã hội, không chỉ đang thưởng thức câu chuyện, mà đang sống cùng câu chuyện thú vị này.\r\n\r\n \r\n\r\nĐiều gì bạn muốn trở thành kỉ niệm khi bạn mười bảy tuổi: Những buổi trốn học đi chơi cùng bạn bè, những trò nghịch ngợm miên man, ánh mắt của cậu bạn trong lớp học thêm, một nụ cười bất chợt trong ánh nắng mùa thu dịu nhẹ, hay cái nắm tay đầu tiên, lời hẹn hò đầu tiên?\r\n\r\n \r\n\r\nThế nhưng, với Min Min, và một vài cô bạn xung quanh, kỷ niệm ấy chẳng là gì, vì họ đang mang trong người một đứa trẻ. Đứa trẻ ấy hình thành bởi một chén rượu cay trong tình huống oái oăm không đáng có, hình thành nên bởi một tình yêu vụng dại…\r\n\r\n \r\n\r\nTuổi trẻ như một cơn mưa rào, lạnh, bất ngờ và đẫm ướt, đứa trẻ xuất hiện như một cơn bão lớn, dường như sẽ cuốn phăng tất cả: Bạn bè, thầy cô, gia đình, tình cảm, cả sự bình yên? Những người mẹ trẻ mới mười bảy tuổi sẽ đối mặt với chuyện ấy như thế nào, “tác giả” của những đứa trẻ sẽ đón nhận tin này ra sao, và gia đình – chỗ dựa tinh thần tưởng chừng như vô cùng vững chắc đứng trước nguy cơ đổ sụp bất cứ lúc nào.\r\n\r\n \r\n\r\nAi cũng có thể là người thông minh, nhưng không phải ai cũng có thể xư xử sáng suốt, các cô gái mười bảy không thể một mình mang thai, nhưng nhiều người đã phải một mình chịu đựng tất cả. Min Min rơi vào cảnh làm dâu khi mười bảy với biết bao tình huống oái oăm, thế nhưng cô vẫn còn may mắn vì được bạn bè, gia đình, bạn trai cạnh bên giúp đỡ. Cô bạn cùng trường kém Min Min một tuổi, đã phải hứng chịu biết bao miệt thị, lạnh lùng, vô tâm từ chính người yêu và người thân của mình, dẫn đến hành động vô phương cứu chữa…', 103200, 'images/1525677651-mang_thai_tuoi_17.520x672.w.b.jpg', 0, 100),
(18, 6, 9, '\"Thả Thính\" Là Phải Dính ! - 54 Cách Giúp Bạn Tán Đổ \"Crush\"', '', 'Tiếng Việt', 2018, 'NXB Thanh Niên, Đinh Tị', '\"Thả Thính\" Là Phải Dính ! - 54 Cách Giúp Bạn Tán Đổ \"Crush\"\r\n\r\n\"Ta nên hết lòng yêu,\r\n\r\nHay giữ lại đúng lúc?\r\n\r\nYêu thì rất đơn giản,\r\n\r\nKhó khăn ở phía sau…\r\n\r\n54 câu hỏi, 54 \"\"tuyệt kế\"\" - Cuốn sách này sẽ giúp bạn trở thành cao thủ thả thính.\"', 92500, 'images/1525677634-tha-thinh-la-phai-dinh.450x652.w.b.jpg', 0, 100),
(19, 6, 12, 'Người Mẹ Được Gửi Đến Từ Thiên Đường', '', 'Tiếng Việt', 2017, 'NXB Thế Giới, Hương Giang Books', 'Người Mẹ Được Gửi Đến Từ Thiên Đường\r\n\r\nNgười Mẹ Được Gửi Đến Từ Thiên Đường của Võ Anh Thơ là một truyện dài viết dưới dạng nhật ký. Ghi lại tình cảm của hai đứa trẻ: Hào, Miu và Mây, một người phụ nữ trẻ 27 tuổi. Họ gặp và sống nhau ở một thị trấn nhỏ bình yên ở miền Tây. Mây và Phong (người cha của hai đứa trẻ) sẽ nên duyên chồng vợ nhưng Phong đã mất và Mây tự nguyện chăm sóc cho hai đứa trẻ côi cút... Vì với họ \"Chỉ cần yêu thương thôi là đủ\".\r\n\r\n“Ba Phong mất vào một ngày nắng dịu dàng. Và rồi trong mảnh vườn buồn bã đó, con đã thấy cô ấy xuất hiện, mang theo những sắc nắng lung linh, giống hệt lúc ba Phong về trời. Cô không xinh đẹp, vụng về đến nỗi bước đi mà cũng vô ý trượt ngã. Cô đến bên con và bé Miu, mỉm cười hỏi: “Hai con có muốn sống cùng mẹ không? Chúng ta hãy sống cùng nhau, nhé!”. Bỗng dưng trước mắt, thế giới sáng bừng rực rỡ. Để rồi con biết rằng, chính ba Phong ở trên Thiên đường đã gửi đến chúng con một thiên thần mang tên là “Mẹ”\r\n\r\nChúng con muốn sống cùng người phụ nữ mà ba yêu...”.', 68800, 'images/1525678005-nguoi-me-duoc-gui-den-tu-thien-duong.450x652.w.b.jpg', 0, 150),
(20, 1, 13, 'Cay Đắn Mùi Đời', '', 'Tiếng Việt', 2018, 'NXB Văn Học, Đinh Tị', '\"Thầy Ðàng dắt thằng Ðược ra tới đường quan lộ rồi mới buông nó ra, biểu nó đi trước, còn thầy với con nhỏ thì đi theo sau. Thằng Ðược chơn đi mà mắt ngó lại nhà hoài, nước mắt chảy ròng ròng không dứt, trong bụng thầm nghĩ mình bước tới một bước thì càng xa mẹ, xa nhà thêm một khúc đường; hồi nãy nghe ông già nói đi qua Cần Ðước mà Cần Ðước ở đâu? Ông già nầy là ai?', 55200, 'images/1526540358-cay-dang-mui-doi.450x652.w.b.jpg', 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE `book_review` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reviews` text COLLATE utf8mb4_unicode_ci COMMENT 'Review on the book',
  `rating` int(11) NOT NULL COMMENT 'Rating given to the book in a scale of 5',
  `review_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_review`
--

INSERT INTO `book_review` (`book_id`, `user_id`, `reviews`, `rating`, `review_date`) VALUES
(1, 1, 'Hay', 5, '2018-05-07 22:47:12'),
(1, 1, 'Hay', 5, '2018-05-08 23:30:08'),
(2, 1, 'Quá hay', 5, '2018-05-07 22:55:24'),
(2, 1, 'Rất hay', 5, '2018-05-07 23:05:09'),
(2, 1, 'Hay', 4, '2018-05-17 13:50:47'),
(2, 3, 'Bình Thường', 3, '2018-05-13 22:33:43'),
(5, 1, 'Không hay', 1, '2018-05-07 22:51:49'),
(6, 1, 'Hay', 5, '2018-05-08 21:58:42'),
(9, 3, 'Hay', 5, '2018-05-13 22:35:56'),
(9, 3, 'Không Hay Lắm', 2, '2018-05-13 22:41:45'),
(9, 3, 'Bình Thường', 3, '2018-05-13 22:48:53'),
(12, 1, 'Hay', 5, '2018-05-17 09:28:39'),
(12, 1, 'Bình Thường', 4, '2018-05-17 09:29:07'),
(12, 1, 'Không hay', 1, '2018-05-17 09:31:58'),
(12, 1, 'Không', 1, '2018-05-17 09:33:40'),
(12, 1, 'k', 1, '2018-05-17 09:34:10'),
(12, 1, 'Hay', 5, '2018-05-17 09:34:53'),
(12, 1, 'Hay', 5, '2018-05-17 09:35:28'),
(19, 3, 'Cũng Hay Đó', 4, '2018-05-13 22:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Văn Học'),
(2, 'Giáo Dục'),
(3, 'Kinh Tế/Kinh Doanh'),
(4, 'Truyện Tranh/Manga/Comic'),
(5, 'Thiếu Nhi'),
(6, 'Teen'),
(7, 'Kỹ Năng/Sống Đẹp'),
(8, 'Văn Hóa/Nghệ Thuật/Du Lịch'),
(9, 'Thường Thức/Đời Sống'),
(10, 'Sách Chuyên Ngành'),
(11, 'Sách Học Ngoại Ngữ/Từ Điển'),
(12, 'Truyện Kiếm Hiệp');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `credit_card_number` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_cart_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `card_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`credit_card_number`, `credit_cart_name`, `expire_date`, `card_type`, `user_id`) VALUES
('00000000000', 'Tô Hương Giang', '2018-05-18', 'VIP', 1),
('01658215007', 'Nguyễn Hoàng Giang', '2018-05-15', 'VIP', 1),
('01658215008', 'Nguyễn Hoàng Giang', '2018-05-18', 'VIP', 1),
('01658215009', 'Nguyen Giang', '2018-05-12', 'So 1', 1),
('09888888', 'Nguyễn', '2018-05-25', 'Thường', 1),
('12', 'Nguyễn Hoàng Giang', '2018-05-27', 'VIP', 1),
('1234', 'Tô Hương Giang', '2018-05-18', 'VIP', 1),
('123456', 'Nguyễn hoàng Giang', '1997-11-26', 'Việt Nam', 1),
('19922998989', 'Nguyễn Văn A', '2018-05-17', 'VIP', 1),
('26111997', 'Ruan Jiang', '2020-11-26', 'VIP', 1),
('9876', 'Ngô Vân Anh', '2018-05-13', 'VIP', 1),
('9999', 'Nguyễn Hoàng Giang', '2018-05-25', 'Thường', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `address`, `city`, `email`, `phone`) VALUES
(1, 'giangnh', '123456', 'Giang', 'Nguyễn', 'Hà Nội', 'Hà Nội', 'giang.nh261197@gmail.com', '01658215007'),
(2, 'anhnv', '123456', 'Anh', 'Ngô', 'Hà Nội', '', 'anhnv@gmail.com', ''),
(3, 'giangth', '123456', 'Giang', 'Tô', '', '', 'giangth@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_book`
--

CREATE TABLE `ordered_book` (
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordered_book`
--

INSERT INTO `ordered_book` (`order_id`, `book_id`, `quantity`, `price`) VALUES
(1, 1, 5, 50000),
(1, 9, 2, 126400),
(1, 16, 7, 18000),
(1, 17, 8, 60000),
(1, 18, 2, 50000),
(2, 7, 4, 50000),
(2, 8, 5, 67800),
(2, 9, 3, 189600),
(2, 12, 15, 120000),
(2, 15, 1, 118400),
(2, 18, 3, 50000),
(3, 1, 8, 12000),
(3, 3, 21, 27800),
(3, 4, 13, 56000),
(3, 14, 10, 34000),
(4, 5, 12, 134500),
(4, 9, 54, 34000),
(4, 14, 10, 34900),
(5, 2, 100, 23000),
(5, 10, 1, 10000),
(5, 11, 6, 12000),
(5, 14, 5, 25000),
(5, 19, 56, 12890),
(7, 2, 7, 80000),
(7, 18, 5, 25000),
(15, 1, 2, 124800),
(15, 2, 1, 63200),
(15, 9, 1, 63200),
(15, 15, 1, 118400),
(15, 19, 2, 137600),
(16, 1, 2, 124800),
(16, 2, 1, 63200),
(16, 9, 1, 63200),
(16, 15, 1, 118400),
(16, 19, 2, 137600),
(17, 1, 2, 124800),
(17, 2, 1, 63200),
(17, 9, 1, 63200),
(17, 15, 1, 118400),
(17, 19, 2, 137600),
(18, 1, 2, 124800),
(18, 2, 1, 63200),
(18, 9, 1, 63200),
(18, 15, 1, 118400),
(18, 19, 2, 137600),
(19, 9, 2, 126400),
(20, 2, 1, 63200),
(20, 9, 1, 63200),
(21, 2, 2, 126400),
(21, 9, 1, 63200),
(21, 19, 1, 68800),
(22, 2, 2, 126400),
(22, 9, 1, 63200),
(22, 19, 1, 68800),
(23, 19, 1, 68800),
(24, 1, 1, 62400),
(24, 2, 1, 63200),
(24, 3, 1, 52800),
(25, 19, 2, 137600),
(26, 2, 1, 63200),
(26, 9, 1, 63200),
(26, 19, 1, 68800),
(27, 9, 1, 63200),
(27, 19, 1, 68800),
(28, 16, 1, 143200),
(28, 17, 1, 103200),
(29, 19, 2, 137600),
(30, 3, 1, 52800),
(30, 14, 2, 601600),
(31, 2, 1, 63200),
(31, 19, 2, 137600),
(32, 19, 1, 68800),
(33, 1, 1, 62400),
(33, 2, 1, 63200),
(33, 14, 1, 300800),
(33, 19, 1, 68800),
(34, 9, 1, 63200),
(34, 19, 1, 68800),
(35, 2, 1, 63200),
(35, 19, 1, 68800);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'If order is to be sent to other address rather than to the customer, we need that address',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `method_payment` bit(1) NOT NULL COMMENT 'Foreign key to Shipping Type',
  `status` int(11) NOT NULL,
  `date_received` datetime DEFAULT NULL,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `receiver_name`, `address`, `city`, `date_created`, `method_payment`, `status`, `date_received`, `total_money`) VALUES
(1, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-12 11:46:00', b'0', 1, '2018-05-13 08:05:00', 1000000),
(2, 1, 'Nguyễn Hoàng Giang', 'Đông Anh, Hà Nội', 'Hà Nội', '2018-05-04 10:17:00', b'0', 1, '2018-05-12 07:00:00', 50000),
(3, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-05 07:03:00', b'1', 1, '2018-05-12 07:00:00', 120000),
(4, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-09 06:00:00', b'1', 1, '2018-05-11 06:00:00', 200000),
(5, 1, 'Nguyễn Hoàng Giang', 'Đông Anh, Hà Nội', 'Hà Nội', '2018-05-01 06:06:00', b'1', 1, '2018-05-08 07:08:00', 120000),
(6, 1, 'Nguyễn Hoàng Giang', 'Đông Anh, Hà Nội', 'Hà Nội', '2018-04-14 00:00:00', b'1', 1, '2018-04-04 00:00:00', 120000),
(7, 3, 'Tô Hương Giang', 'Hà Nội', 'Hà Nội', '2018-05-13 06:00:00', b'1', 1, '2018-05-13 17:00:00', 350000),
(8, 1, 'Nguyễn Giang', 'Hà Nội', 'Hà Nội', '2018-05-15 09:47:38', b'0', 1, '2018-05-16 08:05:00', 126400),
(9, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 09:59:14', b'1', 1, '2018-05-15 08:05:00', 189600),
(10, 1, 'Nguyễn Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:04:56', b'0', 1, '2018-05-15 05:05:00', 118400),
(11, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:07:34', b'0', 1, '2018-05-15 17:05:00', 118400),
(12, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:11:19', b'0', 1, '2018-05-15 05:05:00', 118400),
(13, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:20:19', b'0', 0, NULL, 118400),
(14, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:20:45', b'0', 1, '2018-05-15 17:05:00', 118400),
(15, 1, 'Ruan Jiang', 'Cổ Loa,Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:23:05', b'1', 0, NULL, 507200),
(16, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 10:27:45', b'0', 0, '2018-05-15 17:05:00', 507200),
(17, 1, 'Tô Hương Giang', 'Hà Nội', 'Hà Nội', '2018-05-15 12:36:09', b'1', 1, '2018-05-15 15:05:00', 507200),
(18, 1, 'Tô Hương Giang', 'Hà Nội', 'Hà Nội', '2018-05-15 12:37:10', b'1', 0, NULL, 507200),
(19, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 12:46:00', b'1', 0, NULL, 126400),
(20, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 12:57:10', b'0', 0, NULL, 126400),
(21, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 12:58:05', b'0', 0, NULL, 258400),
(22, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 12:58:40', b'0', 0, NULL, 258400),
(23, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 13:00:32', b'0', 0, NULL, 68800),
(24, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 13:02:33', b'0', 0, NULL, 178400),
(25, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-15 13:07:22', b'0', 0, NULL, 137600),
(26, 1, 'Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 13:11:49', b'1', 0, NULL, 195200),
(27, 1, 'Giang Nguyễn Hoàng', 'Hà Nội', 'Hà Nội', '2018-05-15 13:13:14', b'0', 0, NULL, 132000),
(28, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 13:13:52', b'1', 0, NULL, 246400),
(29, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-15 17:17:23', b'1', 0, NULL, 137600),
(30, 1, 'Nguyen Hoang Giang', 'Dong Anh,Hà Nội', 'Hà Nội', '2018-05-15 18:39:18', b'1', 1, '2018-05-19 15:05:00', 654400),
(31, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-16 21:22:35', b'0', 0, NULL, 200800),
(32, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-17 07:28:04', b'1', 0, NULL, 68800),
(33, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-17 09:22:01', b'0', 1, '2018-05-18 02:05:00', 495200),
(34, 1, 'Nguyễn Hoàng Giang', 'Đông Anh,Hà Nội', 'Hà Nội', '2018-05-17 13:52:40', b'0', 0, NULL, 132000),
(35, 1, 'Giang Nguyễn', 'Hà Nội', 'Hà Nội', '2018-05-17 13:53:16', b'1', 1, '2018-05-26 02:05:00', 132000);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_items`
--

CREATE TABLE `shopping_cart_items` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD PRIMARY KEY (`book_id`,`user_id`,`review_date`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`credit_card_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_book`
--
ALTER TABLE `ordered_book`
  ADD PRIMARY KEY (`order_id`,`book_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `type_of_shipping` (`method_payment`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shopping_cart_items`
--
ALTER TABLE `shopping_cart_items`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `book_review`
--
ALTER TABLE `book_review`
  ADD CONSTRAINT `book_review_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `book_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `ordered_book`
--
ALTER TABLE `ordered_book`
  ADD CONSTRAINT `ordered_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `ordered_book_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`order_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `shopping_cart_items`
--
ALTER TABLE `shopping_cart_items`
  ADD CONSTRAINT `shopping_cart_items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`),
  ADD CONSTRAINT `shopping_cart_items_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
