@extends('frontend.layout')

@section('content')
  <!--==========================
    Intro Section
  ============================-->
<section id="intro" class="clearfix">
<!--     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('template/img/service/air freight.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('template/img/service/customs clearance.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('template/img/service/land transport.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('template/img/service/project and bulk cargo.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('template/img/service/sea freight.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('template/img/service/warehouse.jpg') }}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> -->
    <div class="overlap text-white d-flex align-items-center text-center justify-content-center">
      <div class="text-center">
        <h1>KAY OCEAN</h1>
        <p>We take deliver everywhere</p>
      </div>
    </div>
  </section><!-- #intro -->

  <section id="tracking">
    <div class="container">
      <div class="row">
        <div class="col-md-6 cek-resi border-right">
          <form action="{{ route('tracking') }}" method="GET" class="pr-4">
       
            <h5 class="text-center">
              <!-- <i class="fas fa-search"></i> -->
              <b>Lacak Kiriman</b>
            </h5>
            <div class="form-group">
              <label for="">Nomor Resi</label>
              <input type="text" class="form-control" name="tracking_code" placeholder="Masukkan nomor resi">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Lacak Kiriman</button>
            </div>
          </form>
        </div>

        <div class="col-md-6 cek-harga">
          <form action="" method="POST" class="pl-4">
            @csrf
            <h5 class="text-center">
              <b>Cek Harga</b>
            </h5>
            <div class="form-group">
              <label for="">Dari Kota</label>
              <select name="from_city_id" id="" class="form-control select2">
                <option value=""></option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Ke Kota</label>
              <select name="to_city_id" id="" class="form-control select2">
                <option value="" disabled selected>Ke Kota</option>
              </select>
            </div>

            <div class="form-group">
              <button id="btn-cekharga" type="submit" class="btn btn-primary">Cek Harga</button>
            </div>

            <div class="alert d-none">
             
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </section>

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <!-- <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p></p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-shopping-bag"></i></div>
              <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-photo"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="{{ asset('template/img/about-img.svg') }}" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section> --><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <header class="section-header">
          <h3>Service</h3>
      </header>

      <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('template/img/service/air freight.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('template/img/service/customs clearance.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('template/img/service/land transport.jpg') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('template/img/service/project and bulk cargo.jpg') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('template/img/service/sea freight.jpg') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('template/img/service/warehouse.jpg') }}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-12 mb-4">
            <div class="card wow bounceInUp">
                <!-- <i class="fa fa-diamond"></i> -->
              <div class="card-body">
                <h5 class="card-title">BERPENGALAMAN DALAM BIDANG LOGISTIK SERTA MODA TRANSPORTASI YANG LENGKAP </h5>
                <!-- <p class="card-text">Deleniti optio et nisi dolorem debitis. Aliquam nobis est temporibus sunt ab inventore officiis aut voluptatibus.</p> -->
                <!-- <a href="#" class="readmore">Read more </a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-12 mb-4">
            <div class="card wow bounceInUp">
                <!-- <i class="fa fa-language"></i> -->
              <div class="card-body">
                <h5 class="card-title">MEMBERIKAN SOLUSI TERBAIK UNTUK PENGIRIMAN BARANG ANDA</h5>
              </div>
            </div>
          </div>

          <div class="col-lg-12 mb-4">
            <div class="card wow bounceInUp">
                <!-- <i class="fa fa-object-group"></i> -->
              <div class="card-body">
                <h5 class="card-title">LAYANAN DOOR TO DOOR DENGAN KETEPATAN WAKTU</h5>
              </div>
            </div>
          </div>

          <div class="col-lg-12 mb-4">
            <div class="card wow bounceInUp">
                <!-- <i class="fa fa-object-group"></i> -->
              <div class="card-body">
                <h5 class="card-title">BERBAGAI CAKUPAN SEKTOR INDUSTRI</h5>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12 mb-4">
            <div class="card wow bounceInUp">
                <!-- <i class="fa fa-object-group"></i> -->
              <div class="card-body">
                <h5 class="card-title">SUPPORT 24/7</h5>
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
          </div>
  
        </div>

      </div>
    </section>

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="{{ asset('template/img/testimonial-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('template/img/testimonial-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="{{ asset('template/img/testimonial-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="{{ asset('template/img/team-1.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="{{ asset('template/img/team-2.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="section-bg">

      <div class="container">

        <div class="section-header">
          <h3>Our CLients</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-1.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-2.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-3.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-4.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-5.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-6.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-7.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp d-flex justify-content-center">
          <div class="col-md-3">
            <div class="card box border border-primary">
              <div class="card-body">
                <h4 class="title">HEAD OFFICE :</h4>
                  <p class="description">
                  <span><i class="fas fa-home text-primary"></i>&nbsp Komplek Graha Cibinong Blok H No.1-2, Kel. Cirimekar, Kec. Cibinong, Kab. Bogor Jawa Barat - Indonesia 16917</span><br>
                  <span><i class="fas fa-phone text-primary"></i>&nbsp +62 21 8371 3286</span><br>
                  <span><i class="fas fa-envelope-open text-primary"></i>&nbsp cs@kayocean.com</span>
                  </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card box border border-primary">
              <div class="card-body">
                <h4 class="title">OPERATIONAL JAKARTA :</h4>
                  <p class="description">
                  <span><i class="fas fa-home text-primary"></i>&nbsp Jl. Raya Pelabuhan Lr.III No.4 Rt.01/04 Koja, Tanjung Priok, Jakarta Utara, DKI Jakarta - Indonesia 14210</span><br>
                  <span><i class="fas fa-phone text-primary"></i>&nbsp +62 21 2249 3031</span><br>
                  <span><i class="fas fa-envelope-open text-primary"></i>&nbsp priok.ofce@kayocean.com</span>
                  </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 ">
            <div class="card box border border-primary">
              <div class="card-body">
                <h4 class="title">OPERATIONAL SEMARANG :</h4>
                  <p class="description">
                  <span><i class="fas fa-home text-primary"></i> &nbsp Jl. Puri Anjasmoro, Tawangsari, kec. Semarang Barat, Kota Semarang Jawa Tengah - Indonesia 50144</span><br>
                  <span><i class="fas fa-phone text-primary"></i>&nbsp +62 24 7610 362</span><br>
                  <span><i class="fas fa-envelope-open text-primary"></i>&nbsp ops.srg@kayocean.com</span>
                  </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 ">
            <div class="card box border border-primary">
              <div class="card-body">
                <h4 class="title">WAREHOUSE :</h4>
                  <p class="description">
                  <span><i class="fas fa-home text-primary"></i> &nbsp Kawasan Olympic Industrial Estate CBD Sentul Blok J6 No.11 Kab. Bogor Jawa Barat - Indonesia 16810</span><br>
                  <span><i class="fas fa-phone text-primary"></i>&nbsp +62 21 8371 3286</span><br>
                  <span><i class="fas fa-envelope-open text-primary"></i>&nbsp ops.gudang@kayocean.com</span>
                  </p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>
  @endsection

  @section('after-script')
  <script>
    $('.select2').select2({
           minimumInputLength: 2,
           allowClear: true,
           placeholder: 'masukkan nama propinsi',
           ajax: {
              dataType: 'json',
              url: "{{ route('search-city') }}",
              delay: 300,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
                console.log(data, page);
              return {
                results: data
              };
            },
          }
      });

    const btnCekHarga = $('#btn-cekharga');
    const form = $('.cek-harga').find('form');
    const alert =  form.children('.alert');

    btnCekHarga.on('click', function(evt) {
      evt.preventDefault();
      $.ajax({
        url: "{{ route('get-price') }}",
        dataType: "JSON",
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
        },
        data: {
          from_city_id : $("select[name='from_city_id']").val(),
          to_city_id   : $("select[name='to_city_id']").val(),
        },
        beforeSend: function(data) {
          btnCekHarga.attr('disabled','disabled');
          btnCekHarga.html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp Mengecek Harga...
                        `);
        },
        complete: function (data, txt, xhr) {
          btnCekHarga.removeAttr('disabled');
          btnCekHarga.html('Cek Harga');
          alert.removeClass('d-none');
          
        },
        success: function(data, txt) {
          alert.text('Rp. ' + data.price);
          
          if (alert.hasClass('alert-danger'))
            alert.removeClass('alert-danger');

          if (!alert.hasClass('alert-info')) 
            alert.addClass('alert-info');
        },
        error: function(obj, txt, err) {
          alert.text(err);

          if (alert.hasClass('alert-info'))
            alert.removeClass('alert-info');

          if (!alert.hasClass('alert-danger'))
            alert.addClass('alert-danger');
          
        }
      });
    });
  </script>
  @endsection