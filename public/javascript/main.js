const form = document.getElementById("form-link");
const inputLink = document.getElementById("long-link");


form.addEventListener("submit", (e)=>{
    e.preventDefault();
    const longLink = inputLink.value;
    shortLink(longLink);
})



async function shortLink(link){
    const requestBody = {
        'longLink': link
    }

    console.log("----")
    console.log(requestBody)
    console.log("----")
    const url =  "http://localhost:8080/short-url";
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(requestBody)
    })

    console.log(await response.json());
}
