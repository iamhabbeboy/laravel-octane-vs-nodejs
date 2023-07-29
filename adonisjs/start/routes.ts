/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| This file is dedicated for defining HTTP routes. A single file is enough
| for majority of projects, however you can define routes in different
| files and just make sure to import them inside this file. For example
|
| Define routes in following two files
| ├── start/routes/cart.ts
| ├── start/routes/customer.ts
|
| and then import them inside `start/routes.ts` as follows
|
| import './routes/cart'
| import './routes/customer'
|
*/

import Route from '@ioc:Adonis/Core/Route'
import axios from 'axios'

Route.get('/external-service', async () => {
  try {
    const url = 'http://localhost:3000/data';
    const result = await axios.get(url)
    return result
  } catch (error) {
    return {error: `Error fetching data from the external endpoint: ${error.message}`};
  }
})
