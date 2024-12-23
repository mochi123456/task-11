@extends('adminlte::page')
@section('title', 'Data Maha Santri')
@section('content_header')
<h1 class="fa fa-users"> Form Maha Santri</h1>
@stop
@section('content') 
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('mahasantri.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- cros-site request forgery (CSRF) = PENCEGAHAN serangan yang dilakukan oleh pengguna yang tidak terautentikasi --}}
    <div class="form-group">
    <label for="">Nama</label>
    <input type="text" name="nama" class="form-control"/>
    </div>

    <div class="form-group">
    <label for="">NIM</label>
    <input type="text" name="nim" class="form-control"/>
    </div>

   
    <div class="form-group">
    <label for="">Dosen Pelajaran</label>
    <input type="text" name="dosen_id" class="form-control"/>
    </div>

    <div class="form-group">
    <label for="">jurusan</label>
    <input type="text" name="jurusan_id" class="form-control"/>
    </div>

    <a class="btn btn-primary btn-md"
    href="{{ route('mahasantri.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
    
</form>

@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop