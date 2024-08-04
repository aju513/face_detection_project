@extends('admin.layouts.default')
@section('content')
<div class="main-content">
   <div class="p-6">
     Welcome, {{auth()->user()->name}} !!!
   </div>
</div>
@endsection
