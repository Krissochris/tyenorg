@extends('shop::layouts.master')



@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" id="top-page" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('images/cover (1).jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>First Slide</h2>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('images/cover (2).jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Second Slide</h2>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('images/cover.jpeg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Third Slide</h2>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row bg-dark">
            <a href="categories.html" class="btn btn-outline-primary btn-group-lg col-lg-4 col-sm-12 py-3 font-weight-bold" style="border-color: transparent; color: white"> 1,000 Online Courses</a>
            <a href="#" class="btn btn-outline-primary btn-group-lg col-lg-4 col-sm-12 py-3 font-weight-bold" style="border-color: transparent; color: white"> Qualified Instructors</a>
            <a href="#" class="btn btn-outline-primary btn-group-lg col-lg-4 col-sm-12 py-3 font-weight-bold" style="border-color: transparent; color: white"> Life Time Access</a>
        </div>
    </header>
        <!-- Page Content -->
<div class="container">

    <h1 class="my-4">Welcome to TYEN</h1>

    <!-- Table / Card Section -->
    <div class="row">
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card h-100">
                <h4 class="card-header">Card Title 1</h4>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card h-100">
                <h4 class="card-header">Card Title 2</h4>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card h-100">
                <h4 class="card-header">Card Title 3</h4>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3 col-md-6">
            <div class="card h-100">
                <h4 class="card-header">Card Title 4</h4>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Youtube Section -->
    <div class="py-3"></div>
    <h2>Youtube Section</h2>

    <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/cover.jpeg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Video Link One</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/cover.jpeg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Video Link Two</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/cover%20(1).jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Video Link Three</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/cover%20(1).jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Video Link Four</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/cover%20(2).jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Video Link Five</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/cover%20(2).jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">Video Link Six</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row py-5">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card h-100">
                <button class="btn btn-outline-primary btn-lg">Leaders Table</button>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card h-100">
                <button class="btn btn-outline-primary btn-lg">Social Links Here...</button>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card h-100">
                <button class="btn btn-outline-primary btn-lg">Face of TYEN</button>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <h2>TYEN Features</h2>
            <p>The TYEN Features includes:</p>
            <ul>
                <li>
                    <strong>Feature 1</strong>
                </li>
                <li>Feature 2</li>
                <li>Feature 3</li>
                <li>Feature 4</li>
                <li>Feature 5</li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" src="images/cover.jpeg" alt="">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-primary btn-block" href="#">Join Our Team</a>
        </div>
    </div>

</div>
<!-- /.container -->
@endsection
