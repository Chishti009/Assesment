 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html lang='en' class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script> <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/fdanisko/pen/VadXXq?depth=everything&order=popularity&page=9&q=product&show_forks=false" />

<link rel='stylesheet prefetch' href='https://raw.githubusercontent.com/greenwoodents/quickbeam.js/master/demo/css/demo.css'><link rel='stylesheet prefetch' href='{{url("public/assets/css/movie-style.css")}}'>
</head><body>
<!-- Demo page craeted by https://github.com/petr-goca -->
<div class=" ">
      @if (Route::has('login'))
          <div class="top-right links">
              @auth
                  <a target="_blank" href="{{ url('/home') }}">Home</a>
              @else
                  <a target="_blank" href="{{ route('login') }}">Login</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}">Register</a>
                  @endif
              @endauth
          </div>
      @endif
  
  </div>
 <div class="jumbotron text-center">

   <h1>Assesment</h1>
   <p>Movies Details Here</p> 
 </div>
<section aria-label="Main content" role="main" class="product-detail">
  <div itemscope itemtype="http://schema.org/Product">
    <meta itemprop="url" content="http://html-koder-test.myshopify.com/products/tommy-hilfiger-t-shirt-new-york">
    <meta itemprop="image" content="//cdn.shopify.com/s/files/1/1047/6452/products/product_grande.png?v=1446769025">
     
    <aside class=" ">
      <div class="_cont">
        
        <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
          

          @foreach($movies as $row)
          <a class="product-box"  >
            <span class="img">
              <span style="background-image: url('{{ url('public/app/uploads/'.$row->photo) }}')" class="i first"></span>
              <span class="i second" style="background-image: url('{{ url('public/app/uploads/'.$row->photo) }}')"></span>
            </span>
            <a  href="{{url('detail/'.$row->slug)}}"><span class="text">
              <strong>{{$row->name}}</strong>
              <strong>{{$row->description}}</strong>
              <span>
               Release date: {{date('d M Y',strtotime($row->release_date))}}
              </span>
               
            </span></a>
          </a>
          @endforeach
           
           
        </div>
         
      </div>
    </aside>
  </div>

</section>
<footer role="contentinfo" aria-label="Footer">
  <div class="_cont">
    <div class="socials">
      <strong>follow us:</strong>
      <ul>
        <li><a  title="html-koder / test on Twitter" class="tw" target="_blank">Twitter</a></li>
        <li><a  title="html-koder / test on Facebook" class="fb" target="_blank">Facebook</a></li>
        <li><a  title="html-koder / test on Instagram" class="in" target="_blank">Instagram</a></li>
        <li><a  title="html-koder / test on Pinterest" class="pi" target="_blank">Pinterest</a></li>
      </ul>
    </div>
    <div class="top">
      <div class="right">
        <form method="post" action="/contact" class="contact-form" accept-charset="UTF-8">
          <input type="hidden" value="customer" name="form_type" /><input type="hidden" name="utf8" value="✓" />
          <div>
            <input type="hidden" id="contact_tags" name="contact[tags]" value="newsletter"/>
            <input type="text" id="contact_email" name="contact[email]" placeholder="Submit e-mail for special offers...">
            <button type="submit" title="Newsletter Signup">OK</button>
          </div>
        </form>
      </div>
      <div class="left">
        <span class="phone">+420 123 456 789</span>
        <a class="mail" href="mailto:email.from@settings.com">email.from@settings.com</a>
      </div>
    </div>
    <div class="bottom">
      <div class="left">
        <nav role="navigation" aria-label="Service menu">
          <ul>
            <li><a >Lorem ipsum</a></li>
            <li><a >About Us</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>

<!-- Quickbeam cart-->

<div id="quick-cart" quickbeam="cart">
  <a id="quick-cart-pay" quickbeam="cart-pay" class="cart-ico">
    <span>
      <strong class="quick-cart-text">Pay<br></strong>
      <span id="quick-cart-price">0</span>
      <span id="quick-cart-pay-total-count">0</span>
    </span>
  </a>
</div>

<!-- Quickbeam cart end -->
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//raw.githubusercontent.com/greenwoodents/quickbeam.js/master/dist/quickbeam.min.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js'></script>
 
</body></html>