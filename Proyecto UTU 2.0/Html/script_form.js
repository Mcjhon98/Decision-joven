document.addEventListener("DOMContentLoaded", function () {
    if (window.location.pathname.endsWith("testimonio.html")) {
        const testimonioForm = document.getElementById("testi");
        
        if (testimonioForm) {
            testimonioForm.addEventListener("submit", function (e) {
                
                const nombre = document.getElementById("nombre")?.value.trim();
                const cedula = document.getElementById("cedula")?.value.trim();
                const testimonio = document.getElementById("testimonio")?.value.trim();

                //  LÍNEA DE DEPURACIÓN CLAVE
                console.log("Nombre:", nombre, "Cédula:", cedula, "Testimonio:", testimonio);
                //  FIN LÍNEA DE DEPURACIÓN

                // Validación: la cédula debe tener exactamente 8 dígitos
                const cedulaRegex = /^0$|^\d{8}$/;
                if (!cedulaRegex.test(cedula)) {
                    alert(" La cédula debe tener exactamente 8 dígitos numéricos.");
                    e.preventDefault();
                    return;
                }

                alert("¡Testimonio enviado correctamente! Gracias por compartir tu experiencia.");
            });
        }
    }
});