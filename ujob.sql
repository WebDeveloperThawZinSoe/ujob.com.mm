-- MySQL dump 10.13  Distrib 5.7.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ujob
-- ------------------------------------------------------
-- Server version	5.7.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
INSERT INTO `advertisements` VALUES (2,'ADS Home Header','311711841111.png','https://www.youtube.com/watch?v=PBcMhw3Y8UA&list=RDMMdlWY07IZvQ4&index=10','home page header','2024-03-31','2024-04-06','2024-03-30 16:55:11','2024-03-30 16:55:11'),(3,'Home Page Bottom','9701711841140.png','https://www.youtube.com/watch?v=PBcMhw3Y8UA&list=RDMMdlWY07IZvQ4&index=10','home page bottom','2024-03-31','2024-04-06','2024-03-30 16:55:40','2024-03-30 16:55:40'),(4,'ADS Footer','9771711842446.png','https://www.youtube.com/watch?v=PBcMhw3Y8UA&list=RDMMdlWY07IZvQ4&index=10','footer','2024-03-31','2024-04-06','2024-03-30 17:17:26','2024-03-30 17:17:26');
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Elevate Your Career with Our Job Portal: A Comprehensive Guide','5811716753217.jpg','<p>In today&#39;s fast-paced world, job seekers need a reliable platform to find the best opportunities. Our job portal is designed to connect you with top employers, offering a seamless job search experience.</p>\r\n\r\n<p>Features of Our Job Portal<br />\r\n<strong>1. User-Friendly Interface:</strong><br />\r\nOur intuitive design makes navigating job listings easy. Whether you&#39;re tech-savvy or a novice, you&rsquo;ll find the process straightforward.</p>\r\n\r\n<p><strong>2. Advanced Search Filters:</strong><br />\r\nCustomize your job search with filters such as location, industry, experience level, and salary range to find the most relevant opportunities.</p>\r\n\r\n<p><strong>3. Resume Builder and Templates:</strong><br />\r\nCreate a standout resume with our built-in tools. Choose from a variety of templates and formats that appeal to potential employers.</p>\r\n\r\n<p><strong>4. Job Alerts:</strong><br />\r\nSet up personalized job alerts to get notified about new opportunities that match your criteria, ensuring you never miss out on a potential job.</p>\r\n\r\n<p><strong>5. Company Reviews and Ratings:</strong><br />\r\nGain insights into prospective employers through reviews and ratings from current and former employees. This helps you make informed decisions about where to apply.</p>\r\n\r\n<p><strong>6. Career Resources:</strong><br />\r\nAccess a wealth of resources including blog articles, career advice, interview tips, and webinars to boost your job search strategy and professional development.</p>\r\n\r\n<p><strong>7. Networking Opportunities:</strong><br />\r\nConnect with industry professionals, attend virtual job fairs, and join groups related to your field to expand your network.</p>\r\n\r\n<p>Tips for Job Seekers<br />\r\n<strong>1. Optimize Your Profile:</strong><br />\r\nEnsure your profile is complete with a professional photo, detailed work history, and relevant skills. A polished profile attracts more recruiters.</p>\r\n\r\n<p><strong>2. Tailor Your Applications:</strong><br />\r\nCustomize your resume and cover letter for each job application. Highlight your relevant experience and how it aligns with the job requirements.</p>\r\n\r\n<p><strong>3. Leverage Keywords:</strong><br />\r\nUse industry-specific keywords in your resume and profile to improve visibility in search results.</p>\r\n\r\n<p><strong>4. Prepare for Interviews:</strong><br />\r\nPractice common interview questions, research the company, and be ready to discuss how your skills and experiences make you a perfect fit.</p>\r\n\r\n<p><strong>5. Follow Up:</strong><br />\r\nAfter an interview, send a thank-you email to express your appreciation for the opportunity and reiterate your interest in the position.</p>\r\n\r\n<p>Why Choose Our Job Portal?<br />\r\n<strong>1. Wide Range of Opportunities:</strong><br />\r\nWe partner with leading companies across various industries, providing a vast selection of job listings.</p>\r\n\r\n<p><strong>2. Verified Employers:</strong><br />\r\nAll employers on our platform are thoroughly vetted to ensure legitimacy and quality job postings.</p>\r\n\r\n<p><strong>3. Continuous Support:</strong><br />\r\nOur customer support team is available to assist you with any questions or issues you might encounter.</p>\r\n\r\n<p><strong>4. Security:</strong><br />\r\nWe prioritize your data privacy and employ advanced security measures to protect your personal information.</p>\r\n\r\n<p>Embark on your job search journey with confidence. Explore our job portal today and take the next step in your career!</p>','2024-05-26 13:23:37','2024-05-26 13:23:37'),(2,'Unlock Your Dream Career with Our Job Portal','3731716753313.jpg','<p>In the competitive job market, finding the right opportunity can be challenging. Our job portal simplifies this process, offering an extensive range of features to enhance your job search and connect you with top employers.</p>\r\n\r\n<p><strong>Key Features</strong><br />\r\n1. Seamless Navigation: Our user-friendly interface ensures a smooth browsing experience for all users.</p>\r\n\r\n<p>2. Tailored Job Search: Utilize advanced filters to find jobs that match your preferences, such as location, industry, and salary.</p>\r\n\r\n<p>3. Professional Tools: Create standout resumes with our builder and templates, and receive personalized job alerts.</p>\r\n\r\n<p>4. Employer Insights: Access company reviews and ratings to make informed decisions.</p>\r\n\r\n<p>5. Career Development: Explore resources like career advice, interview tips, and networking opportunities to boost your professional growth.</p>\r\n\r\n<p><strong>Tips for Success</strong><br />\r\n1. Profile Optimization: Complete your profile with a professional photo and detailed work history to attract recruiters.</p>\r\n\r\n<p>2. Customized Applications: Tailor your resume and cover letter for each job to highlight relevant skills and experience.</p>\r\n\r\n<p>3. Keyword Strategy: Use industry-specific keywords to enhance your profile&rsquo;s visibility.</p>\r\n\r\n<p>4. Interview Preparation: Research companies and practice common questions to ace your interviews.</p>\r\n\r\n<p>5. Follow-Up: Send thank-you emails post-interview to show appreciation and reaffirm your interest.</p>\r\n\r\n<p><strong>Why Choose Us?</strong><br />\r\n1. Extensive Job Listings: Partnering with leading companies, we offer a wide array of job opportunities.</p>\r\n\r\n<p>2. Verified Employers: We ensure all job postings are from legitimate and vetted employers.</p>\r\n\r\n<p>3. Dedicated Support: Our customer support team is always ready to assist you.</p>\r\n\r\n<p>4. Data Security: We prioritize your privacy and employ robust security measures.</p>\r\n\r\n<p>Start your journey towards your dream job with us. Explore our job portal today and take the next step in your career!</p>','2024-05-26 13:25:13','2024-05-26 13:25:13'),(3,'Your Gateway to Career Success: Discover Our Job Portal','4541716753422.jpg','<p>Navigating the job market can be overwhelming, but our job portal is here to streamline your search and connect you with premier employers. Here&rsquo;s how we make it easy for you to find your next career move.</p>\r\n\r\n<p>Standout Features</p>\r\n\r\n<p><strong>1. Intuitive Design:</strong> Easily navigate through job listings with our user-friendly interface. <strong>2. Advanced Search:</strong> Filter by location, industry, and salary to find the perfect match. <strong>3. Resume Builder:</strong> Craft professional resumes using our templates. <strong>4. Job Alerts:</strong> Get notified of new opportunities tailored to your preferences. <strong>5. Employer Reviews:</strong> Research companies with insights from current and former employees. <strong>6. Career Resources:</strong> Access advice, interview tips, and webinars to enhance your job search.</p>\r\n\r\n<p>Maximizing Your Job Search</p>\r\n\r\n<p><strong>1. Complete Your Profile:</strong> Ensure your profile is detailed and professional to attract recruiters. <strong>2. Customize Applications:</strong> Tailor your resume and cover letter for each application. <strong>3. Utilize Keywords:</strong> Incorporate relevant keywords to boost your profile visibility. <strong>4. Prepare for Interviews:</strong> Practice commonly asked questions and research the company. <strong>5. Follow Up:</strong> Send thank-you emails after interviews to express your appreciation and interest.</p>\r\n\r\n<p>Why Choose Our Job Portal?</p>\r\n\r\n<p><strong>1. Wide Range of Jobs:</strong> Access listings from top companies across various industries. <strong>2. Verified Employers:</strong> Ensure job postings are from legitimate, vetted employers. <strong>3. Continuous Support:</strong> Receive assistance from our dedicated customer support team. <strong>4. Data Privacy:</strong> Enjoy robust security measures to protect your personal information.</p>\r\n\r\n<p>Begin your journey to career success with us. Explore our job portal today and find the job that fits your aspirations!</p>','2024-05-26 13:27:02','2024-05-26 13:27:02');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Finance & Audit Administration','1','2024-04-28 14:19:45','2024-06-23 06:34:37'),(2,'UI/UX','2','2024-05-14 22:09:59','2024-05-14 22:09:59'),(3,'HR','3','2024-05-14 22:10:11','2024-06-23 06:35:17'),(4,'PA & Office Support Advertising','4','2024-06-23 06:35:26','2024-06-23 06:35:33'),(5,'Arts & Media Banking','5','2024-06-23 06:35:41','2024-06-23 06:35:41'),(6,'Microfinace','6','2024-06-23 06:35:46','2024-06-23 06:35:46'),(7,'Insurance','7','2024-06-23 06:36:12','2024-06-23 06:36:28'),(8,'Financial Services','8','2024-06-23 06:36:18','2024-06-23 06:36:35'),(9,'Customer Service','9','2024-06-23 06:36:42','2024-06-23 06:36:42'),(10,'Public Relation CEO','10','2024-06-23 06:36:47','2024-06-23 06:36:47'),(11,'General Management','10','2024-06-23 06:37:00','2024-06-23 06:37:00'),(12,'Community Services','10','2024-06-23 06:37:06','2024-06-23 06:37:06'),(13,'Development Construction','10','2024-06-23 06:37:10','2024-06-23 06:37:10'),(14,'Consulting','10','2024-06-23 06:37:15','2024-06-23 06:37:15'),(15,'Strategy Design','10','2024-06-23 06:37:19','2024-06-23 06:37:19'),(16,'Architecture','10','2024-06-23 06:37:26','2024-06-23 06:37:26'),(17,'Education','10','2024-06-23 06:37:35','2024-06-23 06:37:35'),(18,'Training','10','2024-06-23 06:37:39','2024-06-23 06:37:39'),(19,'Farming','10','2024-06-23 06:38:05','2024-06-23 06:38:05'),(20,'Animals','10','2024-06-23 06:38:26','2024-06-23 06:38:26'),(21,'Conservation','10','2024-06-23 06:38:30','2024-06-23 06:38:30'),(22,'Healthcare','10','2024-06-23 06:38:33','2024-06-23 06:38:33'),(23,'Medical','10','2024-06-23 06:38:37','2024-06-23 06:38:37'),(24,'Hospitality','10','2024-06-23 06:38:42','2024-06-23 06:38:42'),(25,'Hotel & Tourism','10','2024-06-23 06:38:49','2024-06-23 06:38:49'),(26,'IT','10','2024-06-23 06:38:58','2024-06-23 06:38:58'),(27,'Networking','10','2024-06-23 06:39:09','2024-06-23 06:39:09'),(28,'Hardware & Software Agency','10','2024-06-23 06:39:16','2024-06-23 06:39:16'),(29,'Event & Promotion','10','2024-06-23 06:39:28','2024-06-23 06:39:28'),(30,'Risk Management','10','2024-06-23 06:39:46','2024-06-23 06:39:46'),(31,'Manufacturing','10','2024-06-23 06:39:51','2024-06-23 06:39:51'),(32,'Logistics & Warehousing','10','2024-06-23 06:39:58','2024-06-23 06:39:58'),(33,'Transport','10','2024-06-23 06:40:01','2024-06-23 06:40:01'),(34,'Warehousing','10','2024-06-23 06:40:05','2024-06-23 06:40:05'),(35,'Marketing','10','2024-06-23 06:40:16','2024-06-23 06:40:16'),(36,'Creative & Communications','10','2024-06-23 06:40:17','2024-06-23 06:40:17'),(37,'Real Estate','10','2024-06-23 06:40:25','2024-06-23 06:40:25'),(38,'Property Retail','10','2024-06-23 06:40:29','2024-06-23 06:40:29'),(39,'Science','10','2024-06-23 06:40:39','2024-06-23 06:40:39'),(40,'Security','10','2024-06-23 06:40:42','2024-06-23 06:40:42'),(41,'Driver','10','2024-06-23 06:40:46','2024-06-23 06:40:46'),(42,'Procurement','10','2024-06-23 06:40:50','2024-06-23 06:40:50'),(43,'Supply Chain','10','2024-06-23 06:40:57','2024-06-23 06:40:57'),(44,'Restaurant','10','2024-06-23 06:41:01','2024-06-23 06:41:01'),(45,'Food','10','2024-06-23 06:41:12','2024-06-23 06:41:12'),(46,'Translator','10','2024-06-23 06:41:16','2024-06-23 06:41:16'),(47,'Interpreter','10','2024-06-23 06:41:20','2024-06-23 06:41:20');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employers`
--

