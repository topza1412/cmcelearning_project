<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<meta charset="utf-8">
<meta name="expires" content="never" >
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

@if($data['seo']['title_seo']!=null)
<meta property="og:title" content="{{SettingWeb::SettingWeb()->title_web.' - '.$data['seo']['title_seo']}}"/>
<meta property="og:image" content="{{$data['seo']['logo_seo']}}"/>
@else
<meta property="og:title" content="{{SettingWeb::SettingWeb()->title_web}}"/>
<meta property="og:image" content="{{asset('upload/admin/logo_web/'.SettingWeb::LogoWeb())}}"/>
@endif
<meta property="og:type" content="website" />
<meta property="og:url" content="{{$data['seo']['url_seo']}}" />
<meta name="description" content="{{$data['seo']['description_seo']}}">
<meta name="keywords" content="{{$data['seo']['keywords_seo']}}">
<meta name="robots" content="{{$data['seo']['robots_seo']}}">

@if($data['seo']['title_seo']!=null)
<title>{{SettingWeb::SettingWeb()->title_web.' - '.$data['seo']['title_seo']}}</title>
@else
<title>{{SettingWeb::SettingWeb()->title_web}}</title>
@endif

<link rel="icon" href="{{asset('upload/member/shortcut_icon/icon.ico')}}" type="image/x-icon" />


 @include('layouts.member.stylesheet')
 @yield('stylesheet')

</head>

<body>

@include('layouts.member.header')
@yield('header')


@yield('detail')


@include('layouts.member.footer')
@yield('footer')


@include('layouts.member.javascripts')
@yield('javascript')


@include('layouts.member.plugins')
@yield('plugins')


@include('layouts.member.modal')
@yield('modal')


<!-- validation -->
@include('layouts.member.validation')
@yield('validation')


</body>
</html>