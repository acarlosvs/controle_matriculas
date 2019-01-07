<template>
    <div id="form-turmas">
        <div class="panel-heading">Cadastro de Turmas</div>

        <div class="panel-body">
            <form class="form-horizontal" v-on:submit.prevent="salvar">
                <div class="form-group">
                    <label for="data_inicio" class="col-md-4 control-label">Data Início</label>
                    <div class="col-md-6">
                        <input v-input-mask data-inputmask="'alias': 'datetime', 'inputFormat': 'dd/mm/yyyy'" v-model="turma.data_inicio" class="form-control" name="data_inicio"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="data_final" class="col-md-4 control-label">Data Final</label>
                    <div class="col-md-6">
                        <input v-input-mask data-inputmask="'alias': 'datetime', 'inputFormat': 'dd/mm/yyyy'" v-model="turma.data_final" class="form-control" name="data_inicio"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="carga_horaria" class="col-md-4 control-label">Carga Horária</label>
                    <div class="col-md-6">
                        <input id="carga_horaria" type="number" class="form-control" name="carga_horaria" v-model="turma.carga_horaria" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="instrutores_id" class="col-md-4 control-label">Instrutor</label>
                    <div class="col-md-6">
                        <select id="instrutores_id" name="instrutores_id" v-model="turma.instrutores_id" class="form-control" required>
                            <option value="">Selecione um instrutor</option>
                            <option v-for="instrutor in instrutores" :value="instrutor.id">
                                {{ instrutor.nome }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cursos_id" class="col-md-4 control-label">Curso</label>
                    <div class="col-md-6">
                        <select id="cursos_id" name="cursos_id" v-model="turma.cursos_id" class="form-control" required>
                            <option value="">Selecione um curso</option>
                            <option v-for="curso in cursos" :value="curso.id">
                                {{ curso.nome }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'form-turmas',
        data () {
            return {
                urlBase : urlBase,
                titulo: 'Deseja Salvar',
                turma: {
                    id : '',
                    data_inicio : '',
                    data_final : '',
                    carga_horaria : '',
                    instrutores_id : '',
                    cursos_id : '',
                },
                instrutores : [],
                cursos : [],
            }
        },
        methods : {
            salvar : function() {
                self = this;

                Swal({
                    title: this.titulo+'?',
                    type: 'question',
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.post(urlBase+'/turmas/nova-turma/', self.turma).then((response) => {
                            self.retorno = response.body;
                        }, response => {
                            self.retorno = 0;
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (self.retorno == 0) {

                        return Swal({
                            type: 'error',
                            title: 'Um erro ocorreu!',
                            html: msg,
                        });
                    }

                    return Swal({
                        type: self.retorno.status,
                        title: self.retorno.msg,
                    });
                }).catch(Swal.noop)
            },
            getInstrutores: function() {
                var url = "/api/instrutores/api-lista";
                
                this.$http.get(urlBase + url).then((response) => {
                    this.instrutores = response.body;
                }, response => {
                    return Swal({
                        type: this.response.status,
                        title: this.response.msg,
                    });
                });
            },
            getCursos: function() {
                var url = "/api/cursos/api-lista";
                
                this.$http.get(urlBase + url).then((response) => {
                    this.cursos = response.body;
                }, response => {
                    return Swal({
                        type: this.response.status,
                        title: this.response.msg,
                    });
                });
            },
        },
        mounted () {
            this.getInstrutores();
            this.getCursos();
        },
    };
</script>

<style scoped>
</style>