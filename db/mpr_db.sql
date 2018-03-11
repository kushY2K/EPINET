-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2017 at 12:49 AM
-- Server version: 5.5.42
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mpr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `basins`
--

CREATE TABLE IF NOT EXISTS `basins` (
  `basin_id` int(2) NOT NULL DEFAULT '0',
  `basin_name` varchar(50) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basins`
--

INSERT INTO `basins` (`basin_id`, `basin_name`, `description`) VALUES
(1, 'Frontier Basin, Dehradun', NULL),
(2, 'Western Offshore Basin, Vadodara', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_basin`
--

CREATE TABLE IF NOT EXISTS `data_basin` (
  `id` int(11) NOT NULL,
  `record_id` int(5) NOT NULL,
  `basin_id` int(11) NOT NULL,
  `data_class` varchar(50) DEFAULT NULL,
  `total_volume` varchar(11) DEFAULT NULL,
  `data_loaded_month` varchar(11) DEFAULT NULL,
  `cumulative_data_loaded` varchar(11) DEFAULT NULL,
  `cumulative_data_validated` varchar(11) DEFAULT NULL,
  `data_gaps_identified` varchar(11) DEFAULT NULL,
  `data_gaps_filled` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_basin`
--

INSERT INTO `data_basin` (`id`, `record_id`, `basin_id`, `data_class`, `total_volume`, `data_loaded_month`, `cumulative_data_loaded`, `cumulative_data_validated`, `data_gaps_identified`, `data_gaps_filled`) VALUES
(2, 2011970, 2, 'leased_objects', '0', '0', '0', '0', '0', '0'),
(3, 2011970, 2, 'original_logs_in_psl', '0', '0', '0', '0', '0', '0'),
(4, 2011970, 2, 'composite_logs_in_pse', '0', '0', '0', '0', '0', '0'),
(5, 2011970, 2, 'processed_logs_in_pse', '0', '0', '0', '0', '0', '0'),
(6, 2011970, 2, '2d_navigation_data', '0', '0', '0', '0', '0', '0'),
(7, 2011970, 2, '3d_navigation_data', '0', '0', '0', '0', '0', '0'),
(8, 2011970, 2, '2d_segy_data', '0', '0', '0', '0', '0', '0'),
(9, 2011970, 2, '3d_segy_data', '0', '0', '0', '0', '0', '0'),
(10, 2011970, 2, 'merged_3d_data', '0', '0', '0', '0', '0', '0'),
(11, 2011970, 2, 'vsp_td_curve', '0', '0', '0', '0', '0', '0'),
(12, 2011970, 2, 'vsp_segy_data', '0', '0', '0', '0', '0', '0'),
(13, 2011970, 2, 'palynology', '0', '0', '0', '0', '0', '0'),
(14, 2011970, 2, 'paleontology', '0', '0', '0', '0', '0', '0'),
(15, 2011970, 2, 'sedimentology', '0', '0', '0', '0', '0', '0'),
(16, 2011970, 2, 'source_rock', '0', '0', '0', '0', '0', '0'),
(17, 2011970, 2, 'oil', '0', '0', '0', '0', '0', '0'),
(18, 2011970, 2, 'water', '0', '0', '0', '0', '0', '0'),
(19, 2011970, 2, 'gas', '0', '0', '0', '0', '0', '0'),
(20, 2011970, 2, 'surface_surveys', '0', '0', '0', '0', '0', '0'),
(21, 2011970, 2, 'core_studies', '0', '0', '0', '0', '0', '0'),
(22, 2011970, 2, 'pvt_analysis', '0', '0', '0', '0', '0', '0'),
(23, 2011970, 2, 'field_production', '0', '0', '0', '0', '0', '0'),
(24, 2011970, 2, 'field_water_injection', '0', '0', '0', '0', '0', '0'),
(25, 2011970, 2, 'workover_history', '0', '0', '0', '0', '0', '0'),
(26, 2011970, 2, 'wss', '0', '0', '0', '0', '0', '0'),
(27, 2011970, 2, 'gas_utilization', '0', '0', '0', '0', '0', '0'),
(28, 2011970, 2, 'value_added_product', '0', '0', '0', '0', '0', '0'),
(29, 2011970, 2, 'pipeline_data', '0', '0', '0', '0', '0', '0'),
(30, 2011970, 2, 'artificial_lift', '0', '0', '0', '0', '0', '0'),
(31, 2011970, 2, 'production_testing', '0', '0', '0', '0', '0', '0'),
(32, 2021970, 2, 'leased_objects', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 2021970, 2, 'original_logs_in_psl', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 2021970, 2, 'composite_logs_in_pse', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 2021970, 2, 'processed_logs_in_pse', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 2021970, 2, '2d_navigation_data', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 2021970, 2, '3d_navigation_data', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 2021970, 2, '2d_segy_data', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 2021970, 2, '3d_segy_data', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 2021970, 2, 'merged_3d_data', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 2021970, 2, 'vsp_td_curve', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 2021970, 2, 'vsp_segy_data', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 2021970, 2, 'palynology', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 2021970, 2, 'paleontology', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 2021970, 2, 'sedimentology', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 2021970, 2, 'source_rock', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 2021970, 2, 'oil', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 2021970, 2, 'water', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 2021970, 2, 'gas', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 2021970, 2, 'surface_surveys', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 2021970, 2, 'core_studies', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 2021970, 2, 'pvt_analysis', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 2021970, 2, 'field_production', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 2021970, 2, 'field_water_injection', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 2021970, 2, 'workover_history', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 2021970, 2, 'wss', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 2021970, 2, 'gas_utilization', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 2021970, 2, 'value_added_product', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 2021970, 2, 'pipeline_data', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 2021970, 2, 'artificial_lift', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 2021970, 2, 'production_testing', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 2031970, 2, 'leased_objects', '0', '0', '0', '0', '0', '0'),
(63, 2031970, 2, 'original_logs_in_psl', '1122', '0', '33', '33', '0', '0'),
(64, 2031970, 2, 'composite_logs_in_pse', '0', '0', '0', '0', '0', '0'),
(65, 2031970, 2, 'processed_logs_in_pse', '0', '0', '0', '0', '0', '0'),
(66, 2031970, 2, '2d_navigation_data', '0', '0', '0', '0', '0', '0'),
(67, 2031970, 2, '3d_navigation_data', '0', '0', '0', '0', '0', '0'),
(68, 2031970, 2, '2d_segy_data', '0', '0', '0', '0', '0', '0'),
(69, 2031970, 2, '3d_segy_data', '0', '0', '0', '0', '0', '0'),
(70, 2031970, 2, 'merged_3d_data', '0', '0', '0', '0', '0', '0'),
(71, 2031970, 2, 'vsp_td_curve', '0', '0', '0', '0', '0', '0'),
(72, 2031970, 2, 'vsp_segy_data', '0', '0', '0', '0', '0', '0'),
(73, 2031970, 2, 'palynology', '0', '0', '0', '0', '0', '0'),
(74, 2031970, 2, 'paleontology', '0', '0', '0', '0', '0', '0'),
(75, 2031970, 2, 'sedimentology', '0', '0', '0', '0', '0', '0'),
(76, 2031970, 2, 'source_rock', '0', '0', '0', '0', '0', '0'),
(77, 2031970, 2, 'oil', '0', '0', '0', '0', '0', '0'),
(78, 2031970, 2, 'water', '0', '0', '0', '0', '0', '0'),
(79, 2031970, 2, 'gas', '0', '0', '0', '0', '0', '0'),
(80, 2031970, 2, 'surface_surveys', '0', '0', '0', '0', '0', '0'),
(81, 2031970, 2, 'core_studies', '0', '0', '0', '0', '0', '0'),
(82, 2031970, 2, 'pvt_analysis', '0', '0', '0', '0', '0', '0'),
(83, 2031970, 2, 'field_production', '0', '0', '0', '0', '0', '0'),
(84, 2031970, 2, 'field_water_injection', '0', '0', '0', '0', '0', '0'),
(85, 2031970, 2, 'workover_history', '0', '0', '0', '0', '0', '0'),
(86, 2031970, 2, 'wss', '0', '0', '0', '0', '0', '0'),
(87, 2031970, 2, 'gas_utilization', '0', '0', '0', '0', '0', '0'),
(88, 2031970, 2, 'value_added_product', '0', '0', '0', '0', '0', '0'),
(89, 2031970, 2, 'pipeline_data', '0', '0', '0', '0', '0', '0'),
(90, 2031970, 2, 'artificial_lift', '0', '0', '0', '0', '0', '0'),
(91, 2031970, 2, 'production_testing', '0', '0', '0', '0', '0', '0'),
(92, 1112012, 1, 'leased_objects', '0', '0', '0', '0', '0', '0'),
(93, 1112012, 1, 'original_logs_in_psl', '0', '0', '0', '0', '0', '0'),
(94, 1112012, 1, 'composite_logs_in_pse', '0', '0', '0', '0', '0', '0'),
(95, 1112012, 1, 'processed_logs_in_pse', '0', '0', '0', '0', '0', '0'),
(96, 1112012, 1, '2d_navigation_data', '0', '0', '0', '0', '0', '0'),
(97, 1112012, 1, '3d_navigation_data', '0', '0', '0', '0', '0', '0'),
(98, 1112012, 1, '2d_segy_data', '0', '0', '0', '0', '0', '0'),
(99, 1112012, 1, '3d_segy_data', '0', '0', '0', '0', '0', '0'),
(100, 1112012, 1, 'merged_3d_data', '0', '0', '0', '0', '0', '0'),
(101, 1112012, 1, 'vsp_td_curve', '0', '0', '0', '0', '0', '0'),
(102, 1112012, 1, 'vsp_segy_data', '0', '0', '0', '0', '0', '0'),
(103, 1112012, 1, 'palynology', '0', '0', '0', '0', '0', '0'),
(104, 1112012, 1, 'paleontology', '0', '0', '0', '0', '0', '0'),
(105, 1112012, 1, 'sedimentology', '0', '0', '0', '0', '0', '0'),
(106, 1112012, 1, 'source_rock', '0', '0', '0', '0', '0', '0'),
(107, 1112012, 1, 'oil', '0', '0', '0', '0', '0', '0'),
(108, 1112012, 1, 'water', '0', '0', '0', '0', '0', '0'),
(109, 1112012, 1, 'gas', '0', '0', '0', '0', '0', '0'),
(110, 1112012, 1, 'surface_surveys', '0', '0', '0', '0', '0', '0'),
(111, 1112012, 1, 'core_studies', '0', '0', '0', '0', '0', '0'),
(112, 1112012, 1, 'pvt_analysis', '0', '0', '0', '0', '0', '0'),
(113, 1112012, 1, 'field_production', '0', '0', '0', '0', '0', '0'),
(114, 1112012, 1, 'field_water_injection', '0', '0', '0', '0', '0', '0'),
(115, 1112012, 1, 'workover_history', '0', '0', '0', '0', '0', '0'),
(116, 1112012, 1, 'wss', '0', '0', '0', '0', '0', '0'),
(117, 1112012, 1, 'gas_utilization', '0', '0', '0', '0', '0', '0'),
(118, 1112012, 1, 'value_added_product', '0', '0', '0', '0', '0', '0'),
(119, 1112012, 1, 'pipeline_data', '0', '0', '0', '0', '0', '0'),
(120, 1112012, 1, 'artificial_lift', '0', '0', '0', '0', '0', '0'),
(121, 1112012, 1, 'production_testing', '0', '0', '0', '0', '0', '0'),
(122, 2041970, 2, 'leased_objects', '8', '2', '3', '4', '5', '5'),
(123, 2041970, 2, 'original_logs_in_psl', '1', '23', '4', '5', '6', '7'),
(124, 2041970, 2, 'composite_logs_in_pse', '5', '6', '7', '7', '5', '6'),
(125, 2041970, 2, 'processed_logs_in_pse', '7', '7', '7', '5', '56', '66'),
(126, 2041970, 2, '2d_navigation_data', '7', '', '66', '7', '6', '676'),
(127, 2041970, 2, '3d_navigation_data', '787', '878', '98', '78', '7878', '78'),
(128, 2041970, 2, '2d_segy_data', '787', '87', '', '77', '7', '77'),
(129, 2041970, 2, '3d_segy_data', '7', '7', '7', '77', '7', '77'),
(130, 2041970, 2, 'merged_3d_data', '7', '6', '5', '5', '', '56'),
(131, 2041970, 2, 'vsp_td_curve', '77', '', '8', '8', '6', '55'),
(132, 2041970, 2, 'vsp_segy_data', '5', '5', '67', '', '8', '884'),
(133, 2041970, 2, 'palynology', '4', '4', '5', '5', '5', '4'),
(134, 2041970, 2, 'paleontology', '4', '5', '', '6', '6', '7'),
(135, 2041970, 2, 'sedimentology', '7', '', '', '', '4', '4'),
(136, 2041970, 2, 'source_rock', '5', '', '', '3444', '', ''),
(137, 2041970, 2, 'oil', '', '6', '7', '7', '4', '4'),
(138, 2041970, 2, 'water', '', '6', '', '77', '', '44'),
(139, 2041970, 2, 'gas', '', '7', '', '88', '', '4'),
(140, 2041970, 2, 'surface_surveys', '44', '', '88', '8', '', '4'),
(141, 2041970, 2, 'core_studies', '4', '4', '7', '', '', ''),
(142, 2041970, 2, 'pvt_analysis', '5', '5', '5', '', '888', '8'),
(143, 2041970, 2, 'field_production', '', '55', '', '7', '77', '8'),
(144, 2041970, 2, 'field_water_injection', '8', '', '88', '', '55', '5'),
(145, 2041970, 2, 'workover_history', '', '7', '7', '7', '8', ''),
(146, 2041970, 2, 'wss', '4', '4', '4', '6', '6', ''),
(147, 2041970, 2, 'gas_utilization', '8', '', '5', '5', '5', '44'),
(148, 2041970, 2, 'value_added_product', '', '77', '', '8', '8', '8'),
(149, 2041970, 2, 'pipeline_data', '5', '5', '55', '5', '5', '6'),
(150, 2041970, 2, 'artificial_lift', '6', '6', '4', '4', '44', '4'),
(151, 2041970, 2, 'production_testing', '44', '4', '44', '5', '5', '6'),
(152, 2051970, 2, 'leased_objects', '1', '1', '2', '3', '4', '5'),
(153, 2051970, 2, 'original_logs_in_psl', '1', '2', '3', '4', '5', '6'),
(154, 2051970, 2, 'composite_logs_in_pse', '1', '2', '3', '4', '5', '6'),
(155, 2051970, 2, 'processed_logs_in_pse', '1', '2', '3', '4', '5', '6'),
(156, 2051970, 2, '2d_navigation_data', '', '1', '2', '3', '45', '5'),
(157, 2051970, 2, '3d_navigation_data', '1', '2', '3', '4', '5', '6'),
(158, 2051970, 2, '2d_segy_data', '1', '2', '3', '4', '5', '6'),
(159, 2051970, 2, '3d_segy_data', '7', '1', '2', '3', '4', '5'),
(160, 2051970, 2, 'merged_3d_data', '7', '4', '2', '5', '7', ''),
(161, 2051970, 2, 'vsp_td_curve', '6', '2', '3', '35', '4', '4'),
(162, 2051970, 2, 'vsp_segy_data', '', '6', '6', '6', '4', '3'),
(163, 2051970, 2, 'palynology', '4', '6', '64', '4', '6', '4'),
(164, 2051970, 2, 'paleontology', '7', '4', '6', '4', '74', '36'),
(165, 2051970, 2, 'sedimentology', '8', '4', '6', '8', '4', '36'),
(166, 2051970, 2, 'source_rock', '', '', '7', '436', '', '78'),
(167, 2051970, 2, 'oil', '', '5', '8', '5', '4', '6'),
(168, 2051970, 2, 'water', '7', '7', '4', '3', '5', '7'),
(169, 2051970, 2, 'gas', '', '76', '4', '3', '6', '7'),
(170, 2051970, 2, 'surface_surveys', '8', '5', '', '4', '5', '7'),
(171, 2051970, 2, 'core_studies', '8', '', '5', '4', '3', ''),
(172, 2051970, 2, 'pvt_analysis', '8', '5', '4', '5', '78', ''),
(173, 2051970, 2, 'field_production', '5', '47', '8', '8', '5', '4'),
(174, 2051970, 2, 'field_water_injection', '', '88', '', '74', '4', ''),
(175, 2051970, 2, 'workover_history', '88', '', '', '5', '5', '4'),
(176, 2051970, 2, 'wss', '4', '7', '7', '', '7544', '3'),
(177, 2051970, 2, 'gas_utilization', '5', '4', '5', '', '78', ''),
(178, 2051970, 2, 'value_added_product', '54', '6', '7', '', '8', '3456'),
(179, 2051970, 2, 'pipeline_data', '64', '7', '5', '7', '4', '4'),
(180, 2051970, 2, 'artificial_lift', '6', '7', '', '8', '', ''),
(181, 2051970, 2, 'production_testing', '6', '', '5', '', '4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `data_basin_reservoir_data`
--

CREATE TABLE IF NOT EXISTS `data_basin_reservoir_data` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `basin_id` int(11) NOT NULL,
  `data_class` varchar(50) DEFAULT NULL,
  `total_volume` varchar(11) DEFAULT NULL,
  `data_loaded_month_wells` varchar(11) DEFAULT NULL,
  `data_loaded_month_records` varchar(11) DEFAULT NULL,
  `cumulative_data_loaded_wells` varchar(11) DEFAULT NULL,
  `cumulative_data_loaded_records` varchar(11) DEFAULT NULL,
  `cumulative_data_validated_wells` varchar(11) DEFAULT NULL,
  `data_gaps_identified_wells` varchar(11) DEFAULT NULL,
  `data_gaps_filled_wells` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_basin_reservoir_data`
--

INSERT INTO `data_basin_reservoir_data` (`id`, `record_id`, `basin_id`, `data_class`, `total_volume`, `data_loaded_month_wells`, `data_loaded_month_records`, `cumulative_data_loaded_wells`, `cumulative_data_loaded_records`, `cumulative_data_validated_wells`, `data_gaps_identified_wells`, `data_gaps_filled_wells`) VALUES
(1, 2011970, 2, 'pressure_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 2011970, 2, 'bean_study', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 2011970, 2, 'bhs_interpretation_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 2011970, 2, 'bhs_sampling_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, 2011970, 2, 'gas_lift_survey', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, 2011970, 2, 'echometer_survey', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, 2011970, 2, 'pvt_studies', '0', '0', '0', '0', '0', '0', '0', '0'),
(8, 2021970, 2, 'pressure_data', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2021970, 2, 'bean_study', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 2021970, 2, 'bhs_interpretation_data', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 2021970, 2, 'bhs_sampling_data', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 2021970, 2, 'gas_lift_survey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2021970, 2, 'echometer_survey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 2021970, 2, 'pvt_studies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 2031970, 2, 'pressure_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(16, 2031970, 2, 'bean_study', '0', '0', '0', '0', '0', '0', '0', '0'),
(17, 2031970, 2, 'bhs_interpretation_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(18, 2031970, 2, 'bhs_sampling_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(19, 2031970, 2, 'gas_lift_survey', '0', '0', '0', '0', '0', '0', '0', '0'),
(20, 2031970, 2, 'echometer_survey', '0', '0', '0', '0', '0', '0', '0', '0'),
(21, 2031970, 2, 'pvt_studies', '0', '0', '0', '0', '0', '0', '0', '0'),
(22, 1112012, 1, 'pressure_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(23, 1112012, 1, 'bean_study', '0', '0', '0', '0', '0', '0', '0', '0'),
(24, 1112012, 1, 'bhs_interpretation_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(25, 1112012, 1, 'bhs_sampling_data', '0', '0', '0', '0', '0', '0', '0', '0'),
(26, 1112012, 1, 'gas_lift_survey', '0', '0', '0', '0', '0', '0', '0', '0'),
(27, 1112012, 1, 'echometer_survey', '0', '0', '0', '0', '0', '0', '0', '0'),
(28, 1112012, 1, 'pvt_studies', '6', '0', '0', '66', '6', '6', '0', '0'),
(29, 2041970, 2, 'pressure_data', '6', '7', '7', '7', '77', '7', '7', '44'),
(30, 2041970, 2, 'bean_study', '9', '9', '9', '99', '9', '9', '99', '9'),
(31, 2041970, 2, 'bhs_interpretation_data', '99', '9', '99', '9', '9', '9', '9', '9'),
(32, 2041970, 2, 'bhs_sampling_data', '9', '99', '9', '9', '99', '9', '99', '9'),
(33, 2041970, 2, 'gas_lift_survey', '9', '99', '9', '99', '9', '9', '99', '9'),
(34, 2041970, 2, 'echometer_survey', '9', '99', '9', '9', '99', '9', '99', '9'),
(35, 2041970, 2, 'pvt_studies', '9', '99', '9', '9', '99', '9', '99', '9'),
(36, 2051970, 2, 'pressure_data', '', '5', '6', '7', '88', '', '6', '4'),
(37, 2051970, 2, 'bean_study', '4', '7', '8', '89', '', '7', '6', '5'),
(38, 2051970, 2, 'bhs_interpretation_data', '87', '', '8', '76', '6', '', '54', ''),
(39, 2051970, 2, 'bhs_sampling_data', '79', '', '7', '5', '4', '4', '3', '3'),
(40, 2051970, 2, 'gas_lift_survey', '6', '', '8', '', '6', '4', '3', '47'),
(41, 2051970, 2, 'echometer_survey', '', '8', '5', '', '43', '6', '7', '8'),
(42, 2051970, 2, 'pvt_studies', '', '6', '8', '6', '5', '4', '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `data_header`
--

CREATE TABLE IF NOT EXISTS `data_header` (
  `record_id` int(5) NOT NULL,
  `basin_id` int(2) NOT NULL,
  `month_year` date NOT NULL,
  `draft` int(2) NOT NULL,
  `submission_date` date DEFAULT NULL COMMENT 'Date of Submission',
  `highlights` longtext COMMENT 'Highlights',
  `dm_geology` varchar(1000) DEFAULT NULL COMMENT 'Geology',
  `dm_seismic` varchar(1000) DEFAULT NULL COMMENT 'Seismic',
  `dm_welllogs` varchar(1000) DEFAULT NULL COMMENT 'Well Logs',
  `dm_geochem` varchar(1000) DEFAULT NULL COMMENT 'Geo-Chemistry',
  `dm_geolab` varchar(1000) DEFAULT NULL COMMENT 'Geo-Lab',
  `dm_reservoir` varchar(1000) DEFAULT NULL COMMENT 'Reservoir',
  `dm_production` varchar(1000) DEFAULT NULL COMMENT 'Production',
  `dm_drilling` varchar(1000) DEFAULT NULL COMMENT 'Drilling',
  `software_activities` varchar(1000) DEFAULT NULL COMMENT 'Software Activities',
  `other_activities` varchar(1000) DEFAULT NULL COMMENT 'Other Activities',
  `constraints` varchar(1000) DEFAULT NULL COMMENT 'Constraints',
  `remarks` varchar(1000) DEFAULT NULL COMMENT 'Remarks'
) ENGINE=InnoDB AUTO_INCREMENT=2051971 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_header`
--

INSERT INTO `data_header` (`record_id`, `basin_id`, `month_year`, `draft`, `submission_date`, `highlights`, `dm_geology`, `dm_seismic`, `dm_welllogs`, `dm_geochem`, `dm_geolab`, `dm_reservoir`, `dm_production`, `dm_drilling`, `software_activities`, `other_activities`, `constraints`, `remarks`) VALUES
(1102012, 1, '2012-10-01', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1112012, 1, '2012-11-01', 1, NULL, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2011970, 2, '1970-01-01', 0, '2017-01-08', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2021970, 2, '1970-02-01', 0, '2017-01-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2031970, 2, '1970-03-01', 0, '2017-01-14', 'aman ', 'aman', '', '', '', '', '', '', '', 'aman', '', '', ''),
(2041970, 2, '1970-04-01', 0, '2017-01-15', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2051970, 2, '1970-05-01', 1, NULL, 'aman', 'a,amn', 'aman', 'man ', 'iji', 'jiji', 'jii', 'ijij', 'hih', 'iojio', 'jjj', 'jj', 'kjk');

-- --------------------------------------------------------

--
-- Table structure for table `data_sites`
--

CREATE TABLE IF NOT EXISTS `data_sites` (
  `id` int(255) NOT NULL,
  `site_id` int(2) NOT NULL,
  `basin_id` int(2) NOT NULL,
  `record_id` int(5) NOT NULL,
  `ubhi` varchar(11) DEFAULT NULL,
  `ubhi_added_during_month` varchar(11) DEFAULT NULL,
  `total_volume` varchar(11) DEFAULT NULL,
  `data_loaded_month` varchar(11) DEFAULT NULL,
  `cumulative_data_loaded` varchar(11) DEFAULT NULL,
  `cumulative_data_validated` varchar(11) DEFAULT NULL,
  `data_gaps_identified` varchar(11) DEFAULT NULL,
  `data_gaps_filled` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_sites`
--

INSERT INTO `data_sites` (`id`, `site_id`, `basin_id`, `record_id`, `ubhi`, `ubhi_added_during_month`, `total_volume`, `data_loaded_month`, `cumulative_data_loaded`, `cumulative_data_validated`, `data_gaps_identified`, `data_gaps_filled`) VALUES
(20, 2, 2, 2011970, '11', '22', '33', '44', '55', '66', '77', '88'),
(21, 3, 2, 2011970, '11', '2', '3', '4', '5', '66', '77', '88'),
(22, 4, 2, 2011970, '1', '2', '3', '4', '5', '6', '7', '8'),
(23, 5, 2, 2011970, '1', '2', '3', '4', '5', '6', '7', '8'),
(24, 6, 2, 2011970, '1', '2', '3344', '4', '5', '6', '7', '8'),
(25, 7, 2, 2011970, '1', '2', '3', '4', '5', '6', '7', '8'),
(26, 2, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 3, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 4, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 5, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 6, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 2, 2, 2031970, '10', '10', '2', '0', '0', '0', '0', '0'),
(33, 3, 2, 2031970, '1', '1', '0', '0', '0', '0', '0', '0'),
(34, 4, 2, 2031970, '0', '0', '0', '0', '1', '0', '0', '0'),
(35, 5, 2, 2031970, '0', '0', '0', '0', '0', '0', '0', '0'),
(36, 6, 2, 2031970, '0', '0', '2', '0', '0', '0', '0', '0'),
(37, 7, 2, 2031970, '0', '0', '0', '0', '0', '0', '0', '1'),
(38, 1, 1, 1112012, '0', '2', '33', '44', '55', '66', '77', '88'),
(39, 2, 2, 2041970, '1', '', '', '', '', '5', '', ''),
(40, 3, 2, 2041970, '1', '2', '3', '4', '5', '6', '7', '8'),
(41, 4, 2, 2041970, '1', '', '', '9', '', '', '4', ''),
(42, 5, 2, 2041970, '1', '', '8', '', '9', '', '', '5'),
(43, 6, 2, 2041970, '2', '4', '', '0', '', '8', '', '6'),
(44, 7, 2, 2041970, '2', '', '4', '', '', '', '7', ''),
(45, 2, 2, 2051970, '1', '2', '3', '4', '5', '6', '7', '8'),
(46, 3, 2, 2051970, '1', '2', '3', '4', '5', '6', '7', '8'),
(47, 4, 2, 2051970, '1', '2', '3', '4', '5', '7', '6', '7'),
(48, 5, 2, 2051970, '8', '3', '4', '5', '6', '6', '7', '8'),
(49, 6, 2, 2051970, '1', '2', '3', '4', '5', '6', '7', '8'),
(50, 7, 2, 2051970, '1', '2', '3', '4', '5', '6', '7', '8');

-- --------------------------------------------------------

--
-- Table structure for table `data_sites_drilling_data`
--

CREATE TABLE IF NOT EXISTS `data_sites_drilling_data` (
  `id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `basin_id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `total_volume` varchar(11) DEFAULT NULL,
  `data_loaded_month` varchar(11) DEFAULT NULL,
  `cumulative_data_loaded` varchar(11) DEFAULT NULL,
  `cumulative_data_validated` varchar(11) DEFAULT NULL,
  `data_gaps_identified` varchar(11) DEFAULT NULL,
  `data_gaps_filled` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_sites_drilling_data`
--

INSERT INTO `data_sites_drilling_data` (`id`, `site_id`, `basin_id`, `record_id`, `total_volume`, `data_loaded_month`, `cumulative_data_loaded`, `cumulative_data_validated`, `data_gaps_identified`, `data_gaps_filled`) VALUES
(1, 2, 2, 2011970, '0', '0', '0', '0', '0', '0'),
(2, 3, 2, 2011970, '0', '0', '0', '0', '0', '0'),
(3, 4, 2, 2011970, '1', '2', '3', '4', '5', '6'),
(4, 5, 2, 2011970, '1', '2', '3', '4', '5', '6'),
(5, 6, 2, 2011970, '0', '0', '0', '0', '0', '0'),
(6, 7, 2, 2011970, '1', '2', '3', '4', '5', '6'),
(7, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 7, 2, 2021970, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2, 2, 2031970, '0', '0', '0', '0', '0', '0'),
(14, 3, 2, 2031970, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 4, 2, 2031970, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 5, 2, 2031970, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 6, 2, 2031970, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 7, 2, 2031970, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 1, 1112012, '0', '0', '0', '0', '0', '0'),
(20, 2, 2, 2041970, '99', '9', '9', '99', '9', '9'),
(21, 3, 2, 2041970, '99', '9', '99', '9', '99', '9'),
(22, 4, 2, 2041970, '9', '99', '9', '9', '99', '9'),
(23, 5, 2, 2041970, '99', '9', '99', '9', '99', '9'),
(24, 6, 2, 2041970, '9', '99', '9', '9', '99', '9'),
(25, 7, 2, 2041970, '9', '99', '9', '99', '9', '9'),
(26, 2, 2, 2051970, '5', '6', '7', '8', '', '6'),
(27, 3, 2, 2051970, '54', '', '3', '45', '7', '8'),
(28, 4, 2, 2051970, '4', '5', '6', '7', '', '9'),
(29, 5, 2, 2051970, '0', '1', '2', '3', '4', '5'),
(30, 6, 2, 2051970, '6', '', '8', '9', '', '23'),
(31, 7, 2, 2051970, '4', '5', '7', '8', '', '9');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `site_id` int(2) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `basin_id` int(2) NOT NULL,
  `description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `site_name`, `basin_id`, `description`) VALUES
(1, 'Dehradun', 1, NULL),
(2, 'Baroda', 2, NULL),
(3, 'Ahmedabad', 2, NULL),
(4, 'Ankleshwar', 2, NULL),
(5, 'Mehsana', 2, NULL),
(6, 'Cambay', 2, NULL),
(7, 'Jodhpur', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `basin_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `user_type`, `basin_id`) VALUES
('epinet_dehradun', 'ed', 'basin', 1),
('epinet_vadodara', 'ev', 'basin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_services_epinet`
--

CREATE TABLE IF NOT EXISTS `user_services_epinet` (
  `record_id` int(5) NOT NULL,
  `ser_given_to_centre_name` varchar(20) NOT NULL,
  `class_subclass` varchar(30) NOT NULL,
  `volume_of_data_given` int(2) NOT NULL,
  `unit_of_data_given` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_service_online`
--

CREATE TABLE IF NOT EXISTS `user_service_online` (
  `class` varchar(20) NOT NULL,
  `record_id` int(5) DEFAULT NULL,
  `ser_given_to_centre_name` varchar(20) NOT NULL,
  `volume_of_data_taken` int(2) NOT NULL,
  `unit_of_data` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basins`
--
ALTER TABLE `basins`
  ADD PRIMARY KEY (`basin_id`);

--
-- Indexes for table `data_basin`
--
ALTER TABLE `data_basin`
  ADD PRIMARY KEY (`id`), ADD KEY `record_id` (`record_id`), ADD KEY `basin_id` (`basin_id`);

--
-- Indexes for table `data_basin_reservoir_data`
--
ALTER TABLE `data_basin_reservoir_data`
  ADD PRIMARY KEY (`id`), ADD KEY `record_id` (`record_id`), ADD KEY `basin_id` (`basin_id`);

--
-- Indexes for table `data_header`
--
ALTER TABLE `data_header`
  ADD PRIMARY KEY (`record_id`), ADD KEY `basin_id` (`basin_id`);

--
-- Indexes for table `data_sites`
--
ALTER TABLE `data_sites`
  ADD PRIMARY KEY (`id`), ADD KEY `record_id` (`record_id`), ADD KEY `basin_id` (`basin_id`);

--
-- Indexes for table `data_sites_drilling_data`
--
ALTER TABLE `data_sites_drilling_data`
  ADD PRIMARY KEY (`id`), ADD KEY `site_id` (`site_id`), ADD KEY `basin_id` (`basin_id`), ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`), ADD KEY `basin_id` (`basin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`), ADD KEY `basin_id` (`basin_id`);

--
-- Indexes for table `user_services_epinet`
--
ALTER TABLE `user_services_epinet`
  ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `user_service_online`
--
ALTER TABLE `user_service_online`
  ADD KEY `ser_given_to_centre_name` (`ser_given_to_centre_name`), ADD KEY `record_id` (`record_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_basin`
--
ALTER TABLE `data_basin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `data_basin_reservoir_data`
--
ALTER TABLE `data_basin_reservoir_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `data_header`
--
ALTER TABLE `data_header`
  MODIFY `record_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2051971;
--
-- AUTO_INCREMENT for table `data_sites`
--
ALTER TABLE `data_sites`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `data_sites_drilling_data`
--
ALTER TABLE `data_sites_drilling_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_services_epinet`
--
ALTER TABLE `user_services_epinet`
  MODIFY `record_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_basin`
--
ALTER TABLE `data_basin`
ADD CONSTRAINT `basin_fk` FOREIGN KEY (`basin_id`) REFERENCES `basins` (`basin_id`),
ADD CONSTRAINT `data_basin_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `data_header` (`record_id`);

--
-- Constraints for table `data_basin_reservoir_data`
--
ALTER TABLE `data_basin_reservoir_data`
ADD CONSTRAINT `basin_fk_1` FOREIGN KEY (`record_id`) REFERENCES `data_header` (`record_id`),
ADD CONSTRAINT `basin_fk_11` FOREIGN KEY (`basin_id`) REFERENCES `basins` (`basin_id`);

--
-- Constraints for table `data_header`
--
ALTER TABLE `data_header`
ADD CONSTRAINT `data_header_ibfk_1` FOREIGN KEY (`basin_id`) REFERENCES `basins` (`basin_id`);

--
-- Constraints for table `data_sites`
--
ALTER TABLE `data_sites`
ADD CONSTRAINT `data_sites_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `data_header` (`record_id`),
ADD CONSTRAINT `fk` FOREIGN KEY (`basin_id`) REFERENCES `sites` (`basin_id`);

--
-- Constraints for table `data_sites_drilling_data`
--
ALTER TABLE `data_sites_drilling_data`
ADD CONSTRAINT `fk_11` FOREIGN KEY (`basin_id`) REFERENCES `sites` (`basin_id`),
ADD CONSTRAINT `fk_1111` FOREIGN KEY (`record_id`) REFERENCES `data_header` (`record_id`);

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
ADD CONSTRAINT `sites_ibfk_2` FOREIGN KEY (`basin_id`) REFERENCES `basins` (`basin_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`basin_id`) REFERENCES `basins` (`basin_id`);

--
-- Constraints for table `user_services_epinet`
--
ALTER TABLE `user_services_epinet`
ADD CONSTRAINT `user_services_epinet_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `data_header` (`record_id`);

--
-- Constraints for table `user_service_online`
--
ALTER TABLE `user_service_online`
ADD CONSTRAINT `user_service_online_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `data_header` (`record_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
