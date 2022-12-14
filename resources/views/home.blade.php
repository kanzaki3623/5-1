@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">ホーム</div>

                <div class="card-body m-2">
                        <form method="post" action="{{ route('save') }}" class="container">
                        <div class="row justify-content-center">
                            @csrf
                            <input type="text" name="text" class="col-10 mb-4" placeholder="いまどうしてる？">
                            @error('text')
                            <div>{{$message}}</div>
                            @enderror
                            </div>
                            <div class="row justify-content-end">
                            <input type="submit" name="submit" class="col-2 btn btn-secondary" value="つぶやく">
                            </div>
                        </form>
                </div>
            </div>

            @foreach($posts as $post)


            <div class="card">
                <div class="card-body container">
                    <div class="row justify-content-between">
                        <p class="col-8 font-weight-bold">{{$post -> user -> name}}</p>
                        <div class="col-4 text-right">{{$post -> created_at ->format('Y/m/d H:i')}}</div>
                    </div>
                    <div class="row justify-content-between">
                        <p class="col-10">{{$post -> body}}</p>
                        @if($post -> user_id === Auth::id())
                        <form method="post" action="{{ route('delete') }}" class="col-2 text-right">
                            @csrf
                            <input type="hidden" name="id" value="{{$post -> id}}">
                            <input type="submit" name="submit" value="削除" class="text-danger btn btn-light">
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