DROP TABLE IF EXISTS `employers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) unsigned DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_jobs` int(11) DEFAULT NULL,
  `total_highlights` int(11) DEFAULT NULL,
  `membership_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employers`
--

LOCK TABLES `employers` WRITE;
/*!40000 ALTER TABLE `employers` DISABLE KEYS */;
INSERT INTO `employers` VALUES (4,'Zaw Companies','zawmyohtut.com','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',7,'09423242397',1,'2024-06-20',20,5,'Platinum','2024-04-30 08:03:29','2024-04-21 07:12:14'),(5,'A Bank','abank.com.mm','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',13,'(+951) 9559399',1,'2024-06-20',20,5,'Platinum','2024-05-19 16:36:34','2024-04-30 08:13:54');
/*!40000 ALTER TABLE `employers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_emails`
--

DROP TABLE IF EXISTS `job_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_emails`
--

LOCK TABLES `job_emails` WRITE;
/*!40000 ALTER TABLE `job_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_seeker`
--

DROP TABLE IF EXISTS `job_seeker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_seeker` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint(20) unsigned NOT NULL,
  `seeker_id` bigint(20) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_seeker`
--

LOCK TABLES `job_seeker` WRITE;
/*!40000 ALTER TABLE `job_seeker` DISABLE KEYS */;
INSERT INTO `job_seeker` VALUES (1,3,1,'Rejected','Zaw Myo','zaw@gmail.com','09234234234','7171715923282.pdf','Testing in comming','2024-05-16 22:51:22','2024-05-16 22:51:22'),(2,2,1,'Hired','Myo','Myo@gamil.com','09423232323','1181716124855.pdf','test','2024-05-19 06:50:55','2024-06-08 03:10:11');
/*!40000 ALTER TABLE `job_seeker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `employer_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `location_id` bigint(20) unsigned DEFAULT NULL,
  `highlight` int(11) DEFAULT '0',
  `skills` text COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'Web Developer','It seems like you\'ve entered \"loream text.\" If you\'re referring to Lorem Ipsum text, it\'s a placeholder text commonly used in design and publishing. Would you like me to generate some Lorem Ipsum text for you? If you have a specific length or topic in mind, let me know!','1,000,000','Full Time','2024-06-25',1,4,1,1,1,'Laravel , PHP','2024-04-17 09:37:02','2024-04-17 09:37:02'),(2,'UI / UX Designer','It seems like you\'ve entered \"loream text.\" If you\'re referring to Lorem Ipsum text, it\'s a placeholder text commonly used in design and publishing. Would you like me to generate some Lorem Ipsum text for you? If you have a specific length or topic in mind, let me know!','800,000','Part Time','2024-06-25',1,4,1,1,1,'Figma , Prototype','2024-04-29 23:49:57','2024-04-29 23:49:57'),(3,'Senior Web Developer  Extra Position','<ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Investigate and identify user requirements along with system requirements for new websites and applications requiring development.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Prioritize software development projects, set timelines, and assign tasks to team members.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Manage and prioritize development projects, assign timelines, and effectively delegate tasks to team members.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Create and develop wireframes to discover the best layout.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Write code and review code where required for various applications.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Ensure functionality by carrying out testing and debug code where required.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Monitor the performance and oversee Junior Developers to effectively evaluate their performance.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Collaborate with designers to decide on user interface elements such as graphics and navigation bars and buttons.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Ensure the documentation for each piece of developed software or application is kept up to date and easily accessible for future use.</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(64, 69, 79);\">Work alongside mobile developers to create and build mobile-accessible websites.</span></li></ol><p><br></p>','1200000','Part Time','2024-05-25',1,4,1,1,0,'Laravel','2024-05-15 02:35:41','2024-05-15 02:35:41'),(4,'HR Senior Position','<p>Description</p>','1200000','Full Time','2024-05-25',1,4,3,3,1,'PHP','2024-05-19 23:27:22','2024-05-19 23:27:22'),(5,'Designer','<p>Description</p>','800000','Full Time','2024-05-25',1,4,2,3,1,'PHP','2024-05-19 23:29:21','2024-05-19 23:29:21');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Yangon','1','2024-04-22 00:36:04','2024-04-22 00:36:04'),(2,'Mandalay','2','2024-05-15 16:15:51','2024-05-15 16:15:51'),(3,'Nay Pyi Taw','3','2024-05-15 16:16:08','2024-05-15 16:16:08'),(4,'Ayeyawady Division','4','2024-05-15 16:16:28','2024-06-23 06:32:02'),(5,'Bago Division','5','2024-05-15 16:16:35','2024-06-23 06:32:17'),(6,'Chin State','6','2024-05-15 16:16:41','2024-06-23 06:32:41'),(7,'Kachin State','7','2024-06-23 06:33:05','2024-06-23 06:33:05'),(8,'Kayah State','8','2024-06-23 06:33:11','2024-06-23 06:33:11'),(9,'Kayin State','9','2024-06-23 06:33:16','2024-06-23 06:33:16'),(10,'Magway Division','10','2024-06-23 06:33:21','2024-06-23 06:33:21'),(11,'Mon State','10','2024-06-23 06:33:25','2024-06-23 06:33:25'),(12,'Rakhine State','10','2024-06-23 06:33:30','2024-06-23 06:33:30'),(13,'Sagaing Division','10','2024-06-23 06:33:36','2024-06-23 06:33:36'),(14,'Shan State','10','2024-06-23 06:33:41','2024-06-23 06:33:41'),(15,'Taninthayi Division','10','2024-06-23 06:33:46','2024-06-23 06:33:46');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memberships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_detail` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberships`
--

LOCK TABLES `memberships` WRITE;
/*!40000 ALTER TABLE `memberships` DISABLE KEYS */;
INSERT INTO `memberships` VALUES (1,'Platinum','6481716128674.png','For most businesses that want to optimize web queries','\r\n<h3>Platinum</h3>\r\n                    <div class=\"box-info-price\"><span class=\"text-price color-brand-2\">300,000</span><span class=\"text-month\">/month</span></div>\r\n                    <div class=\"border-bottom mb-30\">\r\n                      <p class=\"text-desc-package font-sm color-text-paragraph mb-30\">For most businesses that want to optimize web queries</p>\r\n                    </div>\r\n                    <ul class=\"list-package-feature\">\r\n                      <li>20 Jobs</li>\r\n                      <li>5 Highlight Jobs</li>\r\n                      <li>Easy</li>\r\n                      <li>CV Download</li>\r\n                      <li>Job Email Alet</li>\r\n                    </ul>','1','2024-05-19 07:54:34','2024-05-19 07:54:34'),(2,'Gold','1451716128853.png','For most businesses that want to optimize web queries','\r\n<h3>Gold</h3>\r\n                    <div class=\"box-info-price\"><span class=\"text-price color-brand-2\">200,000</span><span class=\"text-month\">/month</span></div>\r\n                    <div class=\"border-bottom mb-30\">\r\n                      <p class=\"text-desc-package font-sm color-text-paragraph mb-30\">For most businesses that want to optimize web queries</p>\r\n                    </div>\r\n                    <ul class=\"list-package-feature\">\r\n                      <li>10 Jobs</li>\r\n                      <li>3 Highlight Jobs</li>\r\n                      <li>Easy</li>\r\n                      <li>CV Download</li>\r\n                      <li>Job Email Alert</li>\r\n                    </ul>','2','2024-05-19 07:57:33','2024-05-19 07:57:33'),(3,'Silver','8921716128900.png','For most businesses that want to optimize web queries','\r\n                    <h3>Silver</h3>\r\n                    <div class=\"box-info-price\"><span class=\"text-price color-brand-2\">100,000</span><span class=\"text-month\">/month</span></div>\r\n                    <div class=\"border-bottom mb-30\">\r\n                      <p class=\"text-desc-package font-sm color-text-paragraph mb-30\">For most businesses that want to optimize web queries</p>\r\n                    </div>\r\n                    <ul class=\"list-package-feature\">\r\n                      <li>5 Jobs</li>\r\n                      <li>1 Highlight Jobs</li>\r\n                      <li>Easy</li>\r\n                      <li>CV Download</li>\r\n                      <li>Job Email Alert</li>\r\n                    </ul>\r\n                    ','3','2024-05-19 07:58:20','2024-05-19 07:58:20');
/*!40000 ALTER TABLE `memberships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_02_26_184623_create_skills_table',1),(6,'2024_02_26_184829_create_locations_table',1),(7,'2024_02_26_184859_create_categories_table',1),(8,'2024_02_29_195353_create_advertisements_table',2),(9,'2024_03_02_050219_create_jobs_table',3),(13,'2024_03_20_094006_employer-table',4),(14,'2024_04_05_035127_create_seekers_table',4),(15,'2024_04_05_035558_seeker-skill-table',4),(17,'2024_04_20_045303_create_memberships_table',5),(18,'2024_04_21_151914_add_phone_and_location_to_employers_table',6),(20,'2024_05_15_101314_hightlight_to_jobs_table',7),(23,'2024_05_15_233148_create_articles_table',8),(24,'2024_05_16_063100_create_job_seekers_table',9),(25,'2024_05_19_170053_create_sales_table',10),(26,'2024_05_19_224548_membership_to_employers_table',11),(27,'2024_05_20_154821_phone_to_seekers_table',12),(29,'2024_05_21_002256_create_seeker_experiences_table',13),(32,'2024_05_21_032338_create_seeker_education_table',14),(33,'2024_05_21_032837_create_seeker_projects_table',14),(34,'2024_06_23_084612_create_job_emails_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('zawmyohtutdev@gmail.com','$2y$10$5KXTiICkMTFRIyMfEE1pLeOScxDX0nZDc3TdJGGNVLVa1VLxtNzCu','2024-06-07 20:00:55');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_id` json DEFAULT NULL,
  `payment_asset` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'664a7b655f7542971716157285','1','8211716157285.png','Zaw Myo','zaw@gmail.com','09 - 234 567 89','Test','Completed',13,'2024-05-19 15:51:25','2024-05-19 16:36:34');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeker_education`
--

DROP TABLE IF EXISTS `seeker_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeker_education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` bigint(20) unsigned DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeker_education`
--

LOCK TABLES `seeker_education` WRITE;
/*!40000 ALTER TABLE `seeker_education` DISABLE KEYS */;
INSERT INTO `seeker_education` VALUES (1,1,'Physic','EYU','2024-05-14','2024-05-30','2024-05-20 22:09:42','2024-05-20 22:09:42');
/*!40000 ALTER TABLE `seeker_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeker_experiences`
--

DROP TABLE IF EXISTS `seeker_experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeker_experiences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seeker_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeker_experiences`
--

LOCK TABLES `seeker_experiences` WRITE;
/*!40000 ALTER TABLE `seeker_experiences` DISABLE KEYS */;
INSERT INTO `seeker_experiences` VALUES (6,'Senior web Developer','Next Innovations','2024-05-21','2024-06-07',1,'2024-05-20 22:09:22','2024-05-20 22:09:22');
/*!40000 ALTER TABLE `seeker_experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeker_projects`
--

DROP TABLE IF EXISTS `seeker_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeker_projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeker_projects`
--

LOCK TABLES `seeker_projects` WRITE;
/*!40000 ALTER TABLE `seeker_projects` DISABLE KEYS */;
INSERT INTO `seeker_projects` VALUES (1,1,'Ecommerce','testing Project','2024-05-21','2024-05-22','2024-05-20 22:10:08','2024-05-20 22:10:08'),(2,1,'TEsting','Test','2024-05-21','2024-05-22','2024-05-21 00:15:18','2024-05-21 00:15:18');
/*!40000 ALTER TABLE `seeker_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seeker_skill`
--

DROP TABLE IF EXISTS `seeker_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seeker_skill` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` bigint(20) unsigned DEFAULT NULL,
  `skill_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seeker_skill`
--

LOCK TABLES `seeker_skill` WRITE;
/*!40000 ALTER TABLE `seeker_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `seeker_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seekers`
--

DROP TABLE IF EXISTS `seekers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seekers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viber_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seekers`
--

LOCK TABLES `seekers` WRITE;
/*!40000 ALTER TABLE `seekers` DISABLE KEYS */;
INSERT INTO `seekers` VALUES (1,'Myo Myo','UI/UX Designer','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',12,'Laravel, PHP','092324353535',NULL,'2024-05-21 00:27:03','2024-04-28 06:06:53');
/*!40000 ALTER TABLE `seekers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (2,'Laravel','1','2024-03-31 00:40:19','2024-03-31 00:40:19'),(3,'PHP','2','2024-03-31 00:40:44','2024-03-31 00:40:44');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Zaw Myo Htut','zawmyohtutdev@gmail.com',NULL,'$2y$10$BOD1y2h.86/68S2HWTT50uxs2zKvhg4wg4M1ZpXvY7eO5tN6JMYuG','employer','3801714435040.png',NULL,'2024-04-21 07:12:14','2024-04-29 17:27:20'),(12,'Myo Myo','myo@gmail.com',NULL,'$2y$10$QFY6Ho7oJ1Jev18/TwWiB.8zi69fJI2LVdrFeQdYhVsLUVWpdqpHK','seeker','380171443504.png',NULL,'2024-04-28 06:06:53','2024-04-28 06:06:53'),(13,'Zaw Myo Htut','abank@gmail.com',NULL,'$2y$10$8A/ZmZ.y8q8QD7NkONgVD.VTC.APj8L5eUpAl8p5Gux6XRyA.5tky','employer','4121714488282.jpg',NULL,'2024-04-30 08:13:54','2024-04-30 08:14:42'),(14,'U Job','admin@ujob.com.mm',NULL,'$2y$10$7RxBX6J3xhB8nCPk1WGcMuSb3KS.9aemxA/Zij.0iXLg1wgs6fbR2','admin',NULL,NULL,'2024-04-30 09:11:02','2024-04-30 09:11:02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ujob'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-27 11:35:47
