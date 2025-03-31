@extends('frontend.layouts.app')
@section('style')
<style>
    .coming-soon {
        display: flex;
        justify-content: center;
        align-items: center;

        text-align: center;
        background-color: #f8f9fa;
    }
    .coming-soon h1 {
        font-size: 3rem;
        color: #333;
    }
    .coming-soon p {
        font-size: 1.5rem;
        color: #666;
    }
</style>
@endsection


@section('content')
<div class="coming-soon">
    <div>
        <h1>Coming Soon</h1>
        <p>We're working hard to bring you something amazing. Stay tuned!</p>
    </div>
</div>
@endsection

@section('script')
@endsection
