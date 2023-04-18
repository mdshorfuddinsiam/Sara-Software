@extends('layouts.frontend-master')

@section('front-title')
    Home Page
@endsection

@section('front-content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        @include('partials.common.sidebar') 
      </div>
      <!-- /.sidemenu-holder -->  
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            {{-- <div class="item" style="background-image: url({{ asset('frontend') }}/images/sliders/01.jpg);"> --}}
            <div class="item" style="background-image: url({{ asset('') }}upload/slider-1.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">Top Brands</div>
                  <div class="big-text fadeInDown-1"> New Collections </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            {{-- <div class="item" style="background-image: url({{ asset('frontend') }}/images/sliders/02.jpg);"> --}}
            <div class="item" style="background-image: url({{ asset('') }}upload/slider-2.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">Spring 2016</div>
                  <div class="big-text fadeInDown-1"> Women <span class="highlight">Fashion</span> </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              @foreach($categories as $row)
              <li><a data-transition-type="backSlide" href="#category{{ @$row->id }}" data-toggle="tab">{{ @$row->category_name }}</a></li>
              @endforeach
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">

            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($products as $row)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ route('product.details', ['product'=>@$row->id, 'slug'=>@$row->slug]) }}"><img  src="{{ asset($row->thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          @php
                            $amount = $row->selling_price - $row->discount_price;
                            $discount = ($amount/$row->selling_price) * 100;
                          @endphp

                          @if($row->discount_price == null)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ route('product.details', ['product'=>@$row->id, 'slug'=>@$row->slug]) }}">{{ @$row->name }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if($row->discount_price == null)
                          <div class="product-price"> <span class="price"> ${{ @$row->selling_price }} </span></div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ @$row->discount_price }} </span> <span class="price-before-discount">$ {{ @$row->selling_price }}</span> </div>
                          @endif
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endforeach 

                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
            @foreach($categories as $row)
            <div class="tab-pane" id="category{{ @$row->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                  @forelse($row->products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}"><img  src="{{ asset($product->thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                          @endphp

                          @if($product->discount_price == null)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}">{{ $product->name }}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>

                          @if($product->discount_price == null)
                          <div class="product-price"> <span class="price"> ${{ @$product->selling_price }} </span></div>
                          @else
                          <div class="product-price"> <span class="price"> ${{ @$product->discount_price }} </span> <span class="price-before-discount">$ {{ @$product->selling_price }}</span> </div>
                          @endif
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @empty
                  @endforelse

                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            @endforeach
                        
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @forelse($featureProducts as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}"><img  src="{{ asset($product->thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = ($amount/$product->selling_price) * 100;
                    @endphp

                    @if($product->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}">{{ $product->name }}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($product->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$product->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$product->discount_price }} </span> <span class="price-before-discount">$ {{ @$product->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @empty
            @endforelse
            <!-- /.item -->
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 

        <!-- =============================================  HOT DEALS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Hot Deals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @forelse($hotDeals as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}"><img  src="{{ asset($product->thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = ($amount/$product->selling_price) * 100;
                    @endphp

                    @if($product->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}">{{ $product->name }}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($product->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$product->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$product->discount_price }} </span> <span class="price-before-discount">$ {{ @$product->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @empty
            @endforelse
            <!-- /.item -->
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- =============================================  HOT DEALS : END ============================================== --> 

        <!-- =============================================  SPECIAL DEALS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @forelse($specialDeals as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}"><img  src="{{ asset($product->thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = ($amount/$product->selling_price) * 100;
                    @endphp

                    @if($product->discount_price == null)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="{{ route('product.details', ['product'=>@$product->id, 'slug'=>@$product->slug]) }}">{{ $product->name }}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>

                    @if($product->discount_price == null)
                    <div class="product-price"> <span class="price"> ${{ @$product->selling_price }} </span></div>
                    @else
                    <div class="product-price"> <span class="price"> ${{ @$product->discount_price }} </span> <span class="price-before-discount">$ {{ @$product->selling_price }}</span> </div>
                    @endif
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            @empty
            @endforelse
            <!-- /.item -->
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- =============================================  SPECIAL DEALS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 
@endsection
