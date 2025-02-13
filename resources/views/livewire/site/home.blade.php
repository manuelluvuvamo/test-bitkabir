<div>
    <!-- Relive -->
    <section class="relive-con position-relative">
        <figure class="relive-rightbottomimage mb-0">
            <img src="{{ asset('site/images/relive-rightbottomimage.png') }}" alt="image" class="img-fluid" />
        </figure>
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 text-lg-left text-center order-lg-1 order-2">
                    <div class="relive_wrapper" data-aos="fade-up">
                        <figure class="relive-circle mb-0">
                            <img src="{{ asset('site/images/relive-circle.png') }}" alt="image" class="img-fluid" />
                        </figure>
                        <figure class="relive-doted mb-0">
                            <img src="{{ asset('site/images/relive-doted.png') }}" alt="image" class="img-fluid" />
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-1">
                    <div class="relive_content" data-aos="fade-up">
                        <h2>
                            Relive the Sweet Memories of Classic <span>Ice Creams</span>
                        </h2>
                        <p>
                            From rich chocolate fudge to creamy vanilla sundaes, discover
                            our menu of classic ice cream creations.
                        </p>
                        <a href="./#" class="text-decoration-none all_button">Explore Our Menu<i
                                class="fa-solid fa-arrow-right"></i></a>
                        <figure class="relive-triangle mb-0">
                            <img src="{{ asset('site/images/relive-triangle.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                    </div>
                </div>
            </div>
            <figure class="relive-image mb-0" data-aos="zoom-in">
                <img src="{{ asset('site/images/relive-image.png') }}" alt="image" class="img-fluid" />
            </figure>
        </div>
    </section>
    <!-- Classic -->
    <section class="classic-con position-relative">
        <figure class="classic-leftimage mb-0">
            <img src="{{ asset('site/images/classic-leftimage.png') }}" alt="image" class="img-fluid" />
        </figure>
        <figure class="classic-rightimage mb-0">
            <img src="{{ asset('site/images/classic-rightimage.png') }}" alt="image" class="img-fluid" />
        </figure>
        <div class="container position-relative">
            <div class="row">
                <div class="col-12">
                    <div class="classic_content text-center" data-aos="fade-up">
                        <h2>Our <span>Classic</span> Favorites</h2>
                        <p>Check out our top products that our customers love.</p>
                    </div>
                </div>
            </div>
            <div class="classic_wrapper" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            @foreach ($products as $product)
                                <div class="item">
                                    <div class="classic-box">
                                        <div class="classic_image_box box1">
                                            <figure class="mb-0">
                                                <img src="{{ asset($product->image ? 'storage/' . $product->image : 'site/images/classic-image1.png') }}"
                                                    alt="{{ $product->name }}" class="img-fluid" />
                                            </figure>
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="classic_box_content">
                                            <div class="text_wrapper position-relative">
                                                <h6>{{ $product->name }}</h6>
                                                <div class="rating">
                                                    <i class="fa-solid fa-star"></i>
                                                    <span>4.9/5</span>
                                                </div>
                                            </div>
                                            <p class="text-size-16">
                                                {{ Str::limit($product->description, 50) }}
                                            </p>
                                            <div class="price_wrapper position-relative">
                                                <span class="dollar">$<span
                                                        class="counter">{{ $product->price }}</span></span>
                                                <a href="#"><img src="{{ asset('site/images/cart.png') }}"
                                                        alt="image" class="img-fluid" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories -->
    <section class="categories-con position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-12">
                    <div class="categories_content text-center" data-aos="fade-up">
                        <h2>Explore Our <span>Categories</span></h2>
                        <p>
                            Browse through our different categories to find your favorite
                            ice cream treats.
                        </p>
                    </div>
                </div>
            </div>
            <div class="categories_wrapper" data-aos="fade-up">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="categories-box">
                                <figure class="image mb-0">
                                    <img src="{{ asset('site/images/categories-image1.jpg') }}" alt="image"
                                        class="img-fluid" />
                                </figure>
                                <div class="content">
                                    <h5 class="mb-0">{{ $category->name }}</h5>
                                    <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Special -->
    <section class="special-con position-relative">
        <figure class="special-rightimage mb-0">
            <img src="{{ asset('site/images/special-rightimage.png') }}" alt="image" class="img-fluid" />
        </figure>
        <div class="container position-relative">
            <figure class="special-triangle mb-0">
                <img src="{{ asset('site/images/special-triangle.png') }}" alt="image" class="img-fluid" />
            </figure>
            <figure class="special-doted mb-0">
                <img src="{{ asset('site/images/special-doted.png') }}" alt="image" class="img-fluid" />
            </figure>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="special_content" data-aos="fade-up">
                        <h2 class="text-white">Summer Special!</h2>
                        <p class="text-white">Buy One Sundae, Get One 50% Off!</p>
                        <div class="button">
                            <a href="#" class="text-decoration-none all_button get_started">Get This
                                Deal<i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-white">Use code: SUMMER50 at checkout.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 text-lg-left text-center">
                    <div class="special_wrapper position-relative" data-aos="zoom-in">
                        <figure class="special-image mb-0">
                            <img src="{{ asset('site/images/special-image.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="special-dotedarrow mb-0">
                            <img src="{{ asset('site/images/special-dotedarrow.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <div class="circle-text">
                            <div class="content">
                                <span class="persent"><span class="">50</span>%</span>
                                <span class="text">OFF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Seller -->
    <section class="seller-con position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-12">
                    <div class="seller_content text-center" data-aos="fade-up">
                        <h2>Our <span>Best</span> Sellers</h2>
                        <p>
                            Discover the favorites that keep our customers coming back for
                            more.
                        </p>
                    </div>
                </div>
            </div>
            <div class="seller_wrapper" data-aos="fade-up">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            @foreach ($best_sellers as $product)
                                <div class="item">
                                    <div class="seller-box">
                                        <div class="seller_image_box box1">
                                            <figure class="mb-0">
                                                <img src="{{ asset($product->image ? 'storage/' . $product->image : 'site/images/seller-image1.png') }}"
                                                    alt="{{ $product->name }}" class="img-fluid" />
                                            </figure>
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="seller_box_content">
                                            <div class="text_wrapper position-relative">
                                                <h6>{{ $product->name }}</h6>
                                                <div class="rating">
                                                    <i class="fa-solid fa-star"></i>
                                                    <span>4.9/5</span>
                                                </div>
                                            </div>
                                            <p class="text-size-16">
                                                {{ Str::limit($product->description, 50) }}
                                            </p>
                                            <div class="price_wrapper position-relative">
                                                <span class="dollar">$<span
                                                        class="counter">{{ $product->price }}</span></span>
                                                <a href="#"><img src="{{ asset('site/images/cart.png') }}"
                                                        alt="image" class="img-fluid" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial -->
    <section class="testimonial-con position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-1 d-md-block d-none" data-aos="zoom-in">
                    <div class="testimonial_wrapper">
                        <figure class="testimonial-image1 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image1.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="testimonial-image2 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image2.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="testimonial-image3 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image3.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="testimonial-image4 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image4.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-12" data-aos="fade-up">
                    <div class="testimonial_content_box position-relative">
                        <h2 class="col-lg-8 mx-auto">
                            Hear from Our <span>Happy Ice Cream</span> Lovers
                        </h2>
                        <figure class="testimonial-quoteimage mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-quoteimage.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                    </div>
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial_content">
                                <p class="paragraph">
                                    Beatae vitae dicta sunt explicabo. Nemo enim ipsam
                                    voluptatem quia voluptas as pernatur aut odit aut fugit, sed
                                    beatae vitae dicta ripiscing elit, sed do euismod tempor
                                    incidunt. Labore et dolore magna aliqua ut enim ad minim
                                    adipiscing elit, sed do euismod tempor incidunt aut labore.
                                </p>
                                <span class="name">Kevin Andrew</span>
                                <span class="review">Happy Customer</span>
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial_content">
                                <p class="paragraph">
                                    Beatae vitae dicta sunt explicabo. Nemo enim ipsam
                                    voluptatem quia voluptas as pernatur aut odit aut fugit, sed
                                    beatae vitae dicta ripiscing elit, sed do euismod tempor
                                    incidunt. Labore et dolore magna aliqua ut enim ad minim
                                    adipiscing elit, sed do euismod tempor incidunt aut labore.
                                </p>
                                <span class="name">Kevin Andrew</span>
                                <span class="review">Happy Customer</span>
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial_content">
                                <p class="paragraph">
                                    Beatae vitae dicta sunt explicabo. Nemo enim ipsam
                                    voluptatem quia voluptas as pernatur aut odit aut fugit, sed
                                    beatae vitae dicta ripiscing elit, sed do euismod tempor
                                    incidunt. Labore et dolore magna aliqua ut enim ad minim
                                    adipiscing elit, sed do euismod tempor incidunt aut labore.
                                </p>
                                <span class="name">Kevin Andrew</span>
                                <span class="review">Happy Customer</span>
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-1 d-md-block d-none" data-aos="zoom-in">
                    <div class="testimonial_wrapper">
                        <figure class="testimonial-image5 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image5.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="testimonial-image6 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image6.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="testimonial-image7 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image7.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                        <figure class="testimonial-image8 image mb-0 position-absolute">
                            <img src="{{ asset('site/images/testimonial-image8.png') }}" alt="image"
                                class="img-fluid" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Upadte -->
    <section class="update-con position-relative">
        <div class="container position-relative">
            <figure class="update-circle mb-0">
                <img src="{{ asset('site/images/relive-circle.png') }}" alt="image" class="img-fluid" />
            </figure>
            <figure class="update-triangle mb-0">
                <img src="{{ asset('site/images/relive-triangle.png') }}" alt="image" class="img-fluid" />
            </figure>
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="update_content text-center" data-aos="fade-up">
                        <h2>Sign up For <span>Exclusive Deals</span> and Updates</h2>
                        <p>
                            Get 10% off your next order and stay updated with our latest
                            offers.
                        </p>
                        <form action="javascript:;">
                            <div class="form-group float-left position-relative">
                                <input type="text" class="form_style" placeholder="Enter Your Email Address"
                                    name="email" />
                                <button>
                                    Subscribe<i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="form-group check-box m-0">
                                <input type="checkbox" id="privacy" />
                                <label for="privacy">I agree to the
                                    <a class="text-decoration-none" href="#">Privacy
                                        Policy</a>.</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Follow -->
    <section class="follow-con position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="follow_content text-center" data-aos="fade-up">
                        <h2>Follow Us on <span>Instagram</span></h2>
                        <p>
                            Join our Instagram community for updates, special deals, and
                            more!
                        </p>
                    </div>
                    <ul class="list-unstyled mb-0" data-aos="fade-up">
                        <li>
                            <a href="https://www.instagram.com/">
                                <figure class="image mb-0">
                                    <img src="{{ asset('site/images/follow-image1.jpg') }}" alt="image"
                                        class="img-fluid" />
                                </figure>
                                <div class="icon">
                                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/">
                                <figure class="image mb-0">
                                    <img src="{{ asset('site/images/follow-image2.jpg') }}" alt="image"
                                        class="img-fluid" />
                                </figure>
                                <div class="icon">
                                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/">
                                <figure class="image mb-0">
                                    <img src="{{ asset('site/images/follow-image3.jpg') }}" alt="image"
                                        class="img-fluid" />
                                </figure>
                                <div class="icon">
                                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/">
                                <figure class="image mb-0">
                                    <img src="{{ asset('site/images/follow-image4.jpg') }}" alt="image"
                                        class="img-fluid" />
                                </figure>
                                <div class="icon">
                                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/">
                                <figure class="image mb-0">
                                    <img src="{{ asset('site/images/follow-image5.jpg') }}" alt="image"
                                        class="img-fluid" />
                                </figure>
                                <div class="icon">
                                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                </div>
            </div>
        </div>
    </section>
</div>
