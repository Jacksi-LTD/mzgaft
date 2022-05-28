@extends('layouts.frontend')
@section('content')
@section('page_title', $audioBook->title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/audio-books">الكتب الصوتية</a></li>
    @php
    $parent = $audioBook->category;
    $up_parent = $parent?->parentCategory;
    @endphp
    @if (isset($up_parent))
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.audio-books.category', $up_parent->id) }}">{{ $up_parent->name }}</a>
        </li>
    @endif
    @if (isset($parent))
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.audio-books.category', $parent->id) }}">{{ $parent->name }}</a>
        </li>
    @endif
@endsection


<section class="section-style lesson-section section-cols">

    <div class="container lectures-items">
        <div class="items-cols">

        <div class="row">


            <div class="col-lg-8 mb-5 mb-lg-0">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $audioBook->title }}

                            </div>

                        </div>
                        <div class="box-body box-padding aduio_player">

                            <div class="body-content ">

                                <div class="lesson-perview-area">


                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">

                                                <img class="img-fluid" src="{{ $audioBook->image?->getUrl() }}">
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <ul class="body-list  lessons-list">
                                        @foreach ($audioBook->audio as $key => $audio)
                                            <li class="list-item">

                                                <div id="{{ $audio->original_url }}" class="aduio-item item-content item-content audio play-media"
                                                    onclick="play_media(this)">



                                                        <div class="item-type item-link">
                                                            <span class="icon"> </span>
                                                            <span class="text">
                                                                {{ $audio->name }}
                                                            </span>

                                                        </div>

                                                        <div class="item-type sub-content"> <span
                                                                class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                    height="15" viewBox="0 0 15 15">
                                                                    <path id="clock"
                                                                        d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z" />
                                                                </svg> </span> <span class="text">

                                                                @php

                                                                    if (isset($audio)) {
                                                                        $audio_info = new \wapmorgan\Mp3Info\Mp3Info($audio->getPath(), true);
                                                                        //$audio = new \wapmorgan\Mp3Info\Mp3Info($fileName, true);
                                                                        $audio_info->duration; // \\ duration in seconds
                                                                        echo '<span class="text">' . gmdate('H:i:s', $audio_info->duration) . '</span>';
                                                                    }

                                                                @endphp

                                                            </span>
                                                        </div>
                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="perview-btns">


                                        <a href="{{ $audioBook->audio->first()->getUrl() }}" target="_blank"
                                            style="margin-left: 1.5rem;">
                                            <button class="perview-btn download-btn noty-btn" type="button">

                                                <i class="fa-solid fa-download"></i>
                                                <span>تحميل</span>

                                            </button>
                                        </a>

                                        <a href="{{ $audioBook->file->first()?->getUrl() }}" target="_blank">
                                            <button class="perview-btn audio-btn   " type="button" s>
                                                <i class="fa-solid fa-download"></i>
                                                <span>PDF</span>
                                            </button>
                                        </a>

                                    </div>

                                    <div class="audio-area" id="audioArea">

                                        <div class="audio-wrap">

                                            <audio controls class="audio-item" id="audio-item">
                                                <source src="{{ $audioBook->audio->first()->getUrl() }}"
                                                    type="audio/ogg">
                                                <source src="{{ $audioBook->audio->first()->getUrl() }}"
                                                    type="audio/mpeg">
                                            </audio>
                                            <div class=" close-audio" id="closeAudio">

                                                <i class="fa-solid fa-xmark"></i>
                                                إغلاق

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>


                        <br>
                        <div class="box-body box-padding">

                            <div class="body-content">



                            </div>

                            <x-share-box />
                        </div>

                    </div>



                </div>


            </div>
            <div class="col-lg-4">

                <div class="side-box-container">

                    <div class="box-wrap">


                        <div class="duplicated-box-wrapper">

                            <div class="duplicated-box box-lg box-side side-statistics ">

                                <div class="box-header box-padding ">

                                    <div class="header-title ">

                                        احصائيات

                                    </div>


                                </div>
                                <div class="box-body box-padding">

                                    <div class="body-content ">

                                        <ul class="body-list statistics-list">

                                            <li class="list-item">

                                                <div class="statistics-item">

                                                    <span class="statistics-text">

                                                        اجمالي مرات الاستماع
                                                        :

                                                    </span>
                                                    <span
                                                        class="statistics-val">{{ $audioBook->visits ?? '0' }}</span>

                                                </div>

                                            </li>


                                        </ul>

                                    </div>

                                </div>

                            </div>


                        </div>


                    </div>


                </div>

            </div>


        </div>

    </div>
    </div>

</section>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

<script>
    /*** noty general style ***/
    $(".download-btn").click(function() {


        var n = new Noty({
            type: 'success', //error//
            theme: 'bootstrap-v4',
            layout: 'topRight',
            timeout: '2000',
            progressBar: true,
            closeWith: ['click'],
            text: '<i class="fa-solid fa-circle-check ms-1"></i> تم تنزيل الحلقة بنجاح',
        }).show();

    });



    /*** show audio  ***/
    var flag = false;
    $("#playAudiobtn").on("click", function() {


        flag = !flag;
        if (flag) {
            $('#audio-item').get(0).play();

        } else {
            $('#audio-item').get(0).pause();
        }
        $('#audioArea').fadeToggle();


    });
    $("#closeAudio").on("click", function() {

        $('#audioArea').fadeOut();
        $('#audio-item').get(0).pause();

    });

    function stopAudio(audio) {
        audio.pause();
        audio.currentTime = 0;
    }
</script>
<script>
    function click_media(item) {
        $(".list-item .item-content.audio").each(function(index) {
            $(this).removeClass('active')
        });
        $(item).addClass('active');

    }

    var audio = new Audio()

    function play_media(item) {

        audio.pause();
        audio = new Audio(item.id);

        var active = false
        if ($(item).hasClass('active')) {
            active = true
            $(item).removeClass('active');
            audio.pause();
        }

        audio.onended = function() {
            $(item).removeClass('active');
        };

        $(".lessons-list .item-content.play-media").each(function(index) {
            $(this).removeClass('active')
        });

        if (!active) {
            audio.play();
            $(item).addClass('active');
        }

    }
</script>



@endsection
