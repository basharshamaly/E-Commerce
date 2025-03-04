<?php $__env->startSection('title','example page'); ?>
<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>






  <section class="categories overflow-hidden">
    <div class="container">
        <div class="open-up" data-aos="zoom-out">
            <div class="row d-flex flex-wrap justify-content-center">
                <?php if(get_categories()->isNotEmpty()): ?>
                    <?php $__currentLoopData = get_categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-sm-6 mb-4"> <!-- تغيير الحجم حسب الحاجة -->
                            <div class="cat-item image-zoom-effect text-center">
                                <div class="image-holder">
                                    <a href="index.html">
                                        <img src="images/categories/<?php echo e($category->category_image); ?>"
                                             alt="categories"
                                             class="product-image img-fluid rounded">
                                    </a>
                                </div>
                                <div class="category-content mt-2">
                                    <div class="product-button">
                                        <a href="index.html" class="btn btn-common text-uppercase">
                                            <?php echo e($category->category_name); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



  <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">Our Products Arrivals</h4>
        <a href="index.html" class="btn-link">View All Products</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
            <?php if(count(get_subcategories())>0): ?>
            <?php $__currentLoopData = get_subcategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder position-relative">
                <a href="index.html">
                  <img src="/images/subcategories/<?php echo e($subcat->subcategory_image); ?>" alt="subcategories" class="product-image img-fluid">
                </a>
                <a href="index.html" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="element-title text-uppercase fs-5 mt-3">
                    <a href="index.html"><?php echo e($subcat->subcategory_name); ?></a>
                  </h5>
                  <a href="#" class="text-decoration-none" data-after="Add to cart"><span>$<?php echo e($subcat->price); ?></span></a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>

  <section class="collection bg-light position-relative py-5">
    <div class="container">
      <div class="row">
        <div class="title-xlarge text-uppercase txt-fx domino">Collection</div>
        <div class="collection-item d-flex flex-wrap my-5">
          <div class="col-md-6 column-container">
            <div class="image-holder">
              <img src="<?php echo e(asset('images/subcategories/1741011219_sport4.png')); ?>" alt="collection" class="product-image img-fluid">
            </div>
          </div>
          <div class="col-md-6 column-container bg-white">
            <div class="collection-content p-5 m-0 m-md-5">
              <h3 class="element-title text-uppercase">Classic SportsClothes collection</h3>
              <p>Dignissim lacus, turpis ut suspendisse vel tellus. Turpis purus, gravida orci, fringilla a. Ac sed eu
                fringilla odio mi. Consequat pharetra at magna imperdiet cursus ac faucibus sit libero. Ultricies quam
                nunc, lorem sit lorem urna, pretium aliquam ut. In vel, quis donec dolor id in. Pulvinar commodo mollis
                diam sed facilisis at cursus imperdiet cursus ac faucibus sit faucibus sit libero.</p>
              <a href="#" class="btn btn-dark text-uppercase mt-3">Shop Collection</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="best-sellers" class="best-sellers product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">Best Selling Items</h4>
        <a href="index.html" class="btn-link">View All Products</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">

            <?php if(count(get_subcategories())>0): ?>
            <?php $__currentLoopData = get_subcategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($subcategory->Is_Child_Category== 0): ?>


          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                 <a href="index.html">
                  <img src="images/subcategories/<?php echo e($subcategory->subcategory_image); ?>" alt="categories" class="product-image img-fluid">
                </a>
                 <a href="index.html" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="index.html"><?php echo e($subcategory->subcategory_name); ?></a>
                  </h5>
                  <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$<?php echo e($subcategory->price); ?></span></a>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>




  <section id="related-products" class="related-products product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">You May Also Like this Products</h4>
        <a href="index.html" class="btn-link">View All Products</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
            <?php if(count(get_subcategories())>0): ?>
            <?php $__currentLoopData = get_subcategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($subcategory->Is_Child_Category== 0): ?>
            <div class="swiper-slide">
                <div class="product-item image-zoom-effect link-effect">
                  <div class="image-holder">
                    <a href="index.html">
                      <img src="images/subcategories/<?php echo e($subcategory->subcategory_image); ?>" alt="product" class="product-image img-fluid">
                    </a>
                    <a href="index.html" class="btn-icon btn-wishlist">
                      <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#heart"></use>
                      </svg>
                    </a>
                    <div class="product-content">
                      <h5 class="text-uppercase fs-5 mt-3">
                        <a href="index.html"><?php echo e($subcategory->subcategory_name); ?></a>
                      </h5>
                      <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$<?php echo e($subcategory->price); ?></span></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php endif; ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>


  



  

  <section class="newsletter bg-light" style="background: url(/front/images/pattern-bg.png) no-repeat;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 py-5 my-5">
          <div class="subscribe-header text-center pb-3">
            <h3 class="section-title text-uppercase">Sign Up for our newsletter</h3>
          </div>
          <form id="form" class="d-flex flex-wrap gap-2">
            <input type="text" name="email" placeholder="Your Email Addresss" class="form-control form-control-lg">
            <button class="btn btn-dark btn-lg text-uppercase w-100">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="instagram position-relative">
    <?php if(count(get_social_networks())>0): ?>
    <?php $__currentLoopData = get_social_networks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialNetwork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
    <div class="d-flex justify-content-center w-100 position-absolute bottom-0 z-1">
      <a href="<?php echo e($socialNetwork->instgram_url); ?>" class="btn btn-dark px-5">Follow us on Instagram</a>
    </div>
    <div class="row g-0">
        <?php if(count(get_categories()) > 0): ?>
        <?php $__currentLoopData = get_categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            
       
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="<?php echo e($socialNetwork->instgram_url); ?>" target="_blank">
            <img src="images/categories/<?php echo e($cats->category_image); ?>" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>
  </section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/front/pages/home.blade.php ENDPATH**/ ?>