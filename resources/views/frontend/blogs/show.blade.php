@extends('layouts.frontend')
@section('content')
@section('page_title', $blog->title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/blogs">المقالات</a></li>
    @php
    $parent = $blog->category;
    $up_parent = $parent?->parentCategory;
    @endphp
    @if (isset($up_parent))
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.blogs.category', $up_parent->id) }}">{{ $up_parent->name }}</a>
        </li>
    @endif
    @if (isset($parent))
        <li class="breadcrumb-item"><a href="{{ route('frontend.blogs.category', $parent->id) }}">{{ $parent->name }}</a>
        </li>
    @endif
@endsection

<!-- ***** article-detalis-section Start ***** -->

<section class="section-style article-detalis-section">

    <div class="container">

        <div class="article-detalis-box">

            <div class="article-title">

                <p>{{ $blog->title }}</p>

            </div>
            <div class="article-info">

                <div class="info-item article-writer">

                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15">
                        <path id="user"
                            d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                    </svg>

                    <span class="writer-name">{{ $blog->writer?->name }}</span>

                </div>
                @if($blog->writing_date)
                    <div class="info-item article-date">

                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                            <path id="clock"
                                d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z" />
                        </svg>

                        <span class="date">{{ $blog->writing_date }}</span>

                    </div>
                @endif

            </div>
            <div class="texts-container">

                {!! $blog->content !!}

            </div>
            <x-share-box />

        </div>




    </div>

</section>

<!-- ***** article-detalis-section End ***** -->

@endsection
