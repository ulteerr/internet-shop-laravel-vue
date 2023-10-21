import { deleteImageFetch } from "../../delete/deleteImageFetch";
import { uploadedFiles, dropParams } from "../drop";



export function deleteImage(imageBlock, file, store) {
	let btn = imageBlock.querySelector('.drop-zone-select-image-remove')
	btn.addEventListener('click', (event) => {
		event.preventDefault();
		if (store) {
			let form = imageBlock.closest('form')
			deleteImageFetch(imageBlock.querySelector('img').src, form.dataset.model, form.dataset.id)
		} else {
			uploadedFiles.splice(uploadedFiles.indexOf(file), 1);
			if (uploadedFiles.length === 0) {
				imageBlock.closest('.drop-zone-select-images').innerHTML = dropParams.text
				dropParams.value = true
			} else {
				imageBlock.remove()
			}
		}

	})
}