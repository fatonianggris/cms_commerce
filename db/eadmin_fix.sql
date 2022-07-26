-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 02:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `alatbayar`
--

CREATE TABLE `alatbayar` (
  `id_alatbayar` int(10) NOT NULL,
  `tipe_alatbayar` text NOT NULL,
  `nama_alatbayar` text NOT NULL,
  `atas_nama` text NOT NULL,
  `nomor_alatbayar` text NOT NULL,
  `logo_instansi` text NOT NULL,
  `logo_instansi_thumb` text NOT NULL,
  `catatan_transfer` text NOT NULL,
  `petunjuk_transfer` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(10) NOT NULL,
  `status_banner` text DEFAULT NULL,
  `judul_banner` text NOT NULL,
  `judul_promo` text NOT NULL,
  `konten` text NOT NULL,
  `highlight` text NOT NULL,
  `gambar_banner` text NOT NULL,
  `gambar_banner_thumb` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `status_banner`, `judul_banner`, `judul_promo`, `konten`, `highlight`, `gambar_banner`, `gambar_banner_thumb`, `tanggal_post`) VALUES
(2, NULL, 'A great selection of superb brands', '50% off', 'grab it fast', 'on all clothes', 'uploads/banner/5eac859f017be6a4eee0ba84ca65e83c.jpg', 'uploads/banner/thumbs/5eac859f017be6a4eee0ba84ca65e83c.jpg', '2020-04-20 09:58:39'),
(3, '1', 'great selection of superb brands', '30% off', 'on all clothes', 'grab it fast', 'uploads/banner/3ed18dceaf8ab54008115854a7b82d80.jpg', 'uploads/banner/thumbs/3ed18dceaf8ab54008115854a7b82d80.jpg', '2020-04-20 10:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(10) NOT NULL,
  `judul_blog` text NOT NULL,
  `tag_blog` text NOT NULL,
  `isi_blog` text NOT NULL,
  `foto_blog` text NOT NULL,
  `foto_blog_thumb` text NOT NULL,
  `url_slug` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `pertanyaan`, `jawaban`, `tanggal_post`) VALUES
(3, 'Batas waktu untuk mengembalikan atau menukar produk :', '<ul><li><span>Batas pengembalian produk maksimal <b>15 hari</b> setelah anda menerima produk. Jika lebih dari batas waktu yang sudah ditentukan produk tersebut tidak bisa di tukar/ di kembalikan.</span></li></ul>', '2020-04-09 20:41:58'),
(5, 'Syarat dan ketentuan untuk mengembalikan atau menukar produk :', '<ul><li>Mengembalikan/ menukar produk hanya dapat diterima jika kesalahan dilakukan oleh pihak team Klamby.</li><li>Lengkapi form retur yang diberikan oleh team<i></i> Klamby.</li><li>Sertakan bukti nomor <b>order ID</b>.</li><li>Sertakan bukti foto/ video pada bagian baju yang defect (minor).</li><li>Produk belum pernah dicuci dan dengan kondisi yang sama seperti saat paket diterima.</li><li>Produk belum pernah digunakan.</li><li>Tidak bisa menukar produk dengan model dan size yang berbeda.</li><li>(Retur hanya berlaku untuk produk yang sama. Jika ingin tukar dengan produk dan size yang berbeda, kami akan melakukan pengembalian dana sesuai dengan invoice, dan anda dapat melakukan pemesanan ulang melalui website.</li><li>Ketersedian produk pengganti sesuai dengan stock yang tersedia.</li><li>Produk yang dikembalikan harus dalam kondisi yang sesuai dengan keadaan awal (label hang tag masih terpasang, belum digunakan).</li><li>Biaya pengiriman akan di sesuaikan dengan keadaan.</li></ul>', '2020-04-09 20:38:33'),
(6, 'Jika produk pengganti tidak tersedia (sold out) :', '<ul><li>Jika produk pengganti tidak tersedia, kami akan melakukan pengembalian dana sesuai dengan jumlah di invoice.</li></ul>', '2020-04-18 15:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar_produk` text NOT NULL,
  `gambar_produk_thumb` text NOT NULL,
  `token` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `gambar_produk`, `gambar_produk_thumb`, `token`, `date`) VALUES
