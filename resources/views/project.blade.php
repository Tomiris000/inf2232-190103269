<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="{{asset('/css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />

  <title>Webka</title>
</head>

<body>
  <header>
    <div class="container">
      <div class="header">
        <img onclick="openMenu()" class="menu_icon" src="images/menu.png" alt="" />
        <nav>
          <a href="" class="nav_link">{{__('lang.hotel')}}</a>
          <a href="" class="nav_link">{{__('lang.price')}}</a>
          <a href="" class="nav_link">{{__('lang.fly')}}</a>
          <a href="" class="nav_link">{{__('lang.contuct')}}</a>
        </nav>
        <div class="links">
          <a href="/en">EN</a>
          <a href="/ru">RU</a>
        </div>

        <span style="height: 100%; display: flex; align-items: center">
          <a onclick="openSignup()" class="nav_link">{{__('lang.sign')}}</a>
          <a onclick="openLogin()" class="nav_link">{{__('lang.log')}}</a>
          <img onclick="home()" class="icon" src="images/globe.png" alt="" />
        </span>
      </div>
      <nav class="display_none hide_menu">
        <a href="" class="nav_link">{{ __('main.hotels')}}</a>
        <a href="" class="nav_link">Price</a>
        <a href="" class="nav_link">Flights</a>
        <a href="" class="nav_link">Contact us</a>
      </nav>
    </div>
  </header>

  <script>
    function openMenu() {
      if (
        !document
        .querySelector(".hide_menu")
        .classList.contains("display_none")
      ) {
        document.querySelector(".hide_menu").classList.add("display_none");
      } else {
        document.querySelector(".hide_menu").classList.remove("display_none");
      }
    }
  </script>

  <section>
    <div class="main">
      <h1 class="intro_title">
        {{__('lang.search')}}
      </h1>
      <div class="search_div">
        <span class="search_span">
          <span>
            <input class="inp" type="text" size="100" height="100px" placeholder={{__('lang.where')}} />
          </span>
          <span>
            <input class="cal" type="date" id="davaToday" />
            <a href="#search_result" onclick="opensearchresult()" class="search">{{__('lang.submit')}}</a>
          </span>
        </span>
      </div>
    </div>
  </section>

  <div class="search_result" id="search_result"></div>
  <div class="YMapsID display_none">
    <div id="YMapsID" class="display_none" style="width: 500px; height: 500px"></div>
    <span><img class="close_map" src="images/close.png" alt="" onclick="close_map()" /></span>
  </div>

  <section class="cards_section">
    <div class="container">
      <div class="inner_cards_section">
        <div class="card_section">
          <span>
            <img class="card_img" src="images/svyataya_sofiya.jpg" alt="">
          </span>
          <span class="title">
            {{__('lang.turkish')}}
          </span>
          <span class="price_card">
            {{__('lang.pr1')}}
          </span>
        </div>
        <div class="card_section">
          <span>
            <img class="card_img" src="images/piramida-heopsa.jpg" alt="">
          </span>
          <span class="title">
            {{__('lang.egypt')}}
          </span>
          <span class="price_card">
            {{__('lang.pr2')}}
          </span>
        </div>
        <div class="card_section">
          <span>
            <img class="card_img" src="images/dostoprimechatelnosty-ssha.jpg" alt="">
          </span>
          <span class="title">
            {{__('lang.america')}}
          </span>
          <span class="price_card">
            {{__('lang.pr3')}}
          </span>
        </div>
      </div>
    </div>
  </section>


  <div class="upload" style="    display: flex;
    margin-top: 200px;
    margin-left: 420px;">
    <form method="POST" action="upload" enctype="multipart/form-data">
      @csrf
      <input>
      <button>
        <a href="/mail">Отправить</a>
      </button>
      <input type="file" name="file" /><br> <br>
      <!-- <button type="submit" name="submit">Upload</button> -->
      <input type="submit" value="Submit"></input>

    </form>
  </div>


  <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
  <script></script>
  <footer>
    <div class="container">
      <div class="footer">
        <div class="left_side">
          <span class="asdf">
            <span>
              <img class="icon" src="images/gps.png" alt="">
            </span>
            <span>
              <a> {{__('lang.street')}}</a>
              <h3>{{__('lang.paris')}}</h1>
            </span>
          </span>
          <span class="asdf">
            <span>
              <img class="icon" src="images/phone.png" alt="">
            </span>
            <span>
              <h3>+7 777 777 77 77</h1>
            </span>
          </span>
          <span class="asdf">
            <span>
              <img class="icon" src="images/mail.png" alt="">
            </span>
            <span>
              <h3>support@company.com</h1>
            </span>
          </span>
        </div>
        <div class="right_side">
          <div>
            <h3> {{__('lang.about')}}</h3>
            <a> {{__('lang.lll')}}</a>
          </div>
          <div class="icons">
            <span class="icon">
              <img class="icon" src="images/instagram.png" alt="" />
            </span>
            <span class="icon">
              <img class="icon" src="images/facebook.png" alt="" />
            </span>
            <span class="icon">
              <img class="icon" src="images/twitter.png" alt="" />
            </span>
            <span class="icon">
              <img class="icon" src="images/youtube.png" alt="" />
            </span>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <form action="index.html" method="GET">
    <div class="sign_up display_none">
      <div id="sign_up">
        <h1>{{__('lang.sign')}}</h1>
        <img onclick="close_signup()" class="close_signup" src="images/close.png" alt="" />
        <div class="form">
          <label for="login">{{__('lang.loog')}}</label>
          <input type="text" name="login" id="login" />
        </div>
        <div class="form">
          <label for="password">{{__('lang.password')}}</label>
          <input type="password" name="password" id="password" />
        </div>
        <div style="display: flex; justify-content: space-between; width: 80%">
          <a onclick="open_to_login()" class="open_to_signup">{{__('lang.dont')}}</a>
          <a id="yes1" class="submit submit_login display_none" onclick="signup()">{{__('lang.sub')}}</a>
          <a id="no1" class="submit submit_login no">{{__('lang.sub')}}</a>
        </div>
      </div>
    </div>
  </form>

  <form action="index.html" method="GET">
    <div class="log_in display_none">
      <div id="sign_up">
        <h1>{{__('lang.log')}}</h1>
        <img onclick="closeLogin()" class="close_signup" src="images/close.png" alt="" />
        <div class="form">
          <label for="name">{{__('lang.name')}}</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="form">
          <label for="surname">{{__('lang.sur')}}</label>
          <input type="text" name="surname" id="surname" />
        </div>
        <div class="form"></div>
        <div class="form">
          <label for="email">{{__('lang.mail')}}</label>
          <input type="email" name="email" id="email" />
        </div>
        <div class="form">
          <label for="login1">{{__('lang.loog')}}</label>
          <input type="text" name="login" id="login1" />
        </div>
        <div class="form">
          <label for="password1">{{__('lang.password')}}</label>
          <input type="password" name="password" id="password1" />
        </div>
        <div class="form">
          <label for="repeat1">{{__('lang.repeat')}}</label>
          <input type="password" name="repeat" id="repeat1" />
        </div>
        <div style="display: flex; justify-content: space-between; width: 80%">
          <a onclick="open_to_signup()" class="open_to_signup">{{__('lang.alread')}}</a>
          <a id="yes" class="submit submit_login display_none" onclick="registration()">{{__('lang.submit')}}</a>
          <a id="no" class="submit submit_login no">{{__('lang.sub')}}</a>
        </div>
      </div>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="{{asset('/js/main.js')}}"></script>
  <script src="{{asset('/js/user.js')}}"></script>

</body>

</html>