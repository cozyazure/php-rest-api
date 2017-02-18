# php-rest-api
Simple PHP rest api

Write a small web service in PHP that accepts a POST request, with the body containing a bunch of text. The service should count the top ten most used words in the document and report them along with how often they occur.

## Pre-requisite

Docker - and that's all you need.

## Installation

Build the image:

```bash
docker build -t php-rest-api .
```

Run the image:

```bash
docker run -p 8080:80 -d php-rest-api
```

The webserver is now hosted at `ocalhost:8080`

## Usage

Using either Postman or any other client application, post a payload to `localhost:8080/index.php` in the following format:

```
{
    "input":"text of strings"
}
``` 
An example input:

```
{
	"input":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
}
```

An example response from the input above:

```
{
  "the": 3,
  "Lorem": 2,
  "Ipsum": 2,
  "a": 2,
  "type": 2,
  "industry": 2,
  "and": 2,
  "of": 2,
  "text": 2,
  "dummy": 2
}

```

### Error Message:

Various `ErrorMessage` together with their code will be thrown if the input is not posted in a expected manner:

* If the value of `input` is not a string:
```
{
  "ErrorCode": 500,
  "ErrorMessage": "Please input a valid string"
}
```

* If the input is not in correct format:
```
{
  "ErrorCode": 500,
  "ErrorMessage": "Please make sure the data has a valid input field in JSON format"
}
```

* If the input is not called using `POST` method:
```
{
  "ErrorCode": 403,
  "ErrorMessage": "Only POST Method is allowed"
}
```
