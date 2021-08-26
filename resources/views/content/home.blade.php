@extends('partials.sidebar')
@section('content')
<body>
    <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-md-1 col-sm-2 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <div class="col-md-4 mt-2">
                        <div class="">
                            <form action="/search" type="get">
                                <input class="srch col-md-6" name="query" type="search" placeholder="search" >
                                <button class="btn btn-danger" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-4 clearfix mt-3">
                        <a href="{{route('logout')}}">
                            <ul class="notification-area pull-right">
                                <li class="dropdown" style="margin-top: 30%">
                                <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </a>
                    </div>
                    
                </div>
            </div>
            <!-- header area end -->

            {{--  Judul Content  --}}
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">{{__("multilang.companies")}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            {{--  content  --}}
            <div class="container-fluid" >
                <div class="d-flex justify-content-center">
                    <div class="card col-sm-8 text-center ">
                        <div class="card-header">
                          Youre Profile
                        </div>
                        <div class="card-body">
                          <h5 class="card-title" style="text-align: center">{{Auth::guard('employe')->user()->fullname}}</h5>
                          <p class="" style="text-align: center">Email : {{Auth::guard('employe')->user()->email}}</p>
                          <p class="" style="text-align: center">Phone : {{Auth::guard('employe')->user()->phone}}</p>
                          @foreach ($companies as $company)
                              <p style="text-align: center">Company Name : {{$company->name}}</p>
                          @endforeach
                          <div class="text-center">
                            <a href="#" class="btn btn-primary" >Cek Detail</a>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div>
                <table class="table" style="width: 70%; margin-left: 15%; margin-top: 5%">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                      </tr>
                    </thead>
                    @foreach ($employe as $item)
                    <tbody>
                        <tr>
                            <td>{{$item->first_name}}</td>
                            @foreach ($companies as $c)
                                <td>{{$c->name}}</td>
                            @endforeach
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        
</body>
@endsection