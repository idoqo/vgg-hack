<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Quest – @yield('title', "A Questions and Answers Platform")</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="/" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/skins/skins.css">
  <link rel="stylesheet" href="/css/responsive.css">
  <link rel="shortcut icon" href="images/favicon.png">

</head>
<body>
<div id="wrap" class="grid_1200">
  <div class="panel-pop" id="lost-password">
    <h2>Lost Password<i class="icon-remove"></i></h2>
    <div class="form-style form-style-3">
      <p>Lost your password? Please enter your Matric No and email address. You will receive a link to create a new password via email.</p>
      <form>
        <div class="form-inputs clearfix">
          <p>
            <label class="required">Matric No<span>*</span></label>
            <input type="text">
          </p>
          <p>
            <label class="required">E-Mail<span>*</span></label>
            <input type="email">
          </p>
        </div>
        <p class="form-submit">
          <input type="submit" value="Reset" class="button color small submit">
        </p>
      </form>
      <div class="clearfix"></div>
    </div>
  </div><!-- End lost-password -->

  @if (auth()->user() !== null)
  <div class="panel-pop" id="signup" style="overflow: auto; height: 300px;">
    <h2>List of Courses<i class="icon-remove"></i></h2>
    <div class="form-style form-style-3">
        <form action="{{route('user.update-courses')}}" method="post">
        @if (\App\Models\Course::all() != null)
          @foreach (\App\Models\Course::all() as $course)
            @php
            $subs = [];
            $subscribedCourses = \App\Models\UsersCourse::where('user_id', '=', auth()->user()->id)->get();
            if ($subscribedCourses != null) {
              $subs = $subscribedCourses->pluck('course_id')->first;
            }
            @endphp
            <li class="related-item button" style="color: black;">
                <input type="checkbox" name="courses[]" value="{{$course->id}}" />
              {{$course->code}}
            </li>
          @endforeach
        @endif
          {{csrf_field()}}
      <input type="submit" class="load-questions" value="Save" />
        </form>
    </div>
  </div><!-- End signup -->
  @endif


  <div id="header-top">
    <section class="container clearfix">
      <nav class="header-top-nav">
        <ul>
          <li><a href="#"><i class="icon-headphones"></i>Support</a></li>
        </ul>
      </nav>
      <div class="header-search">
        <form>
          <input type="text" value="Search here ..." onfocus="if(this.value=='Search here ...')this.value='';" onblur="if(this.value=='')this.value='Search here ...';">
          <button type="submit" class="search-submit"></button>
        </form>
      </div>
    </section><!-- End container -->
  </div><!-- End header-top -->
  <header id="header" class="index-no-box">
    <section class="container clearfix">
      <div class="logo"><a href="/">Quest</a></div>
      <nav class="navigation">
        <ul>
          <li class="current_page_item"><a href="/">Home</a>
          </li>
          <li class="ask_question"><a href="{{route('ask')}}">Ask Question</a></li>
          <li><a href="{{route('questions')}}">Questions</a></li>
          <li>
          @if (auth()->user() == null)
            <a href="{{route('login')}}">Login</a>
          @else
            <a href="{{route('user.profile')}}">Account</a>
              @endif
          </li>
        </ul>
      </nav>
    </section><!-- End container -->
  </header><!-- End header -->

  @yield('content')

  <footer id="footer">
    <section class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="widget widget_contact">
            <h3 class="widget_title">Quest?</h3>
            <p>An Online collaborative platform for students to collaborate. Asking, answering questions and earn points</p>
            <ul>
              <li>
                <span>Support :</span>Support Telephone No : 08145485678
              </li>
              <li>Support Email Account : quests@example.com</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget">
            <h3 class="widget_title">Quick Links</h3>
            <ul>
              <li><a href="/">Home</a></li>
              <li><a href="{{route('ask')}}">Asked Question</a></li>
              <li><a href="#">About</a></li>
              <li><a href="{{route('questions')}}">Questions</a></li>
              <li><a href="{{route('user.profile')}}">Accounts</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">

        </div>
      </div><!-- End row -->
    </section><!-- End container -->
  </footer><!-- End footer -->
  <footer id="footer-bottom">
    <section class="container">
      <div class="copyrights f_left">Copyright 2019 | Quest <a href="#">By TeamQuest</a></div>
    </section><!-- End container -->
  </footer><!-- End footer-bottom -->
</div><!-- End wrap -->

<div class="go-up"><i class="icon-chevron-up"></i></div>

<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/jquery.easing.1.3.min.js"></script>
<script src="js/html5.js"></script>
<script src="js/twitter/jquery.tweet.js"></script>
<script src="js/jflickrfeed.min.js"></script>
<script src="js/jquery.inview.min.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/tabs.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/tags.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/custom.js"></script>
<!-- End js -->

</body>

</html>