// Merr te dhenat nga local storage
const selectedType = localStorage.getItem("selectedType");
const selectedName = localStorage.getItem("selectedName");


const planeData = {};

//shto emra
function addPlane(type, name) {
    if (!planeData[type]) {
        planeData[type] = [];
    }
    planeData[type].push(name);
}

// aeroplanat--lista
addPlane("Jet", "Learjet 75");
addPlane("Jet", "Gulfstream GV");
addPlane("Single engine", "Cessna 180");
addPlane("Multi-Engine", "Beechcraft 58");
addPlane("Helicopter", "Airbus AS355NP");

// mbush dropdown
window.addEventListener("load", function () {
    const typeDropdown = document.getElementById("type");
    const nameDropdown = document.getElementById("plane-name");

    // llojet
    Object.keys(planeData).forEach(type => {
        const option = document.createElement("option");
        option.value = type;
        option.textContent = type;

        //nese e njejt e zgjedh
        if (type === selectedType) {
            option.selected = true;
        }

        typeDropdown.appendChild(option);
    });

    // mbush name kur zgjedhet type
    if (selectedType && planeData[selectedType]) {
        
        nameDropdown.innerHTML = '<option value="" disabled>Select a name</option>';
        planeData[selectedType].forEach(name => {
            const option = document.createElement("option");
            option.value = name;
            option.textContent = name;

            //nese e njejt e zgjedh
            if (name === selectedName) {
                option.selected = true;
            }

            nameDropdown.appendChild(option);
        });
    } else {
        //default name
        nameDropdown.innerHTML = '<option value="" disabled selected>Select a name</option>';
    }

    //kur ndrro tipi ndrron edhe emri
    typeDropdown.addEventListener("change", function () {
        const selectedType = this.value;

        // fshin emrat e mehershem
        nameDropdown.innerHTML = '<option value="" disabled selected>Select a name</option>';

        //shton emrat perkates
        planeData[selectedType].forEach(name => {
            const option = document.createElement("option");
            option.value = name;
            option.textContent = name;
            nameDropdown.appendChild(option);
        });
    });

    // pastron localstorage
    localStorage.clear();
});
