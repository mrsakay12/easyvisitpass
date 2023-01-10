<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Easy Visit Pass</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Box Icons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}"  />
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img
           src="{{ asset('/Images/logo3.png') }}"
            alt="logo"
            width="50"
            height="50"
            class="d-inline-block align-middle"
          />
          <span>EV</span><span class="span-pass"> - Pass</span>
        </a>
        <button
          class="navbar-toggler shadow-none"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="#"
              >Have Appointment</a
            >
            <a class="nav-link" href="return.html">Been Here Before</a>
          </div>
          <a href="#" class="btn btn-primary shadow-none">Login</a>
        </div>
      </div>
    </nav>

    <!-- HERO SECTION -->

    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col md-6">
            <div class="copy">
              <div class="text-label-h4">
                <h4>Visitor Details</h4>
              </div>
            </div>
            <form action="method">
              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >First Name<span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                    aria-label="First name"
                  />
                </div>
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Last Name<span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                    aria-label="Last name"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Select Employee<span class="text-danger">*</span></label
                  >
                  <select
                    class="form-select"
                    aria-label="Default select example"
                  >
                    <option selected>Select Employee</option>
                    <option value="1">Michael Sakay (Team Lead)</option>
                    <option value="2">John Aldrine Ilao</option>
                    <option value="3">Normita Burce</option>
                  </select>
                </div>
                <div class="col">
                  <label class="label-css" for=""
                    >Phone <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    name="phone"
                    id="phone"
                    class="form-control input-css"
                    value=""
                  />
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Email<span class="text-danger">*</span></label
                  >
                  <input type="email" class="form-control" id="inputEmail4" />
                </div>
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Gender<span class="text-danger">*</span></label
                  >
                  <select
                    class="form-select"
                    aria-label="Default select example"
                  >
                    <option selected>Male</option>
                    <option value="1">Female</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >Company Name<span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                    aria-label="First name"
                  />
                </div>
                <div class="col">
                  <label for="inputEmail4" class="form-label"
                    >National ID No.<span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                    aria-label="Last name"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Purpose<span class="text-danger">*</span></label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                    ></textarea>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Address</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="cta">
                <a href="#" class="btn btn-cancel-red shadow-none">Cancel</a>
                <a href="#" class="btn btn-secondary shadow-none float-lg-end"
                  >Continue</a
                >
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <img src="img/hero-section.png" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
