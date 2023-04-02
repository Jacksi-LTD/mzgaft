@extends('layouts.frontend')
@section('content')
@section('page_title', $page->title)

{{-- @section('breadcrumb')
    <li class="breadcrumb-item"><a href="/pages/about-us">ماڵپەرێ مزگەفت</a></li>
    </li>
@endsection --}}

<!-- ***** article-detalis-section Start ***** -->

<section class="section-style article-detalis-section">

    <div class="container">

        <div class="article-detalis-box">

            <div class="article-title">

                <p>{{ $page->title }}</p>

            </div>
            <div class="texts-container">

                {!! $page->content !!}

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


