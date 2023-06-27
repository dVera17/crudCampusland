document.addEventListener("DOMContentLoaded", (e) => {
    fillData();
});

const options = {
	method: 'GET'
};

const getDataAll = async function(endpoint){
    let res = await (await fetch(`http://localhost:8181/CampusPHP/crudCampusland/uploads/${endpoint}`, options)).json();
    return res;
}

const fillData = async function(){
    let data = await getDataAll('chapters');
    let table = document.querySelector('tbody');
    data.forEach(x => {
        let tr = document.createElement('tr');
        tr.innerHTML = `
        <th scope="row">${x.id}</th>
        <td>${x.id_thematic_units}</td>
        <td>${x.name_chapter}</td>
        <td>${x.start_date}</td>
        <td>${x.end_date}</td>
        <td>${x.description}</td>
        <td>${x.duration_days}</td>
        `;
        table.appendChild(tr);
    });
}