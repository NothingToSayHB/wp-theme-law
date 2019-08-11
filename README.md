хуки - ф-и который срабатывают в определенное событие и могут подцепить еще каку-юто
кастомную ф-ю

// важные ф-и
is_home() - проверяет явялется текущая страница блогом или нет (Blog page - true)
is_front_page() - проверяет главная ли это страница 
is_home - считает главной страницу где выводятся посты
is_front_page - считает главной страницу index 

add_action() - ф-я с помощью которой регистрируются хуки

//Подключалки

get_template_directory_uri() - ф-я возращает путь к папке с темой без слеша в конце
get_template_directory() - ф-я возвращает путь с диска (приминяется в локализации)
get_stylesheet_uri() - ищет в корне style.css

/ПОДКЛЮЧЕНИЕ СКРИПОВ И СТИЛЕЙ ПО УСЛОВИЕ [IF IE9]
wp_script_add_data()
wp_style_add_data()



wp_head()
wp_footer() - ф-и которые обязательно должно пресутсвивывать если нет то как минимум не
подключатся скрипты и стили как максимум не заработает не один плагин

// это чтобы переопределить скрипты что в комлпекте
wp_derigister_script('jquery') - ф-я для розегистрация скрипта напмриер jquery
wp_register_script('jquery', 'js/jquery.js') - зарегистрировать jquery
wp_enqueue_script('jquery'); - подключить
true - подключить в футере !


/////Посты 


add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 
'video', 'audio', 'chat'] );
добавляет поддежрку форматов для постов
get_post_type(); - вернет формат поста от этого можно стриоть условие

ВАЖНО!!!
get_template_part( 'template-parts/content', get_post_type() ); 
- вернет файл content-get_post_type() то есть то что вернет ф-я например если просто она
вернет фолс то get_template_part вернет просто content.php а если get_post_type()
вернет video то есть формат поста video то content-video.php так можно строить условия

/Коментарии
comments_number() - Выводит общее число комментариев записи (поста) 
get_comments_number() - тоже самое но возвращет число а не строку
За вывод коментариев отвечает спецыальная ф-я - comments-tamplate()
ф-я полгружает файл шаблона коментариев comments.php
comments_open() - проверяет открыт ли коментарии к данной статье
проверку на коментарии принято дделать таким образом:

if(comment_open() || get_comments_number()) {
comments_template();
}

comment_form() - ф-я настроек что принимает массив параметров где можно сменить кнопку 
отправить, редактировать поля и все такое важная ф-я настроек кароч

//цикл The Lopp для вывода постов


have_posts() - возарщает булевое и проверяет есть ли что-то что должно вывестись на этой
страниц 

the_post() - Устанавливает индексы поста в Цикле WP. Получает следующий пост, 
переопределяет глобальную переменную $post и устанавливает свойство in the loop в true.

<?php if (have_posts()):?>

    <?php while(have_posts()): ?>
        <?php the_post();?>
        <h3><?php the_title()?></h3>

	// ..........

    <?php endwhile; ?>

<?php else: ?>
    <p>Постов нет</p>
<?php endif; ?>

https://codex.wordpress.org/images/1/18/Template_Hierarchy.png - иеирархия шаблонов

the_post_thumbnail(); - вывести миниатюру 
has_post_thumbnail(); вернет тру или фолс в зависимости есть ли у поста миниатюра

add_image_size('some', 50 ,50); - подключить свой размер картинок

the_posts_pagination(); - вывести пагинацию

bloginfo() - возвращает данные о сайте (название сайта, описание.. тд..)

wp_get_document_title() - возвращает заголовок текущей страницы 
(то что между тегов <title><title/>) НО!!!!!!!!!!!!!!!!!!!!!
профи делаю так 

add_theme_support( 'title-tag' ); в functions.php

а в самом шаблоне тег title не пишется оно выведет само!

// Меню
Регистрация меню происходит в functions.php в хуке after_setup_theme например..
    register_nav_menus([
        'header-menu' => 'header menu1',
        'footer-menu' => 'footer menu1',
    ]);

в этом массиве перечисляются все меню что нужно зарегать

wp_nav_menu() - выводит меню 

класс Walker_Nav_Menu - класс где формируется меню его можно наследовать и его метод
start_el где можно добавить или убрать классы или изменить структуру меню
для этого нужно создать файл и наследовать класс и в свойство 'walker' => new Class
прописать свой класс:
wp_nav_menu([
    'theme_location'  => 'header-menu',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'navbarSupportedContent', 
    'menu_class'      => 'navbar-nav mr-auto', 
    'walker' => new Test_Menu(),
]);

