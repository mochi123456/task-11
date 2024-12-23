@extends('adminlte::page')
@section('title', 'Data mahasantri')
@section('content_header')
<h1><i class="fas fa-solid fa-user-graduate">&nbsp;</i> Data mahasantri</h1>
@stop
@section('content')
@if(session('success')) 
 <div class="alert alert-info">
        {{session ('success') }}
 </div>
 @endif
@php
$ar_judul = ['No','Nama','NIM','Jurusan','Matakuliah','Dosen','Action'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"
href="{{ route('mahasantri.create') }}" role="button"><i class="fa fa-plus">&nbsp;</i> Tambah mahasantri</a><br/><br/>
<div class="card">
 <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
<thead>
    <tr>
        @foreach($ar_judul as $jdl)
           <th>{{ $jdl }}</th>
        @endforeach
    </tr>
</thead>
<tbody>
@foreach($ar_mahasantri as $mhs)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $mhs->nama }}</td>
<td>{{ $mhs->nim }}</td>
<td>{{ $mhs->jrs}}</td>
<td>{{ $mhs->mk }}</td>
<td>{{ $mhs->dp }}</td>
<td>
       <form action="{{ route('mahasantri.destroy',$mhs->id) }}" method="POST">
              @csrf
              @method('delete')
              <a href="{{ route('mahasantri.show',$mhs->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
              <a href="{{ route('mahasantri.edit',$mhs->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
              <button class="btn btn-danger" onclick="return confirm('Anda Data Dihapus')"><i class="fa fa-trash"></i></button>
       </form>
 </td>
</tr>
@endforeach
</tbody>
</table>
</div>  
</div>
@stop

