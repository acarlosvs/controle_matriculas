<template>
    <div id="home">
        <div>
            <div class="panel-heading">Informações da Instituição</div>
            <div class="col-md-12">
                <p><b>Nome da Instituição:</b> {{ escola.nome }}</p>
                <p><b>Endereço:</b> {{ escola.endereco }}</p>
                <p><b>Razão Social:</b> {{ escola.razao_social }}</p>
                <p><b>Telefone:</b> {{ escola.telefone }}</p>
                <p><b>CEP:</b> {{ escola.cep }}</p>
            </div>

            <hr class="col-md-12">
            <div class="panel-heading">Opções</div>
            <div class="col-md-12">
                <a @click="getTurmas()" class="btn btn-xs btn-primary">
                    Listar Turmas
                </a>
                <a :href="urlBase+'/turmas/nova-turma'" class="btn btn-xs btn-primary">
                    Nova Turma
                </a>
                <a :href="urlBase+'/turmas/alterar-turma'" class="btn btn-xs btn-primary">
                    Alterar Turma
                </a>
                <a :href="urlBase+'/turmas/alterar-turma'" class="btn btn-xs btn-primary">
                    Apagar Tumar
                </a>
            </div>

            <hr class="col-md-12">

            <div class="panel-heading">Informações de Turmas</div>

            <div class="panel-body">
                <table class='table table-responsive table-striped table-bordered table-condensed'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Período</th>
                            <th>CH</th>
                            <th class="text-center">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="qtdeTurmas == 0">
                            <td colspan="5">
                                <p class="text-center">
                                    Liste as turmas!
                                </p>
                            </td>
                        </tr>
                        <tr v-else v-for="turma in listaTurmas">
                            <td>{{ turma.id }}</td>
                            <td class="text-center">
                                {{ turma.data_inicio | date }} à {{ turma.data_final | date }}
                            </td>
                            <td>{{ turma.carga_horaria }} horas</td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-primary" @click="getAlunos(turma.id)">
                                    Alunos
                                </button>
                                <button class="btn btn-xs btn-primary" @click="getInstrutores(turma.id)">
                                    Instrutores
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr class="col-md-12">

            <div class="panel-heading">Alunos da Turma</div>

            <div class="panel-body">
                <table class='table table-responsive table-striped table-bordered table-condensed'>
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Nome do Aluno</th>
                            <th>Email</th>
                            <th>Fone</th>
                            <th>Data Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="qtdeAlunos == 0">
                            <td colspan="5">
                                <p class="text-center">
                                    Selecione uma turma!
                                </p>
                            </td>
                        </tr>
                        <tr v-else v-for="matricula in listaAlunos.has_matriculas">
                            <td>{{ matricula.has_alunos.cpf }}</td>
                            <td>{{ matricula.has_alunos.nome }}</td>
                            <td>{{ matricula.has_alunos.email }}</td>
                            <td>{{ matricula.has_alunos.fone }}</td>
                            <td>{{ matricula.has_alunos.data_nascimento | date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr class="col-md-12">

            <div class="panel-heading">Instrutores da Turma</div>

            <div class="panel-body">
                <table class='table table-responsive table-striped table-bordered table-condensed'>
                    <thead>
                        <tr>
                            <th>Instrutor</th>
                            <th>Email</th>
                            <th>Valor Hora</th>
                            <th>Certificados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="qtdeInstrutores == 0">
                            <td colspan="5">
                                <p class="text-center">
                                    Selecione uma turma!
                                </p>
                            </td>
                        </tr>
                        <tr v-else v-for="instrutor in listaInstrutores.has_instrutores">
                            <td>{{ instrutor.nome }}</td>
                            <td>{{ instrutor.email }}</td>
                            <td>{{ 'R$ ' + instrutor.valor_hora }}</td>
                            <td>{{ instrutor.certificados }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'home',
        data () {
            return {
                urlBase : urlBase,
                escola : {},
                listaTurmas : [],
                listaAlunos : [],
                listaInstrutores : [],
                qtdeTurmas : '',
                qtdeAlunos : '',
                qtdeInstrutores : '',
            }
        },
        methods : {
            getEscolas: function() {
                var url = "/api/escolas/api-lista";
                
                this.$http.get(urlBase + url).then((response) => {
                    this.escola = response.body;
                }, response => {
                    return Swal({
                        type: this.response.status,
                        title: this.response.msg,
                    });
                });
            },
            getTurmas: function() {
                var url = "/api/turmas/api-lista";
                
                this.$http.get(urlBase + url).then((response) => {
                    this.listaTurmas = response.body;
                    this.qtdeTurmas = this.listaTurmas.length;
                }, response => {
                    return Swal({
                        type: this.response.status,
                        title: this.response.msg,
                    });
                });
            },
            getAlunos: function(turma_id) {
                var url = "/api/turmas/alunos-turma/"+turma_id;
                
                this.$http.get(urlBase + url).then((response) => {
                    this.listaAlunos = response.body;
                    this.qtdeAlunos = this.listaAlunos.length;
                }, response => {
                    return Swal({
                        type: this.response.status,
                        title: this.response.msg,
                    });
                });
            },
            getInstrutores: function(turma_id) {
                var url = "/api/turmas/instrutores-turma/"+turma_id;
                
                this.$http.get(urlBase + url).then((response) => {
                    this.listaInstrutores = response.body;
                    this.qtdeInstrutores = this.listaInstrutores.length;

                    console.log(this.listaInstrutores);
                }, response => {
                    return Swal({
                        type: this.response.status,
                        title: this.response.msg,
                    });
                });
            }
        },
        mounted () {
            this.getEscolas();
        },
    };
</script>

<style scoped>
</style>