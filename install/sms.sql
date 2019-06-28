-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2015 at 09:08 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ins`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_add_branch` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_contact_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `b_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `b_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_add_branch`
--

INSERT INTO `tbl_add_branch` (`bid`, `b_name`, `b_email`, `b_contact_no`, `b_address`, `b_status`, `created_date`) VALUES
(1, 'Bangalore', 'bangalore@gmail.com', '9090909090', 'BLR KA IN', 'enable', '2015-08-26 11:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_class`
--

CREATE TABLE IF NOT EXISTS `tbl_add_class` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `c_numeric` int(11) NOT NULL,
  `c_teacher` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `c_note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_add_class`
--

INSERT INTO `tbl_add_class` (`c_id`, `c_name`, `c_numeric`, `c_teacher`, `c_note`, `created_date`) VALUES
(1, 'One', 1, 'John Sina', 'This is Class One...', '2015-07-07 06:51:46'),
(2, 'Two', 2, 'Rubel Hossain', 'This is Class Two...', '2015-07-07 09:09:00'),
(3, 'Three', 3, 'Rubel Hossain', 'This is Class Three...', '2015-07-07 09:24:55'),
(4, 'Four', 4, 'Rubel Hossain', 'This is Class Four...', '2015-07-07 09:25:39'),
(5, 'Five', 5, 'Kamal Ahmed', 'This is Class Five...', '2015-07-07 09:26:07'),
(6, 'Six', 6, 'Kamal Uddin', 'This is Class Six...', '2015-07-07 09:26:33'),
(7, 'Seven', 7, 'Rubel Hossain', 'This is Class Seven...', '2015-07-07 09:27:07'),
(8, 'Eight', 8, 'Kamal Ahmed', 'This is Class Eight...', '2015-07-07 09:30:50'),
(9, 'Nine', 9, 'Kamal Uddin', 'This is Class Nine...', '2015-07-07 09:31:14'),
(10, 'Ten', 10, 'Rubel Hossain', 'This is Class Ten...', '2015-07-07 09:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_designation`
--

CREATE TABLE IF NOT EXISTS `tbl_add_designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_add_designation`
--

INSERT INTO `tbl_add_designation` (`designation_id`, `designation_name`, `created_date`) VALUES
(1, 'Senior Teacher', '2015-07-06 08:11:58'),
(2, 'Junior Teacher', '2015-10-05 09:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_employee_salary`
--

CREATE TABLE IF NOT EXISTS `tbl_add_employee_salary` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` int(11) NOT NULL,
  `e_month` int(11) NOT NULL,
  `e_pay_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `e_amount` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_exam_date`
--

CREATE TABLE IF NOT EXISTS `tbl_add_exam_date` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ex_class_id` int(11) NOT NULL,
  `ex_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ex_note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_add_exam_date`
--

INSERT INTO `tbl_add_exam_date` (`ex_id`, `ex_name`, `ex_class_id`, `ex_date`, `ex_note`, `created_date`) VALUES
(15, '1', 1, '01/07/2019', 'This is First Term Exam.', '2015-07-13 06:56:12'),
(16, '2', 1, '01/07/2019', 'This is 2nd Term Exam...', '2015-07-13 06:57:05'),
(17, '3', 1, '03/07/2020', 'This is Final Exam...', '2015-07-13 06:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_exam_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_add_exam_schedule` (
  `es_id` int(11) NOT NULL AUTO_INCREMENT,
  `es_term_id` int(11) NOT NULL,
  `es_class_id` int(11) NOT NULL,
  `es_subject_id` int(11) NOT NULL,
  `es_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `es_start_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `es_end_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `es_room_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_expense`
--

CREATE TABLE IF NOT EXISTS `tbl_add_expense` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_issue` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ex_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ex_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `ex_note` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_add_expense`
--

INSERT INTO `tbl_add_expense` (`ex_id`, `ex_issue`, `ex_date`, `ex_amount`, `ex_note`, `created_date`) VALUES
(2, 'Laptop', '08/20/2015', 20000.00, 'Laptop for Lab....', '2015-08-20 05:56:24'),
(3, 'Table', '10/11/2015', 4000.00, 'This is table for reception', '2015-10-11 10:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_fee_set`
--

CREATE TABLE IF NOT EXISTS `tbl_add_fee_set` (
  `fs_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name_id` int(11) NOT NULL,
  `f_type_id` int(11) NOT NULL,
  `f_fee` decimal(15,2) NOT NULL DEFAULT '0.00',
  `f_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `f_fine` decimal(15,2) NOT NULL DEFAULT '0.00',
  `fine_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_add_fee_set`
--

INSERT INTO `tbl_add_fee_set` (`fs_id`, `class_name_id`, `f_type_id`, `f_fee`, `f_date`, `f_fine`, `fine_date`, `created_date`) VALUES
(9, 1, 2, 1200.00, '09/07/2015', 20.00, '10/11/2015', '2015-09-07 12:53:49'),
(10, 1, 5, 200.00, '10/11/2015', 0.00, '10/20/2015', '2015-10-11 09:59:56'),
(11, 0, 0, 0.00, '', 0.00, '', '2015-10-11 10:02:23'),
(12, 5, 11, 5000.00, '10/11/2015', 0.00, '10/31/2015', '2015-10-11 10:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_fee_type`
--

CREATE TABLE IF NOT EXISTS `tbl_add_fee_type` (
  `ft_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fee_note` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ft_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_add_fee_type`
--

INSERT INTO `tbl_add_fee_type` (`ft_id`, `fee_type`, `fee_note`, `created_date`) VALUES
(2, 'Admission Fee', 'This is admission fee..', '2015-08-19 09:32:16'),
(5, 'Sports Fee ', 'This is Sports Fee...', '2015-08-20 06:47:53'),
(6, 'Cultural Club Fee ', 'This is Cultural Club Fee....', '2015-08-20 06:48:06'),
(7, ' 	Registration Fee ', '', '2015-08-20 06:48:16'),
(8, 'Form & Late Fee ', '', '2015-08-20 06:48:25'),
(9, 'Transcript Fee ', '', '2015-08-20 06:48:37'),
(10, 'Retake Fee ', '', '2015-08-20 06:48:49'),
(11, 'Others ', 'This is Others...', '2015-08-20 06:49:09'),
(12, 'Tution Fee', 'This is tution fee....', '2015-10-11 09:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_fine`
--

CREATE TABLE IF NOT EXISTS `tbl_add_fine` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fday` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fmonth` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fyear` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_add_fine`
--

INSERT INTO `tbl_add_fine` (`fid`, `fday`, `fmonth`, `fyear`, `created_date`) VALUES
(1, '5', 'September', '2015', '2015-09-01 08:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_grade`
--

CREATE TABLE IF NOT EXISTS `tbl_add_grade` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `g_point` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `g_from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `g_upto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `g_note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_add_grade`
--

INSERT INTO `tbl_add_grade` (`g_id`, `g_name`, `g_point`, `g_from`, `g_upto`, `g_note`, `created_date`) VALUES
(1, 'A+', '5.00', '80', '100', 'This is A Plus.', '2015-07-09 05:37:47'),
(5, 'A', '4.00', '60', '79', 'This is A Grade.', '2015-07-09 05:55:05'),
(6, 'A-', '3.50', '50', '59', 'This is A Minus.', '2015-07-09 05:55:57'),
(7, 'F', '0.00', '00', '32', 'This is F Grade.', '2015-07-09 05:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_hostel`
--

CREATE TABLE IF NOT EXISTS `tbl_add_hostel` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `h_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `h_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `h_note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_add_hostel`
--

INSERT INTO `tbl_add_hostel` (`h_id`, `h_name`, `h_address`, `h_type`, `h_note`, `created_date`) VALUES
(1, 'Sher-e-Bangla', 'Chittagong College,Chittagong.', 'Boys', 'This is test', '2015-07-15 06:14:48'),
(2, 'Shorowardi', 'Chittagong College', 'Girls', 'This is Boys Hostel...', '2015-07-15 06:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_hostel_member`
--

CREATE TABLE IF NOT EXISTS `tbl_add_hostel_member` (
  `hmid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `hostel_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hostel_category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_add_hostel_member`
--

INSERT INTO `tbl_add_hostel_member` (`hmid`, `sid`, `cid`, `hostel_name`, `hostel_category`, `added_date`) VALUES
(14, 24, 3, '1', 'First Class', '2015-10-15 12:47:45'),
(15, 20, 1, '2', 'First Class', '2015-10-17 09:58:44'),
(16, 25, 2, '1', 'First Class', '2015-10-18 12:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_month`
--

CREATE TABLE IF NOT EXISTS `tbl_add_month` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_add_month`
--

INSERT INTO `tbl_add_month` (`mid`, `m_name`, `added_date`) VALUES
(1, 'January', '2015-09-08 06:46:57'),
(2, 'February', '2015-09-08 06:47:19'),
(3, 'March', '2015-09-08 06:47:28'),
(4, 'April', '2015-09-08 06:48:01'),
(5, 'May', '2015-09-08 06:48:10'),
(6, 'June', '2015-09-08 06:48:19'),
(7, 'July', '2015-09-08 06:48:27'),
(8, 'August', '2015-09-08 06:48:36'),
(9, 'September', '2015-09-08 06:48:53'),
(10, 'October', '2015-09-08 06:49:01'),
(11, 'November', '2015-09-08 06:49:10'),
(12, 'December', '2015-09-08 06:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_notice`
--

CREATE TABLE IF NOT EXISTS `tbl_add_notice` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `notice` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_add_notice`
--

INSERT INTO `tbl_add_notice` (`n_id`, `n_title`, `date`, `permission`, `notice`, `created_date`) VALUES
(3, 'special day', '08/06/2015', 'everyone', 'sgdhsg dhsgd shdgshd shdg shdghsd hsdgshdg shd shd shdghsdg shdghs dghsdgshd shdgsh dghsdgsh dgshd ghsdghsdghsdgshdgshdgsh dhsdgsh dhsgdhsdghsdgshd', '2015-08-23 06:53:09'),
(4, 'Eid Fastible', '08/11/2015', 'teacher', 'Yes GReat sjdhs djs djsh djshd jshdjs djs djs hdjshdjshdjshdjs kdfdkfdf  kdfjdkfjdkfd jdkfdkf kdfjdkfd dkfjdkfjd kdfdkf dkfdkf jkdfjkdfjdkf dkfjdkfjd dkfjdfkdjf  djshd jsdhjs djsdh jshdjsdhjshd sjdhsjdhsjdhjsdhsjd', '2015-08-24 09:52:35'),
(5, 'Durga Puza Fastival', '10/10/2015', 'student', 'School closed for 10 days...\r\nEvery student attend their class from opening date...', '2015-10-04 08:54:14'),
(6, 'Durga Puza', '10/11/2015', 'accountant', 'This is Accountant Notice....kdfjdkfjdkfjdlkfjdkfj', '2015-10-11 11:10:05'),
(7, 'Test', '10/18/2015', 'parent', 'This is only for parents......', '2015-10-18 12:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_parent`
--

CREATE TABLE IF NOT EXISTS `tbl_add_parent` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_guardian` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_father_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_father_profession` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_mother_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_mother_profession` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_contact` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `n_card` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `p_religion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_profile_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE tbl_add_parent ADD p_father_aadhaar VARCHAR( 15 );
ALTER TABLE tbl_add_parent ADD p_mother_aadhaar VARCHAR( 15 );
ALTER TABLE tbl_add_parent ADD p_permanentaddress VARCHAR( 255 );

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_routine`
--

CREATE TABLE IF NOT EXISTS `tbl_add_routine` (
  `routine_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_class_id` int(11) NOT NULL,
  `r_subject_id` int(11) NOT NULL,
  `routine_day` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `routine_time_start` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_am_pm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `routine_time_end` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `end_am_pm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `routine_room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`routine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_school`
--

CREATE TABLE IF NOT EXISTS `tbl_add_school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `s_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_add_school`
--

INSERT INTO `tbl_add_school` (`school_id`, `st_title`, `email`, `contact`, `address`, `s_image`, `created_date`) VALUES
(1, 'St. Francis Education Society', 'sfes@gmail.com', '9090909090', 'BLR KA IN', '64305d151cf52d3a9.png', '2015-08-27 05:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_student`
--

CREATE TABLE IF NOT EXISTS `tbl_add_student` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `s_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `s_contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `s_dob` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_class_id` int(11) NOT NULL,
  `s_roll_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_gender` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `s_religion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `s_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `s_profile_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `s_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_student_charge`
--

CREATE TABLE IF NOT EXISTS `tbl_add_student_charge` (
  `charge_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_class` int(11) NOT NULL,
  `sc_student` int(11) NOT NULL,
  `sc_roll` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sc_month` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sc_type_id` int(11) NOT NULL,
  `sc_amount` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sc_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`charge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_add_subject` (
  `sb_id` int(11) NOT NULL AUTO_INCREMENT,
  `sb_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sb_author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sb_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sb_class_id` int(11) NOT NULL,
  `sb_teacher_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_add_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_designation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_dob` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `t_gender` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_religion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `t_joining_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_teacher_salary`
--

CREATE TABLE IF NOT EXISTS `tbl_add_teacher_salary` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` int(11) NOT NULL,
  `t_month` int(11) NOT NULL,
  `t_pay_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_amount` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_tp_member`
--

CREATE TABLE IF NOT EXISTS `tbl_add_tp_member` (
  `tpm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tpm_destination` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tpm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_transport`
--

CREATE TABLE IF NOT EXISTS `tbl_add_transport` (
  `transport_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle` int(11) NOT NULL,
  `fare` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_add_transport`
--

INSERT INTO `tbl_add_transport` (`transport_id`, `destination`, `vehicle`, `fare`, `note`, `created_date`) VALUES
(1, 'Mirpur-1 to Mirpur-12', 10, '30', 'Per Member 30 taka only', '2015-07-12 08:50:54'),
(2, 'Mirpur 1 to Firmgate', 10, '20', 'Per Member Price 15 Taka.', '2015-09-07 06:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_user`
--

CREATE TABLE IF NOT EXISTS `tbl_add_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_contact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `u_dob` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_gender` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_religion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_designation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_profile_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_login` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `a_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `d_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`aid`, `a_email`, `password`, `d_name`, `created_date`) VALUES
(1, 'sfes@gmail.com', '123456', 'Stany Jude', '2015-09-20 08:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_issue`
--

CREATE TABLE IF NOT EXISTS `tbl_book_issue` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fine` decimal(15,2) NOT NULL DEFAULT '0.00',
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_setup`
--

CREATE TABLE IF NOT EXISTS `tbl_book_setup` (
  `bk_id` int(11) NOT NULL AUTO_INCREMENT,
  `bk_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bk_author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hostel_category`
--

CREATE TABLE IF NOT EXISTS `tbl_hostel_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) NOT NULL,
  `hostel_category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hostel_fee` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hostel_note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hostel_monthly_fee`
--

CREATE TABLE IF NOT EXISTS `tbl_hostel_monthly_fee` (
  `htl_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_member_id` int(11) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `h_month` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `h_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `h_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`htl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_library_book_list`
--

CREATE TABLE IF NOT EXISTS `tbl_library_book_list` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `issue_qty` int(11) NOT NULL,
  `rack_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_library_member`
--

CREATE TABLE IF NOT EXISTS `tbl_library_member` (
  `lmid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `library_fee` decimal(15,2) NOT NULL DEFAULT '10.00',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routine_setup`
--

CREATE TABLE IF NOT EXISTS `tbl_routine_setup` (
  `rsid` int(11) NOT NULL AUTO_INCREMENT,
  `weekday` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`rsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_setup`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule_setup` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_schedule_setup`
--

INSERT INTO `tbl_schedule_setup` (`schedule_id`, `schedule_name`, `created_date`) VALUES
(1, '1st Term', '2015-07-12 05:46:56'),
(2, '2nd Term', '2015-07-12 05:47:07'),
(3, 'Final', '2015-07-12 05:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_student_attendance` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `attendance` int(1) NOT NULL DEFAULT '0',
  `roll_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `a_month` int(10) NOT NULL,
  `a_year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE `tbl_student_attendance` ADD `afternoon` INT(1) NOT NULL DEFAULT '0' AFTER `attendance`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_fee`
--

CREATE TABLE IF NOT EXISTS `tbl_student_fee` (
  `sf_id` int(11) NOT NULL AUTO_INCREMENT,
  `sf_class_id` int(11) NOT NULL,
  `sf_name_id` int(11) NOT NULL,
  `sf_roll` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sf_exam_type` int(11) NOT NULL,
  `sf_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sf_amount` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_marks`
--

CREATE TABLE IF NOT EXISTS `tbl_student_marks` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `marks` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`smid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport_fee`
--

CREATE TABLE IF NOT EXISTS `tbl_transport_fee` (
  `tpf_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpf_class` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tpf_student` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tpf_roll` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tpf_month` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tpf_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tpf_destination` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tpf_amount` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tpf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport_monthly_fee`
--

CREATE TABLE IF NOT EXISTS `tbl_transport_monthly_fee` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_member_id` int(11) NOT NULL,
  `t_destination` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_month` int(11) NOT NULL,
  `t_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `t_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access_setup`
--

CREATE TABLE IF NOT EXISTS `tbl_user_access_setup` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `access_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `access` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
