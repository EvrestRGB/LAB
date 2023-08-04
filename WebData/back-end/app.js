const fs = require('fs');
const https = require('https');
const querystring = require('querystring');

const API_KEY = 'AIzaSyA3Ko9EmtICPsLWa56HLxsM4ovogrrw_-Q';
const SEARCH_ENGINE_ID = '876e975a9b04f4a26';

function search(query) {
  const searchUrl = `https://www.googleapis.com/customsearch/v1?key=${API_KEY}&cx=${SEARCH_ENGINE_ID}&q=${query}`;

  return new Promise((resolve, reject) => {
    https.get(searchUrl, (response) => {
      if (response.statusCode !== 200) {
        reject(new Error(`La recherche a échoué avec le code d'état : ${response.statusCode}`));
        return;
      }

      let data = '';

      response.on('data', (chunk) => {
        data += chunk;
      });

      response.on('end', () => {
        try {
          const jsonData = JSON.parse(data);

          if (jsonData.items) {
            resolve(jsonData.items);
          } else {
            resolve([]);
          }
        } catch (error) {
          reject(error);
        }
      });
    }).on('error', (error) => {
      reject(error);
    });
  });
}

function saveResultsToJSON(results, filename) {
  const json = JSON.stringify(results, null, 2);

  fs.writeFile(filename, json, 'utf8', (error) => {
    if (error) {
      console.error('Erreur lors de l\'enregistrement des résultats :', error);
    } else {
      console.log('Les résultats ont été enregistrés dans le fichier :', filename);
    }
  });
}

async function main() {
  const query = await getInput('Entrez votre recherche : ');
  const results = await search(query);

  if (results.length > 0) {
    for (const result of results) {
      console.log('Titre :', result.title);
      console.log('URL :', result.link);
      console.log('---');
    }

    const filename = await getInput('Entrez le nom du fichier JSON pour enregistrer les résultats : ');
    saveResultsToJSON(results, filename);
  } else {
    console.log('Aucun résultat trouvé.');
  }
}

function getInput(prompt) {
  return new Promise((resolve) => {
    const readline = require('readline');
    const rl = readline.createInterface({
      input: process.stdin,
      output: process.stdout
    });

    rl.question(prompt, (input) => {
      rl.close();
      resolve(input);
    });
  });
}

main().catch((error) => {
  console.error('Une erreur s\'est produite :', error);
});

