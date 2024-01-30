<div class="container" id="about" >
            <div class="row align-items-center py-lg-8 py-6">
              <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white fs-5 fs-xl-6 fw-bolder">Stay with people who care </h1>
                <p class="text-white py-lg-3 py-2">
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="d-sm-flex align-items-center gap-3">
                  <?php 
                if(strlen($_SESSION['sid']==0)) {
                  // code...
                  ?>
                  <a href="signin.php"><button class="btn btn-success text-white mb-3" style="width:300px;">Book a room</button></a>
                  <?php 
                }
                else{
                  ?>
                  <a href="rooms_index.php"><button class="btn btn-success text-white mb-3" style="width:300px;">Book a room</button></a>
                  <?php
                }
                ?>
                  <button class="btn btn-outline-light mb-3" style="width:300px;">Explore menu</button>
                }
                </div>
              </div>
              <div class="col-lg-6 text-center text-lg-end mt-3 mt-lg-0"><img class="img-fluid" src="" alt="" /></div>
            </div>


            <div class="swiper">
              <div class="swiper-container swiper-shadow swiper-theme" data-swiper='{"slidesPerView":2,"breakpoints":{"640":{"slidesPerView":2,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":40},"992":{"slidesPerView":5,"spaceBetween":40},"1024":{"slidesPerView":4,"spaceBetween":50},"1025":{"slidesPerView":6,"spaceBetween":50}},"spaceBetween":10,"grabCursor":true,"pagination":{"el":".swiper-pagination","clickable":true},"loop":true,"freeMode":true,"autoplay":{"delay":2500,"disableOnInteraction":false}}'>
                <div class="swiper-wrapper">
                  <div class="swiper-slide text-center"><img src="public/assets/img/logos/boldo.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="public/assets/img/logos/presto.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="public/assets/img/logos/boldo.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="public/assets/img/logos/presto.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="public/assets/img/logos/boldo.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="public/assets/img/logos/presto.png" alt="" /></div>
                </div>
              </div>
            </div>
          </div>