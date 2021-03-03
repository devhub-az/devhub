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
            'images/hubs/1352db18765addaa6e0b2ac013d386d8.png'
        );
        $this->createHub(
            'Программирование',
            Str::slug('Программирование'),
            'images/hubs/db2c8f4a1974bf334d01595732f339c1.png'
        );
        $this->createHub(
            'Научно-популярное',
            Str::slug('Научно-популярное'),
            'images/hubs/02f2060b99e6f4d9403eee0420d7d5b8.png'
        );
        $this->createHub(
            'Системное администрирование',
            Str::slug('Системное администрирование'),
            'images/hubs/6c5db38c23972b6c0916e91e408edff8.png'
        );
        $this->createHub(
            'Сетевые технологии',
            Str::slug('Сетевые технологии'),
            'images/hubs/b2e13f8fcaf2711677c87418b98e85fe.png'
        );
        $this->createHub(
            'IT-компании',
            Str::slug('IT-компании'),
            'images/hubs/dfbd326740d2d30fba37f441919619f5.png'
        );
        $this->createHub(
            'Разработка игр',
            Str::slug('Разработка игр'),
            'images/hubs/b31347904b72455522b1f645ea28ef1a.png'
        );
        $this->createHub(
            'Карьера в IT-индустрии',
            Str::slug('Карьера в IT-индустрии'),
            'images/hubs/cabf82067c7be08c90a5903f860c9abf.png'
        );
        $this->createHub(
            'DIY или Сделай сам',
            Str::slug('DIY или Сделай сам'),
            'images/hubs/0ac9b48281cd7ba7401b4a4f5d9cd8d8.png'
        );
        $this->createHub(
            'Разработка веб-сайтов',
            Str::slug('Разработка веб-сайтов'),
            'images/hubs/2a2ac73dd5cddc6e05b47a3d502b4c0d.png'
        );
        $this->createHub(
            'Законодательство в IT',
            Str::slug('Законодательство в IT'),
            'images/hubs/a57348ade2b5c33e99e869aaee204c3f.png'
        );
        $this->createHub(
            'Python',
            Str::slug('Python'),
            'images/hubs/1c6724437b83f3d71abd08e5c2877a7a.png'
        );
        $this->createHub(
            'Машинное обучение',
            Str::slug('Машинное обучение'),
            'images/hubs/88237ab33b6f8acc090d443651c4f2f9.png'
        );
        $this->createHub(
            'Здоровье',
            Str::slug('Здоровье'),
            'images/hubs/612aab212721194fe115ed84dea966cc.png'
        );
        $this->createHub(
            'Математика',
            Str::slug('Математика'),
            'images/hubs/9f747d2beca9589226778700d866101d.png'
        );
        $this->createHub(
            'Open source',
            Str::slug('Open source'),
            'images/hubs/dc9dbee1d24188b925e86946bafb15c7.png'
        );
        $this->createHub(
            'Управление персоналом',
            Str::slug('Управление персоналом'),
            'images/hubs/2c0c6b86a9011cf811ce4b6820865115.png'
        );
        $this->createHub(
            'JavaScript',
            Str::slug('JavaScript'),
            'images/hubs/2b399b964d456f3ad1bfddc0346b60d4.png'
        );
        $this->createHub(
            'DevOps',
            Str::slug('DevOps'),
            'images/hubs/57d0923fc4dbf24622761210161f5b47.jpg'
        );
        $this->createHub(
            'Читальный зал',
            Str::slug('Читальный зал'),
            'images/hubs/04e1a1ccda37543704ede864665b2ccd.png'
        );
        $this->createHub(
            'История IT',
            Str::slug('История IT'),
            'images/hubs/bbeec149811969c7214c33d0a6911160.png'
        );
        $this->createHub(
            'Алгоритмы',
            Str::slug('Алгоритмы'),
            'images/hubs/61ebf97b08494e41ad7b7cad1e0aacc7.png'
        );
        $this->createHub(
            'Софт',
            Str::slug('Софт'),
            'images/hubs/c08ac8abdf8edc624ac48e8411851998.png'
        );
        $this->createHub(
            'Игры и игровые приставки',
            Str::slug('Игры и игровые приставки'),
            'images/hubs/250e195faa1708e4df5cb8664394a54f.png'
        );
        $this->createHub(
            'Физика',
            Str::slug('Физика'),
            'images/hubs/e554e4f790ec7617ecde4b3930acf44a.png'
        );
        $this->createHub(
            'Управление проектами',
            Str::slug('Управление проектами'),
            'images/hubs/94ab351adac61ac363e9de79c1382a67.png'
        );
        $this->createHub(
            'Java',
            Str::slug('Java'),
            'images/hubs/4c9821d2ad5a9844eb6d0f8c77991772.png'
        );
        $this->createHub(
            'Компьютерное железо',
            Str::slug('Компьютерное железо'),
            'images/hubs/57d7b53659e90f8971cf34081078d1e4.png'
        );
        $this->createHub(
            'Старое железо',
            Str::slug('Старое железо'),
            'images/hubs/064e290f484ad3bf745ebe9163b9276a.png'
        );
        $this->createHub(
            'Настройка Linux',
            Str::slug('Настройка Linux'),
            'images/hubs/d652d042e03426c4e8c7d15e2254cb4b.png'
        );
        $this->createHub(
            'Лайфхаки для гиков',
            Str::slug('Лайфхаки для гиков'),
            'images/hubs/9fa5f972e61ea8e0b7d0258ddafd3fbe.png'
        );
        $this->createHub(
            'Гаджеты',
            Str::slug('Гаджеты'),
            'images/hubs/d149ad4f5d22a8b8775b070f3c92cf39.png'
        );
        $this->createHub(
            'Управление разработкой',
            Str::slug('Управление разработкой'),
            'images/hubs/979b7b9bec5637525f70e76f05a498fb.png'
        );
        $this->createHub(
            'Космонавтика',
            Str::slug('Космонавтика'),
            'images/hubs/f07ba2b9d63b419e332a4d5ddeec8a99.png'
        );
        $this->createHub(
            'Системное программирование',
            Str::slug('Системное программирование'),
            'images/hubs/9c26b154fc3433778f64d493db6e5492.png'
        );
        $this->createHub(
            '*nix',
            Str::slug('*nix'),
            'images/hubs/9b6833e180e87f58150916cc250b4cbf.png'
        );
        $this->createHub(
            'Будущее здесь',
            Str::slug('Будущее здесь'),
            'images/hubs/8c3df17fe6153c109d190d6364f4afa5.png'
        );
        $this->createHub(
            'Биотехнологии',
            Str::slug('Биотехнологии'),
            'images/hubs/d0b1f8d21a424e35efc5b115434c7443.png'
        );
        $this->createHub(
            'Социальные сети и сообщества',
            Str::slug('Социальные сети и сообщества'),
            'images/hubs/6599b808c4d9faf273204167b601b2a0.png'
        );
        $this->createHub(
            'Производство и разработка электроники',
            Str::slug('Производство и разработка электроники'),
            'images/hubs/269015f78421d3d8efa321a6f81574f1.png'
        );
        $this->createHub(
            'IT-инфраструктура',
            Str::slug('IT-инфраструктура'),
            'images/hubs/59454645b38d9a58a92e6870133ae8e6.png'
        );
        $this->createHub(
            'Искусственный интеллект',
            Str::slug('Искусственный интеллект'),
            'images/hubs/4456b92870815e30ca14f4f66b6cb443.png'
        );
        $this->createHub(
            'Астрономия',
            Str::slug('Астрономия'),
            'images/hubs/79a987250ade16638dfafcce24213f3d.png'
        );
        $this->createHub(
            'Электроника для начинающих',
            Str::slug('Электроника для начинающих'),
            'images/hubs/6d947da0853000328fc6f5ba630006fb.png'
        );
        $this->createHub(
            'Звук',
            Str::slug('Звук'),
            'images/hubs/46fc1a2b8952c116646078e94ba29a90.png'
        );
        $this->createHub(
            'Схемотехника',
            Str::slug('Схемотехника'),
            'images/hubs/931d7eaa44179f5195debd4b35d47c51.png'
        );
        $this->createHub(
            'Высокая производительность',
            Str::slug('Высокая производительность'),
            'images/hubs/d4c97cde31f59169b6159e7fc7020503.png'
        );
        $this->createHub(
            'Анализ и проектирование систем',
            Str::slug('Анализ и проектирование систем'),
            'images/hubs/2041ff174c7379150892103472bf12cf.png'
        );
        $this->createHub(
            'Работа с видео',
            Str::slug('Работа с видео'),
            'images/hubs/6364a5e3da812a8d55677c05fb0d1ab3.png'
        );
        $this->createHub(
            'Финансы в IT',
            Str::slug('Финансы в IT'),
            'images/hubs/fd671fdcf24393f28b04673ef09bcd62.png'
        );
        $this->createHub(
            'Big Data',
            Str::slug('Big Data'),
            'images/hubs/99974bc6d012cd4094db36a0cb97e914.png'
        );
        $this->createHub(
            'Браузеры',
            Str::slug('Браузеры'),
            'images/hubs/b138a7176c8cbb20de86d55b43d2ce8f.png'
        );
        $this->createHub(
            'Транспорт',
            Str::slug('Транспорт'),
            'images/hubs/656c4285af372d89e1b0636d79521885.png'
        );
        $this->createHub(
            'Ненормальное программирование',
            Str::slug('Ненормальное программирование'),
            'images/hubs/32f8aaa676ea4746ee4cc3acaaac6d9a.png'
        );
        $this->createHub(
            'Rust',
            Str::slug('Rust'),
            'images/hubs/b4fbf73ef0672e6db43c0547b71d2b4c.png'
        );
        $this->createHub(
            'Серверное администрирование',
            Str::slug('Серверное администрирование'),
            'images/hubs/1b737e2d9b2f7b60a2f5700eb5f93f1e.png'
        );
        $this->createHub(
            'PHP',
            Str::slug('PHP'),
            'images/hubs/98a7a88319d5644cdc627b5e04b47d0f.png'
        );
        $this->createHub(
            'Дизайн игр',
            Str::slug('Дизайн игр'),
            'images/hubs/510987bd1a854995f2ce76d8fb5e513d.png'
        );
        $this->createHub(
            'Разработка под Android',
            Str::slug('Разработка под Android'),
            'images/hubs/deb535b54338aa5a202a516dee792556.png'
        );
        $this->createHub(
            'Интерфейсы',
            Str::slug('Интерфейсы'),
            'images/hubs/4eabd95a1dc768a8246a91e504a353f1.png'
        );
        $this->createHub(
            'Разработка под Linux',
            Str::slug('Разработка под Linux'),
            'images/hubs/e35838e1411346ef268e92bdf57603e7.png'
        );
        $this->createHub(
            'API',
            Str::slug('API'),
            'images/hubs/dfa56e2bf6d5979753f4ae9e8f7c27e1.png'
        );
        $this->createHub(
            'Исследования и прогнозы в IT',
            Str::slug('Исследования и прогнозы в IT'),
            'images/hubs/dfbb7982340f3a7ddb90860153b0c1ac.png'
        );
        $this->createHub(
            'Обработка изображений',
            Str::slug('Обработка изображений'),
            'images/hubs/fb7a4a8d37cb9eaf0d1fc8e62c3bde1a.png'
        );
        $this->createHub(
            'Разработка систем связи',
            Str::slug('Разработка систем связи'),
            'images/hubs/f3355864c032846e917b95ed691e7f52.png'
        );
        $this->createHub(
            'Администрирование баз данных',
            Str::slug('Администрирование баз данных'),
            'images/hubs/054a8b02b6b072771ac6b4f9cdd7dc4b.png'
        );
        $this->createHub(
            'Разработка мобильных приложений',
            Str::slug('Разработка мобильных приложений'),
            'images/hubs/13c0c0be8515f5edfc5eaa4fc60259f5.png'
        );
        $this->createHub(
            'Разработка под Arduino',
            Str::slug('Разработка под Arduino'),
            'images/hubs/a6e06b6b21a9fff92bcc5f8a1a0e6d5b.png'
        );
        $this->createHub(
            'Геоинформационные сервисы',
            Str::slug('Геоинформационные сервисы'),
            'images/hubs/a3bd376a36aadfaf2526098a92ada21f.png'
        );
        $this->createHub(
            'Процессоры',
            Str::slug('Процессоры'),
            'images/hubs/e65f3e98c20a32b1ba26e01125a2e333.png'
        );
        $this->createHub(
            'Учебный процесс в IT',
            Str::slug('Учебный процесс в IT'),
            'images/hubs/db6599152d4c6a7e81dd12f8d5b57e3d.png'
        );
        $this->createHub(
            'Облачные сервисы',
            Str::slug('Облачные сервисы'),
            'images/hubs/4f72adb8ad7c61a51a43a2911fa45313.png'
        );
        $this->createHub(
            'C++',
            Str::slug('Cpp'),
            'images/hubs/01b2ed29584e1245479ca857b0264ff1.png'
        );
        $this->createHub(
            'Программирование микроконтроллеров',
            Str::slug('Программирование микроконтроллеров'),
            'images/hubs/479657b871482c25c8f0a6f32efec586.png'
        );
        $this->createHub(
            'Криптография',
            Str::slug('Криптография'),
            'images/hubs/de4a7f775624db2496fbbe6399b25467.png'
        );
        $this->createHub(
            'Реверс-инжиниринг',
            Str::slug('Реверс-инжиниринг'),
            'images/hubs/cbe1e8e4077f777c9f93f31611802dda.png'
        );
        $this->createHub(
            'Инженерные системы',
            Str::slug('Инженерные системы'),
            'images/hubs/e8a9edc7d8b2a500fbe6a4283f718876.png'
        );
        $this->createHub(
            'Умный дом',
            Str::slug('Умный дом'),
            'images/hubs/34ebe1c07b5896dab79e5c97df5fe183.png'
        );
        $this->createHub(
            'Монетизация IT-систем',
            Str::slug('Монетизация IT-систем'),
            'images/hubs/63dc1ec56a1ffa1c50cefc9218d8cb59.png'
        );
        $this->createHub(
            'Сотовая связь',
            Str::slug('Сотовая связь'),
            'images/hubs/390f6dccdf5a3e39c4d7fc9584fa1e30.png'
        );
        $this->createHub(
            'Смартфоны',
            Str::slug('Смартфоны'),
            'images/hubs/c2b333a8db5a5bbde1ff0f224eca7117.png'
        );
        $this->createHub(
            'Расширения для браузеров',
            Str::slug('Расширения для браузеров'),
            'images/hubs/c173a30d606c8a37206327c114314c85.png'
        );
        $this->createHub(
            'Изучение языков',
            Str::slug('Изучение языков'),
            'images/hubs/778325a2d86596b796e5596eddc9354f.png'
        );
        $this->createHub(
            'Графический дизайн',
            Str::slug('Графический дизайн'),
            'images/hubs/2a0ae7b1b9bf7280a5a9ff7aab1da42f.png'
        );
        $this->createHub(
            'Копирайт',
            Str::slug('Копирайт'),
            'images/hubs/c6b35736d62556c1b35301bae2731ace.png'
        );
        $this->createHub(
            'Антивирусная защита',
            Str::slug('Антивирусная защита'),
            'images/hubs/89364f1250988fd97b4fd44a4e43f114.png'
        );
        $this->createHub(
            'Робототехника',
            Str::slug('Робототехника'),
            'images/hubs/4fc240caaae6907407cd6127f23a4aee.png'
        );
        $this->createHub(
            'Развитие стартапа',
            Str::slug('Развитие стартапа'),
            'images/hubs/19730eaa0d6d41df90c107be6144770e.png'
        );
        $this->createHub(
            'C#',
            Str::slug('C-Sharp'),
            'images/hubs/bc7f1e78397bca57cf5adcd5bf1725be.png'
        );
        $this->createHub(
            '.NET',
            Str::slug('.NET'),
            'images/hubs/a5a5aea294f48a0d81c4b1968432e5e1.png'
        );
        $this->createHub(
            'Промышленное программирование',
            Str::slug('Промышленное программирование'),
            'images/hubs/03cd6448a19ceced1e031242169a8eb5.png'
        );
        $this->createHub(
            'Настольные компьютеры',
            Str::slug('Настольные компьютеры'),
            'images/hubs/339e12ca68ba57e0d6f97e9c768af41b.png'
        );
        $this->createHub(
            'Git',
            Str::slug('Git'),
            'images/hubs/c4b10b70333b4c79a9658ff587522d4d.jpg'
        );
        $this->createHub(
            'Работа с 3D-графикой',
            Str::slug('Работа с 3D-графикой'),
            'images/hubs/d160248bb3da372ea4ffb20eed4baa2c.png'
        );
        $this->createHub(
            'Поисковые технологии',
            Str::slug('Поисковые технологии'),
            'images/hubs/cc4d392727cedcbf8b51cd5aaf2afd39.png'
        );
        $this->createHub(
            'Криптовалюты',
            Str::slug('Криптовалюты'),
            'images/hubs/5ee908a4977af1936e0fe21bdaaa5e72.png'
        );
        $this->createHub(
            'Разработка на Raspberry Pi',
            Str::slug('Разработка на Raspberry Pi'),
            'images/hubs/337210c0f187ef2605bc9335bb74ae0c.png'
        );
        $this->createHub(
            'Kotlin',
            Str::slug('Kotlin'),
            'images/hubs/75bb3b1c69225d61f235ef52be4d23dd.png'
        );
        $this->createHub(
            'GTD',
            Str::slug('GTD'),
            'images/hubs/6d756effa0a9d2d18daabd46794f7d46.png'
        );
        $this->createHub(
            'FPGA',
            Str::slug('FPGA'),
            'images/hubs/990babe4e54942287161ea2ecc01f347.png'
        );
        $this->createHub(
            'Беспроводные технологии',
            Str::slug('Беспроводные технологии'),
            'images/hubs/c4f3dd7d5d16afe555c49cc1fb765b79.png'
        );
        $this->createHub(
            'Хранение данных',
            Str::slug('Хранение данных'),
            'images/hubs/7de2c91bd2e446d8587fd0ffb3e3f571.png'
        );
        $this->createHub(
            'CSS',
            Str::slug('CSS'),
            'images/hubs/20afafe861e9814e46e8a20c8527bd80.png'
        );
        $this->createHub(
            'IT-эмиграция',
            Str::slug('IT-эмиграция'),
            'images/hubs/f226bc50287b600c041b663fa376681c.png'
        );
        $this->createHub(
            'Занимательные задачки',
            Str::slug('Занимательные задачки'),
            'images/hubs/d6ed3a6138cd63164a0c2d8968bef372.png'
        );
        $this->createHub(
            'C',
            Str::slug('C'),
            'images/hubs/c5aebf7e58df5c0bfe521fdf07866e6a.png'
        );
        $this->createHub(
            'Химия',
            Str::slug('Химия'),
            'images/hubs/cf3d20ce2eede1b1d639f80f781017f0.png'
        );
        $this->createHub(
            'Тестирование IT-систем',
            Str::slug('Тестирование IT-систем'),
            'images/hubs/88cd88dc5a3ea03d8d8e3f73bd35aafe.png'
        );
        $this->createHub(
            'Статистика в IT',
            Str::slug('Статистика в IT'),
            'images/hubs/5fc12a9fbd66cc4d7771dc8d152e4547.png'
        );
        $this->createHub(
            'Дизайн',
            Str::slug('Дизайн'),
            'images/hubs/579ffaebd7870d2c87f88ae2d35694e3.png'
        );
        $this->createHub(
            'Мессенджеры',
            Str::slug('Мессенджеры'),
            'images/hubs/910615c83444f1344fc92bb8de0bb9bb.png'
        );
        $this->createHub(
            'Разработка под iOS',
            Str::slug('Разработка под iOS'),
            'images/hubs/5a49bc47adf8de9e59bbf0a78b821ef9.png'
        );
        $this->createHub(
            'Яндекс API',
            Str::slug('Яндекс API'),
            'images/hubs/4e26c9e5ae1e061106eb5da4b660ae76.png'
        );
        $this->createHub(
            'Kubernetes',
            Str::slug('Kubernetes'),
            'images/hubs/c06b75a6be1550b0493024ec1507280c.png'
        );
        $this->createHub(
            'TypeScript',
            Str::slug('TypeScript'),
            'images/hubs/cab7bb7b8a279ee584926ced8e87cb15.png'
        );
        $this->createHub(
            'ReactJS',
            Str::slug('ReactJS'),
            'images/hubs/e7727d25b433a67f0e69acc74d2ba785.png'
        );
        $this->createHub(
            'Администрирование доменных имен',
            Str::slug('Администрирование доменных имен'),
            'images/hubs/81e1ba91137aa8cefdbea0777d5516a8.png'
        );
        $this->createHub(
            'Спам и антиспам',
            Str::slug('Спам и антиспам'),
            'images/hubs/fdbfd0a3e94cf6f8ad45dd1670999414.png'
        );
        $this->createHub(
            'Визуализация данных',
            Str::slug('Визуализация данных'),
            'images/hubs/54f6d4c42b588a4d0937f0fd8dfef39e.png'
        );
        $this->createHub(
            'Проектирование и рефакторинг',
            Str::slug('Проектирование и рефакторинг'),
            'images/hubs/9c6d91a45998a469e623cb3247b1734c.png'
        );
        $this->createHub(
            'Node.JS',
            Str::slug('Node.JS'),
            'images/hubs/64b6392124fdaa4e514fe8a0bc22251a.png'
        );
        $this->createHub(
            'Assembler',
            Str::slug('Assembler'),
            'images/hubs/e68041e7ec699d2983a37c38d0c77244.png'
        );
        $this->createHub(
            'Научная фантастика',
            Str::slug('Научная фантастика'),
            'images/hubs/65f2c2210786e8980a29b9a274189952.png'
        );
        $this->createHub(
            'Компиляторы',
            Str::slug('Компиляторы'),
            'images/hubs/31cf314e20303346fa3db65c8804a74c.png'
        );
        $this->createHub(
            'Хостинг',
            Str::slug('Хостинг'),
            'images/hubs/270fae79d4cd7070a1bcc27f41f68ce6.png'
        );
        $this->createHub(
            'Data Engineering',
            Str::slug('Data Engineering'),
            'images/hubs/08fb63a50ab8c2c691e8836a455b4e31.png'
        );
        $this->createHub(
            'Хранилища данных',
            Str::slug('Хранилища данных'),
            'images/hubs/897faad4310f59b4e5547371b5bd196f.png'
        );
        $this->createHub(
            'Управление продуктом',
            Str::slug('Управление продуктом'),
            'images/hubs/b7e34b7155812c7fd2aa5288b620ce25.png'
        );
        $this->createHub(
            'Разработка робототехники',
            Str::slug('Разработка робототехники'),
            'images/hubs/4bfb389fe370b1989092080d622375f2.png'
        );
        $this->createHub(
            'Энергия и элементы питания',
            Str::slug('Энергия и элементы питания'),
            'images/hubs/f134f938e6a084de411791eac09be18a.png'
        );
        $this->createHub(
            'Совершенный код',
            Str::slug('Совершенный код'),
            'images/hubs/8dc2eaa523bbf789e99d8c1be5a1ed34.png'
        );
        $this->createHub(
            'Data Mining',
            Str::slug('Data Mining'),
            'images/hubs/741cc48fe311046e166f158b180b9b61.png'
        );
        $this->createHub(
            'PostgreSQL',
            Str::slug('PostgreSQL'),
            'images/hubs/3916338e24104572809b971807686a8f.png'
        );
        $this->createHub(
            'Разработка под MacOS',
            Str::slug('Разработка под MacOS'),
            'images/hubs/a09fe1f00511e7c8838ef0cdd8da5598.png'
        );
        $this->createHub(
            'IT-стандарты',
            Str::slug('IT-стандарты'),
            'images/hubs/1e86e33333bec80031fba0c1223545ea.png'
        );
        $this->createHub(
            'Мозг',
            Str::slug('Мозг'),
            'images/hubs/d50aab5e00dd47a9fdeffee5714170e9.png'
        );
        $this->createHub(
            'ERP-системы',
            Str::slug('ERP-системы'),
            'images/hubs/835c62488fbd9322fe2673b9398d39f6.png'
        );
        $this->createHub(
            'Сетевое оборудование',
            Str::slug('Сетевое оборудование'),
            'images/hubs/c1078f7aa9a4709c3844e52918912d3d.png'
        );
        $this->createHub(
            'Интернет вещей',
            Str::slug('Интернет вещей'),
            'images/hubs/1c7c578325cb5c9eea947c545d1704a2.png'
        );
        $this->createHub(
            'Логические игры',
            Str::slug('Логические игры'),
            'images/hubs/36aa9169d992483fa29455af0edd423f.png'
        );
        $this->createHub(
            'Laravel',
            Str::slug('Laravel'),
            'images/hubs/0bdb91ce8e124137ee8f67fa9faa943e.png'
        );
        $this->createHub(
            'Бизнес-модели',
            Str::slug('Бизнес-модели'),
            'images/hubs/d55cd678d30171ab077b4980ce15202f.png'
        );
        $this->createHub(
            'HTML',
            Str::slug('HTML'),
            'images/hubs/e0dbdc393c996e7a628c5d051d0fcf8b.png'
        );
        $this->createHub(
            'Usability',
            Str::slug('Usability'),
            'images/hubs/03c8f441004dbc3c3b7560e34b6e5108.png'
        );
        $this->createHub(
            'Разработка под Windows',
            Str::slug('Разработка под Windows'),
            'images/hubs/0a873420a5a05dad2d109eaebb9ab127.png'
        );
        $this->createHub(
            'Yii',
            Str::slug('Yii'),
            'images/hubs/b4fb06003337b47d9e87e85aa274579f.png'
        );
        $this->createHub(
            'Удалённая работа',
            Str::slug('Удалённая работа'),
            'images/hubs/23ca94ca260ce63e5192f0ef1569467e.jpg'
        );
        $this->createHub(
            '3D-принтеры',
            Str::slug('3D-принтеры'),
            'images/hubs/3977c44df876a05b29e70c9f0da0f844.png'
        );
        $this->createHub(
            'Swift',
            Str::slug('Swift'),
            'images/hubs/ce4aee96ac5cce42451f98cf8ce12031.png'
        );
        $this->createHub(
            'Тестирование веб-сервисов',
            Str::slug('Тестирование веб-сервисов'),
            'images/hubs/dec8aa561fbd799fc4f1da65ee0a3b21.png'
        );
        $this->createHub(
            'OpenStreetMap',
            Str::slug('OpenStreetMap'),
            'images/hubs/43cf91b8086223c10504628c2275d9ac.png'
        );
        $this->createHub(
            'Отладка',
            Str::slug('Отладка'),
            'images/hubs/0a41daa7ff93df591be64cd36dfe13c4.png'
        );
        $this->createHub(
            'SaaS / S+S',
            Str::slug('SaaS / S+S'),
            'images/hubs/0d2b172a14aedfead6eaab94ae2d3acf.png'
        );
        $this->createHub(
            'Контент-маркетинг',
            Str::slug('Контент-маркетинг'),
            'images/hubs/5752871941f74139354ce4076db940e0.png'
        );
        $this->createHub(
            'Delphi',
            Str::slug('Delphi'),
            'images/hubs/cfe5fe3c2d7d088fd194507d92abe731.png'
        );
        $this->createHub(
            'TensorFlow',
            Str::slug('TensorFlow'),
            'images/hubs/de9bdbee7bf0c27cc6e12600e107c9ee.jpg'
        );
        $this->createHub(
            'Прототипирование',
            Str::slug('Прототипирование'),
            'images/hubs/6fa6da62d615ba8e7d9f0186eacfabbf.png'
        );
        $this->createHub(
            'Серверная оптимизация',
            Str::slug('Серверная оптимизация'),
            'images/hubs/9184ec852f54946682e7de3c931828b4.png'
        );
        $this->createHub(
            'Habr',
            Str::slug('Habr'),
            'images/hubs/38cc4c54052801a61c6bb7aeb580e000.png'
        );
        $this->createHub(
            'Symfony',
            Str::slug('Symfony'),
            'images/hubs/9997ee481b6d2834c797fb4d8e913266.png'
        );
        $this->createHub(
            'GitHub',
            Str::slug('GitHub'),
            'images/hubs/7570365720336f67615cded621df8bd5.png'
        );
        $this->createHub(
            '1С',
            Str::slug('1С'),
            'images/hubs/7f48455fc5cac3578d8fdd52a5bca9f9.png'
        );
        $this->createHub(
            'Профессиональная литература',
            Str::slug('Профессиональная литература'),
            'images/hubs/53872e15b6716c38bec1ac09833668c2.png'
        );
        $this->createHub(
            'Микросервисы',
            Str::slug('Микросервисы'),
            'images/hubs/e54909f6cc824ba99cef4efa02fd738e.png'
        );
        $this->createHub(
            'Unity',
            Str::slug('Unity'),
            'images/hubs/21126b3fa26389b05c39149dcdffd86c.png'
        );
        $this->createHub(
            'Agile',
            Str::slug('Agile'),
            'images/hubs/7215e3221495be463dd1ebeacbef2e53.png'
        );
        $this->createHub(
            'Дизайн мобильных приложений',
            Str::slug('Дизайн мобильных приложений'),
            'images/hubs/c044dea649d5fac76a46799cc12766b7.png'
        );
        $this->createHub(
            'Веб-аналитика',
            Str::slug('Веб-аналитика'),
            'images/hubs/f0c2621fbcdbe6ad994bdff586a20ea3.png'
        );
        $this->createHub(
            'Конференции',
            Str::slug('Конференции'),
            'images/hubs/f70cf76bdfceec5d6c3085fec9e64ac6.png'
        );
        $this->createHub(
            'Angular',
            Str::slug('Angular'),
            'images/hubs/f9c39a77f815375969bfd1faaff8f68f.png'
        );
        $this->createHub(
            'Экология',
            Str::slug('Экология'),
            'images/hubs/72cc4843f57af4cc790c9d60035df1de.png'
        );
        $this->createHub(
            'AR и VR',
            Str::slug('AR и VR'),
            'images/hubs/97c90f89e350b110c0cb501dbfffe628.png'
        );
        $this->createHub(
            'Биографии гиков',
            Str::slug('Биографии гиков'),
            'images/hubs/4d67475c0c5b4d6157d691f2524386bb.png'
        );
        $this->createHub(
            'Продвижение игр',
            Str::slug('Продвижение игр'),
            'images/hubs/3c4e013b8bcb3592209ed57f1d4b69fd.png'
        );
        $this->createHub(
            'Распределённые системы',
            Str::slug('Распределённые системы'),
            'images/hubs/e1bfc5b451e464edfe155fad4a678a66.png'
        );
        $this->createHub(
            'Периферия',
            Str::slug('Периферия'),
            'images/hubs/b6f63fb7fe6ff12fbcae25c075905435.png'
        );
        $this->createHub(
            'Открытые данные',
            Str::slug('Открытые данные'),
            'images/hubs/755d3113dd0cc4ccacefdd471462b3e4.png'
        );
        $this->createHub(
            'Системы управления версиями',
            Str::slug('Системы управления версиями'),
            'images/hubs/459376cbf21d5342318fd33ec48a1531.png'
        );
        $this->createHub(
            'Разработка для интернета вещей',
            Str::slug('Разработка для интернета вещей'),
            'images/hubs/fcddf2340fbad2b675f1fa367c743320.png'
        );
        $this->createHub(
            'CTF',
            Str::slug('CTF'),
            'images/hubs/45f8b1a14b1d5049629b0368e4b8675e.png'
        );
        $this->createHub(
            'I2P',
            Str::slug('I2P'),
            'images/hubs/e7bb4b01b63f56c790a01e9c8c50ad33.png'
        );
        $this->createHub(
            'Функциональное программирование',
            Str::slug('Функциональное программирование'),
            'images/hubs/65416d6facd9b74513aa035731167f9f.png'
        );
        $this->createHub(
            'Управление сообществом',
            Str::slug('Управление сообществом'),
            'images/hubs/85d0ba490c6cb811701c16f899729b8d.png'
        );
        $this->createHub(
            'Автомобильные гаджеты',
            Str::slug('Автомобильные гаджеты'),
            'images/hubs/c0e33d3bdece2e8b8c1b38907f6a3d46.png'
        );
        $this->createHub(
            'Ноутбуки',
            Str::slug('Ноутбуки'),
            'images/hubs/896a49a57cd93220352ab9ab371adf1e.png'
        );
        $this->createHub(
            'Фототехника',
            Str::slug('Фототехника'),
            'images/hubs/0ada791a405e6a0e18740a884cea9fbf.png'
        );
        $this->createHub(
            'SQL',
            Str::slug('SQL'),
            'images/hubs/64b22b8b6c4677778423e971d52eb05d.png'
        );
        $this->createHub(
            'Урбанизм',
            Str::slug('Урбанизм'),
            'images/hubs/94a85a57823586d9bac5bc4b9cd11238.png'
        );
        $this->createHub(
            'Тестирование мобильных приложений',
            Str::slug('Тестирование мобильных приложений'),
            'images/hubs/6da82050584fd944fa4888a3bd761b38.png'
        );
        $this->createHub(
            'Клиентская оптимизация',
            Str::slug('Клиентская оптимизация'),
            'images/hubs/8dd7eb425202cc92823ecbb22c2631d1.png'
        );
        $this->createHub(
            'Go',
            Str::slug('Go'),
            'images/hubs/a10c5c62685d9a7d2964993daf6958c3.png'
        );
        $this->createHub(
            'Tarantool',
            Str::slug('Tarantool'),
            'images/hubs/8e3a92248ba9acdb02a3a5676852f9c3.png'
        );
        $this->createHub(
            'Google Chrome',
            Str::slug('Google Chrome'),
            'images/hubs/061be4f76ce29f2ab0ea72eee1af2dd4.png'
        );
        $this->createHub(
            'Спортивное программирование',
            Str::slug('Спортивное программирование'),
            'images/hubs/6acc75615af52a06a86175ffc16e2cf3.png'
        );
        $this->createHub(
            'Киберпанк',
            Str::slug('Киберпанк'),
            'images/hubs/c963675ab084372e75c7c29c5477ee57.png'
        );
        $this->createHub(
            'Apache',
            Str::slug('Apache'),
            'images/hubs/491f0a9b3dd805b1e97478d97ece9be6.png'
        );
        $this->createHub(
            'Интервью',
            Str::slug('Интервью'),
            'images/hubs/1a2c8f70d4b048d9ffdf0b259ee9128a.png'
        );
        $this->createHub(
            'Scala',
            Str::slug('Scala'),
            'images/hubs/1c46ddda78b79073229c13dba60ebdd9.png'
        );
        $this->createHub(
            'Интернет-маркетинг',
            Str::slug('Интернет-маркетинг'),
            'images/hubs/88d843ea06f5e311c224be84e7b11afe.png'
        );
        $this->createHub(
            'CRM-системы',
            Str::slug('CRM-системы'),
            'images/hubs/577c521d4fb330e7d668a3676cf8d4e3.png'
        );
        $this->createHub(
            'Управление продажами',
            Str::slug('Управление продажами'),
            'images/hubs/7ca18c6de900c26e33f5eb8fda46ece1.png'
        );
        $this->createHub(
            'Firefox',
            Str::slug('Firefox'),
            'images/hubs/d6cd93e2f0dfdf50713c9089a78669ed.png'
        );
        $this->createHub(
            'Natural Language Processing',
            Str::slug('Natural Language Processing'),
            'images/hubs/603db5b716ae407c8282771be935018b.png'
        );
        $this->createHub(
            'Работа с иконками',
            Str::slug('Работа с иконками'),
            'images/hubs/9efd451a60608aae025d13c3895b72dd.png'
        );
        $this->createHub(
            'Ruby',
            Str::slug('Ruby'),
            'images/hubs/1f60b3b0dcdf8f157023963d20b0e18f.png'
        );
        $this->createHub(
            'Квантовые технологии',
            Str::slug('Квантовые технологии'),
            'images/hubs/95e2646aead4f970af85e49a25c9f633.png'
        );
        $this->createHub(
            'Flutter',
            Str::slug('Flutter'),
            'images/hubs/63b728b76ec18862a5454a684509940b.png'
        );
        $this->createHub(
            'Тестирование игр',
            Str::slug('Тестирование игр'),
            'images/hubs/30aec053eecd1f5555a8ba577a3b6266.png'
        );
        $this->createHub(
            'Накопители',
            Str::slug('Накопители'),
            'images/hubs/dd2008e4cf2ac6ec8d90d09c2468ea3f.png'
        );
        $this->createHub(
            'Облачные вычисления',
            Str::slug('Облачные вычисления'),
            'images/hubs/575cde49ba588c7941a780be516528c2.png'
        );
        $this->createHub(
            'Децентрализованные сети',
            Str::slug('Децентрализованные сети'),
            'images/hubs/e4cb9d258b83d5fe134bb3894ac40504.png'
        );
        $this->createHub(
            'Хакатоны',
            Str::slug('Хакатоны'),
            'images/hubs/9368c10e22a343a82621977d878fbeca.png'
        );
        $this->createHub(
            'Управление e-commerce',
            Str::slug('Управление e-commerce'),
            'images/hubs/9910082e92a30d7c8c18b0e5cc25a239.png'
        );
        $this->createHub(
            'ООП',
            Str::slug('ООП'),
            'images/hubs/e4e31ae7a84dd9ebe94103619f7b8631.png'
        );
        $this->createHub(
            'Семантика',
            Str::slug('Семантика'),
            'images/hubs/c31b8fa39bfe24f06cc516989e961ea0.png'
        );
        $this->createHub(
            'Django',
            Str::slug('Django'),
            'images/hubs/f2fb899050a39a3c14f7ed53f43593d7.png'
        );
        $this->createHub(
            'Подготовка технической документации',
            Str::slug('Подготовка технической документации'),
            'images/hubs/9991282437d46db397e282e88663fa5d.png'
        );
        $this->createHub(
            'Видеокарты',
            Str::slug('Видеокарты'),
            'images/hubs/d20cb40f6df9eec7079d596459cffd74.png'
        );
        $this->createHub(
            'CAD/CAM',
            Str::slug('CAD/CAM'),
            'images/hubs/23461151a8fef81c88b27a144bb6c6a0.png'
        );
        $this->createHub(
            'Amazon Web Services',
            Str::slug('Amazon Web Services'),
            'images/hubs/b7d627b5cc730038cd6f66cd07220b69.png'
        );
        $this->createHub(
            'Параллельное программирование',
            Str::slug('Параллельное программирование'),
            'images/hubs/b1da2a591fdba427c9db91ecf94fbed3.png'
        );
        $this->createHub(
            'Платежные системы',
            Str::slug('Платежные системы'),
            'images/hubs/e7dfbfc3cf0165469a372abd09c5ef10.png'
        );
        $this->createHub(
            'Регулярные выражения',
            Str::slug('Регулярные выражения'),
            'images/hubs/1a78e69cc6af07806f802ce9582d05da.png'
        );
        $this->createHub(
            'PowerShell',
            Str::slug('PowerShell'),
            'images/hubs/1fa2b14cf2579c506f1aca386165eb32.png'
        );
        $this->createHub(
            'Голосовые интерфейсы',
            Str::slug('Голосовые интерфейсы'),
            'images/hubs/0e3b645fa3b60e48195be36358601139.png'
        );
        $this->createHub(
            'Adobe Flash',
            Str::slug('Adobe Flash'),
            'images/hubs/a224f5bb173b680fcf32193ba4f09b07.png'
        );
        $this->createHub(
            'TDD',
            Str::slug('TDD'),
            'images/hubs/75e504d7671eb26e30add73b8b1df482.png'
        );
        $this->createHub(
            'Perl',
            Str::slug('Perl'),
            'images/hubs/55a239e8e3b58a2e40827a04caaa2f4c.png'
        );
        $this->createHub(
            'Canvas',
            Str::slug('Canvas'),
            'images/hubs/6f7165171deb375a5c95036b55618d29.png'
        );
        $this->createHub(
            'Разработка под AR и VR',
            Str::slug('Разработка под AR и VR'),
            'images/hubs/e0500be9f2c8e55fef92703f3c1f12d9.png'
        );
        $this->createHub(
            'Инфографика',
            Str::slug('Инфографика'),
            'images/hubs/99d3fd2ec94a3f254efbb92996e3e251.png'
        );
        $this->createHub(
            'Cobol',
            Str::slug('Cobol'),
            'images/hubs/940e369c29852c310cb7c27f24909187.png'
        );
        $this->createHub(
            'Xamarin',
            Str::slug('Xamarin'),
            'images/hubs/169334f506dc179631ec91889a47da71.png'
        );
        $this->createHub(
            'VueJS',
            Str::slug('VueJS'),
            'images/hubs/bc3e2f564a54900c16f90ef53d5f62b6.png'
        );
        $this->createHub(
            'Аналитика мобильных приложений',
            Str::slug('Аналитика мобильных приложений'),
            'images/hubs/cd53348ce9a13411cbeb0cc6c3b07d85.png'
        );
        $this->createHub(
            'Lua',
            Str::slug('Lua'),
            'images/hubs/14826baede3a4f453908a2b528bef22a.png'
        );
        $this->createHub(
            'Dart',
            Str::slug('Dart'),
            'images/hubs/41e6712dd7d298077553efff8562bd73.png'
        );
        $this->createHub(
            'Prolog',
            Str::slug('Prolog'),
            'images/hubs/b37abac13223937e5933eb217231ee87.png'
        );
        $this->createHub(
            'WebGL',
            Str::slug('WebGL'),
            'images/hubs/8dd5ca7bdf3e6a2d1951320c5f08ff84.png'
        );
        $this->createHub(
            'Носимая электроника',
            Str::slug('Носимая электроника'),
            'images/hubs/ab98c9175b8a223fcaeebfb60352c7cc.png'
        );
        $this->createHub(
            'CGI (графика)',
            Str::slug('CGI (графика)'),
            'images/hubs/1950896c66ad2c6a3231c830c9640160.png'
        );
        $this->createHub(
            'Системы сборки',
            Str::slug('Системы сборки'),
            'images/hubs/b32c95751d93477b13d637f89a7ad11a.png'
        );
        $this->createHub(
            'SCADA',
            Str::slug('SCADA'),
            'images/hubs/74e4478d5bedf7bc4798b85f3270e306.png'
        );
        $this->createHub(
            'Терминология IT',
            Str::slug('Терминология IT'),
            'images/hubs/8f946550bfaf3eddd7e93ea9e2270fc2.png'
        );
        $this->createHub(
            'Фриланс',
            Str::slug('Фриланс'),
            'images/hubs/bfdf291bd0216cd7ca7cd7a7b1e56ca6.png'
        );
        $this->createHub(
            'NoSQL',
            Str::slug('NoSQL'),
            'images/hubs/55b5e04621694cafb82489202daa165e.png'
        );
        $this->createHub(
            'PDF',
            Str::slug('PDF'),
            'images/hubs/8265ded3c97a3543d4e2c703c7ce8225.png'
        );
        $this->createHub(
            'Gradle',
            Str::slug('Gradle'),
            'images/hubs/87b2593d7d20edf3ee01fe4de7564caa.png'
        );
        $this->createHub(
            'Ruby on Rails',
            Str::slug('Ruby on Rails'),
            'images/hubs/b6e749c8b863f4ce37b1179c5e0f769e.png'
        );
        $this->createHub(
            'Visual Studio',
            Str::slug('Visual Studio'),
            'images/hubs/1583a0ad048e5e22d30119cd16b8537f.png'
        );
        $this->createHub(
            'Видеоконференцсвязь',
            Str::slug('Видеоконференцсвязь'),
            'images/hubs/3049d2d548145a33564acccc14bcd7e5.png'
        );
        $this->createHub(
            'Разработка под e-commerce',
            Str::slug('Разработка под e-commerce'),
            'images/hubs/2a17c5ce59f4e6449c42b34d76235c17.png'
        );
        $this->createHub(
            'R',
            Str::slug('R'),
            'images/hubs/ac6da4821bbfeec1c0e2331385b51820.png'
        );
        $this->createHub(
            'Nginx',
            Str::slug('Nginx'),
            'images/hubs/4c9b2a1d00796d1dc924a37316219eb2.png'
        );
        $this->createHub(
            'Atlassian',
            Str::slug('Atlassian'),
            'images/hubs/eeab793aae8d7b53389240a786308b75.png'
        );
        $this->createHub(
            'Управление медиа',
            Str::slug('Управление медиа'),
            'images/hubs/a5a23996cdde59045f2c735f0ffa9f29.png'
        );
        $this->createHub(
            'Oracle',
            Str::slug('Oracle'),
            'images/hubs/c9d1a4b6f8257d96fbecc20a2efa199c.png'
        );
        $this->createHub(
            'Патентование',
            Str::slug('Патентование'),
            'images/hubs/47219825d9c78935d51cb3dcb4226f58.png'
        );
        $this->createHub(
            'Виртуализация',
            Str::slug('Виртуализация'),
            'images/hubs/86402884b9a8503bfdbd34740fc9982d.png'
        );
        $this->createHub(
            'Венчурные инвестиции',
            Str::slug('Венчурные инвестиции'),
            'images/hubs/8a09c6ce4982e473f7d43d622e3ea95c.png'
        );
        $this->createHub(
            'Демосцена',
            Str::slug('Демосцена'),
            'images/hubs/2c64a86cb9a01508b4fe83c9caa0d399.png'
        );
        $this->createHub(
            'Accessibility',
            Str::slug('Accessibility'),
            'images/hubs/d7cc710eac3f08b15aaffd102774aa00.png'
        );
        $this->createHub(
            'Разработка для Office 365',
            Str::slug('Разработка для Office 365'),
            'images/hubs/c4ec69d4cd59c18d1e6096e964d645d3.png'
        );
        $this->createHub(
            'Компьютерная анимация',
            Str::slug('Компьютерная анимация'),
            'images/hubs/34df1db9da3e8745ad047ee0ffd1cf94.png'
        );
        $this->createHub(
            'Поисковая оптимизация',
            Str::slug('Поисковая оптимизация'),
            'images/hubs/71062dccf4bb1a49459d5a6887c8ec86.png'
        );
        $this->createHub(
            'Мультикоптеры',
            Str::slug('Мультикоптеры'),
            'images/hubs/b6cb5859b7dda6817ddbff3a2f3d7715.png'
        );
        $this->createHub(
            'Визуальное программирование',
            Str::slug('Визуальное программирование'),
            'images/hubs/7904095a3cf960350049e9fdc3414ae5.png'
        );
        $this->createHub(
            'Планшеты',
            Str::slug('Планшеты'),
            'images/hubs/d31cb8d99c60dd99227d869551bb1352.png'
        );
        $this->createHub(
            'Медийная реклама',
            Str::slug('Медийная реклама'),
            'images/hubs/dc33ff2a1aeb30da56be00c4bd3dd17f.png'
        );
        $this->createHub(
            'Видеотехника',
            Str::slug('Видеотехника'),
            'images/hubs/321d5bd418d773358ec67730ed6bc315.png'
        );
        $this->createHub(
            'Мониторы и ТВ',
            Str::slug('Мониторы и ТВ'),
            'images/hubs/b04ba5ac277d807ffd52ef3f7ab4b82a.png'
        );
        $this->createHub(
            'Веб-дизайн',
            Str::slug('Веб-дизайн'),
            'images/hubs/9f0054a3f1d5b5d344953adca3dea737.png'
        );
        $this->createHub(
            'Haskell',
            Str::slug('Haskell'),
            'images/hubs/138ce5098d4a2e04ee975ef25a911ddc.png'
        );
        $this->createHub(
            'ASP',
            Str::slug('ASP'),
            'images/hubs/7de1cc8e6def6778e47e8e72f914a0bb.png'
        );
        $this->createHub(
            'Service Desk',
            Str::slug('Service Desk'),
            'images/hubs/c63386b4de9e72aba5664fefc8b16988.png'
        );
        $this->createHub(
            'SvelteJS',
            Str::slug('SvelteJS'),
            'images/hubs/841bf696493d77d0bdd670ed46d2f802.png'
        );
        $this->createHub(
            'Офисы IT-компаний',
            Str::slug('Офисы IT-компаний'),
            'images/hubs/0f540c9ca6347fbfb5582ad99d26f432.png'
        );
        $this->createHub(
            'Восстановление данных',
            Str::slug('Восстановление данных'),
            'images/hubs/c804767ab58b9052f8a30dec95105823.png'
        );
        $this->createHub(
            '1С-Битрикс',
            Str::slug('1С-Битрикс'),
            'images/hubs/4d23aabf3eb8335a8f625c940c997a5b.png'
        );
        $this->createHub(
            'Локализация продуктов',
            Str::slug('Локализация продуктов'),
            'images/hubs/fd182296074702d74f02fdef7e198523.png'
        );
        $this->createHub(
            'IPFS',
            Str::slug('IPFS'),
            'images/hubs/c87b0b9d9bc96985de8b2a4e41e071ae.jpg'
        );
        $this->createHub(
            'Qt',
            Str::slug('Qt'),
            'images/hubs/a69436043016a35349d05068d584b316.png'
        );
        $this->createHub(
            'Суперкомпьютеры',
            Str::slug('Суперкомпьютеры'),
            'images/hubs/1b1def37d47f1a759cb60c89adfb5cd9.png'
        );
        $this->createHub(
            'Elixir/Phoenix',
            Str::slug('Elixir/Phoenix'),
            'images/hubs/45d576c7f9cddfe625e4a79a46ec99ee.png'
        );
        $this->createHub(
            'Erlang/OTP',
            Str::slug('Erlang/OTP'),
            'images/hubs/f6c93fc11831a7863feb820424b9d7a3.png'
        );
        $this->createHub(
            'SQLite',
            Str::slug('SQLite'),
            'images/hubs/f4cc28cccd00584f8002be209d504555.png'
        );
        $this->createHub(
            'Стандарты связи',
            Str::slug('Стандарты связи'),
            'images/hubs/4b387931f3cae13084e05dbbd3083ab8.png'
        );
        $this->createHub(
            'Google Cloud Platform',
            Str::slug('Google Cloud Platform'),
            'images/hubs/df9540dff9c0f645e365ba508ad2ff72.png'
        );
        $this->createHub(
            'Growth Hacking',
            Str::slug('Growth Hacking'),
            'images/hubs/bf364f98338f6d7d89512a827e72e817.png'
        );
        $this->createHub(
            'Монетизация игр',
            Str::slug('Монетизация игр'),
            'images/hubs/6c1010b5f21e20c68bb48604f8039d2f.png'
        );
        $this->createHub(
            'Нанотехнологии',
            Str::slug('Нанотехнологии'),
            'images/hubs/89855dbd3bd40547a5dae78f7458ebe8.png'
        );
        $this->createHub(
            'Firebird/Interbase',
            Str::slug('Firebird/Interbase'),
            'images/hubs/567b4a77aae9db45aa5dad5a5c8dd11a.png'
        );
        $this->createHub(
            'Godot',
            Str::slug('Godot'),
            'images/hubs/c6d7851108f03ccd709c8310d0af79f1.png'
        );
        $this->createHub(
            'GTK+',
            Str::slug('GTK+'),
            'images/hubs/9befd27bf2f75c181c2f5ba6d235ed02.png'
        );
        $this->createHub(
            'Microsoft SQL Server',
            Str::slug('Microsoft SQL Server'),
            'images/hubs/e194b255ac49ea6fbed18aa5b070dbd3.png'
        );
        $this->createHub(
            'GPGPU',
            Str::slug('GPGPU'),
            'images/hubs/103d0d83cf512092f5fe28b02def0c00.png'
        );
        $this->createHub(
            'Сжатие данных',
            Str::slug('Сжатие данных'),
            'images/hubs/03ce2899503daa5a49ffdcc585f177c9.png'
        );
        $this->createHub(
            'Краудсорсинг',
            Str::slug('Краудсорсинг'),
            'images/hubs/eef871bbcc11cdbbe9bf46ba868f9539.png'
        );
        $this->createHub(
            'Smalltalk',
            Str::slug('Smalltalk'),
            'images/hubs/b865158d3824b890ec2bf33206001da8.png'
        );
        $this->createHub(
            'Help Desk Software',
            Str::slug('Help Desk Software'),
            'images/hubs/1c779ac28ff3e9c182d55666842c3940.jpg'
        );
        $this->createHub(
            'Eclipse',
            Str::slug('Eclipse'),
            'images/hubs/b081831c57589c596513abfa80708592.png'
        );
        $this->createHub(
            'CMS',
            Str::slug('CMS'),
            'images/hubs/edffd100d2e0fc5a54933add3acd9e04.png'
        );
        $this->createHub(
            'Xcode',
            Str::slug('Xcode'),
            'images/hubs/7aa85956586fea162d4607678f1da2c4.png'
        );
        $this->createHub(
            'Резервное копирование',
            Str::slug('Резервное копирование'),
            'images/hubs/e7eb618c16c1d42cf80d5ec578d60e8f.png'
        );
        $this->createHub(
            'Глобальные системы позиционирования',
            Str::slug('Глобальные системы позиционирования'),
            'images/hubs/56e048aaab41b3b32823f9f1449934cd.png'
        );
        $this->createHub(
            'Работа с векторной графикой',
            Str::slug('Работа с векторной графикой'),
            'images/hubs/3ff835af9ba4ca0bab9485c81c1f651f.png'
        );
        $this->createHub(
            'Microsoft Azure',
            Str::slug('Microsoft Azure'),
            'images/hubs/3d6d7e43c2a17f483a9e7d153060239c.png'
        );
        $this->createHub(
            'Google API',
            Str::slug('Google API'),
            'images/hubs/c9a4a92598b12928780850f73651a483.jpg'
        );
        $this->createHub(
            'Asterisk',
            Str::slug('Asterisk'),
            'images/hubs/e67236b03b0196043893d0b6dbc27de8.png'
        );
        $this->createHub(
            'DNS',
            Str::slug('DNS'),
            'images/hubs/5e8c5673a5f99edd1830e5633e9c20f4.png'
        );
        $this->createHub(
            'MongoDB',
            Str::slug('MongoDB'),
            'images/hubs/9d73700ac34f30f83e776c7d8e06e93a.png'
        );
        $this->createHub(
            'Drupal',
            Str::slug('Drupal'),
            'images/hubs/06bd786d57711077f03fbdcae6f85634.png'
        );
        $this->createHub(
            'Flask',
            Str::slug('Flask'),
            'images/hubs/47c6943ae3a360d538df41b89bc6de99.png'
        );
        $this->createHub(
            'Презентации',
            Str::slug('Презентации'),
            'images/hubs/796ce32f89e2bc674988db5d38704090.png'
        );
        $this->createHub(
            'Objective C',
            Str::slug('Objective C'),
            'images/hubs/0c6d3bf00e085e8fd3efc26ef7aeff73.png'
        );
        $this->createHub(
            'Openshift',
            Str::slug('Openshift'),
            'images/hubs/4db6ec8abfff394c69337d883f171699.png'
        );
        $this->createHub(
            'Matlab',
            Str::slug('Matlab'),
            'images/hubs/899cf6e6abbc157b9ac601d8c90704d9.jpg'
        );
        $this->createHub(
            'Unreal Engine',
            Str::slug('Unreal Engine'),
            'images/hubs/16b526adb5ab2c74d226709501032c6b.png'
        );
        $this->createHub(
            'MySQL',
            Str::slug('MySQL'),
            'images/hubs/d9c7e051c85e8c5364cc500a16cac2e0.png'
        );
        $this->createHub(
            'IPv6',
            Str::slug('IPv6'),
            'images/hubs/d4602a36f6128c6cb1ab713bcb288d80.png'
        );
        $this->createHub(
            'Медгаджеты',
            Str::slug('Медгаджеты'),
            'images/hubs/3ca8a3a2b2431c5ae95a172b57a65940.png'
        );
        $this->createHub(
            'ECM/СЭД',
            Str::slug('ECM/СЭД'),
            'images/hubs/321ea2d6ec735110e6e84b51144442e2.png'
        );
        $this->createHub(
            'Кодобред',
            Str::slug('Кодобред'),
            'images/hubs/815d9d1c18d96b897a17bc06aaf51c38.png'
        );
        $this->createHub(
            'Microsoft Edge',
            Str::slug('Microsoft Edge'),
            'images/hubs/1be981c79360b47cfbd430a73066887e.png'
        );
        $this->createHub(
            'Повышение конверсии',
            Str::slug('Повышение конверсии'),
            'images/hubs/e114995456f5f046ca838b484081dd6e.png'
        );
        $this->createHub(
            'Magento',
            Str::slug('Magento'),
            'images/hubs/72c1fc7461b4505aa17d9da27abf4df9.png'
        );
        $this->createHub(
            'Монетизация мобильных приложений',
            Str::slug('Монетизация мобильных приложений'),
            'images/hubs/c6325464298725f9c24ac53529e31e85.png'
        );
        $this->createHub(
            'Телемедицина',
            Str::slug('Телемедицина'),
            'images/hubs/80aa3601c07565a3f4dfffdbf8e94e20.png'
        );
        $this->createHub(
            'Контекстная реклама',
            Str::slug('Контекстная реклама'),
            'images/hubs/016a504faa8d17597488492ad7485209.png'
        );
        $this->createHub(
            'Cisco',
            Str::slug('Cisco'),
            'images/hubs/26a1e58cd83620f320800f30f8cf887d.png'
        );
        $this->createHub(
            'Типографика',
            Str::slug('Типографика'),
            'images/hubs/4f89e52aea7c3e3d8f8513046fefc8f6.png'
        );
        $this->createHub(
            'Creative Commons',
            Str::slug('Creative Commons'),
            'images/hubs/ea47b1e8371cb9b0348567110434b3d3.png'
        );
        $this->createHub(
            'Facebook API',
            Str::slug('Facebook API'),
            'images/hubs/bddec0471dc6082a939abb367ffc6944.jpg'
        );
        $this->createHub(
            'Брендинг',
            Str::slug('Брендинг'),
            'images/hubs/20fd2261512b6d9d0e5d9d7135ebc0d2.png'
        );
        $this->createHub(
            'Julia',
            Str::slug('Julia'),
            'images/hubs/eb8734fa240b7414f85d898933a8e738.png'
        );
        $this->createHub(
            'Mesh-сети',
            Str::slug('Mesh-сети'),
            'images/hubs/fc1051bce0c25da604295e7a1f0f0cae.png'
        );
        $this->createHub(
            'Meteor.JS',
            Str::slug('Meteor.JS'),
            'images/hubs/e294664d3602740a417865a67332169e.png'
        );
        $this->createHub(
            'Visual Basic for Applications',
            Str::slug('Visual Basic for Applications'),
            'images/hubs/c7bd1fe2caaab0146447a554bd9c3712.jpg'
        );
        $this->createHub(
            'TYPO3',
            Str::slug('TYPO3'),
            'images/hubs/4c2e7118e9c8101a6203213f2596f8f2.png'
        );
        $this->createHub(
            'Haxe',
            Str::slug('Haxe'),
            'images/hubs/045b0ea8680c31c9504dfbd26a759ab5.png'
        );
        $this->createHub(
            'Processing',
            Str::slug('Processing'),
            'images/hubs/8906190b616f0bab20d7f4dfd557da95.png'
        );
        $this->createHub(
            'UEFI',
            Str::slug('UEFI'),
            'images/hubs/b5a8e6a272df464cd1c727f3bd089a74.png'
        );
        $this->createHub(
            'WebAssembly',
            Str::slug('WebAssembly'),
            'images/hubs/7873d595250122e806fb64a28d1828b9.png'
        );
        $this->createHub(
            'Лазеры',
            Str::slug('Лазеры'),
            'images/hubs/a0287e5f80109daa9c3311b75aa15d74.png'
        );
        $this->createHub(
            'Google Cloud Vision API',
            Str::slug('Google Cloud Vision API'),
            'images/hubs/ed7ac9cb30fdc9dca5ed2308993505e0.png'
        );
        $this->createHub(
            'Hadoop',
            Str::slug('Hadoop'),
            'images/hubs/83ad6c996372aee28a3d6f3ab259309c.png'
        );
        $this->createHub(
            'Puppet',
            Str::slug('Puppet'),
            'images/hubs/96fb517e0884c42aaa1e387c26d5c293.png'
        );
        $this->createHub(
            'Clojure',
            Str::slug('Clojure'),
            'images/hubs/9307f2640322f449b5d9659fcd69dfbf.png'
        );
        $this->createHub(
            'F#',
            Str::slug('F#'),
            'images/hubs/5808d5d362f5aaa86849124354e544bd.png'
        );
        $this->createHub(
            'CoffeeScript',
            Str::slug('CoffeeScript'),
            'images/hubs/308bb3eb1db5c15f9b3e5cf21710dc53.png'
        );
        $this->createHub(
            'Elm',
            Str::slug('Elm'),
            'images/hubs/773048e8f813056e57ab2f3552106123.png'
        );
        $this->createHub(
            'Phalcon',
            Str::slug('Phalcon'),
            'images/hubs/587f7abb2dc5d5a0540a29426f72a62d.png'
        );
        $this->createHub(
            'Solidity',
            Str::slug('Solidity'),
            'images/hubs/024aa74f9b2ac39ffb43f6ca8d2c47e8.png'
        );
        $this->createHub(
            'Разработка под Sailfish OS',
            Str::slug('Разработка под Sailfish OS'),
            'images/hubs/39ae2ba87ec9642dda0d4b9a4ee6ebdf.png'
        );
        $this->createHub(
            'Образование за рубежом',
            Str::slug('Образование за рубежом'),
            'images/hubs/16a6e70985287425074a4033b296cad7.png'
        );
        $this->createHub(
            'Биллинговые системы',
            Str::slug('Биллинговые системы'),
            'images/hubs/a95f2ecb6ea9302d0fe747c9905555bf.png'
        );
        $this->createHub(
            'Чулан',
            Str::slug('Чулан'),
            'images/hubs/ae529c4a9cd7049ed594f03f6de98271.png'
        );
        $this->createHub(
            'Forth',
            Str::slug('Forth'),
            'images/hubs/468d5c63177219f7750e9597807e3f93.jpg'
        );
        $this->createHub(
            'SAN',
            Str::slug('SAN'),
            'images/hubs/1f7b70aa274875ad783ef0584b3b3016.png'
        );
        $this->createHub(
            'D',
            Str::slug('D'),
            'images/hubs/a145fab6c510fec3352ddef71f051aa1.png'
        );
        $this->createHub(
            'Derby.js',
            Str::slug('Derby.js'),
            'images/hubs/6e9ef184e04a72ab1b5dd39172161387.png'
        );
        $this->createHub(
            'Разработка под Tizen',
            Str::slug('Разработка под Tizen'),
            'images/hubs/ee1438eb8a9ba8ee3e93d0e87a3162de.png'
        );
        $this->createHub(
            'Emacs',
            Str::slug('Emacs'),
            'images/hubs/4f4e6928b465327bb8f114edbb1f8878.png'
        );
        $this->createHub(
            'Разработка под Bada',
            Str::slug('Разработка под Bada'),
            'images/hubs/0b3a7b005871fcd48bb7374333417f95.png'
        );
        $this->createHub(
            'Mercurial',
            Str::slug('Mercurial'),
            'images/hubs/f85bc487e6457bd11b2e3614ef54ecf7.png'
        );
        $this->createHub(
            'UML Design',
            Str::slug('UML Design'),
            'images/hubs/24599d7453a31fdc7559ba90246c75b3.png'
        );
        $this->createHub(
            'Fortran',
            Str::slug('Fortran'),
            'images/hubs/9d28698a2c63d9c46917e81fe3329e35.png'
        );
        $this->createHub(
            'Cocoa',
            Str::slug('Cocoa'),
            'images/hubs/695e6ce5e7025e7c2374f8b36c7e74b8.png'
        );
        $this->createHub(
            'Apache Flex',
            Str::slug('Apache Flex'),
            'images/hubs/e9f5267a09b3ba31d7f83504df49fde1.png'
        );
        $this->createHub(
            'Action Script',
            Str::slug('Action Script'),
            'images/hubs/2c98341970e35f04171b401f4e7561eb.png'
        );
        $this->createHub(
            'Joomla',
            Str::slug('Joomla'),
            'images/hubs/8da1905ef6af7fd478340f201c153daf.png'
        );
        $this->createHub(
            'IIS',
            Str::slug('IIS'),
            'images/hubs/8f9d1a07c7680c0eabf8d2dea3fde478.png'
        );
        $this->createHub(
            'Twitter API',
            Str::slug('Twitter API'),
            'images/hubs/f09ca8a70dc5d7e6ab722e150cd4fdba.png'
        );
        $this->createHub(
            'ВКонтакте API',
            Str::slug('ВКонтакте API'),
            'images/hubs/7c76397cf408ca9e1f16419d0c6c91ec.png'
        );
        $this->createHub(
            'Microsoft Access',
            Str::slug('Microsoft Access'),
            'images/hubs/80447a43a44fbdaf536708a94e9daef2.png'
        );
        $this->createHub(
            'Разработка под Windows Phone',
            Str::slug('Разработка под Windows Phone'),
            'images/hubs/bbea1c94dfb0b6493db05a78218ab9a7.png'
        );
        $this->createHub(
            'Maps API',
            Str::slug('Maps API'),
            'images/hubs/19a718967053bff532f6294609413270.png'
        );
        $this->createHub(
            'LabVIEW',
            Str::slug('LabVIEW'),
            'images/hubs/f37d50f817d9550effe350f3e9283f35.png'
        );
        $this->createHub(
            'Brainfuck',
            Str::slug('Brainfuck'),
            'images/hubs/f44f967cae7b94b9e11d1311c13f8adf.png'
        );
        $this->createHub(
            'Cubrid',
            Str::slug('Cubrid'),
            'images/hubs/a2bbd4ddf49bb8ace5c39bd30f6aefe1.png'
        );
        $this->createHub(
            'Mono и Moonlight',
            Str::slug('Mono и Moonlight'),
            'images/hubs/0dfee5cfdcc482cb24fa726a1cc5f3cf.png'
        );
        $this->createHub(
            'Doctrine ORM',
            Str::slug('Doctrine ORM'),
            'images/hubs/d76d4802c9328dc2d23ee0e66e3312e8.png'
        );
        $this->createHub(
            'Google App Engine',
            Str::slug('Google App Engine'),
            'images/hubs/48d099cf12eedcf480ea5fd8fc1665f3.png'
        );
        $this->createHub(
            'Fidonet',
            Str::slug('Fidonet'),
            'images/hubs/8bdeb827a9a00d3617c072e7be1bb635.png'
        );
        $this->createHub(
            'Twisted',
            Str::slug('Twisted'),
            'images/hubs/9b22a7eee3c0b1175e27f2ca4383fa17.png'
        );
        $this->createHub(
            'IPTV',
            Str::slug('IPTV'),
            'images/hubs/1200c545947459ce14356e5924ed8a14.png'
        );
        $this->createHub(
            'Sphinx',
            Str::slug('Sphinx'),
            'images/hubs/7080a8da5dc5ad5cda9cfc8f10923bd0.png'
        );
        $this->createHub(
            'Оболочки',
            Str::slug('Оболочки'),
            'images/hubs/0eac9bbc3f96fefa5fc65e18e59b9e25.png'
        );
        $this->createHub(
            'XSLT',
            Str::slug('XSLT'),
            'images/hubs/686f023f340c3fd07154241b95e97164.png'
        );
        $this->createHub(
            'LaTeX',
            Str::slug('LaTeX'),
            'images/hubs/e8d2722d93e90da5a72cb0a1a8bfa3e8.png'
        );
        $this->createHub(
            'Small Basic',
            Str::slug('Small Basic'),
            'images/hubs/953831c5d17cdfe914f518e24af915c5.png'
        );
        $this->createHub(
            'Kohana',
            Str::slug('Kohana'),
            'images/hubs/973ed8ab2762a8297f7b541f1a38c3e6.png'
        );
        $this->createHub(
            'XML',
            Str::slug('XML'),
            'images/hubs/159014e44ae69f9f6bde01f3a17e7e66.png'
        );
        $this->createHub(
            'Разработка под Java ME',
            Str::slug('Разработка под Java ME'),
            'images/hubs/badd63f9d8c98af8406d2f823be76b7a.png'
        );
        $this->createHub(
            'LiveStreet',
            Str::slug('LiveStreet'),
            'images/hubs/2505a1a952859fa7af19e759e10e8878.png'
        );
        $this->createHub(
            'MooTools',
            Str::slug('MooTools'),
            'images/hubs/b5686b917481469fb723cf2e0280f647.png'
        );
        $this->createHub(
            'GreaseMonkey',
            Str::slug('GreaseMonkey'),
            'images/hubs/62794ba20556c8fbe494ca3578ca770d.png'
        );
        $this->createHub(
            'INFOLUST',
            Str::slug('INFOLUST'),
            'images/hubs/11a74dd6cdc2ab1b4deb56e612e6909e.jpg'
        );
        $this->createHub(
            'Groovy & Grails',
            Str::slug('Groovy & Grails'),
            'images/hubs/34ec27277672d19180482eee81fbc33b.png'
        );
        $this->createHub(
            'Lisp',
            Str::slug('Lisp'),
            'images/hubs/43f1a4c4588b789c5c60b793469c8214.png'
        );
        $this->createHub(
            'Графические оболочки',
            Str::slug('Графические оболочки'),
            'images/hubs/ee12270d3d65872f56aa53ccf8c3afdc.png'
        );
        $this->createHub(
            'VIM',
            Str::slug('VIM'),
            'images/hubs/e03f41733c87b7bafa92301db302164e.png'
        );
        $this->createHub(
            'Zend Framework',
            Str::slug('Zend Framework'),
            'images/hubs/82c0ea28d86bdc3a67531a5e215dcd01.png'
        );
        $this->createHub(
            'Библиотека ExtJS/Sencha',
            Str::slug('Библиотека ExtJS/Sencha'),
            'images/hubs/8aee078e32e3c099b213ea8cc37ec7ea.png'
        );
        $this->createHub(
            'Internet Explorer',
            Str::slug('Internet Explorer'),
            'images/hubs/7f33b8b38e7d6b5d3f5c7a049833fe16.png'
        );
        $this->createHub(
            'CodeIgniter',
            Str::slug('CodeIgniter'),
            'images/hubs/a0be210fd3482779f8b7fad0fd22a72b.png'
        );
        $this->createHub(
            'jQuery',
            Str::slug('jQuery'),
            'images/hubs/87c6116c01ec8e65d2974bc63e630c1d.png'
        );
        $this->createHub(
            'Silverlight',
            Str::slug('Silverlight'),
            'images/hubs/bb6e2ed86ed5041e3d71ea65e8603ae3.png'
        );
        $this->createHub(
            'SharePoint',
            Str::slug('SharePoint'),
            'images/hubs/81997b461c19397eeaea4e871b74226f.png'
        );
        $this->createHub(
            'Google Web Toolkit',
            Str::slug('Google Web Toolkit'),
            'images/hubs/c106a979d03bfd070d4d8bf45ab7f2dd.png'
        );
        $this->createHub(
            'Я пиарюсь',
            Str::slug('Я пиарюсь'),
            'images/hubs/0f4a9ac27402b038bf56bc81feffbf5b.png'
        );
        $this->createHub(
            'CakePHP',
            Str::slug('CakePHP'),
            'images/hubs/acc755ff56390abe8cb01efb67f6a753.png'
        );
        $this->createHub(
            'Safari',
            Str::slug('Safari'),
            'images/hubs/e9e1988d3420942578e1cfc745a5b714.png'
        );
        $this->createHub(
            'MODX',
            Str::slug('MODX'),
            'images/hubs/b3c737bcf1fcfb9efd684a14df63d013.png'
        );
        $this->createHub(
            'Opera',
            Str::slug('Opera'),
            'images/hubs/4f7dcd94c78412bd1381eea4eff18a5b.png'
        );
        $this->createHub(
            'WordPress',
            Str::slug('WordPress'),
            'images/hubs/5f83c032bf625a834dad8f81871520ae.png'
        );
        $this->createHub(
            'Микроформаты',
            Str::slug('Микроформаты'),
            'images/hubs/5322e350af78b05a6f245fbb9cafc5b5.png'
        );
        $this->createHub(
            'Ember.js',
            Str::slug('Ember.js'),
            'images/hubs/3430f045169914087c78eba333933ee2.png'
        );
        $this->createHub(
            'Ajax',
            Str::slug('Ajax'),
            'images/hubs/1de8e7e88c62a9c8750537fa0e0d46ef.png'
        );
        $this->createHub(
            'Email-маркетинг',
            Str::slug('Email-маркетинг'),
            'images/hubs/a924ba9ed0205d7991da0cc7ae765565.png'
        );
        $this->createHub(
            'Киберспорт',
            Str::slug('Киберспорт'),
            'images/hubs/5da8bda6d8275f9982b216d49edbe22b.png'
        );
        $this->createHub(
            'Верстка писем',
            Str::slug('Верстка писем'),
            'images/hubs/a0d0fab2b47fdb645a97566eba097b69.png'
        );
        $this->createHub(
            'Монетизация веб-сервисов',
            Str::slug('Монетизация веб-сервисов'),
            'images/hubs/dd8d8801fb89b8fddca31eec3bc8f193.png'
        );
    }
}
