<?php

use Illuminate\Database\Seeder;

class LocalizationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('localization')->delete();
        
        \DB::table('localization')->insert(array (
            0 => 
            array (
                'id' => 1,
                'idx' => 1,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => '3D modeling is the process of virtually developing the surface and structure of a 3D object.',
                'az' => '3D modelləşdirmə, 3D bir obyektin səthi və quruluşunu faktiki olaraq inkişaf etdirmə prosesidir.',
            ),
            1 => 
            array (
                'id' => 2,
                'idx' => 2,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Ajax is a technique for creating interactive web applications.',
                'az' => 'Ajax, interaktiv veb tətbiqetmələri yaratmaq üçün bir texnikadır.',
            ),
            2 => 
            array (
                'id' => 3,
                'idx' => 3,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Algorithms are self-contained sequences that carry out a variety of tasks.',
                'az' => 'Alqoritmlər müxtəlif vəzifələri yerinə yetirən öz-özünə qurulmuş ardıcıllıqlardır.',
            ),
            3 => 
            array (
                'id' => 4,
                'idx' => 4,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Amp is a non-blocking concurrency framework for PHP.',
                'az' => 'Amp, PHP üçün blok olmayan bir uyğunluq çərçivəsidir.',
            ),
            4 => 
            array (
                'id' => 5,
                'idx' => 5,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Android is an operating system built by Google designed for mobile devices.',
                'az' => 'Android, mobil qurğular üçün hazırlanmış Google tərəfindən qurulmuş bir əməliyyat sistemidir.',
            ),
            5 => 
            array (
                'id' => 6,
                'idx' => 6,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Angular is an open source web application platform.',
                'az' => 'Angular açıq mənbə veb tətbiq platformasıdır.',
            ),
            6 => 
            array (
                'id' => 7,
                'idx' => 7,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Ansible is a simple and powerful automation engine.',
                'az' => 'Ansible sadə və güclü bir avtomatlaşdırma motorudur.',
            ),
            7 => 
            array (
                'id' => 8,
                'idx' => 8,
                'model' => 'hubs',
                'ru' => NULL,
            'en' => 'An API (Application Programming Interface) is a collection of protocols and subroutines for building software.',
            'az' => 'Bir API (Tətbiq Proqramlaşdırma İnterfeysi), proqram təminatının qurulması üçün protokolların və alt proqramların toplusudur.',
            ),
            8 => 
            array (
                'id' => 9,
                'idx' => 9,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Arduino is an open source hardware and software company and maker community.',
                'az' => 'Arduino açıq mənbə aparat və proqram şirkəti və istehsalçı cəmiyyətdir.',
            ),
            9 => 
            array (
                'id' => 10,
                'idx' => 10,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'ASP.NET is a web framework for building modern web apps and services.',
                'az' => 'ASP.NET müasir veb tətbiqetmələri və xidmətləri yaratmaq üçün bir veb çərçivədir.',
            ),
            10 => 
            array (
                'id' => 11,
                'idx' => 11,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Atom is a open source text editor built with web technologies.',
                'az' => 'Atom veb texnologiyaları ilə qurulmuş açıq mənbə mətn redaktorudur.',
            ),
            11 => 
            array (
                'id' => 12,
                'idx' => 12,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'An awesome list is a list of awesome things curated by the community.',
                'az' => 'Zəhmli bir siyahı cəmiyyət tərəfindən idarə olunan zəhmli şeylərin siyahısıdır.',
            ),
            12 => 
            array (
                'id' => 13,
                'idx' => 13,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Amazon Web Services provides on-demand cloud computing platforms on a subscription basis.',
                'az' => 'Amazon Veb Xidmətləri abunə əsasında tələb bulud hesablama platformalarını təqdim edir.',
            ),
            13 => 
            array (
                'id' => 14,
                'idx' => 14,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Azure is a cloud computing service created by Microsoft.',
                'az' => 'Azure Microsoft tərəfindən yaradılan bir bulud hesablama xidmətidir.',
            ),
            14 => 
            array (
                'id' => 15,
                'idx' => 15,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Babel is a compiler for writing next generation JavaScript, today.',
                'az' => 'Babel, bu gün gələcək nəsil JavaScript yazmaq üçün tərtibçidir.',
            ),
            15 => 
            array (
                'id' => 16,
                'idx' => 16,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Bash is a shell and command language interpreter for the GNU operating system.',
                'az' => 'Bash GNU əməliyyat sistemi üçün bir qabıq və əmr dili tərcüməçisidir.',
            ),
            16 => 
            array (
                'id' => 17,
                'idx' => 17,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Bitcoin is a cryptocurrency developed by Satoshi Nakamoto.',
                'az' => 'Bitcoin Satoshi Nakamoto tərəfindən hazırlanmış bir cryptocurrency.',
            ),
            17 => 
            array (
                'id' => 18,
                'idx' => 18,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Blockchains are distributed ledgers that can record transactions between parties in a verifiable and permanent way.',
                'az' => 'Blokçeynlər, tərəflər arasında əməliyyatları yoxlanıla bilən və daimi bir şəkildə yaza bilən kitablardır.',
            ),
            18 => 
            array (
                'id' => 19,
                'idx' => 19,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Bootstrap is an HTML, CSS, and JavaScript framework.',
                'az' => 'Bootstrap HTML, CSS və JavaScript çərçivəsidir.',
            ),
            19 => 
            array (
                'id' => 20,
                'idx' => 20,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A bot is an application that runs automated tasks over the Internet.',
                'az' => 'Bir bot, İnternet üzərindən avtomatlaşdırılmış tapşırıqları işlədən bir tətbiqdir.',
            ),
            20 => 
            array (
                'id' => 21,
                'idx' => 21,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'C is a general purpose programming language that first appeared in 1972.',
                'az' => 'C, ilk dəfə 1972-ci ildə ortaya çıxan ümumi məqsədli bir proqramlaşdırma dilidir.',
            ),
            21 => 
            array (
                'id' => 22,
                'idx' => 22,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Chrome is a web browser from the tech company Google.',
                'az' => 'Chrome, Google texnoloji şirkətinin veb brauzeridir.',
            ),
            22 => 
            array (
                'id' => 23,
                'idx' => 23,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Google Chrome Extensions are add-ons that allow users to customize their Chrome web browser.',
                'az' => 'Google Chrome Uzantıları, istifadəçilərə Chrome veb brauzerini düzəltməyə imkan verən əlavələrdir.',
            ),
            23 => 
            array (
                'id' => 24,
                'idx' => 25,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Clojure is a dynamic, general-purpose programming language.',
                'az' => 'Clojure dinamik, ümumi məqsədli bir proqramlaşdırma dilidir.',
            ),
            24 => 
            array (
                'id' => 25,
                'idx' => 26,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Automate your code review with style, quality, security, and test?coverage checks when you need them.',
                'az' => 'Kod araşdırmanızı stil, keyfiyyət, təhlükəsizlik və ehtiyacınız olduqda test əhatə dairəsi yoxlamaları ilə avtomatlaşdırın.',
            ),
            25 => 
            array (
                'id' => 26,
                'idx' => 27,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Ensure your code meets quality standards and ship with confidence.',
                'az' => 'Kodunuzun keyfiyyət standartlarına cavab verməsini təmin edin və inamla göndərin.',
            ),
            26 => 
            array (
                'id' => 27,
                'idx' => 28,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Compilers are software that translate higher-level programming languages to lower-level languages',
                'az' => 'Tərtib edənlər daha yüksək səviyyəli proqramlaşdırma dillərini aşağı səviyyəli dillərə çevirən proqramdır',
            ),
            27 => 
            array (
                'id' => 28,
                'idx' => 30,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'C++ is a general purpose and object-oriented programming language.',
                'az' => 'C ++ ümumi məqsəd və obyekt yönümlü proqramlaşdırma dilidir.',
            ),
            28 => 
            array (
                'id' => 29,
                'idx' => 31,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A cryptocurrency is a digital currency that uses cryptography.',
                'az' => 'A cryptocurrency, kriptovalyutanı istifadə edən rəqəmsal bir valyutadır.',
            ),
            29 => 
            array (
                'id' => 30,
                'idx' => 32,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Crystal is a self-hosted, general purpose programming language.',
                'az' => 'Kristal öz-özünə qonaq olan, ümumi məqsədli bir proqramlaşdırma dilidir.',
            ),
            30 => 
            array (
                'id' => 31,
                'idx' => 33,
                'model' => 'hubs',
                'ru' => NULL,
            'en' => 'C# ("C sharp") is an object-oriented and type-safe programming language.',
            'az' => 'C # () obyekt yönümlü və tip təhlükəsiz bir proqramlaşdırma dilidir.',
            ),
            31 => 
            array (
                'id' => 32,
                'idx' => 34,
                'model' => 'hubs',
                'ru' => NULL,
            'en' => 'Cascading Style Sheets (CSS) is a language used most often to style and improve upon the appearance of views.',
            'az' => 'Cascading Style Sheets (CSS) görünüşlərin görünüşü ilə tərtib və inkişaf etdirmək üçün ən çox istifadə olunan bir dildir.',
            ),
            32 => 
            array (
                'id' => 33,
                'idx' => 35,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Data structures are a way of organizing and storing data.',
                'az' => 'Məlumat quruluşları məlumatların təşkili və saxlanması üsuludur.',
            ),
            33 => 
            array (
                'id' => 34,
                'idx' => 36,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Data visualization is the graphic representation of data and trends.',
                'az' => 'Məlumatların vizuallaşdırılması məlumatların və meyllərin qrafik təsviridir.',
            ),
            34 => 
            array (
                'id' => 35,
                'idx' => 37,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A database is a structured set of data held in a computer, usually a server.',
                'az' => 'Bir verilənlər bazası, kompüterdə, ümumiyyətlə bir serverdə saxlanan bir quruluşlu məlumat toplusudur.',
            ),
            35 => 
            array (
                'id' => 36,
                'idx' => 38,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Deep Learning is an artificial neural network composed of many layers.',
                'az' => 'Dərin öyrənmə bir çox təbəqədən ibarət olan süni bir sinir şəbəkəsidir.',
            ),
            36 => 
            array (
                'id' => 37,
                'idx' => 41,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Django is a web application framework for Python.',
                'az' => 'Django Python üçün bir veb tətbiq çərçivəsidir.',
            ),
            37 => 
            array (
                'id' => 38,
                'idx' => 42,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Docker is a platform built for developers to build and run applications.',
                'az' => 'Docker, inkişaf etdiricilər üçün tətbiqləri qurmaq və işlətmək üçün qurulmuş bir platformadır.',
            ),
            38 => 
            array (
                'id' => 39,
                'idx' => 43,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Documentation is a set of information that describes a product to its users.',
                'az' => 'Sənədləşmə bir məhsulu istifadəçilərinə izah edən bir məlumat toplusudur.',
            ),
            39 => 
            array (
                'id' => 40,
                'idx' => 44,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => '.NET is a free, cross-platform, open source developer platform.',
                'az' => '.NET pulsuz, çarpaz platforma, açıq mənbə inkişaf etdirici platformadır.',
            ),
            40 => 
            array (
                'id' => 41,
                'idx' => 45,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Electron is a framework for building cross-platform desktop applications with web technology.',
                'az' => 'Elektron, veb texnologiyası ilə çarpaz platforma masaüstü tətbiqetmələrinin qurulması üçün bir çərçivədir.',
            ),
            41 => 
            array (
                'id' => 42,
                'idx' => 46,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Elixir is a dynamic, functional language designed for building scalable and maintainable applications.',
                'az' => 'Elixir, genişlənə bilən və davamlı tətbiqlərin qurulması üçün hazırlanan dinamik, işlək bir dildir.',
            ),
            42 => 
            array (
                'id' => 43,
                'idx' => 47,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Emacs is an extensible, customizable, free text editor and computing environment.',
                'az' => 'Emacs genişlənən, özelleştirilebilir, pulsuz mətn redaktoru və hesablama mühitidir.',
            ),
            43 => 
            array (
                'id' => 44,
                'idx' => 48,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Ember is a framework for creating web applications.',
                'az' => 'Ember veb tətbiqləri yaratmaq üçün bir çərçivədir.',
            ),
            44 => 
            array (
                'id' => 45,
                'idx' => 49,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Emojis are graphic symbols that represent an emotion, object, or concept.',
                'az' => 'Emojislər bir duyğu, obyekt və ya konsepsiyanı təmsil edən qrafik simvollardır.',
            ),
            45 => 
            array (
                'id' => 46,
                'idx' => 50,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'An emulator is any hardware or software that allows one computer to behave like another.',
                'az' => 'Bir emulator bir kompüterin digəri kimi davranmasına imkan verən hər hansı bir hardware və ya proqramdır.',
            ),
            46 => 
            array (
                'id' => 47,
                'idx' => 51,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'ECMAScript 6 is the sixth release of the ECMAScript language.',
                'az' => 'ECMAScript 6, ECMAScript dilinin altıncı versiyasıdır.',
            ),
            47 => 
            array (
                'id' => 48,
                'idx' => 52,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'The pluggable linting utility for JavaScript and JSX.',
                'az' => 'JavaScript və JSX üçün bağlanacaq asma yardım proqramı.',
            ),
            48 => 
            array (
                'id' => 49,
                'idx' => 53,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Ethereum is a distributed public blockchain network.',
                'az' => 'Ethereum paylanmış ictimai blockchain şəbəkəsidir.',
            ),
            49 => 
            array (
                'id' => 50,
                'idx' => 54,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Express is a minimal Node.js framework for web and mobile applications.',
                'az' => 'Express veb və mobil tətbiqetmələr üçün minimal Node.js çərçivəsidir.',
            ),
            50 => 
            array (
                'id' => 51,
                'idx' => 55,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Firebase is a mobile app development platform that provides data analysis and database web services for developers.',
                'az' => 'Firebase, inkişaf etdiricilər üçün məlumat təhlili və verilənlər bazası veb xidmətləri təmin edən bir mobil tətbiqetmənin inkişaf platformasıdır.',
            ),
            51 => 
            array (
                'id' => 52,
                'idx' => 56,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Firefox is an open source web browser from Mozilla.',
                'az' => 'Firefox Mozilla\'dan açıq mənbə veb brauzeridir.',
            ),
            52 => 
            array (
                'id' => 53,
                'idx' => 57,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Flask is a web framework for Python based on the Werkzeug toolkit.',
                'az' => 'Flask, Werkzeug alətlər dəsti əsasında Python üçün bir veb çərçivədir.',
            ),
            53 => 
            array (
                'id' => 54,
                'idx' => 58,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A font is a particular style of typeface for text.',
                'az' => 'Bir şrift, mətn üçün xüsusi bir yazı tərzidir.',
            ),
            54 => 
            array (
                'id' => 55,
                'idx' => 59,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A framework is a reusable set of libraries or classes in software.',
                'az' => 'Çərçivə, proqram təminatında təkrar istifadə edilə bilən kitabxanalar və ya siniflər dəstidir.',
            ),
            55 => 
            array (
                'id' => 56,
                'idx' => 60,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Front end is the programming and layout that people see and interact with.',
                'az' => 'Ön son, insanların gördükləri və qarşılıqlı əlaqədə olduqları proqramlaşdırma və nizamdır.',
            ),
            56 => 
            array (
                'id' => 57,
                'idx' => 61,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A game engine is a software framework used to develop and create video games.',
                'az' => 'Bir oyun motoru, video oyunları inkişaf etdirmək və yaratmaq üçün istifadə olunan bir proqram çərçivəsidir.',
            ),
            57 => 
            array (
                'id' => 58,
                'idx' => 62,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Git is the most widely used version control system.',
                'az' => 'Git ən çox istifadə edilən versiyaya nəzarət sistemidir.',
            ),
            58 => 
            array (
                'id' => 59,
                'idx' => 63,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'The GitHub API allows you to build applications that integrate with GitHub.',
                'az' => 'GitHub API GitHub ilə inteqrasiya edən tətbiqlər yaratmağa imkan verir.',
            ),
            59 => 
            array (
                'id' => 60,
                'idx' => 64,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Go is a programming language built to resemble a simplified version of the C programming language.',
                'az' => 'Go, C proqramlaşdırma dilinin sadələşdirilmiş bir versiyasına bənzəmək üçün qurulmuş bir proqramlaşdırma dilidir.',
            ),
            60 => 
            array (
                'id' => 61,
                'idx' => 65,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Google LLC is an American multinational technology company that specializes in Internet-related services and products.',
                'az' => 'Google MMC, İnternetlə əlaqəli xidmətlər və məhsullar üzrə ixtisaslaşan Amerikanın çoxmillətli bir texnologiya şirkətidir.',
            ),
            61 => 
            array (
                'id' => 62,
                'idx' => 66,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Gradle is an open-source build tool that helps teams build, automate and deliver better software, faster.',
                'az' => 'Gradle, komandalara daha sürətli daha yaxşı proqram təminatını qurmağa, avtomatlaşdırmağa və çatdırmağa kömək edən açıq mənbə qurma vasitəsidir.',
            ),
            62 => 
            array (
                'id' => 63,
                'idx' => 67,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'GraphQL is a query language for APIs and a runtime for fulfilling those queries with your existing data.',
                'az' => 'GraphQL API üçün sorğu dili və mövcud məlumatlarınızla bu sualların yerinə yetirilməsi üçün iş vaxtıdır.',
            ),
            63 => 
            array (
                'id' => 64,
                'idx' => 68,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Gulp is a toolkit for automating and streamlining web development.',
                'az' => 'Gülp veb inkişafının avtomatlaşdırılması və asanlaşdırılması üçün bir vasitədir.',
            ),
            64 => 
            array (
                'id' => 65,
                'idx' => 69,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Haskell is a functional programming language with non-strict semantics, and strong static typing.',
                'az' => 'Haskell qeyri-ciddi semantika və güclü statik yazı ilə işləyən bir proqramlaşdırma dilidir.',
            ),
            65 => 
            array (
                'id' => 66,
                'idx' => 70,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Homebrew is a package manager for macOS.',
                'az' => 'Homebrew macOS üçün paket meneceridir.',
            ),
            66 => 
            array (
                'id' => 67,
                'idx' => 71,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Homebridge is a utility for tying smart home devices together into Apple’s HomeKit framework, controlled by Siri.',
                'az' => 'Homebridge, ağıllı ev cihazlarını Apple şirkətinin Siri tərəfindən idarə olunan HomeKit çərçivəsinə bağlamaq üçün bir köməkdir.',
            ),
            67 => 
            array (
                'id' => 68,
                'idx' => 72,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'HTML is the fundamental markup language for webpages.',
                'az' => 'HTML veb səhifələr üçün əsas işarələmə dilidir.',
            ),
            68 => 
            array (
                'id' => 69,
                'idx' => 73,
                'model' => 'hubs',
                'ru' => NULL,
            'en' => 'HTTP (Hypertext Transfer Protocol) is the standard for communication across the web.',
            'az' => 'HTTP (Hypertext Transfer Protocol) internet üzərindəki ünsiyyət üçün standartdır.',
            ),
            69 => 
            array (
                'id' => 70,
                'idx' => 74,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Icon fonts contain glyphs and symbols in place of textual letters.',
                'az' => 'Nişan şriftlərində mətn məktublarının yerinə qliflər və işarələr var.',
            ),
            70 => 
            array (
                'id' => 71,
                'idx' => 75,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'iOS is the operating system for Apple\'s mobile products.',
                'az' => 'iOS, Apple\'ın mobil məhsulları üçün əməliyyat sistemidir.',
            ),
            71 => 
            array (
                'id' => 72,
                'idx' => 76,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'IPFS is a peer-to-peer protocol for content-addressed sharing of data via a distributed file system.',
                'az' => 'IPFS paylanmış bir fayl sistemi vasitəsi ilə məlumatların məzmunlu ünvanlaşma mübadiləsi üçün bir həmyaşıd bir protokoldur.',
            ),
            72 => 
            array (
                'id' => 73,
                'idx' => 77,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Java is an object-oriented programming language used mainly for web, desktop, embedded devices and mobile applications.',
                'az' => 'Java, əsasən veb, masaüstü, quraşdırılmış qurğular və mobil tətbiqlər üçün istifadə olunan obyekt yönümlü bir proqramlaşdırma dilidir.',
            ),
            73 => 
            array (
                'id' => 74,
                'idx' => 78,
                'model' => 'hubs',
                'ru' => NULL,
            'en' => 'JavaScript (JS) is a lightweight interpreted programming language with first-class functions.',
            'az' => 'JavaScript (JS) birinci dərəcəli funksiyaları olan yüngül bir şərh olunan proqramlaşdırma dilidir.',
            ),
            74 => 
            array (
                'id' => 75,
                'idx' => 79,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Jekyll is a simple, blog-aware static site generator.',
                'az' => 'Jekyll sadə, blog bilən statik sayt yaradıcısıdır.',
            ),
            75 => 
            array (
                'id' => 76,
                'idx' => 80,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'jQuery is a lightweight library that simplifies programming with JavaScript.',
                'az' => 'jQuery, JavaScript ilə proqramlaşdırmanı asanlaşdıran yüngül bir kitabxanadır.',
            ),
            76 => 
            array (
                'id' => 77,
                'idx' => 81,
                'model' => 'hubs',
                'ru' => NULL,
            'en' => 'JSON (JavaScript Object Notation) allows for easy interchange of data, often between a program and a database.',
            'az' => 'JSON (JavaScript Object Notation) tez-tez bir proqram və verilənlər bazası arasında asanlıqla məlumat mübadiləsi aparmağa imkan verir.',
            ),
            77 => 
            array (
                'id' => 78,
                'idx' => 84,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Koa is an expressive middleware framework for Node.js servers that uses ES2017 async functions.',
                'az' => 'Koa, ES2017 async funksiyasından istifadə edən Node.js serverləri üçün ifadəli orta proqram çərçivəsidir.',
            ),
            78 => 
            array (
                'id' => 79,
                'idx' => 85,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Kotlin is a statically typed programming language for multiplatform applications.',
                'az' => 'Kotlin multiplatform tətbiqetmələr üçün tipik bir tipik proqramlaşdırma dilidir.',
            ),
            79 => 
            array (
                'id' => 80,
                'idx' => 86,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Kubernetes is an open source system for automating deployment, scaling, and management of containerized applications.',
                'az' => 'Kubernetes, konteynerli tətbiqlərin yerləşdirilməsi, miqyası və idarə edilməsinin avtomatlaşdırılması üçün açıq mənbə sistemidir.',
            ),
            80 => 
            array (
                'id' => 81,
                'idx' => 87,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Laravel is a PHP framework.',
                'az' => 'Laravel bir PHP çərçivəsidir.',
            ),
            81 => 
            array (
                'id' => 82,
                'idx' => 88,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'LaTeX is a document preparation system.',
                'az' => 'LaTeX sənəd hazırlama sistemidir.',
            ),
            82 => 
            array (
                'id' => 83,
                'idx' => 89,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A library is a collection of resources, often created to make programming a task simpler.',
                'az' => 'Kitabxana, proqramlaşdırma işini daha sadə hala gətirmək üçün tez-tez yaradılan mənbələr toplusudur.',
            ),
            83 => 
            array (
                'id' => 84,
                'idx' => 90,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Linux is an open source operating system.',
                'az' => 'Linux açıq mənbəli əməliyyat sistemidir.',
            ),
            84 => 
            array (
                'id' => 85,
                'idx' => 91,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Translation of a software interface and messages to another language plus to work with local cultures.',
                'az' => 'Bir proqram interfeysi və mesajları başqa bir dilə tərcümə etmək və yerli mədəniyyətlərlə işləmək.',
            ),
            85 => 
            array (
                'id' => 86,
                'idx' => 92,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Lua is a lightweight, embeddable scripting language.',
                'az' => 'Lua yüngül, quraşdırıla bilən bir yazı dilidir.',
            ),
            86 => 
            array (
                'id' => 87,
                'idx' => 93,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Machine learning is a way of modeling and interpreting data that allows a piece of software to respond intelligently.',
                'az' => 'Maşın öyrənməsi, bir proqram təminatına ağıllı cavab verməyə imkan verən məlumatları modelləşdirmə və şərh etməyin bir yoludur.',
            ),
            87 => 
            array (
                'id' => 88,
                'idx' => 94,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'macOS is Apple\'s operating system.',
                'az' => 'macOS Apple\'ın əməliyyat sistemidir.',
            ),
            88 => 
            array (
                'id' => 89,
                'idx' => 95,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Markdown is a lightweight markup language.',
                'az' => 'Markdown yüngül işarə dilidir.',
            ),
            89 => 
            array (
                'id' => 90,
                'idx' => 96,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Mastodon is a free, decentralized, open-source microblogging network.',
                'az' => 'Mastodon pulsuz, mərkəzləşdirilməmiş, açıq mənbəli mikrobloq şəbəkəsidir.',
            ),
            90 => 
            array (
                'id' => 91,
                'idx' => 97,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Material design is a unified system of theory and tools for creating digital experiences developed by Google.',
                'az' => 'Maddi dizayn, Google tərəfindən hazırlanan rəqəmsal təcrübələrin yaradılması üçün nəzəriyyə və alətlərin vahid bir sistemidir.',
            ),
            91 => 
            array (
                'id' => 92,
                'idx' => 98,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'MATLAB is a programming platform for numerical computation and visualization.',
                'az' => 'MATLAB, ədədi hesablama və vizuallaşdırma üçün bir proqramlaşdırma platformasıdır.',
            ),
            92 => 
            array (
                'id' => 93,
                'idx' => 99,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Maven is a build automation tool used primarily for Java projects.',
                'az' => 'Maven, əsasən Java layihələri üçün istifadə edilən bir avtomatlaşdırma vasitəsidir.',
            ),
            93 => 
            array (
                'id' => 94,
                'idx' => 100,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Minecraft is a sandbox video game.',
                'az' => 'Minecraft sandbox video oyunudur.',
            ),
            94 => 
            array (
                'id' => 95,
                'idx' => 101,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Mobile apps, mobile OS, mobile databases, & mobile testing frameworks.',
                'az' => 'Mobil tətbiqetmələr, mobil OS, mobil verilənlər bazası və mobil test çərçivələri.',
            ),
            95 => 
            array (
                'id' => 96,
                'idx' => 102,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Monero is a private, fungible, open source, decentralized cryptocurrency.',
                'az' => 'Monero özəl, mantarlı, açıq mənbəyidir, mərkəzləşdirilməmiş bir cryptocurrency.',
            ),
            96 => 
            array (
                'id' => 97,
                'idx' => 103,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'MongoDB is an open source NoSQL document-oriented database.',
                'az' => 'MongoDB açıq mənbə NoSQL sənəd yönümlü verilənlər bazasıdır.',
            ),
            97 => 
            array (
                'id' => 98,
                'idx' => 104,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Mongoose is a MongoDB object modeling tool designed to work in an asynchronous environment.',
                'az' => 'Mongoose, asinxron bir mühitdə işləmək üçün hazırlanmış MongoDB obyekt modelləşdirmə vasitəsidir.',
            ),
            98 => 
            array (
                'id' => 99,
                'idx' => 105,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Monitor the impact of your code changes. Measure performance, track errors, and analyze your application.',
                'az' => 'Kod dəyişikliklərinizin təsirini izləyin. Performansınızı, səhvləri izləyin və tətbiqinizi təhlil edin.',
            ),
            99 => 
            array (
                'id' => 100,
                'idx' => 106,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'The .NET MVVM framework for cross-platform solutions, including Xamarin.iOS, Xamarin.Android, Windows, and Mac.',
                'az' => 'Xamarin.iOS, Xamarin.Android, Windows və Mac daxil olmaqla cross-platform həlləri üçün .NET MVVM çərçivəsi.',
            ),
            100 => 
            array (
                'id' => 101,
                'idx' => 107,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'MySQL is an open source relational database management system.',
                'az' => 'MySQL açıq mənbəli relational verilənlər bazası idarəetmə sistemidir.',
            ),
            101 => 
            array (
                'id' => 102,
                'idx' => 108,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'NativeScript is a JavaScript-native mobile framework.',
                'az' => 'NativeScript JavaScript doğma mobil bir çərçivədir.',
            ),
            102 => 
            array (
                'id' => 103,
                'idx' => 109,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Nim is a statically typed, compiled, garbage-collected systems programming language.',
                'az' => 'Nim, statik bir yazılmış, tərtib edilmiş, zibil yığılmış sistemlərin proqramlaşdırma dilidir.',
            ),
            103 => 
            array (
                'id' => 104,
                'idx' => 111,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Node.js is a tool for executing JavaScript in a variety of environments.',
                'az' => 'Node.js, JavaScript\'i müxtəlif mühitlərdə icra etmək üçün bir vasitədir.',
            ),
            104 => 
            array (
                'id' => 105,
                'idx' => 112,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A NoSQL database refers to a database whose storage format is modeled differently from relational databases.',
                'az' => 'NoSQL verilənlər bazası, saxlama formatı əlaqəli verilənlər bazalarından fərqli şəkildə modelləşdirilən bir verilənlər bazasına aiddir.',
            ),
            105 => 
            array (
                'id' => 106,
                'idx' => 113,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'npm is a package manager for JavaScript included with Node.js.',
                'az' => 'npm, Node.js. ilə birlikdə JavaScript üçün bir paket meneceridir.',
            ),
            106 => 
            array (
                'id' => 107,
                'idx' => 114,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Objective-C is general purpose, object-oriented programming language used for macOS and iOS operating systems.',
                'az' => 'Obyektiv-C, ümumi məqsəd, macOS və iOS əməliyyat sistemlərində istifadə olunan obyekt yönümlü proqramlaşdırma dilidir.',
            ),
            107 => 
            array (
                'id' => 108,
                'idx' => 115,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'OpenGL is a software interface that allows a programmer to communicate with graphics hardware.',
                'az' => 'OpenGL, bir proqramçıya qrafik aparatı ilə əlaqə yaratmağa imkan verən bir proqram interfeysi.',
            ),
            108 => 
            array (
                'id' => 109,
                'idx' => 116,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'An operating system is a program that manages a computer\'s programs and applications.',
                'az' => 'Əməliyyat sistemi kompüterin proqramlarını və tətbiqlərini idarə edən bir proqramdır.',
            ),
            109 => 
            array (
                'id' => 110,
                'idx' => 118,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'A package manager is a set of tools that automates and manages computer software.',
                'az' => 'Paket meneceri kompüter proqramlarını avtomatlaşdıran və idarə edən bir sıra vasitələrdir.',
            ),
            110 => 
            array (
                'id' => 111,
                'idx' => 119,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Parsing is the process of analyzing a string of symbols conforming to the rules of a formal grammar.',
                'az' => 'Parsing, rəsmi bir qrammatikanın qaydalarına uyğun bir simvolun təhlili prosesidir.',
            ),
            111 => 
            array (
                'id' => 112,
                'idx' => 120,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Perl is a highly capable and feature-rich programming language.',
                'az' => 'Perl yüksək bacarıqlı və xüsusiyyətlərə görə zəngin bir proqramlaşdırma dilidir.',
            ),
            112 => 
            array (
                'id' => 113,
                'idx' => 121,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Perl 6 is an expressive and feature-rich programming language.',
                'az' => 'Perl 6 ifadəli və xüsusiyyətlərlə zəngin bir proqramlaşdırma dilidir.',
            ),
            113 => 
            array (
                'id' => 114,
                'idx' => 122,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Phaser is a fun, free, and fast 2D game framework for making HTML5 games for desktop and mobile web browsers.',
                'az' => 'Phaser, masaüstü və mobil veb brauzerlər üçün HTML5 oyunları etmək üçün əyləncəli, pulsuz və sürətli 2D oyun çərçivəsidir.',
            ),
            114 => 
            array (
                'id' => 115,
                'idx' => 123,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'PHP is a popular general-purpose scripting language that works particularly well for server-side web development.',
                'az' => 'PHP, server tərəfində veb inkişafı üçün xüsusilə yaxşı işləyən məşhur ümumi məqsədli bir yazı dilidir.',
            ),
            115 => 
            array (
                'id' => 116,
                'idx' => 124,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'PICO-8 is a fantasy console for making, sharing and playing tiny games and other computer programs in Lua.',
                'az' => 'PICO-8, Lua\'da kiçik oyunlar və digər kompüter proqramları hazırlamaq, paylaşmaq və oynamaq üçün fantaziya konsoludur.',
            ),
            116 => 
            array (
                'id' => 117,
                'idx' => 125,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Pixel art is a form of digital art where images are created and edited at the pixel level.',
                'az' => 'Piksel sənəti, təsvirlərin piksel səviyyəsində yaradıldığı və düzəldildiyi rəqəmsal sənət formasıdır.',
            ),
            117 => 
            array (
                'id' => 118,
                'idx' => 126,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'PostgreSQL is an open source database system.',
                'az' => 'PostgreSQL açıq mənbə verilənlər bazası sistemidir.',
            ),
            118 => 
            array (
                'id' => 119,
                'idx' => 127,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Project management is about building scope and executing on the project\'s goals.',
                'az' => 'Layihə rəhbərliyi, əhatə dairəsinin qurulması və layihənin məqsədlərinin yerinə yetirilməsindən ibarətdir.',
            ),
            119 => 
            array (
                'id' => 120,
                'idx' => 129,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Progressive Web Apps are traditional web sites that are enhanced with native like features.',
                'az' => 'Proqressiv Veb Tətbiqləri doğma kimi xüsusiyyətlərlə inkişaf etdirilən ənənəvi veb saytlardır.',
            ),
            120 => 
            array (
                'id' => 121,
                'idx' => 130,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Python is a dynamically typed programming language.',
                'az' => 'Python dinamik tipik bir proqramlaşdırma dilidir.',
            ),
            121 => 
            array (
                'id' => 122,
                'idx' => 131,
                'model' => 'hubs',
                'ru' => NULL,
                'en' => 'Python is a dynamically typed programming language.',
            'az' => 'Qt, tələffüz, ,sevimli, \',) harada id = 131; cross-platform tətbiqetmənin inkişaf çərçivəsidir.',
        ),
        122 => 
        array (
            'id' => 123,
            'idx' => 132,
            'model' => 'hubs',
            'ru' => NULL,
        'en' => 'Qt, pronounced "cute") WHERE id = 131; is a cross-platform application development framework.',
        'az' => 'R, statistik hesablama və qrafika üçün pulsuz bir proqramlaşdırma dili və proqram mühitidir.',
    ),
    123 => 
    array (
        'id' => 124,
        'idx' => 133,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'R is a free programming language and software environment for statistical computing and graphics.',
        'az' => 'Moruq Pi məşhur bir tək lövhəli kompüterdir.',
    ),
    124 => 
    array (
        'id' => 125,
        'idx' => 135,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'The Raspberry Pi is a popular single-board computer.',
        'az' => 'Ratchet, PHS-də asenkron şəkildə WebSocketləri idarə etmək üçün kitabxanalar dəstidir.',
    ),
    125 => 
    array (
        'id' => 126,
        'idx' => 136,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Ratchet is a set of libraries to handle WebSockets asynchronously in PHP.',
        'az' => 'React Native, Facebook tərəfindən hazırlanmış JavaScript mobil çərçivəsidir.',
    ),
    126 => 
    array (
        'id' => 127,
        'idx' => 137,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'React is an open source JavaScript library used for designing user interfaces.',
        'az' => 'ReactiveUI, bütün .NET platformaları üçün tərtib edilə bilən, cross-platform model-view-viewmodel çərçivəsidir.',
    ),
    127 => 
    array (
        'id' => 128,
        'idx' => 138,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'React Native is a JavaScript mobile framework developed by Facebook.',
        'az' => 'Redux, JavaScript tətbiqləri üçün proqnozlaşdırılan bir dövlət konteyneridir.',
    ),
    128 => 
    array (
        'id' => 129,
        'idx' => 139,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'ReactiveUI is a composable, cross-platform model-view-viewmodel framework for all .NET platforms.',
    'az' => 'Təmsil edilmiş dövlət köçürməsi (REST) ​​API internetdəki kompüter sistemləri arasında uyğunluğu təmin etmək üçün bir yoldur.',
    ),
    129 => 
    array (
        'id' => 130,
        'idx' => 140,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Redux is a predictable state container for JavaScript apps.',
        'az' => 'Yaqut sadələşdirilmiş obyekt yönümlü proqramlaşdırma üçün hazırlanmış bir yazı dilidir.',
    ),
    130 => 
    array (
        'id' => 131,
        'idx' => 141,
        'model' => 'hubs',
        'ru' => NULL,
    'en' => 'A representational state transfer (REST) API is a way to provide compatibility between computer systems on the internet.',
        'az' => 'Rust Mozilla tərəfindən yaradılan bir sistem proqramlaşdırma dilidir.',
    ),
    131 => 
    array (
        'id' => 132,
        'idx' => 142,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Ruby is a scripting language designed for simplified object-oriented programming.',
        'az' => 'Sass klassik CSS üçün sabit bir uzantıdır.',
    ),
    132 => 
    array (
        'id' => 133,
        'idx' => 143,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Rust is a systems programming language created by Mozilla.',
        'az' => 'Scala bir obyekt yönümlü bir proqramlaşdırma dilidir.',
    ),
    133 => 
    array (
        'id' => 134,
        'idx' => 144,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Sass is a stable extension to classic CSS.',
        'az' => 'scikit-learn maşın öyrənməsi üçün Python moduludur.',
    ),
    134 => 
    array (
        'id' => 135,
        'idx' => 145,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Scala is an object-oriented programming language.',
    'az' => 'Proqram tərəfindən təyin olunan şəbəkə (SDN) proqramlaşdırılmış, mərkəzləşdirilmiş şəkildə idarə olunan şəbəkələr üçün bir memarlıqdır.',
    ),
    135 => 
    array (
        'id' => 136,
        'idx' => 146,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'scikit-learn is a Python module for machine learning.',
        'az' => 'Kibertəhlükəsizlik kompüter avadanlığı, proqram təminatı və məlumatların oğurluq, zərər və zərərli niyyətlərdən qorunmasıdır.',
    ),
    136 => 
    array (
        'id' => 137,
        'idx' => 147,
        'model' => 'hubs',
        'ru' => NULL,
    'en' => 'Software-defined networking (SDN) is an architecture for programmable, centrally managed networks.',
        'az' => 'Bir server, sorğuları emal etmək və məlumatları müştərilərə çatdırmaq üçün hazırlanan bir proqramdır.',
    ),
    137 => 
    array (
        'id' => 138,
        'idx' => 148,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Cybersecurity is the protection of computer hardware, software, and data from theft, damage, and malicious intent.',
        'az' => 'Serversiz memarlıq, üçüncü tərəflərin xidmətlərindən və ya xüsusi kodlardan asılı olan tətbiqlərə aiddir.',
    ),
    138 => 
    array (
        'id' => 139,
        'idx' => 149,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'A server is a program made to process requests and deliver data to clients.',
        'az' => 'Bir mərmi Unix qabığı tərəfindən idarə olunmaq üçün hazırlanmış bir əmr satırı vasitəsidir.',
    ),
    139 => 
    array (
        'id' => 140,
        'idx' => 150,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Serverless architecture refers to apps that depend on third-party services or custom code.',
        'az' => 'Sketch, ilk növbədə istifadəçi interfeysi və simge dizaynı üçün istifadə olunan Apple\'ın macOS üçün bir vektor qrafik redaktorudur.',
    ),
    140 => 
    array (
        'id' => 141,
        'idx' => 151,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'A shell is a command-line tool, designed to be run by the Unix shell.',
        'az' => 'SpaceVim, pluginlərinizi qatlara idarə etməyə imkan verən vim redaktorun cəmiyyət tərəfindən idarə olunan paylanmasıdır.',
    ),
    141 => 
    array (
        'id' => 142,
        'idx' => 152,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Sketch is a vector graphics editor for Apple\'s macOS, used primarily for user interface and icon design.',
        'az' => 'Spring Boot, Java tətbiqləri üçün kodlaşdırma və konfiqurasiya modelidir.',
    ),
    142 => 
    array (
        'id' => 143,
        'idx' => 153,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'SpaceVim is a community-driven distribution of the vim editor that allows managing your plugins in layers.',
        'az' => 'SQL verilənlər bazasında məlumatların saxlanması, alınması və idarə olunması üçün standart bir dildir.',
    ),
    143 => 
    array (
        'id' => 144,
        'idx' => 154,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Spring Boot is a coding and configuration model for Java applications.',
        'az' => 'Hekayə kitabı, UI komponentləriniz üçün bir UI inkişaf mühitidir.',
    ),
    144 => 
    array (
        'id' => 145,
        'idx' => 155,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'SQL is a standard language for storing, retrieving and manipulating data in databases.',
        'az' => 'Komandanızı və müştərilərinizə lazım olan köməyi əldə edin.',
    ),
    145 => 
    array (
        'id' => 146,
        'idx' => 156,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Storybook is a UI development environment for your UI components.',
        'az' => 'Swift, təhlükəsizlik, performans və ifadəlilik üzərində qurulmuş müasir bir proqramlaşdırma dilidir.',
    ),
    146 => 
    array (
        'id' => 147,
        'idx' => 157,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Get your team and customers the help they need.',
        'az' => 'Symfony təkrar istifadə edilə bilən PHP komponentləri və veb çərçivədir.',
    ),
    147 => 
    array (
        'id' => 148,
        'idx' => 158,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Swift is a modern programming language focused on safety, performance, and expressivity.',
        'az' => 'Telegram qeyri-kommersiya, bulud əsaslı sürətli mesajlaşma xidmətidir.',
    ),
    148 => 
    array (
        'id' => 149,
        'idx' => 159,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Symfony is a set of reusable PHP components and a web framework.',
        'az' => 'TensorFlow, ədədi hesablama üçün açıq mənbə proqram kitabxanasıdır.',
    ),
    149 => 
    array (
        'id' => 150,
        'idx' => 160,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Telegram is a non-profit, cloud-based instant messaging service.',
        'az' => 'Terminal, mətnə ​​əsaslanan əmrləri yazıb icra edə biləcəyiniz bir interfeysdir.',
    ),
    150 => 
    array (
        'id' => 151,
        'idx' => 161,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'TensorFlow is an open source software library for numerical computation.',
        'az' => 'İnfrastrukturu etibarlı və səmərəli şəkildə qurulması, dəyişdirməsi və yeniləməsi üçün bir infrastruktur kod kod vasitəsidir.',
    ),
    151 => 
    array (
        'id' => 152,
        'idx' => 162,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'The terminal is an interface in which you can type and execute text-based commands.',
        'az' => 'Səhvləri aradan qaldırın və iş alətlərinizə bu vasitələr əlavə edərək daha çox inamla göndərin.',
    ),
    152 => 
    array (
        'id' => 153,
        'idx' => 163,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'An infrastructure-as-code tool for building, changing, and versioning infrastructure safely and efficiently.',
        'az' => 'Twitter, istifadəçilərin, Tweets,olaraq bilinən mesajları göndərdikləri və ünsiyyət qurduqları bir onlayn xəbər və sosial şəbəkə xidmətidir.',
    ),
    153 => 
    array (
        'id' => 154,
        'idx' => 164,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Eliminate bugs and ship with more confidence by adding these tools to your workflow.',
        'az' => 'TypeScript, düz JavaScript-ni tərtib edən JavaScript tipli bir supersetdir.',
    ),
    154 => 
    array (
        'id' => 155,
        'idx' => 165,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Twitter is an online news and social networking service where users post and interact with messages, known as “Tweets”.',
        'az' => 'Ubuntu Linux əsaslı bir əməliyyat sistemidir.',
    ),
    155 => 
    array (
        'id' => 156,
        'idx' => 166,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'TypeScript is a typed superset of JavaScript that compiles to plain JavaScript.',
        'az' => 'Birlik 2D / 3D video oyun yaratmaq üçün istifadə olunan bir oyun mühərriki və kompüterlər, konsollar və mobil qurğular üçün simulyasiyalar.',
    ),
    156 => 
    array (
        'id' => 157,
        'idx' => 167,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Ubuntu is a Linux-based operating system.',
        'az' => 'Unreal Engine, zəhmli oyunlar və PC, mobil, konsol, VR və AR üçün təcrübələr yaratmaq üçün istifadə olunur.',
    ),
    157 => 
    array (
        'id' => 158,
        'idx' => 168,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Unity is a game engine used to create 2D/3D video games, and simulations for computers, consoles, and mobile devices.',
        'az' => 'Vagrant, portativ virtual proqram inkişaf mühitini yaratmaq və saxlamaq üçün açıq mənbə proqram məhsuludur.',
    ),
    158 => 
    array (
        'id' => 159,
        'idx' => 169,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Unreal Engine is used to create awesome games, and experiences for PC, mobile, console, VR, and AR.',
        'az' => 'Vim, konsolda işləyən mətn redaktoru proqramıdır.',
    ),
    159 => 
    array (
        'id' => 160,
        'idx' => 170,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Vagrant is an open-source software product for building and maintaining portable virtual software development environments.',
        'az' => 'Virtual reallıq rəqəmsal vasitələrlə nümayiş olunan süni bir mühitdir.',
    ),
    160 => 
    array (
        'id' => 161,
        'idx' => 171,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Vim is a console-run text editor program.',
        'az' => 'Vue.js interaktiv veb tətbiqləri yaratmaq üçün JavaScript çərçivəsidir.',
    ),
    161 => 
    array (
        'id' => 162,
        'idx' => 172,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Virtual reality is an artificial environment displayed through digital means.',
        'az' => 'Wagtail, Pythonda yazılmış və Django veb çərçivəsində qurulmuş açıq bir mənbə CMS-dir.',
    ),
    162 => 
    array (
        'id' => 163,
        'idx' => 173,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Vue.js is a JavaScript framework for building interactive web applications.',
        'az' => 'Veb Komponentləri, yaradıcıların xüsusi HTML etiketləri yaratmaq üçün istifadə edə bildikləri veb platforma API dəstləridir.',
    ),
    163 => 
    array (
        'id' => 164,
        'idx' => 174,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Wagtail is an open source CMS written in Python and built on the Django web framework.',
        'az' => 'Bir veb tətbiqi veb brauzerini müştəri olaraq istifadə edərək müəyyən bir funksiyanı yerinə yetirən hər hansı bir kompüter proqramıdır.',
    ),
    164 => 
    array (
        'id' => 165,
        'idx' => 175,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Web Components are a set of web platform APIs developers can use to create custom HTML tags.',
        'az' => 'Webpack, asılılıqları olan modulları götürən və statik aktivlər yaradan bir bağlayıcıdır.',
    ),
    165 => 
    array (
        'id' => 166,
        'idx' => 176,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'A web application is any computer program that performs a specific function by using a web browser as its client.',
        'az' => 'Windows, Microsoft\'un GUI əsaslı əməliyyat sistemidir.',
    ),
    166 => 
    array (
        'id' => 167,
        'idx' => 177,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Webpack is a bundler that takes modules with dependencies and creates static assets.',
        'az' => 'WordPlate WordPress inkişafını asanlaşdıran müasir bir WordPress yığışdır.',
    ),
    167 => 
    array (
        'id' => 168,
        'idx' => 178,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Windows is Microsoft\'s GUI-based operating system.',
        'az' => 'WordPress, veb saytlar və bloqlar üçün istifadə olunan populyar bir məzmun idarəetmə sistemidir.',
    ),
    168 => 
    array (
        'id' => 169,
        'idx' => 179,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'WordPlate is a modern WordPress stack which simplifies WordPress development.',
        'az' => 'Xamarin iOS və Android tətbiqetmələrini inkişaf etdirmək üçün bir platformadır.',
    ),
    169 => 
    array (
        'id' => 170,
        'idx' => 180,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'WordPress is a popular content management system, used for websites and blogs.',
        'az' => 'Vue.js interaktiv veb tətbiqləri yaratmaq üçün JavaScript çərçivəsidir.',
    ),
    170 => 
    array (
        'id' => 171,
        'idx' => 181,
        'model' => 'hubs',
        'ru' => NULL,
        'en' => 'Xamarin is a platform for developing iOS and Android applications.',
        'az' => 'Wagtail, Pythonda yazılmış və Django veb çərçivəsində qurulmuş açıq bir mənbə CMS-dir.',
    ),
));
        
        
    }
}