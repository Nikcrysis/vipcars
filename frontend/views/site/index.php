<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->registerJsFile('@web/js/main.js');
$this->title = 'Автопрокат в Калиниграде';
?>

<section id="main" class="main">
<script>
    document.getElementById('main').style.height=window.innerHeight+'px';
</script>
    <div class="container" style="height: 100%;">
        <div class="main-title">
            <h1>Автопрокат в Калиниграде</h1>
        </div>
        <div class="row navigation">
        <div class="col-sm-5">
            <ul>
                <a href="#special"><li>Акции</li></a>
                <a href="#second"><li>Наш автопарк</li></a>
                <a href="#responses"><li>Отзывы клиентов</li></a>
                <a href="#about"><li>О нас</li></a>
            </ul>
        </div>
        </div>
        <div class="main-contacts container">
        <div class="row">
            <div class="col-xs-4">Vipcars_39@mail.ru</div>
            <div class="col-xs-4"><img class="img-responsive" style="height:20px;    margin: 0 auto;" src="<?= Url::to('@web/src/logo.png') ?>"></div>
            <div class="col-xs-4 text-right">+7 906 219 99 17</div>
        </div>
        </div>
    </div>
</section>

<section id="special" class="special">
    <div class="container">
        <h1 class="text-center">На эти автомобили действуют специальные цены: </h1>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail">
                  <img src="<?= Url::to('@web/src/special/3 Mersedes S500 LONG W221.jpg') ?>" alt="...">
                  <div class="caption">
                    <h3>Mersedes S500 W221</h3>
                    <ul>
                        <li>Цена: <strike>2000 руб/час</strike> от 1700 руб/час</li>
                        <li>Количество авто: 3</li>
                        <li>Количество мест: 4+1</li>
                        <li>Описание: Светлый салон; обогрев, охлаждение, массаж и регулировка всех сидений</li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail">
                  <img src="<?= Url::to('@web/src/special/1 bmw x5.jpg') ?>" alt="...">
                  <div class="caption">
                    <h3>BMW X5 E53</h3>
                    <ul>
                        <li>Цена: <strike>1100 руб/час</strike> от 800 руб/час</li>
                        <li>Количество авто: 9</li>
                        <li>Количество мест: 4+1</li>
                        <li>Описание: черный</li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail">
                  <img src="<?= Url::to('@web/src/special/2 lexus.jpg') ?>" alt="...">
                  <div class="caption">
                    <h3>Lexus RX330 </h3>
                    <ul>
                        <li>Цена: <strike>1400  руб/час</strike> от 1100  руб/час</li>
                        <li>Количество мест: 4+1</li>
                        <li>Описание: Бежевый салон </li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="second" class="second">
    <div class="container">
        <div class="navigation">
            <ul>
                <li class="col-xs-3"><a href="#main">Главная</a></li>
                <li class="col-xs-3"><a href="#responses">Отзывы</a></li>
                <li class="col-xs-3"><a href="#about">О нас</a></li>
                <li class="col-xs-3"><a href="#special">Акции</a></li>
            </ul>
        </div>
        <div class="row" id="cat_row"> 
        <div class="col-sm-9">
        <div id="cats">
        <h3 class="text-center">Выберите категорию</h3>
             <div class="col-sm-4 no-pad">
                <div id="sedan" class="sedan auto">
                    <div class="tbl">
                        <div class="tbl-cell">седаны</div>
                    </div>
                    <img class="img-responsive" src="<?= Url::to('@web/src/icons/sedan.png') ?>" alt="">
                </div>
                <div id="offroad" class="offroad auto">
                    <div class="tbl">
                        <div class="tbl-cell">внедорожники</div>
                    </div>
                    <img src="<?= Url::to('@web/src/icons/offroad.png') ?>" alt="">
                </div>
            </div>
            <div class="col-sm-8 no-pad">
                <div id="micro" class="micro auto">
                    <div class="tbl">
                        <div class="tbl-cell">микроавтобусы</div>
                    </div>
                    <img src="<?= Url::to('@web/src/icons/micro.png') ?>" alt="">
                </div>
                <div id="limo" class="limo auto">
                    <div class="tbl">
                        <div class="tbl-cell">лимузины</div>
                    </div>
                    <img src="<?= Url::to('@web/src/icons/limo.png') ?>" alt="">
                </div>
                <div id="cabri" class="cabri auto">
                    <div class="tbl">
                        <div class="tbl-cell">кабриолеты</div>
                    </div>
                    <img src="<?= Url::to('@web/src/icons/cabri.png') ?>" alt="">
                </div>
                <div id="retro" class="retro auto">
                    <div class="tbl">
                        <div class="tbl-cell">ретро</div>
                    </div>
                    <img src="<?= Url::to('@web/src/icons/retro.png') ?>" alt="">
                </div>
            </div>
            </div>
            <div id="cat" style="display:none;">
                <h3 class="text-center">Выберите авто</h3>
                <div id="autos" class="clearfix"></div>
            </div>

            <div id="item" style="display:none;">
            <h3 class="text-center">Просмотр фото</h3>
            <div id="auto_desc"></div>  
            <div id="close_item"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="0">

                  <ol class="carousel-indicators">
                  </ol>
                  
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active"><img class="img-responsive" src=""></div>
                  </div>



                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div> 
        <h3 class="text-center">Заполните форму заказа</h3>
        <div class="col-sm-3">
            <div class="form Scrollable">
                <form id="orderForm">
                    <p>Автомобиль:</p>
                  <select id="order_car_select" style="width:90%">
                      <option disabled>Выберите авто</option>
                      <?php foreach($cars as $car):?>
                      <option value = "<?= $car ?>"> 
                      <?= $car ?>
                      </option>
                  <?php endforeach;?>
                  </select>
                    <p>Имя: </p> <input type="input" name="name">
                    <p>Номер телефона:</p> <input type="phone" name="phone">
                    <p>День аренды автомобиля:</p> <input type="date" name="date">
                    <p>Это точная дата?</p>
                    <input type="radio" name="time" style="width:auto" value="yes"> Да<Br>
                    <input type="radio" name="time" style="width:auto" value="no"> Примерная<Br>
                </form>
            </div>
          <div class="button" onclick="OrderCar()" style="cursor:pointer">
              Заказать
            </div>
            </form>
        </div>
        </div>
    </div>
