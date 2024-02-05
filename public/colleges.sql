-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2024 at 11:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `28jan2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `college_address` varchar(255) DEFAULT NULL,
  `principal_name` varchar(50) DEFAULT NULL,
  `website_url` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `college_address`, `principal_name`, `website_url`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 'Sangamner Nagarpalika Arts, D.J. Malpani Commerce and B.N. Sarda Science College.(Autonomous)', 'At post- Ghulewadi, Nashik Pune Highway, Sangamner , Ahmednagar,Maharashtra -422605', 'I/C Principal Dr. Gaikwad Arun Hari\r\n', 'https://sangamnercollege.edu.in/', '02425 225893', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(2, ' Agasti Arts, Commerce And Dadasaheb Rupwate Science College Tal - Akole, Dist - Ahmednagar,', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(3, 'Adv. M.N. Deshmukh Arts, Com. And Science  College, Rajur', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(4, 'Agasti Arts Commerce And Dadasaheb Rupwate Science College Akole', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(5, 'Ahmednagar College,  Ahmednagar ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(6, 'Annasaheb Waghire Arts, Science & Commerce College, Otur-412409', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(7, 'Arts, Commerce & Science College Satral  Tal- Rahata', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(8, 'Arts, Commerce and Science College Kalwan (Manur)', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(9, 'Arts, Science & Commerce College, Rajur-422604', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(10, 'Arts,Commerce& Science College, Narayangaon', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(11, 'Asso. Prof. Department of English, G.T. Patil College, Nandurbar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(12, 'B.R. Gholap College, Sangvi, Pune. ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(13, 'Bhartiya Mahavidyala,Amravati', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(14, 'Bytco College , Nashik ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(15, 'C. D. Jain College of Commerce, Shrirampur ,Dist.Ahmednagar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(16, 'C.A.S.S., S.P.P.U. Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(17, 'CMCS College, Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(18, 'College of Agriculture Business Management,Gunjalwadi Pathar,Sangamner', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(19, 'College of Agriculture Sonai, Sonai-Rahuri Road, Prashantnagar, Sonai, Maharashtra, 414105. ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(20, 'College of Agriculture, Loni,Tal-Rahata Dist-Ahmednagar,413736', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(21, 'College of Agriculture,Maldad,Tal Sangamner, Dist Ahmednagar,422608', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(22, 'D.B. N. P. Arts, S.S.S.G. Commerce and S.S. A. M. Science College, Lonaval, Dist - Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(23, 'D.B.F. Dayanand College of Arts & Science, Solapur', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(24, 'Dang Seva Mandal\'s Arts College, Abhone, Tal - Kalwan, Dist - Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(25, 'Deogiri College Aurangabad', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(26, 'Department of English, Davangere University, Davangere, Karnataka', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(27, 'Department of Zoology, Ahmednagar College, Ahmednagar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(28, 'Global Institute of Management, Sangamner.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(29, 'GMD Arts, BW Commerce and Science College, Sinnar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(30, 'Hon. B.J.Arts, Commerce and Science college, Ale, Tal.Junnar Dist. Pune 412411', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(31, 'Hotel Suyog Dhandarphal Bk. Sangamner', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(32, 'HPT Arts and RYK Science College Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(33, 'Indira College Of Commerce And Science,Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(34, 'Jede College,Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(35, 'K.A.A.N.M.S.Arts, Commerce and Science College , Satana, Tal:-Baglan Dist:Nashik ,', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(36, 'K.J.Somaiya College Kopergoan, Tal.Kopergoan ,Dist - Ahmednagar,', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(37, 'Karmaveer Shantarambapu Kondaji Wavare Arts, Science & Commerce College, CIDCO, Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(38, 'Kohinoor College of Arts, Commerce & Science, Khultabad, Aurangabad, MH', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(39, 'KTHM College Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(40, 'L.V.H. College, Panchvati, Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(41, 'Late Abasaheb Kakade Arts College, Bodhegaon, Tal-Shevgaon, Dist-Ahmednagar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(42, 'Late BRD Arts and Commerce Mahila Mahavidyalaya, Nashik Road, Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(43, 'Livestock Management and Dairy Production, Gunjalwadi, Pathar, Sangamner', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(44, 'Loknete Ramdas Patil Dhumal Arts, Science and Commerce College, Rahuri.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(45, 'M.S.G. Arts, Science & Commerce College, Malegaon, Dist. Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(46, 'Maharaja Sayajrao Gaikwad College,Malegaon', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(47, 'Mahatma Phule Mahavidyalaya Pimpri, Pune. ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(48, 'MGV Arts, Science and Commerce College, Manmad, Dist- Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(49, 'Modern college\nShivajinagar,Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(50, 'Modern College,Parvati,Pune9', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(51, 'Modern College,Shivajinagar,Pune-5', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(52, 'MVP\'s Art, Commerce and Scence College, Vadner Bhairav.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(53, 'MVP\'s G.M.D. Arts, B.W. Commerce and Science College, Sinnar-422103', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(54, 'N.V.P. Mandal\'s Art\'s, Commerce and Science College, Lasalgaon.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(55, 'Ness Wadiya College Pune ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(56, 'New Art\'s Commerce and Science College, Shegaon', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(57, 'New Arts, Comm. & Science College, Parner Tal. Parner Dist. Ahmednagar.  ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(58, 'New Arts, Commerce & Science College, Ahmednagar.  ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(59, 'New Arts, Commerce and Science College, Ahmednagar ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(60, 'New Arts, Commerce and Science College, Ahmednagar ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(61, 'Nutan Vidya Prakas Mandal\'s Art Commerce and Science College Lasalgaon Tal Niphad Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(62, 'P.D.E. A. Annasaheb Waghire Arts, Commerce & Science College, Otur, Tal. Jaunnar Dist. Pune ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(63, 'P.V.P. COLLEGE OF ARTS SCIENCE & COMMERCE PRAVARANAGAR', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(64, 'Parner College, Parner ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(65, 'PDEA\'S Anantrao awar College, Pirangut,Dist.Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(66, 'Pemraj Sarda College, Ahmednagar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(67, 'PG Research Centre, M.J.College, Jalgaon', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(68, 'PIRENS Institute of Business Management and Administration, Loni Bk.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(69, 'Pratap College, Amalner ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(70, 'Pratishthan Mahavidyalaya,  Paithan\n', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(71, 'Prof. Ramakrishna More Art\'s, Commerce and Science College, Akurdi .', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(72, 'Professor, Department of English, Dr Babasaheb Ambedkar Marathwada University', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(73, 'R.B.N.B College Shrirampur ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(74, 'R.N.Chandak Arts,  J.D. Bytco Comm. & N.S. Chandak Science College, Nashik. ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(75, 'Rajarshi Shahu Mahavidyalaya., Deolali Pravara ,Tal.Rahuri ,Dist.Ahmednagar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(76, 'Ramkrushna More College Akurdi, Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(77, 'Ramnarain Ruia Arts and Science Autonomous College, Matunga, Mumbai', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(78, 'S.M.B.S.T College of Arts, Science and Commerce, Sangamner', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(79, 'S.N.G.Institute of Management & Research', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(80, 'S.P. College ,Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(81, 'S.P.Sansthas College Of Education', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(82, 'Samarth college of computer science, Belhe', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(83, 'Savitribai Phule Pune University, Pune ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(84, 'Sayyad Foods Pvt.Ltd Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(85, 'Shirdi Sai Rural Institute\'s ARTS, SCIENCE AND COMMERCE COLLEGE', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(86, 'Shivaji University, Kolhapur', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(87, 'Sir Parshurambhau College,pune ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(88, 'Smt S. K. Gandhi Arts, Amolak Sciecne & P. H. Gandhi Commerce College Kada', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(89, 'SNJB\'s K.K.H.A. Arts, S.M.G.L. Commerce & S.P.H.J. Science College, Neminagar, Chandwad.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(90, 'Sonopant Dandekar Arts, V. S. Apte Commerce and M. H. Mehta Science College, Palghar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(91, 'SSGM College Kopargaon', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(92, 'Sunrise Trips Pvt. Ltd, Sangamner ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(93, 'T. C. College, Baramati', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(94, 'Waghire College,Saswad.', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(95, 'Women\'s College of Home Science and BCA, Loni', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(96, ' Arts Commerce and Science college, Ashwi kd Sangamner ', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'S.M. Joshi College, Hadapsar, Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(98, 'TUMKUR UNIVERSITY', 'TUMKUR UNIVERSITY.TUMKURU', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(100, 'Amritvahini College of Engineering, Sangamner', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(101, 'Mula Education Society\'s Shri Dnyaneshwar College, Sonai', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(102, 'Mahafeed Speciality Fertilizers, Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(103, 'Shiv Chhatrapati College, Junnar, Tal. Junnar, Dist. Pune ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(104, 'Annasaheb Waghire College, Otur, Tal Junnar, Dist. Pune ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(105, 'Lal Bahadur Shastri college of Arts, Science and Commerce, Satara ', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(106, 'MES Abasaheb Garware College, Pune', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(107, 'Nutan Art\'s, Com. & Sci. College Rajapur, Tal - Sangamner', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(108, 'Karmveer Kakasaheb Wagh Arts, Science and Commerce College, Pimpalgaon B.Tal.Niphad.Dist. Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(109, 'K. K. Wagh Institute of Engineering Education & Research, Nashik.\r\nHirabai Haridas Vidyanagari, Amrutdham, Panchavati, Nashik – 422003', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(110, 'Akole Taluka Education Society\'s Technical Campus,  Akole', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(111, 'Abhinav Education Society\'s Institute of Management and Busines Administration,  Akole', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(112, 'Ashoka Center for Business and Computer Studies, Nashik', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(113, 'Ramesh Firodiya College of Arts, Commerce and Science, Sakur, Tal: Sangamner, Dist: Ahmednagar', '', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(114, 'Institute of Industrial Computer Management and Research Centre, Nigdi, Pune', 'Nigdi, Pune', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48'),
(115, 'Arts, Science and Commerce College Kolhar, Taluka- Rahata, Ahmednagar', 'Kolhar, Taluka- Rahata, Ahmednagar', '', '', '', '2021-12-24 12:56:24', '2021-12-27 14:47:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