// Поиск в вордпресс

get_serarch_form() - Подключает форму поиска, файл темы searchform.php


//Сайдбары

get_sidebar() - подключить файл sidebar.php

register_sidebar() - регистрация сайдбаров с помощью этой ф-и можно регать столько
сайдбаров сколько нужно и вызывать по индексу
вызывать нужно в хуке widgets_init
то есть add_action('widgets_init', 'моя ф-я');

dynamic_sidebar() - для того чтобы сайдбар вывелся то есть
dynamic_sidebar('right-sidbar') 
is_active_sidebar() - проверяет есть ли активные виджеты в сайдбаре на основе этой ф-и
можно делать условия разные..
is_active_sidebar('right-sidbar')

//Настройка кастюмайзера (встренные возможности)
все привязывать к хуку 'after_setup_theme'
/добавление логотипа 
add_theme_support( 'custom-logo', [
        'width' => 150,
        'height' => 40,
 ]);- 

вешается на хук 'after_setup_theme'
в шаблоне принято делать проверку на логотип 
has_custom_logo() - возвращает бул
the_custom_logo() - вывод логотипа

/Кастюмизация бекграунда страницы
к хуку 'after_setup_theme'
add_theme_support( 'custom-background', [
   'default-color' => 'fff',
   'default-image' => get_template_directory_uri() . '/assets/image/123.png',
]);
и после в body нужно вызвать ф-ю  <body <?php body_class();?>>

/кастюмайзер хедера (цвет и или изображение)
add_theme_support( 'custom-header', [
      'default-image' => get_template_directory_uri() . '/assets/image/123.png',
      'width' => 150,
      'height' => 40,
]);

echo get_custom_header()->url; - вывести в шаблоне (ссылка)


//Настройка кастюмайзера (кастомные штуки)/////////////////////
/ добавление в уже существующие секции
https://codex.wordpress.org/Theme_Customization_API
get_theme_mods() - получить весь кастюмайзер

регистрация своей секции черех хук 'customize_register'
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
}
add_action( 'customize_register', 'mytheme_customize_register' );

привязываемся к хуку и в ф-и пишутся свои секции ф-и настройки..
$wp_customize->add_setting - позволяет добавить свою настройку
$wp_customize->add_section - позволяет добавить свою секцию
$wp_customize->add_section - позволяет добавить элемент управления
пример:

$wp_customize->add_setting( 'header_textcolor' , array(
    'default'   => '#000000',
    'transport' => 'refresh',
) );


$wp_customize->add_section( 'mytheme_new_section_name' , array(
    'title'      => __( 'Visible Section Name', 'mytheme' ),
    'priority'   => 30,
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', 
array(
	'label'      => __( 'Header Color', 'mytheme' ),
	'section'    => 'your_section_id',
	'settings'   => 'your_setting_id',
) ) );


после того как добавиились настройки в кастюмайзер нужно их подключить чтобы ну что-то 
менялось на странице

