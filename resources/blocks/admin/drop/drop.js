import { dragoverEvents } from "./events/dragoverEvents";
import { dragleaveEvents } from "./events/dragleaveEvents";
import { dropEvents } from "./events/dropEvents";
import { setImage } from "./func/setImage";
import { deleteImage } from "./func/deleteImage";


export let uploadedFiles = []
export let dropParams = { value: true, text: '' }


export function drop() {

	window.addEventListener("DOMContentLoaded", function () {
		let dropzones = document.querySelectorAll('.drop-zone')
		if (dropzones && dropzones.length > 0) {
			dropzones.forEach(dropzone => {
				let selectedImages = dropzone.querySelector('.drop-zone-select-images'),
					fileInput = dropzone.querySelector('.drop-zone-file-input'),
					selectImageStore = dropzone.querySelectorAll('.drop-zone-select-image-store')
				if (selectImageStore && selectImageStore.length > 0) {
					dropParams.value = false
					selectImageStore.forEach(item => {
						deleteImage(item, false, true)
					})
					dropParams.text = selectedImages.getAttribute('value')
				} else {
					dropParams.text = selectedImages.innerHTML
				}
				selectedImages.setAttribute('value', '')
				
				dragoverEvents(dropzone)
				dragleaveEvents(dropzone)
				dropEvents(dropzone, dropParams, selectedImages, uploadedFiles)

				fileInput.addEventListener('change', function (event) {
					let files = event.target.files

					for (let i = 0; i < files.length; i++) {
						let file = files[i];
						if (file.type.match(/image.*/)) {
							if (event.target.files.length > 0 && dropParams.value) {
								selectedImages.innerHTML = '';
								dropParams.value = false;
							}
							setImage(selectedImages, file);
							uploadedFiles.push(file)
							fileInput.value = ''

						}
					}
				});
				selectedImages.addEventListener('click', function (e) {
					e.preventDefault()
					if (!e.target.classList.contains('drop-zone-select-image-remove')) {
						fileInput.click();
					}
				});
			})

		}
	});
}