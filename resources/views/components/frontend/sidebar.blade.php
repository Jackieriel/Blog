 <!-- Sidebar Widgets Column -->

 <!-- Search Widget -->
 <div class="card my-4">
     <h5 class="card-header">Search</h5>
     <div class="card-body">
        <form action="{{route('post.search')}}" method="GET">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                <button type="submit" class="btn btn-secondary" type="button">Go!</button>
            </span>
            </div>
         </form>
         {{-- <div class="input-group">
             <input type="text" class="form-control" placeholder="Search for...">
             <span class="input-group-append">
                 <button class="btn btn-secondary" type="button">Go!</button>
             </span>
         </div> --}}
     </div>
 </div>

 <?php $categories = App\Models\Category::all()->take(4); ?>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
     @foreach ($categories as $category)
         <a class="dropdown-item" href="">{{ $category->name }}</a>
     @endforeach

 </div>

 <!-- Categories Widget -->
 <div class="card my-4">
     <h5 class="card-header">Categories</h5>
     <div class="card-body">
         <div class="row">
             <div class="col-lg-12">
                 <div class="row list-unstyled mb-0">
                     <?php $categories = App\Models\Category::all(); ?>

                     @foreach ($categories as $category)
                         <div class="col-md-6">
                            <a class="" href="{{route('category.single', $category->id)}}">{{ $category->name }}</a>
                         </div>
                     @endforeach
             </ul>
         </div>
     </div>
 </div>
 </div>

 <!-- Side Widget -->
 <div class="card my-4">
     <h5 class="card-header">Side Widget</h5>
     <div class="card-body">
         You can put anything you want inside of these side widgets. They are easy to use, and feature the
         new Bootstrap 4 card containers!
     </div>
 </div>
