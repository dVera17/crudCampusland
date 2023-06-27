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
    let data = await getDataAll('cities');
    let table = document.querySelector('tbody');
    data.forEach(x => {
        let tr = document.createElement('tr');
        tr.innerHTML = `
        <th scope="row">${x.id}</th>
        <td>${x.name_city}</td>
        <td>${x.id_region}</td>
        `;
        table.appendChild(tr);
    });
}