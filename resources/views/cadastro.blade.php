@extends('app')

@section('content')
<div class="content">
    <div class="container-fluid">
       <div class="col-md-8">
        @if (isset($mensagemSucesso) && !empty($mensagemSucesso)) 
            <div class="alert alert-success">
              <strong>Sucesso!</strong> {{$mensagemSucesso}}
            </div>
        @endif

    <div class="card">
        <div class="header">
            <h4 class="title">Atividade</h4>
        </div>
        <div class="content">
            <form action="/cadastrar" method="POST">
                {!! csrf_field() !!} 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" required name='nome' class="form-control" placeholder="Nome" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Data de Início</label>
                            <input  type="text" required  pattern="\d{1,2}/\d{1,2}/\d{4}" name='dt_inicio' class="form-control date" placeholder="DD/MM/AAAA" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Data de Finalização</label>
                            <input class="form-control date" pattern="\d{1,2}/\d{1,2}/\d{4}" name='dt_fim' placeholder="DD/MM/AAAA">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Atividade</label>                        
                            <select class="selectpicker form-control" name='status'>
                               @foreach($status as $s)
                                    <option value="{{$s->id}}">{{$s->descricao}}</option>
                                @endforeach                              
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                            <label>Situação</label>                        
                            <select class="selectpicker form-control" name='situacao'>
                              <option value="1">Ativo</option>
                              <option value="0">Inativo</option>                              
                            </select>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea name='descricao' required rows="5" class="form-control" placeholder="Descrição da Atividade" value=""></textarea>
                        </div>
                    </div>
                </div>                                
                <button type="submit" class="btn btn-info btn-fill pull-right">Confirmar</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div> 
    </div>
</div>

@endsection