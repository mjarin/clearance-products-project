<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title> {{ __('Billing Invoice') }} </title> --}}
    <title>{{config('app.Name','BD Clearence')}}</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/images/logo-bdclearence.jpeg') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">
</head>

<body>


<style>
    * {
        font-family: 'Roboto', sans-serif;
        line-height: 26px;
        font-size: 15px;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    /*=========================================================
      [ Table ]
    =========================================================*/

    .custom--table {
        width: 100%;
        color: inherit;
        vertical-align: top;
        font-weight: 400;
        border-collapse: collapse;
        border-bottom: 2px solid #ddd;
        margin-top: 0;
    }
    .table-title{
        font-size: 24px;
        font-weight: 600;
        line-height: 32px;
        margin-bottom: 10px;
    }
    .custom--table thead {
        font-weight: 700;
        background: inherit;
        color: inherit;
        font-size: 16px;
        font-weight: 500;
    }

    .custom--table tbody {
        border-top: 0;
        overflow: hidden;
        border-radius: 10px;
    }
    .custom--table thead tr {
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
        text-align: left;
    }
    .custom--table thead tr th {
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
        text-align: left;
        font-size: 16px;
        padding: 10px 0;
    }
    .custom--table tbody tr {
        vertical-align: top;
    }
    .custom--table tbody tr td {
        font-size: 14px;
        line-height: 18px
        vertical-align: top;
    }
    .custom--table tbody tr td:last-child{
        padding-bottom: 10px;
    }
    .custom--table tbody tr td .data-span {
        font-size: 14px;
        font-weight: 500;
        line-height: 18px;
    }
    .custom--table tbody .table_footer_row {
        border-top: 2px solid #ddd;
        margin-bottom: 10px !important;
        padding-bottom: 10px !important;

    }
    /* invoice area */
    .invoice-area {
        padding: 4%;
    }

    .invoice-wrapper {
        max-width: 650px;
        margin: 0 auto;
        box-shadow: 0 0 10px #f3f3f3;
        padding: 3%;
    }

    .invoice-header {
        margin-bottom: 40px;
    }

    .invoice-flex-contents {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
    }

    .invoice-logo {}

    .invoice-logo img {}

    .invoice-header-contents {
        float: right;
    }

    .invoice-header-contents .invoice-title {
        font-size: 40px;
        font-weight: 700;
    }

    .invoice-details {
        margin-top: 17px;
    }

    .invoice-details-flex {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
    }

    .invoice-details-title {
        font-size: 24px;
        font-weight: 700;
        line-height: 32px;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .invoice-single-details {}

    .details-list {
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 10px;
    }

    .details-list .list {
        font-size: 14px;
        font-weight: 400;
        line-height: 18px;
        color: #666;
        margin: 0;
        padding: 0;
        transition: all .3s;
    }
    .details-list .list strong {
        font-size: 14px;
        font-weight: 500;
        line-height: 18px;
        color: #666;
        margin: 0;
        padding: 0;
        transition: all .3s;
    }

    .details-list .list a {
        display: inline-block;
        color: #666;
        transition: all .3s;
        text-decoration: none;
        margin: 0;
        line-height: 18px
    }

    .item-description {
        margin-top: 10px;
    }

    .products-item {
        text-align: left;
    }

    .invoice-total-count {}

    .invoice-total-count .list-single {
        display: flex;
        align-items: center;
        gap: 30px;
        font-size: 16px;
        line-height: 28px;
    }

    .invoice-total-count .list-single strong {}

    .invoice-subtotal {
        border-bottom: 2px solid #ddd;
        padding-bottom: 15px;
    }

    .invoice-total {
        padding-top: 10px;
    }

    .terms-condition-content {
        margin-top: 30px;
    }

    .terms-flex-contents {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .terms-left-contents {
        flex-basis: 50%;
    }

    .terms-title {
        font-size: 18px;
        font-weight: 700;
        color: #333;
        margin: 0;
    }

    .terms-para {
        margin-top: 10px;
    }

    .invoice-footer {}

    .invoice-flex-footer {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 30px;
    }

    .single-footer-item {
        flex: 1;
    }

    .single-footer {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .single-footer .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 30px;
        font-size: 16px;
        background-color: #000e8f;
        color: #fff;
    }

    .icon-details {
        flex: 1;
    }

    .icon-details .list {
        display: block;
        text-decoration: none;
        color: #666;
        transition: all .3s;
        line-height: 24px;
    }
</style>

<!-- Invoice area Starts -->
<div class="invoice-area">
    <div class="invoice-wrapper" style="">
        <div class="invoice-header">
            <div class="invoice-flex-contents" >
                <div class="invoice-logo">
                    <img src="{{ asset('assets/images/logo-bdclearence.jpeg') }}" 
                    width="100" height="100" alt="img">

                </div>
                <div class="invoice-header-contents" style="float:right;margin-top:-50px;">
                    <h4 class="invoice-title">{{ __('INVOICE') }}</h4>
                </div>
            </div>
        </div>
        <div class="invoice-details">
            <div class="invoice-details-flex">
                <div class="invoice-single-details">
                    <h5 class="invoice-details-title">{{ __('Bill To:') }}</h5>
                    <ul class="details-list">
                        <li class="list"> {{ $order->customer_name }} </li>
                        <li class="list"> <a href="#"> {{ $order->phone }} </a> </li>
                        <li class="list"> <a href="#">{{$order->shipping_address}}</a> </li>
                    </ul>
                </div>
                <div class="invoice-single-details" style="float:right;margin-top:7px;">
                    <h6 class="invoice-details-title"></h6>
                    <ul class="details-list">
                        <li class="list"> <strong>{{ __('Order Id:') }}:{{$order->id}} </strong><br>
                             
                            <span class="data-span"> {{ __('Order Date:') }} </span>{{Carbon\Carbon::parse($order->order_date)->format('Y-m-d')}}<br> <br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="item-description">
            <h5 class="table-title">{{ __('Order Items') }}</h5>
            <table class="custom--table">
                <thead>
                <tr>
                    <th>{{ __('Item') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Unit Price') }}</th>
                    <th>{{ __('Quantity') }}</th>

                </tr>

                </thead>
                <tbody>
                <tr>
                    @foreach ($order_item as $data)  
                    <td>
                        <img src="{{ asset('assets/images/'.$data->products->image) }}" width="50" height="50">
                    </td>

                    <td>{{$data->products->name}}</td>
                    <td>{{$data->unit_price}}</td>
                    <td>{{$data->qty}}</td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>{{ __('Sub Total') }}</b></td>
                    <td><b>{{$order->total_price}}</b></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="item-description">
            <div class="table-responsive">
                <h5 class="table-title">{{ __('Orders Details') }}</h5>
                <table class="custom--table">
                    <thead class="head-bg">
                    <tr>
                        <th>{{ __('Buyer Details') }}</th>
                        <th>{{ __('Delivery Date') }}</th>
                        <th>{{ __('Amount Details') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <span class="data-span"> {{ __('Name: ') }}</span>{{ $order->customer_name }}<br>
                            <span class="data-span"> {{ __('Phone: ') }}{{$order->phone}} <br>
                            <span class="data-span"> {{ __('Address: ') }}</span>{{$order->shipping_address}} 
                        </td>
                        <td>
                            {{-- {{Carbon\Carbon::parse($order->order_date)->format('Y-m-d')}}<br> --}}
                            
                        </td>
                        <td>
                            <span class="data-span"> {{ __('Sub Total:') }} </span>{{$order->total_price}} <br>
                            <span class="data-span"> {{ __('Delivery Charge:') }} </span>{{$order->delivery_charge}} <br>
                            <span class="data-span"> {{ __('Tax:') }} </span>$ 0<br>
                            <span class="data-span"> {{ __('Total:') }} </span>{{$order->grand_total}}<br>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <p style="text-align: center; margin-top:5%;">
                bdclearance.com <br> 
                Flat# D-1 (1st Floor),House# 345,
                Afsar Tower(Opposit of Eastern Mollika),<br>
                Elephant Road, Dhaka - 1205
            </p>
        </footer>

    </div>
</div>

<!-- Invoice area end -->

</body>

</html>