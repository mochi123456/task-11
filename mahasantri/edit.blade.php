
@extends('adminlte::page') 
@section('title', 'Detail mahasantri') 
@section('content_header')

 <h1>form mahasantri</h1>
 <br/><br/>
 <a class="btn btn-primary btn-md"
 href="{{ route('mahasantri.index') }}" class="btn btn-info btn-md" role="button"><i class="fa-duotone fa fa-arrow-left">Back</i></a>


 @stop
 @section('content')
 
   @php
      $rs1 = App\Models\Dosen::all();
      $rs2 = App\Models\Jurusan::all();
      $rs3 = App\Models\Matakuliah::all();
    @endphp  
  @foreach($data as $d)
 <form action="{{ route('mahasantri.update',$d->id) }}" method="post">
    @csrf
    @method('put')
   <div class="form-group">
    <label>Nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control"/>
   </div>
   <div class="form-group">
      <label>Nim</label><input type="text" name="nim" value="{{ $d->nim }}" class="form-control"/>
   </div>
   

   <div class="form-group">
    <label>Dosen</label>
    <select name="dosen_id" class="form-control">
        <option value="">-- Pilih Dosen --</option>
        @foreach($rs1 as $dp)
        @php
        $sel1 = ($dp->id == $d->dosen_id) ? 'selected' : ''; 
        @endphp
        <option value="{{ $dp->id }}" {{ $sel1 }}>{{ $dp->nama }}</option>
        @endforeach 
    </select>
   </div>
   <div class="form-group">
    <label>Penerbit</label>
    <select name="jurusan_id" class="form-control">
        <option value="">-- Pilih jurusan --</option>
        @foreach($rs2 as $jrs)
        @php
       $sel2 = ($jrs->id == $d->jurusan_id) ? 'selected' : ''; 
        @endphp
        <option value="{{ $jrs->id }}" {{ $sel2 }}>{{ $d->nama }}</option> 
        @endforeach 
    </select>
   </div>
   <div class="form-group">
    <label>Matakuliah</label>
    <select name="matakuliah_id" class="form-control">
        <option value="">-- Pilih Matakuliah --</option>
        @foreach($rs3 as $mk)
        @php
        $sel3 = ($mk->id == $d->matakuliah_id) ? 'selected' : '';
        @endphp
          <option  value="{{ $mk->id }}" {{ $sel3 }}>{{ $d->nama }} </option>
        @endforeach 
    </select>
   </div>
   <button type="submit" class="btn btn-info">Update</button>
</form>
@endforeach
 @stop


