# short-links
![encurta-link rf gd_](https://github.com/YrllanBrandao/short-links/assets/77467410/4ee87992-34d8-40df-b91f-79a5d6cca01d)

Trata-se de um encurtador de Urls, que assim como o nome sugere, transforma Urls Longas em Urls curtas de forma fácil, também disponibiliza um endpoint para encurtamento de Url.

## encurtar uma Url através da API

#### Endpoint
```
POST https://encurta-link.rf.gd/short-url
```

#### Cabeçalho da requisição

```
Content-Type: application/json
```

#### Corpo da Requisição

| campo | valor esperado |
| longLink | uma url longa junto com o protocolo |


#### Resposta

Se a requisição for bem succedidada você receberá algo como:
```
{
    "shortened_link": "http://localhost/gcyw"
}
```
