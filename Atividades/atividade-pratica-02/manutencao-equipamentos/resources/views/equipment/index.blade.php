@extends('layouts.app')

@section('template_title')
    Equipamentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Equipamentos') }}
                            </span>

                             <div class="float-right">
                                @if (session('user_group') == 2)
                                    <a href="{{ route('equipment.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Novo') }}
                                    </a>
                                @endif
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nome</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipment as $equipment)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $equipment->name }}</td>

                                            <td>
                                                <form action="{{ route('equipment.destroy',$equipment->id) }}" method="POST">
                                                    @csrf
                                                    <a class="btn btn-sm btn-primary " href="{{ route('equipment.show',$equipment->id) }}"><i class="fa fa-fw fa-eye"></i> Exibir</a>
                                                    @if (session('user_group') == 2)
                                                        <a class="btn btn-sm btn-success" href="{{ route('equipment.edit',$equipment->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Deletar</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $equipment->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
