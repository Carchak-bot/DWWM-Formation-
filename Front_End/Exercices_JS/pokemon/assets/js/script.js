addEventListener("load", allPokemons);
function getEvoPoke(select, unPokemon) {
    // Les evo
    let evo = document.createElement('div')
    infoReduites.appendChild(evo);
    let evoPrec = document.createElement('img');
    let evoActuelle = document.createElement('img');
    let evoSuiv = document.createElement('img');

    const select2 = unPokemon.apiPreEvolution.name
    fetch(`https://pokebuildapi.fr/api/v1/pokemon/${select2}`)
    .then((response) => response.json())
    .then((preEvo) => {
        evoPrec.setAttribute("src",preEvo.image);
    });
    
    fetch(`https://pokebuildapi.fr/api/v1/pokemon/${select}`)
    .then((response) => response.json())
    .then((actEvo) => {
        evoActuelle.setAttribute("src",actEvo.image);
    });
    const select3 = unPokemon.apiEvolutions[0].name
    fetch(`https://pokebuildapi.fr/api/v1/pokemon/${select3}`)
    .then((response) => response.json())
    .then((suivEvo) => {
        evoSuiv.setAttribute("src",suivEvo.image);
    });

    evo.appendChild(evoPrec);
    evo.appendChild(evoActuelle);
    evo.appendChild(evoSuiv);
}

function allPokemons() {
    fetch('https://pokebuildapi.fr/api/v1/pokemon')
    .then((response) => response.json())
    .then((json) => {
    for (let i=0; i<json.length; i++) {
        console.log(json[i]);

        let option = document.createElement('option');
        option.textContent = json[i].name;
        let pokeSelector = document.querySelector('#poke-select');
        pokeSelector.appendChild(option);
        //console.log(pokeSelector);
        //console.log(option);
    }
});
}

document.querySelector('#poke-select').addEventListener('change', getPokemon);
function getPokemon() {
    const select = document.querySelector('#poke-select').value;
    console.log(select);
    // fetch('https://pokebuildapi.fr/api/v1/pokemon/' + select)
    fetch(`https://pokebuildapi.fr/api/v1/pokemon/${select}`)
    .then((response) => response.json())
    .then((unPokemon) => {
        let infoReduites = document.querySelector('#infoReduites');
        //Nuke l'intérieur de la div
        infoReduites.innerHTML = "";

        if (infoReduites.innerHTML == "") {
            let texteTitre = document.createElement('span');
            texteTitre.textContent = 'Voici les informations connues de ' + select;
            infoReduites.appendChild(texteTitre);
        
            //Montrer l'image du pokémerde
            let pokemonImage = document.createElement('img');
            pokemonImage.setAttribute("src",unPokemon.image);
            infoReduites.appendChild(pokemonImage);

            let types = [];
            unPokemon.apiTypes.forEach(type => {
                types.push(type.image);
            });
            let typeDiv = document.createElement('div');
            console.log(typeDiv.childElementCount);
            infoReduites.appendChild(typeDiv);

            for (let index = 0; index < types.length; index++) {
                let imgType = document.createElement("img");
                imgType.setAttribute("src", types[index])
                typeDiv.appendChild(imgType);
            }
            getEvoPoke(select, unPokemon);
            
        }
    });
}




//let monFormulaire = document.forms["formPokeSelect"];
    //monFormulaire.addEventListener("submit", getValues); 
    // Remarquez que l'on n'envoie rien et que l'on appelle la fonction sans les parenthèses
