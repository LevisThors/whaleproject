

<!doctype html>
<html lang="en">

<head>
    <title>Whale</title>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href='{{ asset('css/main.css')}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="bg-dark ">
    <header  class="mt-3 ">
        <div class=" w-100 d-flex justify-content-center align-items-center pt-2 pb-2 bg-dark">
                <h1 class="logo"><a href="/" class="logo-hover">Whale</a></h1>
            <div class="input-group w-75 d-flex justify-content-center">
                <div class="form-outline w-75 d-flex flex-direction-row">
                    <input id="search-input" type="search" id="form1" class="form-control search-bar" placeholder="Search" />
                    <button id="search-button" type="button" class="btn btn-outline-toxic">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            @auth
            <a class="nav-link dropdown-toggle badge-link" href="#" id="alertsDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-bell fa-fw"></i>
             <!-- Counter - Alerts -->
            
               @if (Auth::user()->inboxes!==0)
                 <span class="badge badge-danger badge-counter">{{ Auth::user()->inboxes->count() }}</span>
               @endif
              
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark"
                  aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header" style="color:white;">
                    Inbox
                  </h6>
                  <a class="dropdown-item d-flex align-items-center p-0" href="#">
                      <div>
                          @if( Auth::user()->inboxes->first())
                          @foreach( Auth::user()->inboxes as $mail)
                          <div class="{{$mail->status}} w-100 p-2">
                            <div class="email-subject">{{$mail->subject}}</div>
                            <div class="email-body mb-3 ">{{$mail->body}} </div>
                            <hr>
                          </div>
                          @endforeach
                          @endif
                      </div>
                  </a>

                  <hr>
                  <a class="dropdown-item text-center small" style="color:white;" href="#">Show All Alerts</a>
              </div>
           @endauth

            @if(Auth::check())
            </a>
              <h5 class="nav-item dropdown user-name-field">
               
                <a class="nav-link dropdown-toggle" style="color:white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu bg-dark" style="color:white" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" style="color:white" href="#">Account</a></li>
                <li><a class="dropdown-item" style="color:white" href="/cart">Cart</a></li>
                <li><a class="dropdown-item dropdown-notifications" style="color:white" id='notifications'>Notifications
                  @if ( Auth::user()->inboxes->count() !== 0)
                    <span class="badge-drop">{{  Auth::user()->inboxes->count() }}</span>
                  @endif
                </a></li>
                
                <li><form class="d-flex" method="POST" action="/logout">
                  @csrf
                  <button type='submit' id="register-btn" class="dropdown-item" style="color:white">Log out</button>
                </form></li>
                </ul>
              </h5>
            @else
              <a class="session-button session-button-login rounded mr-3" href="/log-in">Log In</a>
              <a class="session-button session-button-register rounded" href='/register'>Register</a>
            @endif
        </div>
       
       

        <nav class="navbar navbar-expand-lg navbar-light bg-light mh-2 p-0 phone-menu">
            <div class="container-fluid nav-bar-addition">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href='/'>Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Contact Us
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Facebook</a></li>
                    <li><a class="dropdown-item" href="#">Instagram</a></li>
                    <li><a class="dropdown-item" href="#">E-mail</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
            <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
        </div>
    
      </header> 

      {{ $slot }}
    <div class="container pt-5">
        <footer class="pt-5">
          <div class="row">
            <div class="col-6 col-md-2 mb-3">
              <h5>Section</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted anchor">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted anchor">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted anchor">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted anchor">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted anchor">About</a></li>
              </ul>
            </div>
      
      
            <div class="col-md-5 offset-md-1 mb-3">
              <form class="subscription-form">
                <h5>Subscribe to our newsletter</h5>
                <p>Monthly digest of what's new and exciting from us.</p>
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                  <label for="newsletter1" class="visually-hidden">Email address</label>
                  <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                  <button class="btn btn-outline-toxic" type="button">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
      
          <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 mt-4 border-top">
            <p style="color:white;">&copy; 2022 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
              <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
              <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
              <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
            </ul>
          </div>
        </footer>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
      $('#navId a').click(e => {
          e.preventDefault();
          $(this).tab('show');
      });
  </script>
</body>
</html>