@extends('frontend\frontbar')

@section('content')



<div class="main" data-mobile-height="" >
            <section id="pm-banner-1" class="custom-css-step">
                <table id="example-table">
        <div class="container" >
                <div class="card border-0" style="margin-top:40px;">
                    <div class="card-body">
                                                                <div class="card" style="border: 0;">

                                                                <p>Note : Take a capture , screenshot or download, This will be presented on Frontdesk. <p>
                                        <div class="card-body">
                                            <div class="id-card-hook"></div>
                                            <div class="img-cards" id="printidcard">
                                                <div class="id-card-holder">
                                                    <div class="id-card">
                                                    @foreach($company['data'] as $company)
                                                    <h2 ><strong>{{$company->comp_name}} </strong> </h2>
                                                       
                                                    <h3>Location : {{$company->comp_add}}</h3>   
                                                    @endforeach
                                                         <hr>
                                                        <h2 >Visitor Pass ID : </h2>
                                                     <h2 class="text-danger">{{$visitor->visitor_code}} </h2>
                                                        <h2 >{{$visitor->visitor_lastname}}, {{$visitor->visitor_firstname}} </h2>
                                                      
                                                        
                                                        <h2>VISITED TO</h2>
                                                        <h3>Host: {{$visitor->meetperson->name}}</h3>
                                                        <h3>Purpose: {{$visitor->visitor_purpose}}</h3>
                                                        <hr>
                                                        <p> Powered by:</p>
                                                        <p><strong>Easy Visitor Pass </strong></p>
                                                        <p><strong> </strong></p>
                                                         <p> E-mail: admin@easyvisitpass.com </p>
                                                       
                                                    </div>
                                                </div>
                                                <div class="row justify-content-md-center">
                                                <div class="col-md-3">
                                                    <div style="margin-top: 10px;" class="justify-content-center">
                                                        <div class="btn-group btn-group-justified">
                                                            <a href="\checkin" class="btn btn-primary text-white">
                                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                                            </a>
                                                                                                                        <a href="#" id="print" class="btn btn-success text-white">
                                                                <i class="fa fa-print" aria-hidden="true"></i> Download
                                                            </a >
                                                           
                                                                                                                        <a href="\home" class="btn btn-danger text-white ">
                                                                <i  href="\evpass-cdo" class="fa fa-home" aria-hidden="true"></i> Home
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
</table>

                                           
                                        </div>
                                    </div>
                                                    </div>
                </div>
        </div>
    </section>
    </div>

    <script src="html2canvas.min.js" ></script>
    <script>
        documemt.getElementById("dl-png").onclick = function () {
            const screenshotTarget = document.getElementById('example-table');

            html2canvas(screenshotTarget).then((canvas) => {
                const base64image = canvas.toDataURL("image/png");
                var anchor = documemt.createElement('a');
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "evpasscard.png");
                anchor.click();
                anchor.remove();
            });

        };
    </script>

    <!-- Main Content -->



   
 
 
   
 
    
  

   

<!-- Scripts -->

    @endsection