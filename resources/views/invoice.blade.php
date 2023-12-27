@include('components.navbar')
@include('components.footer')

@yield('navbar')
<div class="invoice invoice-content invoice-1">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="{{route('orders')}}">Orders</a>
                <span></span> Order detail
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner">
                    <div class="invoice-info" id="invoice_wrapper">

                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-lg-9 col-md-6">
                                    <div class="invoice-number">
                                        <h4 class="invoice-title-1 mb-10">Invoice To</h4>
                                        <p class="invoice-addr-1">
                                            <strong>{{ $invoice->user->name }}</strong> <br>
                                            {{ $invoice->user->email }} <br>
                                            {{ $invoice->user->address }} <br>{{ $invoice->user->town }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-9 col-md-6">
                                    <h4 class="invoice-title-1 mb-10">Due Date:</h4>
                                    <p class="invoice-from-1">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('m/d/Y H:i:s') }}
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                    <p class="invoice-from-1">{{ $invoice->payment_method }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-center">
                            <div class="table-responsive">
                                <table class="table table-striped invoice-table">
                                    <thead class="bg-active">
                                        <tr>
                                            <th>Item name</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach (json_decode($invoice->item_names) as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{$item}}</span>
                                                       
                                                    </div>
                                                </td>
                                                <td class="text-center">Kshs {{json_decode($invoice->item_prices)[$loop->index]}}</td>
                                                <td class="text-center">{{json_decode($invoice->item_quantities)[$loop->index]}}</td>

                                                <td class="text-right">Kshs {{json_decode($invoice->item_totals)[$loop->index]}}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="{{route('orders')}}" class="btn btn-lg btn-custom hover-up"> Back </a>
                        <a href="javascript:window.print()" id="invoice_download_btn"
                            class="btn btn-lg btn-custom btn-print hover-up"> <img
                                src="assets/imgs/theme/icons/icon-print.svg" alt=""> Print </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('footer')
