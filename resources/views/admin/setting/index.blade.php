@extends('admin.layouts.master')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">الاعدادات الرئسيه</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>

    </nav>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('updateSettings')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{$data->id ?? null}}">

                <div class="row">
                    <div class="col">
                        <label>اسم الموقع</label>
                        <input type="text" class="form-control" name="name" required value="{{$data->name ?? null}}">
                    </div>

                    <div class="col">
                        <label>البريد الالكتروني للموقع</label>
                        <input type="email" class="form-control" name="email" required value="{{$data->email ?? null}}">
                    </div>

                    <div class="col">
                        <label>رقم الموقع</label>
                        <input type="number" class="form-control" name="phone" required
                               value="{{$data->phone ?? null}}">
                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col">
                        <label>رقم واتس اب الموقع</label>
                        <input type="number" class="form-control" name="whatsapp" required
                               value="{{$data->whatsapp ?? null}}">
                    </div>


                    <div class="col">
                        <label>عموله الموقع</label>
                        <input type="number" class="form-control" name="notes_2" required
                               value="{{$data->notes_2 ?? null}}">
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>فيسبوك</label>
                        <input type="url" value="{{$data->facebook ?? null}}" name="facebook" required class="form-control">
                    </div>
                    <div class="col">
                        <label>تويتر</label>
                        <input type="url" value="{{$data->twitter ?? null}}" name="twitter" required class="form-control">
                    </div>
                    <div class="col">
                        <label>الانستغرام</label>
                        <input type="url" value="{{$data->instagram ?? null}}" name="instagram" required class="form-control">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>وصف الموقع</label>
                        <textarea class="summernote" name="notes" rows="5">
                                      {{$data->notes ?? null}}
                                </textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>الشروط والاحكام</label>
                        <textarea class="summernote" name="notes_1" rows="5">
                                      {{$data->notes_1 ?? null}}
                                </textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>من نحن</label>
                        <textarea class="summernote" name="notes_3" rows="5">
                                      {{$data->notes_3 ?? null}}
                                </textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>صوره الموقع</label>
                        <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                        @if(isset($data->photo))
                            <img src="{{asset($data->photo)}}" width="100px" height="100px" alt="">
                            <input type="hidden" name="oldfile" value="{{$data->photo}}">
                        @endif
                        <img id="output" width="100px" height="100px"/>
                    </div>
                </div>


                <br>

                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-success btn-block">تحديث البيانات</button>
                    </div>

                    <div class="col">
                        <a href="{{route('admin')}}" class="btn btn-info">الصفحه الرئسيه</a>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
