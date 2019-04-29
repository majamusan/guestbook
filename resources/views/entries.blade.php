<dev class="row">
    @foreach($entries as $entry)
        <dev class="col-md-4">
        
            {{$entry->user->name}}
            
            @if(isset($entry->user->meaning))
                <small>"{{$entry->user->meaning}}"</small>
            @endif
            
            <br />
            
            @if(Auth::user()->id == $entry->user_id)
                <a href="{{route('guestbook/delete',['id'=> $entry->id])}}" class="btn btn-warning" title="@lang('other.delete')"> <i class="fas fa-trash-alt"></i> </a>
            @endif
            
            <small>{{ \Carbon\Carbon::parse($entry->date)->format(__('other.date_format') ) }} {{$entry->feeling}}</small>
            <p>{!! $entry->entry !!}</p>
                
            @foreach($entry->responses as $response )
                <small>{{ \Carbon\Carbon::parse($response->created_at)->format(__('other.date_format') ) }} {{$response->user->name}} </small>
                <br />
                <strong>"{!! $response->responce !!}"</strong>
                <br />
            @endforeach
            
            @if(Auth::user()->id == config('app.admin_user_id' ) )
                {{ Form::open(['url' => route('guestbook/responce'), 'type'=>'post'] ) }}
                    {{ Form::token() }}
                    {{ Form::hidden('id',$entry->id) }}
                    {{Form::textarea("responce", '', [ "class" => "form-group ", 'style' => 'width:100%;height:60px', "placeholder" => __('other.placeholders.respond'), ]) }}
                    <button class="btn btn-primary" type="submit">@lang('other.respond')</button>
                {{ Form::close() }}
            @endif
            
        </dev>
    @endforeach
</dev>