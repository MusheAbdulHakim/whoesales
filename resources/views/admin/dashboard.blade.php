@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
<link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
<!-- This page CSS -->
<link href="{{asset('dist/css/pages/dashboard1.css')}}" rel="stylesheet">
@endpush

@section('content')
<!-- ============================================================== -->
<!-- Sales Summery -->
<!-- ============================================================== -->
<div class="row">
    <div class="col l3 m6 s12">
        <div class="card danger-gradient card-hover">
            <div class="card-content">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2 class="white-text m-b-5">{{App\Models\User::count()}}</h2>
                        <a href="{{route('users.index')}}"><h6 class="white-text op-5 light-blue-text">Users</h6></a>
                    </div>
                    <div class="ml-auto">
                        <span class="white-text display-6"><i class="material-icons">group</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col l3 m6 s12">
        <div class="card info-gradient card-hover">
            <div class="card-content">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2 class="white-text m-b-5">{{App\Models\Purchase::count()}}</h2>
                        <a href="{{route('purchases.index')}}"><h6 class="white-text op-5">Purchases</h6></a>
                    </div>
                    <div class="ml-auto">
                        <span class="white-text display-6"><i class="material-icons">add_shopping_cart</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    
    <div class="col l3 m6 s12">
        <div class="card success-gradient card-hover">
            <div class="card-content">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2 class="white-text m-b-5">100</h2>
                        <h6 class="white-text op-5 text-darken-2">Sales</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="white-text display-6"><i class="material-icons">equalizer</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col l3 m6 s12">
        <div class="card warning-gradient card-hover">
            <div class="card-content">
                <div class="d-flex no-block align-items-center">
                    <div>
                        <h2 class="white-text m-b-5">450</h2>
                        <h6 class="white-text op-5">Revenue</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="white-text display-6"><i class="material-icons">attach_money</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales Summery -->
<!-- ============================================================== -->
<div class="row">
    <div class="col s12 l8">
        <div class="card">
            <div class="card-content">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title">Yearly Sales</h5>
                    </div>
                    <div class="ml-auto">
                        <ul class="list-inline font-12 dl m-r-10">
                            <li class="cyan-text"><i class="fa fa-circle"></i> Earnings</li>
                            <li class="blue-text text-accent-4"><i class="fa fa-circle"></i> Sales</li>
                        </ul>
                    </div>
                </div>
                <!-- Sales Summery -->
                <div class="p-t-20">
                    <div class="row">
                        <div class="col s12">
                            <div id="sales" style="height: 332px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 l4">
        <div class="card card-hover">
            <div class="card-content">
                <div class="d-flex align-items-center">
                    <div class="m-r-20">
                        <h1 class=""><i class="ti-light-bulb"></i></h1></div>
                    <div>
                        <h3 class="card-title">Sales Analytics</h3>
                        <h6 class="card-subtitle">March  2017</h6> </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col s6">
                        <h3 class="font-light m-t-10"><sup><small><i class="ti-arrow-up"></i></small></sup>35487</h3>
                    </div>
                    <div class="col s6 right-align">
                        <div class="p-t-10 p-b-10">
                            <div class="spark-count" style="height:65px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-hover">
            <div class="card-content">
                <div class="d-flex align-items-center">
                    <div class="m-r-20">
                        <h1 class=""><i class="ti-pie-chart"></i></h1></div>
                    <div>
                        <h3 class="card-title">Bandwidth usage</h3>
                        <h6 class="card-subtitle">March  2017</h6> 
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col s6">
                        <h3 class="font-light m-t-10">50 GB</h3>
                    </div>
                    <div class="col s6 p-t-10 p-b-20 right-align">
                        <div class="p-t-10 p-b-10 m-r-20">
                            <div class="spark-count2" style="height:65px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- product sales anf active users -->
