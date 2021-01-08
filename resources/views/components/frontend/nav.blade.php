  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">
              {{ App\Models\Setting::first()->site_name }}
          </a>

           
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ route('home') }}">Home
                          <span class="sr-only">(current)</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('home') }}">About</a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Category
                      </a>
                      <?php 
                            $categories = App\Models\Category::all()->take(4);
                      ?>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach ($categories as $category)
                            <a class="dropdown-item" href="">{{$category->name}}</a>
                          @endforeach
                          
                      </div>
                  </li>


                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('home') }}">Contact</a>
                  </li>

              </ul>
          </div>
      </div>
  </nav>
