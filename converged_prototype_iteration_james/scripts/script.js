const toggleCSS = document.getElementById('toggleCSS');
const body = document.getElementsByTagName('body')[0];

toggleCSS.addEventListener('click', e => {
	if(body.classList.contains('css')){
		body.classList.remove('css');
	}
	else {
		body.classList.add('css');
	}
});
