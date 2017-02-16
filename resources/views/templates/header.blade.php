
        <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
            @if(!Auth::check())
            <div class="intro-lead-in">Welcome </div>
                <div class="intro-heading">to nepali adsense</div>
                <!-- <a href="#services" class="page-scroll btn btn-xl">Register</a> -->
                <button type="button" class="page-scroll btn btn-xl" data-toggle="modal" data-target="#register">Register</button>
                &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
                <!-- <a href="#" class="page-scroll btn btn-xl">Login</a> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn btn-xl" data-toggle="modal" data-target="#login">
                  Login
                </button>

            </div>
            @elseif(Auth::check())
              <div class="intro-lead-in">Welcome Abroad</div>
                <h3>{{Auth::user()->email}}</h3>
            @endif
        </div>
    </header>

