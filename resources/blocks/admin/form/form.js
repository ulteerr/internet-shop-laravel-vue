import { uploadedFiles } from "../drop/drop";


export function form() {

	const forms = document.querySelectorAll('form')

	if (forms && forms.length > 0) {
		forms.forEach(form => {
			if (form.dataset.files) {
				let button = form.querySelector('input[type="submit"]')
				button?.addEventListener('click', async function (e) {
					e.preventDefault()
					let formData = new FormData(form),
						url = form.action,
						method = form.querySelector('input[name="_method"').value

					for (let i = 0; i < uploadedFiles.length; i++) {
						formData.append('images[]', uploadedFiles[i]);
					}
					let headers = { 'X-CSRF-TOKEN': form.querySelector('input[name="_token"').value }
					if (method === 'PATCH') {
						headers['X-HTTP-Method-Override'] = 'PATCH'
						method = 'POST'
					} else {
						headers = { 'X-CSRF-TOKEN': form.querySelector('input[name="_token"').value }
					}
					
					const fetchOptions = {
						method: method,
						body: formData,
						headers: headers
					};


					const response = await fetch(url, fetchOptions);
					console.log(response)
					if (response.ok) {
						let data = await response.json();
						if (data.redirectUrl) {
							window.location.href = data.redirectUrl
						}
					} else {
						let errors = await response.json();
						errors = errors.errors
						let formGroupErrors = document.querySelector('.form-group-errors')
						formGroupErrors.innerHTML = ''
						let ul = document.createElement('ul'),
							p = document.createElement('p'),
							div = document.createElement('div');


						div.classList.add(['errors-block'], ['alert'], ['alert-danger'])
						p.classList.add('h4')
						p.innerHTML = 'Объект не добавлен. Исправьте ошибки и попробуйте еще раз'

						for (const error in errors) {
							let li = document.createElement('li')
							li.innerHTML = errors[error][0]
							ul.appendChild(li);
						}

						div.appendChild(p);
						div.appendChild(ul);

						formGroupErrors.appendChild(div);
						window.scrollTo({ top: 0, behavior: 'smooth' });
					}
				})
			}
		})
	}
}
