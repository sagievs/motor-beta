<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new \App\Page([
            'title' => 'Главная',
            'slug' => 'home'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'О компании',
            'slug' => 'about',
            'body' => '<p>
    Рады приветствовать Вас на сайте нашей компании, и будем надеяться, что Вы найдете у нас то, что ищите.</p>
<p>
    <strong>Позвольте нам рассказать немного о себе:</strong></p>
<p>
    На рынке Казахстана мы трудимся уже довольно давно, и за это время смогли зарекомендовать себя как успешно, динамично развивающаяся компания, с большим количеством довольных клиентов, которые теперь обслуживаются только у нас. Только у нас индивидуальный подход к каждому клиенту. Отличная команда из первоклассных специалистов не оставит Вас равнодушными!</p>
<p>
    Мы оказываем услуги по замену и продаже моторных масел таких известных всему миру брендов, как: Bardahl, Mitasu, Areca и многих других.</p>
<p>
    У нас так же вы найдете средства для ухода за своим автомобилем.</p>
<p>
    Цены у нас довольно таки демократичные, а это означает только одно - что обслуживаться у нас может абсолютно любой. Мы порадумем Вас качеством выполненных работ, сроком и конечно же ценами на них.</p>
<p>
    Мы находимся в центре города, что так же является нашим преимуществом. Доехать до нас очень просто. Всю подробную информацию Вы можете узнать, пройдя в раздел &quot;<a href="/contact">Контакты</a>&quot;.</p>
'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Услуги',
            'slug' => 'services'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Продукция',
            'slug' => 'catalog'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Галерея',
            'slug' => 'gallery'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Статьи',
            'slug' => 'news'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Контакты',
            'slug' => 'contact',
            'body' => '<table border="0" cellpadding="1" cellspacing="1" style="width: 100%">
    <tbody>
        <tr>
            <td>
                <p>
                    Республика Казахстан, г. Алматы, ул. Розыбакиева, 125/8 уг. Тимерязева</p>
                <p>
                    <strong>Контактные телефоны:</strong></p>
                <p>
                    +7 (727) 329 13 89</p>
                <p>
                    +7 (777) 090 54 34</p>
                <p>
                    +7 (777) 204 83 83</p>
                <p>
                    +7 (701) 111 72 19</p>
                <p>
                    <strong>Пишите нам:</strong></p>
                <p>
                    <a href="mailto:jumper_w@mail.ru">jumper_w@mail.ru</a></p>
                <p>
                    &nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=RGRgnuvs6-XjmR7xZHEnVKsTYA1rpOmx&width=100%&height=300"></script></td>
        </tr>
    </tbody>
</table>
<p>
    &nbsp;</p>'
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Доставка и оплата',
            'slug' => 'delivery',
            'body' => 'Идейные соображения высшего порядка, а также реализация намеченных плановых заданий способствует подготовки и реализации соответствующий условий активизации. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции требуют от нас анализа модели развития. Повседневная практика показывает, что дальнейшее развитие различных форм деятельности играет важную роль в формировании дальнейших направлений развития. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития. Не следует, однако забывать, что укрепление и развитие структуры способствует подготовки и реализации соответствующий условий активизации.',
            'ismain' => 0
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Скидки на все масла',
            'slug' => 'promo',
            'body' => '<p>
	Внимание Акция! На все масла скидка! Замена всех фильтров и моторного масла производится бесплатно! Замена масла и спецжидкостей на Японские и Европейские автомобили. Оригинальные масла в огромном ассортименте. Цены дилерские, ниже рыночных, звоните и сравните! Гарантируем! Прямые поставки!</p>
<p>
	&nbsp;</p>
<p>
	Компания предлагает широкий ассортимент масел и спецжидкости АКПП все ДОПУСКИ!</p>
<p>
	Фильтра масляных, воздушных, салона, топливные по приемлемым, доступным ценам.</p>
<p>
	Форма оплаты любая!</p>
<p>
	Продажа и профессиональная замена технических жидкостей ATF- WS, T-IV, LT, D-VI, Honda-Z1, Nissan matic C, D, J, CVT, NS-1, NS-2, NS-3, АКПП, CVT, CVT Toyota FE, SP-IV, DCG, МКПП, ГУР, тормозной жидкости, антифриза на современном оборудовании.</p>
<p>
	<strong>Мы находимся:</strong> Казахстан, Алматы, ул.&nbsp;Розыбакиева&nbsp;125/8&nbsp;уг. Тимирязева</p>
<p>
	Есть магазин оригинальных запасных частей. Амортизаторы, ремни, помпы, свечи, колодки, ходовая часть, моторная группа, вся топливная система.</p>
<p>
	<strong>Наши преимущества:</strong></p>
<p>
	- Все работы производятся на профессиональном оборудовании&nbsp;</p>
<p>
	- Работы выполняют первоклассные специалисты</p>
<p>
	- К каждому клиенту индивидуальный подход</p>
<p>
	- Предоставляем бухгалтерские документы</p>
<p>
	- Заключаем договоры с организациями</p>',
            'ismain' => 0
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Магазин',
            'slug' => 'magazin',
            'image' => 'public/uploads/20180207_120351_605.jpg',
            'type' => 'gallery',
            'ismain' => 0
        ]);
        $page->save();
        $page = new \App\Page([
            'title' => 'Склад',
            'slug' => 'sklad',
            'image' => 'public/uploads/20180207_120454_490.jpg',
            'type' => 'gallery',
            'ismain' => 0
        ]);
        $page->save();
    }
}
