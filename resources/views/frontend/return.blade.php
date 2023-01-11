@extends('frontend\frontbar')

@section('content')

    <!-- HERO SECTION -->
   
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col md-6">
            <div class="copy">
              <div class="text-label-h4">
                <h4>Return Visitor Details</h4>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="control-label heading mb-1"
                >Visitor's Email or Phone or NID<span class="text-danger"
                  >*</span
                ></label
              >
              <input
                class="form-control input mb-4"
                id="email"
                placeholder="Search email , phone or national ID.."
                name="email"
                type="text"
                required
              />
            </div>
            <div class="cta">
              <a  href="\home" class="btn btn-cancel-red shadow-none">Cancel</a>
              <a href="#" class="btn btn-secondary shadow-none float-lg-end"
                >Continue</a
              >
            </div>
          </div>
          <div class="col-md-6">
            <img src="img/hero-section.png" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </section>
    @endsection