@extends('layouts.app')

@push('style')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">esse css ta dando BO-->


    <link rel="stylesheet" href="{{ asset('/css/telaConta.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/perfil2.css') }}">

    <link rel="icon" href="{{ asset('/icones/ICON.png') }}">
    <title>Conta de Usuário</title>
    <style>
        body{
            font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

    </style>





@endpush
@section('content')

<main role="main">

  <div class="main-content">

    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
          
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
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
						Maria Bunita
					</div>
					<div class="profile-usertitle-job" style="color:green">
						Professora de Inglês
					</div>
				</div>
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
        
        <div class="col-8 ">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div>
              </form>
            </div>
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
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>



@endpush



