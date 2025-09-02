const lista = document.getElementById("lista");
const nombre = document.getElementById("nombre");
const edad = document.getElementById("edad");
const btnAgregar = document.getElementById("btnAgregar");

// 📌 Cargar lista al inicio
cargarJugadores();

btnAgregar.addEventListener("click", () => {
  fetch("acciones.php", {
    method: "POST",
    body: new URLSearchParams({
      accion: "agregar",
      nombre: nombre.value,
      edad: edad.value
    })
  })
  .then(r => r.text())
  .then(msg => {
    alert(msg);
    cargarJugadores();
  });
});

function cargarJugadores() {
  fetch("acciones.php?accion=listar")
    .then(r => r.json())
    .then(data => {
      lista.innerHTML = "";
      data.forEach(j => {
        const li = document.createElement("li");
        li.textContent = `${j.nombre} (${j.edad} años)`;

        const btn = document.createElement("button");
        btn.textContent = "❌ Eliminar";
        btn.classList.add("eliminar");
        btn.addEventListener("click", () => {
          fetch(`acciones.php?accion=eliminar&id=${j.id}`)
            .then(r => r.text())
            .then(msg => {
              alert(msg);
              cargarJugadores();
            });
        });

        li.appendChild(btn);
        lista.appendChild(li);
      });
    });
}
