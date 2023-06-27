const options = {
	method: 'GET',
	headers: {
		'Content-Type': 'application/json'
	}
};

const getDataAll = async function(endpoint){
    let res = await (await fetch(`http://localhost/SkylAb-164/crudCampusland/crudCampusland/uploads/${endpoint}`), options).json();
    return res;
}

console.log(getDataAll("areas"));

