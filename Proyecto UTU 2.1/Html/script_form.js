document.addEventListener("DOMContentLoaded", function () {
    if (window.location.pathname.endsWith("testimonio.php")) {
        const testimonioForm = document.getElementById("testi");
        
        if (testimonioForm) {
            testimonioForm.addEventListener("submit", function (e) {
                
                const nombre = document.getElementById("nombre")?.value.trim();
                const cedula = document.getElementById("cedula")?.value.trim();
                const edad = document.getElementById("edad")?.value.trim();
                const testimonio = document.getElementById("testimonio")?.value.trim();
                const departamento = document.getElementById("departamento")?.value;

                //  LÍNEA DE DEPURACIÓN CLAVE
                console.log("Nombre:", nombre,
                            "Cédula:", cedula,
                            "Testimonio:", testimonio
                            ,"Edad:", edad,
                            "Departamento:", departamento);
                //  FIN LÍNEA DE DEPURACIÓN

                // Validación: la cédula debe tener exactamente 8 dígitos
                const cedulaRegex = /^$|^\d{8}$/;
                if (!cedulaRegex.test(cedula)) {
                    alert("La cédula debe tener exactamente 8 dígitos numéricos o estar vacía.");
                    e.preventDefault();
                    return;
                }

                //Validación: el testimonio no debe estar vacío
                if (testimonio.length === 0) {
                    alert("El testimonio no puede estar vacío.");
                    e.preventDefault();
                    return;
                }

                //Validación: la edad debe ser un numero del 1 al 120
                if (edad !== "" && (isNaN(edad) || edad < 1 || edad > 120)) {
                    alert("La edad debe ser un número entre 1 y 120 o estar vacía.");
                    e.preventDefault();
                    return;
                }

                // Si todas las validaciones pasan, se puede enviar el formulario
                alert("¡Testimonio enviado correctamente! Gracias por compartir tu experiencia.");
            });
        }
    }
});