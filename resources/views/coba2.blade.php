@extends('layouts.master')

@section('main_nav')
	<li><a href="coba1"><i class="fa fa-comment"></i> <span>Coba 1</span></a></li>
	<li><a class="active" href="coba2"><i class="fa fa-comment"></i> <span>Coba 2</span></a></li>
@endsection

@section('content_header')
<h1>
Coba 2
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Coba 2</li>
</ol>
@endsection
@section('content')
Halo ini coba 2
@endsection