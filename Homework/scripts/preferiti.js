function mostradescrizione(event){
    const testo = event.currentTarget;
    testo.removeEventListener("click",mostradescrizione);
    const desc = event.currentTarget.parentNode.querySelector("li");
    desc.classList.remove("hidden");
    testo.textContent = "Nascondi ID";
    testo.addEventListener("click",nascondidescrizione);
}

function nascondidescrizione(event){
    const testo = event.currentTarget;
    testo.removeEventListener("click",nascondidescrizione);
    const desc = event.currentTarget.parentNode.querySelector("li");
    desc.classList.add("hidden");
    testo.textContent = "Mostra ID";
    testo.addEventListener("click",mostradescrizione);
}

function mostrapreferiti(){
    const section = document.querySelector("#prefelem");
    section.innerHTML ="";
    fetch("http://localhost/Homework/mostra_preferiti.php").then(onResponse).then(onJSONmostra);
}

function onResponse(response){
    return response.json();
}

function onJSONmostra(json){
    
   for(preferito in json){
    
    const container = document.createElement("div");
    container.classList.add("elemento");
    container.id ="articolo"; 

    
    const ti = document.createElement("h2");
    ti.textContent = json[preferito].title;
    ti.classList.add("title");
    
    const img = document.createElement("img");
    img.src = json[preferito].img;
    img.classList.add("copertina");

    const descr = document.createElement("li");
    descr.textContent = json[preferito].descr;
    descr.classList.add("hidden");

    const te = document.createElement("span");
    te.textContent = "Mostra ID";
    te.addEventListener("click",mostradescrizione);

    const key = document.createElement("div");
    key.classList.add("hidden");
    key.textContent = json[preferito].id;

    const bottone2 = document.createElement("button");
    bottone2.innerHTML = "Rimuovi dai preferiti";
    bottone2.addEventListener("click",rimuovipreferito);

    container.appendChild(img);
    container.appendChild(ti);
    container.appendChild(te);
    container.appendChild(descr);
    container.appendChild(key);
    container.appendChild(bottone2);

    const sectionelem =document.querySelector("#prefelem");
    sectionelem.appendChild(container);
    const section = document.querySelector("#preferiti");
    section.classList.remove("hidden");
    cont++;
    }
}


function esito(response){
    return response.text();
}



function rimuovipreferito(event){
    const title = event.currentTarget.parentNode.querySelector("h2").textContent;
    const id = event.currentTarget.parentNode.querySelector("div").textContent;
  
    fetch("http://localhost/Homework/rimuovi_preferiti.php?ti="+title+"&id="+id+"").then(AggiornaEventi);
    cont--;
    if(cont ===0){
        preferiti.classList.add("hidden");
    }
}
    

function AggiornaEventi(response){
   fetch("http://localhost/Homework/preferiti.php").then(mostrapreferiti);
}

let cont=0;

mostrapreferiti();
