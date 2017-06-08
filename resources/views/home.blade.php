@extends('app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">                            
                            <div class="content">
                            <h4 class="title">Lista de Atividades</h4>
                            <p class="category">Filtro</p>
                                <form>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">                                            
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Status <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu">
                                                      @foreach($status as $s)
                                                        <li><a class='status_link' data-id="{{$s->id}}" href="#">{{$s->descricao}}</a></li>
                                                      @endforeach
                                                  </ul>
                                                </div>                                                
                                            </div>
                                        </div> 
                                        <div class="col-md-1">
                                            <div class="form-group">                                            
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Situação <span class="caret"></span>
                                                  </button>
                                                  <ul id="stituacao" class="dropdown-menu">
                                                    <li><a class='situacao_link'data-id="1" href="#">Ativo</a></li>
                                                    <li><a class='situacao_link'  data-id="0" href="#">Inativo</a></li>
                                                  </ul>
                                                </div>                                                
                                            </div>
                                        </div>                                                                                            
                                    </div>                                                                                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Editar</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Data de Início</th>
                                    <th>Data de Fim</th>
                                    <th>Status</th>
                                    <th>Situação</th>
                                </thead>
                                <tbody>
                                @foreach($atividades as $atividade)
                                    <tr  @if ($atividade->status_id == 4) style="background-color: #dff0d8  @endif">
                                        <td>
                                            <a href="{{url('/')}}/editar/{{$atividade->id}}">
                                                <button type="button" class="btn btn-default btn-sm">
                                                    <span class="glyphicon glyphicon-pencil"></span> Editar
                                                </button>
                                            </a>
                                        </td>
                                        <td>{{$atividade->nome}}</td>
                                        <td>{{$atividade->descricao}}</td>
                                        <td>{{date('d/m/Y', strtotime($atividade->dt_inicio))}}</td>
                                        <td>{{date('d/m/Y', strtotime($atividade->dt_fim))}}</td>
                                        <td>{{$atividade->status->descricao}}</td>
                                        <td>@if ($atividade->situacao == 1) Ativo @else Inativo @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="content">

                                <div class="row">
                                    <div class="col-lg-1">
                                        <a href="{{ url('/') }}/cadastrar">
                                            <button type="button" class="btn">Cadastrar Nova Atividade</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection