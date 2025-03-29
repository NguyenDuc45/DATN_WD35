@extends('layouts.client')

@section('content')
<div class="container">
    <h2>Giao dịch thất bại!</h2>
    <p>Lý do: {{ isset($vnp_ResponseCode) ? $vnp_ResponseCode : 'Không xác định' }}</p>
    <p>Chi tiết: {{ isset($message) ? $message : 'Không có thông tin chi tiết' }}</p>
</div>
@endsection
