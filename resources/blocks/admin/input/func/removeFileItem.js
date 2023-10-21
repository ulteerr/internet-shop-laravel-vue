export function removeFileItem(btn, dt) {
	btn.addEventListener('click', (event) => {
		event.preventDefault();
		let target = event.target;
		let name = target.previousElementSibling.textContent;
		let input = target.closest('.input-file-row').querySelector('input[type=file]');
		target.closest('.input-file-list-item').remove();
		for (let i = 0; i < dt.items.length; i++) {
			if (name === dt.items[i].getAsFile().name) {
				dt.items.remove(i);
			}
		}
		input[0] = dt.files
	})
}