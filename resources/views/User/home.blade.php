 <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Notification System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>Notify</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#service">Services</a></li>
                      @if (Route::has('login'))
                      @auth 
                      <li class="scroll-to-section"><a href="#appointment">My Subscription</a></li>
                      <x-app-layout>
                      </x-app-layout>
                      @else 
                      <li class="scroll-to-section"><a href="{{route('login')}}">Log In</a></li>
                      <li class="scroll-to-section"><a href="{{route('register')}}">Register Now!</a></li>
                      @endauth
                      @endif
                  </ul>   
                    
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>

 

  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                  x
                </button>
                   {{session()->get('message')}}
              </div>
            @endif
              <div class="header-text">
                <span class="category">Our Services</span>
                <h2>With Notification System, Everything Is Easier</h2>
                <p>Notify is free website to offer your our valuable services as well as keep track of your appointments.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="#">Welcome</a>
                  </div>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's Notification System?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>Get the best result out of your effort</h2>
                <p>You are allowed to use this template for any educational or commercial purpose. You are not allowed to re-distribute the template ZIP file on any other website.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="#">Request Demo</a>
                  </div>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's the best result?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Online Learning</span>
                <h2>Online Learning helps you save the time</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious incididunt ut labore et dolore magna aliqua suspendisse.</p>
                <div class="buttons">
                  <!-- <div class="main-button">
                    <a href="#">Request Demo</a>
                  </div> -->
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-play"></i> What's Notification System?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


   <!--services-->
  <div class="services section" id="service">
    <div class="container">
      <div class="row">
        
@foreach($service as $services)
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="assets/images/service-01.png" alt="online degrees">
            </div>
            <div class="main-content">
              <h4>{{$services->service_name}}</h4>
              <p>{{$services->service_description}}</p>
              <p class="text-danger">{{$services->price}}</p>
              <div class="main-button">
                @if (Route::has('login'))
                @auth
                <div class="scroll-to-section">
                  <a href="#contact">Subcribe</a>
                </div>
                @else
                <a href="#">Log In to Subcribe</a>
                @endauth
                @endif

              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

      
  

  
<!--contact-->
  @if (Route::has('login'))
  @auth
  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h6>Contact Us</h6>
            <h2>Feel free to book a Service anytime</h2>
            <p>Thank you for choosing our services. We provide you best services at an affordable price. You may support us by sharing our website to your friends.</p>
            <div class="special-offer">
              <span class="offer">off<br><em>10%</em></span>
              <h6>Valide: <em>24 Sept 2023</em></h6>
              <h4>Special Offer <em>10%</em> OFF!</h4>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">
            <form id="contact-form" action="{{url('appointment')}}" method="POST">
             @csrf
              
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <select name="service_name" id="service_name">
                      <option>Select Service</option>
                      @foreach ($service as $services)
                      <option value="{{$services->service_name}}">{{$services->service_name}}</option>
                      @endforeach
                    </select>
                  </fieldset>   
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <input type="date" name="start_date" id="start_date" placeholder="Your start date..." autocomplete="on" required>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <input type="time" name="start_time" id="start_time" placeholder="Choose time..." autocomplete="on" required>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <select name="duration" id="duration">
                      <option>Select Duration</option>
                      <option value="Once">Once</option>
                      <option value="Weekly">Weekly</option>
                      <option value="Monthly">Monthly</option>
                      <option value="Yearly">Yearly</option>
                    </select>
                  </fieldset>   
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Confirm</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endauth
  @endif
        

  <!--appointment-->
  @if(Route::has('login'))
  @auth
  <div class="section fun-facts" id="appointment">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper" align="center">
              <table>
                <tr style="">
                  <th style="padding:10px;  color:white"> Service </th>
                  <th style="padding:10px;  color:white">Date</th>
                  <th style="padding:10px;  color:white">Time</th>
                  <th style="padding:10px;  color:white">Duration</th>
                  <th style="padding:10px;  color:white">Status</th>
                  <th style="padding:10px;  color:white">Cancel Appointment</th>
                </tr>
      
       @foreach($appointment as $appointments)
                <tr  align="center" style="">
                  <td style="padding:10px; color:white">{{$appointments->service_name}}</td>
                  <td style="padding:10px; color:white">{{$appointments->start_date}}</td>
                  <td style="padding:10px; color:white">{{$appointments->start_time}}</td>
                  <td style="padding:10px; color:white">{{$appointments->duration}}</td>
                  <td style="padding:10px; color:white">{{$appointments->status}}</td>
                  <td style="padding:10px; color:white" >
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to cancel appointment?')" href="{{url('cancel_appoint', $appointments->id)}}">Cancel</a>
                  </td>
                </tr>
                @endforeach
              </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  @endauth
  @endif


      
      
        


        <!--footer-->
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2023 CodeWithFashion. All rights reserved. &nbsp;&nbsp;&nbsp; Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">CodeWithFashion</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>

</html> 



