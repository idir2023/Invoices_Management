@extends('layouts.master2')
@section('title')
تسجيل الدخول
@endsection
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- La moitié de l'image -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{URL::asset('assets/img/media/login.webp')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- La moitié du contenu -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Contenu de démonstration -->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">ف<span>اليكس</span></h1></div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>مرحبًا مجددًا!</h2>
                                        <h5 class="font-weight-semibold mb-4">الرجاء تسجيل الدخول للمتابعة.</h5>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>البريد الإلكتروني</label> <input class="form-control" placeholder="أدخل بريدك الإلكتروني" name="email" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>كلمة المرور</label> <input class="form-control" placeholder="أدخل كلمة المرور الخاصة بك" name="password"  type="password">
                                            </div><button class="btn btn-main-primary btn-block">تسجيل الدخول</button>
                                            <div class="row row-xs">
                                                <div class="col-sm-6">
                                                    <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                        التسجيل باستخدام فيسبوك
                                                    </button>
                                                </div>
                                                <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                    <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>
                                                        التسجيل باستخدام تويتر
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="main-signin-footer mt-5">
                                            @if (Route::has('password.request'))
                                            <p><a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a></p>
                                            @endif
                                            <p>ليس لديك حساب؟ <a href="{{ url('/' . $page='register') }}">إنشاء حساب</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- النهاية -->
            </div>
        </div><!-- النهاية -->
    </div>
</div>
@endsection
@section('js')
@endsection