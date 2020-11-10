@extends('layouts.app')
@push('style')
    <style>
    h11 {
    color:red;
    }

    #logo {
            width:50%;
            height:50%;
    }

    .panel-heading{
        font-size:150%;
    }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastro de Servidor</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                  {{ Form::model($server, ['route' => 'servidor.updateConf', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                  <table class="table" id="table">
                    
                        <fieldset>
                            <input type="hidden" value="{{ $server->id }}" name="id">
                            <!-- Text input-->
                            {{-- Nome do Servidor --}}
                            <div class="form-group">
                            {{ Form::label('nome', 'Nome *', array('class' => 'col-md-2 control-label')) }}
                              <!--<label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  -->
                              <div class="col-md-8 ">
                                {{ Form::text('nome', 'old'('nome'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            {{ Form::label('siape', 'Siape *', array('class' => 'col-md-5 control-label'))}}
                              <!--<label class="col-md-5 control-label" >Siape<h11>*</h11></label>  -->
                              <div class="col-md-2">
                                  {{ Form::text('siape', 'old'('siape'), ['class' => 'form-control input-md', 'required']) }}
                            </div>
                        </div>
                            <div class="form-group">
                                {{ Form::label('funcao', 'Função *', array('class' => 'col-md-5 control-label'))}}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-4"> 
                                    <select value='' id="funca" name="funcao" class="form-control chosen-select" required>
                                        <option id="nada" name="nada" value="">Selecione uma opção</option>
                                        <option id="funcao" name="funcao" value="p">Professor</option>
                                        <option id="funcao" name="funcao" value="t">Técnico</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                            {{ Form::label('email', 'E-mail *', array('class' => 'col-md-5 control-label') )}}
                            <!--<label class="col-md-5 control-label" for="profissao">Naturalidade<h11>*</h11></label>  -->
                              <div class="col-md-4">
                                {{ Form::email('email', 'old'('email'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('contato', 'Contato *', array('class' => 'col-md-5 control-label')) }}
                            <!--<label class="col-md-5 control-label" for="#">Município<h11>*</h11></label>  -->
                              <div class="col-md-4">
                                {{ Form::text('contato', 'old'('contato'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                              </div>
                            </div>
                        </fieldset>
                          
                    </table>
                    {{ Form::submit('Cadastrar Servidor', ['class' => 'btn btn-success']) }}
                      {{ form::close() }}
                  </div>
                  
                  
                </div>
            </div>
        </div>
    </div>
</div>

<!------ Include the above in your HEAD tag ---------->





@endsection

@push('js')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>

        
        function limpa_formulario_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('estado').value=("");
                
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('estado').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulario_cep();
                alert("CEP não encontrado.");
                document.getElementById('cep').value=("");
            }
        }
            
        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep !== "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('estado').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulario_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulario_cep();
            }
        }

    function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i);
    
    if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
    }
    
    }
    
    function idade (){
        var data=document.getElementById("dtnasc").value;
        var dia=data.substr(0, 2);
        var mes=data.substr(3, 2);
        var ano=data.substr(6, 4);
        var d = new Date();
        var ano_atual = d.getFullYear(),
            mes_atual = d.getMonth() + 1,
            dia_atual = d.getDate();
            
            ano=+ano,
            mes=+mes,
            dia=+dia;
            
        var idade=ano_atual-ano;
        
        if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
            idade--;
        }
    return idade;
    } 
    
    
    function exibe(i) {
        
    
            
        document.getElementById(i).readOnly= true;
            
            
        
        
    }

    function desabilita(i){
        
        document.getElementById(i).disabled = true;    
        }
    function habilita(i)
        {
            document.getElementById(i).disabled = false;
        }


    function showhide()
    {
        var div = document.getElementById("newpost");
        
        if(idade()>=18){
    
        div.style.display = "none";
    }
    else if(idade()<18) {
        div.style.display = "inline";
    }

    }

    </script>
@endpush    



