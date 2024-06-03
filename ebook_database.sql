-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 11:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Bookid` int(11) NOT NULL,
  `Book_Name` varchar(100) NOT NULL,
  `Image` varchar(225) NOT NULL,
  `Author_Name` varchar(100) NOT NULL,
  `Edition` varchar(100) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Delivery_Details` varchar(100) NOT NULL,
  `weight_in_Kg` int(50) NOT NULL,
  `DealersDetail` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Bookid`, `Book_Name`, `Image`, `Author_Name`, `Edition`, `Price`, `Delivery_Details`, `weight_in_Kg`, `DealersDetail`, `cat_id`) VALUES
(2, 'PHP', '../BooksImages/php book images.jpg', 'Furqan Rehman | Hassan Mujtaba | Muhammad Wahaj | Farzam', 'III Edition', '500', 'This Book based on three types.', 1, 1, 1),
(3, 'Javascript new', '../BooksImages/javascript.jpg', 'Muniba', 'II Edition', '560', 'This book based on three forms.', 1, 1, 2),
(24, 'SQL', '../BooksImages/SQL 1.jpg', 'John Russel', 'III', '700', 'These books are available in three forms: pdf, hard copy & cd.', 1, 2, 2),
(37, 'Python', '../BooksImages/python book.jpg', 'RYAN TURNER', 'VIII Edition', '750', 'These books are available in three forms: pdf, hard copy & cd.', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE `booktype` (
  `Typeid` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `booksName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booktype`
--

INSERT INTO `booktype` (`Typeid`, `Type`, `booksName`) VALUES
(4, 'PDF', 2),
(5, 'Hard Copy', 2),
(6, 'CD', 2),
(7, 'PDF', 3),
(8, 'Hard Copy', 3),
(9, 'CD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_weight`
--

CREATE TABLE `book_weight` (
  `weightid` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `weight` int(100) NOT NULL,
  `Booktype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_weight`
--

INSERT INTO `book_weight` (`weightid`, `Description`, `bookid`, `weight`, `Booktype`) VALUES
(10, 'PHP', 2, 1, 5),
(11, 'Javascript', 3, 2, 8),
(16, 'PHP', 2, 0, 4),
(17, 'PHP', 2, 0, 6),
(18, 'Javascript', 3, 0, 7),
(19, 'Javascript', 3, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cartid` int(11) NOT NULL,
  `Customer` varchar(100) NOT NULL,
  `Bookid` int(11) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cartid`, `Customer`, `Bookid`, `Price`, `Qty`) VALUES
(25, 'Furqan Ur Rehman', 2, '500', '1'),
(26, 'Kashif', 2, '500', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_delivery`
--

CREATE TABLE `cash_on_delivery` (
  `cid` int(11) NOT NULL,
  `Postal_Address` varchar(100) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `custid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_on_delivery`
--

INSERT INTO `cash_on_delivery` (`cid`, `Postal_Address`, `Contact`, `custid`) VALUES
(5, 'House No. 983 Gulberg Zone Karachi.', '03784563217', 2),
(6, 'Block 13D Gulshan-e-Iqbal, Karachi', '03657893214', 1),
(8, 'North Karachi', '03657893214', 1),
(9, 'North Karachi', '03421107554', 2),
(13, 'Block 16 FB Area Karachi', '0348784587', 5),
(14, '', '', 5),
(15, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Catid` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Catid`, `category_name`) VALUES
(1, 'Coding'),
(2, 'Data Structure'),
(3, 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `charge_on_weight`
--

CREATE TABLE `charge_on_weight` (
  `kgid` int(11) NOT NULL,
  `charge` int(50) NOT NULL,
  `Weightid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charge_on_weight`
--

INSERT INTO `charge_on_weight` (`kgid`, `charge`, `Weightid`) VALUES
(9, 150, 10),
(10, 200, 11),
(11, 0, 16),
(12, 0, 17),
(13, 0, 18),
(14, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `compid` int(11) NOT NULL,
  `comp_name` varchar(225) NOT NULL,
  `Topics` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `Passing_Marks` int(30) NOT NULL,
  `Total_Marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`compid`, `comp_name`, `Topics`, `start_date`, `Passing_Marks`, `Total_Marks`) VALUES
(1, 'Essay Writing', 'Coding are the phobia or not?', '2022-12-23', 40, 100);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `cardid` int(11) NOT NULL,
  `cardnumber` varchar(100) NOT NULL,
  `Date_of_Expiry` date NOT NULL,
  `Title_of_Ac` varchar(100) NOT NULL,
  `custid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`cardid`, `cardnumber`, `Date_of_Expiry`, `Title_of_Ac`, `custid`) VALUES
(45, '12345678912345', '2022-12-03', 'Furqan', 1),
(47, '1236', '2022-12-03', 'Anis', 2),
(50, '1236', '2022-12-14', 'Hassan', 2),
(55, '456321', '2022-12-21', 'Anis', 2),
(58, '1236', '2022-12-08', 'Azeem', 1),
(64, '222', '2022-12-23', 'Azeem', 1),
(90, '4560 7845 1200 9800', '2022-12-25', 'Kashif Khan', 5),
(102, '111', '2022-12-27', 'Kashif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custid` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int(30) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Qualification` varchar(225) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `dateofregistration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `Name`, `Age`, `Role`, `Qualification`, `Contact`, `Address`, `Email`, `Password`, `dateofregistration`) VALUES
(1, 'Furqan Ur Rehman', 30, 'Admin', 'Graduation', '03657893214', 'Karachi', 'furqanadmin@gmail.com', 'customer', '2022-11-27'),
(2, 'Hassan Mujtaba', 25, 'Admin', 'BCS', '03421107554', 'North', 'admin@gmail.com', 'admin', '2022-11-27'),
(5, 'Kashif', 0, 'Customer', '', '0348784587', 'Karachi', 'kashif@gmail.com', '123', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `dealerid` int(11) NOT NULL,
  `Dealer_name` varchar(50) NOT NULL,
  `Dealers_Location` varchar(225) NOT NULL,
  `shop_Name` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`dealerid`, `Dealer_name`, `Dealers_Location`, `shop_Name`, `City`, `contact`) VALUES
