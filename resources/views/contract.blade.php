@extends('layouts.contract_master')

@section('title')
About Page
@endsection
@section('body')
    <div>
        <p>Welsome <span style="color:red;"><?php echo $myname ?></span> sir </p>
        <p>Your id is <span style="color:red;"><?php echo $stid ?></span> </p>
        <p>Your address is <span style="color:red;"><?php echo $address ?> </span> </p>
        This is my about page
        
    </div>
@endsection
@component('com')
<div>
    <b>Its me - component!</b>
</div>

@endcomponent

