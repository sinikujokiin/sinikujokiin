-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2022 pada 02.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sinikujokiin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `title`, `kategori`, `slug`, `deskripsi_singkat`, `content`, `image`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tips untuk Mahasiswa agar Lulus Tepat Waktu', 'Kuliah', 'tips-untuk-mahasiswa-agar-lulus-tepat-waktu', 'Banyak tantangan yang harus disikapi dengan bijak. Sebagai contoh, tekun belajar dan rajin mengerjakan tugas adalah satu hal yang bisa mendorong diri untuk lulus tepat waktu. Selain itu, banyak pula hal yang dapat dilakukan untuk lulus tepat waktu.', '<p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Menyelesaikan program perkuliahan tepat waktu adalah hal yang inginkan oleh semua mahasiswa. Jika jenjangnya S1, maka lulus kuliah tepat waktu rata-rata adalah empat tahun, bahkan bisa kurang jika mengambil semester pendek. Sedangkan untuk program D3, maka lulus kuliah tepat waktu adalah tiga tahun.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Walaupun begitu, banyak tantangan yang harus disikapi dengan bijak. Sebagai contoh, tekun belajar dan rajin mengerjakan tugas adalah satu hal yang bisa mendorong diri untuk lulus tepat waktu. Selain itu, banyak pula hal yang dapat dilakukan untuk lulus tepat waktu.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Berikut adalah beberapa tips untuk mahasiswa agar lulus tepat waktu.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">1. Ketahui Kewajiban sebagai Mahasiswa</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Kewajiban semua mahasiswa di seluruh dunia itu sama saja yaitu belajar berbagai macam ilmu sesuai dengan jurusan yang diambil. Jika selama proses belajar dijalankan dengan sungguh-sungguh tentu akan mendapatkan nilai yang bagus. Dengan begitu, perjalanan selama kuliah akan berjalan dengan lancar tanpa adanya hambatan seperti bersusah payah harus mengulang mata pelajaran yang sama di tahun berikutnya. Sehingga waktu yang dimiliki bisa dimanfaatkan untuk memikirkan hal lain yang berhubungan dengan kuliah. Contohnya, judul skripsi atau mencari-cari jurnal yang sesuai dengan tema skripsi yang diambil.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">2. Maksimalkan Jumlah SKS</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Setiap perguruan tinggi pastinya memiliki sistem satuan kredit semester atau biasa disebut dengan SKS. Dengan sistem ini, mahasiswa dimungkinkan untuk memilih sendiri mata kuliah yang akan diambil dalam satu semester. Namun, terdapat batasan maksimum SKS yang telah ditentukan, yaitu sebanyak 24 SKS.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Perhatikan jumlah SKS setiap semester, bila setiap menyusun mata kuliah dan masih ada jumlah SKS tersisa maka tidak ada salahnya mengambil mata kuliah di semester atas. Sehingga seluruh SKS terisi full tanpa ada terbuang sia-sia. Perlu diingatkan, isilah SKS sesuai dengan kemampuan belajar. Konsultasikan kepada dosen sangat baik dilakukan agar proses kuliah bisa berjalan dengan lancar.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">3. Ikuti Sesi Kuliah dengan Baik</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Walau setiap mahasiswa memiliki jatah absen sebanyak tiga kali dari jumlah pertemuan di kelas, namun amat sangat disayangkan kalau kehadiran kuliah tidak dimanfaatkan dengan maksimal. Ingatlah bahwa kehadiran di kelas sangat berpengaruh pada ilmu yang didapat.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Memang benar kalau tidak masuk kuliah, mahasiswa bisa membaca buku dimana saja. Tapi, mendengar penjelasan langsung dari dosen tentu akan memaksimalkan ilmu pengetahuan yang didapat. Apalagi, pada umumnya setiap dosen akan memberikan contoh atau kasus sederhana agar mahasiswa lebih paham terhadap apa yang dijelaskan. Oleh sebab itu, ikuti sesi kuliah dengan baik agar ilmu yang didapat jadi optimal.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">4. Atur Jadwal Bimbingan dengan Dosen</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Hampir setiap mahasiswa beranggapan bahwa sebagian hidup dan mati sebagai mahasiswa selama di bangku kuliah ada di tangan dosen pembimbing. Sebab, dosenlah yang akan membimbing, mengajari selama proses mengerjakan skripsi hingga selesai.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Jadi, semakin sering bertemu dosen untuk berdiskusi tentang topik skripsi, maka pengerjaan skripsi bisa jadi lebih cepat selesai. Mengingat jadwal dosen yang padat, baiknya aturlah jadwal bimbingan dengan baik. Pilihlah hari yang tepat tanpa harus mengganggu jadwal kamu atau dosen.</p><p style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Hal-hal di atas adalah beberapa tips yang bisa dilakukan agar bisa lulus tepat waktu. Walaupun begitu, pada akhirnya, motivasi diri adalah hal yang paling mendasar yang dapat menunjang tercapainya keinginan tersebut.</p>', '632ab3384d8c7-tips-untuk-mahasiswa-agar-lulus-tepat-waktu-22-09-21.jpg', 'Aktif', 1, '2022-08-28 06:46:57', '2022-09-21 13:46:16', NULL),
(2, 'Jangan Salah Pilih Jurusan Kuliah, Ini Tipsnya', 'Ekonomi', 'jangan-salah-pilih-jurusan-kuliah-ini-tipsnya', 'Setelah lulus dari jenjang pendidikan SMA dan setaranya, langkah selanjutnya yang banyak diambil pelajar adalah melanjutkan pendidikan di perguruan tinggi. Menyandang status sebagai mahasiswa dan mahasiswi memang memberikan kebanggaan tersendiri, apalagi hingga mendapatkan gelar sarjana.', '<p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Setelah lulus dari jenjang pendidikan SMA dan setaranya, langkah selanjutnya yang banyak diambil pelajar adalah melanjutkan pendidikan di perguruan tinggi. Menyandang status sebagai mahasiswa dan mahasiswi memang memberikan kebanggaan tersendiri, apalagi hingga mendapatkan gelar sarjana.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Di sinilah pemikiran yang jernih dan matang dibutuhkan untuk memilih jurusan dan perguruan mana yang akan diambil. Persoalan yang paling sering dihadapi adalah bimbang dalam memilih kemana harus melanjutkan. Jurusan apa yang harus dipilih? Penyebabnya ini bisa  dikarenakan minimnya pengetahuan tentang jurusan-jurusan, tidak tahu akan kemampuannya sendiri, masih tidak mengerti passion/bidang yang diminati, adanya desakan dari orangtua, adanya keinginan untuk mengikuti teman, hingga gengsi jadi ikut-ikutan. Pada akhirnya yang terjadi adalah salah pilih jurusan!</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\">Jika kalian memilih jurusan yang tidak sesuai, akibatnya bisa cukup fatal. Di awal kuliah mungkin pengaruhnya masih belum terasa masih menyenangkan-menyenangkan saja. Bertemu dengan teman-teman baru, memulai suatu hal yang baru, dan beradaptasi dengan lingkungan yg baru. Materi yang diberikan di semester-semester awal juga tidak memberatkan karena masih berupa pengenalan materi. Semua ini adalah masa peralihan bagi mahasiswa-mahasiwi baru dari masa SMA.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\">Tetapi seiring dengan berjalannya waktu, materi yang diajarkan juga pasti akan semakin mendalam. Mau tidak mau kalian harus masuk ke dalamnya. Di sinilah rasa risih dan penolakan akan muncul. Kalian menjadi tidak mengerti dengan apa yang disampaikan yang berujung pada banyaknya keluhan-keluhan. Karena tidak sesuai dengan minatnya, maka rasa malas pun bermunculan. Mulai dari malas mengerjakan tugas-tugas, sering bolos kelas, mengerjakan segala sesuatunya sembarangan, hingga mendapat prestasi yang buruk. Bahkan bisa sampai tidak lulus dan harus mengulang mata kuliah yang sama.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\">Nah untuk meminimalisir dan mencegah salah pilih jurusan pada saat masuk ke perguruan tinggi, ada beberapa tips yang bisa kalian terapkan:</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Pahami diri kalian sendiri</span><br>Berpikirlah secara jernih dan matang tentang bidang mana yang menjadi passion/minat kalian. Bermimpi dan bayangkan ingin jadi seperti apa di masa depan. Jika masih belum bisa menemukannya, kalian bisa meminta bantuan pada psikolog.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Jangan memilih karena didesak</span><br>Jika didesak oleh orangtua untuk masuk ke jurusan yang tidak sesuai dengan minat kalian, berusahalah untuk meyakinkan mereka. Pertahankan apa yang kalian inginkan. Karena pada akhirnya kalianlah yang akan menjalaninya. Tetapi harus disesuaikan dengan keuangan orangtua juga ya.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Carilah informasi sebanyak-banyaknya</span><br>Berusahalah mendapatkan informasi yang banyak mengenai jurusan-jurusan yang ada. Pelajarilah apa saja yang terdapat dalam masing-masing jurusan. Kemudian lihat apakah sesuai dengan bidang yang kalian mau serta bagaimana prospek ke depannya.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Pikirkan jangka panjangnya</span><br>Selalu memikirkan jangka panjang ke depannya. Jangan hanya melihat keuntungan sementara saja, misalnya karena tempatnya enak, ikut-ikutan teman atau bahkan karena bisa mendapatkan status yang keren. Pikirkan bahwa hal ini menyangkut masa depan kalian dan apa yang bisa diperbuat di masa depan.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Pertimbangkan fisik dan mental</span><br>Fisik dan mental juga merupakan hal yang penting dan berpengaruh. Pilihlah jurusan yang memang sesuai dengan fisik dan mental kalian. Agar nantinya tetap bisa bertahan dan tidak berhenti di tengah jalan.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Urutkan pilihan jurusan yang diinginkan dan memungkinkan</span><br>Bagi kalian yang memiliki banyak alternatif pilihan jurusan, tulislah dan urutkanlah mulai dari bidang yang paling disenangi dan memungkinkan. Setelah ituh seleksi satu-persatu dari yang paling akhir. Setelah mempertimbangkannya dari segala sisi, kalian pasti akan menemukan satu pilihan yang paling sesuai.</p><p style=\"margin-right: 0px; margin-bottom: 1.25em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; vertical-align: baseline; text-rendering: optimizelegibility; color: rgb(51, 51, 51);\">Intinya jadilah mahasiswa dan mahasiswi yang kelak dapat mencintai jurusan yang kalian pilih agar bisa profesional di bidangnya. Karena segala sesuatu yang dilakukan dengan senang hati dan sesuai dengan minat, pasti akan memberikan hasil yang memuaskan pula. Semoga sukses ya!</p>', '632ab2028e697-jangan-salah-pilih-jurusan-kuliah-ini-tipsnya-22-09-21.jpg', 'Aktif', 1, '2022-08-28 17:35:25', '2022-09-21 13:43:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_order`
--

CREATE TABLE `cara_order` (
  `id_cara_order` int(10) UNSIGNED NOT NULL,
  `urutan` int(2) NOT NULL,
  `judul_cara_order` varchar(200) NOT NULL,
  `deskripsi_cara_order` text NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cara_order`
--

INSERT INTO `cara_order` (`id_cara_order`, `urutan`, `judul_cara_order`, `deskripsi_cara_order`, `gambar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Chat Kami di Whatsapp / DM Instagram', 'WA: 085770521528 | Instagram: @sinikujokiin_', 'chat-kami-di-whatsapp-dm-instagram-22-09-22.webp', 'Aktif', '2022-07-31 10:38:58', '2022-09-22 19:39:02', NULL),
(2, 2, 'Isi Format Order', 'Mengisi format orderan dengan detail beserta deadlinenya', 'isi-format-order-22-09-22.webp', 'Aktif', '2022-07-31 12:15:25', '2022-09-22 19:43:19', NULL),
(3, 3, 'Lakukan Pembayaran', 'Pembayaran bisa melalui bank BCA 8720680182 a/n Intan Damayanti', 'lakukan-pembayaran-22-09-22.webp', 'Aktif', '2022-07-31 12:15:53', '2022-09-22 19:59:23', NULL),
(4, 4, 'Menunggu Hasil Orderan', 'Tim kami akan segera menyelesaikan orderan kamu', 'menunggu-hasil-orderan-22-09-22.webp', 'Aktif', '2022-07-31 12:16:19', '2022-09-22 20:03:53', NULL),
(5, 5, 'Orderan Selesai', 'Admin akan mengirimkan hasil orderan kamu', 'orderan-selesai-22-09-22.webp', 'Aktif', '2022-07-31 12:16:40', '2022-09-22 20:07:01', NULL),
(6, 10, 'a', 'a', 'a-22-07-31.webp', 'Aktif', '2022-07-31 13:00:41', '2022-07-31 13:05:40', '2022-07-31 13:05:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(10) UNSIGNED NOT NULL,
  `urutan` int(2) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `urutan`, `pertanyaan`, `jawaban`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Apakah privasi dan keamanan pelanggan terjaga ?', 'Tidak perlu khawatir! Sinikujokiin selalu mengutamakan privasi dan keamanan pelanggan, dijamin 100% tidak akan ketahuan guru atau dosennya ya!', 'Aktif', '2022-08-02 05:53:49', '2022-09-10 14:30:05', NULL),
(2, 0, 'Berapa lama proses pengerjaan di Sinikujokiin?', 'Kami bisa mengerjakan sesuai request kamu. Yang pasti kita kerjakan sesuai deadline atau bahkan sebelum deadline kamu ya!', 'Aktif', '2022-09-10 14:28:52', '2022-09-10 14:31:52', NULL),
(3, 0, 'Apakah pembayaran bisa DP dulu?', 'Tentu bisa. Sinikujokiin hadir untuk memudahkan kamu dalam pembayaran. Disini kamu bisa DP 40-50% ya setelah pengerjaan selesai baru kami bisa kasih tugasnya setelah kamu lakukan pelunasan. Jangan takut ditipu, disini 100% Trusted!', 'Aktif', '2022-09-10 14:29:44', '2022-09-10 14:34:33', NULL),
(4, 0, 'Apakah bisa COD?', 'Bisa dong! Kamu hanya perlu datang ke kantor kami di Bogor. Pastikan hubungi kami terlebih dahulu ya!', 'Aktif', '2022-09-10 14:36:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fitur`
--

CREATE TABLE `fitur` (
  `id_fitur` int(10) UNSIGNED NOT NULL,
  `nama_fitur` varchar(200) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `link` text NOT NULL,
  `ikon` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fitur`
--

INSERT INTO `fitur` (`id_fitur`, `nama_fitur`, `deskripsi_singkat`, `deskripsi`, `link`, `ikon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Serba Bisa', 'Semua Jurusan Bisa', 'Sinikujokiin telah mengerjakan hampir 90% dari berbagai jurusan dengan hasil yang sangat baik dan memuaskan.', 'https://api.whatsapp.com/send/?phone=6285770521528&text&type=phone_number&app_absent=0', 'fa fa-book-open', 'Aktif', '2022-08-04 02:07:29', '2022-09-19 13:38:29', NULL),
(2, 'Privasi dan Keamanan', 'Privasi Terjaga 100%', 'Sinikujokiin telah berkomitmen untuk selalu menjaga dan meningkatkan keamanan serta privasi pelanggan dalam hal apapun secara jelas dan tegas.', 'https://api.whatsapp.com/send/?phone=6285770521528&text&type=phone_number&app_absent=0', 'fa fa-lock', 'Aktif', '2022-08-04 02:13:14', '2022-09-19 13:38:23', NULL),
(3, 'Jam Kerja', 'Layanan Cepat 24 Jam', 'Sinikujokiin memberikan konsultasi secara cepat dan tepat selama 24 jam melalui WhatsApp dan Instagram.', 'https://api.whatsapp.com/send/?phone=6285770521528&text&type=phone_number&app_absent=0', 'fa fa-clock', 'Aktif', '2022-08-04 02:15:13', '2022-09-19 13:38:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_joki`
--

CREATE TABLE `jenis_joki` (
  `id_jenis_joki` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_joki`
--

INSERT INTO `jenis_joki` (`id_jenis_joki`, `nama_jenis`, `deskripsi`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Joki Tugas Individu', 'Meringankan beban dan pikiran diri sendiri ketika ada tugas mingguan.', '630beed04749a-joki-tugas-individu-22-08-29.webp', 'Aktif', '2022-08-29 05:40:16', NULL, NULL),
(2, 'Joki Tugas Kelompok', 'Menghemat waktu untuk berdiskusi dan mengatur jadwal kelompok.', '630beee66ec9a-joki-tugas-kelompok-22-08-29.webp', 'Aktif', '2022-08-29 05:40:38', NULL, NULL),
(3, 'Joki Tugas Akhir', 'Membantu mendapat nilai yang baik di sisa kesempatan terakhir.', '630beefa32ce2-joki-tugas-akhir-22-08-29.webp', 'Aktif', '2022-08-29 05:40:58', NULL, NULL),
(4, 'Joki Quiz dan Ujian', 'Menjaga dan merawat jantung dari kepanikan karena dikejar deadline.', '630bef0b7ebc7-joki-quiz-dan-ujian-22-08-29.webp', 'Aktif', '2022-08-29 05:41:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id_logs` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `platform` text NOT NULL,
  `user_agent` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id_logs`, `ip_address`, `url`, `deskripsi`, `jumlah`, `platform`, `user_agent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '127.0.0.1', 'https://sinikujokiin.test/', 'Mengakses halaman Home pada 29-08-2022 05:55:26', 64, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-28 18:40:21', '2022-08-29 05:55:26', NULL),
(2, '127.0.0.1', 'https://sinikujokiin.test/cara-order', 'Terakhir diakses pada 29-08-2022 00:51:31', 21, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-28 19:02:29', '2022-08-29 00:51:31', NULL),
(3, '127.0.0.1', 'https://sinikujokiin.test/testimoni', 'Terakhir diakses pada 29-08-2022 00:43:59', 3, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-28 19:02:30', '2022-08-29 00:43:59', NULL),
(4, '127.0.0.1', 'https://sinikujokiin.test/artikel', 'Terakhir diakses pada 28-08-2022 21:08:01', 3, '', '', '2022-08-28 19:02:32', '2022-08-28 21:08:01', NULL),
(5, '127.0.0.1', 'https://sinikujokiin.test/artikel/lorem-ipsum-dolor-sit-amet', 'Terakhir diakses pada 28-08-2022 20:59:12', 2, '', '', '2022-08-28 19:03:06', '2022-08-28 20:59:12', NULL),
(6, '127.0.0.1', 'https://sinikujokiin.test/list-tugas', 'Mengakses halaman List Tugas pada 29-08-2022 00:56:49', 8, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-28 21:08:03', '2022-08-29 00:56:49', NULL),
(7, '192.168.1.6', 'http://192.168.1.10/sinikujokiin/', 'Terakhir diakses pada 28-08-2022 22:02:05', 19, 'null', 'null', '2022-08-28 21:25:53', '2022-08-28 22:02:05', NULL),
(8, '192.168.1.6', 'http://192.168.1.10/sinikujokiin/cara-order', 'Terakhir diakses pada 28-08-2022 22:02:18', 5, '2', '2', '2022-08-28 21:27:03', '2022-08-28 22:02:18', NULL),
(9, '192.168.1.6', 'http://192.168.1.10/sinikujokiin/testimoni', 'Terakhir diakses pada 28-08-2022 21:54:02', 1, '[\"Android\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-28 21:54:02', NULL, NULL),
(10, '127.0.0.1', 'https://sinikujokiin.test/assets/landing/vendor/purecounter/purecounter_vanilla.js.map', 'Mengakses halaman 404 Page Not Found pada 29-08-2022 05:55:18', 10, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-29 00:55:20', '2022-08-29 05:55:18', NULL),
(11, '127.0.0.1', 'https://sinikujokiin.test/assets/landing/vendor/swiper/swiper-bundle.min.js.map', 'Mengakses halaman 404 Page Not Found pada 29-08-2022 05:55:18', 9, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-29 00:55:20', '2022-08-29 05:55:18', NULL),
(12, '127.0.0.1', 'https://sinikujokiin.test/assets/cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'Mengakses halaman 404 Page Not Found pada 29-08-2022 06:10:30', 5, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-29 00:58:28', '2022-08-29 06:10:30', NULL),
(13, '127.0.0.1', 'https://sinikujokiin.test/favicon.ico', 'Mengakses halaman 404 Page Not Found pada 29-08-2022 06:07:47', 2, '[\"Windows 10\"]', '[\"Chrome 104.0.0.0\"]', '2022-08-29 05:37:38', '2022-08-29 06:07:47', NULL),
(14, '::1', 'http://localhost/sinikujokiin/', 'Mengakses halaman Home pada 23-09-2022 07:10:54', 391, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-01 12:06:55', '2022-09-23 07:10:54', NULL),
(15, '::1', 'http://localhost/sinikujokiin/cara-order', 'Mengakses halaman Cara Order pada 23-09-2022 06:50:23', 82, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-01 12:07:57', '2022-09-23 06:50:23', NULL),
(16, '::1', 'http://localhost/sinikujokiin/testimoni', 'Mengakses halaman Testimoni pada 23-09-2022 06:50:07', 58, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-01 12:08:15', '2022-09-23 06:50:07', NULL),
(17, '::1', 'http://localhost/sinikujokiin/artikel', 'Mengakses halaman List Artikel pada 23-09-2022 06:49:56', 43, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-01 12:08:35', '2022-09-23 06:49:56', NULL),
(18, '::1', 'http://localhost/sinikujokiin/list-tugas', 'Mengakses halaman List Tugas pada 23-09-2022 07:04:53', 50, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-01 12:08:43', '2022-09-23 07:04:53', NULL),
(19, '::1', 'http://localhost/sinikujokiin/assets/cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'Mengakses halaman 404 Page Not Found pada 23-09-2022 07:03:03', 26, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-01 12:14:19', '2022-09-23 07:03:03', NULL),
(20, '::1', 'http://localhost/sinikujokiin/tugas/tugas-makalah', 'Mengakses halaman Detail Tugas Tugas Makalah pada 10-09-2022 14:01:31', 1, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-10 14:01:31', NULL, NULL),
(21, '::1', 'http://localhost/sinikujokiin/tugas', 'Mengakses halaman 404 Page Not Found pada 23-09-2022 06:41:39', 8, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-20 06:22:26', '2022-09-23 06:41:39', NULL),
(22, '::1', 'http://localhost/sinikujokiin/assets/landing/vendor/swiper/swiper-bundle.min.js.map', 'Mengakses halaman 404 Page Not Found pada 23-09-2022 06:39:01', 3, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-20 06:52:44', '2022-09-23 06:39:01', NULL),
(23, '::1', 'http://localhost/sinikujokiin/artikel/judul-artikel', 'Mengakses halaman Detail Artikel Judul Artikel pada 21-09-2022 13:03:35', 1, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-21 13:03:35', NULL, NULL),
(24, '::1', 'http://localhost/sinikujokiin/tugas/tugas-esai', 'Mengakses halaman Detail Tugas Jasa Olah Data pada 22-09-2022 20:30:25', 1, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-22 20:30:25', NULL, NULL),
(25, '::1', 'http://localhost/sinikujokiin/artikel/jangan-salah-pilih-jurusan-kuliah-ini-tipsnya', 'Mengakses halaman Detail Artikel Jangan Salah Pilih Jurusan Kuliah, Ini Tipsnya pada 23-09-2022 06:23:49', 1, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-23 06:23:49', NULL, NULL),
(26, '::1', 'http://localhost/sinikujokiin/list-tugas/tugas-makalah', 'Mengakses halaman 404 Page Not Found pada 23-09-2022 06:43:20', 1, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-23 06:43:20', NULL, NULL),
(27, '::1', 'http://localhost/sinikujokiin/artikel/tips-untuk-mahasiswa-agar-lulus-tepat-waktu', 'Mengakses halaman Detail Artikel Tips untuk Mahasiswa agar Lulus Tepat Waktu pada 23-09-2022 06:49:59', 1, '[\"Windows 10\"]', '[\"Chrome 105.0.0.0\"]', '2022-09-23 06:49:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(10) UNSIGNED NOT NULL,
  `menu_title` varchar(25) NOT NULL,
  `menu_url` varchar(50) NOT NULL,
  `have_link` enum('yes','no') NOT NULL,
  `icon` varchar(25) NOT NULL,
  `sort` varchar(5) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `type` enum('cms','public') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id_menu`, `menu_title`, `menu_url`, `have_link`, `icon`, `sort`, `menu_parent`, `type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Setting', '#', '', '#', '4', 0, 'cms', '2022-04-18 10:09:22', 0, '2022-08-27 15:01:42', NULL, NULL, NULL),
(2, 'Menu', '#', '', 'list', '1', 1, 'cms', '2022-04-18 10:10:01', 0, '2022-04-18 10:37:47', NULL, NULL, NULL),
(3, 'List Menu', 'cms/data-menu', 'yes', '#', '1', 2, 'cms', '2022-04-18 10:10:33', 0, '2022-07-30 12:23:58', NULL, NULL, NULL),
(4, 'Sorting Menu', 'cms/sorting-menu', 'yes', '#', '2', 2, 'cms', '2022-04-18 10:10:53', 0, '2022-07-30 12:23:27', NULL, NULL, NULL),
(5, 'User Management', '#', '', 'users', '2', 1, 'cms', '2022-04-18 10:15:56', 0, '2022-04-18 10:37:47', NULL, NULL, NULL),
(6, 'List User', 'cms/data-user', 'yes', '#', '1', 5, 'cms', '2022-04-18 10:16:47', 0, '2022-07-30 12:23:47', NULL, NULL, NULL),
(7, 'List Role', 'cms/data-role', 'yes', '#', '2', 5, 'cms', '2022-04-18 10:17:09', 0, '2022-07-30 12:23:52', NULL, NULL, NULL),
(8, 'Master Data', '#', '', 'database', '2', 0, 'cms', '2022-04-18 10:29:46', 0, '2022-04-21 13:35:43', NULL, NULL, NULL),
(9, 'Article', '#', '', 'newspaper', '1', 8, 'cms', '2022-04-18 10:30:31', 0, '2022-07-29 21:31:47', NULL, '2022-07-29 21:31:47', 1),
(10, 'Category Article', 'data-category-article', 'yes', '#', '1', 9, 'cms', '2022-04-18 10:30:54', 0, '2022-07-29 21:31:52', NULL, '2022-07-29 21:31:52', 1),
(11, 'List Article', 'data-article', 'yes', '#', '2', 9, 'cms', '2022-04-18 10:33:25', 0, '2022-07-29 21:31:56', NULL, '2022-07-29 21:31:56', 1),
(12, 'Website PBN', 'data-web-pbn', 'yes', 'globe', '2', 8, 'cms', '2022-04-18 10:34:32', 0, '2022-07-29 21:32:31', NULL, '2022-07-29 21:32:31', 1),
(13, 'Main Menu', '#', '', '#', '1', 0, 'cms', '2022-04-21 13:06:51', 0, '2022-04-21 13:35:43', NULL, NULL, NULL),
(14, 'Dashboard', 'cms/dashboard', 'yes', 'home', '1', 13, 'cms', '2022-04-21 13:07:27', 0, '2022-07-30 12:24:09', NULL, NULL, NULL),
(15, 'Trash', '#', 'yes', 'trash', '1', 16, 'cms', '2022-04-21 15:37:58', 0, '2022-08-28 21:09:34', NULL, '2022-08-28 21:09:34', 1),
(16, 'Unused Data', '#', '', '#', '7', 0, 'cms', '2022-04-21 15:38:57', 0, '2022-08-28 21:09:21', NULL, '2022-08-28 21:09:21', 1),
(17, 'Article', 'trash-article', 'yes', '#', '1', 15, 'cms', '2022-04-21 15:40:03', 0, '2022-07-29 21:32:07', NULL, '2022-07-29 21:32:07', 1),
(18, 'Website', 'cms/web-setting', 'yes', 'wrench', '3', 1, 'cms', '2022-04-22 10:57:56', 0, '2022-07-30 12:23:19', NULL, NULL, NULL),
(19, 'Laporan', '#', '', '#', '5', 0, 'cms', '2022-04-26 13:40:11', 0, '2022-08-28 21:09:10', NULL, '2022-08-28 21:09:10', 1),
(20, 'Laporan Artikel', 'report-article', 'yes', 'file', '1', 19, 'cms', '2022-04-26 13:41:27', 0, '2022-07-29 21:32:11', NULL, '2022-07-29 21:32:11', 1),
(21, 'Logs', 'cms/data-log', 'yes', 'list', '6', 0, 'cms', '2022-04-27 14:51:52', 0, '2022-08-28 19:11:24', NULL, NULL, NULL),
(22, 'Banner Informasi', 'banner-informasi', 'yes', 'fa fa-images', '3', 8, 'cms', '2022-07-29 21:36:26', 0, '2022-07-30 14:18:27', NULL, '2022-07-30 14:18:27', 1),
(23, 'Kategori Produk', 'cms/kategori-produk', 'yes', 'fa fa-list', '4', 8, 'cms', '2022-07-29 21:36:50', 0, '2022-07-30 14:18:19', NULL, '2022-07-30 14:18:19', 1),
(24, 'Tugas', 'cms/list-tugas', 'yes', 'fa fa-tasks', '3', 8, 'cms', '2022-07-30 08:11:13', 0, '2022-08-27 15:01:42', NULL, NULL, NULL),
(25, 'Tata Cara Order', 'cms/tata-cara-order', 'yes', 'fa fa-step-forward', '4', 8, 'cms', '2022-07-30 14:21:09', 0, '2022-08-27 15:01:42', NULL, NULL, NULL),
(26, 'Testimoni', '#', '', '#', '3', 0, 'cms', '2022-07-30 14:21:58', 0, '2022-08-27 15:04:59', NULL, NULL, NULL),
(27, 'Artikel', 'cms/list-artikel', 'yes', 'fa fa-newspaper', '5', 8, 'cms', '2022-07-30 14:23:06', 0, '2022-08-28 06:09:03', NULL, NULL, NULL),
(28, 'FAQ', 'cms/list-faq', 'yes', 'fa fa-question', '6', 8, 'cms', '2022-07-30 14:23:50', 0, '2022-08-04 01:51:54', NULL, NULL, NULL),
(29, 'Sosial Media', 'cms/list-sosmed', 'yes', 'fa fa-tv', '4', 1, 'cms', '2022-07-30 14:25:34', 0, '2022-08-28 21:08:36', NULL, '2022-08-28 21:08:36', 1),
(30, 'Fitur Unggulan', 'cms/list-fitur', 'yes', 'fa fa-key', '1', 8, 'cms', '2022-08-04 01:51:27', 0, '2022-08-04 01:52:39', NULL, NULL, NULL),
(31, 'Jenis Joki', 'cms/list-jenis-joki', 'yes', 'fa fa-pen', '7', 8, 'cms', '2022-08-04 02:21:50', 0, '2022-08-04 02:23:32', NULL, NULL, NULL),
(32, 'Portfolio', 'cms/list-portfolio', 'yes', 'fa fa-images', '8', 8, 'cms', '2022-08-04 02:23:17', 0, '2022-08-27 23:55:56', NULL, NULL, NULL),
(33, 'Pembayaran', 'cms/list-pembayaran', 'yes', 'fa fa-credit-card', '9', 8, 'cms', '2022-08-04 02:27:43', 0, NULL, NULL, NULL, NULL),
(34, 'Section', 'cms/list-section', 'yes', 'fa fa-list-alt', '2', 8, 'cms', '2022-08-09 02:10:45', 0, '2022-08-27 15:01:42', NULL, NULL, NULL),
(35, 'Pembayaran', 'cms/list-pembayaran', 'yes', 'fa fa-money-check', '10', 8, 'cms', '2022-08-09 02:16:59', 0, '2022-08-09 02:29:29', NULL, '2022-08-09 02:29:29', 1),
(36, 'Testimoni Chat', 'cms/testimoni-chat', 'yes', 'fa fa-quote-right', '2', 26, 'cms', '2022-08-27 15:02:13', 0, '2022-08-27 15:04:59', NULL, NULL, NULL),
(37, 'Testimoni Client', 'cms/testimoni-client', 'yes', 'fa fa-quote-left', '1', 26, 'cms', '2022-08-27 15:04:33', 0, '2022-08-27 15:04:59', NULL, NULL, NULL),
(38, 'Team', 'cms/list-team', 'yes', 'user-tie', '10', 8, 'cms', '2022-08-27 16:39:59', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `nama_pembayaran` varchar(200) NOT NULL,
  `nomer_pembayaran` varchar(50) NOT NULL,
  `ikon` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayaran`, `nomer_pembayaran`, `ikon`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GOPAY', '0895322316585', '62f2a9be61103-gopay-22-08-10.png', '', 'Aktif', '2022-08-10 01:30:32', '2022-08-10 01:38:54', NULL),
(2, 'Dana', '0895322316585', '62f2a9c6026a8-dana-22-08-10.png', '', 'Aktif', '2022-08-10 01:31:51', '2022-08-10 01:39:02', NULL),
(3, 'Shopee Pay', '0895322316585', '62f2aa6f73a29-shopee-pay-22-08-10.png', '', 'Aktif', '2022-08-10 01:41:51', NULL, NULL),
(4, 'OVO', '0895322316585', '62f2aa7b01b6c-ovo-22-08-10.png', '', 'Aktif', '2022-08-10 01:42:03', '2022-08-14 06:01:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(10) UNSIGNED NOT NULL,
  `kategori_portfolio` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `kategori_portfolio`, `deskripsi`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Website', 'Website Pemesanan Kost', '632c67b5a140b-website-22-09-22.png', 'Aktif', '2022-08-28 00:11:24', '2022-09-22 20:48:37', NULL),
(2, 'Olah Data', 'Mengolah Data', '630a50f86270a-olah-data-22-08-28.jpg', 'Aktif', '2022-08-28 00:14:32', '2022-09-20 06:11:30', '2022-09-20 06:11:30'),
(3, 'Website', 'Website MASIK (Matematika Asik) untuk latihan soal matematika \r\npada siswa SD', '6328f6f1b99c8-website-22-09-20.png', 'Aktif', '2022-09-20 06:10:41', '2022-09-22 20:46:37', NULL),
(4, 'Website', 'Sistem Informasi Pemesanan Jasa Percetakan Berbasis Web', '632c66e0a7ebc-website-22-09-22.png', 'Aktif', '2022-09-22 20:45:04', NULL, NULL),
(5, 'Website', 'Website Pendaftaran Vaksin', '632c684c1dd34-website-22-09-22.png', 'Aktif', '2022-09-22 20:51:08', NULL, NULL),
(6, 'Website', 'Website E-commerce Alat Kesehatan', '632c68acc1159-website-22-09-22.png', 'Aktif', '2022-09-22 20:52:44', NULL, NULL),
(7, 'Mobile', 'SISTEM INFORMASI VALIDASI SERTIFIKAT KOMPETENSI', '632c6913eac1d-website-22-09-22.jpg', 'Aktif', '2022-09-22 20:54:27', '2022-09-22 20:54:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_role` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(25) NOT NULL,
  `description_role` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`, `description_role`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Full Adminstrator', 'Administrator System', '2022-04-19 13:07:22', 1, '2022-08-29 05:57:03', 1, NULL, NULL),
(4, 'Adminstrator', 'Administrator Sinikujokiin', '2022-08-29 05:57:16', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `type_section` varchar(50) NOT NULL,
  `nama_section` varchar(120) NOT NULL,
  `deskripsi_singkat` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Aktif',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `section`
--

INSERT INTO `section` (`id_section`, `type_section`, `nama_section`, `deskripsi_singkat`, `deskripsi`, `background`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'section_faq', 'F.A.Q', 'Frequently Asked {Questions}', '', NULL, 'Aktif', '2022-08-10 01:56:16', '2022-08-13 21:00:45', NULL),
(2, 'section_task', 'TASK', 'Check our {Task}', '', NULL, 'Aktif', '2022-08-10 02:03:28', '2022-08-13 21:08:22', NULL),
(3, 'section_service', 'SERVICES', 'Check our {Services}', '', NULL, 'Aktif', '2022-08-13 20:58:50', '2022-08-13 21:08:29', NULL),
(4, 'section_portfolio', 'PORTFOLIO', 'Check our {Portfolio}', '', NULL, 'Aktif', '2022-08-13 20:59:21', '2022-08-28 00:14:41', NULL),
(5, 'section_contact', 'CONTACT', 'Contact {Us}', '', NULL, 'Aktif', '2022-08-13 21:00:12', '2022-08-13 21:04:55', NULL),
(6, 'section_home', 'SINIKUJOKIIN', '{Jasa Joki} Skripsi dan Website', 'Jasa pembuatan skripsi {paling murah dan terpercaya} di Indonesia. Melayani pembuatan skripsi, thesis, website olah data, dan tugas mulai dari sekolah s/d kuliah.', '632c886a3cfca-sinikujokiin-22-09-22.jpg', 'Aktif', '2022-08-14 05:53:10', '2022-09-22 23:08:10', NULL),
(7, 'section_cara_order', 'CARA ORDER', 'Pemesanan Tugas', '', '62f868201f533-cara-order-22-08-14.jpg', 'Aktif', '2022-08-14 10:12:14', '2022-08-26 02:16:11', '2022-08-26 02:16:11'),
(8, 'section_testimoni', 'TESTIMONI', '', '', '632902a0cec42-testimoni-22-09-20.jpg', 'Aktif', '2022-08-14 10:31:01', '2022-09-20 07:00:32', NULL),
(9, 'section_footer_home', 'Masih ragu? Yuk kepoin {kami di Instagram}', 'https://www.instagram.com/sinikujokiin_/', '', '632807357bd50-masih-ragu-yuk-kepoin-kami-di-instagram-22-09-19.png', 'Aktif', '2022-08-26 01:28:26', '2022-09-19 13:07:49', NULL),
(10, 'section_banner_cara_order', 'Pemesanan Tugas', 'Cara Order', 'Sinikujokiin adalah spesialis layanan jasa pembuatan skripsi semua jurusan dan website. Dengan kualitas terbaik dan harga yang terjangkau, Sinikujokiin sudah membantu banyak sekali klien hampir seluruh kota di Indonesia. Selain itu kami menerima pembuatan olah data, tugas kuliah maupun tugas sekolah dan lain-lain yang akan membantu kamu. ', '63283e365b5e8-pemesanan-tugas-22-09-19.png', 'Tidak Aktif', '2022-08-26 02:02:02', '2022-09-21 13:05:04', NULL),
(11, 'section_cara_order', 'Mau Order? /n Mudah Banget Loh!', '', '{Sinikujokiin} adalah spesialis layanan jasa pembuatan skripsi semua jurusan dan website. Dengan kualitas terbaik dan harga yang terjangkau, Sinikujokiin sudah membantu banyak sekali klien hampir seluruh kota di Indonesia. Selain itu kami menerima pembuatan olah data, tugas kuliah maupun tugas sekolah dan lain-lain yang akan membantu kamu. ', NULL, 'Aktif', '2022-08-26 02:13:37', '2022-09-22 20:09:09', NULL),
(12, 'section_cara_ordernya', 'Bagaimana Cara Ordernya ?', '', 'Kamu masih bingung bagaimana cara order di Sinikujokiin? Jangan khawatir! Kamu bisa menggunakan jasa joki kami dengan sangat mudah dan cepat. Berikut ini adalah langkah-langkah yang harus kamu lakukan.', NULL, 'Aktif', '2022-08-26 02:27:02', '2022-09-22 20:10:39', NULL),
(13, 'section_pembayaran', 'Metode Pembayaran', '', 'Kamu masih bingung metode pembayaran apa saja yang dapat digunakan saat order joki tugas di SInikujokiin? Jangan khawatir, ada banyak metode pembayaran kok! Pembayaran dapat dilakukan melalui {}', NULL, 'Tidak Aktif', '2022-08-26 02:43:54', '2022-09-21 10:09:42', NULL),
(14, 'section_footer_cara_order', 'Yuk konsultasi dulu! {Hubungi kami di Whatsapp}', 'https://api.whatsapp.com/send/?phone={}&text=Halo...&type=phone_number&app_a', '', NULL, 'Aktif', '2022-08-27 03:15:30', '2022-09-23 07:04:41', NULL),
(15, 'section_banner_testimoni', 'Pendapat Pelanggan', 'Testimoni', '', '632aa448775aa-pendapat-pelanggan-22-09-21.png', 'Tidak Aktif', '2022-08-27 06:17:29', '2022-09-21 12:43:40', NULL),
(16, 'section_testimonial', 'Customer Feedback', '', 'Sinikujokiin hadir di tahun 2021, namun telah dipercaya lebih dari 2000 pelanggan dan telah membantu menyelesaikan ribuan klien dengan feedback yang positif. Berikut adalah beberapa testimonial pelanggan kami setelah menggunakan layanan jasa joki skripsi dan website di Sinikujokiin.', '632aa448775aa-pendapat-pelanggan-22-09-21.png', 'Aktif', '2022-08-27 09:46:59', '2022-09-21 12:44:29', NULL),
(17, 'section_testimoni_client', 'Pendapat {Pelanggan Kami}', '', 'Kamu masih ragu untuk pakai jasa Sinikujokiin? Nih ada beberapa pesan dari pelanggan setia kami setelah menggunakan jasa kami. Ditunggu yaa chat kamu di whatsapp kami.', '632aa448775aa-pendapat-pelanggan-22-09-21.png', 'Aktif', '2022-08-27 15:31:17', '2022-09-21 12:45:01', NULL),
(18, 'section_testimoni_chat', 'Masih Ragu dengan {Kami ?}', '', 'Kamu sudah scroll sampai sejauh ini yaa, tandanya kamu masih ragu nih pake jasa {joki tugas }kami. Nih kami kasih bocoran sedikit screenshot chat beberapa pelanggan kami. Ditunggu yaa chat kamu di whatsapp kami.', NULL, 'Tidak Aktif', '2022-08-27 15:32:15', '2022-09-21 12:46:51', NULL),
(19, 'section_team', 'OUR TEAM', 'Our Hardworking {Team}', '', NULL, 'Aktif', '2022-08-27 16:31:24', '2022-09-20 06:14:31', NULL),
(20, 'section_banner_list_tugas', 'Layanan Kami', 'Daftar Tugas', '', '630a5380b1127-layanan-kami-22-08-28.png', 'Tidak Aktif', '2022-08-28 00:25:20', '2022-09-21 13:47:03', NULL),
(21, 'section_list_tugas', 'Sinikujokiin /n Serba Bisa', '', 'Sinikujokiin adalah spesialis layanan jasa pembuatan skripsi semua jurusan dan website. Dengan kualitas terbaik dan harga yang terjangkau, Sinikujokiin sudah membantu banyak sekali klien hampir seluruh kota di Indonesia. Selain itu kami menerima pembuatan olah data, tugas kuliah maupun tugas sekolah dan lain-lain yang akan membantu kamu. ', '632c6227b6743-yuk-order-sekarang-juga-hubungi-kami-di-whatsapp-22-09-22.png', 'Aktif', '2022-08-28 00:26:35', '2022-09-22 20:29:58', NULL),
(22, 'section_tugas_unggulan', 'Daftar Jasa Unggulan Kami', '', 'Berikut ini adalah layanan yang kami tawarkan ', '632aa448775aa-pendapat-pelanggan-22-09-21.png', 'Aktif', '2022-08-28 00:27:08', '2022-09-21 13:49:50', NULL),
(23, 'section_banner_artikel', 'Informasi Terbaru', 'Artikel', '', '630b096d5e7e9-informasi-terbaru-22-08-28.png', 'Tidak Aktif', '2022-08-28 13:21:33', '2022-09-21 13:05:29', NULL),
(24, 'section_side_artikel', 'SINIKUJOKIIN', '', '{SINIKUJOKIIN} adalah jasa pembuatan skripsi paling murah dan terpercaya di Indonesia. Melayani pembuatan skripsi, thesis, website olah data, dan tugas mulai dari sekolah s/d kuliah.', '632aa448775aa-pendapat-pelanggan-22-09-21.png', 'Aktif', '2022-08-28 13:23:31', '2022-09-21 13:09:02', NULL),
(25, 'section_best_price', 'Harga mulai {50 ribuan!}', 'Buatin Tugasku menyediakan layanan jasa joki pengerjaan tugas dengan biaya yang murah dan terjangkau', '\r\nMasa ngajak keluar doi setiap malam minggu dan bayarin semua kebutuhannya bisa, tapi bayar untuk kebutuhan diri sendiri supaya dapet nilai bagus nggak bisa? Yuk cek harga tugasmu sekarang!', '630bf04597eb0-harga-mulai-50-ribuan-22-08-29.webp', 'Tidak Aktif', '2022-08-29 05:46:29', '2022-09-19 13:29:13', NULL),
(26, 'section_jenis_joki', 'Jenis Joki', '', '', NULL, 'Tidak Aktif', '2022-09-17 14:51:21', '2022-09-17 14:52:04', NULL),
(27, 'section_payment', 'payment', '', '', NULL, 'Tidak Aktif', '2022-09-23 06:15:51', '2022-09-23 06:16:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_web` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(25) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `link_map` text NOT NULL,
  `link_ig` text DEFAULT NULL,
  `link_tiktok` text DEFAULT NULL,
  `link_fb` text DEFAULT NULL,
  `link_twitter` text NOT NULL,
  `nama_ig` varchar(100) NOT NULL,
  `nama_fb` varchar(100) NOT NULL,
  `nama_tiktok` varchar(100) NOT NULL,
  `nama_twitter` varchar(100) NOT NULL,
  `total_pelanggan` int(10) UNSIGNED NOT NULL,
  `total_tugas_selesai` int(10) UNSIGNED NOT NULL,
  `total_universitas` int(10) UNSIGNED NOT NULL,
  `total_tim` int(10) UNSIGNED NOT NULL,
  `keyword` text NOT NULL,
  `deskripsi` text NOT NULL,
  `g_tag` text NOT NULL,
  `script_g_tag` text NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_web`, `website_name`, `icon`, `logo`, `about`, `email`, `phone`, `address`, `link_map`, `link_ig`, `link_tiktok`, `link_fb`, `link_twitter`, `nama_ig`, `nama_fb`, `nama_tiktok`, `nama_twitter`, `total_pelanggan`, `total_tugas_selesai`, `total_universitas`, `total_tim`, `keyword`, `deskripsi`, `g_tag`, `script_g_tag`, `updated_at`, `updated_by`) VALUES
(1, 'SINIKUJOKIIN', 'dee49948f27cde059fc42db6231be9ef.jpg', '13f8ba0c837de726483b38dad19608b5.jpg', '{SINIKUJOKIIN} Menerima jasa pembuatan Skripsi, Makalah, Tugas, UAS/UTS, Revisi skripsi, Jurnal, Artikel, Cek Plagiarisme, Desain CV, PPT, Olah Data, Website, Mobile App dll.', 'sinikujokiin@gmail.com', '085770521528', 'Jalan Siliwangi Kp. Kebon Kopi RT. 02/02 Desa Ciampea Udik Kec. Ciampea Kab. Bogor', '<iframe src=\"https://www.google.com/maps/embed?pb=!4v1639500720257!6m8!1m7!1sRHZhPTEwQySWGKCV4zNSHQ!2m2!1d-6.115758166713234!2d106.7868069177495!3f354.03706161734584!4f11.857745492367812!5f0.7820865974627469\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://www.instagram.com/sinikujokiin_/', 'https://vt.tiktok.com/ZSdAkULb1/', 'https://web.facebook.com/sinikujokiin', 'https://twitter.com/sinikujokiin_', '@sinikujokiin_', 'sinikujokiin_', '@sinikujokiin', '@sinikujokiin_', 2000, 2000, 100, 75, 'joki, joki skripsi, joki skripsi bogor, joki skripsi murah, judul skripsi, joki website, joki website murah, joki skripsi website bogor', 'SINIKUJOKIIN Menerima jasa pembuatan Skripsi, Makalah, Tugas, UAS/UTS, Revisi skripsi, Jurnal, Artikel, Cek Plagiarisme, Desain CV, PPT, Olah Data,', '', '', '2022-09-10 13:51:02', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id_team` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `nama`, `jabatan`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Team A', 'Admin', 'default.jpg', 'Aktif', '2022-08-27 17:23:53', '2022-09-10 13:55:45', '2022-09-10 13:55:45'),
(2, 'Team B', 'Admin A', '6309f29491542-team-b-22-08-27.png', 'Aktif', '2022-08-27 17:31:48', '2022-09-10 13:55:40', '2022-09-10 13:55:40'),
(3, 'Intan Damayanti', 'Owner', 'default.jpg', 'Aktif', '2022-09-10 13:55:12', '2022-09-10 13:55:34', '2022-09-10 13:55:34'),
(4, 'Intan Damayanti', 'Owner', '632823658e205-intan-damayanti-22-09-19.png', 'Aktif', '2022-09-10 13:57:57', '2022-09-19 15:08:05', NULL),
(5, 'Kharismawati', 'Admin Chat', '632838906243b-kharismawati-22-09-19.png', 'Aktif', '2022-09-10 13:59:47', '2022-09-19 16:38:24', NULL),
(6, 'Dwi Aisyah', 'Admin QC', '632838fef3391-dwi-aisyah-22-09-19.png', 'Aktif', '2022-09-10 14:00:05', '2022-09-19 16:40:15', NULL),
(7, 'Siti Aisyah', 'Admin Kelengkapan', '63283a2fa14d1-siti-aisyah-22-09-19.png', 'Aktif', '2022-09-10 14:00:17', '2022-09-19 16:45:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `universitas` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `universitas`, `text`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Customer 1', 'Universitas Ibn Khaldun', 'Aku joki skripsi pengolahan data bab 4 di sinikujokiin_ dan aku sudah selesai sidang  dan lancar Alhamdulillah. Kak intan dan team yang mengerjakan skripsiku pun amanah dan, hasil pengerjaan skripsi nya juga baik, dan rapih. Makasih banyak buat kak intan dan seluruh tim sinikujokiin_ yang telah membantu.', 'default.jpg', 'Aktif', '2022-08-14 10:19:12', '2022-09-21 12:52:18', NULL),
(2, 'Customer 2', 'Universitas Pertamina', 'Alhamdulillah kemarin aku selesai sempro nilainya A, terimakasih bantuannya kak!', 'default.jpg', 'Aktif', '2022-08-14 10:27:13', '2022-09-21 12:53:41', NULL),
(3, 'Customer 3', 'Universitas Brawijaya', 'Semua urusan setelah sempro saya sudah selesai, alhamdulillah dapet A. Terimakasih sinikujokiin', 'default.jpg', 'Aktif', '2022-09-21 12:56:07', NULL, NULL),
(4, 'Customer 4', 'Universitas Indraprasta', 'Alhamdulillah terimakasih untuk sinikujokiin sudah membantu dalam penyusunan skripsi, sangat amanah no tipu-tipu  dan adminnya sabar & kooperatif, sukses selalu untuk @sinikujokiin_', 'default.jpg', 'Aktif', '2022-09-21 12:58:24', NULL, NULL),
(5, 'Customer 5', 'Universitas Kristen Indonesia', 'Hai kak, skripsi aku udah di acc dan udah sesuai deadline.. sekarang tinggal nunggu jadwal sidang kak.. mohon doanya ya semoga lancar, thankyou kak intan dan team', 'default.jpg', 'Aktif', '2022-09-21 13:00:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni_chat`
--

CREATE TABLE `testimoni_chat` (
  `id_testimoni_chat` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni_chat`
--

INSERT INTO `testimoni_chat` (`id_testimoni_chat`, `text`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pelanggan Puas terhadap layanannya', '6309d58c07928-pelanggan-puas-terhadap-layanannya-22-08-27.png', 'Aktif', '2022-08-27 15:17:09', '2022-08-27 15:27:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(10) UNSIGNED NOT NULL,
  `nama_tugas` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `ikon` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `slug`, `deskripsi_singkat`, `deskripsi`, `ikon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jasa Skripsi dan Thesis', 'tugas-makalah', 'Layanan ini ditujukan bagi mahasiswa program sarjana atau master yang memerlukan jasa pembuatan skripsi dan tesis serta bimbingannya.', '<h2 class=\"mb-4 title-article\" style=\"font-weight: 600; line-height: 1.25; font-family: Exo, sans-serif; color: rgb(214, 48, 35);\">Cara Membuat Makalah: Definisi, Jenis, Struktur, dan Contohnya</h2><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Apakah kamu seorang pelajar atau siswa yang sering ditugaskan untuk membuat sebuah makalah? Apakah membuat makalah itu sulit? Tentunya dengan pengertian yang jelas mengenai makalah dan cara membuat makalah, kamu akan semakin mudah dan terbantu untuk membuat sebuah makalah. Artikel ini akan membantu kamu untuk mengerti mengenai definisi makalah hingga cara membuat makalah. Yuk langsung saja kita mulai</p></div></h2><h3 style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Daftar Isi</h3><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><div class=\"gray-bg d-inline-block p-3 my-4\" style=\"background: rgb(244, 249, 252);\"><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#definisi\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1. Definisi Makalah</a></p><p class=\"ml-3 mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#pengertian\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1.1. Pengertian Makalah</a></p><p class=\"ml-3 mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#ciri-ciri\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1.2. Ciri-Ciri Makalah</a></p><p class=\"ml-3 mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#fungsi\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1.3. Fungsi Makalah</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#jenis\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">2. Jenis-Jenis Makalah</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#struktur\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">3. Struktur Makalah</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#cara-membuat\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">4. Cara Membuat Makalah yang Baik dan Benar</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/makalah/#contoh\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">5. Contoh Makalah yang Baik dan Benar</a></p></div></div></h2><h3 id=\"definisi\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">1. Definisi Makalah</h3><h4 id=\"pengertian\" style=\"font-weight: 700; line-height: 30px; font-size: 1.3rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Pengertian Makalah</h4><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Menurut Kamus Besar Bahasa Indonesia (KBBI), makalah memiliki dua pengertian, yaitu pertama tulisan yang bersifat resmi mengenai satu pokok yang dimaksudkan akan dibacakan di depan umum dalam sebuah persidangan dan yang sering disusun untuk perihal penerbitan; pengertian kedua yaitu karya tulis oleh pelajar maupun mahasiswa sebagai laporan hasil dari pelaksanaan tugas yang diberikan dari sekolah atau perguruan tinggi.</p><p class=\"mb-2\" style=\"line-height: 30px;\">Menurut E. Zaenal Arifin, makalah merupakan sebuah karya tulis ilmiah yang menyajikan satu pokok masalah tertentu yang dibahas berdasarkan data di lapangan yang bersifat empiris-objektif. Dan menurut W.J.S Poerwadarminta, makalah merupakan sebuah uraian tertulis yang membahas mengenai suatu masalah tertentu yang dikemukakan untuk mendapat pembahasan yang lebih lanjut.</p><p class=\"mb-2\" style=\"line-height: 30px;\">Berdasarkan beberapa pengertian di atas dapat disimpulkan bahwa makalah merupakan sebuah karya tulis yang membahas suatu permasalahan tertentu menggunakan data di lapangan yang dimaksudkan untuk pelaksanaan tugas maupun untuk tujuan penerbitan.</p></div></h2><h4 id=\"ciri-ciri\" style=\"font-weight: 700; line-height: 30px; font-size: 1.3rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Ciri-Ciri Makalah</h4><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Makalah secara umum memiliki berbagai ciri-ciri berikut:</p><ul><li>Merupakan sebuah hasil kajian literatur dan/atau laporan dari kegiatan pelaksanaan suatu kegiatan di lapangan yang akan disesuaikan dengan cakupan pelajaran pembuat makalah.</li><li>Mendemonstrasikan pemahaman atau kemampuan membuat makalah mengenai permasalahan teoritik yang dibahas, penerapan suatu prosedur, prinsip, atau teori yang berhubungan dengan topik yang diangkat dalam makalah.</li><li>Menunjukkan kepiawaian penulis makalah dalam memahami sumber rujukan yang digunakan.</li><li>Mendemonstrasikan kemampuan dalam menyusun suatu tulisan utuh dari berbagai sumber informasi.</li></ul></div></h2><h4 id=\"fungsi\" style=\"font-weight: 700; line-height: 30px; font-size: 1.3rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Fungsi Makalah</h4><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Fungsi dan manfaat dari makalah adalah sebagai berikut:</p><ul><li>Membantu melatih penulis untuk melatih diri agar mampu menyusun sebuah karya ilmiah dengan baik.</li><li>Memberikan wawasan yang lebih luas mengenai keilmuan bagi penulisnya.</li><li>Membantu penulis mengembangkan pemikiran secara konsep teoritis dan konsep praktis.</li><li>Membantu dalam pengembangan konsep keilmuan atau pemecahan masalah.</li></ul></div></h2><h3 id=\"jenis\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">2. Jenis-Jenis Makalah</h3><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Secara garis besar, makalah dibagi menjadi 3 jenis yaitu sebagai berikut</p><ol><li>Makalah deduktif yang ditulis berdasarkan kajian teoritis dan menggunakan analisis dengan menggunakan berbagai sumber referensi yang relevan dengan masalah yang dibahas.</li><li>Makalah induktif yang disusun berdasarkan data empiris dan dari data lapangan. Data lapangan digunakan untuk membuat analisis objektif terhadap permasalahan dalam makalah tersebut.</li><li>Makalah campuran yang ditulis berdasarkan kajian teoritis sekaligus data empiris yang didapat dari penelitian lapangan atau dapat dikatakan sebagai gabungan dari makalah jenis deduktif dan induktif. Makalah campuran memiliki berbagai jenis makalah yaitu:<ul><li>Makalah Ilmiah yang membahas suatu permasalahan dari hasil studi ilmiah</li><li>Makalah Kerja yang diperoleh dari hasil sebuah penelitian yang memungkinkan penulis untuk memberikan opini.</li><li>Makalah Kajian yang isinya berisi mengenai cara-cara untuk memecahkan suatu masalah yang sifatnya kontroversial.</li><li>Makalah Posisi yang disusun berdasarkan permintaan dari suatu pihak dan berfungsi sebagai alternatif pemecahan suatu permasalahan.</li><li>Makalah Analisis yang berisi megenai berbagai analisis suatu permasalahan yang sifatnya objektif dan empiris.</li><li>Makalah Tanggapan yang merupakan tanggapan/reaksi penulis terhadap suatu permasalahan yang sedang terjadi.</li></ul></li></ol></div></h2><h3 id=\"struktur\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">3. Struktur Makalah</h3><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Makalah merupakan sebuah karya tulis yang memiliki struktur dalam penyusunannya. Berikut merupakan struktur dari makalah yang baik dan benar:</p><ol><li>Cover atau halaman muka berfungsi sebagai perwajahan atau gambaran dari keseluruhan isi makalah. Bagian cover atau halaman muka berisi judul makalah, logo instansi atau lembaga tempat makalah itu dibuat, nama penulis, tempat pembuatan makalah, dan bulan serta tahun pembuatannya.</li><li>Kata pengantar merupakan bagian pengantar untuk membawa penulis ke dalam inti makalah atau sebagai kata sambutan ramah penulis sebelum masuk ke pokok pembahasan makalah. Kata pengantar berisi ucapan terimakasih terhadap berbagai pihak yang membantu dalam menyelesaikan makalah dan kendala yang dihadapi penulis dalam menulis makalah.</li><li>Daftar isi yang berfungsi untuk mempermudah pembaca dalam mencari poin penting yang ingin dibaca atau diketahui. Daftar isi berisi poin-poin yang umumnya berupa subjudul yang digunakan dalam makalah.</li><li>Bagian pendahuluan berfungsi untuk menjelaskan latar belakang pemilihan topik permasalahan dan tujuan penulis dalam menulis makalah. Dapat dikatakan bahwa bagian pendahuluan akan menjelaskan seberapa penting topik permasalahan yang diangkat dalam suatu makalah. Pendahuluan makalah umumnya berisi latar belakang masalah, topik permasalahan yang diangkat, tujuan penulisan makalah, teori yang digunakan, dan sistematika penulisan makalah tersebut.</li><li>Bagian isi dan pembahasan yang berfungsi untuk menggambarkan seluruh hasil dari penelitian atau kajian serta penjelasan rinci mengenai tujuan makalah yang ingin dicapai pada bagian pendahuluan. Pembahasan umumnya berisi poin-poin besar mengenai jawaban dari setiap pertanyaan penelitian yang digunakan untuk memenuhi tujuan penulisan makalah. Atau dapat dikatakan juga bahwa bagian isi dan pembahasan berisi solusi atau pemecahan dari masalah yang diangkat.</li><li>Bagian kesimpulan yang merupakan rangkuman singkat mengenai segala isi dari makalah yang umumnya berisi jawaban singkat dari pertanyaan permasalahan.</li><li>Daftar Pustaka berfungsi untuk memperlihatkan bahwa penulis membahas topik permasalahan menggunakan sudut pandang objektif dan bukan dari sisi subjektivitasnya karena menggunakan berbagai referensi pendukung. Selain itu daftar pustaka berfungsi untuk memberikan kredit kepada penulis karena tulisannya dikutip dalam makalah tersebut. Daftar pustaka dapat berasal dari buku, majalah, website, koran, serta sumber valid lainnya.</li><li>Lampiran berfungsi sebagai bukti bahwa penulis melakukan kajian secara langsung terhadap topik yang diangkat. Lampiran dapat berupa bukti foto penelitian lapangan, cuplikan sumber data, bentuk kuesioner untuk survei lapangan, dan lain sebagainya.</li></ol></div></h2><h3 id=\"cara-membuat\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">4. Cara Membuat Makalah yang Baik dan Benar</h3><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Untuk membuat makalah yang baik dan benar, anda perlu mengikuti langkah-langkah berikut:</p><ol><li>Tahap Persiapan<ul><li>Tahap ini dimulai dengan menentukan tema dan topik yang akan diangkat</li><li>Merumuskan tujuan penulisan makalah sesuai dengan topik yang dibahas</li><li>Menentukan batasan dan judul makalah yang menggambarkan secara umum isi dari keseluruhan makalah</li><li>Mengumpulkan referensi atau sumber yang berhubungan dengan topik yang diangkat atau melakukan survey lapangan untuk memperoleh data yang dibutuhkan</li><li>Mengembangkan kerangka makalah</li></ul></li><li>Tahap Penulisan<ul><li>Mengkaji mengenai referensi yang sudah dikumpulkan sebelumnya apakah sesuai atau tidak dengan topik yang diangkat</li><li>Mengolah data hasil lapangan menjadi tulisan yang dimuat dalam makalah</li><li>Menggunakan bahasa yang tepat</li></ul></li><li>Tahap Revisi dan Pemeriksaan<p class=\"mb-0\" style=\"line-height: 30px;\">Setelah makalah rampung, maka dilakukan revisi dan penilaian kembali agar makalah yang dihasilkan baik adanya dan terhindar kesalahan baik teknis maupun non teknis.</p></li><li>Tahap Publikasi<p class=\"mb-0\" style=\"line-height: 30px;\">Tahap publikasi merupakan tahap untuk menerbitkan makalah yang umumnya disertai dengan kegiatan untuk memperhatikan ulang mengenai hal-hal teknis berupa logo, format, dan lainnya.</p></li></ol></div></h2><h3 id=\"contoh\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">5. Contoh Makalah yang Baik dan Benar</h3><h2 class=\"mb-4 title-article\" xss=\"removed\"><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif; font-size: 16px;\"><iframe src=\"https://buatintugasku.com/files/contoh-tugas/makalah.pdf\" width=\"100%\" height=\"600px\"></iframe><p class=\"mb-2 mt-4\" style=\"line-height: 30px;\">Untuk kamu yang mungkin memiliki kesibukan sehingga tidak memiliki cukup waktu untuk melakukan riset mengenai topik yang diangkat atau mencari referensi pendukung, kamu dapat mempercayakan tugas mu kepada orang yang telah berpengalaman dalam membuat tugas. Ya, benar, <a href=\"https://buatintugasku.com/\" style=\"color: rgb(214, 48, 35); transition: all 0.35s ease 0s;\">joki tugas</a>. Tak perlu khawatir karena tugasmu akan selesai dengan baik serta datamu dijamin tidak akan bocor, lho.</p><p class=\"mb-2\" style=\"line-height: 30px;\">Bagi kamu yang tertarik, jasa joki tugas terbaik untuk menyusun makalah adalah <a href=\"https://buatintugasku.com/\" style=\"color: rgb(214, 48, 35); transition: all 0.35s ease 0s;\">Buatin Tugasku</a>. Buatin Tugasku merupakan sebuah platform untuk membantu kamu menyelesaikan seluruh tugas sekolah atau kuliahmu dengan cepat, aman, berkualitas, serta tentunya murah. Buatin Tugasku akan menjadi teman tugas terbaikmu.</p></div></h2>', 'fa fa-book', 'Aktif', '2022-07-31 18:16:20', '2022-09-19 13:42:03', NULL),
(2, 'Jasa Olah Data', 'tugas-esai', 'Kami telah membantu lebih dari 2000 mahasiswa untuk olah data statistik dgn SPSS, Eview, Smartpls, Pls, SEM, Excel, Stata dll', '<h2 class=\"mb-4 title-article\" style=\"font-weight: 600; line-height: 1.25; font-family: Exo, sans-serif; color: rgb(214, 48, 35);\">Cara Membuat Esai: Definisi, Jenis, Struktur, dan Contohnya</h2><div style=\"color: rgb(59, 78, 94); font-family: Roboto, sans-serif;\"><p class=\"mb-2\" style=\"line-height: 30px;\">Kamu sering ditugaskan untuk membuat esai atau sering disebut essay oleh dosen atau guru kamu? Apakah sulit untuk membuat esai yang baik dan menarik? Sebenarnya membuat sebuah esai itu gampang jika kamu mengetahui cara-cara serta prosedur untuk membuatnya. Untuk itu, yuk simak artikel ini agar kamu bisa buat esai yang baik sehingga nilai tugas kamu tinggi. Pastikan kamu baca hingga akhir, ya. Yuk langsung saja kita mulai</p><div class=\"gray-bg d-inline-block p-3 my-4\" style=\"background: rgb(244, 249, 252);\"><h3 style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Daftar Isi</h3><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#definisi\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1. Definisi Esai</a></p><p class=\"ml-3 mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#pengertian\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1.1. Pengertian Esai</a></p><p class=\"ml-3 mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#ciri-ciri\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1.2. Ciri-Ciri Esai</a></p><p class=\"ml-3 mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#fungsi-manfaat\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">1.3. Fungsi dan Manfaat Esai</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#jenis\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">2. Jenis-Jenis Esai</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#struktur\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">3. Struktur Esai</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#cara-membuat\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">4. Cara Membuat Esai yang Baik dan Benar</a></p><p class=\"mb-0\" style=\"line-height: 30px;\"><a href=\"https://buatintugasku.com/daftar-tugas/esai/#contoh\" class=\"text-color-secondary\" style=\"color: rgb(59, 78, 94); transition: all 0.35s ease 0s;\">5. Contoh Esai yang Baik dan Benar</a></p></div><h3 id=\"definisi\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">1. Definisi Esai</h3><h4 id=\"pengertian\" style=\"font-weight: 700; line-height: 30px; font-size: 1.3rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Pengertian Esai</h4><p class=\"mb-2\" style=\"line-height: 30px;\">Menurut Wijayanti (2012) esai merupakan suatu tulisan yang menyampaikan kejadian yang terjadi di masyarakat atau lingkungan, berupa fakta dan bisa juga pengalaman. Sementara menurut Dalman (2011) esai adalah sebuah tulisan yang menggambarkan opini penulis tentang subjek tertentu yang dicoba untuk dinilai oleh penulis tersebut. Dan di dalam Kamus Besar Bahasa Indonesia (KBBI) disebutkan bahwa esai merupakan sebuah karangan prosa yang membahas suatu masalah sepintas lalu dari sudut pandang pribadi penulisnya.</p><p class=\"mb-2\" style=\"line-height: 30px;\">Dapat disimpulkan bahwa esai merupakan sebuah tulisan yang menyajikan gagasan subjektif-personal tentang suatu masalah berdasarkan sudut pandang pribadi penulisnya. Nah kalau begitu apakah perbedaan makalh dan esai? Perbedaan utama antara esai dengan makalah adalah makalah umumnya memakan waktu penelitian yang lebih lama serta dipublikasikan dalam panjang teks yang lebih banyak dibandingkan dengan sebuah esai biasanya hanya tiga sampai lima paragraf, dibandingkan dengan kertas penelitian yang beberapa halaman. Selain itu makalah lebih mengutamakan kajian teoritis dan pengetahuan dari pemakalah, namun esai lebih mengedepankan mengenai opini dari seseorang terhadap suatu kasus yang diangkat dalam esai.</p><h4 id=\"ciri-ciri\" style=\"font-weight: 700; line-height: 30px; font-size: 1.3rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Ciri-Ciri Esai</h4><p class=\"mb-2\" style=\"line-height: 30px;\">Sebagai sebuah karya tulis, esai memiliki ciri-ciri unik yang dapat menjadikannya berbeda dengan karya tulis lainnya yaitu sebagai berikut:</p><ul><li>Bentuk Berupa Prosa yang artinya di dalam tulisan ilmiah ini disampaikan apa adanya dengan bentuk komunikasi biasa. Sehingga tidak akan dijumpai esai dengan bahasa dan ungkapan yang sifatnya figuratif.</li><li>Bentuk isi tidak utuh yang berarti bahwa penulis hanya akan menuliskan bagian yang penting dan menarik dalam pembahasan esai. Penulis esai handal umumnya akan fokus pada hal-hal penting dan dianggap menarik dari suatu objek maupun subjek. Hal ini kemudian membuat esai memiliki bentuk isi tidak utuh. Sebab hanya memaparkan bagian yang dianggap oleh penulis penting dan menarik, sehingga tidak menulis secara keseluruhan.</li><li>Memiliki gaya menulis yang khas yang menjadi gaya pembeda atau gaya penyampaian yang sifatnya khas. Gaya khas inilah yang kemudian membedakan esai hasil tulisan satu penulis dengan penulis lainnya. Namun, hal ini dapat terbentuk alami karena penulisannya sendiri dalam bentuk prosa.</li><li>Memenuhi kriteria penulisan sebagai sebuah karya ilmiah. Meskipun di dalam penulisan karya ilmiah ini tidak memaparkan detail objek dan subjek tulisan. Namun tetap memenuhi kriteria penulisan yang sudah ditetapkan dan berhubungan dengan kaidah struktur penulisan. Sehingga terdapat pendahuluan, pengembangan isi, dan juga bagian akhir (pengakhiran).</li><li>Singkat karena memang hanya terdiri dari satu atau beberapa lembar bahkan kebanyakan satu lembar saja. Sehingga membuat tulisan ilmiah ini bisa dengan cepat dibaca sampai tuntas. Pembaca pun tidak perlu meluangkan banyak waktu untuk memahami isi esai tersebut.</li><li>Memiliki ciri personal dari penulis yang berasal dari penulis esainya. Maksudnya adalah memiliki ciri khas dari masing-masing penulis, sebab memang isinya sendiri sesuai dengan pandangan, sikap, pemikiran, dan juga dugaan dan pendirian penulis tersebut.</li></ul><h4 id=\"fungsi-manfaat\" style=\"font-weight: 700; line-height: 30px; font-size: 1.3rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">Fungsi dan Manfaat Esai</h4><p class=\"mb-2\" style=\"line-height: 30px;\">Fungsi esai yaitu untuk memberi pandangan mengenai sebuah permasalahan serta meyakinkan pembaca mengenai opini dari penulis. Secara detail, esai berfungsi untuk mempertahankan sudut pandang subyektif dan pribadi tentang suatu subjek (politik, sosial, budaya, moral, perilaku, sastra, agama, humanistik, filosofis, dll.) tanpa formalitas seperti dokumen atau bukti empiris atau deductible yang bersifat ilmiah yang umumnya digunakan juga sebagai media debat mengenai suatu kasus atau topik.</p><p class=\"mb-2\" style=\"line-height: 30px;\">Manfaat dari esai diantaranya adalah mengembangkan gagasan-gagasan baru dari sudut pandang yang berbeda, sebagai jembatan antara pendapat satu dengan pendapat lain yang terjadi di masyarakat, sebagai bahan pertimbangan oleh semua pihak dalam mengeluarkan berbagai pendapat, sebagai penyeimbang perbedaan pendapat agar tidak saling berbenturan, sebagai solusi baru yang mungkin dapat direalisasikan pada bidangnya, serta sebagai alat ukur bagi diri sendiri tentang sejauh mana kemampuan menulisnya.</p><h3 id=\"jenis\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">2. Jenis-Jenis Esai</h3><p class=\"mb-2\" style=\"line-height: 30px;\">Berikut merupakan berbagai jenis dari esai yang memiliki ciri dan fungsi masing-masing:</p><ol><li>Esai deskriptif yang berisi pendapat dan cara pandang penulis mengenai suatu objek atau subjek tulisan yang kemudian disampaikan secara deskriptif atau dijelaskan dengan detail. Sehingga pembaca kemudian bisa menggambarkan bentuk dan sifat atau apapun dari objek dan subjek yang dipilih untuk menjadi topik utama dalam tulisan ilmiah tersebut. Secara sederhana, jenis ini menjelaskan atau menggambarkan suatu objek dan subjek secara detail.</li><li>Esai Tajuk adalah jenis esai yang mempunyai satu fungsi khusus yakni menggambarkan pandangan atau sikap media terhadap topik dan isu di tengah masyarakat. Praktis, tulisan ilmiah jenis ini kemudian wajib dipublikasikan di media cetak baik itu surat kabar maupun majalah. Fungsi utamanya adalah membantu membentuk opini pembaca dari suatu peristiwa atau isu yang tengah menghangat di tengah masyarakat.</li><li>Esai Cukilan Watak yang memberikan hak atau kebebasan kepada penulis untuk memaparkan beberapa segi kehidupan individu atau segi kehidupan dari seseorang, bisa juga dari kehidupan pribadi penulis tersebut. Melalui jenis ini, pembaca kemudian bisa mengetahui bagaimana penilaian penulis terhadap seseorang yang sedang dibahas dan menjadi isi dari tulisan yang disusunnya. Namun, penulis tentunya tidak menulis sebuah biografi sebab hanya menuliskan sedikit dari pengalaman dan peristiwa seseorang.</li><li>Esai Pribadi atau personal essay adalah tulisan yang ditulis oleh seorang penulis dan berisi pemaparan pengalaman dan kegiatan pribadinya. Sehingga disini penulis esai sedang menulis esai tentang dirinya sendiri. Nantinya akan dijumpai penyebutan penulis sebagai saya dan memang menjadi “saya” tersebut.</li><li>Esai Reflektif yang disampaikan secara formal dan berisi mengenai suatu hal yang diungkapkan secara mendalam, sungguh-sungguh, dan hati-hati. Sebab secara umum topik di dalam esai jenis ini adalah kematian, kehidupan, politik, pendidikan, dan bisa juga mengenai hakikat manusia.</li><li>Esai Kritik adalah jenis esai yang menjelaskan mengenai pandangan dari penulis terhadap suatu seni dan umumnya merupakan seni tradisional yang disampaikan dengan jelas dan kalimat yang tentunya mudah dipahami sekaligus tidak menyinggung secara keras.</li></ol><h3 id=\"struktur\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">3. Struktur Esai</h3><p class=\"mb-2\" style=\"line-height: 30px;\">Sebagai suatu karya ilmiah, esai memiliki struktur penulisan yang menjadikannya unik sehingga dalam penulisannya, kamu harus mengikuti struktur dibawah ini, ya.</p><ol><li><span class=\"d-block\" style=\"font-weight: bolder;\">Pendahuluan</span>Pendahuluan berisi mengenai topik atau tema yang hendak dibahas yakni latar belakang dari pemilihan topik serta pandangan dari penulis terhadap topik yang diangkat. Menyampaikan topik di bagian awal juga menjadi ciri khas sekaligus menjadi media bagi pembaca untuk memahami isi dari keseluruhan esai dengan lebih mudah. Sebab sudah bisa menebak atau memiliki gambaran mengenai apa yang akan disampaikan penulis sejak awal.</li><li><span class=\"d-block\" style=\"font-weight: bolder;\">Isi atau Pembahasan</span>Bagian atau struktur kedua setelah pendahuluan adalah isi atau pembahasan dari esai yang disusun yang merupakan inti dari keseluruhan isi esai dimana terdapat seluruh pembahasan mengenai topik yang diangkat. Pada bagian isi dan pembahasan, penulis akan menyampaikan inti topik lengkap dengan penilaian atau pandangan pribadinya dengan detail namun tetap terstruktur secara kronologis, sehingga pandangannya bisa dipahami dan dimengerti oleh para pembaca. Melalui bagian isi inilah penulis dapat menjelaskan apapun sedetail mungkin sesuai keinginannya.</li><li><span class=\"d-block\" style=\"font-weight: bolder;\">Penutup atau Kesimpulan</span>Kesimpulan atau sering disebut sebagai bagian penutup berisi rangkuman dan juga ringkasan dari apa yang disampaikan di bagian pendahuluan dan juga isi atau pembahasan.</li><li><span class=\"d-block\" style=\"font-weight: bolder;\">Daftar Pustaka atau Referensi</span>Jika penulis mengutip atau menggunakan pendapat dari buku, majalah, koran, atau sumber lainnya, maka penulis harus mencantumkannya di dalam daftar pustaka atau referensi di akhir esai.</li></ol><h3 id=\"cara-membuat\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">4. Cara Membuat Esai yang Baik dan Benar</h3><p class=\"mb-2\" style=\"line-height: 30px;\">Berikut merupakan langkah-langkah yang harus kamu ikuti untuk dapat membuat sebuah esai yang baik dan menarik:</p><ol><li>Menentukan Tema/Topik Tema tulisan bisa diambil sebagai pilihan dari tema yang ada atau sebuah tema sebagai ketentuan. Apabila tidak ada tema/topik yang ditentukan untuk ditulis, maka kita mencari dan menentukan tema secara mandiri yang menarik perhatian kita, yang disukai, yang dikuasai, dan yang dipahami.</li><li>Menentukan tujuan tulisan untuk memudahkan kita dalam mencari inspirasi, membuat analisis, memberikan interpretasi, membuat argumen, atau menyusun uraian isi yang akan disajikan.</li><li>Merumuskan masalah dan melakukan riset data yang berasal dari media cetak atau elektronik, buku, tinjauan langsung atau observasi, dan lain-lain.</li><li>Membuat Outline (Kerangka Tulisan) dimana outline disusun dalam bentuk kerangka topik atau kerangka kalimat dan harus memperhatikan kesederajatan logis, kesetaraan struktur, kepaduan, dan penekanan untuk mempermudah menulis esai, sehingga esai koheren dan tidak keluar jalur dari topik yang dibahas.</li><li>Menulis Esai berdasarkan outline yang telah dibuat dengan memperhatikan bagian pendahuluan, isi/pembahasan, dan penutup/kesimpulan. Gunakan bahasa yang baik dan benar. Perhatikan penggunaan ejaan, tanda baca, dan diksi yang baik.</li><li>Mengedit esai atau sering disebut sebagai kegiatan menyunting untuk memeriksa dan memastikan apakah esai yang kita tulis sudah baik, yaitu dengan memeriksa apakah ide-ide yang ditulis koheren, apakah diksi yang digunakan tepat, apakah kalimat yang digunakan efektif, apakah ejaan dan tanda baca sudah benar, dan lain-lain. Aspek yang diperiksa berkaitan dengan mekanika, bahasa, dan isi dari esai.</li></ol><h3 id=\"contoh\" style=\"font-weight: 700; font-size: 1.5rem; font-family: Exo, sans-serif; color: rgb(34, 34, 34);\">5. Contoh Esai yang Baik dan Benar</h3><iframe src=\"https://buatintugasku.com/files/contoh-tugas/esai.pdf\" width=\"100%\" height=\"600px\"></iframe><p class=\"mb-2 mt-4\" style=\"line-height: 30px;\">Untuk kamu yang mungkin memiliki kesulitan atau kesibukan sehingga tidak memiliki cukup waktu untuk melakukan riset mengenai topik yang diangkat atau mencari referensi pendukung, kamu dapat mempercayakan tugas sekolah atau kuliah kepada orang yang telah berpengalaman dalam membuat tugas. Ya, benar, <a href=\"https://buatintugasku.com/\" style=\"color: rgb(214, 48, 35); transition: all 0.35s ease 0s;\">joki tugas</a>. Tak perlu khawatir karena tugasmu akan selesai dengan baik serta datamu dijamin tidak akan bocor, lho.</p><p class=\"mb-2\" style=\"line-height: 30px;\">Untuk kamu yang tertarik, jasa joki tugas terbaik untuk menyusun esai yang baik dan menarik adalah <a href=\"https://buatintugasku.com/\" style=\"color: rgb(214, 48, 35); transition: all 0.35s ease 0s;\">Buatin Tugasku</a>. Buatin Tugasku merupakan sebuah platform untuk membantu kamu menyelesaikan seluruh tugas sekolah atau kuliahmu dengan cepat, aman, berkualitas, serta tentunya murah. Buatin Tugasku akan menjadi teman tugas terbaikmu.</p></div>', 'fa fa-file-excel', 'Aktif', '2022-07-31 20:05:47', '2022-09-19 13:44:07', NULL),
(3, 'test', 'test', 'test', '<blockquote class=\"blockquote\">vcfghdgfjfhgghj</blockquote>', 'fa fa-home', 'Aktif', '2022-07-31 21:08:55', '2022-08-09 00:19:06', '2022-07-31 22:32:09'),
(4, 'Pembuatan Aplikasi', '', 'Pembuatan aplikasi berbasis website dan mobile sudah menjadi unggulan kami. Tim IT yang professional siap membantu kamu.', '<p>Olah data </p>', 'fa fa-mobile', 'Aktif', '2022-09-10 14:18:59', '2022-09-19 13:49:11', NULL),
(5, 'Bimbingan Online', '', 'Tidak hanya pembuatan skripsi, kami ingin kamu juga memiliki skill dan pengetahuan yang mumpuni hingga bisa diandalkan oleh tempat kerja kamu setelah kamu lulus. Oleh karena itu kami juga dapat membimbing kamu dalam penyusunan skripsi dan thesis.', '<p>Tugas Kuliah</p>', 'fa fa-chalkboard-teacher', 'Aktif', '2022-09-10 14:20:14', '2022-09-19 13:52:57', NULL),
(6, 'Tugas Kuliah/Sekolah', '', 'Kami juga melayani pembuatan tugas mulai dari sekolah s/d kuliah. Sinikujokiin telah mengerjakan hampir 90?ri berbagai jenis tugas yang pernah ditanyakan ke tim kami dengan hasil yang sangat baik dan memuaskan.', '<p>Konsultasi Online</p>', 'fa fa-book', 'Aktif', '2022-09-10 14:22:46', '2022-09-19 13:53:58', NULL),
(7, 'Jasa Design', '', 'Layanan jasa desain untuk bisnis kamu. Kami menyediakan jasa desain grafis seperti Design Logo, Company Profile, Konten Social Media, Design Banner, CV dll.', '<p>thesis</p>', 'fa fa-pencil-alt', 'Aktif', '2022-09-10 14:42:08', '2022-09-19 13:55:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `fullname`, `email`, `phone`, `profile_picture`, `role_id`, `nickname`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'luthfi.ihdalhusnayain@gmail.com', '0895322316585', '81f66d122abb52887085920c7eb28ec4.png', 1, 'ADM', 'Active', '2022-04-19 13:08:35', 1, '2022-04-28 11:37:28', 1, NULL, NULL),
(5, 'sinikujokiin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin Sinikujokiin', 'sinikujokiin@gmail.com', '085770521528', 'a1c159ff48ff479a759e2a73be4b0330.png', 4, 'sinikujokiin', 'Active', '2022-08-28 21:50:19', 1, '2022-09-07 08:59:37', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access`
--

CREATE TABLE `users_access` (
  `id_user_access` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `access_creat` enum('Yes','No') NOT NULL,
  `access_read` enum('Yes','No') NOT NULL,
  `access_update` enum('Yes','No') NOT NULL,
  `access_delete` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_access`
--

INSERT INTO `users_access` (`id_user_access`, `menu_id`, `role_id`, `access_creat`, `access_read`, `access_update`, `access_delete`) VALUES
(49, 8, 3, 'Yes', 'Yes', 'Yes', 'Yes'),
(50, 9, 3, 'Yes', 'Yes', 'Yes', 'Yes'),
(51, 11, 3, 'Yes', 'Yes', 'Yes', 'Yes'),
(128, 13, 2, 'Yes', 'Yes', 'Yes', 'Yes'),
(129, 14, 2, 'Yes', 'Yes', 'Yes', 'Yes'),
(130, 8, 2, 'Yes', 'Yes', 'Yes', 'Yes'),
(131, 9, 2, 'Yes', 'Yes', 'Yes', 'Yes'),
(132, 11, 2, 'Yes', 'Yes', 'Yes', 'Yes'),
(390, 13, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(391, 14, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(392, 8, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(393, 30, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(394, 38, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(395, 34, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(396, 24, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(397, 25, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(398, 27, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(399, 28, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(400, 31, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(401, 32, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(402, 33, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(403, 26, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(404, 37, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(405, 36, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(406, 1, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(407, 2, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(408, 3, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(409, 4, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(410, 5, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(411, 6, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(412, 7, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(413, 18, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(414, 29, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(415, 21, 1, 'Yes', 'Yes', 'Yes', 'Yes'),
(416, 13, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(417, 14, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(418, 8, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(419, 30, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(420, 38, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(421, 24, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(422, 25, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(423, 27, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(424, 28, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(425, 31, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(426, 32, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(427, 33, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(428, 26, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(429, 37, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(430, 36, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(431, 1, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(432, 2, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(433, 3, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(434, 4, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(435, 5, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(436, 6, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(437, 7, 4, 'Yes', 'Yes', 'Yes', 'Yes'),
(438, 18, 4, 'Yes', 'Yes', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `cara_order`
--
ALTER TABLE `cara_order`
  ADD PRIMARY KEY (`id_cara_order`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id_fitur`);

--
-- Indeks untuk tabel `jenis_joki`
--
ALTER TABLE `jenis_joki`
  ADD PRIMARY KEY (`id_jenis_joki`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_logs`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_web`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `testimoni_chat`
--
ALTER TABLE `testimoni_chat`
  ADD PRIMARY KEY (`id_testimoni_chat`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users_access`
--
ALTER TABLE `users_access`
  ADD PRIMARY KEY (`id_user_access`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cara_order`
--
ALTER TABLE `cara_order`
  MODIFY `id_cara_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id_fitur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_joki`
--
ALTER TABLE `jenis_joki`
  MODIFY `id_jenis_joki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id_logs` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_web` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `testimoni_chat`
--
ALTER TABLE `testimoni_chat`
  MODIFY `id_testimoni_chat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_access`
--
ALTER TABLE `users_access`
  MODIFY `id_user_access` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