function test_customize_css()
{
    ?>
         <style type="text/css">
             a { color: <?php echo get_theme_mod('test_link_color'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'test_customize_css');

//асинхронность 
'transport' - то как будет реагировать фрейм например перегружатся в реальном времени
для этого нужно с жс возится 'transport' => 'refresh' говорит что 
оно просто перезагрузится
при изменении 
чтобы это происходило асинхронно нужно добавить 
'transport'=>'postMessage' в свойства add_setting
то есть нужно создать файл js и ПРИВЯЗАТЬ его подключение НА ХУК 'customize_preview_init'
и джаваскрипт код который в доках есть

/создание своих секций
$wp_customize->add_section( 'mytheme_new_section_name' , array(
    'title'      => __( 'Visible Section Name', 'mytheme' ),
    'priority'   => 30,
) );

'priority' - приоритет секции то насколько высоко она будет отображатся в меню

ну и делие нужно сделать настройки add_setting и котролы add_control

get_theme_mod('имя настройки') - вывести в шаблоне


// Локализация сайта
прежде всего всегда нужно добавлять поддержку перевод иначе ф-и перевода 
работать не будут
load_theme_textdomain()
load_theme_textdomain() - ф-я которую нужно вешать на хук 'after_setup_theme'
параметрами нужно указать домен сайта и путь к папке с файлами перевода
то есть к папке languages

load_theme_textdomain('test', get_template_directory() . '/languages');

суперважно не забыть в файле style.css добавить коментарий: Text Domain: test

__() - сама ф-я перевода в которую нужно оборачивать статический текст
первым парметром строка что нужно переводить второй параметр домен
__('Читать далие', 'test')

/ создание файла перевода
для этого есть программа POEDIT

// Клас WP_Query
https://wp-kama.ru/function/wp_query
клас WP_Query нужен для пользовательской выборки данных
то есть делать свою кастомную выборку
Например вывести все посты по категории ид которой ровняется 21
и количество постов должно быть 3
<?php $queery = new WP_Query('cat=21&posts_per_page=3');
?>
<?php if ($queery->have_posts()):?>
<?php while($queery->have_posts()): $queery->the_post();?>
<h3><?php the_title();?></h3>
<?php endwhile;?>
<?php endif;?>

posts_per_page - количество выводимых постов
чтобы вывести все посты posts_per_page=-1
чтобы вывести посты еще одной рубрики просто через запятую 
указывается ид второй рубрики
cat=21,31
лучше передавать парметры в ввиду массива
$queery = new WP_Query([
    'category_name' => 'markup,edge-case-2',
    'posts_per_page' => -1,
    
]);
выборка по слагу

Важно!!!! 
После работы с этим классом нужно обязательно писать wp_reset_postdata();
которая вернет $post в правильном состоянии для повторного использования

// фреймворк Unyson
http://unyson.io/
чтобы костюмизировать фреймворк
нужно создать папку freamwork-costomizations
после в ней нужно создать папку extensions в ней папку shortcodes 
и в ней папку shortcodes
extensions->shortcodes->shortcodes 
и в неё скопировать папку sections из фреймворк который находится
plugins->unyson->freamwork->extensions->shortcodes->shortcodes->sections
и редактировать файл options.php который в section
в не добавляются кастомные настройки к примеру добавить возможности добавлять ид блоку
'custom_id' => array(
	'label' => __('Custom id', 'clean'),
	'type'  => 'text',
),

таким образом появится возможность добавлять ид секции билдера в админке

теперь чтобы это использовать в файле view.php есть шаблон секции 
что выведется там нужно 
добавить соответсвующие переменные

$container_id = ( isset( $atts['custom_id'] ) 
&& $atts['custom_id'] ) ? $atts['custom_id'] : '';

кароч то есть по сути нужно 1 раз создать папку freamwork-costomizations и дальше 
копировать туда все что нужно поменять фактически повторяю структуру что в плагине

то етсь если нужно например добавить возможности делать иконку ссылкой
то так же нужно найти файл с иконами
plugins->unyson->freamwork->extensions->shortcodes->shortcodes->icons
скопировать папку icons и засунуть её  
freamwork-costomizations->extensions->shortcodes->shortcodes->сюда папка

// Unyson костюмизация слайдера фреймворка
Костюмизация слайдера
так же как и в прошлый раз только нужно создать папку media рядом с shortcodes
кароч пример в теме law папка media... кароч там реально много и сложно 

// Контактая форма Unyson
по умолчанию работает синхронно то есть ужасно с перезагрузкой чтобы сделать 
её асинхронной

нужно:
сделать это через аякс очевидно так что в файле скрипта нужно сделать
(ВАЖНАЯ ИНФА wp_localize_script())
add_action( 'wp_enqueue_scripts', 'action_function_name_7714', 99 );
function action_function_name_7714(){
	wp_localize_script( 'jquery', 'object_name', array( 
		'some_string' => __( 'Some string to translate' ), 
		 'a_value' => '10' 
	) );
}

грубо говоря ф-я для того чтобы скрипт жс знал пути файлов в вордпрессе ф-я добавлять 
обьект в нужный скрипт с значенями путей таким образом прописывая в жс пути к файлам
он становится не зависимым
это может быть полезно для к примеру добавки лоадера при отправке формы например..


//Важно Unyson костюмизация апи настроек вп и другие фишки
http://manual.unyson.io/en/latest/options/introduction.html#content
насйтроки будут видны в внешний вид -> настройки темы точнее настройки темы появятся
после добавление в папку фреймворка папки theme->options->settings.php

ну и там как всегда в массив $options добавляются настройки
Для вывода в шаблоне опции fw_get_db_settings_option('название опции');
