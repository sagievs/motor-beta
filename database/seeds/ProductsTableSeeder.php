<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'title' => 'BARDAHL ATF S 167',
            'image' => 'public/uploads/20150914_145402_782.png',
            'thumbnail' => '20150914_145402_782.png',
            'price' => '5000',
            'category_id' => 4,
            'ismain' => 1,
            'ishit' => 1,
            'body' => '<p>
    Синтетическое масло для автоматической коробки передач</p>
<p>
    Применение:Это масло может использоваться во всех автоматических коробках передач, в соответствии с допусками Dexron III-H, Mercon V или Allison C-4.<br>
    Спецификация:Dexron II, III-H, Mercon V and Allison C-4.<br>
    Toyota T, T-III, T-IV, WS<br>
    Honda Z1<br>
    Hyundfai/Kia/Misubishi SP-II, Sp-III<br>
    Nissanmatic D,J and K<br>
    Mercedes Bezn 236.1/.2/.5/.6/.7/.9/.10<br>
    BMW 7045E, LA2634,LT 71141<br>
    VW/Audi G-052-025-A2, G-052-162-A1<br>
    Volvo 97340<br>
    Свойства:Предотвращает коррозию и образование нагара.</p>
<ul>
    <li>
        Совместимый со всеми герметизирующими материалами, используемые в автоматических коробках передач.</li>
    <li>
        Дает быстрое и качественное смазывание при любых температурах.</li>
    <li>
        Имеет превосходные антиизносные свойства, продлевая ресурс замены масла, в автоматической коробке передач уменьшая износ всех деталей АКПП</li>
    <li>
        Благодаря использованию антиизносных добавок гарантируется плавное переключение АКПП.</li>
