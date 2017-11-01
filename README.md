# Swagger Store 

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

Simple Swagger Storege. 

[demo](https://swagger-store.herokuapp.com)

## Feature 

- Store Swagger.json & Share it with URL
- Auto generate swagger-ui

## Usage 

### Create Swagger Document

PUT /api/swagger/{YOUR_API_KEY}

Put swagger.json on your Request Body

### Update Swagger Document

PATCH /api/swagger/{YOUR_API_KEY}

Put swagger.json on your Request Body

### Dashbord : Your Swagger document URL

GET /swagger/{YOUR_API_KEY}

### Get Swagger.json URL

GET /swagger/{YOUR_API_KEY}/json

### Get SwaggerUI URL

GET /swagger/{YOUR_API_KEY}/doc


