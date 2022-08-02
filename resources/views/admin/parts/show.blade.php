@extends('layouts.admin_template')

@section('body')

<div class="d-flex justify-content-between">
  <div class="part_desc">
      <span>Part info: </span>
      <dl>
        <div><dt>ID:</dt><dd>{{$part-> id}}</dd></div>
        <div><dt>Title:</dt><dd>{{$part-> title}}</dd></div>
        <div><dt>Original code:</dt><dd>{{$part-> part_code}}</dd></div>
        <div><dt>Other codes:</dt><dd>
                    @foreach ( $part->codes as $code )
                        {{$code->code}} <br>
                    @endforeach
        </dd></div>

        <div><dt>SKU:</dt><dd>{{$part-> sku}}</dd></div>
        <div><dt>Comment:</dt><dd>{{$part-> comment}}</dd></div>
        <div><dt>Category:</dt><dd>{{$part-> category-> name}}</dd></div>


      </dl>
      <span>Car info: </span>
      <dl>
        <div><dt>Car:</dt><dd>{{$part-> manufacture-> name}}</dd></div>
        <div><dt>Model:</dt><dd>{{$part-> car -> model}}</dd></div>
        <div><dt>Year:</dt><dd>{{$part-> car -> year}}</dd></div>
        <div><dt>Body type:</dt><dd>{{$part-> car -> body_type}}</dd></div>
        <div><dt>Steering wheel placement:</dt><dd>{{$part-> car -> wheel_placement}}</dd></div>
        <div><dt>Fuel type:</dt><dd>{{$part-> car -> fuel_type}}</dd></div>
        <div><dt>Engine displacement:</dt><dd>{{$part-> car -> engine_displacement}} </dd></div>
        <div><dt>Engine code:</dt><dd>{{$part-> car -> engine_code}}</dd></div>
        <div><dt>Engine power:</dt><dd>{{$part-> car -> power}} Kw</dd></div>
        <div><dt>Km:</dt><dd>{{$part-> car -> km}}</dd></div>
        <div><dt>Color:</dt><dd>{{$part-> car -> color}}</dd></div>



      </dl>
  </div>
  
  <div>
    <div id="gallery">
      <div>
        <button id="close-overlay" type="button" class="btn-close btn-close-white" aria-label="Close">
          
        </button>
      </div>
      <div id="carouselExampleIndicators" class="carousel carousel-mod slide" data-ride="carousel">
        <ol class="carousel-indicators indicator1" style=" ">
        
        @for ($i=0; $i < 5 && $i < count($part->pictures) ; $i++ )
        <li id="img-{{$i}}" data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$part->pictures[$i]->image===$part->pictures[0]->image ? 'active' : ''}}"><img src="{{asset($part->pictures[$i]->image)}}" style="width: 100px; height: 100px; padding: 2px;" alt="{{$i}}"></li>
        @endfor

        </ol>
        <ol class="carousel-indicators indicator2" style="position: absolute;  ">
          @for ($i=5; $i < 10 && $i < count($part->pictures); $i++ )
          <li id="img-{{$i}}" data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$part->pictures[$i]->image===$part->pictures[0]->image ? 'active' : ''}}"><img src="{{asset($part->pictures[$i]->image)}}" style="width: 100px; height: 100px; padding: 2px;" alt="{{$i}}"></li>
          @endfor
        </ol>
        <ol class="carousel-indicators indicator3" style="position: absolute;  ">
          @for ($i=10; $i <15  && $i < count($part->pictures); $i++ )
          <li id="img-{{$i}}" data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$part->pictures[$i]->image===$part->pictures[0]->image ? 'active' : ''}}"><img src="{{asset($part->pictures[$i]->image)}}" style="width: 100px; height: 100px; padding: 2px;" alt="{{$i}}"></li>
          @endfor
        </ol>

        <div  class="carousel-inner"  >
        @foreach ($part->pictures as $image)
          <div   class="carousel-item {{$image->image===$part->pictures[0]->image ? 'active' : ''}} ">
            <img class="d-block w-100 " style="object-fit: scale-down;"  src="{{asset($image->image)}}" alt="{$i}">
          </div>
          @endforeach
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
          <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next"  href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
          <span class="sr-only" ></span>
        </a>
        </div>
      </div>
    </div>
  </div>
</div>


    

@endsection

