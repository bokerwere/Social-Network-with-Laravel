<!DOCTYPE html>
<html lang="en">

  <title>Blog @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
   integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
   crossorigin="anonymous">

   <link rel="stylesheet" href="{{URL::to('css/styles.css')}}">
   
{{ Html::style('css/styles.css') }}


<!--{!! Html::style('css/select2.min.css')!!}} -->

<!---{!!Html::style('css/styles.css')!!}-->
  @yield('stylesheets')
