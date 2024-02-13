function confirmDeletion(id, url, primaryKey = "id") {
    Swal.fire({
        // title: "Are you sure?",
        // text: "You won't be able to revert this!",
        title: window.translations['Are you sure?'],
        text: window.translations['You won`t be able to revert this!'],
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        // confirmButtonText: "Yes, delete it!",
        confirmButtonText: window.translations['Yes, delete it!'],
    }).then((result) => {
        if (result.isConfirmed) {
            // Crea un formulario y lo envía
            const form = document.createElement("form");
            form.method = "POST";
            // Utiliza la URL proporcionada y reemplaza el placeholder con el valor de primaryKey
            form.action = url.replace(`:${primaryKey}`, id);

            // Crea un campo de input para el token CSRF
            const csrfField = document.createElement("input");
            csrfField.type = "hidden";
            csrfField.name = "_token";
            csrfField.value = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"); // Obtiene el token CSRF del meta tag
            form.appendChild(csrfField);

            // Crea un campo de input para el método HTTP
            const methodField = document.createElement("input");
            methodField.type = "hidden";
            methodField.name = "_method";
            methodField.value = "DELETE";
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    });
}

function deleteIdea(ideaId) {
    console.log(`deleteIdea called with id ${ideaId}`);

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",    }).then((result) => {
        if (result.isConfirmed) {
            // Envía la solicitud DELETE usando AJAX
            fetch(`/ideas/${ideaId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "Content-Type": "application/json",
                },
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Elimina el elemento de la lista o actualiza la vista de alguna manera
                    document.getElementById(`idea-${ideaId}`).remove();
                }
            });
        }
    });
}

window.confirmDeletion = confirmDeletion;
window.deleteIdea = deleteIdea;