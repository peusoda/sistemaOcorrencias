<?php

use Illuminate\Database\Seeder;
use App\TipoOcorrencia;

class TipoOcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoOcorrencia::insert([
        //Faltas Leves
        ['descricao' => 'a - fumar em recinto público - Lei Federal nº 9.294, de 15/07/96. art. 2º;', 'nivel' => 'leve',],
        ['descricao' => 'b - transgredir normas de funcionamento da biblioteca, do refeitório, da quadra esportiva, dos laboratórios e da sala de aula;', 'nivel' => 'leve',],
        ['descricao' => 'c - utilizar e manter ligado telefone celular, aparelhos e jogos eletrônicos, durante as aulas teóricas, práticas ou avaliativas, sem autorização do professor;', 'nivel' => 'leve',],
        ['descricao' => 'd - deixar de usar uniforme no interior do Câmpus durante o período das atividades educacionais, solenidades cívicas e quando estiver em representações do IFNMG;', 'nivel' => 'leve',],
        ['descricao' => 'e - afixar em qualquer parte do instituto, cartazes, desenhos, fotos ou gravuras sem autorização;', 'nivel' => 'leve',],
        ['descricao' => 'f - pichar, grafitar, escrever, desenhar ou por outro meio sujar as edificações, equipamentos e mobiliários;', 'nivel' => 'leve',],
        ['descricao' => 'g - namorar de forma extravagante e/ou praticar qualquer ato que enseje comportamento inadequado à moral e aos bons costumes nas dependências da instituição ou em atividades de representação do IFNMG;', 'nivel' => 'leve',],
        ['descricao' => 'h - submeter colegas ou servidores a constrangimento;', 'nivel' => 'leve',],
        ['descricao' => 'i - nadar nos rios, lagoas e represas do instituto;', 'nivel' => 'leve',],
        ['descricao' => 'j - promover ou participar de jogos de azar ainda que eventualmente;', 'nivel' => 'leve',],
        ['descricao' => 'k - organizar rifas, lanches ou qualquer forma de arrecadação pecuniária, distribuir impressos, divulgar folhetos, fazer exibições ou comunicações públicas, dentro do Instituto sem a autorização da Direção Geral;', 'nivel' => 'leve',],
        ['descricao' => 'l - entrar ou sair das dependências da instituição de forma inadequada, tais como pulando muros,portões, grades, etc.;', 'nivel' => 'leve',],
        ['descricao' => 'm - promover e/ou participar de encontros, congressos estudantis no recinto do Câmpus, sem o prévio conhecimento e devido deferimento da Coordenação de Ensino;', 'nivel' => 'leve',],
        ['descricao' => 'n - alimentar-se em sala de aula e laboratórios sem autorização do professor;', 'nivel' => 'leve',],
        ['descricao' => 'o - permanecer em sala de aula ou no local de trabalho escolar após o término das atividades escolares normais, sem autorização;', 'nivel' => 'leve',],
        ['descricao' => 'p - ausentar-se da sala de aula ou do local de trabalho escolar sem autorização do respectivo professor ou da Coordenação de Ensino;', 'nivel' => 'leve',],
        ['descricao' => 'q - outras não constantes nesse rol e que podem ser equiparadas.', 'nivel' => 'leve',],
        //Faltas Graves
        ['descricao' => 'a - desrespeitar os princípios de hierarquia administrativa do IFNMG;', 'nivel' => 'grave',],
        ['descricao' => 'b - perturbar a ordem em salas de aulas, corredores, unidades/setores de produção e demais dependências do Instituto;', 'nivel' => 'grave',],
        ['descricao' => 'c - depredar, cortar, derrubar, arrancar árvores e/ou seus frutos nas dependências da Instituição de Ensino;', 'nivel' => 'grave',],
        ['descricao' => 'd - acessar, oferecer, trocar, disponibilizar, transmitir, distribuir, publicar ou divulgar, por qualquer meio, inclusive por meio de sistema de informática/virtual ou telemático, fotografia, no interior do Câmpus ou quando estiver representando o mesmo, vídeo ou outro registro que contenha cena de sexo ou pornografia;', 'nivel' => 'grave',],
        ['descricao' => 'e - praticar, provocar ou motivar, direta ou indiretamente o bullying, que são atitudes agressivas, intencionais e repetitivas, adotadas por um indivíduo (bully) ou grupo de indivíduos contra outro(s), sem motivação evidente, causando dor, angústia e sofrimento e, executadas em uma relação desigual de poder, o que possibilita a vitimização. Comprova-se o bullying por meio de atos de intimidação, humilhação e discriminação, entre as quais: insultos pessoais; apelidos pejorativos; ataques físicos; grafitagens depreciativas; expressões ameaçadoras e preconceituosas; isolamento social; ameaças; e pilhérias: Classifica-se o bullying de acordo com as seguintes ações praticadas: verbal: apelidar, xingar, insultar; moral: difamar, disseminar rumores, caluniar; sexual: assediar, induzir e/ou abusar; psicológico: ignorar, excluir, perseguir, amedrontar, aterrorizar, intimidar, dominar, tiranizar, chantagear e manipular; material: destroçar, estragar, furtar, roubar os pertences; físico: empurrar, socar, chutar, beliscar, bater; e virtual: divulgar imagens, criar comunidades, enviar mensagens, invadir a privacidade.', 'nivel' => 'grave',],
        ['descricao' => 'f - praticar atos libidinosos;', 'nivel' => 'grave',],
        ['descricao' => 'g - frequentar, sem autorização, os locais de acessos restritos identificados com placas e/ou as unidades de produção fora do horário de aulas;', 'nivel' => 'grave',],
        ['descricao' => 'h - obrigar colegas a executar tarefas a si atribuídas;', 'nivel' => 'grave',],
        ['descricao' => 'i - proferir expressões injuriosas, caluniosas ou difamatórias contra seus colegas, servidores e/ou funcionários de empresas terceirizadas que prestam serviço para o Câmpus ou qualquer outra pessoa nas dependências da Instituição de Ensino ou em missão de representação da mesma;', 'nivel' => 'grave',],
        ['descricao' => 'j - impedir a entrada de colegas às aulas ou instigá-los a faltas coletivas;', 'nivel' => 'grave',],
        ['descricao' => 'k - participar de movimentos de indisciplina;', 'nivel' => 'grave',],
        ['descricao' => 'l - permanecer nos setores de produção e laboratórios sem a devida autorização do professor responsável;', 'nivel' => 'grave',],
        ['descricao' => 'm - frequentar e/ou permanecer, sem autorização, fora do horário de funcionamento, nas dependências da Instituição;', 'nivel' => 'grave',],
        ['descricao' => 'n - praticar, provocar ou motivar, direta ou indiretamente, ato de discriminação, por sexo, idade, cor, raça, religião, estado civil, doença, orientação sexual, deficiência física, nacionalidade, tradição religiosa, cultural, étnica ou outras formas de discriminação;', 'nivel' => 'grave',],
        ['descricao' => 'o - perseguir, criar, apreender, causar sofrimento ou matar animais domésticos e/ou silvestres nas dependências da Instituição de Ensino;', 'nivel' => 'grave',],
        ['descricao' => 'p - deixar as dependências do Câmpus sem autorização, se menor de idade;', 'nivel' => 'grave',],
        ['descricao' => 'q - outras não constantes nesse rol e que podem ser equiparadas.', 'nivel' => 'grave',],
        //Faltas Gravissimas
        ['descricao' => 'a - usar ou depositar entorpecentes, psicotrópicos ou bebidas alcoólicas no recinto da Instituição de Ensino ou onde estiver participando de delegação ou representação estudantil, bem como, apresentar-se embriagado ou sob efeito de qualquer uma dessas substâncias;','nivel' => 'gravissima',],
        ['descricao' => 'b - adquirir, portar, guardar, oferecer ou fornecer a outrem, substâncias entorpecentes ou que determinem dependência física ou psíquica, ainda que gratuitamente, no interior do Câmpus ou fora dele quando estiver representando a instituição de ensino;','nivel' => 'gravissima',],
        ['descricao' => 'c - portar ou usar armas de fogo ou armas brancas;','nivel' => 'gravissima',],
        ['descricao' => 'd - portar materiais inflamáveis, soltar fogos de artifícios, rojões ou qualquer outro tipo de artefato que cause explosão ou que possa provocar risco de lesão corporal e/ou psicológica para si ou para outrem;','nivel' => 'gravissima',],
        ['descricao' => 'e - cometer atentado ao pudor;','nivel' => 'gravissima',],
        ['descricao' => 'f - liderar movimentos de indisciplina;','nivel' => 'gravissima',],
        ['descricao' => 'g - envolver-se em casos policiais por atos praticados;','nivel' => 'gravissima',],
        ['descricao' => 'h - causar danos materiais ao patrimônio do IFNMG e/ou de particulares, ficando, inclusive, obrigado ao ressarcimento pelos eventuais prejuízos que causar, sem a exclusão da medida disciplinar cabível;','nivel' => 'gravissima',],
        ['descricao' => 'i - praticar atos definidos como crime ou ato infracional;','nivel' => 'gravissima',],
        ['descricao' => 'j - apoderar-se indevidamente de objetos alheios;','nivel' => 'gravissima',],
        ['descricao' => 'k - promover, participar ou aplicar trote a seus colegas ou qualquer pessoa, que cause, agressão física, moral, humilhação ou outras formas de constrangimento;','nivel' => 'gravissima',],
        ['descricao' => 'l - usar de meios ilícitos ou agir de forma caluniosa, fraudulenta e antiética para realizar atividades avaliativas ou para tirar vantagem de qualquer natureza, em benefício próprio ou de terceiros;','nivel' => 'gravissima',],
        ['descricao' => 'm - subtrair ou se apropriar indevidamente, para si ou para outrem, de materiais, insumos, produtos','nivel' => 'gravissima',],
        ['descricao' => 'e -subprodutos pertencentes ao Câmpus;','nivel' => 'gravissima',],
        ['descricao' => 'n - apoderar-se de produtos dos projetos agro ecológicos sem autorização;','nivel' => 'gravissima',],
        ['descricao' => 'o - desafiar, agredir física e/ou moralmente colegas, servidores, funcionários ou qualquer outra pessoa nas dependências da Instituição ou quando em missão de representação da mesma com ou sem lesões corporais;','nivel' => 'gravissima',],
        ['descricao' => 'p - outras não constantes nesse rol e que podem ser equiparadas.','nivel' => 'gravissima',]
        ]);
    }
}



