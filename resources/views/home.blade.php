@extends('layouts.app')

@section('title_of_page')
    <title>Стена сообщений | Главная страница</title>
@endsection

@section ('h1')
    <h1>Сообщения от всех пользователей</h1>
@endsection

@section('content')
    <form method="post" action="{{route('messages.addmessage')}}" class="form-horizontal" accept-charset="UTF-8">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ошибка!</strong>
                <ul class="alert-alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="controls">
            <div class="col-md-12">

                <div class="form-group">
                    <label for="message_text">Текст сообщения:</label>
                    <textarea id="message_text" name="body" class="form-control"
                              placeholder="Ваше сообщение" rows="4"
                              required="required">{{ old('message_text') }}</textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-success btn-send" value="Отправить сообщение" />
            </div>
        </div>
    </form>

    @foreach ($messages as $message)
        <div class="row wall-message">
            <div class="col-md-1 col-xs-2">
                <img src="{{ $message->user->gravatar }}" alt="gravatar" class="img-circle user-avatar" /></div>
            <div class="col-md-11 col-xs-10">
                <p><strong>{{ $message->user->name }}:</strong></p>
                <div><a>{{ $message->title }}</a>
                </div>
                <blockquote>
                    {{ $message->body }}
                    <div>
                        @if(Auth::check() && $message->id_owner == Auth::user()->id)
                            <a>
                                <form method="POST" action="{{ route('messages.delete',$message) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">DELETE message</button>
                                </form>
                            </a>
                        @endif
                    </div>
                </blockquote>
            </div>
        </div>
    @endforeach
@endsection