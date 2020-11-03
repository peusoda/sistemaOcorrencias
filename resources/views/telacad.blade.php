@extends('layouts.app')

@push('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
    

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
                <div class="card-header">Cadastro de Aluno</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                    <table class="table" id="table">
                      <form class="form-horizontal">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  
                              <div class="col-md-8 ">
                              <input id="Nome" name="Nome" placeholder="" class="form-control input-md" required="" type="text">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-5 control-label" >Data de Nascimento<h11>*</h11></label>  
                              <div class="col-md-2">
                              <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                            </div>
                          </div>

                            <!-- Multiple Radios (inline) -->

                              <label class="col-md-1 control-label" for="radios">Sexo<h11>*</h11></label>
                              <div class="col-md-4"> 
                                <label required="" class="radio-inline" for="radios-0" >
                                  <input name="sexo" id="sexo" value="feminino" type="radio" required>
                                  Feminino
                                </label> &nbsp
                                <label class="radio-inline" for="radios-1">
                                  <input name="sexo" id="sexo" value="masculino" type="radio">
                                  Masculino
                                </label>
                              </div>

                            <div class="form-group">
                            <label class="col-md-5 control-label" for="profissao">Naturalidade<h11>*</h11></label>  
                              <div class="col-md-4">
                              <input id="#" name="#" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="#">Município<h11>*</h11></label>  
                              <div class="col-md-4">
                              <input id="#" name="#" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="#">Transporte<h11>*</h11></label>  
                              <div class="col-md-4">
                              <input id="#" name="#" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                              <label class="col-md-2 control-label" for="Nome">CPF</label>  
                              <div class="col-md-2">
                              <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                              </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-5 control-label" for="#">Tipo Sanguíneo</label>  
                              <div class="col-md-1">
                              <input id="#" name="#" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="#">Apelido</label>  
                              <div class="col-md-4">
                              <input id="#" name="#" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="profissao">Observações </label>  
                              <div class="col-md-12">
                              <input id="profissao" name="profissao" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="profissao">Observações Médicas</label>  
                              <div class="col-md-12">
                              <input id="profissao" name="profissao" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="profissao">Observações Pedagógicas</label>  
                              <div class="col-md-12">
                              <input id="profissao" name="profissao" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>


                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="Estado Civil">Turma<h11>*</h11></label>
                              <div class="col-md-2">
                                <select required id="Estado Civil" name="Estado Civil" class="form-control">
                                    <option value=""></option>
                                  <option value="turma">TI 0118</option>
                                  <option value="turma">TI 0119</option>
                                  <option value="turma">TI 0120</option>
                                  <option value="turma">AGRO 0118</option>
                                  <option value="turma">AGRO 0119</option>
                                  <option value="turma">AGRO 0120</option>
                                  <option value="turma">ZOO 0118</option>
                                  <option value="turma">ZOO 0119</option>
                                  <option value="turma">ZOO 0120</option>
                                </select>
                              </div>
                              </div>

                                                      <!-- Prepended text-->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="prependedtext">Responsável<h11>*</h11></label>
                              <div class="col-md-5">
                                <div class="input-group">
                                  <input id="prependedtext" name="prependedtext" class="form-control" placeholder="" required="" type="text"  >
                                </div>
                              </div>
                            </div>



                            <!-- Button (Double) -->







                        </fieldset>
                      </form>
                    </table>
                  </div>
                  <button class="btn btn-success" type="Submit">Cadastrar</button>
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



