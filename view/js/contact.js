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
    let data = await getDataAll('contact_info');
    let table = document.querySelector('tbody');
    data.forEach(x => {
        let tr = document.createElement('tr');
        tr.innerHTML = `
        <th scope="row">${x.id}</th>
        <td>${x.id_staff}</td>
        <td>${x.whatsapp}</td>
        <td>${x.instagram}</td>
        <td>${x.linkedin}</td>
        <td>${x.email}</td>
        <td>${x.address}</td>
        <td>${x.cel_number}</td>
        `;
        table.appendChild(tr);
    });
}