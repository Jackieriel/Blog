  <!-- Footer -->
  <div class="container-fluid pb-0 mb-0 justify-content-center text-light dark-bg ">
    <footer>
        <div class="row my-5 justify-content-center">
            <div class="col-11">
                <div class="row ">
                  <?php 
                            $settings = App\Models\Setting::first()->get();
                      ?>

                      @foreach ($settings as $setting)
                          
                      
                    <div class="col-xl-4 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                        <h3 class="text-muted mb-md-0 mb-5 bold-text">{{$setting->site_name}}</h3>
                    </div>
                    
                    <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                       
                    </div>
                    
                    <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-2 mb-lg-4 text-muted bold-text"><b>ADDRESS</b></h6>
                        <p class="mb-55">{{$setting->address}}</p>

                        <h6 class="mb-2 text-muted bold-text"><b>Contact</b></h6>
                        <p>
                          <small> <span>
                            <i class="fa fa-envelope" aria-hidden="true"></i></span> {{$setting->contact_number}}
                          </small>
                        </p>

                        <h6 class="mb-2 text-muted bold-text"><b>Email </b></h6><small>
                         <p>
                          <span class=""><i class="fa fa-envelope" aria-hidden="true"></i></span> 
                          {{$setting->contact_email}}</small>
                         </p>
                    </div>
                    

                </div>

                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                        <p class="social text-muted mb-0 pb-0 bold-text"> 
                          <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> 
                          <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> 
                          <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> 
                          <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> 
                        </p><small class="rights"><span>&#174;</span> {{$setting->site_name}} All Rights Reserved.</small>
                    </div> 
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                        <small class="rights">Developed with <span class="fa fa-heart">  </span> by <a href="https:jackieriel.web.app"> Jackieriel</a></small>
                    </div>

                    
                </div>
                @endforeach
            </div>
        </div>
    </footer>
</div>


