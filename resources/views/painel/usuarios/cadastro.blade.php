@extends('painel.template.main')

@section('titulo')
    Cadastro de Usuário
@endsection

@section('conteudo')

@include('painel.includes.errors')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-left my-3" style="color:red;">
                        * Campos obrigatórios
                    </div>
                </div>
                <h4 class="card-title mb-4">Informações Básicas</h4>

                <form action="{{route('painel.usuario.cadastrar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session()->get("usuario")["atividade"] == 1)
                        <input type="hidden" name="cliente_id" value="{{session()->get('usuario')['cliente_id']}}">
                    @endif
                    <div class="row">
                        <div class="form-group col-12 col-lg-6">
                            <label for="nome">Nome *</label>
                            <input type="text" class="form-control" name="nome"
                                id="nome" required>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email"
                                id="email" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-12 col-lg-3">
                            <label for="usuario">Usuario *</label>
                            <input type="text" class="form-control" name="usuario"
                                id="usuario" required>
                        </div>
                        <div class="form-group col-12 col-lg-3">
                            <label for="senha">Senha *</label>
                            <input type="password" class="form-control" name="senha"
                                id="senha" required>
                        </div>
                        @if(session()->get("usuario")["atividade"] == 0)
                            <div class="form-group col-12 col-lg-3">
                                <label for="senha">Cliente</label>
                                <select class="form-control" name="cliente_id" id="">
                                    <option value="">Nenhum</option>
                                    @foreach(\App\Models\Cliente::select(["id", "nome"])->get() as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>       
                    <hr>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button type="submit" class="btn btn-primary px-5">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('scripts')
@endsection