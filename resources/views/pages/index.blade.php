@extends('layouts.masterlayout')

@section('content')
<div class="bg-img">
            <div class="container-fluid">
              <div class="row p-lg-5">
                <div class="col-lg-6 col-md-6 col-sm-12 p-lg-5">
                  <div class="px-lg-5">
                    <h3 class="index-h1">Purchase and Sale Of Pre-Owned Cars</h3>
                    <p class="index-p pt-1">
                      Are you looking for amazing pre-owned cars purchase and sale
                      services? Don’t worry! We got it for you!
                    </p>
                    <a href="#" class="custom-button">Buy a Car</a>
                    <h6 class="text-index pt-4">
                      Trade or sell your car now
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                      </svg>
                    </h6>
                  </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <img class="img-fluid" src="Images/4-2-car-png-hd 1.png" alt="car" />
                </div>
              </div>
              <div class="text-white d-flex justify-content-center align-items-center pb-1">
                <span><button class="index-button"></button></span>
                <span class="px-1"><button class="index-button bg-primary"></button></span>
                <span><button class="index-button"></button></span>
                <span class="px-1"><button class="index-button"></button></span>
              </div>
            </div>
          </div>
<!-- Reasons to Buy/Sale a Car -->
<div style="background-color: #fafafa">
  <div class="container d-flex justify-content-center py-5">
    <div style="width: 75%">
      <div class="row mx-auto justify-content-center">
        <h2 class="index-h2 text-center py-5">Reasons to Buy/Sale a Car</h2>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 pb-3">
            <div class="card rounded-4">
              <img class="card-img-top" src="Images/Group 1099.png" alt="Card image cap" />
              <div class="card-body" style="height: 170px">
                <p class="card-text custom-card">
                  3 month warranty on any mechanical issue which you can
                  extend to 12 months for and extra payment
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 pb-3">
            <div class="card rounded-4">
              <img class="card-img-top" src="Images/Rectangle 519 (1).png" alt="Card image cap" />
              <div class="card-body" style="height: 170px">
                <p class="card-text custom-card">
                  You don´t have to deal directly with the seller but
                  through Carsafe as intermediary
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 pb-3">
            <div class="card rounded-4">
              <img class="card-img-top" src="Images/Rectangle 519 (2).png" alt="Card image cap" />
              <div class="card-body" style="height: 170px">
                <p class="card-text custom-card">
                  Pre apply to a credit to pay for the car
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Our Featured Cars -->
<div class="container-fluid py-5 px-lg-5">
  <div class="row px-lg-5">
    <div class="col-6">
      <h2 class="text-hindex">Our Featured Cars</h2>
    </div>
    <div class="col-6 text-end">
      <img src="Images/Group 398.png" />
    </div>
  </div>
  <div class="row pt-5 px-lg-5">
    <div class="col-lg-3 col-md-6 col-sm-12 pb-3">
      <div class="card rounded-4" style="box-shadow: 0px 4px 100px rgba(1, 193, 250, 0.1)">
        <img class="card-img-top" src="Images/Rectangle 516.png" alt="Card image cap" />
        <div class="card-body" style="height: 165px">
          <h6 class="card-h6">Honda Accord EXL</h6>
          <p class="card-p">2015 - 105,360 km - Monterey</p>
          <span class="card-span1 pe-1">$256,999</span>
          <span class="card-span2">$256,999</span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-3">
      <div class="card rounded-4" style="box-shadow: 0px 4px 100px rgba(1, 193, 250, 0.1)">
        <img class="card-img-top" src="Images/Rectangle 516 (1).png" alt="Card image cap" />
        <div class="card-body" style="height: 165px">
          <h6 class="card-h6">Ford Edge SEL Plus</h6>
          <p class="card-p">2015 - 105,360 km - Monterey</p>
          <span class="card-span1 pe-1">$256,999</span>
          <span class="card-span2">$256,999</span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-3">
      <div class="card rounded-4" style="box-shadow: 0px 4px 100px rgba(1, 193, 250, 0.1)">
        <img class="card-img-top" src="Images/Rectangle 516 (2).png" alt="Card image cap" />
        <div class="card-body" style="height: 165px">
          <h6 class="card-h6">Jeep Grand Cherokee Summit HEMI</h6>
          <p class="card-p">2015 - 105,360 km - Monterey</p>
          <span class="card-span1 pe-1">$256,999</span>
          <span class="card-span2">$256,999</span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-3">
      <div class="card rounded-4" style="box-shadow: 0px 4px 100px rgba(1, 193, 250, 0.1)">
        <img class="card-img-top" src="Images/Rectangle 516 (3).png" alt="Card image cap" />
        <div class="card-body" style="height: 165px">
          <h6 class="card-h6">Audi A1 Hatch Back Cool</h6>
          <p class="card-p">2015 - 105,360 km - Monterey</p>
          <span class="card-span1 pe-1">$256,999</span>
          <span class="card-span2">$256,999</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- High Quality Output, Awesome Services -->
