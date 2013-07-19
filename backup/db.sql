-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (x86_64)
--
-- Host: seinheit.ch    Database: seinheit_ch
-- ------------------------------------------------------
-- Server version	5.1.66-0+squeeze1

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
-- Table structure for table `navigation`
--

DROP TABLE IF EXISTS `navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `controller` varchar(64) DEFAULT NULL,
  `action` varchar(64) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sorting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navigation`
--

LOCK TABLES `navigation` WRITE;
/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` VALUES (1,'Home','page','home',NULL,NULL,1,NULL),(2,'Behandlung','page','behandlung',NULL,NULL,1,NULL),(4,'Anamnese','page','anamnese',NULL,2,1,1),(5,'Diagnostik','page','diagnostik',NULL,2,1,2),(6,'Therapiemethoden','page','therapiemethoden',NULL,2,1,3),(7,'Kontakt','page','kontakt',NULL,NULL,1,3),(8,'Über mich','page','ueber-mich',NULL,NULL,1,1),(9,'Infos','',NULL,NULL,NULL,0,2),(10,'Krankenkassen','page','fehler',NULL,9,1,1),(11,'Diplomarbeit','page','diplomarbeit',NULL,NULL,1,2),(12,'Fragebogen PDF','page','fehler',NULL,9,1,4),(15,'Veranstaltungen','page','fehler',NULL,9,1,3),(16,'Links','page','fehler',NULL,9,1,5);
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `subtitle` varchar(256) DEFAULT NULL,
  `url` varchar(256) NOT NULL,
  `content` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `header_image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'Willkommen','','home','<div class=\"col3 line\">\r\n\r\n <div class=\"col\">\r\n  <h2>SEINHEIT.</h2>\r\n  <p><img src=\"{@image 1374233305.jpg}\" alt=\"\"></p>\r\n  <p>Ich heisse Kinga Pannek und bin Dipl. Naturheil­praktikerin. Schwerpunkte meiner Arbeit liegen in der Homöopathie und anderen natürlichen Arzneien.</p>\r\n </div>\r\n\r\n <div class=\"col\">\r\n  <h2>Behandlung</h2>\r\n  <p><a href=\"{@page behandlung}\"><img src=\"{@image 1374149159.jpg}\" alt=\"\"></a></p>\r\n  <p>Die Behandlung in meiner Praxis erfolgt in drei Schritten. Anamnesegespräch, Diagnostik und Therapie. <a href=\"{@page behandlung}\">mehr …</a> </p>\r\n </div>\r\n\r\n <div class=\"col\">\r\n  <h2>Praxis</h2>\r\n   <p><a href=\"{@page kontakt}\"><img src=\"{@image 1374235846.jpg}\" alt=\"\"></a></p>\r\n   <p>Die Praxis befindet sich im Zentrum von Wetzikon. Informationen zur Terminvereinbarung und Anfahrt finden Sie unter <a href=\"{@page kontakt}\">Kontakt</a>.</p>\r\n </div>\r\n\r\n</div>',1,'1374237882.jpg'),(4,'Behandlung','','behandlung','<div class=\"col3 line\">\r\n\r\n <div class=\"col\">\r\n  <h2>Anamnese</h2>\r\n  <a href=\"{@page anamnese}\"><img src=\"{@image 1374156604.jpg}\" alt=\"\"></a>\r\n  <p>\r\n   Die Behandlung in meiner Praxis beinhaltet ein ausführliches Anamnesegespräch welches ca. 1,5 Stunden dauert. Vorab mache ich mir anhand eines Fragebogens ein Bild des jeweiligen Anliegens und gehe im Anamnesegespräch darauf ein. <a href=\"{@page anamnese}\">mehr …</a>\r\n  </p>\r\n </div>\r\n\r\n <div class=\"col\">\r\n  <h2>Diagnostik</h2>\r\n  <a href=\"{@page diagnostik}\"><img src=\"{@image 1374156883.jpg}\" alt=\"\"></a>\r\n  <p>\r\n   Als nächstes führe ich eine individuell angepasste schulmedizinische wie auch naturheilkundliche Diagnostik durch. <a href=\"{@page diagnostik}\">mehr …</a>\r\n  </p>\r\n </div>\r\n\r\n <div class=\"col\">\r\n  <h2>Therapiemethoden</h2>\r\n  <a href=\"{@page therapiemethoden}\"><img src=\"{@image 1374157302.jpg}\" alt=\"\"></a>\r\n  <p>\r\nAll diese Informationen sammle ich wie die Teile eines Puzzles und setze sie zu einem Bild zusammen. Hieraus ergibt sich das individuelle Therapiekonzept. <a href=\"{@page therapiemethoden}\">mehr …</a>\r\n  </p>\r\n </div>\r\n\r\n</div>',1,'1374074370.jpg'),(5,'Fehler','','fehler','Diese Seite ist im Moment nicht verfügbar.',1,''),(6,'Kontakt','','kontakt','<div class=\"col2 left line\">\r\n <div class=\"col\">\r\n  <p><strong>Telefon: 078 684 86 75</strong><br>\r\n   E-Mail: <a href=\"mailto:info@seinheit.ch\">info@seinheit.ch</a><br>\r\n   Sprechzeiten: Montag bis Freitag nach Vereinbarung\r\n  </p>\r\n\r\n  <p><img src=\"{@image 1374073671.jpg}\" alt=\"\"></p>\r\n  <p><strong>Naturheilpraxis SEINHEIT.<br>\r\n   Kinga Pannek<br>\r\n   Bahnhofstraße 105<br>\r\n   8620 Wetzikon</strong></p>\r\n  <p>Falls Sie Fragen haben oder direkt einen Termin vereinbaren möchten, zögern Sie nicht mich zu kontaktieren.</p>\r\n  <p>Ich freue mich auf Ihren Besuch!</p>\r\n\r\n </div>\r\n <div class=\"col\">\r\n  <p><iframe width=\"100%\" height=\"550\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.ch/maps?f=q&source=s_q&hl=de&geocode=&q=bahnhofstrasse+105+wetzikon&sll=46.362093,9.036255&sspn=4.276148,6.690674&ie=UTF8&hq=&ll=47.325007,8.799663&spn=0.025192,0.066047&z=14&output=embed&hnear=Bahnhofstrasse+105,+8620+Wetzikon,+Hinwil,+Z%C3%BCrich\">\r\n</iframe>\r\n    <a href=\"http://maps.google.ch/maps?f=q&source=embed&hl=de&geocode=&q=bahnhofstrasse+105+wetzikon&sll=46.362093,9.036255&sspn=4.276148,6.690674&ie=UTF8&hq=&hnear=Bahnhofstrasse+105,+8620+Wetzikon,+Hinwil,+Z%C3%BCrich&ll=47.325007,8.799663&spn=0.025192,0.066047&z=14\">Größere Kartenansicht</a></p>\r\n </div>\r\n</div>',1,'1374140846.jpg'),(8,'Über mich','','ueber-mich','<div class=\"col3 line\">\r\n\r\n<div class=\"col\">\r\n<p>\r\nIch heisse Kinga Pannek und bin Dipl. Naturheil­praktikerin TEN hfnh*. Studiert habe ich an der Höhreren Fachschule Paramed Akademie AG, dem Bildungzentrum für Ganzheitsmedizin in Baar.\r\nSchwerpunkte meiner Arbeit liegen in der Homöopathie und anderen natürlichen Arzneien. Ausleitende Verfahren zur Entgiftung, Ernährungsberatung und verschiedene Körperbehandlungen wie die Visceral Therapie sind ebenso wesentliche Bestandteile meiner Arbeit. \r\n</p>\r\n\r\n\r\n</div>\r\n\r\n<div class=\"box col\">\r\n<h2>Entwicklung</h2>\r\n<div class=\"content\">\r\n<ul>\r\n<li>Ausbildung zur Kinderkrankenschwester (Bayern/DE)</li>\r\n<li>Umzug in die Schweiz </li>\r\n<li>Ausbildung in Klangarbeit und Meditation</li>\r\n<li>Ausbildung in Sterbebegleitung</li>\r\n<li>Studium der Traditionellen Europäischen Medizin an der Paramed HF für Naturheilkunde (Baar - ZG)</li>\r\n<li>Eröffnung der Praxis SEINHEIT. in Wetzikon</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box col\">\r\n<h2>Berufserfahrung in folgenden Bereichen</h2>\r\n<div class=\"content\">\r\n<ul>\r\n<li>Kinderklinik</li>\r\n<li>Behindertenbereich</li>\r\n<li>Arbeit mit künstlich beatmeten Kindern</li>\r\n<li>Kinderbetreung</li>\r\n<li>Volontariat in Mutter Theresas Waisenhaus (Kalkutta/Indien)</li>\r\n<li>Langzeitpflege</li>\r\n<li>Psychiatrie</li>\r\n<li>Masseurin im Wellnessbereich</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col1\">\r\n<p>\r\n<small>* Die Paramed Akademie AG ist die einzige höhere Fachschule für Naturheilkunde in der Schweiz. Die Ausbildung ist im Kanton Zug staatlich anerkannt.<br> Der Bildungsgang Dipl. Naturheilpraktikerin TEN hfnh entspricht dem europäischen Bachelor Niveau.</small>\r\n</p>\r\n</div>',1,'1374229998.jpg'),(7,'Anamnese','','anamnese','<div class=\"col2 right line\">\r\n\r\n<div class=\"col\">\r\n<p>\r\nAls Naturheilpraktikerin diene ich als Dolmetscherin der Sprache des Körpers. Im Anamnesegespräch gehe ich zunächst auf die vorherrschende Erkrankung / Beschwerde ein und “zoome” in das Problem hinnein. Als nächstes interessiert mich die gesundheitliche Vorgeschichte und eventuelle Störfelder wie Narben oder Medikamente. Zuletzt “zoome” ich noch von der Person heraus in ihr soziales Umfeld und frage noch familiäre Erkrankungstendenzen ab. \r\n</p>\r\n\r\n<p>\r\nAuf diese Weise versuche ich mir ein möglichst vielschichtiges Bild zu machen um das Wagnis einzugehen eine ganzheitliches Behandlungskonzept anbieten zu können.\r\n</p>\r\n</div>\r\n\r\n<div class=\"col\">\r\n\r\n</div>\r\n\r\n</div>',1,'1374156504.jpg'),(9,'Diagnostik','','diagnostik','<div class=\"col2 line\">\r\n<div class=\"col\">\r\n<h2>Naturheilkundliche Diagnostik</h2>\r\n\r\n<ul>\r\n<li>Irisdiagnose</li>\r\n<li>Zungendiagnose</li>\r\n<li>Headzonendiagnose</li>\r\n<li>F. X. Mayerdiagnose</li>\r\n<li>Haarmineralanalyse</li>\r\n</ul>\r\n</div>\r\n<div class=\"col\">\r\n<h2>Schulmedizinische Diagnostik</h2>\r\n\r\n<p>\r\nIm Rahmen der Diagnostik führe ich einige schulmedizinische Diagnoseverfahren durch, welche eine ärztliche Untersuchung nicht ersetzen. \r\n</p>\r\n\r\n<ul>\r\n<li>Untersuchung des Bewegungsapparates und der Gelenke</li>\r\n<li>Stuhl- Urinuntersuchung</li>\r\n<li>Rachen- Ohruntersuchung</li>\r\n<li>neurologische Tests</li>\r\n</ul>\r\n</div>',1,'1374149063.jpg'),(10,'Therapiemethoden','','therapiemethoden','<div class=\"col3 line\">\r\n <div class=\"col\">\r\n  <h2>Methode</h2>\r\n  <p>Ich begleite Menschen in verschiedenen Lebenslagen, ob es sich um akute oder chronische Erkrankungen handelt oder um Beratung in Krisensituationen. Individuell kombiniere ich verschiedene Therapiemethoden wie natürliche Arzneien, Körpertherapien oder Ausleitende Verfahren. Auf diese Weise werden gleichzeitig verschieden Ebenen des menschlichen Systems angesprochen, was den nachhaltigsten Therapieerfolg verspricht.</p>\r\n </div>\r\n <div class=\"col\">\r\n  <h2>Konzepte</h2>\r\n   <p>Im Mittelpunkt meiner Arbeit steht die prozessorientierte Behandlung. Ich orientiere mich am Konzept der miasmatischen Homöopathie, der Humoralmedizin und den kybernetischen Gesetzmäsigkeiten des Lebendigen. </p>\r\n </div>\r\n <div class=\"col\">\r\n  <h2>Zusammenarbeit</h2>\r\n   <p>Sie können mich als “naturheilkundliche Hausärztin” betrachten, die den Überblick im heutigen Naturheilkunde Angebot behält und berät, zu welchem Zeitpunkt eine Therapiemethode im Genesungsprozess am meisten Sinn macht. Sollten Sie bei verschiedenen Therapeuten in Behandlung sein, diene ich gerne als Kontaktperson.</p>\r\n </div>\r\n</div>\r\n\r\n<div class=\"col4\">\r\n <div class=\"col box\">\r\n  <h2>Natürliche Arzneien</h2>\r\n  <img src=\"{@image 1374159021.jpg}\" alt=\"\">\r\n </div>\r\n <div class=\"col box\">\r\n  <h2>Körpertherapien</h2>\r\n  <img src=\"{@image 1374224328.jpg}\" alt=\"\">  \r\n </div>\r\n <div class=\"col box\">\r\n  <h2>Ausleitende Verfahren</h2>\r\n  <img src=\"{@image 1374224564.jpg}\" alt=\"\">\r\n </div>\r\n <div class=\"col box\">\r\n  <h2>Beratung</h2>\r\n  <img src=\"{@image 1374224707.jpg}\" alt=\"\">\r\n </div>\r\n</div>',1,'1374149247.jpg'),(12,'Diplomarbeit','','diplomarbeit','<div class=\"col2 line\">\r\n <div class=\"col\">\r\n  <p>Im Rahmen meines Studiums an der Höheren Fachschule für Naturheilkunde Paramed Akademie AG Bildungszentrum für Ganzheitsmedizin in Baar, verfasste ich die hier vorliegende Diplomarbeit.</p>\r\n  <p>Jeder Mensch kommt im Laufe seines Lebens unweigerlich immer wider an Weggabelungen in seinem Leben. Etwas Altes geht zu Ende und man schlägt eine neue Richtung ein. Geht man an einer solchen Weggabelung keinen neuen Weg sondern versucht alles beim Alten zu lassen, übernimmt der Körper diese Aufgabe symbolisch und entwickelt eine Erkrankung.</p>\r\n  <p>Mit dieser Arbeit habe ich untersucht ob es mir als Therapeutin möglich ist Einfluss auf solche Wendepunkte zu nehmen. Mein Ziel war es herauszufinden ob man den Lebensweg der in eine Erkrankung hinein gelangte durch eine Wende im Lebenslauf wider aus der Erkrankung herausführen kann.</p>\r\n  <p>In der Chaosforschung sowie der Kybernetik wird diese Weggabelung als Bifurkation bezeichnet. Deshalb lautet der Titel der Arbeit:</p>\r\n  <p><strong>Beeinflussung der Bifurkation – Wendepunkte der Lebensgeschichte beeinflussen</strong></p>\r\n  <p>Hier könnten Sie die gesamte Arbeit als PDF (3 MB) herunterladen:</p>\r\n  <p><a href=\"{@image img/DA-Kinga-Pannek-2012.pdf}\" target=\"_blank\">DA-Kinga-Pannek-2012.pdf</a></p>\r\n </div>\r\n <div class=\"col\">\r\n  <h2>Zusammenfassung</h2>\r\n  <p>Diese Arbeit beschäftigt sich mit Wendepunkten der Lebensgeschichte. Es wird der Frage nachgegangen, ob es möglich ist, auf den Zeitpunkt des Auftretens eines Wendepunktes Einfluss zu nehmen. Ziel ist es zu klären, ob und wie man als behandelnde Person den Zeitpunkt des Auftretens einer therapeutisch notwendigen Wende im Leben eines Patienten herbeiführen kann. Ein weiterer Aspekt dieser Arbeit ist der Einfluss von Angst auf die Handlungsfähigkeit und Veränderungsbereitschaft des Menschen.</p>\r\n  <p>Die Auswertungen stützen sich einerseits u.a. auf Grundlagen der Systemtheorie, der Kybernetik, der Chaosforschung und der Regulationsbiologie; andererseits auf die Untersuchungsergebnisse einer Befragung der Teilnehmer des Intensivseminars mit dem Thema Angst. Im Ergebnis wird deutlich dass eine direkte Beeinflussung des Auftretens einer Wende nicht möglich ist. Jedoch zeigte sich, dass gewisse Begebenheiten indirekt einen starken Einfluss auf die Veränderungsbereitschaft haben. Diese Begebenheiten beinhalten Wissensvermittlung, Auseinandersetzung mit alten Mustern und Ängsten, ein Umfeld welches Bewusstwerdungsprozesse fördert und Arbeit an der Motivation als Energiemotor.</p>\r\n </div>\r\n</div>\r\n',1,'');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-19 15:11:02
