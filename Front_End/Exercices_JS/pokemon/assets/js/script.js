addEventListener("load", allPokemons);

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
    let arrayTypes;
    const select = document.querySelector('#poke-select').value;
    console.log(select);
    // fetch('https://pokebuildapi.fr/api/v1/pokemon/' + select)
    fetch(`https://pokebuildapi.fr/api/v1/pokemon/${select}`)
    .then((response) => response.json())
    .then((unPokemon) => {
        let infoReduites = document.createElement('div')
        let principal = document.querySelector('#pokecon');
        infoReduites.textContent = 'Voici les informations connues de ' + select;
        principal.appendChild(infoReduites)
    
        let pokemonImage = document.createElement('img');
        pokemonImage.setAttribute("src",unPokemon.image);
        infoReduites.appendChild(pokemonImage);

        
        unPokemon.apiTypes.forEach(type => {
            let pokemonType  = document.createElement('img');
            pokemonType.setAttribute("src", type.image);
            infoReduites.appendChild(pokemonType);
        })
        
});
}




//let monFormulaire = document.forms["formPokeSelect"];
    //monFormulaire.addEventListener("submit", getValues); 
    // Remarquez que l'on n'envoie rien et que l'on appelle la fonction sans les parenthèses
