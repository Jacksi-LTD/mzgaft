@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('app.orders') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.book.fields.id') }}
                        </th>
                        <td>
                            {{ $order->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.name') }}
                        </th>
                        <td>
                            {{ $order->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.phone') }}
                        </th>
                        <td>
                            {{ $order->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.email') }}
                        </th>
                        <td>
                            {{ $order->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('app.address') }}
                        </th>
                        <td>
                            {{ $order->address }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>#</th>
                    <th>{{trans('app.product')}}</th>
                    <th>{{trans('app.qty')}}</th>
                    <th>{{trans('app.price')}}</th>
                    <th>{{trans('app.total')}}</th>
                </tr>
                @foreach($order->items as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{@$item->product->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->total}}</td>
                </tr>
                @endforeach

            </table>
            <h2>{{trans('app.net')}} : {{@$order->items->sum('total')}}</h2>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection