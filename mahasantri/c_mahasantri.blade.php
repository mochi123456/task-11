
@extends('adminlte::page') 
@section('title', 'form') 
@section('content_header')

 <h1>form mahasantri</h1>
 <br/><br/>
 <a class="btn btn-primary btn-md"
 href="{{ route('mahasantri.index') }}" class="btn btn-info btn-md" role="button"><i class="fa-duotone fa fa-arrow-left">Back</i></a>


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
   @php
      $rs1 = App\Models\Dosen::all();
      $rs2 = App\Models\Jurusan::all();
      $rs3 = App\Models\Matakuliah::all();
    @endphp  

 <form action="{{ route('mahasantri.store') }}" method="POST">
    @csrf
   <div class="form-group">
    <label>Nama</label><input type="text" name="nama" class="form-control"/>
   </div>
   <div class="form-group">
      <label>Nim</label><input type="text" name="nim" class="form-control"/>
   </div>
   <div class="form-group">
    <label>Dosen</label>
    <select name="dosen_id" class="form-control">
        <option value="">-- Pilih dosen --</option>
        @foreach($rs1 as $dp)
          <option value="{{ $dp->id }}">{{ $dp->nama }}</option>
        @endforeach 
    </select>
   </div>
   <div class="form-group">
    <label>Jueusan</label>
    <select name="jurusan_id" class="form-control">
        <option value="">-- Pilih Jurusan --</option>
        @foreach($rs2 as $jrs)
          <option value="{{ $jrs->id }}">{{ $jrs->nama }}</option>
        @endforeach 
    </select>
   </div>
   <div class="form-group">
    <label>Matakuliah</label>
    <select name="matakuliah_id" class="form-control">
        <option value="">-- Pilih Matakuliah --</option>
        @foreach($rs3 as $mk)
          <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
        @endforeach 
    </select>
   </div>
   <button type="Submit" class="btn btn-info">Simpan</button>
</form>

 @stop


