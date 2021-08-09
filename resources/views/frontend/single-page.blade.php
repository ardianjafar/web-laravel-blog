
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap News Template - Free HTML Templates</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('bootstrap/lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap/lib/slick/slick-theme.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.html" class="nav-item nav-link">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Sub Item 1</a>
                                    <a href="#" class="dropdown-item">Sub Item 2</a>
                                </div>
                            </div>
                            <a href="single-page.html" class="nav-item nav-link active">Single Page</a>
                            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">News</a></li>
                    <li class="breadcrumb-item active">News details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-container">
                                @foreach ($post as $item)
                                <div class="sn-img">
                                    <img src="{{ asset('storage/' . $item->image ) }}" class="img-fluid w-100">
                                </div>
                                <div class="sn-content">
                                    <h1 class="sn-title">{{ $item->title }}</h1>
                                    <p>
                                        {!! $item->description !!}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                            <div class="sn-related">
                                <h2>Related News</h2>
                                <div class="row sn-slider">
                                    <div class="col-md-4">
                                        <div class="sn-img">
                                            <img src="{{ asset('bootstrap/img/news-350x223-1.jpg') }}" />
                                            <div class="sn-title">
                                                <a href="">Interdum et fames ac ante</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="sn-img">
                                            <img src="{{ asset('bootstrap/img/news-350x223-2.jpg') }}" />
                                            <div class="sn-title">
                                                <a href="">Interdum et fames ac ante</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="sn-img">
                                            <img src="{{ asset('bootstrap/img/news-350x223-3.jpg') }}" />
                                            <div class="sn-title">
                                                <a href="">Interdum et fames ac ante</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="sn-img">
                                            <img src="{{ asset('bootstrap/img/news-350x223-4.jpg') }}" />
                                            <div class="sn-title">
                                                <a href="">Interdum et fames ac ante</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">In This Category</h2>
                                <div class="news-list">
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="{{ asset('bootstrap/img/news-350x223-1.jpg') }}" />
                                        </div>
                                        <div class="nl-title">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                          
                            
                            <div class="sidebar-widget">
                                <div class="tab-news">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{ asset('bootstrap/img/news-350x223-1.jpg') }}" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div> 
                                        </div>
                                        <div id="popular" class="container tab-pane fade">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{ asset('bootstrap/img/news-350x223-4.jpg') }}" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="latest" class="container tab-pane fade">
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    <img src="{{ asset('bootstrap/img/news-350x223-3.jpg') }}" />
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                         

                            <div class="sidebar-widget">
                                <h2 class="sw-title">News Category</h2>
                                <div class="category">
                                    @foreach ($category as $cate => $result)
                                    <ul>
                                        <li><a href="">{{ $result->name }}</a><span></span></li>      
                                    </ul>
                                    @endforeach
                                </div>
                            </div>

                           
                            
                            <div class="sidebar-widget">
                                <h2 class="sw-title">Tags Cloud</h2>
                                <div class="tags">
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single News End-->        
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Get in Touch</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>
                                <p><i class="fa fa-envelope"></i>info@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Lorem ipsum</a></li>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aenean vulputate</a></li>
                                <li><a href="#">Vestibulum sit amet</a></li>
                                <li><a href="#">Nam dignissim</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Lorem ipsum</a></li>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aenean vulputate</a></li>
                                <li><a href="#">Vestibulum sit amet</a></li>
                                <li><a href="#">Nam dignissim</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Newsletter</h3>
                            <div class="newsletter">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
    

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('bootstrap/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('bootstrap/lib/slick/slick.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('bootstrap/js/main.js') }}"></script>
    <!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>
</html>
