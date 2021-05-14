@extends('layouts.app')

@section('title', 'ユーザー情報')

@section('content')
<div class="container">
  <table class="table table-striped table-hover">

    <thead>
      <tr>
        <th></th>
        <th>ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <div>
            @if (!empty($authUser->thumbnail))
            <img src="/storage/user/{{ $authUser->thumbnail }}" class="thumbnail">
            @else
            画像なし
            @endif
          </div>
        </td>
        <td>{{ $authUser->id }}</td>
        <td>{{ $authUser->name }}</td>
        <td>{{ $authUser->email }}</td>
        <td>
          <a href="{{ route('user.userEdit') }}" class="btn btn-primary btn-sm">編集</a>
        </td>
      </tr>
    </tbody>

  </table>
</div>

@endsection