<!DOCTYPE html>
<html lang="en">
  <head>
  <title>BrainZone - Course</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="astar/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="astar/css/animate.css">
    
    <link rel="stylesheet" href="astar/css/owl.carousel.min.css">
    <link rel="stylesheet" href="astar/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="astar/css/magnific-popup.css">

    <link rel="stylesheet" href="astar/css/aos.css">

    <link rel="stylesheet" href="astar/css/ionicons.min.css">
    
    <link rel="stylesheet" href="astar/css/flaticon.css">
    <link rel="stylesheet" href="astar/css/icomoon.css">
    <link rel="stylesheet" href="astar/css/style.css"> 
  </head>
  <body>
	  <div class="py-2 bg-fifth">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
	    		
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar brzn-navbar-light" id="brzn-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="#">Brain<span>Zone</span></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#brzn-nav" aria-controls="brzn-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="brzn-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link pl-0">Home</a></li>
            @foreach($menus as $menu)
	        	<li class="nav-item"><a href="#" class="nav-link">{{$menu->title}}</a></li>
            @endforeach
	            <li class="nav-item"><a href="{{ url('/admission') }}" class="nav-link">Admission</a></li>
              <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      @foreach ($sliders as $slider)
      <div class="slider-item" style="background-image:url({{ $slider->picture }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center brzn-animate">
            <h1 class="mb-4">{{ $slider->title }}</span></h1>
          </div>
        </div>
        </div>
      </div>
      @endforeach
    </section>

    <section class="features_area">
        <div class="container">
            <div class="features_wrapper">
                <div class="row no-gutters">
                @php $i=0;$bgcolor=array('bg-primary','bg-tertiary','bg-quarternary');$service=array('service1','service2','service3');
                @endphp
                @foreach ($features as $feature)
                <div class="col-md-4 {{ $service[$i] }} d-flex align-self-stretch pb-4 px-4 brzn-animate {{ $bgcolor[$i] }}">
                <div class="single_features text-center">
                            <div class="features_content">
                                <h4 class="mb-4 text-white">{{ $feature->title }}</h4>
                                <p>{!! $feature->description !!}</p>
                            </div>
                        </div>
                    </div>
                    @php $i++;@endphp
                    @endforeach

                    
                </div>
            </div>
        </div>
    </section>

    @foreach($sections as $key => $val)

		<section class="brzn-section brzn-no-pt ftc-no-pb"
        style="
background:linear-gradient(0deg, rgb(248, 249, 250, 0.95), rgb(248, 249, 250, 0.95)), url('/astar/images/dots.png');
background-size:cover;" >
			<div class="container">
				<div class="row">
					<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 brzn-animate">
	          	<h2 class="mb-4">{{ $sections[1]->title }}</h2>
              {!! $sections[1]->description !!}
						</div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 brzn-animate">
          	<h2 class="mb-4">{{ $sections[0]->title }}</h2>
            {!! $sections[0]->description !!}
						<div class="row mt-5">
            @foreach ($offers as $offer)
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="{{ $offer->slug }}"></span></div>
									<div class="text">
										<h3>{{ $offer->title }}</h3>
										{!! $offer->description !!}
									</div>
								</div>
							</div>
            @endforeach

						</div>
					</div>
				</div>
			</div>
		</section>
		

		

        <section class="brzn-services brzn-no-pb"
        style="
  background-color: #5D58EF;
  background-image: url('/astar/images/footer-pattern.png');
  background-position: center bottom 10px;
background-repeat: no-repeat;">
			<div class="container-wrap">
				<div class="row no-gutters">
        @foreach($categories as $category)
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 brzn-animate">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="{{ $category->slug }}"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">{{ $category->title }}</h3>
                {!! $category->description !!}
              </div>
            </div>      
          </div>
        @endforeach
        </div>
			</div>
		</section>


        <section class="brzn-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section brzn-animate">
            <h2 class="mb-4">{{ $sections[2]->title }}</h2>
            {!! $sections[2]->description !!}
          </div>
        </div>
    		<div class="row">
        @php $i=0;$bgcolor=array('bg-primary','bg-secondary','bg-fifth','bg-quarternary');$service=array('service1','service2','service3');
                @endphp
                @foreach ($levels as $level)

            <div class="col-md-3 d-flex brzn-animate  pt-4 {{ $bgcolor[$i] }}" style="border:5px solid #fff;border-radius:20px;">
            <div class="pricing-entry pb-4 text-center">
	        			<h2 class="mb-3 text-white">{{ $level->title }}</h2>
	        			<h4 style="background-color: rgba(255,255,255,0.5);
                                                border-radius:10px;
                                                padding: 10px 20px;