</ul>
<p>
    <br>
    <strong>Типичный анализ:</strong><br>
    <br>
    Density at 15°C 0.85<br>
    Viscosity at 40°C / cSt 35<br>
    Viscosity at 100°C / cSt 7.9<br>
    Viscosity index 209<br>
    Flash point °C 187<br>
    Pour point °C -46<br>
    Colour Red</p>'
        ]);
        $product->save();
        $product = new \App\Product([
            'title' => 'BARDAHL ATF D III',
            'image' => 'public/uploads/20150914_154244_920.png',
            'thumbnail' => '20150914_154244_920.png',
            'price' => '8000',
            'category_id' => 4,
            'ismain' => 1,
            'body' => '<p>
    ATF специально разработана для использования в АКПП легковых автомобилей, фургонах и малотоннажных грузовиках.</p>
<p>
    Применение:Везде где рекомендуется DEXRON III, DEXRON II-E, DEXRON II, DEXRON Type 4.Также рекомендуется допусками MERCON, M2C138-CJ or M2C166-H.Применяется во всех АКПП разработанных концерном GM. А также используется с допусками Allison C-4.Может использоваться в гидравлических и компрессорных системах где требуется превосходная текучесть при низких температурах.</p>
<p>
    Спецификация- Dexron III G-34014 MB 236.9</p>
<ul>
    <li>
        Ford Mercon M940209 VOITH</li>
    <li>
        Allison C-4 20952194 Dextron Type 4</li>
</ul>
<p>
    Свойства Совместимость с наиболее используемыми спецификациями жидкостей АКПП.<br>
    Сопротивление окисления: Продукт специально разработан на основе высококачественных базовых масел плюс специальные добавки, которые минимизируют ухудшение свойств жидкости во время использования.<br>
    Улучшенная низкотемпературная текучесть: Превосходная защита против изнашивания во время холодных эксплутационных режимах.Чистота трансмиссионной передачи: Добавки препятствуют формированию осадка жидкости который ухудшает работу тонких распределительных каналов.<br>
    Индекс вязкости: Превосходная работа в широких температурных диапазонах возможна с помощью высокого VI класса сырой нефти наряду с устойчивым VI классом улучшителем.<br>
    <br>
    <strong>Типичный анализ:</strong><br>
    <br>
    Density at 15°C 0.865<br>
    Viscosity at 40°C / cSt 33<br>
    Viscosity at 100°C / cSt 7.5<br>
    Viscosity at -40°C / cP 15500<br>
    Viscosity index 197<br>
    Flash point °C 190<br>
    Pour point °C -48<br>
    Colour red</p>'
        ]);
        $product->save();
        $product = new \App\Product([
            'title' => 'BARDAHL 10W60 XTC',
            'image' => 'public/uploads/20150914_145211_148.png',
            'thumbnail' => '20150914_145211_148.png',
            'price' => '3000',
            'category_id' => 4,
            'ismain' => 1,
            'ishit' => 1,
            'body' => '<p>
    Высококачественное синтетическое моторное масло, специально разработано для наиболее требовательных рабочих обстоятельств двигателя . Высококачественные смазывающие свойства даже в случае чрезвычайно высоких окружающих температур.</p>
<p>
    Применение:Рекомендуется для бензиновых двигателей используемых для гонок и/или при высоких температурах окружающей среды. с и без турбонадува и/или мультиклапоновой и переменно- клапановой системы выхлопа . Также рекомендуется для (турбо) дизельных двигателей легковых автомобилей, особенно в случае высоких окружающих температур. Рекомендуется для мотоциклов с 4 тактным двигателем как гоночное масло.</p>
<p>
    Спецификация: - API SМ/CF</p>
<ul>
    <li>
        CCMC G5/PD2</li>
    <li>
        SAE 10W60</li>
</ul>
<p>
    Свойства -Вязкая смазка масла образующая прочную масленую пленку, сопротивляющуюся износу при высоких рабочих температурах, а при низких температурах обладает превосходной текучести.</p>
<ul>
    <li>
        Уменьшение трения дает экономию топлива и лучшую динамику работы двигателя.</li>
    <li>
        Содержит двигатель внутри идеально чистым.</li>
    <li>
        Совместимость выхлопного газа.</li>
    <li>
        Уменьшение токсичности выхлопного газа.</li>
    <li>
        Превосходная защита двигателя.</li>
</ul>
<p>
    <strong>Типичный анализ :</strong><br>
    <br>
    density at 15°C 0.851<br>
    viscosity at 40°C / cSt 160<br>
    viscosity at 100°C / cSt 23.5<br>
    viscosity at -25°C / cP &lt;7000<br>
    viscosity index 180<br>
    flash point °C 240<br>
    pour point °C &lt;-40<br>
    TBN mg KOH/g 9<br>
    colour 3.5</p>'
        ]);
        $product->save();
        $product = new \App\Product([
            'title' => 'BARDAHL 10W40 XTC',
            'image' => 'public/uploads/20150914_145402_782.png',
            'thumbnail' => '20150914_145402_782.png',
            'price' => '5000',
            'category_id' => 4,
            'ismain' => 1,
            'body' => '<p>
    Синтетическое масло для автоматической коробки передач</p>
<p>
    Применение:Это масло может использоваться во всех автоматических коробках передач, в соответствии с допусками Dexron III-H, Mercon V или Allison C-4.<br>
    Спецификация:Dexron II, III-H, Mercon V and Allison C-4.<br>
    Toyota T, T-III, T-IV, WS<br>
    Honda Z1<br>
    Hyundfai/Kia/Misubishi SP-II, Sp-III<br>
    Nissanmatic D,J and K<br>
    Mercedes Bezn 236.1/.2/.5/.6/.7/.9/.10<br>
    BMW 7045E, LA2634,LT 71141<br>
    VW/Audi G-052-025-A2, G-052-162-A1<br>
    Volvo 97340<br>
    Свойства:Предотвращает коррозию и образование нагара.</p>
<ul>
    <li>
        Совместимый со всеми герметизирующими материалами, используемые в автоматических коробках передач.</li>
    <li>
        Дает быстрое и качественное смазывание при любых температурах.</li>
    <li>
        Имеет превосходные антиизносные свойства, продлевая ресурс замены масла, в автоматической коробке передач уменьшая износ всех деталей АКПП</li>
    <li>
        Благодаря использованию антиизносных добавок гарантируется плавное переключение АКПП.</li>
</ul>
<p>
    <br>
    <strong>Типичный анализ:</strong><br>
    <br>
    Density at 15°C 0.85<br>
    Viscosity at 40°C / cSt 35<br>
    Viscosity at 100°C / cSt 7.9<br>
    Viscosity index 209<br>
    Flash point °C 187<br>
    Pour point °C -46<br>
    Colour Red</p>'
        ]);
        $product->save();
        $product = new \App\Product([
            'title' => 'BARDAHL 5W30 XTC',
            'image' => 'public/uploads/20150914_154244_920.png',
            'thumbnail' => '20150914_154244_920.png',
            'price' => '2000',
            'category_id' => 4,
            'ismain' => 1,
            'ishit' => 1,
            'body' => '<p>
    ATF специально разработана для использования в АКПП легковых автомобилей, фургонах и малотоннажных грузовиках.</p>
<p>
    Применение:Везде где рекомендуется DEXRON III, DEXRON II-E, DEXRON II, DEXRON Type 4.Также рекомендуется допусками MERCON, M2C138-CJ or M2C166-H.Применяется во всех АКПП разработанных концерном GM. А также используется с допусками Allison C-4.Может использоваться в гидравлических и компрессорных системах где требуется превосходная текучесть при низких температурах.</p>
<p>
    Спецификация- Dexron III G-34014 MB 236.9</p>
<ul>
    <li>
        Ford Mercon M940209 VOITH</li>
    <li>
        Allison C-4 20952194 Dextron Type 4</li>
</ul>
<p>
    Свойства Совместимость с наиболее используемыми спецификациями жидкостей АКПП.<br>
    Сопротивление окисления: Продукт специально разработан на основе высококачественных базовых масел плюс специальные добавки, которые минимизируют ухудшение свойств жидкости во время использования.<br>
    Улучшенная низкотемпературная текучесть: Превосходная защита против изнашивания во время холодных эксплутационных режимах.Чистота трансмиссионной передачи: Добавки препятствуют формированию осадка жидкости который ухудшает работу тонких распределительных каналов.<br>
    Индекс вязкости: Превосходная работа в широких температурных диапазонах возможна с помощью высокого VI класса сырой нефти наряду с устойчивым VI классом улучшителем.<br>
    <br>
    <strong>Типичный анализ:</strong><br>
    <br>
    Density at 15°C 0.865<br>
    Viscosity at 40°C / cSt 33<br>
    Viscosity at 100°C / cSt 7.5<br>
    Viscosity at -40°C / cP 15500<br>
    Viscosity index 197<br>
    Flash point °C 190<br>
    Pour point °C -48<br>
    Colour red</p>'
        ]);
        $product->save();
        $product = new \App\Product([
            'title' => 'BARDAHL 5W40 XTC',
            'image' => 'public/uploads/20150914_145211_148.png',
            'thumbnail' => '20150914_145211_148.png',
            'price' => '9000',
            'category_id' => 4,
            'ismain' => 1,
            'ishit' => 1,
            'body' => '<p>
    Высококачественное синтетическое моторное масло, специально разработано для наиболее требовательных рабочих обстоятельств двигателя . Высококачественные смазывающие свойства даже в случае чрезвычайно высоких окружающих температур.</p>
<p>
    Применение:Рекомендуется для бензиновых двигателей используемых для гонок и/или при высоких температурах окружающей среды. с и без турбонадува и/или мультиклапоновой и переменно- клапановой системы выхлопа . Также рекомендуется для (турбо) дизельных двигателей легковых автомобилей, особенно в случае высоких окружающих температур. Рекомендуется для мотоциклов с 4 тактным двигателем как гоночное масло.</p>
<p>
    Спецификация: - API SМ/CF</p>
<ul>
    <li>
        CCMC G5/PD2</li>
    <li>
        SAE 10W60</li>
</ul>
<p>
    Свойства -Вязкая смазка масла образующая прочную масленую пленку, сопротивляющуюся износу при высоких рабочих температурах, а при низких температурах обладает превосходной текучести.</p>
<ul>
    <li>
        Уменьшение трения дает экономию топлива и лучшую динамику работы двигателя.</li>
    <li>
        Содержит двигатель внутри идеально чистым.</li>
    <li>
        Совместимость выхлопного газа.</li>
    <li>
        Уменьшение токсичности выхлопного газа.</li>
    <li>
        Превосходная защита двигателя.</li>
</ul>
<p>
    <strong>Типичный анализ :</strong><br>
    <br>
    density at 15°C 0.851<br>
    viscosity at 40°C / cSt 160<br>
    viscosity at 100°C / cSt 23.5<br>
    viscosity at -25°C / cP &lt;7000<br>
    viscosity index 180<br>
    flash point °C 240<br>
    pour point °C &lt;-40<br>
    TBN mg KOH/g 9<br>
    colour 3.5</p>'
        ]);
        $product->save();
    }
}
