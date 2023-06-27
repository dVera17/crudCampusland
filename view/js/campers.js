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
    let data = await getDataAll('campers');
    let table = document.querySelector('tbody');
    data.forEach(x => {
        let tr = document.createElement('tr');
        tr.innerHTML = `
        <th scope="row">${x.id}</th>
        <td>${x.id_team_schedule}</td>
        <td>${x.id_route}</td>
        <td>${x.id_trainer}</td>
        <td>${x.id_psycologist}</td>
        <td>${x.id_teacher}</td>
        <td>${x.id_level}</td>
        <td>${x.id_journey}</td>
        <td>${x.id_staff}</td>
        `;
        table.appendChild(tr);
    });
}