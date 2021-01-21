<?php

namespace Database\Seeders;

use App\Models\Hub;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HubsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1352db18765addaa6e0b2ac013d386d8.png',
                'name' => 'Информационная безопасность',
                'slug' => Str::slug('Информационная безопасность'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/db2c8f4a1974bf334d01595732f339c1.png',
                'name' => 'Программирование',
                'slug' => Str::slug('Программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/02f2060b99e6f4d9403eee0420d7d5b8.png',
                'name' => 'Научно-популярное',
                'slug' => Str::slug('Научно-популярное'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6c5db38c23972b6c0916e91e408edff8.png',
                'name' => 'Системное администрирование',
                'slug' => Str::slug('Системное администрирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b2e13f8fcaf2711677c87418b98e85fe.png',
                'name' => 'Сетевые технологии',
                'slug' => Str::slug('Сетевые технологии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dfbd326740d2d30fba37f441919619f5.png',
                'name' => 'IT-компании',
                'slug' => Str::slug('IT-компании'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b31347904b72455522b1f645ea28ef1a.png',
                'name' => 'Разработка игр',
                'slug' => Str::slug('Разработка игр'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cabf82067c7be08c90a5903f860c9abf.png',
                'name' => 'Карьера в IT-индустрии',
                'slug' => Str::slug('Карьера в IT-индустрии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0ac9b48281cd7ba7401b4a4f5d9cd8d8.png',
                'name' => 'DIY или Сделай сам',
                'slug' => Str::slug('DIY или Сделай сам'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2a2ac73dd5cddc6e05b47a3d502b4c0d.png',
                'name' => 'Разработка веб-сайтов',
                'slug' => Str::slug('Разработка веб-сайтов'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a57348ade2b5c33e99e869aaee204c3f.png',
                'name' => 'Законодательство в IT',
                'slug' => Str::slug('Законодательство в IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1c6724437b83f3d71abd08e5c2877a7a.png',
                'name' => 'Python',
                'slug' => Str::slug('Python'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/88237ab33b6f8acc090d443651c4f2f9.png',
                'name' => 'Машинное обучение',
                'slug' => Str::slug('Машинное обучение'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/612aab212721194fe115ed84dea966cc.png',
                'name' => 'Здоровье',
                'slug' => Str::slug('Здоровье'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9f747d2beca9589226778700d866101d.png',
                'name' => 'Математика',
                'slug' => Str::slug('Математика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dc9dbee1d24188b925e86946bafb15c7.png',
                'name' => 'Open source',
                'slug' => Str::slug('Open source'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2c0c6b86a9011cf811ce4b6820865115.png',
                'name' => 'Управление персоналом',
                'slug' => Str::slug('Управление персоналом'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2b399b964d456f3ad1bfddc0346b60d4.png',
                'name' => 'JavaScript',
                'slug' => Str::slug('JavaScript'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/57d0923fc4dbf24622761210161f5b47.jpg',
                'name' => 'DevOps',
                'slug' => Str::slug('DevOps'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/04e1a1ccda37543704ede864665b2ccd.png',
                'name' => 'Читальный зал',
                'slug' => Str::slug('Читальный зал'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bbeec149811969c7214c33d0a6911160.png',
                'name' => 'История IT',
                'slug' => Str::slug('История IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/61ebf97b08494e41ad7b7cad1e0aacc7.png',
                'name' => 'Алгоритмы',
                'slug' => Str::slug('Алгоритмы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c08ac8abdf8edc624ac48e8411851998.png',
                'name' => 'Софт',
                'slug' => Str::slug('Софт'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/250e195faa1708e4df5cb8664394a54f.png',
                'name' => 'Игры и игровые приставки',
                'slug' => Str::slug('Игры и игровые приставки'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e554e4f790ec7617ecde4b3930acf44a.png',
                'name' => 'Физика',
                'slug' => Str::slug('Физика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/94ab351adac61ac363e9de79c1382a67.png',
                'name' => 'Управление проектами',
                'slug' => Str::slug('Управление проектами'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4c9821d2ad5a9844eb6d0f8c77991772.png',
                'name' => 'Java',
                'slug' => Str::slug('Java'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/57d7b53659e90f8971cf34081078d1e4.png',
                'name' => 'Компьютерное железо',
                'slug' => Str::slug('Компьютерное железо'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/064e290f484ad3bf745ebe9163b9276a.png',
                'name' => 'Старое железо',
                'slug' => Str::slug('Старое железо'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d652d042e03426c4e8c7d15e2254cb4b.png',
                'name' => 'Настройка Linux',
                'slug' => Str::slug('Настройка Linux'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9fa5f972e61ea8e0b7d0258ddafd3fbe.png',
                'name' => 'Лайфхаки для гиков',
                'slug' => Str::slug('Лайфхаки для гиков'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d149ad4f5d22a8b8775b070f3c92cf39.png',
                'name' => 'Гаджеты',
                'slug' => Str::slug('Гаджеты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/979b7b9bec5637525f70e76f05a498fb.png',
                'name' => 'Управление разработкой',
                'slug' => Str::slug('Управление разработкой'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f07ba2b9d63b419e332a4d5ddeec8a99.png',
                'name' => 'Космонавтика',
                'slug' => Str::slug('Космонавтика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9c26b154fc3433778f64d493db6e5492.png',
                'name' => 'Системное программирование',
                'slug' => Str::slug('Системное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9b6833e180e87f58150916cc250b4cbf.png',
                'name' => '*nix',
                'slug' => Str::slug('*nix'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8c3df17fe6153c109d190d6364f4afa5.png',
                'name' => 'Будущее здесь',
                'slug' => Str::slug('Будущее здесь'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d0b1f8d21a424e35efc5b115434c7443.png',
                'name' => 'Биотехнологии',
                'slug' => Str::slug('Биотехнологии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6599b808c4d9faf273204167b601b2a0.png',
                'name' => 'Социальные сети и сообщества',
                'slug' => Str::slug('Социальные сети и сообщества'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/269015f78421d3d8efa321a6f81574f1.png',
                'name' => 'Производство и разработка электроники',
                'slug' => Str::slug('Производство и разработка электроники'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/59454645b38d9a58a92e6870133ae8e6.png',
                'name' => 'IT-инфраструктура',
                'slug' => Str::slug('IT-инфраструктура'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4456b92870815e30ca14f4f66b6cb443.png',
                'name' => 'Искусственный интеллект',
                'slug' => Str::slug('Искусственный интеллект'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/79a987250ade16638dfafcce24213f3d.png',
                'name' => 'Астрономия',
                'slug' => Str::slug('Астрономия'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6d947da0853000328fc6f5ba630006fb.png',
                'name' => 'Электроника для начинающих',
                'slug' => Str::slug('Электроника для начинающих'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/46fc1a2b8952c116646078e94ba29a90.png',
                'name' => 'Звук',
                'slug' => Str::slug('Звук'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/931d7eaa44179f5195debd4b35d47c51.png',
                'name' => 'Схемотехника',
                'slug' => Str::slug('Схемотехника'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d4c97cde31f59169b6159e7fc7020503.png',
                'name' => 'Высокая производительность',
                'slug' => Str::slug('Высокая производительность'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2041ff174c7379150892103472bf12cf.png',
                'name' => 'Анализ и проектирование систем',
                'slug' => Str::slug('Анализ и проектирование систем'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6364a5e3da812a8d55677c05fb0d1ab3.png',
                'name' => 'Работа с видео',
                'slug' => Str::slug('Работа с видео'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/fd671fdcf24393f28b04673ef09bcd62.png',
                'name' => 'Финансы в IT',
                'slug' => Str::slug('Финансы в IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/99974bc6d012cd4094db36a0cb97e914.png',
                'name' => 'Big Data',
                'slug' => Str::slug('Big Data'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b138a7176c8cbb20de86d55b43d2ce8f.png',
                'name' => 'Браузеры',
                'slug' => Str::slug('Браузеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/656c4285af372d89e1b0636d79521885.png',
                'name' => 'Транспорт',
                'slug' => Str::slug('Транспорт'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/32f8aaa676ea4746ee4cc3acaaac6d9a.png',
                'name' => 'Ненормальное программирование',
                'slug' => Str::slug('Ненормальное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b4fbf73ef0672e6db43c0547b71d2b4c.png',
                'name' => 'Rust',
                'slug' => Str::slug('Rust'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1b737e2d9b2f7b60a2f5700eb5f93f1e.png',
                'name' => 'Серверное администрирование',
                'slug' => Str::slug('Серверное администрирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/98a7a88319d5644cdc627b5e04b47d0f.png',
                'name' => 'PHP',
                'slug' => Str::slug('PHP'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/510987bd1a854995f2ce76d8fb5e513d.png',
                'name' => 'Дизайн игр',
                'slug' => Str::slug('Дизайн игр'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/deb535b54338aa5a202a516dee792556.png',
                'name' => 'Разработка под Android',
                'slug' => Str::slug('Разработка под Android'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4eabd95a1dc768a8246a91e504a353f1.png',
                'name' => 'Интерфейсы',
                'slug' => Str::slug('Интерфейсы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e35838e1411346ef268e92bdf57603e7.png',
                'name' => 'Разработка под Linux',
                'slug' => Str::slug('Разработка под Linux'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dfa56e2bf6d5979753f4ae9e8f7c27e1.png',
                'name' => 'API',
                'slug' => Str::slug('API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dfbb7982340f3a7ddb90860153b0c1ac.png',
                'name' => 'Исследования и прогнозы в IT',
                'slug' => Str::slug('Исследования и прогнозы в IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/fb7a4a8d37cb9eaf0d1fc8e62c3bde1a.png',
                'name' => 'Обработка изображений',
                'slug' => Str::slug('Обработка изображений'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f3355864c032846e917b95ed691e7f52.png',
                'name' => 'Разработка систем связи',
                'slug' => Str::slug('Разработка систем связи'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/054a8b02b6b072771ac6b4f9cdd7dc4b.png',
                'name' => 'Администрирование баз данных',
                'slug' => Str::slug('Администрирование баз данных'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/13c0c0be8515f5edfc5eaa4fc60259f5.png',
                'name' => 'Разработка мобильных приложений',
                'slug' => Str::slug('Разработка мобильных приложений'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a6e06b6b21a9fff92bcc5f8a1a0e6d5b.png',
                'name' => 'Разработка под Arduino',
                'slug' => Str::slug('Разработка под Arduino'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a3bd376a36aadfaf2526098a92ada21f.png',
                'name' => 'Геоинформационные сервисы',
                'slug' => Str::slug('Геоинформационные сервисы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e65f3e98c20a32b1ba26e01125a2e333.png',
                'name' => 'Процессоры',
                'slug' => Str::slug('Процессоры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/db6599152d4c6a7e81dd12f8d5b57e3d.png',
                'name' => 'Учебный процесс в IT',
                'slug' => Str::slug('Учебный процесс в IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4f72adb8ad7c61a51a43a2911fa45313.png',
                'name' => 'Облачные сервисы',
                'slug' => Str::slug('Облачные сервисы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/01b2ed29584e1245479ca857b0264ff1.png',
                'name' => 'C++',
                'slug' => Str::slug('Cpp'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/479657b871482c25c8f0a6f32efec586.png',
                'name' => 'Программирование микроконтроллеров',
                'slug' => Str::slug('Программирование микроконтроллеров'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/de4a7f775624db2496fbbe6399b25467.png',
                'name' => 'Криптография',
                'slug' => Str::slug('Криптография'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cbe1e8e4077f777c9f93f31611802dda.png',
                'name' => 'Реверс-инжиниринг',
                'slug' => Str::slug('Реверс-инжиниринг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e8a9edc7d8b2a500fbe6a4283f718876.png',
                'name' => 'Инженерные системы',
                'slug' => Str::slug('Инженерные системы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/34ebe1c07b5896dab79e5c97df5fe183.png',
                'name' => 'Умный дом',
                'slug' => Str::slug('Умный дом'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/63dc1ec56a1ffa1c50cefc9218d8cb59.png',
                'name' => 'Монетизация IT-систем',
                'slug' => Str::slug('Монетизация IT-систем'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/390f6dccdf5a3e39c4d7fc9584fa1e30.png',
                'name' => 'Сотовая связь',
                'slug' => Str::slug('Сотовая связь'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c2b333a8db5a5bbde1ff0f224eca7117.png',
                'name' => 'Смартфоны',
                'slug' => Str::slug('Смартфоны'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c173a30d606c8a37206327c114314c85.png',
                'name' => 'Расширения для браузеров',
                'slug' => Str::slug('Расширения для браузеров'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/778325a2d86596b796e5596eddc9354f.png',
                'name' => 'Изучение языков',
                'slug' => Str::slug('Изучение языков'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2a0ae7b1b9bf7280a5a9ff7aab1da42f.png',
                'name' => 'Графический дизайн',
                'slug' => Str::slug('Графический дизайн'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c6b35736d62556c1b35301bae2731ace.png',
                'name' => 'Копирайт',
                'slug' => Str::slug('Копирайт'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/89364f1250988fd97b4fd44a4e43f114.png',
                'name' => 'Антивирусная защита',
                'slug' => Str::slug('Антивирусная защита'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4fc240caaae6907407cd6127f23a4aee.png',
                'name' => 'Робототехника',
                'slug' => Str::slug('Робототехника'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/19730eaa0d6d41df90c107be6144770e.png',
                'name' => 'Развитие стартапа',
                'slug' => Str::slug('Развитие стартапа'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bc7f1e78397bca57cf5adcd5bf1725be.png',
                'name' => 'C#',
                'slug' => Str::slug('C-Sharp'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a5a5aea294f48a0d81c4b1968432e5e1.png',
                'name' => '.NET',
                'slug' => Str::slug('.NET'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/03cd6448a19ceced1e031242169a8eb5.png',
                'name' => 'Промышленное программирование',
                'slug' => Str::slug('Промышленное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/339e12ca68ba57e0d6f97e9c768af41b.png',
                'name' => 'Настольные компьютеры',
                'slug' => Str::slug('Настольные компьютеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c4b10b70333b4c79a9658ff587522d4d.jpg',
                'name' => 'Git',
                'slug' => Str::slug('Git'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d160248bb3da372ea4ffb20eed4baa2c.png',
                'name' => 'Работа с 3D-графикой',
                'slug' => Str::slug('Работа с 3D-графикой'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cc4d392727cedcbf8b51cd5aaf2afd39.png',
                'name' => 'Поисковые технологии',
                'slug' => Str::slug('Поисковые технологии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5ee908a4977af1936e0fe21bdaaa5e72.png',
                'name' => 'Криптовалюты',
                'slug' => Str::slug('Криптовалюты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/337210c0f187ef2605bc9335bb74ae0c.png',
                'name' => 'Разработка на Raspberry Pi',
                'slug' => Str::slug('Разработка на Raspberry Pi'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/75bb3b1c69225d61f235ef52be4d23dd.png',
                'name' => 'Kotlin',
                'slug' => Str::slug('Kotlin'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6d756effa0a9d2d18daabd46794f7d46.png',
                'name' => 'GTD',
                'slug' => Str::slug('GTD'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/990babe4e54942287161ea2ecc01f347.png',
                'name' => 'FPGA',
                'slug' => Str::slug('FPGA'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c4f3dd7d5d16afe555c49cc1fb765b79.png',
                'name' => 'Беспроводные технологии',
                'slug' => Str::slug('Беспроводные технологии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7de2c91bd2e446d8587fd0ffb3e3f571.png',
                'name' => 'Хранение данных',
                'slug' => Str::slug('Хранение данных'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/20afafe861e9814e46e8a20c8527bd80.png',
                'name' => 'CSS',
                'slug' => Str::slug('CSS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f226bc50287b600c041b663fa376681c.png',
                'name' => 'IT-эмиграция',
                'slug' => Str::slug('IT-эмиграция'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d6ed3a6138cd63164a0c2d8968bef372.png',
                'name' => 'Занимательные задачки',
                'slug' => Str::slug('Занимательные задачки'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c5aebf7e58df5c0bfe521fdf07866e6a.png',
                'name' => 'C',
                'slug' => Str::slug('C'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cf3d20ce2eede1b1d639f80f781017f0.png',
                'name' => 'Химия',
                'slug' => Str::slug('Химия'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/88cd88dc5a3ea03d8d8e3f73bd35aafe.png',
                'name' => 'Тестирование IT-систем',
                'slug' => Str::slug('Тестирование IT-систем'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5fc12a9fbd66cc4d7771dc8d152e4547.png',
                'name' => 'Статистика в IT',
                'slug' => Str::slug('Статистика в IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/579ffaebd7870d2c87f88ae2d35694e3.png',
                'name' => 'Дизайн',
                'slug' => Str::slug('Дизайн'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/910615c83444f1344fc92bb8de0bb9bb.png',
                'name' => 'Мессенджеры',
                'slug' => Str::slug('Мессенджеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5a49bc47adf8de9e59bbf0a78b821ef9.png',
                'name' => 'Разработка под iOS',
                'slug' => Str::slug('Разработка под iOS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4e26c9e5ae1e061106eb5da4b660ae76.png',
                'name' => 'Яндекс API',
                'slug' => Str::slug('Яндекс API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c06b75a6be1550b0493024ec1507280c.png',
                'name' => 'Kubernetes',
                'slug' => Str::slug('Kubernetes'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cab7bb7b8a279ee584926ced8e87cb15.png',
                'name' => 'TypeScript',
                'slug' => Str::slug('TypeScript'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e7727d25b433a67f0e69acc74d2ba785.png',
                'name' => 'ReactJS',
                'slug' => Str::slug('ReactJS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/81e1ba91137aa8cefdbea0777d5516a8.png',
                'name' => 'Администрирование доменных имен',
                'slug' => Str::slug('Администрирование доменных имен'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/fdbfd0a3e94cf6f8ad45dd1670999414.png',
                'name' => 'Спам и антиспам',
                'slug' => Str::slug('Спам и антиспам'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/54f6d4c42b588a4d0937f0fd8dfef39e.png',
                'name' => 'Визуализация данных',
                'slug' => Str::slug('Визуализация данных'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9c6d91a45998a469e623cb3247b1734c.png',
                'name' => 'Проектирование и рефакторинг',
                'slug' => Str::slug('Проектирование и рефакторинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/64b6392124fdaa4e514fe8a0bc22251a.png',
                'name' => 'Node.JS',
                'slug' => Str::slug('Node.JS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e68041e7ec699d2983a37c38d0c77244.png',
                'name' => 'Assembler',
                'slug' => Str::slug('Assembler'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/65f2c2210786e8980a29b9a274189952.png',
                'name' => 'Научная фантастика',
                'slug' => Str::slug('Научная фантастика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/31cf314e20303346fa3db65c8804a74c.png',
                'name' => 'Компиляторы',
                'slug' => Str::slug('Компиляторы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/270fae79d4cd7070a1bcc27f41f68ce6.png',
                'name' => 'Хостинг',
                'slug' => Str::slug('Хостинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/08fb63a50ab8c2c691e8836a455b4e31.png',
                'name' => 'Data Engineering',
                'slug' => Str::slug('Data Engineering'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/897faad4310f59b4e5547371b5bd196f.png',
                'name' => 'Хранилища данных',
                'slug' => Str::slug('Хранилища данных'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b7e34b7155812c7fd2aa5288b620ce25.png',
                'name' => 'Управление продуктом',
                'slug' => Str::slug('Управление продуктом'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4bfb389fe370b1989092080d622375f2.png',
                'name' => 'Разработка робототехники',
                'slug' => Str::slug('Разработка робототехники'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f134f938e6a084de411791eac09be18a.png',
                'name' => 'Энергия и элементы питания',
                'slug' => Str::slug('Энергия и элементы питания'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8dc2eaa523bbf789e99d8c1be5a1ed34.png',
                'name' => 'Совершенный код',
                'slug' => Str::slug('Совершенный код'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/741cc48fe311046e166f158b180b9b61.png',
                'name' => 'Data Mining',
                'slug' => Str::slug('Data Mining'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3916338e24104572809b971807686a8f.png',
                'name' => 'PostgreSQL',
                'slug' => Str::slug('PostgreSQL'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a09fe1f00511e7c8838ef0cdd8da5598.png',
                'name' => 'Разработка под MacOS',
                'slug' => Str::slug('Разработка под MacOS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1e86e33333bec80031fba0c1223545ea.png',
                'name' => 'IT-стандарты',
                'slug' => Str::slug('IT-стандарты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d50aab5e00dd47a9fdeffee5714170e9.png',
                'name' => 'Мозг',
                'slug' => Str::slug('Мозг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/835c62488fbd9322fe2673b9398d39f6.png',
                'name' => 'ERP-системы',
                'slug' => Str::slug('ERP-системы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c1078f7aa9a4709c3844e52918912d3d.png',
                'name' => 'Сетевое оборудование',
                'slug' => Str::slug('Сетевое оборудование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1c7c578325cb5c9eea947c545d1704a2.png',
                'name' => 'Интернет вещей',
                'slug' => Str::slug('Интернет вещей'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/36aa9169d992483fa29455af0edd423f.png',
                'name' => 'Логические игры',
                'slug' => Str::slug('Логические игры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0bdb91ce8e124137ee8f67fa9faa943e.png',
                'name' => 'Laravel',
                'slug' => Str::slug('Laravel'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d55cd678d30171ab077b4980ce15202f.png',
                'name' => 'Бизнес-модели',
                'slug' => Str::slug('Бизнес-модели'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e0dbdc393c996e7a628c5d051d0fcf8b.png',
                'name' => 'HTML',
                'slug' => Str::slug('HTML'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/03c8f441004dbc3c3b7560e34b6e5108.png',
                'name' => 'Usability',
                'slug' => Str::slug('Usability'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0a873420a5a05dad2d109eaebb9ab127.png',
                'name' => 'Разработка под Windows',
                'slug' => Str::slug('Разработка под Windows'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b4fb06003337b47d9e87e85aa274579f.png',
                'name' => 'Yii',
                'slug' => Str::slug('Yii'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/23ca94ca260ce63e5192f0ef1569467e.jpg',
                'name' => 'Удалённая работа',
                'slug' => Str::slug('Удалённая работа'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3977c44df876a05b29e70c9f0da0f844.png',
                'name' => '3D-принтеры',
                'slug' => Str::slug('3D-принтеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ce4aee96ac5cce42451f98cf8ce12031.png',
                'name' => 'Swift',
                'slug' => Str::slug('Swift'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dec8aa561fbd799fc4f1da65ee0a3b21.png',
                'name' => 'Тестирование веб-сервисов',
                'slug' => Str::slug('Тестирование веб-сервисов'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/43cf91b8086223c10504628c2275d9ac.png',
                'name' => 'OpenStreetMap',
                'slug' => Str::slug('OpenStreetMap'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0a41daa7ff93df591be64cd36dfe13c4.png',
                'name' => 'Отладка',
                'slug' => Str::slug('Отладка'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0d2b172a14aedfead6eaab94ae2d3acf.png',
                'name' => 'SaaS / S+S',
                'slug' => Str::slug('SaaS / S+S'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5752871941f74139354ce4076db940e0.png',
                'name' => 'Контент-маркетинг',
                'slug' => Str::slug('Контент-маркетинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cfe5fe3c2d7d088fd194507d92abe731.png',
                'name' => 'Delphi',
                'slug' => Str::slug('Delphi'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/de9bdbee7bf0c27cc6e12600e107c9ee.jpg',
                'name' => 'TensorFlow',
                'slug' => Str::slug('TensorFlow'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6fa6da62d615ba8e7d9f0186eacfabbf.png',
                'name' => 'Прототипирование',
                'slug' => Str::slug('Прототипирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9184ec852f54946682e7de3c931828b4.png',
                'name' => 'Серверная оптимизация',
                'slug' => Str::slug('Серверная оптимизация'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/38cc4c54052801a61c6bb7aeb580e000.png',
                'name' => 'Habr',
                'slug' => Str::slug('Habr'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9997ee481b6d2834c797fb4d8e913266.png',
                'name' => 'Symfony',
                'slug' => Str::slug('Symfony'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7570365720336f67615cded621df8bd5.png',
                'name' => 'GitHub',
                'slug' => Str::slug('GitHub'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7f48455fc5cac3578d8fdd52a5bca9f9.png',
                'name' => '1С',
                'slug' => Str::slug('1С'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/53872e15b6716c38bec1ac09833668c2.png',
                'name' => 'Профессиональная литература',
                'slug' => Str::slug('Профессиональная литература'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e54909f6cc824ba99cef4efa02fd738e.png',
                'name' => 'Микросервисы',
                'slug' => Str::slug('Микросервисы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/21126b3fa26389b05c39149dcdffd86c.png',
                'name' => 'Unity',
                'slug' => Str::slug('Unity'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7215e3221495be463dd1ebeacbef2e53.png',
                'name' => 'Agile',
                'slug' => Str::slug('Agile'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c044dea649d5fac76a46799cc12766b7.png',
                'name' => 'Дизайн мобильных приложений',
                'slug' => Str::slug('Дизайн мобильных приложений'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f0c2621fbcdbe6ad994bdff586a20ea3.png',
                'name' => 'Веб-аналитика',
                'slug' => Str::slug('Веб-аналитика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f70cf76bdfceec5d6c3085fec9e64ac6.png',
                'name' => 'Конференции',
                'slug' => Str::slug('Конференции'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f9c39a77f815375969bfd1faaff8f68f.png',
                'name' => 'Angular',
                'slug' => Str::slug('Angular'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/72cc4843f57af4cc790c9d60035df1de.png',
                'name' => 'Экология',
                'slug' => Str::slug('Экология'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/97c90f89e350b110c0cb501dbfffe628.png',
                'name' => 'AR и VR',
                'slug' => Str::slug('AR и VR'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4d67475c0c5b4d6157d691f2524386bb.png',
                'name' => 'Биографии гиков',
                'slug' => Str::slug('Биографии гиков'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3c4e013b8bcb3592209ed57f1d4b69fd.png',
                'name' => 'Продвижение игр',
                'slug' => Str::slug('Продвижение игр'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e1bfc5b451e464edfe155fad4a678a66.png',
                'name' => 'Распределённые системы',
                'slug' => Str::slug('Распределённые системы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b6f63fb7fe6ff12fbcae25c075905435.png',
                'name' => 'Периферия',
                'slug' => Str::slug('Периферия'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/755d3113dd0cc4ccacefdd471462b3e4.png',
                'name' => 'Открытые данные',
                'slug' => Str::slug('Открытые данные'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/459376cbf21d5342318fd33ec48a1531.png',
                'name' => 'Системы управления версиями',
                'slug' => Str::slug('Системы управления версиями'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/fcddf2340fbad2b675f1fa367c743320.png',
                'name' => 'Разработка для интернета вещей',
                'slug' => Str::slug('Разработка для интернета вещей'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/45f8b1a14b1d5049629b0368e4b8675e.png',
                'name' => 'CTF',
                'slug' => Str::slug('CTF'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e7bb4b01b63f56c790a01e9c8c50ad33.png',
                'name' => 'I2P',
                'slug' => Str::slug('I2P'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/65416d6facd9b74513aa035731167f9f.png',
                'name' => 'Функциональное программирование',
                'slug' => Str::slug('Функциональное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/85d0ba490c6cb811701c16f899729b8d.png',
                'name' => 'Управление сообществом',
                'slug' => Str::slug('Управление сообществом'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c0e33d3bdece2e8b8c1b38907f6a3d46.png',
                'name' => 'Автомобильные гаджеты',
                'slug' => Str::slug('Автомобильные гаджеты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/896a49a57cd93220352ab9ab371adf1e.png',
                'name' => 'Ноутбуки',
                'slug' => Str::slug('Ноутбуки'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0ada791a405e6a0e18740a884cea9fbf.png',
                'name' => 'Фототехника',
                'slug' => Str::slug('Фототехника'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/64b22b8b6c4677778423e971d52eb05d.png',
                'name' => 'SQL',
                'slug' => Str::slug('SQL'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/94a85a57823586d9bac5bc4b9cd11238.png',
                'name' => 'Урбанизм',
                'slug' => Str::slug('Урбанизм'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6da82050584fd944fa4888a3bd761b38.png',
                'name' => 'Тестирование мобильных приложений',
                'slug' => Str::slug('Тестирование мобильных приложений'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8dd7eb425202cc92823ecbb22c2631d1.png',
                'name' => 'Клиентская оптимизация',
                'slug' => Str::slug('Клиентская оптимизация'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a10c5c62685d9a7d2964993daf6958c3.png',
                'name' => 'Go',
                'slug' => Str::slug('Go'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8e3a92248ba9acdb02a3a5676852f9c3.png',
                'name' => 'Tarantool',
                'slug' => Str::slug('Tarantool'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/061be4f76ce29f2ab0ea72eee1af2dd4.png',
                'name' => 'Google Chrome',
                'slug' => Str::slug('Google Chrome'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6acc75615af52a06a86175ffc16e2cf3.png',
                'name' => 'Спортивное программирование',
                'slug' => Str::slug('Спортивное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c963675ab084372e75c7c29c5477ee57.png',
                'name' => 'Киберпанк',
                'slug' => Str::slug('Киберпанк'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/491f0a9b3dd805b1e97478d97ece9be6.png',
                'name' => 'Apache',
                'slug' => Str::slug('Apache'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1a2c8f70d4b048d9ffdf0b259ee9128a.png',
                'name' => 'Интервью',
                'slug' => Str::slug('Интервью'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1c46ddda78b79073229c13dba60ebdd9.png',
                'name' => 'Scala',
                'slug' => Str::slug('Scala'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/88d843ea06f5e311c224be84e7b11afe.png',
                'name' => 'Интернет-маркетинг',
                'slug' => Str::slug('Интернет-маркетинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/577c521d4fb330e7d668a3676cf8d4e3.png',
                'name' => 'CRM-системы',
                'slug' => Str::slug('CRM-системы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7ca18c6de900c26e33f5eb8fda46ece1.png',
                'name' => 'Управление продажами',
                'slug' => Str::slug('Управление продажами'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d6cd93e2f0dfdf50713c9089a78669ed.png',
                'name' => 'Firefox',
                'slug' => Str::slug('Firefox'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/603db5b716ae407c8282771be935018b.png',
                'name' => 'Natural Language Processing',
                'slug' => Str::slug('Natural Language Processing'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9efd451a60608aae025d13c3895b72dd.png',
                'name' => 'Работа с иконками',
                'slug' => Str::slug('Работа с иконками'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1f60b3b0dcdf8f157023963d20b0e18f.png',
                'name' => 'Ruby',
                'slug' => Str::slug('Ruby'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/95e2646aead4f970af85e49a25c9f633.png',
                'name' => 'Квантовые технологии',
                'slug' => Str::slug('Квантовые технологии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/63b728b76ec18862a5454a684509940b.png',
                'name' => 'Flutter',
                'slug' => Str::slug('Flutter'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/30aec053eecd1f5555a8ba577a3b6266.png',
                'name' => 'Тестирование игр',
                'slug' => Str::slug('Тестирование игр'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dd2008e4cf2ac6ec8d90d09c2468ea3f.png',
                'name' => 'Накопители',
                'slug' => Str::slug('Накопители'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/575cde49ba588c7941a780be516528c2.png',
                'name' => 'Облачные вычисления',
                'slug' => Str::slug('Облачные вычисления'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e4cb9d258b83d5fe134bb3894ac40504.png',
                'name' => 'Децентрализованные сети',
                'slug' => Str::slug('Децентрализованные сети'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9368c10e22a343a82621977d878fbeca.png',
                'name' => 'Хакатоны',
                'slug' => Str::slug('Хакатоны'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9910082e92a30d7c8c18b0e5cc25a239.png',
                'name' => 'Управление e-commerce',
                'slug' => Str::slug('Управление e-commerce'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e4e31ae7a84dd9ebe94103619f7b8631.png',
                'name' => 'ООП',
                'slug' => Str::slug('ООП'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c31b8fa39bfe24f06cc516989e961ea0.png',
                'name' => 'Семантика',
                'slug' => Str::slug('Семантика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f2fb899050a39a3c14f7ed53f43593d7.png',
                'name' => 'Django',
                'slug' => Str::slug('Django'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9991282437d46db397e282e88663fa5d.png',
                'name' => 'Подготовка технической документации',
                'slug' => Str::slug('Подготовка технической документации'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d20cb40f6df9eec7079d596459cffd74.png',
                'name' => 'Видеокарты',
                'slug' => Str::slug('Видеокарты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/23461151a8fef81c88b27a144bb6c6a0.png',
                'name' => 'CAD/CAM',
                'slug' => Str::slug('CAD/CAM'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b7d627b5cc730038cd6f66cd07220b69.png',
                'name' => 'Amazon Web Services',
                'slug' => Str::slug('Amazon Web Services'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b1da2a591fdba427c9db91ecf94fbed3.png',
                'name' => 'Параллельное программирование',
                'slug' => Str::slug('Параллельное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e7dfbfc3cf0165469a372abd09c5ef10.png',
                'name' => 'Платежные системы',
                'slug' => Str::slug('Платежные системы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1a78e69cc6af07806f802ce9582d05da.png',
                'name' => 'Регулярные выражения',
                'slug' => Str::slug('Регулярные выражения'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1fa2b14cf2579c506f1aca386165eb32.png',
                'name' => 'PowerShell',
                'slug' => Str::slug('PowerShell'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0e3b645fa3b60e48195be36358601139.png',
                'name' => 'Голосовые интерфейсы',
                'slug' => Str::slug('Голосовые интерфейсы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a224f5bb173b680fcf32193ba4f09b07.png',
                'name' => 'Adobe Flash',
                'slug' => Str::slug('Adobe Flash'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/75e504d7671eb26e30add73b8b1df482.png',
                'name' => 'TDD',
                'slug' => Str::slug('TDD'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/55a239e8e3b58a2e40827a04caaa2f4c.png',
                'name' => 'Perl',
                'slug' => Str::slug('Perl'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6f7165171deb375a5c95036b55618d29.png',
                'name' => 'Canvas',
                'slug' => Str::slug('Canvas'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e0500be9f2c8e55fef92703f3c1f12d9.png',
                'name' => 'Разработка под AR и VR',
                'slug' => Str::slug('Разработка под AR и VR'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/99d3fd2ec94a3f254efbb92996e3e251.png',
                'name' => 'Инфографика',
                'slug' => Str::slug('Инфографика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/940e369c29852c310cb7c27f24909187.png',
                'name' => 'Cobol',
                'slug' => Str::slug('Cobol'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/169334f506dc179631ec91889a47da71.png',
                'name' => 'Xamarin',
                'slug' => Str::slug('Xamarin'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bc3e2f564a54900c16f90ef53d5f62b6.png',
                'name' => 'VueJS',
                'slug' => Str::slug('VueJS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/cd53348ce9a13411cbeb0cc6c3b07d85.png',
                'name' => 'Аналитика мобильных приложений',
                'slug' => Str::slug('Аналитика мобильных приложений'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/14826baede3a4f453908a2b528bef22a.png',
                'name' => 'Lua',
                'slug' => Str::slug('Lua'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/41e6712dd7d298077553efff8562bd73.png',
                'name' => 'Dart',
                'slug' => Str::slug('Dart'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b37abac13223937e5933eb217231ee87.png',
                'name' => 'Prolog',
                'slug' => Str::slug('Prolog'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8dd5ca7bdf3e6a2d1951320c5f08ff84.png',
                'name' => 'WebGL',
                'slug' => Str::slug('WebGL'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ab98c9175b8a223fcaeebfb60352c7cc.png',
                'name' => 'Носимая электроника',
                'slug' => Str::slug('Носимая электроника'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1950896c66ad2c6a3231c830c9640160.png',
                'name' => 'CGI (графика)',
                'slug' => Str::slug('CGI (графика)'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b32c95751d93477b13d637f89a7ad11a.png',
                'name' => 'Системы сборки',
                'slug' => Str::slug('Системы сборки'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/74e4478d5bedf7bc4798b85f3270e306.png',
                'name' => 'SCADA',
                'slug' => Str::slug('SCADA'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8f946550bfaf3eddd7e93ea9e2270fc2.png',
                'name' => 'Терминология IT',
                'slug' => Str::slug('Терминология IT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bfdf291bd0216cd7ca7cd7a7b1e56ca6.png',
                'name' => 'Фриланс',
                'slug' => Str::slug('Фриланс'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/55b5e04621694cafb82489202daa165e.png',
                'name' => 'NoSQL',
                'slug' => Str::slug('NoSQL'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8265ded3c97a3543d4e2c703c7ce8225.png',
                'name' => 'PDF',
                'slug' => Str::slug('PDF'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/87b2593d7d20edf3ee01fe4de7564caa.png',
                'name' => 'Gradle',
                'slug' => Str::slug('Gradle'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b6e749c8b863f4ce37b1179c5e0f769e.png',
                'name' => 'Ruby on Rails',
                'slug' => Str::slug('Ruby on Rails'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1583a0ad048e5e22d30119cd16b8537f.png',
                'name' => 'Visual Studio',
                'slug' => Str::slug('Visual Studio'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3049d2d548145a33564acccc14bcd7e5.png',
                'name' => 'Видеоконференцсвязь',
                'slug' => Str::slug('Видеоконференцсвязь'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2a17c5ce59f4e6449c42b34d76235c17.png',
                'name' => 'Разработка под e-commerce',
                'slug' => Str::slug('Разработка под e-commerce'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ac6da4821bbfeec1c0e2331385b51820.png',
                'name' => 'R',
                'slug' => Str::slug('R'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4c9b2a1d00796d1dc924a37316219eb2.png',
                'name' => 'Nginx',
                'slug' => Str::slug('Nginx'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/eeab793aae8d7b53389240a786308b75.png',
                'name' => 'Atlassian',
                'slug' => Str::slug('Atlassian'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a5a23996cdde59045f2c735f0ffa9f29.png',
                'name' => 'Управление медиа',
                'slug' => Str::slug('Управление медиа'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c9d1a4b6f8257d96fbecc20a2efa199c.png',
                'name' => 'Oracle',
                'slug' => Str::slug('Oracle'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/47219825d9c78935d51cb3dcb4226f58.png',
                'name' => 'Патентование',
                'slug' => Str::slug('Патентование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/86402884b9a8503bfdbd34740fc9982d.png',
                'name' => 'Виртуализация',
                'slug' => Str::slug('Виртуализация'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8a09c6ce4982e473f7d43d622e3ea95c.png',
                'name' => 'Венчурные инвестиции',
                'slug' => Str::slug('Венчурные инвестиции'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2c64a86cb9a01508b4fe83c9caa0d399.png',
                'name' => 'Демосцена',
                'slug' => Str::slug('Демосцена'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d7cc710eac3f08b15aaffd102774aa00.png',
                'name' => 'Accessibility',
                'slug' => Str::slug('Accessibility'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c4ec69d4cd59c18d1e6096e964d645d3.png',
                'name' => 'Разработка для Office 365',
                'slug' => Str::slug('Разработка для Office 365'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/34df1db9da3e8745ad047ee0ffd1cf94.png',
                'name' => 'Компьютерная анимация',
                'slug' => Str::slug('Компьютерная анимация'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/71062dccf4bb1a49459d5a6887c8ec86.png',
                'name' => 'Поисковая оптимизация',
                'slug' => Str::slug('Поисковая оптимизация'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b6cb5859b7dda6817ddbff3a2f3d7715.png',
                'name' => 'Мультикоптеры',
                'slug' => Str::slug('Мультикоптеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7904095a3cf960350049e9fdc3414ae5.png',
                'name' => 'Визуальное программирование',
                'slug' => Str::slug('Визуальное программирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d31cb8d99c60dd99227d869551bb1352.png',
                'name' => 'Планшеты',
                'slug' => Str::slug('Планшеты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dc33ff2a1aeb30da56be00c4bd3dd17f.png',
                'name' => 'Медийная реклама',
                'slug' => Str::slug('Медийная реклама'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/321d5bd418d773358ec67730ed6bc315.png',
                'name' => 'Видеотехника',
                'slug' => Str::slug('Видеотехника'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b04ba5ac277d807ffd52ef3f7ab4b82a.png',
                'name' => 'Мониторы и ТВ',
                'slug' => Str::slug('Мониторы и ТВ'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9f0054a3f1d5b5d344953adca3dea737.png',
                'name' => 'Веб-дизайн',
                'slug' => Str::slug('Веб-дизайн'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/138ce5098d4a2e04ee975ef25a911ddc.png',
                'name' => 'Haskell',
                'slug' => Str::slug('Haskell'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7de1cc8e6def6778e47e8e72f914a0bb.png',
                'name' => 'ASP',
                'slug' => Str::slug('ASP'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c63386b4de9e72aba5664fefc8b16988.png',
                'name' => 'Service Desk',
                'slug' => Str::slug('Service Desk'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/841bf696493d77d0bdd670ed46d2f802.png',
                'name' => 'SvelteJS',
                'slug' => Str::slug('SvelteJS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0f540c9ca6347fbfb5582ad99d26f432.png',
                'name' => 'Офисы IT-компаний',
                'slug' => Str::slug('Офисы IT-компаний'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c804767ab58b9052f8a30dec95105823.png',
                'name' => 'Восстановление данных',
                'slug' => Str::slug('Восстановление данных'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4d23aabf3eb8335a8f625c940c997a5b.png',
                'name' => '1С-Битрикс',
                'slug' => Str::slug('1С-Битрикс'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/fd182296074702d74f02fdef7e198523.png',
                'name' => 'Локализация продуктов',
                'slug' => Str::slug('Локализация продуктов'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c87b0b9d9bc96985de8b2a4e41e071ae.jpg',
                'name' => 'IPFS',
                'slug' => Str::slug('IPFS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a69436043016a35349d05068d584b316.png',
                'name' => 'Qt',
                'slug' => Str::slug('Qt'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1b1def37d47f1a759cb60c89adfb5cd9.png',
                'name' => 'Суперкомпьютеры',
                'slug' => Str::slug('Суперкомпьютеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/45d576c7f9cddfe625e4a79a46ec99ee.png',
                'name' => 'Elixir/Phoenix',
                'slug' => Str::slug('Elixir/Phoenix'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f6c93fc11831a7863feb820424b9d7a3.png',
                'name' => 'Erlang/OTP',
                'slug' => Str::slug('Erlang/OTP'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f4cc28cccd00584f8002be209d504555.png',
                'name' => 'SQLite',
                'slug' => Str::slug('SQLite'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4b387931f3cae13084e05dbbd3083ab8.png',
                'name' => 'Стандарты связи',
                'slug' => Str::slug('Стандарты связи'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/df9540dff9c0f645e365ba508ad2ff72.png',
                'name' => 'Google Cloud Platform',
                'slug' => Str::slug('Google Cloud Platform'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bf364f98338f6d7d89512a827e72e817.png',
                'name' => 'Growth Hacking',
                'slug' => Str::slug('Growth Hacking'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6c1010b5f21e20c68bb48604f8039d2f.png',
                'name' => 'Монетизация игр',
                'slug' => Str::slug('Монетизация игр'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/89855dbd3bd40547a5dae78f7458ebe8.png',
                'name' => 'Нанотехнологии',
                'slug' => Str::slug('Нанотехнологии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/567b4a77aae9db45aa5dad5a5c8dd11a.png',
                'name' => 'Firebird/Interbase',
                'slug' => Str::slug('Firebird/Interbase'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c6d7851108f03ccd709c8310d0af79f1.png',
                'name' => 'Godot',
                'slug' => Str::slug('Godot'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9befd27bf2f75c181c2f5ba6d235ed02.png',
                'name' => 'GTK+',
                'slug' => Str::slug('GTK+'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e194b255ac49ea6fbed18aa5b070dbd3.png',
                'name' => 'Microsoft SQL Server',
                'slug' => Str::slug('Microsoft SQL Server'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/103d0d83cf512092f5fe28b02def0c00.png',
                'name' => 'GPGPU',
                'slug' => Str::slug('GPGPU'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/03ce2899503daa5a49ffdcc585f177c9.png',
                'name' => 'Сжатие данных',
                'slug' => Str::slug('Сжатие данных'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/eef871bbcc11cdbbe9bf46ba868f9539.png',
                'name' => 'Краудсорсинг',
                'slug' => Str::slug('Краудсорсинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b865158d3824b890ec2bf33206001da8.png',
                'name' => 'Smalltalk',
                'slug' => Str::slug('Smalltalk'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1c779ac28ff3e9c182d55666842c3940.jpg',
                'name' => 'Help Desk Software',
                'slug' => Str::slug('Help Desk Software'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b081831c57589c596513abfa80708592.png',
                'name' => 'Eclipse',
                'slug' => Str::slug('Eclipse'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/edffd100d2e0fc5a54933add3acd9e04.png',
                'name' => 'CMS',
                'slug' => Str::slug('CMS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7aa85956586fea162d4607678f1da2c4.png',
                'name' => 'Xcode',
                'slug' => Str::slug('Xcode'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e7eb618c16c1d42cf80d5ec578d60e8f.png',
                'name' => 'Резервное копирование',
                'slug' => Str::slug('Резервное копирование'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/56e048aaab41b3b32823f9f1449934cd.png',
                'name' => 'Глобальные системы позиционирования',
                'slug' => Str::slug('Глобальные системы позиционирования'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3ff835af9ba4ca0bab9485c81c1f651f.png',
                'name' => 'Работа с векторной графикой',
                'slug' => Str::slug('Работа с векторной графикой'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3d6d7e43c2a17f483a9e7d153060239c.png',
                'name' => 'Microsoft Azure',
                'slug' => Str::slug('Microsoft Azure'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c9a4a92598b12928780850f73651a483.jpg',
                'name' => 'Google API',
                'slug' => Str::slug('Google API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e67236b03b0196043893d0b6dbc27de8.png',
                'name' => 'Asterisk',
                'slug' => Str::slug('Asterisk'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5e8c5673a5f99edd1830e5633e9c20f4.png',
                'name' => 'DNS',
                'slug' => Str::slug('DNS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9d73700ac34f30f83e776c7d8e06e93a.png',
                'name' => 'MongoDB',
                'slug' => Str::slug('MongoDB'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/06bd786d57711077f03fbdcae6f85634.png',
                'name' => 'Drupal',
                'slug' => Str::slug('Drupal'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/47c6943ae3a360d538df41b89bc6de99.png',
                'name' => 'Flask',
                'slug' => Str::slug('Flask'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/796ce32f89e2bc674988db5d38704090.png',
                'name' => 'Презентации',
                'slug' => Str::slug('Презентации'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0c6d3bf00e085e8fd3efc26ef7aeff73.png',
                'name' => 'Objective C',
                'slug' => Str::slug('Objective C'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4db6ec8abfff394c69337d883f171699.png',
                'name' => 'Openshift',
                'slug' => Str::slug('Openshift'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/899cf6e6abbc157b9ac601d8c90704d9.jpg',
                'name' => 'Matlab',
                'slug' => Str::slug('Matlab'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/16b526adb5ab2c74d226709501032c6b.png',
                'name' => 'Unreal Engine',
                'slug' => Str::slug('Unreal Engine'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d9c7e051c85e8c5364cc500a16cac2e0.png',
                'name' => 'MySQL',
                'slug' => Str::slug('MySQL'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d4602a36f6128c6cb1ab713bcb288d80.png',
                'name' => 'IPv6',
                'slug' => Str::slug('IPv6'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3ca8a3a2b2431c5ae95a172b57a65940.png',
                'name' => 'Медгаджеты',
                'slug' => Str::slug('Медгаджеты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/321ea2d6ec735110e6e84b51144442e2.png',
                'name' => 'ECM/СЭД',
                'slug' => Str::slug('ECM/СЭД'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/815d9d1c18d96b897a17bc06aaf51c38.png',
                'name' => 'Кодобред',
                'slug' => Str::slug('Кодобред'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1be981c79360b47cfbd430a73066887e.png',
                'name' => 'Microsoft Edge',
                'slug' => Str::slug('Microsoft Edge'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e114995456f5f046ca838b484081dd6e.png',
                'name' => 'Повышение конверсии',
                'slug' => Str::slug('Повышение конверсии'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/72c1fc7461b4505aa17d9da27abf4df9.png',
                'name' => 'Magento',
                'slug' => Str::slug('Magento'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c6325464298725f9c24ac53529e31e85.png',
                'name' => 'Монетизация мобильных приложений',
                'slug' => Str::slug('Монетизация мобильных приложений'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/80aa3601c07565a3f4dfffdbf8e94e20.png',
                'name' => 'Телемедицина',
                'slug' => Str::slug('Телемедицина'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/016a504faa8d17597488492ad7485209.png',
                'name' => 'Контекстная реклама',
                'slug' => Str::slug('Контекстная реклама'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/26a1e58cd83620f320800f30f8cf887d.png',
                'name' => 'Cisco',
                'slug' => Str::slug('Cisco'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4f89e52aea7c3e3d8f8513046fefc8f6.png',
                'name' => 'Типографика',
                'slug' => Str::slug('Типографика'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ea47b1e8371cb9b0348567110434b3d3.png',
                'name' => 'Creative Commons',
                'slug' => Str::slug('Creative Commons'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bddec0471dc6082a939abb367ffc6944.jpg',
                'name' => 'Facebook API',
                'slug' => Str::slug('Facebook API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/20fd2261512b6d9d0e5d9d7135ebc0d2.png',
                'name' => 'Брендинг',
                'slug' => Str::slug('Брендинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/eb8734fa240b7414f85d898933a8e738.png',
                'name' => 'Julia',
                'slug' => Str::slug('Julia'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/fc1051bce0c25da604295e7a1f0f0cae.png',
                'name' => 'Mesh-сети',
                'slug' => Str::slug('Mesh-сети'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e294664d3602740a417865a67332169e.png',
                'name' => 'Meteor.JS',
                'slug' => Str::slug('Meteor.JS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c7bd1fe2caaab0146447a554bd9c3712.jpg',
                'name' => 'Visual Basic for Applications',
                'slug' => Str::slug('Visual Basic for Applications'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4c2e7118e9c8101a6203213f2596f8f2.png',
                'name' => 'TYPO3',
                'slug' => Str::slug('TYPO3'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/045b0ea8680c31c9504dfbd26a759ab5.png',
                'name' => 'Haxe',
                'slug' => Str::slug('Haxe'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8906190b616f0bab20d7f4dfd557da95.png',
                'name' => 'Processing',
                'slug' => Str::slug('Processing'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b5a8e6a272df464cd1c727f3bd089a74.png',
                'name' => 'UEFI',
                'slug' => Str::slug('UEFI'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7873d595250122e806fb64a28d1828b9.png',
                'name' => 'WebAssembly',
                'slug' => Str::slug('WebAssembly'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a0287e5f80109daa9c3311b75aa15d74.png',
                'name' => 'Лазеры',
                'slug' => Str::slug('Лазеры'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ed7ac9cb30fdc9dca5ed2308993505e0.png',
                'name' => 'Google Cloud Vision API',
                'slug' => Str::slug('Google Cloud Vision API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/83ad6c996372aee28a3d6f3ab259309c.png',
                'name' => 'Hadoop',
                'slug' => Str::slug('Hadoop'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/96fb517e0884c42aaa1e387c26d5c293.png',
                'name' => 'Puppet',
                'slug' => Str::slug('Puppet'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9307f2640322f449b5d9659fcd69dfbf.png',
                'name' => 'Clojure',
                'slug' => Str::slug('Clojure'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5808d5d362f5aaa86849124354e544bd.png',
                'name' => 'F#',
                'slug' => Str::slug('F#'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/308bb3eb1db5c15f9b3e5cf21710dc53.png',
                'name' => 'CoffeeScript',
                'slug' => Str::slug('CoffeeScript'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/773048e8f813056e57ab2f3552106123.png',
                'name' => 'Elm',
                'slug' => Str::slug('Elm'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/587f7abb2dc5d5a0540a29426f72a62d.png',
                'name' => 'Phalcon',
                'slug' => Str::slug('Phalcon'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/024aa74f9b2ac39ffb43f6ca8d2c47e8.png',
                'name' => 'Solidity',
                'slug' => Str::slug('Solidity'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/39ae2ba87ec9642dda0d4b9a4ee6ebdf.png',
                'name' => 'Разработка под Sailfish OS',
                'slug' => Str::slug('Разработка под Sailfish OS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/16a6e70985287425074a4033b296cad7.png',
                'name' => 'Образование за рубежом',
                'slug' => Str::slug('Образование за рубежом'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a95f2ecb6ea9302d0fe747c9905555bf.png',
                'name' => 'Биллинговые системы',
                'slug' => Str::slug('Биллинговые системы'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ae529c4a9cd7049ed594f03f6de98271.png',
                'name' => 'Чулан',
                'slug' => Str::slug('Чулан'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/468d5c63177219f7750e9597807e3f93.jpg',
                'name' => 'Forth',
                'slug' => Str::slug('Forth'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1f7b70aa274875ad783ef0584b3b3016.png',
                'name' => 'SAN',
                'slug' => Str::slug('SAN'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a145fab6c510fec3352ddef71f051aa1.png',
                'name' => 'D',
                'slug' => Str::slug('D'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/6e9ef184e04a72ab1b5dd39172161387.png',
                'name' => 'Derby.js',
                'slug' => Str::slug('Derby.js'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ee1438eb8a9ba8ee3e93d0e87a3162de.png',
                'name' => 'Разработка под Tizen',
                'slug' => Str::slug('Разработка под Tizen'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4f4e6928b465327bb8f114edbb1f8878.png',
                'name' => 'Emacs',
                'slug' => Str::slug('Emacs'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0b3a7b005871fcd48bb7374333417f95.png',
                'name' => 'Разработка под Bada',
                'slug' => Str::slug('Разработка под Bada'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f85bc487e6457bd11b2e3614ef54ecf7.png',
                'name' => 'Mercurial',
                'slug' => Str::slug('Mercurial'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/24599d7453a31fdc7559ba90246c75b3.png',
                'name' => 'UML Design',
                'slug' => Str::slug('UML Design'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9d28698a2c63d9c46917e81fe3329e35.png',
                'name' => 'Fortran',
                'slug' => Str::slug('Fortran'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/695e6ce5e7025e7c2374f8b36c7e74b8.png',
                'name' => 'Cocoa',
                'slug' => Str::slug('Cocoa'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e9f5267a09b3ba31d7f83504df49fde1.png',
                'name' => 'Apache Flex',
                'slug' => Str::slug('Apache Flex'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2c98341970e35f04171b401f4e7561eb.png',
                'name' => 'Action Script',
                'slug' => Str::slug('Action Script'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8da1905ef6af7fd478340f201c153daf.png',
                'name' => 'Joomla',
                'slug' => Str::slug('Joomla'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8f9d1a07c7680c0eabf8d2dea3fde478.png',
                'name' => 'IIS',
                'slug' => Str::slug('IIS'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f09ca8a70dc5d7e6ab722e150cd4fdba.png',
                'name' => 'Twitter API',
                'slug' => Str::slug('Twitter API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7c76397cf408ca9e1f16419d0c6c91ec.png',
                'name' => 'ВКонтакте API',
                'slug' => Str::slug('ВКонтакте API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/80447a43a44fbdaf536708a94e9daef2.png',
                'name' => 'Microsoft Access',
                'slug' => Str::slug('Microsoft Access'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bbea1c94dfb0b6493db05a78218ab9a7.png',
                'name' => 'Разработка под Windows Phone',
                'slug' => Str::slug('Разработка под Windows Phone'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/19a718967053bff532f6294609413270.png',
                'name' => 'Maps API',
                'slug' => Str::slug('Maps API'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f37d50f817d9550effe350f3e9283f35.png',
                'name' => 'LabVIEW',
                'slug' => Str::slug('LabVIEW'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/f44f967cae7b94b9e11d1311c13f8adf.png',
                'name' => 'Brainfuck',
                'slug' => Str::slug('Brainfuck'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a2bbd4ddf49bb8ace5c39bd30f6aefe1.png',
                'name' => 'Cubrid',
                'slug' => Str::slug('Cubrid'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0dfee5cfdcc482cb24fa726a1cc5f3cf.png',
                'name' => 'Mono и Moonlight',
                'slug' => Str::slug('Mono и Moonlight'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/d76d4802c9328dc2d23ee0e66e3312e8.png',
                'name' => 'Doctrine ORM',
                'slug' => Str::slug('Doctrine ORM'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/48d099cf12eedcf480ea5fd8fc1665f3.png',
                'name' => 'Google App Engine',
                'slug' => Str::slug('Google App Engine'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8bdeb827a9a00d3617c072e7be1bb635.png',
                'name' => 'Fidonet',
                'slug' => Str::slug('Fidonet'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/9b22a7eee3c0b1175e27f2ca4383fa17.png',
                'name' => 'Twisted',
                'slug' => Str::slug('Twisted'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1200c545947459ce14356e5924ed8a14.png',
                'name' => 'IPTV',
                'slug' => Str::slug('IPTV'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7080a8da5dc5ad5cda9cfc8f10923bd0.png',
                'name' => 'Sphinx',
                'slug' => Str::slug('Sphinx'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0eac9bbc3f96fefa5fc65e18e59b9e25.png',
                'name' => 'Оболочки',
                'slug' => Str::slug('Оболочки'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/686f023f340c3fd07154241b95e97164.png',
                'name' => 'XSLT',
                'slug' => Str::slug('XSLT'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e8d2722d93e90da5a72cb0a1a8bfa3e8.png',
                'name' => 'LaTeX',
                'slug' => Str::slug('LaTeX'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/953831c5d17cdfe914f518e24af915c5.png',
                'name' => 'Small Basic',
                'slug' => Str::slug('Small Basic'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/973ed8ab2762a8297f7b541f1a38c3e6.png',
                'name' => 'Kohana',
                'slug' => Str::slug('Kohana'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/159014e44ae69f9f6bde01f3a17e7e66.png',
                'name' => 'XML',
                'slug' => Str::slug('XML'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/badd63f9d8c98af8406d2f823be76b7a.png',
                'name' => 'Разработка под Java ME',
                'slug' => Str::slug('Разработка под Java ME'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/2505a1a952859fa7af19e759e10e8878.png',
                'name' => 'LiveStreet',
                'slug' => Str::slug('LiveStreet'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b5686b917481469fb723cf2e0280f647.png',
                'name' => 'MooTools',
                'slug' => Str::slug('MooTools'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/62794ba20556c8fbe494ca3578ca770d.png',
                'name' => 'GreaseMonkey',
                'slug' => Str::slug('GreaseMonkey'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/11a74dd6cdc2ab1b4deb56e612e6909e.jpg',
                'name' => 'INFOLUST',
                'slug' => Str::slug('INFOLUST'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/34ec27277672d19180482eee81fbc33b.png',
                'name' => 'Groovy & Grails',
                'slug' => Str::slug('Groovy & Grails'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/43f1a4c4588b789c5c60b793469c8214.png',
                'name' => 'Lisp',
                'slug' => Str::slug('Lisp'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/ee12270d3d65872f56aa53ccf8c3afdc.png',
                'name' => 'Графические оболочки',
                'slug' => Str::slug('Графические оболочки'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e03f41733c87b7bafa92301db302164e.png',
                'name' => 'VIM',
                'slug' => Str::slug('VIM'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/82c0ea28d86bdc3a67531a5e215dcd01.png',
                'name' => 'Zend Framework',
                'slug' => Str::slug('Zend Framework'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/8aee078e32e3c099b213ea8cc37ec7ea.png',
                'name' => 'Библиотека ExtJS/Sencha',
                'slug' => Str::slug('Библиотека ExtJS/Sencha'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/7f33b8b38e7d6b5d3f5c7a049833fe16.png',
                'name' => 'Internet Explorer',
                'slug' => Str::slug('Internet Explorer'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a0be210fd3482779f8b7fad0fd22a72b.png',
                'name' => 'CodeIgniter',
                'slug' => Str::slug('CodeIgniter'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/87c6116c01ec8e65d2974bc63e630c1d.png',
                'name' => 'jQuery',
                'slug' => Str::slug('jQuery'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/bb6e2ed86ed5041e3d71ea65e8603ae3.png',
                'name' => 'Silverlight',
                'slug' => Str::slug('Silverlight'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/81997b461c19397eeaea4e871b74226f.png',
                'name' => 'SharePoint',
                'slug' => Str::slug('SharePoint'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/c106a979d03bfd070d4d8bf45ab7f2dd.png',
                'name' => 'Google Web Toolkit',
                'slug' => Str::slug('Google Web Toolkit'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/0f4a9ac27402b038bf56bc81feffbf5b.png',
                'name' => 'Я пиарюсь',
                'slug' => Str::slug('Я пиарюсь'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/acc755ff56390abe8cb01efb67f6a753.png',
                'name' => 'CakePHP',
                'slug' => Str::slug('CakePHP'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/e9e1988d3420942578e1cfc745a5b714.png',
                'name' => 'Safari',
                'slug' => Str::slug('Safari'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/b3c737bcf1fcfb9efd684a14df63d013.png',
                'name' => 'MODX',
                'slug' => Str::slug('MODX'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/4f7dcd94c78412bd1381eea4eff18a5b.png',
                'name' => 'Opera',
                'slug' => Str::slug('Opera'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5f83c032bf625a834dad8f81871520ae.png',
                'name' => 'WordPress',
                'slug' => Str::slug('WordPress'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5322e350af78b05a6f245fbb9cafc5b5.png',
                'name' => 'Микроформаты',
                'slug' => Str::slug('Микроформаты'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/3430f045169914087c78eba333933ee2.png',
                'name' => 'Ember.js',
                'slug' => Str::slug('Ember.js'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/1de8e7e88c62a9c8750537fa0e0d46ef.png',
                'name' => 'Ajax',
                'slug' => Str::slug('Ajax'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a924ba9ed0205d7991da0cc7ae765565.png',
                'name' => 'Email-маркетинг',
                'slug' => Str::slug('Email-маркетинг'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/5da8bda6d8275f9982b216d49edbe22b.png',
                'name' => 'Киберспорт',
                'slug' => Str::slug('Киберспорт'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/a0d0fab2b47fdb645a97566eba097b69.png',
                'name' => 'Верстка писем',
                'slug' => Str::slug('Верстка писем'),
            ]
        );
        Hub::firstOrCreate(
            [
                'logo' => 'images/hubs/dd8d8801fb89b8fddca31eec3bc8f193.png',
                'name' => 'Монетизация веб-сервисов',
                'slug' => Str::slug('Монетизация веб-сервисов'),
            ]
        );
    }
}
