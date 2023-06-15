# Train API 

You can CRUD this API using the Train API from the Renty application. The data obtained includes data on trains name, route, class, price, date, start, finish, and capacity.

## API Documentation

The REST API to the train app is described below.

### Get all data

```
  GET /api/trains
```

| Parameter | Type     | Description                                                                                                                                                |
| :-------- | :------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`   | `string` | **Optional**. 
| `type`    | `string` | **Optional**.                                

#### Response

```{
    "status": 200,
    "message": "success",
    "data": [
        {
            "id": 1,
            "name": "Jakarta Express",
            "route": "JKT-TNG",
            "class": "Economy",
            "price": 20000,
            "date": "2023-05-21",
            "start": "07:00:00",
            "finish": "15:00:00",
            "capacity": 100,
            "created_at": "2023-05-07T15:01:15.000000Z",
            "updated_at": "2023-06-05T00:07:51.000000Z"
        },
        {
            "id": 2,
            "name": "KAI EXPRESS",
            "route": "JKT-BGR",
            "class": "Executive",
            "price": 200000,
            "date": "2023-05-08",
            "start": "10:00:00",
            "finish": "12:00:00",
            "capacity": 100,
            "created_at": "2023-05-07T15:14:06.000000Z",
            "updated_at": "2023-06-05T00:11:56.000000Z"
        }
    ],
    "length": 2
}

```

### Get Spesific (by ID)

```
  GET /api/trains/{id}
```

| Parameter | Type     | Description                                                     |
| :-------- | :------- | :-------------------------------------------------------------- |
| `id`      | `string` | **Required**. It is used to find specific data from the Train id. |

#### Response

```
{
    {
    "status": 200,
    "message": "success",
    "data": {
        "id": 1,
        "name": "Jakarta Express",
        "route": "JKT-TNG",
        "class": "Economy",
        "price": 20000,
        "date": "2023-05-21",
        "start": "07:00:00",
        "finish": "15:00:00",
        "capacity": 100,
        "created_at": "2023-05-07T15:01:15.000000Z",
        "updated_at": "2023-06-05T00:07:51.000000Z"
    }
}
}
```

### Get Spesific (by Name)

```
  GET /api/trains/alltrain/name
```

| Parameter | Type     | Description                                                     |
| :-------- | :------- | :-------------------------------------------------------------- |
| `name`      | `string` | **Required**. The train_name column is mandatory and has a string value. |

#### Response

{
    "status": 200,
    "message": "success",
    "data": [
    {
            "name": "Jakarta Express"
        },
        {
            "name": "INDO TRANS"
        },
        {
            "name": "AIRLANGGA"
        },
        {
            "name": "LODAYA"
        },
        {
            "name": "ARGO PARAINGAN"
        },
        {
            "name": "KENCANA"
        }
    ],
    "length": 6
}


### Add  Data

```
  POST /api/trains/
```

| Parameter  | Type     | Status                                                                                                                              |
| :--------- | :------- | :---------------------------------------------------------------------------------------------------------------------------------- |
| `name` | `string` | **Required** The train_name column is mandatory and has a string value.                                                                 |
| `route`     | `string` | **Required** The route column shows the route of the train. The route column has a string value and is required.                   |
| `class`    | `string`   | **Required** The class column shows the class of the train. The class column has a string value and is required                   |
| `price`    | `int` | **Required**. The price column uses the train ticket price of each train. This column has an integer value.                            |
| `date`     | `date` | **Required**. The date column for the description of the train's departure date. This column has a date value                         |
| `start`    | `time` | **Required**. The start column for the description of the train's departure time. This column has a time value.                       |
| `finish`   | `time` | **Required**. The finish column for the description of the train's arrival time. This column has a time value                         |
| `capacity`   | `int` | **Required**. The capacity column for the description of the train's capacity. This column has a integer value.                      |
#### Response

```
{
    "status": 201,
    "message": "Success",
    "data": {
        "car_name": "Fuqi",
        "merk": "Nissan",
        "image": "public/rentcar-images/GrqglnqrrVWlm5s9cyv7yBkRbXOf9tIocMfEyUKg.jpg",
        "price": "780000",
        "type": "Manual",
        "color": "Silver",
        "status": "Booked"
    }
}
```

### Update Train Data

```
  PUT /api/trains/{id}
```

| Parameter | Type     | Description                                                              |
| :-------- | :------- | :----------------------------------------------------------------------- |
| `id`      | `string` | **Required**. To search for specific train's data that will be modified data |

#### Response

```
{
    {
    "status": 200,
    "message": "update success",
    "data": {
        "name": "Jakarta Express",
        "route": "JKT-JGJ",
        "class": "Economy",
        "price": "20000",
        "date": "2023-05-21",
        "start": "07:00:00",
        "finish": "15:00:00",
        "capacity": "100"
    }
}
}
```

### Delete Train Data

```
  DELETE /api/trains/{id}
```

| Parameter | Type     | Description                                                              |
| :-------- | :------- | :----------------------------------------------------------------------  |
| `id`      | `string` | **Required**. To search for specific train data that will be deleted data|

#### Response

```
{
    "status": 200,
    "message": "delete success."
}
```

## How to clone ?

**Backend**

- Clone this project using https or ssh
- So the api is using Laravel

```
composer install
npm install
```

- Copy `.env.example` file to `.env` on the root folder. You can type copy `.env.example .env` if using command prompt Windows or cp `.env.example .env` if using terminal, Ubuntu
- adjust the values that are in the `env` file like db name, db username, db password
- Set key in `.env` using `php artisan key:generate`
- Migrate database using `php artisan migrate`
- After everything has been set, the final step is to type the code below

```
php artisan serve
```

**Frontend**

- To install react js package using this code

```
npm install
```

