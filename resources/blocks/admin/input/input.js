import { removeFileItem } from "./func/removeFileItem";

export function input() {
	let dt = new DataTransfer();

	document.querySelectorAll('.input-file input[type=file]').forEach(function (fileInput) {
		fileInput.addEventListener('change', function () {
			let filesList = this.closest('.input-file').nextElementSibling;
			filesList.innerHTML = '';

			for (let i = 0; i < this.files.length; i++) {
				let file = this.files[i];
				dt.items.add(file);

				let reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onloadend = function () {
					let newFileInput = document.createElement('div');
					newFileInput.className = 'input-file-list-item';
					newFileInput.innerHTML =
						'<img class="input-file-list-img" src="' + reader.result + '">' +
						'<span class="input-file-list-name">' + file.name + '</span>' +
						'<a href="#" class="input-file-list-remove">x</a>';
					filesList.appendChild(newFileInput);
					let removeBtn = filesList.querySelector('.input-file-list-remove')
					removeFileItem(removeBtn, dt)
				};
			}
			this.files = dt.files;
		});
	});
}