<div class="container-fluid ">
  <div class="row">
    <div class="col-12 text-center">
      <h3 class="index-h2 pt-5">High Quality Output,</h2>
        <h3 class="index-h2 pb-5">Awesome Services</h2>
    </div>
  </div>
  <div class="mainindex pb-5">
    <div class="container">
      <div class="row mx-lg-5 mx-md-0 ms-sm-5">
        <div class="col-lg-4 col-md-12 col-sm-12 pb-sm-5 ">
          <div class="card rounded-4" style="height: 400px; width: 280px;">
            <div class=" d-flex justify-content-center align-items-center">
              <img height="200px" width="200px" src="Images/Group 453.png">
            </div>
            <div class="card-body">
              <h3 class="card-h3 pb-3">Buy a used car</h3>
              <p class="card-text card-text2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 pb-sm-5">
          <div class="card rounded-4" style="height: 400px; width: 280px;">
            <div class=" d-flex justify-content-center align-items-center">
              <img height="200px" width="200px" src="Images/Group 454.png">
            </div>
            <div class="card-body">
              <h3 class="card-h3 pb-3">Buy a used car</h3>
              <p class="card-text card-text2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12  pb-sm-5 ">
          <div class="card rounded-4" style="height: 400px; width: 280px;">
            <div class="card-body d-flex justify-content-center align-items-center">
              <img src="Images/unnamed.jpg">
            </div>
            <div class="card-body">
              <h3 class="card-h3 pb-3">Buy a used car</h3>
              <p class="card-text card-text2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Manage -->
<div class="container-fluid px-5 py-5">
  <div class="row pt-5">
    <div class="col-lg-6 col-md-6 col-sm-12 px-lg-5  pb-5s">
      <h2 class="index-manage">Manage your purchase/</h2>
      <h2 class="index-manage">sale of pre-owned cars</h2>
      <h2 class="index-manage">with our app</h2>
      <div class="row pt-lg-4">
        <div class="col-lg col-12 d-flex align-items-center">
          <span class="pb-lg-3 pe-4"><img src="../Images/Vector.svg" class="img-fluid"></span>
          <div class="userinfo">
            <span class="span-manage">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit.</span>
            <p class="span-manage">Venenatis eget malesuada vulputate ante quam
              iaculis ac.</p>
          </div>
        </div>

      </div>
      <div class="row ">
        <div class="col-lg col-12 d-flex align-items-center">
          <span class="pb-lg-3 pe-4"><img src="../Images/Vector.svg" class="img-fluid"></span>
          <div class="userinfo">
            <span class="span-manage">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Elit ut </span>
            <p class="span-manage">mauris pharetra vitae, malesuada. Gravida
              phasellus quis vel.</p>
          </div>
        </div>

      </div>

      <div class="row pb-4">
        <div class="col-lg col-12 d-flex align-items-center">
          <span class="pb-lg-3 pe-4"><img src="../Images/Vector.svg" class="img-fluid"></span>
          <span class="span-manage"> Pre apply to a credit to pay for the car</span>
        </div>

      </div>
      <button class="custom-button2">Get To know the Car Safe</button>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 px-5 pb-5">
      <div class="manage-img">
        <img src="Images/homemanage.png" class="img-fluid  " style="position: relative; top: 40px;">
      </div>
    </div>
  </div>
</div>
@endsection




