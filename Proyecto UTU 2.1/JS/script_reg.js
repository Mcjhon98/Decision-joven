// Esperamos a que la página cargue completamente
document.addEventListener("DOMContentLoaded", function () {
        // Verificamos que estamos en la página de testimonio
    if (window.location.href.includes("Registro.html")) {

    // Seleccionamos el formulario usando el ID 'registroForm'
    const registroForm = document.getElementById('registerform'); 

    if (registroForm) {
        registroForm.addEventListener("submit", function (e) {
            
            // Obtenemos los valores de los campos
            // Mantenemos solo el .trim() para quitar espacios al inicio/final
            const nombre = document.getElementById("nombre").value.trim();
            const cedula = document.getElementById("cedula").value.trim(); // <-- SIN el limpiador
            const celular = document.getElementById("celular").value.trim(); // <-- SIN el limpiador
            const departamento = document.getElementById("departamento").value;

            // 1. Validación de campos vacíos (mantenida por seguridad)
            if (!nombre || !cedula || !celular || !departamento) {
                alert(" Por favor, completá todos los campos.");
                e.preventDefault();
                return;
            }

            // 2. Validación: Cédula (Exactamente 8 dígitos)
            const cedulaRegex = /^\d{8}$/;
            if (!cedulaRegex.test(cedula)) {
                alert("La cédula debe tener exactamente 8 dígitos.");
                e.preventDefault();
                return;
            }


            // 3. Validación: Celular (Exactamente 9 dígitos)
            const celularRegex = /^\d{9}$/;
            if (!celularRegex.test(celular)) {
                alert("El número de telefono debe tener exactamente 9 dígitos.");
                e.preventDefault();
                return;
            }

            // Si pasa esta línea, el formulario se envía.
            alert("Registro Completado Con Exito!"); 
            });
        }
    }
});
//TRUNCATE TABLE register;