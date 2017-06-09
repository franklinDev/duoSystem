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

        @if (isset($atividade) && $atividade->status_id == 4)
           @php $disabled = 'disabled=disabled' @endphp
        @else
            {{$disabled = ''}}
        @endif

    <div class="card">
        <div class="header">
            <h4 class="title">Atividade</h4>
        </div>
        <div class="content">
            <form action="/{{$action}}" method="POST">
                {!! csrf_field() !!} 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" {{$disabled}} required name='nome' maxlength="255" class="form-control" placeholder="Nome" value="@if (isset($atividade)) {{$atividade->nome}} @endif">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Data de Início</label>
                            <input  type="text" required {{$disabled}} pattern="\d{1,2}/\d{1,2}/\d{4}" name='dt_inicio' class="form-control date" placeholder="DD/MM/AAAA" value="@if (isset($atividade)) {{$atividade->dt_inicio}} @endif">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Data de Finalização</label>
                            <input class="form-control date" {{$disabled}} pattern="\d{1,2}/\d{1,2}/\d{4}" name='dt_fim'  id='dt_fim' value="@if (isset($atividade)) {{$atividade->dt_fim}} @endif" placeholder="DD/MM/AAAA">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Atividade</label>                        
                            <select {{$disabled}} class="selectpicker form-control" name='status' id="status">
                               @foreach($status as $s)
                                    <option @if (isset($atividade) && $s->id == $atividade->status_id) selected @endif  value="{{$s->id}}">{{$s->descricao}}</option>
                                @endforeach                              
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                            <label>Situação</label>                        
                            <select {{$disabled}} class="selectpicker form-control" name='situacao'>
                              <option @if (isset($atividade) && $atividade->status_id == 1) selected @endif  value="1">Ativo</option>
                              <option @if (isset($atividade) && $atividade->status_id == 0) selected @endif value="0">Inativo</option>
                            </select>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea {{$disabled}} name='descricao' required rows="5" maxlength="600" class="form-control" placeholder="Descrição da Atividade" value="">@if (isset($atividade)) {{$atividade->descricao}} @endif</textarea>
                        </div>
                    </div>
                </div>                                
                <button {{$disabled}} type="submit" class="btn btn-info btn-fill pull-right">Confirmar</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div> 
    </div>
</div>

@endsection