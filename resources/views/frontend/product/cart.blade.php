@extends('layouts.frontend')
@section('content')
@section('page_title', trans('app.cart'))
@section('breadcrumb')
@section('styles')

    <style>
        .rwd-table {
            width: -webkit-fill-available;
            margin: auto;
            min-width: 300px;
            max-width: 100%;
            border-collapse: collapse;
        }

        .rwd-table tr:first-child {
            border-top: none;
            background: rgb(68,88,138);
            color: #fff;
        }

        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            background-color: rgb(229,229,229);
        }

        .rwd-table tr:nth-child(odd):not(:first-child) {
            background-color: rgb(229,229,229);
        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            margin-top: .5em;
        }

        .rwd-table td:last-child {
            margin-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 120px;
            display: inline-block;
            color: #000;
        }

        .rwd-table th,
        .rwd-table td {
            text-align: left;
        }

        .rwd-table {
            color: #333;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #bfbfbf;
        }

        .rwd-table th,
        .rwd-table td {
            padding: .5em 1em;
        }
        @media screen and (max-width: 601px) {
            .rwd-table tr:nth-child(2) {
                border-top: none;
            }
        }
        @media screen and (min-width: 600px) {
            .rwd-table tr:hover:not(:first-child) {
                background-color: rgb(229,229,229);
            }
            .rwd-table td:before {
                display: none;
            }
            .rwd-table th,
            .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }
            .rwd-table th:first-child,
            .rwd-table td:first-child {
                padding-left: 0;
            }
            .rwd-table th:last-child,
            .rwd-table td:last-child {
                padding-right: 0;
            }
            .rwd-table th,
            .rwd-table td {
                padding: 1em !important;
            }
        }

        .order{

            background: var(--clr-1-hover);
            padding: 10px;
            font-size: larger;
            font-weight: bold;
            color: white;
        }

    </style>
@endsection

@endsection


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">


                <form method="post">
                   @csrf
                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ trans('app.cart')}}

                            </div>
                            @if(!empty(session('cart')))
                            <div style="position: absolute;left: 20px;" class="perview-btns" >
                            <button type="submit" class="perview-btn audio-btn">
                                {{trans('app.renew_cart')}}
                            </button>
                            </div>
                            @endif

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content ">
                                @if(!empty(session('cart')))


                                <table class="rwd-table">
                                    <tbody>
                                    <tr>
                                        <th>{{trans('app.product')}}</th>
                                        <th>{{trans('app.qty')}}</th>
                                        <th>{{trans('app.price')}}</th>
                                        <th>{{trans('app.total')}}</th>
                                        <th></th>
                                    </tr>
                                    @foreach(session('cart')['products'] as $id => $details)
                                    <tr>
                                        <td data-th="Supplier Code">
                                            {{$details['name']}}
                                        </td>
                                        <td data-th="Supplier Name">
                                            <input type="hidden" name="ids[]" value="{{$details['product_id']}}">
                                           <input type="number" name="qty[]" value="{{$details['quantity']}}">
                                        </td>
                                        <td data-th="Invoice Number">
                                            {{$details['price']}}
                                        </td>
                                        <td data-th="Invoice Date">
                                           {{$details['quantity'] * $details['price']}}
                                        </td>
                                        <td><a style="color: red;" href="{{url('cart/remove').'/'.$details['product_id']}}">{{trans('app.remove')}}</a></td>

                                    </tr>
                                     @endforeach
                                    </tbody>
                                </table>


                                 @else
                                    <h2>{{trans('app.empty_cart')}}</h2>
                                 @endif

                            </div>
                        </div>

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                <a href="{{url('product')}}" class="perview-btn audio-btn">
                                    {{trans('app.cont_shopping')}}
                                </a>

                            </div>
                            @if(!empty(session('cart')))
                            <div style="position: absolute;left: 20px;" class="perview-btns" >
                                <a href="{{url('/order')}}"  class="order">
                                    {{trans('app.make_order')}}
                                </a>
                            </div>
                            @endif

                        </div>

                    </div>
                </div>
                </form>






            </div>
        </div>
    </div>
</section>
@endsection