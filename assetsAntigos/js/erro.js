function Erro() {
    this.erro = function (a, b, c) {
        a = a ? a : 'false';
        b = b ? b : 'false';
        c = c ? c : 'false';
        console.error(a, b, c);
        this.toast('Ocorreu um erro', 3000, 'error');
    }

    this.toast = function (msg, tempo, ico) {
		tempo = tempo ? tempo : 2000;
		ico = ico ? ico : 'info';
		$('#toast .material-icons').html(ico);
		document.querySelector('#toast').MaterialSnackbar.showSnackbar({ message: msg, timeout: tempo });
    }
}