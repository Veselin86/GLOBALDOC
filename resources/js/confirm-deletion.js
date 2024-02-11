function confirmDeletion(id, url, primaryKey = "id") {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
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
    Swal.fire({
        // Configuración de SweetAlert
    }).then((result) => {
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

function editIdea(ideaId) {
    const ideaElement = document.getElementById(`idea-${ideaId}`);
    const ideaTitle = ideaElement.querySelector(".idea-title").textContent;
    const input = document.createElement("input");
    input.type = "text";
    input.value = ideaTitle;
    input.className = "idea-edit-input";
    // Reemplaza el título con un campo de entrada
    ideaElement.querySelector(".idea-title").replaceWith(input);
    // Aquí podrías añadir un botón de guardar o manejar el guardado en el evento de "change" o "blur" del input
}

// Añadir más funciones según sea necesario para manejar la creación de nuevas ideas.

window.confirmDeletion = confirmDeletion;
window.editIdea = editIdea;
window.deleteIdea = deleteIdea;
