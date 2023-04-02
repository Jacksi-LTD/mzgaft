@extends('layouts.frontend')
@section('content')
@section('page_title', $question->title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/questions">پرسیار و بەرسڤ</a></li>
    @php
    $parent = $question->category;
    $up_parent = $parent->parentCategory;
    @endphp
    @if ($up_parent)
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.questions.category', $up_parent->id) }}">{{ $up_parent->name }}</a>
        </li>
    @endif
    </li>
@endsection

<!-- ***** article-detalis-section Start ***** -->

<section class="section-style article-detalis-section">

    <div class="container">

        <div class="article-detalis-box">

            <div class="article-title">

                <p>{{ $question->title }}</p>

            </div>
            @if($question->person && false)
            <div class="article-info">

                <div class="info-item article-writer" onclick="showHideFunction()">

                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15">
                        <path id="user"
                            d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                    </svg>

                    <span class="writer-name" id="person" style="visibility: hidden">{{ $question->person?->name }}</span>

                </div>


            </div>
            @endif
            <div class="texts-container">

                {!! $question->question !!}
                {!! $question->answer !!}

            </div>
            <x-share-box />

        </div>




    </div>

</section>

<!-- ***** article-detalis-section End ***** -->

@endsection

@section('scripts')
<script>
    function showHideFunction() {
  var x = document.getElementById("person");
  if (x.style.visibility === "hidden") {
    x.style.visibility = "visible";
  } else {
    x.style.visibility = "hidden";
  }
}
</script>
@endsection
