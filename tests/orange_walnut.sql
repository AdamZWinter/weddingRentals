-- Database: `orangegr_walnut`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `email` varchar(128) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `altEmail` varchar(128) DEFAULT NULL,
  `altFirstName` varchar(32) DEFAULT NULL,
  `altLastName` varchar(32) DEFAULT NULL,
  `altPhone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`email`, `fname`, `lname`, `phone`, `altEmail`, `altFirstName`, `altLastName`, `altPhone`) VALUES
('amyAdams@gmail.com', 'Amy', 'Adams', '1234567890', '', '', '', ''),
('amySpicuzza@gmail.com', 'Amy', 'Spicuzza', '7894561232', '', '', '', ''),
('ashleyKelver@yahoo.com', 'Ashley', 'Kelver', '1234569873', '', '', '', ''),
('elaineKing@comcast.net', 'Elaine', 'King', '9876543210', '', '', '', ''),
('email@emaill.com', 'Adam', 'Winter', '2537095103', '', '', '', ''),
('email@emailstuff.com', 'Adam', 'Winter', '5555555555', '', '', '', ''),
('janeJansen@yahoo.com', 'Jane', 'Jansen', '4567891230', '', '', '', ''),
('jenniferAllen@gmail.com', 'Jennifer', 'Allen', '4567891236', '', '', '', ''),
('jillianSykes@gmail.com', 'Jillian', 'Sykes', '7894561234', '', '', '', ''),
('katMertsh@yahoo.com', 'Kat', 'Mertsh', '1237894567', '', '', '', ''),
('kristenTattar@yahoo.com', 'Kristen', 'Tattar', '7894561328', '', '', '', ''),
('loisLane@yahoo.com', 'Lois', 'Lane', '1234567890', '', '', '', ''),
('madisonWalker@gmail.com', 'Madison', 'Walker', '3216547894', '', '', '', ''),
('michelleScalley@gamil.com', 'Michelle', 'Scalley', '1234567890', '', '', '', ''),
('pagePierce@gmail.com', 'Page', 'Pierce', '4567891235', '', '', '', ''),
('sarahHokom@yahoo.com', 'Sarah', 'Hokom', '4561237897', '', '', '', ''),
('sarahOlmstead@yahoo.com', 'Sarah', 'Olmstead', '1234567890', '', '', '', ''),
('stacyRawnsley@comcast.net', 'Stacy', 'Rawnsley', '1237894568', '', '', '', ''),
('susieQAnderson@gmail.com', 'Susie', 'Anderson', '1234567890', '', '', '', ''),
('taylorKinsey@yahoo.com', 'Taylor', 'Kinsey', '4567891231', '', '', '', ''),
('tinaOakley@gmail.com', 'Tina', 'Oakley', '3216547894', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `reservationID` varchar(64) NOT NULL,
  `extrasJSON` text NOT NULL,
  `extrasCode` int(32) NOT NULL,
  `hexArborQty` int(8) DEFAULT NULL,
  `vintageSofaQty` int(8) DEFAULT NULL,
  `antiqueGallonQty` int(8) DEFAULT NULL,
  `wineJugsQty` int(8) DEFAULT NULL,
  `clearBallJarsQty` int(8) DEFAULT NULL,
  `blueBallJarsQty` int(8) DEFAULT NULL,
  `deliveryQty` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`reservationID`, `extrasJSON`, `extrasCode`, `hexArborQty`, `vintageSofaQty`, `antiqueGallonQty`, `wineJugsQty`, `clearBallJarsQty`, `blueBallJarsQty`, `deliveryQty`) VALUES
('2022-12-09_1048337_0_Anderson', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-16_1048337_0_finalTest', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-17_1048337_0_test', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-22_33554196_1_Lane', '[\"Hexagon Arbor\"]', 1, 1, 0, 0, 0, 0, 0, 0),
('2022-12-23_1048337_0_altTester', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-23_1048337_0_finalTest', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-23_1048337_0_Stone', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-23_1048337_0_test', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-23_1048337_22_test', '[\"Vintage Sofa\",\"Antique Gallon Jugs\",\"Clear Antique Ball Jars\"]', 22, 0, 1, 1, 0, 1, 0, 0),
('2022-12-24_1048337_62_test', '[\"Vintage Sofa\",\"Antique Gallon Jugs\",\"XL Wine Jugs\",\"Clear Antique Ball Jars\",\"Blue Antique Ball Jars\"]', 62, 0, 1, 1, 1, 1, 1, 0),
('2022-12-24_130834_0_Stone', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2022-12-31_33554229_0_altTest', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-01-07_1048337_9_alternateContactTest', '[\"Hexagon Arbor\",\"XL Wine Jugs\"]', 9, 1, 0, 0, 1, 0, 0, 0),
('2023-01-13_4194067_60_Scalley', '[\"Antique Gallon Jugs\",\"XL Wine Jugs\",\"Clear Antique Ball Jars\",\"Blue Antique Ball Jars\"]', 60, 0, 0, 1, 1, 1, 1, 0),
('2023-03-10_1048337_12_Adams', '[\"Antique Gallon Jugs\",\"XL Wine Jugs\"]', 12, 0, 0, 1, 1, 0, 0, 0),
('2023-03-11_130834_49_Olmstead', '[\"Hexagon Arbor\",\"Clear Antique Ball Jars\",\"Blue Antique Ball Jars\"]', 49, 1, 0, 0, 0, 1, 1, 0),
('2023-04-14_1048337_0_King', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-04-27_16161_65_Winter', '[\"Hexagon Arbor\",\"Delivery\"]', 65, 1, 0, 0, 0, 0, 0, 1),
('2023-04-28_130834_0_Jansen', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-05-19_1048337_0_Kinsey', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-05-19_4194067_0_Sykes', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-06-09_1048337_0_Pierce', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-06-28_3890_69_Winter', '[\"Hexagon Arbor\",\"Antique Gallon Jugs\",\"Delivery\"]', 69, 1, 0, 1, 0, 0, 0, 1),
('2023-06-30_1048337_0_Tattar', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-06-30_33554229_0_Hokom', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-07-01_4194067_0_Allen', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-08-04_3907_61_Rawnsley', '[\"Hexagon Arbor\",\"Antique Gallon Jugs\",\"XL Wine Jugs\",\"Clear Antique Ball Jars\",\"Blue Antique Ball Jars\"]', 61, 1, 0, 1, 1, 1, 1, 0),
('2023-08-11_130834_2_Mertsh', '[\"Vintage Sofa\"]', 2, 0, 1, 0, 0, 0, 0, 0),
('2023-09-01_130834_0_Kelver', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-09-01_1966147_12_Spicuzza', '[\"Antique Gallon Jugs\",\"XL Wine Jugs\"]', 12, 0, 0, 1, 1, 0, 0, 0),
('2023-09-02_33554196_0_Oakley', '[]', 0, 0, 0, 0, 0, 0, 0, 0),
('2023-09-07_1048337_0_Walker', '[]', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` varchar(64) NOT NULL,
  `customerID` varchar(64) NOT NULL,
  `dateUnix` int(32) NOT NULL,
  `dateHuman` date NOT NULL,
  `signSet` varchar(32) NOT NULL,
  `signSetLang` varchar(32) NOT NULL,
  `package` text NOT NULL,
  `packageCode` int(32) NOT NULL,
  `packageJSON` text NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `customerID`, `dateUnix`, `dateHuman`, `signSet`, `signSetLang`, `package`, `packageCode`, `packageJSON`, `status`) VALUES
