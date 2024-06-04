document.addEventListener('DOMContentLoaded', function () {
    // Mostrar el primer formulario al cargar la página
    document.getElementById('formulario1').classList.add('activo');
});

function mostrarSiguienteFormulario(formularioActual) {
    // Ocultar el formulario actual
    document.getElementById('formulario' + formularioActual).classList.remove('activo');
    
    // Mostrar el siguiente formulario
    var siguienteFormulario = formularioActual + 1;
    var siguienteFormularioElement = document.getElementById('formulario' + siguienteFormulario);
    if (siguienteFormularioElement) {
        siguienteFormularioElement.classList.add('activo');
    }
}
