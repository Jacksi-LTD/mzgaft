@extends('layouts.frontend')
@section('content')
@section('page_title', $audio->title)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.audios.index') }}">الصوتيات</a></li>
    @php
    $parent = $audio->category;
    $up_parent = $parent->parentCategory;
    $person = $audio->writer;
    @endphp
    @if ($up_parent)
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.audios.category', $up_parent->id) }}">{{ $up_parent->name }}</a>
        </li>
    @endif
    @if ($parent)
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.audios.category', $parent->id) }}">{{ $parent->name }}</a>
        </li>
    @endif
    @if ($person)
        <li class="breadcrumb-item"><a href="{{ route('frontend.audios.people', $person->id) }}">{{ $person->name }}</a>
        </li>
    @endif

    </li>
@endsection

<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">


            <div class="col-lg-8 half">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $audio->title }}

                            </div>

                        </div>
                        <div class="article-detalis-box">

                            <div class="article-info">

                                <div class="info-item article-writer">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15">
                                        <path id="user"
                                            d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                                    </svg>

                                    <span class="writer-name">{{ $audio->writer?->name }}</span>

                                </div>


                            </div>
                        </div>

                        <div class="box-body box-padding">

                            <div class="body-content">

                                <div class="texts-container">

                                    {!! $audio->content !!}

                                </div>


                            </div>

                        </div>
                        <br>
                        <div class="box-body box-padding">

                            <div class="body-content">

                                <ul class="body-list  lessons-list">
                                    @foreach ($audio->files as $key => $media)
                                        <li class="list-item">

                                            <div class="item-content">

                                                <a class="item-type item-link"
                                                    href="{{ route('frontend.audios.single', $media->id) }}">

                                                    <span class="icon">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.717"
                                                            height="16" viewBox="0 0 13.717 16">
                                                            <path id="play"
                                                                d="M12.895,38.536A1.72,1.72,0,0,1,13.717,40a1.628,1.628,0,0,1-.822,1.432L2.609,47.72a1.648,1.648,0,0,1-1.733.064A1.715,1.715,0,0,1,0,46.287V33.714a1.715,1.715,0,0,1,2.609-1.463Z"
                                                                transform="translate(0 -31.999)" />
                                                        </svg>

                                                    </span>
                                                    <span class="text">{{ $key + 1 }}
                                                        {{ $media->name }}
                                                    </span>

                                                </a>

                                                <div class="item-type sub-content">

                                                    <span class="icon">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                            viewBox="0 0 15 15">
                                                            <path id="clock"
                                                                d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z" />
                                                        </svg>


                                                    </span>
                                                    @php
                                                        $audio_info = new \wapmorgan\Mp3Info\Mp3Info($media->getPath(), true);
                                                        //$audio = new \wapmorgan\Mp3Info\Mp3Info($fileName, true);
                                                        $audio_info->duration;// \\ duration in seconds


                                                    @endphp
                                                    <span
                                                        class="text">{{ gmdate("H:i:s", $audio_info->duration) }}</span>

                                                </div>

                                            </div>

                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                            <x-share-box />
                        </div>

                    </div>



                </div>


            </div>
            <div class="col-lg-4 half">

                <div class="side-box-container">

                    <div class="box-wrap">


                        <div class="duplicated-box-wrapper">

                            <div class="duplicated-box box-lg box-side side-statistics  duplicated-box-2 ">

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

                                                        الحلقات
                                                        :

                                                    </span>
                                                    <span class="statistics-val">{{ $audio->files->count() }}</span>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="statistics-item">

                                                    <span class="statistics-text">

                                                        اجمالي مرات الاستماع
                                                        :

                                                    </span>
                                                    <span class="statistics-val">{{$audio->visits}} </span>

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

</section>
@endsection


@section('scripts')
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
    $("#playAudiobtn").on("click", function() {

        $('#audioArea').fadeToggle();

    });
    $("#closeAudio").on("click", function() {

        $('#audioArea').fadeOut();

    });
</script>
@endsection
