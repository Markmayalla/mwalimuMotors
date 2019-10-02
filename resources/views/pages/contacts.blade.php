@extends('includes/layout', ['class'=>'hero-banner project-bg'])
@section('main_content')


<div class="container">
      <h2 class="section-intro__subtitle">Contact Us</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Home</a>
        <span class="btn btn--rightBorder">Contact</span>
      </div>
    </div>
  </header>


  <section class="section-margin">
    <div class="container">
      <!-- google map start -->
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 420px;">
            <iframe src="https://www.google.com/maps/d/embed?mid=1rqtsHvKsADDSEoD11O5-KVmgGmJKqwlN" width="100%" height="420px"></iframe>
        </div>

      </div>
      <!-- google map end -->


      <div class="row align-items-center">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">

          <div class="media contact-info">
            <span class="contact-info__icon"><i class="lnr lnr-phone-handset"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">+25 (522) 2617 489</a></h3>
              <p>Mon to Fri 8am to 5pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="lnr lnr-envelope"></i></span>
            <div class="media-body">
              <h3><a href="mailto:salem@salem.co.tz">salem@salem.co.tz</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" type="text" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" type="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="6" placeholder="Enter Message"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right">
              <button type="submit" class="btn active btn--leftBorder">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  


@endsection