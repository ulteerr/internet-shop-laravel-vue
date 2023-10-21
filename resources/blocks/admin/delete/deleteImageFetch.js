export function deleteImageFetch(url, model, id) {
	fetch(`/admin/${model}/${id}/delete-image`, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': document.querySelector('input[name="_token"').value
		},
		body: JSON.stringify({ url, id }),
	})
		.then(response => response.json())
		.then(data => {
			window.location.reload
		})
		.catch(error => {
			return false;
		});

}