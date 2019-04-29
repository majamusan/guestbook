@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <strong>@lang('other.titles.user_update')</strong> </div>
                <div class="card-body">
                {{ Form::open(['url' => route('user/save'), 'type'=>'post'] ) }}
                    {{ Form::token() }}
                    {{Form::text("name", Auth::user()->name , [ "class" => "form-group ", "placeholder" => __('other.placeholders.name'), ]) }}
                    {{Form::text("email", Auth::user()->email , [ "class" => "form-group user-email", "placeholder" => __('other.placeholders.email'), ]) }}
                    {{Form::password("password", [ "class" => "form-group", "placeholder" => __('other.placeholders.password'), ]) }}
                    {{Form::text("meaning", Auth::user()->meaning , [ "class" => "form-group ", "placeholder" => __('other.placeholders.meaning'), ]) }}
                    <br/>
                    <button class="btn btn-primary" type="submit">@lang('other.save_user')</button>
                    <small>{{__('other.updated_at',['time'=>Auth::user()->updated_at  ] ) }} </small>
                {{ Form::close() }}
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
                @error('meaning') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="card-header"> <strong>@lang('other.titles.guestbook_add')</strong> </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{ Form::open(['url' => route('guestbook/save'), 'type'=>'post'] ) }}
                        {{ Form::token() }}
                        {{Form::textarea("entry", '', [ "class" => "form-group", ]) }}
                        @error('entry') <div class="alert alert-danger">{{ $message }}</div> @enderror
                        <br />
                        {{Form::date("date", '', [ "class" => "form-group user-email", "placeholder" => __('other.placeholders.date'), ]) }}
                        {{Form::text("feeling", '' , [ "class" => "form-group ", "placeholder" => __('other.placeholders.feeling'), ]) }}
                        <button class="btn btn-primary" type="submit">@lang('other.save_guestbook')</button>
                    {{ Form::close() }}
                    @error('date') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    @error('feeling') <div class="alert alert-danger">{{ $message }}</div> @enderror
               
                </div>
                <div class="card-header"> <strong>@lang('other.titles.guestbook_list')</strong> </div>
                <div class="card-body">
                    @error('responce') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    @include('entries')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
