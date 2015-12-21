-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2015 at 11:44 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_des` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_des` text COLLATE utf8_unicode_ci NOT NULL,
  `image_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo_site` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `site_name`, `skype`, `facebook`, `site_des`, `admin_des`, `image_admin`, `logo_site`) VALUES
(1, 'doanngockhoi93@gmail.com', 'ChickenElectric', 'doankhoi', 'https://www.facebook.com/BkaIct', 'News - Tutorials - Web Programming - PHP - Java - Ruby', 'Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.', '8118173f6961cbfe79d7861da85d0dd35158492f1448794238.jpg', 'e558b9d6a01a64382800e9fed0dfa974385a08131448794238.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Laravel 3', 'laravel5', 1, '0000-00-00 00:00:00', '2015-12-21 03:30:38'),
(2, 'Php basic', 'php-basic', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Chủ đề mới', '', 1, '2015-12-21 03:34:38', '2015-12-21 03:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `seen`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Bài viết rất hữu ích', 1, 5, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '<p>B&agrave;i viết rất hay</p>\r\n', 1, 6, 8, '2015-11-30 09:53:43', '2015-11-30 10:01:18'),
(3, '<p>B&agrave;i code c&oacute; đoan sau&nbsp;</p>\r\n\r\n<pre>\r\n<code class="language-php">&lt;?php \r\n  $name = "doankhoi";\r\n  echo $name;\r\n?&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 8, '2015-11-30 10:02:44', '2015-11-30 10:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `text`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'vinh vat vo', 'vinh@gmail.com', 'Tôi muốn đặt hàng làm web.', 1, '0000-00-00 00:00:00', '2015-11-30 11:24:41'),
(2, 'anhngu', 'anh@gmail.com', 'Bài viết rất hay mong bạn cống hiến thêm.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Doan khoi', 'osbkca@gmail.com', 'Bạn có thể làm một trang web bán hàng không.', 1, '2015-11-29 09:31:34', '2015-11-30 11:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_09_065607_create_user_info_table', 1),
('2015_11_10_074851_create_role_table', 1),
('2015_11_10_081637_create_contacts_table', 1),
('2015_11_10_082413_create_posts_table', 1),
('2015_11_10_084736_create_tags_table', 1),
('2015_11_10_085359_create_post_tag_table', 1),
('2015_11_10_090449_create_comments_table', 1),
('2015_11_10_095741_create_foreign_key', 1),
('2015_11_12_084804_create_categories_table', 1),
('2015_11_12_085717_add_column_category_id', 1),
('2015_11_12_090344_create_foreign_key_post_cate', 1),
('2015_11_18_085303_add_column_confirm_user_table', 1),
('2015_11_23_064606_add_column_remenber_token', 2),
('2015_11_23_071744_add_column_type_for_posts_table', 3),
('2015_11_23_171450_add_column_quote_posts_table', 4),
('2015_11_24_164009_add_column_desciption_user_table', 5),
('2015_11_25_144308_add_column_images_posts_table', 6),
('2015_11_27_175033_add_column_timstamps_comments', 7),
('2015_11_28_092743_add_column_view_posts', 8),
('2015_11_29_075412_create_admin_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_id` int(10) unsigned NOT NULL,
  `type` int(11) NOT NULL,
  `quote` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nview` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `content`, `seen`, `is_active`, `user_id`, `created_at`, `updated_at`, `category_id`, `type`, `quote`, `images`, `nview`) VALUES
(8, 'Bai viet huong dan lap trinh', 'bai-viet-huong-dan-lap-trinh', '<p>V&agrave; sau khi họ lập tr&igrave;nh xong, nhiệm vụ của ch&uacute;ng ta ch&iacute;nh l&agrave; quản trị v&agrave; ph&aacute;t triển&hellip;hay cụ thể hơn nằm ở phần&nbsp;<strong>IV</strong>&nbsp;của b&agrave;i viết.<br />\r\n&nbsp;</p>\r\n', '<p><em><strong>Dưới đ&acirc;y l&agrave; 1 số keyword c&aacute;c bạn c&oacute; thể t&igrave;m được website ưng &yacute; theo y&ecirc;u cầu của m&igrave;nh:</strong></em><br />\r\n&ndash; Nếu bạn muốn kiếm 1 bộ code rao vặt h&atilde;y l&ecirc;n google search:<br />\r\nKeyword: code&nbsp;rao&nbsp;vặt php, code&nbsp;rao&nbsp;vặt, m&atilde; nguồn&nbsp;rao&nbsp;vặt&hellip;<br />\r\n&ndash; Nếu bạn muốn kiếm 1 bộ code l&agrave;m diễn đ&agrave;n h&atilde;y l&ecirc;n google search:<br />\r\nKeyword: code diễn đ&agrave;n, code forum&hellip;<br />\r\n&ndash; Nếu bạn muốn kiếm 1 bộ code đấu gi&aacute;, mua chung h&atilde;y search:<br />\r\nKeyword: code đấu gi&aacute;, code mua chung, code bird, code deal,&hellip;<br />\r\n&ndash; Nếu bạn muốn kiếm 1 bộ code shopping để b&aacute;n h&agrave;ng h&atilde;y search:<br />\r\nKeyword: code shop, code shopping, code b&aacute;n h&agrave;ng, code shopping thời trang, code shopping m&aacute;y t&iacute;nh, code shopping mobile&hellip;<br />\r\n&ndash; Nếu bạn muốn kiếm 1 bộ code về gian h&agrave;ng (E-Store) h&atilde;y search:<br />\r\nKeyword: code gian h&agrave;ng, code estore, code shopping estore, EcShop, EcMall</p>\r\n\r\n<p>V&agrave; c&aacute;c bạn n&ecirc;n search những bộ code được lập tr&igrave;nh bằng ng&ocirc;n ngữ PHP nh&eacute;!</p>\r\n', 1, 1, 1, '2015-11-27 08:35:25', '2015-12-17 01:51:13', 2, 1, '', '987a9b2c872ca170f543814f68db96e760298f951448638525.jpg', 1),
(9, 'Laravel là ngôn ngữ bạn cần học', 'laravel-la-ngon-ng-bn-cn-hc', '<p>Laravel Framework 4, vừa chỉ ra mắt v&agrave;o cuối th&aacute;ng 5 - 2013. Tuy vậy, PHP Framework n&agrave;y đ&atilde; nhanh ch&oacute;ng c&oacute; được một cộng đồng rất lớn trong thế giới c&aacute;c Framework của ng&ocirc;n ngữ lập tr&igrave;nh PHP. Vậy tại sao, framework n&agrave;y lại được đ&ocirc;ng đảo c&aacute;c lập tr&igrave;nh vi&ecirc;n đ&oacute;n nhận ?.</p>\r\n', '<p>Trước hết, sự tinh tế của Laravel nằm ở chỗ bắt kịp được xu hướng c&ocirc;ng nghệ m&agrave; điểm nhấn ở đ&acirc;y l&agrave; c&aacute;c t&iacute;nh năng mới trong c&aacute;c phi&ecirc;n bản PHP 5.3 trở l&ecirc;n. Điều đ&oacute; được thể hiện qua kh&aacute;i niệm&nbsp;<a href="http://www.qhonline.edu.vn/video-training8db650dc40z292.html" target="_blank">namespace</a>,&nbsp;<a href="http://www.qhonline.edu.vn/video-training6c9f6e0522z294.html" target="_blank">composer</a>, closure v&agrave; rất nhiều những ti&ecirc;u chuẩn trong&nbsp;design pattern&nbsp;được &aacute;p dụng tr&ecirc;n nền tảng framework n&agrave;y. Đồng thời, với c&aacute;ch hướng dẫn đơn giản v&agrave; dễ tiếp cận giống với<a href="http://www.qhonline.edu.vn/thong-tin/chuyen-de-codeigniter-framework-online.html" target="_blank">Codeigniter Framework</a>&nbsp;đ&atilde; khiến người d&ugrave;ng th&iacute;ch ngay từ lần đầu &quot;hẹn h&ograve;&quot; với framework n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Laravel 4&nbsp;cũng c&oacute; sự t&iacute;ch hợp của một phần trong thư viện symfony v&agrave; &aacute;p dụng triệt để m&ocirc; h&igrave;nh ORM với kh&aacute;i niệm li&ecirc;n quan đến&nbsp;Eloquent class. Đồng thời, n&oacute; cũng giải quyết được những vấn đề m&agrave; c&aacute;c framework kh&aacute;c đang mắc phải. Chẳng hạn như master layout, m&ocirc; h&igrave;nh xử l&yacute; với ORM, event model,....</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&agrave; cho đến cuối năm 2013, khi c&aacute;c chuy&ecirc;n gia tổng hợp về sự tăng trưởng của&nbsp;laravel framework&nbsp;trong những th&aacute;ng cuối năm th&igrave; ch&uacute;ng ta c&oacute; thể thấy&nbsp;Laravel&nbsp;vượt l&ecirc;n dẫn đầu trước c&aacute;c&nbsp;<a href="http://www.qhonline.info/tai-lieu/41/khai-quat-ve-php-framework.html" target="_blank">PHP framework</a>&nbsp;lớn mạnh kh&aacute;c một c&aacute;ch ngoạn mục, khi tỷ lệ % của laravel chiếm tới những 25,85%, trong khi c&aacute;c framework đ&igrave;nh đ&aacute;m kh&aacute;c lại tụt giảm th&ecirc; thảm như&nbsp;zend framework 2&nbsp;chỉ c&ograve;n 4,51% l&agrave; 1 v&iacute; dụ.</p>\r\n\r\n<pre>\r\n<code class="language-php"><!--?php\r\n  echo "Hello world";\r\n?--></code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 1, '2015-11-28 01:56:48', '2015-12-17 01:37:57', 1, 2, '', '2360caf2992d2d569804b0cc926e17a6ff5fcaae1448701008.jpg', 2),
(10, 'Bài viết đính kèm file', 'bai-vit-inh-kem-file', '<p>Mới thực hiện cấu h&iacute;nh filemanager</p>\r\n', '<p>Link download:&nbsp;<a href="/filemanager/userfiles/user5/Php/cakemem.rar">/filemanager/userfiles/user5/Php/cakemem.rar</a></p>\r\n', 1, 1, 1, '2015-12-01 00:22:27', '2015-12-17 01:34:33', 2, 1, '', '8452df2c902261073a842835cbc4ca723d31bd221448954547.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(6, 8, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 9, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Người dùng', 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Quản trị viên', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Biên tập viên', 'redac', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(3, 'laravel5', '2015-11-25 08:27:52', '2015-11-25 08:27:52'),
(4, 'php', '2015-11-25 08:27:52', '2015-11-25 08:27:52'),
(5, 'music', '2015-11-25 08:27:52', '2015-11-25 08:27:52'),
(6, 'programming', '2015-11-27 08:35:25', '2015-11-27 08:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number_login` bigint(20) NOT NULL DEFAULT '0',
  `fails_login` bigint(20) NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `register_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `photo`, `number_login`, `fails_login`, `role_id`, `seen`, `last_login`, `is_active`, `register_token`, `created_at`, `updated_at`, `confirmed`, `remember_token`, `description`) VALUES
(1, 'doanngockhoi93ee@gmail.com', 'doankhoi', '$2y$10$G.wjPagZxEaZek2/VyvdXeyM.MZ4tWYRfj1OQbiekBnqaW0bO2J7C', '5873247f70fc8f6d8a0c4eaebcf1b972ecac7bd81448158592.jpg', 0, 0, 2, 1, NULL, 1, '0TH8a4O2j949ioTUE0asvBEv4zRhWq', '2015-11-21 19:16:32', '2015-12-01 01:26:26', 1, 'KFg11iyhQJTUF4Gf9EnHGRkznHRlVgB13pwwjnpDMXZFRfAB5SovHizhCJXg', 'Tôi tin vào chúa sẽ đưa đến mọi điều tốt đẹp.'),
(5, 'doanngockhoi93e@gmail.com', 'redaction', '$2y$10$ZzhiVIAooZfszt77DYLbiuTtbFIJIfN5.G537R0qhv5kdFY627f5m', 'e558b9d6a01a64382800e9fed0dfa974385a08131448772055.jpg', 0, 0, 3, 1, NULL, 1, 'ed3f09Be527JcNuwbh6xM3kydA054P', '2015-11-28 21:40:55', '2015-12-01 00:18:47', 1, 'qWZYCT1CJp18ksb1lTQghE7WTs1WFlImSwJBTmjexDw3khDza3CxnTGcihBw', 'Biên tập viên, SEO, cộng tác viên'),
(6, 'sangtao@gmail.com', 'sangtao', '$2y$10$ENiCfcInAikLVbVfh45s4.QastW2bMd0vbb9e4gW6iLYnaN.r6VPy', 'cc8fc205cdc65e99c7934a949264eee1420bc1e51448895423.jpg', 0, 0, 1, 1, NULL, 0, 'kGVRM1HuIB2eVKlfUYLuIPmChC20lk', '2015-11-30 07:57:03', '2015-12-01 01:25:47', 1, 'kVpDAAdIR9o5V3cO6xJkPaEMarkUbA6Ms2OxuAFoi6TPtwecYCA6GPKBPDnq', 'Coder pro'),
(8, 'doanngockhoi93@gmail.com', 'masterpro', '$2y$10$rgm9X6kvjKJoG4WSp9oMReEDB5hcfqEpIIAFdCTqxXM6Jzr/GVfAq', 'cdf7e4136190196f089b9fc10647310fff7f7ace1448958750.png', 0, 0, 1, 0, NULL, 0, 'CbWRM2eeonVcTJEGRDsx8T33h4DiMJ', '2015-12-01 01:32:30', '2015-12-01 01:47:44', 1, 'ZJZyPIHJv2spglTCkj8oWy8oY7bI50wZwuRVJ5F1rM3AaOWFrvIwbBTwOhYP', 'Dev IOS');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE IF NOT EXISTS `user_infos` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `online_status` tinyint(1) NOT NULL,
  `chat_status` tinyint(1) NOT NULL,
  `facebook_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmail_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `firstname`, `lastname`, `gender`, `tel`, `city`, `address`, `online_status`, `chat_status`, `facebook_token`, `gmail_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Doan', 'Khoi', 1, '01644090845', 'ThaiBinh', 'Vu Tay, Kien Xuong', 0, 0, NULL, NULL, '2015-11-21 19:16:32', '2015-11-21 19:16:32'),
(5, 5, 'Trần', 'Lập', 1, '01234567891', 'Thái Bình', 'Vũ Tây - Kiến Xương', 0, 0, NULL, NULL, '2015-11-28 21:40:55', '2015-11-28 21:40:55'),
(6, 6, 'Đoàn', 'Minh', 1, '0123456789', 'Thái Nguyên', 'Tam Thanh', 0, 0, NULL, NULL, '2015-11-30 07:57:03', '2015-11-30 07:57:03'),
(8, 8, 'Master', 'Pro', 1, '01644090845', 'ThaiBinh', 'Vu Tay, Kien Xuong', 0, 0, NULL, NULL, '2015-12-01 01:32:30', '2015-12-01 01:32:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_email_index` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_slug_index` (`slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_unique` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_email_password_username_index` (`email`,`password`,`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_infos_firstname_lastname_index` (`firstname`,`lastname`),
  ADD KEY `user_infos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
