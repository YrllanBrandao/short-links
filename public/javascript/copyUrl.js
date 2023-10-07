// THIS IS A EXTENSION OF main.js
const buttonCopy = document.getElementById("button-copy-url");

buttonCopy.addEventListener("click", ()=>{

    if (!navigator.clipboard) {
        console.error('Impossível copiar url, é necessário a permissão para copiar');
        return;
      }

    const shortenedUrl = outputLink.value;
    console.log(shortenedUrl)
    navigator.clipboard.writeText(shortenedUrl).then(()=>{
        alert("Url Copiada");
    })
})