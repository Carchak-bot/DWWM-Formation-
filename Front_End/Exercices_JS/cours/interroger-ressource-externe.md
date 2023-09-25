# Les 3 manières de récupérer une ressource externe en JS

Avant toute chose voici la méthode pour récupérer le contenu d'un fichier JSON qui existe en local :  

```js
// Si la ressource est locale et de type JSON
import monJson from 'data.json' assert {type: 'json'};
console.log("Mon JSON : ", monJson);
```

Les codes qui suivent vous présentent les 3 méthodes et variantes à base de "promesses" explicites.

## Via Ajax et l'objet `xmlHttpRequest`(Obsolète car souvent associé à jQuery)

Avec Ajax et la méthode `xmlHttpRequest`, il est indispensable de faire appel à un objet `Promise`.

```js
const result = await ajaxTest('data.json');
console.log("Résultat via Ajax - nécessite une promesse explicite: ", result);
function ajaxTest (url) {
    return new Promise((resolve) => {
    const xhr = new XMLHttpRequest();
    if (!xhr) {
        alert('Abandon :( Impossible de créer une instance de XMLHTTP');
        return false;
    }
    xhr.open('GET', url);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                return resolve(JSON.parse(this.response));
            }
        }
    };
    xhr.send();
    });
}
```

## Via Axios, qui nécessite l'appel à la librairie Axios via un CDN (voir le `<head>` de `index.html`)

```js
let datas = await axiosTest();
console.log("Datas via Axios et une promesse implicite : ", datas);
async function axiosTest () {
    const response = await axios.get("data.json");
    return response.data;
}
```

### Variante d'Axios avec l'utilisation de l'objet `Promise`

```js
datas = await axiosTestAvecPromesseExplicite();
console.log("Datas via Axios et une promesse explicite: ", datas.data);
function axiosTestAvecPromesseExplicite () {
    return new Promise((resolve) => {
        return resolve(axios.get("data.json"));
        });
}
```

## Via fetch (méthode recommandée ES6)

```js
let data;
await getData();
console.log("Voici les données via fetch et une promesse implicite: ", data);

async function getData () {
    const res = await fetch("data.json", {
        method: 'GET',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-type': 'application/json'
        }
    });
    data = await res.json();
}

```

### Variante de fetch avec l'utilisation de l'objet `Promise`

```js
data = await getDataAvecPromesseExplicite();
console.log("Voici les données via fetch avec une promesse explicite: ", data);
function getDataAvecPromesseExplicite () {
    return new Promise((resolve) => {
        return resolve(
            fetch("data.json", {
                method: 'GET',
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-type': 'application/json'
                }
            }).then(function(response) {
                return response.json();
            })
        )
    })
    
}
```
