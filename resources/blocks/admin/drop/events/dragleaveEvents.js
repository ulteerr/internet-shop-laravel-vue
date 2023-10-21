export function dragleaveEvents(item) {
	item.addEventListener('dragleave', function (event) {
		event.preventDefault();
		this.style.background = 'white';
	});
}