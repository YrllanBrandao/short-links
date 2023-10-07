const form = document.getElementById("form-link");
const inputLink = document.getElementById("long-link");
const outputLink = document.getElementById("shortened-link");
const outputArea = document.getElementById("shortened-link-area");
const buttonShort = document.getElementById("button-short");


form.addEventListener("submit", (e)=>{
    e.preventDefault();
    inputLink.readOnly = true;
    const longLink = inputLink.value;

    buttonShort.innerHTML = ". . .";
    buttonShort.disabled = true;
    shortLink(longLink);
})



async function shortLink(link){
    const requestBody = {
        'longLink': link
    }
    const url =  "http://localhost:8080/short-url";
   
    try{
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(requestBody)
        })

        const responseData = await response.json();
        outputArea.classList.remove("d-none");
        outputLink.value = responseData.shortened_link
        buttonShort.innerHTML = "Encurtar link";
        buttonShort.disabled = false;
        inputLink.readOnly = false;
    }
    catch(error){
        alert("Ocorreu um erro interno, tente novamente mais tarde");
        buttonShort.innerHTML = "Encurtar link";
        buttonShort.disabled = false;
        inputLink.readOnly = false;
    }
}
