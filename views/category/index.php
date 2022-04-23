<?php 
require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use App\Connection;
use App\Helpers;
use App\Helpers\Text;
use App\Model\Category;
use App\Model\Post;
use App\paginatedQuery;
use App\URL;
$pageTitle = "Mon blog";
$paginatedQuery = new paginatedQuery(
    "SELECT * FROM category",
    "SELECT COUNT(id) FROM category",
    Category::class, 
    4
);
$categories = $paginatedQuery->getItems();
$link = $router->url('home');
?>

<img class="mobile-only" src="img/banner.jpg" alt="banner" width="1920">
<div class="banner mobile-hidden"></div>

<section class="home-little-grid relative">
    <div class="card home-card-big stack">
        <div class="card__body stack">
            <h1 class="card__title">Bienvenue sur le site de solid<strong>ARU1</strong>
            </h1>
            <h2>
                Que vais-je trouver sur ce <strong>blog</strong> ?  
            </h2>
            <h4>
                Ici vous retrouverez tous les évenements se passant <br>
                dans l’athénée concernant la solidarité, comme par exemple <br>
                la semaine de la solidarité ou encore les shoeboxs.
            </h4>
        </div>
    </div>
    <div class="card home-card-little ">
        <div class="card__body stack">
            <h2 class="card__title">
                Comment ça <strong>fonctionne</strong> ? 
            </h2>
            <h4 class="silent">
                Ce site est en quelque sorte un journal des événements. 
                De nombreux posts vont être ajoutés au fil du temps pour en garder une trace.
                Dans ces posts il y aura du texte, photos, vidéos voire même documents.
            </h4>
        </div>
    </div>
    <svg class="welcome-mascott mobile-hidden" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 171.1 141.5" xml:space="preserve">
        <style type="text/css">
            .st0{fill:#40332C;}
            .st1{fill:#766458;}
            .st2{fill:#625247;}
            .st3{fill:#8C7A6D;}
            .st4{fill:#EDD8C4;}
            .st5{fill:#F3E7DC;}
            .st6{fill:#59525C;}
            .st7{fill:#342E31;}
            .st8{fill:#40332C;}
            .st9{fill:#010101;}
            .st10{fill:#FFFFFF;}
            .st11{fill:#4F292C;}
        </style>
        <path class="st0" d="M8.6,14.4c0,0-7.9-3.4-8.6-8.9c0,0-0.2-1.1,0.6-0.8c0.8,0.4,5.9,6.6,12.1,8.5C12.7,13.2,11,14.4,8.6,14.4"/>
        <path class="st0" d="M10.6,13.2c0,0-6.9-5.1-6.3-10.7c0,0,0-1.1,0.8-0.6c0.7,0.5,3.7,6.9,9.2,10.2C14.3,12.2,12.9,13.7,10.6,13.2"/>
        <path class="st0" d="M12.9,12.5c0,0-5.4-6.7-3.3-11.9c0,0,0.3-1.1,0.9-0.4C11.1,1,12.4,7.4,16.9,12C16.9,12,15,13.7,12.9,12.5"/>
        <path class="st1" d="M14.1,9.8c3.7,1.2,8,5.2,9.9,7.4c6,6.9,9.8,15.4,15.2,22.7c4.6,6.2,10.3,11.2,16.5,15.7
            c4.4,3.2,10.4,6,12.9,11.1c2.2,4.4,1.6,11.5-4.2,12.9c-18.7,4.3-37.1-17.6-45.3-30.9C13.7,40.1,6.7,25.3,7.9,14.6
            C8.5,9.6,11.1,8.8,14.1,9.8"/>
        <path class="st0" d="M162.5,14.4c0,0,7.9-3.4,8.6-8.9c0,0,0.2-1.1-0.6-0.8c-0.8,0.4-5.9,6.6-12.1,8.5
            C158.4,13.2,160.1,14.4,162.5,14.4"/>
        <path class="st0" d="M160.5,13.2c0,0,6.9-5.1,6.3-10.7c0,0,0-1.1-0.8-0.6c-0.7,0.5-3.7,6.9-9.2,10.2
            C156.8,12.2,158.2,13.7,160.5,13.2"/>
        <path class="st0" d="M158.2,12.5c0,0,5.4-6.7,3.3-11.9c0,0-0.3-1.1-0.9-0.4C160,1,158.7,7.4,154.2,12
            C154.2,12,156.1,13.7,158.2,12.5"/>
        <path class="st1" d="M157,9.8c-3.7,1.2-8,5.2-9.9,7.4c-6,6.9-9.8,15.4-15.2,22.7c-4.6,6.2-10.3,11.2-16.5,15.7
            c-4.4,3.2-10.4,6-12.9,11.1c-2.2,4.4-1.6,11.5,4.2,12.9c18.7,4.3,37.1-17.6,45.3-30.9c5.4-8.7,12.4-23.4,11.2-34.1
            C162.6,9.6,160,8.8,157,9.8"/>
        <path class="st0" d="M57.4,130.7c0,0-10.9,2-12.5,6.5c0,0-0.5,0.9,0.7,0.7c1.2-0.2,8.8-4.8,17.1-5.8C62.7,132.1,60.6,131,57.4,130.7
            "/>
        <path class="st0" d="M59.9,132.3c0,0-10.6,2.6-11.6,7.1c0,0-0.3,0.9,0.8,0.6c1.1-0.3,7.1-4.7,15.2-6.1
            C64.3,133.9,63,132.4,59.9,132.3"/>
        <path class="st0" d="M63.3,132.6c0,0-9.7,3.7-9.5,8.2c0,0-0.1,0.9,1,0.5c1-0.4,6.8-5.9,14.4-8.1C69.1,133.3,66.4,132.4,63.3,132.6"
            />
        <path class="st2" d="M70.7,132.1c1.2-2,0.2-4.4-0.3-6.4c-0.6-2.5-1.1-5.1-1.6-7.6c-1-5-1.7-10.1-1.5-15.1c0.4-8.7,7.3-18.1,1.5-26.7
            c-1.6-2.3-5-4.4-8.7-5.4c-2.7-0.8-5.5-0.7-8.2,0.2C34.8,76.9,36.8,92.9,39,103c0.9,4.1,11.7,32.1,27.7,31.4
            C69.1,134.2,70.2,133.1,70.7,132.1"/>
        <path class="st0" d="M111.7,130.7c0,0,10.9,2,12.5,6.5c0,0,0.5,0.9-0.7,0.7c-1.2-0.2-8.8-4.8-17.1-5.8
            C106.4,132.1,108.6,131,111.7,130.7"/>
        <path class="st0" d="M109.3,132.3c0,0,10.6,2.6,11.6,7.1c0,0,0.3,0.9-0.8,0.6c-1.1-0.3-7.1-4.7-15.2-6.1
            C104.9,133.9,106.1,132.4,109.3,132.3"/>
        <path class="st0" d="M105.9,132.6c0,0,9.7,3.7,9.5,8.2c0,0,0.1,0.9-1,0.5c-1-0.4-6.8-5.9-14.4-8.1
            C100,133.3,102.7,132.4,105.9,132.6"/>
        <path class="st2" d="M98.4,132.1c-1.2-2-0.2-4.4,0.3-6.4c0.6-2.5,1.1-5.1,1.6-7.6c1-5,1.7-10.1,1.5-15.1c-0.4-8.7-7.3-18.1-1.5-26.7
            c1.6-2.3,5-4.4,8.7-5.4c2.7-0.8,5.5-0.7,8.2,0.2c17.3,5.9,15.3,21.9,13.1,31.9c-0.9,4.1-11.7,32.1-27.7,31.4
            C100.1,134.2,99,133.1,98.4,132.1"/>
        <path class="st3" d="M115.9,36.5c0.1-0.4,0.1-0.6,0.1-0.6l1.5,0.5c-4.1-7.9-11.8-12.9-11.8-12.9l2.2,0.4c-4-5-13.4-7.6-13.4-7.6
            l1.5-1c-3.5-1.6-19.4-1.6-22.9,0l1.5,1c0,0-9.4,2.6-13.4,7.6l2.2-0.4c0,0-7.7,5-11.8,12.9l1.5-0.5c0,0,0,0.2,0.1,0.4
            c-8.6,13.6-13.9,31.2-13.9,46.3c0,29.4,20.2,45.7,45.2,45.7c25,0,45.2-16.4,45.2-45.7C129.8,67.6,124.5,50,115.9,36.5"/>
        <path class="st4" d="M112.5,109.6c0,12-12.5,18.7-28,18.7c-15.4,0-28-6.7-28-18.7c0-12,12.5-27.9,28-27.9
            C100,81.8,112.5,97.6,112.5,109.6"/>
        <path class="st5" d="M98.8,32.7c0.2,0.4,0.6,1.8,0.3,1.8c-2,0-4-0.6-5.6-1.8c0.2,0.7,0.4,2.5,0.3,2.5c-1.9,0-4.8-1.1-5.8-3
            c-0.8,1-2,1.9-3.1,2.3c-0.2,0.1-0.2-1.5-0.1-2c-2,1.5-4.6,2.3-6.7,1.8c-0.2-0.1,0.7-1.4,1-1.9c-2.9,1.9-6.7,2.8-10,2.7
            c-0.3,0,2.6-1.7,3.8-2.6c-10.6,0.9-18,3.6-18,10.6c0,9.4,13.3,23.2,29.8,23.2c16.4,0,29.8-13.8,29.8-23.2
            C114.3,36.5,108,33.8,98.8,32.7"/>
        <path class="st6" d="M93.5,51.2c0-2-4-3.2-8.9-3.2c-4.9,0-8.9,1.1-8.9,3.2c0,2,4,5.1,8.9,5.1C89.5,56.3,93.5,53.2,93.5,51.2"/>
        <path class="st7" d="M82.2,54.9c-0.1,0.2-0.8,0.1-1.6-0.2c-0.8-0.3-1.4-0.8-1.3-1c0.1-0.2,0.8-0.1,1.6,0.2
            C81.7,54.3,82.3,54.7,82.2,54.9"/>
        <path class="st7" d="M86.8,54.9c0.1,0.2,0.8,0.1,1.6-0.2c0.8-0.3,1.4-0.8,1.3-1c-0.1-0.2-0.8-0.1-1.6,0.2
            C87.2,54.3,86.7,54.7,86.8,54.9"/>
        <path class="st8" d="M67.6,52c3.5-2.3,13.5-4.8,14.4-9.6c0.5-3-4-4.7-6.1-4.9c-2.9-0.3-6-0.1-8.8,0.7c-4.3,1.1-8.9,3.3-12.2,6.6
            c0.6,4,3.3,8.5,7.4,12.4C63.8,55,65.6,53.3,67.6,52"/>
        <path class="st8" d="M114.1,45.4c-3.3-3.7-8.3-6.2-12.9-7.4c-2.8-0.7-5.9-1-8.8-0.7c-2,0.2-6.6,2-6.1,4.9c0.9,4.8,10.9,7.4,14.4,9.6
            c2.2,1.4,4.1,3.3,5.5,5.6C110.4,53.8,113.3,49.4,114.1,45.4"/>
        <path class="st9" d="M74.2,42.8c0,1.6-1.3,3-3,3c-1.6,0-3-1.3-3-3c0-1.6,1.3-3,3-3C72.9,39.9,74.2,41.2,74.2,42.8"/>
        <path class="st10" d="M71,41.9c0,0.5-0.4,0.9-0.9,0.9c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9C70.6,41,71,41.4,71,41.9"/>
        <path class="st10" d="M70,43.9c0,0.2-0.2,0.4-0.4,0.4c-0.2,0-0.4-0.2-0.4-0.4c0-0.2,0.2-0.4,0.4-0.4C69.8,43.5,70,43.6,70,43.9"/>
        <path class="st9" d="M100.9,42.8c0,1.6-1.3,3-3,3c-1.6,0-3-1.3-3-3c0-1.6,1.3-3,3-3C99.5,39.9,100.9,41.2,100.9,42.8"/>
        <path class="st10" d="M97.7,41.9c0,0.5-0.4,0.9-0.9,0.9c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9C97.3,41,97.7,41.4,97.7,41.9"
            />
        <path class="st10" d="M96.6,43.9c0,0.2-0.2,0.4-0.4,0.4c-0.2,0-0.4-0.2-0.4-0.4c0-0.2,0.2-0.4,0.4-0.4
            C96.5,43.5,96.6,43.6,96.6,43.9"/>
        <path class="st11" d="M81.1,59.8c-0.2,0-0.4,0-0.6,0c-3.3-0.3-4.1-4.1-4.1-4.2c0-0.1,0-0.1,0.1-0.1c0.1,0,0.1,0,0.1,0.1
            c0,0,0.8,3.7,3.9,4c3.1,0.3,3.8-1.5,3.9-1.6c0-0.1,0.1-0.1,0.2-0.1c0.1,0,0.1,0.1,0.1,0.2C84.5,58.1,83.8,59.8,81.1,59.8"/>
        <path class="st11" d="M87.8,59.8c-2.7,0-3.4-1.7-3.5-1.8c0-0.1,0-0.1,0.1-0.2c0.1,0,0.1,0,0.2,0.1c0,0.1,0.8,1.9,3.9,1.6
            c3.1-0.3,3.9-3.9,3.9-4c0-0.1,0.1-0.1,0.1-0.1c0.1,0,0.1,0.1,0.1,0.1c0,0-0.8,3.9-4.1,4.2C88.2,59.7,88,59.8,87.8,59.8"/>
    </svg>
</section>


<section class="event">
    <div class="header-section flex">
        <h2 id="event">Voici les différents <strong>thèmes</strong></h2>
        <p class="mobile-hidden">Mis à jour le 02/03/2022</p>
    </div>
    <div class="big-grid-event">
        <?php foreach($categories as $category): ?>
            <?php require VIEW_PATH . '/category/card.php'; ?>
        <?php endforeach ?>
    </div>

    <div class="footer-links">
        <?= $paginatedQuery->previousLink($link) ?>
        <?= $paginatedQuery->nextLink($link) ?>
    </div>
</section>