(1, 'Ali', 'Sector 7/C North Karachi.', 'Bismillah Shop', 'Block C, Karachi', '03462879652'),
(2, 'Kashif', 'Gulberg Zone Karachi', 'Kashif Books Center', 'Karachi', '03457845123');

-- --------------------------------------------------------

--
-- Table structure for table `deliverylocation`
--

CREATE TABLE `deliverylocation` (
  `Locationid` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `BooksName` varchar(30) NOT NULL,
  `Loc_on_booktype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverylocation`
--

INSERT INTO `deliverylocation` (`Locationid`, `Location`, `BooksName`, `Loc_on_booktype`) VALUES
(8, 'Through Online', 'PHP', 4),
(9, 'Through Online', 'Javascript New', 7),
(10, 'Karachi', 'PHP', 5),
(11, 'Karachi', 'Javascript New', 8),
(12, 'Outside Karachi', 'PHP', 5),
(13, 'Outside Karachi', 'Javascript New', 8),
(14, 'Karachi', 'PHP', 6),
(15, 'Outside Karachi', 'PHP', 6),
(16, 'Karachi', 'Javascript New', 9),
(17, 'Outside Karachi', 'Javascript New', 9);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `chargeid` int(11) NOT NULL,
  `Charge_Amount` int(50) NOT NULL DEFAULT 0,
  `Delivery_Location` int(11) NOT NULL,
  `Booktype` varchar(30) NOT NULL,
  `BookName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`chargeid`, `Charge_Amount`, `Delivery_Location`, `Booktype`, `BookName`) VALUES
(9, 0, 8, 'PDF', 'PHP'),
(10, 0, 9, 'PDF', 'Javascript New'),
(11, 150, 10, 'Hard Copy', 'PHP'),
(12, 200, 12, 'Hard Copy', 'PHP'),
(13, 150, 14, 'CD', 'PHP'),
(14, 200, 15, 'CD', 'PHP'),
(15, 150, 11, 'Hard Copy', 'Javascript New'),
(16, 200, 13, 'Hard Copy', 'Javascript New'),
(17, 150, 16, 'CD', 'Javascript New'),
(18, 200, 17, 'CD', 'Javascript New');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `Custid` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `Delivery_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invid`, `orderid`, `bookid`, `Custid`, `TotalPrice`, `InvoiceDate`, `Delivery_Date`) VALUES
(1, 45, 3, 2, 1200, '2022-12-23', '2022-12-25'),
(2, 45, 3, 1, 12300, '2022-12-23', '2022-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `orderid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `qty` int(30) NOT NULL,
  `Payment_Method` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `Custid` int(11) NOT NULL,
  `BookType` int(11) NOT NULL,
  `Delivery_on_Location` int(11) NOT NULL,
  `Delivery_Charges` int(11) NOT NULL,
  `Weight_of_Book_in_Kg` int(30) NOT NULL,
  `Charge_on_Weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`orderid`, `bookid`, `qty`, `Payment_Method`, `order_date`, `Custid`, `BookType`, `Delivery_on_Location`, `Delivery_Charges`, `Weight_of_Book_in_Kg`, `Charge_on_Weight`) VALUES
(45, 2, 2, 2, '2022-11-29', 2, 5, 12, 12, 10, 9),
(66, 3, 2, 1, '2022-12-16', 1, 7, 9, 10, 18, 13),
(78, 2, 10, 1, '2022-12-24', 2, 5, 12, 12, 10, 9),
(80, 3, 5, 2, '2022-12-24', 5, 8, 11, 15, 11, 10),
(82, 2, 5, 1, '2022-12-25', 5, 5, 12, 12, 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `PaymentId` int(11) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`PaymentId`, `PaymentMethod`) VALUES
(1, 'Through Credit Card'),
(2, 'Through Cash');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `winid` int(11) NOT NULL,
  `compid` int(11) NOT NULL,
  `prizes` int(11) NOT NULL,
  `custid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`winid`, `compid`, `prizes`, `custid`) VALUES
