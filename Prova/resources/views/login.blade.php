@extends('base')

@section('conteudo')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-center">Login</h1>
    </div>

    @if (session()->get('fail'))
        <div class="alert alert-danger">
            {{ session()->get('fail') }}
        </div>
        <br />
    @endif

    @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        <br />
    @endif

    <form action="/auth" method="post">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-purple">Login</button>
    </form>
</div>

@endsection
