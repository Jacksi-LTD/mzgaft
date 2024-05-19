@extends('layouts.frontend')
@section('page_title', trans('app.contact_us'))

@section('content')
    <style>
        .form-group{
            margin-bottom: 20px;
        }
    </style>
    <!-- ***** articles-categories-section Start ***** -->
    <section class="section-style surahs-section categories-section ">

        <div class="container">

            <div class="categories-container surahs-list-categories ">

                <div class="duplicated-box box-lg surahs-list-items  single-items more-loading">

                    <div class="box-header box-padding">

                        <div class="header-title ">

                           {{trans('app.contact_us')}}

                        </div>

                    </div>
                    <div class="box-body box-padding">

                        <div class="body-content  ">

                            @if (session('success'))
                                <div class="col-sm-12">
                                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                           <div class="col-md-8">
                            <form method="post">
                                @csrf
                                <div class="form-group">
                                <label>{{trans('app.name')}}</label>
                                <input type="text" required name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('app.email')}}</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('app.phone')}}</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('app.message')}}</label>
                                    <textarea required rows="8" name="message" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button">{{trans('app.send')}}</button>
                                </div>
                            </form>
                           </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ***** articles-categories-section End ***** -->

@endsection
