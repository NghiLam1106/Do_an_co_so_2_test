@extends('Admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
        </ul>
    </div>

    <div class="cart">
        @php
            $total = 0;
        @endphp
        <table class="table">
            <tbody>
                <tr class="table_head">
                    <th class="column-1">Product</th>
                    <th class="column-2"></th>
                    <th class="column-3">Price</th>
                    <th class="column-4">Quantity</th>
                    <th class="column-5">Thành tiền</th>
                </tr>

                @foreach ($carts as $item)
                    @php
                        $price = $item->price;
                        $endPrice = $price * $item->pty;
                        $total += $endPrice;
                    @endphp
                    <tr class="table_row">
                        <td class="column-1">
                            <div class="how-itemcart1">
                                <img src="{{ $item->product->hinhanh }}" alt="IMG" width="100">
                            </div>
                        </td>
                        <td class="column-2">{{ $item->name }}</td>
                        <td class="column-3">{{ number_format($price) }}</td>
                        <td class="column-4">{{ $item->pty }}</td>
                        <td class="column-5">{{ number_format($endPrice) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