</section>

<section id="responses" class="responses">
    <div id="carousel-responses" class="carousel slide" data-ride="carousel" data-interval="0">

                  <!-- Wrapper for slides -->
                
                <div class="carousel-inner" role="listbox">
                    
                    <?php $i = 0; ?>
                    <?php foreach($responses as $response): ?>
                        <?php $i++; ?>
                        <div class="item clearfix <?php if ($i == 1) { echo 'active'; } ?>">
                        <div class="response"> 
                            <?= $response->text ?>
                        </div>
                        <a target="blank_" href="<?= $response->vk_id ?>"><img class="img-responsive  hidden-xs" src="<?= Url::to('@web/src/response/') . $response->photo_url ?>"></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-responses" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-responses" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
    </div>
</section>


<section id="about" class="about">
    <div class="container">
        
        <div class="col-sm-10 col-sm-offset-1">
            <h1>О Нас:</h1>
            <div class="about-us">
            В нашей компании Вы найдете огромный автопарк элитных авто
            в Калининграде.
            <ul>
                <li>Низкие цены без дополнительных надбавок на автомобили.</li>
                <li>Идеально обслуженные автомобили.</li>
                <li>Аккуратные водители.</li>
                <li>Более семи лет обслуживания свадеб на рынке.</li>
            </ul>
            Усли вам нужны красивые автомобили с водителями
            на торжественное мероприятие, свадьбу, vip-трансферы, 
            vip-такси, встречу делового партнера или просто для 
            поездки по достопримечательностям города
            Калининграда, вы можете арендовать у нас.
            </div>
        </div>
    </div>
    <div class="main-contacts container">
        <div class="row">
            <div class="col-xs-4">Vipcars_39@mail.ru</div>
            <div class="col-xs-4"><img class="img-responsive" style="height:20px;    margin: 0 auto;" src="<?= Url::to('@web/src/logo.png') ?>"></div>
            <div class="col-xs-4 text-right">+7 906 219 99 17</div>
        </div>
</section>