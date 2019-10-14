-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.16-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных devhub
CREATE DATABASE IF NOT EXISTS `devhub` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `devhub`;

-- Дамп структуры для таблица devhub.author
CREATE TABLE IF NOT EXISTS `author` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `body` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.author: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
/*!40000 ALTER TABLE `author` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.comments: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `body`, `post_id`, `author_id`, `created_at`, `updated_at`) VALUES
	(1, 'asd', 1, 2, '2019-07-22 13:39:19', '2019-07-22 13:39:19'),
	(2, 'фывфыв', 4, 2, '2019-07-22 16:02:10', '2019-07-22 16:02:10'),
	(4, 'фывфыв', 7, 2, '2019-08-01 00:39:42', '2019-08-01 00:39:42'),
	(5, 'asdasdasd', 13, 2, '2019-08-03 20:57:33', '2019-08-03 20:57:33'),
	(6, '<script>alert(1)</script>', 1, 2, '2019-08-05 19:41:59', '2019-08-05 19:41:59');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.followers
CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leader_id` int(11) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.followers: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` (`id`, `leader_id`, `follower_id`, `created_at`, `updated_at`) VALUES
	(32, 2, 4, '2019-08-08 02:37:18', '2019-08-08 02:37:18');
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.hubs
CREATE TABLE IF NOT EXISTS `hubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` tinytext DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `raiting` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.hubs: ~181 rows (приблизительно)
/*!40000 ALTER TABLE `hubs` DISABLE KEYS */;
INSERT INTO `hubs` (`id`, `logo`, `name`, `description`, `raiting`, `created_at`, `updated_at`) VALUES
	(1, 'images/hubs/3d-printers.png', '3D', '3D modeling is the process of virtually developing the surface and structure of a 3D object.', 1, '2019-08-10 15:09:44', '2019-08-13 21:25:45'),
	(2, 'images/hubs/ajax.png', 'Ajax', 'Ajax is a technique for creating interactive web applications.', 0, '2019-08-10 15:09:44', '2019-08-10 15:57:02'),
	(3, 'images/hubs/algoritm.png', 'Algorithm', 'Algorithms are self-contained sequences that carry out a variety of tasks.', 0, '2019-08-10 15:09:44', '2019-08-10 15:57:34'),
	(4, 'images/hubs/amphp.png', 'Amp', 'Amp is a non-blocking concurrency framework for PHP.', 0, '2019-08-10 15:09:44', '2019-08-10 15:52:02'),
	(5, 'images/hubs/Android.png', 'Android', 'Android is an operating system built by Google designed for mobile devices.', 0, '2019-08-10 15:09:44', '2019-08-10 15:49:46'),
	(6, 'images/hubs/Angular.png', 'Angular', 'Angular is an open source web application platform.', 0, '2019-08-10 15:09:44', '2019-08-10 15:49:46'),
	(7, 'images/hubs/Ansible.png', 'Ansible', 'Ansible is a simple and powerful automation engine.', 0, '2019-08-10 15:09:44', '2019-08-10 15:49:46'),
	(8, 'images/hubs/API.png', 'API', 'An API (Application Programming Interface) is a collection of protocols and subroutines for building software.', 0, '2019-08-10 15:09:44', '2019-08-10 15:49:46'),
	(9, 'images/hubs/Arduino.png', 'Arduino', 'Arduino is an open source hardware and software company and maker community.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:46'),
	(10, 'images/hubs/ASPNET.png', 'ASP.NET', 'ASP.NET is a web framework for building modern web apps and services.', 0, '2019-08-10 15:09:45', '2019-08-10 15:53:23'),
	(11, 'images/hubs/Atom.png', 'Atom', 'Atom is a open source text editor built with web technologies.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:46'),
	(12, 'images/hubs/Awesome.png', 'Awesome Lists', 'An awesome list is a list of awesome things curated by the community.', 2, '2019-08-10 15:09:45', '2019-08-21 19:18:08'),
	(13, 'images/hubs/aws.png', 'Amazon Web Services', 'Amazon Web Services provides on-demand cloud computing platforms on a subscription basis.', 0, '2019-08-10 15:09:45', '2019-08-10 15:54:01'),
	(14, 'images/hubs/Azure.png', 'Azure', 'Azure is a cloud computing service created by Microsoft.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:46'),
	(15, 'images/hubs/Babel.png', 'Babel', 'Babel is a compiler for writing next generation JavaScript, today.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:46'),
	(16, 'images/hubs/Bash.png', 'Bash', 'Bash is a shell and command language interpreter for the GNU operating system.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:47'),
	(17, 'images/hubs/Bitcoin.png', 'Bitcoin', 'Bitcoin is a cryptocurrency developed by Satoshi Nakamoto.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:47'),
	(18, '', 'Blockchain', 'Blockchains are distributed ledgers that can record transactions between parties in a verifiable and permanent way.', 0, '2019-08-10 15:09:45', '2019-08-10 15:54:38'),
	(19, 'images/hubs/Bootstrap.png', 'Bootstrap', 'Bootstrap is an HTML, CSS, and JavaScript framework.', 0, '2019-08-10 15:09:45', '2019-08-10 15:49:47'),
	(20, 'images/hubs/Bot.png', 'Bot', 'A bot is an application that runs automated tasks over the Internet.', 0, '2019-08-10 15:09:45', '2019-08-10 15:59:09'),
	(21, 'images/hubs/C.png', 'C', 'C is a general purpose programming language that first appeared in 1972.', 0, '2019-08-10 15:09:46', '2019-08-10 15:49:47'),
	(22, 'images/hubs/Chrome.png', 'Chrome', 'Chrome is a web browser from the tech company Google.', 1, '2019-08-10 15:09:46', '2019-08-13 21:25:45'),
	(23, 'images/hubs/Chrome.png', 'Chrome extension', 'Google Chrome Extensions are add-ons that allow users to customize their Chrome web browser.', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:02'),
	(24, '', 'Command line interface', 'A CLI, or command-line interface, is a console that helps users issue commands to a program.', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:09'),
	(25, 'images/hubs/Clojure.png', 'Clojure', 'Clojure is a dynamic, general-purpose programming language.', 1, '2019-08-10 15:09:46', '2019-08-13 21:25:45'),
	(26, '', 'Code quality', 'Automate your code review with style, quality, security, and test‑coverage checks when you need them.', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:19'),
	(27, '', 'Code review', 'Ensure your code meets quality standards and ship with confidence.', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:23'),
	(28, '', 'Compiler', 'Compilers are software that translate higher-level programming languages to lower-level languages', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:26'),
	(29, 'images/hubs/Continuous integration.png', 'Continuous integration', 'Automatically build and test your code as you push it upstream, preventing bugs from being deployed to production.', 0, '2019-08-10 15:09:46', '2019-08-10 15:49:47'),
	(30, 'images/hubs/Cpp.png', 'C++', 'C++ is a general purpose and object-oriented programming language.', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:44'),
	(31, '', 'Cryptocurrency', 'A cryptocurrency is a digital currency that uses cryptography.', 0, '2019-08-10 15:09:46', '2019-08-10 15:55:57'),
	(32, 'images/hubs/Crystal.png', 'Crystal', 'Crystal is a self-hosted, general purpose programming language.', 0, '2019-08-10 15:09:46', '2019-08-10 15:49:47'),
	(33, 'images/hubs/csharp.png', 'C#', 'C# ("C sharp") is an object-oriented and type-safe programming language.', 0, '2019-08-10 15:09:46', '2019-08-10 15:56:16'),
	(34, 'images/hubs/CSS.png', 'CSS', 'Cascading Style Sheets (CSS) is a language used most often to style and improve upon the appearance of views.', 0, '2019-08-10 15:09:46', '2019-08-10 15:49:48'),
	(35, '', 'Data structures', 'Data structures are a way of organizing and storing data.', 0, '2019-08-10 15:09:46', '2019-08-10 15:56:24'),
	(36, 'images/hubs/Data visualization.png', 'Data visualization', 'Data visualization is the graphic representation of data and trends.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(37, 'images/hubs/Database.png', 'Database', 'A database is a structured set of data held in a computer, usually a server.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(38, 'images/hubs/Deep learning.png', 'Deep learning', 'Deep Learning is an artificial neural network composed of many layers.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(39, 'images/hubs/Dependency management.png', 'Dependency management', 'Secure and manage your third-party dependencies.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(40, 'images/hubs/Deployment.png', 'Deployment', 'Streamline your code deployment so you can focus on your product.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(41, 'images/hubs/Django.png', 'Django', 'Django is a web application framework for Python.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(42, 'images/hubs/Docker.png', 'Docker', 'Docker is a platform built for developers to build and run applications.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:48'),
	(43, 'images/hubs/Documentation.png', 'Documentation', 'Documentation is a set of information that describes a product to its users.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(44, 'images/hubs/.NET.png', '.NET', '.NET is a free, cross-platform, open source developer platform.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(45, 'images/hubs/Electron.png', 'Electron', 'Electron is a framework for building cross-platform desktop applications with web technology.', 1, '2019-08-10 15:09:47', '2019-08-13 21:25:45'),
	(46, 'images/hubs/Elixir.png', 'Elixir', 'Elixir is a dynamic, functional language designed for building scalable and maintainable applications.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(47, 'images/hubs/Emacs.png', 'Emacs', 'Emacs is an extensible, customizable, free text editor and computing environment.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(48, 'images/hubs/Ember.png', 'Ember', 'Ember is a framework for creating web applications.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(49, 'images/hubs/Emoji.png', 'Emoji', 'Emojis are graphic symbols that represent an emotion, object, or concept.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(50, 'images/hubs/Emulator.png', 'Emulator', 'An emulator is any hardware or software that allows one computer to behave like another.', 0, '2019-08-10 15:09:47', '2019-08-10 15:49:49'),
	(51, 'images/hubs/ES6.png', 'ES6', 'ECMAScript 6 is the sixth release of the ECMAScript language.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(52, 'images/hubs/ESLint.png', 'ESLint', 'The pluggable linting utility for JavaScript and JSX.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(53, 'images/hubs/Ethereum.png', 'Ethereum', 'Ethereum is a distributed public blockchain network.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(54, 'images/hubs/Express.png', 'Express', 'Express is a minimal Node.js framework for web and mobile applications.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(55, 'images/hubs/Firebase.png', 'Firebase', 'Firebase is a mobile app development platform that provides data analysis and database web services for developers.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(56, 'images/hubs/Firefox.png', 'Firefox', 'Firefox is an open source web browser from Mozilla.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(57, 'images/hubs/Flask.png', 'Flask', 'Flask is a web framework for Python based on the Werkzeug toolkit.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(58, 'images/hubs/Font.png', 'Font', 'A font is a particular style of typeface for text.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(59, 'images/hubs/Framework.png', 'Framework', 'A framework is a reusable set of libraries or classes in software.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(60, 'images/hubs/Front end.png', 'Front end', 'Front end is the programming and layout that people see and interact with.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(61, 'images/hubs/Game engine.png', 'Game engine', 'A game engine is a software framework used to develop and create video games.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:49'),
	(62, 'images/hubs/Git.png', 'Git', 'Git is the most widely used version control system.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:50'),
	(63, 'images/hubs/GitHub API.png', 'GitHub API', 'The GitHub API allows you to build applications that integrate with GitHub.', 0, '2019-08-10 15:09:48', '2019-08-10 15:49:50'),
	(64, 'images/hubs/Go.png', 'Go', 'Go is a programming language built to resemble a simplified version of the C programming language.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(65, 'images/hubs/Google.png', 'Google', 'Google LLC is an American multinational technology company that specializes in Internet-related services and products.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(66, 'images/hubs/Gradle.png', 'Gradle', 'Gradle is an open-source build tool that helps teams build, automate and deliver better software, faster.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(67, 'images/hubs/GraphQL.png', 'GraphQL', 'GraphQL is a query language for APIs and a runtime for fulfilling those queries with your existing data.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(68, 'images/hubs/Gulp.png', 'Gulp', 'Gulp is a toolkit for automating and streamlining web development.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(69, 'images/hubs/Haskell.png', 'Haskell', 'Haskell is a functional programming language with non-strict semantics, and strong static typing.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(70, 'images/hubs/Homebrew.png', 'Homebrew', 'Homebrew is a package manager for macOS.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(71, 'images/hubs/Homebridge.png', 'Homebridge', 'Homebridge is a utility for tying smart home devices together into Apple’s HomeKit framework, controlled by Siri.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(72, 'images/hubs/HTML.png', 'HTML', 'HTML is the fundamental markup language for webpages.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(73, 'images/hubs/HTTP.png', 'HTTP', 'HTTP (Hypertext Transfer Protocol) is the standard for communication across the web.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(74, 'images/hubs/Icon font.png', 'Icon font', 'Icon fonts contain glyphs and symbols in place of textual letters.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(75, 'images/hubs/iOS.png', 'iOS', 'iOS is the operating system for Apple\'s mobile products.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(76, 'images/hubs/IPFS.png', 'IPFS', 'IPFS is a peer-to-peer protocol for content-addressed sharing of data via a distributed file system.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(77, 'images/hubs/Java.png', 'Java', 'Java is an object-oriented programming language used mainly for web, desktop, embedded devices and mobile applications.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:50'),
	(78, 'images/hubs/JavaScript.png', 'JavaScript', 'JavaScript (JS) is a lightweight interpreted programming language with first-class functions.', 0, '2019-08-10 15:09:49', '2019-08-10 15:49:51'),
	(79, 'images/hubs/Jekyll.png', 'Jekyll', 'Jekyll is a simple, blog-aware static site generator.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(80, 'images/hubs/jQuery.png', 'jQuery', 'jQuery is a lightweight library that simplifies programming with JavaScript.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(81, 'images/hubs/JSON.png', 'JSON', 'JSON (JavaScript Object Notation) allows for easy interchange of data, often between a program and a database.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(82, 'images/hubs/The Julia Language.png', 'The Julia Language', 'Julia is a high-level, high-performance dynamic programming language for numerical computing.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(83, 'images/hubs/Jupyter Notebook.png', 'Jupyter Notebook', 'Jupyter Notebooks are documents that contain live code, visualizations, and narrative text.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(84, 'images/hubs/Koa.png', 'Koa', 'Koa is an expressive middleware framework for Node.js servers that uses ES2017 async functions.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(85, 'images/hubs/Kotlin.png', 'Kotlin', 'Kotlin is a statically typed programming language for multiplatform applications.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(86, 'images/hubs/Kubernetes.png', 'Kubernetes', 'Kubernetes is an open source system for automating deployment, scaling, and management of containerized applications.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(87, 'images/hubs/Laravel.png', 'Laravel', 'Laravel is a PHP framework.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(88, 'images/hubs/LaTeX.png', 'LaTeX', 'LaTeX is a document preparation system.', 0, '2019-08-10 15:09:50', '2019-08-10 15:49:51'),
	(89, 'images/hubs/Library.png', 'Library', 'A library is a collection of resources, often created to make programming a task simpler.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:51'),
	(90, 'images/hubs/Linux.png', 'Linux', 'Linux is an open source operating system.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:51'),
	(91, 'images/hubs/Localization.png', 'Localization', 'Translation of a software interface and messages to another language plus to work with local cultures.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:51'),
	(92, 'images/hubs/Lua.png', 'Lua', 'Lua is a lightweight, embeddable scripting language.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:51'),
	(93, 'images/hubs/Machine learning.png', 'Machine learning', 'Machine learning is a way of modeling and interpreting data that allows a piece of software to respond intelligently.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:51'),
	(94, 'images/hubs/macOS.png', 'macOS', 'macOS is Apple\'s operating system.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:51'),
	(95, 'images/hubs/Markdown.png', 'Markdown', 'Markdown is a lightweight markup language.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(96, 'images/hubs/Mastodon.png', 'Mastodon', 'Mastodon is a free, decentralized, open-source microblogging network.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(97, 'images/hubs/Material design.png', 'Material design', 'Material design is a unified system of theory and tools for creating digital experiences developed by Google.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(98, 'images/hubs/MATLAB.png', 'MATLAB', 'MATLAB is a programming platform for numerical computation and visualization.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(99, 'images/hubs/Maven.png', 'Maven', 'Maven is a build automation tool used primarily for Java projects.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(100, 'images/hubs/Minecraft.png', 'Minecraft', 'Minecraft is a sandbox video game.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(101, 'images/hubs/Mobile.png', 'Mobile', 'Mobile apps, mobile OS, mobile databases, & mobile testing frameworks.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(102, 'images/hubs/Monero.png', 'Monero', 'Monero is a private, fungible, open source, decentralized cryptocurrency.', 0, '2019-08-10 15:09:51', '2019-08-10 15:49:52'),
	(103, 'images/hubs/MongoDB.png', 'MongoDB', 'MongoDB is an open source NoSQL document-oriented database.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:52'),
	(104, 'images/hubs/Mongoose.png', 'Mongoose', 'Mongoose is a MongoDB object modeling tool designed to work in an asynchronous environment.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:52'),
	(105, 'images/hubs/Monitoring.png', 'Monitoring', 'Monitor the impact of your code changes. Measure performance, track errors, and analyze your application.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(106, 'images/hubs/MvvmCross.png', 'MvvmCross', 'The .NET MVVM framework for cross-platform solutions, including Xamarin.iOS, Xamarin.Android, Windows, and Mac.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(107, 'images/hubs/MySQL.png', 'MySQL', 'MySQL is an open source relational database management system.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(108, 'images/hubs/NativeScript.png', 'NativeScript', 'NativeScript is a JavaScript-native mobile framework.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(109, 'images/hubs/Nim.png', 'Nim', 'Nim is a statically typed, compiled, garbage-collected systems programming language.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(110, 'images/hubs/Natural language processing.png', 'Natural language processing', 'Nim is a statically typed, compiled, garbage-collected systems programming language.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(111, 'images/hubs/Node.js.png', 'Node.js', 'Node.js is a tool for executing JavaScript in a variety of environments.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(112, 'images/hubs/NoSQL.png', 'NoSQL', 'A NoSQL database refers to a database whose storage format is modeled differently from relational databases.', 0, '2019-08-10 15:09:52', '2019-08-10 15:49:53'),
	(113, 'images/hubs/npm.png', 'npm', 'npm is a package manager for JavaScript included with Node.js.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(114, 'images/hubs/Objective-C.png', 'Objective-C', 'Objective-C is general purpose, object-oriented programming language used for macOS and iOS operating systems.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(115, 'images/hubs/OpenGL.png', 'OpenGL', 'OpenGL is a software interface that allows a programmer to communicate with graphics hardware.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(116, 'images/hubs/Operating system.png', 'Operating system', 'An operating system is a program that manages a computer\'s programs and applications.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(117, 'images/hubs/P2P.png', 'P2P', 'Peer-to-Peer applications are decentralized or distributed.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(118, 'images/hubs/Package manager.png', 'Package manager', 'A package manager is a set of tools that automates and manages computer software.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(119, 'images/hubs/Language parsing.png', 'Language parsing', 'Parsing is the process of analyzing a string of symbols conforming to the rules of a formal grammar.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(120, 'images/hubs/Perl.png', 'Perl', 'Perl is a highly capable and feature-rich programming language.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(121, 'images/hubs/Perl 6.png', 'Perl 6', 'Perl 6 is an expressive and feature-rich programming language.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(122, 'images/hubs/Phaser.png', 'Phaser', 'Phaser is a fun, free, and fast 2D game framework for making HTML5 games for desktop and mobile web browsers.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:53'),
	(123, 'images/hubs/PHP.png', 'PHP', 'PHP is a popular general-purpose scripting language that works particularly well for server-side web development.', 1, '2019-08-10 15:09:53', '2019-08-15 19:01:47'),
	(124, 'images/hubs/PICO-8.png', 'PICO-8', 'PICO-8 is a fantasy console for making, sharing and playing tiny games and other computer programs in Lua.', 0, '2019-08-10 15:09:53', '2019-08-10 15:49:54'),
	(125, 'images/hubs/Pixel Art.png', 'Pixel Art', 'Pixel art is a form of digital art where images are created and edited at the pixel level.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(126, 'images/hubs/PostgreSQL.png', 'PostgreSQL', 'PostgreSQL is an open source database system.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(127, 'images/hubs/Project management.png', 'Project management', 'Project management is about building scope and executing on the project\'s goals.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(128, 'images/hubs/Publishing.png', 'Publishing', 'Publishing is the dissemination of making information available to the general public through various mediums.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(129, 'images/hubs/PWA.png', 'PWA', 'Progressive Web Apps are traditional web sites that are enhanced with native like features.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(130, 'images/hubs/Python.png', 'Python', 'Python is a dynamically typed programming language.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(131, 'images/hubs/Qt.png', 'Qt', 'Python is a dynamically typed programming language.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(132, 'images/hubs/R.png', 'R', 'Qt, pronounced "cute") WHERE id = 131; is a cross-platform application development framework.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(133, 'images/hubs/Rails.png', 'Rails', 'R is a free programming language and software environment for statistical computing and graphics.', 0, '2019-08-10 15:09:54', '2019-08-10 15:49:54'),
	(134, 'images/hubs/Raspberry Pi.png', 'Raspberry Pi', 'Ruby on Rails (Rails) is a web application framework written in Ruby.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(135, 'images/hubs/Ratchet.png', 'Ratchet', 'The Raspberry Pi is a popular single-board computer.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(136, 'images/hubs/React.png', 'React', 'Ratchet is a set of libraries to handle WebSockets asynchronously in PHP.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(137, 'images/hubs/React Native.png', 'React Native', 'React is an open source JavaScript library used for designing user interfaces.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(138, 'images/hubs/ReactiveUI.png', 'ReactiveUI', 'React Native is a JavaScript mobile framework developed by Facebook.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(139, 'images/hubs/Redux.png', 'Redux', 'ReactiveUI is a composable, cross-platform model-view-viewmodel framework for all .NET platforms.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(140, 'images/hubs/REST API.png', 'REST API', 'Redux is a predictable state container for JavaScript apps.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(141, 'images/hubs/Ruby.png', 'Ruby', 'A representational state transfer (REST) API is a way to provide compatibility between computer systems on the internet.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:54'),
	(142, 'images/hubs/Rust.png', 'Rust', 'Ruby is a scripting language designed for simplified object-oriented programming.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:55'),
	(143, 'images/hubs/Sass.png', 'Sass', 'Rust is a systems programming language created by Mozilla.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:55'),
	(144, 'images/hubs/Scala.png', 'Scala', 'Sass is a stable extension to classic CSS.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:55'),
	(145, 'images/hubs/scikit-learn.png', 'scikit-learn', 'Scala is an object-oriented programming language.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:55'),
	(146, 'images/hubs/Software-defined networking.png', 'Software-defined networking', 'scikit-learn is a Python module for machine learning.', 0, '2019-08-10 15:09:55', '2019-08-10 15:49:55'),
	(147, 'images/hubs/Security.png', 'Security', 'Software-defined networking (SDN) is an architecture for programmable, centrally managed networks.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(148, 'images/hubs/Server.png', 'Server', 'Cybersecurity is the protection of computer hardware, software, and data from theft, damage, and malicious intent.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(149, 'images/hubs/Serverless.png', 'Serverless', 'A server is a program made to process requests and deliver data to clients.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(150, 'images/hubs/Shell.png', 'Shell', 'Serverless architecture refers to apps that depend on third-party services or custom code.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(151, 'images/hubs/Sketch.png', 'Sketch', 'A shell is a command-line tool, designed to be run by the Unix shell.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(152, 'images/hubs/SpaceVim.png', 'SpaceVim', 'Sketch is a vector graphics editor for Apple\'s macOS, used primarily for user interface and icon design.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(153, 'images/hubs/Spring Boot.png', 'Spring Boot', 'SpaceVim is a community-driven distribution of the vim editor that allows managing your plugins in layers.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(154, 'images/hubs/SQL.png', 'SQL', 'Spring Boot is a coding and configuration model for Java applications.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(155, 'images/hubs/Storybook.png', 'Storybook', 'SQL is a standard language for storing, retrieving and manipulating data in databases.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(156, 'images/hubs/Support.png', 'Support', 'Storybook is a UI development environment for your UI components.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(157, 'images/hubs/Swift.png', 'Swift', 'Get your team and customers the help they need.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:55'),
	(158, 'images/hubs/Symfony.png', 'Symfony', 'Swift is a modern programming language focused on safety, performance, and expressivity.', 0, '2019-08-10 15:09:56', '2019-08-10 15:49:56'),
	(159, 'images/hubs/Telegram.png', 'Telegram', 'Symfony is a set of reusable PHP components and a web framework.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(160, 'images/hubs/Tensorflow.png', 'Tensorflow', 'Telegram is a non-profit, cloud-based instant messaging service.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(161, 'images/hubs/Terminal.png', 'Terminal', 'TensorFlow is an open source software library for numerical computation.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(162, 'images/hubs/Terraform.png', 'Terraform', 'The terminal is an interface in which you can type and execute text-based commands.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(163, 'images/hubs/Testing.png', 'Testing', 'An infrastructure-as-code tool for building, changing, and versioning infrastructure safely and efficiently.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(164, 'images/hubs/Twitter.png', 'Twitter', 'Eliminate bugs and ship with more confidence by adding these tools to your workflow.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(165, 'images/hubs/TypeScript.png', 'TypeScript', 'Twitter is an online news and social networking service where users post and interact with messages, known as “Tweets”.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(166, 'images/hubs/Ubuntu.png', 'Ubuntu', 'TypeScript is a typed superset of JavaScript that compiles to plain JavaScript.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(167, 'images/hubs/Unity.png', 'Unity', 'Ubuntu is a Linux-based operating system.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(168, 'images/hubs/Unreal Engine.png', 'Unreal Engine', 'Unity is a game engine used to create 2D/3D video games, and simulations for computers, consoles, and mobile devices.', 0, '2019-08-10 15:09:57', '2019-08-10 15:49:56'),
	(169, 'images/hubs/Vagrant.png', 'Vagrant', 'Unreal Engine is used to create awesome games, and experiences for PC, mobile, console, VR, and AR.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(170, 'images/hubs/Vim.png', 'Vim', 'Vagrant is an open-source software product for building and maintaining portable virtual software development environments.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(171, 'images/hubs/Virtual reality.png', 'Virtual reality', 'Vim is a console-run text editor program.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(172, 'images/hubs/Vue.js.png', 'Vue.js', 'Virtual reality is an artificial environment displayed through digital means.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(173, 'images/hubs/Wagtail.png', 'Wagtail', 'Vue.js is a JavaScript framework for building interactive web applications.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(174, 'images/hubs/Web Components.png', 'Web Components', 'Wagtail is an open source CMS written in Python and built on the Django web framework.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(175, 'images/hubs/Web app.png', 'Web app', 'Web Components are a set of web platform APIs developers can use to create custom HTML tags.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(176, 'images/hubs/Webpack.png', 'Webpack', 'A web application is any computer program that performs a specific function by using a web browser as its client.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(177, 'images/hubs/Windows.png', 'Windows', 'Webpack is a bundler that takes modules with dependencies and creates static assets.', 0, '2019-08-10 15:09:58', '2019-08-10 15:49:56'),
	(178, 'images/hubs/WordPlate.png', 'WordPlate', 'Windows is Microsoft\'s GUI-based operating system.', 0, '2019-08-10 15:09:59', '2019-08-10 15:49:57'),
	(179, 'images/hubs/WordPress.png', 'WordPress', 'WordPlate is a modern WordPress stack which simplifies WordPress development.', 0, '2019-08-10 15:09:59', '2019-08-10 15:49:57'),
	(180, 'images/hubs/Xamarin.png', 'Xamarin', 'WordPress is a popular content management system, used for websites and blogs.', 0, '2019-08-10 15:09:59', '2019-08-10 15:49:57'),
	(181, 'images/hubs/XML.png', 'XML', 'Xamarin is a platform for developing iOS and Android applications.', 0, '2019-08-10 15:09:59', '2019-08-10 15:49:57');
/*!40000 ALTER TABLE `hubs` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.hub_followers
CREATE TABLE IF NOT EXISTS `hub_followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hub_id` int(11) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.hub_followers: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `hub_followers` DISABLE KEYS */;
INSERT INTO `hub_followers` (`id`, `hub_id`, `follower_id`, `created_at`, `updated_at`) VALUES
	(29, 123, 2, '2019-08-19 13:40:05', '2019-08-19 13:40:05'),
	(35, 22, 2, '2019-08-19 13:44:19', '2019-08-19 13:44:19'),
	(57, 12, 2, '2019-09-26 17:23:02', '2019-09-26 17:23:02');
/*!40000 ALTER TABLE `hub_followers` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.media: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
	(3, 'App\\Models\\User', 2, 'avatars', 'logo1', 'logo1.png', 'image/png', 6727, '[]', '{"generated_conversions":{"small":true,"big":true,"very-big":true}}', '[]', 1, '2019-07-22 13:36:12', '2019-07-22 13:36:13'),
	(4, 'App\\Models\\User', 3, 'avatars', 'logo1', 'logo1.png', 'image/png', 6727, '[]', '{"generated_conversions":{"small":true,"big":true,"very-big":true}}', '[]', 1, '2019-07-22 13:36:12', '2019-07-22 13:36:13'),
	(5, 'App\\Models\\User', 4, 'avatars', 'sabina', 'sabina.jpg', 'image/jpeg', 39956, '[]', '{"generated_conversions":{"small":true,"big":true,"very-big":true}}', '[]', 2, '2019-08-08 02:15:21', '2019-08-08 02:15:23');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.migrations: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_04_29_095442_create_posts_table', 1),
	(4, '2019_04_29_101357_create_author_table', 1),
	(5, '2019_07_14_131637_create_websockets_statistics_entries_table', 1),
	(6, '2019_07_20_133720_create_media_table', 1),
	(7, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
	(8, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
	(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
	(10, '2016_06_01_000004_create_oauth_clients_table', 2),
	(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
	(12, '2019_08_08_014634_create_notifications_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.notifications: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('211a04ea-a1fa-46de-96b0-2e689a271845', 'App\\Notifications\\UserFollowed', 'App\\Models\\User', 4, '{"id":"211a04ea-a1fa-46de-96b0-2e689a271845","read_at":null,"data":{"follower_id":2,"follower_name":"\\u041c\\u0438\\u043a\\u0430\\u0438\\u043b"}}', NULL, '2019-08-08 02:36:37', '2019-08-08 02:36:37'),
	('dfd1efa4-d8d9-4652-a2c0-1e8aef8bb505', 'App\\Notifications\\UserFollowed', 'App\\Models\\User', 4, '{"id":"dfd1efa4-d8d9-4652-a2c0-1e8aef8bb505","read_at":null,"data":{"follower_id":2,"follower_name":"\\u041c\\u0438\\u043a\\u0430\\u0438\\u043b"}}', NULL, '2019-08-08 02:37:18', '2019-08-08 02:37:18');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.notification_status
CREATE TABLE IF NOT EXISTS `notification_status` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `read_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.notification_status: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `notification_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_status` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.posts: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `name`, `body`, `author_id`, `votes`, `created_at`, `updated_at`) VALUES
	(1, 'Let\'s play a little game with Lamoda', 'Привет! Меня зовут Павел Савельев, я руковожу отделом автоматизации бизнес-процессов в Lamoda. Хочу пригласить вас сыграть в PHP Quest. Для участия в квесте необходимо заполнить [анкету](https://tech.lamoda.ru/phpquest?fbclid=IwAR05tcNaXBGprD5w2i0Wdcifhq2TlM3kA0rdwLFXX9XbqE57_NzzSHpACCM). После заполнения анкеты мы вышлем вам на почту головоломку. До 12 августа игроки присылают свои решения на quest@lamoda.ru. Спойлер: у головоломки множество решений, и мы готовы рассмотреть любое.\r\n\r\n  \r\n\r\n![image](https://habrastorage.org/webt/iv/aa/r6/ivaar6szop4s-pjboik4io6px-s.jpeg)\r\n\r\n  \r\n\r\nВсех, кто успешно справился с головоломкой, мы пригласим на финал, который состоится 16 августа в нашем офисе в Москве. Игрокам из других городов мы оплатим билеты и проживание. \r\n\r\n  \r\n\r\n16 августа вас ждет финальное состязание, игры и вечеринка в лучшем офисе по версии [Best Office Awards 2019](http://www.officenext.ru/orientir/article_41034_best-office-awards-2019-itogi/). Победители получат Job Offer от Lamoda в тот же день. \r\n\r\n  \r\n\r\n### Как это будет?\r\n\r\n  \r\n\r\n*   13:00 – 13:30 Регистрация игроков и жеребьевка\r\n*   13:30 – 14:30 Приветственное слово (Павел Савельев, Head of Business process automation; Александр Афенов, Team Lead; Алексей Фельде, Tech Lead)\r\n*   14:30 – 16:30 РНР-поединок\r\n*   16:30 – 17:30 Ланч героев\r\n*   17:30 – 18:30 Сергей Заика, тимлид команды сall-center расскажет, как сложился опыт работы Lamoda c kafka и вручит приз за самый каверзный вопрос\r\n*   18:30 – 19:00 Награждение и вручение Jоb Offers\r\n*   19:00 – 22:00 Вечеринка\r\n\r\n  \r\n\r\nНа PHP в Lamoda написаны ключевые внутренние системы автоматизации: служба доставки, фотостудия, управление платежами, системы управления заказами, а также B2B-направление. Наш [стек технологий](https://radar.thoughtworks.com/?sheetId=https%3A%2F%2Fdocs.google.com%2Fspreadsheets%2Fd%2F1-wAPAa51iDNmz-UkY7GoKpOhbDjNtOogWqvIzJqWHQI%2Fedit%23gid%3D0) — это PHP (пишем на последних версиях), Docker, Symfony 3.4 / 4 в связке с Doctrine 2, PostgreSQL, Kubernetes. Уровень разработки можно оценить по нашему [github.com/lamoda](https://github.com/lamoda) и множеству выступлений на конференциях и митапах. Подробнее о выступлениях и технологиях — на [tech.lamoda.ru](https://tech.lamoda.ru/). \r\n\r\n  \r\n\r\nПо любым вопросам пишите мне на quest@lamoda.ru. \r\n\r\nIt’s time to play the game.', 2, 1, '2019-07-16 14:14:09', '2019-08-13 21:25:45'),
	(41, 'Разработка чат-бота (telegram + youtube)', '__Почему это вообще появилось здесь?__\r\n\r\nНедавно я написал статью о разработке бота на php с использование laravel+botman для telegram. Самое первое, что написали, цитирую, “стрельба из пушки по воробьям”. Я согласен с этим, даже осознавал это во время разработки, но мне был интересен laravel.\r\n\r\n![](https://habrastorage.org/webt/ly/rl/ce/lyrlcenybn_v6he3q2rsxgymiok.jpeg)\r\n\r\nСейчас же я разрабатывал бота на чистом php(без обвязок) и API telegram, а так как статей на подобную тему очень много, то плюсом немного затронем API google(api youtube). Надеюсь, вам будет интересно и полезно узнать о API youtube.\r\n\r\nНебольшое отступление. На данный момент я работаю frontend программистом и с php работаю лишь в свое удовольствие(хотя какое здесь удовольствие). Возможны глупейшие ошибки на стороне сервера, но это работает и мне на момент обучения этого достаточно.\r\n\r\n__Постановка задачи__\r\n\r\nОднажды вечером мне пришла идея связать бота и youtube, на тот момент я даже не подозревал о существовании api google. Требуется бот, который при выходе нового видео на youtube канале будет делать пуш уведомление в моего бота.\r\n\r\nВ принципе, функционал довольно простой, но как работать с youtube? Оказывается решение этой задачи есть у самого google и имя ему google API. Он позволяет работать со всеми приложениями от компании, но меня интересовал лишь youtube.\r\n\r\nНастройка и разработка\r\n\r\nТак получилось, что во время изучения api youtube было найдено куда элегантное решение моей задачи, его предложила сама документация по api. Но сначала о api. Чтобы начать работать с ним вам необходимо перейти в google console и выбрать нужный вам вариант api. После чего путь лежит лишь в документацию или на stackoverflow. Сразу скажу, русского варианта документации нет, уроков тоже нет. Желательно иметь минимальные знания английского языка или действовать методом тыка.\r\n\r\nВыглядит это так. Вы заходите в google console, создаете свой проект и выбираете нужный API.\r\n\r\n![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)\r\n\r\nА теперь к решению проблемы. Во время чтения документации я нашел(google сам показал) сервис pubsubhubbub.appspot.com/subscribe он позволяет связать youtube и ваше приложение. Как работает? Работает по принципу webhook. Вы вставляете youtube канала, который хотите прослушать и каждый раз при каких либо действиях на канале(добавление видео, удаление, изменение) будите получать данные на свой скрипт. \r\n\r\n![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)\r\n\r\nCallback URL — скрипт, который будет принимать данные от google.\r\nTopic URL — канал, который вы хотите прослушивать.\r\n\r\nНу и поле Mode позволяет выбрать, что вы хотите, подписаться или отписаться от прослушивания. \r\n\r\nПриступим к написанию кода, для начала давайте настроим наш скрипт для работы с youtube. Я писал все в одном файле т.к. это был тест + кода там действительно мало. После того, как вы отправите запрос на подписку его нужно подтвердить. Погуглив, можно найти ответ на всеми любимом сайте, один из комментариев на stackoverflow подсказывает.\r\n\r\n```\r\n$video = "null";\r\n\r\nif (isset($_GET[\'hub_challenge\'])) { echo $_REQUEST[\'hub_challenge\']; } \r\nelse { $video = parseYoutubeUpdate(file_get_contents(\'php://input\')); }\r\n\r\nfunction parseYoutubeUpdate($data) {\r\n    $xml 		= simplexml_load_string($data, \'SimpleXMLElement\', LIBXML_NOCDATA);\r\n    $video_id 	= substr((string)$xml->entry->id, 9);\r\n    $channel_id = substr((string)$xml->entry->author->uri, 32);\r\n    $published  = (string)$xml->entry->published;\r\n\r\n    return array(\r\n        \'video_id\'=>$video_id,\r\n        \'channel_id\'=>$channel_id,\r\n        \'published\'=>$published \r\n    );\r\n}\r\n```\r\n\r\nЗдесь мы создаем для удобства переменную в которой будет нужная нам инфа о видео. Две последующие строки, позволяют определить, есть ли возможность подтвердить запрос от pubsubhubbub, если да, то подтверждаем, если нет, то значит, что пришли данные от youtube и нам нужно их обработать. В функции parseYoutubeUpdate мы обрабатывает ответ, получаем всю нам нужную инфу. \r\n\r\nЗдесь стоит сделать отступление и рассказать о особом(на мой взгляд, могу ошибаться) виде данных, которым пользуется youtube(для ответов) он называется, как я понял, atom(не путать с IDE или это обычный xml… опыта с ним было мало). Выглядит он как-то так(небольшой кусок ответа от youtube):\r\n\r\n```\r\n<id>yt:video:eE5mpblYpdY</id>\r\n <yt:videoId>eE5mpblYpdY</yt:videoId>\r\n <yt:channelId>UCGqKr3O5ub-O7zEKx_qeHUQ</yt:channelId>\r\n <title>20b3560a49 1080</title>\r\n <link rel="alternate" href="https://www.youtube.com/watch?v=hgCQ378xNus"/>\r\n <author>\r\n  <name>not Epic</name>\r\n  <uri>https://www.youtube.com/channel/UCGqKr3O5ub-O7zEKx_qeHUQ</uri>\r\n </author>\r\n <published>2019-07-14T05:10:49+00:00</published>\r\n <updated>2019-07-14T05:11:07.600177664+00:00</updated>\r\n```\r\n\r\nВернемся к parseYoutubeUpdate().\r\n\r\nВ функции мы преобразуем ответ в xml формат.\r\nЗаписываем в переменные нужные нам данные.\r\nА после возвращаем массив с этими данными.\r\n\r\nПереходим к telegram. Для начала хочется сказать, это ****** как легче работать нежели с botman. Если вы хотите разрабатывать ботов только под telegram, то не пользуйтесь библиотеками, которые позволяют разрабатывать ботов под разные платформ…. в этом нет смысла… больше проблем будет. API telegram\'a очень понятное и простое даже для новичка, который только познакомился с php и имеет минимальные знания ООП. \r\n\r\nТак, ближе к делу, ближе к коду. Нам нужно создать бота и привязать его к нашему скрипту. Надеюсь, бота вы создать в состоянии. Записываем токен от бота и создаем запрос\r\n\r\n```\r\nconst TOKEN = "6826815*******Yme99*****9kjzgVi*****3S******";\r\n$url = \'https://api.telegram.org/bot\' . TOKEN . \'/sendMessage\';\r\n```\r\n\r\nТеперь нам необходимо лишь отправить запрос на сервера telegram.\r\n\r\n```\r\n$params = [\r\n	\'chat_id\' =>712531723,\r\n  	"text" => $linkVideo,\r\n];\r\n\r\n$url = $url . \'?\' . http_build_query($params);\r\n```\r\n\r\nСоздаем необходимые параметры, для меня это id чата(если выводит на продакшен бота, то необходимо сохранять все id в БД чтобы спамить) и текстовое сообщение.\r\n\r\nКак вы могли заметить, я передаю ссылку как простое сообщение, а не видео. Как я понял, телеграм передает видео лишь в том случае, если оно загружено на сервер, а иначе нет… + Мне необходимо видеть превью картинку для видео.\r\n\r\nТеперь наш бот будет получать уведомления о выходе/редактирование видео. Выглядит это как-то так:\r\n\r\nimage\r\n\r\nGame over. У меня все на этом. Самый большой недостаток этого кода в том, что он находится в одном файле, но кода на 10 строк для меня не имела смысла разделять.\r\n\r\nИсходники — [github](https://github.com/EpicLegend/telegrambot-youtube-).', 2, 0, '2019-08-15 19:54:39', '2019-08-15 19:54:39'),
	(42, 'Разработка чат-бота (telegram + youtube)', '# __Почему это вообще появилось здесь?__\r\n\r\nНедавно я написал статью о разработке бота на php с использование laravel+botman для telegram. Самое первое, что написали, цитирую, “стрельба из пушки по воробьям”. Я согласен с этим, даже осознавал это во время разработки, но мне был интересен laravel.\r\n\r\n![](https://habrastorage.org/webt/ly/rl/ce/lyrlcenybn_v6he3q2rsxgymiok.jpeg)\r\n\r\nСейчас же я разрабатывал бота на чистом php(без обвязок) и API telegram, а так как статей на подобную тему очень много, то плюсом немного затронем API google(api youtube). Надеюсь, вам будет интересно и полезно узнать о API youtube.\r\n\r\nНебольшое отступление. На данный момент я работаю frontend программистом и с php работаю лишь в свое удовольствие(хотя какое здесь удовольствие). Возможны глупейшие ошибки на стороне сервера, но это работает и мне на момент обучения этого достаточно.\r\n\r\n# __Постановка задачи__\r\n\r\nОднажды вечером мне пришла идея связать бота и youtube, на тот момент я даже не подозревал о существовании api google. Требуется бот, который при выходе нового видео на youtube канале будет делать пуш уведомление в моего бота.\r\n\r\nВ принципе, функционал довольно простой, но как работать с youtube? Оказывается решение этой задачи есть у самого google и имя ему google API. Он позволяет работать со всеми приложениями от компании, но меня интересовал лишь youtube.\r\n\r\nНастройка и разработка\r\n\r\nТак получилось, что во время изучения api youtube было найдено куда элегантное решение моей задачи, его предложила сама документация по api. Но сначала о api. Чтобы начать работать с ним вам необходимо перейти в google console и выбрать нужный вам вариант api. После чего путь лежит лишь в документацию или на stackoverflow. Сразу скажу, русского варианта документации нет, уроков тоже нет. Желательно иметь минимальные знания английского языка или действовать методом тыка.\r\n\r\nВыглядит это так. Вы заходите в google console, создаете свой проект и выбираете нужный API.\r\n\r\n![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)\r\n\r\nА теперь к решению проблемы. Во время чтения документации я нашел(google сам показал) сервис pubsubhubbub.appspot.com/subscribe он позволяет связать youtube и ваше приложение. Как работает? Работает по принципу webhook. Вы вставляете youtube канала, который хотите прослушать и каждый раз при каких либо действиях на канале(добавление видео, удаление, изменение) будите получать данные на свой скрипт. \r\n\r\n![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)\r\n\r\nCallback URL — скрипт, который будет принимать данные от google.\r\nTopic URL — канал, который вы хотите прослушивать.\r\n\r\nНу и поле Mode позволяет выбрать, что вы хотите, подписаться или отписаться от прослушивания. \r\n\r\nПриступим к написанию кода, для начала давайте настроим наш скрипт для работы с youtube. Я писал все в одном файле т.к. это был тест + кода там действительно мало. После того, как вы отправите запрос на подписку его нужно подтвердить. Погуглив, можно найти ответ на всеми любимом сайте, один из комментариев на stackoverflow подсказывает.\r\n\r\n```\r\n$video = "null";\r\n\r\nif (isset($_GET[\'hub_challenge\'])) { echo $_REQUEST[\'hub_challenge\']; } \r\nelse { $video = parseYoutubeUpdate(file_get_contents(\'php://input\')); }\r\n\r\nfunction parseYoutubeUpdate($data) {\r\n    $xml 		= simplexml_load_string($data, \'SimpleXMLElement\', LIBXML_NOCDATA);\r\n    $video_id 	= substr((string)$xml->entry->id, 9);\r\n    $channel_id = substr((string)$xml->entry->author->uri, 32);\r\n    $published  = (string)$xml->entry->published;\r\n\r\n    return array(\r\n        \'video_id\'=>$video_id,\r\n        \'channel_id\'=>$channel_id,\r\n        \'published\'=>$published \r\n    );\r\n}\r\n```\r\n\r\nЗдесь мы создаем для удобства переменную в которой будет нужная нам инфа о видео. Две последующие строки, позволяют определить, есть ли возможность подтвердить запрос от pubsubhubbub, если да, то подтверждаем, если нет, то значит, что пришли данные от youtube и нам нужно их обработать. В функции parseYoutubeUpdate мы обрабатывает ответ, получаем всю нам нужную инфу. \r\n\r\nЗдесь стоит сделать отступление и рассказать о особом(на мой взгляд, могу ошибаться) виде данных, которым пользуется youtube(для ответов) он называется, как я понял, atom(не путать с IDE или это обычный xml… опыта с ним было мало). Выглядит он как-то так(небольшой кусок ответа от youtube):\r\n\r\n```\r\n<id>yt:video:eE5mpblYpdY</id>\r\n <yt:videoId>eE5mpblYpdY</yt:videoId>\r\n <yt:channelId>UCGqKr3O5ub-O7zEKx_qeHUQ</yt:channelId>\r\n <title>20b3560a49 1080</title>\r\n <link rel="alternate" href="https://www.youtube.com/watch?v=hgCQ378xNus"/>\r\n <author>\r\n  <name>not Epic</name>\r\n  <uri>https://www.youtube.com/channel/UCGqKr3O5ub-O7zEKx_qeHUQ</uri>\r\n </author>\r\n <published>2019-07-14T05:10:49+00:00</published>\r\n <updated>2019-07-14T05:11:07.600177664+00:00</updated>\r\n```\r\n\r\nВернемся к parseYoutubeUpdate().\r\n\r\nВ функции мы преобразуем ответ в xml формат.\r\nЗаписываем в переменные нужные нам данные.\r\nА после возвращаем массив с этими данными.\r\n\r\nПереходим к telegram. Для начала хочется сказать, это ****** как легче работать нежели с botman. Если вы хотите разрабатывать ботов только под telegram, то не пользуйтесь библиотеками, которые позволяют разрабатывать ботов под разные платформ…. в этом нет смысла… больше проблем будет. API telegram\'a очень понятное и простое даже для новичка, который только познакомился с php и имеет минимальные знания ООП. \r\n\r\nТак, ближе к делу, ближе к коду. Нам нужно создать бота и привязать его к нашему скрипту. Надеюсь, бота вы создать в состоянии. Записываем токен от бота и создаем запрос\r\n\r\n```\r\nconst TOKEN = "6826815*******Yme99*****9kjzgVi*****3S******";\r\n$url = \'https://api.telegram.org/bot\' . TOKEN . \'/sendMessage\';\r\n```\r\n\r\nТеперь нам необходимо лишь отправить запрос на сервера telegram.\r\n\r\n```\r\n$params = [\r\n	\'chat_id\' =>712531723,\r\n  	"text" => $linkVideo,\r\n];\r\n\r\n$url = $url . \'?\' . http_build_query($params);\r\n```\r\n\r\nСоздаем необходимые параметры, для меня это id чата(если выводит на продакшен бота, то необходимо сохранять все id в БД чтобы спамить) и текстовое сообщение.\r\n\r\nКак вы могли заметить, я передаю ссылку как простое сообщение, а не видео. Как я понял, телеграм передает видео лишь в том случае, если оно загружено на сервер, а иначе нет… + Мне необходимо видеть превью картинку для видео.\r\n\r\nТеперь наш бот будет получать уведомления о выходе/редактирование видео. Выглядит это как-то так:\r\n\r\nimage\r\n\r\nGame over. У меня все на этом. Самый большой недостаток этого кода в том, что он находится в одном файле, но кода на 10 строк для меня не имела смысла разделять.\r\n\r\nИсходники — [github](https://github.com/EpicLegend/telegrambot-youtube-).', 2, 0, '2019-08-15 20:03:59', '2019-08-15 20:03:59'),
	(43, 'JavaScript promise nədir? Nə işə yarayır.', 'Salam dostlar, bu gün sizlərlə bir yerdə javascript-də promise-in nə olduğunu, necə istifadə edildiyini öyrənəcəyik.\r\n\r\n![](https://miro.medium.com/max/600/1*5r2Hf1hKFt8sTGD5TLqFOw.png)\r\n\r\nAdına görə promise sözü ingilis dilindən tərcüməsi söz verməkdir. Gəlin məsələyə biraz normal həyatda qarşılaşdığımız hallarla baxaq temanı tam və aydın başa düşək :D .\r\n\r\nTəsəvvür edin getmisiniz pizza verilən bir məkana və pizza sifariş verdiniz. Sifarişinizi verəndən sonra ofisiant sizə sifarişinizi izləmək üçün kiçik bir aparat verdi. Bu kiçik aparat pizza verilən məkanın pizzanı sizə verilməsi üçün verilən sözü (promise) təmsil edir. Həmin kiçik aparatın pizza haqqında hər hansı bir bildiriş verənə kimi gözləmə (pending) vəziyyətidir. Aparata pizza bişib tam hazirdı və heç bir problem olmayıb uğurlu (resolved) ya da ki, pizza hazirlana bilməyib problem yaranıb uğursuz (rejected) bildirişi gəlir. Əgər sifariş uğurla bitirsə pizzanı bəh-bəhlə yeyəcəksiniz ( pizzadan danışdım ürəyim pizza istədi lap :( . Nəysə mövzuya dönək ). Əgər problem yaranıbsa məkanın sahibinə problemi bildirib şüvənlik edirsiz (error handling). Beləliklə məkan sahibi işləri paralel (sinxron) apara bilir.\r\n\r\nBəs bu promise-i javasciptdə niyə çox esitməmisik? niyə istifadə eləmirik? suallarına cavab tapaq. Promise EcmaScript 6 ilə javascript dünyasına giriş edib. Digər bir məsələ ise EcmaScript 5-də ən çox XMLHttpRequest API istifadə etməyimizdir (fikrimcə). XMLHttpRequest API promise API istifadə eləmir. Lakin promise istifadə edən bir neçə native API var\r\n\r\n* Battery API\r\n* fetch API\r\n* ServiceWorkers\r\n\r\nBu yerdə başqa bir sual yaranır. __Callback__ yoxsa __Promise__ ?\r\n\r\n![Callback vs Promise](https://miro.medium.com/max/700/1*_THSHhI3oJGD5ehM3M7Hpw.jpeg)\r\n\r\nİlk öncə callback-in nə olduğunu yadımıza salaq. Callback en sadə deyişlə hər hansı bir funksiyaya parametr olaraq verdiyimiz və sonra geri çağıracağımız funksiyalara deyilir.İstənilən nəticə olan zaman və ya iş bitən zaman işi bitər. Callback-lər haqqında daha geniş bilgi üçün aşağıdakı məqaləyə zad edə bilərsiniz.\r\n\r\n__Javascript-də callback-lər: 1-ci hissə__\r\n\r\nBurdakı əsas tema callback-ə güvənə bilərikmi? Əmanətimizə sahib çixa biləcəklərmi? Əmanətə xəyanət edərlərmi, callback-lərimizi çağırmamış başqa bir yad yerdən çağrıla bilərmi (Başqa bir API funksiyasında məsələn) ? .\r\n\r\nCallback-lərə çoxda güvənməməyimizin əsas səbəbləri aşağıdakılardır.\r\n\r\n* Callback-lərin zamanından tez çağrilması\r\n* Callback-in heç çağrılmaması\r\n* Callback-in gözləniləndən az və ya çox çağrılması\r\n* Lazım olan parametrləin doğru şəkildə almaması\r\n* Xətaların görsənməməsi.\r\n\r\nPromise callback-lərin bu tipli sıxıntılı tərəflərini tamamlamaq üçün təklif edilən bir sistemdir.\r\n\r\nGəlin birazda kod tərəfinə baxaq. Elə yuxarıda çəkdiyimiz misala uyğun girişək temaya :D.\r\n\r\n```\r\nconst pizza_sifarisi= new Promise((resolve,reject)=>{ \r\n   let her_sey_eladimi = true;  \r\n   if (her_sey_eladimi) {\r\n       resolve("Hər şey yolundadı pizza hazırdı. Nyam nyam time");\r\n   }else{\r\n       reject("Problemlə qarşılaşdıq. Sifarişiniz tamamlana bilmədi. Şüvənlik time :D"); \r\n});\r\npizza_sifarisi.then((data)=>{ \r\n    console.log(data); \r\n});\r\n```\r\nGördüyümüz kimi pizza sifarişini verdik. cavabı then funksiyası ilə alırıq. Bir dəqiqə bəs hər hansı bir yerdə problem yaransa necə xəbərimiz olacaq? O zaman temaya catch daxil olur. Əgər gedişatda problem olarsa catch funksiyası işləyəcək. Və yaranan problemin səbəbi həmin funksiyaya parametr kimi gələcək.\r\n\r\n```\r\nconst pizza_sifarisi= new Promise((resolve,reject)=>{ \r\n   let her_sey_eladimi = true;  \r\n   if (her_sey_eladimi) {\r\n       resolve("Hər şey yolundadı pizza hazırdı. Nyam nyam time");\r\n   }else{\r\n       reject("Problemlə qarşılaşdıq. Sifarişiniz tamamlana bilmədi. Şüvənlik time :D"); \r\n});\r\npizza_sifarisi.then((data)=>{ \r\n    console.log(data); // Hər şey yolundadı pizza hazırdı. Nyam nyam time\r\n}).catch((err)=>{     \r\n   console.log(err); // Problemlə qarşılaşdıq. Sifarişiniz tamamlana bilmədi. Şüvənlik time :D\r\n});\r\n```\r\n\r\nElavə olaraq Promise-in digər işə yararlı metodları var. Bunlarda bonus məlumatlar. Hadi biraz əziyyət çəkin gerisin siz araşdirib oyrənin :) .\r\n\r\n* Promise.all\r\n* Promise.allSettled\r\n* Promise.race\r\n\r\nTemanı yekunlaşdırmaq adı ilə son cümlələri də deyim. Promise gün keçdikcə məhşurlaşan bir temadı. Buna görə də front-end developerlərə bu temanı dərindən öyrənmələrini məsləhət görürəm. Bundan əlavə Node.js proqramlaşdırma dilinə promise teması üçün başqa bir dünyasıda demək olar (Promise sistemi dilin kökündə olduğu üçün).\r\n\r\nMəndən bu qədər dostlar. Happy coding zad :)', 2, 0, '2019-08-15 20:10:55', '2019-08-15 20:10:55'),
	(44, 'SQL index nədir? necə işləyir?', 'Salam dostlar, bu gün biz bir çoxlarımızın bilibdə işlətmədiyi, işlədibsə də yalnış işlətdiyi, varlığından belə xəbəri olmayan index -in nə olduğunu öyrənəcəyik.\r\n\r\n---\r\n\r\nƏgər verilənlər bazası ilə işləyəcəksinizsə __indexləmə__ sözünü çox eşidəcəksiniz. Bəs nədir axı bu hamının dilindən düşməyən indexləmə? İndexləmə deyəndə ağlımıza nə gəlməlidir? Beynimizdə necə təsəvvür etməliyik?\r\n\r\n![](https://miro.medium.com/max/600/1*eQXmQnQgNzq5wnMfPHWGfQ.jpeg)\r\n\r\nƏslində indexləmə işini biz öz gündəlik həyatımızda istifadə edirik. Təsəvvür edin qarşınızda bir hekayə kitabı var. Mən sizdən həmin kitabda baş qəhrəmanın yaralandığı hissəsini oxu desəm? Siz nə edəcəksiniz? Məcbur kitabın bütün səhifələrinə baxacaqsınız. Hekayədə mən istədiyim hissəni oxumaq üçün. Fərz edək ki, baxdınız və oxudunuz. Bu sizin 10 dəqiqənizi aldi.\r\n\r\nİndi isə mən yenə sizdən həmin kitabda baş qəhrəmanın yaralandığı hissəsini oxu desəm? Amma bu dəfə həmin hissə kitabın 15-ci səhifəsindədir desəm? Siz nə edəcəksiniz? Heç fikirləşmədən 15-ci səhifəni açıb, həmin hissəni oxuyacaqsınız. Və bu sizin heç 1 dəqiqənizi də almayacaq.\r\n\r\nBunun kimi gündəlik həyatımızda çox şeyləri nümunə göstərmək olar. İndexləmə də bizə əlimizdəki məlumatı daha surətli tapmağa imkan verir.\r\n\r\n# __Bəs index-i necə yaradırlar?__\r\n\r\n```\r\nCREATE INDEX index_adı ON table_adı (sütun1, sütun2, ...);\r\n```\r\n\r\n> Verilənlər bazasında hər yenidən yaratma, dəyişiklik edilmə və silmə hadisələrindən sonra index yenidən yaradıldığina görə hər gördüyümüz sütuna index vermək olmaz. İstifadə olunmayan sütunları indexləmək və həddən artıq indexləmə performansı aşağı sala bilər.\r\n\r\n# __Bəs bu indexləmə necə işləyir?__\r\n\r\nİndex-lərin işləmə alqoritmi proqramlaşdırmada çox istifadə olunan və verilənlər bazasının önəmli məsələlərindən biri olan ağac alqoritmidir.\r\nTree adlandırılan bu alqoritmin bir çox növü olmasına baxmayaraq biz sql serverin istifadə elədiyi B-Tree (Balanced Tree –Balanslı Ağac)-dan danışacam.\r\n\r\n![](https://miro.medium.com/max/511/1*pVU4nGLEmv5PaQ9BGcB01A.gif)\r\n\r\nTree alqoritmlərində ən başda __Root__ yəni kök olur. Root-un altında isə normalda bir və ya birdən çox __Intermediate level__ (Orta səviyyə) dediyimiz hissə olur. Əgər __Intermediate level__ dediyimiz hissənin altında yeni bir hissə yoxdursa, o zaman __Intermediate level__ dediyimiz hissəyə Leaf (yarpaq) deyilir.\r\n\r\n__Root-leaf__ əlaqəsi proqramlaşdırmada __parent-child əlaqəsinə__ bənzəyir.\r\n\r\nİndi isə gəlin B-Tree alqoritminin məntiqini anlamaq üçün bir nümunəyə baxaq. 1-dən 200-ə qədər nömrələnmiş olan qutuların içində 150 nömrəli qutunu tapmağa çalışaq. Əgər indexləmədən istifadə eləməsək 1-dən 150-yə qədər bütün qutulara baxmağa məcburuq. Amma aşağıdaki şəkildəki kimi qutuları B-Tree olaraq sıralasaq axtardığımızı daha tez tapa bilərik.\r\n\r\n![](https://miro.medium.com/max/614/1*dm6ZcFc67MkTR_hxGyvcsg.jpeg)\r\n\r\nŞəkildəki kimi 150 nömrəli qutunu 28 dəfə oxumaqla tapırıq. Əvvəlcə 150 dəfə baxmaq lazım idisə B-Tree ilə 28 dəfə baxmaq lazım gələcək. Beləcə həm yaddaşı cox yükləmirik həm də surətli şəkildə istədiyimizi tapırıq.\r\n\r\n# __İndex növləri__\r\nSQL-də indexlərin aşagıdakı növləri vardır.\r\n\r\n![](https://miro.medium.com/max/354/1*BYnb9MoUzJmo7OI9P8AruQ.gif)\r\n\r\nİçində ən önəmli olan Clustered Index və Non-Clustered Index haqda novbəti məqalələrdə ətraflı danışacayıq. Bizi izləməkdə davam edin 🙂.', 2, 0, '2019-08-15 20:24:51', '2019-08-15 20:28:36'),
	(53, 'TEST', '>test', 2, 0, '2019-08-18 06:09:06', '2019-08-21 13:21:14'),
	(54, 'БЛОК', '<blockquote class="twitter-tweet"><p lang="az" dir="ltr">Sunsets don&#39;t get much better than this one over <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>. <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw">#nature</a> <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw">#sunset</a> <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a></p>&mdash; US Department of the Interior (@Interior) <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw">May 5, 2014</a></blockquote>\r\n\r\n<script>alert(1)</script>\r\n\r\n<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/B1ZCnFsHxX9/" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/B1ZCnFsHxX9/" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Посмотреть эту публикацию в Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/B1ZCnFsHxX9/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Публикация от Learn UX/UI design (@ui_gradient)</a> <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2019-08-20T15:43:58+00:00">20 Авг 2019 в 8:43 PDT</time></p></div></blockquote>', 2, 1, '2019-08-20 16:07:20', '2019-08-21 19:18:08'),
	(55, 'Markdown Test', '---\r\n__Advertisement :)__\r\n\r\n- __[pica](https://nodeca.github.io/pica/demo/)__ - high quality and fast image\r\n  resize in browser.\r\n- __[babelfish](https://github.com/nodeca/babelfish/)__ - developer friendly\r\n  i18n with plurals support and easy syntax.\r\n\r\nYou will like those projects!\r\n\r\n---\r\n\r\n# h1 Heading 8-)\r\n## h2 Heading\r\n### h3 Heading\r\n#### h4 Heading\r\n##### h5 Heading\r\n###### h6 Heading\r\n\r\n\r\n## Horizontal Rules\r\n\r\n___\r\n\r\n---\r\n\r\n***\r\n\r\n\r\n## Typographic replacements\r\n\r\nEnable typographer option to see result.\r\n\r\n(c) (C) (r) (R) (tm) (TM) (p) (P) +-\r\n\r\ntest.. test... test..... test?..... test!....\r\n\r\n!!!!!! ???? ,,  -- ---\r\n\r\n"Smartypants, double quotes" and \'single quotes\'\r\n\r\n\r\n## Emphasis\r\n\r\n**This is bold text**\r\n\r\n__This is bold text__\r\n\r\n*This is italic text*\r\n\r\n_This is italic text_\r\n\r\n~~Strikethrough~~\r\n\r\n\r\n## Blockquotes\r\n\r\n\r\n> Blockquotes can also be nested...\r\n>> ...by using additional greater-than signs right next to each other...\r\n> > > ...or with spaces between arrows.\r\n\r\n\r\n## Lists\r\n\r\nUnordered\r\n\r\n+ Create a list by starting a line with `+`, `-`, or `*`\r\n+ Sub-lists are made by indenting 2 spaces:\r\n  - Marker character change forces new list start:\r\n    * Ac tristique libero volutpat at\r\n    + Facilisis in pretium nisl aliquet\r\n    - Nulla volutpat aliquam velit\r\n+ Very easy!\r\n\r\nOrdered\r\n\r\n1. Lorem ipsum dolor sit amet\r\n2. Consectetur adipiscing elit\r\n3. Integer molestie lorem at massa\r\n\r\n\r\n1. You can use sequential numbers...\r\n1. ...or keep all the numbers as `1.`\r\n\r\nStart numbering with offset:\r\n\r\n57. foo\r\n1. bar\r\n\r\n\r\n## Code\r\n\r\nInline `code`\r\n\r\nIndented code\r\n\r\n    // Some comments\r\n    line 1 of code\r\n    line 2 of code\r\n    line 3 of code\r\n\r\n\r\nBlock code "fences"\r\n\r\n```\r\nSample text here...\r\n```\r\n\r\nSyntax highlighting\r\n\r\n``` js\r\nvar foo = function (bar) {\r\n  return bar++;\r\n};\r\n\r\nconsole.log(foo(5));\r\n```\r\n\r\n## Tables\r\n\r\n| Option | Description |\r\n| ------ | ----------- |\r\n| data   | path to data files to supply the data that will be passed into templates. |\r\n| engine | engine to be used for processing templates. Handlebars is the default. |\r\n| ext    | extension to be used for dest files. |\r\n\r\nRight aligned columns\r\n\r\n| Option | Description |\r\n| ------:| -----------:|\r\n| data   | path to data files to supply the data that will be passed into templates. |\r\n| engine | engine to be used for processing templates. Handlebars is the default. |\r\n| ext    | extension to be used for dest files. |\r\n\r\n\r\n## Links\r\n\r\n[link text](http://dev.nodeca.com)\r\n\r\n[link with title](http://nodeca.github.io/pica/demo/ "title text!")\r\n\r\nAutoconverted link https://github.com/nodeca/pica (enable linkify to see)\r\n\r\n\r\n## Images\r\n\r\n![Minion](https://octodex.github.com/images/minion.png)\r\n![Stormtroopocat](https://octodex.github.com/images/stormtroopocat.jpg "The Stormtroopocat")\r\n\r\nLike links, Images also have a footnote style syntax\r\n\r\n![Alt text][id]\r\n\r\nWith a reference later in the document defining the URL location:\r\n\r\n[id]: https://octodex.github.com/images/dojocat.jpg  "The Dojocat"\r\n\r\n\r\n## Plugins\r\n\r\nThe killer feature of `markdown-it` is very effective support of\r\n[syntax plugins](https://www.npmjs.org/browse/keyword/markdown-it-plugin).\r\n\r\n\r\n### [Emojies](https://github.com/markdown-it/markdown-it-emoji)\r\n\r\n> Classic markup: :wink: :crush: :cry: :tear: :laughing: :yum:\r\n>\r\n> Shortcuts (emoticons): :-) :-( 8-) ;)\r\n\r\nsee [how to change output](https://github.com/markdown-it/markdown-it-emoji#change-output) with twemoji.\r\n\r\n\r\n### [Subscript](https://github.com/markdown-it/markdown-it-sub) / [Superscript](https://github.com/markdown-it/markdown-it-sup)\r\n\r\n- 19^th^\r\n- H~2~O\r\n\r\n\r\n### [\\<ins>](https://github.com/markdown-it/markdown-it-ins)\r\n\r\n++Inserted text++\r\n\r\n\r\n### [\\<mark>](https://github.com/markdown-it/markdown-it-mark)\r\n\r\n==Marked text==\r\n\r\n\r\n### [Footnotes](https://github.com/markdown-it/markdown-it-footnote)\r\n\r\nFootnote 1 link[^first].\r\n\r\nFootnote 2 link[^second].\r\n\r\nInline footnote^[Text of inline footnote] definition.\r\n\r\nDuplicated footnote reference[^second].\r\n\r\n[^first]: Footnote **can have markup**\r\n\r\n    and multiple paragraphs.\r\n\r\n[^second]: Footnote text.\r\n\r\n\r\n### [Definition lists](https://github.com/markdown-it/markdown-it-deflist)\r\n\r\nTerm 1\r\n\r\n:   Definition 1\r\nwith lazy continuation.\r\n\r\nTerm 2 with *inline markup*\r\n\r\n:   Definition 2\r\n\r\n        { some code, part of Definition 2 }\r\n\r\n    Third paragraph of definition 2.\r\n\r\n_Compact style:_\r\n\r\nTerm 1\r\n  ~ Definition 1\r\n\r\nTerm 2\r\n  ~ Definition 2a\r\n  ~ Definition 2b\r\n\r\n\r\n### [Abbreviations](https://github.com/markdown-it/markdown-it-abbr)\r\n\r\nThis is HTML abbreviation example.\r\n\r\nIt converts "HTML", but keep intact partial entries like "xxxHTMLyyy" and so on.\r\n\r\n*[HTML]: Hyper Text Markup Language\r\n\r\n### [Custom containers](https://github.com/markdown-it/markdown-it-container)\r\n\r\n::: warning\r\n*here be dragons*\r\n:::', 2, -1, '2019-08-21 14:09:57', '2019-08-21 19:17:56');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.posts_views
CREATE TABLE IF NOT EXISTS `posts_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `session_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `agent` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`,`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.posts_views: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `posts_views` DISABLE KEYS */;
INSERT INTO `posts_views` (`id`, `post_id`, `title`, `url`, `session_id`, `user_id`, `ip`, `agent`, `created_at`, `updated_at`) VALUES
	(19, 1, 'Let\'s play a little game with Lamoda', 'http://127.0.0.1:8000/post/1', '0cEsy7TSYvzVWEzFIMKi33QgD9onS5zzHXK6ty95', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-12 22:04:38', '2019-08-12 22:04:38'),
	(20, 40, 'PHP-Дайджест № 162 (1 – 12 августа 2019)', 'http://127.0.0.1:8000/post/40', '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-15 19:24:44', '2019-08-15 19:24:44'),
	(21, 41, 'Разработка чат-бота (telegram + youtube)', 'http://127.0.0.1:8000/post/41', '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-15 19:54:43', '2019-08-15 19:54:43'),
	(22, 42, 'Разработка чат-бота (telegram + youtube)', 'http://127.0.0.1:8000/post/42', '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-15 20:04:03', '2019-08-15 20:04:03'),
	(23, 43, 'JavaScript promise nədir? Nə işə yarayır.', 'http://127.0.0.1:8000/post/43', '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-15 20:10:59', '2019-08-15 20:10:59'),
	(24, 44, 'SQL index nədir? necə işləyir?', 'http://127.0.0.1:8000/post/44', '7cAb4AG3hFiRnHU6MBDWFIsn3zI4qKidDBc7KD54', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-15 20:24:55', '2019-08-15 20:24:55'),
	(25, 45, 'TEST', 'http://127.0.0.1:8000/post/45', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:25:26', '2019-08-16 04:25:26'),
	(26, 46, 'TEST2', 'http://127.0.0.1:8000/post/46', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:27:03', '2019-08-16 04:27:03'),
	(27, 47, 'TEST 3', 'http://127.0.0.1:8000/post/47', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:32:55', '2019-08-16 04:32:55'),
	(28, 48, 'TEST 4', 'http://127.0.0.1:8000/post/48', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:34:53', '2019-08-16 04:34:53'),
	(29, 49, 'TEST 5', 'http://127.0.0.1:8000/post/49', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:35:19', '2019-08-16 04:35:19'),
	(30, 50, 'TEST 23', 'http://127.0.0.1:8000/post/50', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:57:31', '2019-08-16 04:57:31'),
	(31, 51, 'haha', 'http://127.0.0.1:8000/post/51', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 04:59:28', '2019-08-16 04:59:28'),
	(32, 52, 'NEW TEST', 'http://127.0.0.1:8000/post/52', 'kcJU4lCdPRdRyzeoAelARHlA2tTzxogbPaoLOHth', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-16 05:15:54', '2019-08-16 05:15:54'),
	(33, 53, 'TEST', 'http://127.0.0.1:8000/post/53', 'kJRcO73ahkl7WmNGfpPmBZt7KlRQgdWs5Ioz11oI', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-19 15:52:53', '2019-08-19 15:52:53'),
	(34, 54, 'БЛОК', 'http://127.0.0.1:8000/post/54', 'rixic4xFCBQPjp1aqttw5XU7kmPlaOJroK8999eu', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-20 16:07:32', '2019-08-20 16:07:32'),
	(35, 55, 'Markdown Test', 'http://127.0.0.1:8000/post/55', 'wQdnAhAplMnQIOwRtfhfz2U4oQoaTfVpQVMu1nza', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 OPR/62.0.3331.116', '2019-08-21 14:10:09', '2019-08-21 14:10:09');
/*!40000 ALTER TABLE `posts_views` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.post_favorites
CREATE TABLE IF NOT EXISTS `post_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.post_favorites: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `post_favorites` DISABLE KEYS */;
INSERT INTO `post_favorites` (`id`, `follower_id`, `post_id`, `created_at`, `updated_at`) VALUES
	(33, 2, 44, '2019-08-16 02:40:26', '2019-08-16 02:40:26');
/*!40000 ALTER TABLE `post_favorites` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.post_hubs
CREATE TABLE IF NOT EXISTS `post_hubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posts_id` int(11) DEFAULT NULL,
  `hub_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.post_hubs: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `post_hubs` DISABLE KEYS */;
INSERT INTO `post_hubs` (`id`, `posts_id`, `hub_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 123, '2019-07-24 00:27:02', '2019-08-15 18:50:23'),
	(2, 1, 130, '2019-07-25 21:03:25', '2019-08-15 18:51:28'),
	(3, 1, 25, '2019-07-25 21:03:29', '2019-07-25 21:03:29'),
	(4, 1, 22, '2019-07-25 21:03:34', '2019-07-25 21:03:34'),
	(5, 1, 45, '2019-07-25 21:03:38', '2019-07-25 21:03:38'),
	(6, 39, 1, '2019-08-01 00:57:56', '2019-08-12 20:18:32'),
	(7, 8, 31, '2019-08-02 21:00:12', '2019-08-02 21:00:12'),
	(8, 54, 12, '2019-08-21 13:57:28', '2019-08-21 13:57:49');
/*!40000 ALTER TABLE `post_hubs` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.post_votes
CREATE TABLE IF NOT EXISTS `post_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы devhub.post_votes: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `post_votes` DISABLE KEYS */;
INSERT INTO `post_votes` (`id`, `user_id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
	(115, 2, 1, 1, '2019-08-13 21:25:41', '2019-08-13 21:25:45'),
	(116, 2, 55, 0, '2019-08-21 19:17:55', '2019-08-21 19:17:55'),
	(117, 2, 54, 1, '2019-08-21 19:18:07', '2019-08-21 19:18:07');
/*!40000 ALTER TABLE `post_votes` ENABLE KEYS */;

-- Дамп структуры для таблица devhub.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT 0,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы devhub.users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `name`, `about`, `rating`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'hose1021', 'Микаил', 'Web Developer', 2, 'hose1021@gmail.com', NULL, '$2y$10$EQiuMc2cJCELIPps9ASqE.c0w0bmZfNdMrKzmIsDV2RQ0hYBKxjhq', NULL, '2019-07-22 13:36:12', '2019-08-21 19:18:08'),
	(3, 'asd', 'asd', 'Web Developer', 0, '', NULL, '', NULL, '2019-07-25 23:14:08', '2019-07-31 19:25:32'),
	(4, 'test', 'test', NULL, 0, 'test@test.com', NULL, '$2y$10$3FqZRIGM8KLEhBMpIPS/k.24bLosg2IX4b0ehWUDP.5kzNCZDeSCe', NULL, '2019-08-08 02:15:21', '2019-08-08 02:30:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
