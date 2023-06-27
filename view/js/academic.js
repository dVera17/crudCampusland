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
    let data = await getDataAll('academic');
    let table = document.querySelector('tbody');
    data.forEach(x => {
        let tr = document.createElement('tr');
        tr.innerHTML = `
        <th scope="row">${x.id}</th>
        <td>${x.id_area}</td>
        <td>${x.id_staff}</td>
        <td>${x.id_position}</td>
        <td>${x.id_journey}</td>
        `;
        table.appendChild(tr);
    });
}