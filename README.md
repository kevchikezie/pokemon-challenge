# Pokemon Tasks

## Set up

### Ensure you are in the project directory before running the commands below

- Create the project's `.env` file

```bash
cp .env.example .env
```

- Install the necessary composer packages

```bash
composer install
```

- Update the database variables in your `.env` file with your database 
credentials. Open the `.env` file and update the database section with your own 
database details

```
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

- Run the migration command to create the necssary table for the project

```bash
php artisan migrate
```

- As for the pokemon dataset used in the project, kindly find a SQL dump file in 
the database directory of the project

- Start up the server by running the `artisan` command below

```bash
php artisan serve
```

## Postman Collection

The Postman collection for this project can be imported using the link below
```text
https://www.getpostman.com/collections/88d23a387c165a4c0425
```

**NOTE:**
Note that the SQL dump has all the necessary dataset for the project. Kindly 
ensure it has been imported to your database before running the project.

## My Approach

### The Dataset

I made use of few dataset from the Pokemon dataset that was share in the brief. 
The following tables were created from the dataset;

- Regions
- Generations
- Colors
- Shapes
- Habitats
- Species
- Pokemons

After creating the above tables using Laravel migration, I proceeded to 
importing the `csv` of each of the dataset to their individual tables that I 
have already created.

I also implemented the necessary table relationships that I found while in the 
converting the dataset to tables.

### Separation of Concerns

The project has two (2) unique ways it can supply its data to a client
Since the project is to be accessed by two (2) unique clients (i.e. web and 
API), I decided to separate the pokemon controller into two; a controller for 
the web and a controller for the API. 

A major concern here is repitition of the core business logic for pokemon. 
To avoid this repitition, I separated the business logic related to the pokemon 
entity to a service class (i.e **App\Services\PokemonService**). Doing this 
made it easy for me to reuse the business logic in the different pokemon 
controllers (i.e. **App\Http\Controllers\Web\PokemonController** and 
**App\Http\Controllers\Api\PokemonController**).

I ensured the controller does its primary duty which is to receive a request 
and return a response, which in this case can be a web page or a json response. 

To further separate concerns in other parts of the project, I implemented the 
form validation for editing a pokemon using Laravel Request 
(i.e. **App\Http\Requests\UpdatePokemonRequest**). I also made use of 
[Laravel's API Resource](https://laravel.com/docs/8.x/eloquent-resources) 
to handle returning of the needed json response when viewing all pokemons 
(**App\Http\Resources\PokemonCollection**) and when viewing the details of a 
single pokemon (**App\Http\Resources\PokemonResource**).

### Authentication Credentials

I used the Laravel's basic auth middleware to guard the API endpoints for 
fetching all pokemons and for fetching a single pokemon detail.

The Postman collection already has the credentials for the basic auth set up. 
Just in case the credentials does not exist in the Postman collection, the 
credentials below can be used;

```text
tester@mail.com
password
```

### Future Improvements

The following improvements can be made over time in the project; 

1. Some unit and integration test can be written to avoid breaking of codes 
when a new feature is added to the project.

2. More dataset can be added to the project to further capture more details 
about a pokemon.

3. Caching can also be implemented in the future to further speed up the 
retrival of data from the database, since the pokemon entity has a lot of 
related tables that needs to be joined in a single request.
