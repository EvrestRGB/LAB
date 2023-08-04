function search() {
    var searchInput = document.getElementById("searchInput").value;
    var url = "https://duckduckgo.com/?q=" + encodeURIComponent(searchInput) + "&format=json";

    fetch(url)
        .then(response => response.json())
        .then(data => {
            var results = parseDuckDuckGoResults(data);
            var jsonOutput = JSON.stringify(results, null, 2);
            document.getElementById("output").textContent = jsonOutput;
            enableDownload(jsonOutput);
        })
        .catch(error => {
            console.error("Une erreur s'est produite lors de la recherche.", error);
            document.getElementById("output").textContent = "Une erreur s'est produite lors de la recherche.";
            disableDownload();
        });
}

function parseDuckDuckGoResults(data) {
    var results = [];

    if (data.RelatedTopics) {
        data.RelatedTopics.forEach(topic => {
            var title = topic.Text;
            var url = topic.FirstURL;
            var snippet = topic.Result;

            results.push({
                title: title,
                url: url,
                snippet: snippet
            });
        });
    }

    return results;
}

function enableDownload(jsonData) {
    var downloadLink = document.getElementById("downloadLink");
    downloadLink.href = "data:application/json;charset=utf-8," + encodeURIComponent(jsonData);
    downloadLink.download = "results.json";
    downloadLink.style.display = "inline";
}

function disableDownload() {
    var downloadLink = document.getElementById("downloadLink");
    downloadLink.style.display = "none";
}

