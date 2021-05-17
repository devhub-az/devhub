<?php

namespace Database\Seeders;

use App\Models\Hub;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HubsTableSeeder extends Seeder
{
    private function createHub(string $name, string $slug, string $logo): void
    {
        Hub::factory()->create(compact('name', 'logo', 'slug'));
    }

    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->createHub(
            'Информационная безопасность',
            Str::slug('Информационная безопасность'),
            '1352db18765addaa6e0b2ac013d386d8'
        );
        $this->createHub(
            'Программирование',
            Str::slug('Программирование'),
            'db2c8f4a1974bf334d01595732f339c1'
        );
        $this->createHub(
            'Научно-популярное',
            Str::slug('Научно-популярное'),
            '02f2060b99e6f4d9403eee0420d7d5b8'
        );
        $this->createHub(
            'Системное администрирование',
            Str::slug('Системное администрирование'),
            '6c5db38c23972b6c0916e91e408edff8'
        );
        $this->createHub(
            'Сетевые технологии',
            Str::slug('Сетевые технологии'),
            'b2e13f8fcaf2711677c87418b98e85fe'
        );
        $this->createHub(
            'IT-компании',
            Str::slug('IT-компании'),
            'dfbd326740d2d30fba37f441919619f5'
        );
        $this->createHub(
            'Разработка игр',
            Str::slug('Разработка игр'),
            'b31347904b72455522b1f645ea28ef1a'
        );
        $this->createHub(
            'Карьера в IT-индустрии',
            Str::slug('Карьера в IT-индустрии'),
            'cabf82067c7be08c90a5903f860c9abf'
        );
        $this->createHub(
            'DIY или Сделай сам',
            Str::slug('DIY или Сделай сам'),
            '0ac9b48281cd7ba7401b4a4f5d9cd8d8'
        );
        $this->createHub(
            'Разработка веб-сайтов',
            Str::slug('Разработка веб-сайтов'),
            '2a2ac73dd5cddc6e05b47a3d502b4c0d'
        );
        $this->createHub(
            'Законодательство в IT',
            Str::slug('Законодательство в IT'),
            'a57348ade2b5c33e99e869aaee204c3f'
        );
        $this->createHub(
            'Python',
            Str::slug('Python'),
            '1c6724437b83f3d71abd08e5c2877a7a'
        );
        $this->createHub(
            'Машинное обучение',
            Str::slug('Машинное обучение'),
            '88237ab33b6f8acc090d443651c4f2f9'
        );
        $this->createHub(
            'Здоровье',
            Str::slug('Здоровье'),
            '612aab212721194fe115ed84dea966cc'
        );
        $this->createHub(
            'Математика',
            Str::slug('Математика'),
            '9f747d2beca9589226778700d866101d'
        );
        $this->createHub(
            'Open source',
            Str::slug('Open source'),
            'dc9dbee1d24188b925e86946bafb15c7'
        );
        $this->createHub(
            'Управление персоналом',
            Str::slug('Управление персоналом'),
            '2c0c6b86a9011cf811ce4b6820865115'
        );
        $this->createHub(
            'JavaScript',
            Str::slug('JavaScript'),
            '2b399b964d456f3ad1bfddc0346b60d4'
        );
        $this->createHub(
            'DevOps',
            Str::slug('DevOps'),
            '57d0923fc4dbf24622761210161f5b47'
        );
        $this->createHub(
            'Читальный зал',
            Str::slug('Читальный зал'),
            '04e1a1ccda37543704ede864665b2ccd'
        );
        $this->createHub(
            'История IT',
            Str::slug('История IT'),
            'bbeec149811969c7214c33d0a6911160'
        );
        $this->createHub(
            'Алгоритмы',
            Str::slug('Алгоритмы'),
            '61ebf97b08494e41ad7b7cad1e0aacc7'
        );
        $this->createHub(
            'Софт',
            Str::slug('Софт'),
            'c08ac8abdf8edc624ac48e8411851998'
        );
        $this->createHub(
            'Игры и игровые приставки',
            Str::slug('Игры и игровые приставки'),
            '250e195faa1708e4df5cb8664394a54f'
        );
        $this->createHub(
            'Физика',
            Str::slug('Физика'),
            'e554e4f790ec7617ecde4b3930acf44a'
        );
        $this->createHub(
            'Управление проектами',
            Str::slug('Управление проектами'),
            '94ab351adac61ac363e9de79c1382a67'
        );
        $this->createHub(
            'Java',
            Str::slug('Java'),
            '4c9821d2ad5a9844eb6d0f8c77991772'
        );
        $this->createHub(
            'Компьютерное железо',
            Str::slug('Компьютерное железо'),
            '57d7b53659e90f8971cf34081078d1e4'
        );
        $this->createHub(
            'Старое железо',
            Str::slug('Старое железо'),
            '064e290f484ad3bf745ebe9163b9276a'
        );
        $this->createHub(
            'Настройка Linux',
            Str::slug('Настройка Linux'),
            'd652d042e03426c4e8c7d15e2254cb4b'
        );
        $this->createHub(
            'Лайфхаки для гиков',
            Str::slug('Лайфхаки для гиков'),
            '9fa5f972e61ea8e0b7d0258ddafd3fbe'
        );
        $this->createHub(
            'Гаджеты',
            Str::slug('Гаджеты'),
            'd149ad4f5d22a8b8775b070f3c92cf39'
        );
        $this->createHub(
            'Управление разработкой',
            Str::slug('Управление разработкой'),
            '979b7b9bec5637525f70e76f05a498fb'
        );
        $this->createHub(
            'Космонавтика',
            Str::slug('Космонавтика'),
            'f07ba2b9d63b419e332a4d5ddeec8a99'
        );
        $this->createHub(
            'Системное программирование',
            Str::slug('Системное программирование'),
            '9c26b154fc3433778f64d493db6e5492'
        );
        $this->createHub(
            '*nix',
            Str::slug('*nix'),
            '9b6833e180e87f58150916cc250b4cbf'
        );
        $this->createHub(
            'Будущее здесь',
            Str::slug('Будущее здесь'),
            '8c3df17fe6153c109d190d6364f4afa5'
        );
        $this->createHub(
            'Биотехнологии',
            Str::slug('Биотехнологии'),
            'd0b1f8d21a424e35efc5b115434c7443'
        );
        $this->createHub(
            'Социальные сети и сообщества',
            Str::slug('Социальные сети и сообщества'),
            '6599b808c4d9faf273204167b601b2a0'
        );
        $this->createHub(
            'Производство и разработка электроники',
            Str::slug('Производство и разработка электроники'),
            '269015f78421d3d8efa321a6f81574f1'
        );
        $this->createHub(
            'IT-инфраструктура',
            Str::slug('IT-инфраструктура'),
            '59454645b38d9a58a92e6870133ae8e6'
        );
        $this->createHub(
            'Искусственный интеллект',
            Str::slug('Искусственный интеллект'),
            '4456b92870815e30ca14f4f66b6cb443'
        );
        $this->createHub(
            'Астрономия',
            Str::slug('Астрономия'),
            '79a987250ade16638dfafcce24213f3d'
        );
        $this->createHub(
            'Электроника для начинающих',
            Str::slug('Электроника для начинающих'),
            '6d947da0853000328fc6f5ba630006fb'
        );
        $this->createHub(
            'Звук',
            Str::slug('Звук'),
            '46fc1a2b8952c116646078e94ba29a90'
        );
        $this->createHub(
            'Схемотехника',
            Str::slug('Схемотехника'),
            '931d7eaa44179f5195debd4b35d47c51'
        );
        $this->createHub(
            'Высокая производительность',
            Str::slug('Высокая производительность'),
            'd4c97cde31f59169b6159e7fc7020503'
        );
        $this->createHub(
            'Анализ и проектирование систем',
            Str::slug('Анализ и проектирование систем'),
            '2041ff174c7379150892103472bf12cf'
        );
        $this->createHub(
            'Работа с видео',
            Str::slug('Работа с видео'),
            '6364a5e3da812a8d55677c05fb0d1ab3'
        );
        $this->createHub(
            'Финансы в IT',
            Str::slug('Финансы в IT'),
            'fd671fdcf24393f28b04673ef09bcd62'
        );
        $this->createHub(
            'Big Data',
            Str::slug('Big Data'),
            '99974bc6d012cd4094db36a0cb97e914'
        );
        $this->createHub(
            'Браузеры',
            Str::slug('Браузеры'),
            'b138a7176c8cbb20de86d55b43d2ce8f'
        );
        $this->createHub(
            'Транспорт',
            Str::slug('Транспорт'),
            '656c4285af372d89e1b0636d79521885'
        );
        $this->createHub(
            'Ненормальное программирование',
            Str::slug('Ненормальное программирование'),
            '32f8aaa676ea4746ee4cc3acaaac6d9a'
        );
        $this->createHub(
            'Rust',
            Str::slug('Rust'),
            'b4fbf73ef0672e6db43c0547b71d2b4c'
        );
        $this->createHub(
            'Серверное администрирование',
            Str::slug('Серверное администрирование'),
            '1b737e2d9b2f7b60a2f5700eb5f93f1e'
        );
        $this->createHub(
            'PHP',
            Str::slug('PHP'),
            '98a7a88319d5644cdc627b5e04b47d0f'
        );
        $this->createHub(
            'Дизайн игр',
            Str::slug('Дизайн игр'),
            '510987bd1a854995f2ce76d8fb5e513d'
        );
        $this->createHub(
            'Разработка под Android',
            Str::slug('Разработка под Android'),
            'deb535b54338aa5a202a516dee792556'
        );
        $this->createHub(
            'Интерфейсы',
            Str::slug('Интерфейсы'),
            '4eabd95a1dc768a8246a91e504a353f1'
        );
        $this->createHub(
            'Разработка под Linux',
            Str::slug('Разработка под Linux'),
            'e35838e1411346ef268e92bdf57603e7'
        );
        $this->createHub(
            'API',
            Str::slug('API'),
            'dfa56e2bf6d5979753f4ae9e8f7c27e1'
        );
        $this->createHub(
            'Исследования и прогнозы в IT',
            Str::slug('Исследования и прогнозы в IT'),
            'dfbb7982340f3a7ddb90860153b0c1ac'
        );
        $this->createHub(
            'Обработка изображений',
            Str::slug('Обработка изображений'),
            'fb7a4a8d37cb9eaf0d1fc8e62c3bde1a'
        );
        $this->createHub(
            'Разработка систем связи',
            Str::slug('Разработка систем связи'),
            'f3355864c032846e917b95ed691e7f52'
        );
        $this->createHub(
            'Администрирование баз данных',
            Str::slug('Администрирование баз данных'),
            '054a8b02b6b072771ac6b4f9cdd7dc4b'
        );
        $this->createHub(
            'Разработка мобильных приложений',
            Str::slug('Разработка мобильных приложений'),
            '13c0c0be8515f5edfc5eaa4fc60259f5'
        );
        $this->createHub(
            'Разработка под Arduino',
            Str::slug('Разработка под Arduino'),
            'a6e06b6b21a9fff92bcc5f8a1a0e6d5b'
        );
        $this->createHub(
            'Геоинформационные сервисы',
            Str::slug('Геоинформационные сервисы'),
            'a3bd376a36aadfaf2526098a92ada21f'
        );
        $this->createHub(
            'Процессоры',
            Str::slug('Процессоры'),
            'e65f3e98c20a32b1ba26e01125a2e333'
        );
        $this->createHub(
            'Учебный процесс в IT',
            Str::slug('Учебный процесс в IT'),
            'db6599152d4c6a7e81dd12f8d5b57e3d'
        );
        $this->createHub(
            'Облачные сервисы',
            Str::slug('Облачные сервисы'),
            '4f72adb8ad7c61a51a43a2911fa45313'
        );
        $this->createHub(
            'C++',
            Str::slug('Cpp'),
            '01b2ed29584e1245479ca857b0264ff1'
        );
        $this->createHub(
            'Программирование микроконтроллеров',
            Str::slug('Программирование микроконтроллеров'),
            '479657b871482c25c8f0a6f32efec586'
        );
        $this->createHub(
            'Криптография',
            Str::slug('Криптография'),
            'de4a7f775624db2496fbbe6399b25467'
        );
        $this->createHub(
            'Реверс-инжиниринг',
            Str::slug('Реверс-инжиниринг'),
            'cbe1e8e4077f777c9f93f31611802dda'
        );
        $this->createHub(
            'Инженерные системы',
            Str::slug('Инженерные системы'),
            'e8a9edc7d8b2a500fbe6a4283f718876'
        );
        $this->createHub(
            'Умный дом',
            Str::slug('Умный дом'),
            '34ebe1c07b5896dab79e5c97df5fe183'
        );
        $this->createHub(
            'Монетизация IT-систем',
            Str::slug('Монетизация IT-систем'),
            '63dc1ec56a1ffa1c50cefc9218d8cb59'
        );
        $this->createHub(
            'Сотовая связь',
            Str::slug('Сотовая связь'),
            '390f6dccdf5a3e39c4d7fc9584fa1e30'
        );
        $this->createHub(
            'Смартфоны',
            Str::slug('Смартфоны'),
            'c2b333a8db5a5bbde1ff0f224eca7117'
        );
        $this->createHub(
            'Расширения для браузеров',
            Str::slug('Расширения для браузеров'),
            'c173a30d606c8a37206327c114314c85'
        );
        $this->createHub(
            'Изучение языков',
            Str::slug('Изучение языков'),
            '778325a2d86596b796e5596eddc9354f'
        );
        $this->createHub(
            'Графический дизайн',
            Str::slug('Графический дизайн'),
            '2a0ae7b1b9bf7280a5a9ff7aab1da42f'
        );
        $this->createHub(
            'Копирайт',
            Str::slug('Копирайт'),
            'c6b35736d62556c1b35301bae2731ace'
        );
        $this->createHub(
            'Антивирусная защита',
            Str::slug('Антивирусная защита'),
            '89364f1250988fd97b4fd44a4e43f114'
        );
        $this->createHub(
            'Робототехника',
            Str::slug('Робототехника'),
            '4fc240caaae6907407cd6127f23a4aee'
        );
        $this->createHub(
            'Развитие стартапа',
            Str::slug('Развитие стартапа'),
            '19730eaa0d6d41df90c107be6144770e'
        );
        $this->createHub(
            'C#',
            Str::slug('C-Sharp'),
            'bc7f1e78397bca57cf5adcd5bf1725be'
        );
        $this->createHub(
            '.NET',
            Str::slug('.NET'),
            'a5a5aea294f48a0d81c4b1968432e5e1'
        );
        $this->createHub(
            'Промышленное программирование',
            Str::slug('Промышленное программирование'),
            '03cd6448a19ceced1e031242169a8eb5'
        );
        $this->createHub(
            'Настольные компьютеры',
            Str::slug('Настольные компьютеры'),
            '339e12ca68ba57e0d6f97e9c768af41b'
        );
        $this->createHub(
            'Git',
            Str::slug('Git'),
            'c4b10b70333b4c79a9658ff587522d4d'
        );
        $this->createHub(
            'Работа с 3D-графикой',
            Str::slug('Работа с 3D-графикой'),
            'd160248bb3da372ea4ffb20eed4baa2c'
        );
        $this->createHub(
            'Поисковые технологии',
            Str::slug('Поисковые технологии'),
            'cc4d392727cedcbf8b51cd5aaf2afd39'
        );
        $this->createHub(
            'Криптовалюты',
            Str::slug('Криптовалюты'),
            '5ee908a4977af1936e0fe21bdaaa5e72'
        );
        $this->createHub(
            'Разработка на Raspberry Pi',
            Str::slug('Разработка на Raspberry Pi'),
            '337210c0f187ef2605bc9335bb74ae0c'
        );
        $this->createHub(
            'Kotlin',
            Str::slug('Kotlin'),
            '75bb3b1c69225d61f235ef52be4d23dd'
        );
        $this->createHub(
            'GTD',
            Str::slug('GTD'),
            '6d756effa0a9d2d18daabd46794f7d46'
        );
        $this->createHub(
            'FPGA',
            Str::slug('FPGA'),
            '990babe4e54942287161ea2ecc01f347'
        );
        $this->createHub(
            'Беспроводные технологии',
            Str::slug('Беспроводные технологии'),
            'c4f3dd7d5d16afe555c49cc1fb765b79'
        );
        $this->createHub(
            'Хранение данных',
            Str::slug('Хранение данных'),
            '7de2c91bd2e446d8587fd0ffb3e3f571'
        );
        $this->createHub(
            'CSS',
            Str::slug('CSS'),
            '20afafe861e9814e46e8a20c8527bd80'
        );
        $this->createHub(
            'IT-эмиграция',
            Str::slug('IT-эмиграция'),
            'f226bc50287b600c041b663fa376681c'
        );
        $this->createHub(
            'Занимательные задачки',
            Str::slug('Занимательные задачки'),
            'd6ed3a6138cd63164a0c2d8968bef372'
        );
        $this->createHub(
            'C',
            Str::slug('C'),
            'c5aebf7e58df5c0bfe521fdf07866e6a'
        );
        $this->createHub(
            'Химия',
            Str::slug('Химия'),
            'cf3d20ce2eede1b1d639f80f781017f0'
        );
        $this->createHub(
            'Тестирование IT-систем',
            Str::slug('Тестирование IT-систем'),
            '88cd88dc5a3ea03d8d8e3f73bd35aafe'
        );
        $this->createHub(
            'Статистика в IT',
            Str::slug('Статистика в IT'),
            '5fc12a9fbd66cc4d7771dc8d152e4547'
        );
        $this->createHub(
            'Дизайн',
            Str::slug('Дизайн'),
            '579ffaebd7870d2c87f88ae2d35694e3'
        );
        $this->createHub(
            'Мессенджеры',
            Str::slug('Мессенджеры'),
            '910615c83444f1344fc92bb8de0bb9bb'
        );
        $this->createHub(
            'Разработка под iOS',
            Str::slug('Разработка под iOS'),
            '5a49bc47adf8de9e59bbf0a78b821ef9'
        );
        $this->createHub(
            'Яндекс API',
            Str::slug('Яндекс API'),
            '4e26c9e5ae1e061106eb5da4b660ae76'
        );
        $this->createHub(
            'Kubernetes',
            Str::slug('Kubernetes'),
            'c06b75a6be1550b0493024ec1507280c'
        );
        $this->createHub(
            'TypeScript',
            Str::slug('TypeScript'),
            'cab7bb7b8a279ee584926ced8e87cb15'
        );
        $this->createHub(
            'ReactJS',
            Str::slug('ReactJS'),
            'e7727d25b433a67f0e69acc74d2ba785'
        );
        $this->createHub(
            'Администрирование доменных имен',
            Str::slug('Администрирование доменных имен'),
            '81e1ba91137aa8cefdbea0777d5516a8'
        );
        $this->createHub(
            'Спам и антиспам',
            Str::slug('Спам и антиспам'),
            'fdbfd0a3e94cf6f8ad45dd1670999414'
        );
        $this->createHub(
            'Визуализация данных',
            Str::slug('Визуализация данных'),
            '54f6d4c42b588a4d0937f0fd8dfef39e'
        );
        $this->createHub(
            'Проектирование и рефакторинг',
            Str::slug('Проектирование и рефакторинг'),
            '9c6d91a45998a469e623cb3247b1734c'
        );
        $this->createHub(
            'Node.JS',
            Str::slug('Node.JS'),
            '64b6392124fdaa4e514fe8a0bc22251a'
        );
        $this->createHub(
            'Assembler',
            Str::slug('Assembler'),
            'e68041e7ec699d2983a37c38d0c77244'
        );
        $this->createHub(
            'Научная фантастика',
            Str::slug('Научная фантастика'),
            '65f2c2210786e8980a29b9a274189952'
        );
        $this->createHub(
            'Компиляторы',
            Str::slug('Компиляторы'),
            '31cf314e20303346fa3db65c8804a74c'
        );
        $this->createHub(
            'Хостинг',
            Str::slug('Хостинг'),
            '270fae79d4cd7070a1bcc27f41f68ce6'
        );
        $this->createHub(
            'Data Engineering',
            Str::slug('Data Engineering'),
            '08fb63a50ab8c2c691e8836a455b4e31'
        );
        $this->createHub(
            'Хранилища данных',
            Str::slug('Хранилища данных'),
            '897faad4310f59b4e5547371b5bd196f'
        );
        $this->createHub(
            'Управление продуктом',
            Str::slug('Управление продуктом'),
            'b7e34b7155812c7fd2aa5288b620ce25'
        );
        $this->createHub(
            'Разработка робототехники',
            Str::slug('Разработка робототехники'),
            '4bfb389fe370b1989092080d622375f2'
        );
        $this->createHub(
            'Энергия и элементы питания',
            Str::slug('Энергия и элементы питания'),
            'f134f938e6a084de411791eac09be18a'
        );
        $this->createHub(
            'Совершенный код',
            Str::slug('Совершенный код'),
            '8dc2eaa523bbf789e99d8c1be5a1ed34'
        );
        $this->createHub(
            'Data Mining',
            Str::slug('Data Mining'),
            '741cc48fe311046e166f158b180b9b61'
        );
        $this->createHub(
            'PostgreSQL',
            Str::slug('PostgreSQL'),
            '3916338e24104572809b971807686a8f'
        );
        $this->createHub(
            'Разработка под MacOS',
            Str::slug('Разработка под MacOS'),
            'a09fe1f00511e7c8838ef0cdd8da5598'
        );
        $this->createHub(
            'IT-стандарты',
            Str::slug('IT-стандарты'),
            '1e86e33333bec80031fba0c1223545ea'
        );
        $this->createHub(
            'Мозг',
            Str::slug('Мозг'),
            'd50aab5e00dd47a9fdeffee5714170e9'
        );
        $this->createHub(
            'ERP-системы',
            Str::slug('ERP-системы'),
            '835c62488fbd9322fe2673b9398d39f6'
        );
        $this->createHub(
            'Сетевое оборудование',
            Str::slug('Сетевое оборудование'),
            'c1078f7aa9a4709c3844e52918912d3d'
        );
        $this->createHub(
            'Интернет вещей',
            Str::slug('Интернет вещей'),
            '1c7c578325cb5c9eea947c545d1704a2'
        );
        $this->createHub(
            'Логические игры',
            Str::slug('Логические игры'),
            '36aa9169d992483fa29455af0edd423f'
        );
        $this->createHub(
            'Laravel',
            Str::slug('Laravel'),
            '0bdb91ce8e124137ee8f67fa9faa943e'
        );
        $this->createHub(
            'Бизнес-модели',
            Str::slug('Бизнес-модели'),
            'd55cd678d30171ab077b4980ce15202f'
        );
        $this->createHub(
            'HTML',
            Str::slug('HTML'),
            'e0dbdc393c996e7a628c5d051d0fcf8b'
        );
        $this->createHub(
            'Usability',
            Str::slug('Usability'),
            '03c8f441004dbc3c3b7560e34b6e5108'
        );
        $this->createHub(
            'Разработка под Windows',
            Str::slug('Разработка под Windows'),
            '0a873420a5a05dad2d109eaebb9ab127'
        );
        $this->createHub(
            'Yii',
            Str::slug('Yii'),
            'b4fb06003337b47d9e87e85aa274579f'
        );
        $this->createHub(
            'Удалённая работа',
            Str::slug('Удалённая работа'),
            '23ca94ca260ce63e5192f0ef1569467e'
        );
        $this->createHub(
            '3D-принтеры',
            Str::slug('3D-принтеры'),
            '3977c44df876a05b29e70c9f0da0f844'
        );
        $this->createHub(
            'Swift',
            Str::slug('Swift'),
            'ce4aee96ac5cce42451f98cf8ce12031'
        );
        $this->createHub(
            'Тестирование веб-сервисов',
            Str::slug('Тестирование веб-сервисов'),
            'dec8aa561fbd799fc4f1da65ee0a3b21'
        );
        $this->createHub(
            'OpenStreetMap',
            Str::slug('OpenStreetMap'),
            '43cf91b8086223c10504628c2275d9ac'
        );
        $this->createHub(
            'Отладка',
            Str::slug('Отладка'),
            '0a41daa7ff93df591be64cd36dfe13c4'
        );
        $this->createHub(
            'SaaS / S+S',
            Str::slug('SaaS / S+S'),
            '0d2b172a14aedfead6eaab94ae2d3acf'
        );
        $this->createHub(
            'Контент-маркетинг',
            Str::slug('Контент-маркетинг'),
            '5752871941f74139354ce4076db940e0'
        );
        $this->createHub(
            'Delphi',
            Str::slug('Delphi'),
            'cfe5fe3c2d7d088fd194507d92abe731'
        );
        $this->createHub(
            'TensorFlow',
            Str::slug('TensorFlow'),
            'de9bdbee7bf0c27cc6e12600e107c9ee'
        );
        $this->createHub(
            'Прототипирование',
            Str::slug('Прототипирование'),
            '6fa6da62d615ba8e7d9f0186eacfabbf'
        );
        $this->createHub(
            'Серверная оптимизация',
            Str::slug('Серверная оптимизация'),
            '9184ec852f54946682e7de3c931828b4'
        );
        $this->createHub(
            'Habr',
            Str::slug('Habr'),
            '38cc4c54052801a61c6bb7aeb580e000'
        );
        $this->createHub(
            'Symfony',
            Str::slug('Symfony'),
            '9997ee481b6d2834c797fb4d8e913266'
        );
        $this->createHub(
            'GitHub',
            Str::slug('GitHub'),
            '7570365720336f67615cded621df8bd5'
        );
        $this->createHub(
            '1С',
            Str::slug('1С'),
            '7f48455fc5cac3578d8fdd52a5bca9f9'
        );
        $this->createHub(
            'Профессиональная литература',
            Str::slug('Профессиональная литература'),
            '53872e15b6716c38bec1ac09833668c2'
        );
        $this->createHub(
            'Микросервисы',
            Str::slug('Микросервисы'),
            'e54909f6cc824ba99cef4efa02fd738e'
        );
        $this->createHub(
            'Unity',
            Str::slug('Unity'),
            '21126b3fa26389b05c39149dcdffd86c'
        );
        $this->createHub(
            'Agile',
            Str::slug('Agile'),
            '7215e3221495be463dd1ebeacbef2e53'
        );
        $this->createHub(
            'Дизайн мобильных приложений',
            Str::slug('Дизайн мобильных приложений'),
            'c044dea649d5fac76a46799cc12766b7'
        );
        $this->createHub(
            'Веб-аналитика',
            Str::slug('Веб-аналитика'),
            'f0c2621fbcdbe6ad994bdff586a20ea3'
        );
        $this->createHub(
            'Конференции',
            Str::slug('Конференции'),
            'f70cf76bdfceec5d6c3085fec9e64ac6'
        );
        $this->createHub(
            'Angular',
            Str::slug('Angular'),
            'f9c39a77f815375969bfd1faaff8f68f'
        );
        $this->createHub(
            'Экология',
            Str::slug('Экология'),
            '72cc4843f57af4cc790c9d60035df1de'
        );
        $this->createHub(
            'AR и VR',
            Str::slug('AR и VR'),
            '97c90f89e350b110c0cb501dbfffe628'
        );
        $this->createHub(
            'Биографии гиков',
            Str::slug('Биографии гиков'),
            '4d67475c0c5b4d6157d691f2524386bb'
        );
        $this->createHub(
            'Продвижение игр',
            Str::slug('Продвижение игр'),
            '3c4e013b8bcb3592209ed57f1d4b69fd'
        );
        $this->createHub(
            'Распределённые системы',
            Str::slug('Распределённые системы'),
            'e1bfc5b451e464edfe155fad4a678a66'
        );
        $this->createHub(
            'Периферия',
            Str::slug('Периферия'),
            'b6f63fb7fe6ff12fbcae25c075905435'
        );
        $this->createHub(
            'Открытые данные',
            Str::slug('Открытые данные'),
            '755d3113dd0cc4ccacefdd471462b3e4'
        );
        $this->createHub(
            'Системы управления версиями',
            Str::slug('Системы управления версиями'),
            '459376cbf21d5342318fd33ec48a1531'
        );
        $this->createHub(
            'Разработка для интернета вещей',
            Str::slug('Разработка для интернета вещей'),
            'fcddf2340fbad2b675f1fa367c743320'
        );
        $this->createHub(
            'CTF',
            Str::slug('CTF'),
            '45f8b1a14b1d5049629b0368e4b8675e'
        );
        $this->createHub(
            'I2P',
            Str::slug('I2P'),
            'e7bb4b01b63f56c790a01e9c8c50ad33'
        );
        $this->createHub(
            'Функциональное программирование',
            Str::slug('Функциональное программирование'),
            '65416d6facd9b74513aa035731167f9f'
        );
        $this->createHub(
            'Управление сообществом',
            Str::slug('Управление сообществом'),
            '85d0ba490c6cb811701c16f899729b8d'
        );
        $this->createHub(
            'Автомобильные гаджеты',
            Str::slug('Автомобильные гаджеты'),
            'c0e33d3bdece2e8b8c1b38907f6a3d46'
        );
        $this->createHub(
            'Ноутбуки',
            Str::slug('Ноутбуки'),
            '896a49a57cd93220352ab9ab371adf1e'
        );
        $this->createHub(
            'Фототехника',
            Str::slug('Фототехника'),
            '0ada791a405e6a0e18740a884cea9fbf'
        );
        $this->createHub(
            'SQL',
            Str::slug('SQL'),
            '64b22b8b6c4677778423e971d52eb05d'
        );
        $this->createHub(
            'Урбанизм',
            Str::slug('Урбанизм'),
            '94a85a57823586d9bac5bc4b9cd11238'
        );
        $this->createHub(
            'Тестирование мобильных приложений',
            Str::slug('Тестирование мобильных приложений'),
            '6da82050584fd944fa4888a3bd761b38'
        );
        $this->createHub(
            'Клиентская оптимизация',
            Str::slug('Клиентская оптимизация'),
            '8dd7eb425202cc92823ecbb22c2631d1'
        );
        $this->createHub(
            'Go',
            Str::slug('Go'),
            'a10c5c62685d9a7d2964993daf6958c3'
        );
        $this->createHub(
            'Tarantool',
            Str::slug('Tarantool'),
            '8e3a92248ba9acdb02a3a5676852f9c3'
        );
        $this->createHub(
            'Google Chrome',
            Str::slug('Google Chrome'),
            '061be4f76ce29f2ab0ea72eee1af2dd4'
        );
        $this->createHub(
            'Спортивное программирование',
            Str::slug('Спортивное программирование'),
            '6acc75615af52a06a86175ffc16e2cf3'
        );
        $this->createHub(
            'Киберпанк',
            Str::slug('Киберпанк'),
            'c963675ab084372e75c7c29c5477ee57'
        );
        $this->createHub(
            'Apache',
            Str::slug('Apache'),
            '491f0a9b3dd805b1e97478d97ece9be6'
        );
        $this->createHub(
            'Интервью',
            Str::slug('Интервью'),
            '1a2c8f70d4b048d9ffdf0b259ee9128a'
        );
        $this->createHub(
            'Scala',
            Str::slug('Scala'),
            '1c46ddda78b79073229c13dba60ebdd9'
        );
        $this->createHub(
            'Интернет-маркетинг',
            Str::slug('Интернет-маркетинг'),
            '88d843ea06f5e311c224be84e7b11afe'
        );
        $this->createHub(
            'CRM-системы',
            Str::slug('CRM-системы'),
            '577c521d4fb330e7d668a3676cf8d4e3'
        );
        $this->createHub(
            'Управление продажами',
            Str::slug('Управление продажами'),
            '7ca18c6de900c26e33f5eb8fda46ece1'
        );
        $this->createHub(
            'Firefox',
            Str::slug('Firefox'),
            'd6cd93e2f0dfdf50713c9089a78669ed'
        );
        $this->createHub(
            'Natural Language Processing',
            Str::slug('Natural Language Processing'),
            '603db5b716ae407c8282771be935018b'
        );
        $this->createHub(
            'Работа с иконками',
            Str::slug('Работа с иконками'),
            '9efd451a60608aae025d13c3895b72dd'
        );
        $this->createHub(
            'Ruby',
            Str::slug('Ruby'),
            '1f60b3b0dcdf8f157023963d20b0e18f'
        );
        $this->createHub(
            'Квантовые технологии',
            Str::slug('Квантовые технологии'),
            '95e2646aead4f970af85e49a25c9f633'
        );
        $this->createHub(
            'Flutter',
            Str::slug('Flutter'),
            '63b728b76ec18862a5454a684509940b'
        );
        $this->createHub(
            'Тестирование игр',
            Str::slug('Тестирование игр'),
            '30aec053eecd1f5555a8ba577a3b6266'
        );
        $this->createHub(
            'Накопители',
            Str::slug('Накопители'),
            'dd2008e4cf2ac6ec8d90d09c2468ea3f'
        );
        $this->createHub(
            'Облачные вычисления',
            Str::slug('Облачные вычисления'),
            '575cde49ba588c7941a780be516528c2'
        );
        $this->createHub(
            'Децентрализованные сети',
            Str::slug('Децентрализованные сети'),
            'e4cb9d258b83d5fe134bb3894ac40504'
        );
        $this->createHub(
            'Хакатоны',
            Str::slug('Хакатоны'),
            '9368c10e22a343a82621977d878fbeca'
        );
        $this->createHub(
            'Управление e-commerce',
            Str::slug('Управление e-commerce'),
            '9910082e92a30d7c8c18b0e5cc25a239'
        );
        $this->createHub(
            'ООП',
            Str::slug('ООП'),
            'e4e31ae7a84dd9ebe94103619f7b8631'
        );
        $this->createHub(
            'Семантика',
            Str::slug('Семантика'),
            'c31b8fa39bfe24f06cc516989e961ea0'
        );
        $this->createHub(
            'Django',
            Str::slug('Django'),
            'f2fb899050a39a3c14f7ed53f43593d7'
        );
        $this->createHub(
            'Подготовка технической документации',
            Str::slug('Подготовка технической документации'),
            '9991282437d46db397e282e88663fa5d'
        );
        $this->createHub(
            'Видеокарты',
            Str::slug('Видеокарты'),
            'd20cb40f6df9eec7079d596459cffd74'
        );
        $this->createHub(
            'CAD/CAM',
            Str::slug('CAD/CAM'),
            '23461151a8fef81c88b27a144bb6c6a0'
        );
        $this->createHub(
            'Amazon Web Services',
            Str::slug('Amazon Web Services'),
            'b7d627b5cc730038cd6f66cd07220b69'
        );
        $this->createHub(
            'Параллельное программирование',
            Str::slug('Параллельное программирование'),
            'b1da2a591fdba427c9db91ecf94fbed3'
        );
        $this->createHub(
            'Платежные системы',
            Str::slug('Платежные системы'),
            'e7dfbfc3cf0165469a372abd09c5ef10'
        );
        $this->createHub(
            'Регулярные выражения',
            Str::slug('Регулярные выражения'),
            '1a78e69cc6af07806f802ce9582d05da'
        );
        $this->createHub(
            'PowerShell',
            Str::slug('PowerShell'),
            '1fa2b14cf2579c506f1aca386165eb32'
        );
        $this->createHub(
            'Голосовые интерфейсы',
            Str::slug('Голосовые интерфейсы'),
            '0e3b645fa3b60e48195be36358601139'
        );
        $this->createHub(
            'Adobe Flash',
            Str::slug('Adobe Flash'),
            'a224f5bb173b680fcf32193ba4f09b07'
        );
        $this->createHub(
            'TDD',
            Str::slug('TDD'),
            '75e504d7671eb26e30add73b8b1df482'
        );
        $this->createHub(
            'Perl',
            Str::slug('Perl'),
            '55a239e8e3b58a2e40827a04caaa2f4c'
        );
        $this->createHub(
            'Canvas',
            Str::slug('Canvas'),
            '6f7165171deb375a5c95036b55618d29'
        );
        $this->createHub(
            'Разработка под AR и VR',
            Str::slug('Разработка под AR и VR'),
            'e0500be9f2c8e55fef92703f3c1f12d9'
        );
        $this->createHub(
            'Инфографика',
            Str::slug('Инфографика'),
            '99d3fd2ec94a3f254efbb92996e3e251'
        );
        $this->createHub(
            'Cobol',
            Str::slug('Cobol'),
            '940e369c29852c310cb7c27f24909187'
        );
        $this->createHub(
            'Xamarin',
            Str::slug('Xamarin'),
            '169334f506dc179631ec91889a47da71'
        );
        $this->createHub(
            'VueJS',
            Str::slug('VueJS'),
            'bc3e2f564a54900c16f90ef53d5f62b6'
        );
        $this->createHub(
            'Аналитика мобильных приложений',
            Str::slug('Аналитика мобильных приложений'),
            'cd53348ce9a13411cbeb0cc6c3b07d85'
        );
        $this->createHub(
            'Lua',
            Str::slug('Lua'),
            '14826baede3a4f453908a2b528bef22a'
        );
        $this->createHub(
            'Dart',
            Str::slug('Dart'),
            '41e6712dd7d298077553efff8562bd73'
        );
        $this->createHub(
            'Prolog',
            Str::slug('Prolog'),
            'b37abac13223937e5933eb217231ee87'
        );
        $this->createHub(
            'WebGL',
            Str::slug('WebGL'),
            '8dd5ca7bdf3e6a2d1951320c5f08ff84'
        );
        $this->createHub(
            'Носимая электроника',
            Str::slug('Носимая электроника'),
            'ab98c9175b8a223fcaeebfb60352c7cc'
        );
        $this->createHub(
            'CGI (графика)',
            Str::slug('CGI (графика)'),
            '1950896c66ad2c6a3231c830c9640160'
        );
        $this->createHub(
            'Системы сборки',
            Str::slug('Системы сборки'),
            'b32c95751d93477b13d637f89a7ad11a'
        );
        $this->createHub(
            'SCADA',
            Str::slug('SCADA'),
            '74e4478d5bedf7bc4798b85f3270e306'
        );
        $this->createHub(
            'Терминология IT',
            Str::slug('Терминология IT'),
            '8f946550bfaf3eddd7e93ea9e2270fc2'
        );
        $this->createHub(
            'Фриланс',
            Str::slug('Фриланс'),
            'bfdf291bd0216cd7ca7cd7a7b1e56ca6'
        );
        $this->createHub(
            'NoSQL',
            Str::slug('NoSQL'),
            '55b5e04621694cafb82489202daa165e'
        );
        $this->createHub(
            'PDF',
            Str::slug('PDF'),
            '8265ded3c97a3543d4e2c703c7ce8225'
        );
        $this->createHub(
            'Gradle',
            Str::slug('Gradle'),
            '87b2593d7d20edf3ee01fe4de7564caa'
        );
        $this->createHub(
            'Ruby on Rails',
            Str::slug('Ruby on Rails'),
            'b6e749c8b863f4ce37b1179c5e0f769e'
        );
        $this->createHub(
            'Visual Studio',
            Str::slug('Visual Studio'),
            '1583a0ad048e5e22d30119cd16b8537f'
        );
        $this->createHub(
            'Видеоконференцсвязь',
            Str::slug('Видеоконференцсвязь'),
            '3049d2d548145a33564acccc14bcd7e5'
        );
        $this->createHub(
            'Разработка под e-commerce',
            Str::slug('Разработка под e-commerce'),
            '2a17c5ce59f4e6449c42b34d76235c17'
        );
        $this->createHub(
            'R',
            Str::slug('R'),
            'ac6da4821bbfeec1c0e2331385b51820'
        );
        $this->createHub(
            'Nginx',
            Str::slug('Nginx'),
            '4c9b2a1d00796d1dc924a37316219eb2'
        );
        $this->createHub(
            'Atlassian',
            Str::slug('Atlassian'),
            'eeab793aae8d7b53389240a786308b75'
        );
        $this->createHub(
            'Управление медиа',
            Str::slug('Управление медиа'),
            'a5a23996cdde59045f2c735f0ffa9f29'
        );
        $this->createHub(
            'Oracle',
            Str::slug('Oracle'),
            'c9d1a4b6f8257d96fbecc20a2efa199c'
        );
        $this->createHub(
            'Патентование',
            Str::slug('Патентование'),
            '47219825d9c78935d51cb3dcb4226f58'
        );
        $this->createHub(
            'Виртуализация',
            Str::slug('Виртуализация'),
            '86402884b9a8503bfdbd34740fc9982d'
        );
        $this->createHub(
            'Венчурные инвестиции',
            Str::slug('Венчурные инвестиции'),
            '8a09c6ce4982e473f7d43d622e3ea95c'
        );
        $this->createHub(
            'Демосцена',
            Str::slug('Демосцена'),
            '2c64a86cb9a01508b4fe83c9caa0d399'
        );
        $this->createHub(
            'Accessibility',
            Str::slug('Accessibility'),
            'd7cc710eac3f08b15aaffd102774aa00'
        );
        $this->createHub(
            'Разработка для Office 365',
            Str::slug('Разработка для Office 365'),
            'c4ec69d4cd59c18d1e6096e964d645d3'
        );
        $this->createHub(
            'Компьютерная анимация',
            Str::slug('Компьютерная анимация'),
            '34df1db9da3e8745ad047ee0ffd1cf94'
        );
        $this->createHub(
            'Поисковая оптимизация',
            Str::slug('Поисковая оптимизация'),
            '71062dccf4bb1a49459d5a6887c8ec86'
        );
        $this->createHub(
            'Мультикоптеры',
            Str::slug('Мультикоптеры'),
            'b6cb5859b7dda6817ddbff3a2f3d7715'
        );
        $this->createHub(
            'Визуальное программирование',
            Str::slug('Визуальное программирование'),
            '7904095a3cf960350049e9fdc3414ae5'
        );
        $this->createHub(
            'Планшеты',
            Str::slug('Планшеты'),
            'd31cb8d99c60dd99227d869551bb1352'
        );
        $this->createHub(
            'Медийная реклама',
            Str::slug('Медийная реклама'),
            'dc33ff2a1aeb30da56be00c4bd3dd17f'
        );
        $this->createHub(
            'Видеотехника',
            Str::slug('Видеотехника'),
            '321d5bd418d773358ec67730ed6bc315'
        );
        $this->createHub(
            'Мониторы и ТВ',
            Str::slug('Мониторы и ТВ'),
            'b04ba5ac277d807ffd52ef3f7ab4b82a'
        );
        $this->createHub(
            'Веб-дизайн',
            Str::slug('Веб-дизайн'),
            '9f0054a3f1d5b5d344953adca3dea737'
        );
        $this->createHub(
            'Haskell',
            Str::slug('Haskell'),
            '138ce5098d4a2e04ee975ef25a911ddc'
        );
        $this->createHub(
            'ASP',
            Str::slug('ASP'),
            '7de1cc8e6def6778e47e8e72f914a0bb'
        );
        $this->createHub(
            'Service Desk',
            Str::slug('Service Desk'),
            'c63386b4de9e72aba5664fefc8b16988'
        );
        $this->createHub(
            'SvelteJS',
            Str::slug('SvelteJS'),
            '841bf696493d77d0bdd670ed46d2f802'
        );
        $this->createHub(
            'Офисы IT-компаний',
            Str::slug('Офисы IT-компаний'),
            '0f540c9ca6347fbfb5582ad99d26f432'
        );
        $this->createHub(
            'Восстановление данных',
            Str::slug('Восстановление данных'),
            'c804767ab58b9052f8a30dec95105823'
        );
        $this->createHub(
            '1С-Битрикс',
            Str::slug('1С-Битрикс'),
            '4d23aabf3eb8335a8f625c940c997a5b'
        );
        $this->createHub(
            'Локализация продуктов',
            Str::slug('Локализация продуктов'),
            'fd182296074702d74f02fdef7e198523'
        );
        $this->createHub(
            'IPFS',
            Str::slug('IPFS'),
            'c87b0b9d9bc96985de8b2a4e41e071ae'
        );
        $this->createHub(
            'Qt',
            Str::slug('Qt'),
            'a69436043016a35349d05068d584b316'
        );
        $this->createHub(
            'Суперкомпьютеры',
            Str::slug('Суперкомпьютеры'),
            '1b1def37d47f1a759cb60c89adfb5cd9'
        );
        $this->createHub(
            'Elixir/Phoenix',
            Str::slug('Elixir/Phoenix'),
            '45d576c7f9cddfe625e4a79a46ec99ee'
        );
        $this->createHub(
            'Erlang/OTP',
            Str::slug('Erlang/OTP'),
            'f6c93fc11831a7863feb820424b9d7a3'
        );
        $this->createHub(
            'SQLite',
            Str::slug('SQLite'),
            'f4cc28cccd00584f8002be209d504555'
        );
        $this->createHub(
            'Стандарты связи',
            Str::slug('Стандарты связи'),
            '4b387931f3cae13084e05dbbd3083ab8'
        );
        $this->createHub(
            'Google Cloud Platform',
            Str::slug('Google Cloud Platform'),
            'df9540dff9c0f645e365ba508ad2ff72'
        );
        $this->createHub(
            'Growth Hacking',
            Str::slug('Growth Hacking'),
            'bf364f98338f6d7d89512a827e72e817'
        );
        $this->createHub(
            'Монетизация игр',
            Str::slug('Монетизация игр'),
            '6c1010b5f21e20c68bb48604f8039d2f'
        );
        $this->createHub(
            'Нанотехнологии',
            Str::slug('Нанотехнологии'),
            '89855dbd3bd40547a5dae78f7458ebe8'
        );
        $this->createHub(
            'Firebird/Interbase',
            Str::slug('Firebird/Interbase'),
            '567b4a77aae9db45aa5dad5a5c8dd11a'
        );
        $this->createHub(
            'Godot',
            Str::slug('Godot'),
            'c6d7851108f03ccd709c8310d0af79f1'
        );
        $this->createHub(
            'GTK+',
            Str::slug('GTK+'),
            '9befd27bf2f75c181c2f5ba6d235ed02'
        );
        $this->createHub(
            'Microsoft SQL Server',
            Str::slug('Microsoft SQL Server'),
            'e194b255ac49ea6fbed18aa5b070dbd3'
        );
        $this->createHub(
            'GPGPU',
            Str::slug('GPGPU'),
            '103d0d83cf512092f5fe28b02def0c00'
        );
        $this->createHub(
            'Сжатие данных',
            Str::slug('Сжатие данных'),
            '03ce2899503daa5a49ffdcc585f177c9'
        );
        $this->createHub(
            'Краудсорсинг',
            Str::slug('Краудсорсинг'),
            'eef871bbcc11cdbbe9bf46ba868f9539'
        );
        $this->createHub(
            'Smalltalk',
            Str::slug('Smalltalk'),
            'b865158d3824b890ec2bf33206001da8'
        );
        $this->createHub(
            'Help Desk Software',
            Str::slug('Help Desk Software'),
            '1c779ac28ff3e9c182d55666842c3940'
        );
        $this->createHub(
            'Eclipse',
            Str::slug('Eclipse'),
            'b081831c57589c596513abfa80708592'
        );
        $this->createHub(
            'CMS',
            Str::slug('CMS'),
            'edffd100d2e0fc5a54933add3acd9e04'
        );
        $this->createHub(
            'Xcode',
            Str::slug('Xcode'),
            '7aa85956586fea162d4607678f1da2c4'
        );
        $this->createHub(
            'Резервное копирование',
            Str::slug('Резервное копирование'),
            'e7eb618c16c1d42cf80d5ec578d60e8f'
        );
        $this->createHub(
            'Глобальные системы позиционирования',
            Str::slug('Глобальные системы позиционирования'),
            '56e048aaab41b3b32823f9f1449934cd'
        );
        $this->createHub(
            'Работа с векторной графикой',
            Str::slug('Работа с векторной графикой'),
            '3ff835af9ba4ca0bab9485c81c1f651f'
        );
        $this->createHub(
            'Microsoft Azure',
            Str::slug('Microsoft Azure'),
            '3d6d7e43c2a17f483a9e7d153060239c'
        );
        $this->createHub(
            'Google API',
            Str::slug('Google API'),
            'c9a4a92598b12928780850f73651a483'
        );
        $this->createHub(
            'Asterisk',
            Str::slug('Asterisk'),
            'e67236b03b0196043893d0b6dbc27de8'
        );
        $this->createHub(
            'DNS',
            Str::slug('DNS'),
            '5e8c5673a5f99edd1830e5633e9c20f4'
        );
        $this->createHub(
            'MongoDB',
            Str::slug('MongoDB'),
            '9d73700ac34f30f83e776c7d8e06e93a'
        );
        $this->createHub(
            'Drupal',
            Str::slug('Drupal'),
            '06bd786d57711077f03fbdcae6f85634'
        );
        $this->createHub(
            'Flask',
            Str::slug('Flask'),
            '47c6943ae3a360d538df41b89bc6de99'
        );
        $this->createHub(
            'Презентации',
            Str::slug('Презентации'),
            '796ce32f89e2bc674988db5d38704090'
        );
        $this->createHub(
            'Objective C',
            Str::slug('Objective C'),
            '0c6d3bf00e085e8fd3efc26ef7aeff73'
        );
        $this->createHub(
            'Openshift',
            Str::slug('Openshift'),
            '4db6ec8abfff394c69337d883f171699'
        );
        $this->createHub(
            'Matlab',
            Str::slug('Matlab'),
            '899cf6e6abbc157b9ac601d8c90704d9'
        );
        $this->createHub(
            'Unreal Engine',
            Str::slug('Unreal Engine'),
            '16b526adb5ab2c74d226709501032c6b'
        );
        $this->createHub(
            'MySQL',
            Str::slug('MySQL'),
            'd9c7e051c85e8c5364cc500a16cac2e0'
        );
        $this->createHub(
            'IPv6',
            Str::slug('IPv6'),
            'd4602a36f6128c6cb1ab713bcb288d80'
        );
        $this->createHub(
            'Медгаджеты',
            Str::slug('Медгаджеты'),
            '3ca8a3a2b2431c5ae95a172b57a65940'
        );
        $this->createHub(
            'ECM/СЭД',
            Str::slug('ECM/СЭД'),
            '321ea2d6ec735110e6e84b51144442e2'
        );
        $this->createHub(
            'Кодобред',
            Str::slug('Кодобред'),
            '815d9d1c18d96b897a17bc06aaf51c38'
        );
        $this->createHub(
            'Microsoft Edge',
            Str::slug('Microsoft Edge'),
            '1be981c79360b47cfbd430a73066887e'
        );
        $this->createHub(
            'Повышение конверсии',
            Str::slug('Повышение конверсии'),
            'e114995456f5f046ca838b484081dd6e'
        );
        $this->createHub(
            'Magento',
            Str::slug('Magento'),
            '72c1fc7461b4505aa17d9da27abf4df9'
        );
        $this->createHub(
            'Монетизация мобильных приложений',
            Str::slug('Монетизация мобильных приложений'),
            'c6325464298725f9c24ac53529e31e85'
        );
        $this->createHub(
            'Телемедицина',
            Str::slug('Телемедицина'),
            '80aa3601c07565a3f4dfffdbf8e94e20'
        );
        $this->createHub(
            'Контекстная реклама',
            Str::slug('Контекстная реклама'),
            '016a504faa8d17597488492ad7485209'
        );
        $this->createHub(
            'Cisco',
            Str::slug('Cisco'),
            '26a1e58cd83620f320800f30f8cf887d'
        );
        $this->createHub(
            'Типографика',
            Str::slug('Типографика'),
            '4f89e52aea7c3e3d8f8513046fefc8f6'
        );
        $this->createHub(
            'Creative Commons',
            Str::slug('Creative Commons'),
            'ea47b1e8371cb9b0348567110434b3d3'
        );
        $this->createHub(
            'Facebook API',
            Str::slug('Facebook API'),
            'bddec0471dc6082a939abb367ffc6944'
        );
        $this->createHub(
            'Брендинг',
            Str::slug('Брендинг'),
            '20fd2261512b6d9d0e5d9d7135ebc0d2'
        );
        $this->createHub(
            'Julia',
            Str::slug('Julia'),
            'eb8734fa240b7414f85d898933a8e738'
        );
        $this->createHub(
            'Mesh-сети',
            Str::slug('Mesh-сети'),
            'fc1051bce0c25da604295e7a1f0f0cae'
        );
        $this->createHub(
            'Meteor.JS',
            Str::slug('Meteor.JS'),
            'e294664d3602740a417865a67332169e'
        );
        $this->createHub(
            'Visual Basic for Applications',
            Str::slug('Visual Basic for Applications'),
            'c7bd1fe2caaab0146447a554bd9c3712'
        );
        $this->createHub(
            'TYPO3',
            Str::slug('TYPO3'),
            '4c2e7118e9c8101a6203213f2596f8f2'
        );
        $this->createHub(
            'Haxe',
            Str::slug('Haxe'),
            '045b0ea8680c31c9504dfbd26a759ab5'
        );
        $this->createHub(
            'Processing',
            Str::slug('Processing'),
            '8906190b616f0bab20d7f4dfd557da95'
        );
        $this->createHub(
            'UEFI',
            Str::slug('UEFI'),
            'b5a8e6a272df464cd1c727f3bd089a74'
        );
        $this->createHub(
            'WebAssembly',
            Str::slug('WebAssembly'),
            '7873d595250122e806fb64a28d1828b9'
        );
        $this->createHub(
            'Лазеры',
            Str::slug('Лазеры'),
            'a0287e5f80109daa9c3311b75aa15d74'
        );
        $this->createHub(
            'Google Cloud Vision API',
            Str::slug('Google Cloud Vision API'),
            'ed7ac9cb30fdc9dca5ed2308993505e0'
        );
        $this->createHub(
            'Hadoop',
            Str::slug('Hadoop'),
            '83ad6c996372aee28a3d6f3ab259309c'
        );
        $this->createHub(
            'Puppet',
            Str::slug('Puppet'),
            '96fb517e0884c42aaa1e387c26d5c293'
        );
        $this->createHub(
            'Clojure',
            Str::slug('Clojure'),
            '9307f2640322f449b5d9659fcd69dfbf'
        );
        $this->createHub(
            'F#',
            Str::slug('F#'),
            '5808d5d362f5aaa86849124354e544bd'
        );
        $this->createHub(
            'CoffeeScript',
            Str::slug('CoffeeScript'),
            '308bb3eb1db5c15f9b3e5cf21710dc53'
        );
        $this->createHub(
            'Elm',
            Str::slug('Elm'),
            '773048e8f813056e57ab2f3552106123'
        );
        $this->createHub(
            'Phalcon',
            Str::slug('Phalcon'),
            '587f7abb2dc5d5a0540a29426f72a62d'
        );
        $this->createHub(
            'Solidity',
            Str::slug('Solidity'),
            '024aa74f9b2ac39ffb43f6ca8d2c47e8'
        );
        $this->createHub(
            'Разработка под Sailfish OS',
            Str::slug('Разработка под Sailfish OS'),
            '39ae2ba87ec9642dda0d4b9a4ee6ebdf'
        );
        $this->createHub(
            'Образование за рубежом',
            Str::slug('Образование за рубежом'),
            '16a6e70985287425074a4033b296cad7'
        );
        $this->createHub(
            'Биллинговые системы',
            Str::slug('Биллинговые системы'),
            'a95f2ecb6ea9302d0fe747c9905555bf'
        );
        $this->createHub(
            'Чулан',
            Str::slug('Чулан'),
            'ae529c4a9cd7049ed594f03f6de98271'
        );
        $this->createHub(
            'Forth',
            Str::slug('Forth'),
            '468d5c63177219f7750e9597807e3f93'
        );
        $this->createHub(
            'SAN',
            Str::slug('SAN'),
            '1f7b70aa274875ad783ef0584b3b3016'
        );
        $this->createHub(
            'D',
            Str::slug('D'),
            'a145fab6c510fec3352ddef71f051aa1'
        );
        $this->createHub(
            'Derby.js',
            Str::slug('Derby.js'),
            '6e9ef184e04a72ab1b5dd39172161387'
        );
        $this->createHub(
            'Разработка под Tizen',
            Str::slug('Разработка под Tizen'),
            'ee1438eb8a9ba8ee3e93d0e87a3162de'
        );
        $this->createHub(
            'Emacs',
            Str::slug('Emacs'),
            '4f4e6928b465327bb8f114edbb1f8878'
        );
        $this->createHub(
            'Разработка под Bada',
            Str::slug('Разработка под Bada'),
            '0b3a7b005871fcd48bb7374333417f95'
        );
        $this->createHub(
            'Mercurial',
            Str::slug('Mercurial'),
            'f85bc487e6457bd11b2e3614ef54ecf7'
        );
        $this->createHub(
            'UML Design',
            Str::slug('UML Design'),
            '24599d7453a31fdc7559ba90246c75b3'
        );
        $this->createHub(
            'Fortran',
            Str::slug('Fortran'),
            '9d28698a2c63d9c46917e81fe3329e35'
        );
        $this->createHub(
            'Cocoa',
            Str::slug('Cocoa'),
            '695e6ce5e7025e7c2374f8b36c7e74b8'
        );
        $this->createHub(
            'Apache Flex',
            Str::slug('Apache Flex'),
            'e9f5267a09b3ba31d7f83504df49fde1'
        );
        $this->createHub(
            'Action Script',
            Str::slug('Action Script'),
            '2c98341970e35f04171b401f4e7561eb'
        );
        $this->createHub(
            'Joomla',
            Str::slug('Joomla'),
            '8da1905ef6af7fd478340f201c153daf'
        );
        $this->createHub(
            'IIS',
            Str::slug('IIS'),
            '8f9d1a07c7680c0eabf8d2dea3fde478'
        );
        $this->createHub(
            'Twitter API',
            Str::slug('Twitter API'),
            'f09ca8a70dc5d7e6ab722e150cd4fdba'
        );
        $this->createHub(
            'ВКонтакте API',
            Str::slug('ВКонтакте API'),
            '7c76397cf408ca9e1f16419d0c6c91ec'
        );
        $this->createHub(
            'Microsoft Access',
            Str::slug('Microsoft Access'),
            '80447a43a44fbdaf536708a94e9daef2'
        );
        $this->createHub(
            'Разработка под Windows Phone',
            Str::slug('Разработка под Windows Phone'),
            'bbea1c94dfb0b6493db05a78218ab9a7'
        );
        $this->createHub(
            'Maps API',
            Str::slug('Maps API'),
            '19a718967053bff532f6294609413270'
        );
        $this->createHub(
            'LabVIEW',
            Str::slug('LabVIEW'),
            'f37d50f817d9550effe350f3e9283f35'
        );
        $this->createHub(
            'Brainfuck',
            Str::slug('Brainfuck'),
            'f44f967cae7b94b9e11d1311c13f8adf'
        );
        $this->createHub(
            'Cubrid',
            Str::slug('Cubrid'),
            'a2bbd4ddf49bb8ace5c39bd30f6aefe1'
        );
        $this->createHub(
            'Mono и Moonlight',
            Str::slug('Mono и Moonlight'),
            '0dfee5cfdcc482cb24fa726a1cc5f3cf'
        );
        $this->createHub(
            'Doctrine ORM',
            Str::slug('Doctrine ORM'),
            'd76d4802c9328dc2d23ee0e66e3312e8'
        );
        $this->createHub(
            'Google App Engine',
            Str::slug('Google App Engine'),
            '48d099cf12eedcf480ea5fd8fc1665f3'
        );
        $this->createHub(
            'Fidonet',
            Str::slug('Fidonet'),
            '8bdeb827a9a00d3617c072e7be1bb635'
        );
        $this->createHub(
            'Twisted',
            Str::slug('Twisted'),
            '9b22a7eee3c0b1175e27f2ca4383fa17'
        );
        $this->createHub(
            'IPTV',
            Str::slug('IPTV'),
            '1200c545947459ce14356e5924ed8a14'
        );
        $this->createHub(
            'Sphinx',
            Str::slug('Sphinx'),
            '7080a8da5dc5ad5cda9cfc8f10923bd0'
        );
        $this->createHub(
            'Оболочки',
            Str::slug('Оболочки'),
            '0eac9bbc3f96fefa5fc65e18e59b9e25'
        );
        $this->createHub(
            'XSLT',
            Str::slug('XSLT'),
            '686f023f340c3fd07154241b95e97164'
        );
        $this->createHub(
            'LaTeX',
            Str::slug('LaTeX'),
            'e8d2722d93e90da5a72cb0a1a8bfa3e8'
        );
        $this->createHub(
            'Small Basic',
            Str::slug('Small Basic'),
            '953831c5d17cdfe914f518e24af915c5'
        );
        $this->createHub(
            'Kohana',
            Str::slug('Kohana'),
            '973ed8ab2762a8297f7b541f1a38c3e6'
        );
        $this->createHub(
            'XML',
            Str::slug('XML'),
            '159014e44ae69f9f6bde01f3a17e7e66'
        );
        $this->createHub(
            'Разработка под Java ME',
            Str::slug('Разработка под Java ME'),
            'badd63f9d8c98af8406d2f823be76b7a'
        );
        $this->createHub(
            'LiveStreet',
            Str::slug('LiveStreet'),
            '2505a1a952859fa7af19e759e10e8878'
        );
        $this->createHub(
            'MooTools',
            Str::slug('MooTools'),
            'b5686b917481469fb723cf2e0280f647'
        );
        $this->createHub(
            'GreaseMonkey',
            Str::slug('GreaseMonkey'),
            '62794ba20556c8fbe494ca3578ca770d'
        );
        $this->createHub(
            'INFOLUST',
            Str::slug('INFOLUST'),
            '11a74dd6cdc2ab1b4deb56e612e6909e'
        );
        $this->createHub(
            'Groovy & Grails',
            Str::slug('Groovy & Grails'),
            '34ec27277672d19180482eee81fbc33b'
        );
        $this->createHub(
            'Lisp',
            Str::slug('Lisp'),
            '43f1a4c4588b789c5c60b793469c8214'
        );
        $this->createHub(
            'Графические оболочки',
            Str::slug('Графические оболочки'),
            'ee12270d3d65872f56aa53ccf8c3afdc'
        );
        $this->createHub(
            'VIM',
            Str::slug('VIM'),
            'e03f41733c87b7bafa92301db302164e'
        );
        $this->createHub(
            'Zend Framework',
            Str::slug('Zend Framework'),
            '82c0ea28d86bdc3a67531a5e215dcd01'
        );
        $this->createHub(
            'Библиотека ExtJS/Sencha',
            Str::slug('Библиотека ExtJS/Sencha'),
            '8aee078e32e3c099b213ea8cc37ec7ea'
        );
        $this->createHub(
            'Internet Explorer',
            Str::slug('Internet Explorer'),
            '7f33b8b38e7d6b5d3f5c7a049833fe16'
        );
        $this->createHub(
            'CodeIgniter',
            Str::slug('CodeIgniter'),
            'a0be210fd3482779f8b7fad0fd22a72b'
        );
        $this->createHub(
            'jQuery',
            Str::slug('jQuery'),
            '87c6116c01ec8e65d2974bc63e630c1d'
        );
        $this->createHub(
            'Silverlight',
            Str::slug('Silverlight'),
            'bb6e2ed86ed5041e3d71ea65e8603ae3'
        );
        $this->createHub(
            'SharePoint',
            Str::slug('SharePoint'),
            '81997b461c19397eeaea4e871b74226f'
        );
        $this->createHub(
            'Google Web Toolkit',
            Str::slug('Google Web Toolkit'),
            'c106a979d03bfd070d4d8bf45ab7f2dd'
        );
        $this->createHub(
            'Я пиарюсь',
            Str::slug('Я пиарюсь'),
            '0f4a9ac27402b038bf56bc81feffbf5b'
        );
        $this->createHub(
            'CakePHP',
            Str::slug('CakePHP'),
            'acc755ff56390abe8cb01efb67f6a753'
        );
        $this->createHub(
            'Safari',
            Str::slug('Safari'),
            'e9e1988d3420942578e1cfc745a5b714'
        );
        $this->createHub(
            'MODX',
            Str::slug('MODX'),
            'b3c737bcf1fcfb9efd684a14df63d013'
        );
        $this->createHub(
            'Opera',
            Str::slug('Opera'),
            '4f7dcd94c78412bd1381eea4eff18a5b'
        );
        $this->createHub(
            'WordPress',
            Str::slug('WordPress'),
            '5f83c032bf625a834dad8f81871520ae'
        );
        $this->createHub(
            'Микроформаты',
            Str::slug('Микроформаты'),
            '5322e350af78b05a6f245fbb9cafc5b5'
        );
        $this->createHub(
            'Ember.js',
            Str::slug('Ember.js'),
            '3430f045169914087c78eba333933ee2'
        );
        $this->createHub(
            'Ajax',
            Str::slug('Ajax'),
            '1de8e7e88c62a9c8750537fa0e0d46ef'
        );
        $this->createHub(
            'Email-маркетинг',
            Str::slug('Email-маркетинг'),
            'a924ba9ed0205d7991da0cc7ae765565'
        );
        $this->createHub(
            'Киберспорт',
            Str::slug('Киберспорт'),
            '5da8bda6d8275f9982b216d49edbe22b'
        );
        $this->createHub(
            'Верстка писем',
            Str::slug('Верстка писем'),
            'a0d0fab2b47fdb645a97566eba097b69'
        );
        $this->createHub(
            'Монетизация веб-сервисов',
            Str::slug('Монетизация веб-сервисов'),
            'dd8d8801fb89b8fddca31eec3bc8f193'
        );
    }
}