(1, 'uploads/produk/b4bde1b745e91f59c3cbaee1d32a99f3.jpg', 'uploads/produk/thumbs/b4bde1b745e91f59c3cbaee1d32a99f3.jpg', '4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', '2020-05-19 14:34:33'),
(2, 'uploads/produk/f37a6a126bd4682e2d257bfc16128dba.jpg', 'uploads/produk/thumbs/f37a6a126bd4682e2d257bfc16128dba.jpg', '4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', '2020-05-19 14:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `general_page`
--

CREATE TABLE `general_page` (
  `id_general_page` int(10) NOT NULL,
  `nama_website` text NOT NULL,
  `logo_website` text NOT NULL,
  `logo_website_thumb` text NOT NULL,
  `greeting_website` text NOT NULL,
  `contact_bussines` text NOT NULL,
  `about_website` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_page`
--

INSERT INTO `general_page` (`id_general_page`, `nama_website`, `logo_website`, `logo_website_thumb`, `greeting_website`, `contact_bussines`, `about_website`, `tanggal_post`) VALUES
(1, 'ABANG SHOP', 'uploads/general/65b0f818cba0b84608cc5eb1c118818e.png', 'uploads/general/thumbs/65b0f818cba0b84608cc5eb1c118818e.png', 'Jika tidak berhasil upload bukti transfer silahkan email askhaidee@gmail.com dengan Attached bukti transfer', '0895367047789', 'ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit sse cillum\r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat', '2020-04-19 23:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id_homepage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(10) NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `id_level` text NOT NULL,
  `nama_kategori` text NOT NULL,
  `tipe_kategori` text NOT NULL,
  `desc_kategori` text NOT NULL,
  `gambar_kategori` text NOT NULL,
  `gambar_kategori_thumb` text NOT NULL,
  `url_slug` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_level`, `nama_kategori`, `tipe_kategori`, `desc_kategori`, `gambar_kategori`, `gambar_kategori_thumb`, `url_slug`, `tanggal_post`) VALUES
(1, '0', 'Pakaian Anak', '1', 'Pakaian Anak', 'uploads/kategori/70c0029e39bf8b9f802494bb3d46da05.jpg', 'uploads/kategori/thumbs/70c0029e39bf8b9f802494bb3d46da05.jpg', 'pakaian-anak', '2020-05-19 14:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_produk` text NOT NULL,
  `id_pelanggan` text NOT NULL,
  `jumlah_barang` text NOT NULL,
  `total_harga` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(10) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telephone` text NOT NULL,
  `no_handphone` text NOT NULL,
  `email` text NOT NULL,
  `jam_kerja` text NOT NULL,
  `akun_instagram` text NOT NULL,
  `akun_facebook` text NOT NULL,
  `akun_twitter` text NOT NULL,
  `tanggal_post` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `nomor_telephone`, `no_handphone`, `email`, `jam_kerja`, `akun_instagram`, `akun_facebook`, `akun_twitter`, `tanggal_post`) VALUES
(1, '7563 St. Vicent Place, Glasgow', '0312787398', '0895367047789', 'admin@gmail.com', 'Setiap MINGGU jam 10:00 pagi sampai 6:00 malam', 'https://www.instagram.com/shop/', 'https://web.facebook.com/LazadaIndonesia02/', 'https://twitter.com/onlineshopping', 'current_timestamp()');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id_laporan_penjualan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_produk`
--

CREATE TABLE `laporan_produk` (
  `id_laporan_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(10) NOT NULL,
  `nama_merek` text NOT NULL,
  `desc_merek` text NOT NULL,
  `logo_merek` text NOT NULL,
  `logo_merek_thumb` text NOT NULL,
  `url_slug` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `desc_merek`, `logo_merek`, `logo_merek_thumb`, `url_slug`, `tanggal_post`) VALUES
(1, 'nike klamby', 'nike klamby', 'uploads/merek/e9e71b2f4f2b4bf91b9f5d617dbe812f.jpg', 'uploads/merek/thumbs/e9e71b2f4f2b4bf91b9f5d617dbe812f.jpg', 'nike-klamby', '2020-05-19 21:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `username` text NOT NULL,
  `email_pelanggan` text NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `password` text NOT NULL,
  `no_telepon` text NOT NULL,
  `foto_pelanggan` text NOT NULL,
  `foto_pelanggan_thumb` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_produk` text NOT NULL,
  `id_pelanggan` text NOT NULL,
  `id_kurir` text NOT NULL,
  `id_alatbayar` text NOT NULL,
  `nomor_pesanan` text NOT NULL,
  `nama_produk` text NOT NULL,
  `jumlah_barang` text NOT NULL,
  `harga_barang` text NOT NULL,
  `potongan_harga` text NOT NULL,
  `harga_promo` text NOT NULL,
  `total_harga` text NOT NULL,
  `biaya_pengririman` text NOT NULL,
  `berat_barang` text NOT NULL,
  `voucher` text NOT NULL,
  `ukuran_barang` text NOT NULL,
  `warna_barang` text NOT NULL,
  `note_pesanan` text NOT NULL,
  `status_pesanan` text NOT NULL,
  `tanggal_pesan` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_konfirmasi_bayar` datetime NOT NULL,
  `tanggal_konfirmasi_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `nama_produk` text NOT NULL,
  `sku_produk` text NOT NULL,
  `status_rekomendasi` text DEFAULT NULL,
  `bahan_produk` text NOT NULL,
  `minimal_pembelian` text NOT NULL,
  `stok_barang` text NOT NULL,
  `harga_barang` text NOT NULL,
  `status_promo` text DEFAULT NULL,
  `potongan_harga` text DEFAULT NULL,
  `harga_promo` text DEFAULT NULL,
  `berat_barang` text NOT NULL,
  `kondisi_barang` text NOT NULL,
  `merek_barang` text NOT NULL,
  `asal_produk` text NOT NULL,
  `kategori_barang` text NOT NULL,
  `voucher` text NOT NULL,
  `tag_barang` text NOT NULL,
  `ukuran_barang` text NOT NULL,
  `warna_barang` text NOT NULL,
  `spesifikasi_barang` text NOT NULL,
  `token` text NOT NULL,
  `status_sensor_harga` text DEFAULT NULL,
  `start_digit` text DEFAULT NULL,
  `end_digit` text DEFAULT NULL,
  `link_shopee` text NOT NULL,
  `link_tokopedia` text NOT NULL,
  `link_lazada` text NOT NULL,
  `link_bukalapak` text NOT NULL,
  `url_slug` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `sku_produk`, `status_rekomendasi`, `bahan_produk`, `minimal_pembelian`, `stok_barang`, `harga_barang`, `status_promo`, `potongan_harga`, `harga_promo`, `berat_barang`, `kondisi_barang`, `merek_barang`, `asal_produk`, `kategori_barang`, `voucher`, `tag_barang`, `ukuran_barang`, `warna_barang`, `spesifikasi_barang`, `token`, `status_sensor_harga`, `start_digit`, `end_digit`, `link_shopee`, `link_tokopedia`, `link_lazada`, `link_bukalapak`, `url_slug`, `tanggal_post`) VALUES
(1, 'Ambarawa Outer Kayu', 'AOK-1-', '1', 'Katun', '1', '23', '200.000', NULL, NULL, '0.00', '1000', '1', '0', '0', '1', '0', 'celanajeans', '0', '0', '<ul><li> Material bahan Silk, dengan karakteristik bahan yang halus, lembut, dingin serta menyerap keringat dan mewah ketika dipakai.</li><li> Pemakaian User Friendly</li></ul>', '4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', NULL, NULL, NULL, '', '', '', '', 'ambarawa-outer-kayu', '2020-05-19 14:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama_pengirim` text NOT NULL,
  `email` text NOT NULL,
  `no_telephone` text NOT NULL,
  `isi_saran` text NOT NULL,
  `tanggal_post` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seo_page`
--

CREATE TABLE `seo_page` (
  `id_seo_page` int(10) NOT NULL,
  `judul_page_seo` text NOT NULL,
  `deskripsi_page` text NOT NULL,
  `keywords` text NOT NULL,
  `copyright` text NOT NULL,
  `gambar_page_seo` text NOT NULL,
  `id_twitter` text NOT NULL,
  `id_fb_page` text NOT NULL,
  `id_fb_app` text NOT NULL,
  `status_robot` text DEFAULT NULL,
  `status_boosting` text DEFAULT NULL,
  `canonical` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo_page`
--

INSERT INTO `seo_page` (`id_seo_page`, `judul_page_seo`, `deskripsi_page`, `keywords`, `copyright`, `gambar_page_seo`, `id_twitter`, `id_fb_page`, `id_fb_app`, `status_robot`, `status_boosting`, `canonical`, `tanggal_post`) VALUES
(1, 'Wonderful Morotai - Dinas Pariwisata dan Kebudayaan Kabupaten Pulau Morotai | Destinasi Wisata', 'Wonderful Pulau Morotai - Website Resmi Dinas Pariwisata dan Kebudayaan Kabupaten Pulau Morotai. Anda dapat melihat semua informasi tentang wisata dan budaya Pulau Morotai, Pulau Morotai, Wisata Morotai, Pulau Dodola, Morotai Island, Museum Perang Dunia, Kabupaten Morotai, Maluku Utara', 'Pulau Morotai, Wisata Morotai, Pulau Dodola, Morotai Island, Museum Perang Dunia, Kabupaten Morotai, Maluku Utara', 'Copyright 2014 Wonderful Morotai - Dinas Pariwisata dan Kebudayaan Kabupaten Pulau Morota', 'uploads/general/Logo.png', '@twitterasasas', '', '', '1', '1', 'https://www.klamby.id/', '2020-05-20 11:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(10) NOT NULL,
  `nama_size` text NOT NULL,
  `desc_size` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(10) NOT NULL,
  `nama_tag` text NOT NULL,
  `desc_tag` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `track_visitor`
--

CREATE TABLE `track_visitor` (
  `track_visitor_id` int(10) UNSIGNED NOT NULL,
  `no_of_visits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ip_address` varchar(20) NOT NULL,
  `requested_url` tinytext NOT NULL,
  `referer_page` tinytext NOT NULL,
  `page_name` tinytext NOT NULL,
  `query_string` tinytext NOT NULL,
  `user_agent` tinytext NOT NULL,
  `is_unique` tinyint(1) NOT NULL DEFAULT 0,
  `access_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track_visitor`
--

INSERT INTO `track_visitor` (`track_visitor_id`, `no_of_visits`, `ip_address`, `requested_url`, `referer_page`, `page_name`, `query_string`, `user_agent`, `is_unique`, `access_date`) VALUES
(628, 1, '::1', '/blog/faqs', 'http://localhost/blog/blog/blogs', 'faqs/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-08 21:36:39'),
(629, 1, '::1', '/blog/faqs/interview_faqs', 'http://localhost/blog/blog/blogs', 'faqs/interview_faqs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2013-11-08 21:36:39'),
(630, 1, '::1', '/blog/', 'http://localhost/blog/faqs/interview_faqs', 'home/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2013-11-08 21:36:40'),
(631, 1, '::1', '/blog/blog', 'http://localhost/blog/faqs/interview_faqs', 'blog/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2013-11-08 21:36:40'),
(632, 1, '::1', '/blog/blog/blogs', 'http://localhost/blog/faqs/interview_faqs', 'blog/blogs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-07-31 21:38:47'),
(633, 1, '::1', '/blog/faqs', 'http://localhost/blog/blog/blogs', 'faqs/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-07-31 21:38:47'),
(634, 1, '::1', '/blog/faqs/interview_faqs', 'http://localhost/blog/blog/blogs', 'faqs/interview_faqs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-07-31 21:38:47'),
(635, 1, '::1', '/blog/', 'http://localhost/blog/faqs/interview_faqs', 'home/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-01 21:38:47'),
(636, 1, '::1', '/blog/blog', 'http://localhost/blog/faqs/interview_faqs', 'blog/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-01 21:38:47'),
(637, 1, '::1', '/blog/blog/blogs', 'http://localhost/blog/faqs/interview_faqs', 'blog/blogs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-02 21:38:47'),
(638, 1, '::1', '/blog/faqs', 'http://localhost/blog/blog/blogs', 'faqs/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-03 21:38:47'),
(639, 1, '::1', '/blog/faqs/interview_faqs', 'http://localhost/blog/blog/blogs', 'faqs/interview_faqs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-03 21:38:47'),
(640, 1, '::1', '/blog/', 'http://localhost/blog/faqs/interview_faqs', 'home/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-04 21:38:47'),
(641, 1, '::1', '/blog/blog', 'http://localhost/blog/faqs/interview_faqs', 'blog/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-04 21:38:47'),
(642, 1, '::1', '/blog/blog/blogs', 'http://localhost/blog/faqs/interview_faqs', 'blog/blogs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-04 21:38:47'),
(643, 1, '::1', '/blog/about', 'http://localhost/blog/blog/blogs', 'about/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-02 21:38:47'),
(644, 1, '::1', '/blog/contact', 'http://localhost/blog/about', 'contact/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-02 21:38:47'),
(645, 1, '::1', '/blog/', 'http://localhost/blog/contact', 'home/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-02 21:38:47'),
(646, 1, '::1', '/blog/blog', 'http://localhost/blog/contact', 'blog/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-02 21:38:47'),
(647, 1, '::1', '/blog/blog/blogs', 'http://localhost/blog/contact', 'blog/blogs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-04 21:38:47'),
(648, 1, '::1', '/blog/', 'http://localhost/blog/blog/blogs', 'home/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-04 21:38:47'),
(649, 1, '::1', '/blog/blog', 'http://localhost/blog/blog/blogs', 'blog/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-03 21:38:47'),
(650, 1, '::1', '/blog/blog/blogs', 'http://localhost/blog/blog/blogs', 'blog/blogs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-03 21:38:47'),
(651, 1, '::1', '/blog/faqs', 'http://localhost/blog/blog/blogs', 'faqs/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-12 00:39:47'),
(652, 1, '::1', '/blog/faqs/interview_faqs', 'http://localhost/blog/blog/blogs', 'faqs/interview_faqs', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-11 20:39:47'),
(653, 1, '::1', '/blog/faqs/interview_faqs/jsf', 'http://localhost/blog/faqs/interview_faqs', 'faqs/interview_faqs', 'jsf', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-11 20:39:47'),
(654, 1, '::1', '/blog/faqs/interview_faqs/struts2', 'http://localhost/blog/faqs/interview_faqs/jsf', 'faqs/interview_faqs', 'struts2', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-11 19:39:47'),
(655, 1, '::1', '/blog/faqs/interview_faqs/hibernate', 'http://localhost/blog/faqs/interview_faqs/struts2', 'faqs/interview_faqs', 'hibernate', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-11 23:39:47'),
(656, 1, '::1', '/blog/faqs/interview_faqs/ibatis', 'http://localhost/blog/faqs/interview_faqs/hibernate', 'faqs/interview_faqs', 'ibatis', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-11 21:39:47'),
(657, 1, '::1', '/blog/signin', 'http://localhost/blog/faqs/interview_faqs/ibatis', 'signin/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2016-08-11 21:39:47'),
(658, 1, '::1', '/blog/account', 'http://localhost/blog/signin', 'account/index', '', 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0', 0, '2013-11-08 21:39:53'),
(659, 0, '::1', '/tracking/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 08:46:44'),
(660, 0, '::1', '/tracking/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 08:57:47'),
(661, 0, '::1', '/tracking/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:00:04'),
(662, 1, '::1', '/tracking/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:00:59'),
(663, 1, '::1', '/tracking/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:01:20'),
(664, 1, '::1', '/tracking/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:07:20'),
(665, 1, '::1', '/tracking/index.php/visitorcontroller/coba', '', 'visitorcontroller/coba', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:18:36'),
(666, 1, '::1', '/tracking/index.php/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:23:02'),
(667, 1, '::1', '/tracking/index.php/visitorcontroller/coba', '', 'visitorcontroller/coba', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:23:29'),
(668, 1, '::1', '/tracking/index.php/', '', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:23:32'),
(669, 1, '::1', '/tracking/index.php/visitorcontroller/coba', '', 'visitorcontroller/coba', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-14 09:23:35'),
(670, 1, '::1', '/tracking/', 'http://localhost/', 'visitorcontroller/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-16 03:38:37'),
(671, 1, '::1', '/eadmin/produk/daftar_produk', 'http://[::1]/eadmin/dashboard', 'produk/daftar_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-16 10:19:03'),
(672, 1, '::1', '/eadmin/alatbayarkurir/daftar_alatbayar_kurir', 'http://[::1]/eadmin/produk/daftar_produk', 'alatbayarkurir/daftar_alatbayar_kurir', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-16 10:19:35'),
(673, 1, '::1', '/eadmin/alatbayarkurir/index.html', 'http://[::1]/eadmin/alatbayarkurir/daftar_alatbayar_kurir', 'alatbayarkurir/index.html', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-16 10:22:08'),
(674, 1, '::1', '/eadmin/alatbayarkurir/daftar_alatbayar_kurir', 'http://[::1]/eadmin/produk/daftar_produk', 'alatbayarkurir/daftar_alatbayar_kurir', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-16 10:22:10'),
(675, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/alatbayarkurir/daftar_alatbayar_kurir', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-16 10:22:11'),
(676, 1, '::1', '/eadmin/auth', 'http://[::1]/eadmin/alatbayarkurir/daftar_alatbayar_kurir', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:56:25'),
(677, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:56:32'),
(678, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:56:32'),
(679, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:57:20'),
(680, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:57:21'),
(681, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:57:22'),
(682, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:57:43'),
(683, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:57:45'),
(684, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 00:58:14'),
(685, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:24:08'),
(686, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:24:31'),
(687, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:24:31'),
(688, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:24:43'),
(689, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:24:43'),
(690, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:25:01'),
(691, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:25:02'),
(692, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:25:21'),
(693, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:25:21'),
(694, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:25:44'),
(695, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:25:45'),
(696, 1, '::1', '/eadmin/produk/daftar_produk', 'http://[::1]/eadmin/dashboard', 'produk/daftar_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:26:11'),
(697, 1, '::1', '/eadmin/produk/add_produk', 'http://[::1]/eadmin/produk/daftar_produk', 'produk/add_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:26:15'),
(698, 1, '::1', '/eadmin/produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/add_produk', 'produk/lib', 'css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:26:16'),
(699, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'http://[::1]/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.css', '/index', 'sets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:26:20'),
(700, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:26:27'),
(701, 1, '::1', '/eadmin/produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/add_produk', 'produk/lib', 'css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:27:10'),
(702, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:27:10'),
(703, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:27:31'),
(704, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:27:31'),
(705, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:29:09'),
(706, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:29:16'),
(707, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:29:28'),
(708, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:29:29'),
(709, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:30:17'),
(710, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:30:52'),
(711, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:31:41'),
(712, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:31:41'),
(713, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:32:02'),
(714, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:32:03'),
(715, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:32:19'),
(716, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:33:39'),
(717, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:33:49'),
(718, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:34:23'),
(719, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:34:24'),
(720, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:16'),
(721, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:16'),
(722, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:39'),
(723, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:40'),
(724, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:48'),
(725, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:49'),
(726, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:56'),
(727, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:38:57'),
(728, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:39:30'),
(729, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:39:50'),
(730, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:39:51'),
(731, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:39:51'),
(732, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:40:05'),
(733, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:40:06'),
(734, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:40:06'),
(735, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:40:45'),
(736, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:40:45'),
(737, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:40:45'),
(738, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:41:27'),
(739, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:41:27'),
(740, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:41:28'),
(741, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:42:19'),
(742, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:42:20'),
(743, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:42:20'),
(744, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:06'),
(745, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:07'),
(746, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:07'),
(747, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:29'),
(748, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:29'),
(749, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:30'),
(750, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:53'),
(751, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:53'),
(752, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:44:53'),
(753, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:45:07'),
(754, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:45:07'),
(755, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:45:07'),
(756, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:53:56'),
(757, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:53:57'),
(758, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:53:57'),
(759, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:54:21'),
(760, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:54:29'),
(761, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:54:37'),
(762, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:54:55'),
(763, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:55:02'),
(764, 1, '::1', '/eadmin/main_assets/admin_asset/assets/bootstrap/scss/_modal.scss', '', '/index', 'sets/admin_asset/assets/bootstrap/scss/_modal.scss', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:55:37'),
(765, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:57:10'),
(766, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 02:57:14'),
(767, 1, '::1', '/eadmin/auth', 'http://[::1]/eadmin/auth', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 05:21:44'),
(768, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 05:21:57'),
(769, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 05:21:57'),
(770, 1, '::1', '/eadmin/produk/daftar_produk', 'http://[::1]/eadmin/dashboard', 'produk/daftar_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 05:22:00'),
(771, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/produk/daftar_produk', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-17 05:22:03'),
(772, 1, '::1', '/eadmin/auth', '', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 13:59:49'),
(773, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:00:01'),
(774, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:00:01'),
(775, 1, '::1', '/eadmin/home', '', 'home/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:00:07'),
(776, 1, '::1', '/eadmin/favicon.ico', 'http://[::1]/eadmin/home', '/index', '.ico', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:00:09'),
(777, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:00:11'),
(778, 1, '::1', '/eadmin/product/favicon.ico', 'http://[::1]/eadmin/product/new_arrivals', 'product/favicon.ico', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:00:12'),
(779, 1, '::1', '/eadmin/home', '', 'home/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-18 14:11:01'),
(780, 1, '::1', '/eadmin/auth', '', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:30:52'),
(781, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:00'),
(782, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:00'),
(783, 1, '::1', '/eadmin/produk/voucher/daftar_voucher', 'http://[::1]/eadmin/dashboard', 'voucher/daftar_voucher', 'oucher', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:08'),
(784, 1, '::1', '/eadmin/produk/add_produk', 'http://[::1]/eadmin/produk/voucher/daftar_voucher', 'produk/add_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:10'),
(785, 1, '::1', '/eadmin/produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/add_produk', 'produk/lib', 'css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:12'),
(786, 1, '::1', '/eadmin/plugins/images/favicon.png', 'http://[::1]/eadmin/produk/add_produk', '/index', '/images/favicon.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:12'),
(787, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'http://[::1]/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.css', '/index', 'sets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:31:48'),
(788, 1, '::1', '/eadmin/kategorimerek/daftar_kategori_merek', 'http://[::1]/eadmin/produk/add_produk', 'kategorimerek/daftar_kategori_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:32:04'),
(789, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'http://[::1]/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.css', '/index', 'sets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:32:15'),
(790, 1, '::1', '/eadmin/kategorimerek/post_kategori', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/post_kategori', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:32:51'),
(791, 1, '::1', '/eadmin/kategorimerek/daftar_kategori_merek', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/daftar_kategori_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:32:51'),
(792, 1, '::1', '/eadmin/produk/add_produk', 'http://[::1]/eadmin/produk/voucher/daftar_voucher', 'produk/add_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:33:06'),
(793, 1, '::1', '/eadmin/produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/add_produk', 'produk/lib', 'css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:33:07'),
(794, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'http://[::1]/eadmin/main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.css', '/index', 'sets/admin_asset/assets/plugins/bower_components/custom-select/select2-spinner.gif', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:33:37'),
(795, 1, '::1', '/eadmin/produk/upload', 'http://[::1]/eadmin/produk/add_produk', 'produk/upload', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:34:33'),
(796, 1, '::1', '/eadmin/produk/post_produk', 'http://[::1]/eadmin/produk/add_produk', 'produk/post_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:34:33'),
(797, 1, '::1', '/eadmin/produk/add_produk', 'http://[::1]/eadmin/produk/add_produk', 'produk/add_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:36:17'),
(798, 1, '::1', '/eadmin/produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/add_produk', 'produk/lib', 'css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 07:36:18'),
(799, 1, '::1', '/eadmin/auth', 'http://[::1]/eadmin/produk/add_produk', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:30:09'),
(800, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:30:15'),
(801, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:30:16'),
(802, 1, '::1', '/eadmin/kategorimerek/daftar_kategori_merek', 'http://[::1]/eadmin/dashboard', 'kategorimerek/daftar_kategori_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:30:19'),
(803, 1, '::1', '/eadmin/kategorimerek/update_kategori/1', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/update_kategori', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:30:24'),
(804, 1, '::1', '/eadmin/kategorimerek/daftar_kategori_merek', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/daftar_kategori_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:30:25'),
(805, 1, '::1', '/eadmin/kategorimerek/post_merek', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/post_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:31:20'),
(806, 1, '::1', '/eadmin/kategorimerek/daftar_kategori_merek', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/daftar_kategori_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:31:21'),
(807, 1, '::1', '/eadmin/auth', '', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:35:53'),
(808, 1, '::1', '/eadmin/dashboard', '', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:35:53'),
(809, 1, '::1', '/eadmin/auth', '', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:35:59'),
(810, 1, '::1', '/eadmin/dashboard', '', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:35:59'),
(811, 1, '::1', '/eadmin/sitemap', '', 'sitemap/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-19 14:37:16'),
(812, 1, '::1', '/eadmin/auth', '', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 02:26:09'),
(813, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 02:26:16');
INSERT INTO `track_visitor` (`track_visitor_id`, `no_of_visits`, `ip_address`, `requested_url`, `referer_page`, `page_name`, `query_string`, `user_agent`, `is_unique`, `access_date`) VALUES
(814, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 02:26:16'),
(815, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/dashboard', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 02:27:00'),
(816, 1, '::1', '/eadmin/pengaturan/plugins/images/favicon.png', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'pengaturan/plugins', 'images/favicon.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 02:27:01'),
(817, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/dashboard', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 03:10:15'),
(818, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:15:36'),
(819, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/dashboard', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:17:22'),
(820, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:31:26'),
(821, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/dashboard', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:32:43'),
(822, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:32:59'),
(823, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/dashboard', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:33:48'),
(824, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:37:36'),
(825, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:37:36'),
(826, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:38:33'),
(827, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:38:33'),
(828, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:38:39'),
(829, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:40:05'),
(830, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:40:11'),
(831, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:41:40'),
(832, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:41:46'),
(833, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:45:45'),
(834, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:45:45'),
(835, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:45:53'),
(836, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:47:44'),
(837, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:47:50'),
(838, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:48:19'),
(839, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:48:25'),
(840, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:48:25'),
(841, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:48:29'),
(842, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:56:13'),
(843, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:56:19'),
(844, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:57:46'),
(845, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:57:52'),
(846, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:57:52'),
(847, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:57:58'),
(848, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:57:58'),
(849, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:58:04'),
(850, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 04:58:04'),
(851, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:04:02'),
(852, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:04:18'),
(853, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:04:23'),
(854, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:04:25'),
(855, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:04:36'),
(856, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:14'),
(857, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:15'),
(858, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:21'),
(859, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:38'),
(860, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:39'),
(861, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:40'),
(862, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:41'),
(863, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:05:46'),
(864, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:06:52'),
(865, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:06:54'),
(866, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:06:55'),
(867, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:06:55'),
(868, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:06:59'),
(869, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:07:06'),
(870, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:07:07'),
(871, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:07:08'),
(872, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:07:09'),
(873, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:07:48'),
(874, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:08:27'),
(875, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:08:33'),
(876, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:10:03'),
(877, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:10:05'),
(878, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:10:10'),
(879, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:10:14'),
(880, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:10:14'),
(881, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:10:22'),
(882, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:12:32'),
(883, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:12:33'),
(884, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:12:34'),
(885, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:12:35'),
(886, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:12:41'),
(887, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:13:44'),
(888, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:13:45'),
(889, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:13:46'),
(890, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:13:47'),
(891, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:13:52'),
(892, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:14:27'),
(893, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:14:28'),
(894, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:14:34'),
(895, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:14:57'),
(896, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:14:58'),
(897, 1, '::1', '/eadmin/produk/daftar_produk', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'produk/daftar_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:01'),
(898, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:01'),
(899, 1, '::1', '/eadmin/produk/add_produk', 'http://[::1]/eadmin/produk/daftar_produk', 'produk/add_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:02'),
(900, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:03'),
(901, 1, '::1', '/eadmin/produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/add_produk', 'produk/lib', 'css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:04'),
(902, 1, '::1', '/eadmin/produk/daftar_produk', 'http://[::1]/eadmin/produk/add_produk', 'produk/daftar_produk', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:09'),
(903, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:10'),
(904, 1, '::1', '/eadmin/produk/edit_produk/1', 'http://[::1]/eadmin/produk/daftar_produk', 'produk/edit_produk', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:12'),
(905, 1, '::1', '/eadmin/produk/list_files/4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/list_files', '4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:13'),
(906, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:13'),
(907, 1, '::1', '/eadmin/produk/edit_produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/edit_produk', 'lib/css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:13'),
(908, 1, '::1', '/eadmin/produk/plugins/images/favicon.png', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/plugins', 'images/favicon.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:13'),
(909, 1, '::1', '/eadmin/produk/update_produk/1', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/update_produk', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:16'),
(910, 1, '::1', '/eadmin/produk/edit_produk/1', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/edit_produk', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:16'),
(911, 1, '::1', '/eadmin/produk/list_files/4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/list_files', '4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:16'),
(912, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:16'),
(913, 1, '::1', '/eadmin/produk/edit_produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/edit_produk', 'lib/css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:15:17'),
(914, 1, '::1', '/eadmin/produk/edit_produk/1', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/edit_produk', '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:28'),
(915, 1, '::1', '/eadmin/produk/list_files/4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/list_files', '4ed1cb38b2e9a8823f40b08ea94805fb5946f8e5df6a75f926a9b1db0abaabea72d20b871c67415f1ac209e195424b0cd6029dbb8e7d7cf5951a41378a148225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:28'),
(916, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:29'),
(917, 1, '::1', '/eadmin/produk/edit_produk/lib/css/wysiwyg-color.css', 'http://[::1]/eadmin/produk/edit_produk/1', 'produk/edit_produk', 'lib/css/wysiwyg-color.css', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:29'),
(918, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/produk/edit_produk/1', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:33'),
(919, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:33'),
(920, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:16:40'),
(921, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/produk/edit_produk/1', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:20:17'),
(922, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:20:18'),
(923, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:20:23'),
(924, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/produk/edit_produk/1', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:18'),
(925, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:18'),
(926, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/produk/edit_produk/1', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:19'),
(927, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:20'),
(928, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:23'),
(929, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:23'),
(930, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:24'),
(931, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:21:35'),
(932, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:30'),
(933, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:30'),
(934, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:31'),
(935, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:32'),
(936, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:36'),
(937, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:48'),
(938, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:52'),
(939, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:52'),
(940, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:56'),
(941, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:22:56'),
(942, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:24:41'),
(943, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:25:23'),
(944, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:25:23'),
(945, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:25:26'),
(946, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:04'),
(947, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:05'),
(948, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:06'),
(949, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:07'),
(950, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:11'),
(951, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:11'),
(952, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:12'),
(953, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:16'),
(954, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:16'),
(955, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:17'),
(956, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:22'),
(957, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:32'),
(958, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:33'),
(959, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/3', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:28:38'),
(960, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:30:56'),
(961, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:31:11');
INSERT INTO `track_visitor` (`track_visitor_id`, `no_of_visits`, `ip_address`, `requested_url`, `referer_page`, `page_name`, `query_string`, `user_agent`, `is_unique`, `access_date`) VALUES
(962, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:32:12'),
(963, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:03'),
(964, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:04'),
(965, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:10'),
(966, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:10'),
(967, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:11'),
(968, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:20'),
(969, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:20'),
(970, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:23'),
(971, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:23'),
(972, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:28'),
(973, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:28'),
(974, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:31'),
(975, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:31'),
(976, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:46'),
(977, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:33:46'),
(978, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:34:32'),
(979, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:34:33'),
(980, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:35:20'),
(981, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:35:20'),
(982, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:36:36'),
(983, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:36:36'),
(984, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:04'),
(985, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:04'),
(986, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:09'),
(987, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:09'),
(988, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:14'),
(989, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:14'),
(990, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:57'),
(991, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:37:57'),
(992, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:00'),
(993, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:00'),
(994, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:05'),
(995, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:05'),
(996, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:41'),
(997, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:42'),
(998, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:38:47'),
(999, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:41:22'),
(1000, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:41:56'),
(1001, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:41:56'),
(1002, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:42:01'),
(1003, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:42:01'),
(1004, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:43:40'),
(1005, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:43:40'),
(1006, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:44:27'),
(1007, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:46:11'),
(1008, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:46:35'),
(1009, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:46:36'),
(1010, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:47:05'),
(1011, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:47:05'),
(1012, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:47:11'),
(1013, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:47:11'),
(1014, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:47:29'),
(1015, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:47:29'),
(1016, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:50:02'),
(1017, 1, '::1', '/eadmin/pengaturan/generalpage/update_banner/2', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_banner', 'ate_banner/2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:50:55'),
(1018, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:50:55'),
(1019, 1, '::1', '/eadmin/main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', '', '/index', 'sets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.js.map', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 05:50:57'),
(1020, 1, '::1', '/eadmin/auth', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:24:52'),
(1021, 1, '::1', '/eadmin/auth/login', 'http://[::1]/eadmin/auth', 'auth/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:00'),
(1022, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/auth', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:00'),
(1023, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/dashboard', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:06'),
(1024, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:11'),
(1025, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:11'),
(1026, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:14'),
(1027, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:15'),
(1028, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:34'),
(1029, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:25:34'),
(1030, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:27:51'),
(1031, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:27:51'),
(1032, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:28:54'),
(1033, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:28:54'),
(1034, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:54:51'),
(1035, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:54:51'),
(1036, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:56:57'),
(1037, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 08:56:57'),
(1038, 1, '::1', '/eadmin/sitemap/', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'sitemap/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:09:01'),
(1039, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:09:01'),
(1040, 1, '::1', '/eadmin/auth', '', 'auth/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:22:38'),
(1041, 1, '::1', '/eadmin/dashboard', '', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:22:38'),
(1042, 1, '::1', '/eadmin/home', '', 'home/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:22:44'),
(1043, 1, '::1', '/eadmin/pengaturan/generalpage/update_seopage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/update_seopage', 'te_seopage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:24:55'),
(1044, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:24:55'),
(1045, 1, '::1', '/eadmin/home', '', 'home/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 09:24:59'),
(1046, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:22:19'),
(1047, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:22:19'),
(1048, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:23:38'),
(1049, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:23:38'),
(1050, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:23:43'),
(1051, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:23:43'),
(1052, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:45'),
(1053, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:45'),
(1054, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:47'),
(1055, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:47'),
(1056, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:49'),
(1057, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:49'),
(1058, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:50'),
(1059, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:24:50'),
(1060, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:25:25'),
(1061, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:25:26'),
(1062, 1, '::1', '/eadmin/product/detail_product/ambarawa-outer-kayu', '', 'product/detail_product', 'ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:25:29'),
(1063, 1, '::1', '/eadmin/product/plugins/images/favicon.png', 'http://[::1]/eadmin/product/detail_product/ambarawa-outer-kayu', 'product/plugins', 'images/favicon.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:25:30'),
(1064, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:28:06'),
(1065, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:28:06'),
(1066, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:28:09'),
(1067, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:28:09'),
(1068, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:29:25'),
(1069, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 10:29:25'),
(1070, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:03:51'),
(1071, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:03:51'),
(1072, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:03:52'),
(1073, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:03:53'),
(1074, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:03:55'),
(1075, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:03:55'),
(1076, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:17:22'),
(1077, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:17:23'),
(1078, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:17:24'),
(1079, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:17:25'),
(1080, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:17:27'),
(1081, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:17:27'),
(1082, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:18:21'),
(1083, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:18:21'),
(1084, 1, '::1', '/eadmin/home', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'home/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:18:22'),
(1085, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:19:24'),
(1086, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:19:24'),
(1087, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:19:26'),
(1088, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:19:27'),
(1089, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:19:35'),
(1090, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:19:35'),
(1091, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:22:04'),
(1092, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:22:04'),
(1093, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:24:04'),
(1094, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:24:04'),
(1095, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/home', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:24:07'),
(1096, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:24:07'),
(1097, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:24:09'),
(1098, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:24:09'),
(1099, 1, '::1', '/eadmin/product/detail_product/1/index.php/ambarawa-outer-kayu', '', 'product/detail_product', '1/index.php/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:37'),
(1100, 1, '::1', '/eadmin/product/detail_product/1/index.php/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/index.php/ambarawa-outer-kayu', 'product/detail_product', '1/index.php/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:37'),
(1101, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/product/detail_product/1/index.php/ambarawa-outer-kayu', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:39'),
(1102, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:40'),
(1103, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:42'),
(1104, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:42'),
(1105, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:56'),
(1106, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:57'),
(1107, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/product/detail_product/1/index.php/ambarawa-outer-kayu', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:58'),
(1108, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:39:58'),
(1109, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:00'),
(1110, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:00'),
(1111, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:48'),
(1112, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:48'),
(1113, 1, '::1', '/eadmin/product/new_arrivals', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/new_arrivals', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:50'),
(1114, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/new_arrivals', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:50'),
(1115, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:53'),
(1116, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:40:53'),
(1117, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:41:05'),
(1118, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:41:05'),
(1119, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:42:26');
INSERT INTO `track_visitor` (`track_visitor_id`, `no_of_visits`, `ip_address`, `requested_url`, `referer_page`, `page_name`, `query_string`, `user_agent`, `is_unique`, `access_date`) VALUES
(1120, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:42:26'),
(1121, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:44:04'),
(1122, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 11:44:04'),
(1123, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:37:27'),
(1124, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:37:27'),
(1125, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/new_arrivals', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:40:54'),
(1126, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:40:54'),
(1127, 1, '::1', '/eadmin/home', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'home/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:46:43'),
(1128, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/home', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:46:46'),
(1129, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:46:46'),
(1130, 1, '::1', '/eadmin/product/search_product?kat=pakaian%20anak', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/search_product', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:47:42'),
(1131, 1, '::1', '/eadmin/product/uploads/general/Logo.png', 'http://[::1]/eadmin/product/search_product?kat=pakaian%20anak', 'product/uploads', 'general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:47:42'),
(1132, 1, '::1', '/eadmin/kategorimerek/daftar_kategori_merek', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'kategorimerek/daftar_kategori_merek', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:49:02'),
(1133, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/kategorimerek/daftar_kategori_merek', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:49:05'),
(1134, 1, '::1', '/eadmin/sitemap/', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'sitemap/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:49:07'),
(1135, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:49:07'),
(1136, 1, '::1', '/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'http://[::1]/eadmin/product/search_product?kat=pakaian%20anak', 'product/detail_product', '1/ambarawa-outer-kayu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:50:19'),
(1137, 1, '::1', '/eadmin/product/detail_product/1/uploads/general/Logo.png', 'http://[::1]/eadmin/product/detail_product/1/ambarawa-outer-kayu', 'product/detail_product', '1/uploads/general/Logo.png', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:50:19'),
(1138, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:51:14'),
(1139, 1, '::1', '/eadmin/sitemap/', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'sitemap/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:51:15'),
(1140, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:51:15'),
(1141, 1, '::1', '/eadmin/sitemap/', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'sitemap/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:51:47'),
(1142, 1, '::1', '/eadmin/pengaturan/generalpage/daftar_generalpage', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'generalpage/daftar_generalpage', 'eneralpage', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:51:47'),
(1143, 1, '::1', '/eadmin/dashboard', 'http://[::1]/eadmin/pengaturan/generalpage/daftar_generalpage', 'dashboard/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0, '2020-05-20 12:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `no_telepon` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `foto_thumb` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `no_telepon`, `alamat`, `foto`, `foto_thumb`, `date`) VALUES
(2, 'batikpati', '827ccb0eea8a706c4c34a16891f84e7b', 'Batil Pati Indah', 'pengerajinbatik.pati@gmail.com', '081242347115', '', 'uploads/user/92a17229dc4f75444a234aa8005e29e9.jpg', 'uploads/user/thumbs/92a17229dc4f75444a234aa8005e29e9.jpg', '2019-09-29 23:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(10) NOT NULL,
  `kode_voucher` text NOT NULL,
  `potongan` text NOT NULL,
  `jumlah_voucher` text NOT NULL,
  `voucher_terpakai` text NOT NULL DEFAULT '0',
  `masa_berlaku` text NOT NULL,
  `tanggal_post` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `kode_warna` text NOT NULL,
  `nama_warna` text NOT NULL,
  `desc_warna` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alatbayar`
--
ALTER TABLE `alatbayar`
  ADD PRIMARY KEY (`id_alatbayar`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `general_page`
--
ALTER TABLE `general_page`
  ADD PRIMARY KEY (`id_general_page`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id_homepage`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id_laporan_penjualan`);

--
-- Indexes for table `laporan_produk`
--
ALTER TABLE `laporan_produk`
  ADD PRIMARY KEY (`id_laporan_produk`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `seo_page`
--
ALTER TABLE `seo_page`
  ADD PRIMARY KEY (`id_seo_page`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `track_visitor`
--
ALTER TABLE `track_visitor`
  ADD PRIMARY KEY (`track_visitor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alatbayar`
--
ALTER TABLE `alatbayar`
  MODIFY `id_alatbayar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_page`
--
ALTER TABLE `general_page`
  MODIFY `id_general_page` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id_homepage` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id_laporan_penjualan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_produk`
--
ALTER TABLE `laporan_produk`
  MODIFY `id_laporan_produk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_page`
--
ALTER TABLE `seo_page`
  MODIFY `id_seo_page` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_visitor`
--
ALTER TABLE `track_visitor`
  MODIFY `track_visitor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1144;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
