@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
            <div class="card">
                <div class="card-header">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('thai.index') }}">จัดการกุรอาน</a>
      </li>
     
      <li class="nav-item">
      <a class="nav-link" href="{{ route('tafseers.index') }}">จัดการวิดีโอตัฟซีร</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('approvalstatus') }}">ตรวจสอบสถานะ</a>
      </li>
   
    </ul>
</nav>
</div>

<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
</div>

<div class="container">
  
        <table class="table  table-bordered  ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ภาษาอาหรับ</th>
                        <th>คำเเปล</th>
                        <th>ตัฟซีร</th>
                        <th width = 12%>Action</th>
                    </tr>
                </thead>
                <tbody>
             
                @foreach($arabics->arabic as $arabic ) 
                    <tr>
                        <td scope="row">{{$arabic->thais->ayat}}</td>
                        <td>{{$arabic->text}}</td>
                        <td>{{$arabic->thais->Text}}</td>
                        <td>{{$arabic->thais->tafseer}}</td>
                        <td>
                       <a href="{{ route('managequran',$datasurah) }}" class="btn btn-info">ดู</a>
                       <a href="{{ route('managequran',$datasurah) }}" class="btn btn-warning">แก้ไข</a>
                      
                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>

          

      
</div>
@endsection