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


// function editIdea(ideaId) {
//     const ideaElement = document.getElementById(`idea-${ideaId}`);
//     const ideaTitle = ideaElement.querySelector(".idea-title").textContent;
//     const input = document.createElement("input");
//     input.type = "text";
//     input.value = ideaTitle;
//     input.className = "idea-edit-input";
//     // Reemplaza el título con un campo de entrada
//     ideaElement.querySelector(".idea-title").replaceWith(input);

//     // Añade un evento de "blur" al input para guardar los cambios cuando el usuario haga clic fuera del input
//     input.addEventListener("blur", function() {
//         const newIdeaTitle = this.value;

//         // Aquí es donde usarías AJAX para enviar los cambios al servidor
//         fetch(`/ruta/a/tu/endpoint/api/${ideaId}`, {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//             },
//             body: JSON.stringify({
//                 title: newIdeaTitle,
//             }),
//         })
//         .then(response => response.json())
//         .then(data => {
//             // Aquí puedes manejar la respuesta del servidor
//             console.log(data);
//         })
//         .catch(error => {
//             // Aquí puedes manejar cualquier error que ocurra durante la solicitud AJAX
//             console.error('Error:', error);
//         });
//     });
// }
// function editIdea(ideaId) {
//     const ideaElement = document.getElementById(`idea-${ideaId}`);
//     const ideaTitle = ideaElement.textContent;
//     const input = document.createElement("input");
//     input.type = "text";
//     input.value = ideaTitle;
//     input.className = "idea-edit-input";

//     // Crea los botones de "Guardar" y "Cancelar"
//     const saveButton = document.createElement("button");
//     saveButton.textContent = "Guardar";
//     const cancelButton = document.createElement("button");
//     cancelButton.textContent = "Cancelar";

//     // Reemplaza el título con un campo de entrada y los botones
//     ideaElement.textContent = '';
//     ideaElement.appendChild(input);
//     ideaElement.appendChild(saveButton);
//     ideaElement.appendChild(cancelButton);

//     // Cuando el usuario haga clic en "Guardar", guarda los cambios localmente
//     saveButton.addEventListener("click", function() {
//         const newIdeaTitle = input.value;

//         // Reemplaza el campo de entrada y los botones con el nuevo título
//         ideaElement.textContent = newIdeaTitle;
//     });

//     // Cuando el usuario haga clic en "Cancelar", revierte los cambios
//     cancelButton.addEventListener("click", function() {
//         ideaElement.textContent = ideaTitle;
//     });
// }


// window.editIdea = editIdea
window.confirmDeletion = confirmDeletion;
window.deleteIdea = deleteIdea;
