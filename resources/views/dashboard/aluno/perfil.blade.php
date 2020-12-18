@extends('layouts.app')

@push('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">esse css ta dando BO-->


<link rel="stylesheet" href="{{ asset('/css/telaConta.css') }}">
<link rel="stylesheet" href="{{ asset('/css/perfil2.css') }}">

<link rel="icon" href="{{ asset('/icones/ICON.png') }}">
<title>Conta de Usuário</title>
<style>
  body {
    font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  }
  .profile-usertitle-job{
    font-size: 20px;
  }
   .card{
    margin-top: 0px;
  }
  .cardpro{
    margin-top: 20px;
  }
</style>





@endpush
@section('content')

<main role="main">

  <div class="main-content">
    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row cardpro">
            <div class="col-xl-4">
              <div class="card card-profile shadow">
                <div class="row justify-content-center">
                  <div class="col-lg-12 ">
                    <div class="profile-userpic">
                      <img src="{{ asset('/img/perfil.jpg') }}" class="img-responsive" alt="">
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                  <div class="row">
                    <div class="col">
                      <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                        {{ $aluno->nome }}                        
                        </div>
                        <div class="profile-usertitle-job" style="color:green">
                        {{ $aluno->turma->codigo . " - " .$aluno->turma->curso}} 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 order-xl-0 mb-5 mb-xl-0">
              <div class="card card-profile shadow">
                <div class="card-body pt-0 pt-md-4">
                  <div class="pl-lg-6">
                  <h6 class="heading-small">Informações Básicas</h6>
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-username">Nome</label>
                          <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ $aluno->nome }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Data de Nascimento</label>
                          <input type="date" id="input-email" class="form-control form-control-alternative" value="{{ $aluno->data_nascimento }}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-first-name">Naturalidade</label>
                          <input type="text" id="input-first-name" class="form-control form-control-alternative" value="{{ $aluno->naturalidade }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Municipio</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" value="{{ $aluno->municipio }}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Apelido</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" value="{{ $aluno->apelido }}" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body card">
            <form>
              <h4 class="mb-4"><strong>Ocorrências</strong></h4>
              <hr class="my-4">
              <div class="pl-lg-4">
                <div class="row">
                  <table class="table display" id="table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th style="width: 100px;"></th>
                        <th>Descrição</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0 ?>
                      @foreach ($aluno->ocorrenciaAluno as $oc)
                      @if ($oc->ocorrencia->categoria == "punitiva")
                      <?php $i++ ?>
                      <tr class="active" value="{{ $oc->ocorrencia->id }}">
                        <td style="width: 100x;">{{$i}}</td>
                        <td>{{ $oc->ocorrencia->relato }}</td>
                        <!-- <td>{{ $oc->ocorrencia->tipo->motivo }}</td> -->

                      </tr>
                      @endif
                      @endforeach

                    </tbody>
                  </table>

                </div>
              </div>
              <hr class="my-4">
              <h4 class="mb-4"><strong>Elogios</strong></h4>
              <hr class="my-4">
              <div class="pl-lg-4">
                <div class="row">
                  <table class="table display" id="table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th style="width: 100px;"></th>
                        <th>Descrição</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0 ?>
                      @foreach ($aluno->ocorrenciaAluno as $oc)
                      @if ($oc->ocorrencia->categoria == "elogio")
                      <?php $i++ ?>
                      <tr class="active" value="{{ $oc->ocorrencia->id }}">
                        <td style="width: 100x;">{{$i}}</td>
                        <td>{{ $oc->ocorrencia->relato }}</td>
                        <!-- <td>{{ $oc->ocorrencia->tipo->motivo }}</td> -->

                      </tr>
                      @endif
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <hr class="my-4">
              <!-- Address -->
              <h4 class="mb-4"><strong>Observações</strong></h4>
              <hr class="my-4">
              <div class="pl-lg-4">
                <div class="row">
                
                  <div class="col-lg-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-country">Médica</label>
                      <input type="text" id="input-country" class="form-control form-control-alternative" value="{{ $aluno->obs_medica }}" readonly>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Pedagógica</label>
                      <input type="number" id="input-postal-code" class="form-control form-control-alternative" value="{{ $aluno->obs_pedagogica }}" readonly>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-city"> NAPNE </label>
                      <input type="text" id="input-city" class="form-control form-control-alternative" value="{{ $aluno->obs_napne }}" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--<div class="container">
    <div class="row profile">
		<div class="col-md-3">
        <div class="portlet light profile-sidebar-portlet bordered">
			<div class="profile-sidebar">

				<div class="profile-userpic">
					<img src="{{ asset('/img/perfil.jpg') }}" class="img-responsive" alt="">
				</div>

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Maria Bunita
					</div>
					<div class="profile-usertitle-job" style="color:green">
						Professora de Inglês
					</div>
				</div>

				<div class="profile-usermenu">
					<ul style="list-style: none;">
						<li>
							<a href="#">
							<i class="fas fa-fw fa-user"></i>
							Informações da Conta </a>
                        </li>
						<li>
							<a href="#">
							<i class="fas fa-fw fa-th-list"></i>
							Lista de Ocorrencias </a>
                        </li>
                        <li>
							<a href="#">
							<i class="fas fa-fw fa-trash"></i>
							Excluir Conta </a>
						</li>
					</ul>
				</div>

            </div>
        </div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div>
	</div>
</div> -->

  <br>
  <br>
</main>

@endsection

@push('js')
<script src="{{ asset('/js/jquery.min.js')  }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js"></script>



@endpush