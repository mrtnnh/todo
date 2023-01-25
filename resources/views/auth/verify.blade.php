@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メールアドレスが正しいか確認してください</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                          新しい確認リンクがメールアドレスに送信されました。
                        </div>
                    @endif

                    メールが届いているか確認してください。
                    メールが届かなかった場合は,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">こちらをクリックしてもう一度送信してください</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
