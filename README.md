# Cidadão de Olho

Cidadão de olho é um exemplo de como buscar dados em uma API, salvar no banco de dados e depois gerar uma API 
para consumo destas informações.

  - Usa dados disponiblizados pela API pública do Estado de Minas Gerais: http://dadosabertos.almg.gov.br/ws/ajuda/sobre
  - Utiliza o framework Laravel
  - Gera uma API no formato JSON com os web services detalhados: 
  - Mostrar os top 5 deputados que mais pediram reembolso de verbas indenizatórias por mês,
  considerando somente o ano de 2019: 
  - Mostrar o ranking das redes sociais mais utilizadas dentre os deputados, ordenado de
  forma decrescente.
    

Obs: O código foi feito somente para entendimento e em forma de estudo.

### Docker
Foi utilizado o ambiente docker para o desenvolvimento, com 3 ambientes separados:

* [nginx] - Servidor!
* [PHP - Fpm] - uma alternativa para a implementação PHP FastCGI.
* [PostgreSql] - The World's Most Advanced Open Source Relational Database

# Citizen Eye

Citizen eye is an example of how to fetch data in an API, save it in the database and then generate an API
for consumption of this information.

- Uses data made available by the public API of the State of Minas Gerais: http://dadosabertos.almg.gov.br/ws/ajuda/sobre
- Uses the Laravel framework
- Generates an API in JSON format with detailed web services:
- Show the top 5 deputies who most requested compensation reimbursement per month,
considering only the year 2019:
- Show the ranking of the most used social networks among the deputies, ranked by
decreasing way.

Note: The code was made only for understanding and in the form of a study.

### Docker
The docker environment was used for development, with 3 separate environments:

* [nginx] - Server!
* [PHP - Fpm] - an alternative to the PHP FastCGI implementation.
* [PostgreSql] - The World's Most Advanced Open Source Relational Database