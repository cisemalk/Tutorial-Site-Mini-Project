-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 01:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Surname` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Username` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Pass` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Name`, `Surname`, `Username`, `Pass`) VALUES
(1, 'Linda', 'Abdullah', 'linda01', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `executed_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code` text COLLATE utf8_turkish_ci NOT NULL,
  `output` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `executed_time`, `code`, `output`) VALUES
(1, '2022-12-25 15:16:36', 'qqqqqqqqqqqqqq', 'weeeeeeeeeeeee'),
(25, '2022-12-26 20:45:58', 'hjkhj', ''),
(55, '2022-12-26 22:26:22', 'fghfghfg', 'Main.java.java:2: error: reached end of file while parsing\n							fghfghfg\n							^\n1 error\nerror: compilation failed\n'),
(58, '2022-12-29 08:24:50', 'public class Main {\n  public static void main(String[] args) {\n \n        int sayi1 = 10;\n        int sayi2 = 20;\n \n        System.out.println(\"Sayilar : \" + sayi1 + \" \" + sayi2);\n        int toplam = sayi1 + sayi2;\n \n        System.out.println(\"Toplam: \" + toplam);\n  \n    }\n}\n ', 'Sayilar : 10 20\nToplam: 30\n'),
(64, '2023-01-06 20:50:23', 'public class Main {\n  public static void main(String[] args) {\n    System.out.println(\"Hello World\");\n  }\n}', 'Hello World\n'),
(65, '2023-01-08 06:16:31', 'public class main{\n\npublic static main void (string[] args){\nSystem.out.println(\"hello\");\n}	\n}', 'Main.java.java:4: error: <identifier> expected\npublic static main void (string[] args){\n                  ^\nMain.java.java:4: error: <identifier> expected\npublic static main void (string[] args){\n                       ^\n2 errors\nerror: compilation failed\n'),
(66, '2023-01-08 06:17:11', 'public class main{\n\npublic static void mian(string[] args){\nSystem.out.println(\"hello\");\n}	\n}', 'Main.java.java:4: error: cannot find symbol\npublic static void mian(string[] args){\n                        ^\n  symbol:   class string\n  location: class main\n1 error\nerror: compilation failed\n'),
(67, '2023-01-08 06:17:22', 'public class main{\n\npublic static void main(string[] args){\nSystem.out.println(\"hello\");\n}	\n}', 'Main.java.java:4: error: cannot find symbol\npublic static void main(string[] args){\n                        ^\n  symbol:   class string\n  location: class main\n1 error\nerror: compilation failed\n'),
(68, '2023-01-08 06:17:38', 'public class main{\n\npublic static void main(string[] args){\nSystem.out.println(\"hello\");\n}	\n}', 'Main.java.java:4: error: cannot find symbol\npublic static void main(string[] args){\n                        ^\n  symbol:   class string\n  location: class main\n1 error\nerror: compilation failed\n'),
(69, '2023-01-08 06:18:28', 'public class main{\n\npublic static void main(String[] args){\nSystem.out.println(\"hello\");\n}	\n}', 'hello\n'),
(70, '2023-01-08 11:43:58', '		public class main {public static void main (String[] args) {System.out.println(\"test\");}}		', 'test\n'),
(71, '2023-01-08 11:44:55', '				public class hello {public static void main (String[] args){\nint x = 10;\nSystem.out.println(\"x\");\n}}', 'x\n'),
(72, '2023-01-08 11:45:06', '				public class hello {public static void main (String[] args){\nint x = 10;\nSystem.out.println(x);\n}}', '10\n'),
(73, '2023-01-08 12:38:39', '		public class main{public static void main (String [] args){System.out.println(\"hi hello how are you\");}}		', 'hi hello how are you\n'),
(74, '2023-01-08 12:44:33', '				asd', 'Main.java.java:2: error: reached end of file while parsing\n											asd\n											^\n1 error\nerror: compilation failed\n');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `question_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `choice_1` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `choice_2` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `choice_3` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`question_id`, `question`, `answer`, `choice_1`, `choice_2`, `choice_3`) VALUES
(5, 'What is static block?', 'It is used to initialize the static data member., It is excuted before main method at the time of class loading.', 'It is used to create syncronized code.', 'There is no such block.', 'None of the above'),
(7, 'This is a new question?', 'a4', 'a1', 'a2', 'a3');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `Section_id` int(11) NOT NULL,
  `Subject` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `Content` varchar(1000) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`Section_id`, `Subject`, `Content`) VALUES
(4, 'If else condition ... my changes', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat'),
(11, 'For loop', 'Neque gravida in fermentum et sollicitudin ac orci. Risus sed vulputate odio ut enim blandit volutpat maecenas volutpat. Odio aenean sed adipiscing diam donec adipiscing tristique. Justo nec ultrices dui sapien eget mi. Lectus sit amet est placerat in. Faucibus a pellentesque sit amet. Non sodales neque sodales ut etiam sit amet. Semper auctor neque vitae tempus quam pellentesque nec nam.'),
(14, 'Syntax', 'Et netus et malesuada fames ac turpis egestas integer eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Pulvinar neque laoreet suspendisse interdum consectetur.'),
(15, 'Data types', 'Nec ultrices dui sapien eget mi proin. Amet massa vitae tortor condimentum. '),
(16, 'Object Definition', 'Imperdiet massa tincidunt nunc pulvinar sapien et. Ut lectus arcu bibendum at. Massa vitae tortor condimentum lacinia. Mi quis hendrerit dolor magna eget est.'),
(17, 'Functions', 'aaaaaaaaaaaa'),
(22, 'My new subject', 'My new content');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`Section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `Section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