<!-- ============================================================== -->
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title">Recent Sales</h5>
                        <h6 class="card-subtitle">Sales on products we have</h6>
                    </div>
                    <div class="ml-auto">
                        <div class="input-field dl support-select">
                            <select>
                                <option value="0" selected>10 Mar - 10 Apr</option>
                                <option value="1">10 Apr - 10 May</option>
                                <option value="2">10 May - 10 Jun</option>
                                <option value="3">10 Jun - 10 Jul</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive m-b-20">
                    <table class="">
                        <thead>
                            <tr>
                                <th>Executives</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Progress</th>
                                <th>Sales</th>
                                <th>Earned</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex no-block align-items-center">
                                        <div class="m-r-10"><img src="../../assets/images/users/d1.jpg" alt="user" class="circle" width="45" /></div>
                                        <div class="">
                                            <h5 class="m-b-0 font-16 font-medium">Hanna Gover</h5><span>hgover@gmail.com</span></div>
                                    </div>
                                </td>
                                <td>
                                    <p class="">Elite Admin</p>
                                </td>
                                <td class="blue-grey-text text-darken-4 font-medium">$96K</td>
                                <td>May 23, 2018</td>
                                <td><span class="label label-info">Sale</span></td>
                                <td class="green-text"><i class="fa fa-arrow-up"></i> 23%</td>
                                <td>2356</td>
                                <td class="blue-grey-text  text-darken-4 font-medium">$96K</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex no-block align-items-center">
                                        <div class="m-r-10"><img src="../../assets/images/users/d2.jpg" alt="user" class="circle" width="45" /></div>
                                        <div class="">
                                            <h5 class="m-b-0 font-16 font-medium">Daniel Kristeen</h5><span>Kristeen@gmail.com</span></div>
                                    </div>
                                </td>
                                <td>
                                    <p class="">Real Homes WP Theme</p>
                                </td>
                                <td class="blue-grey-text text-darken-4 font-medium">$85K</td>
                                <td>May 23, 2018</td>
                                <td><span class="label cyan">Extended</span></td>
                                <td class="green-text"><i class="fa fa-arrow-up"></i> 12%</td>
                                <td>2198</td>
                                <td class="blue-grey-text  text-darken-4 font-medium">$85K</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex no-block align-items-center">
                                        <div class="m-r-10"><img src="../../assets/images/users/d3.jpg" alt="user" class="circle" width="45" /></div>
                                        <div class="">
                                            <h5 class="m-b-0 font-16 font-medium">Julian Josephs</h5><span>Josephs@gmail.com</span></div>
                                    </div>
                                </td>
                                <td>
                                    <p class="">MedicalPro WP Theme</p>
                                </td>
                                <td class="blue-grey-text text-darken-4 font-medium">$81K</td>
                                <td>May 23, 2018</td>
                                <td><span class="label label-primary">Multiple</span></td>
                                <td class="orange-text"><i class="fa fa-arrow-down"></i> 07%</td>
                                <td>1237</td>
                                <td class="blue-grey-text  text-darken-4 font-medium">$76K</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex no-block align-items-center">
                                        <div class="m-r-10"><img src="../../assets/images/users/2.jpg" alt="user" class="circle" width="45" /></div>
                                        <div class="">
                                            <h5 class="m-b-0 font-16 font-medium">Jan Petrovic</h5><span>hgover@gmail.com</span></div>
                                    </div>
                                </td>
                                <td>
                                    <p class="">HostinPress Html</p>
                                </td>
                                <td class="blue-grey-text text-darken-4 font-medium">-$30K</td>
                                <td>May 23, 2018</td>
                                <td><span class="label label-warning">Tax</span></td>
                                <td class="green-text"><i class="fa fa-arrow-up"></i> 25%</td>
                                <td>1956</td>
                                <td class="blue-grey-text  text-darken-4 font-medium">$90K</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="javascript: void(0)"><i class="fas fa-angle-right"></i> View Complete Report</a>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->

@endsection

@push('page-js')
<script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboards/dashboard1.js')}}"></script> 
@endpush