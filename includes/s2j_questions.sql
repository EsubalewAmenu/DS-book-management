-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2022 at 02:20 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datascienceplcco_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `s2j_questions`
--

CREATE TABLE `s2j_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `grade_question_id` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `c` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans` enum('A','B','C','D','E','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s2j_questions`
--

INSERT INTO `s2j_questions` (`id`, `company_id`, `grade_question_id`, `chapter`, `question`, `a`, `b`, `c`, `d`, `e`, `f`, `ans`, `descr`, `enabled`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Which of the following is the mode of genome replication in AIDS virus?', 'DNA→DNA', 'RNA→DNA', 'DNA→RNA', 'RNA→DNA→RNA', NULL, NULL, 'D', NULL, 1, NULL, NULL, NULL),
(2, 1, 1, 1, 'Select the alternative that contains only vector borne infections', 'Malaria , Trachoma, Syphilis, Tapeworm', 'Malaria, Leishmaaniasis, Trypanosomiasis, Typhus', 'Diphtheria, Tuberculosis, Cholera, Meningitis', 'Leprosy, ring worm, Pneumonia, hook worm', NULL, NULL, 'B', NULL, 1, NULL, NULL, NULL),
(3, 1, 1, 1, 'Which of the following groups probably ate more of herbivorous diet?', 'Homo erectus', ' Homo Habilis', 'Cro- magnon humans ', 'Australopithecus afarensis', NULL, NULL, 'D', NULL, 1, NULL, NULL, NULL),
(4, 1, 1, 1, 'Which of the following disease of animal would be controlled if one is able to control tse tse\r\nfly?', 'Hart water', 'Rinder pest', 'Trypanosomiasis', 'Black leg\r\n', NULL, NULL, 'C', NULL, 1, NULL, NULL, NULL),
(5, 1, 1, 1, 'In Ethiopia, which of the following genera of microorganisms has the potential to be used for\r\nsingle cell protein production?', 'Spirulina', 'Bacillus', 'Rhizobium', 'Agrobacterium', NULL, NULL, 'A', NULL, 1, NULL, NULL, NULL),
(6, 1, 1, 1, 'Choose the one in which the disease and its categorical names are mismatched?', 'Senile dementia – deficiency disease', 'Pellagra – deficiency disease', 'typhus – vector borne disease', 'Parkinson’s disease – degenerative disease', NULL, NULL, 'A', NULL, 1, NULL, NULL, NULL),
(7, 1, 1, 1, 'In which Ethiopian traditional food preparation is the action microorganisms least evident?', 'Injera making', 'kocho making', 'Kinche making', 'Irgo ( yoghurt ) making', NULL, NULL, 'C', NULL, 1, '2021-10-02 08:37:23', NULL, NULL),
(8, 1, 1, 1, 'Which of the following characteristics of life is not possessed by virus?', 'Mutation', 'Nucleic acid', 'Respiration', 'Reproduction', NULL, NULL, 'C', NULL, 1, '2021-10-02 08:37:23', NULL, NULL),
(9, 1, 1, 1, 'If culture of green is exposed to light of different colors one at a time, which colors generate\r\nmore oxygen?', 'Blue and red light', 'Green and yellow light', 'Orange and yellow light', 'ultraviolet and infrared light', NULL, NULL, 'A', NULL, 1, '2021-10-02 08:40:05', NULL, NULL),
(10, 1, 1, 1, 'The bird flu is currently threatening the global poultry industry. What is the causative agent\r\nof this disease?', 'Bacteria', 'Fungi', 'Virus', 'Worm', NULL, NULL, 'C', NULL, 1, '2021-10-02 08:40:05', NULL, NULL),
(11, 1, 1, 1, 'Which of the following is the causative agent of AIDS?', 'Fungus', 'Bacterium', 'Virus', 'protozoa', NULL, NULL, 'C', NULL, 1, '2021-10-02 08:42:57', NULL, NULL),
(12, 1, 1, 1, 'Which of the following can be one reason for the difficulty to produce a vaccine again HIV /\r\nAIDS?', 'The small size of the virus', 'The high variability of the virus', 'Its possession of RNA instead of DNA', 'The presence of protective envelope derived from the host cell', NULL, NULL, 'B', NULL, 1, '2021-10-02 08:42:57', NULL, NULL),
(13, 1, 1, 1, 'If all dogs in your community are vaccinated, which of the following diseases will be put\r\nunder control in your community?', 'Meningitis', 'rabies', 'Leshmaniasis', 'Syphilis', NULL, NULL, 'B', NULL, 1, '2021-10-02 08:49:32', NULL, NULL),
(14, 1, 1, 1, 'Which of the following is mechanism by which bacteriophages transfer genes from one\r\nbacterium to another?', 'Binary fission', 'conjugation', 'Transduction', 'transformation', NULL, NULL, 'C', NULL, 1, '2021-10-02 08:49:32', NULL, NULL),
(15, 1, 1, 1, 'If HIV patients take a drug that inhibits the function of the viral reverse transcriptase enzyme\r\nwhich of the following processes would be primarily affected?', 'Entry of the virus into the patient’s body', 'Copying of DNA into RNA', 'Copying of RNA into DNA', 'Protein synthesis', NULL, NULL, 'C', NULL, 1, '2021-10-02 08:51:35', NULL, NULL),
(16, 1, 1, 1, 'Anti HIV/AIDS clubs are today common in schools and colleges, what is the main\r\ncontribution in the fight against the pandemic?', 'Provide medication for AIDS patients', 'Encourage the girls to have the boy friends', 'Encourage the boys to have girlfriends', 'Raise awareness about the problem among students', NULL, NULL, 'D', NULL, 1, '2021-10-02 08:53:05', NULL, NULL),
(17, 1, 1, 1, 'Some countries demand foreign travelers to produce HIV/AIDS free certificate before letting\r\nthem enter the country What do we call this type of disease control mechanism?', 'Legislative', 'Physical', 'Cultural', 'Biological', NULL, NULL, 'A', NULL, 1, '2021-10-02 08:54:34', NULL, NULL),
(18, 1, 1, 1, 'Which of the following statement is correct about HIV?', 'It is bacteriophage', 'It is retrovirus', 'It is a DNA virus', 'It infects pants and animals\r\nalike', NULL, NULL, 'B', NULL, 1, '2021-10-02 08:56:43', NULL, NULL),
(19, 1, 1, 1, 'Select the kingdom of life in which cellular organelles are without membrane around them?', 'Plantae', 'Protista', 'Monera', 'Fungi', NULL, NULL, 'C', NULL, 1, '2021-10-02 11:51:09', NULL, NULL),
(20, 1, 1, 1, 'Identify from the following a biological control method of malaria?', 'Use of fishes to feed on mosquito larvae', 'Use of DDT spraying to kill mosquitoes', 'Using crop rotation system in farm', 'Hand picking and physical removal of weeds and affected plants', NULL, NULL, 'A', NULL, 1, '2021-10-02 11:51:09', NULL, NULL),
(21, 1, 1, 1, 'Which of the following is true about meanings contained in the in the name HIV and AIDs?', 'HIV refers to symptoms that characterize the condition', 'AIDS refers to the causative agent', 'AIDS refers to the symptoms', 'HIV refers to the probable origin from the chimpanzee', NULL, NULL, 'C', NULL, 1, '2021-10-02 12:00:50', NULL, NULL),
(22, 1, 1, 1, 'Identify the disease that is not correctly paired with the substance whose deficiency causes\r\nthe disease?', 'Berbei – nicotinic acid', 'Scurvy – vitamin C', 'Night blindness – Vitamin A', 'Rickets –\r\nvitamin D', NULL, NULL, 'A', NULL, 1, '2021-10-02 12:00:50', NULL, NULL),
(23, 1, 1, 1, 'Of the following, which cell type is attacked by HIV?', 'Red blood cells', 'Sperm cells', 'Egg cells', 'T helper cells', NULL, NULL, 'D', NULL, 1, '2021-10-02 12:14:07', NULL, NULL),
(24, 1, 1, 1, 'If one regularly includes orange in his daily diet, which deficiency disease would be avoided?', 'Night blindness', 'Pellagra', 'Beiberi', 'scurvy', NULL, NULL, 'D', NULL, 1, '2021-10-02 12:14:07', NULL, NULL),
(25, 1, 1, 1, 'What are the causes of infectious disease?', 'The parental genes', 'Microorganisms', 'Carcinogenic substances', 'Bad life style', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:06:24', NULL, NULL),
(26, 1, 1, 1, 'Among the following human diseases, identify the one that is transmitted through a vector?', 'Leprosy', 'Chancroid', 'Gonorrhea', 'Leishmaniasis', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:06:24', NULL, NULL),
(28, 1, 1, 1, 'A number of virus including HIV, have more than one strain. This show the viruses are;', 'Capable of living outside their host cell', 'Capable of mutation', 'capable of reproduction', 'Obligate parasites', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:14:32', NULL, NULL),
(29, 1, 1, 1, 'Which is not true of prokaryotes? They', 'Are living cells', 'Lack true nucleus', 'All are parasites', 'Are either Archaebacteria or eubacteria', NULL, NULL, 'C', NULL, 1, '2021-10-02 15:14:32', NULL, NULL),
(30, 1, 1, 1, 'Which of the following are rod shaped bacteria?', 'Cocci', 'Spirochetes', 'Spirilla', 'Bacilli', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:18:04', NULL, NULL),
(31, 1, 1, 1, 'The cells of which group of microorganisms can be described as prokaryotic?', 'Virus', 'Protozoa', 'Algae', 'Bacteria', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:18:04', NULL, NULL),
(32, 1, 1, 1, 'What are bacteriophages?', 'Bacteria', 'Virus', 'protozoa', 'fungi', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:22:39', NULL, NULL),
(33, 1, 1, 1, 'Which of the following is major killer of AIDS patients?', 'Pneumonia', 'anemia', 'opportunistic infection', 'Mal nutrition', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:22:39', NULL, NULL),
(34, 1, 1, 1, 'Among the following infectious human diseases, identify the one that is caused by a virus?', 'Yellow fever', 'Pneumonia', 'cholera', 'Typhoid fever', NULL, NULL, 'A', NULL, 1, '2021-10-02 15:28:51', NULL, NULL),
(35, 1, 1, 1, 'Which of the following statement is true about bacteria?', 'Bacteria found in human body are all parasitic', 'all bacteria are harmful because they spoil food', 'all bacteria cause disease to humans, plants, and animals in some ways', 'some bacteria living in human body make vitamins needed by the body', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:28:51', NULL, NULL),
(36, 1, 1, 1, 'Which one of the following is mode of reproduction in bacteria?', 'Mitosis', 'Binary fission', 'Conjugation', 'Lysogenization', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:32:00', NULL, NULL),
(37, 1, 1, 1, 'If AIDS patient given antiretroviral drugs are targeted against the protease enzyme, which\r\none of the following stages of the HIV life cycle would be inhibited', 'Entry into the host cell', 'Reverse transcription', 'Integration of viral DNA into host DNA', 'Assembly of viral parts into a whole virus', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:32:00', NULL, NULL),
(38, 1, 1, 1, 'Which of the following I true about those bacteria which dwell in hot spring?', 'they are not metabolically active', 'they use non protein enzymes', 'they get energy of activation from the spring heat', 'their enzymes do not denature at the temperature', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:35:27', NULL, NULL),
(39, 1, 1, 1, 'Choose the disease that is caused by what is known as the droplet infection?', 'Flu', 'AIDS', 'Cholera', 'Malaria', NULL, NULL, 'A', NULL, 1, '2021-10-02 15:35:27', NULL, NULL),
(40, 1, 1, 1, 'Which of the following is the best collective name for all bacteria with spherical shape?', 'Cocci', 'Bacilli', 'Spirochaetes', 'Streptococci', NULL, NULL, 'A', NULL, 1, '2021-10-02 15:39:30', NULL, NULL),
(41, 1, 1, 1, 'In which part of the cell do gram positive and gram negative bacteria differ regarding their\r\nstaining property with gram stains?', 'Cytoplasm', 'Cell membrane', 'Cell wall', 'Nucleus', NULL, NULL, 'C', NULL, 1, '2021-10-02 15:39:30', NULL, NULL),
(42, 1, 1, 1, 'To which of the following does HIV belong?', 'Plasmid', 'Retroviruses', 'DNA virus', 'Bacteriophage', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:42:26', NULL, NULL),
(43, 1, 1, 1, 'What are the individual strands of fungal mycelium called?', 'Fungus', 'Spores', 'Hyphae', 'Hydra', NULL, NULL, 'C', NULL, 1, '2021-10-02 15:42:26', NULL, NULL),
(44, 1, 1, 1, 'What is the mode of transmission of diseases such as cholera and typhoid fever?', 'Sexual intercourse', 'Bites of animal vectors', 'Blood to blood contact', 'Drinking contaminated water', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:45:08', NULL, NULL),
(45, 1, 1, 1, 'Viruses are better characterized as:', 'Decomposer', 'Producers', 'Carnivores', 'parasites', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:45:08', NULL, NULL),
(46, 1, 1, 1, 'Which of the following is true about the antiretroviral drugs currently used to treat AIDS\r\npatient?', 'they cure AIDS', 'They stop HIV transmission', 'They serve as anti HIV vaccine', 'They slow down HIV multiplication', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:47:44', NULL, NULL),
(47, 1, 1, 1, 'What are the most frequent causative agents of food poisoning?', 'Bacteria', 'Protozoa', 'viruses', 'Worms', NULL, NULL, 'A', NULL, 1, '2021-10-02 15:47:44', NULL, NULL),
(48, 1, 1, 1, 'Which of the following practice does not normally transmit HIV?', 'Sexual intercourse through anus', 'Sharing injection needles', 'blood transfusion', 'shaking hands', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:50:49', NULL, NULL),
(49, 1, 1, 1, 'Which of the following human diseases can be prevented by taking proper diet?', 'Degenerative disease', 'genetic disease', 'Social disease', 'deficiency disease', NULL, NULL, 'D', NULL, 1, '2021-10-02 15:50:49', NULL, NULL),
(50, 1, 1, 1, 'To which of the following groups do those bacteriophages that integrate their DNA into the\r\nchromosomes of their bacterial host belong?', 'Virulent viruses', 'Lytic viruses', 'Lysogenic viruses', 'non-parasitic viruses', NULL, NULL, 'C', NULL, 1, '2021-10-02 15:53:47', NULL, NULL),
(51, 1, 1, 1, 'Which groups of microorganisms causes disease known as athlete’s foot?', 'Bacteria', 'fungi', 'protozoa', 'Viruses', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:53:47', NULL, NULL),
(52, 1, 1, 1, 'Choose the one which is different from the others?', 'Genetically modified organisms', 'Genetically engineered organisms', 'Pathogenic organisms', 'transgenic organisms', NULL, NULL, 'C', NULL, 1, '2021-10-02 15:58:53', NULL, NULL),
(53, 1, 1, 1, 'What is the advantage of using HAART for treatment of HIV?', 'It gives lasting immunity to HIV', 'It prevents mutation of HIV', 'It prevents re infection by HIV', 'It helps to break the life cycle of HI', NULL, NULL, 'B', NULL, 1, '2021-10-02 15:58:53', NULL, NULL),
(54, 1, 1, 1, 'On which one of the following principles is most of anti HIV drugs currently in use working?\r\n', 'Inhibition of enzyme action', 'Degradation of viral RNA', 'digesting of viral particles', 'phagocytosis of the virus', NULL, NULL, 'D', NULL, 1, '2021-10-02 16:02:03', NULL, NULL),
(55, 1, 1, 1, 'If a new anti HIV drug is to be developed to prevent the virus from entering the host cell,\r\nwhich one of the following processes should the drug target?', 'Reverse transcription', 'Bonding Gp 120 and CD4', 'Integration of viral DNA in to host DNA', 'Assembly of viral parts in to whole virus', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:02:03', NULL, NULL),
(56, 1, 1, 1, 'Which of the following groups of bacteria consists of rod shaped?', 'Gram positive', 'Bacilli', 'Cocci', 'Spirilla', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:17:43', NULL, NULL),
(57, 1, 1, 1, 'Which of the following is true about protozoa?', 'they are group of bacteria', 'they are one celled plants', 'they represent both plants and animals', 'They are unicellular animals', NULL, NULL, 'D', NULL, 1, '2021-10-02 16:17:43', NULL, NULL),
(58, 1, 1, 1, 'Which of the following do viruses share with the cell?', 'Cell wall', 'Cytoplasm', 'Nucleic acid', 'Protoplasm', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:21:08', NULL, NULL),
(59, 1, 1, 1, 'Choose the characteristics that viruses share with living things?', 'they are made up of many specialized cells', 'They contain genetic materials', 'they reproduce by mitosis', 'They contain chlorophyll', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:21:08', NULL, NULL),
(60, 1, 1, 1, 'Which stage in the life cycle of HIV inhibited by the anti-retro viral drug known as integrase\r\ninhibitor?', 'Conversion of viral RNA to DNA', 'Replication of the viral genome', 'Insertion of the viral genome into host genome', 'Release of viral progeny from the c', NULL, NULL, 'A', NULL, 1, '2021-10-02 16:24:42', NULL, NULL),
(61, 1, 1, 1, 'What is the difference between HIV and AIDS?', 'AIDS is the virus and HIV is the disease', 'Both AIDS and HIV refers to the disease', 'AIDS is the disease and HIV is the virus', 'Both AIDS and HIV refers to the virus', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:24:42', NULL, NULL),
(62, 1, 1, 1, 'What does the absence of chloroplast in unicellular organisms indicate?', 'Reproduction by sexual; means', 'Autotrophic nutrition', 'Heterotrophic nutrition', 'Complete lack of metabolic processes', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:28:09', NULL, NULL),
(63, 1, 1, 1, 'What the color do gram positive bacteria stain with gram stains?', 'Red', 'pink', 'purple', 'white', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:28:09', NULL, NULL),
(64, 1, 1, 1, 'Among the following organisms which one belongs to the prokaryotes?', 'Paramecium', 'Streptococcus', 'Spirogyra', 'tapeworm', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:30:50', NULL, NULL),
(65, 1, 1, 1, 'What is the process called when two bacteria directly contact cell to cell and exchange their\r\ngenetic information?', 'Conjugation', 'transformation', 'Co transformation', 'transduction', NULL, NULL, 'A', NULL, 1, '2021-10-02 16:30:50', NULL, NULL),
(66, 1, 1, 1, 'Which of the following features makes humans T- lymphocyte cells more vulnerable to HIV\r\nattack? Presence of', 'Cell membrane', 'DNA on chromosomes', 'CD4 on the membrane surface', 'DNA on the chromosome', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:34:01', NULL, NULL),
(67, 1, 1, 1, 'In which of the following ways retro virus differ from the other RNA viruses?', 'Their genetic material is DNA', 'Their genetic material is RNA', 'They copy RNA to DNA molecule', 'They copy RNA from DNA molecule', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:34:01', NULL, NULL),
(68, 1, 1, 1, 'Which of the following groups of microorganisms does not contain parasitic members?', 'Bacteria', 'Algae', 'Fungi', 'Protozoa', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:36:42', NULL, NULL),
(69, 1, 1, 1, 'Which one of the following is the smallest of all?', 'red blood cells', 'Viruses', 'Bacteria', 'Protozoa', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:36:42', NULL, NULL),
(70, 1, 1, 1, 'Which of the following is the routine method used by clinics to test people for HIV infection?', 'Microscopic examination for the virus', 'counting the number of white blood cells', 'testing for human anti HIV antibody', 'measuring the amount of antibody', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:41:09', NULL, NULL),
(71, 1, 1, 1, 'The T- lymphocyte cells of AIDS patients are destroyed by', 'Multiplication of HIV inside the cell', 'Infection of opportunistic\r\norganisms', 'The immune system of the host organisms itself', 'The CD4 receptors on the cell\r\nsurface', NULL, NULL, 'A', NULL, 1, '2021-10-02 16:41:09', NULL, NULL),
(72, 1, 1, 1, 'Which stage of the lifecycle of HIV is disrupted if AIDS patients are with drug that has a\r\nprotease inhibiting activity?', 'Entry of the virus into the host', 'Conversion of viral RNA to DNA', 'Integration of viral DNA into host DNA', 'Assembly of viral parts into whole virus', NULL, NULL, 'A', NULL, 1, '2021-10-02 16:44:19', NULL, NULL),
(73, 1, 1, 1, 'One of the following is true about bacteriophages that have lysogenic life cycle?', 'They are RNA viruses', 'They integrate their nucleic acid in to that of the host', 'They multiply in the host immediately after infection', 'Pathogen viruses are release by chronic release method', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:44:19', NULL, NULL),
(74, 1, 1, 1, 'Which of the following type if cancer is known to mostly develop in AIDS patient?', 'Cervical canc', 'Stomach cancer', 'Kaposi’s sarcoma', 'Breast cancer', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:49:01', NULL, NULL),
(75, 1, 1, 1, 'In which of the following living organisms do the cells lack organized nuclei?', 'Fungi', 'protozoa', 'Bacteria', 'Algae', NULL, NULL, 'C', NULL, 1, '2021-10-02 16:49:01', NULL, NULL),
(76, 1, 1, 1, 'Which of the following is major mechanism by which AIDS is transmitted?', 'Mother to fetal transmission', 'Heterosexual intercourse', 'Homosexual intercourse', 'Contaminated Blood transfusion', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:53:48', NULL, NULL),
(77, 1, 1, 1, 'Which of the following disease is correctly matched with its causative agent?', 'Malaria- fungus', 'AIDS- virus', 'ring worm- Protozoa', 'Syphilis- Worms', NULL, NULL, 'B', NULL, 1, '2021-10-02 16:53:48', NULL, NULL),
(78, 1, 1, 1, 'Which step in HIV life cycle is disrupted by antiretroviral drug that competitively inhibits\r\ntranscriptase enzyme?', 'Entry into te3 host cell', 'assembly of viral parts into a virus', 'Formation of DNA from RNA', 'Integration of viral DNA into host DNA', NULL, NULL, 'D', NULL, 1, '2021-10-02 16:57:52', NULL, NULL),
(79, 1, 1, 1, 'In what way would AIDS patient benefits from treatment with antiretroviral drugs?', 'reduction of HIV replication', 'Provision of cure for AIDS', 'Immunizing against HIV', 'killing of opportunistic infectious agent', NULL, NULL, 'A', NULL, 1, '2021-10-02 16:57:52', NULL, NULL),
(80, 1, 1, 1, 'Which of the following is the best collective name for all bacteria with spherical shape?', 'Spirochaetes', 'Baacilli', 'Cocci', 'Streptococci', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:04:44', NULL, NULL),
(81, 1, 1, 1, 'Which of the following disease is transmitted by mosquito?', 'Diabetes mellitus', 'Kaposis cancer', 'Rabies', 'Malaria', NULL, NULL, 'D', NULL, 1, '2021-10-02 17:04:44', NULL, NULL),
(82, 1, 1, 1, 'Which of the following microorganisms are prokaryotic?', 'Bacteria', 'protozoa', 'yeast', 'Algae', NULL, NULL, 'A', NULL, 1, '2021-10-02 17:07:24', NULL, NULL),
(83, 1, 1, 1, 'Form which of the following diseases can one be protected by sleeping under the cover of\r\nmosquito net?', 'Sleeping sickness', 'AIDS', 'Malaria', 'Athlete’s foot', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:07:24', NULL, NULL),
(84, 1, 1, 1, 'Which of the following has the highest risk of HIV transmission?', 'Hand shaking', 'Needle sharing', 'Towel sharing', 'Toilet sharing', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:10:41', NULL, NULL),
(85, 1, 1, 1, 'Which of the following occurs during dark reaction of photosynthesis?', 'Water is split', 'Energy capturing reaction', 'NADPH is synthesized', 'ATP is used up', NULL, NULL, 'D', NULL, 1, '2021-10-02 17:10:41', NULL, NULL),
(86, 1, 1, 1, 'Which of the following human cell type is attacked by HIV?', 'Red blood cells', 'White blood cells', 'T- lymphocytes', 'Leukocytes', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:14:08', NULL, NULL),
(87, 1, 1, 1, 'Among the following which one best describes the cells of bacteria?', 'Eukaryotic', 'Prokaryotic', 'both eukaryotic and prokaryotic', 'Neither prokaryote nor\r\neukaryote', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:14:08', NULL, NULL),
(88, 1, 1, 1, 'Which of the following groups of viruses copy their RNA to DNA?', 'Bacteriophages', 'DNA viruses', 'RNA viruses', 'retroviruses', NULL, NULL, 'D', NULL, 1, '2021-10-02 17:17:39', NULL, NULL),
(89, 1, 1, 1, 'What is the name of a major group of eukaryotic organisms that obtain their nutrition using\r\nextracellular digestion?', 'Viruses', 'Bacteria', 'fungi', 'Algae', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:17:39', NULL, NULL),
(90, 1, 1, 1, 'In what main ways do retroviruses such as HIV differ from other type of RNA viruses?', 'They require a host cell to reproduce', 'They reversely copy RNA to DNA', 'Their genes are resistance to mutation', 'They are free living viruses', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:20:24', NULL, NULL),
(91, 1, 1, 1, 'Which of the following is taken as a signal for the final stage of HIV infection?', 'Signs of a disease kaposi’s sarcoma', 'outbreak of some genetic disease', 'Uninfected T- helper cells present', 'No infection by other parasitic diseases', NULL, NULL, 'A', NULL, 1, '2021-10-02 17:20:24', NULL, NULL),
(92, 1, 1, 1, 'In which organ of human body are more bacteria found?', 'Lungs', 'Stomach', 'Small intestine', 'large intestine', NULL, NULL, 'D', NULL, 1, '2021-10-02 17:23:31', NULL, NULL),
(93, 1, 1, 1, 'From which groups of microorganisms the first antibiotics produced?', 'Gram negative', 'gram positive', 'Fungal organisms', 'Viral organisms', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:23:31', NULL, NULL),
(94, 1, 1, 1, 'The best way to control HIV/AIDS is', 'Adequate distribution of condoms', 'Adequate distribution of antiviral', 'breaking the transmission pathway', 'Awareness creation', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:26:50', NULL, NULL),
(95, 1, 1, 1, 'Which of the following is essential in order for a virus replication?', 'The capsid must enter the host cell cytoplasm', 'The host cell must be undergoing mitosis', 'The host cell must lack cell membrane', 'The host cell must lack cell membrane', NULL, NULL, 'A', NULL, 1, '2021-10-02 17:26:50', NULL, NULL),
(96, 1, 1, 1, 'Retroviruses are able to reverse transcribe RNA to DNA in order to', 'command the host cell in the production of genomes similar to that of the host', 'Control the formation of viral protein and RNA that can be assembled in to new viruses\r\npractices', 'Replicate without any interruption', 'Control the formation of viral protein and DNA that can be assembled into new viral practice', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:30:30', NULL, NULL),
(97, 1, 1, 1, 'In which of the following groups of organisms are all the members of unicellular?', 'Algae', 'bacteria', 'Fungi', 'Virus', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:30:30', NULL, NULL),
(98, 1, 1, 1, 'Which clinical test is routinely performed to diagnose patient for AIDS?', 'Culturing opportunistic infectious agent', 'Serological test for anti HIV antibody', 'culturing the virus on a special media', 'Determining hemoglobin amount', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:33:46', NULL, NULL),
(99, 1, 1, 1, 'Which one of the following human disease is not correctly matched with its mode of\r\ntransmission?', 'Malaria – vector', 'Cholera – contaminated water', 'Sleeping sickness – physical contact', 'Influenza – droplet infection', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:33:46', NULL, NULL),
(100, 1, 1, 1, 'In what way does an antiretroviral drug help AIDS patient? It', 'provides immunity', 'Stops the multiplication of HIV', 'Stimulates the multiplication of T- helper cells', 'Kills opportunistic infectious agent', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:36:40', NULL, NULL),
(101, 1, 1, 1, 'What is capsid?', 'The RNA of a virus', 'The DNA of a virus', 'The protein shell of a virus', 'The genetic material of a virus', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:36:40', NULL, NULL),
(102, 1, 1, 1, 'From which group of microorganisms was the first antibiotic produced?', 'Members of the fungi', 'Members of the virus', 'Gram negative bacteria', 'Gram positive bacteria', NULL, NULL, 'A', NULL, 1, '2021-10-02 17:40:27', NULL, NULL),
(103, 1, 1, 1, 'What is the main method of transmission of botulism?', 'Direct contact', 'Eating contaminated food', 'Droplet infection', 'Drinking contaminated water', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:40:27', NULL, NULL),
(104, 1, 1, 1, 'Transfer of gene or genes through virus is called', 'transformation', 'conjugation', 'Genetic engineering', 'transduction', NULL, NULL, 'D', NULL, 1, '2021-10-02 17:43:14', NULL, NULL),
(105, 1, 1, 1, 'When reverse transcriptase a useful enzyme? When', 'Nutrients are scarce', 'There are no host cells present', 'RNA virus converts its RNA to DNA', NULL, NULL, NULL, 'C', NULL, 1, '2021-10-02 17:43:14', NULL, NULL),
(106, 1, 1, 1, 'Spikes are forming in the new virus\r\nIn what ways does retro virus differ from other RNA viruses?', 'Their genetic material is RNA', 'They copy RNA to DNA', 'They are parasitic', 'They are smaller in size', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:46:42', NULL, NULL),
(107, 1, 1, 1, 'Which of the following is the correct statement about the difference between bacterium\r\nand virus?', 'DNA is present in the former, but absent in the later', 'Protein is absent in the former, but present in the later', 'The former is cellular, but the latter is acellular', 'The former causes malaria, but the later causes cholera', NULL, NULL, 'C', NULL, 1, '2021-10-02 17:46:42', NULL, NULL),
(108, 1, 1, 1, 'Which of the following statement is not correct?', 'HIV – positive people are forced by law to disclose their HIV status', 'Employers may not dismiss an employee because of his /her HIV status', 'There is no medication that can reduce your chance of contracting HIV', 'Mothers can give their babies by means of breast feeding', NULL, NULL, 'A', NULL, 1, '2021-10-02 17:49:54', NULL, NULL),
(109, 1, 1, 1, 'Which one of the following happens during integration of viruses into host cells?', 'The viral DNA is inserted into the host DNA', 'The viral DNA inters the host cell', 'The virus attaches to the hoist cell receptor', 'The virus takes over the host cells machinery', NULL, NULL, 'B', NULL, 1, '2021-10-02 17:49:54', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s2j_questions`
--
ALTER TABLE `s2j_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_company_id_index` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s2j_questions`
--
ALTER TABLE `s2j_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
