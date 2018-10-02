
<<<<<<< HEAD
@if(!empty($sliders))
=======
@if(!empty($all_sliders))
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                         @php
                            $isFirstBtn = true;
                            $slideNumber = 0 ;
                        @endphp

                        @foreach($sliders as $slider)
                        <li data-target="#slider-carousel" data-slide-to="{{$slideNumber}}" class="
                        @if($isFirstBtn)
                        active
                        @endif
                        @php 
                        $isFirstBtn = false;
                        $slideNumber++;
                        @endphp
                        "></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner">
                        @php
                            $isfirst = true;
                        @endphp

<<<<<<< HEAD
                        @foreach($sliders as $slider)
=======
                        @foreach($all_sliders as $slider)
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
                        <div class="item 
                        @if($isfirst)
                        active
                        @php
                            $isfirst = false;
                        @endphp
                        @endif
                        ">

                         <div class="col-sm-8">
<<<<<<< HEAD
                                <img style="width: 100%" src="{{URL::to($slider->slider_image)}}" class="girl img-responsive" alt="" />
=======
                                <img style="height: 400px;width: 100%" src="{{URL::to($slider->slider_image)}}" class="girl img-responsive" alt="" />
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
                                <img 
                                style="width: 200px;height:200px;" 
                                src="{{URL::to($slider->slider_off_image)}}" class="pricing" alt="" />
                            </div>

                            <div class="col-sm-4">
<<<<<<< HEAD
                                <h1 style="font-family: Vazir;color:black;"> {{$slider->slider_title}} </h1>
=======
                                <h1> {{$slider->slider_title}} </h1>
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
                                <h2>{{html_entity_decode(strip_tags($slider->slider_description))}}</h2>
                                <a href="{{$slider->slider_link}}" type="button" class="btn btn-default get">{{$slider->slider_button_lable}}</a>
                            </div>
                           
                        </div>

                        @endforeach
                        

                    </div>
               
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
@endif