import { setImage } from "../func/setImage";


export function dropEvents(item, clear, selectedImage,uploadedFiles) {
	item.addEventListener('drop', function (event) {
		event.preventDefault();
		this.style.background = 'white';

		let files = event.dataTransfer.files;
	
		if (files.length > 0 && clear.value) {
			selectedImage.innerHTML = ''
			clear.value = false
		}
		for (let i = 0; i < files.length; i++) {
			let file = files[i];

			if (file.type.match(/image.*/)) {
				setImage(selectedImage, file)
				uploadedFiles.push(file)
			}
		}
	});
}