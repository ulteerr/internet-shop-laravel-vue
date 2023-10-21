import { deleteImage } from "./deleteImage";

export function setImage(image, file) {
	let reader = new FileReader()
	reader.onload = function (event) {
		let img = document.createElement('img'),
			a = document.createElement('a'),
			div = document.createElement('div');

		img.src = event.target.result;

		a.classList.add('drop-zone-select-image-remove')
		a.innerHTML = 'x'
		div.classList.add('drop-zone-select-image')

		div.appendChild(img);
		div.appendChild(a);
		image.appendChild(div);



		deleteImage(div, file)

	}
	reader.readAsDataURL(file);
}
