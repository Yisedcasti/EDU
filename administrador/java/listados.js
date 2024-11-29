
const datos = [
        { nombres: 'Juan Andres', apellidos: 'Romero Olivares', grado: 'Grado 0', curso: '0-05', jornada: 'Mañana', enlace: 'asistencias.php' },
        { nombres: 'Maria Fernanda', apellidos: 'López García', grado: 'Grado 1', curso: '1-01', jornada: 'Tarde', enlace: 'asistencias.php' },
        { nombres: 'Carlos Eduardo', apellidos: 'Pérez Rodríguez', grado: 'Grado 2', curso: '2-02', jornada: 'Mañana', enlace: 'asistencias.php' },
        { nombres: 'Ana Sofía', apellidos: 'Martínez Sánchez', grado: 'Grado 1', curso: '1-03', jornada: 'Tarde', enlace: 'asistencias.php' },
        { nombres: 'Luis Felipe', apellidos: 'Gómez Torres', grado: 'Grado 3', curso: '3-01', jornada: 'Mañana', enlace: 'asistencias.php' },
        { nombres: 'Camila Andrea', apellidos: 'Ramírez Castro', grado: 'Grado 2', curso: '2-05', jornada: 'Tarde', enlace: 'asistencias.php' },
        { nombres: 'Jorge Enrique', apellidos: 'Morales Díaz', grado: 'Grado 0', curso: '0-02', jornada: 'Mañana', enlace: 'asistencias.php' },
        { nombres: 'Valeria Isabel', apellidos: 'Vargas Ríos', grado: 'Grado 1', curso: '1-02', jornada: 'Tarde', enlace: 'asistencias.php' },
        { nombres: 'Santiago José', apellidos: 'Mejía Pardo', grado: 'Grado 2', curso: '2-04', jornada: 'Mañana', enlace: 'asistencias.php' },
        { nombres: 'Natalia Paola', apellidos: 'Ortiz Ramírez', grado: 'Grado 3', curso: '3-03', jornada: 'Tarde', enlace: 'asistencias.php' },
        { nombres: 'Andrés Felipe', apellidos: 'Salazar Mendoza', grado: 'Grado 0', curso: '0-03', jornada: 'Mañana', enlace: 'asistencias.php' },
        { nombres: 'Daniela Sofía', apellidos: 'Navarro Gutiérrez', grado: 'Grado 2', curso: '2-03', jornada: 'Tarde', enlace: 'asistencias.php' }
    ];
    

    function updateTable() {
        const gradoSelect = document.getElementById("gradoSelect").value;
        const jornadaSelect = document.getElementById("jornadaSelect").value;
    
        const tbody = document.querySelector("#dataTable tbody");
        tbody.innerHTML = "";
    
        const filteredData = datos.filter(item => 
            item.grado === gradoSelect && item.jornada === jornadaSelect
        );
    
        filteredData.forEach(item => {
            const row = document.createElement("tr");
    
            const cellnombres = document.createElement("td");
            const cellapellidos = document.createElement("td");
            const cellGrado = document.createElement("td");
            const cellCurso = document.createElement("td");
            const cellJornada = document.createElement("td");

            const linknombres = document.createElement("a");
            linknombres.href = item.enlace;
            linknombres.textContent = item.nombres;

    
            cellnombres.appendChild(linknombres);
            cellapellidos.textContent = item.apellidos;
            cellGrado.textContent = item.grado;
            cellCurso.textContent = item.curso;
            cellJornada.textContent = item.jornada;
    
            row.appendChild(cellnombres);
            row.appendChild(cellapellidos);
            row.appendChild(cellGrado);
            row.appendChild(cellCurso);
            row.appendChild(cellJornada);
    
            tbody.appendChild(row);
        });
    }
    