text-align: center;"><span class="text-body">{{ $level->slug }}</span></h4>
	        		<div class="blog-img" style="background-image: url(astar/images/bg_5.jpg);"></div>
	        		<div class="px-4 text-white">
	        			{!! $level->description !!}
        			</div>
        			<p class="button text-center"><a href="#" class="btn btn-tertiary mb-0 px-4 mt-4">Sylabus Lists</a></p>
        		</div>
        	</div>
                    @php $i++;@endphp
                    @endforeach

            
        </div>
    	</div>
    </section>

    <section class="brzn-intro" style="
background:linear-gradient(0deg, rgba(38, 157, 179, 0.95), rgba(38, 157, 179, 0.95)), url('/astar/images/geometry-bg.png');
background-size:cover;">

    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-8 text-center heading-section brzn-animate">
            <h2 class="mb-4">{{ $sections[3]->title }}</h2>
            {!! $sections[3]->description !!}
          </div>
        </div>
      <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="steps">
                    <progress id="progress" value=0 max=100 ></progress>
                @php $i=0;$collapse=array('collapseOne','collapseTwo','collapseThree');$heading=array('headingOne','headingTwo','headingThree');
                @endphp
                @foreach ($steps as $step)

                    <div class="step-item">
                        <button class="step-button text-center" type="button" data-toggle="collapse"
                            data-target="#{{ $collapse[$i] }}" aria-expanded="true" aria-controls="{{ $collapse[$i] }}">
                            {{ $i+1 }}
                        </button>
                        <div class="step-title">
                        {{ $step->title }}
                        </div>
                    </div>
                    @php $i++;@endphp
                    @endforeach
                </div>

                @php $i=0;$collapse=array('collapseOne','collapseTwo','collapseThree');$heading=array('headingOne','headingTwo','headingThree');
                @endphp
                @foreach ($steps as $step)
                <div class="card-steps">
                    <div  id="{{ $heading[$i] }}">
                        
                    </div>

                    <div id="{{ $collapse[$i] }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="{{ $heading[$i] }}" data-parent="#accordionExample">
                        <div class="card-body-steps">
                        {!! $step->description !!}
                        </div>
                    </div>
                </div>
                @php $i++;@endphp
                @endforeach

                
                
            </div>
        </div>
		</section>
        
    <section class="brzn-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section brzn-animate">
            <h2 class="mb-4">{{ $sections[5]->title }}</h2>
            {!! $sections[5]->description !!}  
          </div>
        </div>
        <div class="row brzn-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
            @foreach($testimonies as $testimony)
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url({{ $testimony->picture }})">
                  </div>
                  <div class="text ml-2">
                    {!! $testimony->description !!}
                    <p class="name">{{ $testimony->fullname }}</p>
                    <span class="position">{{ $testimony->title }}</span>
                  </div>
                </div>
              </div>
              @endforeach


            </div>
          </div>
        </div>
      </div>
    </section>
    @break $key == 1;
    @endforeach
    

      <section class="brzn-section">
      <div class="bg-color"></div>
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section brzn-animate">
            <h2 class="mb-4">{{ $sections[4]->title }}</h2>
            {!! $sections[4]->description !!}
          </div>
        </div>

    		<div class="row">
        	
            <div class="col-md-6 col-lg-6 brzn-animate">
        		<div class="course-entry pb-4 text-center">
	        		<div class="blog-img" style="background-image: url(astar/images/bg_5.jpg);"></div>
						<div class="text p-4">
							<h3><a href="#">Math Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
						</div>
        			<p class="button text-center"><a href="#" class="btn btn-danger mb-0 px-4 mt-4">Take A Course</a></p>
        		</div>
                <div class="row">
        	
                <div class="col-md-6 col-lg-6 brzn-animate">
                        <div class="course-entry pb-4 text-center">
                            <div class="blog-img" style="background-image: url(astar/images/bg_3.jpg);"></div>
                            <div class="text p-4">
							<h3><a href="#">Physics Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place</p>
						</div>
                            <p class="button text-center"><a href="#" class="btn btn-success mb-0 px-4 mt-4">Take A Course</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 brzn-animate">
                        <div class="course-entry pb-4 text-center">
                            <div class="blog-img" style="background-image: url(astar/images/bg_3.jpg);"></div>
                            <div class="text p-4">
							<h3><a href="#">Chemistry Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place</p>
						</div>
                            <p class="button text-center"><a href="#" class="btn btn-success mb-0 px-4 mt-4">Take A Course</a></p>
                        </div>
                    </div>
                </div>
        	</div>
        	
        	<div class="col-md-6 col-lg-3 brzn-animate">
                <div class="course-entry pb-4 text-center">
	        		<div class="blog-img" style="background-image: url(astar/images/bg_3.jpg);"></div>
                    <div class="text p-4">
							<h3><a href="#">Math Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place</p>
						</div>
        			<p class="button text-center"><a href="#" class="btn btn-success mb-0 px-4 mt-4">Take A Course</a></p>
        		</div>
                <div class="course-entry pb-4 text-center">
	        		<div class="blog-img" style="background-image: url(astar/images/bg_3.jpg);"></div>
                    <div class="text p-4">
                    <h3><a href="#">Physics Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place</p>
						</div>
        			<p class="button text-center"><a href="#" class="btn btn-success mb-0 px-4 mt-4">Take A Course</a></p>
        		</div>
        	</div>
            
        	<div class="col-md-6 col-lg-3 brzn-animate">
                <div class="course-entry pb-4 text-center">
	        		<div class="blog-img" style="background-image: url(astar/images/bg_5.jpg);"></div>
                    <div class="text p-4">
                    <h3><a href="#">Chemistry Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place</p>
						</div>
        			<p class="button text-center"><a href="#" class="btn btn-success mb-0 px-4 mt-4">Take A Course</a></p>
        		</div>

                <div class="course-entry pb-4 text-center">
	        		<div class="blog-img" style="background-image: url(astar/images/bg_3.jpg);"></div>
                    <div class="text p-4">
							<h3><a href="#">Math Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place</p>
						</div>
        			<p class="button text-center"><a href="#" class="btn btn-success mb-0 px-4 mt-4">Take A Course</a></p>
        		</div>
        	</div>

        </div>
    	</div>
    </section>



   



    <footer class="brzn-footer brzn-bg-dark brzn-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="brzn-footer-widget mb-5">
            	<h2 class="brzn-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <!-- <ul>
	                <li><span class="icon"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul> -->
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="brzn-footer-widget mb-5">
              <h2 class="brzn-heading-2">Recent Course</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(astar/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(astar/images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="brzn-footer-widget mb-5 ml-md-4">
              <h2 class="brzn-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="brzn-footer-widget mb-5">
            	<h2 class="brzn-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
            <div class="brzn-footer-widget mb-5">
            	<h2 class="brzn-heading-2 mb-0">Connect With Us</h2>
            	<ul class="brzn-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="brzn-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="brzn-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="brzn-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-zone row" >
          <div class="col-md-12 text-center">
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="brzn-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="astar/js/jquery.min.js"></script>
  <script src="astar/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="astar/js/popper.min.js"></script>
  <script src="astar/js/bootstrap.min.js"></script>
  <script src="astar/js/jquery.easing.1.3.js"></script>
  <script src="astar/js/jquery.waypoints.min.js"></script>
  <script src="astar/js/jquery.stellar.min.js"></script>
  <script src="astar/js/owl.carousel.min.js"></script>
  <script src="astar/js/jquery.magnific-popup.min.js"></script>
  <script src="astar/js/aos.js"></script>
  <script src="astar/js/jquery.animateNumber.min.js"></script>
  <script src="astar/js/scrollax.min.js"></script>
  <script src="astar/js/main.js"></script>
  <script>
     const stepButtons = document.querySelectorAll('.step-button');
        const progress = document.querySelector('#progress');

        Array.from(stepButtons).forEach((button,index) => {
            button.addEventListener('click', () => {
                progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

                stepButtons.forEach((item, secindex)=>{
                    if(index > secindex){
                        item.classList.add('done');
                    }
                    if(index < secindex){
                        item.classList.remove('done');
                    }
                })
            })
        })
    </script>
  </body>
</html>