(1, 1, 1000, 1),
(2, 1, 1000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Bookid`),
  ADD KEY `books_ibfk_1` (`cat_id`),
  ADD KEY `DealersDetail` (`DealersDetail`);

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`Typeid`),
  ADD KEY `booksName` (`booksName`);

--
-- Indexes for table `book_weight`
--
ALTER TABLE `book_weight`
  ADD PRIMARY KEY (`weightid`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `Booktype` (`Booktype`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cartid`),
  ADD KEY `fkbookid` (`Bookid`);

--
-- Indexes for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `custid` (`custid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Catid`);

--
-- Indexes for table `charge_on_weight`
--
ALTER TABLE `charge_on_weight`
  ADD PRIMARY KEY (`kgid`),
  ADD KEY `Weightid` (`Weightid`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`compid`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`cardid`),
  ADD KEY `custid` (`custid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`dealerid`);

--
-- Indexes for table `deliverylocation`
--
ALTER TABLE `deliverylocation`
  ADD PRIMARY KEY (`Locationid`),
  ADD KEY `Loc_on_booktype` (`Loc_on_booktype`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`chargeid`),
  ADD KEY `Delivery_Location` (`Delivery_Location`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invid`),
  ADD KEY `Custid` (`Custid`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `BookType` (`BookType`),
  ADD KEY `Delivery_on_Location` (`Delivery_on_Location`),
  ADD KEY `Delivery_Charges` (`Delivery_Charges`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `Custid` (`Custid`),
  ADD KEY `Payment_Method` (`Payment_Method`),
  ADD KEY `Charge_on_Weight` (`Charge_on_Weight`),
  ADD KEY `order_table_ibfk_10` (`Weight_of_Book_in_Kg`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`winid`),
  ADD KEY `custid` (`custid`),
  ADD KEY `compid` (`compid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `booktype`
--
ALTER TABLE `booktype`
  MODIFY `Typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_weight`
--
ALTER TABLE `book_weight`
  MODIFY `weightid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `charge_on_weight`
--
ALTER TABLE `charge_on_weight`
  MODIFY `kgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `compid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `dealerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliverylocation`
--
ALTER TABLE `deliverylocation`
  MODIFY `Locationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `chargeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `winid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`Catid`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`DealersDetail`) REFERENCES `dealers` (`dealerid`);

--
-- Constraints for table `booktype`
--
ALTER TABLE `booktype`
  ADD CONSTRAINT `booktype_ibfk_1` FOREIGN KEY (`booksName`) REFERENCES `books` (`Bookid`);

--
-- Constraints for table `book_weight`
--
ALTER TABLE `book_weight`
  ADD CONSTRAINT `book_weight_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `books` (`Bookid`),
  ADD CONSTRAINT `book_weight_ibfk_2` FOREIGN KEY (`Booktype`) REFERENCES `booktype` (`Typeid`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fkbookid` FOREIGN KEY (`Bookid`) REFERENCES `books` (`Bookid`);

--
-- Constraints for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  ADD CONSTRAINT `cash_on_delivery_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`);

--
-- Constraints for table `charge_on_weight`
--
ALTER TABLE `charge_on_weight`
  ADD CONSTRAINT `charge_on_weight_ibfk_1` FOREIGN KEY (`Weightid`) REFERENCES `book_weight` (`weightid`);

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`);

--
-- Constraints for table `deliverylocation`
--
ALTER TABLE `deliverylocation`
  ADD CONSTRAINT `deliverylocation_ibfk_1` FOREIGN KEY (`Loc_on_booktype`) REFERENCES `booktype` (`Typeid`);

--
-- Constraints for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD CONSTRAINT `delivery_charges_ibfk_1` FOREIGN KEY (`Delivery_Location`) REFERENCES `deliverylocation` (`Locationid`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Custid`) REFERENCES `customer` (`custid`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `books` (`Bookid`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `order_table` (`orderid`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`BookType`) REFERENCES `booktype` (`Typeid`),
  ADD CONSTRAINT `order_table_ibfk_10` FOREIGN KEY (`Weight_of_Book_in_Kg`) REFERENCES `book_weight` (`weightid`),
  ADD CONSTRAINT `order_table_ibfk_12` FOREIGN KEY (`Payment_Method`) REFERENCES `payment_method` (`PaymentId`),
  ADD CONSTRAINT `order_table_ibfk_13` FOREIGN KEY (`Charge_on_Weight`) REFERENCES `charge_on_weight` (`kgid`),
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`Delivery_on_Location`) REFERENCES `deliverylocation` (`Locationid`),
  ADD CONSTRAINT `order_table_ibfk_3` FOREIGN KEY (`Delivery_Charges`) REFERENCES `delivery_charges` (`chargeid`),
  ADD CONSTRAINT `order_table_ibfk_6` FOREIGN KEY (`bookid`) REFERENCES `books` (`Bookid`),
  ADD CONSTRAINT `order_table_ibfk_7` FOREIGN KEY (`Custid`) REFERENCES `customer` (`custid`);

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`),
  ADD CONSTRAINT `winners_ibfk_2` FOREIGN KEY (`compid`) REFERENCES `competition` (`compid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
