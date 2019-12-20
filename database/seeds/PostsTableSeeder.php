<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Let\'s play a little game with Lamoda',
            'body' => 'Привет! Меня зовут Павел Савельев, я руковожу отделом автоматизации бизнес-процессов в Lamoda. Хочу пригласить вас сыграть в PHP Quest. Для участия в квесте необходимо заполнить [анкету](https://tech.lamoda.ru/phpquest?fbclid=IwAR05tcNaXBGprD5w2i0Wdcifhq2TlM3kA0rdwLFXX9XbqE57_NzzSHpACCM). После заполнения анкеты мы вышлем вам на почту головоломку. До 12 августа игроки присылают свои решения на quest@lamoda.ru. Спойлер: у головоломки множество решений, и мы готовы рассмотреть любое.



![image](https://habrastorage.org/webt/iv/aa/r6/ivaar6szop4s-pjboik4io6px-s.jpeg)



Всех, кто успешно справился с головоломкой, мы пригласим на финал, который состоится 16 августа в нашем офисе в Москве. Игрокам из других городов мы оплатим билеты и проживание. 



16 августа вас ждет финальное состязание, игры и вечеринка в лучшем офисе по версии [Best Office Awards 2019](http://www.officenext.ru/orientir/article_41034_best-office-awards-2019-itogi/). Победители получат Job Offer от Lamoda в тот же день. 



### Как это будет?



*   13:00 – 13:30 Регистрация игроков и жеребьевка
*   13:30 – 14:30 Приветственное слово (Павел Савельев, Head of Business process automation; Александр Афенов, Team Lead; Алексей Фельде, Tech Lead)
*   14:30 – 16:30 РНР-поединок
*   16:30 – 17:30 Ланч героев
*   17:30 – 18:30 Сергей Заика, тимлид команды сall-center расскажет, как сложился опыт работы Lamoda c kafka и вручит приз за самый каверзный вопрос
*   18:30 – 19:00 Награждение и вручение Jоb Offers
*   19:00 – 22:00 Вечеринка



На PHP в Lamoda написаны ключевые внутренние системы автоматизации: служба доставки, фотостудия, управление платежами, системы управления заказами, а также B2B-направление. Наш [стек технологий](https://radar.thoughtworks.com/?sheetId=https%3A%2F%2Fdocs.google.com%2Fspreadsheets%2Fd%2F1-wAPAa51iDNmz-UkY7GoKpOhbDjNtOogWqvIzJqWHQI%2Fedit%23gid%3D0) — это PHP (пишем на последних версиях), Docker, Symfony 3.4 / 4 в связке с Doctrine 2, PostgreSQL, Kubernetes. Уровень разработки можно оценить по нашему [github.com/lamoda](https://github.com/lamoda) и множеству выступлений на конференциях и митапах. Подробнее о выступлениях и технологиях — на [tech.lamoda.ru](https://tech.lamoda.ru/). 



По любым вопросам пишите мне на quest@lamoda.ru. 

It’s time to play the game.',
                'author_id' => 2,
                'votes' => 1,
                'created_at' => '2019-07-16 14:14:09',
                'updated_at' => '2019-08-13 21:25:45',
            ),
            1 => 
            array (
                'id' => 41,
            'name' => 'Разработка чат-бота (telegram + youtube)',
                'body' => '__Почему это вообще появилось здесь?__

Недавно я написал статью о разработке бота на php с использование laravel+botman для telegram. Самое первое, что написали, цитирую, “стрельба из пушки по воробьям”. Я согласен с этим, даже осознавал это во время разработки, но мне был интересен laravel.

![](https://habrastorage.org/webt/ly/rl/ce/lyrlcenybn_v6he3q2rsxgymiok.jpeg)

Сейчас же я разрабатывал бота на чистом php(без обвязок) и API telegram, а так как статей на подобную тему очень много, то плюсом немного затронем API google(api youtube). Надеюсь, вам будет интересно и полезно узнать о API youtube.

Небольшое отступление. На данный момент я работаю frontend программистом и с php работаю лишь в свое удовольствие(хотя какое здесь удовольствие). Возможны глупейшие ошибки на стороне сервера, но это работает и мне на момент обучения этого достаточно.

__Постановка задачи__

Однажды вечером мне пришла идея связать бота и youtube, на тот момент я даже не подозревал о существовании api google. Требуется бот, который при выходе нового видео на youtube канале будет делать пуш уведомление в моего бота.

В принципе, функционал довольно простой, но как работать с youtube? Оказывается решение этой задачи есть у самого google и имя ему google API. Он позволяет работать со всеми приложениями от компании, но меня интересовал лишь youtube.

Настройка и разработка

Так получилось, что во время изучения api youtube было найдено куда элегантное решение моей задачи, его предложила сама документация по api. Но сначала о api. Чтобы начать работать с ним вам необходимо перейти в google console и выбрать нужный вам вариант api. После чего путь лежит лишь в документацию или на stackoverflow. Сразу скажу, русского варианта документации нет, уроков тоже нет. Желательно иметь минимальные знания английского языка или действовать методом тыка.

Выглядит это так. Вы заходите в google console, создаете свой проект и выбираете нужный API.

![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)

А теперь к решению проблемы. Во время чтения документации я нашел(google сам показал) сервис pubsubhubbub.appspot.com/subscribe он позволяет связать youtube и ваше приложение. Как работает? Работает по принципу webhook. Вы вставляете youtube канала, который хотите прослушать и каждый раз при каких либо действиях на канале(добавление видео, удаление, изменение) будите получать данные на свой скрипт. 

![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)

Callback URL — скрипт, который будет принимать данные от google.
Topic URL — канал, который вы хотите прослушивать.

Ну и поле Mode позволяет выбрать, что вы хотите, подписаться или отписаться от прослушивания. 

Приступим к написанию кода, для начала давайте настроим наш скрипт для работы с youtube. Я писал все в одном файле т.к. это был тест + кода там действительно мало. После того, как вы отправите запрос на подписку его нужно подтвердить. Погуглив, можно найти ответ на всеми любимом сайте, один из комментариев на stackoverflow подсказывает.

```
$video = "null";

if (isset($_GET[\'hub_challenge\'])) { echo $_REQUEST[\'hub_challenge\']; } 
else { $video = parseYoutubeUpdate(file_get_contents(\'php://input\')); }

function parseYoutubeUpdate($data) {
$xml 		= simplexml_load_string($data, \'SimpleXMLElement\', LIBXML_NOCDATA);
$video_id 	= substr((string)$xml->entry->id, 9);
$channel_id = substr((string)$xml->entry->author->uri, 32);
$published  = (string)$xml->entry->published;

return array(
\'video_id\'=>$video_id,
\'channel_id\'=>$channel_id,
\'published\'=>$published 
);
}
```

Здесь мы создаем для удобства переменную в которой будет нужная нам инфа о видео. Две последующие строки, позволяют определить, есть ли возможность подтвердить запрос от pubsubhubbub, если да, то подтверждаем, если нет, то значит, что пришли данные от youtube и нам нужно их обработать. В функции parseYoutubeUpdate мы обрабатывает ответ, получаем всю нам нужную инфу. 

Здесь стоит сделать отступление и рассказать о особом(на мой взгляд, могу ошибаться) виде данных, которым пользуется youtube(для ответов) он называется, как я понял, atom(не путать с IDE или это обычный xml… опыта с ним было мало). Выглядит он как-то так(небольшой кусок ответа от youtube):

```
<id>yt:video:eE5mpblYpdY</id>
<yt:videoId>eE5mpblYpdY</yt:videoId>
<yt:channelId>UCGqKr3O5ub-O7zEKx_qeHUQ</yt:channelId>
<title>20b3560a49 1080</title>
<link rel="alternate" href="https://www.youtube.com/watch?v=hgCQ378xNus"/>
<author>
<name>not Epic</name>
<uri>https://www.youtube.com/channel/UCGqKr3O5ub-O7zEKx_qeHUQ</uri>
</author>
<published>2019-07-14T05:10:49+00:00</published>
<updated>2019-07-14T05:11:07.600177664+00:00</updated>
```

Вернемся к parseYoutubeUpdate().

В функции мы преобразуем ответ в xml формат.
Записываем в переменные нужные нам данные.
А после возвращаем массив с этими данными.

Переходим к telegram. Для начала хочется сказать, это ****** как легче работать нежели с botman. Если вы хотите разрабатывать ботов только под telegram, то не пользуйтесь библиотеками, которые позволяют разрабатывать ботов под разные платформ…. в этом нет смысла… больше проблем будет. API telegram\'a очень понятное и простое даже для новичка, который только познакомился с php и имеет минимальные знания ООП. 

Так, ближе к делу, ближе к коду. Нам нужно создать бота и привязать его к нашему скрипту. Надеюсь, бота вы создать в состоянии. Записываем токен от бота и создаем запрос

```
const TOKEN = "6826815*******Yme99*****9kjzgVi*****3S******";
$url = \'https://api.telegram.org/bot\' . TOKEN . \'/sendMessage\';
```

Теперь нам необходимо лишь отправить запрос на сервера telegram.

```
$params = [
\'chat_id\' =>712531723,
"text" => $linkVideo,
];

$url = $url . \'?\' . http_build_query($params);
```

Создаем необходимые параметры, для меня это id чата(если выводит на продакшен бота, то необходимо сохранять все id в БД чтобы спамить) и текстовое сообщение.

Как вы могли заметить, я передаю ссылку как простое сообщение, а не видео. Как я понял, телеграм передает видео лишь в том случае, если оно загружено на сервер, а иначе нет… + Мне необходимо видеть превью картинку для видео.

Теперь наш бот будет получать уведомления о выходе/редактирование видео. Выглядит это как-то так:

image

Game over. У меня все на этом. Самый большой недостаток этого кода в том, что он находится в одном файле, но кода на 10 строк для меня не имела смысла разделять.

Исходники — [github](https://github.com/EpicLegend/telegrambot-youtube-).',
                'author_id' => 2,
                'votes' => 0,
                'created_at' => '2019-08-15 19:54:39',
                'updated_at' => '2019-08-15 19:54:39',
            ),
            2 => 
            array (
                'id' => 42,
            'name' => 'Разработка чат-бота (telegram + youtube)',
                'body' => '# __Почему это вообще появилось здесь?__

Недавно я написал статью о разработке бота на php с использование laravel+botman для telegram. Самое первое, что написали, цитирую, “стрельба из пушки по воробьям”. Я согласен с этим, даже осознавал это во время разработки, но мне был интересен laravel.

![](https://habrastorage.org/webt/ly/rl/ce/lyrlcenybn_v6he3q2rsxgymiok.jpeg)

Сейчас же я разрабатывал бота на чистом php(без обвязок) и API telegram, а так как статей на подобную тему очень много, то плюсом немного затронем API google(api youtube). Надеюсь, вам будет интересно и полезно узнать о API youtube.

Небольшое отступление. На данный момент я работаю frontend программистом и с php работаю лишь в свое удовольствие(хотя какое здесь удовольствие). Возможны глупейшие ошибки на стороне сервера, но это работает и мне на момент обучения этого достаточно.

# __Постановка задачи__

Однажды вечером мне пришла идея связать бота и youtube, на тот момент я даже не подозревал о существовании api google. Требуется бот, который при выходе нового видео на youtube канале будет делать пуш уведомление в моего бота.

В принципе, функционал довольно простой, но как работать с youtube? Оказывается решение этой задачи есть у самого google и имя ему google API. Он позволяет работать со всеми приложениями от компании, но меня интересовал лишь youtube.

Настройка и разработка

Так получилось, что во время изучения api youtube было найдено куда элегантное решение моей задачи, его предложила сама документация по api. Но сначала о api. Чтобы начать работать с ним вам необходимо перейти в google console и выбрать нужный вам вариант api. После чего путь лежит лишь в документацию или на stackoverflow. Сразу скажу, русского варианта документации нет, уроков тоже нет. Желательно иметь минимальные знания английского языка или действовать методом тыка.

Выглядит это так. Вы заходите в google console, создаете свой проект и выбираете нужный API.

![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)

А теперь к решению проблемы. Во время чтения документации я нашел(google сам показал) сервис pubsubhubbub.appspot.com/subscribe он позволяет связать youtube и ваше приложение. Как работает? Работает по принципу webhook. Вы вставляете youtube канала, который хотите прослушать и каждый раз при каких либо действиях на канале(добавление видео, удаление, изменение) будите получать данные на свой скрипт. 

![](https://habrastorage.org/webt/p1/aa/8v/p1aa8vsd_gsk_kbhgtvzdzdpqso.png)

Callback URL — скрипт, который будет принимать данные от google.
Topic URL — канал, который вы хотите прослушивать.

Ну и поле Mode позволяет выбрать, что вы хотите, подписаться или отписаться от прослушивания. 

Приступим к написанию кода, для начала давайте настроим наш скрипт для работы с youtube. Я писал все в одном файле т.к. это был тест + кода там действительно мало. После того, как вы отправите запрос на подписку его нужно подтвердить. Погуглив, можно найти ответ на всеми любимом сайте, один из комментариев на stackoverflow подсказывает.

```
$video = "null";

if (isset($_GET[\'hub_challenge\'])) { echo $_REQUEST[\'hub_challenge\']; } 
else { $video = parseYoutubeUpdate(file_get_contents(\'php://input\')); }

function parseYoutubeUpdate($data) {
$xml 		= simplexml_load_string($data, \'SimpleXMLElement\', LIBXML_NOCDATA);
$video_id 	= substr((string)$xml->entry->id, 9);
$channel_id = substr((string)$xml->entry->author->uri, 32);
$published  = (string)$xml->entry->published;

return array(
\'video_id\'=>$video_id,
\'channel_id\'=>$channel_id,
\'published\'=>$published 
);
}
```

Здесь мы создаем для удобства переменную в которой будет нужная нам инфа о видео. Две последующие строки, позволяют определить, есть ли возможность подтвердить запрос от pubsubhubbub, если да, то подтверждаем, если нет, то значит, что пришли данные от youtube и нам нужно их обработать. В функции parseYoutubeUpdate мы обрабатывает ответ, получаем всю нам нужную инфу. 

Здесь стоит сделать отступление и рассказать о особом(на мой взгляд, могу ошибаться) виде данных, которым пользуется youtube(для ответов) он называется, как я понял, atom(не путать с IDE или это обычный xml… опыта с ним было мало). Выглядит он как-то так(небольшой кусок ответа от youtube):

```
<id>yt:video:eE5mpblYpdY</id>
<yt:videoId>eE5mpblYpdY</yt:videoId>
<yt:channelId>UCGqKr3O5ub-O7zEKx_qeHUQ</yt:channelId>
<title>20b3560a49 1080</title>
<link rel="alternate" href="https://www.youtube.com/watch?v=hgCQ378xNus"/>
<author>
<name>not Epic</name>
<uri>https://www.youtube.com/channel/UCGqKr3O5ub-O7zEKx_qeHUQ</uri>
</author>
<published>2019-07-14T05:10:49+00:00</published>
<updated>2019-07-14T05:11:07.600177664+00:00</updated>
```

Вернемся к parseYoutubeUpdate().

В функции мы преобразуем ответ в xml формат.
Записываем в переменные нужные нам данные.
А после возвращаем массив с этими данными.

Переходим к telegram. Для начала хочется сказать, это ****** как легче работать нежели с botman. Если вы хотите разрабатывать ботов только под telegram, то не пользуйтесь библиотеками, которые позволяют разрабатывать ботов под разные платформ…. в этом нет смысла… больше проблем будет. API telegram\'a очень понятное и простое даже для новичка, который только познакомился с php и имеет минимальные знания ООП. 

Так, ближе к делу, ближе к коду. Нам нужно создать бота и привязать его к нашему скрипту. Надеюсь, бота вы создать в состоянии. Записываем токен от бота и создаем запрос

```
const TOKEN = "6826815*******Yme99*****9kjzgVi*****3S******";
$url = \'https://api.telegram.org/bot\' . TOKEN . \'/sendMessage\';
```

Теперь нам необходимо лишь отправить запрос на сервера telegram.

```
$params = [
\'chat_id\' =>712531723,
"text" => $linkVideo,
];

$url = $url . \'?\' . http_build_query($params);
```

Создаем необходимые параметры, для меня это id чата(если выводит на продакшен бота, то необходимо сохранять все id в БД чтобы спамить) и текстовое сообщение.

Как вы могли заметить, я передаю ссылку как простое сообщение, а не видео. Как я понял, телеграм передает видео лишь в том случае, если оно загружено на сервер, а иначе нет… + Мне необходимо видеть превью картинку для видео.

Теперь наш бот будет получать уведомления о выходе/редактирование видео. Выглядит это как-то так:

image

Game over. У меня все на этом. Самый большой недостаток этого кода в том, что он находится в одном файле, но кода на 10 строк для меня не имела смысла разделять.

Исходники — [github](https://github.com/EpicLegend/telegrambot-youtube-).',
                'author_id' => 2,
                'votes' => 0,
                'created_at' => '2019-08-15 20:03:59',
                'updated_at' => '2019-08-15 20:03:59',
            ),
            3 => 
            array (
                'id' => 43,
                'name' => 'JavaScript promise nədir? Nə işə yarayır.',
                'body' => 'Salam dostlar, bu gün sizlərlə bir yerdə javascript-də promise-in nə olduğunu, necə istifadə edildiyini öyrənəcəyik.

![](https://miro.medium.com/max/600/1*5r2Hf1hKFt8sTGD5TLqFOw.png)

Adına görə promise sözü ingilis dilindən tərcüməsi söz verməkdir. Gəlin məsələyə biraz normal həyatda qarşılaşdığımız hallarla baxaq temanı tam və aydın başa düşək :D .

Təsəvvür edin getmisiniz pizza verilən bir məkana və pizza sifariş verdiniz. Sifarişinizi verəndən sonra ofisiant sizə sifarişinizi izləmək üçün kiçik bir aparat verdi. Bu kiçik aparat pizza verilən məkanın pizzanı sizə verilməsi üçün verilən sözü (promise) təmsil edir. Həmin kiçik aparatın pizza haqqında hər hansı bir bildiriş verənə kimi gözləmə (pending) vəziyyətidir. Aparata pizza bişib tam hazirdı və heç bir problem olmayıb uğurlu (resolved) ya da ki, pizza hazirlana bilməyib problem yaranıb uğursuz (rejected) bildirişi gəlir. Əgər sifariş uğurla bitirsə pizzanı bəh-bəhlə yeyəcəksiniz ( pizzadan danışdım ürəyim pizza istədi lap :( . Nəysə mövzuya dönək ). Əgər problem yaranıbsa məkanın sahibinə problemi bildirib şüvənlik edirsiz (error handling). Beləliklə məkan sahibi işləri paralel (sinxron) apara bilir.

Bəs bu promise-i javasciptdə niyə çox esitməmisik? niyə istifadə eləmirik? suallarına cavab tapaq. Promise EcmaScript 6 ilə javascript dünyasına giriş edib. Digər bir məsələ ise EcmaScript 5-də ən çox XMLHttpRequest API istifadə etməyimizdir (fikrimcə). XMLHttpRequest API promise API istifadə eləmir. Lakin promise istifadə edən bir neçə native API var

* Battery API
* fetch API
* ServiceWorkers

Bu yerdə başqa bir sual yaranır. __Callback__ yoxsa __Promise__ ?

![Callback vs Promise](https://miro.medium.com/max/700/1*_THSHhI3oJGD5ehM3M7Hpw.jpeg)

İlk öncə callback-in nə olduğunu yadımıza salaq. Callback en sadə deyişlə hər hansı bir funksiyaya parametr olaraq verdiyimiz və sonra geri çağıracağımız funksiyalara deyilir.İstənilən nəticə olan zaman və ya iş bitən zaman işi bitər. Callback-lər haqqında daha geniş bilgi üçün aşağıdakı məqaləyə zad edə bilərsiniz.

__Javascript-də callback-lər: 1-ci hissə__

Burdakı əsas tema callback-ə güvənə bilərikmi? Əmanətimizə sahib çixa biləcəklərmi? Əmanətə xəyanət edərlərmi, callback-lərimizi çağırmamış başqa bir yad yerdən çağrıla bilərmi (Başqa bir API funksiyasında məsələn) ? .

Callback-lərə çoxda güvənməməyimizin əsas səbəbləri aşağıdakılardır.

* Callback-lərin zamanından tez çağrilması
* Callback-in heç çağrılmaması
* Callback-in gözləniləndən az və ya çox çağrılması
* Lazım olan parametrləin doğru şəkildə almaması
* Xətaların görsənməməsi.

Promise callback-lərin bu tipli sıxıntılı tərəflərini tamamlamaq üçün təklif edilən bir sistemdir.

Gəlin birazda kod tərəfinə baxaq. Elə yuxarıda çəkdiyimiz misala uyğun girişək temaya :D.

```
const pizza_sifarisi= new Promise((resolve,reject)=>{ 
let her_sey_eladimi = true;  
if (her_sey_eladimi) {
resolve("Hər şey yolundadı pizza hazırdı. Nyam nyam time");
}else{
reject("Problemlə qarşılaşdıq. Sifarişiniz tamamlana bilmədi. Şüvənlik time :D"); 
});
pizza_sifarisi.then((data)=>{ 
console.log(data); 
});
```
Gördüyümüz kimi pizza sifarişini verdik. cavabı then funksiyası ilə alırıq. Bir dəqiqə bəs hər hansı bir yerdə problem yaransa necə xəbərimiz olacaq? O zaman temaya catch daxil olur. Əgər gedişatda problem olarsa catch funksiyası işləyəcək. Və yaranan problemin səbəbi həmin funksiyaya parametr kimi gələcək.

```
const pizza_sifarisi= new Promise((resolve,reject)=>{ 
let her_sey_eladimi = true;  
if (her_sey_eladimi) {
resolve("Hər şey yolundadı pizza hazırdı. Nyam nyam time");
}else{
reject("Problemlə qarşılaşdıq. Sifarişiniz tamamlana bilmədi. Şüvənlik time :D"); 
});
pizza_sifarisi.then((data)=>{ 
console.log(data); // Hər şey yolundadı pizza hazırdı. Nyam nyam time
}).catch((err)=>{     
console.log(err); // Problemlə qarşılaşdıq. Sifarişiniz tamamlana bilmədi. Şüvənlik time :D
});
```

Elavə olaraq Promise-in digər işə yararlı metodları var. Bunlarda bonus məlumatlar. Hadi biraz əziyyət çəkin gerisin siz araşdirib oyrənin :) .

* Promise.all
* Promise.allSettled
* Promise.race

Temanı yekunlaşdırmaq adı ilə son cümlələri də deyim. Promise gün keçdikcə məhşurlaşan bir temadı. Buna görə də front-end developerlərə bu temanı dərindən öyrənmələrini məsləhət görürəm. Bundan əlavə Node.js proqramlaşdırma dilinə promise teması üçün başqa bir dünyasıda demək olar (Promise sistemi dilin kökündə olduğu üçün).

Məndən bu qədər dostlar. Happy coding zad :)',
'author_id' => 2,
'votes' => 0,
'created_at' => '2019-08-15 20:10:55',
'updated_at' => '2019-08-15 20:10:55',
),
4 => 
array (
'id' => 44,
'name' => 'SQL index nədir? necə işləyir?',
'body' => 'Salam dostlar, bu gün biz bir çoxlarımızın bilibdə işlətmədiyi, işlədibsə də yalnış işlətdiyi, varlığından belə xəbəri olmayan index -in nə olduğunu öyrənəcəyik.

---

Əgər verilənlər bazası ilə işləyəcəksinizsə __indexləmə__ sözünü çox eşidəcəksiniz. Bəs nədir axı bu hamının dilindən düşməyən indexləmə? İndexləmə deyəndə ağlımıza nə gəlməlidir? Beynimizdə necə təsəvvür etməliyik?

![](https://miro.medium.com/max/600/1*eQXmQnQgNzq5wnMfPHWGfQ.jpeg)

Əslində indexləmə işini biz öz gündəlik həyatımızda istifadə edirik. Təsəvvür edin qarşınızda bir hekayə kitabı var. Mən sizdən həmin kitabda baş qəhrəmanın yaralandığı hissəsini oxu desəm? Siz nə edəcəksiniz? Məcbur kitabın bütün səhifələrinə baxacaqsınız. Hekayədə mən istədiyim hissəni oxumaq üçün. Fərz edək ki, baxdınız və oxudunuz. Bu sizin 10 dəqiqənizi aldi.

İndi isə mən yenə sizdən həmin kitabda baş qəhrəmanın yaralandığı hissəsini oxu desəm? Amma bu dəfə həmin hissə kitabın 15-ci səhifəsindədir desəm? Siz nə edəcəksiniz? Heç fikirləşmədən 15-ci səhifəni açıb, həmin hissəni oxuyacaqsınız. Və bu sizin heç 1 dəqiqənizi də almayacaq.

Bunun kimi gündəlik həyatımızda çox şeyləri nümunə göstərmək olar. İndexləmə də bizə əlimizdəki məlumatı daha surətli tapmağa imkan verir.

# __Bəs index-i necə yaradırlar?__

```
CREATE INDEX index_adı ON table_adı (sütun1, sütun2, ...);
```

> Verilənlər bazasında hər yenidən yaratma, dəyişiklik edilmə və silmə hadisələrindən sonra index yenidən yaradıldığina görə hər gördüyümüz sütuna index vermək olmaz. İstifadə olunmayan sütunları indexləmək və həddən artıq indexləmə performansı aşağı sala bilər.

# __Bəs bu indexləmə necə işləyir?__

İndex-lərin işləmə alqoritmi proqramlaşdırmada çox istifadə olunan və verilənlər bazasının önəmli məsələlərindən biri olan ağac alqoritmidir.
Tree adlandırılan bu alqoritmin bir çox növü olmasına baxmayaraq biz sql serverin istifadə elədiyi B-Tree (Balanced Tree –Balanslı Ağac)-dan danışacam.

![](https://miro.medium.com/max/511/1*pVU4nGLEmv5PaQ9BGcB01A.gif)

Tree alqoritmlərində ən başda __Root__ yəni kök olur. Root-un altında isə normalda bir və ya birdən çox __Intermediate level__ (Orta səviyyə) dediyimiz hissə olur. Əgər __Intermediate level__ dediyimiz hissənin altında yeni bir hissə yoxdursa, o zaman __Intermediate level__ dediyimiz hissəyə Leaf (yarpaq) deyilir.

__Root-leaf__ əlaqəsi proqramlaşdırmada __parent-child əlaqəsinə__ bənzəyir.

İndi isə gəlin B-Tree alqoritminin məntiqini anlamaq üçün bir nümunəyə baxaq. 1-dən 200-ə qədər nömrələnmiş olan qutuların içində 150 nömrəli qutunu tapmağa çalışaq. Əgər indexləmədən istifadə eləməsək 1-dən 150-yə qədər bütün qutulara baxmağa məcburuq. Amma aşağıdaki şəkildəki kimi qutuları B-Tree olaraq sıralasaq axtardığımızı daha tez tapa bilərik.

![](https://miro.medium.com/max/614/1*dm6ZcFc67MkTR_hxGyvcsg.jpeg)

Şəkildəki kimi 150 nömrəli qutunu 28 dəfə oxumaqla tapırıq. Əvvəlcə 150 dəfə baxmaq lazım idisə B-Tree ilə 28 dəfə baxmaq lazım gələcək. Beləcə həm yaddaşı cox yükləmirik həm də surətli şəkildə istədiyimizi tapırıq.

# __İndex növləri__
SQL-də indexlərin aşagıdakı növləri vardır.

![](https://miro.medium.com/max/354/1*BYnb9MoUzJmo7OI9P8AruQ.gif)

İçində ən önəmli olan Clustered Index və Non-Clustered Index haqda novbəti məqalələrdə ətraflı danışacayıq. Bizi izləməkdə davam edin 🙂.',
'author_id' => 2,
'votes' => 0,
'created_at' => '2019-08-15 20:24:51',
'updated_at' => '2019-08-15 20:28:36',
),
5 => 
array (
'id' => 53,
'name' => 'TEST',
'body' => '>test',
'author_id' => 2,
'votes' => 0,
'created_at' => '2019-08-18 06:09:06',
'updated_at' => '2019-08-21 13:21:14',
),
6 => 
array (
'id' => 54,
'name' => 'БЛОК',
'body' => '<blockquote class="twitter-tweet"><p lang="az" dir="ltr">Sunsets don&#39;t get much better than this one over <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>. <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw">#nature</a> <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw">#sunset</a> <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a></p>&mdash; US Department of the Interior (@Interior) <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw">May 5, 2014</a></blockquote>

<script>alert(1)</script>

<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/B1ZCnFsHxX9/" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/B1ZCnFsHxX9/" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Посмотреть эту публикацию в Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/B1ZCnFsHxX9/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Публикация от Learn UX/UI design (@ui_gradient)</a> <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2019-08-20T15:43:58+00:00">20 Авг 2019 в 8:43 PDT</time></p></div></blockquote>',
'author_id' => 2,
'votes' => 1,
'created_at' => '2019-08-20 16:07:20',
'updated_at' => '2019-08-21 19:18:08',
),
7 => 
array (
'id' => 55,
'name' => 'Markdown Test',
'body' => '---
__Advertisement :)__

- __[pica](https://nodeca.github.io/pica/demo/)__ - high quality and fast image
resize in browser.
- __[babelfish](https://github.com/nodeca/babelfish/)__ - developer friendly
i18n with plurals support and easy syntax.

You will like those projects!

---

# h1 Heading 8-)
## h2 Heading
### h3 Heading
#### h4 Heading
##### h5 Heading
###### h6 Heading


## Horizontal Rules

___

---

***


## Typographic replacements

Enable typographer option to see result.

(c) (C) (r) (R) (tm) (TM) (p) (P) +-

test.. test... test..... test?..... test!....

!!!!!! ???? ,,  -- ---

"Smartypants, double quotes" and \'single quotes\'


## Emphasis

**This is bold text**

__This is bold text__

*This is italic text*

_This is italic text_

~~Strikethrough~~


## Blockquotes


> Blockquotes can also be nested...
>> ...by using additional greater-than signs right next to each other...
> > > ...or with spaces between arrows.


## Lists

Unordered

+ Create a list by starting a line with `+`, `-`, or `*`
+ Sub-lists are made by indenting 2 spaces:
- Marker character change forces new list start:
* Ac tristique libero volutpat at
+ Facilisis in pretium nisl aliquet
- Nulla volutpat aliquam velit
+ Very easy!

Ordered

1. Lorem ipsum dolor sit amet
2. Consectetur adipiscing elit
3. Integer molestie lorem at massa


1. You can use sequential numbers...
1. ...or keep all the numbers as `1.`

Start numbering with offset:

57. foo
1. bar


## Code

Inline `code`

Indented code

// Some comments
line 1 of code
line 2 of code
line 3 of code


Block code "fences"

```
Sample text here...
```

Syntax highlighting

``` js
var foo = function (bar) {
return bar++;
};

console.log(foo(5));
```

## Tables

| Option | Description |
| ------ | ----------- |
| data   | path to data files to supply the data that will be passed into templates. |
| engine | engine to be used for processing templates. Handlebars is the default. |
| ext    | extension to be used for dest files. |

Right aligned columns

| Option | Description |
| ------:| -----------:|
| data   | path to data files to supply the data that will be passed into templates. |
| engine | engine to be used for processing templates. Handlebars is the default. |
| ext    | extension to be used for dest files. |


## Links

[link text](http://dev.nodeca.com)

[link with title](http://nodeca.github.io/pica/demo/ "title text!")

Autoconverted link https://github.com/nodeca/pica (enable linkify to see)


## Images

![Minion](https://octodex.github.com/images/minion.png)
![Stormtroopocat](https://octodex.github.com/images/stormtroopocat.jpg "The Stormtroopocat")

Like links, Images also have a footnote style syntax

![Alt text][id]

With a reference later in the document defining the URL location:

[id]: https://octodex.github.com/images/dojocat.jpg  "The Dojocat"


## Plugins

The killer feature of `markdown-it` is very effective support of
[syntax plugins](https://www.npmjs.org/browse/keyword/markdown-it-plugin).


### [Emojies](https://github.com/markdown-it/markdown-it-emoji)

> Classic markup: :wink: :crush: :cry: :tear: :laughing: :yum:
>
> Shortcuts (emoticons): :-) :-( 8-) ;)

see [how to change output](https://github.com/markdown-it/markdown-it-emoji#change-output) with twemoji.


### [Subscript](https://github.com/markdown-it/markdown-it-sub) / [Superscript](https://github.com/markdown-it/markdown-it-sup)

- 19^th^
- H~2~O


### [\\<ins>](https://github.com/markdown-it/markdown-it-ins)

++Inserted text++


### [\\<mark>](https://github.com/markdown-it/markdown-it-mark)

==Marked text==


### [Footnotes](https://github.com/markdown-it/markdown-it-footnote)

Footnote 1 link[^first].

Footnote 2 link[^second].

Inline footnote^[Text of inline footnote] definition.

Duplicated footnote reference[^second].

[^first]: Footnote **can have markup**

and multiple paragraphs.

[^second]: Footnote text.


### [Definition lists](https://github.com/markdown-it/markdown-it-deflist)

Term 1

:   Definition 1
with lazy continuation.

Term 2 with *inline markup*

:   Definition 2

{ some code, part of Definition 2 }

Third paragraph of definition 2.

_Compact style:_

Term 1
~ Definition 1

Term 2
~ Definition 2a
~ Definition 2b


### [Abbreviations](https://github.com/markdown-it/markdown-it-abbr)

This is HTML abbreviation example.

It converts "HTML", but keep intact partial entries like "xxxHTMLyyy" and so on.

*[HTML]: Hyper Text Markup Language

### [Custom containers](https://github.com/markdown-it/markdown-it-container)

::: warning
*here be dragons*
:::',
'author_id' => 2,
'votes' => -1,
'created_at' => '2019-08-21 14:09:57',
'updated_at' => '2019-08-21 19:17:56',
),
8 => 
array (
'id' => 63,
'name' => 'Test 2',
'body' => '<blockquote class="twitter-tweet"><p lang="az" dir="ltr">Sunsets don&#39;t get much better than this one over <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>. <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw">#nature</a> <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw">#sunset</a> <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a></p>&mdash; US Department of the Interior (@Interior) <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw">May 5, 2014</a></blockquote>',
'author_id' => 2,
'votes' => 0,
'created_at' => '2019-12-15 21:14:03',
'updated_at' => '2019-12-15 21:14:03',
),
9 => 
array (
'id' => 64,
'name' => 'TEST 3',
'body' => '<script>alert(1); console.log("test")</script>',
'author_id' => 2,
'votes' => 0,
'created_at' => '2019-12-15 21:14:58',
'updated_at' => '2019-12-15 21:14:58',
),
10 => 
array (
'id' => 65,
'name' => 'asdasdasd',
'body' => 'asdasdasd',
'author_id' => 2,
'votes' => 0,
'created_at' => '2019-12-15 21:18:50',
'updated_at' => '2019-12-15 21:18:50',
),
));
        
        
    }
}