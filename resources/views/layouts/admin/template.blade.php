<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" class="app">
<head>
<meta charset="utf-8">
<!-- <meta name="expires" content="never" > -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta property="og:title" content="{{SettingWeb::SettingWeb()->title_web}}"/>
<meta property="og:image" content="{{asset('upload/admin/logo_web/'.SettingWeb::SettingWeb()->logo_web)}}"/>
<meta property="og:type" content="website" />
<meta property="og:url" content="{{url('')}}" />
<meta name="description" content="{{SettingWeb::SettingWeb()->seo_description}}">
<meta name="keywords" content="{{SettingWeb::SettingWeb()->seo_keywords}}">


<title>{{SettingWeb::SettingWeb()->title_web}}</title>

<link rel="icon" href="{{asset('upload/admin/shortcut_icon/icon.ico')}}" type="image/x-icon" />


 @include('layouts.admin.stylesheet')
 @yield('stylesheet')

</head>

<body>

 <div class="loader"></div> 

@include('layouts.admin.header')
@yield('header')


@include('layouts.admin.menu_left')
@yield('menu_left')


@yield('detail')


@include('layouts.admin.javascripts')
@yield('javascript')


@include('layouts.admin.plugins')
@yield('plugins')


@include('layouts.admin.modal')
@yield('modal')



@include('layouts.admin.validation')
@yield('validation')

</body>
</html>