('2022-12-09_1048337_0_Anderson', 'susieQAnderson@gmail.com', 1670544000, '2022-12-09', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'confirmed'),
('2022-12-22_33554196_1_Lane', 'loisLane@yahoo.com', 1671667200, '2022-12-22', 'darkwalnut', 'Dark Walnut', 'Full Package', 33554196, '[\"Welcome to Our Beginning Round (24 in. diameter, with easel) or Rectangular (35.5 x 21 with easel)\",\"Find your Seat  (35.5 x 21 organizer with 30 clips & easel)\",\"Table Numbers, double-sided (Numbers 1-30, 3.5 x 9)\",\"Antique Jug with Honeymoon Fund (jug & mini-hanger, 4.75 x 10) (2pc)\",\"Mr. & Mrs. Head Table Sign with small easel 7.25 x 22.5\",\"We know that you would be here today if Heaven weren%27t so far away  (10 x 10.5 memorial sign or seat saver with small easel)\",\"Here comes the Bride ring bearer carrier  (10.25 x 17.25 with cord)\",\"Better & Together Chair Hangers (with cord 10.25 x 17.25) (2pc)\",\"Please Sign our Guestbook (self standing 7.25 x 16)\",\"Just Married & Thank You (reversible photo-shoot prop 7.25 x 31)\",\"Take One (7.25 x 7.25)\",\"Programs (7.25 x 16)\",\"Enjoy the Moment, no photography please 10.5 in. x 17 in. with small easel\",\"8 Reserved signs (3.5 in. x 12 in.  4 with cord hanger option) (8pc)\",\"Antique Leather and Wooden Trunk with Cards Banner\",\"1 Corinthians 13 signs ($99 additional)\",\"Vintage Typewriter with Message to Guests ($99 additional)\"]', 'new'),
('2023-01-13_4194067_60_Scalley', 'michelleScalley@gamil.com', 1673568000, '2023-01-13', 'vintagemirror', 'Vintage Mirror', 'Platinum', 4194067, '[\"Welcome Sign with custom names & date & large wrought iron easel\",\"Antique Typewriter Rental with customized message (100 words or less)\",\"Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application\",\"Table Numbers 1-30\",\"Leather Domed Trunk with u201ccardsu201d mirror with stand\",\"Enjoy the Moment- no photography please mirror with stand\",\"Guestbook mirror with stand\",\"Take One small vanity mirror\",\"1 Large Full Custom Mirror (50 words or less) with large wrought iron easel\",\"1 Medium Full Custom Mirror (20 words or less)  with large wrought iron easel\",\"1 Small Custom Mirror (10 words or less) with wrought iron easel\",\"Custom Mirror SMALL (up to 12 words) $40\",\"Custom Mirror MEDIUM (up to 24 words) $60\",\"Customer Mirror LARGE (up to 60 words) $80\"]', 'new'),
('2023-03-10_1048337_12_Adams', 'amyAdams@gmail.com', 1678406400, '2023-03-10', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'new'),
('2023-03-11_130834_49_Olmstead', 'sarahOlmstead@yahoo.com', 1678492800, '2023-03-11', 'modernround', 'Modern Round', 'Full Set', 130834, '[\"Large Custom Welcome (round center becomes a keepsake)\",\"Large Magnetic Rectangular (Find Your Seat, Cocktails, Let%27s Party, or customize)\",\"1-30 free standing table numbers\",\"Modern Locking Card Box or Vintage Industrial Typewriter Rental with custom message to guests (up to 100 words)\",\"Set of Reserved signs (5)\",\"2 Selections of Small Square Bracket Signs (In Loving Memory, Gifts & Cards, Take One, and/or customize)\",\"2 Selections of Small Horizontal Bracket Signs (Guestbook, Programs, Mr. & Mrs. Take One, Gifts and Cards,  and/or customize)\",\"1 Medium Table Top  (Unplugged Ceremony, or Magnetic Sign with Cocktails heading,  In Loving Memory heading or customize\",\"All Full Set Rental Clients receive 1 SMALL COMPLIMENTARY 3-D CUSTOMIZATION on a small sign in addition to their Round Welcome Sign Keepsake\"]', 'new'),
('2023-04-14_1048337_0_King', 'elaineKing@comcast.net', 1681430400, '2023-04-14', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'new'),
('2023-04-27_16161_65_Winter', 'email@emailstuff.com', 1682553600, '2023-04-27', 'layeredarch', 'Layered Arch', 'Pick Six', 16161, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\"]', 'new'),
('2023-04-28_130834_0_Jansen', 'janeJansen@yahoo.com', 1682640000, '2023-04-28', 'modernround', 'Modern Round', 'Full Set', 130834, '[\"Large Custom Welcome (round center becomes a keepsake)\",\"Large Magnetic Rectangular (Find Your Seat, Cocktails, Let%27s Party, or customize)\",\"1-30 free standing table numbers\",\"Modern Locking Card Box or Vintage Industrial Typewriter Rental with custom message to guests (up to 100 words)\",\"Set of Reserved signs (5)\",\"2 Selections of Small Square Bracket Signs (In Loving Memory, Gifts & Cards, Take One, and/or customize)\",\"2 Selections of Small Horizontal Bracket Signs (Guestbook, Programs, Mr. & Mrs. Take One, Gifts and Cards,  and/or customize)\",\"1 Medium Table Top  (Unplugged Ceremony, or Magnetic Sign with Cocktails heading,  In Loving Memory heading or customize\",\"All Full Set Rental Clients receive 1 SMALL COMPLIMENTARY 3-D CUSTOMIZATION on a small sign in addition to their Round Welcome Sign Keepsake\"]', 'new'),
('2023-05-19_1048337_0_Kinsey', 'taylorKinsey@yahoo.com', 1684454400, '2023-05-19', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'new'),
('2023-05-19_4194067_0_Sykes', 'jillianSykes@gmail.com', 1684454400, '2023-05-19', 'vintagemirror', 'Vintage Mirror', 'Platinum', 4194067, '[\"Welcome Sign with custom names & date & large wrought iron easel\",\"Antique Typewriter Rental with customized message (100 words or less)\",\"Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application\",\"Table Numbers 1-30\",\"Leather Domed Trunk with u201ccardsu201d mirror with stand\",\"Enjoy the Moment- no photography please mirror with stand\",\"Guestbook mirror with stand\",\"Take One small vanity mirror\",\"1 Large Full Custom Mirror (50 words or less) with large wrought iron easel\",\"1 Medium Full Custom Mirror (20 words or less)  with large wrought iron easel\",\"1 Small Custom Mirror (10 words or less) with wrought iron easel\",\"Custom Mirror SMALL (up to 12 words) $40\",\"Custom Mirror MEDIUM (up to 24 words) $60\",\"Customer Mirror LARGE (up to 60 words) $80\"]', 'new'),
('2023-06-09_1048337_0_Pierce', 'pagePierce@gmail.com', 1686268800, '2023-06-09', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'new'),
('2023-06-28_3890_69_Winter', 'email@emaill.com', 1687910400, '2023-06-28', 'modernround', 'Modern Round', 'Pick Four', 3890, '[\"Large Custom Welcome (round center becomes a keepsake)\",\"Large Magnetic Rectangular (Find Your Seat, Cocktails, Let%27s Party, or customize)\",\"1-30 free standing table numbers\",\"Modern Locking Card Box or Vintage Industrial Typewriter Rental with custom message to guests (up to 100 words)\"]', 'new'),
('2023-06-30_1048337_0_Tattar', 'kristenTattar@yahoo.com', 1688083200, '2023-06-30', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'new'),
('2023-06-30_33554229_0_Hokom', 'sarahHokom@yahoo.com', 1688083200, '2023-06-30', 'rusticwood', 'Rustic Wood', 'Pick Four', 33554229, '[\"Welcome to Our Beginning Round (24 in. diameter, with easel) or Rectangular (35.5 x 21 with easel)\",\"Find your Seat  (35.5 x 21 organizer with 30 clips & easel)\",\"Table Numbers, double-sided (Numbers 1-30, 3.5 x 9)\",\"Antique Jug with Honeymoon Fund (jug & mini-hanger, 4.75 x 10) (2pc)\",\"Mr. & Mrs. Head Table Sign with small easel 7.25 x 22.5\",\"We know that you would be here today if Heaven weren%27t so far away  (10 x 10.5 memorial sign or seat saver with small easel)\",\"Here comes the Bride ring bearer carrier  (10.25 x 17.25 with cord)\",\"Better & Together Chair Hangers (with cord 10.25 x 17.25) (2pc)\",\"Please Sign our Guestbook (self standing 7.25 x 16)\",\"Just Married & Thank You (reversible photo-shoot prop 7.25 x 31)\",\"Take One (7.25 x 7.25)\",\"Programs (7.25 x 16)\",\"Enjoy the Moment, no photography please 10.5 in. x 17 in. with small easel\",\"8 Reserved signs (3.5 in. x 12 in.  4 with cord hanger option) (8pc)\",\"Antique Leather and Wooden Trunk with Cards Banner\",\"1 Corinthians 13 signs ($99 additional)\",\"Vintage Typewriter with Message to Guests ($99 additional)\"]', 'new'),
('2023-07-01_4194067_0_Allen', 'jenniferAllen@gmail.com', 1688169600, '2023-07-01', 'vintagemirror', 'Vintage Mirror', 'Platinum', 4194067, '[\"Welcome Sign with custom names & date & large wrought iron easel\",\"Antique Typewriter Rental with customized message (100 words or less)\",\"Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application\",\"Table Numbers 1-30\",\"Leather Domed Trunk with u201ccardsu201d mirror with stand\",\"Enjoy the Moment- no photography please mirror with stand\",\"Guestbook mirror with stand\",\"Take One small vanity mirror\",\"1 Large Full Custom Mirror (50 words or less) with large wrought iron easel\",\"1 Medium Full Custom Mirror (20 words or less)  with large wrought iron easel\",\"1 Small Custom Mirror (10 words or less) with wrought iron easel\",\"Custom Mirror SMALL (up to 12 words) $40\",\"Custom Mirror MEDIUM (up to 24 words) $60\",\"Customer Mirror LARGE (up to 60 words) $80\"]', 'new'),
('2023-08-04_3907_61_Rawnsley', 'stacyRawnsley@comcast.net', 1691107200, '2023-08-04', 'vintagemirror', 'Vintage Mirror', 'Pick Four', 3907, '[\"Welcome Sign with custom names & date & large wrought iron easel\",\"Antique Typewriter Rental with customized message (100 words or less)\",\"Choice of Linen Seating Chart Stringer or Large Custom Mirror for gold seal application\",\"Table Numbers 1-30\"]', 'new'),
('2023-08-11_130834_2_Mertsh', 'katMertsh@yahoo.com', 1691712000, '2023-08-11', 'modernround', 'Modern Round', 'Full Set', 130834, '[\"Large Custom Welcome (round center becomes a keepsake)\",\"Large Magnetic Rectangular (Find Your Seat, Cocktails, Let%27s Party, or customize)\",\"1-30 free standing table numbers\",\"Modern Locking Card Box or Vintage Industrial Typewriter Rental with custom message to guests (up to 100 words)\",\"Set of Reserved signs (5)\",\"2 Selections of Small Square Bracket Signs (In Loving Memory, Gifts & Cards, Take One, and/or customize)\",\"2 Selections of Small Horizontal Bracket Signs (Guestbook, Programs, Mr. & Mrs. Take One, Gifts and Cards,  and/or customize)\",\"1 Medium Table Top  (Unplugged Ceremony, or Magnetic Sign with Cocktails heading,  In Loving Memory heading or customize\",\"All Full Set Rental Clients receive 1 SMALL COMPLIMENTARY 3-D CUSTOMIZATION on a small sign in addition to their Round Welcome Sign Keepsake\"]', 'new'),
('2023-09-01_130834_0_Kelver', 'ashleyKelver@yahoo.com', 1693526400, '2023-09-01', 'modernround', 'Modern Round', 'Full Set', 130834, '[\"Large Custom Welcome (round center becomes a keepsake)\",\"Large Magnetic Rectangular (Find Your Seat, Cocktails, Let%27s Party, or customize)\",\"1-30 free standing table numbers\",\"Modern Locking Card Box or Vintage Industrial Typewriter Rental with custom message to guests (up to 100 words)\",\"Set of Reserved signs (5)\",\"2 Selections of Small Square Bracket Signs (In Loving Memory, Gifts & Cards, Take One, and/or customize)\",\"2 Selections of Small Horizontal Bracket Signs (Guestbook, Programs, Mr. & Mrs. Take One, Gifts and Cards,  and/or customize)\",\"1 Medium Table Top  (Unplugged Ceremony, or Magnetic Sign with Cocktails heading,  In Loving Memory heading or customize\",\"All Full Set Rental Clients receive 1 SMALL COMPLIMENTARY 3-D CUSTOMIZATION on a small sign in addition to their Round Welcome Sign Keepsake\"]', 'new'),
('2023-09-01_1966147_12_Spicuzza', 'amySpicuzza@gmail.com', 1693526400, '2023-09-01', 'vintagemirror', 'Vintage Mirror', 'Pick Four', 1966147, '[\"1 Medium Full Custom Mirror (20 words or less)  with large wrought iron easel\",\"1 Small Custom Mirror (10 words or less) with wrought iron easel\",\"Custom Mirror SMALL (up to 12 words) $40\",\"Custom Mirror MEDIUM (up to 24 words) $60\"]', 'new'),
('2023-09-02_33554196_0_Oakley', 'tinaOakley@gmail.com', 1693612800, '2023-09-02', 'darkwalnut', 'Dark Walnut', 'Full Package', 33554196, '[\"Welcome to Our Beginning Round (24 in. diameter, with easel) or Rectangular (35.5 x 21 with easel)\",\"Find your Seat  (35.5 x 21 organizer with 30 clips & easel)\",\"Table Numbers, double-sided (Numbers 1-30, 3.5 x 9)\",\"Antique Jug with Honeymoon Fund (jug & mini-hanger, 4.75 x 10) (2pc)\",\"Mr. & Mrs. Head Table Sign with small easel 7.25 x 22.5\",\"We know that you would be here today if Heaven weren%27t so far away  (10 x 10.5 memorial sign or seat saver with small easel)\",\"Here comes the Bride ring bearer carrier  (10.25 x 17.25 with cord)\",\"Better & Together Chair Hangers (with cord 10.25 x 17.25) (2pc)\",\"Please Sign our Guestbook (self standing 7.25 x 16)\",\"Just Married & Thank You (reversible photo-shoot prop 7.25 x 31)\",\"Take One (7.25 x 7.25)\",\"Programs (7.25 x 16)\",\"Enjoy the Moment, no photography please 10.5 in. x 17 in. with small easel\",\"8 Reserved signs (3.5 in. x 12 in.  4 with cord hanger option) (8pc)\",\"Antique Leather and Wooden Trunk with Cards Banner\",\"1 Corinthians 13 signs ($99 additional)\",\"Vintage Typewriter with Message to Guests ($99 additional)\"]', 'new'),
('2023-09-07_1048337_0_Walker', 'madisonWalker@gmail.com', 1694044800, '2023-09-07', 'layeredarch', 'Layered Arch', 'Full Set', 1048337, '[\"Customized welcome sign (choice of trellis half arch or smooth half arch insert up to 25 words text)\",\"3 piece seating chart half arch set (print service for cards is available for a small additional fee)\",\"Table numbers 1-30\",\"Gold Card option04 with choice of Gifts & Cards sign\",\"5 Reserved signs\",\"Up to 2 Double Half Arch Small signs (Gifts & Cards, Take One, Dont Mind if I Do, In Loving Memory)\",\"Up to 2 Sunset Small signs (Please Sign Our Guestbook, Gifts & Cards, In Loving Memory)\",\"1 Double Half Arch Medium sign (Cheers, The Bar, Guestbook, or Custom Acrylic Text)\",\"1 Double Full Arch Medium sign (Signature Drinks, or Custom Acrylic Text)\",\"Unplugged Ceremony sign\",\"Hairpin Record Player Prop\",\"%22Mr & Mrs%22 Custom Head Table Keepsake is a free gift in addition to the items above\"]', 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`);
COMMIT;