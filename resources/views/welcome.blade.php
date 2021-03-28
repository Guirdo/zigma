@extends('layouts.guest')

@section('content')

    <div class="text-center">
        <img class="img-fluid rounded" src="{{ asset('img/sophia_logo_lx.jpg') }}" height="70%" width="70%">
    </div>
    
    <div class="row justify-content-around mt-3 mb-2">
        <div>
            <a href="https://www.facebook.com/Sophia-Academy-1448563355277565" target="_blank">
                <img src="https://facebookbrand.com/wp-content/uploads/2019/04/f_logo_RGB-Hex-Blue_512.png?w=64&h=64" alt="">
            </a>
        </div>

        <div>
            <a href="https://www.instagram.com/academysophia/" target="_blank">
                <img src="https://facebookbrand.com/wp-content/uploads/2021/03/Instagram_AppIcon_Aug2017.png?w=64&h=64" alt="">
            </a>
        </div>
    </div>

@endsection
