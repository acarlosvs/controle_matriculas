export default {
	data() {
		return {
            money: {
                decimal: ',',
                thousands: '.',
                precision: 2,
                masked: false
            },
		}
	},

	filters : {
		date : function(data) {
            return moment(data).format('DD/MM/YYYY');
        },
		dateTime : function(data) {
            return moment(data).format('DD/MM/YYYY - HH:mm');
        },
        dateInFull: function(data) {
            var dia = moment(data).format('DD');
            var mes = moment(data).format('M');
            var meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

            return dia + ' ' + meses[mes-1];
        },
		time : function(data) {
            return moment(data).format('HH:mm');
        },
        maskCpf : function(cpf){
        	if(cpf){
	            var cpf = cpf.replace(/[^0-9]/g, '');
	            var length = cpf.length;

	            if (length > 2 && length < 12) {
	                cpf = '0'.repeat(11 - length) + cpf;
	                cpf = cpf.substr(0, 3) + '.' + cpf.substr(3, 3) + '.' + cpf.substr(6, 3) + '-' + cpf.substr(9, 2);
	            }

	            return cpf;
            }
        },
	}

}
