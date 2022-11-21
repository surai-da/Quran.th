@extends('quran.nav')
@section('content')

<style>
      @font-face {
        font-family:'Uthmani' ;
        src: url('assets/font/UthmanicHafs1Ver09.otf')format('truetype');
      }
     .arabic{
         font-family: 'Uthmani', serif;
         font-size: 23px;
         font-weight: normal;
         direction: rtl;
         padding: 0 5px;
         margin: 0;
         text-align: left;
     }
     .latin{
        font-family:  serif;
        font-size: 17px;
        font-weight: normal;
        direction: ltr;
        padding: 0;
        margin: 0;
     }
      .arabic_number {
        font-size: 28px;
        font-weight: normal;
      }
        .cautions {
        
        font-size: 13px;
        font-weight: normal;
        direction: ltr;
        padding: 0 5px;
        margin: 0;
        color: red;

    }
      .ayah{
        text-align:right;
      }
        
     

      </style>


<div style = background-color:#00cc99; class=" row text-center ">
  @foreach($datasurahs as $datasurah)     
<div class="col-sm-4" >
 <a href="{{ route('arabic', $datasurah) }}">
  <!-- height: 90px; width:240px -->
  <button style= "height: 100px; width:370px; background-color:#00e0a8;    
  margin-top: 30px;
  margin-right: 10px;
  margin-left: 10px;
  margin-bottom: 10px;"  
  type="buttom" class="btn btn-outline-light" >
  <p class="arabic" >{{ $datasurah->surah_arab}}</p>
  <span style="font-size: 20px;">{{ $datasurah->th_name}}</span>
  <p class="ayah" >{{ $datasurah->whole_ayah}} อายะฮ์</p></button></a>
  </div>
 <br>
        @endforeach
 <br>
</div>
 @endsection
