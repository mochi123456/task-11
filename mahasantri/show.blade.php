@extends('adminlte::page') 
@section('title', 'Detail Mahasantri') 
@section('content_header')

 <h1>Detail Mahasantri</h1>
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
   @foreach($ar_mahasantri as $mhs)
         @csrf
         <form>
            <div class="form-group">
               <label>Nama</label>
               <input type="text" placeholder="{{ $mhs->nama }}" class="form-control" disabled/>
            </div>
            <div class="form-group">
               <label>Nim</label>
               <input type="text" placeholder="{{ $mhs->nim }}" class="form-control" disabled/>
            </div>
            <div class="form-group">
               <label>Jurusan</label>
               <input type="text" placeholder="{{ $mhs->jrs }}" class="form-control" disabled/>
            </div>
            <div class="form-group">
               <label>Matakuliah</label>
               <input type="text" placeholder="{{ $mhs->mk }}" class="form-control" disabled/>
            </div>
            <div class="form-group">
               <label>Dosen</label>
               <input type="text" placeholder="{{ $mhs->dp }}" class="form-control" disabled/>
            </div>

            
         </form>
      
   @endforeach
@stop