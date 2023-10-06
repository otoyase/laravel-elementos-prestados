let inpBusqueda = document.getElementById("inpBusqueda");

let tabla = new DataTable('#tabla', {

    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    },
    dom: 'tip',
    responsive: true,
    
});

inpBusqueda.addEventListener("keyup", (event) => {

   tabla.search(inpBusqueda.value).draw();

})