
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<footer id="footer" class="mt-5">
    <div class="container">
      <div class="row d-flex flex-wrap justify-content-between py-5">
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-001">
            <div class="footer-intro mb-4">
              <a href="/">
                <img src="/images/site/{{$settings->site_logo}}" alt="logo" style="width: 80px;height: 100px;object-fit: contain;">
              </a>
            </div>
            <p>{{ $settings->site_meta_description }}</p>
            <a target="_blank" href="http://maps.google.com/maps?q={{ urlencode($settings->site_address) }}">
                {{ $settings->site_address }}
            </a>
                        <div class="social-links">
              <ul class="list-unstyled d-flex flex-wrap gap-3">
                <li>
                  <a href="{{ $socialnetworks['facebook_url'] }}" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#facebook"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="{{ $socialnetworks['twiter_url'] }}" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#twitter"></use>
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="{{ $socialnetworks['youtyope_url'] }}" class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#youtube"></use>
                    </svg>
                  </a>
                </li>
                <li>
                    <a href="{{ $socialnetworks['instgram_url'] }}" class="text-secondary">
                      <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#instagram"></use>
                      </svg>
                    </a>
                  </li>
                <li>
                  <a href="{{ $socialnetworks['githup_url'] }}" class="text-secondary">
                    <i class="fab fa-github" style="font-size: 24px;"></i>

                  </a>
                </li>
               
                <li>
                  <a href="{{ $socialnetworks['linkedin_url'] }}" class="text-secondary" style="color: #6c757d;">
                    <i class="fab fa-linkedin" style="font-size: 24px;"></i>

                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-002">
            <h5 class="widget-title text-uppercase mb-4">Quick Links</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="index.html" class="item-anchor">Home</a>
              </li>
              <li class="menu-item">
                <a href="index.html" class="item-anchor">About</a>
              </li>
              <li class="menu-item">
                <a href="blog.html" class="item-anchor">Services</a>
              </li>
              <li class="menu-item">
                <a href="styles.html" class="item-anchor">Single item</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-003">
            <h5 class="widget-title text-uppercase mb-4">Help & Info</h5>
            <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
              <li class="menu-item">
                <a href="#" class="item-anchor">Track Your Order</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Returns + Exchanges</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Shipping + Delivery</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Contact Us</a>
              </li>
              <li class="menu-item">
                <a href="#" class="item-anchor">Find us easy</a>
              </li>
              <li class="menu-item">
                <a href="index.html" class="item-anchor">Faqs</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-menu footer-menu-004 border-animation-left">
            <h5 class="widget-title text-uppercase mb-4">Contact Us</h5>
            <p>Do you have any questions or suggestions? <a href="mailto:basharshamaly35@gmail.com"
                class="item-anchor">basharshamaly35@gmail.com</a></p>
            <p>Do you need support? Give us a call. <a href="tel:+972 59-973-7242" class="item-anchor">+972 59-973-7242
                </a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="border-top py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex flex-wrap">
            <div class="shipping">
              <span>We ship with:</span>
              <img src="/front/images/arct-icon.png" alt="icon">
              <img src="/front/images/dhl-logo.png" alt="icon">
            </div>
            <div class="payment-option">
              <span>Payment Option:</span>
              <img src="/front/images/visa-card.png" alt="card">
              <img src="/front/images/paypal-card.png" alt="card">
              <img src="/front/images/master-card.png" alt="card">
            </div>
          </div>
          <div class="col-md-6 text-end">
            <p>© Copyright 2025 Bashar. All rights reserved. Design by <a href="https://templatesjungle.com"
                target="_blank">TemplatesJungle</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
